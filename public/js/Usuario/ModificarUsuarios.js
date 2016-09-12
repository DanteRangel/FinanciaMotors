	$(document).ready(function() {

	$('#searchUser').focus();

	$('#searchUser').keyup(function(){

	   	$('#resultados').show('slow');
	   		$('#contenedor').hide('slow');
	   	if($('#searchUser').val().length < 0 || $('#searchUser').val()==""){
	
					$('#resultados').html('<h2 align="center">Reailza una Busqueda</h2>');

	   	}else{
		//var envio="searchUser="
		searchUser = $('#searchUser').val();
		
		var patt = new RegExp("eliminar");
		var URLactual = window.location.href;
		if(patt.test(URLactual)){
		envio="palabra="+searchUser+"&tipo=Eliminar";
		}else{
		envio="palabra="+searchUser+"&tipo=Modificar";
		}
		//var searchUser="searchUser="+envio+"&chk_todos="+chk_todos+"&chk_descripcion="+chk_descripcion+"&chk_noSerie="+chk_noSerie+"&chk_linea="+chk_linea),
		//var envio1={searchUser:envio,chk_linea:chk_linea,chk_descripcion:chk_descripcion,chk_todos:chk_todos,chk_noSerie:chk_noSerie};
		$('#resultados').html('<h2 align="center"><img src="../../images/cargando.gif" width="100" alt="" /> Cargando</h2>');

		$.ajax({
			type: 'GET',
			url: 'buscar',//admin/user/buscar  route
			data: envio,//'searchUser='+envio),			
			success: function(resp){
				if(resp!=""){

					$('#resultados').html(resp);
				}
			}
		})
		}
	});



$(".Modifica").click(function(){
            var Id=$(this).attr("data-id");
            var url='UserController/'+Id+"/edit";
                       $.ajax({
																            type: "GET",
																            url: url,
																            data:'',          
																            success: function(resp){
																                if(resp!=""){
																                    $("#contenedor").html(resp);
																                    $('#contenedor').show('slow');
																                    $('#resultados').hide('slow')
																                   
																                }
																            }
																        });

 
    });
$(".Eliminar").click(function(){
            var Id=$(this).attr("data-id");
            var url='UserController/'+Id;
            var _token=$(this).attr('data-token');

                $("#dialogeliminar").dialog({
							          modal: true,
							          buttons: {
							                "Sí": function() {
																 
																     $.ajax({
																            type: "DELETE",
																            url: url,
																            data:'_method=delete&_token='+_token,          
																            success: function(resp){
																                if(resp!=""){
																                    console.log(resp);
																                   
																                   	window.location=resp;
																                }
																            }
																        });

							               						     $( this ).dialog( "close" );
							                },
							                "No": function() {

							               						     $( this ).dialog( "close" );
							                }
							            }
      })
          

    });

	


});