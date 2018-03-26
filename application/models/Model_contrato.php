<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_contrato extends CI_Model {

        public function inserir($parametros){
            $ret = $this->db->insert("contrato", $parametros);
            return $this->db->insert_id();
        }

        public function inserirDependente($parametros){
        	$ret = $this->db->insert("dependente", $parametros);
        	return $this->db->insert_id();
        }

        public function verificarExistencia($codCliente){

            $ret = $this->db->get_where("contrato", array("codCliente" => $codCliente));

            if($ret->num_rows() == 0){
                return null;
            } else {
                return $ret->row(0);
            }

        }

    }
