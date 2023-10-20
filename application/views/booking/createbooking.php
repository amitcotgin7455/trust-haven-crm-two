<?php
if(!empty($result)){
    $buttonName = 'Save Changes';
    $formAction = 'Bookings/updateBooking';
    $heading = 'Update Booking Information';
    $sub_heading = 'Update Booking';
    $class='d-none';
}
else{
    $buttonName = 'Save';
    $heading = 'Booking Information';
    $sub_heading = 'Create Booking';
    $class = '';
    $formAction = 'Bookings/addBooking';
}
$hidden_id='';
$first_name='';
$last_name='';
$timezone='';
$mobile_1='';
$mobile_2='';
$email='';
$date='';
$time='';
$booking_status='';
foreach($result as $row){
    $hidden_id= $row->id;
    $first_name= $row->first_name;
    $last_name= $row->last_name;
    $mobile_1= $row->mobile_1;
    $mobile_2= $row->mobile_2;
    $email= $row->email;
    $date= $row->date;
    $time= $row->time;
    $timezone= $row->timezone;
    $booking_status= $row->booking_status;

    $sale_exp =  explode('-',$date);
    $datee = $sale_exp[2].'-'.$sale_exp[0].'-'.$sale_exp[1];
}

if($date)
{
$date_exp =  explode('-',$date);
$booking_date = $date_exp[2].','.($date_exp[0]-1).','.$date_exp[1];
}
if($time)
{
    $time = date('h:i A', strtotime($time));
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
                    <a href="<?php echo base_url(); ?>list-booking" class="btn button_btn">Cancel </a>
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
                                <div class="d-flex mb-2">
                                        <div class="pt-2 ps-4 position-relative">
                                            <label for="validationTooltip01" class="form-label">First Name<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="px-4 position-relative">    
                                            <select id="select-state22" placeholder="Search Name..." name="first_name" onchange="bookingsName();" class="form-select form-control bookings_name" <?php if(!empty($first_name)){ echo 'required';}?>>
                                                <option value="">Search Name</option>
                                                <?php if(!empty($select_name)){
                                                    foreach ($select_name as $name) { ?>
                                                <option value="<?php echo $name->id;?>" <?= (set_value('first_name') == $name->id ) ? 'selected' : ''; ?> <?php if($first_name == $name->id){echo 'selected';} ?> ><?php echo $name->first_name;?> ( <?php echo $name->email;?> )</option>
                                                <?php } }?>
                                            </select>
                                            <!-- <input type="text" name="first_name" class="form-control" id="validationTooltip01" onkeydown="return /[a-z ]/i.test(event.key)" value="<?php echo set_value('first_name'); ?>"> -->
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
                                            <input type="text" name="last_name" class="form-control" id="last_name" onkeydown="return /[a-z ]/i.test(event.key)" value="<?php if(!empty($last_name)){ echo $last_name;}else{ echo set_value('last_name'); }?>" <?php if(!empty($last_name)){ echo 'required';}?>>
                                            <span class="text-danger"><?php echo form_error('last_name'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                 <div class="d-flex mb-2">
                                        <div class="pt-2 ps-4 position-relative">
                                            <label for="validationTooltip02" class="form-label">Phone Number<span class="text-danger">*</span> </label>
                                        </div>
                                        <div class="px-4 position-relative">  
                                            <input type="text" name="mobile_1" class="form-control" id="mobile_1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" value="<?php if(!empty($mobile_1)){ echo $mobile_1;}else{ echo set_value('mobile_1'); }?>"  <?php if(!empty($mobile_1)){ echo 'required';}?>>
                                            <span class="text-danger"><?php echo form_error('mobile_1'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex mb-2">
                                        <div class="pt-2 ps-4 position-relative">
                                            <label for="validationTooltip06" class="form-label">Alt Phone No</label>
                                        </div>
                                        <div class="px-4 position-relative">  
                                            <input type="text" name="mobile_2" class="form-control" id="mobile_2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" value="<?php if(!empty($mobile_2)){ echo $mobile_2;}else{ echo set_value('mobile_2'); }?>">
                                        </div>
                                    </div>
                               </div>
                               </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                <div class="d-flex mb-2">
                                        <div class="pt-2 ps-4 position-relative">
                                    <label for="validationTooltip03" class="form-label">Email<span class="text-danger">*</span></label>
                                     </div>
                                        <div class="px-4 position-relative">  
                                            <input type="email" name="email" class="form-control" id="email" value="<?php if(!empty($email)){ echo $email;}else{ echo set_value('email'); }?>" <?php if(!empty($first_name)){ echo 'required';}?> <?php if(!empty($email)){ echo 'required';}?>>
                                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="d-flex mb-2">
                                        <div class="pt-2 ps-4 position-relative">
                                            <label for="validationTooltip06" class="form-label">Date<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="px-4 position-relative">  
                                            <div class="input-group">
                                            <div id="booking_date" style="width: 346px;padding-left: 24px;" 
                                                class="input-group date" 
                                                data-date-format="mm-dd-yyyy"> 
                                                <input class="form-control" 
                                                    type="text" name="date"/> 
                                                <span class="input-group-addon"> 
                                                    <i class="glyphicon glyphicon-calendar"></i> 
                                                </span> 
                                            </div> 
                                                <!-- <span class="input-group-text input-contact-icon" id="basic-addon1">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.48584 9.88889H11.5142M5.44444 5.44444V1M12.5556 5.44444V1M3.84444 17H14.1556C15.1512 17 15.649 17 16.0293 16.8062C16.3638 16.6358 16.6358 16.3638 16.8062 16.0293C17 15.649 17 15.1512 17 14.1556V5.62222C17 4.62657 17 4.12875 16.8062 3.74846C16.6358 3.41395 16.3638 3.14199 16.0293 2.97154C15.649 2.77778 15.1512 2.77778 14.1556 2.77778H3.84444C2.8488 2.77778 2.35097 2.77778 1.97068 2.97154C1.63617 3.14199 1.36421 3.41395 1.19377 3.74846C1 4.12875 1 4.62657 1 5.62222V14.1556C1 15.1512 1 15.649 1.19377 16.0293C1.36421 16.3638 1.63617 16.6358 1.97068 16.8062C2.35097 17 2.8488 17 3.84444 17Z" stroke="#615E5E" stroke-width="1.5" stroke-linecap="round"></path>
                                                    </svg>                                        
                                                </span>
                                                <input type="date" class="form-control date-input" placeholder="date" name="date" aria-label="date" aria-describedby="basic-addon1" value="<?php if(!empty($date)){ echo $datee; } else{ echo set_value('date'); } ?>" data-gtm-form-interact-field-id="0"> -->
                                            </div>
                                            <span class="text-danger"><?php echo form_error('date'); ?></span>
                                        </div>
                                    </div>
                               </div>
                               </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                <div class="d-flex mb-2">
                                        <div class="pt-2 ps-4 position-relative">
                                            <label for="validationTooltip04" class="form-label">Time zone<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="px-4 position-relative">  
                                            <select class="form-select form-control" id="validationTooltip04" aria-label="Default select example" name="timezone" <?php if(!empty($timezone)){ echo 'required';}?>> 
                                                <option value="">Select timezone</option>
                                                <option value="1" <?= (set_value('timezone') == 1) ? 'selected' : ''; ?> <?php if($timezone==1){ echo 'selected';}?>>EST</option>
                                                <option value="2" <?= (set_value('timezone') == 2) ? 'selected' : ''; ?> <?php if($timezone==2){ echo 'selected';}?>>CST</option>
                                                <option value="3" <?= (set_value('timezone') == 3) ? 'selected' : ''; ?> <?php if($timezone==3){ echo 'selected';}?>>PST</option>
                                                <option value="4" <?= (set_value('timezone') == 4) ? 'selected' : ''; ?> <?php if($timezone==4){ echo 'selected';}?>>MST</option>
                                            </select>
                                            <span class="text-danger"><?php echo form_error('timezone'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="d-flex mb-2">
                                        <div class="pt-2 ps-4 position-relative">
                                            <label for="validationTooltip06" class="form-label">Time<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="px-4 position-relative">  
                                            <div class="input-group">
                                                <span class="input-group-text input-contact-icon" id="basic-addon1">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.48584 9.88889H11.5142M5.44444 5.44444V1M12.5556 5.44444V1M3.84444 17H14.1556C15.1512 17 15.649 17 16.0293 16.8062C16.3638 16.6358 16.6358 16.3638 16.8062 16.0293C17 15.649 17 15.1512 17 14.1556V5.62222C17 4.62657 17 4.12875 16.8062 3.74846C16.6358 3.41395 16.3638 3.14199 16.0293 2.97154C15.649 2.77778 15.1512 2.77778 14.1556 2.77778H3.84444C2.8488 2.77778 2.35097 2.77778 1.97068 2.97154C1.63617 3.14199 1.36421 3.41395 1.19377 3.74846C1 4.12875 1 4.62657 1 5.62222V14.1556C1 15.1512 1 15.649 1.19377 16.0293C1.36421 16.3638 1.63617 16.6358 1.97068 16.8062C2.35097 17 2.8488 17 3.84444 17Z" stroke="#615E5E" stroke-width="1.5" stroke-linecap="round"></path>
                                                    </svg>                                        
                                                </span>
                                                <input type="text" class="form-control date-input timepicker" placeholder="time" name="time" aria-label="date" aria-describedby="basic-addon1" value="<?php if(!empty($time)){ echo $time; } else{ echo set_value('time'); } ?>" data-gtm-form-interact-field-id="0">
                                            </div>
                                            <span class="text-danger"><?php echo form_error('time'); ?></span>
                                        </div>
                                    </div>
                               </div>
                               </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                <div class="d-flex mb-2">
                                        <div class="pt-2 ps-4 position-relative">
                                            <label for="validationTooltip04" class="form-label">Booking Status<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="px-4 position-relative">  
                                            <select class="form-select form-control" id="validationTooltip04" aria-label="Default select example" name="booking_status" <?php if(!empty($booking_status)){ echo 'required';}?>>
                                                <option value="">Booking Status</option>
                                                <option value="1" <?= (set_value('booking_status') == 1) ? 'selected' : ''; ?> <?= ($booking_status == 1) ? 'selected' : ''; ?> >Open</option>
                                                <option value="2" <?= (set_value('booking_status') == 2) ? 'selected' : ''; ?> <?= ($booking_status == 2) ? 'selected' : ''; ?> >Pending</option>
                                                <option value="3" <?= (set_value('booking_status') == 3) ? 'selected' : ''; ?> <?= ($booking_status == 3) ? 'selected' : ''; ?> >Close</option>
                                            </select>
                                            <span class="text-danger"><?php echo form_error('booking_status'); ?></span>
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
<?php
if(set_value('date'))
{
$date_exp =  explode('-',set_value('date'));
$booking_date = $date_exp[2].','.($date_exp[0]-1).','.$date_exp[1];
}
?>
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

    $(function () { 
            $("#booking_date").datepicker({  
                autoclose: true,  
                todayHighlight: true, 
            }).datepicker('update', new Date(<?=$booking_date?>)); 
        });
        $(document).ready(function(){
        $('input.timepicker').timepicker({
          timeFormat: 'h:mm p',
          // defaultTime: new Date(),
          // interval: 30,
          // minTime: '10',
          // maxTime: '11:00pm',
           startTime: '11:00',
          dynamic: true,
          dropdown: true,
          scrollbar: false
        });
    });

        
</script>
