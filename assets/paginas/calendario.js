var codColaborador = 0;
var data = 0;
var $last = null;

var initCalendar = function($calendar) {
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();

	$calendar.fullCalendar({
		header: {
			left: 'title',
			right: 'prev,today,next,basicDay,basicWeek,month'
		},

		timeFormat: 'h:mm',

		titleFormat: {
			month: 'MMMM YYYY',      // September 2009
		    week: "MMM d YYYY",      // Sep 13 2009
		    day: 'dddd, MMM d, YYYY' // Tuesday, Sep 8, 2009
		},

		themeButtonIcons: {
			prev: 'fa fa-caret-left',
			next: 'fa fa-caret-right',
		},

		dayClick: function(date, jsEvent, view) {
			if($last != null)
				$last.css('background-color', '#FFF');

		    $(this).css('background-color', '#c2cdfc');
		    data = date.format();
		    $last = $(this);
		    buscarConsultas(codColaborador, data);
		},

		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function(date, allDay) { // this function is called when something is dropped
			var $externalEvent = $(this);
			// retrieve the dropped element's stored Event Object
			var originalEventObject = $externalEvent.data('eventObject');

			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);

			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			copiedEventObject.className = $externalEvent.attr('data-event-class');

			// render the event on the calendar
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

			// is the "remove after drop" checkbox checked?
			if ($('#RemoveAfterDrop').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}

		}
	});

	// FIX INPUTS TO BOOTSTRAP VERSIONS
	var $calendarButtons = $calendar.find('.fc-header-right > span');
	$calendarButtons
		.filter('.fc-button-prev, .fc-button-today, .fc-button-next')
			.wrapAll('<div class="btn-group mt-sm mr-md mb-sm ml-sm"></div>')
			.parent()
			.after('<br class="hidden"/>');

	$calendarButtons
		.not('.fc-button-prev, .fc-button-today, .fc-button-next')
			.wrapAll('<div class="btn-group mb-sm mt-sm"></div>');

	$calendarButtons
		.attr({ 'class': 'btn btn-sm btn-default' });
};


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
	console.log($codStatus);
	return $ret;

}

function buscarConsultas($codDoutor, $data){

	if(($codDoutor > 0) && (data.length > 0)){

		$.ajax({
	        url: "ajax/getListaCompromissos",
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

			//var objDiv = document.getElementById("div_lista_consultas");
			//objDiv.scrollTop = objDiv.scrollHeight;
			
	    });
	}
}


$(function(){
	
	initCalendar($("#calendar"));

	$("#div_lista_consultas").hide();

	$(".novoCadastro").on("click", function(evt){
		evt.preventDefault();
		codColaborador = parseInt($(this).attr("cod"));
		buscarConsultas(codColaborador, data);
	});

});