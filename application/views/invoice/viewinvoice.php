<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Trust Haven Invoice</title>

</head>

<style>

  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

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

    padding: 0px 0 15px;

    position: sticky;

    top: 0;

    width: 100%;

    z-index: 9;

  }

  .container-header {

    width: 700px;

    margin: 15px auto 5px;

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

    margin-bottom: 0;

    color: #838383;

    font-size: 12px;

  }

  h6.invoice-number {

    margin: 5px 0 5px 0;

    font-size: 16px;

  }

  .invoice-detail {

    display: flex;

  }

  .invoice-block {

    background-color: #fff;

    padding: 0 30px;

    width: 700px;

    margin: 30px auto 30px !important;

    padding-top: 60px;

    position: relative;

    overflow: hidden;

    box-shadow: 0px 0px 55px 12px #e9e9e9;

  }

  .client-name {

    background: #0a3161;

  }

  .client-container {

    width: 700px;

    margin: auto;

  }

  .client-container h2 {

    color: #fff;

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

    top: 35px;

    background: #919191a1;

    width: 47px;

    height: 1.5px;

    transform: rotate(269deg);

  }

  .btn.btn_save {

    background: #b41e45;

    color: #fff;

    padding: 5px 13px;

    text-decoration: none;

    font-size: 12px;

    display: inline-block;

    position: relative;

    top: -3px;

    border-radius: 3px;

  }

  .btn.btn_save:hover {

    background-color: #0a3161;

  }

  .label {

    background: #b41e45;

    text-align: center;

    color: #fff;

    transform: rotate(319deg);

    position: absolute;

    width: 30%;

    left: -65px;

    top: 14px;

  }

  .label-paid {

    background: green;

    text-align: center;

    color: #fff;

    transform: rotate(319deg);

    position: absolute;

    width: 30%;

    left: -65px;

    top: 14px;

  }

  .invoice-print {

    display: flex;

    justify-content: space-between;

    align-items: end;

  }

  .img-log {

    width: 200px;

    margin: 10px 10px;

  }

  .d-flex1 {

    display: flex;

    justify-content: space-between;

  }

  .row {

    display: flex;

    justify-content: space-between;

  }

  .invoice-title {

    color: #b41e45;

    margin: 0;

    font-weight: 500;

  }

  .text-end {

    text-align: end;

  }

  .bold-class {

    font-size: 14px;

    font-weight: bold;

  }

  .light-class {

    font-size: 16px;

    font-weight: 400;

  }

  .row-new {

    margin-top: 40px;

    align-items: end;

    margin-bottom: 40px;

  }

  .row.row-new p {

    color: #5d5d5d;

    font-weight: 500;

  }

  .light-class-white {

    color: white;

    font-size: 16px;

    font-weight: 400;

  }

  .mx-3 {

    margin: 0;

  }

  .row.row-new p span {

    line-height: 2.4;

  }

  .collg6.date-invoice p span {

    width: 50%;

  }

  .invoice-heading {

    background-color: #b41e45;

  }

  th,

  td {

    font-size: 14px;

    font-weight: 500;

    padding: 10px 10px;

    text-align: start;

  }

  tr {

    /* border-bottom: 1px solid #bdbdbd; */

  }

  .sub-total th {

    color: #1e1e1e;

  }

  .invoice-data {

    background-color: #fff;

    font-size: 16px;

    font-weight: 400;

    /* / padding: 5px; / */

    /* / width: 1000px; / */

    /* / margin: 10px 20px; / */

  }

  .light-class-data {

    font-size: 16px;

    font-weight: 400;

    /* / padding-top: 10px; / */

    border-bottom: 1px solid black;

    /* / margin-bottom: 20px;  / */

    /* / padding-bottom: 10px; / */

  }

  .invoice-heading-total {

    background-color: #b41e45;

    font-size: 16px;

    font-weight: 400;

    color: #fff;

    /* / padding-top: 15px; / */

    /* / padding: 5px; / */

  }

  .light-class-term {

    font-size: 10px;

    line-height: 15px;

    font-weight: 500;

    margin-top: 5px;

  }

  .bar-code {

    /* / height: 150px; / */

    width: 90px;

  }

  .footer {

    border-bottom: 1px solid black;

    /* / padding-bottom: 100px; / */

  }

  table {

    border-collapse: collapse;

  }

  table th {

    color: #fff;

  }

  .sub-total-main tr {

    border: 0;

  }

  .row.row-scan {

    justify-content: flex-start;

    align-items: center;

  }

</style>

<body class="">

  <div class="second_header">

  </div>

  <div class="col-6">

    <div class="leads-btn">

      <form action="<?php echo base_url(); ?>invoice/resendinvoice" method="POST">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->id; ?>" name="hidden_id">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->first_name; ?>" name="first_name">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->last_name; ?>" name="last_name">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->invoice_status; ?>" name="invoice_status">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->mobile_1; ?>" name="mobile_1">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->mobile_2; ?>" name="mobile_2">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->invoice_number; ?>" name="invoice_number">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->order_number; ?>" name="order_number">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->email; ?>" name="email">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->date; ?>" name="date">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->due_date; ?>" name="due_date">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->description; ?>" name="description1">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->taxable; ?>" name="taxable">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->taxable; ?>" name="taxable_amount">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->discount; ?>" name="discount">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->discount_amount; ?>" name="discount_amount">

        <input type="hidden" value="<?php if (!empty($invoice)) echo $invoice[0]->other_charges; ?>" name="other_charges">

        <!-- <a href="<?php echo base_url(); ?>list-invoice" class="btn button_btn">Cancel </a>

                    <input type="submit" class="btn btn_save <?php echo $class; ?>" value="Resend Invoice"> -->

      </form>

    </div>

  </div>

  </div>

  </div>

  </div>

  <?php if ($invoice[0]->payment_status == 1) { ?>

    <div class="header">

      <div class="client-name">

        <div class="client-container">

          <h2><?php if (!empty($getnameinvoice)) echo $getnameinvoice[0]->first_name; ?> <?php if (!empty($invoice)) echo $invoice[0]->last_name; ?></h2>

        </div>

      </div>

      <div class="container-header">

        <div class="balance-box">

          <h3 class="balance-product">$<?php echo $set_total_due_amount; ?></h3>

          <?php if($invoice[0]->payment_status==1){ ?>

            <p class="due-balance">Balance Due</p>

            <?php } ?>

        </div>

        <div class="invoice-print ">

          <div class="invoice-detail">

            <div class="invoice-number-box box-print">

              <p class="invoice">Invoice #:</p>

              <h6 class="invoice-number"><?php echo $invoice[0]->date; ?></h6>

            </div>

            <div class="invoice-number-box date-print">

              <p class="invoice">Due Date:</p>

              <h6 class="invoice-number"><?php echo $invoice[0]->due_date; ?></h6>

            </div>

          </div>

          <div class="download-print">

            <span>

              <a href="#" onclick="printDiv('printableArea')" value="print a div!"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->

                  <path d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />

                </svg></a>

            </span>

            <span> 

              <a href="<?php echo base_url().'file/'.$invoice[0]->invoice_number.'.pdf'; ?>" download><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->

                  <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />

                </svg></a>

            </span>

            <a href="<?= base_url() ?>pay?id=<?php echo base64_encode($invoice[0]->id) ?>" class="btn  btn_save"> Pay Now</a>

          </div>

        </div>

      </div>

    </div>

  <?php } ?>

  <div class="container-fluid mt-5 mb-5 invoice-pdf" id="printableArea">

    <div class="row1">

      <div class="md-6 mx-4 invoice-block">

      <?php if($invoice[0]->payment_status==1){
            $due_date_exp = explode('-',$invoice[0]->due_date);
            $due_date = $due_date_exp[2].'-'.$due_date_exp[0].'-'.$due_date_exp[1].' 23:59:59';
            $timezone =  date_default_timezone_set("US/Pacific");
            $pstTime = date('Y-m-d H:i:s');
            $invoicePSTDate = date('Y-m-d H:i:s',strtotime($due_date));
            $due_date_second = (strtotime($pstTime) - strtotime($invoicePSTDate));
            $due_status = ($due_date_second > 1)?'Overdue':'Due';
          ?>
          
          <p class="label"><?=$due_status?></p> 

        <?php } else {?>

          <p class="label-paid">Paid</p>

        <?php } ?>

        <div class="d-flex1">

          <div class="collg6">

            <img src="https://www.trusthavensolution.com/assets/images/ths-logo.png" alt="" width="" class="img-log">

          </div>

          <div class="collg6">

            <h1 class="text-end invoice-title">Invoice</h1>

            <p class="text-end  mx-3 bold-class"><?php if (!empty($invoice)) echo $invoice[0]->invoice_number; ?></p>

            <!-- <p class="text-end  mx-3 bold-class"># <?php if (!empty($getnameinvoice)) echo $getnameinvoice[0]->first_name; ?> <?php if (!empty($invoice)) echo $invoice[0]->last_name; ?></p> -->

          </div>

        </div>

        <div class="row" style="margin-top: 20px;">

          <div class="collg6">

            <p class="text-start  mx-3 bold-class">Trust Haven Solution INC</p>

            <p class="text-start  mx-3 light-class">6915 Jennie Anne CT <br>Bakersfield California 93313 <br>U.S.A</p>

          </div>

          <div class="collg6">

            <?php if($invoice[0]->payment_status==1){ ?>

            <p class="text-end  mx-3 bold-class">Balance Due</p>

            <?php } ?>

            <p class="text-end mx-3 bold-class" style="font-size: 18px;">$<?php echo $set_total_due_amount; ?> </p>

          </div>

        </div>

        <div class="row row-new">

          <div class="collg6" style="width: 50%;">

            <p class="text-start  mx-3 light-class" style="font-weight: 400; font-size:15px;">Bill To</p>

            <p class="text-start  mx-3 bold-class" style="font-weight: 1000; color:black;">Mr. <?php if (!empty($getnameinvoice)) echo $getnameinvoice[0]->first_name; ?> <?php if (!empty($invoice)) echo $invoice[0]->last_name; ?></p>

          </div>

          <div class="collg6 date-invoice" style="width: 50%;">

            <p class="text-end  mx-3 bold-class d-flex1"><span>Invoice Date : </span><span><?php if (!empty($invoice)) echo $invoice[0]->date; ?></span></p>

            <p class="text-end  mx-3 bold-class d-flex1"><span>Terms : </span><span>Due on Receipt</span></p>

            <p class="text-end  mx-3 bold-class d-flex1"><span>Due Date : </span><span><?php if (!empty($invoice)) echo $invoice[0]->due_date; ?></span></p>

          </div>

        </div>

        <div class="row  mx-2 ">

          <table style="width:100%">

            <tr class="invoice-heading">

              <th style="width: 4%;">#</th>

              <th>Item & Description</th>

              <th class="text-end">Qty</th>

              <th class="text-end">Rate</th>

              <th class="text-end">Amount</th>

            </tr>

            <?php if (!empty($getiteminvoice)) {

              $n = 1;

              foreach ($getiteminvoice as $row) { ?>

                <tr>

                  <td><?= $n++; ?></td>

                  <td class=""><?= $row->item; ?><br> <span style="color:#ADB0B4;"><?= $row->description; ?></span></td>

                  <td class="text-end"><?=  number_format((float)$row->quantity, 2, '.', ''); ?></td>

                  <td class="text-end">$<?= number_format((float)$row->amount, 2, '.', ''); ?></td>

                  <td class="text-end">$<?= number_format((float)($row->quantity * $row->amount), 2, '.', ''); ?></td>

                </tr>

            <?php }

            } ?>

          </table>

        </div>

        <div class="row  mx-2 sub-total-main" style="margin-top: 20px; margin-right:30px;">

          <table style="width:100%">

            <tr class="sub-total">

              <th style="width: 4%;"></th>

              <th></th>

              <th class="text-end"></th>

              <th class="text-end">Sub Total</th>

              <th class="text-end" style="margin-left :-20px;">$<?php if (!empty($sub_total_first_name)) echo number_format((float)$sub_total_first_name[0]->total, 2, '.', ''); ?></th>

            </tr>

            <?php if($invoice[0]->discount)

            {

            ?>

            <tr>

            <td></td>

            <td class=""></td>

            <td class="text-end"></td>

            <td class="text-end">Discount ( <?=($invoice[0]->discount)?$invoice[0]->discount.'%':'0.00'?> )</td>

            <td class="text-end">$<?php if (!empty($invoice)) echo $invoice[0]->discount_amount; ?></td>

            </tr>

            <?php } ?>

            <tr>

              <td></td>

              <td class=""></td>

              <td class="text-end"></td>

              <td class="text-end">Other Charges</td>

              <td class="text-end">$<?php if (!empty($invoice)) echo $invoice[0]->other_charges; ?></td>

            </tr>

            <tr>

              <td></td>

              <td class=""></td>

              <td class="text-end"></td>

              <td class="text-end">Tax ( <?=($invoice[0]->tax_percentage)?$invoice[0]->tax_percentage.'%':'0.00'?> )</td>

              <td class="text-end">$<?php if (!empty($invoice)) echo $invoice[0]->taxable; ?></td>

            </tr>

            

           

          

            <tr>

              <td></td>

              <td class=""></td>

              <td class="text-end"></td>

              <td class="text-end"><b>Total</b></td>

              

              <td class="text-end"><b>$<?php echo $set_total_due_amount; ?></b></td>

            

            </tr>

            <tr>

              <td style="width: 20%;"></td>

              <td style="width: 20%;" class=""></td>

              <td style="width: 20%;" class="text-end"></td>

              <?php if($invoice[0]->payment_status==1){ ?>

              <td class="text-end" style="background-color: antiquewhite;"><b>Balance Due</b></td>

              <td class="text-end" style="background-color: antiquewhite;"><b>$<?php echo $set_total_due_amount; ?></b></td>

              <?php } ?>

            </tr>

          </table>

        </div>

        <div class=" mx-4">

          <!-- <p>Notes</p> -->

          <!-- <p style="font-size: 12px;"><?=$invoice[0]->custom_notes?></p> -->

          <!-- <p>Payment Options</p> -->

        </div>

        <!-- <div class="row row-scan  mx-4 mb-3 ">

          <div style="display: flex; align-items: center; background: #efefef; padding: 20px; border-radius: 10px;">

            <div class="lg-2 qr-code-section">

                <img src="<?= base_url(); ?>assets/images/qr.png" alt="" class="bar-code">

              </div>

              <div class="lg-10" style="margin-left: 5px;">

                <p class="text-start   light-class scan-qr-test"><b>Scan the QR code to pay online with your phone</b></p>

              </div>

              <div>

              </div>

          </div>

        </div> -->

        <div class=" mx-4 " style="width: 70%; margin-bottom: 100px;">

          <h5 style="margin-bottom:2px;">Terms & Conditions</h5>

          <p class="text-start   light-class-term"><?php if (!empty($invoice)) echo $invoice[0]->custom_notes; ?></p>

        </div>

        <!-- <div class="footer">

        </div> -->

      </div>

    </div>

  </div>

<script>

  function printDiv(divName) {

     var printContents = document.getElementById(divName).innerHTML;

     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;

  }

</script>

</body>

</html>