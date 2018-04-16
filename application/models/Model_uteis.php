<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Model_uteis extends CI_Model {

        public function getRetanguloDashboard($class, $label, $icon, $link, $value){
            return "<div class=\"col-md-6 col-xl-12\">
                        <section class='panel'>
                            <div class='panel-body $class'>
                                <div class='widget-summary'>
                                    <div class='widget-summary-col widget-summary-col-icon'>
                                        <div class='summary-icon'>
                                            <i class='$icon'></i>
                                        </div>
                                    </div>
                                    <div class='widget-summary-col'>
                                        <div class='summary'>
                                            <h4 class='title'>$label</h4>
                                            <div class='info'>
                                                <strong class='amount'>" . str_pad($value, 4, '0', STR_PAD_LEFT) . "</strong>
                                            </div>
                                        </div>
                                        <div class='summary-footer'>
                                            <a class='text-uppercase' href='$link'>(VISUALIZAR TODOS)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>";
        }

        public function converterDataParaMysql($data){
			return date('Y-m-d', strtotime(str_replace('/', '-', $data)));
        }

        public function converterTimestampParaMysql($data){
            return date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $data)));
        }

        public function getIdade($data){
        	return date_diff(date_create($data), date_create('today'))->y;
        }

        public function converterTimestampParaPtBr($data){
        	return date('d/m/Y H:i', strtotime(str_replace('-', '/', $data)));
        }

        public function converterDataParaPtBr($data){
        	return date('d/m/Y', strtotime(str_replace('-', '/', $data)));
        }

        public function getCidade($codCidade){
            return $this->db->select("c.descricao as cidade, e.nome as estado")
                        ->from("cidade c")
                        ->join("estado e", "e.codEstado = c.codEstado")
                        ->where("c.codCidade", $codCidade)
                        ->get();
        }

        public function getEstadoECidade($codCidade){

            $aux = $this->db->get_where("cidade", array("codCidade" => $codCidade));

            $ret["cidades"] = $this->db->get_where("cidade", array("codEstado" => $aux->row(0)->codEstado));
            $ret["cidadeSelecionada"] = $codCidade;
            $ret["codEstado"] = $aux->row(0)->codEstado;

            return $ret;

        }

        public function getFileContents($filename){
            $striped_content = read_file($filename);

             return $striped_content;
        }

        public function aprontaHorario($horario){

            $CI =& get_instance();

            $vet = explode(" ", $horario);
            $ret =$vet[0] . " " . $vet[1];
            $ret = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $ret)));
            //$ret .= $vet[1];


            return $ret;

        }

    }