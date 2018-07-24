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
if(isset($_GET['token']) == md5(4)){
?>
<script src="js/icheck.min.js?v.1.0"></script>
<script>
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    });
</script>

<?php } ?>
