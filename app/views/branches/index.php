<?php flash('error_not_found'); ?>

<div class="row align-items-center">
  <div class="col">
    <h1>Branches</h1>
  </div>
  <div class="col-auto">
    <a href="<?php echo URLROOT; ?>/branches/form" class="btn btn-outline-success">Add Branch</a>
  </div>
</div>

<div class="table_container">
  <div class="table_header">
    <div class="table_row">
      <div class="row">
        <div class="col-1">#</div>
        <div class="col-4">Name</div>
        <div class="col">Address</div>
        <div class="col">Phone</div>
      </div>
    </div>
  </div>
  <div class="table_body">
    <?php
    for($x = 0; $x < count($data['branches']); $x++)
        {
    ?>
        <div class="table_row link_pointer" onclick="window.location='<?php echo URLROOT . "/branches/" . $data['branches'][$x]['branch_id']; ?>';">
          <div class="row">
            <div class="d-none d-md-block col-md-1"><?php echo $x + 1; ?></div>
            <div class="col-12 col-md-4 table_title"><?php echo '<i class="branch_icon ' . $data['branches'][$x]['icon_class'] . '"></i>' . $data['branches'][$x]['name']; ?></div>
            <div class="col-12 col-md"><span class="mobile_label">Address:</span><?php echo $data['branches'][$x]['address']; ?></div>
            <div class="col-12 col-md"><span class="mobile_label">Phone:</span><?php echo $data['branches'][$x]['phone']; ?></div>
          </div>
        </div>
    <?php
        }
    ?>
  </div>
</div>
