<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plano extends CI_Controller {

	function __construct(){
		parent::__construct();

        session_start();

        $this->load->Model("Model_planos", "planos");
	}

	public function index()
	{

		$parametros = array(
			"listagem" => $this->planos->getPlanos($_SESSION["corporate"]->codEmpresa)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('plano/listagem', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');

	}

	public function novo(){

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('plano/cadastro'/*, $parametros*/);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');
	}

	public function add(){

		$parametros = array(
			"descricao" => trim(filter_input(INPUT_POST, "txtNome")),
			"valor" => doubleval(trim(str_replace(",",".",filter_input(INPUT_POST, "txtValor")))),
			"numeroDependentes" => intval(trim(filter_input(INPUT_POST, "txtNumDependentes"))),
			"valorDependente" => intval(trim(filter_input(INPUT_POST, "txtValorDependente"))),
			"status" => STATUS_PLANO_INCOMPLETO,
			"codEmpresa" => $_SESSION["corporate"]->codEmpresa
		);

		if($this->planos->inserir($parametros)){
			$_SESSION["msg_ok"] = "Plano Cadastrado com Sucesso";
			redirect(base_url("index.php/plano"));
		}else{
			$_SESSION["msg_error"] = "Houve um erro no cadastro do Plano";
			redirect(base_url("index.php/plano"));
		}


	}
}