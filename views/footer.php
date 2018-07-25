<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.slimscroll.min.js?v1.0"></script>
<script src="js/fastclick.js"></script>
<script src="js/adminlte.min.js?v2.0"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<?php
//------- nuevo prog pres ----//
if(isset($_GET['token']) == md5(4)){
?>
<script src="js/icheck.min.js?v.1.0"></script>
<script src="js/planeacion/nuevo_pp.js?v=1.2"></script>
<script src="js/select2.full.min.js?v2.0"></script>

<script>
function validar(){
    // Checar que los campos no esten vacios y sean del tipo solicitado
    // esta funcion se require solamente para versiones anteriores a iexplorer 11 y navegadores que no soportan html5
    if( $('#no_proyecto').val().length < 1 || isNaN( $('#no_proyecto').val())){ alert('error en el numero de proyecto'); return false; }
    if( $('#nombre').val().lenght < 8 ){ alert('error en el nombre del proyecto'); return false;}
    if( $('#prog_pres').val().trim() === '') { alert('Debe seleccionar clasificacion programatica'); return false;}
    if( $('#u_responsable').val().lenght < 8 ){ alert('error en unidad responsable'); return false;}
    if( $('#titular').val().lenght < 8 ){ alert('error en el nombre del titular'); return false;}
    if( $('#eje').val().trim() === '') { alert('Debe seleccionar eje PED'); return false;}
    if( $('#linea').val().trim() === '') { alert('Debe seleccionar linea PED'); return false;}
    if( $('#estrategia').val().trim() === '') { alert('Debe seleccionar estrategia PED'); return false;}
    if( $('#pnd_eje').val().trim() === '') { alert('Debe seleccionar eje PND'); return false;}
    if( $('#pnd_objetivo').val().trim() === '') { alert('Debe seleccionar objetivo PND'); return false;}
    if( $('#pnd_estrategia').val().trim() === '') { alert('Debe seleccionar estrategia PND'); return false;}
    if( $('#pnd_linea').val().trim() === '') { alert('Debe seleccionar linea PND'); return false;}
    if( $('#ponderacion').val().length < 1 || isNaN( $('#ponderacion').val())){ alert('error en la ponderacion'); return false; }
    if( $('#proposito').val().lenght < 8 ){ alert('error en el proposito'); return false;}
    if( $('#diagnostico').val().lenght < 8 ){ alert('error en el diagnostico'); return false;}
    if( $('#gvulnerable').val().trim() === '') { alert('Debe seleccionar grupo vulnerable'); return false;}
    if( $('#ben_h').val().length < 1 || isNaN( $('#ben_h').val())){ alert('error en beneficiarios hombres'); return false; }
    if( $('#ben_m').val().length < 1 || isNaN( $('#ben_m').val())){ alert('error en beneficiarios mujeres'); return false; }
    if( $('#u_medida').val().lenght < 3 ){ alert('error en la unidad de medida'); return false;}
    if( $('#prog_anual').val().length < 1 || isNaN( $('#prog_anual').val())){ alert('error en programacion anual'); return false; }
    if( $('#p_semestral').val().length < 1 || isNaN( $('#p_semestral').val())){ alert('error en programacion semestral'); return false; }
    if( $('#finalidad').val().trim() === '') { alert('Debe seleccionar la finalidad'); return false;}
    if( $('#funcion').val().trim() === '') { alert('Debe seleccionar la funcion'); return false;}
    if( $('#subfuncion').val().trim() === '') { alert('Debe seleccionar la subfuncion'); return false;}
    return true;
}

function guardar(){
    console.log("called save");
    var validado = validar();
    if(validado){
        console.log("guardar");
    }
    return false;
}
</script>


<?php } ?>
