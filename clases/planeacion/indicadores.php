<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();
require("../config.php");
require("../conexion.php");
class indicadores {
    
    function agregar($vars,$c){
        
        switch($vars['tipo_indicador']){
                
            case 'Fin':
                $consulta = "call guarda_indicador_fin
                (".$vars['proyecto'].",
                  '".$vars['nombre']."',
                  '".$vars['objetivo']."',
                  '".$vars['formula']."',
                  ".$vars['tipo'].",
                  ".$vars['dimension'].",
                  ".$vars['frecuencia'].",
                  ".$vars['sentido'].",
                  '".$vars['u_medida']."',
                  '".$vars['meta']."',
                  '".$vars['verifica']."',
                  '".$vars['supuesto']."',
                  '".$vars['linea_base']."'
                )
                ";
            break;
            case 'Proposito':
                return "error";
            break;    
            case 'Componente':
                return "error";
            break;
            case 'Actividad':
                return "error";
            break;    
        }
        
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