<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();

		session_start();

	}

	public function index()
	{
		$this->load->view('paginas_comuns/login');
	}

	public function entrar(){

		$email = trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL));
		$senha = md5(trim(filter_input(INPUT_POST, "senha")));

		$this->load->Model("Model_login", "login");

		$retornoLogin = $this->login->entrar(array("email" => $email, "senha" => $senha, "status" => STATUS_CLIENTE_ATIVO));

		if($retornoLogin){
			$_SESSION["user"] = $retornoLogin["dadosUsuario"];
			$_SESSION["corporate"] = $retornoLogin["dadosEmpresa"];
			$_SESSION["msg_ok"] = "Login efetuado com sucesso";

			redirect(base_url("index.php/clinica/"));
		} else {
			$_SESSION["msg_erro"] = "Usuário ou senha incorretos";
			redirect(base_url("index.php/login/"));
		}

	}

	public function logoff(){

		$_SESSION["user"] = NULL;
		$_SESSION["corporate"] = NULL;

		redirect(base_url());
	}
}
