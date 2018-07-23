<?php
if($_SESSION['keyWord'] !== md5(KEYWORD)){
    $_SESSION = array();
    unset($_SESSION);
    header("location:../index.php");
}

if(PHP_SAPI == 'cli') {
    $_SESSION = array();
    unset($_SESSION);
    die("solo corre mediante web");
}


class bd_conexion{

    private $host = 'localhost';
    private $dbname = 'siplan2019';

    function conectar($u){

        switch($u){
            case 1:
                $conexion = new mysqli($this->host, 'siplan2019_sel', ';J&f_vP]9T2yMghr', $this->dbname);
            break;
            case 2:
                $conexion = new mysqli($this->host, 'siplan2019_ins', '|.aLw%LdzO%<,w#', $this->dbname);
            break;
        }
        return $conexion;
    }
}
$conn = new bd_conexion();
