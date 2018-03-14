<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_planos extends CI_Model {

        public function getPlanos($codEmpresa){
            return $this->db->get_where("plano", array("codEmpresa" => $codEmpresa, "status<>" => STATUS_PLANO_ATIVO));
        }

        public function inserir($parametros){
        	return $this->db->insert("plano", $parametros);
        }

        public function getPlano($codPlano){
        	return $this->db->get_where("plano", array("codPlano" => $codPlano));
        }

    }