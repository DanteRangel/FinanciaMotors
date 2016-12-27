   
$(document).ready(function(){
 
 
   $("input[type='radio']").each(toggleCheck_radio); 
    
 /* Esta funcion cambia la imagen a mostrar */
 /* (que se encuentra en el elemento padre */
 /* del check) ya sea si el checklist */
 /* está activo como si no lo está*/
 $('.check').click(function(){

      $("input[type='radio']").click(toggleCheck_radio);
      $("input[type='radio']").each(toggleCheck_radio);  
 });
});
 function toggleCheck_radio() {
   if ($(this).is(":checked")){

       $(this).parent().removeClass('clase_radio_verde disable');
       $(this).parent().addClass('clase_radio_verde checked'); 
   }else {
        $(this).parent().removeClass('clase_radio_verde checked'); 
       $(this).parent().addClass('clase_radio_verde disable');       
   }

 } 