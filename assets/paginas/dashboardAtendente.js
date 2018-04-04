$(function(){
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