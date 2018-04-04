<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContaPagar extends CI_Controller {

	function __construct(){
		parent::__construct();

        session_start();

        $this->load->Model("Model_conta_pagar", "conta");
	}

	public function index()
	{

		$parametros = array(
			"listagem" => $this->conta->getContas($_SESSION["corporate"]->codEmpresa)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('conta_pagar/listagem', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');

	}

	public function atrasadas()
	{

		$parametros = array(
			"listagem" => $this->conta->getContas($_SESSION["corporate"]->codEmpresa, STATUS_CONTA_PAGAR_ATRASADA)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('conta_pagar/atrasadas', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');

	}

	public function novo(){

		$parametros = array(
			"tiposConta" => $this->conta->getTipos($_SESSION["corporate"]->codEmpresa)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('conta_pagar/cadastro', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');
	}

	public function add(){

		$parametros = array(
			"descricao" => trim(filter_input(INPUT_POST, "txtDescricao")),
			"valor" => doubleval(trim(str_replace(",",".",filter_input(INPUT_POST, "txtValor")))),
			"vencimento" => $this->uteis->converterDataParaMysql(trim(filter_input(INPUT_POST, "txtVencimento"))),
			"codTipoContaPagar" => intval(trim(filter_input(INPUT_POST, "txtTipoConta"))),
			"status" => intval(trim(filter_input(INPUT_POST, "txtStatus"))),
			"codEmpresa" => $_SESSION["corporate"]->codEmpresa
		);

		if($this->conta->inserir($parametros)){
			$_SESSION["msg_ok"] = "Conta a Pagar Cadastrada com Sucesso";
			redirect(base_url("index.php/contaPagar"));
		}else{
			$_SESSION["msg_error"] = "Houve um erro no cadastro da Conta a Pagar";
			redirect(base_url("index.php/contaPagar"));
		}
		
	}
}