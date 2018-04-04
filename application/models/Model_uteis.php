<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_uteis extends CI_Model {

        public function converterDataParaMysql($data){
			return date('Y-m-d', strtotime(str_replace('/', '-', $data)));
        }

        public function converterTimestampParaMysql($data){
            return date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $data)));
        }

        public function getIdade($data){
        	return date_diff(date_create($data), date_create('today'))->y;
        }

        public function converterDataParaPtBr($data){
        	return date('d/m/Y H:i', strtotime(str_replace('-', '/', $data)));
        }

        public function getEstadoECidade($codCidade){

            $aux = $this->db->get_where("cidade", array("codCidade" => $codCidade));

            $ret["cidades"] = $this->db->get_where("cidade", array("codEstado" => $aux->row(0)->codEstado));
            $ret["cidadeSelecionada"] = $codCidade;
            $ret["codEstado"] = $aux->row(0)->codEstado;

            return $ret;

        }

    }