<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">General Settings</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Settings
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
                                        <?php echo form_open('editsetting'); ?>
                                        <div class="form-group">
                                            <label>Facebook Api</label>
                                            <input  type="hidden" name="setting_id" value="<?php echo $setting_id; ?>">
                                            <input class="form-control" id="facebook" type="text" name="facebook" value="<?php echo $facebook; ?>" placeholder="Enter a Facebook Api">
                                            <p class="help-block">Enter Facebook Api key</p>
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