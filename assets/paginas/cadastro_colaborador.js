$(function(){

	//Seto as Máscaras
	$('#txtTelefone').mask('(00) 0000-0000');
	$('#txtCelular').mask('(00) 0 0000-0000');
	$('#txtValor').mask("#.##0,00", {reverse: true});

});