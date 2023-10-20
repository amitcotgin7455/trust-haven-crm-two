<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<style>
   
</style>
<!-- user table  -->
<?php 
echo form_open('sales/MassEmail/savemass');
?>
<section class="customer-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="customer-header d-flex justify-content-between">
                    <div class="right">
                        <div class="myHeading">
                            
                            <h1 class="c-name">New Mass Email </h1>
                        </div>
                    </div>
                    <div class="left">
                        
                            <div class="btn-group me-3">
                                <a href="<?=base_url();?>sales/list-massemail/  " class="btn newgreybtn">Cancel</a>
                            </div>            
                           
                            <div class="btn-group me-3" role="group">
                                <!-- <a href="<?php echo base_url(); ?>sales/create-lead/" class="btn theme-btn-2">Send</a> -->
                                <input type="submit" value="Send" class="btn theme-btn-2 schedule-btn-send" name="sendmass">
                            </div>

                            <div class="btn-group me-3" role="group">
                            <input type="submit" value="Scheduled" class="btn theme-btn-2 schedule-btn d-none" name="schedulemass">
                                <!-- <a href="#" class="btn theme-btn-2">Scheduled</a> -->
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="user-table">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="mass-email-form m-4">
                    <h4 class="ps-3">Email Details</h4>
                    <!-- <form action="<?php echo base_url();?>massemail/savemass" method="post">                         -->
                        <div class="row mb-3 mt-4">                            
                            <div class="col-md-6">
                                <div class="d-flex mb-3">
                                    <div class="pt-2 ps-3">
                                        <label for="to" class="form-label">To</label>
                                    </div>
                                    <div class="px-4 position-relative">
                                        <select class="form-select forn-control" name="agent_id" id="to" >
                                            <option value="" selected>All Agent Name</option>
                                            <?php if(!empty($agent)){
                                            foreach($agent as $user){ ?>
                                            <option value="<?php echo $user->id ;?>" <?php if(set_value('agent_id')==$user->id){ echo 'selected';} ?>><?php echo $user->name;?></option>
                                              <?php  } }?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('agent_id') ?></span>
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <div class="pt-2 ps-3">
                                        <label for="" class="form-label">Tamplate</label>
                                    </div>
                                    <div class="px-4">
                                        <select class="form-select forn-control" name="template_id" id="lead_status" >
                                            <option value="" selected>Select Tamplate</option>
                                            <option value="1" <?php if(set_value('template_id')==1) echo 'selected';?>>Cancellation Mail</option>
                                            <option value="2" <?php if(set_value('template_id')==2) echo 'selected';?>>Followup Mail</option>
                                            <option value="3" <?php if(set_value('template_id')==3) echo 'selected';?>>Scheduled Maintenance</option>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('template_id') ?></span>

                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <div class="pt-2 ps-3">
                                        <label for="" class="form-label">From</label>
                                    </div>
                                    <div class="px-4">
                                        <select class="form-select forn-control" name="from_email">
                                            <option value="" selected="">From Email</option>
                                            <?php if(!empty($email)){
                                                foreach($email as $activemail){ ?>
                                                <option value="<?php echo $activemail->sender_email;?>" <?php if(set_value('from_email')==$activemail->sender_email) echo 'selected';?>><?php echo $activemail->sender_email;?></option>
                                                <?php } }?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('from_email') ?></span>  
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <div class="pt-2 ps-3">
                                        <label for="" class="form-label"></label>
                                    </div>
                                    <div class="px-4">
                                        <p class="note-bg">
                                            Responsive tables allow tables to be scrolled horizontally with ease. Make any table responsive across all viewports by wrapping
                                        </p>
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <div class="pt-2 ps-3">
                                        <label for="" class="form-label">Reply To</label>
                                    </div>
                                    <div class="px-4">
                                        <select class="form-select forn-control" name="reply_to" id="lead_status" >
                                            <option value="" selected="">Reply Email</option>
                                            <?php if(!empty($email)){
                                            foreach($email as $activemail){ ?>
                                            <option value="<?php echo $activemail->sender_email;?>" <?php if(set_value('reply_to')==$activemail->sender_email) echo 'selected';?>><?php echo $activemail->sender_email;?></option>
                                            <?php } }?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('reply_to') ?></span>  
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <div class="pt-2 ps-3">
                                        <label for="" class="form-label">Send Option</label>
                                    </div>
                                    <div class="px-4">
                                        <div class="form-check mb-2">
                                            <input type="radio" class="form-check-input" id="radio1" name="mass_email_type" value="1" checked> <span class="ps-2">Send Immediately</span>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="radio" class="form-check-input" id="radio2" name="mass_email_type" value="2"> <span class="ps-2">Scheduled Later</span>
                                        </div>
                                        <div class="schedule-sec mt-3 d-none">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <input type="date" class="form-control" id="date" name="schedule_date">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="time" class="form-control" id="time" name="schedule_time">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="d-flex mb-2">
                                    <div class="pt-2 ps-3">
                                        <label for="" class="form-label">Follow Up Action</label>
                                    </div>
                                   
                                    <div class="px-4">
                                        <select class="form-select" name="lead_status" id="lead_status" >
                                            <option value=""  selected="">Triggered An Action</option>
                                            <option value="1">Sent </option>
                                            <option value="2">Not Sent</option>
                                           
                                        </select>
                                    </div>
                                    
                                </div> -->

                            </div>                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $("#radio1").click(function(){
        $(".schedule-sec").addClass('d-none');
        $(".schedule-btn").addClass('d-none');
        $(".schedule-btn-send").removeClass('d-none');
        $("#date").attr('required',false);
        $("#time").attr('required',false);

    });
    $("#radio2").click(function(){
        // alert();
        $(".schedule-sec").removeClass('d-none');
        $(".schedule-btn").removeClass('d-none');
        $(".schedule-btn-send").addClass('d-none');
        $("#date").attr('required',true);
        $("#time").attr('required',true);
    });
    
</script>