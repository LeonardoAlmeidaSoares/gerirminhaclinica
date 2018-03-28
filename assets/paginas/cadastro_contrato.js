var funcaoRemoveItens = function(){
	$this = $(this); 
	$this.parent().parent().parent().parent().prev().hide("slow");
	$this.parent().parent().parent().parent().hide("slow");
	/*
	numDependentes = numDependentes - 1;

	if(numDependentes > 0){
		valorTotal += (numDependentes - numDependentesPossiveisSemCobranca) * valorDependenteExtra;
	}
	
	*/
}

$(function(){

	var numDependentes = 0;
	var valorTotal = 0;
	var numDependentesPossiveisSemCobranca = 0;
	var valorDependenteExtra = 0;

	var options = {
        symbol: "",
        decimal: ",",
        thousand: ".",
        precision: 2,
        format: "%s%v"
    };

	//Aplico as máscaras nos campos
	$("#txtValorTotal").mask("#.##0,00", {reverse: true});

	//Instancio o CKEDITOR
	CKEDITOR.replace("txtObs");

	//Crio os campos datepicker
	$('#txtDataInicio').datepicker({
		format: 'dd/mm/yyyy',
		language: "pt-BR"
	});
	
	$('#txtDataFim').datepicker({
		format: 'dd/mm/yyyy',
		language: "pt-BR"
	});

	$("#btnAddDependent").on("click", function(evt){
		
		evt.preventDefault();

		if(parseInt($("#txtPlano :selected").val()) <= 0){
			alert("Selecione antes o Plano");
			return;
		}

		numDependentes = numDependentes + 1;

		if(numDependentes > numDependentesPossiveisSemCobranca){
			valorTotal += valorDependenteExtra;
			$("#txtValorTotal").val(accounting.formatMoney(valorTotal, options));
		}

		$("#div_add_dependent").append(
			$("<hr />")
		).append(
			$("<fieldset>").append(
				$("<div>").addClass("row").append(
					$("<div>").addClass("col-sm-4").append(
						$("<div>").addClass("form-group").append(
							$("<label>").addClass("control-label").html("Nome")
						).append(
							$("<input>").addClass("form-control").attr("type","text").attr("id","txtNomeDependente_" + numDependentes).attr("name","txtNomeDependente_" + numDependentes)
						)		
					)
				).append(
					$("<div>").addClass("col-sm-4").append(
						$("<div>").addClass("form-group").append(
							$("<label>").addClass("control-label").html("Parentesco")
						).append(
							$("<input>").addClass("form-control").attr("type","text").attr("id","txtParentescoDependente_" + numDependentes).attr("name","txtParentescoDependente_" + numDependentes)
						)		
					)
				).append(
					$("<div>").addClass("col-sm-4").append(
						$("<div>").addClass("form-group").append(
							$("<label>").addClass("control-label").html("Escolaridade")
						).append(
							$("<input>").addClass("form-control").attr("type","text").attr("id","txtEscolaridadeDependente_" + numDependentes).attr("name","txtEscolaridadeDependente_" + numDependentes)
						)		
					)
				).append(
					$("<div>").addClass("col-sm-4").append(
						$("<div>").addClass("form-group").append(
							$("<label>").addClass("control-label").html("Identidade")
						).append(
							$("<input>").addClass("form-control").attr("type","text").attr("id","txtIdentidadeDependente_" + numDependentes).attr("name","txtIdentidadeDependente_" + numDependentes)
						)		
					)
				).append(
					$("<div>").addClass("col-sm-4").append(
						$("<div>").addClass("form-group").append(
							$("<label>").addClass("control-label").html("CPF")
						).append(
							$("<input>").addClass("form-control").attr("type","text").attr("id","txtCPFDependente_" + numDependentes).attr("name","txtCPFDependente_" + numDependentes)
						)		
					)
				).append(
					$("<div>").addClass("col-sm-4").append(
						$("<div>").addClass("form-group").append(
							$("<label>").addClass("control-label").html("Nascimento")
						).append(
							$("<input>").addClass("form-control").attr("type","text").attr("id","txtNascimentoDependente_" + numDependentes).attr("name","txtNascimentoDependente_" + numDependentes)
						)		
					)
				).append(
					$("<div>").addClass("col-sm-12").append(
						$("<div>").addClass("form-group").append(
							$("<a>").addClass("btn btn-warning remove").on("click", funcaoRemoveItens).html("REMOVER")
						)
					)
				)

			)
		);

		$('#txtCPFDependente_' + numDependentes).mask('000.000.000-00');

		$('#txtNascimentoDependente_' + numDependentes).datepicker({
			format: 'dd/mm/yyyy',
			language: "pt-BR"
		});

	});


	$("#txtPlano").on("change", function(){
		
		$codPlano = parseInt($("#txtPlano :selected").val());

		$.ajax({
	        url: "../../ajax/getDadosPlano",
	        method: "POST",
	        data: {
	        	"codPlano": $codPlano
	        }
	    }).success(function (response) {
	    	valorTotal = parseFloat(JSON.parse(response)[0].valor);
	    	numDependentesPossiveisSemCobranca = parseInt(JSON.parse(response)[0].numeroDependentes);
	    	valorDependenteExtra = parseFloat(JSON.parse(response)[0].valorDependente);

	    	if(numDependentes > 0){
	    		valorTotal += (numDependentes - numDependentesPossiveisSemCobranca) * valorDependenteExtra;
	    	}

	    	$("#txtValorTotal").val(accounting.formatMoney(valorTotal, options));
	    });

	});
});