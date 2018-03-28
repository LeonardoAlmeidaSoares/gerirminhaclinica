<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function getListaCidades()
	{

		$codEstado = intval(trim(filter_input(INPUT_POST, "codEstado")));

		$ret = $this->db->get_where("cidade", array("codEstado" => $codEstado));

		echo json_encode($ret->result_array());
	}

	public function getDadosPlano()
	{

		$codPlano = intval(trim(filter_input(INPUT_POST, "codPlano")));

		$ret = $this->db->get_where("plano", array("codPlano" => $codPlano));

		echo json_encode($ret->result_array());

	}

	public function getListaCompromissos(){

		session_start();

		$codColaborador = intval(trim(filter_input(INPUT_POST, "codColaborador")));
		$data = trim(filter_input(INPUT_POST, "data"));
		$codEmpresa = intval(trim($_SESSION["corporate"]->codEmpresa));

		$this->load->Model("Model_consultas", "consulta");

		$dump = $this->consulta->getConsultas($codEmpresa, $codColaborador, $data);

		$dump = $dump->result_array();

		for($i = 0; $i < count($dump); $i++){
			$dump[$i]["data"] = $this->uteis->converterDataParaPtBr($dump[$i]["data"]);
		
		}

		echo json_encode($dump);

	}

	public function getValorProcedimento(){

		$codDependente = intval(trim(filter_input(INPUT_POST, 'codDependente')));
		$codProcedimento = intval(trim(filter_input(INPUT_POST, "codProcedimento")));

		$retorno = $this->db->select("pp.*")
					->from("procedimento_plano pp")
					->join("plano p", "p.codPlano = pp.codPlano")
					->join("contrato c", "c.codplano = p.codPlano")
					->join("dependente d", "d.codContrato = c.codContrato")
					->where("pp.codProcedimento", $codProcedimento)
					->where("d.codDependente", $codDependente)
					->get();

		echo json_encode($retorno->Result_array());

	}

}