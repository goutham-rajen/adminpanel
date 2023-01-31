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
                    Create Order
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a class="active">Create Order</a></li>
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
                                    <div class="panel-heading">Create Order
                                        <a href="<?= base_url() ?>admin/orders " id="back-btn-orders" class="btn btn-warning pull-right btn-placement-class">Back</a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="<?php echo site_url('admin/orders/submit-create-order') ?>" method="post" id="frm-add-order" class="validate-custom-form-error">
                                                    <h4>Buyer Information</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="txt_name">Name:</label>
                                                                    <input type="text" class="form-control" id="txt_name" name="txt_name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="txt_email">Email:</label>
                                                                    <input type="email" class="form-control" id="txt_email" name="txt_email" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="txt_number">Contact Number:</label>
                                                                    <input type="number" class="form-control" id="txt_number" name="txt_number" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="txt_address">Address:</label>
                                                                    <textarea class="form-control" id="txt_address" name="txt_address" required></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h4>Product Information</h4>
                                                    <hr>
                                                    <button type="button" class="btn btn-warning pull-right" id="btn-add-more">Add More</button>
                                                    <div class="row" id="row-add-more-products">
                                                        <div class="col-sm-12 product-row">
                                                            <div class="col-sm-2">
                                                                <label for="dd_order_category">Category:</label>
                                                                <select class="form-control dd_order_category" name="dd_order_category[]" id="dd_order_category" required>
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
                                                            <div class="col-sm-2">
                                                                <label for="dd_order_brand">Brand:</label>
                                                                <select class="form-control dd_order_brand" name="dd_order_brand[]" id="dd_order_brand" required>
                                                                    <option value="">Choose Brand</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <label for="dd_order_product">Product:</label>
                                                                <select class="form-control dd_order_product" name="dd_order_product[]" id="dd_order_product" required>
                                                                    <option value="">Choose Product</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <div class="form-group">
                                                                    <label for="txt_order_quantity">Quantity:</label>
                                                                    <input type="number" min="1" value="1" class="form-control txt_order_quantity" id="txt_order_quantity" name="txt_order_quantity[]" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <div class="form-group">
                                                                    <label for="txt_order_amount">Amount (<?= get_option_value("site_currency") ?>):</label>
                                                                    <input type="number" readonly class="form-control txt_order_amount" id="txt_order_amount" name="txt_order_amount[]" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h4>Additional Information</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="txt_discount">Discount(%):</label>
                                                                    <input type="number" min="1" class="form-control" id="txt_discount" name="txt_discount" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="dd_payment_mode">Payment Mode:</label>
                                                                    <select class="form-control" name="dd_payment_mode" id="dd_payment_mode" required>
                                                                        <option value="cash">Cash</option>
                                                                        <option value="pending">Pending</option>
                                                                        <option value="online">Online Transfer</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="dd_status">Status:</label>
                                                                    <select class="form-control" name="dd_status" id="dd_status" required>
                                                                        <option value="1">Active</option>
                                                                        <option value="0">Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit Order</button>
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