<?php

$consulta_marco = mysql_query("SELECT HIGH_PRIORITY count(*) 
FROM marco_estrategico WHERE id_dependencia = ".$_SESSION['id_dependencia']." AND ejercicio = ".$_SESSION['ejercicio'],$siplan_data_conn) or die (mysql_error());

$res_marco = mysql_result($consulta_marco,0);

if($res_marco==0){
	echo "<script type='text/javascript'>
	   alert('Para aprobar sus Programas Presupuestarios primero debe completar el Marco Estrat\u00e9gico');
	</script>";
}
?> 
<style type="text/css" title="currentStyle">

.tooltip {

  //border-bottom: 1px dotted #000000; color: #000000; outline: none;

  cursor: help; text-decoration: none;

  position: relative;

}

.tooltip span {

  margin-left: -999em;

  position: absolute;

}

.tooltip:hover span {

  border-radius: 5px 5px; -moz-bord	er-radius: 5px; -webkit-border-radius: 5px; 

  box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1); -webkit-box-shadow: 5px 5px rgba(0, 0, 0, 0.1); -moz-box-shadow: 5px 5px rgba(0, 0, 0, 0.1);

  font-family: Calibri, Tahoma, Geneva, sans-serif;

  position: absolute; left: 1em; top: 2em; z-index: 99;

  margin-left: 0; width: 250px;

}

.tooltip:hover img {

  border: 0; margin: -10px 0 0 -55px;

  float: left; position: absolute;

}

.tooltip:hover em {

  font-family: Candara, Tahoma, Geneva, sans-serif; font-size: 1.2em; font-weight: bold;

  display: block; padding: 0.2em 0 0.6em 0;

}

.classic { padding: 0.8em 1em; }

.custom { padding: 0.5em 0.8em 0.8em 2em; }

* html a:hover { background: transparent; }

.classic {background: #FFFFAA; border: 1px solid #FFAD33;  }

.critical { background: #FFCCAA; border: 1px solid #FF3334;	}

.help { background: #9FDAEE; border: 1px solid #2BB0D7;	}

.info { background: #9FDAEE; border: 1px solid #2BB0D7;	}

.warning { background: #FFFFAA; border: 1px solid #FFAD33; }

</style>

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
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Programas Presupuestarios - <small>DEP_ACRO</small></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
           

<ul class="nav nav-pills">
  <li><a href="main.php?token=<?php echo(md5(2));?>"><span class="glyphicon glyphicon-edit"></span>&nbsp;Marco Estrategico </a></li>
 <?php
   $conulta_pondera_proyectos = "SELECT HIGH_PRIORITY sum(ponderacion) FROM proyectos WHERE id_dependencia = ".$_SESSION['id_dependencia'];
   $EjecutarConsulta = mysql_query($conulta_pondera_proyectos,$siplan_data_conn);
   if(mysql_result($EjecutarConsulta, 0)==100){
?>
<li><a href="javascript:ponderacion_full()"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Programa Presupuestario</a></li>
<?php
}else{
?>
	<li><a href="main.php?token=<?php echo md5(4); ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Programa Presupuestario</a></li>
 <?php } ?>


  <li><a href="rpts/general_proyectos.php" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;Imprimir</a></li>
  <li><a href="rpts/general_proyectos_xls.php" target="_blank"><span class="glyphicon glyphicon-export"></span>&nbsp;Exportar a XLS</a></li>
</ul> 
<hr>


<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
<thead>
<tr>
    <td width="5%"><div align="center">No. </div></td>    
	<td width="27%"><div align="center">Programa Presupuestario</div></td>
	<td width="5%"><div align="center">PED</div></td>
	<td width="9%"><div align="center">Ponderaci&oacute;n</div></td>
	<td width="10%"><div align="center">Estatus</div></td>
	<td width="8%"><div align="center">Indicadores</div></td>
	<td width="8%"><div align="center">Componentes</div></td>
	<td width="7%"><div align="center">Info.</div></td>    
	<td width="7%"><div align="center">Aprobar</div></td>
	<td width="7%"><div align="center">Editar</div></td>
	<td width="7%"><div align="center">Eliminar</div></td>
  </tr>
  </thead>
  <tbody>
  <?php
    $consulta_proyectos = mysql_query("SELECT HIGH_PRIORITY  
pr.id_proyecto as id_proyecto,
pr.no_proyecto as no_proyecto,
pr.nombre as nombre,
est.nombre as estrategia,
pr.ponderacion as ponderacion,
pr.estatus as estatus
FROM
proyectos as pr
inner join estrategias as est on(pr.id_estrategia = est.id_estrategia)
WHERE pr.id_dependencia =".$_SESSION['id_dependencia'] ,$siplan_data_conn)or die (mysql_error());
    while ($resproyectos = mysql_fetch_assoc($consulta_proyectos)) {
	    $id_proyecto= $resproyectos['id_proyecto'];
	    $status_proyecto = $resproyectos['estatus'];

            $consulta_componentes = mysql_query("SELECT HIGH_PRIORITY  sum(ponderacion) From componentes WHERE id_proyecto = ".$id_proyecto,$siplan_data_conn) or die(mysql_error());
	  	$num_componentes = mysql_result($consulta_componentes, 0);
 	 	
$consulta_indicadores = mysql_query("SELECT HIGH_PRIORITY count(*) FROM indicadores_proyecto WHERE id_proyecto = ".$id_proyecto." AND completado=1",$siplan_data_conn) or die(mysql_error());
	 	$res_indicadores = mysql_result($consulta_indicadores,0);
		
		$consulta_componentes1 =mysql_query("SELECT HIGH_PRIORITY id_componente FROM componentes WHERE id_proyecto = ".$id_proyecto,$siplan_data_conn) or die(mysql_error());
		$num_componentes2 = mysql_num_rows($consulta_componentes1);
    	 
       $total_acciones =0;
    	$suma_accion =0;
		while($res_componente1 = mysql_fetch_array($consulta_componentes1)){
                $consulta_accion1 = mysql_query("SELECT HIGH_PRIORITY sum(ponderacion) as suma FROM acciones WHERE id_componente = ".$res_componente1['id_componente'],$siplan_data_conn) or die(mysql_error());
				$res_accion1 = mysql_fetch_array($consulta_accion1);
				$suma_accion =$suma_accion+$res_accion1['suma'];
	
		}
	     switch ($resproyectos['estatus']){
		   case 0:
		   $status = "Sin aprobar";
		   $css_color = "gradeX";
		   break;
		   case 1:
		   $status = "Aprob. Dependencia";
		   $css_color = "gradeB";
		   break;
		   case 2:
		   $status = "Aprob. COEPLA";
		   $css_color = "gradeA";
		   break;   
		   case 3:
		   $status = "Inactivo";
		   $css_color = "gradeU";
		   break; 
	   }

 if($num_componentes2 != 0){	 
  $max_Acc = 	$suma_accion/$num_componentes2;
  }
  ?>
 <tr class="<?php echo $css_color; ?>">
    <td><?php echo $resproyectos['no_proyecto']; ?></td>    
     <td  align="left"><?php  echo '<a class="tooltip" style="text-decoration:none;color:#333;; cursor:pointer;"> '.substr($resproyectos['nombre'],0,32).'...'.'<span class="custom classic">'.$resproyectos['nombre'].'</span></a>';?></td>
    <td><?php print(substr($resproyectos['estrategia'],0,5)); ?></td>
    <td><div align="center"><?php echo $resproyectos['ponderacion']; ?>%</div></td>
    <td><div align="center"><?php echo $status; ?></div></td>
    <td valign="middle"><div align="center"><a href="main.php?token=<?php print(md5(11));?>&id_proyecto=<?php echo"$id_proyecto";?>"><span class="glyphicon glyphicon-stats"></span></a></div></td>
    <td valign="middle"><div align="center"><a href="main.php?token=<?php print(md5(13));?>&id_proyecto=<?php echo"$id_proyecto";?>"><span class="glyphicon glyphicon-list"></span></a></div></td>
    <td valign="middle"><div align="center"><a href="main.php?token=<?php print(md5(25));?>&id_proyecto=<?php echo"$id_proyecto";?>"><span class="glyphicon glyphicon-info-sign"></span></a></div></td>
    
    <?php  

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
    <?php if($status_proyecto!=0){ ?>
    <td valign="middle"><div align="center"><span class="glyphicon glyphicon-minus"></span></div></td>	
    <?php } ?>
    <td valign="middle"><div align="center">
    <?php if($num_componentes==0){ ?>
    	<a href="javascript:eliminar_proyecto('<?php echo"$id_proyecto";?>')"><span class="glyphicon glyphicon-trash"></span></a>
    	<?php } else { ?>
    		<span class="glyphicon glyphicon-minus"></span>
    		<?php } ?>
    </div></td>
 </tr>  
    <?php } ?>
    </tbody>
    <tfoot>
     <tr>
    <td width="5%"><div align="center">No. </div></td>    
	<td width="27%"><div align="center">Programa Presupuestario</div></td>
	<td width="5%"><div align="center">PED</div></td>
	<td width="9%"><div align="center">Ponderaci&oacute;n</div></td>
	<td width="10%"><div align="center">Estatus</div></td>
	<td width="8%"><div align="center">Indicadores</div></td>
	<td width="8%"><div align="center">Componentes</div></td>
	<td width="7%"><div align="center">Info.</div></td>    
	<td width="7%"><div align="center">Aprobar</div></td>
	<td width="7%"><div align="center">Editar</div></td>
	<td width="7%"><div align="center">Eliminar</div></td>
  </tr>
  </tfoot>
  </table>
  </tr>
  </table>


</section>
</div>
