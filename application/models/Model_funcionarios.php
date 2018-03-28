<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_funcionarios extends CI_Model {

        public function getFuncionarios($codEmpresa){
            return $this->db->select("f.*, c.descricao as cargo")
            ->from("funcionario f")
            ->join("cargo c", "c.codCargo = f.codCargo")
            ->where("f.codEmpresa",$codEmpresa)
            ->get();
        }

        public function inserir($parametros){
        	return $this->db->insert("funcionario", $parametros);
        }

        public function getFuncionario($codFuncionario){
        	return $this->db->get_where("funcionario", array("codFuncionario" => $codFuncionario));
        }

    }