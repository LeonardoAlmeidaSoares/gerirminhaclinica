$(function(){

	listaDiasColaboradorAtende = null;

	$(".list_calendar").hide();
	$("#calendario_0").show();

	$("#txtCodColaborador").on("change", function(){
		var codigo = parseInt($("#txtCodColaborador :selected").val());
    	$(".list_calendar").hide("slow");
    	if(codigo > 0){
	    	$("#calendario_"+ codigo).show("slow");
    	}
	});

	$(".btn-start").on("click", function(evt){

		evt.preventDefault();

		$this = $(this);
		$codConsulta = $this.attr("cod");

		$.ajax({
	        url: "index.php/ajax/alterarStatusConsulta",
	        method: "POST",
	        data: {
	        	"codConsulta": $codConsulta,
	        	"status" : 1002
	        }
	    }).success(function (response) {
	    	$this.parent().parent().css("background-color", "#F0E68C");
	    	swal('Parábens','Paciente entrou para a consulta','success');
	    });

		$this.hide('slow');

	});

	$(".btn-stop").on("click", function(evt){

		evt.preventDefault();

		$this = $(this);
		$codConsulta = $this.attr("cod");
		
		$.ajax({
	        url: "index.php/ajax/alterarStatusConsulta",
	        method: "POST",
	        data: {
	        	"codConsulta": $codConsulta,
	        	"status" : 1004
	        }
	    }).success(function (response) {
	    	swal('Parábens','Paciente finalizou a consulta','success');
	    });

		$this.parent().parent().hide('slow');

	})
});