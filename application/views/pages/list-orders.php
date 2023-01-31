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
                    List Orders
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a class="active">List Orders</a></li>
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
                                    <div class="panel-heading">Listing Orders
                                        <a href="<?= $report ? site_url('admin/reports') : site_url('admin/orders/add-order') ?>" id="btn-add-order" class="btn btn-warning pull-right btn-placement-class"><?= $report ? "Back" : "Add Order" ?></a>
                                    </div>
                                    <div class="panel-body">
                                        <table id="list-orders" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Customeer Information</th>
                                                    <th>Total Products</th>
                                                    <th>Total Amount</th>
                                                    <th>Discount</th>
                                                    <th>Created At</th>
                                                    <th>Payment Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (count($buyers) > 0) {
                                                    foreach ($buyers as $index => $buyer) {
                                                        $order_info = $order_controller->get_buyer_product_info($buyer->id);
                                                ?>
                                                        <td><?= $index + 1 ?></td>
                                                        <td>
                                                            <?= "Name: " . $buyer->name . "<br/>Email: " . $buyer->email . "<br/>Phone: " . $buyer->mobile ?>
                                                        </td>
                                                        <td><?= $order_info->total_products ?></td>
                                                        <td><?= $order_info->total_amount ?></td>
                                                        <td><?= $buyer->discount_percentage ?></td>
                                                        <td><?= $buyer->created_at ?></td>
                                                        <td><?= ucfirst($buyer->payment_mode) ?></td>
                                                        <td>
                                                            <a href="<?= site_url('admin/orders/invoice-detail/' . $buyer->id) ?>" class="btn btn-success">Invoice Detail</a>
                                                        </td>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Customeer Information</th>
                                                    <th>Total Products</th>
                                                    <th>Total Amount</th>
                                                    <th>Discount</th>
                                                    <th>Created At</th>
                                                    <th>Payment Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tr>
                                            </tfoot>
                                        </table>
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