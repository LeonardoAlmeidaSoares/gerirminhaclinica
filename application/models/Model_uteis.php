<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_uteis extends CI_Model {

        public function converterDataParaMysql($data){
			return date('Y-m-d', strtotime(str_replace('/', '-', $data)));
        }

        public function getIdade($data){
        	return date_diff(date_create($data), date_create('today'))->y;
        }

    }