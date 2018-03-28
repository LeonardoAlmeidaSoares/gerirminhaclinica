<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colaborador extends CI_Controller {

	function __construct(){
		parent::__construct();

        session_start();

        $this->load->Model("Model_colaboradores", "colaborador");
	}

	public function index()
	{

		$parametros = array(
			"listagem" => $this->colaborador->getColaboradores($_SESSION["corporate"]->codEmpresa)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('colaborador/listagem', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');

	}

	public function novo(){

		$this->load->Model("Model_especializacoes", "especializacoes");

		$parametros = array(
			"especializacoes" => $this->especializacoes->getEspecializacoes($_SESSION["corporate"]->codEmpresa)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('colaborador/cadastro', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');
	}

	public function add(){

		$parametros = array(
			"nome" => trim(filter_input(INPUT_POST, "txtNome")),
			"email" => trim(filter_input(INPUT_POST, "txtEmail")),
			"telefone" => trim(filter_input(INPUT_POST, "txtTelefone")),
			"celular" => trim(filter_input(INPUT_POST, "txtCelular")),
			"codEspecializacao" => intval(trim(filter_input(INPUT_POST, "txtEspecializacao"))),
			"formaPagto" => intval(trim(filter_input(INPUT_POST, "txtFormaPagto"))),
			"valor" => doubleval(trim(filter_input(INPUT_POST, "txtValor"))),
			"codEmpresa" => $_SESSION["corporate"]->codEmpresa,
			"registro" => trim(filter_input(INPUT_POST, "txtRegistro")),
			"status" => STATUS_COLABORADOR_ATIVO
		);

		if($this->colaborador->inserir($parametros)){
			$_SESSION["msg_ok"] = "Colaborador Cadastrado com Sucesso";
			redirect(base_url("index.php/colaborador"));
		}else{
			$_SESSION["msg_error"] = "Houve um erro no cadastro do Colaborador";
			redirect(base_url("index.php/colaborador"));
		}


	}
}