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
                    List Products
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a class="active">List Products</a></li>
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
                                    <div class="panel-heading">Listing Products
                                        <a href="<?= $report ? site_url('admin/reports') : site_url('admin/products/add-product') ?>" id="btn-add-product" class="btn btn-warning pull-right btn-placement-class"><?= $report ? "Back" : "Add Product" ?></a>
                                    </div>
                                    <div class="panel-body">
                                        <table id="list-products" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Brand</th>
                                                    <th>Created At</th>
                                                    <th>Status</th>
                                                    <?php
                                                    if (!$report) {
                                                    ?>
                                                        <th>Action</th>
                                                    <?php }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (count($products)) {
                                                    foreach ($products as $index => $product) {
                                                ?>
                                                        <tr>
                                                            <td><?= $index + 1 ?></td>
                                                            <td>
                                                                <img src="<?= $product->image ? $product->image : base_url() . "assets/images/no-product-image.jpg" ?>" style="height: 80px; width: 80px;" alt="Product Image">
                                                            </td>
                                                            <td><?= $product->name ?></td>
                                                            <td>
                                                                <?php
                                                                $category_name = $product_controller->get_category_name($product->category_id);
                                                                echo $category_name->name;
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $brand_name = $product_controller->get_brand_name($product->brand_id);
                                                                echo $brand_name->name;
                                                                ?>
                                                            </td>
                                                            <td><?= $product->created_at ?></td>
                                                            <td>
                                                                <?php if ($product->status) { ?>
                                                                    <button class="btn btn-success">Active</button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-danger">Inactive</button>
                                                                <?php } ?>
                                                            </td>
                                                            <?php
                                                              if (!$report) {
                                                            ?>
                                                                <td>
                                                                    <a class="btn btn-warning btn-edit-product" href="<?= base_url() . "admin/products/edit-product/" . $product->id ?>" data-id="<?= $product->id ?>">Edit</a>
                                                                    <button class="btn btn-danger btn-delete-product" data-id="<?= $product->id ?>">Delete</button>
                                                                </td>
                                                            <?php 
                                                            }
                                                            ?>
                                                        </tr>
                                                <?php }
                                                }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Brand</th>
                                                    <th>Created At</th>
                                                    <th>Status</th>
                                                    <?php
                                                    if (!$report) {
                                                    ?>
                                                        <th>Action</th>
                                                    <?php }
                                                    ?>
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