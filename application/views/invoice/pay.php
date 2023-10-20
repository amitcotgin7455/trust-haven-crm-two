<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

  <title>Document</title>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

  ::-webkit-scrollbar {
    width: 0px;
  }

  body {
    font-family: 'Poppins', sans-serif;
    color: #4f4f4f;
    font-weight: 500;
    margin: 0;
    padding: 0;

  }

  .header {
    background: #f3f3f3;
    display: grid;
    padding: 0px 0px 15px;
  }

  .container-header {
    width: 700px;
    margin: 25px auto 8px;
  }

  .client-name {
    background: #0a3161;
    padding: 15px 0px 8px;
    position: sticky;
    top: 0;
    z-index: 999;
  }

  .client-container {
    width: 700px;
    margin: auto;
  }

  .client-container h2 {
    color: #fff;
  }

  h3.balance-product {
    font-size: 28px;
    margin: 0;
  }

  .due-balance {
    margin: 0;
  }

  .due-balance {
    margin: 0;
    color: #b41e45;
    font-weight: 700;
  }

  .invoice {
    margin: 0;
    color: #838383;
    font-size: 12px;
  }

  h6.invoice-number {
    margin: 5px 0 5px 0;
    font-size: 16px;
  }

  .invoice-detail {
    display: flex;
    justify-content: space-between;

  }

  .invoice-block {
    background-color: #fff;
    padding: 0 30px;
    width: 700px;
    margin: auto !important;
    padding-top: 60px;
    position: relative;
    overflow: hidden;
  }

  .invoice-number-box.box-print {
    padding-right: 25px;
  }

  .invoice-number-box.date-print {
    padding-left: 25px;
    position: relative;
  }

  .download-print span {
    background: #fff;
    padding: 4px 5px 0 8px;
    margin-right: 8px;
    border: 1px solid #c3c3c3a6;
  }

  .invoice-number-box.date-print:before {
    content: "";
    position: absolute;
    left: -25px;
    top: 30px;
    background: #919191a1;
    width: 47px;
    height: 1.5px;
    transform: rotate(269deg);
  }

  .payment-method {
    padding: 60px 0;
  }

  button.accordion-button.collapsed {
    background: #fff;
    border-bottom: 1px solid #d5d5d5;
  }

  .accordion-button:focus {
    box-shadow: none;
  }

  .card-icon svg {
    width: 40px;
    margin-right: 10px;
  }

  .accordion-button:not(.collapsed) {
    background-color: #f3f3f3;
  }

  .accordion-body p {
    font-weight: 400;
  }

  .form-body .row {
    margin-bottom: 20px;
  }

  .btn_save {
    background: #b41e45;
    color: #fff;
  }

  .btn_save:hover {
    background-color: #0a3161;
    color: #fff;
  }

  .accordion-button {
    align-items: start;
  }

  .card-pay {
    font-size: 13px;
    font-weight: 500;
    position: relative;
    left: -104px;
    top: 23px;
  }

  .form-control:focus {
    border-color: #b41e45;
    outline: 0;
    box-shadow: none;
  }

  .spinner-border {
    width: 20px;
    height: 20px;
  }
</style>

<body class="">
  <div class="client-name">
    <div class="client-container">
      <h2><?=$getnameinvoice[0]->first_name.' ' .$getnameinvoice[0]->last_name?></h2>
    </div>
  </div>
  <div class="header">

    <div class="container-header">
      <div class="invoice-print ">
        <div class="invoice-detail">
          <div class="invoice-number-box box-print">
            <h3 class="balance-product">$<?php echo $set_total_due_amount; ?></h3>
            <p class="due-balance">Balance Due</p>
          </div>

          <div class="invoice-number-box date-print">
            <h6 class="invoice-number"><?php if (!empty($invoice)) echo $invoice[0]->invoice_number; ?></h6>
            <p class="invoice"><?php echo $invoice[0]->due_date; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="payment-method">
    <div class="container" style="width:700px; margin:auto;">
      <h4>Select your payment method to proceed</h4>
      <div class="row mt-5">
        <div class="payment-form">
          <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  <span class="card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="512" height="" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                      <g>
                        <path fill="#5d647f" d="M472 72H40C17.945 72 0 89.945 0 112v288c0 22.055 17.945 40 40 40h432c22.055 0 40-17.945 40-40V112c0-22.055-17.945-40-40-40z" data-original="#5d647f" class=""></path>
                        <path fill="#ffd100" d="M176 232H80c-8.837 0-16-7.163-16-16v-64c0-8.837 7.163-16 16-16h96c8.837 0 16 7.163 16 16v64c0 8.837-7.163 16-16 16z" data-original="#ffd100"></path>
                        <path fill="#b8bac0" d="M120 336H80c-8.837 0-16-7.163-16-16v-8c0-8.837 7.163-16 16-16h40c8.837 0 16 7.163 16 16v8c0 8.837-7.163 16-16 16zM224 336h-40c-8.837 0-16-7.163-16-16v-8c0-8.837 7.163-16 16-16h40c8.837 0 16 7.163 16 16v8c0 8.837-7.163 16-16 16zM328 336h-40c-8.837 0-16-7.163-16-16v-8c0-8.837 7.163-16 16-16h40c8.837 0 16 7.163 16 16v8c0 8.837-7.163 16-16 16zM432 336h-40c-8.837 0-16-7.163-16-16v-8c0-8.837 7.163-16 16-16h40c8.837 0 16 7.163 16 16v8c0 8.837-7.163 16-16 16z" data-original="#b8bac0"></path>
                        <path fill="#8a8895" d="M232 384H72c-4.422 0-8-3.582-8-8s3.578-8 8-8h160c4.422 0 8 3.582 8 8s-3.578 8-8 8zM336 384h-72c-4.422 0-8-3.582-8-8s3.578-8 8-8h72c4.422 0 8 3.582 8 8s-3.578 8-8 8z" data-original="#8a8895"></path>
                        <path fill="#ff9500" d="M192 192h-80v-16h80v-16h-80v-24H96v96h16v-24h80z" data-original="#ff9500"></path>
                        <circle cx="400" cy="184" r="48" fill="#ff4f19" data-original="#ff4f19"></circle>
                      </g>
                    </svg>
                  </span>
                  <b>Pay via Card </b>
                  <div class="card-pay">Make fast and secure payments through your card. </div>
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <div class="form-body">
                    <form class="row g-3 needs-validation" method="post" id="payment_form">
                      <input type="hidden" id="payment_status" name="payment_status" value="2">
                      <input type="hidden" name="total_amount" id="total_amount" value="<?php echo $set_total_due_amount; ?>">
                      <input type="hidden" name="id" id="id" value="<?php if (!empty($invoice)) echo $invoice[0]->id; ?>">
                      <input type="hidden" name="_token" value="IDrjeOdLJB2fEKek0GgiHyxHQzduHYap4sfcwHz7">
                      <input type="hidden" name="invoice_number" value="<?php if (!empty($invoice)) echo $invoice[0]->invoice_number; ?>">
                      <div class="card-deatail-box">
                        <div class="col-md-12">
                          <h5 class="form-title">Card Details</h5>
                          <h5 class="form-title text-danger" id="success_message"></h5>
                          <p>
                            Your card details are sent to Stripe via a secure SSL connection for payment processing. We do not store your card information on our server
                          </p>

                        </div>

                        <div class="col-md-12 mt-4">
                          <div class="row">
                            <div class="col-md-3">
                              <label for="cardcc-number" class="form-label">Card Number</label>
                            </div>
                            <div class="col-md-9">
                              <input type="text" name="card_number" value="<?= set_value('card_number'); ?>" id="cr_no" class="bill-input form-control" placeholder="xxxx-xxxx-xxxx-xxxx" minlength="19" maxlength="19" fdprocessedid="aec70f">
                              <span class="text-danger" id="card_number"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-3">
                              <label for="cvv" class="form-label">Expires on</label>
                            </div>
                            <div class="col-md-5">
                              <select name="expiry_month" class="bill-input form-control" fdprocessedid="gxg5ef">
                                <option value="1">Jan</option>
                                <option value="2">Feb</option>
                                <option value="3">Mar</option>
                                <option value="4">Apr</option>
                                <option value="5">May</option>
                                <option value="6">Jun</option>
                                <option value="7">Jul</option>
                                <option value="8">Aug</option>
                                <option value="9">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                              </select>
                              <span class="text-danger" id="expiry_month"></span>
                            </div>
                            <div class="col-md-4">
                              <select name="expiry_year" class="bill-input form-control" fdprocessedid="dxh9a8">
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                                <option value="2032">2032</option>
                                <option value="2033">2033</option>
                                <option value="2034">2034</option>
                                <option value="2035">2035</option>
                                <option value="2036">2036</option>
                                <option value="2037">2037</option>
                                <option value="2038">2038</option>
                              </select>
                              <span class="text-danger" id="expiry_year"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-3">
                              <label for="cvv" class="form-label">CVV</label>
                            </div>
                            <div class="col-md-9">
                              <input type="password" name="cvv" class="form-control" maxlength="3">
                              <span class="text-danger" id="cvv"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-3">
                              <label for="validationCustom01" class="form-label">First name</label>
                            </div>
                            <div class="col-md-9">
                              <input type="text" class="form-control" name="first_name" onkeyup="this.value=this.value.replace(/[^A-z ]/g, '');" value="<?= set_value('first_name') ?>">
                              <span class="text-danger" id="first_name"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-3">
                              <label for="validationCustom01" class="form-label">Last Name</label>
                            </div>
                            <div class="col-md-9">
                              <input type="text" class="form-control" name="last_name" onkeyup="this.value=this.value.replace(/[^A-z ]/g, '');" value="<?= set_value('last_name') ?>">
                              <span class="text-danger" id="last_name"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="billing-address-box mt-5">
                        <div class="col-md-12">
                          <h5 class="form-title">Billing Address</h5>
                          <p>
                            The billing address here must match the billing address of the cardholder.
                          </p>
                        </div>
                        <div class="col-md-12 mt-4">
                          <div class="row">
                            <div class="col-md-3">
                              <label for="cardcc-number" class="form-label">Address</label>
                            </div>
                            <div class="col-md-9">
                              <input type="text" class="form-control" name="address" value="<?= set_value('address') ?>">
                              <span class="text-danger" id="address"></span>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-3">
                              <label for="cvv" class="form-label">City</label>
                            </div>
                            <div class="col-md-9">
                              <input type="text" class="form-control" name="city" value="<?= set_value('city'); ?>">
                              <span class="text-danger" id="city"></span>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-3">
                              <label for="validationCustom01" class="form-label">Zip Code</label>
                            </div>
                            <div class="col-md-9">
                              <input type="number" class="form-control" name="zip_code" value="<?= set_value('zip_code'); ?>" id="validationCustom01">
                              <span class="text-danger" id="zip_code"></span>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-3">
                              <label for="validationCustom01" class="form-label">State</label>
                            </div>
                            <div class="col-md-9">
                              <input type="text" class="form-control" name="state" value="<?= set_value('state'); ?>" id="validationCustom01">
                              <span class="text-danger" id="state"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-3">
                            <label for="cvv" class="form-label">Country</label>
                          </div>
                          <div class="col-md-9">
                            <select class="form-control" id="" name="country" value="<?= set_value('country'); ?>">
                              <!-- <option selected>Select Country</option> -->
                              <!-- <option value=""></option> -->
                              <option>USA</option>
                            </select>
                            <span class="text-danger" id="country"></span>
                          </div>

                        </div>
                      </div>
                      <div class="col-12">
                        <!-- <button class="btn btn_save " type="submit">Make Payment</button> -->
                        <!-- <button id="contact_form" type="submit" class="btn btn_save" value="Make Payment">Make Payment <div class="spinner-border text-light" role="status"></div></button> -->
                        <input id="contact_form" type="submit" class="btn btn_save" value="Make Payment">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script>
    $('.close').click(function() {
      $(this).parent('.product').remove();
    });

    //Card number mask start
    var cardNum = document.getElementById('cr_no');
    cardNum.onkeyup = function(e) {
      if (this.value == this.lastValue) return;
      var caretPosition = this.selectionStart;
      var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
      var parts = [];

      for (var i = 0, len = sanitizedValue.length; i < len; i += 4) {
        parts.push(sanitizedValue.substring(i, i + 4));
      }

      for (var i = caretPosition - 1; i >= 0; i--) {
        var c = this.value[i];
        if (c < '0' || c > '9') {
          caretPosition--;
        }
      }
      caretPosition += Math.floor(caretPosition / 4);

      this.value = this.lastValue = parts.join('-');
      this.selectionStart = this.selectionEnd = caretPosition;
    }
    //Card number mask end

    function make_payment() {
      $('#billing_address').submit();
    }

    $('#card-detail-tab').on('click', function() {
      $('#payment_type').val(1);
      // Payment type value is 1 => Payment with card
    });
    $('#account-detail-tab').on('click', function() {
      $('#payment_type').val(0);
      // Payment type value is 0 => Payment with Account number
    })

    function lettersAndSpaceCheck(name) {
      var regEx = /^[a-z][a-z\s]*$/;
      if (name.value.match(regEx)) {
        return true;
      } else {
        alert("Please enter letters and space only.");
        return false;
      }
    }
  </script>

  <script>
    $(document).ready(function() {
      $('#payment_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
          url: "<?php echo base_url(); ?>View_invoice/paynow",
          method: "POST",
          data: $(this).serialize(),
          dataType: "json",
          success: function(data) {
            if (data.error) {
              if (data.card_number != '') {
                $('#card_number').html(data.card_number);
              } else {
                $('#card_number').html('');
              }
              if (data.expiry_month != '') {
                $('#expiry_month').html(data.expiry_month);
              } else {
                $('#expiry_month').html('');
              }
              if (data.expiry_year != '') {
                $('#expiry_year').html(data.expiry_year);
              } else {
                $('#expiry_year').html('');
              }
              if (data.cvv != '') {
                $('#cvv').html(data.cvv);
              } else {
                $('#cvv').html('');
              }
              if (data.first_name != '') {
                $('#first_name').html(data.first_name);
              } else {
                $('#first_name').html('');
              }
              if (data.last_name != '') {
                $('#last_name').html(data.last_name);
              } else {
                $('#last_name').html('');
              }
              if (data.region != '') {
                $('#region').html(data.region);
              } else {
                $('#region').html('');
              }
              if (data.address != '') {
                $('#address').html(data.address);
              } else {
                $('#address').html('');
              }
              if (data.city != '') {
                $('#city').html(data.city);
              } else {
                $('#city').html('');
              }
              if (data.zip_code != '') {
                $('#zip_code').html(data.zip_code);
              } else {
                $('#zip_code').html('');
              }
              if (data.state != '') {
                $('#state').html(data.state);
              } else {
                $('#state').html('');
              }
              if (data.country != '') {
                $('#country').html(data.country);
              } else {
                $('#country').html('');
              }

            }
            if (data == 1) {
               window.location.href = "<?= base_url() ?>payment_success?id=<?= $this->input->get('id'); ?>";
            } else if (data == 2) {
              $("#success_message").html('Invalid Card Details');
            } else if (data == 3) {
              window.location.href = "<?= base_url() ?>payment_failed?id=<?= $this->input->get('id'); ?>";
            } else {

            }

          }
        })
      });

    });

    //Card number mask start
    var cardNum = document.getElementById('cr_no');
    cardNum.onkeyup = function(e) {
      if (this.value == this.lastValue) return;
      var caretPosition = this.selectionStart;
      var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
      var parts = [];

      for (var i = 0, len = sanitizedValue.length; i < len; i += 4) {
        parts.push(sanitizedValue.substring(i, i + 4));
      }

      for (var i = caretPosition - 1; i >= 0; i--) {
        var c = this.value[i];
        if (c < '0' || c > '9') {
          caretPosition--;
        }
      }
      caretPosition += Math.floor(caretPosition / 4);

      this.value = this.lastValue = parts.join('-');
      this.selectionStart = this.selectionEnd = caretPosition;
    }
    //Card number mask end
  </script>

</body>

</html>