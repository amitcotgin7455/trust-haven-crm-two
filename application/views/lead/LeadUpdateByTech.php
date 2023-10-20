<?php
if(!empty($result)){
    $buttonName = 'Save Changes';
    $formAction = 'Lead/updateTechLeadStatus';
    $heading = 'Update Tech Lead Status';
    $sub_heading = 'Tech Lead Status';
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
$tech_lead_notes = '';
foreach($result as $row){
    $hidden_id= $row->id;
    $first_name= $row->first_name;
    $last_name= $row->last_name;
    $mobile_1= $row->mobile_1;
    $mobile_2= $row->mobile_2;
    $email= $row->email;
    $lead_status = $row->tech_lead_status;
    $description = $row->description;
    $tech_lead_notes = $row->tech_lead_notes;
}
?>
<style>
    .leads-btn {
        text-align: end;
    }

    .lead_form_box {
        padding: 40px 20px;
    }
    .second_header{
        border-bottom: 1px solid #eee !important
    }
   .lead_form_box{
        background: #fff
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
                <div class="leads-btn mb-2">
                    <a href="<?php echo base_url(); ?>list-lead" class="btn button_btn <?php echo $class;?>">Cancel </a>
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
                <div class="col-md-6">
                    <?php if (!empty($error)) {?>
                        <div class="alert alert-danger" role="alert"><?php if(!empty($error)){ echo $error ; }?></div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger" role="alert"><?php echo $this->session->flashdata('error');?></div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('done')) { ?>
                        <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('done');?></div>
                    <?php } ?>
                </div>
                <!-- <form class="row g-3 needs-validation"> -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-md-8 pb-3 position-relative">
                                    <label for="validationTooltip01" class="form-label">First Name</label>
                                    <input type="text" name="first_name" disabled value="<?php if(!empty($first_name)){echo $first_name;}else{ echo set_value('first_name');} ?>" class="form-control" id="validationTooltip01" onkeydown="return /[a-z ]/i.test(event.key)" <?php if(!empty($first_name)){ echo 'required';}?>>
                                    <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                                </div>
                                <div class="col-md-8 pb-3 position-relative">
                                    <label for="validationTooltip02" class="form-label">Phone Number 1</label>
                                    <input type="text" name="mobile_1" value="<?=$mobile_1?>" class="form-control" id="validationTooltip02" disabled>
                                    <span class="text-danger"><?php echo form_error('mobile_1'); ?></span>
                                </div>
                                <div class="col-md-8 pb-3 position-relative">
                                    <label for="validationTooltip03" class="form-label">Email</label>
                                    <input type="email" name="email" value="<?php if(!empty($email)){echo $email;}else{ echo set_value('email');} ?>" disabled class="form-control" id="validationTooltip03" value="<?php echo set_value('email'); ?>" <?php if(!empty($email)){ echo 'required';}?>>
                                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                                </div>
                                <div class="col-md-8 pb-3 position-relative">
                                    <label for="validationTooltip04" class="form-label">Leads Status</label>
                                    <select class="form-select form-control tech_lead_status" id="validationTooltip04" aria-label="Default select example" name="tech_lead_status"  <?php if(!empty($lead_status)){ echo 'required';}?>>
                                        <option value="">Lead Status</option>
                                        <option value="1" <?= (set_value('tech_lead_status') == 1) ? 'selected' : ''; ?> <?= ($lead_status == 1) ? 'selected' : ''; ?> >Close</option>
                                        <option value="2" <?= (set_value('tech_lead_status') == 2) ? 'selected' : ''; ?> <?= ($lead_status == 2) ? 'selected' : ''; ?> >Pending</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('lead_status'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-md-8 pb-3 position-relative">
                                    <label for="validationTooltip05" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" disabled value="<?php if(!empty($last_name)){echo $last_name;}else{ echo set_value('last_name');} ?>" class="form-control" id="validationTooltip05" onkeydown="return /[a-z ]/i.test(event.key)"  <?php if(!empty($last_name)){ echo 'required';}?>>
                                    <span class="text-danger"><?php echo form_error('last_name'); ?></span>
                                </div>
                                <div class="col-md-8 pb-3 position-relative">
                                    <label for="validationTooltip06"  class="form-label">Phone Number 2</label>
                                    <input type="text" name="mobile_2" disabled value="<?php if(!empty($mobile_2)){echo $mobile_2;}else{ echo set_value('mobile_2');} ?>" class="form-control" id="validationTooltip06" oninput="this.value =this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
                                </div>
                                <div class="col-md-8 pb-3 position-relative <?php if($lead_status==1) { echo 'd-none'; } ?> tech_lead_notes">
                                    <label for="validationTooltip06" class="form-label">Pending Lead Notes</label>
                                    <textarea class="w-100 form-control" name="tech_lead_note" id="validationTooltip06" cols="50" rows="5" maxlength="300"><?=$tech_lead_notes?></textarea>
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
