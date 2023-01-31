<!-- jQuery 3 -->
<script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= base_url() ?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- datatable js file -->
<script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>

<!-- export buttons -->
<script src="<?php echo base_url() ?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jszip.min.js"  ></script>
<script src="<?php echo base_url() ?>assets/js/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/js/buttons.html5.min.js"></script>
<!-- export buttons end -->


<script>
  $(function() {

    /** Report Data Table FN */
    if ($("#list-orders").length > 0) {
      <?php 
        if(isset($report) && $report){
      ?>
          $('#list-orders').DataTable({
            dom: 'Bfrtip',
            buttons: [
              'copyHtml5',
              'excelHtml5',
              'csvHtml5',
              'pdfHtml5',
            ]
          });
      <?php 
        } else {
      ?>
          $('#list-orders').DataTable();
      <?php 
        }
      ?>
    }

    /** Report Data Table FN */
    if ($("#list-products").length > 0) {
      <?php 
        if(isset($report) && $report){
      ?>
          $('#list-products').DataTable({
            dom: 'Bfrtip',
            buttons: [
              'copyHtml5',
              'excelHtml5',
              'csvHtml5',
              'pdfHtml5',
            ]
          });
      <?php 
        } else {
      ?>
          $('#list-products').DataTable();
      <?php 
        }
      ?>
    }

    /** CTGRY Data Table FN */
    if ($("#list-categories").length > 0) {
      $('#list-categories').DataTable();
    }

    /** BRAND Data Table FN */
    if ($("#list-brands").length > 0) {
      $('#list-brands').DataTable();
    }

    /** CTGRY ADD FN */
    $('#frm-add-category').validate({
      submitHandler: function() {
        var postData = $("#frm-add-category").serialize() + "&action=save_category";
        $.post("<?= site_url('inventory-ajax') ?>", postData, function(response) {
          var data = $.parseJSON(response);
          location.reload();
        })
      }
    });

    /** BRAND ADD FN */
    $('#frm-add-brand').validate({
      submitHandler: function() {
        var postData = $("#frm-add-brand").serialize() + "&action=save_brand";
        $.post("<?= site_url('inventory-ajax') ?>", postData, function(response) {
          var data = $.parseJSON(response);
          location.reload();
        })
      }
    });

    /** PRODUCT VALIDATE FN */
    if ($('#frm-add-product').length > 0) {
      $('#frm-add-product').validate();
    }

    /** CTGRY EDIT FN */
    if ($(".btn-edit-category").length > 0) {
      $(".btn-edit-category").on("click", function() {
        var category_id = $(this).attr("data-id");
        var postData = "category_id=" + category_id + "&action=get_category";
        $.post("<?= site_url('inventory-ajax') ?>", postData, function(response) {

          var data = $.parseJSON(response);

          $('#txt_add_name').val(data.arr.data.name);
          $("#opt_type").val("edit");
          $("#edit_id").val(data.arr.data.id);
          $("#dd_status option[value='" + data.arr.data.status + "']").attr("selected", true);
          $("#category-modal").modal();
        })

        $("#modal-title").text("Update Category");
      })
    }

    /** BRAND EDIT FN */
    if ($(".btn-edit-brand").length > 0) {
      $(".btn-edit-brand").on("click", function() {
        var brand_id = $(this).attr("data-id");
        var postData = "brand_id=" + brand_id + "&action=get_brand";
        $.post("<?= site_url('inventory-ajax') ?>", postData, function(response) {

          var data = $.parseJSON(response);

          $('#txt_add_name').val(data.arr.data.name);
          $("#opt_type").val("edit");
          $("#edit_id").val(data.arr.data.id);
          $("#dd_status option[value='" + data.arr.data.status + "']").attr("selected", true);
          $("#dd_category option[value='" + data.arr.data.category_id + "']").attr("selected", true);
          $("#brand-modal").modal();
        })

        $("#modal-title").text("Update Category");
      })
    }

    /** CTGRY DELETE FN */
    $(document).on('click', ".btn-delete-category", function() {

      var delete_id = $(this).attr('data-id');
      var conf = confirm("Are you sure you want to delete?");

      if (conf) {
        var postData = "delete_id=" + delete_id + "&action=delete_category";
        $.post("<?= site_url('inventory-ajax') ?>", postData, function(response) {
          location.reload();
        })
      }

    })

    /** BRAND DELETE FN */
    $(document).on('click', ".btn-delete-brand", function() {

      var delete_id = $(this).attr('data-id');
      var conf = confirm("Are you sure you want to delete?");

      if (conf) {
        var postData = "delete_id=" + delete_id + "&action=delete_brand";
        $.post("<?= site_url('inventory-ajax') ?>", postData, function(response) {
          location.reload();
        })
      }
    })

    /** LIST CATEGORY BRANDS FN */
    if ($("#dd_add_product_category").length > 0) {
      $(document).on('change', "#dd_add_product_category", function() {
        var postData = "cat_id=" + $("#dd_add_product_category").val() + "&action=list_category_brands";
        $.post("<?= site_url('inventory-ajax') ?>", postData, function(response) {
          var data = $.parseJSON(response);

          var brands = "<option value=''>Select Brands</option>"

          $.each(data.arr.data, function(index, item) {
            brands += "<option value='" + item.id + "'>" + item.name + "</option>"
          })

          $("#dd_add_product_brand").html(brands);
        })
      })
    }

    /** Product DELETE FN */
    $(document).on('click', ".btn-delete-product", function() {

      var delete_id = $(this).attr('data-id');
      var conf = confirm("Are you sure you want to delete?");

      if (conf) {
        var postData = "delete_id=" + delete_id + "&action=delete_product";
        $.post("<?= site_url('inventory-ajax') ?>", postData, function(response) {
          location.reload();
        })
      }
    })

    /** Product Add Row FN */
    if ($("#btn-add-more").length > 0) {
      $(document).on('click', "#btn-add-more", function() {
        var postData = "action=add_more_product_row";

        $.post("<?= site_url('inventory-ajax') ?>", postData, function(response) {
          var data = $.parseJSON(response);
          $("#row-add-more-products").append(data.arr.template);
        })
      })
    }

    /** Product Add Row FN */
    $(document).on('click', '#btn-remove-row', function() {
      $(this).closest('.product-row').remove();
    })

    /** LIST ORDER CATEGORY BRANDS FN */
    $(document).on('change', ".dd_order_category", function() {
      var postData = "cat_id=" + $(this).val() + "&action=list_order_category_brands";
      var brands = "<option value=''>Select Brands</option>";
      $.ajax({
        url: "<?= site_url('inventory-ajax') ?>",
        data: postData,
        method: "POST",
        async: false,
        success: function(response) {
          var data = $.parseJSON(response);
          $.each(data.arr.data, function(index, item) {
            brands += "<option value='" + item.id + "'>" + item.name + "</option>";
          })
          console.log('brands', brands, $(this).closest(".product-row"));
        }
      })
      $(this).closest(".product-row").find(".dd_order_brand").html(brands);
    })

    /** LIST PRODUCTS ORDER PAGE FN */
    $(document).on('change', ".dd_order_brand", function() {
      var postData = "brand_id=" + $(this).val() + "&action=list_products";
      var brands = "<option value=''>Select Products</option>";
      $.ajax({
        url: "<?= site_url('inventory-ajax') ?>",
        data: postData,
        method: "POST",
        async: false,
        success: function(response) {
          var data = $.parseJSON(response);
          $.each(data.arr.data, function(index, item) {
            brands += "<option value='" + item.id + "'>" + item.name + "</option>";
          })
          console.log('brands', brands, $(this).closest(".product-row"));
        }
      })
      $(this).closest(".product-row").find(".dd_order_product").html(brands);
    })

     /** GET PRODUCTS INFO PAGE FN */
     $(document).on('change', ".dd_order_product", function() {
      var postData = "product_id=" + $(this).val() + "&action=get_product_information";
      var productAmount = 0;
      $.ajax({
        url: "<?= site_url('inventory-ajax') ?>",
        data: postData,
        method: "POST",
        async: false,
        success: function(response) {
          var data = $.parseJSON(response);
          productAmount = data.arr.data.amount;
        }
      })
      $(this).closest(".product-row").find(".txt_order_amount").val(productAmount);
      $(this).closest(".product-row").find(".txt_order_amount").attr("data-unit-price", productAmount);
    })

    $(document).on("keyup mouseup", ".txt_order_quantity", function(){

      var quantity = $(this).val();
      var unitPrice = $(this).closest('.product-row').find('.txt_order_amount').attr("data-unit-price")
      var totalAmount = quantity * unitPrice
      $(this).closest(".product-row").find(".txt_order_amount").val(totalAmount);
    })

    if($('#frm-profile-settings').length > 0){
      $('#frm-profile-settings').validate();
    }

    if($('#frm-product-image-settings').length > 0){
      $('#frm-product-image-settings').validate();
    }

    if($('#frm-footer-settings').length > 0){
      $('#frm-footer-settings').validate();
    }
  })
</script>