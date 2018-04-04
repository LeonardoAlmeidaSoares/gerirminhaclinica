<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_conta_receber extends CI_Model {

        public function getContas($codEmpresa, $status = 0){

            $parametros = array("codEmpresa" => $codEmpresa);

            if($status > 0){
                $parametros["status"] = $status;
            }

            return $this->db->get_where("conta_receber", $parametros);
        }


        public function inserir($parametros){
        	return $this->db->insert("conta_receber", $parametros);
        }

        public function getContaPagar($codConta){
        	return $this->db->get_where("conta_receber", array("codContaReceber" => $codConta));
        }

        public function getTipos($codEmpresa){
            return $this->db->get_where("tipo_conta_receber", array("codEmpresa" => $codEmpresa));
        }

    }