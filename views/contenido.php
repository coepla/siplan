<?php

if(isset($_GET['token'])){

    switch($_GET['token']){
        /* --------- Programas Presupuestarios -------------------- */
        /* =========================================================*/
        case md5(1):
            require('views/planeacion/lista_pp.php');
        break;
        case md5(2):
            require('views/planeacion/marco_estrategico.php');
        break;
        case md5(3):
            require('clases/planeacion/marco_estrategico_guarda.php');
        break;
        case md5(4):
            require('views/planeacion/nuevo_pp.php');
        break;
        case md5(5):
            require('views/planeacion/lista_indicadores_pp.php');
        break; 
        case md5(6):
            require('views/planeacion/nuevo_indicador_pp.php');
        break;
        case md5(7):
            require('views/planeacion/lista_componentes.php');
        break;
        case md5(8):
            require('views/planeacion/nuevo_componente.php');
        break;
        case md5(9):
            require('views/planeacion/indicadores_componente.php');
        break;
        case md5(10):
            require('views/planeacion/lista_actividades.php');
        break;
        case md5(11):
            require('views/planeacion/nueva_actividad.php');
        break;
        case md5(12):
            require('views/planeacion/indicadores_actividad.php');
        break;



        /*============= Administracion de usuarios ============= */
        case md5(900):
            require('views/usuarios/perfil_usuario.php');
        break;


        /*============ Cualquier otro sitio llamado que no existe ==============*/
        default:
            require('views/principal.php');
        break;
    }
}else{
    require('views/principal.php');
}
