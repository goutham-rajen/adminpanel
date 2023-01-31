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
                    List Categories
                    <small>advanced tables</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a class="active">List Categories</a></li>
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

                                <?php if($this->session->flashdata('success')) { ?> 
                                    <div class="alert alert-success">
                                        <?php echo $this->session->flashdata("success") ?>
                                    </div>
                                <?php } ?>

                                <?php if($this->session->flashdata('error')) { ?> 
                                    <div class="alert alert-danger">
                                        <?php echo $this->session->flashdata("error") ?>
                                    </div>
                                <?php } ?>
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Listing Categories
                                        <button id="btn-add-category" class="btn btn-warning pull-right btn-placement-class" data-toggle="modal" data-target="#category-modal">Add Category</button>
                                    </div>
                                    <div class="panel-body">
                                        <table id="list-categories" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Name</th>
                                                    <th>Created At</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    if(count($categories)){
                                                        foreach($categories as $index => $category){
                                                ?>
                                                    <tr>
                                                        <td><?= $index + 1 ?></td>
                                                        <td><?= $category->name ?></td>
                                                        <td><?= $category->created_at ?></td>
                                                        <td>
                                                            <?php if($category->status){ ?>
                                                                <button class="btn btn-success">Active</button>
                                                            <?php } else { ?>
                                                                <button class="btn btn-danger">Inactive</button>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-warning btn-edit-category" data-id="<?= $category->id ?>">Edit</button>
                                                            <button class="btn btn-danger btn-delete-category" data-id="<?= $category->id ?>">Delete</button>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                    }
                                                ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Name</th>
                                                    <th>Created At</th>
                                                    <th>Status</th>
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

    <div id="category-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="modal-title">Add Category</h4>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" class="validate-custom-form-error" id="frm-add-category" method="post">

                        <input type="hidden" id="opt_type" name="opt_type" value="add"/>
                        <input type="hidden" id="edit_id" name="edit_id" value=""/>

                        <div class="form-group">
                            <label for="txt_add_name">Name:</label>
                            <input type="text" class="form-control" id="txt_add_name" name="txt_add_name" required>
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