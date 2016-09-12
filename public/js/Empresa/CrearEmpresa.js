	 
  function AparcerElementos(){
    //  var cad=document.getElementById("TipoPermiso").value;
    
  if(document.getElementById("TipoPermiso").value=="Sin Permiso - Solo Empleado"){
    
        $("#password").hide('slow');
        $('#password').val("");
  }else{
        $("#password").show('slow');
  }
}
