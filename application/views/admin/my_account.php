 <?php
    $buttonName = 'Save';
    $heading = 'Profile';
    $sub_heading = 'Manage Account';
    $class = '';
    $formAction = 'Admin/updateProfile';
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
                <div class="leads-btn mb-2">
                    <a href="<?php echo base_url(); ?>" class="btn button_btn <?php echo $class;?>">Cancel </a>
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
                            <div class="col-md-8 pb-3 position-relative">
                                <label for="validationTooltip01" class="form-label">Name</label>
                                <input type="text" name="name" value="<?php if(!empty($user_detail->name)){echo $user_detail->name;}else{ echo set_value('name');} ?>" class="form-control" id="validationTooltip01" onkeydown="return /[a-z ]/i.test(event.key)" <?php if(!empty($first_name)){ echo 'required';}?>>
                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                            </div>
                            <div class="col-md-8 pb-3 position-relative">
                                <label for="validationTooltip03" class="form-label">username</label>
                                <input type="text" name="username" readonly value="<?php if(!empty($user_detail->username)){echo $user_detail->username;}else{ echo set_value('username');} ?>" class="form-control" id="validationTooltip03" value="<?php echo set_value('email'); ?>" <?php if(!empty($email)){ echo 'required';}?>>
                                <span class="text-danger"><?php echo form_error('username'); ?></span>
                            </div>
                           
                            <div class="col-md-8 pb-3 position-relative">
                                <label for="validationTooltip04" class="form-label">Role</label>
                                <select class="form-select form-control" id="validationTooltip04" disabled aria-label="Default select example" name="lead_status" <?php if(!empty($lead_status)){ echo 'required';}?>>
                                    <option value="">Role list</option>
                                    <?php
                                    foreach($role as $role_list)
                                    {
                                    ?>
                                      <option value="<?=$role_list->id?>" <?= (set_value('lead_status') == $role_list->id) ? 'selected' : ''; ?> <?= ($role_list->id == $user_detail->role_id) ? 'selected' : ''; ?> ><?=$role_list->title?></option>
                                    <?php
                                    } ?>
                                </select>
                                <span class="text-danger"><?php echo form_error('lead_status'); ?></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                            <div class="col-md-8 pb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">Email Id</label>
                                <input type="email" name="email" value="<?php if(!empty($user_detail->email)){echo $user_detail->email;}else{ echo set_value('email');} ?>" class="form-control" id="validationTooltip02" <?php if(!empty($user_detail->email)){ echo 'required';}?>>
                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                            </div>
                            <div class="col-md-8 pb-3 position-relative">
                                <label for="validationTooltip02" class="form-label">Phone No</label>
                                <input type="text" name="mobile" value="<?php if(!empty($user_detail->mobile)){echo $user_detail->mobile;}else{ echo set_value('mobile');} ?>" class="form-control" id="validationTooltip02" <?php if(!empty($user_detail->email)){ echo 'required';}?> oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
                                <span class="text-danger"><?php echo form_error('mobile'); ?></span>
                            </div>
                                <div class="col-md-8 pb-3 position-relative">
                                    <label for="validationTooltip06" class="form-label">Update Password</label>
                                    <input type="password" name="password" placeholder="Enter password if want to update" value="" class="form-control" id="validationTooltip06" >
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