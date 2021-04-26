
<div class="small_container">
  <h3 class="side_title">
    <?php
    if(empty($data['customer_info']['first_name']))
        {
        echo 'New Customer';
        }
    else
        {
        echo 'Edit: ' . $data['customer_info']['first_name'] . ' ' . $data['customer_info']['last_name'];
        }
    ?>
  </h3>

  <div class="section_container">
    <form action="<?php echo URLROOT; ?>/customers/submit/edit" method="post">

      <input type="hidden" name="customer_id" value="<?php echo $data['customer_info']['customer_id']; ?>">

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label>Customer Name: <sup>*</sup></label>
          </div>
          <div class="col-12 col-md-8">
            <div class="row">
              <div class="col-6">
                <label for="first_name">First Name</label>
                <input required id="first_name" type="text" name="first_name" value="<?php echo $data['customer_info']['first_name']; ?>">
              </div>
              <div class="col-6">
                <label for="last_name">Last Name</label>
                <input required id="last_name" type="text" name="last_name" value="<?php echo $data['customer_info']['last_name']; ?>">
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label>Branch:</label>
          </div>
          <div class="col-12 col-md-8">
            <select class="" name="branch_id">
              <option value="0">-- No Branch --</option>
              <?php
              for($x = 0; $x < count($data['branches']); $x++)
                  {
                  $selected_tag = "";

                  if($data['customer_info']['branch_id'] == $data['branches'][$x]['branch_id'])
                      {
                      $selected_tag = "selected";
                      }

                  echo '<option value="' . $data['branches'][$x]['branch_id'] . '" ' . $selected_tag . '>';
                      echo $data['branches'][$x]['name'];
                  echo '</option>';
                  }
              ?>
            </select>
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="customer_balance">Balance:</label>
          </div>
          <div class="col-12 col-md-8">
            <input id="customer_balance" type="number" step=".01" name="balance" value="<?php echo $data['customer_info']['balance']; ?>">
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="customer_address">Address:</label>
          </div>
          <div class="col-12 col-md-8">
            <input id="customer_address" type="text" name="address" value="<?php echo $data['customer_info']['address']; ?>">
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="customer_phone">Phone Number:</label>
          </div>
          <div class="col-12 col-md-8">
            <input id="customer_phone" type="text" name="phone" value="<?php echo $data['customer_info']['phone']; ?>">
          </div>
        </div>
      </div>

      <div class="form_button_row">
        <?php
        if(empty($data['customer_info']['customer_id']))
            {
            $cancel_link = "customers";
            }
        else
            {
            $cancel_link = "customers/" . $data['customer_info']['customer_id'];
            }

        echo '<a href="' . URLROOT . '/' . $cancel_link .'" class="btn btn-outline-secondary">Cancel</a>'
        ?>
        <button type="submit" class="btn btn-outline-success">Save Customer</button>
      </div>

    </form>
  </div>
</div>
