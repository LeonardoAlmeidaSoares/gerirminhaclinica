<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function getListaCidades()
	{

		$codEstado = intval(trim(filter_input(INPUT_POST, "codEstado")));

		$ret = $this->db->get_where("cidade", array("codEstado" => $codEstado));

		echo json_encode($ret->result_array());
	}
}