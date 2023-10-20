<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');
    body {
      font-family: 'Poppins', sans-serif;
      color: #4f4f4f;
      font-weight: 500;

    }
    p , span , tr, th, td, h1{
      font-family: 'Poppins', sans-serif;
    }
    .invoice-block {
      background-color: #fff;
      padding: 0 30px;
      width: 700px;
      margin: auto;
    }

    .img-log {
      width: 180px;
      margin: 10px 10px;
    }

    .d-flex1 {
      display: flex !important;
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

    .col-lg-6.date-invoice p span {
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
      border-bottom: 1px solid #bdbdbd;
    }

    .sub-total th {
      color: #1e1e1e;
    }

    .invoice-data {
      background-color: #fff;
      font-size: 16px;
      font-weight: 400;
      /* / padding: 5px; /
      / width: 1000px; /
      / margin: 10px 20px; / */
    }

    .light-class-data {
      font-size: 16px;
      font-weight: 400;
      /* / padding-top: 10px; / */
      border-bottom: 1px solid black;
      /* / margin-bottom: 20px;  /
      / padding-bottom: 10px; / */
    }

    .invoice-heading-total {
      background-color: #b41e45;
      font-size: 16px;
      font-weight: 400;
      color: #fff;
      /* / padding-top: 15px; /
      / padding: 5px; / */
    }

    .light-class-term {
      font-size: 14px;
      line-height: 15px;
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
</head>

<body class="bg-light">
  <div class="container-fluid mt-5 mb-5">
    <div class="row1">
      <div class="col-md-6 mx-4 invoice-block">
        <div class="d-flex1" style="width: 100%;">
          <div class="col-lg-6">
            <img style="margin-top:30px;" src="<?= base_url(); ?>ths_logo.jpg" class="img-log">
          </div>
          <div class="col-lg-6 " style="padding-left:600px; margin-top:-80px;">
            <h1 class="text-end invoice-title">Invoice</h1>
            <p class="text-end  mx-3 bold-class" style="padding-left:0px;"><?php if(!empty($invoice)) echo $invoice[0]->invoice_number;?></p>
            <!-- <p class="text-end  mx-3 light-class" style="padding-left:0px;"># <?php if(!empty($getnameinvoice)) echo $getnameinvoice[0]->first_name;?> <?php if(!empty($invoice)) echo $invoice[0]->last_name;?></p> -->
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6" style="margin-top:50px;">
            <p class="text-start  mx-3 bold-class">Trust Haven Solution INC</p>
            <p class="text-start  mx-3 light-class">6915 Jennie Anne CT <br>Bakersfield California 93313 <br>U.S.A</p>

          </div>
          <div class="col-lg-6" style="padding-left:600px; margin-top:-80px;">
            <p class="text-end  mx-3 light-class">Balance Due</p>
            <p class="text-end mx-3 bold-class" style="padding-left:0px; font-size: 18px;">$<?php  echo $set_total_due_amount;?> </p>
          </div>
        </div>
        <div class="row row-new">
          <div class="col-lg-6" style="width: 50%; margin-top:50px;">
            <p class="text-start  mx-3 light-class" style="font-weight: 400; font-size:15px;">Bill To</p>
            <p class="text-start  mx-3 bold-class" style="font-weight: 1000; color:black;">Mr. <?php if (!empty($getnameinvoice)) echo $getnameinvoice[0]->first_name; ?> <?php if (!empty($invoice)) echo $invoice[0]->last_name; ?></p>
          </div>
          <div class="col-lg-6 date-invoice" style="padding-left:500px; margin-top:-60px; margin-bottom:10px;">
            <p class="text-end  mx-3 bold-class d-flex1" style="margin-bottom:10px; padding-left:10px;"><span>Invoice Date : </span><span><?php echo $invoice[0]->date; ?></span></p>

            <p class="text-end  mx-3 bold-class d-flex1" style="margin-bottom:10px; padding-left:30px;"><span>Terms : </span><span>Due on Receipt</span></p>

            <p class="text-end  mx-3 bold-class d-flex1" style="margin-bottom:10px; padding-left:30px;"><span>Due Date : </span><span><?php echo $invoice[0]->due_date; ?></span></p>
          </div>
        </div>

        <div class="row  mx-2 ">
        <table  style="width:100%">
                <tr class="invoice-heading">
                  <th style="width: 4%;">#</th>
                  <th>Item & Description</th>
                  <th class="text-end">Qty</th>
                  <th class="text-end">Rate</th>
                  <th class="text-end">Amount</th>
                </tr>
                <?php if(!empty($getiteminvoice)){
                $n=1;
                foreach($getiteminvoice as $row){?>
                <tr>
                  <td><?= $n++;?></td>
                  <td class=""><?= $row->item;?><br> <span style="color:#ADB0B4;"><?= $row->description;?></span></td>
                  <td class="text-end"><?= $row->quantity;?></td>
                  <td class="text-end">$<?= number_format((float)$row->amount, 2, '.', ''); ?></td>
                  <td class="text-end">$<?= number_format((float)($row->quantity*$row->amount), 2, '.', '');?></td>
                </tr>
                <?php  }  } ?>
              </table>
        </div>
        <div class="row mx-2 sub-total-main" style="margin-top: 20px; margin-right:50px;">
        <table  style="width:100%">
                <tr class="sub-total">
                  <th style="width: 4%;"></th>
                  <th></th>
                  <th class="text-end"></th>
                  <th class="text-end">Sub Total</th>
                  <th class="text-end">$<?php if(!empty($sub_total_first_name)) echo number_format((float)$sub_total_first_name[0]->total, 2, '.', ''); ?></th>
                </tr>
                <?php
                if($invoice[0]->discount)
                {
                  ?>
                <tr>
                  <td></td>
                  <td class=""></td>
                  <td class="text-end"></td>
                  <td class="text-end">Discount ( <?php if(!empty($invoice[0]->discount)) echo $invoice[0]->discount;?>% )</td>
                  <td class="text-end">$<?php if(!empty($invoice)) echo $invoice[0]->discount_amount;?></td>
                </tr>
                <?php } ?>
                <tr>
                  <td></td>
                  <td class=""></td>
                  <td class="text-end"></td>
                  <td class="text-end">Other Charges</td>
                  <td class="text-end">$<?php if(!empty($invoice)) echo $invoice[0]->other_charges;?></td>
                </tr>
                <tr>
                  <td></td>
                  <td class=""></td>
                  <td class="text-end"></td>
                  <td class="text-end">Tax ( <?php if(!empty($invoice[0]->tax_percentage)) echo $invoice[0]->tax_percentage;?>% )</td>
                  <td class="text-end">$<?php if(!empty($invoice)) echo $invoice[0]->taxable;?></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td class=""></td>
                    <td class="text-end"></td>
                    <td class="text-end"><b>Total</b></td>
                    <td class="text-end"><b>$<?php  echo $set_total_due_amount;?></b></td>
                  </tr>
                  <tr>
                    <td style="width: 20%;"></td>
                    <td style="width: 20%;" class=""></td>
                    <td style="width: 20%;" class="text-end"></td>
                    <td class="text-end" style="background-color: antiquewhite;"><b>Balance Due</b></td>
                    <td class="text-end" style="background-color: antiquewhite;"><b>$<?php  echo $set_total_due_amount;?></b></td>
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
            <div class="col-lg-2 qr-code-section">
              <img src="<?= base_url(); ?>qr.jpg" alt="" class="bar-code">
            </div>
            <div class="col-lg-10" style="margin-left: 5px;">
              <p class="text-start   light-class scan-qr-test" style="padding-left:100px; margin-top:-60px; margin-bottom:40px;"><b>Scan the QR code to pay online with your phone</b></p>
            </div>
            <div>

            </div>
          </div>
        </div> -->
        <div class=" mx-4 " style="width: 70%; margin-bottom: 100px;">
          <h5>Terms & Conditions</h5>
          <p class="text-start   light-class-term"><?php if(!empty($invoice)) echo $invoice[0]->custom_notes;?></p>
        </div>
        <!-- <div class="footer">

        </div> -->
      </div>
    </div>
  </div>
</body>

</html>