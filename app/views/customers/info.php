<?php flash('success_saved'); ?>
<?php flash('success_transfer'); ?>

<div class="small_container">
  <div class="row align-items-center">
    <div class="col">
      <div class="title_top_label">Customer</div>
      <h1 class="side_title"><?php echo $data['customer_info']['first_name'] . ' ' . $data['customer_info']['last_name']; ?></h1>
    </div>
    <div class="col-auto">
      <a href="<?php echo URLROOT . '/customers/transfer/' . $data['customer_info']['customer_id']; ?>" class="btn btn-outline-primary">Send</a>
      <a href="<?php echo URLROOT . '/customers/form/' . $data['customer_info']['customer_id']; ?>" class="btn btn-outline-primary">Edit</a>
    </div>
  </div>

  <div class="section_container">

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label maxlength="100" for="customer_name">Customer Name:</label>
          </div>
          <div class="col-12 col-md-8">
            <div class="table_value">
              <?php echo $data['customer_info']['first_name'] . ' ' . $data['customer_info']['last_name']; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label maxlength="100" for="customer_name">Branch:</label>
          </div>
          <div class="col-12 col-md-8">
            <div class="table_value">
              <?php echo $data['customer_info']['branch_name']; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="balance_phone">Balance:</label>
          </div>
          <div class="col-12 col-md-8">
            <div class="table_value">
              <?php echo number_format($data['customer_info']['balance'], 2); ?>
            </div>
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="customer_address">Address:</label>
          </div>
          <div class="col-12 col-md-8">
            <div class="table_value">
              <?php echo $data['customer_info']['address']; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="customer_phone">Phone Number:</label>
          </div>
          <div class="col-12 col-md-8">
            <div class="table_value">
              <?php echo $data['customer_info']['phone']; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="customer_phone">Date Created:</label>
          </div>
          <div class="col-12 col-md-8">
            <div class="table_value">
              <?php echo date('F jS Y', strtotime($data['customer_info']['created_stamp'])); ?>
            </div>
          </div>
        </div>
      </div>

  </div>
</div>
