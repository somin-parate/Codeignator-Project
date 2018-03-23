<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	  </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url('assets/vendor/metisMenu/metisMenu.min.js'); ?>"></script>
    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url('assets/vendor/raphael/raphael.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/vendor/morrisjs/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/data/morris-data.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/sb-admin-2.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/lib/jquery.uploadify-3.1.min.js"></script>
<script type='text/javascript' >
    $(function() {
     $('#upload_btn').uploadify({
      'debug'   : false,

      'swf'   : '<?php echo base_url() ?>assets/js/lib/uploadify.swf',
      'uploader'  : '<?php echo base_url('category/uploadify')?>',
      'cancelImage' : '<?php echo base_url() ?>assets/js/lib/uploadify-cancel.png',
      'queueID'  : 'file-queue',
      'buttonClass'  : 'button',
      'buttonText' : "Upload Files",
      'multi'   : true,
      'auto'   : true,
      'fileTypeExts' : '*.jpg; *.png; *.gif; *.PNG; *.JPG; *.GIF;',
      'fileTypeDesc' : 'Image Files',
      'method'  : 'post',
      'fileObjName' : 'userfile',
      'queueSizeLimit': 40,
      'simUploadLimit': 2,
      'sizeLimit'  : 10240000,

     'onUploadComplete' : function(file) {
        $("#category_image").val(file.name);
        $("#uploadedimg").html('<img width="100" height="100" src=<?php echo base_url() ?>assets/categories/'+file.name+'>');
       },
        'onQueueFull': function(event, queueSizeLimit) {
            alert("Please don't put anymore files in me! You can upload " + queueSizeLimit + " files at once");
            return false;
        },
        });
     });
    </script>

</body>
</html>