<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/js/lib/uploadify.css" />
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Message Category
                        </div>
                        <div class="panel-body">
                        <?php if (validation_errors()) : ?>
                            <div class="col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors() ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($error)) : ?>
                            <div class="col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    <?= $error ?>
                                </div>
                            </div>
                        <?php endif; ?>
                            <div class="row">

                                <div class="col-lg-6">
                                        <?php echo form_open('addcategories'); ?>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" id="category_name" type="text" name="category_name" value="" placeholder="Enter a Category Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <div class="uploadify-queue" id="file-queue"></div>
                                            <input type="file" name="userfile" id="upload_btn" />
                                            <input type="hidden" name="category_image" id="category_image" />
                                            <div id="uploadedimg"></div>
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
    

        </div>