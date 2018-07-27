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
          <div class="box">
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
  <li><button onclick="nuevo_indicador();" class="btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span>&nbsp;Agregar Indicador </button></li>
                </ul>
                <hr>
              <table class="table table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Indicador</th>
                  <th>Meta</th>
                  <th>Resultado</th>
                  <th>Info</th>
                  <th>Editar</th>
                  <th>Eliminar</th>
                </tr>
                </thead>

                  <tbody>
                <tr>
                  <td><?php if(isset($conexion)){echo "conexion existe";}else{echo "no existe la conexion";} ?></td>
                  <td><?php if(isset($conn)){echo "clase conexion existe";}else{echo "no existe la clase conexion";} ?></td>
                  <td>Meta</td>
                  <td>Resultado</td>
                  <td>Info</td>
                  <td>Editar</td>
                  <td>Eliminar</td>
                </tr>
                </tbody>

                  <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Indicador</th>
                  <th>Meta</th>
                  <th>Resultado</th>
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
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

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
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Reason</th>
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>219</td>
                  <td>Alexander Pierce</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>657</td>
                  <td>Bob Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-primary">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>175</td>
                  <td>Mike Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-danger">Denied</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
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
    function nuevo_indicador(){
        console.log("works");
    }
</script>
