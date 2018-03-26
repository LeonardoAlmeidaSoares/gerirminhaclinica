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

		for($i = 0; $i <count($dump); $i++){
			$dump[$i]["data"] = $this->uteis->converterDataParaPtBr($dump[$i]["data"]);
		
		}

		echo json_encode($dump);

	}
}