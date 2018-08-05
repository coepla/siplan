<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();
require("../config.php");
require("../conexion.php");
class indicadores {
    
    function agregar($vars,$c){
        
        switch( $vars['nivel_indicador'] ) {
            case "Fin":
                $nivel = 1;
            break;
            case "Propósito":
                $nivel = 2;
            break;
            case "Componente":
                $nivel = 3;
            break;
            case "Actividad":
                $nivel = 4;
            break;
                
        }
                $consulta = "call agregar_indicador
                ($nivel,
                ".$vars['proyecto'].",
                ".$vars['componente'].",
                ".$vars['actividad'].",
                  '".$vars['nombre']."',
                  '".$vars['objetivo']."',
                  '".$vars['formula']."',
                  ".$vars['tipo'].",
                  ".$vars['dimension'].",
                  ".$vars['frecuencia'].",
                  ".$vars['sentido'].",
                  '".$vars['u_medida']."',
                  '".$vars['meta']."',
                  '".$vars['linea_base']."',
                  '".$vars['verifica']."',
                  '".$vars['supuesto']."',
                  '".$vars['var1']."',
                  '".$vars['var2']."',
                  '".$vars['var3']."',
                  '".$vars['var4']."',
                  '".$vars['var5']."',
                  '".$vars['var6']."',
                  ".$_SESSION['id_usuario'].",
                  '".$_SERVER['REMOTE_ADDR']."'
                )
                ";
        $conexion = $c->conectar(2);
        if($conexion->query($consulta)){
            return "guardado";
        } else{
            return $conexion->error;
        }
    }
    
}

$indicador = new indicadores();
$conn = new bd_conexion();

switch($_POST['accion']){
    case 'agregar':
        echo $indicador->agregar($_POST,$conn);
    break;
}
