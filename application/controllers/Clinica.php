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

		$parametros = array(
			//Itens do painel superior
			"total_clientes" => $this->clientes->getClientes($_SESSION["corporate"]->codEmpresa)->num_rows()
		);

		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('dashboard/dashboard_atendente', $parametros);
		$this->load->view('inc/barra_lateral', array("colaboradores" => $this->colab->getColaboradores($_SESSION["corporate"]->codEmpresa)));
		$this->load->view('inc/rodapeDashboard');
	}
}
