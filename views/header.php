<?php
session_start();
require('clases/config.php');

if(DESARROLLO){
  error_reporting(E_ALL);
  ini_set('display_errors',1);
}

// Seguridad y variables de sesion a utilizar
function titulo(){
    if(isset($_GET['token'])){
        return "Gobierno del Estado de Zacatecas";
    }else{
        return ".:: Bienvenido ::.";
    }
}

if($_SESSION['keyWord'] != md5(KEYWORD)){header('Location:index.php');}
if($_SESSION['activeKey'] != md5(ACTIVEKEY)){header('Location:index.php');}

require_once("seguridad/siplan_2017.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPLAN | <?php echo titulo(); ?> </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="css/bootstrap.min.css?v1.0">
  <link rel="stylesheet" href="css/font-awesome.min.css?v1.0">
  <link rel="stylesheet" href="css/ionicons.min.css?v1.0">
  <link rel="stylesheet" href="css/AdminLTE.min.css?v1.0">
  <link rel="stylesheet" href="css/_all-skins.min.css?v1.0">
   <?php
if(isset($_GET['token']) == md5(4)){
?>
    <link rel="stylesheet" href="css/iCheck_all.css?v1.0">
    <link rel="stylesheet" href="css/green.css?v1.2">
    <link rel="stylesheet" href="css/select2.min.css?v2.1">
<?php } ?>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="../../index2.html" class="logo">
      <span class="logo-mini"><b>S</b>PL</span>
      <span class="logo-lg"><b>SIPLAN</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Usuario Nombre</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Nombre de Usuario
                  <small>Dependencia</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">

              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Configuración</a>
                </div>
                <div class="pull-right">
                  <a href="index.php" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
