<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_login extends CI_Model {

     
    	public function entrar($parametros){

    		$ret = $this->db->get_where("usuario", $parametros);

    		if($ret->num_rows() == 0){
    			
    			return false;
    		
    		} else {

    			$dadosUsuario = $ret->row(0);

    			$vetorRetorno = array(
    				"dadosUsuario" => $ret->row(0),
    				"dadosEmpresa" => $this->db->get_where("empresa", array("codEmpresa" => $dadosUsuario->codEmpresa))->row(0)
    			);

    			return $vetorRetorno;

    		}

    	}


    }