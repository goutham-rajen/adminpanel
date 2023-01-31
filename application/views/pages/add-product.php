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
                    Add Product
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a class="active">Add Product</a></li>
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
                                    <div class="panel-heading">Add Product
                                        <a href="<?= base_url() ?>admin/products " id="back-btn-product" class="btn btn-warning pull-right btn-placement-class">Back</a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="<?php echo site_url('admin/products/submit-add-product') ?>" method="post" enctype="multipart/form-data" id="frm-add-product" class="validate-custom-form-error">
                                                    <input type="hidden" value="add" name="opt_type">
                                                    <div class="form-group">
                                                        <label for="dd_add_product_category">Category:</label>
                                                        <select class="form-control" name="dd_add_product_category" id="dd_add_product_category" required>
                                                            <option value="">Choose Category</option>
                                                            <?php if (count($categories) > 0) {
                                                                foreach ($categories as $index => $option) {
                                                            ?>
                                                                    <option value="<?php echo $option->id ?>"><?php echo $option->name ?></option>
                                                            <?php }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dd_add_product_brand">Brand:</label>
                                                        <select class="form-control" name="dd_add_product_brand" id="dd_add_product_brand" required>
                                                            <option value="">Choose Brand</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txt_name">Name:</label>
                                                        <input type="text" class="form-control" id="txt_name" name="txt_name" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txt_description">Description:</label>
                                                        <textarea class="form-control" id="txt_description" name="txt_description" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="file_image">Product Image:</label>
                                                        <input type="file" class="form-control" id="file_image" name="file_image">
                                                        <br>
                                                        <?php
                                                            $image_attributes = get_option_value("product_image_settings");
                                                            if (!empty($image_attributes)) {
                                                                $image_attributes = unserialize($image_attributes);
                                                                echo "<b><i> Note*: Width: " . $image_attributes['width'] . "px, Height: " . $image_attributes['height'] . "px, Upload Size: " . $image_attributes['size'] . "kb </i></b>";
                                                            }
                                                        ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txt_amount">Amount (<?= get_option_value("site_currency") ?>):</label>
                                                        <input type="text" class="form-control" id="txt_amount" name="txt_amount" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dd_status">Status:</label>
                                                        <select class="form-control" name="dd_status" id="dd_status" required>
                                                            <option value="1">Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
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