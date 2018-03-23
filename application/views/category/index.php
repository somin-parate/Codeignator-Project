<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Categories</h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>
             <div class="row">
                <div class="col-lg-12">
               <?php if($this->session->flashdata('flashSuccess')): ?>
                <div class="alert alert-success alert-dismissable">
                 <?php echo $this->session->flashdata('flashSuccess'); ?> 
               </div>
                <?php endif; ?>
                     <div class="pull-right">
                     <div class="btn-group">
                          <a href="<?php echo base_url('addcategories') ?>" class="btn btn-success">Add Category</a>
                      </div>
                     </div> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Categories
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                        <th>Gallery</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($categories as  $category) { ?>
                                              <tr>
                                                    <td><?php echo $category->category_id; ?></td>
                                                    <td><?php echo $category->category_name; ?></td>
                                                    <td><img src="<?php echo base_url('assets/categories') ?>/<?php echo $category->category_image; ?>" width="50" height="50"></td>
                                                    <td><a href="<?php echo site_url('editcategories/'.$category->category_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a onclick="return confirm('Are you sure you want to delete this item?');" href="<?php echo site_url('deletecategories/'.$category->category_id); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                                    <td> <a href="<?php echo site_url('upload_files/'.$category->category_id); ?>" class="btn btn-primary">Gallery</a></td>
                                                </tr>
                                          <?php  }  ?>
                                </tbody>
                                 
                            </table>
                            <div id="pagination">
                                    <?php echo $links; ?>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
 </div>           