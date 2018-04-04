<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_especializacoes extends CI_Model {

        public function getEspecializacoes($codEmpresa){
            return $this->db->get_where("especializacao", array("codEmpresa" => $codEmpresa));
        }

        public function inserir($parametros){
        	return $this->db->insert("especializacao", $parametros);
        }

        public function getEspecializacao($codEspecializacao){
        	return $this->db->get_where("especializacao", array("codEspecializacao" => $codEspecializacao));
        }

        public function alterar($parametros, $codigo){
            return $this->db->where("codEspecializacao", $codigo)->update("especializacao", $parametros);
        }

    }