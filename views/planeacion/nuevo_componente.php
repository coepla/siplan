<div class="content-wrapper">
<section class="content-header">
<h1>SIPLAN 2019<br><small> Nuevo Componente</small></h1>
</section>
<section class="content">
<div class="box box-success">
<div class="box-header">
<h3 class="box-title">Nuevo Componente | <small> <strong> Proyecto: </strong> </small></h3>
</div>
<div class="box-body">
<a href="main.php?token=<?php echo md5(7); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>" class="btn-sm btn-success">
<span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Lista de Componentes</a>
<hr>
<h4><span class="text text-success">Agregar Componente</span></h4>
<form id="componente_form" name="componente_form" method="post" role="form" onsubmit="return guardar();">
    <div class="form-group">
        <div class="row">
            <div class="col-md-1">
            <label>No. Componente</label>
            <input type="number" id="no_componente" class="form-control" required>
            </div>
            <div class="col-md-9">
            <label>Descripcion</label>
            <input type="text" id="no_componente" class="form-control" required>
            </div>
            <div class="col-md-2">
            <label>Ponderación</label>
            <input type="number" id="ponderacion" class="form-control" required>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-3">
            <div class="form-group">
              <label>Unidad de Medida</label>
                <select  required class="form-control">
                    <option value="">-Seleccione-</option>
                    <?php
                     $conexion = $conn->conectar(1);
                     $consulta_u_medida = $conexion->query("SELECT * FROM u_medida_prog01");
                     $conexion->close();
                     unset($conexion);
                     while($uMedida = $consulta_u_medida->fetch_array()){
                         echo "<option value='".$uMedida[0]."'>".$uMedida[0]." - ".$uMedida[1]."</option>";
                     }
                    ?>
                </select>
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
              <label>Tipo de Medida</label>
                <select  required class="form-control">
                    <option value="">-Seleccione-</option>
                  </select>
                </div></div>
            <div class="col-md-3">
              <div class="form-group">
                  <label>Cantidad</label>
                  <input type="number" id="cantidad" class="form-control" required>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group" >
                <label>Unidad Responsable</label>
                <select required id="u_responsable" class="form-control">
                    <option value="">-Seleccione</option>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
            <br>
          <button class="btn bg-orange form-control">Agregar Unidad Responsable al catálogo</button>
                </div>
        </div>
    </div>
    <h4>Alineación PED</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Eje</label>
                <select id="eje" class="form-control" required>
                    <option value=""> - Seleccione -</option>
                    <?php
                        $conexion = $conn->conectar(1);
                        $cosnulta_eje = $conexion->query("SELECT e.id_eje,e.eje from eje e inner join proyectos p on (e.id_eje = p.id_eje) WHERE p.id_proyecto = ".$_GET['id_proyecto']) or die ($conexion->error);
                        $conexion->close();
                        $resEje = $cosnulta_eje->fetch_array();
                        echo "<option value='".$resEje[0]."'>".$resEje[1]."</option>";
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
          <label>Línea</label>
              <select class="form-control">
                  <option>-Seleccione-</option>
              </select>
          </div>
        </div>
        <div class="col-md-4">
         <div class="form-group">
          <label>Estrategia</label>
              <select class="form-control">
                  <option>-Seleccione-</option>
              </select>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
         <div class="form-group">
                            <label>Clasificación Programática</label>
                            <select name='prog_pres' id='prog_pres' class="form-control" required>
<option value="">-Seleccione-</option>
<?php
$conexion = $conn->conectar(1);
$con_tot_prog = $conexion->query("SELECT * FROM programas_presupuestarios") or die ($conexion->error);

while($rpp = $con_tot_prog->fetch_assoc()){
switch($rpp['id']){
case 1:
echo " <option disabled='disabled' style='background-color:#ccc;'>Subsidios: Sector Social y Privado o Entidades Federativas y Municipios </option>";
break;
case 3:
echo " <option disabled='disabled' style='background-color:#ccc;'>Desempeño de las Funciones </option>";
break;
case 11:
echo " <option disabled='disabled' style='background-color:#ccc;'>Administrativos y de Apoyo </option>";
break;
case 14:
echo " <option disabled='disabled' style='background-color:#ccc;'>Compromisos </option>";
break;
case 16:
echo " <option disabled='disabled' style='background-color:#ccc;'>Obligaciones </option>";
break;
case 20:
echo " <option disabled='disabled' style='background-color:#ccc;'>Programas de Gasto Federalizado (Gobierno Federal) </option>";
break;
}
echo " <option value='".$rpp['id']."'> ".$rpp['clave']." - ".$rpp['descripcion']." </option>";
}
?>
</select>

                        </div>
        </div>
        <div class="col-md-6">
         <label> Transversalidad</label><br>
        <input type="checkbox"> Option 1 &nbsp;
        <input type="checkbox"> Option 2 &nbsp;
        <input type="checkbox"> Option 3
        </div>
    </div>

<button type="submit" class="btn btn-success"> Guardar </button>
<button type="button" onclick="window.history.back();" class="btn btn-danger"> Cancelar </button>
</form>
</div>
</div>
</section>
</div>
