 <!-- jQuery -->
 <script src="<?= base_url() ?>/template/js/jquery.min.js"></script>

 <!-- Bootstrap Core JavaScript -->
 <script src="<?= base_url() ?>/template/js/bootstrap.min.js"></script>

 <!-- Metis Menu Plugin JavaScript -->
 <script src="<?= base_url() ?>/template/js/metisMenu.min.js"></script>

 <!-- Custom Theme JavaScript -->
 <script src="<?= base_url() ?>/template/js/startmin.js"></script>
 <script>
    window.setTimeout(function(){
      $('.alert').fadeTo(500,0).slideUp(500,function(){
        $(this).remove();
      });
    },3000);
  </script>

</body>
</html>