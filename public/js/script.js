$(document).ready(function(){

	//desabilitar boton reportes.
	var btn = $("#repGen");
	$("select_evento").on('change',function(){
		if($(this).find('option:selected').text()=="-Seleccione un evento-"){
			btn.attr("disabled","disabled");
		}
		else{
			$("#repGen").attr('disabled',false);
		}
	}).change();
});