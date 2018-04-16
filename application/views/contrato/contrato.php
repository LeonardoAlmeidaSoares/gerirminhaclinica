<?php 

function getEstadoCivil($cod){
		
	$ret = "";

	switch($cod){
		case STATUS_ESTADO_CIVIL_SOLTEIRO: 
			$ret = "Solteiro(a)"; break;
		case STATUS_ESTADO_CIVIL_CASADO: 
			$ret = "Casado(a)"; break;
		case STATUS_ESTADO_CIVIL_NOIVO: 
			$ret = "Noivo(a)"; break;
		case STATUS_ESTADO_CIVIL_VIÚVO: 
			$ret = "Viúvo(a)"; break;
		case STATUS_ESTADO_CIVIL_DIVORCIADO: 
			$ret = "Divorciado(a)"; break;
		case STATUS_ESTADO_CIVIL_SEPARADO: 
			$ret = "Separado(a)"; break;
		default: 
			$ret = "Indisponível"; break;
	}

	return $ret;
}

$contrato_subs = $contrato;

$contrato_subs = str_replace("__NOME_CLIENTE__", $dadosCliente["nome"], $contrato_subs);

$contrato_subs = str_replace("__NOME_PAIS__", "BRASIL", $contrato_subs);

$contrato_subs = str_replace("__PROFISSAO__", $dadosCliente["profissao"], $contrato_subs);

$contrato_subs = str_replace("__ESTADO_CIVIL__", getEstadoCivil($dadosCliente["estado_civil"]), $contrato_subs);

$contrato_subs = str_replace("__IDENTIDADE__", $dadosCliente["rg"], $contrato_subs);

$contrato_subs = str_replace("__CPF__", $dadosCliente["cpf"], $contrato_subs);

$contrato_subs = str_replace("__NASCIMENTO__", $dadosCliente["nascimento"], $contrato_subs);

$contrato_subs = str_replace("__NOME_MAE__", $dadosCliente["nome_mae"], $contrato_subs);

$contrato_subs = str_replace("__LOGRADOURO__", $dadosCliente["logradouro"], $contrato_subs);

$contrato_subs = str_replace("__NOME_CLIENTE__", $dadosCliente["numero"], $contrato_subs);

$contrato_subs = str_replace("__NUMERO__", $dadosCliente["numero"], $contrato_subs);

$contrato_subs = str_replace("__COMPLEMENTO__", (strlen($dadosCliente["complemento"]) > 0) ? $dadosCliente["complemento"] . ", " : "", $contrato_subs);

$contrato_subs = str_replace("__BAIRRO__", $dadosCliente["bairro"], $contrato_subs);

$contrato_subs = str_replace("__CEP__", $dadosCliente["cep"], $contrato_subs);

$contrato_subs = str_replace("__CIDADE__", $dadosCliente["cidade"], $contrato_subs);

$contrato_subs = str_replace("__ESTADO__", $dadosCliente["estado"], $contrato_subs);

$contrato_subs = str_replace("__TELEFONE_1__", $dadosCliente["telefone1"], $contrato_subs);

$contrato_subs = str_replace("__TELEFONE_2__", $dadosCliente["telefone2"], $contrato_subs);

echo $contrato_subs;
echo "<script>window.print();</script>";