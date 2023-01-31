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
                    Footer Settings
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a class="active">Footer Settings</a></li>
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
                                    <div class="panel-heading">Footer Settings
                                        <a href="<?= base_url() ?>admin/products " id="back-btn-product" class="btn btn-warning pull-right btn-placement-class">Back</a>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form action="<?php echo site_url('admin/settings/footer-settings-submit') ?>" method="post" id="frm-footer-settings" class="validate-custom-form-error">
                                                <?php 
                                                    $footer_settings = get_option_value("site_footer_settings");
                                                    $link = "";
                                                    $name = "";
                                                    if(!empty($footer_settings)){
                                                        $footer_settings = unserialize($footer_settings);
                                                        $link = $footer_settings["link"];
                                                        $name = $footer_settings["name"];
                                                    }
                                                ?>
                                                    <div class="form-group">
                                                        <label for="txt_link">Footer Link:</label>
                                                        <input type="text" value="<?= $link ?>" class="form-control" id="txt_link" name="txt_link" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txt_name">Footer Organization Name:</label>
                                                        <input type="text" value="<?= $name ?>" class="form-control" id="txt_name" name="txt_name" required>
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