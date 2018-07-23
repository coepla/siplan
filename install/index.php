<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPLAN | Instalación </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../css/bootstrap.min.css?v1.0">
  <link rel="stylesheet" href="../css/font-awesome.min.css?v1.0">
  <link rel="stylesheet" href="../css/ionicons.min.css?v1.0">
  <link rel="stylesheet" href="../css/AdminLTE.min.css?v1.0">
  <link rel="stylesheet" href="../css/_all-skins.min.css?v1.0">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green-light sidebar-mini">



<div class="wrapper" style="padding:15px 15px 15px 15px;">


<section class="content">
<div class="box box-success color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-gears"></i> Instalación de SIPLAN V7.0</h3>
        </div>
        <div class="box-body">
         
<?php


  if (version_compare(PHP_VERSION, '5.6.0') <= 0) {
    echo 'error la version de php es:<b> ' . PHP_VERSION . "</b> se requiere tener instalada la version <b> 5.6 </b> ";
 }else{
    echo "Versión de PHP: <b>".PHP_VERSION."</b><br>";
    ?>
    <hr>
    <div id="form_install">
       
    </div>
<?php
 }
?>       

</div>
</div>
</section>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.slimscroll.min.js?v1.0"></script>
<script src="../js/fastclick.js"></script>
<script src="../js/adminlte.min.js?v2.0"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>