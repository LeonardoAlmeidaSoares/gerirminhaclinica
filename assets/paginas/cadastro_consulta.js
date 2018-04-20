
function getValor($codCliente, $codProcedimento){

	var options = {
        symbol: "",
        decimal: ",",
        thousand: ".",
        precision: 2,
        format: "%s%v"
    };

	$.ajax({
        url: "../../index.php/ajax/getValorProcedimento",
        method: "POST",
        data: {
        	"codProcedimento": $codProcedimento,
        	"codDependente" : $codCliente
        }
    }).success(function (response) {
    	var $vet = JSON.parse(response);

    	$("#txtValor").val(accounting.formatMoney($vet[0].valor, options));
    	$("#txtPlano").val($vet[0].codPlano)

    });
}


jQuery.datetimepicker.setLocale('pt-BR');

$(function(){


	$("#txtHorario").datetimepicker({
	 	format:'d/m/Y H:i'
	});
	

	var $codProcedimento = 0;
	var $codCliente = 0;

	$("#txtProcedimento").on("change", function(){
		
		$codProcedimento = parseInt($("#txtProcedimento :selected").val());

		if($codCliente > 0){
			getValor($codCliente, $codProcedimento);
		}

	});

	$("#txtDependente").on("change", function(){
		
		$codCliente = parseInt($("#txtDependente :selected").val());

		if($codProcedimento > 0){
			getValor($codCliente, $codProcedimento);
		}

	});

	
	
});