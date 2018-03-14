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
			"nascimento" => trim(filter_input(INPUT_POST, "txtNascimento")),
			"nome_pai" => trim(filter_input(INPUT_POST, "txtPai")),
			"nome_mae" => trim(filter_input(INPUT_POST, "txtMae")),
			"escolaridade" => trim(filter_input(INPUT_POST, "txtEscolaridade")),
			"codEmpresa" => intval($_SESSION["corporate"]->codEmpresa)
		);

		$codCliente = $this->cliente->inserir($parametrosCliente);

		//Cadastro do Contrato

		$parametrosContrato = array(
			"codCliente" => $codCliente,
			"codPlano" => intval(trim(filter_input(INPUT_POST, "txtPlano"))),
			"dataFinal" => $this->uteis->converterDataParaMysql(trim(filter_input(INPUT_POST, "txtDataFim"))),
			"dataInicio" => $this->uteis->converterDataParaMysql(trim(filter_input(INPUT_POST, "txtDataInicio"))),
			"status" => STATUS_CLIENTE_ATIVO,
			"obs" => trim(filter_input(INPUT_POST, "txtObs")),
			"codUsuario" => intval(trim($_SESSION["user"]->codUsuario)),
			"codEmpresa" => intval($_SESSION["corporate"]->codEmpresa)
		);

		//Insiro o contrato
		$codContrato = $this->contrato->inserir($parametrosContrato);
		$dadosPlano = $this->planos->getPlano($parametrosContrato["codPlano"]);
		/*
		$parametrosContaReceber = array(
			"descricao" => "Cadastro de Contrato",
			"observação" => "Conta gerada automaticamente pela aquisição do cliente ao plano " . $dadosPlano->row(0)->descricao,
			"dataVencimento" => "",
			"codTipoContaReceber" => 0,
			"codCliente" => $codCliente,
			"valor" => $dadosPlano->row(0)->valor,
			""
		);
		*/
		//$parametrosContaReceber["dataVencimento"] = strtotime('+1 days', strtotime();
		$_SESSION["msg_ok"] = "Cadastro Realizado com Sucesso";
		redirect(base_url("index.php/cliente/"));

	}
}
