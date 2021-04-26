
<div class="small_container">
  <h3 class="side_title">
    <?php
    if(empty($data['branch_info']['name']))
        {
        echo 'New Branch';
        }
    else
        {
        echo 'Edit: ' . $data['branch_info']['name'];
        }
    ?>
  </h3>

  <div class="section_container">
    <form action="<?php echo URLROOT; ?>/branches/submit/edit" method="post">

      <input type="hidden" name="branch_id" value="<?php echo $data['branch_info']['branch_id']; ?>">

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="branch_name">Branch Name: <sup>*</sup></label>
          </div>
          <div class="col-12 col-md-8">
            <input maxlength="100" required id="branch_name" type="text" name="name" value="<?php echo $data['branch_info']['name']; ?>">
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="branch_phone">Icon:</label>
          </div>
          <div class="col-12 col-md-8">
            <input id="icon_input" type="hidden" name="icon_class" value="<?php echo $data['branch_info']['icon_class']; ?>">
            <div id="icon_list">
              <?php
              foreach($data['bank_icons'] as $i => $icon)
                  {
                  $button_class="";

                  if($icon == $data['branch_info']['icon_class'])
                      {
                      $button_class="selected_button";
                      }

                  echo '<button class="' . $button_class . '" data-icon-class="' . $icon . '" type="button">';
                    echo '<i class="' . $icon . '"></i>';
                  echo '</button>';
                  }
              ?>
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
            <input id="branch_address" type="text" name="address" value="<?php echo $data['branch_info']['address']; ?>">
          </div>
        </div>
      </div>

      <div class="form_row">
        <div class="row">
          <div class="col-12 col-md-4">
            <label for="branch_phone">HQ Phone:</label>
          </div>
          <div class="col-12 col-md-8">
            <input id="branch_phone" type="text" name="phone" value="<?php echo $data['branch_info']['phone']; ?>">
          </div>
        </div>
      </div>

      <div class="form_button_row">
        <?php
        if(empty($data['branch_info']['branch_id']))
            {
            $cancel_link = "branches";
            }
        else
            {
            $cancel_link = "branches/" . $data['branch_info']['branch_id'];
            }

        echo '<a href="' . URLROOT . '/' . $cancel_link .'" class="btn btn-outline-secondary">Cancel</a>'
        ?>
        <button type="submit" class="btn btn-outline-success">Save Branch</button>
      </div>

    </form>
  </div>
</div>

<script type="text/javascript">
  var icon_class = "";
  $('#icon_list button').on('click', function() {
    icon_class = $(this).attr('data-icon-class');

    $('.selected_button').removeClass('selected_button');
    $(this).addClass('selected_button');

    $('#icon_input').val(icon_class);
  });
</script>
