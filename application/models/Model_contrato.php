<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_contrato extends CI_Model {

        public function inserir($parametros){
            $ret = $this->db->insert("contrato", $parametros);
            return $this->db->insert_id();
        }

    }
