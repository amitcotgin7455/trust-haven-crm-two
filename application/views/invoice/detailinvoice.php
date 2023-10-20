<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>

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



  /* .btn.btn_save {

    background: #b41e45;

    color: #fff;

    padding: 5px 13px;

    text-decoration: none;

    font-size: 12px;

    display: inline-block;

    position: relative;

    top: -3px;

    border-radius: 3px;

  } */



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

  .label-paid{

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

  td {

    border-left: none;

  }



</style>

</head>



<body class="bg-light">

<div class="second_header">

    <div class="container-fluid ">

        <div class="row justify-content-between align-content-center">

            <div class="col-6">

            <h5 class="d-inline"><?php echo $sub_heading;?></h5>

                <!-- <a href="#" class="d-inline">Edit Page Layout</a> -->

            </div>

            <div class="col-6">

                <div class="leads-btn">

                    <form action="<?php echo base_url();?>invoice/resendinvoice" method="POST">

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->id;?>" name="hidden_id" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->first_name;?>" name="first_name" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->last_name;?>" name="last_name" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->invoice_status;?>" name="invoice_status" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->mobile_1;?>" name="mobile_1" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->mobile_2;?>" name="mobile_2" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->invoice_number;?>" name="invoice_number" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->order_number;?>" name="order_number" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->email;?>" name="email" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->date;?>" name="date" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->due_date;?>" name="due_date" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->description;?>" name="description1" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->taxable;?>" name="taxable" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->other_charges;?>" name="other_charges" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->tax_percentage;?>" name="tax_percentage" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->discount;?>" name="discount" >

                    <input type="hidden" value="<?php if(!empty($invoice)) echo $invoice[0]->discount_amount;?>" name="discount_amount" >

                    <a href="<?php echo base_url(); ?>list-invoice" class="btn button_btn">Go Back </a>

                    <?php if($invoice[0]->invoice_status==2) {?> 

                      <input type="submit" class="btn btn_save <?php  echo $class;?>" value="Send">

                      <?php }?>

                  </form>

                  </div>

            </div>

        </div>

    </div>

</div>

<div class="container-fluid mt-5 mb-5 invoice-pdf ">

    <div class="row1">

      <div class="md-6 mx-4 invoice-block">

        <?php if($invoice[0]->payment_status==1){
            $due_date_exp = explode('-',$invoice[0]->due_date);
            $due_date = $due_date_exp[2].'-'.$due_date_exp[0].'-'.$due_date_exp[1].' 23:59:59';
            $timezone =  date_default_timezone_set("US/Pacific");
            $pstTime = date('Y-m-d H:i:s');
            $invoicePSTDate = date('Y-m-d H:i:s',strtotime($due_date));
            $due_date_second = (strtotime($pstTime) - strtotime($invoicePSTDate));
            $due_status = ($due_date_second > 1)?'Overdue':'due';
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

            <!-- <p class="text-end  mx-3 bold-class"># <?php if (!empty($getnameinvoice)) echo $getnameinvoice[0]->first_name; ?><?php if (!empty($invoice)) echo ' ' .$invoice[0]->last_name; ?></p> -->

          </div>

        </div>

        <div class="row" style="margin-top: 20px;">

          <div class="collg6" style="width: 50%;">

            <p class="text-start  mx-3 bold-class">Trust Haven Solution INC</p>

            <p class="text-start  mx-3 light-class">6915 Jennie Anne CT <br>Bakersfield California 93313 <br>U.S.A</p>



          </div>

          <div class="collg6" style="width: 50%;">

            <p class="text-end  mx-3 bold-class">Balance Due</p>

            <p class="text-end mx-3 bold-class" style="font-size: 18px;">$<?php echo $balance_amt; ?> </p>

          </div>



        </div>

        <div class="row row-new">

          <div class="collg6" style="width: 50%;">

            <p class="text-start  mx-3 light-class" style="font-weight: 400; font-size:15px;">Bill To</p>

            <p class="text-start  mx-3 bold-class"style="font-weight: 1000; color:black;">Mr. <?php if (!empty($getnameinvoice)) echo $getnameinvoice[0]->first_name; ?> <?php if (!empty($invoice)) echo $invoice[0]->last_name; ?></p>

          </div>

          <div class="collg6 date-invoice" style="width: 50%;">

            <p class="text-end  mx-3 bold-class d-flex1"><span>Invoice Date : </span><span><?php  if(!empty($invoice[0]->date)){ echo $invoice[0]->date;}?></span></p>

            <p class="text-end  mx-3 bold-class d-flex1"><span>Terms : </span><span>Due on Receipt</span></p>

            <p class="text-end  mx-3 bold-class d-flex1"><span>Due Date : </span><span><?php  if(!empty($invoice[0]->due_date)){ echo $invoice[0]->due_date;}?></span></p>

          </div>

        </div>



        <div class="row  mx-2 ">

          <table style="width:100%">

            <tr class="invoice-heading">

              <th style="width: 4%;">#</th>

              <th>Item & Description</th>

              <th class="text-center" style="">Qty</th>

              <th class="text-end">Rate</th>

              <th class="text-end">Amount</th>

            </tr>

            <?php if (!empty($getiteminvoice)) {

              $n = 1;

              foreach ($getiteminvoice as $row) { ?>

                <tr>

                  <td><?= $n; ?></td>

                  <td class=""><?= $row->item; ?><br> <span style="color:#ADB0B4;"><?= $row->description; ?></span></td>

                  <td class="text-center"><?= $row->quantity; ?></td>

                  <td class="text-end">$<?= number_format((float)$row->amount, 2, '.', ''); ?></td>

                  <td class="text-end">$<?= $row->quantity * $row->amount; ?>.00</td>

                </tr>

            <?php

             

            $n++;  

          }

            } ?>

          </table>

        </div>

        <div class="row   mt-4 mx-4 sub-total-main">

          <table style="width:100%">

            <tr class="sub-total">

              <th style="width: 4%;"></th>

              <th></th>

              <th class="text-end"></th>

              <th class="text-end">Sub Total<s/th>

              <th class="text-end">$<?php if (!empty($sub_total_first_name)) echo number_format((float)$sub_total_first_name[0]->total, 2, '.', ''); ?></th>

            </tr>

            <?php 

            if($invoice[0]->discount)

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
            <?php
            if($balance_amt>0)
            {
              ?>
                <tr>

              <td style="width: 20%;"></td>

              <td style="width: 20%;" class=""></td>

              <td style="width: 20%;" class="text-end"></td>

              <td class="text-end"><b>Payment Made</b></td>

              <td class="text-end">(-)<b class="text-danger"> $<?php echo $total_recieved_amt; ?></b></td>

              </tr>
            <tr>

              <td style="width: 20%;"></td>

              <td style="width: 20%;" class=""></td>

              <td style="width: 20%;" class="text-end"></td>

              <td class="text-end" style="background-color: antiquewhite;"><b>Balance Due</b></td>

              <td class="text-end" style="background-color: antiquewhite;"><b>$<?php echo $balance_amt; ?></b></td>

            </tr>
            <?php } ?>
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

      </div>

    </div>

  </div>

</body>

</html>