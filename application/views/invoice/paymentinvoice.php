<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <title><?php echo $title; ?></title>
  <style>
    
    .billing .form-control:focus {
      border: 0;
      border-bottom: 1px solid var(--red);
    }

    .aboutUs {
      margin: 10px;
      background-color: var(--red);
    }

    .product-bill-details {
      padding: 2.5rem;
      border-radius: 15px;
      background-color: white;
      box-shadow: 52px 20px 32px 24px #f5f5f5d6;
  }
    .btns-billing {
      text-align: center;

    }

    .about-heading {
      color: var(--white);
      font-weight: 700;
      font-size: 40px;
      line-height: 47px;
      display: flex;
      justify-content: center;
      position: relative;
      text-align: center;
    }

    .bill-input {
      border-top: 0px;
      border-left: 0px;
      border-right: 0px;
      border-radius: 0px;
      background-color: #FAFAFA;
    }

    .prod-img {
      width: 30%;
      height:
        19%
    }

    .bill-select {
      border-top: 0px;
      border-right: 0px;
      border-left: 0px;
      border-radius: 0px;
      background-color: #FAFAFA;
    }

    .text-zone ::placeholder {}

    .coupan-code {
      border: 1px solid #DEDEDE;
      border-radius: 2px;
      width: 50%
    }

    .apply-btn {
      width: 30%;
      border: none;
      background-color: var(--red);
      color: white;
      border-radius: 2px
    }

    .make-my-payment {
      background: var(--red);
      color: white;
      border: none;
      border-radius: 2px
    }

    .payment-btn {
      text-align: center;

    }

    .text-zone {
      border: 0.5px solid #D9D9D9;
      border-radius: 4px;
      width: 100%;
      color: #1e1e1e;
      padding: 15px
    }

    .billing-container {
      background: #FAFAFA;
      padding: 2.5rem 1.5rem 2.5rem 1.5rem
    }

    .billing-container .form-select:focus {
      border-color: var(--red);
      outline: 0;
      box-shadow: none;
    }

    .billing-container textarea:focus-visible {
      border-color: var(--red);
      outline: 0;
    }

    .product-bill-details td a {
      font-weight: 500;
      font-size: 16px;
      line-height: 19px;
      color: #333333;
    }
    td {
    font-weight: 500;
    color: #3e3e3e;
}
   .sub-total th {
      font-weight: 600;
      text-align: start;
    color: #3e3e3e;
    }
    td:first-child {
    border-left: 0;
}
table.table.sub-total td {
    border-left: none;
}
    .sub-total td {
        font-weight: 400;
        color: #686868c7;
    }
    .product-bill-details .table th {
      font-weight: 600;
    }

    .billing input[type="checkbox"] {
      appearance: none;
      width: 15px;
      height: 15px;
      border: 2px solid var(--blue);
      position: relative;
    }

    .billing input[type="checkbox"]:checked::before {
      position: absolute;
      content: "";
      background: url(../assets/images/check.svg) no-repeat;
      top: 50%;
      width: 90%;
      height: 90%;
      background-position: center;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .form-check {
      align-items: center;
      column-gap: 10px;
      padding-left: 4px;
    }

    .alert.alert-success.mx-auto.py-0 {
      text-align: start;
      width: 40%;
      padding-inline: 0.5rem;
      border: 0;
    }

    .btn-cls {
      margin-left: 0.5rem;
    }

    #billing_address .nav-pills .nav-link {
      color: var(--bs-black);
    }

    #billing_address .nav-pills .nav-link.active {
      color: var(--bs-white);
      background: var(--red);
    }

    #accountType {
      border-radius: 0;
      background: transparent;
      border-inline: 0;
      border-top: 0;
      background-size: 4%;
      background-position: 97% center;
    }

    @media(max-width:767px) {
      .coupan-code {
        font-size: 10px
      }

      .butn {
        padding: 5px 18px;
      }

      .apply-btn {
        font-size: 10px;
        margin: auto;

      }

      .call-button {
        margin: auto
      }

      .payment-btn {
        font-size: 10px;
        margin-bottom: 20px;
      }

      .btns-billing {
        display: flex;
        flex-direction: column;
        gap: 15px
      }

      .btns-billing input {
        margin: auto;
        width: 50%;
      }

      .table tr {
        display: flex;
        flex-direction: column;
        position: relative;
      }

      .table tr td svg {
        position: absolute;
        top: -25px;
        right: 0px;
      }

      .table tr td {
        border: none
      }

      .product-bill-details {
        padding: 0.5rem;
        border: 1px solid #DEDEDE;
        border-radius: 2px;
      }

    }

    input#flexCheckDefault {
      appearance: auto;
    }
  </style>


</head>

<body>
  <div class="second_header" style="background-color: #f8f9fa;">
    <div class="container-fluid ">
      <div class="row justify-content-between align-content-center">
        <div class="col-6">
        </div>
        <div class="col-6">
          <div class="leads-btn">
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="billing">
    <div class="container billing-container ">
      <div class="row">
        <div class="col-lg-7">
          <div class="alert alert-danger alert-dismissible fade show d-none alert" role="alert">
          <strong id="success_message"></strong> .
          <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> -->
          <span aria-hidden="true">&times;</span>
          </button>
          </div>
          <h2 class="mb-4"><span class="blue-color">Payment Information</span></h2>
          <form class="row" method="post" id="payment_form">
            <input type="hidden" id="payment_status" name="payment_status" value="2">
            <input type="hidden" name="total_amount" id="total_amount" value="<?php  echo $set_total_due_amount;?>">
            <input type="hidden" name="id" id="id" value="<?php if (!empty($invoice)) echo $invoice[0]->id; ?>">
            <input type="hidden" name="invoice_number" value="<?php if (!empty($invoice)) echo $invoice[0]->invoice_number; ?>">
            <div class="col-12 mb-5">
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="card-detail" role="tabpanel" aria-labelledby="card-detail-tab" tabindex="0">
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="cardNumber">Card Number</label>
                      <input type="text" name="card_number" value="<?php echo set_value('card_number');?>" id="cr_no" class="bill-input form-control" placeholder="xxxx-xxxx-xxxx-xxxx" minlength="19" maxlength="19" onkeyup="card_number(this.value)" fdprocessedid="aec70f">
                      <span class="text-danger" id="card_number"></span>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="cardNumber">Card Holder Name</label>
                      <input type="text" name="card_holder_name" value="<?php  echo set_value('card_holder_name');?>" class="bill-input form-control" placeholder="Name" onkeyup="this.value=this.value.replace(/[^A-z ]/g, '');" fdprocessedid="og9q5a">
                      <span class="text-danger" id="card_holder_name"></span>
                    </div>
                    <div class="col-md-6">
                      <label for="expDate">Expiry Date</label>
                      <div class="row">
                        <div class="col-6">
                          <select name="expiry_month" id="" class="bill-input form-control" fdprocessedid="gxg5ef">
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
                        <div class="col-6">
                          <select name="expiry_year" id="" class="bill-input form-control" fdprocessedid="dxh9a8">
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
                          <span class="text-danger" id="expiry_month"></span>  
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="cvvNumber">CVV</label>
                      <input type="password" name="cvv" class="bill-input form-control" maxlength="3" placeholder="" fdprocessedid="5v4l0g">
                      <span class="text-danger" id="cvv"></span>  
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <h2><span class="blue-color">
                Billing Details
              </span></h2>
            <input type="hidden" name="_token" value="IDrjeOdLJB2fEKek0GgiHyxHQzduHYap4sfcwHz7">
            <div class="col-md-6">
              <label class="mt-4 mb-1">First Name<span class="red-color"> *</span></label>
              <input value="<?php if (!empty($getnameinvoice)) { echo $getnameinvoice[0]->first_name; } else { echo set_value('first_name');} ?>" class="bill-input form-control" type="text" name="first_name" onkeyup="this.value=this.value.replace(/[^A-z ]/g, '');" fdprocessedid="tmjt5">
              <span id="first_name" class="text-danger"></span>
            </div>
            <div class="col-md-6">
              <label class="mt-4 mb-1">Last Name</label>
              <input value="<?php if (!empty($invoice)) {echo $invoice[0]->last_name;} ?>" type="text" class="bill-input form-control" name="lname" onkeyup="this.value=this.value.replace(/[^A-z ]/g, '');" fdprocessedid="rmbwls">
            </div>
            <div class="col-md-6">
              <label class="mt-4 mb-1">Company / Region<span class="red-color"> *</span></label>
              <input value="<?php echo set_value('region');?>" type="text" class=" bill-input form-control" name="region" fdprocessedid="la2ixe" >
              <span id="region" class="text-danger"></span>
            </div>
            <div class="col-md-6">
              <label class="mt-4 mb-1">Street address<span class="red-color"> *</span></label>
              <input value="<?php echo set_value('address');?>" type="text" class=" bill-input form-control" name="address" fdprocessedid="sxgdd">
              <span id="address" class="text-danger"></span>
            </div>
            <div class="col-md-6">
              <label class="mt-4 mb-1">Town/City<span class="red-color"> *</span></label>
              <input value="<?php  echo set_value('town_city');?>" type="text" class="bill-input form-control" name="town_city" fdprocessedid="eq9roc">
              <span id="town_city" class="text-danger"></span>
            </div>
            <div class="col-md-6">
              <label class="mt-4 mb-1">State<span class="red-color"> *</span></label>
              <input value="<?php echo set_value('state');?>" type="text" class=" bill-input form-control" name="state" fdprocessedid="caxwac">
              <span id="state" class="text-danger"></span>
            </div>
            <div class="col-md-6">
              <label class="mt-4 mb-1">Pin Code<span class="red-color"> *</span></label>
              <input value="<?php set_value('pin_code');?>" type="number" class="bill-input form-control" name="pin_code" maxlength="6" placeholder=" " fdprocessedid="c8b8l">
              <span id="pin_code" class="text-danger"></span>
            </div>
            <div class="col-md-6">
              <label class="mt-4 mb-1">Email address<span class="red-color"> *</span></label>
              <input value="<?php if (!empty($invoice)) {echo $invoice[0]->email;} else{ echo set_value('email'); } ?>" type="email" class="bill-input form-control" name="email" placeholder=" " fdprocessedid="tirmg">
              <span id="email" class="text-danger"></span>
            </div>
            <div class="col-md-12">
              <label class="mt-4 mb-1">Company name: (Optional)</label>
              <input value="<?php echo set_value('company_name');?>" type="text" class="bill-input form-control" name="company" placeholder=" " fdprocessedid="svlct9">
            </div>
            <div class="col-md-12">
              <div class="form-check mt-4 mb-1 d-flex">
                <span><input type="checkbox" id="flexCheckDefault" name="agree" value="1"></span>
                <label class="form-check-label" for="flexCheckDefault">
                  I have read and agree to Trust haven solution
                  <a href="#" target="_blank" class="red-color">Terms of service</a>
                  and <a href="#" target="_blank" class="red-color">Privacy Policy</a>.
                  <span id="agree" class="text-danger"></span>
                </label>
              </div>
              <div class="payment-btn pt-4 mt-4">
                <input id="contact_form" type="submit" class="btn btn_save" value="Pay Now">
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-5">
          <div class="product-bill-details">
            <h3><span class="red-color">Item</span></h3>
            <table class="table">
              <thead>
                <tr class="product">
                  <th>Item</th>
                  <th>Qty</th>
                  <th>Rate</th>
                  <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($getiteminvoice)) {
                  $n = 1;
                  foreach ($getiteminvoice as $row) { ?>
                    <tr>
                      <td><?= $row->item; ?></td>
                      <td><?= $row->quantity; ?></td>
                      <td><?= $row->amount; ?></td>
                      <td>$<?= $row->quantity * $row->amount; ?></td>
                    </tr>
                <?php $n++;
                  }
                }  ?>
              </tbody>
            </table>
            <table class="table sub-total">
              <tbody>
                <tr>
                  <th scope="row">Sub Total</th>
                  <td class="text-end" colspan="3">$<?php if (!empty($sub_total_first_name)) echo $sub_total_first_name[0]->total; ?></td>
                </tr>
                <tr>
                  <th scope="row">Taxable</th>
                  <td class="text-end" colspan="3">$<?php if (!empty($invoice)) echo $invoice[0]->taxable; ?></td>
                </tr>
                <tr>
                  <th scope="row">Other Charges</th>
                  <td class="text-end" colspan="3" id="discount">$<?php if (!empty($invoice)) echo $invoice[0]->other_charges; ?></td>
                </tr>
                <tr>
                  <th scope="row">Total Amount</th>

                  <td class="text-end" colspan="3" id="total_price">$<?php  echo $set_total_due_amount;?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
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
              if (data.card_holder_name != '') {
                $('#card_holder_name').html(data.card_holder_name);
              } else {
                $('#card_holder_name').html('');
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
              if (data.town_city != '') {
                $('#town_city').html(data.town_city);
              } else {
                $('#town_city').html('');
              }
              if (data.state != '') {
                $('#state').html(data.state);
              } else {
                $('#state').html('');
              }
              if (data.pin_code != '') {
                $('#pin_code').html(data.pin_code);
              } else {
                $('#pin_code').html('');
              }
              if (data.email != '') {
                $('#email').html(data.email);
              } else {
                $('#email').html('');
              }
              if (data.agree != '') {
                $('#agree').html(data.agree);
              } else {
                $('#agree').html('');
              }
            }
              if(data==1)
              {
             window.location.href = "<?=base_url()?>payment_success";
             }
            else if(data==2)
            {
                $("#success_message").html('Invalid Card');
            }
            else
            {
              window.location.href = "<?=base_url()?>payment_failed";
            }
              // $('#success_message').html(data.success);
              // if(data.success !=''){
              //   $(".alert").removeClass('d-none');
              // }
              // $('#card_number').html('');
              // $('#card_holder_name').html('');
              // $('#expiry_month').html('');
              // $('#expiry_year').html('');
              // $('#cvv').html('');
              // $('#first_name').html('');
              // $('#region').html('');
              // $('#address').html('');
              // $('#town_city').html('');
              // $('#state').html('');
              // $('#pincode').html('');
              // $('#email').html('');
              // $('#payment_form')[0].reset();
            
          }
        })
      });

    });
  </script>
</body>

</html>