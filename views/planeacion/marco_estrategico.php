<?php
// sesion seguridad
$consulta_marco = "SELECT * FROM marco_estrategico WHERE id_dependencia = ".$_SESSION['id_dependencia'];
$res_consulta = mysql_query($consulta_marco,$siplan_data_conn) or die (mysql_error());
$info_consulta = mysql_fetch_array($res_consulta);
$encontrado = mysql_num_rows($res_consulta);
?>
<script type="text/javascript">  
function regresar() {
alert("no se realizaron cambios");
window.location = "main.php?token=<?php echo md5(1); ?>";
}
function guardar(){
document.marco_estrategico.submit();
}
</script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SIPLAN 2019<br>
        <small> Programas Presupuestarios</small>
      </h1>

    </section>

    <section class="content">
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Marco Estratégico - <small>DEP_ACRO</small></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <ul class="nav nav-pills">
<li><a href="main.php?token=<?php echo md5(1); ?>"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Programas Presupuestarios</a></li>
<li><a href="rpts/marco_estrategico.php" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;Imprimir</a></li>
</ul> 
<form id="marco_estrategico" name="marco_estrategico" method="post" action="main.php?token=<?php echo md5(3); ?>">




<h3>Misi&oacute;n:</h3>
<textarea name="mision" cols="128" rows="3" id="mision"><?php echo $info_consulta["mision"]; ?></textarea>
<h3>Visi&oacute;n:</h3>
<textarea name="vision" cols="128" rows="3" id="vision"><?php echo $info_consulta["vision"]; ?></textarea>
<h3>Objetivo Estrat&eacute;gico:</h3>
<textarea name="objetivo" cols="128" rows="3"  id="objetivo"><?php echo $info_consulta["objetivo_estrategico"]; ?></textarea>

<h3>Actividades Sustantivas:</h3>
<textarea name="actividades" cols="128" rows="3"  id="actividades"><?php echo $info_consulta["activ_sustantivas"]; ?></textarea>

<input type="hidden" name="accion" id="accion" value="<?php  if ($info_consulta["id_dependencia"]!="") { echo "1";}else { echo "0";}?>" />

</form>
<ul class="nav nav-pills">
<li><a href="javascript:guardar()"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Guardar</a></li>
<li><a href="javascript:regresar()"><span class="glyphicon glyphicon-floppy-remove"></span>&nbsp;Cancelar</a></li>
</ul> 

<i class="icon-dropbox"></i>
            </div>
 </div></div>           
