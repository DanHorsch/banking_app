<h1>Reports</h1>

<form id="filter_form" action="<?php echo URLROOT; ?>/reports/" method="post">
  <div id="report_filter">
    <div class="row">

      <div class="col-12 col-md-4">
        <label for="sort_by">Sort By</label>
        <select id="sort_by" class="" name="sort_by">
          <option <?php if($data['filters']['sort_by'] == 'name') { echo 'selected'; } ?> value="name">Branch Name</option>
          <option <?php if($data['filters']['sort_by'] == 'total_balance') { echo 'selected'; } ?> value="total_balance">Total Balance</option>
          <option <?php if($data['filters']['sort_by'] == 'total_customers') { echo 'selected'; } ?> value="total_customers">Total Customers</option>
          <option <?php if($data['filters']['sort_by'] == 'highest_balance') { echo 'selected'; } ?> value="highest_balance">Highest Balance</option>
        </select>
        <select class="" name="sort_dir">
          <option <?php if($data['filters']['sort_dir'] == 'asc') { echo 'selected'; } ?> value="asc">ASC</option>
          <option <?php if($data['filters']['sort_dir'] == 'desc') { echo 'selected'; } ?> value="desc">DESC</option>
        </select>
      </div>

      <div class="col-12 col-md-4">
        <div class="filter_title text-center">Total Customers</div>
        <div class="row">
          <div class="col-6">
            <label for="min_customers">Min</label>
            <input id="min_customers" min="0" type="number" name="min_customers" value="<?php echo $data['filters']['min_customers']; ?>">
          </div>
          <div class="col-6">
            <label for="max_customers">Max</label>
            <input id="max_customers" min="1" type="number" name="max_customers" value="<?php echo $data['filters']['max_customers']; ?>">
          </div>
        </div>
      </div>

      <div class="col-12 col-md-4">
        <div class="filter_title text-center">Total Balance</div>
        <div class="row">
          <div class="col-6">
            <label for="min_balance">Min</label>
            <input id="min_balance" min="0" type="number" name="min_balance" value="<?php echo $data['filters']['min_balance']; ?>">
          </div>
          <div class="col-6">
            <label for="max_balance">Max</label>
            <input id="max_balance" min="1" type="number" name="max_balance" value="<?php echo $data['filters']['max_balance']; ?>">
          </div>
        </div>
      </div>

      <div class="col-12">
        <div id="filter_buttons" class="text-right">
          <a class="btn btn-outline-secondary" href="<?php echo URLROOT; ?>/reports">Reset</a>
          <button type="submit" class="btn btn-outline-primary">Run Report</button>
        </div>
      </div>

    </div>
  </div>
</form>

<div id="filter_table" class="table_container">
  <div class="table_header">
    <div class="table_row">
      <div class="row">
        <div class="col-1">#</div>
        <div class="col-4">Name</div>
        <div class="col">Total Customers</div>
        <div class="col">Total Balance</div>
        <div class="col">Highest Balance</div>
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
            <div class="col-12 col-md"><span class="mobile_label">Total Customers:</span><?php echo $data['branches'][$x]['total_customers']; ?></div>
            <div class="col-12 col-md"><span class="mobile_label">Total Balance:</span><?php echo number_format($data['branches'][$x]['total_balance'], 2); ?></div>
            <div class="col-12 col-md"><span class="mobile_label">Highest Balance:</span><?php echo number_format($data['branches'][$x]['highest_balance'], 2); ?></div>
          </div>
        </div>
    <?php
        }
    ?>
  </div>
</div>
