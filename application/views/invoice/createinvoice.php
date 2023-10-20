<?php
if(!empty($result)){
    $buttonName = 'Save Changes';
    $formAction = 'invoice/updateInvoice';
    $heading = 'Update Invoice Information';
    $sub_heading = 'Update Invoice';
    $class='d-none';
}
else{
    $buttonName = 'Save And Send';
    $heading = 'Fill Invoice Information';
    $sub_heading = 'Create Invoice';
    $class = '';
    $formAction = 'Invoice/addInvoice';
}
$hidden_id='';
$first_name='';
$last_name='';
$mobile_1='';
$mobile_2='';
$email='';
$amount='';
$item='';
$date='';
$due_date='';
$taxable='';
$other_charges='';
$total_amount='';
$invoice_number='';
$order_number='';
foreach($result as $row){
    $hidden_id= $row->id;
    $first_name= $row->first_name;
    $last_name= $row->last_name;
    $mobile_1= $row->mobile_1;
    $mobile_2= $row->mobile_2;
    $email= $row->email;
    $amount= $row->amount;
    $item= $row->item;
    $date= $row->date;
    $due_date= $row->due_date;
    $taxable= $row->taxable;
    $other_charges= $row->other_charges;
    $total_amount= $row->total_amount;
    $invoice_number= $row->invoice_number;
    $order_number= $row->order_number;
}
?>
<style>
    .leads-btn {
        text-align: end;
    }

    .lead_form_box {
        padding: 40px 20px;
    }
</style>

<?php echo form_open($formAction); ?>
<div class="second_header">
    <div class="container-fluid ">
        <div class="row justify-content-between align-content-center">
            <div class="col-6">
            <h5 class="d-inline"><?php echo $sub_heading;?></h5>
                <!-- <a href="#" class="d-inline">Edit Page Layout</a> -->
            </div>
            <div class="col-6">
                <div class="leads-btn">
                    <a href="<?php echo base_url(); ?>list-invoice" class="btn button_btn">Cancel </a>
                    <input type="submit" class="btn btn_save <?php  echo $class;?>" value="Save As Draft" name="save_draft">
                    <input type="submit" class="btn btn_save" value="<?php echo $buttonName;?>" name="save" >
                    <input type="hidden" value="<?php echo $hidden_id;?>" name="hidden_id" >
                    <input type="text" value="" class="d-none"  name="total_amount" id="total_amount">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="lead_form_box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <h3><?php  echo $heading;?></h3>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-12">
                <!-- <form class="row g-3 needs-validation"> -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                          <div class="col-md-8 pb-3 position-relative">
                                <label for="validationTooltip03" class="form-label">Invoice Number :</label>
                                <input type="text" name="invoice_number" class="form-control"  value="INV-0100<?php echo $get_invoice_number;?>" readonly>
                         </div> 
                         <div class="col-md-8 pb-3 position-relative">
                                <label for="validationTooltip01" class="form-label">First Name</label>
                                <select id="select-state22" placeholder="Search Name..." name="first_name" onchange="bookingsName();" class="bookings_name" <?php if(!empty($first_name)){ echo 'required';}?>>
                                    <option value="">Search Name</option>
                                    <?php if(!empty($select_name)){
                                        foreach ($select_name as $name) { ?>
                                    <option value="<?php echo $name->id;?>" <?= (set_value('first_name') == $name->id ) ? 'selected' : ''; ?> <?php if($first_name == $name->id){echo 'selected';} ?> ><?php echo $name->first_name;?> <?php echo $name->last_name;?></option>
                                    <?php } }?>
                                </select>
                                <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                            </div>
                            <div class="col-md-8 pb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">Phone Number 1</label>
                                <input type="text" name="mobile_1" class="form-control" id="mobile_1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" value="<?php if(!empty($mobile_1)){ echo $mobile_1;}else{ echo set_value('mobile_1'); }?>"  <?php if(!empty($mobile_1)){ echo 'required';}?> readonly>
                                <span class="text-danger"><?php echo form_error('mobile_1'); ?></span>
                            </div>
                        
                            <div class="col-md-8 pb-3 position-relative">
                                <label for="validationTooltip06" class="form-label">Date</label>
                                <input  type="date" class="form-control" name="date"  value="<?php if(!empty($date)){ echo $date ; }elseif(empty($date)){ echo  date('Y-m-d');} else{ echo set_value('date');}  ?>" <?php if(!empty($date)){ echo 'required';}?> /> 
                                <span class="text-danger"><?php echo form_error('date') ?></span>
                            </div>

                            <div class="col-md-8 pb-3 position-relative">
                                <label for="validationTooltip03" class="form-label">Taxable :</label>
                                <input type="checkbox" name="fooby[1][]" class="radio"  onchange="taXable(1);"  >
                                <label  class="form-label">Yes</label>
                                <input type="checkbox" name="fooby[1][]" class="radio"   onchange="taXable(0);"  checked>
                                <label  class="form-label">No</label>
                                <input type="number" name="taxable" id="taxable" oninput="calculateAmount(this.value)" min="0" step="any" class="form-control taxable-input d-none"  value="<?php if(!empty($taxable)){ echo $taxable;}elseif(empty($taxable)){ echo 0 ;}else{ echo set_value('taxable'); }?>" <?php if(!empty($first_name)){ echo 'required';}?>>
                                <span class="text-danger"><?php echo form_error('taxable'); ?></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-md-8 pb-3 position-relative">
                                    <label for="validationTooltip03" class="form-label">Order Number :</label>
                                    <input type="text" name="order_number" class="form-control"  value="<?php echo $order_number;?>">
                                </div> 
                                <div class="col-md-8 pb-3 position-relative">
                                    <label for="validationTooltip05" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" onkeydown="return /[a-z ]/i.test(event.key)" value="<?php if(!empty($last_name)){ echo $last_name;}else{ echo set_value('last_name'); }?>" <?php if(!empty($last_name)){ echo 'required';}?> readonly>
                                    <span class="text-danger"><?php echo form_error('last_name'); ?></span>
                                </div>
                                <div class="col-md-8 pb-3 position-relative d-none">
                                    <label for="validationTooltip06" class="form-label">Phone Number 2</label>
                                    <input type="text" name="mobile_2" class="form-control" id="mobile_2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" value="<?php if(!empty($mobile_2)){ echo $mobile_2; } else{ echo set_value('mobile_2'); }?>" readonly>
                                </div>
                                <div class="col-md-8 pb-3 position-relative">
                                    <label for="validationTooltip03" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="<?php if(!empty($email)){ echo $email;}else{ echo set_value('email'); }?>" <?php if(!empty($email)){ echo 'required';}?>  readonly>
                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                </div>
                                <div class="col-md-8 pb-3 position-relative">
                                    <label for="validationTooltip06" class="form-label">Due Date</label>
                                    <input  type="date" class="form-control" name="due_date"  value="<?php if(!empty($due_date)){ echo $due_date ; } else{ echo set_value('due_date');}  ?>" <?php if(!empty($due_date)){ echo 'required';}?> /> 
                                    <span class="text-danger"><?php echo form_error('due_date') ?></span>
                                </div>       
                                                                                                            
                                <div class="col-md-8 pb-3 position-relative">
                                <label for="validationTooltip03" class="form-label">Other Charge :</label>
                                    <input type="number" name="other_charges" id="other_charges" class="form-control" min="0" step="any" oninput="calculateAmount(this.value)"  value="<?php if(!empty($other_charges)){ echo $other_charges;}elseif(empty($other_charges)){ echo 0;}else{ echo set_value('other_charges'); }?>" >
                                    <span class="text-danger"><?php echo form_error('other_charges'); ?></span>
                                </div> 
                                <div class="col-md-8 pb-3 position-relative">
                                <label for="validationTooltip03" class="form-label">Term & Condition :</label>
                                    <textarea type="text" name="description1" id="description1" class="form-control">All the payments made for repair and service can only be partially refunded within 30 days. Payments made against any software purchases cannot be refunded once software is installed on the customer's device. Products once sold cannot be returned. Exchange only in 3 days from Invoice Date.</textarea>
                                    <span class="text-danger"><?php echo form_error('description1'); ?></span>
                                </div> 

                            </div>
                            </div>
                            <div class="duplicate">
                                <div class="row mb-2 ">
                                    <div class="col-md-2" id="items">
                                        <label for="validationTooltip03" class="form-label">Item</label>
                                        <input type="text" name="item[]" class="form-control item"  value="" required>
                                    </div> 
                                    <div class="col-md-2" id="description">
                                        <label for="validationTooltip03" class="form-label">Description</label>
                                        <input type="text" name="description[]" class="form-control description"  value="">
                                    </div>
                                    <div class="col-md-2" id="quantity">
                                        <label for="validationTooltip03" class="form-label">Qty</label>
                                        <input type="number" name="quantity[]" class="form-control quantity"  value="" oninput="calculateAmount(this.value)" required>
                                    </div> 
                                    <div class="col-md-2" id="amounts">
                                        <label for="validationTooltip03" class="form-label">Rate</label>
                                        <input type="number" name="amounts[]" class="form-control amount"  oninput="calculateAmount(this.value)" min="0" step="any" required>
                                        <span class="deleteicon bg-danger d-none">delete</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <span class="btn btn_save" id="add2">Add Item<span class="fa fa-add"></span></span>
                                <span class="btn btn_save" id="remove2">Remove Item<span class="fa fa-times"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


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
  
  // add more item in invoice 
  $("#add").on("click", () => {
          $("#items").append("<input type='text' name='item[]' class='form-control  mt-2 item'  value=''>");
          $("#description").append("<input type='text' name='description[]' class='form-control  mt-2 description'  value=''>");
          $("#quantity").append("<input type='number' name='quantity[]' class='form-control  mt-2 quantity' oninput='calculateAmount(this.value)'  value=''>");
          $("#amounts").append("<input type='number' name='amounts[]' class='form-control  mt-2 amount' oninput='calculateAmount(this.value)'  min='0' step='any'> ");
          $(".deleteicon").removeClass("d-none");


          
});
$(".deleteicon").click(function() {
    $(this).remove("<input type='text' name='item[]' class='form-control  mt-2 item'  value=''>");
    $(this).remove("<input type='text' name='description[]' class='form-control  mt-2 description'  value=''>");
    $(this).remove("<input type='number' name='quantity[]' class='form-control  mt-2 quantity' oninput='calculateAmount(this.value)'  value=''>");
    $(this).remove("<input type='number' name='amounts[]' class='form-control  mt-2 amount' oninput='calculateAmount(this.value)'  min='0' step='any'> ");
})

function calculateAmount(e){
  
//   const quantity  = document.querySelector('.quantity').values

    var quantity=0;
    var amounts=0;
    var other_charges=0;
    var taxable=0;
  $('.quantity').each(function(index){
    quantity += parseFloat( $(this).val())
  });
  $('.amount').each(function(index){
    amounts += parseFloat( $(this).val())
  });
  $('#other_charges').each(function(index){
    other_charges += parseFloat( $(this).val())
  });
  $('#taxable').each(function(index){
    taxable += parseFloat( $(this).val())
  });
  total_amount = parseInt(quantity) * parseInt(amounts) + parseInt(other_charges) + parseInt(taxable  );
//   total_amount = parseInt(quantity) * parseInt(amounts) / parseInt(2) + parseInt(other_charges) + parseInt(taxable  );
  $("#total_amount").val(total_amount);


  
  
}

$('#add2').click(function(){
    $(".duplicate")
    .eq(0)
      .clone()
      .find("input").val("").end() // ***
      .show()
      .insertAfter(".duplicate:last");
      

//   $('.duplicate:last').append($('.duplicate:last').clone());
})
$('#remove2').click(function(){
    var numItems = $('.duplicate').length
  if(numItems > 1 ) {
    $('.duplicate:last').append($('.duplicate:last').remove())
  }
})
// click handler
</script>