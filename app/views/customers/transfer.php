<?php flash('error_amount'); ?>

<div class="small_container">
  <div class="row align-items-center">
    <div class="col">
      <div class="transfer_title">Transfer Money</div>
    </div>
  </div>
</div>

<form action="<?php echo URLROOT; ?>/customers/submit/transfer" method="post">
  <input type="hidden" name="from_person_id" value="<?php echo $data['customer_info']['customer_id']; ?>">
  <input id="to_person_id_input" type="hidden" name="to_person_id" value="0">

  <div class="row">

    <div class="col-12 col-md-6">
      <div class="small_container transfer_container">
        <div class="row">
          <div class="col-12">
            <div class="section_title">From:</div>
          </div>

          <div class="col-12">
            <div class="person_name"><?php echo $data['customer_info']['first_name'] . ' ' . $data['customer_info']['last_name']; ?></div>
          </div>

          <div class="col-12">
            <div class="amount_section">
              <label for="">Current Balance:</label>
              <?php echo number_format($data['customer_info']['balance'], 2); ?>
            </div>
          </div>

          <div class="col-12">
            <div class="amount_section">
              <label for="send_amount_input">Send Amount:</label>
              <input min="0" max="<?php echo $data['customer_info']['balance']; ?>" id="send_amount_input" type="number" step=".01" name="amount" value="0" required>
            </div>
          </div>

          <div class="col-12">
            <div class="amount_section">
              <label for="">New Balance:</label>
              <span id="new_balance"><?php echo number_format($data['customer_info']['balance'], 2); ?></span>
            </div>
          </div>

          <div class="col-12">
            <button id="confirm_from_person" type="button" name="button" class="btn btn-outline-primary confirm_button"></button>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6">
      <div id="to_person_container" class="small_container transfer_container">
        <div class="row">
          <div class="col-12">
            <div class="section_title">To:</div>
          </div>

          <div class="col-12 search_to_person">
            <label for="name_input">Search Customer Name</label>
            <input id="name_input" type="text" name="" value="">
            <div id="suggested_customer"></div>
          </div>

          <div class="col-12 selected_to_person">
            <div id="to_person_name" class="person_name"></div>
          </div>

          <div class="col-12 selected_to_person">
            <div class="amount_section">
              <label for="">Current Balance:</label>
              <span id="to_person_balance"></span>
            </div>
          </div>

          <div class="col-12">
            <button id="change_to_person" type="button" class="btn btn-outline-secondary">Change</button>
            <button id="confirm_to_person" type="button" class="btn btn-outline-primary confirm_button"></button>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="text-center">
    <button id="submit_send_button" type="submit" class="btn btn-primary">Transfer Money</button>
  </div>

</form>

<script type="text/javascript">
  var starting_balance = parseFloat(<?php echo $data['customer_info']['balance']; ?>).toFixed(2);
  var send_amount = 0;
  var new_balance = starting_balance;

  $('#send_amount_input').on("change", function() {
    update_balance();
  });

  function update_balance()
      {
      send_amount = parseFloat($('#send_amount_input').val()).toFixed(2);

      new_balance = format_to_money(starting_balance - send_amount);

      $('#new_balance').html(new_balance);
      }

  function format_to_money(amount)
      {
      amount = parseFloat(amount).toFixed(2);

      amount = format_commas(amount);

      return amount;
      }

  function format_commas(x)
      {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }


  $('#name_input').keyup(debounce(suggest_customer, 500));

  var input_name;
  var first_name;
  var last_name;
  var customer_id;
  var balance;

  function suggest_customer()
      {
      input_name = $('#name_input').val().trim();

      // hide person name suggestions
      $('#suggested_customer').hide();

      // search db and retrieve existing customers
      if(input_name == "")
          {
          $('#suggested_customer').hide();
          }
      else
          {
          $.ajax({
            type: "post",
            url: "<?php echo URLROOT; ?>/customers/ajax/search_customer",
            dataType: "json",
            data: {search_name: input_name},
            success: function(data)
                {
                if(data.length == 0)
                    {
                    $('#suggested_customer').html("no results found for " + input_name);
                    }
                else
                    {
                    $('#suggested_customer').html("");

                    suggestion_html = "";

                    // loop through suggestion results
                    $.each(data, function(index)
                        {
                        first_name = data[index].first_name;
                        last_name = data[index].last_name;
                        customer_id = data[index].customer_id;
                        balance = data[index].balance;

                        suggestion_html =
                          "<div data-customer-id=\"" + customer_id + "\" data-customer-name=\"" + first_name + " " + last_name + "\" data-customer-balance=\"" + balance + "\" class=\"suggestion_row\">" +
                              first_name + " " + last_name +
                          "</div>";

                        $('#suggested_customer').append(suggestion_html);
                        });
                    }

                $('#suggested_customer').show();
                }
              });
            }
        }

    $(document).on("click", '.suggestion_row', function() {
        $('#to_person_id_input').val($(this).attr('data-customer-id'));
        $('#to_person_name').text($(this).attr('data-customer-name'));
        $('#to_person_balance').text(format_to_money($(this).attr('data-customer-balance')));
        $('#to_person_container').addClass("found_customer");
        $('#name_input').val("");
    });

    $(document).on('click', '#change_to_person', function() {
      $('#suggested_customer').hide();
      $('#submit_send_button').hide();
      $('#to_person_id_input').val(0);
      $('#to_person_name').text("");
      $('#to_person_balance').text("");
      $('#to_person_container').removeClass("found_customer");
      $('#confirm_to_person').removeClass('has_confirmed');
      $('#name_input').val("");
    });

    $('.confirm_button').on('click', function() {
      $(this).toggleClass('has_confirmed');

      if(check_confirmed())
          {
          $('#submit_send_button').show();
          }
      else
          {
          $('#submit_send_button').hide();
          }
    });

    function check_confirmed()
        {
        if($('#confirm_to_person').hasClass('has_confirmed') && $('#confirm_from_person').hasClass('has_confirmed'))
            {
            return true;
            }
        else
            {
            return false;
            }
        }

    $('form').on('submit', function(e) {
      if(!check_confirmed())
          {
          e.preventDefault();
          alert('Both "Confirm" buttons must be pressed in order to submit');
          }
    })
</script>
