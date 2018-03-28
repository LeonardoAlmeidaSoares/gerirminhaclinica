<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_colaboradores extends CI_Model {

        public function getColaboradores($codEmpresa){
            return $this->db->select("c.*, e.nome as especializacao")
            ->from("colaborador c")
            ->join("especializacao e", "e.codEspecializacao = c.codEspecializacao")
            ->where("e.codEmpresa",$codEmpresa)
            ->where("status",STATUS_COLABORADOR_ATIVO)
            ->get();
        }

        public function inserir($parametros){
        	return $this->db->insert("colaborador", $parametros);
        }

        public function getPlano($codColaborador){
        	return $this->db->get_where("colaborador", array("codColaborador" => $codColaborador));
        }

    }