<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_conta_pagar extends CI_Model {

        public function getContas($codEmpresa, $status = 0){

            $parametros = array("codEmpresa" => $codEmpresa);

            if($status > 0){
                $parametros["status"] = $status;
            }

            return $this->db->get_where("conta_pagar", $parametros);
        }

        public function getContasAtrasadasOuVencendoHoje($codEmpresa){
            return $this->db->get_where("conta_pagar", array("codContaPagar" => $codConta));
        }

        public function inserir($parametros){
        	return $this->db->insert("conta_pagar", $parametros);
        }

        public function getContaPagar($codConta){
        	return $this->db->get_where("conta_pagar", array("codContaPagar" => $codConta));
        }

        public function getTipos($codEmpresa){
            return $this->db->get_where("tipo_conta_pagar", array("codEmpresa" => $codEmpresa));
        }


    }