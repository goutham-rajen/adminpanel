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
                    Invoice Details
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a class="active">Invoice Details</a></li>
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
                                    <div class="panel-heading">Invoice Details
                                        <a href="<?= site_url('admin/orders') ?>" id="invoice-btn-back" class="btn btn-warning pull-right btn-placement-class">Back</a>
                                    </div>
                                    <div class="panel-body">
                                        <div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div style="margin-bottom: 35px;" class="invoice-title">
                                                        <h2>Invoice</h2>
                                                        <h3 class="pull-right">Order # <?= $buyer->id ?></h3>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <address>
                                                                <strong>Billed To:</strong><br>
                                                                <?= $buyer->name ?><br>
                                                                <?= $buyer->address ?><br>
                                                                <?= $buyer->mobile ?><br>
                                                            </address>
                                                        </div>
                                                        <div class="col-xs-6 text-right">
                                                            <address>
                                                                <strong>Shipped To:</strong><br>
                                                                <?= $buyer->name ?><br>
                                                                <?= $buyer->address ?><br>
                                                                <?= $buyer->mobile ?><br>
                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <address>
                                                                <strong>Payment Method:</strong><br>
                                                                <?= ucfirst($buyer->payment_mode) ?><br>
                                                                <?= $buyer->email ?>
                                                            </address>
                                                        </div>
                                                        <div class="col-xs-6 text-right">
                                                            <address>
                                                                <strong>Order Date:</strong><br>
                                                                <?= $buyer->created_at ?><br><br>
                                                            </address>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title"><strong>Order summary</strong></h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="table-responsive">
                                                                <table class="table table-condensed">
                                                                    <thead>
                                                                        <tr>
                                                                            <td><strong>Item</strong></td>
                                                                            <td class="text-center"><strong>Price</strong></td>
                                                                            <td class="text-center"><strong>Quantity</strong></td>
                                                                            <td class="text-right"><strong>Totals</strong></td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php 
                                                                            $amount = 0;
                                                                            if(count($products) > 0){
                                                                                foreach($products as $key=>$value){
                                                                                    $amount += $value->total_amount;
                                                                        ?>
                                                                            <tr>
                                                                                <td><?= $value->name ?></td>
                                                                                <td class="text-center"><?= $value->amount ?></td>
                                                                                <td class="text-center"><?= $value->quantity ?></td>
                                                                                <td class="text-right"><?= $value->total_amount ?></td>
                                                                            </tr>
                                                                        <?php
                                                                                }
                                                                            }
                                                                        ?>
                                                                        <tr>
                                                                            <td class="thick-line"></td>
                                                                            <td class="thick-line"></td>
                                                                            <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                                                            <td class="thick-line text-right"><?= $amount ?>(<?= get_option_value("site_currency") ?>)</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="no-line"></td>
                                                                            <td class="no-line"></td>
                                                                            <td class="no-line text-center"><strong>Shipping</strong></td>
                                                                            <td class="no-line text-right">0</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="no-line"></td>
                                                                            <td class="no-line"></td>
                                                                            <td class="no-line text-center"><strong>Discount(%)</strong></td>
                                                                            <td class="no-line text-right"><?= $buyer->discount_percentage ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="no-line"></td>
                                                                            <td class="no-line"></td>
                                                                            <td class="no-line text-center"><strong>Total</strong></td>
                                                                            <td class="no-line text-right"><?= $amount - round($amount * ($buyer->discount_percentage/100), 2) ?>(<?= get_option_value("site_currency") ?>)</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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