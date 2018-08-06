<div class="content-wrapper">
<section class="content-header">
<h1>SIPLAN 2019<br>
<small> Componentes</small>
</h1>
</section>
<section class="content">
<div class="box box-success">
<div class="box-header">
<h3 class="box-title">Listado de Componentes - <small><?php echo $_SESSION['nombre_dependencia']; ?></small></h3>
</div>
<div class="box-body">
<ul class="nav nav-pills">
<li>
<button onclick="window.location.href='main.php?token=<?php echo(md5(1));?>'" class="btn btn-success">&nbsp;Programas Presupuestarios </button></li>
<li><button  class="btn btn-success" onclick="window.location.href='main.php?token=<?php echo md5(8); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>'"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Componente</button></li>
  <li><button class="btn bg-navy" onclick="window.open('rpts/general_proyectos.php')"><span class="glyphicon glyphicon-print"></span>&nbsp;Imprimir</button></li>
  <li><button class="btn bg-olive" onclick="window.open('rpts/general_proyectos_xls.php');"><span class="glyphicon glyphicon-export"></span>&nbsp;Exportar a XLS</button></li>
</ul>
<hr>
<table id="example1" class="table table-bordered table-striped table-hover">
<thead>
<tr>
    <th><small>No.</small></th>
	<th><small>Nombre</small></th>
	<th><small>Indicadores</small></th>
	<th><small>Actividades</small></th>
	<th><small>Info.</small></th>
	<?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>
    <th><small>Editar</small></th>
    <th><small>Eliminar</small></th>
  <?php } ?>
    </tr>
  </thead>
  <tbody>
  <?php
    $conexion =$conn->conectar(1);
    $consulta_componentes = $conexion->query("SELECT
id_componente,
no_componente,
descripcion
FROM
componentes
WHERE id_proyecto = ".$_GET['id_proyecto']) or die ($conexion->error);
$conexion->close();
unset($conexion);

while ($rescomponentes = $consulta_componentes->fetch_assoc()) { ?>

<tr>
    <td><?php echo $rescomponentes[1]; ?></td>
    <td><?php echo $rescomponentes[2]; ?></td>
    <td><a class="text text-navy" href="main.php?token=<?php echo md5(9); ?>&id_proyecto=<?php  echo $_GET['id_proyecto']; ?>&id_componente=<?php  echo $rescomponentes[0]; ?>"> <i class="fa fa-line-chart" aria-hidden="true"></i> </a></td>
    <td><a class="text text-navy" href="main.php?token=<?php echo md5(7); ?>"> <i class="fa fa-list-alt" aria-hidden="true"></i>  </a></td>
    <td><a class="text text-navy" href="#"> <i class="fa fa-info-circle" aria-hidden="true"></i>  </a></td>
    <?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>
    <td><a class="text text-success" href="javascript:aprobar_proyecto(<?php echo $resproyectos['id_proyecto']; ?>)"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></td>
    <td><a class="text text-orange" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
    <td><a class="text text-danger" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    <?php } ?>
    </tr>
    <?php } ?>


    </tbody>
    <tfoot>
   <tr>
    <th><small>No.</small></th>
	<th><small>Nombre</small></th>
	<th><small>Indicadores</small></th>
	<th><small>Actividades</small></th>
	<th><small>Info.</small></th>
	<?php  if($_SESSION['id_perfil'] == 1 || $_SESSION['id_perfil'] == 2 || $_SESSION['id_perfil'] == 3) {  ?>
    <th><small>Editar</small></th>
    <th><small>Eliminar</small></th>
  <?php } ?>
    </tr>
  </tfoot>
  </table>


    </div>
    </div>
</section>
    </div>
