<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <?php $this->load->view('include/styles'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('include/header'); ?>
  
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('include/sidebar'); ?>
  
  <?php $this->load->view($page_content); ?>

  <?php $this->load->view('include/footer'); ?>

</div>
<!-- ./wrapper -->

<?php $this->load->view('include/scripts'); ?>

</body>
</html>
