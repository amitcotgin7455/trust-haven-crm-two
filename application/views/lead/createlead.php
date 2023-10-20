<?php
if(!empty($result)){
    $buttonName = 'Save Changes';
    $formAction = 'Lead/updateLead';
    $heading = 'Lead Information';
    $sub_heading = 'Update Lead';
    $class='d-none';
}
else{
    $buttonName = 'Save';
    $heading = 'Lead Information';
    $sub_heading = 'Create Lead';
    $class = '';
    $formAction = 'Lead/addLead';
}
$hidden_id='';
$first_name='';
$last_name='';
$mobile_1='';
$mobile_2='';
$email='';
$lead_status='';
$description='';
foreach($result as $row){
    $hidden_id= $row->id;
    $first_name= $row->first_name;
    $last_name= $row->last_name;
    $mobile_1= $row->mobile_1;
    $mobile_2= $row->mobile_2;
    $email= $row->email;
    $lead_status = $row->lead_status;
    $description = $row->description;
}

if(!empty($exist_lead_detail))
{
        if($exist_lead_detail->id)
        {
        $hidden_id= $exist_lead_detail->id;
        }
        $first_name = $exist_lead_detail->first_name;
        $last_name = $exist_lead_detail->last_name;
        $mobile_1 = $exist_lead_detail->mobile_1;
        $mobile_2 = $exist_lead_detail->mobile_2;
        $email = $exist_lead_detail->email;
        $lead_status = $exist_lead_detail->lead_status;
        $description = $exist_lead_detail->description;
        
}
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
</style>
<?php  $data = array('onsubmit' => 'return valid()');?>
<?php echo form_open($formAction,$data); ?>
<div class="second_header">
    <div class="container-fluid ">
        <div class="row justify-content-between align-content-center">
            <div class="col-6">
                <h5 class="d-inline"><?php echo $sub_heading;?></h5>
                <!-- <a href="#" class="d-inline">Edit Page Layout</a> -->
            </div>
            <div class="col-6">
                <div class="leads-btn mb-2">
                    <a href="<?php echo base_url(); ?>list-lead" class="btn button_btn <?php echo $class;?>">Cancel </a>
                    <input type="submit" class="btn btn_save <?php  echo $class;?>" value="Save and New" name="save_new">
                    <input type="submit" class="btn btn_save" value="<?php echo $buttonName;?>" name="save">
                    <!-- <input type="submit"  value="<?php echo $buttonName;?>" name="save"> -->
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
                                    <div class="d-flex">
                                            <div class="pt-2 ps-4 position-relative">
                                                <label for="validationTooltip01" class="form-label">First Name <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="px-4 position-relative">
                                                <input type="text" name="first_name" value="<?php if(!empty($first_name)){echo $first_name;}else{ echo set_value('first_name');} ?>" class="form-control" id="validationTooltip01" onkeydown="return /[a-z ]/i.test(event.key)" <?php if(!empty($first_name)){ echo 'required';}?>>
                                                <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                                            </div>
                                    </div>   
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <div class="pt-2 ps-4 position-relative">
                                            <label for="validationTooltip05" class="form-label">Last Name<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="px-4 position-relative">
                                            <input type="text" name="last_name" value="<?php if(!empty($last_name)){echo $last_name;}else{ echo set_value('last_name');} ?>" class="form-control" id="validationTooltip05" onkeydown="return /[a-z ]/i.test(event.key)"  <?php if(!empty($last_name)){ echo 'required';}?>>
                                            <span class="text-danger"><?php echo form_error('last_name'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                <div class="d-flex">
                                        <div class="pt-2 ps-4 position-relative">
                                            <label for="validationTooltip02" class="form-label">Phone Number<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="px-4 position-relative">
                                            <input type="text" id="mobile_1" name="mobile_1" value="<?php if(!empty($mobile_1)){echo $mobile_1;}else{ echo set_value('mobile_1');} ?>" class="form-control" id="validationTooltip02" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" <?php if(!empty($mobile_1)){ echo 'required';}?>>
                                            <span class="text-danger"><?php echo form_error('mobile_1'); ?></span>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                <div class="d-flex">
                                        <div class="pt-2 ps-4 position-relative">
                                            <label for="validationTooltip06" class="form-label">Alt Phone No</label>
                                        </div>
                                        <div class="px-4 position-relative">
                                            <input type="text" id="mobile_2" name="mobile_2" value="<?php if(!empty($mobile_2)){echo $mobile_2;}else{ echo set_value('mobile_2');} ?>" class="form-control" id="validationTooltip06" oninput="this.value =this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
                                            <span class="text-danger"><?php echo form_error('mobile_2'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                     <div class="d-flex">
                                        <div class="pt-2 ps-4 position-relative">
                                            <label for="validationTooltip03" class="form-label">Email<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="px-4 position-relative">
                                            <input type="email" name="email" value="<?php if(!empty($email)){echo $email;}else{ echo set_value('email');} ?>" class="form-control" id="validationTooltip03" value="<?php echo set_value('email'); ?>" <?php if(!empty($email)){ echo 'required';}?>>
                                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                     <div class="d-flex">
                                        <div class="pt-2 ps-4 position-relative">
                                            <label for="validationTooltip04" class="form-label">Lead Status<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="px-4 position-relative">
                                            <select class="form-select form-control" id="validationTooltip04" aria-label="Default select example" name="lead_status" <?php if(!empty($lead_status)){ echo 'required';}?>>
                                                <option value="">Lead Status</option>
                                                <option value="1" <?= (set_value('lead_status') == 1) ? 'selected' : ''; ?> <?= ($lead_status == 1) ? 'selected' : ''; ?> >Call Back</option>
                                                <?php
                                                if($hidden_id= $row->id)
                                                {
                                                    ?>
                                                <option value="2" <?= (set_value('lead_status') == 2) ? 'selected' : ''; ?> <?= ($lead_status == 2) ? 'selected' : ''; ?> >Sale</option>
                                                <?php } ?>
                                                <option value="3" <?= (set_value('lead_status') == 3) ? 'selected' : ''; ?> <?= ($lead_status == 3) ? 'selected' : ''; ?> >Not Interested</option>
                                                <option value="4" <?= (set_value('lead_status') == 4) ? 'selected' : ''; ?> <?= ($lead_status == 4) ? 'selected' : ''; ?> >VM</option>
                                                <option value="5" <?= (set_value('lead_status') == 5) ? 'selected' : ''; ?> <?= ($lead_status == 5) ? 'selected' : ''; ?> >DND</option>
                                            </select>
                                            <span class="text-danger"><?php echo form_error('lead_status'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="d-flex">
                                        <div class="pt-2 ps-4 position-relative">
                                            <label for="validationTooltip06" class="form-label">Description</label>
                                        </div>
                                        <div class="px-4 position-relative">
                                            <textarea class="w-100 form-control" name="description" id="validationTooltip06" cols="50" rows="5" maxlength="300"><?php if(!empty($description)){echo $description;}else{ echo set_value('description');} ?></textarea>
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
       let mobile_1 = $("#mobile_1").val();
       let mobile_2 = $("#mobile_2").val();
 
       if($('#mobile_1').val().length == 0){
		    return true;
		}
       else if($('#mobile_1').val().length != 10){
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
</script>