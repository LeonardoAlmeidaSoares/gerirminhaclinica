$(function(){

	//Aplico as Máscaras nos campos
	$('#txtTelefone').mask('(00) 0000-0000');
	$('#txtCelular').mask('(00) 0 0000-0000');
	$('#txtSalario').mask("#.##0,00", {reverse: true});

	//Crio o campo datepicker
	$('#txtNascimento').datepicker({
		format: 'dd/mm/yyyy',
		language: "pt-BR"
	});

	/*Ativo o evento para a selecção de Estado e cidades*/
	$("#txtEstado").on("change", function(){

		$codEstado = $("#txtEstado :selected").val();

		$.ajax({
	        url: "../ajax/getListaCidades",
	        method: "POST",
	        data: {
	        	"codEstado": $codEstado
	        }
	    }).success(function (response) {
	    	$("#txtCidade option").remove();
	    	$vet = JSON.parse(response);
	    	$.each($vet,function($index, $value){
	    		$("#txtCidade").append(
	    			$("<option>")
	    				.val($value.codCidade)
	    				.html($value.descricao)

	    		);
	    	})
	    });

	});
});