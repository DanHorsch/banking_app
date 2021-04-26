
<div class="small_container">
  <h3 class="side_title">
    New Location
  </h3>

  <div class="section_container">
    <form action="<?php echo URLROOT; ?>/branches/submit/edit_location" method="post">

      <input type="hidden" name="branch_id" value="<?php echo $data['location_info']['branch_id']; ?>">

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="location_title">Location Title: <sup>*</sup></label>
          </div>
          <div class="col-12 col-md-8">
            <input maxlength="100" required id="location_title" type="text" name="title" value="<?php echo $data['location_info']['title']; ?>">
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="location_address">Address:</label>
          </div>
          <div class="col-12 col-md-8">
            <input id="location_address" type="text" name="address" value="<?php echo $data['location_info']['address']; ?>">
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="location_phone">Phone:</label>
          </div>
          <div class="col-12 col-md-8">
            <input id="location_phone" type="text" name="phone" value="<?php echo $data['location_info']['phone']; ?>">
          </div>
        </div>
      </div>

      <div class="form_button_row">
        <?php
        $cancel_link = "branches/" . $data['location_info']['branch_id'];

        echo '<a href="' . URLROOT . '/' . $cancel_link .'" class="btn btn-outline-secondary">Cancel</a>'
        ?>
        <button type="submit" class="btn btn-outline-success">Save Location</button>
      </div>

    </form>
  </div>
</div>
