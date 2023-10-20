<?php
if (!empty($result)) {
   $buttonName = 'Save Changes';
   $formAction = 'invoice/updateInvoice';
   $heading = 'Update Invoice Information';
   $sub_heading = 'Update Invoice';
   $class = 'd-none';
} else {
   $buttonName = 'Save And Send';
   $heading = 'Fill Invoice Information';
   $sub_heading = 'Create Invoice';
   $class = '';
   $formAction = 'Invoice/addInvoice';
}
$hidden_id = '';
$first_name = '';
$last_name = '';
$mobile_1 = '';
$mobile_2 = '';
$email = '';
$amount = '';
$item = '';
$date = '';
$due_date = '';
$taxable = '';
$other_charges = '';
$total_amount = '';
$invoice_number = '';
$order_number = '';
foreach ($result as $row) {
   $hidden_id = $row->id;
   $first_name = $row->first_name;
   $last_name = $row->last_name;
   $mobile_1 = $row->mobile_1;
   $mobile_2 = $row->mobile_2;
   $email = $row->email;
   $amount = $row->amount;
   $item = $row->item;
   $date = $row->date;
   $due_date = $row->due_date;
   $taxable = $row->taxable;
   $other_charges = $row->other_charges;
   $total_amount = $row->total_amount;
   $invoice_number = $row->invoice_number;
   $order_number = $row->order_number;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
   <style>
      body {
         margin-bottom: 100px;
      }
      .invoice-new {
         background: #b41e4512;
         padding: 30px 0 30px 0;
      }
      .btnsearch {
         background: #b41e45;
         color: #fff;
         border: 0;
         width: 35px;
         height: 34px;
         position: relative;
         left: -28px;
         top: 1px;
         border-radius: 0px 10px 10px 0px;
      }
      .form-control:focus {
         border-color: #b41e45;
         box-shadow: none;
      }
      .order-id {
         padding: 60px 0;
      }
      hr {
         margin: 2rem 0;
         opacity: 0.1;
      }
      label,
      .form-control::-webkit-datetime-edit,
      .form-control {
         font-size: 14px;
      }
      .dropbtn {
         padding: 6px 30px 6px 8px;
         white-space: nowrap;
         font-size: 14px;
         width: 161px;
         background: #fff;
      }
      /* .dropbtn:hover, .dropbtn:focus {
         background-color: #3e8e41;
         } */
      #myInput {
         box-sizing: border-box;
         background-image: url(searchicon.png);
         background-position: 14px 12px;
         background-repeat: no-repeat;
         font-size: 14px;
         padding: 6px 20px 6px 10px;
      }
      #myInput:focus {
         outline: 3px solid #ddd;
      }
      .dropdown {
         position: relative;
         display: inline-block;
      }
      .dropdown-content {
         display: none;
         position: absolute;
         background-color: #f8f9fa;
         min-width: 230px;
         overflow: auto;
         z-index: 1;
         border-radius: 6px;
         box-shadow: 0px 10px 15px 4px #e5e5e5;
      }
      .svg-inline--fa.fa-sort-down.down-icon {
         position: relative;
         right: -23px;
         top: -2px;
      }
      .dropdown-content a {
         color: #1e1e1e;
         padding: 5px 16px;
         text-decoration: none;
         display: block;
         font-size: 14px;
      }
      .due-date {
         border: 1px dashed #dddddd;
      }
      .dropdown a:hover {
         background-color: #ddd;
      }
      .show {
         display: block;
      }
      .due-date:focus {
         border: 1px solid;
         border-color: #b41e45;
      }
      .invoice-date {
         cursor: pointer;
      }
      .item-detail-table th {
         font-size: 12px;
      }
      .svg-inline--fa.fa-circle-xmark {
         color: #b92d51;
      }
      .item-detail-table textarea,
      .item-detail-table input {
         background: transparent;
         border: 1px solid transparent;
      }
      .item-detail-table textarea:hover,
      .item-detail-table input:hover,
      .item-detail-table .select-box-tax .dropbtn.form-control:hover {
         border: 1px solid #b41e45;
      }
      .table-responsive {
         overflow-x: unset;
      }
      .select-box-tax .dropbtn.form-control {
         background: transparent;
         border: 1px solid transparent;
      }
      .select-box-tax input#myInput1 {
         border: 1px solid #e2e4e5;
      }
      .select-box-tax .dropdown-content a {
         text-align: start;
      }
      .select-box-tax .svg-inline--fa.fa-sort-down.down-icon {
         right: -58px;
      }
      button.add-row-btn {
         background: #b41e45;
         color: #fff;
         border: 0;
         padding: 8px 26px;
         font-weight: 500;
         border-radius: 5px;
      }
      span.add-row-btn {
         background: #b41e45;
         color: #fff;
         cursor: pointer;
         border: 0;
         padding: 8px 26px;
         font-weight: 500;
         border-radius: 5px;
      }
      .add-row-btn .svg-inline--fa.fa-circle-plus {
         margin-right: 9px;
      }
      .form-check {
         display: inline-block;
      }
      .dropdown.select-box-tds .dropbtn {
         width: auto;
      }
      .sub-total {
         background: #f3e9ed;
         padding: 35px 25px;
         border-radius: 10px;
      }
      .terms {
         padding: 60px 0;
         background: #f3e9ed;
         border-top: 1px solid #e3e3e3;
         border-bottom: 1px solid #e3e3e3;
      }
      .terms svg,
      .additional svg {
         width: 23px;
         margin-bottom: 5px;
      }
      .additional {
         padding: 60px 0;
      }
      .button_btn {
         background: #e9e9e9;
         border: 1px solid #d7d7d7;
      }
      .btn.btn_save:hover {
         color: #fff;
      }
      footer.footer-voice {
         position: fixed;
         bottom: 0;
         width: 100%;
         background: #f3f3f3;
         padding: 20px 0;
         box-shadow: 0px 0px 11px 0px #c7c7c7;
      }
      
   </style>
<body>
   <?php echo form_open($formAction); ?>
   <section class="invoice-new">
      <div class="container">
         <div class="row align-items-center">
         <div class="row">
               <div class="col-md-2">
                  <label for="cardcc-number" class="form-label">Invoice Type  *</label>
               </div>
               <div class="col-md-4">
                 
                  <select class="form-control invoice_type" name="invoice_type" class="form-control" required>
                     <option value="1">Lead User Customer Invoice</option>
                     <option value="2">Custom Invoice</option>
                    
                  </select>
                   </div>
              
            </div>
         <div class="row pt-3 exist_customer_invoice">
               <div class="col-md-2">
                  <label for="cardcc-number" class="form-label">Customer Name*</label>
               </div>
               <div class="col-md-4">
                  <!-- <select class="form-control w-100 form-select"  name="" id="">
                        <option value="" selected>Select Customer</option> -->
                  <!-- </select> -->
                  <select id="select-state22" placeholder="Search Name..." name="first_name" onchange="customer_invoice_record();" class="bookings_name form-control w-100 form-select" required="" >
                     <option value="">Search Name</option>
                     <?php if (!empty($select_name)) {
                        foreach ($select_name as $name) { ?>
                           <option value="<?php echo $name->id; ?>" <?= (set_value('first_name') == $name->id) ? 'selected' : ''; ?> <?php if ($first_name == $name->id) {
                                                                                                                                          echo 'selected';
                                                                                                                                       } ?>><?php echo $name->first_name; ?> <?php echo $name->last_name;?> ( <?php echo $name->email;?> )</option>
                     <?php }
                     } ?>
                  </select>
                  <input type="hidden" name="email" class="form-control" id="email">
                  <input type="hidden" name="mobile_2" class="form-control" id="mobile_2">
                  <input type="hidden" name="mobile_1" class="form-control" id="mobile_1">
                  <input type="hidden" name="last_name" class="form-control" id="last_name">
               </div>
               <div class="col-md-1">
                  <button class="btnsearch"><i class="fa fa-search" aria-hidden="true"></i></button>
               </div>
            </div>
           
         </div>
      </div>
      </div>
   </section>
   <section class="order-id">
      <div class="container">
      <div class="row mb-5 custom_invoice_detail d-none">
               <div class="col-md-2"><input type="text" id="custom_name"  name="custom_name" placeholder="First Name *"  class="form-control" /></div>
               <div class="col-md-2"><input type="text" id="custom_last_name" name="custom_last_name" placeholder="Last Name *"  class="form-control" /></div>
               <div class="col-md-2"><input type="email" id="custom_email" name="custom_email" placeholder="Email id *"  class="form-control" /></div>
               <div class="col-md-2"><input type="text" id="custom_mobile_1" name="custom_mobile_1" class="form-control getvalue"  placeholder="Mobile *"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10"></div>
               <div class="col-md-2"><input type="text" name="custom_mobile_2" class="form-control getvalue" placeholder="Mobile 2"   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10"></div>
               
      </div>   
         <div class="row mb-3 align-items-center">
            <div class="col-md-2">
               <label for="invoice-number" class="form-label">Invoice#*</label>
            </div>
            <div class="col-md-3">
               <input class="form-control w-100" id="invoice-number" name="invoice_number" type="text" value="INV-0100<?php echo $get_invoice_number; ?>" readonly>
            </div>
         </div>
         <div class="row mb-3 align-items-center">
            <div class="col-md-2">
               <label for="invoice-number" class="form-label">Order Number</label>
            </div>
            <div class="col-md-3">
               <input class="form-control w-100" id="invoice-number" type="text" name="order_number" value="ORDER-0100<?php echo $get_invoice_number; ?>" readonly>
            </div>
         </div>
         <div class="row mb-3 align-items-center">
            <div class="col-md-2">
               <label for="invoice-number" class="form-label ">Invoice Date*</label>
            </div>
            <div class="col-md-3">
               <!-- <input class="form-control w-100 invoice-date" id="picker" name="date" pseudo="-webkit-calendar-picker-indicator" type="date" value="<?php if (!empty($date)) {
                                                                                                                                                         echo $date;
                                                                                                                                                      } elseif (empty($date)) {
                                                                                                                                                         echo  date('Y-m-d');
                                                                                                                                                      } else {
                                                                                                                                                         echo set_value('date');
                                                                                                                                                      }  ?>" required> -->
<div class="input-group">
                                            <div id="invoice_date" style="width: 346px;padding-left: 24px;" 
             class="input-group date" 
             data-date-format="mm-dd-yyyy"> 
            <input class="form-control" 
                   type="text" name="date"/> 
            <span class="input-group-addon"> 
                <i class="glyphicon glyphicon-calendar"></i> 
            </span> 
        </div> 
      </div>
                                                                                                                                        
            </div>
            <div class="col-md-1 ps-4">
               <label for="invoice-number " class="form-label">Terms</label>
            </div>
            <div class="col-md-2">
               <!-- <select class="form-control w-100"  name="" id="">
                     <option value="" selected>Select Customer</option>
                     </select>  -->
               <div class="dropdown">
                
                  <div id="myDropdown" class="">
                     <select class="form-control form-select due_date_option" >
                        <option value="0"> Due on Receipt</option>
                        <option value="15"> Net 15</option>
                        <option value="30"> Net 30</option>
                        <option value="45"> Net 45</option>
                        <option value="60"> Net 60</option>
                        <option value="<?=$month_end?>">Due end of the month</option>
                        <option value="<?=$next_month_end?>">Due end of next month</option>
                        <option value="custom_date"> Custom Date</option>
                     </select>
                     
                  </div>
               </div>
            </div>
            <div class="col-md-1 ps-4">
               <label for="invoice-number " class="form-label">Due Date</label>
            </div>
            <div class="col-md-2">
               <!-- <input class="form-control w-100 due-date" id="due_date" type="date" name="due_date" value="<?=date('Y-m-d');?>" required> -->
               <div class="input-group">
                                            <div id="due_date" style="width: 346px;padding-left: 24px;" 
             class="input-group date" 
             data-date-format="mm-dd-yyyy"> 
            <input class="form-control" 
                   type="text" name="due_date"/> 
            <span class="input-group-addon"> 
                <i class="glyphicon glyphicon-calendar"></i> 
            </span> 
        </div> 
      </div>
            </div>
         </div>
         <hr>
         <!-- <div class="row">
               <div class="col-md-2">
                   <label for="invoice-number " class="form-label">Salesperson</label>
               </div>
               <div class="col-md-5">
                   <div class="mb-3">
                       <select class="form-select form-control form-select-lg" name="" id="">
                           <option selected>Select one</option>
                           <option value="">New Delhi</option>
                           <option value="">Istanbul</option>
                           <option value="">Jakarta</option>
                       </select>
                   </div>
               </div>
               </div>
               <hr> -->
         <div class="row">
            <div class="col-md-2">
               <label for="invoice-number " class="form-label">Subject</label>
            </div>
            <div class="col-md-5">
               <textarea class="form-control" name="subject" cols="40" rows="1" placeholder="Let your customer know what this Invoice is for"></textarea>
            </div>
         </div>
         <hr>
         <div class="detail-table">
            <div class="row ">
               <div class="table-responsive item-detail-table">
                  <table class="table table-bordered " style="border:1px solid #dee2e6 !important">
                     <thead>
                        <tr>
                           <th scope="col">ITEM DETAILS</th>
                           <th scope="col" class="text-end">QUANTITY</th>
                           <th scope="col" class="text-end">RATE</th>
                           <!-- <th scope="col">TAX</th> -->
                           <th scope="col" class="border-0">AMOUNT</th>
                        </tr>
                     </thead>
                     <tbody class="duplicate">
                        <tr class="position-relative">
                           <td scope="row" style="width: 500px;">
                              <textarea placeholder="Type or click to select an item." style="resize: none;" class="form-control item_list" name="item[]" id="" rows="2" required></textarea>
                           </td>
                           <td class="text-end">
                              <input type="number" class="form-control text-end quantity" name="quantity[]" value="1" aria-describedby="helpId" placeholder="" min="1" step="any" oninput="calculateAmount(this.value)" required>
                           </td>
                           <td class="text-end">
                              <input type="number" class="form-control text-end rate" name="amount[]" value="0" aria-describedby="helpId" placeholder="" min="1" step="any" oninput="calculateAmount(this.value)" required>
                           </td>
                           <!-- <td>
                                 <div class="dropdown select-box-tax">
                                    <button onclick="myFunction1()" class="dropbtn form-control text-start">Select a Tax<i class="down-icon fa fa-sort-down" aria-hidden="true"></i></button>
                                    <div id="myDropdown1" class="dropdown-content">
                                       <input class="form-control" type="text" placeholder="Search.." id="myInput1" onkeyup="filterFunction()"> 
                                       <a href="#about">Out of Scope<br>
                                       <small>10</small>
                                       </a>
                                       <a href="#base">Non GST-Supply
                                       <br>
                                       <small>20</small>
                                       </a>
                                    </div>
                                 </div>
                              </td> -->
                           <td class="border-0">
                              <input class="amount border-none" readonly>
                           </td>
                        
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="row">
               <div class="col-md-5">
                  <span class="add-row-btn mb-5 add2"><i class="fa-solid fa-circle-plus "></i>Add Product</span> <span class="add-row-btn mb-5 remove2"><i class="fa-solid fa-circle-minus"></i>Remove Product</span>
                  <div class="mt-5">
                     <div><label for="">Customer Notes</label></div>
                     <textarea class="form-control" name="custom_notes" id="custom_notes_condition" cols="2" rows="3" required>All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer's device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.</textarea>
                     <input type="hidden" id="fixed_custom_notes" value="All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer's device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date."/>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="custom_notes_checked" id="custom_notes_checked">
                        <label class="form-check-label" for="future">
                           Use this in future for all invoices for this customer.
                        </label>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 offset-1">
                  <div class="sub-total">
                     <div class="row">
                        <div class="col-md-6">
                           <p>Sub Total</p>
                        </div>
                        <div class="col-md-6">
                           <p class="text-end sub_total">0.00</p>
                        </div>
                     </div>
                     <div class="row mb-4">
                        <div class="col-md-4">
                           <p>Discount</p>
                        </div>
                        <div class="col-md-3">
                           <input type="number" class="form-control text-end" min="0" step="any" value="0" oninput="calculateAmount(this.value)" id="discount" name="discount">
                        </div>
                        <div class="col-md-1 p-0 mt-1">
                           <span>%</span>
                        </div>
                        <div class="col-md-4">
                           <p class="text-end" id="discount_amount">0.00</p>
                        </div>
                     </div>
                 
                     <div class="row mb-4">
                        <div class="col-md-4">
                           <p>Other Charges</p>
                        </div>
                        <div class="col-md-3">
                           <input type="number" class="form-control text-end" id="other_charges" min="0" value="0" step="any" oninput="calculateAmount(this.value)" name="other_charges">
                        </div>
                        <div class="col-md-1 p-0 mt-1">
                           <span>$</span>
                        </div>
                        <div class="col-md-4">
                           <p class="text-end other_charges_two">0.00</p>
                        </div>
                     </div>
                     <div class="row mb-4">
                        <div class="col-md-4">
                           <p>Tax</p>
                        </div>
                        <div class="col-md-3">
                           <input type="number" class="form-control text-end" min="0" id="taxable" step="any" oninput="calculateAmount(this.value)" value="0" name="taxable">
                        </div>
                        <div class="col-md-1 p-0 mt-1">
                           <span>%</span>
                        </div>
                        <div class="col-md-4">
                           <p class="text-end taxable_two"> 0.00</p>
                        </div>
                     </div>
                     <!-- <div class="row mb-4">
                           <div class="col-md-4">
                              <span class="form-check me-5">
                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                              <label class="form-check-label" for="flexRadioDefault1">
                              TDS
                              </label>
                              </span>
                              <span class="form-check">
                              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                              <label class="form-check-label" for="flexRadioDefault2">
                              TCS
                              </label>
                              </span>
                           </div>
                           <div class="col-md-4 ">
                              <div class="dropdown select-box-tds">
                                 <button onclick="myFunction2()" class="dropbtn form-control text-start">Select a Tax<i class="down-icon fa fa-sort-down" aria-hidden="true"></i></button>
                                 <div id="myDropdown2" class="dropdown-content">
                                    <input class="form-control" type="text" placeholder="Search.." id="myInput2" oninput="filterFunction()"> 
                                    <a href="#about">Out of Scope
                                    </a>
                                    <a href="#base">Non GST-Supply
                                    </a>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <p class="text-end">- 0.00</p>
                           </div>
                        </div> -->
                     <!-- <div class="row mb-4">
                           <div class="col-md-4">
                              <input class="form-control w-100 due-date" id="invoice-number" placeholder="Adjustment" value="Adjustment" type="text" >
                           </div>
                           <div class="col-md-4">
                              <input class="form-control w-100" id="invoice-number"  type="text" >
                           </div>
                           <div class="col-md-4">
                              <p class="text-end">0.00</p>
                           </div>
                        </div> -->
                     <div class="row ">
                        <div class="col-md-6">
                           <p><b>Total ( $ )</b></p>
                        </div>
                        <div class="col-md-6">
                           <p class="text-end total_amount">0.00</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
   </section>
   <section class="terms">
      <div class="container">
         <div class="row d-none">
            <div class="col-md-6">
               <span class="condit">
                  <p>Terms & Conditions</p>
                  <textarea name="description1" rows="3" class="form-control" id="terms_condition" required >All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer's device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.</textarea>
               </span>
            </div>
         </div>
         <hr>
         <div class="row">
            <div class="col-md-12">
               <p class="clearfix">
                  Want to get paid faster?
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 262 162" class="icon icon-xlg align-bottom">
                     <ellipse fill="#FF5F00" cx="130.4" cy="81.2" rx="30.1" ry="62.3"></ellipse>
                     <path fill="#EB001B" d="M100.3 81.2c0-25.3 11.9-47.7 30.1-62.3C117 8.4 100 2 81.6 2 37.8 2 2.4 37.4 2.4 81.2c0 43.8 35.4 79.2 79.2 79.2 18.5 0 35.4-6.4 48.8-16.9-18.5-14.6-30.1-37.2-30.1-62.3z"></path>
                     <path fill="#F79E1B" d="M179.2 2c-18.5 0-35.4 6.4-48.8 16.9 18.3 14.5 30.1 37 30.1 62.3 0 25.3-11.7 47.7-30.1 62.3 13.4 10.6 30.4 16.9 48.8 16.9 43.8 0 79.2-35.4 79.2-79.2C258.4 37.4 223 2 179.2 2z"></path>
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 620.07" class="icon icon-xlg align-bottom">
                     <path d="M728.98 10.95L477.61 610.69h-164l-123.7-478.62c-7.51-29.48-14.04-40.28-36.88-52.7C115.76 59.14 54.18 40.17 0 28.39l3.68-17.44h263.99c33.65 0 63.9 22.4 71.54 61.15l65.33 347.04L566 10.95h162.98zm642.59 403.93c.66-158.29-218.88-167.01-217.37-237.72.47-21.52 20.96-44.4 65.81-50.24 22.23-2.91 83.48-5.13 152.95 26.84l27.25-127.18c-37.33-13.55-85.36-26.59-145.12-26.59-153.35 0-261.27 81.52-262.18 198.25-.99 86.34 77.03 134.52 135.81 163.21 60.47 29.38 80.76 48.26 80.53 74.54-.43 40.23-48.23 57.99-92.9 58.69-77.98 1.2-123.23-21.1-159.3-37.87L928.93 588.2c36.25 16.63 103.16 31.14 172.53 31.87 162.99 0 269.61-80.51 270.11-205.19m404.94 195.82H1920L1794.75 10.95h-132.44c-29.78 0-54.9 17.34-66.02 44l-232.81 555.74h162.91l32.35-89.59h199.05l18.73 89.59zM1603.4 398.19l81.66-225.18 47 225.18h-128.65zM950.66 10.95L822.37 610.69H667.23L795.57 10.95h155.09z" fill="#1434cb"></path>
                  </svg>
               <div class="text-muted mt-2">
                  <div class="d-inline-block">Configure payment gateways and receive payments online.</div>
                  <span class="text-blue cursor-pointer" data-ember-action="" data-ember-action-213="213">
                     <span class="form-check">
                        <input class="form-check-input" type="radio" name="Paymen" id="Paymen2" checked>
                        <label class="form-check-label" for="Paymen2">
                           Authorize.net
                        </label>
                     </span>
                  </span>
               </div>
               </p>
            </div>
         </div>
      </div>
   </section>
   <section class="additional">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="text-muted mt-9">
                  <b>Additional Fields: </b>Start adding custom fields for your invoices by going to
                  <i>
                     Settings
                     <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 512 512" xml:space="preserve" class="icon icon-sm">
                        <path d="M14.5 429.9h244c6.6 0 12 5.4 12 12V500c0 9.9 11.2 15.5 19.2 9.6L502.1 352c6.5-4.8 6.5-14.5 0-19.3L289.7 175.1c-7.9-5.9-19.2-.2-19.2 9.6v58.1c0 6.6-5.4 12-12 12h-244c-6.6 0-12 5.4-12 12v151c0 6.7 5.4 12.1 12 12.1z" id="Layer_2_1_"></path>
                     </svg>
                     Preferences
                     <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" x="0" y="0" viewBox="0 0 512 512" xml:space="preserve" class="icon icon-sm">
                        <path d="M14.5 429.9h244c6.6 0 12 5.4 12 12V500c0 9.9 11.2 15.5 19.2 9.6L502.1 352c6.5-4.8 6.5-14.5 0-19.3L289.7 175.1c-7.9-5.9-19.2-.2-19.2 9.6v58.1c0 6.6-5.4 12-12 12h-244c-6.6 0-12 5.4-12 12v151c0 6.7 5.4 12.1 12 12.1z" id="Layer_2_1_"></path>
                     </svg>
                     Invoices
                  </i>
                  .
               </div>
            </div>
         </div>
      </div>
   </section>
   <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
   <footer class="footer-voice">
      <div class="container">
         <div class="row align-items-center">
            <div class="col-md-6">
               <!-- <a href="#" class="btn btn_save"> Save as Draft</a>
                  <a href="#" class="btn btn_save"> Save as Send</a>
                  <a href="#" class="btn button_btn clear_check"> Cancel</a> -->
               <input type="submit" class="btn btn_save <?php echo $class; ?>" value="Save As Draft"  name="save_draft">
               <input type="submit" class="btn btn_save" value="<?php echo $buttonName; ?>" name="save">
               <div class="btn_list"></div>
               <a href="<?php echo base_url(); ?>list-invoice" class="btn button_btn">Cancel </a>
            </div>
            <div class="col-md-6 text-end">
               <p class="m-0"><span><b>Total Amount</b>: </span>$<span id="total_amount"></span></p>
               <p class="m-0"><small>Total Quantity: <span id="quantity"></span></small></p>
            </div>
         </div>
      </div>
   </footer>
   <script>
      /* When the user clicks on the button,
         toggle between hiding and showing the dropdown content */
      function myFunction() {
         document.getElementById("myDropdown").classList.toggle("show");
      }
      function filterFunction() {
         var input, filter, ul, li, a, i;
         input = document.getElementById("myInput");
         filter = input.value.toUpperCase();
         div = document.getElementById("myDropdown");
         a = div.getElementsByTagName("a");
         for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
               a[i].style.display = "";
            } else {
               a[i].style.display = "none";
            }
         }
      }
      function myFunction1() {
         document.getElementById("myDropdown1").classList.toggle("show");
      }
      function filterFunction() {
         var input, filter, ul, li, a, i;
         input = document.getElementById("myInput1");
         filter = input.value.toUpperCase();
         div = document.getElementById("myDropdown1");
         a = div.getElementsByTagName("a");
         for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
               a[i].style.display = "";
            } else {
               a[i].style.display = "none";
            }
         }
      }
      function myFunction2() {
         document.getElementById("myDropdown2").classList.toggle("show");
      }
      function filterFunction() {
         var input, filter, ul, li, a, i;
         input = document.getElementById("myInput2");
         filter = input.value.toUpperCase();
         div = document.getElementById("myDropdown2");
         a = div.getElementsByTagName("a");
         for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
               a[i].style.display = "";
            } else {
               a[i].style.display = "none";
            }
         }
      }
   </script>
   <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
   <script>
      // the selector will match all input controls of type :checkbox
      // and attach a click event handler 
      $("input:checkbox").on('click', function() {
         // in the handler, 'this' refers to the box clicked on
         var $box = $(this);
         if ($box.is(":checked")) {
            // the name of the box is retrieved using the .attr() method
            // as it is assumed and expected to be immutable
            var group = "input:checkbox[name='" + $box.attr("name") + "']";
            // the checked state of the group/box on the other hand will change
            // and the current value is retrieved using .prop() method
            $(group).prop("checked", false);
            $box.prop("checked", true);
         } else {
            $box.prop("checked", false);
         }
      });
      function calculateAmount(str) {
         var quantity = 0;
         var amount = 0;
         if($("#taxable").val()<1)
         {
         $("#taxable").val('0');
         }
         if($("#discount").val()<1)
         {
         $("#discount").val('0');
         }
         if($("#other_charges").val()<1)
         {
         $("#other_charges").val('0');
         }
         if($("#discount").val()>100)
         {
         $("#discount").val('0');
         }
         
         var taxable = $("#taxable").val();
         var discount = $("#discount").val();
         var other_charges = $("#other_charges").val();
         var discount_amount = 0;
         
         $('.quantity').each(function(index) {
            if($(this).val()<1)
            {
               $(this).val('1');
            }
            quantity += parseFloat($(this).val())
         });
         $(".duplicate").each(function() {
            var quantity_calculate = $(this).find(".quantity").val();
            if($(this).find(".rate").val()<1)
            {
               $(this).find(".rate").val(1);
            }
            var rate_calculate = $(this).find(".rate").val();
           
            $(this).find(".amount").val(quantity_calculate * rate_calculate);
         });
         $('.amount').each(function(index) {
            
            amount += parseFloat($(this).val())
         });
         var tax_amt = 0;
         
         if(discount)
         {
            var discount_amount = (amount*(discount/100));
         }
         
         if(discount_amount)
         {
            total_amount = total_amount - discount_amount; 
         }
         if(taxable)
         {
            tax_amt = ((parseInt(other_charges) + parseInt((amount - discount_amount)))*(taxable/100));
         }
         total_amount = tax_amt + parseInt(other_charges) + parseInt(amount - discount_amount);
         total_amount = Number(total_amount).toFixed(2);
         amount = Number(amount).toFixed(2);
         discount_amount = Number(discount_amount).toFixed(2);
         tax_amt = Number(tax_amt).toFixed(2);
         $("#total_amount").html(total_amount);
         $("#quantity").html(quantity);
         $(".taxable_two").html(tax_amt);
         $(".other_charges_two").html(other_charges);
         $(".sub_total").html(amount);
         $(".total_amount").html(total_amount);
         $("#discount_amount").html(parseFloat(discount_amount).toFixed(2));
         
      }
      $('.add2').click(function() {
         $(".duplicate")
            .eq(0)
            .clone()
            .find("input,textarea,p").val("").end() // ***
            .show()
            .insertAfter(".duplicate:last");
      })
      $('.remove2').click(function() {
         var numItems = $('.duplicate').length
         if (numItems > 1) {
            $('.duplicate:last').append($('.duplicate:last').remove())
         }
      });
      $('.invoice_type').change(function(){
        var invoice_type = $(this).val();
        if(invoice_type==1)
        {
         $('.custom_invoice_detail').addClass('d-none');
         $('.exist_customer_invoice').removeClass('d-none');
         $('#custom_name').removeAttr('required');
         $('#custom_last_name').removeAttr('required');
         $('#custom_email').removeAttr('required');
         $('#custom_mobile_1').removeAttr('required');
         $('.bookings_name').attr('required','');
         $('#select-state22-selectized').attr('required','');
        }
        else
        {
         $('.exist_customer_invoice').addClass('d-none');
         $('.custom_invoice_detail').removeClass('d-none');
         $('#custom_name').attr('required','');
         $('#custom_last_name').attr('required','');
         $('#custom_email').attr('required','');
         $('#custom_mobile_1').attr('required','');
         $('.bookings_name').removeAttr('required');
         $('#select-state22-selectized').removeAttr('required');
        }
      })

$(".btn_save").click(function(e) {
   let condition = $('#custom_notes_condition').html();
   if(condition=='')
   {
      alert('Please Enter Custom Notes');
      return false;
   }
   // var items = [];
    $('.btn_list').html();
    e.preventDefault(); // Prevent the page from submitting on click.
    var customer_name = $('select[name="first_name"]').val();
    var customer_name1 = $('input[name="custom_name"]').val();
    var custom_last_name = $('input[name="custom_last_name"]').val();
    var custom_email = $('input[name="custom_email"]').val();
    var custom_mobile_1 = $('input[name="custom_mobile_1"]').val();
    var invoice_type = $('select[name="invoice_type"]').val();
    var items        = $('.item_list').val();
    var rate        = $('.rate').val();
    var customer_notes = $("#custom_notes_condition").val();
    var notes = customer_notes.replace(/ /g, '').length;
    
    $('.btn_save').attr('disabled', true); // Disable this input.
    if(invoice_type==1 && customer_name=='')
    {
      alert('Please Select Customer Name');
      $('#select-state22-selectized').focus();
      $('.btn_save').removeAttr('disabled'); // Disable this input.
      return false;
    }
    if(invoice_type==2)
    {
      if(customer_name1=='')
      {
      alert('Please Enter Customer Name');
      $('input[name="custom_name"]').focus();
      $('input[name="custom_name"]').attr('required',true);
      $('.btn_save').removeAttr('disabled'); // Disable this input.
      
      return false;
      }
      if(custom_last_name=='')
      {
      alert('Please Enter Last Name');
      $('input[name="custom_last_name"]').focus();
      $('input[name="custom_last_name"]').attr('required',true);
      $('.btn_save').removeAttr('disabled'); // Disable this input.
      
      return false;
      }
      if(custom_email=='')
      {
      alert('Please Enter Email');
      $('input[name="custom_email"]').focus();
      $('input[name="custom_email"]').attr('required',true);
      $('.btn_save').removeAttr('disabled'); // Disable this input.
      
      return false;
      }
      if(custom_mobile_1=='')
      {
      alert('Please Enter Customer Mobile No');
      $('input[name="custom_mobile_1"]').focus();
      $('input[name="custom_mobile_1"]').attr('required',true);
      $('.btn_save').removeAttr('disabled'); // Disable this input.
      return false;
      }
    }

    if(items=='')
    {
      alert('Please Enter Product Name');
      $('.item_list').focus();
      $('.item_list').attr('required',true);
      $('.btn_save').removeAttr('disabled'); // Disable this input.
      return false;
    }

    if(rate==0)
    {
      alert('Please Enter Product Price');
      $('.rate').focus();
      $('.rate').attr('required',true);
      $('.btn_save').removeAttr('disabled'); // Disable this input.
      return false;
    }
    if(notes==0)
    {
      alert('Please Fill Customer Notes');
      $('#custom_notes_condition').focus();
      $('.custom_notes_condition').attr('required',true);
      $('.btn_save').removeAttr('disabled'); // Disable this input.
      return false;
    }

    

    var btn_name = $(this).attr('name');
    if(btn_name=='save')
    {
       $('.btn_list').html('<input type="hidden" name="save" value="save">');
    }
    if(btn_name=='save_draft')
    {
       $('.btn_list').html('<input type="hidden" name="save_draft" value="save_draft">');
    }

    $('form').submit(); // Submit the form it is in.
    
    return true;
});

// $(document).ready(function(){
//   $('.btn_save').dblclick(function(e){
//     return false;
//   });
// });

// $(document).ready(function () {
//      $(".btn_sav").one('click', function (event) {  
//            event.preventDefault();
//            //do something
//            $(this).prop('disabled', true);
//      });
// });

function customer_invoice_record() {
	let customer_id = $(".bookings_name option:selected").val();
	$.ajax({
		type: "POST",
		url: base_url + "Invoice/PrevgetInvoiceCustomNotes",
		dataType: "JSON",
		data: {
			customer_id: customer_id,
		},
		success: function (data) {
         
         $("#mobile_1").val(data.mobile_1);
			$("#mobile_2").val(data.mobile_2);
			$("#email").val(data.email);
			$("#last_name").val(data.last_name);
			if(data.response_status==2 || data.response_status==3)
         {
            let fixed_custom_notes = $('#fixed_custom_notes').val();
            $("#custom_notes_condition").val(fixed_custom_notes);
            $('#custom_notes_checked').prop('checked', false);

         }
         else
         {
            $("#custom_notes_condition").val(data.invoice_record.custom_notes);
            $('#custom_notes_checked').prop('checked', true);
         }
		},
	});
}

$(function () { 
            $("#invoice_date").datepicker({  
                autoclose: true,  
                todayHighlight: true, 
            }).datepicker('update', new Date()); 
            $("#due_date").datepicker({  
                autoclose: true,  
                todayHighlight: true, 
            }).datepicker('update', new Date()); 
        });  
        
   </script>
</body>
<html>