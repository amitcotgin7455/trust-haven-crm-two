<?php
if(!empty($result)){
    $buttonName = 'Save Changes';
    $formAction = 'Contacts/updateContact';
    $heading = 'Update Contact Information';
    $sub_heading = 'Update Contact';
    $class='d-none';
}
else{
    $buttonName = 'Save';
    $heading = 'Contact Information';
    $sub_heading = 'Create Contact';
    $class = '';
    $formAction = 'Contacts/addContact';
}
$hidden_id='';
$first_name='';
$last_name='';
$mobile_1='';
$mobile_2='';
$email='';
$customer_id='';
$email_opt_out='';
$plan_status='';
$plan='';
$amc_plan='';
$amount='';
$remote_id1='';
$sale_id1='';
$worked_id1='';
$work_status='';
$courtesy='';
$bbb='';
$ha='';
$fb='';
$google='';
$service='';
$sale_date='';
$expiry_date='';
$description='';
foreach($result as $row){
    $hidden_id= $row->id;
    $first_name= $row->first_name;
    $last_name= $row->last_name;
    $mobile_1= $row->mobile_1;
    $mobile_2= $row->mobile_2;
    $email= $row->email;
    $customer_id= $row->customer_id;
    $email_opt_out= $row->email_opt_out;
    $plan_status= $row->plan_status;
    $plan= $row->plan;
    $amc_plan= $row->amc_plan;
    $amount= $row->amount;
    $remote_id1= $row->remote_id;
    $sale_id1= $row->sale_id;
    $worked_id1= $row->worked_id;
    $work_status= $row->work_status;
    $courtesy= $row->courtesy;
    $bbb= $row->bbb;
    $ha= $row->ha;
    $fb= $row->fb;
    $google= $row->google;
    $service= $row->service;
    $sale_date= $row->sale_date;
    $expiry_date= $row->expiry_date;
    $description = $row->description;
}
if(!empty($exist_lead_detail))
{
        if($exist_lead_detail->id)
        {
        $hidden_id= $exist_lead_detail->id;
        }
        $first_name= $exist_lead_detail->first_name;
        $last_name= $exist_lead_detail->last_name;
        $mobile_1= $exist_lead_detail->mobile_1;
        $mobile_2= $exist_lead_detail->mobile_2;
        $email= $exist_lead_detail->email;
        $customer_id= $exist_lead_detail->customer_id;
        $email_opt_out= $exist_lead_detail->email_opt_out;
        $plan_status= $exist_lead_detail->plan_status;
        $plan= $exist_lead_detail->plan;
        $amc_plan= $exist_lead_detail->amc_plan;
        $amount= $exist_lead_detail->amount;
        $remote_id1= $exist_lead_detail->remote_id;
        $sale_id1= $exist_lead_detail->sale_id;
        $worked_id1= $exist_lead_detail->worked_id;
        $work_status= $exist_lead_detail->work_status;
        $courtesy= $exist_lead_detail->courtesy;
        $bbb= $exist_lead_detail->bbb;
        $ha= $exist_lead_detail->ha;
        $fb= $exist_lead_detail->fb;
        $google= $exist_lead_detail->google;
        $service= $exist_lead_detail->service;
        $sale_date= $exist_lead_detail->sale_date;
        $expiry_date= $exist_lead_detail->expiry_date;
        $description = $exist_lead_detail->description;
        
}
if($sale_date)
{
$sale_exp =  explode('-',$sale_date);
$sale_date = $sale_exp[2].','.($sale_exp[0]-1).','.$sale_exp[1];
}
if($expiry_date)
{
$expiry_date_exp =  explode('-',$expiry_date);
$expiry_date = $expiry_date_exp[2].','.($expiry_date_exp[0]-1).','.$expiry_date_exp[1];
}

?>
<style>
    .leads-btn {
        text-align: end;
    }
    .lead_form_box {
        padding: 40px 20px;
    }

      label{margin-left: 20px;} 
      #datepicker{width:180px;} 
      #datepicker > span:hover{cursor: pointer;} 
   
</style>
<?php  $data = array('onsubmit' => 'return valid()');?>
<?php echo form_open($formAction,$data); ?>
    <div class="second_header">
            <div class="container-fluid ">
                <div class="row justify-content-between align-content-center">
                    <div class="col-6">
                        <h5 class="d-inline"><?php echo $sub_heading;?></h5>
                    </div>
                    <div class="col-6">
                        <div class="leads-btn mb-2">
                            <a href="<?php echo base_url(); ?>list-contact" class="btn button_btn">Cancel </a>
                            <input type="submit" class="btn btn_save <?php  echo $class;?>" value="Save and New" name="save_new">
                            <input type="submit" class="btn btn_save" value="<?php echo $buttonName;?>" name="save">
                            <input type="hidden" value="<?php echo $hidden_id;?>" name="hidden_id" >
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
                        <div class="row detail-box">
                            <div class="col-md-12">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="validationTooltip06" class="form-label">Customer Id</label>
                                                  
                                                </div>
                                                <div class="px-4 position-relative">
                                                    <input type="text" name="customer_id" oninput="this.value = this.value.replace(/[^a-zA-Z0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control customer_id" id="validationTooltip06" value="<?php if(!empty($customer_id)){ echo $customer_id; }else{ echo set_value('customer_id');}  ?>" onkeypress="if(this.value.length==8) return false;">
                                                    <input type="hidden" name="original_customer_id" value="<?php if(!empty($customer_id)){ echo $customer_id; }?>">
                                                    <?php if(empty(form_error('customer_id')))
                                                    {
                                                        ?>
                                                    <p class="pt-2">Customer Id must be 8 Character</p>

                                                        <?php
                                                    } 
                                                    ?>
                                                    <span class="text-danger"><?php echo form_error('customer_id'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="validationTooltip03" class="form-label">Email<span class="text-danger">*</span></label>
                                                    </div>                                        
                                                <div class="px-4 position-relative">
                                                    <input type="email" name="email" class="form-control" id="validationTooltip03" value="<?php if(!empty($email)){echo $email;}else{ echo set_value('email');} ?>" <?php if(!empty($email)){ echo 'required';}?>>
                                                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="validationTooltip06" class="form-label">First Name<span class="text-danger">*</span></label>
                                                </div>                                        
                                                <div class="px-4 position-relative">
                                                    <input type="text" name="first_name" class="form-control getvalue" onkeydown="return /[a-z ]/i.test(event.key)" value="<?php if(!empty($first_name)){echo $first_name;}else{ echo set_value('first_name');} ?>" id="getvaluename" <?php if(!empty($first_name)){ echo 'required';}?>>
                                                    <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="validationTooltip05" class="form-label">Last Name<span class="text-danger">*</span></label>
                                                </div>                                        
                                                <div class="px-4 position-relative">
                                                    <input type="text" name="last_name" class="form-control" id="validationTooltip05" onkeydown="return /[a-z ]/i.test(event.key)" value="<?php if(!empty($last_name)){ echo $last_name; }else{ echo set_value('last_name');}  ?>" <?php if(!empty($last_name)){ echo 'required';}?>>
                                                    <span class="text-danger"><?php echo form_error('last_name'); ?></span>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="validationTooltip02" class="form-label">Phone Number<span class="text-danger">*</span></label>
                                                </div>
                                                <div class="px-4 position-relative">
                                                    <input type="text" name="mobile_1" class="form-control getvalue"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" value="<?php if(!empty($mobile_1)){echo $mobile_1;}else{ echo set_value('mobile_1');} ?>" id="getvaluenumber" <?php if(!empty($mobile_1)){ echo 'required';}?>>
                                                    <span class="text-danger"><?php echo form_error('mobile_1'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="col-md-8 pb-3">
                                                <div class="d-flex mb-2">
                                                    <div class="pt-2 ps-4 position-relative">
                                                        <label for="validationTooltip06" class="form-label">Alt Phone No</label>
                                                    </div>                                        
                                                    <div class="px-4 position-relative">
                                                        <input type="text" id="mobile_2" name="mobile_2" class="form-control" id="validationTooltip06" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" value="<?php if(!empty($mobile_2)){ echo $mobile_2; }else{ echo set_value('mobile_2');}  ?>">
                                                    </div> 
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="validationTooltip04" class="form-label">Plan Status<span class="text-danger">*</span></label>
                                                </div>                                        
                                                <div class="px-4 position-relative">
                                                    <select class="form-select form-control" id="validationTooltip04" aria-label="Default select example" name="plan_status"  <?php if(!empty($plan_status)){ echo 'required';}?>>
                                                        <option value="">Select Plan Status</option>
                                                        <option value="1" <?= (set_value('plan_status') == 1) ? 'selected' : ''; ?> <?php if($plan_status==1){ echo 'selected';}?>>Active</option>
                                                        <option value="2" <?= (set_value('plan_status') == 2) ? 'selected' : ''; ?> <?php if($plan_status==2){ echo 'selected';}?>>Refunded Or Cancelled</option>
                                                        <option value="3" <?= (set_value('plan_status') == 3) ? 'selected' : ''; ?> <?php if($plan_status==3){ echo 'selected';}?>>DND</option>
                                                        <option value="4" <?= (set_value('plan_status') == 4) ? 'selected' : ''; ?> <?php if($plan_status==4){ echo 'selected';}?>>Voided</option>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('plan_status'); ?></span>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                    <div class="pt-2 ps-4 position-relative">
                                                        <label for="validationTooltip03" class="form-label">Amount<span class="text-danger">*</span></label>
                                                    </div>                                        
                                                    <div class="px-4 position-relative">
                                                        <input type="text" name="amount" class="form-control " id="validationTooltip03" value="<?php if(!empty($amount)){ echo $amount; }else{ echo set_value('amount');}  ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" <?php if(!empty($amount)){ echo 'required';}?>>
                                                        <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                                    </div> 
                                            </div>   
                                        </div>
                                    </div>                                
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="validationTooltip04" class="form-label">Sale By<span class="text-danger">*</span></label>
                                                </div>                                        
                                                <div class="px-4 position-relative" >
                                                    <select class="form-select form-control" id="validationTooltip04" aria-label="Default select example" name="sale_id" <?php if(!empty($sale_id1)){ echo 'required';}?>>
                                                        <option value="">Select Remote</option>
                                                        <?php if(!empty($sale_id)){
                                                        foreach($sale_id as $sale_id){ ?>
                                                        <option value="<?= $sale_id->id?>" <?php if($sale_id->id==$sale_id1){ echo 'selected';} ?> <?=(set_value('sale_id') == $sale_id->id) ? 'selected' : '';?>><?= $sale_id->title?></option>
                                                        <?php }}?>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('sale_id'); ?></span>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="validationTooltip03" class="form-label">Plan<span class="text-danger">*</span></label>
                                                </div>                                        
                                                <div class="px-4 position-relative">
                                                    <input type="text" name="plan" class="form-control" id="validationTooltip03" value="<?php if(!empty($plan)){echo $plan;}else{ echo set_value('plan');} ?>" <?php if(!empty($plan)){ echo 'required';}?>>
                                                    <span class="text-danger"><?php echo form_error('plan'); ?></span>
                                                </div>
                                            </div>  
            
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="validationTooltip04" class="form-label">Work Status<span class="text-danger">*</span></label>
                                                </div>                                        
                                                <div class="px-4 position-relative">
                                                    <select class="form-select form-control" id="validationTooltip04" aria-label="Default select example" name="work_status" <?php if(!empty($work_status)){ echo 'required';}?>>
                                                        <option value="">Work Status</option>
                                                        <option value="1" <?= (set_value('work_status') == 1) ? 'selected' : ''; ?> <?php if($work_status==1){ echo 'selected';}?>>Pending</option>
                                                        <option value="2" <?= (set_value('work_status') == 2) ? 'selected' : ''; ?> <?php if($work_status==2){ echo 'selected';}?>>Done</option>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('work_status'); ?></span>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                            <label for="validationTooltip04" class="form-label">Remote By<span class="text-danger">*</span></label>
                                                </div>                                        
                                                <div class="px-4 position-relative"> 
                                                    <select class="form-select form-control" id="validationTooltip04" aria-label="Default select example" name="remote_id" <?php if(!empty($remote_id1)){ echo 'required';}?>>
                                                        <option value="">Select Remote</option>
                                                        <?php if(!empty($remote_id)){
                                                        foreach($remote_id as $remote_id){ ?>
                                                        <option value="<?= $remote_id->id?>" <?php if($remote_id->id==$remote_id1){ echo 'selected'; }?> <?=(set_value('remote_id') == $remote_id->id) ? 'selected' : '';?>><?= $remote_id->title?></option>
                                                        <?php }}?>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('remote_id'); ?></span>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                        <label for="validationTooltip04" class="form-label">Worked By</label>
                                                </div>                                        
                                                <div class="px-4 position-relative">
                                                    <select class="form-select form-control" id="validationTooltip04" aria-label="Default select example" name="worked_id" <?php if(!empty($worked_id1)){ echo 'required';}?>>
                                                        <option value="">Select Worked</option>
                                                        <?php if(!empty($worked_id)){
                                                        foreach($worked_id as $worked_id){ ?>
                                                        <option value="<?= $worked_id->id?>" <?php if($worked_id->id==$worked_id1){ echo 'selected'; }?> <?=(set_value('worked_id') == $worked_id->id) ? 'selected' : '';?>><?= $worked_id->title?></option>
                                                        <?php }}?>
                                                    </select>
                                                    <span class="text-danger"><?php echo form_error('worked_id'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="d-flex mb-2 checkboxss-s">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="bbbchecked" class="form-label mx-3">BBB</label> 
                                                </div>                                        
                                                <div class="ps-5 pe-4 position-relative">
                                                    <input class="form-check-input" type="checkbox" id="bbbchecked" name="bbb" value="1" <?php if($bbb==1){ echo 'checked';}?> <?= (set_value('bbb') == 1) ? 'checked' : ''; ?>>
                                                </div> 
                                            </div>   
                                        </div>
                                        <div class="col-md-2">
                                            <div class="d-flex mb-2 checkboxss-s">
                                                <div class="pt-2 ps-4 position-relative">    
                                                    <label for="Courtesycheck" class="form-label  mx-3">Courtesy</label> 
                                                </div>
                                                <div class="ps-5 pe-4 position-relative">
                                                    <input class="form-check-input" type="checkbox" id="Courtesycheck" name="courtesy"  value="2" <?php if($courtesy==2){ echo 'checked';}?> <?= (set_value('courtesy') == 2) ? 'checked' : ''; ?>>
                                                </div>                                       
                                            </div>         
                                        </div>
                                        
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-2">
                                            <div class="d-flex mb-2  checkboxss-s">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="fbchecked" class="form-label mx-3">FB  </label> 
                                                </div>                                        
                                                <div class="ps-5 pe-4 position-relative">
                                                    <input class="form-check-input" type="checkbox" id="fbchecked" name="fb" value="1" <?php if($fb==1){ echo 'checked';}?> <?= (set_value('fb') == 1) ? 'checked' : ''; ?>>
                                                </div> 
                                            </div>  
                                        </div>
                                        <div class="col-md-2">
                                            <div class="d-flex mb-2  checkboxss-s">
                                                <div class="pt-2  ps-4 position-relative"> 
                                                    <label for="Hachecked" class="form-label mx-3">HA</label> 
                                                </div>
                                                <div class="ps-5 pe-4 position-relative">
                                                    <input class="form-check-input" type="checkbox" id="Hachecked" name="ha" value="1" <?php if($ha==1){ echo 'checked';}?> <?= (set_value('ha') == 1) ? 'checked' : ''; ?>>
                                                </div> 
                                            </div>  
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2">
                                            <div class="d-flex mb-2  checkboxss-s">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="servicechecked" class="form-label mx-3">Service</label> 
                                                </div>                                        
                                                <div class="ps-5 pe-4 position-relative">
                                                    <input class="form-check-input" type="checkbox" id="servicechecked" name="service" value="1" <?php if($service==1){ echo 'checked';}?> <?= (set_value('service') == 1) ? 'checked' : ''; ?>>
                                                </div> 
                                            </div> 
                                        </div>
                                        <div class="col-md-2">
                                            <div class="d-flex mb-2  checkboxss-s">
                                                    <div class="pt-2 ps-4 position-relative">
                                                        <label for="Googlechecked" class="form-label mx-3">Google</label> 
                                                    </div>
                                                    <div class="ps-5 pe-4 position-relative">
                                                        <input class="form-check-input" type="checkbox" id="Googlechecked" name="google" value="1" <?php if($google==1){ echo 'checked';}?> <?= (set_value('google') == 1) ? 'checked' : ''; ?>>
                                                    </div>                                        
                                                </div> 
                                            </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="validationTooltip03" class="form-label">Sale Date<span class="text-danger">*</span> </label> 
                                                        <!-- <input class="form-control "  type="date" id="flexCheckChecked" name="sale_date" value="<?php if(!empty($sale_date)){ echo$sale_date; }else{ echo set_value('sale_date');}  ?>" <?php if(!empty($sale_date)){ echo 'required';}?>> -->
                                                </div>                                        
                                                <div id="contact_sale_date" style="width: 346px;padding-left: 24px;" 
             class="input-group date" 
             data-date-format="mm-dd-yyyy"> 
            <input class="form-control" 
                   type="text" readonly name="sale_date" value="<?=$sale_date?>"/> 
            <span class="input-group-addon"> 
                <i class="glyphicon glyphicon-calendar"></i> 
            </span> 
        </div> 
                                            </div>
                                        </div>
                                      
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2 checkboxss-s">
                                                <div class="pt-2 ps-4 position-relative  ">    
                                                    <label for="flexCheckChecked" class="form-label mx-3">Email Opt Out</label> 
                                                </div>
                                                <div class="ps-5 pe-4 position-relative">
                                                    <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="email_opt_out" value="1" <?php if($email_opt_out==1){ echo 'checked';}?>   <?= (set_value('email_opt_out') == 1) ? 'checked' : ''; ?>>
                                                </div>                                        
                                            </div>   
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        
                                        <!-- <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="validationTooltip04" class="form-label">AMC Plan</label>
                                                </div>                                        
                                                <div class="px-4 position-relative">
                                                    <select class="form-select form-control" id="validationTooltip04" aria-label="Default select example" name="amc_plan" >
                                                        <option value="">Select AMC Plan</option>
                                                        <?php if(!empty($plan_id)){
                                                        foreach($plan_id as $plan_id1){ ?>
                                                        <option value="<?= $plan_id1->id?>" <?php if($plan_id1->id==$amc_plan){ echo 'selected';} ?> <?=(set_value('amc_plan') == $plan_id1->id) ? 'selected' : '';?>><?= $plan_id1->title?></option>
                                                        <?php }}?>
                                                    </select>
                                                </div> 
                                            </div>
                                        </div> -->
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="validationTooltip03" class="form-label">Date of Expiry<span class="text-danger">*</span> </label> 
                                                        <!-- <input class="form-control "  type="date" id="flexCheckChecked" name="sale_date" value="<?php if(!empty($expiry_date)){ echo $expiry_date; }else{ echo set_value('expiry_date');}  ?>" <?php if(!empty($expiry_date)){ echo 'required';}?>> -->
                                                </div>                                        
                                                <div id="contact_exp_date" style="width: 346px;padding-left: 24px;" 
             class="input-group date" 
             data-date-format="mm-dd-yyyy"> 
            <input class="form-control" 
                   type="text" readonly name="expiry_date"/> 
            <span class="input-group-addon"> 
                <i class="glyphicon glyphicon-calendar"></i> 
            </span> 
        </div> 
                                            </div>
                                        </div>

                                        <div class="col-12 py-5">
                                            <h3>Description</h3>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="validationTooltip06" class="form-label">Description</label>
                                                </div>                                        
                                                <div class="px-4 position-relative pt-2" style="margin-left: 0px;">                                    
                                                    <textarea class="w-100 form-control" name="description" id="validationTooltip06" cols="50" rows="5" maxlength="500"> <?php  if(!empty($description)) { echo $description ; } else { echo  set_value('description');}?></textarea>
                                                </div> 
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
</div>
<script>
    function valid()
    {
       let mobile_1 = $("#getvaluenumber").val();
       let mobile_2 = $("#mobile_2").val();
 
       if($('#getvaluenumber').val().length == 0){
		    return true;
		}
       else if($('#getvaluenumber').val().length != 10){
		    alert('Phone number must be 10 digits') ;
		    return false;
		}
		else if($('#mobile_2').val().length==0){
        return true;
        }
        else if($('#mobile_2').val().length != 10){
        alert('Alt Phone No must be 10 digits');
        return false;
        }
        else if((mobile_1 == mobile_2) &&  (mobile_2 != ''))
       {
        alert('Phone number 2 should not be same as phone number 1');
        $('#mobile_2').css("border","1px solid red");
        $('#mobile_2').focus();
        return false;
       }else{
        return true;
       }
    }
        $(function () { 
            $("#contact_sale_date").datepicker({  
                autoclose: true,  
                todayHighlight: true, 
            }).datepicker('update', new Date(<?=$sale_date?>)); 

            $("#contact_exp_date").datepicker({  
                autoclose: true,  
                todayHighlight: true,
                defaultDate: "+1w" 
            }).datepicker('update', new Date(<?=$expiry_date?>)); 
        }); 
    </script>