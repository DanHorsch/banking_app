<?php flash('error_not_found'); ?>

<div class="row align-items-center">
  <div class="col">
    <h1>Customer</h1>
  </div>
  <div class="col-auto">
    <a href="<?php echo URLROOT; ?>/customers/form" class="btn btn-outline-success">Add Customer</a>
  </div>
</div>

<div class="table_container">
  <div class="table_header">
    <div class="table_row">
      <div class="row">
        <div class="col-1">#</div>
        <div class="col-4">Name</div>
        <div class="col">Branch</div>
        <div class="col">Address</div>
      </div>
    </div>
  </div>
  <div class="table_body">
    <?php
    for($x = 0; $x < count($data['customers']); $x++)
        {
    ?>
        <div class="table_row link_pointer" onclick="window.location='<?php echo URLROOT . "/customers/" . $data['customers'][$x]['customer_id']; ?>';">
          <div class="row">
            <div class="d-none d-md-block col-md-1"><?php echo $x + 1; ?></div>
            <div class="col-12 col-md-4 table_title"><?php echo $data['customers'][$x]['first_name'] . ' ' . $data['customers'][$x]['last_name']; ?></div>
            <div class="col-12 col-md"><span class="mobile_label">Branch:</span><?php echo $data['customers'][$x]['branch_name']; ?></div>
            <div class="col-12 col-md"><span class="mobile_label">Address:</span><?php echo $data['customers'][$x]['address']; ?></div>
          </div>
        </div>
    <?php
        }
    ?>
  </div>
</div>
