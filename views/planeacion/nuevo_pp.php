<div class="content-wrapper">
<section class="content-header">
<h1>
SIPLAN 2019<br>
<small> Programas Presupuestarios</small>
</h1>
</section>
<section class="content">
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Nuevo Programa Presupuestario - <small>DEP_ACRO</small></h3>
            </div>
            <div class="box-body">
            <ul class="nav nav-pills">
<li><a href="main.php?token=<?php echo md5(1); ?>"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;Lista de Programas Presupuestarios</a></li>
</ul>
<hr>
    <form id="proyecto" name="proyecto" method="post" action="main.php?token=<?php echo md5(5);?>" role="form">
    <div class="row">
     <div class="col-md-1">
        <div class="form-group">
        <label>No.</label>
        <input name="no_proyecto" type="number" id="no_proyecto" value="" size="4" maxlength="3" class="form-control"  />
        </div>
     </div>
     <div class="col-md-8">
     <div class="form-group">
        <label>Nombre del Proyecto.</label>
        <input name="nombre" type="text" id="nombre" value="" size="100" class="form-control"  />
        </div>
     </div>
     <div class="col-md-3">
           <div class="form-group">
               <label>&nbsp;</label>
               <br>
        <input name="no_proyecto" type="checkbox" class="minimal-red" id="no_proyecto" value="" size="4" class="form-control"  />
               &nbsp;<strong>Proyecto Prioritario</strong>
        </div>

    </div>
    </div>


     <?php  if($_SESSION['ejercicio_v3'] == "2018" ) { ?>
<p>Clasificación Programática
	<SELECT name='prog_pres' id='prog_pres'>
        <option>-Seleccione-</option>
	<?php


	$con_tot_prog = mysql_query("SELECT * FROM programas_presupuestarios",$siplan_data_conn) or die (mysql_error());
	while($rpp = mysql_fetch_assoc($con_tot_prog)){
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
</SELECT></p>
<?php  } ?>
    <p>Unidad Responsable
        <input name="u_responsable" type="text" id="u_responsable" value="" size="100" />
    </p>
     <p>Nombre del Titular
        <input name="titular" type="text" id="titular" value="" size="100" />
    </p>
    <hr>
    <b>Alineaci&oacute;n Plan Estatal de Desarrollo 2016-2021</b>
    <p>Eje
    <br>
        <select name="eje" id="eje" onchange="agregalinea(this.value)">
            <?php
            echo "<option value='0'>-seleccione-</option>";
            $consulta_n_eje = mysql_query("SELECT * FROM eje" ,$siplan_data_conn) or die (mysql_error());
            $i=1;
            while($res_n_eje1 = mysql_fetch_array($consulta_n_eje)){
                echo "<option value=\"". $i ."\"> ".$res_n_eje1['eje']."</option>";
                $i++;
            }
            ?>
        </select>
        <br />
        L&iacute;nea
<br>
        <select name="linea" id="linea" onchange="agregaestrategia(this.value)">
            <?php
            echo "<option value='0'>-seleccione-</option>";
            ?>
        </select>
        <br />
        Estrategia
<br>
        <select name="estrategia" id="estrategia">
            <?php
            echo "<option value='0'>-seleccione-</option>";
            ?>
        </select>
    </p>
    <hr>
    <b> Alineaci&oacute;n Plan Nacional de Desarrollo 2013-2018</b>

<p>Meta Nacional
<select name="pnd_eje" id="pnd_eje" onchange="llena_combo_objetivo(this.value)">
    <option value="0">-Seleccione-</option>
    <option value="1">1-M&eacute;xico en Paz</option>
    <option value="2">2-M&eacute;xico Incluyente</option>
    <option value="3">3-M&eacute;xico con Educaci&oacute;n de Calidad</option>
    <option value="4">4-M&eacute;xico Pr&oacute;spero</option>
    <option value="5">5-M&eacute;xico con Responsabilidad Global</option>
    <option value="6">6-No Aplica</option>
</select></p>

<p>Objetivo
<select name="pnd_objetivo" id="pnd_objetivo" onchange="llena_combo_estrategia_pnd(this.value)">
    <option value="0">-Seleccione-</option>
</select></p>

<p>Estrategia
<select name="pnd_estrategia" id="pnd_estrategia" onchange="llena_combo_lineas_pnd(this.value)">
    <option value="0">-Seleccione-</option>
</select></p>

<p>Linea de Acci&oacute;n
<select name="pnd_linea" id="pnd_linea">
    <option value="0">-Seleccione-</option>
</select></p>

    <hr>
    <b>Objetivo Estrat&eacute;gico </b>
    <p>Dependencia o Entidad:
        <input type="text" size="64" value="<?php echo $_SESSION['nombre_dependencia_v3']; ?>" enabled="false"/>
    </p>

    <hr>
    <p>Ponderaci&oacute;n
        <input name="ponderacion" type="text" id="ponderacion" size="5" maxlength="3"  value="" /> debe ser menor o igual a <b><?php echo $ponderacionmax; ?></b>
    </p>

    <p>Prop&oacute;sito<br />
        <label for="proposito"></label>
        <textarea name="proposito" id="proposito" cols="100" rows="5"></textarea>
    </p>
    <p>Diagn&oacute;stico<br />
        <textarea name="justificacion" id="justificacion" cols="100" rows="5"></textarea>
    </p>

       Sector Poblacional
        <select name="gvulnerable" id="gvulnerable">
            <?php
            $consulta_n_vulnera = mysql_query("SELECT * FROM grupo_vulnerable",$siplan_data_conn) or die (mysql_error());
            $num = mysql_num_rows($consulta_n_vulnera);
            echo "<option value='0'>-seleccione-</option>";
            $i=1;
            while($res_n_vulnera = mysql_fetch_array($consulta_n_vulnera)){
                echo "<option value=\"". $i ."\"> ".html_entity_decode($res_n_vulnera['descripcion'])."</option>";
                $i++;
            }
            mysql_free_result($consulta_n_vulnera);
            ?>
        </select>
    </p>
    <p>Beneficiarios Hombres
        <input name="ben_h" type="text" id="ben_h" value="" />
        Beneficiarios Mujeres
        <input name="ben_m" type="text" id="ben_m" value="" />
    </p>
    <p>
        Unidad de Medida
        <input name="u_medida" type="text" id="u_medida" value="" />
        Programado Anual
        <input name="cantidad" type="text" id="cantidad" value="" />
         Prog. Semestral
        <input name="p_semestral" type="text" id="p_semestral" value="" />
    </p>
    <p>Finalidad
        <select name="finalidad" id="finalidad" onchange="agregafuncion(this.value)">
            <?php
            $consulta_n_finalidad = mysql_query("SELECT * FROM finalidad ",$siplan_data_conn) or die (mysql_error());
            echo "<option value='0'>-seleccione-</option>";
            $i=1;
            while($res_n_finalidad = mysql_fetch_array($consulta_n_finalidad)){
                echo "<option value=\"". $i ."\"> ".html_entity_decode($res_n_finalidad['nombre'])."</option>";
                $i++;
            }
            ?>
        </select>
        <input type="hidden" name="id_finalidad" id="id_finalidad"  />
        <input type="hidden" name="id_proyecto" id="id_proyecto" value=""  />
    </p>
    <p>
        Funci&oacute;n
        <select name="funcion" id="funcion" onchange="agregasubfuncion(this.value)">
            <?php
            echo "<option value='0'>-seleccione-</option>";

            ?>
        </select>
    </p>
    <p>Subfunci&oacute;n

        <select name="subfuncion" id="subfuncion">
            <?php
            echo "<option value='0'>-seleccione-</option>";

            ?>
        </select>
    </p>
    <p>Observaciones<br />
        <label for="observaciones"></label>
        <textarea name="observaciones" id="observaciones" cols="100" rows="5"></textarea>
    </p>
</form>


<ul class="nav nav-pills">
<li><a href="javascript:guardar()"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;Guardar</a></li>
<li><a href="javascript:regresar()"><span class="glyphicon glyphicon-floppy-remove"></span>&nbsp;Cancelar</a></li>
</ul>

<i class="icon-dropbox"></i>
            </div>

</div>
    </section>
</div>
