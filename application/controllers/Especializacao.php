<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Especializacao extends CI_Controller {

	function __construct(){
		parent::__construct();

        session_start();

        $this->load->Model("Model_especializacoes", "especializacao");
	}

	public function index()
	{

		$parametros = array(
			"listagem" => $this->especializacao->getEspecializacoes($_SESSION["corporate"]->codEmpresa)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('especializacao/listagem', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');

	}

	public function novo(){

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('especializacao/cadastro'/*, $parametros*/);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');
	}

	public function add(){

		$parametros = array(
			"nome" => trim(filter_input(INPUT_POST, "txtNome")),
			"descricao" => trim(filter_input(INPUT_POST, "txtDescricao")),
			"codEmpresa" => $_SESSION["corporate"]->codEmpresa
		);

		if($this->especializacao->inserir($parametros)){
			$_SESSION["msg_ok"] = "Especialização Cadastrada com Sucesso";
			redirect(base_url("index.php/especializacao"));
		}else{
			$_SESSION["msg_error"] = "Houve um erro no cadastro do Especialização";
			redirect(base_url("index.php/especializacao"));
		}
	}

	public function edit($cod){

		$parametros = array(
			"dados" => $this->especializacao->getEspecializacao($cod)->row(0)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('especializacao/editar', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');
	}

	public function update(){

		$codigo = intval(trim(filter_input(INPUT_POST, "txtCodigo")));

		$parametros = array(
			"nome" => trim(filter_input(INPUT_POST, "txtNome")),
			"descricao" => trim(filter_input(INPUT_POST, "txtDescricao")),
			"codEmpresa" => $_SESSION["corporate"]->codEmpresa
		);

		if($this->especializacao->alterar($parametros, $codigo)){
			$_SESSION["msg_ok"] = "Especialização Alterada com Sucesso";
		}else{
			$_SESSION["msg_error"] = "Houve um erro na alteração do Especialização";
		}

		redirect(base_url("index.php/especializacao"));
	}
}