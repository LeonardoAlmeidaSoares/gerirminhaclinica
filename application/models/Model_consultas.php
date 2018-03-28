<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_consultas extends CI_Model {

        public function getConsulta($codConsulta){
            return $this->db->get_where("consulta", array("codConsulta" => $codConsulta));
        }

        public function inserir($parametros){
        	return $this->db->insert("consulta", $parametros);
        }

        public function getConsultas($codEmpresa, $codColaborador = 0, $data = null){

            $this->db->select("c.*, p.nome as procedimento, d.nome as paciente");
            $this->db->from("consulta c");
            $this->db->join("dependente d", "d.codDependente = c.codDependente");
            $this->db->join("procedimento p", "p.codProcedimento = c.codProcedimento");
            $this->db->where("c.codEmpresa", $codEmpresa);
            if($codColaborador > 0){
                $this->db->where("codColaborador", $codColaborador);
            }
            if(!is_null($data)){
                $this->db->where("DATE(data)", $data);
            }
            $this->db->order_by("data");
            return $this->db->get();
        
        }

        public function getConsultasEmpresa($codEmpresa){
            return $this->db->get_where("consulta", array("codEmpresa" => $codEmpresa));
        }

    }