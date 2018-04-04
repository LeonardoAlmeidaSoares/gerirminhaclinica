<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	function __construct(){
		parent::__construct();

        session_start();

        $this->load->Model("Model_clientes", "cliente");
	}

	public function index()
	{

		$parametros = array(
			"listagem" => $this->cliente->getClientes($_SESSION["corporate"]->codEmpresa)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('cliente/listagem', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');

	}

	public function novo()
	{

		$this->load->Model("Model_planos", "planos");

		$parametros = array(
			"estados" => $this->db->get("estado"),
			"paises" => $this->db->get("pais"),
			"planos" => $this->planos->getPlanos($_SESSION["corporate"]->codEmpresa)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('cliente/cadastro', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');

	}

	public function add(){

		//Carrego os Models necessários
		$this->load->Model("Model_contrato", "contrato");
		$this->load->Model("Model_planos", "planos");

		//Dados de Cadastro de Cliente

		$parametrosCliente = array(
			"nome" => trim(filter_input(INPUT_POST, "txtNome")),
			"logradouro" => trim(filter_input(INPUT_POST, "txtLogradouro")),
			"numero" => trim(filter_input(INPUT_POST, "txtNumero")),
			"bairro" => trim(filter_input(INPUT_POST, "txtBairro")),
			"cep" => trim(filter_input(INPUT_POST, "txtCep")),
			"complemento" => trim(filter_input(INPUT_POST, "txtComplemento")),
			"nascimento" => $this->uteis->converterDataParaMysql(filter_input(INPUT_POST, "txtNascimento")),
			"telefone" => trim(filter_input(INPUT_POST, "txtTelefone")),
			"celular" => trim(filter_input(INPUT_POST, "txtCelular")),
			"cpf" => trim(filter_input(INPUT_POST, "txtCpf")),
			"rg" => trim(filter_input(INPUT_POST, "txtIdentidade")),
			"profissao" => trim(filter_input(INPUT_POST, "txtProfissao")),
			"nacionalidade" => trim(filter_input(INPUT_POST, "txtNacionalidade")),
			"nome_pai" => trim(filter_input(INPUT_POST, "txtPai")),
			"email" => trim(filter_input(INPUT_POST, "txtEmail")),
			"nome_mae" => trim(filter_input(INPUT_POST, "txtMae")),
			"escolaridade" => trim(filter_input(INPUT_POST, "txtEscolaridade")),
			"codEmpresa" => intval($_SESSION["corporate"]->codEmpresa),
			"codCidade" => intval(trim(filter_input(INPUT_POST, "txtCidade")))
		);

		$codCliente = $this->cliente->inserir($parametrosCliente);

		$_SESSION["msg_ok"] = "Cadastro Realizado com Sucesso";
		redirect(base_url("index.php/contrato/contrato/$codCliente"));

	}

	public function edit($cod)
	{

		$this->load->Model("Model_planos", "planos");

		$parametros = array(
			"estados" => $this->db->get("estado"),
			"paises" => $this->db->get("pais"),
			"planos" => $this->planos->getPlanos($_SESSION["corporate"]->codEmpresa),
			"dados" => $this->cliente->getCliente($cod)->row(0)
		);

		$parametros["cidades"] = $this->uteis->getEstadoECidade($parametros["dados"]->codCidade);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('cliente/editar', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');

	}

	public function update(){

		//Carrego os Models necessários
		$this->load->Model("Model_contrato", "contrato");
		$this->load->Model("Model_planos", "planos");

		$codigo = intval(trim(filter_input(INPUT_POST, "txtCodigo")));

		$parametrosCliente = array(
			"nome" => trim(filter_input(INPUT_POST, "txtNome")),
			"logradouro" => trim(filter_input(INPUT_POST, "txtLogradouro")),
			"numero" => trim(filter_input(INPUT_POST, "txtNumero")),
			"bairro" => trim(filter_input(INPUT_POST, "txtBairro")),
			"cep" => trim(filter_input(INPUT_POST, "txtCep")),
			"complemento" => trim(filter_input(INPUT_POST, "txtComplemento")),
			"nascimento" => $this->uteis->converterDataParaMysql(filter_input(INPUT_POST, "txtNascimento")),
			"telefone" => trim(filter_input(INPUT_POST, "txtTelefone")),
			"celular" => trim(filter_input(INPUT_POST, "txtCelular")),
			"cpf" => trim(filter_input(INPUT_POST, "txtCpf")),
			"rg" => trim(filter_input(INPUT_POST, "txtIdentidade")),
			"profissao" => trim(filter_input(INPUT_POST, "txtProfissao")),
			"nacionalidade" => trim(filter_input(INPUT_POST, "txtNacionalidade")),
			"nome_pai" => trim(filter_input(INPUT_POST, "txtPai")),
			"nome_mae" => trim(filter_input(INPUT_POST, "txtMae")),
			"email" => trim(filter_input(INPUT_POST, "txtEmail")),
			"escolaridade" => trim(filter_input(INPUT_POST, "txtEscolaridade")),
			"codEmpresa" => intval($_SESSION["corporate"]->codEmpresa),
			"codCidade" => intval(trim(filter_input(INPUT_POST, "txtCidade")))
		);

		if($this->cliente->alterar($parametrosCliente, $codigo)){
			$_SESSION["msg_ok"] = "Alteração Realizada com Sucesso";
		} else {
			$_SESSION["msg_error"] = "Houve um erro Durante a Alteração";
		}

		
		redirect(base_url("index.php/cliente/"));

	}
}
