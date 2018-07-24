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
        default:
            require('views/principal.php');
        break;
    }
}else{
    require('views/principal.php');
}
