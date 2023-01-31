 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       Dashboard
       <small>Control panel</small>
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li class="active">Dashboard</li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">
     <!-- Small boxes (Stat box) -->
     <div class="row">
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-aqua">
           <div class="inner">
             <h3><?= $categories ?></h3>
             <p>Categories</p>
           </div>
           <div class="icon">
             <i class="ion ion-bag"></i>
           </div>
           <a href="<?php echo site_url('admin/categories') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-green">
           <div class="inner">
             <h3><?= $brands ?></h3>
             <p>Brands</p>
           </div>
           <div class="icon">
             <i class="ion ion-stats-bars"></i>
           </div>
           <a href="<?php echo site_url('admin/brands') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-aqua">
           <div class="inner">
             <h3><?= $products ?></h3>
             <p>Products</p>
           </div>
           <div class="icon">
             <i class="ion ion-bag"></i>
           </div>
           <a href="<?php echo site_url('admin/products') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
       <div class="col-lg-3 col-xs-6">
         <!-- small box -->
         <div class="small-box bg-green">
           <div class="inner">
             <h3><?= $orders ?></h3>
             <p>Orders</p>
           </div>
           <div class="icon">
             <i class="ion ion-stats-bars"></i>
           </div>
           <a href="<?php echo site_url('admin/orders') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
     </div>
     <!-- /.row -->
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->