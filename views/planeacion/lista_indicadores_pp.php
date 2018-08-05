<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SIPLAN 2019<br>
        <small> Programas Presupuestarios - Indicadores Fin y Propósito</small>
      </h1>
    </section>
    <section class="content">


        <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Indicadores Fin</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive ">

                <ul class="nav nav-pills">
  <li><button onclick="nuevo_indicador_fin();" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Indicador </button></li>
                </ul>
                <hr>
              <table class="table table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Indicador</th>
                  <th>Meta</th>
                  <th>U. Medida</th>
                  <th>Sentido</th>
                  <th>Info</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
                </thead>

                  <tbody>
                      <?php
                        $conexion = $conn->conectar(1);
                        $indicadores_fin_query = $conexion->query("select
                        i.id_indicador,
                        i.nombre,
                        i.meta,
                        i.u_medida,
                        i.sentido
                        from indicadores i

                        where i.id_proyecto = ".$_GET['id_proyecto']." AND i.nivel_indicador = 1") or die($conexion->error);
                       $conexion->close();
                       unset($conexion);
                      $contador = 0;
                      while($res_indicador_fin = $indicadores_fin_query->fetch_array()){
                          $contador++;
                      ?>

                      <tr>
                  <td><?php echo $contador;?></td>
                  <td><?php echo $res_indicador_fin[1]; ?></td>
                  <td><?php echo $res_indicador_fin[2]; ?></td>
                <td>U medida</td>
                <td>Sentido</td>
                  <td>Info</td>
                  <td>Editar</td>
                  <td>Eliminar</td>
                </tr>
                      <?php } unset($contador); ?>
                </tbody>

                  <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Indicador</th>
                  <th>Meta</th>
                  <th>U. Medida</th>
                  <th>Sentido</th>
                  <th>Info</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
                  </tfoot>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>


        <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Indicadores Propósito</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <ul class="nav nav-pills">
  <li><button onclick="nuevo_indicador_proposito();" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Indicador </button></li>
                </ul>
                <hr>
           <table class="table table-hover">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Indicador</th>
                  <th>Meta</th>
                  <th>Sentido</th>
                  <th>Info</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
                </thead>

                  <tbody>
                      <?php
                        $conexion = $conn->conectar(1);

                        $indicadores_fin_query = $conexion->query("select id_indicador, nombre, meta, sentido from indicadores where id_proyecto = ".$_GET['id_proyecto']." AND nivel_indicador = 2") or die($conexion->error);
                       $conexion->close();
                       unset($conexion);
                      $contador = 0;
                      while($res_indicador_fin = $indicadores_fin_query->fetch_array()){
                          $contador++;
                      ?>

                      <tr>
                  <td><?php echo $contador;?></td>
                  <td><?php echo $res_indicador_fin[1]; ?></td>
                  <td>Meta</td>
                  <td>Sentido</td>
                  <td>Info</td>
                  <td>Editar</td>
                  <td>Eliminar</td>
                </tr>
                      <?php } unset($contador); ?>
                </tbody>

                  <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Indicador</th>
                  <th>Meta</th>
                  <th>Sentido</th>
                  <th>Info</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
                  </tfoot>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>


    </section>
</div>
<script>
    function nuevo_indicador_fin(){
        location.href = "main.php?token=<?php echo md5(6); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>&tipo=Fin";
    }
    function nuevo_indicador_proposito(){
        location.href = "main.php?token=<?php echo md5(6); ?>&id_proyecto=<?php echo $_GET['id_proyecto']; ?>&tipo=Propósito";
    }
</script>
