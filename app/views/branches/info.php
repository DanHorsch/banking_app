<?php flash('success_saved'); ?>

<div class="small_container">
  <div class="row align-items-center">
    <div class="col">
      <div class="title_top_label">Branch</div>
      <h1 class="side_title"><?php echo $data['branch_info']['name']; ?></h1>
    </div>
    <div class="col-auto">
      <a href="<?php echo URLROOT . '/branches/form/' . $data['branch_info']['branch_id']; ?>" class="btn btn-outline-primary">Edit</a>
    </div>
  </div>

  <div class="section_container">

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label maxlength="100" for="branch_name">Branch Name:</label>
          </div>
          <div class="col-12 col-md-8">
            <div class="table_value">
              <?php echo $data['branch_info']['name']; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="branch_phone">Icon:</label>
          </div>
          <div class="col-12 col-md-8">
            <div class="table_value">
              <i class="<?php echo $data['branch_info']['icon_class']; ?>"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="branch_address">HQ Address:</label>
          </div>
          <div class="col-12 col-md-8">
            <div class="table_value">
              <?php echo $data['branch_info']['address']; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="branch_phone">HQ Phone:</label>
          </div>
          <div class="col-12 col-md-8">
            <div class="table_value">
              <?php echo $data['branch_info']['phone']; ?>
            </div>
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="branch_phone">Date Created:</label>
          </div>
          <div class="col-12 col-md-8">
            <div class="table_value">
              <?php echo date('F jS Y', strtotime($data['branch_info']['created_stamp'])); ?>
            </div>
          </div>
        </div>
      </div>

  </div>

  <div class="section_container">
    <div class="row">
      <div class="col">
        <h4>Locations</h4>
      </div>
      <div class="col-auto">
        <a class="btn btn-outline-success" href="<?php echo URLROOT . '/branches/location_form/' . $data['branch_info']['branch_id']; ?>">Add Location</a>
      </div>
    </div>

    <div class="row">
      <?php
      for($x = 0; $x < count($data['locations']); $x++)
          {
      ?>
          <div class="col-12 col-md-6">
            <div class="location_container">
              <div class="title"><?php echo $data['locations'][$x]['title']; ?></div>
              <div class="phone"><i class="fas fa-phone-square"></i> <?php echo $data['locations'][$x]['phone']; ?></div>
              <div class="address"><i class="fas fa-map-marker-alt"></i> <?php echo $data['locations'][$x]['address']; ?></div>
            </div>
          </div>
      <?php
          }
      ?>
    </div>

  </div>

</div>
