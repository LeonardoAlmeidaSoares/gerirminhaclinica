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
		$this->load->view('inc/header');
		$this->load->view('inc/barra_superior');
		$this->load->view('inc/menu_lateral');
		$this->load->view('welcome_message');
		//$this->load->view('inc/barra_lateral');
		$this->load->view('inc/rodapeDashboard');
	}
}
