<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContaReceber extends CI_Controller {

	function __construct(){
		parent::__construct();

        session_start();

        $this->load->Model("Model_conta_receber", "conta");
	}

	public function index()
	{

		$parametros = array(
			"listagem" => $this->conta->getContas($_SESSION["corporate"]->codEmpresa)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('conta_receber/listagem', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');

	}

	public function atrasadas()
	{

		$parametros = array(
			"listagem" => $this->conta->getContas($_SESSION["corporate"]->codEmpresa, STATUS_CONTA_RECEBER_ATRASADA)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('conta_receber/atrasadas', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');

	}

	public function novo(){

		$this->load->Model("Model_clientes", "clientes");

		$parametros = array(
			"tiposConta" => $this->conta->getTipos($_SESSION["corporate"]->codEmpresa),
			"clientes" => $this->clientes->getClientes($_SESSION["corporate"]->codEmpresa)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('conta_receber/cadastro', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');
	}

	public function add(){

		$parametros = array(
			"descricao" => trim(filter_input(INPUT_POST, "txtDescricao")),
			"valor" => doubleval(trim(str_replace(",",".",filter_input(INPUT_POST, "txtValor")))),
			"dataVencimento" => $this->uteis->converterDataParaMysql(trim(filter_input(INPUT_POST, "txtVencimento"))),
			"codTipoContaReceber" => intval(trim(filter_input(INPUT_POST, "txtTipoConta"))),
			"status" => intval(trim(filter_input(INPUT_POST, "txtStatus"))),
			"codEmpresa" => $_SESSION["corporate"]->codEmpresa,
			"codCliente" => intval(trim(filter_input(INPUT_POST, "txtCliente"))),
			"observacao" => trim(filter_input(INPUT_POST, "txtObs")),
			"responsavelCadastro" => intval($_SESSION["user"]->codUsuario)
		);
		
		if($this->conta->inserir($parametros)){
			$_SESSION["msg_ok"] = "Conta a Receber Cadastrada com Sucesso";
			redirect(base_url("index.php/contaReceber"));
		}else{
			$_SESSION["msg_error"] = "Houve um erro no cadastro da Conta a Receber";
			redirect(base_url("index.php/contaReceber"));
		}
		
	}
}