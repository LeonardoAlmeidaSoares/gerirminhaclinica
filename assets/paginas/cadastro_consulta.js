
function getValor($codCliente, $codProcedimento){
	$.ajax({
        url: "../../ajax/getValorProcedimento",
        method: "POST",
        data: {
        	"codProcedimento": $codProcedimento,
        	"codDependente" : $codCliente
        }
    }).success(function (response) {
    	console.log(response);

    	var $vet = JSON.parse(response);

    	$("#txtValor").val($vet[0].valor);
    	$("#txtPlano").val(vet[0].codPlano)

    });
}

$(function(){
	
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