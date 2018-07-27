<?php
$conexion = $conn->conectar(1);
$consulta_marco = $conexion->query("SELECT HIGH_PRIORITY count(*) FROM marco_estrategico WHERE id_dependencia = ".$_SESSION['id_dependencia']." AND ejercicio = ".$_SESSION['ejercicio']);
$res_marco = $consulta_marco->fetch_array();
$conexion->close();
unset($conexion);
unset($consulta_marco);
if($res_marco[0]==0){
	echo "<script type='text/javascript'>
	   alert('Para aprobar sus Programas Presupuestarios primero debe completar el Marco Estrat\u00e9gico');
	</script>";
}
?>
<script type="text/JavaScript">
function eliminar_proyecto(a){
	r=confirm("\u00bf Desea eliminar el Programa Presupuestario?");
	if(r){
		location.href="main.php?token=<?php echo md5(27); ?>&id_proyecto="+a;
	}

}
function ponderacion_full(){
	alert("Ponderaci\u00f3n completa, elimine o edite otro(s) Programa(s) Presupuestario(s)")
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
<div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Listado de Programas Presupuestarios - <small>DEP_ACRO</small></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<ul class="nav nav-pills">
  <li><a href="main.php?token=<?php echo(md5(2));?>"><span class="glyphicon glyphicon-edit"></span>&nbsp;Marco Estrategico </a></li>
 <?php
    $conulta_pondera_proyectos = "SELECT HIGH_PRIORITY sum(ponderacion) FROM proyectos WHERE id_dependencia = ".$_SESSION['id_dependencia'];
    $conexion = $conn->conectar(1);
    $EjecutarConsulta = $conexion->query($conulta_pondera_proyectos);
    $res_pondera = $EjecutarConsulta->fetch_array();
    $conexion->close();
    unset($conexion);
    unset($EjecutarConsulta);
    if($res_pondera[0] >= 100){
?>
<li><a href="javascript:ponderacion_full()"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Programa Presupuestario</a></li>
<?php
}else{
?>
	<li><a href="main.php?token=<?php echo md5(4); ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Programa Presupuestario</a></li>
 <?php } unset($res_pondera); ?>


  <li><a href="rpts/general_proyectos.php" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;Imprimir</a></li>
  <li><a href="rpts/general_proyectos_xls.php" target="_blank"><span class="glyphicon glyphicon-export"></span>&nbsp;Exportar a XLS</a></li>
</ul> 
<hr>
<table id="example1" class="table table-bordered table-striped table-hover">
<thead>
<tr>
    <th><small>No.</small></th>    
	<th><small>Nombre</small></th>
    <th><small>PPP</small></th>
   
	<th><small>Estatus</small></th>
	<th><small>Indicadores</small></th>
	<th><small>Componentes</small></th>
	<th><small>Info.</small></th>    
	<?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>
    <th><small>Aprobar</small></th>
	<th><small>Editar</small></th>
	<th><small>Eliminar</small></th>
  <?php } ?>
    
    </tr>
  </thead>
  <tbody>
  <?php
    $conexion =$conn->conectar(1);
    $consulta_proyectos = $conexion->query("SELECT HIGH_PRIORITY
pr.id_proyecto as id_proyecto,
pr.no_proyecto as no_proyecto,
pr.nombre as nombre,
pr.clasificacion as clasificacion,
est.nombre as estrategia,
pr.ponderacion as ponderacion,
pr.estatus as estatus
FROM
proyectos as pr
inner join estrategias as est on(pr.id_estrategia = est.id_estrategia)
WHERE pr.id_dependencia =".$_SESSION['id_dependencia']);
      $conexion->close();
      unset($conexion);
      while ($resproyectos = $consulta_proyectos->fetch_assoc()) {
	    $id_proyecto= $resproyectos['id_proyecto'];
	    $status_proyecto = $resproyectos['estatus'];
        $conexion = $conn->conectar(1);
        $consulta_componentes = $conexion->query("SELECT HIGH_PRIORITY  sum(ponderacion) From componentes WHERE id_proyecto = ".$id_proyecto);
	  	$num_componentes = $consulta_componentes->fetch_array();
 	 	$consulta_indicadores = $conexion->query("call contar_indicadores_pp($id_proyecto)") or die("error linea 104".$conexion->error);
        $res_indicadores = $consulta_indicadores->fetch_array();
        $conexion->close();
        unset($conexion);
        $conexion = $conn->conectar(1);
		$consulta_componentes1 =$conexion->query("SELECT HIGH_PRIORITY id_componente FROM componentes WHERE id_proyecto = ".$id_proyecto);
		$num_componentes2 = $consulta_componentes1->fetch_array();
    	 
       $total_acciones =0;
    	$suma_accion =0;
		while($res_componente1 = $consulta_componentes1->fetch_array()){
                $consulta_accion1 = mysql_query("SELECT HIGH_PRIORITY sum(ponderacion) as suma FROM acciones WHERE id_componente = ".$res_componente1['id_componente'],$siplan_data_conn) or die("error linea 113: ".mysql_error());
				$res_accion1 = mysql_fetch_array($consulta_accion1);
				$suma_accion =$suma_accion+$res_accion1['suma'];
	
		}
	     switch ($resproyectos['estatus']){
		   case 0:
		   $status = '<span class="text text-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Sin aprobar</span>';
		   break;
		   case 1:
		   $status = '<span class="text text-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Aprob. Dep.</span>';
		   break;
		   case 2:
		   $status = '<span class="text text-success"><i class="fa fa-check-circle" aria-hidden="true"></i>Aprob. COEPLA</sapn>';
		   break;   
		   case 3:
		   $status = "Inactivo";
		   break; 
	   }

 if($num_componentes2 != 0){	 
  $max_Acc = 	$suma_accion/$num_componentes2;
  }
  ?>
 <tr>
    <td><?php echo $resproyectos['no_proyecto']; ?></td>
    <td><?php echo $resproyectos['nombre']; ?></td>
    <td><?php if($resproyectos['clasificacion'] == 1){echo '<span class="text text-success">  <i class="fa fa-check-circle" aria-hidden="true"></i> </span>'; }else{ echo "-"; }  ?></td>
    <td><?php echo $status; ?></td>
    <td valign="middle"><div align="center"><a href="main.php?token=<?php print(md5(5));?>&id_proyecto=<?php echo"$id_proyecto";?>"><span class="glyphicon glyphicon-stats"></span></a></div></td>
    <td valign="middle"><div align="center"><a href="main.php?token=<?php print(md5(13));?>&id_proyecto=<?php echo"$id_proyecto";?>"><span class="glyphicon glyphicon-list"></span></a></div></td>
    <td valign="middle"><div align="center"><a href="main.php?token=<?php print(md5(25));?>&id_proyecto=<?php echo"$id_proyecto";?>"><span class="glyphicon glyphicon-info-sign"></span></a></div></td>
    
    <?php  
 if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  
    if($status_proyecto==0 AND $num_componentes==100 AND $max_Acc==100 AND $res_indicadores>0 AND $res_marco>0){ 
        $status_proyecto = 3;
    }

    switch($status_proyecto){
    	case 1:
    	echo "<td valign='middle'><div align='center'><span class='glyphicon glyphicon-check'></div></td>";
    	break;
    	case 2:
    	echo "<td valign='middle'><div align='center'><span class='glyphicon glyphicon-ok-circle'></div></td>";
    	break;
    	case 3:
    	$status_proyecto=0;
    	print "<td valign='middle'><div align='center'><a href='main.php?token=".md5(91)."&id_proyecto=".$id_proyecto."'><span class='glyphicon glyphicon-ok-sign'></a></div></td>";
    	break;
    	default:
    	echo "<td valign='middle'><div align='center'> <span class='glyphicon glyphicon-minus'> </div></td>";
    	break;
    }
     
     if($status_proyecto==0){ ?>
    <td valign="middle"><div align="center"><a href="main.php?token=<?php print(md5(8));?>&id_proyecto=<?php echo"$id_proyecto";?>"><span class="glyphicon glyphicon-pencil"></span></a></div></td>
    <?php } ?>
    
    <?php if($status_proyecto != 0 ){ ?>
      <td valign="middle"><div align="center"><span class="glyphicon glyphicon-minus"></span> </div></td>	
    <?php } else {
         if($num_componentes[0] == 0){ ?>
             <td valign="middle"><div align="center">
             <a href="javascript:eliminar_proyecto('<?php echo"$id_proyecto";?>')"><span class="glyphicon glyphicon-trash text-danger"></span></a>
                 </div></td>     
     <?php }else{ ?>
             <td valign="middle"><div align="center">
             <span class="glyphicon glyphicon-minus">  </span>
                 </div></td>
        <?php }} ?>
    
  
 </tr>  
    <?php } } ?>
    
    
    </tbody>
    <tfoot> 
    <tr>
<th><small>No.</small></th>    
	<th><small>Nombre</small></th>
    <th><small>PPP</small></th>
   
	
	<th><small>Estatus</small></th>
	<th><small>Indicadores</small></th>
	<th><small>Componentes</small></th>
	<th><small>Info.</small></th>    
	<?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>
    <th><small>Aprobar</small></th>
	<th><small>Editar</small></th>
	<th><small>Eliminar</small></th>
  <?php } ?>
    
    </tr>
 
  </tfoot>
  </table>
</section>
</div>
