<div class="content-wrapper">
<section class="content-header">
<h1>SIPLAN 2019<br><small> Nuevo Indicador</small></h1>
</section>
<section class="content">
<div class="box box-success">
<div class="box-header">
<h3 class="box-title">Nuevo Indicador <?php echo $_GET['tipo']; ?> - <small><?php echo  $_SESSION['acronimo_dependencia']; ?> </small></h3>
</div>
<div class="box-body">
<a href="main.php?token=<?php echo md5(5); ?>" class="btn-sm btn-success">
<span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Lista de Indicadores</a>
<hr>
<h4><span class="text text-success">Agregar indicador</span></h4>
<form id="proyecto" name="proyecto" method="post" role="form" onsubmit="return guardar();">
    <div class="form-group">
        <label for="nombre">Nombre del Indicador</label>
        <input type="text" id="nombre" name="nombre" class="form-control"  required>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
        <label for="objetivo">Objetivo</label>
                <textarea rows="18" id="objetivo" name="objetivo" required class="form-control" > </textarea>
    </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <h4>Método</h4>
            <label for="formula">Formula:</label>
            <select required class="form-control" id="formula" name="formula" onchange="cargar_variables(this.value);">
                <option value=''>-seleccione-</option>
                <?php
                $conexion = $conn->conectar(1);
                $consulta_formulas = $conexion->query("SELECT * FROM formulas") or die ($conexion->error);
                $conexion->close();
                unset($conexion);
                while($formulas = $consulta_formulas->fetch_array()){
                    echo '<option value="'.$formulas[0].'">'.$formulas[1].'</option>';
                }
                unset($consulta_formulas);
                ?>
            </select >
    </div>
        <div class="form-group" id="variables">
            <label>Nombre de las Variables</label>
            -Seleccione una formula-
        </div>
        </div>
    </div>
    <hr>
<div class="row">
    <div class="col-md-3">
         <div class="form-group">
        <label for="nombre">Tipo</label>
        <select  id="tipo" name="tipo" class="form-control"  required>
            <option value=''>-Seleccione-</option>
            <?php
            $conexion = $conn->conectar(1);
                $consulta_tipo_indicador = $conexion->query("SELECT * FROM tipo_indicador") or die ($conexion->error);
                $conexion->close();
                unset($conexion);
                while($tipos = $consulta_tipo_indicador->fetch_array()){
                    echo '<option value="'.$tipos[0].'">'.$tipos[1].'</option>';
                }
                unset($consulta_tipo_indicador);
            ?>
        </select>
    </div>
    </div>
    <div class="col-md-3">
         <div class="form-group">
        <label for="nombre">Dimensión</label>
        <select  id="tipo" name="tipo" class="form-control"  required>
            <option value=''>-Seleccione-</option>
            <?php
            $conexion = $conn->conectar(1);
                $consulta_tipo_indicador = $conexion->query("SELECT * FROM tipo_indicador") or die ($conexion->error);
                $conexion->close();
                unset($conexion);
                while($tipos = $consulta_tipo_indicador->fetch_array()){
                    echo '<option value="'.$tipos[0].'">'.$tipos[1].'</option>';
                }
                unset($consulta_tipo_indicador);
            ?>
        </select>
    </div>
    </div>
    <div class="col-md-3">
         <div class="form-group">
        <label for="nombre">Frecuencia</label>
        <select  id="tipo" name="tipo" class="form-control"  required>
            <option value=''>-Seleccione-</option>
            <?php
            $conexion = $conn->conectar(1);
                $consulta_tipo_indicador = $conexion->query("SELECT * FROM tipo_indicador") or die ($conexion->error);
                $conexion->close();
                unset($conexion);
                while($tipos = $consulta_tipo_indicador->fetch_array()){
                    echo '<option value="'.$tipos[0].'">'.$tipos[1].'</option>';
                }
                unset($consulta_tipo_indicador);
            ?>
        </select>
    </div>
    </div>
    <div class="col-md-3">
         <div class="form-group">
        <label for="nombre">Sentido</label>
       <select  id="tipo" name="tipo" class="form-control"  required>
            <option value=''>-Seleccione-</option>
            <?php
            $conexion = $conn->conectar(1);
                $consulta_tipo_indicador = $conexion->query("SELECT * FROM tipo_indicador") or die ($conexion->error);
                $conexion->close();
                unset($conexion);
                while($tipos = $consulta_tipo_indicador->fetch_array()){
                    echo '<option value="'.$tipos[0].'">'.$tipos[1].'</option>';
                }
                unset($consulta_tipo_indicador);
            ?>
        </select>
    </div>
    </div>
</div>

</form>
</div>
</div>
</section>
</div>
