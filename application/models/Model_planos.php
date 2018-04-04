<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_planos extends CI_Model {

        public function getPlanos($codEmpresa){
            return $this->db->get_where("plano", array("codEmpresa" => $codEmpresa, "status<>" => STATUS_PLANO_INATIVO));
        }

        public function inserir($parametros){
        	return $this->db->insert("plano", $parametros);
        }

        public function getPlano($codPlano){
        	return $this->db->get_where("plano", array("codPlano" => $codPlano))->row(0);
        }

        public function setarStatusPlano($codPlano, $codEmpresa){

            $dadosPlan = $this->db->get_where("procedimento_plano", array("codPlano" => $codPlano));
            $dadosProc = $this->db->get_where("procedimento", array("codEmpresa" => $codEmpresa, "status>" => STATUS_SERVICO_INATIVO));

            if($dadosProc->num_rows() == $dadosPlan->num_rows()){

                $this->db->where("codPlano", $codPlano)->update("plano", array("status" => STATUS_PLANO_ATIVO));
            }

        }

        public function alterar($parametros, $codigo){

            return $this->db->where("codPlano", $codigo)->update("plano", $parametros);

        }

    }