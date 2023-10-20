<?php
 $formAction = 'Invoice/addPayment';
 ?>
<style>
    .leads-btn {
        text-align: end;
    }
    .lead_form_box {
        padding: 40px 20px;
    }
    .lead_form_box h3{
        font-size: 18px;
        Color: #202123;
    
        font-style: normal!important;
        
        position: relative;
    }
    .second_header{
        border-bottom: 1px solid #eee !important
    }
   .lead_form_box{
        background: #fff;
        height: 100vh
    }
    .transaction-customer-name{
        background-color: #f9f9fb;
    }
    body{
        background-color: white;
    }
    .table-styling{
        border-top: 2px solid #d7d5e2;
    }
    td{
        border-left: none;
    }
    tbody tr{
        border-bottom: 2px solid white;
    }
    form.needs-validation input.form-control, form.needs-validation select.form-control{
        font-size: 14px !important;
        color: #707787 !important;
        font-weight: 500 !important;
        border-radius: 4px !important;
        font-family: 'Open Sans' !important;
    }
    .input-group-text{
        font-size: 14px !important;
        color: #707787 !important;
        font-weight: 500 !important;
    }
    .payment-grp .input-group-text{
        background:transparent
    }
   .transaction-customer-name p.p-para{
        font-size: 16px !important;
        text-align: left !important;
        color: #55575a !important;
        font-weight: 500 !important;
        font-family: 'Open Sans' !important;
   }
   .dropdown .dropdown-toggle {
       
        font-size: 14px;
        padding: 2px 4px;
        font-weight: 500;
        font-family: 'Open Sans' !important;
    }
    button:focus:not(:focus-visible) {
        outline: 0;
        box-shadow: none;
        border: 0;
    }
    
    .dropdown .dropdown-item {
        font-weight: 600;
        font-size: 14px;
        padding: 7px;
    }
    table tr th {
        color: #555;
        font-size: 14px;
        text-align: left;
        font-family: 'Open Sans' !important;
    }
    table tr td {
        font-size: 14px;
        font-weight: 400;
        font-family: 'Open Sans' !important;
        text-align: left;
        padding-left: 11px !important;
    }
</style>
    <div class="second_header">
        <div class="container-fluid">
            <div class="row justify-content-between align-content-center">
                <div class="col-12 mb-3">
                    <h5 class="d-inline  px-4">Record Payment</h5>
                </div>
            </div>
        </div>
    </div>
    
    <?php echo form_open($formAction); ?>
    <div class="second_header transaction-customer-name">
        <div class="container-fluid">
        <div class="row mt-4 mb-4">
            <div class="col-md-2 px-4">
                <label for="validationTooltip01" class="form-label px-3"><span class="text-danger">Customer Name*</span>    </label>
            </div>
            <div class="col-md-4">
                <div class="px-4 position-relative">
                    <input type="text"  class="form-control" readonly value="<?=$getnameinvoice[0]->first_name.' '. $getnameinvoice[0]->last_name?>" id="customer_name" name="customer_name">
                    <input type="hidden" name="invoice_id" class="form-control" value="<?=$invoice[0]->id?>" id="invoice_id">
                    <span class="text-danger"><?php echo form_error('customer_name'); ?></span>
                </div>
            </div >
        </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                        <div class="container-fluid">
                            <div class="row mt-4">
                                <div class="col-md-2 px-5">
                                    <label for="validationTooltip01" class="form-label"><span class="text-danger">Amount Received*</span></label>
                                </div>
                                <div class="col-md-4">
                                    <div class="px-4 position-relative">
                                        <div class="input-group">
                                            <span class="input-group-text">USD</span>
                                            <input type="text"  class="form-control" name="amount" id="amount"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" onkeypress="if(this.value.length==5) return false;" placeholder="<?=$set_total_due_amount-$total_recieved_amt?>.00">
                                            <input type="hidden" value="<?=$set_total_due_amount-$total_recieved_amt?>" id="max_payable_amt">
                                        </div>
                                         <span class="text-danger"><?php echo form_error('amount'); ?></span>

                                      
                                    </div>
                                </div> 
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2 px-5">
                                    <label for="validationTooltip01" class="form-label">Bank Charges (if any)</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="px-4 position-relative">
                                        <input type="text"  class="form-control" name="bank_charges" id="bank_charges" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" onkeypress="if(this.value.length==5) return false;">
                                    </div>
                                </div >
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2 px-5">
                                    <label for="validationTooltip01" class="form-label"> <span class="text-danger">Payment Date*</span></label>
                                </div>
                                <div class="col-md-4">
                                    <div class="px-4 position-relative">                                        
                                        <!-- <input type="date"  class="form-control" name="payment_date" id="payment_date"> -->
                                        <div class="input-group">
                                            <div id="payment_date" style="" 
             class="input-group date" 
             data-date-format="mm-dd-yyyy"> 
            <input class="form-control" 
                   type="text" name="payment_date" id="payment_date_id"/> 
            <span class="input-group-addon"> 
                <i class="glyphicon glyphicon-calendar"></i> 
            </span> 
        </div> 
      </div>
      <span class="text-danger"><?php echo form_error('payment_date'); ?></span>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2 px-5">
                                    <label for="validationTooltip01" class="form-label"><span class="text-danger">Payment #*</span></label>
                                </div>
                                <div class="col-md-4">
                                    <div class="px-4 position-relative payment-grp">                                        
                                        <div class="input-group">
                                            <input type="text"  class="form-control" name="payment_id" id="payment_id" readonly value="<?=$payment_id?>">
                                            <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M13.12 24h-2.24a1.498 1.498 0 0 1-1.486-1.32l-.239-1.876a9.45 9.45 0 0 1-1.374-.569l-1.494 1.161a1.492 1.492 0 0 1-1.985-.126l-1.575-1.575a1.488 1.488 0 0 1-.122-1.979l1.161-1.495a9.232 9.232 0 0 1-.569-1.374l-1.88-.239A1.501 1.501 0 0 1 0 13.12v-2.24c0-.757.567-1.396 1.32-1.486l1.876-.239a9.45 9.45 0 0 1 .569-1.374l-1.16-1.494a1.49 1.49 0 0 1 .127-1.986l1.575-1.575a1.489 1.489 0 0 1 1.979-.122L7.78 3.766a9.416 9.416 0 0 1 1.375-.569l.239-1.88C9.484.567 10.123 0 10.88 0h2.24c.757 0 1.396.567 1.486 1.32l.239 1.876c.478.155.938.346 1.375.569l1.494-1.161a1.49 1.49 0 0 1 1.985.127l1.575 1.575c.537.521.591 1.374.122 1.979L20.235 7.78c.224.437.415.897.569 1.374l1.88.239A1.5 1.5 0 0 1 24 10.88v2.24c0 .757-.567 1.396-1.32 1.486l-1.876.239a9.45 9.45 0 0 1-.569 1.374l1.161 1.494a1.49 1.49 0 0 1-.127 1.985l-1.575 1.575a1.487 1.487 0 0 1-1.979.122l-1.495-1.161a9.232 9.232 0 0 1-1.374.569l-.239 1.88A1.5 1.5 0 0 1 13.12 24zm-5.39-4.86c.083 0 .168.021.244.063a8.393 8.393 0 0 0 1.774.736.5.5 0 0 1 .358.417l.28 2.2c.03.251.247.444.494.444h2.24a.504.504 0 0 0 .493-.439l.281-2.204a.5.5 0 0 1 .358-.417 8.393 8.393 0 0 0 1.774-.736.499.499 0 0 1 .55.042l1.75 1.36a.492.492 0 0 0 .655-.034l1.585-1.585a.495.495 0 0 0 .039-.66l-1.36-1.75a.5.5 0 0 1-.042-.55 8.393 8.393 0 0 0 .736-1.774.5.5 0 0 1 .417-.358l2.2-.28A.507.507 0 0 0 23 13.12v-2.24a.504.504 0 0 0-.439-.493l-2.204-.281a.5.5 0 0 1-.417-.358 8.393 8.393 0 0 0-.736-1.774.497.497 0 0 1 .042-.55l1.36-1.75a.49.49 0 0 0-.033-.654l-1.585-1.585a.492.492 0 0 0-.66-.039l-1.75 1.36a.5.5 0 0 1-.551.042 8.359 8.359 0 0 0-1.774-.736.5.5 0 0 1-.358-.417l-.28-2.2A.507.507 0 0 0 13.12 1h-2.24a.504.504 0 0 0-.493.439l-.281 2.204a.502.502 0 0 1-.358.418 8.356 8.356 0 0 0-1.774.735.5.5 0 0 1-.551-.041l-1.75-1.36a.49.49 0 0 0-.654.033L3.434 5.014a.495.495 0 0 0-.039.66l1.36 1.75a.5.5 0 0 1 .042.55 8.341 8.341 0 0 0-.736 1.774.5.5 0 0 1-.417.358l-2.2.28A.505.505 0 0 0 1 10.88v2.24c0 .247.193.464.439.493l2.204.281a.5.5 0 0 1 .417.358c.18.626.428 1.223.736 1.774a.497.497 0 0 1-.042.55l-1.36 1.75a.49.49 0 0 0 .033.654l1.585 1.585a.494.494 0 0 0 .66.039l1.75-1.36a.515.515 0 0 1 .308-.104z" fill="#58a8fb" opacity="1" data-original="#000000" class=""></path><path d="M12 17c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5zm0-9c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4z" fill="#58a8fb" opacity="1" data-original="#000000" class=""></path></g></svg></span>
                                        </div>
                                <span class="text-danger"><?php echo form_error('payment_id'); ?></span>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2 px-5">
                                    <label for="validationTooltip01" class="form-label"><span class="text-danger">Payment Mode #*</span></label>
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="px-4 position-relative">
                                    <select name="payment_mode" id="payment_mode" class="form-control">
                                            <option value="">Select Payment Mode</option>
                                            <option value="1">Bank Remittance</option>
                                            <option value="2">Bank Transfer</option>
                                            <option value="3">Cash</option>
                                            <option value="4">Check</option>
                                            <option value="5">Credit Card</option>
                                        </select>
                                <span class="text-danger"><?php echo form_error('payment_mode'); ?></span>

                                    </div>
                                </div >
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2 px-5">
                                    <label for="validationTooltip01" class="form-label">Refrence#</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="px-4 position-relative">
                                        <input type="text"  class="form-control" name="reference_no" id="reference_no" placeholder="Reference No">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-2 px-5">
                                    <label for="validationTooltip01" class="form-label">Notes</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="px-4 position-relative">
                                        <textarea type="text"  class="form-control" id="notes" name="notes" placeholder="Notes" ></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row mt-4">
                                <div class="col-md-2 px-5">
                                    <label for="validationTooltip01" class="form-label">Tax deducted?</label>
                                </div>
                                <div class="col-md-4">
                                    <div class="px-4 position-relative">
                                        <input type="radio"   name="deducted" > <label for="" class="px-2">No Tax deducted</label> 
                                        <input type="radio"   name="deducted"  > <label for="" class="px-2">Yes, TDS (Income Tax)</label> 
                                    </div>
                                </div >
                            </div> -->
                            <div class="row mt-4">
                                <div class="col-md-2 px-5">
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="px-4 position-relative">
                                         <div class="float-end">
                                                <button type="submit" class="btn btn_save" name="save"> Save </button>
                                                <button  class="btn button_btn clear_check"> Cancel</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                 </div>
                </form>
            </div>
        </div>
    </div>  
    <div class="container-fluid px-5">    
       <div class="row mt-4 mx-2">
            <div class="col-md-9 transaction-customer-name px-3">
                <div class="row">
                    <div class="col-md-6 pt-2">
                        <div class="d-flex">
                            <p style="font-size: 18px; text-align:left;" class="p-para">Transaction List </p>
                           
                        </div>
                    </div>
                    <div class="col-md-6 pt-2">
                        <p style="font-size: 14px; text-align:right;font-weight:500;color:#58a8fb;font-family: 'Open Sans' !important;"> Clear Applied Amount</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-2">
            <div class="col-md-9 transaction-customer-name table-styling">
            </div>
            <div class="col-md-9">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Invoice Number</th>
                <th scope="col">Payment Id</th>
                <th scope="col">Amount</th>
                <th scope="col">Bank Charges</th>
                <th scope="col">Reference</th>
                <th scope="col">Notes</th>
                <th scope="col">Payment Mode</th>
                <th scope="col">Created Date</th>

                </tr>
            </thead>
            
            <tbody>
            <?php
            if(!empty($payment_record))
            {
                ?>
                <?php
                $i=1;
                $recieved_amt = 0 ;
                foreach ($payment_record as $key => $value)
                {
                    $recieved_amt += $value->amount;
                    switch($value->payment_mode)
                    {
                        case 1 : $payment_mode = "Bank Remittance";
                        break;
                        case 2 : $payment_mode = "Bank Transfer";
                        break;
                        case 3 : $payment_mode = "Cash";
                        break;
                        case 4 : $payment_mode = "Check";
                        break;
                        case 5 : $payment_mode = "Credit Card";
                        break;
                    }
                    ?>
                <tr>
                    <th scope="row"><?=$i++?></th>
                    <td><?=$value->payment_date?></td>
                    <td><?=$invoice[0]->invoice_number?></td>
                    <td><?=$value->payment_id?></td>
                    <td><?=$value->amount?></td>
                    <td><?=$value->bank_charges?></td>
                    <td><?=$value->reference?></td>
                    <td><span data-bs-toggle="tooltip" data-bs-placement="top" title="<?=$value->notes?>"><i class="fa fa-list"></i></span></td>
                    <td><?=$payment_mode?></td>
                    <td><?=date('m-d-Y H:i:s', strtotime($value->created_at))?></td>
                </tr>
                <?php } ?>
            
            
            <?php }
            else
            {
                ?>
                <tr ><td colspan="10"  class="text-center">No Record Found</td></tr>
                <?php
            } ?>
            </tbody>
        </table>
            </div>
        </div>
        <div class="row mt-1  mx-2">
            <div class="col-md-9 transaction-customer-name table-styling">
            </div>
        </div>
        <div class="row mx-2 table-btm">
            <div class="col-md-9">
                <table class="table table-total">
                    <thead>
                        <tr>     
                            <th>Total Amount : $<?=$set_total_due_amount?>.00</th> 
                            
                            <th>Total Recieved Amount :  $<?=$recieved_amt?>.00</th>
                            <!-- <th>$<?=$set_total_due_amount?>.00</th> -->
                            <th></th>
                            <th>Balance Amount : $<?=$set_total_due_amount-$recieved_amt?>.00</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
     </div>
     <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

     <script>
     $(".btn_save").click(function(e) {

    let customer_name = $('#customer_name').val();
    let invoice_id    = $('#invoice_id').val();
    let amount       = $('#amount').val();
    let bank_charges  = $('#bank_charges').val();
    let payment_date  = $('#payment_date_id').val();
    let payment_id    = $('#payment_id').val();
    let payment_mode  = $('#payment_mode').val();
    let reference_no  = $('#reference_no').val();
    let max_payable_amt = $('#max_payable_amt').val();
    let notes = $('#notes').val();
    if(customer_name=='')
    {
        alert('Customer name should not be empty');
        $('#customer_name').focus();
        return false;
    }
    if(invoice_id=='')
    {
        alert('Invoice no should not be empty');
        $('#invoice_id').focus();
        return false;
    }
    if(amount=='')
    {
        alert('Amount should not be empty');
        $('#amount').focus();
        return false;
    }
    if(payment_date=='')
    {
        alert('Payment date can not be empty');
        $('#payment_date').focus();
        return false;
    }
    if(payment_id=='')
    {
        alert('Payment id can not be empty');
        $('#payment_id').focus();
        return false;
    }
    if(payment_mode=='')
    {
        alert('Payment mode should not be empty');
        $('#payment_mode').focus();
        return false;
    }
    if(parseInt(amount)>parseInt(max_payable_amt))
    {
        alert('Maximum payable amount is ' + max_payable_amt);
        $('#amount').val('');
        $('#amount').focus();
        return false;
    }
    var btn_name = $(this).attr('name');
    if(btn_name=='save')
    {
       $('.btn_list').html('<input type="hidden" name="save" value="save">');
    }
    
    $('form').submit(); // Submit the form it is in.
    
    return true;
});

$(function () { 
            $("#payment_date").datepicker({  
                autoclose: true,  
                todayHighlight: true, 
            }).datepicker('update', new Date()); 
        }); 

     </script>
     
    
    