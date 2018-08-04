<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="img/usuario.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <?php echo $_SESSION['nombre_usuario']; ?> </p>
            <?php if($_SESSION['id_perfil'] != 2){
            echo "<select onchange='cambiar_dep(this.value);'>
            <option value='0'>".$_SESSION['acronimo_dependencia']."</option>";
            $conexion = $conn->conectar(1);
            $sel_deps = $conexion->query("SELECT id_dependencia,acronimo FROM dependencias ORDER BY id_dependencia ASC");
            $conexion->close();
            unset($conexion);
            while($res_deps = $sel_deps->fetch_array()){
                echo "<option value='".$res_deps[0]."'>".$res_deps[0]." - ".$res_deps[1]."</option>";
            }
            unset($sel_deps);
            unset($res_deps);
            echo "</select>";
}else{
           echo $_SESSION['acronimo_dependencia']; }?>
        </div>
      </div>
<hr>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-ol"></i> <span>Planeación</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="main.php?token=<?php echo md5(1); ?>"><i class="fa fa-circle-o"></i> Programas Presupuestarios</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Obras y Acciones</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Inversión</a></li>
          </ul>
        </li>

       <li class="treeview">
          <a href="#">
            <i class="fa fa-tasks"></i> <span>Evaluación</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Evaluación Trimestral</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Seguimiento</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Avance Fis/Fin</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Cuenta Pública</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Indicadores</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-check-circle"></i> <span>Resultados</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Evaluación Trimestral</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Seguimiento</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Avance Fis/Fin</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Cuenta Pública</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Indicadores</a></li>
          </ul>
        </li>

    <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i> <span>Presupuestal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Evaluación Trimestral</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Seguimiento</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Avance Fis/Fin</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Cuenta Pública</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Indicadores</a></li>
          </ul>
        </li>

    <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text-o"></i> <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Evaluación Trimestral</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Seguimiento</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Avance Fis/Fin</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Cuenta Pública</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Indicadores</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>Estados Financieros</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Evaluación Trimestral</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Seguimiento</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Avance Fis/Fin</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Cuenta Pública</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Indicadores</a></li>
          </ul>
        </li>

    <li class="treeview">
          <a href="#">
            <i class="fa fa-list-ul"></i> <span>Cierres de Ejercicio</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Evaluación Trimestral</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Seguimiento</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Avance Fis/Fin</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Cuenta Pública</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Indicadores</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list-alt"></i> <span>Catálogos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Evaluación Trimestral</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Seguimiento</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Avance Fis/Fin</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Cuenta Pública</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Indicadores</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Unidades Responsables</a></li>
          </ul>
        </li>

            <li class="treeview">
          <a href="#">
            <i class="fa fa-globe"></i> <span>Módulo Municipal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Evaluación Trimestral</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Seguimiento</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Avance Fis/Fin</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Cuenta Pública</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Indicadores</a></li>
          </ul>
        </li>

            <li class="treeview">
          <a href="#">
            <i class="fa fa-globe"></i> <span>Mpal X Dep</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Evaluación Trimestral</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Seguimiento</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Avance Fis/Fin</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Cuenta Pública</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Indicadores</a></li>
          </ul>
        </li>

    <li class="treeview">
          <a href="#" style="color:#f00">
            <i class="fa fa-cogs"></i> <span>Administración</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#" style="color:#f00"><i class="fa fa-circle-o"></i> Evaluación Trimestral</a></li>
            <li><a href="#" style="color:#f00"><i class="fa fa-circle-o"></i> Seguimiento</a></li>
            <li><a href="#" style="color:#f00"><i class="fa fa-circle-o"></i> Avance Fis/Fin</a></li>
            <li><a href="#" style="color:#f00"><i class="fa fa-circle-o"></i> Cuenta Pública</a></li>
            <li><a href="#" style="color:#f00"><i class="fa fa-circle-o"></i> Indicadores</a></li>
          </ul>
        </li>


      </ul>
    </section>
  </aside>
