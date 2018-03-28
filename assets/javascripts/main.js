/*
function buscarConsultas($codDoutor, $data){
	$.ajax({
        url: "../ajax/getListaCompromissos",
        method: "POST",
        data: {
        	"codColaborador": $codDoutor,
        	"data" : $data
        }
    }).success(function (response) {

    	$("#lista_compromissos li").remove();

    	console.log(JSON.parse(response));
    	$vet = JSON.parse(response);

    	$.each($vet,function($index, $value){
    		$("#lista_compromissos").append(
				$("<li>").append(
					$("<time>")
						.attr("datetime", $value["data"])
						.html($value["data"])
				).append(
					$("<span>")
						.html($value["procedimento"] + " - " + $value["paciente"])
				)
			);
		});

    });
}
*/
$(function(){

	var codDoutor = 0;
	var data = "2018-03-24";

	$(".sidebar-right-toggle").hide();
	$(".page-header .right-wrapper").css("margin-right", "15px");

	$("#datatable").DataTable();

	$(".lnk_select_doctor").on("click", function(evt){
		
		evt.preventDefault();

		codDoutor = parseInt($(this).attr("codDoutor"));

		if(data != ""){
			aux = buscarConsultas(codDoutor, data);
		}

	});

});