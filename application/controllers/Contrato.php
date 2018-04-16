<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contrato extends CI_Controller {

	function __construct(){
		parent::__construct();

		session_start();

		if(!isset($_SESSION["corporate"])){
			redirect(base_url("index.php/login/"));
		}

		$this->load->Model("Model_contrato", "contrato");

	}

	public function termo_adesao($codCliente){
		$this->load->helper('file');

		$this->load->Model("Model_clientes", "clientes");
		$this->load->Model("Model_planos", "planos");

		$arquivo = base_url("assets/documents/1/documento_2.txt");

		$cliente = $this->clientes->getCliente($codCliente)->row(0);
		$cidade = $this->uteis->getCidade($cliente->codCidade)->row(0);

		$dadosCliente = array(
			"nome" => $cliente->nome,
			"profissao" => $cliente->profissao,
			"rg" => $cliente->rg,
			"cpf" => $cliente->cpf,
			"nascimento" => $this->uteis->converterDataParaPtBr($cliente->nascimento),
			"nome_mae" => $cliente->nome_mae,
			"logradouro" => $cliente->logradouro,
			"numero" => $cliente->numero,
			"complemento" => $cliente->complemento,
			"bairro" => $cliente->bairro,
			"cep" => $cliente->cep,
			"cidade" => $cidade->cidade,
			"estado" => $cidade->estado,
			"telefone1" => $cliente->telefone,
			"telefone2" => $cliente->celular,
			"estado_civil" => $cliente->estado_civil
		);

		$parametros = array(
			"dadosCliente" => $dadosCliente,
			"contrato" => $this->uteis->getFileContents($arquivo),
			"dependentes" => $this->clientes->getDependentes($codCliente)
		);

		//$this->load->view('inc/header');
		//$this->load->view('inc/barra_superior');
		//$this->load->view('inc/menu_lateral');
		$this->load->view('contrato/contrato', $parametros);
		//$this->load->view('inc/barra_lateral');
		//$this->load->view('inc/rodape');
	}

	public function contrato($codCliente)
	{

		$resultadosContrato = $this->contrato->verificarExistencia($codCliente);

		$this->load->Model("Model_clientes", "clientes");
		$this->load->Model("Model_planos", "planos");

		if(is_null($resultadosContrato)){

			$parametros = array(
				"dadosCliente" => $this->clientes->getCliente($codCliente)->row(0),
				"planos" => $this->planos->getPlanos($_SESSION["corporate"]->codEmpresa)
			);

			$this->load->view('inc/header');
			$this->load->view('inc/barra_superior');
			$this->load->view('inc/menu_lateral');
			$this->load->view('contrato/cadastro', $parametros);
			//$this->load->view('inc/barra_lateral');
			$this->load->view('inc/rodape');

		} else {

			$this->load->helper('file');

			$arquivo = base_url("assets/documents/1/documento_1.txt");

			$cliente = $this->clientes->getCliente($codCliente)->row(0);
			$cidade = $this->uteis->getCidade($cliente->codCidade)->row(0);

			$dadosCliente = array(
				"nome" => $cliente->nome,
				"profissao" => $cliente->profissao,
				"rg" => $cliente->rg,
				"cpf" => $cliente->cpf,
				"nascimento" => $this->uteis->converterDataParaPtBr($cliente->nascimento),
				"nome_mae" => $cliente->nome_mae,
				"logradouro" => $cliente->logradouro,
				"numero" => $cliente->numero,
				"complemento" => $cliente->complemento,
				"bairro" => $cliente->bairro,
				"cep" => $cliente->cep,
				"cidade" => $cidade->cidade,
				"estado" => $cidade->estado,
				"telefone1" => $cliente->telefone,
				"telefone2" => $cliente->celular,
				"estado_civil" => $cliente->estado_civil
			);

			$parametros = array(
				"dadosCliente" => $dadosCliente,
				"contrato" => $this->uteis->getFileContents($arquivo)
			);

			//$this->load->view('inc/header');
			//$this->load->view('inc/barra_superior');
			//$this->load->view('inc/menu_lateral');
			$this->load->view('contrato/contrato', $parametros);
			//$this->load->view('inc/barra_lateral');
			//$this->load->view('inc/rodape');
		}
	}

	public function add(){

		$this->load->Model("Model_clientes", "cliente");

		$parametrosContrato = array(
			"codCliente" => intval(trim(filter_input(INPUT_POST, "txtCodCliente"))),
			"codPlano" => intval(trim(filter_input(INPUT_POST, "txtPlano"))),
			"dataFinal" => $this->uteis->converterDataParaMysql(trim(filter_input(INPUT_POST, "txtDataFim"))),
			"dataInicio" => $this->uteis->converterDataParaMysql(trim(filter_input(INPUT_POST, "txtDataInicio"))),
			"obs" => trim(filter_input(INPUT_POST, "txtObs")),
			"valor" => doubleval(filter_input(INPUT_POST, "txtValorTotal")),
			"codUsuario" => intval(trim($_SESSION["user"]->codUsuario)),
			"codEmpresa" => intval($_SESSION["corporate"]->codEmpresa),
			"status" => STATUS_CLIENTE_ATIVO
		);

		$codContrato = $this->contrato->inserir($parametrosContrato);

		$dadosCliente = $this->cliente->getCliente($parametrosContrato["codCliente"])->row(0);

		$parametroDependente = array(
			"nome" => $dadosCliente->nome,
			"parentesco" => "CLIENTE",
			"rg" => $dadosCliente->rg,
			"cpf" => $dadosCliente->cpf,
			"nascimento" => $dadosCliente->nascimento,
			"escolaridade" => $dadosCliente->escolaridade,
			"codContrato" => $codContrato
		);

		$this->contrato->inserirDependente($parametroDependente);

		$contadorDeDependentes = 1;

		while(isset($_POST["txtNomeDependente_$contadorDeDependentes"])){

			$parametroDependente = array(
				"nome" => trim(filter_input(INPUT_POST, "txtNomeDependente_$contadorDeDependentes")),
				"parentesco" => trim(filter_input(INPUT_POST, "txtParentescoDependente_$contadorDeDependentes")),
				"rg" => trim(filter_input(INPUT_POST, "txtIdentidadeDependente_$contadorDeDependentes")),
				"cpf" => trim(filter_input(INPUT_POST, "txtCPFDependente_$contadorDeDependentes")),
				"nascimento" => $this->uteis->converterDataParaMysql(trim(filter_input(INPUT_POST, "txtNascimentoDependente_$contadorDeDependentes"))),
				"escolaridade" => trim(filter_input(INPUT_POST, "txtEscolaridadeDependente_$contadorDeDependentes")),
				"codContrato" => $codContrato
			);

			$this->contrato->inserirDependente($parametroDependente);

			$contadorDeDependentes++;

		}

		$_SESSION["msg_ok"] = "Contrato Cadastrado com Sucesso";
		redirect(base_url("index.php/cliente"));

	}

	public function getContrato($codCliente){

		$this->load->Model("Model_clientes", "clientes");

		$this->load->helper('file');

		$arquivo = base_url("assets/documents/1/documento_1.txt");

		$cliente = $this->clientes->getCliente($codCliente)->row(0);
		$cidade = $this->uteis->getCidade($cliente->codCidade)->row(0);

		$dadosCliente = array(
			"nome" => $cliente->nome,
			"profissao" => $cliente->profissao,
			"rg" => $cliente->rg,
			"cpf" => $cliente->cpf,
			"nascimento" => $this->uteis->converterDataParaPtBr($cliente->nascimento),
			"nome_mae" => $cliente->nome_mae,
			"logradouro" => $cliente->logradouro,
			"numero" => $cliente->numero,
			"complemento" => $cliente->complemento,
			"bairro" => $cliente->bairro,
			"cep" => $cliente->cep,
			"cidade" => $cidade->cidade,
			"estado" => $cidade->estado,
			"telefone1" => $cliente->telefone,
			"telefone2" => $cliente->celular
		);

		$parametros = array(
			"dadosCliente" => $dadosCliente,
			"contrato" => $this->uteis->getFileContents($arquivo)
		);

		//$this->load->view('inc/header');
		//$this->load->view('inc/barra_superior');
		//$this->load->view('inc/menu_lateral');
		$this->load->view('contrato/contrato', $parametros);
		//$this->load->view('inc/barra_lateral');
		//$this->load->view('inc/rodape');

	}
}
