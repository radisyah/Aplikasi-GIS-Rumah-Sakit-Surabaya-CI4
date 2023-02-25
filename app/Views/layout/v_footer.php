     <!-- /.col-lg-12 -->
     </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<script>
window.setTimeout(function(){
    $('.alert').fadeTo(500,0).slideUp(500,function(){
    $(this).remove();
    });
},3000);
</script>

<!-- jQuery -->
<script src="<?= base_url() ?>/template/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url() ?>/template/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?= base_url() ?>/template/js/metisMenu.min.js"></script>

<!-- DataTables CSS -->
 <link href="<?= base_url() ?>/template/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?= base_url() ?>/template/css/dataTables/dataTables.responsive.css" rel="stylesheet">

<!-- Custom Theme JavaScript -->
<script src="<?= base_url() ?>/template/js/startmin.js"></script>

<!-- DataTables JavaScript -->
<script src="<?= base_url() ?>/template/js/dataTables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/template/js/dataTables/dataTables.bootstrap.min.js"></script>
  

<!-- Custom Theme JavaScript -->
<script src="<?= base_url() ?>/template/js/startmin.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
</script>


</body>
</html>