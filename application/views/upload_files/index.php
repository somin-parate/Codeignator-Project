  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gallery</h1>
                </div>
            </div>
    <div class="row">
    <a href="<?php echo site_url('categories'); ?>" class="btn btn-info"><< Back </a>
    </div>
    <div class="row">
        
         <?php if($this->session->flashdata('statusMsg')): ?>
                <div class="alert alert-success alert-dismissable">
                 <?php echo $this->session->flashdata('statusMsg'); ?> 
               </div>
        <?php endif; ?>
        <form enctype="multipart/form-data" action="" method="post">
            <div class="form-group">
                <label>Choose Files</label>
                <span class="btn btn-default btn-file">
                <input type="file" class="form-control" name="userFiles[]" multiple/>
                <input type="hidden" name="category_id" value="<?php echo $cat_id; ?>" />
                </span>
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit" name="fileSubmit" value="UPLOAD"/>
            </div>
        </form>
    </div>
    <div class="row">
       
            <?php if(!empty($files)): foreach($files as $file): ?>
           <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <img src="<?php echo base_url('assets/message/'.$file->file_name); ?>" class="img-responsive" alt="" >
                <p>Uploaded On <?php echo date("j M Y",strtotime($file->created)); ?></p>
            </div>
            <?php endforeach; ?>
           
          <?php else: ?>

            <p>Image(s) not found.....</p>
            <?php endif; ?>
       
    </div>
    <div class="row">  <div id="pagination"><?php echo $links; ?></div> </div>
</div>
