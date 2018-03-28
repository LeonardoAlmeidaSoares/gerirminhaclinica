<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_procedimentos extends CI_Model {

        public function getProcedimentos($codEmpresa){
            return $this->db->get_where("procedimento", array("codEmpresa" => $codEmpresa));
        }

        public function getProcedimentosDetalhados($codEmpresa){
            return $this->db->select("c.*, e.nome as especialidade")
                ->from("procedimento c")
                ->join("especializacao e", "e.codEspecializacao = c.codEspecializacao")
                ->where("c.codEmpresa", $codEmpresa)
                ->order_by("e.nome, c.nome")
                ->get();
        }

        public function inserir($parametros){
            $this->db->where("status", STATUS_PLANO_ATIVO)->update("plano", array("status" => STATUS_PLANO_INCOMPLETO));
            return $this->db->insert("procedimento", $parametros);
        }

        public function getProcedimento($codProcedimento){
        	return $this->db->get_where("procedimento", array("codProcedimento" => $codProcedimento));
        }

        public function setarValor($parametros){
            $this->db->where("codPlano", $parametros["codPlano"])
                        ->where("codProcedimento", $parametros["codProcedimento"])
                        ->delete("procedimento_plano");
            return $this->db->insert("procedimento_plano", $parametros);
        }

        public function getValores($codProcedimento){
            return $this->db->get_where("procedimento_plano", array("codProcedimento" => $codProcedimento));
        }

        public function setarStatusProcedimento($codProcedimento, $codEmpresa){

            $dadosProc = $this->db->get_where("procedimento_plano", array("codProcedimento" => $codProcedimento));
            $dadosPlan = $this->db->get_where("plano", array("codEmpresa" => $codEmpresa, "status" => STATUS_PLANO_INCOMPLETO));

            if($dadosPlan->num_rows() == $dadosProc->num_rows()){
                $this->db->where("codProcedimento", $codProcedimento)->update("procedimento", array("status" => STATUS_SERVICO_ATIVO));
            }

        }

    }