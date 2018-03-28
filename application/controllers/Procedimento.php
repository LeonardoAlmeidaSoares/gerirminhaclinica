<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procedimento extends CI_Controller {

	function __construct(){
		parent::__construct();

        session_start();

        $this->load->Model("Model_procedimentos", "procedimentos");
	}

	public function index()
	{

		$parametros = array(
			"listagem" => $this->procedimentos->getProcedimentos($_SESSION["corporate"]->codEmpresa)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('procedimento/listagem', $parametros);
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
		$this->load->view('procedimento/cadastro', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');
	}

	public function add(){

		$parametros = array(
			"descricao" => trim(filter_input(INPUT_POST, "txtDescricao")),
			"nome" => trim(filter_input(INPUT_POST, "txtNome")),
			"codEspecializacao" =>trim(filter_input(INPUT_POST, "txtEspecializacao")),
			"status" => STATUS_SERVICO_AGUARDANDO_PREENCHIMENTO_VALORES,
			"codEmpresa" => $_SESSION["corporate"]->codEmpresa,
			"tempo_estimado" => intval(trim(filter_input(INPUT_POST, "txtTempo")))
		);

		if($this->procedimentos->inserir($parametros)){
			$_SESSION["msg_ok"] = "Procedimento Cadastrado com Sucesso";
			redirect(base_url("index.php/procedimento"));
		}else{
			$_SESSION["msg_error"] = "Houve um erro no cadastro do Procedimento";
			redirect(base_url("index.php/procedimento"));
		}


	}

	public function ajustarValores($codProcedimento){

		$this->load->Model("Model_planos", "planos");

		$parametros = array(
			"procedimento" => $this->procedimentos->getProcedimento($codProcedimento)->row(0),
			"planos" => $this->planos->getPlanos($_SESSION["corporate"]->codEmpresa),
			"valores" => $this->procedimentos->getValores($codProcedimento)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('procedimento/ajustar_valores', $parametros);
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodape');

	}

	public function setar_valores(){

		$this->load->Model("Model_planos", "planos");

		$parametros["codProcedimento"] = intval(trim(filter_input(INPUT_POST, "txtCodProcedimento")));

		foreach($_POST as $key=>$value){
			if(substr($key, 0, 4) == "txt_"){

				$parametros["codPlano"] = intval(explode("_",$key)[1]);
				$parametros["valor"] = doubleval(str_replace(",",".",$value));

				if($this->procedimentos->setarValor($parametros)){

					$this->procedimentos->setarStatusProcedimento($parametros["codProcedimento"], $_SESSION["corporate"]->codEmpresa);
					$this->planos->setarStatusPlano($parametros["codPlano"], $_SESSION["corporate"]->codEmpresa);

					$_SESSION["msg_ok"] = "Atualização Realizada Com Sucesso";

				}else{

					$_SESSION["msg_error"] = "Atualização Não Foi Feita, Consulte o Administrador";

				}

			
			}

		}

		redirect(base_url("index.php/procedimento/"));


	}
}