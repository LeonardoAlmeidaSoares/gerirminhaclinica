$(function(){

	CKEDITOR.replace("txtObs");

	$("#txtValor").mask("#.##0,00", {reverse: true});
	$("#txtVencimento").mask("99/99/9999");
});