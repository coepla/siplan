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

if( isset($_GET['token']) ){
    switch($_GET['token']){
        case md5(1):
            ?>
         <script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
        <?php    
        break;
        case md5(4):
            echo '<script src="js/icheck.min.js?v.1.0"></script>';
            echo '<script type="text/javascript">';
            require("js/planeacion/nuevo_pp.js.php");
            echo '</script>';
        break;
    }
  
}
    
?>

 
