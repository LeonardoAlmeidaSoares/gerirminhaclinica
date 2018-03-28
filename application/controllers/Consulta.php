<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta extends CI_Controller {

	function __construct() {
		parent::__construct();

        session_start();

        $this->load->Model("Model_consultas","consultas");
	}

	public function index() {

		$this->load->Model("Model_colaboradores", "colaboradores");

		$parametros = array(
			"listagem" => $this->consultas->getConsultasEmpresa($_SESSION["corporate"]->codEmpresa),
			"colaboradores" => $this->colaboradores->getColaboradores($_SESSION["corporate"]->codEmpresa)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('consulta/calendario', $parametros);
		$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');

	}

	public function novo() {

		$this->load->Model("Model_colaboradores", "colaboradores");
		$this->load->Model("Model_clientes", "clientes");
		$this->load->Model("Model_procedimentos", "procedimentos");

		$parametros = array(
			"colaboradores" => $this->colaboradores->getColaboradores($_SESSION["corporate"]->codEmpresa),
			"dependentes" => $this->clientes->getDependentes($_SESSION["corporate"]->codEmpresa),
			"procedimentos" => $this->procedimentos->getProcedimentosDetalhados($_SESSION["corporate"]->codEmpresa)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('consulta/cadastro', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');
	}

	public function add() {

		$parametros = array(
			"data" => trim(filter_input(INPUT_POST, "txtHorario")),
			"codColaborador" => intval(trim(filter_input(INPUT_POST, "txtColaborador"))),
			"codDependente" => intval(trim(filter_input(INPUT_POST, "txtDependente"))),
			//"codPlano" => "",
			"codUsuario" => intval(trim($_SESSION["user"]->codUsuario)),
			"codProcedimento" => intval(trim(filter_input(INPUT_POST, "txtProcedimento"))),
			"codEmpresa" => $_SESSION["corporate"]->codEmpresa,
			"valor" => doubleval(trim(str_replace(",",".",filter_input(INPUT_POST, "txtValor")))),
			"status" => STATUS_CONSULTA_ATIVA
		);

		if($this->consultas->inserir($parametros)){
			$_SESSION["msg_ok"] = "Consulta Cadastrada com Sucesso";
			redirect(base_url("index.php/consulta"));
		}else{
			$_SESSION["msg_error"] = "Houve um erro no cadastro da Consulta";
			redirect(base_url("index.php/consulta"));
		}

	}
}