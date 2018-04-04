<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clinica extends CI_Controller {

	function __construct(){
		parent::__construct();

		session_start();

		if(!isset($_SESSION["corporate"])){
			redirect(base_url("index.php/login/"));
		}

	}

	public function index()
	{

		$this->load->Model("Model_clientes", "clientes");
		$this->load->Model("Model_consultas", "consulta");
		$this->load->Model("Model_conta_pagar", "contas_pagar");
		$this->load->Model("Model_conta_receber", "contas_receber");

		$parametros = array(
			//Itens do painel superior
			"total_clientes" => $this->clientes->getClientes($_SESSION["corporate"]->codEmpresa)->num_rows(),
			"total_contas_pagar_vencendo" => $this->contas_pagar->getContas($_SESSION["corporate"]->codEmpresa, STATUS_CONTA_PAGAR_ATRASADA)->num_rows(),
			"total_contas_receber_vencendo" => $this->contas_receber->getContas($_SESSION["corporate"]->codEmpresa, STATUS_CONTA_RECEBER_ATRASADA)->num_rows(),

			//Lista de Consultas Pendentes
			"lista_consultas" => $this->consulta->getConsultas($_SESSION["corporate"]->codEmpresa,0,date("Y-m-d"), STATUS_CONSULTA_ATIVA)
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('dashboard/dashboard_atendente', $parametros);
		$this->load->view('inc/barra_lateral', array("colaboradores" => $this->colab->getColaboradores($_SESSION["corporate"]->codEmpresa)));
		$this->load->view('inc/rodape');
	}
}