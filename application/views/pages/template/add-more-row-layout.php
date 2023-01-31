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
                <label for="txt_order_amount">Amount <?= get_option_value("site_currency") ?>:</label>
                <input type="number" readonly class="form-control txt_order_amount" id="txt_order_amount" name="txt_order_amount[]" required>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="form-group">
                <button type="button" style="margin-top: 23px;" class="btn-remove-row btn btn-danger" id="btn-remove-row">Remove</button>
            </div>
        </div>
    </div>