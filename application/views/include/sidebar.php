<?php 
  $active_menu = $this->uri->segment(2);
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="margin-bottom: 12px;">
        <div class="pull-left image">
          <?php 
            if($this->session->userdata("image")){
          ?>
            <img src="<?php echo $this->session->userdata("image")?>" class="img-circle" alt="User Image">
          <?php 
            }else{
          ?>
            <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          <?php 
            }
          ?>
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata("name") ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo site_url('admin') ?>" class="<?= empty($active_menu) ? "menu-active" : ""?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('admin/categories') ?>" class="<?= $active_menu == "categories" ? "menu-active" : ""?>">
            <i class="fa fa-dashboard"></i> <span>Categories</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('admin/brands') ?>" class="<?= $active_menu == "brands" ? "menu-active" : ""?>">
            <i class="fa fa-dashboard"></i> <span>Brands</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('admin/products') ?>" class="<?= $active_menu == "products" ? "menu-active" : ""?>">
            <i class="fa fa-dashboard"></i> <span>Products</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('admin/orders') ?>" class="<?= $active_menu == "orders" ? "menu-active" : ""?>">
            <i class="fa fa-dashboard"></i> <span>Orders</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('admin/reports') ?>" class="<?= $active_menu == "reports" ? "menu-active" : ""?>">
            <i class="fa fa-dashboard"></i> <span>Reports</span>
          </a>
        </li>
        <li class="treeview">
          <a href="javascript:void(0)" class="<?= ($active_menu == "profile-settings" || $active_menu == "currency-settings" || $active_menu == "product-image-settings" || $active_menu == "footer-settings") ? "menu-active" : ""?>">
            <i class="fa fa-share"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('admin/profile-settings') ?>"><i class="fa fa-circle-o"></i> Profile Settings</a></li>
            <li><a href="<?php echo site_url('admin/currency-settings') ?>"><i class="fa fa-circle-o"></i> Currency Settings</a></li>
            <li><a href="<?php echo site_url('admin/product-image-settings') ?>"><i class="fa fa-circle-o"></i> Product Image Settings</a></li>
            <li><a href="<?php echo site_url('admin/footer-settings') ?>"><i class="fa fa-circle-o"></i> Footer Settings</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>