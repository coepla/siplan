<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

session_start();
require("../config.php");
require("../conexion.php");
class programa_presupuestario{
    function guardar_ppp($variables,$c){
        extract($variables);
        $dependencia = $_SESSION['id_dependencia'];
        $conexion = $c->conectar(2);
        $consulta = "CALL guardar_ppp($no_proyecto,
        '$nombre',
        1,
        $prog_pres,
        '$u_responsable',
        '$titular',
        $eje,
        $linea,
        $estrategia,
        $pnd_eje,
        $pnd_objetivo,
        $pnd_estrategia,
        $pnd_linea,
        $ponderacion,
        '$proposito',
        '$diagnostico',
        $gvulnerable,
        $ben_h,
        $ben_m,
        '$u_medida',
        $prog_anual,
        $p_semestral,
        $finalidad,
        $funcion,
        $subfuncion,
        '$observaciones',
        $dependencia,
        ".$_SESSION['id_usuario'].",
        '".$_SERVER['REMOTE_ADDR']."'
        )";
        if( $conexion->query($consulta) ){
            return "guardado";
        }else{
            return "error".$conexion->error;
        }

    }
    function guardar_ppi($variables,$c){
        extract($variables);
        $dependencia = $_SESSION['id_dependencia'];
        $conexion = $c->conectar(2);
        $consulta = "CALL guardar_ppi($no_proyecto,
        '$nombre',
        0,
        $prog_pres,
        '$u_responsable',
        '$titular',
        $eje,
        $linea,
        $estrategia,
        $pnd_eje,
        $pnd_objetivo,
        $pnd_estrategia,
        $pnd_linea,
        $ponderacion,
        '$proposito',
        '$diagnostico',
        $gvulnerable,
        $ben_h,
        $ben_m,
        '$u_medida',
        $prog_anual,
        $p_semestral,
        $finalidad,
        $funcion,
        $subfuncion,
        '$observaciones',
        $dependencia,
         ".$_SESSION['id_usuario'].",
        '".$_SERVER['REMOTE_ADDR']."'
        )";
        if( $conexion->query($consulta) ){
            // consulta guardar istorial
            return "guardado";
        }else{
            return "error".$conexion->error;
        }
        
    }
}

$conn = new bd_conexion();
$pp = new programa_presupuestario();

switch($_POST['accion']){
    
    case "guardar_ppp":       
        echo $pp->guardar_ppp($_POST,$conn);
    break;

    case "guardar_ppi":
        echo $pp->guardar_ppi($_POST,$conn);
    break;    
}
