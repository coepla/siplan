function cargar_variables(v){
    'use strict';
    console.log(v);
    if (v == 1 || v == 2 || v == 3 || v == 5 || v == 7 || v == 8 || v == 9 || v == 11){
        document.getElementById('variables').innerHTML = "<label for='var1'>Nombre de variable 1:</label><input type='text' id='var1' name='var1' class='form-control'  required><label for='var2'>Nombre de variable 2:</label><input type='text' id='var2' name='var2' class='form-control'  required>";
    }

    if (v == 4){
        document.getElementById('variables').innerHTML = "<label for='var1'>Nombre de variable 1:</label><input type='text' id='var1' name='var1' class='form-control'  required><label for='var2'>Nombre de variable 2:</label><input type='text' id='var2' name='var2' class='form-control'  required><label for='var3'>Nombre de variable 3:</label><input type='text' id='var3' name='var3' class='form-control'  required>";
    }

      if (v == 6){
        document.getElementById('variables').innerHTML = "<label for='var1'>Nombre de variable 1:</label><input type='text' id='var1' name='var1' class='form-control'  required>";
    }

       if (v == 10){
        document.getElementById('variables').innerHTML = "<label for='var1'>Nombre de variable 1:</label><input type='text' id='var1' name='var1' class='form-control'  required><label for='var2'>Nombre de variable 2:</label><input type='text' id='var2' name='var2' class='form-control'  required><label for='var3'>Nombre de variable 3:</label><input type='text' id='var3' name='var3' class='form-control'  required><label for='var4'>Nombre de variable 4:</label><input type='text' id='var4' name='var4' class='form-control'  required>";
    }

}

function guardar(){
  
   if(document.getElementById('var2')){ v2 = $('#var2').val(); }else{ v2 = ' '; }
   if(document.getElementById('var3')){ v3 = $('#var3').val(); }else{ v3 = ' '; }
   if(document.getElementById('var4')){ v4 = $('#var4').val(); }else{ v4 = ' '; }
   

     $.ajax({
        method: "POST",
        url: "clases/planeacion/indicadores.php",
        data: {
           accion: 'agregar',
           nivel_indicador:   '<?php echo $_GET['tipo']; ?>',
           proyecto: <?php echo $_GET['id_proyecto']; ?>,
           componente: <?php if(isset($_GET['id_componente'])){echo $_GET['id_componente']; }else{ echo 0; } ?>,
           actividad: <?php if(isset($_GET['id_actividad'])){echo $_GET['id_actividad']; }else{ echo 0; } ?>,
           nombre: $('#nombre').val(),
           objetivo: $('#objetivo').val(),
           formula: $('#formula').val(),
            var1: $('#var1').val(),
            var2: v2,
            var3: v3,
            var4: v4,
            var5: ' ',
            var6: ' ',
           tipo: $('#tipo').val(),
          dimension: $('#dimension').val(),
frecuencia: $('#frecuencia').val(),
sentido: $('#sentido').val(),
u_medida: $('#u_medida').val(),
meta: $('#meta').val(),
linea_base: $('#linea_base').val(),
verifica: $('#verifica').val(),
supuesto: $('#supuesto').val()   
      }
     })
        .done(function( msg ) {
        console.log(msg);
        alert( 'Se ha guardado correctamente el indicador' );
<?php
 if(isset($_GET['id_componente'])){$componente ="&id_componente=".$_GET['id_componente'];  }else{$componente="";}
 if(isset($_GET['id_actividad'])){$componente ="&id_actividad=".$_GET['id_actividad'];  }else{$actividad="";}
 echo "location.href = 'main.php?token=e4da3b7fbbce2345d7772b0674a318d5&id_proyecto=".$_GET['id_proyecto'].$componente.$actividad."';";

?>

    });
    
    return false;
}
