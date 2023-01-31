<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Left side column. contains the logo and sidebar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Product Image Settings
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a class="active">Product Image Settings</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- /.box -->

                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">

                                <?php if ($this->session->flashdata('success')) { ?>
                                    <div class="alert alert-success">
                                        <?php echo $this->session->flashdata("success") ?>
                                    </div>
                                <?php } ?>

                                <?php if ($this->session->flashdata('error')) { ?>
                                    <div class="alert alert-danger">
                                        <?php echo $this->session->flashdata("error") ?>
                                    </div>
                                <?php } ?>
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Product Image Settings
                                        <a href="<?= base_url() ?>admin/products " id="back-btn-product" class="btn btn-warning pull-right btn-placement-class">Back</a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="<?php echo site_url('admin/settings/save-product-image-settings') ?>" method="post" id="frm-product-image-settings" class="validate-custom-form-error">

                                                    <?php
                                                    $image_attributes = get_option_value("product_image_settings");
                                                    $width = "";
                                                    $height = "";
                                                    $max_size = "";
                                                    $valid_extensions = array();
                                                    if (!empty($image_attributes)) {
                                                        $image_attributes = unserialize($image_attributes);
                                                        $width = $image_attributes['width'];
                                                        $height = $image_attributes['height'];
                                                        $max_size = $image_attributes['size'];
                                                        $valid_extensions = $image_attributes['extensions'];
                                                    }
                                                    ?>
                                                    <div class="form-group">
                                                        <label for="txt_width">Image Width (Px):</label>
                                                        <input type="number" value="<?= $width ?>" min="1" class="form-control" id="txt_width" name="txt_width" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txt_height">Image Height (Px):</label>
                                                        <input type="number" value="<?= $height ?>" min="1" class="form-control" id="txt_height" name="txt_height" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txt_max_size">Image Size (KB):</label>
                                                        <input type="number" min="1" value="<?= $max_size ?>" class="form-control" id="txt_max_size" name="txt_max_size" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txt_image_extensions">Select Image Extensions:</label>
                                                        <?php
                                                            if(count($valid_extensions) > 0){
                                                        ?>
                                                            <?php 
                                                                if(in_array("png", $valid_extensions)){
                                                                    echo '<input type="checkbox" name="chk_ext[]" value="png" checked /> PNG';
                                                                }else{
                                                                    echo '<input type="checkbox" name="chk_ext[]" value="png" /> PNG';
                                                                }

                                                                if(in_array("jpg", $valid_extensions)){
                                                                    echo '<input type="checkbox" name="chk_ext[]" value="jpg" checked /> JPG';
                                                                }else{
                                                                    echo '<input type="checkbox" name="chk_ext[]" value="jpg" /> JPG';
                                                                }

                                                                if(in_array("jpeg", $valid_extensions)){
                                                                    echo '<input type="checkbox" name="chk_ext[]" value="jpeg" checked /> JPEG';
                                                                }else{
                                                                    echo '<input type="checkbox" name="chk_ext[]" value="jpeg" /> JPEG';
                                                                }
                                                            ?>
                                                        <?php
                                                            }
                                                        ?>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- page script -->
</body>

</html>