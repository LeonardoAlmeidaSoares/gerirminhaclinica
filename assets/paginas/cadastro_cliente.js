$(function(){
	//Seto o Brasil como padrão de Nacionalidade
	$("#txtNacionalidade").find('option[value="33"]').attr("selected",true);

	//Aplico as Máscaras nos campos
	$('#txtNascimento').mask('00/00/0000');
	$('#txtCpf').mask('000.000.000-00');
	$('#txtCep').mask('00.000-000');
	$('#txtTelefone').mask('(00) 0000-0000');
	$('#txtCelular').mask('(00) 0 0000-0000');

	//Aplico o CKEditor ao campo Observação
	CKEDITOR.replace("txtObs");

	//Crio os campos datepicker
	$('#txtDataInicio').datepicker();
	$('#txtDataFim').datepicker({
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
	    		console.log($index + " - " + $value);
	    		$("#txtCidade").append(
	    			$("<option>")
	    				.val($value.codCidade)
	    				.html($value.descricao)

	    		);
	    	})
	    });

	});

})