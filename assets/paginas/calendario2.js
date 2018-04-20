var codColaborador = 0;
var data = 0;
var $last = null;


var getStatus = function($codStatus){

	$ret = "";

	switch($codStatus){
		case 1000:
			$ret = "<span class='label label-danger'>CANCELADA</span>"; break;
		case 1001:
			$ret = "<span class='label label-success'>ATIVO</span>"; break;
		case 1002:
			$ret = "<span class='label label-warning'>EM ANDAMENTO</span>"; break;
		case 1003:
			$ret = "<span class='label label-primary'>FINALIZADO</span>"; break;
	}
	return $ret;

}

function buscarConsultas($codDoutor, $data){


	if(($codDoutor > 0) && (data.length > 0)){

		$.ajax({
	        url: "../ajax/getListaCompromissos",
	        method: "POST",
	        data: {
	        	"codColaborador": $codDoutor,
	        	"data" : $data
	        }
	    }).success(function (response) {

	    	$vet = JSON.parse(response);

	    	$("#tabela tbody tr").remove();
	    	$.each($vet,function($index, $value){
	    		$("#tabela tbody").append(
	    			$("<tr>").append(
						$("<td>").html("0000".substring(0, 4 - $value.codConsulta.length) + $value.codConsulta)
					).append(
						$("<td>").html($value.paciente)
					).append(
						$("<td>").html($value.data)
					).append(
						$("<td>").html(getStatus(parseInt($value.status)))
					)
				);
			});

			$("#div_lista_consultas").show('slow');
			$('html,body').animate({
        		scrollTop: $("#div_lista_consultas").offset().top},
        		'slow');
	    });
	}
}

$(function(){

	$("#div_lista_consultas").hide();

	$("#calendar").datepicker({
		weekStart: 0,
	    clearBtn: true,
	    language: "pt-br",
	}).on("changeDate", function(date){
		if($last != null)
			$last.css('background-color', '#FFF');

	    $(this).css('background-color', '#c2cdfc');
	    data = date.format();
	    $last = $(this);
	    buscarConsultas(codColaborador, date.format("yyyy-mm-dd").toString());
	});

	$(".novoCadastro").on("click", function(evt){
		evt.preventDefault();
		codColaborador = parseInt($(this).attr("cod"));
		buscarConsultas(codColaborador, data);
	});

	$(".datepicker-inline").addClass("datepicker-primary");

});