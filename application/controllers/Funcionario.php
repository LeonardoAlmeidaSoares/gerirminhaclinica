<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionario extends CI_Controller {

	function __construct(){
		parent::__construct();

        session_start();

        $this->load->Model("Model_funcionarios", "funcionario");
	}

	public function index()
	{

		$parametros = array(
			"listagem" => $this->funcionario->getFuncionarios($_SESSION["corporate"]->codEmpresa)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('funcionario/listagem', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');

	}

	public function novo(){

		$this->load->Model("Model_cargos", "cargos");

		$parametros = array(
			"cargos" => $this->cargos->getCargos($_SESSION["corporate"]->codEmpresa),
			"estados" =>  $this->db->get("estado")
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('funcionario/cadastro', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');
	}

	public function add(){

		$parametros = array(
			"nome" => trim(filter_input(INPUT_POST, "txtNome")),
			"email" => trim(filter_input(INPUT_POST, "txtEmail", FILTER_SANITIZE_EMAIL)),
			"salario" => doubleval(trim(str_replace(",",".",filter_input(INPUT_POST, "txtSalario")))),
			"telefone" => trim(filter_input(INPUT_POST, "txtTelefone")),
			"celular" => trim(filter_input(INPUT_POST, "txtCelular")),
			"dataNascimento" => trim(filter_input(INPUT_POST, "txtNascimento")),
			"naturalidade" => intval(trim(filter_input(INPUT_POST, "txtCidade"))),
			"codCargo" => intval(trim(filter_input(INPUT_POST, "txtCargo"))),
			"status" => STATUS_FUNCIONARIO_ATIVO,
			"codEmpresa" => $_SESSION["corporate"]->codEmpresa
		);

		if($this->funcionario->inserir($parametros)){
			$_SESSION["msg_ok"] = "Funcionário Cadastrado com Sucesso";
			redirect(base_url("index.php/funcionario"));
		}else{
			$_SESSION["msg_error"] = "Houve um erro no cadastro do Funcionário";
			redirect(base_url("index.php/funcionario"));
		}


	}
}