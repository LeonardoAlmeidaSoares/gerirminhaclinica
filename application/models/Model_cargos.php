<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_cargos extends CI_Model {

        public function getCargos($codEmpresa){
            return $this->db->get_where("cargo", array("codEmpresa" => $codEmpresa));
        }

        public function inserir($parametros){
        	return $this->db->insert("cargo", $parametros);
        }

        public function getCargo($codCargo){
        	return $this->db->get_where("cargo", array("codCargo" => $codCargo));
        }

    }