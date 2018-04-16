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

        public function getConsultasDetalhado($codEmpresa, $codColaborador = 0){
            $this->db->select("c.*, p.nome as procedimento, d.nome as paciente, col.nome as colaborador, p.tempo_estimado as tempo");
            $this->db->from("consulta c");
            $this->db->join("dependente d", "d.codDependente = c.codDependente");
            $this->db->join("procedimento p", "p.codProcedimento = c.codProcedimento");
            $this->db->join("colaborador col", "col.codColaborador = c.codColaborador");
            $this->db->where("c.codEmpresa", $codEmpresa);
            if($codColaborador > 0){
                $this->db->where("c.codColaborador", $codColaborador);
            }
            $this->db->order_by("data");
            return $this->db->get();
        }

        public function getConsultas($codEmpresa, $codColaborador = 0, $data = null, $status = null){

            $this->db->select("c.*, p.nome as procedimento, d.nome as paciente, col.nome as colaborador");
            $this->db->from("consulta c");
            $this->db->join("dependente d", "d.codDependente = c.codDependente");
            $this->db->join("procedimento p", "p.codProcedimento = c.codProcedimento");
            $this->db->join("colaborador col", "col.codColaborador = c.codColaborador");
            $this->db->where("c.codEmpresa", $codEmpresa);
            if(!is_null($status)){
                if(!is_array($status))
                    $this->db->where("c.status", $status);
                else {
                    $i = 1;
                    $this->db->group_start();
                    $this->db->where("c.status", $status[0], FALSE);
                    while($i < count($status)){
                        $this->db->or_where("c.status", $status[$i++], count($status) == $i);
                    }
                    $this->db->group_end();
                }
            }
            if($codColaborador > 0){
                $this->db->where("c.codColaborador", $codColaborador);
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