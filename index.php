<?php
session_start();
unset($_SESSION);
session_destroy();

require("clases/config.php");
if(!ACTIVO){
  header("location:views/maintance.html");
  die();
}
if(DESARROLLO){
  error_reporting(E_ALL);
  ini_set('display_errors',1);
}
session_start();
$_SESSION['keyWord'] = md5(KEYWORD);
$_SESSION['activeKey'] = md5(rand(0,999));
header ("Expires: Fri, 14 Mar 1980 20:53:00 GMT"); //la pagina expira en fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache"); //PARANOIA, NO GUARDAR EN CACHE
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIPLAN | Acceso</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="css/bootstrap.min.css?v3.3.7">
  <link rel="stylesheet" href="css/font-awesome.min.css?v4.7.0">
  <link rel="stylesheet" href="css/ionicons.min.css?v2.0">
  <link rel="stylesheet" href="css/AdminLTE.min.css?v2.4.2">
  <link rel="stylesheet" href="css/green.css?v1.2">
  <link rel="stylesheet" href="css/select2.min.css?v2.1">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="img/logo_upla_small.png" class="img-responsive">
    <hr>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">SIPLAN 2019</p>

    <form action="clases/login.php" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" autocomplete='' name="usuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="clave" autocomplete="" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <?php
          if(isset($_GET['msg'])){
           switch($_GET['msg']){
            case 1:
              echo '<div class="callout callout-danger">
              <p>Error en nombre de usuario o contraseña</p>
            </div>';
            break;
            case 2:
            echo '<div class="callout callout-warning">
            <p>Usuario Deshabilitado, por favor comuníquese a COEPLA</p>
          </div>';
            break;
            case 3:
            echo '<div class="callout callout-success">
            <p>Sesión finalizada correctamente</p>
          </div>';
            break;
           }
          }
          ?>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-success btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
    <hr>
    <div class="form-group">
                <label>-Ejercicios Anteriores-</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">-Seleccione-</option>
                  <option>2018</option>
                  <option>2017</option>
                  <option>2016</option>
                </select>
              </div>
    </div>
    <!-- /.social-auth-links -->
<hr>
    <p>Sistema Integral de Información para la Planeación de Gobierno del Estado de Zacatecas</p>
    <p style="color:#f00;">V 7.0</p>
    <a href="#" class="text-center">Acerca del SIPLAN</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="js/jquery.min.js?v3.3.1"></script>
<!-- Bootstrap 3.3.7 -->
<script src="js/bootstrap.min.js?v3.3.7"></script>
<!-- iCheck -->
<script src="js/icheck.min.js?v1.0.1"></script>
<script src="js/select2.full.min.js?v2.0"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-green',
      radioClass: 'iradio_square-green',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  });
    </script>
</body>
</body>
</html>
