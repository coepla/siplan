<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.slimscroll.min.js?v1.0"></script>
<script src="js/fastclick.js"></script>
<script src="js/adminlte.min.js?v2.0"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<?php
//------- nuevo prog pres ----//
if(isset($_GET['token']) == md5(4)){
?>
<script src="js/icheck.min.js?v.1.0"></script>
<script src="js/planeacion/nuevo_pp.js?v=1.2"></script>
<script src="js/select2.full.min.js?v2.0"></script>

<?php } ?>
