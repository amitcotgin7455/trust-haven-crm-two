<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<?php
$lead_id = "";
$user_id = "";
$name = "";
$last_name = "";
$phone = "";
$other_phone = "";
$payment_method = "";
$email = "";
$company_name = "";
$issue = "";
$password = "";
$amount = "";
$date_of_sale = "";
$lead_status = "";
$address = "";
$description = "";



if (!empty($editResult)) {

    foreach ($editResult as $value) {

        $lead_id = $value->lead_id;
        $user_id = $value->user_id;
        $name = $value->name;
        $last_name = $value->last_name;
        $date_of_sale = $value->date_of_sale;
        $phone = $value->phone;
        $payment_method = $value->payment_method;
        $other_phone = $value->other_phone;
        $company_name = $value->company_name;
        $email = $value->email;
        $password = $value->password;
        $issue = $value->issue;
        $amount = $value->amount;
        $description = $value->description;
        $lead_status = $value->lead_status;
        $address = $value->address;
    }
}
$buttoName = '';
if (!empty($editResult[0]->lead_id)) {
    $frmaction = base_url() . "sales/Lead/updateLead";
    $buttoName = 'Save Changes';
    $BtnClass = 'btn btn-raised gradient-mint white shadow-z-4';
} else {
    $frmaction = base_url() . "sales/Lead/addLead";
    $buttoName = 'Add Lead';
    $BtnClass = 'btn btn-raised gradient-nepal white card-shadow';
}

if(!empty($exist_lead_detail))
{
        if($exist_lead_detail->lead_id)
        {
        $lead_id = $exist_lead_detail->lead_id;
        }
        $user_id = $exist_lead_detail->user_id;
        $name = $exist_lead_detail->name;
        $last_name = $exist_lead_detail->last_name;
        $date_of_sale = $exist_lead_detail->date_of_sale;
        $phone = $exist_lead_detail->phone;
        $payment_method = $exist_lead_detail->payment_method;
        $other_phone = $exist_lead_detail->other_phone;
        $company_name = $exist_lead_detail->company_name;
        $email = $exist_lead_detail->email;
        $password = $exist_lead_detail->password;
        $issue = $exist_lead_detail->issue;
        $amount = $exist_lead_detail->amount;
        $description = $exist_lead_detail->description;
        $lead_status = $exist_lead_detail->lead_status;
        $address = $exist_lead_detail->address;
}

if($date_of_sale)
{
$sale_exp =  explode('-',$date_of_sale);
$sale_date = $sale_exp[2].','.($sale_exp[0]-1).','.$sale_exp[1];
}
?>
<style>
        .btn.btn_save {
        width: auto;
        /* height: 100%; */
        padding: 6px 20px !important;
        font-size: 15px;
        /* max-width: 219px; */
        display: inline-block;
        white-space: nowrap;
        border-radius: 6px !important;
        color: #fff !important;
        box-shadow: rgb(0, 97, 202) 0px -2px 0px 0px inset !important;
        background-image: linear-gradient( to top, rgb(2, 121, 255), rgb(0, 163, 243) ) !important;
        font-weight: 500;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<!-- user table  -->
<section class="customer-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="customer-header d-flex justify-content-between">
                    <div class="right">
                        <div class="myHeading">
                            <a href="<?php echo base_url(); ?>sales/list-lead">
                            <!-- <img src="<?php echo base_url(); ?>assets/lead/front_assets/assets/images/left-arrow (1).png" /> -->
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 486.65 486.65" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M202.114 444.648a30.365 30.365 0 0 1-21.257-9.11L8.982 263.966c-11.907-11.81-11.986-31.037-.176-42.945l.176-.176L180.858 49.274c12.738-10.909 31.908-9.426 42.817 3.313 9.736 11.369 9.736 28.136 0 39.504L73.36 242.406l151.833 150.315c11.774 11.844 11.774 30.973 0 42.817a30.368 30.368 0 0 1-23.079 9.11z" fill="#000000" data-original="#000000" class="" opacity="1"></path><path d="M456.283 272.773H31.15c-16.771 0-30.367-13.596-30.367-30.367s13.596-30.367 30.367-30.367h425.133c16.771 0 30.367 13.596 30.367 30.367s-13.596 30.367-30.367 30.367z" fill="#000000" data-original="#000000" class="" opacity="1"></path></g></svg>
                            </a>
                            <h1 class="c-name">
                                <?php $CI = &get_instance();
                                $CI->load->model('LeadNoteModel');
                                $sub_category_name = $CI->LeadNoteModel->getListByIds($user_id);
                                if (!empty($sub_category_name)) {
                                    foreach ($sub_category_name as $sub_category_name1) {
                                ?><?php echo $sub_category_name1->name; ?><?php }
                                                                            } ?>
                            </h1>
                        </div>
                    </div>
                    <div class="left">
                        <div class="btn-group" role="group">
                                <span class="dIB  bR2  cP cb vat mR8" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <?php if(!empty($name)){?>
                                    <!-- <input name="Mail" type="button" data-zcqa="sendMail" cscript-tag="send_mail" value="Send Email" class="newbutton sendmailgroupbtn primarybtn mR0" fdprocessedid="bttywm"> </span> -->
                                    <a href="javascript:void(0)" class="btn btn_save sendmailbtn" id="<?php echo $lead_id; ?>" data-bs-toggle="modal" data-bs-target="#myModal"> Email Send</a>
                                    <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- customer information  -->
<section class="customer-information my-2">
    <div class="my-5">
        <h1 class="text-center text-blue">
        <?php if(empty($name)){?> Fill <?php } ?> Lead Information
        </h1>
    </div>
    <div class="container-fluid my-2">
        <div class="row">
            <div class="col-lg-2 mt-3">
                <?php if(!empty($name)){?>
                <div class="side-filter">
                    <ul>
                        <a href="#notes">
                            <div class="input-group ">
                                <li class="list-unstyled bg-light mb-2  w-100 py-2"> <a href="#notes" class="text-decoration-none d-block crm-text"> Notes</a> </li>
                                <div class="input-group-addon">
                                    <span class="input-group-text bg-white border-0 d-block">
                                        <a href="#notes"> 
                                            <!-- <img src="<?php echo base_url(); ?>assets/lead/front_assets/assets/images/pencil.png" alt=""> -->
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M352.459 220c0-11.046-8.954-20-20-20h-206c-11.046 0-20 8.954-20 20s8.954 20 20 20h206c11.046 0 20-8.954 20-20zM126.459 280c-11.046 0-20 8.954-20 20s8.954 20 20 20H251.57c11.046 0 20-8.954 20-20s-8.954-20-20-20H126.459z" fill="#313949" data-original="#000000" opacity="1" class=""></path><path d="M173.459 472H106.57c-22.056 0-40-17.944-40-40V80c0-22.056 17.944-40 40-40h245.889c22.056 0 40 17.944 40 40v123c0 11.046 8.954 20 20 20s20-8.954 20-20V80c0-44.112-35.888-80-80-80H106.57c-44.112 0-80 35.888-80 80v352c0 44.112 35.888 80 80 80h66.889c11.046 0 20-8.954 20-20s-8.954-20-20-20z" fill="#313949" data-original="#000000" opacity="1" class=""></path><path d="M467.884 289.572c-23.394-23.394-61.458-23.395-84.837-.016l-109.803 109.56a20.005 20.005 0 0 0-5.01 8.345l-23.913 78.725a20 20 0 0 0 24.476 25.087l80.725-22.361a19.993 19.993 0 0 0 8.79-5.119l109.573-109.367c23.394-23.394 23.394-61.458-.001-84.854zM333.776 451.768l-40.612 11.25 11.885-39.129 74.089-73.925 28.29 28.29-73.652 73.514zM439.615 346.13l-3.875 3.867-28.285-28.285 3.862-3.854c7.798-7.798 20.486-7.798 28.284 0 7.798 7.798 7.798 20.486.014 28.272zM332.459 120h-206c-11.046 0-20 8.954-20 20s8.954 20 20 20h206c11.046 0 20-8.954 20-20s-8.954-20-20-20z" fill="#313949" data-original="#000000" opacity="1" class=""></path></g></svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </a>

                        <div class="input-group my-2 ">
                            <li class="list-unstyled bg-light mb-2 w-100 py-2"> <a href="#email-down" class="text-decoration-none d-block crm-text"> Email</a> </li>

                            <div class="input-group-addon">
                                <span class="input-group-text bg-white border-0 d-block">
                                    <a href="#email">
                                        <box-icon name='envelope' color='#313949 '></box-icon>
                                    </a>
                                </span>
                            </div>
                        </div>

                    </ul>
                </div>
                <?php }?>
            </div>
            <div class="col-lg-10 side-big">
                <?php if (!empty($this->session->flashdata('error'))) { ?>
                    <div class="alert alert-danger" style="background-color:red; color:white;" id="error">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>
                <form method="POST" action="<?php echo $frmaction; ?>" id="customer" onsubmit="return valid();">
                    <input type="text" name="hidden_id" class="d-none" value="<?php echo  $lead_id; ?>" id="hidden_id">
                    <div class="row">                        
                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="pt-2 ps-4 position-relative">
                                    <label class="form-label" for="form6Example1">First Name<span class="text-danger">*</span></label>
                                </div>
                                <div class="px-4 position-relative">
                                    <div class="input-group <?php if (!empty($name)) { echo 'hoverable'; } ?>">
                                        <input type="text" class="form-control setinput" value="<?php if (!empty($name)) { echo $name; } else { echo set_value('name');  } ?>" name="name" id="name" onkeydown="return /[a-z ]/i.test(event.key)" <?php if(!empty($name)) echo 'required';?>>
                                            <!-- <span class="fa fa-edit xl mt-3 editable"></span> -->
                                        <div class="input-group-addon">
                                            <span class="input-group-text bg-white d-block">
                                                <!-- <box-icon name='user' color='#313949 '></box-icon> -->
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path d="M437.02 330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521 243.251 404 198.548 404 148 404 66.393 337.607 0 256 0S108 66.393 108 148c0 50.548 25.479 95.251 64.262 121.962-36.21 12.495-69.398 33.136-97.281 61.018C26.629 379.333 0 443.62 0 512h40c0-119.103 96.897-216 216-216s216 96.897 216 216h40c0-68.38-26.629-132.667-74.98-181.02zM256 256c-59.551 0-108-48.448-108-108S196.449 40 256 40s108 48.448 108 108-48.449 108-108 108z" fill="#313949" data-original="#000000" opacity="1" class="hovered-path"></path></g></svg>
                                            </span>
                                        </div>
                                        <!-- <span class="fa fa-check mx-3 mt-3 text-success d-none savechanges saveupdatefilled"></span>
                                        <span class="fa fa-close  mt-3 text-danger d-none savechanges crossicon"></span> -->
                                    </div>
                                    <span class="text-danger"><?php echo form_error('name'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="pt-2 ps-4 position-relative">
                                    <label class="form-label" for="form6Example1">Last Name</label>
                                </div>
                                <div class="px-4 position-relative">
                                    <div class="input-group <?php if (!empty($name)) { echo 'hoverable'; } ?>">
                                        <input type="text" class="form-control setinput" value="<?php if (!empty($last_name)) { echo $last_name; } else { echo set_value('last_name');  } ?>" name="last_name" id="last_name" onkeydown="return /[a-z ]/i.test(event.key)">
                                            <!-- <span class="fa fa-edit xl mt-3 editable"></span> -->
                                        <div class="input-group-addon">
                                            <span class="input-group-text bg-white d-block">
                                                <!-- <box-icon name='user' color='#313949 '></box-icon> -->
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path d="M437.02 330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521 243.251 404 198.548 404 148 404 66.393 337.607 0 256 0S108 66.393 108 148c0 50.548 25.479 95.251 64.262 121.962-36.21 12.495-69.398 33.136-97.281 61.018C26.629 379.333 0 443.62 0 512h40c0-119.103 96.897-216 216-216s216 96.897 216 216h40c0-68.38-26.629-132.667-74.98-181.02zM256 256c-59.551 0-108-48.448-108-108S196.449 40 256 40s108 48.448 108 108-48.449 108-108 108z" fill="#313949" data-original="#000000" opacity="1" class="hovered-path"></path></g></svg>

                                            </span>
                                        </div>
                                        <!-- <span class="fa fa-check mx-3 mt-3 text-success d-none savechanges saveupdatefilled"></span>
                                        <span class="fa fa-close  mt-3 text-danger d-none savechanges crossicon"></span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="pt-2 ps-4 position-relative">
                                    <label class="form-label" for="form6Example1">Date of Sale<span class="text-danger">*</span></label>
                                </div>
                                <div class="px-4 position-relative">
                                    <div class="input-group <?php if (!empty($name)) { echo 'hoverable'; } ?> date" >
                                        <!-- <input type="date" class="form-control setinput"  name="date_of_sale" value="<?php if (!empty($date_of_sale)) { echo $date_of_sale; } else { echo set_value('date_of_sale'); } ?>" id="date_of_sale" <?php if(!empty($date_of_sale)) echo 'required';?>> -->
                                        <div id="contact_sale_date" style="width: 346px;padding-left: 24px;" 
             class="input-group date" 
             data-date-format="mm-dd-yyyy"> 
            <input class="form-control date-input" 
                   type="text" name="date_of_sale"  id="txtDate"/> 
            <span class="input-group-addon"> 
                <i class="glyphicon glyphicon-calendar"></i> 
            </span> 
                                        </div>
                                       
                                        <!-- <span class="fa fa-edit xl mt-3 editable"></span> -->
                                        <div class="input-group-addon">
                                            <span class="input-group-text bg-white d-block">
                                                <!-- <box-icon name='calendar' type='solid' color='#313949 '></box-icon> -->
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 682.667 682.667" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><defs><clipPath id="a" clipPathUnits="userSpaceOnUse"><path d="M0 512h512V0H0Z" fill="#313949" data-original="#000000" opacity="1"></path></clipPath></defs><g clip-path="url(#a)" transform="matrix(1.33333 0 0 -1.33333 0 682.667)"><path d="M0 0h39.333m78.895 0h39.333M-118 0h39.333M0 118h39.333m78.895 0h39.333M-118 118h39.333m-137.666 98.667h472.227M-137.439-98H177c43.572 0 78.894 35.322 78.894 78.895v274.877c0 43.572-35.322 78.895-78.894 78.895h-314.439c-43.572 0-78.894-35.323-78.894-78.895V-19.105c0-43.573 35.322-78.895 78.894-78.895zm275.333 373.667V374m-236.227-98.333V374" style="stroke-width:40;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(236.333 118)" fill="none" stroke="#313949" stroke-width="40" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" opacity="1" class=""></path></g></g></svg>
                                            </span>
                                        </div>
                                        <!-- <span class="fa fa-check mx-3 mt-3 text-success d-none savechanges saveupdatefilled"></span>
                                        <span class="fa fa-close  mt-3 text-danger d-none savechanges crossicon"></span> -->
                                    </div>
                                    <span class="text-danger"><?php echo form_error('date_of_sale'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="pt-2 ps-4 position-relative">
                                    <label class="form-label" for="form6Example1">Phone Number<span class="text-danger">*</span></label>
                                </div>
                                <div class="px-4 position-relative">
                                    <div class="input-group <?php if (!empty($name)) { echo 'hoverable';} ?>" data-provide="Number">
                                        <input type="text" class="form-control setinput" name="phone" maxlength="10" value="<?php if (!empty($phone)) { echo $phone; } else { echo set_value('phone'); } ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" fdprocessedid="yzc46i" id="phone" <?php if(!empty($phone)) echo 'required';?>>
                                        <!-- <span class="fa fa-edit xl mt-3 editable"></span> -->
                                            <a href="text" class="float" target="_blank">
                                                <div class="input-group-addon">
                                                    <span class="input-group-text bg-white d-block">
                                                        <!-- <box-icon name='phone' color='#313949 '></box-icon> -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 482.6 482.6" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M98.339 320.8c47.6 56.9 104.9 101.7 170.3 133.4 24.9 11.8 58.2 25.8 95.3 28.2 2.3.1 4.5.2 6.8.2 24.9 0 44.9-8.6 61.2-26.3.1-.1.3-.3.4-.5 5.8-7 12.4-13.3 19.3-20 4.7-4.5 9.5-9.2 14.1-14 21.3-22.2 21.3-50.4-.2-71.9l-60.1-60.1c-10.2-10.6-22.4-16.2-35.2-16.2-12.8 0-25.1 5.6-35.6 16.1l-35.8 35.8c-3.3-1.9-6.7-3.6-9.9-5.2-4-2-7.7-3.9-11-6-32.6-20.7-62.2-47.7-90.5-82.4-14.3-18.1-23.9-33.3-30.6-48.8 9.4-8.5 18.2-17.4 26.7-26.1 3-3.1 6.1-6.2 9.2-9.3 10.8-10.8 16.6-23.3 16.6-36s-5.7-25.2-16.6-36l-29.8-29.8c-3.5-3.5-6.8-6.9-10.2-10.4-6.6-6.8-13.5-13.8-20.3-20.1-10.3-10.1-22.4-15.4-35.2-15.4-12.7 0-24.9 5.3-35.6 15.5l-37.4 37.4c-13.6 13.6-21.3 30.1-22.9 49.2-1.9 23.9 2.5 49.3 13.9 80 17.5 47.5 43.9 91.6 83.1 138.7zm-72.6-216.6c1.2-13.3 6.3-24.4 15.9-34l37.2-37.2c5.8-5.6 12.2-8.5 18.4-8.5 6.1 0 12.3 2.9 18 8.7 6.7 6.2 13 12.7 19.8 19.6 3.4 3.5 6.9 7 10.4 10.6l29.8 29.8c6.2 6.2 9.4 12.5 9.4 18.7s-3.2 12.5-9.4 18.7c-3.1 3.1-6.2 6.3-9.3 9.4-9.3 9.4-18 18.3-27.6 26.8l-.5.5c-8.3 8.3-7 16.2-5 22.2.1.3.2.5.3.8 7.7 18.5 18.4 36.1 35.1 57.1 30 37 61.6 65.7 96.4 87.8 4.3 2.8 8.9 5 13.2 7.2 4 2 7.7 3.9 11 6 .4.2.7.4 1.1.6 3.3 1.7 6.5 2.5 9.7 2.5 8 0 13.2-5.1 14.9-6.8l37.4-37.4c5.8-5.8 12.1-8.9 18.3-8.9 7.6 0 13.8 4.7 17.7 8.9l60.3 60.2c12 12 11.9 25-.3 37.7-4.2 4.5-8.6 8.8-13.3 13.3-7 6.8-14.3 13.8-20.9 21.7-11.5 12.4-25.2 18.2-42.9 18.2-1.7 0-3.5-.1-5.2-.2-32.8-2.1-63.3-14.9-86.2-25.8-62.2-30.1-116.8-72.8-162.1-127-37.3-44.9-62.4-86.7-79-131.5-10.3-27.5-14.2-49.6-12.6-69.7z" fill="#313949" data-original="#000000" class="" opacity="1"></path></g></svg>
                                                    </span>
                                                </div>
                                            </a>
                                        <!-- <span class="fa fa-check mx-3 mt-3 text-success d-none savechanges saveupdatefilled"></span>
                                        <span class="fa fa-close  mt-3 text-danger d-none savechanges crossicon"></span> -->
                                    </div>
                                    <span class="text-danger"><?php echo form_error('phone'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="pt-2 ps-4 position-relative">
                                    <label class="form-label" for="form6Example1">Payment<span class="text-danger">*</span></label>
                                </div>
                                <div class="px-4 position-relative">
                                    <div class="input-group <?php if (!empty($name)) { echo 'hoverable'; } ?>">
                                        <input type="text" class="form-control setinput" name="payment_method" id="payment" value="<?php if (!empty($payment_method)) { echo $payment_method; } else { echo set_value('payment_method'); } ?>" <?php if(!empty($payment_method)) echo 'required';?>>
                                            <!-- <span class="fa fa-edit xl mt-3 editable"></span> -->
                                        <div class="input-group-addon">
                                            <span class="input-group-text bg-white d-block">
                                                <!-- <box-icon name='paypal' type='logo' color='#313949 '></box-icon> -->
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M390.869 40.864C367.573 13.76 326.901 0 270.069 0H127.605c-18.048 0-33.152 13.088-35.968 31.136l-59.328 384c-1.248 8.288 1.152 16.672 6.592 23.008A28.038 28.038 0 0 0 60.245 448h101.664l23.52-152.384c.48-2.144 2.24-3.68 4.224-3.68h41.792c101.568 0 162.464-48.96 180.864-145.472l1.632-9.248c6.08-41.696-.8-70.496-23.072-96.352zm-8.544 91.36-1.44 8.16c-15.328 80.416-64.192 119.52-149.408 119.52h-41.792c-16.48 0-30.528 10.976-34.944 26.656l-.256-.064-.672 4.384c-.032.032-.032.064-.032.128L134.485 416h-69.92l58.688-379.968c.352-2.336 2.176-4.032 4.352-4.032h142.432c47.104 0 79.616 9.984 96.608 29.728 16 18.592 20.352 38.464 15.68 70.496z" fill="#313949" data-original="#000000" class="" opacity="1"></path><path d="m217.73 355.147.643-4.466 31.673 4.56-.643 4.466z" fill="#313949" data-original="#000000" class="" opacity="1"></path><path d="M454.901 104.672c-12.608-14.464-30.4-25.248-52.896-32l-9.184 30.656c16.608 4.992 29.376 12.512 37.888 22.304 15.84 18.432 20.32 38.912 15.584 70.432 0 0-.864 5.152-1.568 8.32-15.168 80.384-64 119.456-149.376 119.456h-41.6c-17.92 0-33.056 13.056-35.968 31.168L198.453 480h-70.016l7.04-45.568-31.616-4.864-7.744 50.048c-1.024 8.32 1.536 16.64 7.008 22.848 5.376 6.08 13.024 9.536 21.024 9.536h101.728l23.488-152c.352-2.08 1.952-4.16 4.384-4.16h41.6c101.792 0 162.624-48.96 180.672-144.928.736-3.168 1.824-9.536 1.856-9.824 6.176-40.992-.896-70.688-22.976-96.416z" fill="#313949" data-original="#000000" class="" opacity="1"></path></g></svg>
                                            </span>
                                        </div>
                                        <!-- <span class="fa fa-check mx-3 mt-3 text-success d-none savechanges saveupdatefilled"></span>
                                        <span class="fa fa-close  mt-3 text-danger d-none savechanges crossicon"></span> -->
                                    </div>
                                    <span class="text-danger"><?php echo form_error('payment_method'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="pt-2 ps-4 position-relative">
                                    <label class="form-label" for="form6Example1">Alt Phone No</label>
                                </div>
                                <div class="px-4 position-relative">
                                    <div class="input-group <?php if (!empty($name)) { echo 'hoverable';} ?>" data-provide="Number">
                                        <input type="text" class="form-control setinput" name="other_phone" id="other_phone" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" fdprocessedid="yzc46i" value="<?php if (!empty($other_phone)) { echo $other_phone; }else{ echo set_value('other_phone');} ?>">
                                            <!-- <span class="fa fa-edit xl mt-3 editable"></span> -->
                                            <div class="input-group-addon">
                                                <span class="input-group-text bg-white d-block">
                                                    <!-- <box-icon name='phone' color='#313949 '></box-icon> -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 482.6 482.6" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M98.339 320.8c47.6 56.9 104.9 101.7 170.3 133.4 24.9 11.8 58.2 25.8 95.3 28.2 2.3.1 4.5.2 6.8.2 24.9 0 44.9-8.6 61.2-26.3.1-.1.3-.3.4-.5 5.8-7 12.4-13.3 19.3-20 4.7-4.5 9.5-9.2 14.1-14 21.3-22.2 21.3-50.4-.2-71.9l-60.1-60.1c-10.2-10.6-22.4-16.2-35.2-16.2-12.8 0-25.1 5.6-35.6 16.1l-35.8 35.8c-3.3-1.9-6.7-3.6-9.9-5.2-4-2-7.7-3.9-11-6-32.6-20.7-62.2-47.7-90.5-82.4-14.3-18.1-23.9-33.3-30.6-48.8 9.4-8.5 18.2-17.4 26.7-26.1 3-3.1 6.1-6.2 9.2-9.3 10.8-10.8 16.6-23.3 16.6-36s-5.7-25.2-16.6-36l-29.8-29.8c-3.5-3.5-6.8-6.9-10.2-10.4-6.6-6.8-13.5-13.8-20.3-20.1-10.3-10.1-22.4-15.4-35.2-15.4-12.7 0-24.9 5.3-35.6 15.5l-37.4 37.4c-13.6 13.6-21.3 30.1-22.9 49.2-1.9 23.9 2.5 49.3 13.9 80 17.5 47.5 43.9 91.6 83.1 138.7zm-72.6-216.6c1.2-13.3 6.3-24.4 15.9-34l37.2-37.2c5.8-5.6 12.2-8.5 18.4-8.5 6.1 0 12.3 2.9 18 8.7 6.7 6.2 13 12.7 19.8 19.6 3.4 3.5 6.9 7 10.4 10.6l29.8 29.8c6.2 6.2 9.4 12.5 9.4 18.7s-3.2 12.5-9.4 18.7c-3.1 3.1-6.2 6.3-9.3 9.4-9.3 9.4-18 18.3-27.6 26.8l-.5.5c-8.3 8.3-7 16.2-5 22.2.1.3.2.5.3.8 7.7 18.5 18.4 36.1 35.1 57.1 30 37 61.6 65.7 96.4 87.8 4.3 2.8 8.9 5 13.2 7.2 4 2 7.7 3.9 11 6 .4.2.7.4 1.1.6 3.3 1.7 6.5 2.5 9.7 2.5 8 0 13.2-5.1 14.9-6.8l37.4-37.4c5.8-5.8 12.1-8.9 18.3-8.9 7.6 0 13.8 4.7 17.7 8.9l60.3 60.2c12 12 11.9 25-.3 37.7-4.2 4.5-8.6 8.8-13.3 13.3-7 6.8-14.3 13.8-20.9 21.7-11.5 12.4-25.2 18.2-42.9 18.2-1.7 0-3.5-.1-5.2-.2-32.8-2.1-63.3-14.9-86.2-25.8-62.2-30.1-116.8-72.8-162.1-127-37.3-44.9-62.4-86.7-79-131.5-10.3-27.5-14.2-49.6-12.6-69.7z" fill="#313949" data-original="#000000" class="" opacity="1"></path></g></svg>
                                                </span>
                                            </div>
                                        <!-- <span class="fa fa-check mx-3 mt-3 text-success d-none savechanges saveupdatefilled"></span>
                                        <span class="fa fa-close  mt-3 text-danger d-none savechanges crossicon"></span> -->
                                    </div>
                                    <!-- <span class="text-danger"><?php echo form_error('other_phone'); ?></span> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="pt-2 ps-4 position-relative">
                                    <label class="form-label" for="form6Example1">Company name<span class="text-danger">*</span></label>
                                </div>
                                <div class="px-4 position-relative">
                                    <div class="input-group <?php if (!empty($name)) { echo 'hoverable';} ?>">
                                        <input type="text" class="form-control setinput" name="company_name" id="company_name" value="<?php if (!empty($company_name)) {echo $company_name;} else {echo set_value('company_name');} ?>">
                                            <!-- <span class="fa fa-edit xl mt-3 editable"></span> -->
                                        <div class="input-group-addon">
                                            <span class="input-group-text bg-white d-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 100 100" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M92.5 87.5h-10v-70A2.5 2.5 0 0 0 80 15h-7.5V7.5A2.5 2.5 0 0 0 70 5H30a2.5 2.5 0 0 0-2.5 2.5V15H20a2.5 2.5 0 0 0-2.5 2.5v70h-10a2.5 2.5 0 0 0 0 5h85a2.5 2.5 0 0 0 0-5ZM32.5 10h35v5h-35Zm5 77.5v-15h10v15Zm15 0v-15h10v15Zm15 0V70a2.5 2.5 0 0 0-2.5-2.5H35a2.5 2.5 0 0 0-2.5 2.5v17.5h-10V20h55v67.5Zm5-57.5a2.5 2.5 0 0 1-2.5 2.5H60a2.5 2.5 0 0 1 0-5h10a2.5 2.5 0 0 1 2.5 2.5Zm-30 0a2.5 2.5 0 0 1-2.5 2.5H30a2.5 2.5 0 0 1 0-5h10a2.5 2.5 0 0 1 2.5 2.5Zm30 12.5A2.5 2.5 0 0 1 70 45H60a2.5 2.5 0 0 1 0-5h10a2.5 2.5 0 0 1 2.5 2.5Zm-30 0A2.5 2.5 0 0 1 40 45H30a2.5 2.5 0 0 1 0-5h10a2.5 2.5 0 0 1 2.5 2.5Zm30 12.5a2.5 2.5 0 0 1-2.5 2.5H60a2.5 2.5 0 0 1 0-5h10a2.5 2.5 0 0 1 2.5 2.5Zm-30 0a2.5 2.5 0 0 1-2.5 2.5H30a2.5 2.5 0 0 1 0-5h10a2.5 2.5 0 0 1 2.5 2.5Z" data-name="Layer 2" fill="#313949" data-original="#000000" opacity="1" class=""></path></g></svg>
                                            </span>
                                        </div>
                                        <!-- <span class="fa fa-check mx-3 mt-3 text-success d-none savechanges saveupdatefilled"></span>
                                        <span class="fa fa-close  mt-3 text-danger d-none savechanges crossicon"></span> -->
                                    </div>
                                    <span class="text-danger"><?php echo form_error('company_name'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="pt-2 ps-4 position-relative">
                                    <label class="form-label" for="form6Example1">Email<span class="text-danger">*</span></label>
                                </div>
                                <div class="px-4 position-relative">
                                    <div class="input-group <?php if (!empty($name)) {echo 'hoverable';} ?>">
                                        <input type="email" class="form-control setinput" name="email" id="email" value="<?php if (!empty($email)) {echo $email;} else {echo set_value('email');} ?>" <?php if(!empty($email)) echo 'required';?>>
                                            <!-- <span class="fa fa-edit xl mt-3 editable"></span> -->
                                        <div class="input-group-addon">
                                            <span class="input-group-text bg-white d-block">
                                                <!-- <box-icon name='envelope' color='#313949 '></box-icon> -->
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M467 76H45C20.137 76 0 96.262 0 121v270c0 24.885 20.285 45 45 45h422c24.655 0 45-20.03 45-45V121c0-24.694-20.057-45-45-45zm-6.302 30L287.82 277.967c-8.5 8.5-19.8 13.18-31.82 13.18s-23.32-4.681-31.848-13.208L51.302 106h409.396zM30 384.894V127.125L159.638 256.08 30 384.894zM51.321 406l129.587-128.763 22.059 21.943c14.166 14.166 33 21.967 53.033 21.967s38.867-7.801 53.005-21.939l22.087-21.971L460.679 406H51.321zM482 384.894 352.362 256.08 482 127.125v257.769z" fill="#313949" data-original="#000000" opacity="1" class=""></path></g></svg>
                                            </span>
                                        </div>
                                        <!-- <span class="fa fa-check mx-3 mt-3 text-success d-none savechanges saveupdatefilled"></span>
                                        <span class="fa fa-close  mt-3 text-danger d-none savechanges crossicon"></span> -->
                                    </div>
                                    <span class="text-danger"><?php echo form_error('email'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="pt-2 ps-4 position-relative">
                                    <label class="form-label" for="form6Example1">Password<span class="text-danger">*</span></label>
                                </div>
                                <div class="px-4 position-relative">
                                    <div class="input-group <?php if (!empty($name)) {echo 'hoverable';} ?>">
                                        <input type="text" class="form-control setinput" name="password" id="password" value="<?php if (!empty($password)) { echo $password; } else { echo set_value('password');} ?>" <?php if(!empty($password)) echo 'required';?>>
                                            <!-- <span class="fa fa-edit xl mt-3 editable"></span> -->
                                        <div class="input-group-addon">
                                            <span class="input-group-text bg-white d-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M400 188h-36.037v-82.23c0-58.322-48.449-105.77-108-105.77s-108 47.448-108 105.77V188H112c-33.084 0-60 26.916-60 60v204c0 33.084 26.916 60 60 60h288c33.084 0 60-26.916 60-60V248c0-33.084-26.916-60-60-60zm-212.037-82.23c0-36.266 30.505-65.77 68-65.77s68 29.504 68 65.77V188h-136v-82.23zM420 452c0 11.028-8.972 20-20 20H112c-11.028 0-20-8.972-20-20V248c0-11.028 8.972-20 20-20h288c11.028 0 20 8.972 20 20v204z" fill="#313949" data-original="#000000" class="" opacity="1"></path><path d="M256 286c-20.435 0-37 16.565-37 37 0 13.048 6.76 24.51 16.963 31.098V398c0 11.045 8.954 20 20 20 11.045 0 20-8.955 20-20v-43.855C286.207 347.565 293 336.08 293 323c0-20.435-16.565-37-37-37z" fill="#313949" data-original="#000000" class="" opacity="1"></path></g></svg>
                                            </span>
                                        </div>
                                        <!-- <span class="fa fa-check mx-3 mt-3 text-success d-none savechanges saveupdatefilled"></span>
                                        <span class="fa fa-close  mt-3 text-danger d-none savechanges crossicon"></span> -->
                                    </div>
                                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="pt-2 ps-4 position-relative">
                                    <label class="form-label" for="form6Example1">Issue<span class="text-danger">*</span></label>
                                </div>
                                <div class="px-4 position-relative">
                                    <div class="input-group <?php if (!empty($name)) { echo 'hoverable'; } ?>">
                                        <input type="text" class="form-control setinput" name="issue" id="issue" value="<?php if (!empty($issue)) {echo $issue;} else {echo set_value('issue');} ?>" <?php if(!empty($issue)) echo 'required';?>>
                                            <!-- <span class="fa fa-edit xl mt-3 editable"></span> -->
                                        <div class="input-group-addon">
                                            <span class="input-group-text bg-white d-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g fill="#000"><path d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12S6.07 1.25 12 1.25 22.75 6.07 22.75 12 17.93 22.75 12 22.75zm0-20C6.9 2.75 2.75 6.9 2.75 12S6.9 21.25 12 21.25s9.25-4.15 9.25-9.25S17.1 2.75 12 2.75z" fill="#313949" data-original="#000000" class="" opacity="1"></path><path d="M12 13.75c-.41 0-.75-.34-.75-.75V8c0-.41.34-.75.75-.75s.75.34.75.75v5c0 .41-.34.75-.75.75zM12 17c-.13 0-.26-.03-.38-.08s-.23-.12-.33-.21c-.09-.1-.16-.2-.21-.33-.05-.12-.08-.25-.08-.38s.03-.26.08-.38.12-.23.21-.33c.1-.09.21-.16.33-.21a1 1 0 0 1 .76 0c.12.05.23.12.33.21.09.1.16.21.21.33s.08.25.08.38-.03.26-.08.38c-.05.13-.12.23-.21.33-.1.09-.21.16-.33.21s-.25.08-.38.08z" fill="#313949" data-original="#000000" class="" opacity="1"></path></g></g></svg>
                                            </span>
                                        </div>
                                        <!-- <span class="fa fa-check mx-3 mt-3 text-success d-none savechanges saveupdatefilled"></span>
                                        <span class="fa fa-close  mt-3 text-danger d-none savechanges crossicon"></span> -->
                                    </div>
                                    <span class="text-danger"><?php echo form_error('issue'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="pt-2 ps-4 position-relative">
                                    <label class="form-label" for="form6Example1">Amount<span class="text-danger">*</span></label>
                                </div>
                                <div class="px-4 position-relative">
                                    <div class="input-group <?php if (!empty($name)) {echo 'hoverable';} ?>">
                                        <input type="text" class="form-control setinput" name="amount" id="amount" value="<?php if (!empty($amount)) { echo $amount;} else {echo set_value('amount');} ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" step="any" min="0" <?php if(!empty($amount)) echo 'required';?>>
                                            <!-- <span class="fa fa-edit xl mt-3 editable"></span> -->
                                        <div class="input-group-addon">
                                            <span class="input-group-text bg-white d-block">
                                                <!-- <box-icon name='money-withdraw' color='#313949 '></box-icon> -->
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M266.712 176.733h-21.424c-9.447 0-17.133-7.686-17.133-17.134 0-9.447 7.686-17.133 17.133-17.133h42.844c8.284 0 15-6.716 15-15s-6.716-15-15-15h-17.134V95.334c0-8.284-6.716-15-15-15s-15 6.716-15 15v17.337c-23.985 2.175-42.843 22.387-42.843 46.929 0 25.99 21.144 47.134 47.133 47.134h21.424c9.447 0 17.133 7.686 17.133 17.133S276.16 241 266.712 241h-42.847c-8.284 0-15 6.716-15 15s6.716 15 15 15h17.133v17.133c0 8.284 6.716 15 15 15 8.284 0 15-6.716 15-15v-17.337c23.987-2.174 42.847-22.386 42.847-46.93 0-25.989-21.143-47.133-47.133-47.133zM336.333 353.467H175.667c-8.284 0-15 6.716-15 15s6.716 15 15 15h160.666c8.284 0 15-6.716 15-15s-6.716-15-15-15z" fill="#313949" data-original="#000000" class="" opacity="1"></path><path d="M432.733 0H79.267c-8.284 0-15 6.716-15 15v437.816c0 3.978 1.581 7.793 4.394 10.607l44.184 44.184c5.857 5.858 15.355 5.858 21.213 0l33.577-33.577 33.576 33.577a15 15 0 0 0 21.214 0L256 474.03l33.577 33.577a15 15 0 0 0 21.213 0l33.576-33.577 33.577 33.577c2.929 2.929 6.767 4.394 10.606 4.394s7.678-1.464 10.607-4.394l44.184-44.184a15.002 15.002 0 0 0 4.394-10.607V15c-.001-8.284-6.716-15-15.001-15zm-44.184 475.787-33.577-33.577a15.002 15.002 0 0 0-21.214 0l-33.576 33.577-33.577-33.577c-5.857-5.858-15.355-5.858-21.213 0l-33.577 33.577-33.576-33.577a15 15 0 0 0-21.213 0l-33.577 33.577-29.184-29.184V30h323.467v416.603h.001l-29.184 29.184z" fill="#313949" data-original="#000000" class="" opacity="1"></path></g></svg>
                                            </span>
                                        </div>
                                        <!-- <span class="fa fa-check mx-3 mt-3 text-success d-none savechanges saveupdatefilled"></span>
                                        <span class="fa fa-close  mt-3 text-danger d-none savechanges crossicon"></span> -->
                                    </div>
                                    <span class="text-danger"><?php echo form_error('amount'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="pt-2 ps-4 position-relative">
                                    <label class="form-label" for="form6Example1">Address<span class="text-danger">*</span></label>
                                </div>
                                <div class="px-4 position-relative">
                                    <div class="input-group <?php if (!empty($name)) { echo 'hoverable'; } ?>">
                                        <input type="text" class="form-control setinput" name="address" id="address" value="<?php if (!empty($address)) {echo $address;} else {echo set_value('address');} ?>" <?php if(!empty($address)) echo 'required';?>>
                                            <!-- <span class="fa fa-edit xl mt-3 editable"></span> -->
                                        <div class="input-group-addon">
                                            <span class="input-group-text bg-white d-block">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="hovered-paths"><g><path d="M256 0C150.112 0 64 86.112 64 192c0 133.088 173.312 307.936 180.672 315.328a16.07 16.07 0 0 0 22.656 0C274.688 499.936 448 325.088 448 192 448 86.112 361.888 0 256 0zm0 472.864C217.792 431.968 96 293.664 96 192c0-88.224 71.776-160 160-160s160 71.776 160 160c0 101.568-121.792 239.968-160 280.864z" fill="#313949" data-original="#000000" opacity="1" class="hovered-path"></path><path d="M256 96c-52.928 0-96 43.072-96 96s43.072 96 96 96 96-43.072 96-96-43.072-96-96-96zm0 160c-35.296 0-64-28.704-64-64s28.704-64 64-64 64 28.704 64 64-28.704 64-64 64z" fill="#313949" data-original="#000000" opacity="1" class="hovered-path"></path></g></svg>
                                            </span>
                                        </div>
                                        <!-- <span class="fa fa-check mx-3 mt-3 text-success d-none savechanges saveupdatefilled"></span>
                                        <span class="fa fa-close  mt-3 text-danger d-none savechanges crossicon"></span> -->
                                    </div>
                                    <span class="text-danger"><?php echo form_error('address'); ?></span>
                                </div>
                            </div>
                        </div>

                        <?php if($lead_status != 2 ){ ?> 
                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="pt-2 ps-4 position-relative">
                                    <label class="form-label" for="form6Example1">Lead Status<span class="text-danger">*</span></label>
                                </div>
                                <div class="px-4 position-relative">
                                    <div class="input-group <?php if (!empty($name)) {echo 'hoverable';} ?>">
                                        <select class="form-select setinput form-select-sm" aria-label=".form-select-sm example" name="lead_status" id="lead_status" <?php if(!empty($lead_status)) echo 'required';?>>
                                            <option value="">Lead Status</option>
                                            <option value="1" <?php if ($lead_status == 1) { echo 'selected';} elseif(set_value('lead_status')==1){ echo  'selected';}else{} ?>> Callback</option>
                                            <option value="2" <?php if ($lead_status == 2) {echo 'selected';} elseif(set_value('lead_status')==2){ echo  'selected';}else{} ?>>Sale</option>
                                            <option value="3" <?php if ($lead_status == 3) {echo 'selected';} elseif(set_value('lead_status')==3){ echo  'selected';}else{} ?>>Not Intersted</option>
                                            <option value="4" <?php if ($lead_status == 4) { echo 'selected'; } elseif(set_value('lead_status')==4){ echo  'selected';}else{} ?>>VM</option>
                                            <option value="5" <?php if ($lead_status == 5) {echo 'selected';} elseif(set_value('lead_status')==5){ echo  'selected';}else{} ?>>DND</option>
                                        </select>
                                            <!-- <span class="fa fa-edit xl mt-3 editable"></span> -->
                                        <div class="input-group-addon">
                                            <span class="input-group-text bg-white d-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 682.667 682.667" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><defs><clipPath id="a" clipPathUnits="userSpaceOnUse"><path d="M0 512h512V0H0Z" fill="#313949" data-original="#000000" opacity="1"></path></clipPath></defs><g clip-path="url(#a)" transform="matrix(1.33333 0 0 -1.33333 0 682.667)"><path d="M0 0c0 17.746-14.388 32.133-32.133 32.133H-385.6c-17.745 0-32.132-14.387-32.132-32.133 0-17.746 14.387-32.134 32.132-32.134h353.467C-14.388-32.134 0-17.746 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(464.866 272.067)" fill="none" stroke="#313949" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class="" opacity="1"></path><path d="m0 0 128.533-128.533v-96.4l64.268 32.133v64.267L321.334 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(95.333 239.933)" fill="none" stroke="#313949" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class="" opacity="1"></path><path d="M0 0c26.598 0 48.199 21.602 48.199 48.2 0 26.598-21.601 48.2-48.199 48.2-26.599 0-48.2-21.602-48.2-48.2C-48.2 21.602-26.599 0 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(416.667 400.6)" fill="none" stroke="#313949" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class="" opacity="1"></path><path d="M0 0c26.599 0 48.2 21.602 48.2 48.2 0 26.598-21.601 48.2-48.2 48.2-26.599 0-48.2-21.602-48.2-48.2C-48.2 21.602-26.599 0 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(256 368.467)" fill="none" stroke="#313949" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class="" opacity="1"></path><path d="M0 0c26.599 0 48.2 21.602 48.2 48.2 0 26.598-21.601 48.2-48.2 48.2-26.598 0-48.199-21.602-48.199-48.2C-48.199 21.602-26.598 0 0 0Z" style="stroke-width:30;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-dasharray:none;stroke-opacity:1" transform="translate(95.333 400.6)" fill="none" stroke="#313949" stroke-width="30" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-dasharray="none" stroke-opacity="" data-original="#000000" class="" opacity="1"></path></g></g></svg>
                                            </span>
                                        </div>
                                        <!-- <span class="fa fa-check mx-3 mt-3 text-success d-none savechanges saveupdatefilled"></span>
                                        <span class="fa fa-close  mt-3 text-danger d-none savechanges crossicon"></span> -->
                                    </div>
                                    <span class="text-danger"><?php echo form_error('lead_status'); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php } else{ ?>
                        <input type="hidden" name="lead_status" value="<?php if(!empty($lead_status)) echo $lead_status;?>" >
                        <?php }?>
                        <div class="col-md-6 mb-4">
                            <div class="d-flex">
                                <div class="pt-2 ps-4 position-relative">
                                    <label for="exampleFormControlTextarea1" class="form-label ">Description</label>
                                </div>
                                <div class="px-4 position-relative">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"  name="description"> <?php if(!empty($description)){ echo $description;}else{ echo set_value('description');} ?></textarea>
                                </div>
                            </div>
                        </div>
                        <?php if($lead_status != 2 ){ ?> 
                        <div class="col-md-11 mb-4">
                            <div class="clear-btn text-center">
                                    <button class="newbutton sendmailgroupbtn primarybtn mR0 theme-btn-2" type="submit" name="save"><?php echo $buttoName; ?></button>
                            </div>
                        </div>
                        <?php } ?>

                </form>
            </div>

            <?php if (!empty($lead_id)) {
            ?>
                <div class="col-md-10  my-5" id="notes">
                    <div class="note-container" id="employeeListing">
                        <div id="listRecords">
                        </div>
                    </div>
                    <div class="note-input position-relative ">
                        <form id="saveEmpForm" method="post">
                            <div class="input-field ">
                                <input type="text" name="lead_id" id="lead_id" value="<?php echo $lead_id; ?>" class="d-none">
                                <input type="text" name="note" id="note" maxlength="500" rows="2" placeholder="Add new note." name="note">
                            </div>
                                <input id="add-value" type="submit" value="Add Note" class="btn btn-primary ntbtn" fdprocessedid="8zp9va">
                            <!-- <button type="submit" class="btn btn-primary">Save</button> -->
                        </form>
                    </div>
                </div>
            <?php } ?>

            <?php if (!empty($lead_id)) { ?>

                <div class="col-lg-10 border my-5 " id="email-down">
                    <div class="heademail d-flex justify-between border-bottom p-2 rounded-3 ">
                        <div class="right-div">
                            <h4 class="fs-5">Emails</h4>
                        </div>
                        <!-- <div class="left-div">
                                <span class="dIB  bR2  cP cb vat mR8" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <input name="Mail" type="button" data-zcqa="sendMail" cscript-tag="send_mail" value=" Compose Email " class="newbutton sendmailgroupbtn primarybtn mR0" fdprocessedid="7ef4ba" onclick="composeemail(1)"> </span>
                        </div> -->
                    </div>
                    <div class="mt-3 d-none Show-delete-email">
                        <span class="mx-3 print_count_seleted_row"></span><span>Email(s) selected</span>
                        <span>
                            <button class="btn text-primary d-none cancle_all"><i class="fa fa-close"></i></button>
                            <button class="btn newbutton2 sendmailgroupbtn primarybtn22 mR01 d-none delete_all"><i class="fa fa-trash"></i></button>
                        </span>
                    </div>
                    <div class="mt-3 d-none Show-delete-email-draft">
                        <span class="mx-3 print_count_seleted_row_draft"></span><span>Draft(s) selected</span>
                        <span>
                            <button class="btn text-primary d-none cancle_all_draft"><i class="fa fa-close"></i></button>
                            <button class="btn newbutton2 sendmailgroupbtn primarybtn22 mR01 d-none delete_all_draft"><i class="fa fa-trash"></i></button>
                        </span>
                    </div>
                    <ul class="nav nav-pills " id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Emails</button>
                        </li>
                        <li>

                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Drafts</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width:3px;">
                                            <input type="checkbox" id="master">
                                        </th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="delete-row">
                                    <?php if (!empty($getemail)) {
                                        foreach ($getemail as $getrow) {
                                    ?>

                                            <tr id="sub_chk">
                                                <td>
                                                    <input type="checkbox" class="sub_chk" data-id="<?php echo $getrow->id; ?>">
                                                </td>
                                                <td>
                                                    <div  >
                                                        <?php echo $getrow->subject; ?><br>
                                                        <?php echo $getrow->too; ?>
                                                    </div>
                                                </td>
                                                <td><?php echo date('m-d-Y h:i A', strtotime($getrow->created_at)) ; ?></td>
                                                <td>Sent</td>
                                            </tr>
                                    <?php }
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade text-center " id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width:3px;">
                                            <input type="checkbox" id="master_draft">
                                        </th>
                                        <th scope="col">Subject</th>
                                        <th scope="col"> Date</th>
                                        <th scope="col"> Status</th>
                                    </tr>
                                </thead>
                                <tbody class="delete-row">

                                    <?php if (!empty($getedraft)) {
                                        foreach ($getedraft as $getdraft) {
                                    ?>
                                            <tr id="sub_chk_draft">
                                                <td>
                                                    <input type="checkbox" class="sub_chk_draft" data-id="<?php echo $getdraft->id; ?>">
                                                </td>
                                                <td>
                                                    <!-- <div class="user-mail" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="emaildatafetch(<?php echo $getdraft->id; ?>)"> -->
                                                        <a href=""><?php echo $getdraft->subject; ?> </a><br>
                                                        <a href="#"><?php echo $getdraft->too; ?></a>
                                                    <!-- </div> -->
                                                </td>
                                                <td><?php echo date('m-d-Y h:i A', strtotime($getdraft->created_at)) ; ?></td>
                                                <td>Draft</td>

                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>

<!-- start send email form  -->
<form action="<?php echo base_url(); ?>sales/Lead/mail" method="post">
    <div class="modal " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">

                    <span class="mx-3">
                        <a href="javascript:void(0)" class="window-closed">
                            <img src="<?php echo base_url(); ?>assets/lead/front_assets/assets/images/minus.png" width="16" alt="">
                        </a>
                    </span>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop1" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-body p-0">
                    <main class="h-100 flex modal-mail main flex-column">
                        <button id="nav-light" type="button" aria-label="" fdprocessedid="ovzax5">
                        </button>
                        <p id="success_message" class="text-center text-success"></p>
                        <p id="mailmessage" class="text-center text-danger"></p>
                        <div class="pv3 ph2 ph3-ns flex justify-center items-center w-100 tc relative email-header">
                            <div class="dropdown">
                                <a class="btn text-white newbutton sendmailgroupbtn primarybtn mR0 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Insert Templates
                                </a>
                                <ul class="dropdown-menu">
                                    <?php if (!empty($template)) {
                                        foreach ($template as $row) {
                                    ?>

                                            <li><a class="dropdown-item" href="#" onclick="insertTemplate(<?php echo $row->template_id; ?>)"><?php echo $row->template_name; ?></a>
                                            </li>

                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-secondary ms-auto" id="button_1">Save Draft</button>
                        </div>

                        <div class="mh2 w-90 center email-window h-100 flex flex-column">
                            <div class="bb email-compose">
                                <div class="flex flex-row relative items-center justify-center">
                                    <label for="recipient" class="f5-ns f6 gray-40 fw6 pl2 pl3-ns">To:</label>
                                    <input tabindex="1" class="input input-reset tagify pv3 h-100 db w-100 bg-transparent b--none pl2 pl3-ns f5" type="text" autofocus="" fdprocessedid="anatl" value="<?php if (!empty($email)) echo $email; ?>" name="too" id="too" required>
                                    <div class="mr2 mr3-ns">
                                        <a class="f5-ns f7 fw6 br2 ph2 tdn tc pv2 dib btn-sm ccButton" href="javascript:void(0);" tabindex="6">Cc:</a>
                                    </div>
                                    <div class="mr2 mr3-ns">
                                        <a class="f5-ns f7 fw6 br2 ph2 tdn tc pv2 dib btn-sm bccButton" href="javascript:void(0);" tabindex="7">Bcc:</a>
                                    </div>
                                </div>
                                <div class="dn ccSection">
                                    <div class="flex flex-row relative items-center justify-center">
                                        <label for="cc" class="f5-ns f7 fw7 code gray-40 pl2 pl3-ns">Cc:</label>
                                        <input id="cc" name="cc" tabindex="2" class="input input-reset pv3 h-100 db w-100 bg-transparent b--none pl2 pl3-ns f5" type="text">
                                    </div>
                                </div>
                                <div class="dn bccSection">
                                    <div class="flex flex-row relative items-center justify-center">
                                        <label for="bcc" class="f5-ns f6 fw7 code gray-40 pl2 pl3-ns">Bcc:</label>
                                        <input id="bcc" name="bcc" tabindex="3" class="input input-reset pv3 h-100 db w-100 bg-transparent b--none pl2 pl3-ns f5" type="text">
                                    </div>
                                </div>
                                <div class="b--black bw1 flex flex-row relative items-center justify-center">
                                    <label for="subject" class="f5-ns f6 fw7 code gray-40 pl2 pl3-ns">Subject:</label>
                                    <input id="subject" tabindex="4" name="subject" class="input input-reset pv3 h-100 db w-100 bg-transparent b--none pl2 pl3-ns f5" type="text" fdprocessedid="n3pux6" required>
                                </div>
                            </div><!-- /bg-gray-10 -->
                            <textarea id="ckeditor" class="ckeditor message" style="height:100px; width:80%;" class="" name="message"></textarea>
                            <input type="hidden" name="url" id="success-message">
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo $id; ?>">
                            <input type="hidden" name="lead_id" id="lead_id" value="<?php echo $lead_id; ?>">
                            <input type="hidden" name="module_name" id="module_name" value="tbl_leads">
                            <div class="col-2">
                                <button type="submit" onclick=" return subject();" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </main>
                </div>                
            </div>
        </div>
    </div>

</form>
<!-- close send email form  -->

<!-- start delete form notes  -->
<form id="deleteEmpForm" method="post">
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-del">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Delete Note?</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>DO you want to delete this note</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="deleteEmpId" id="deleteEmpId" class="form-control">

                    <button type="button" class="btn newgraybtn  rounded-0 " data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn theme-btn-2 float-end">Yes Delete</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- close delete form notes  -->

<!-- start edit form notes  -->
<form id="editEmpForm" method="post">
    <div class="modal" id="editEmpFormmodel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editEmpFormmodelLabel" aria-hidden="true">
        <div class="modal-dialog modal-edit">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="editEmpFormmodelLabel">Edit Notes</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Edit Note</label>
                        <textarea type="text" name="empName" id="empName" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

                        <input type="hidden" name="empId" id="empId">
                    </div>
                    <button type="submit" class="btn theme-btn-2 float-end">Update</button>
                </div>

            </div>
        </div>
    </div>
</form>
<!-- close edit form notes  -->

<!-- Send Mail -->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header p-0">
                <div class="send-msg-top">
                    <h6 class="modal-title">Send Messages
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="12" height="12" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                <g>
                                    <g data-name="02 User">
                                        <path d="M25 512a25 25 0 0 1-17.68-42.68l462-462a25 25 0 0 1 35.36 35.36l-462 462A24.93 24.93 0 0 1 25 512z" fill="#ffffff" data-original="#000000" opacity="1" class=""></path>
                                        <path d="M487 512a24.93 24.93 0 0 1-17.68-7.32l-462-462A25 25 0 0 1 42.68 7.32l462 462A25 25 0 0 1 487 512z" fill="#ffffff" data-original="#000000" opacity="1" class=""></path>
                                    </g>
                                </g>
                            </svg>
                        </button>
                    </h6>
                </div>
                <div class="fun-btn">
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <path d="M50 8H14a6.007 6.007 0 0 0-6 6v36a6.007 6.007 0 0 0 6 6h36a6.007 6.007 0 0 0 6-6V14a6.007 6.007 0 0 0-6-6zm2 42a2.002 2.002 0 0 1-2 2H14a2.002 2.002 0 0 1-2-2V14a2.002 2.002 0 0 1 2-2h36a2.002 2.002 0 0 1 2 2z" fill="#000000" data-original="#000000" class=""></path>
                                <path d="M44 42H20a2 2 0 0 0 0 4h24a2 2 0 0 0 0-4z" fill="#000000" data-original="#000000" class=""></path>
                            </g>
                        </svg>
                    </button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                            <g>
                                <g fill="#000">
                                    <path d="M8.854 8.146a.5.5 0 1 0-.708.708L11.293 12l-3.147 3.146a.5.5 0 0 0 .708.708L12 12.707l3.146 3.147a.5.5 0 0 0 .708-.708L12.707 12l3.147-3.146a.5.5 0 0 0-.708-.708L12 11.293z" fill="#000000" data-original="#000000" class=""></path>
                                    <path fill-rule="evenodd" d="M2 7a5 5 0 0 1 5-5h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5zm5-4h10a4 4 0 0 1 4 4v10a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V7a4 4 0 0 1 4-4z" clip-rule="evenodd" fill="#000000" data-original="#000000" class=""></path>
                                </g>
                            </g>
                        </svg>
                    </button>
                </div>
            </div>  
            <div id="mailFunction"></div>
        </div>
    </div>
</div>
<!-- script for mail -->
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).on('click', '.sendmailbtn', function () {
        // alert("hello");
        var mail_user = $(this).attr("id");
        var mail_page = 'Lead Module';
        var mail_module = '1';
        // alert(mail_user);
        //alert('page for -' + mail_page + '<br> mail to user -' + mail_user + '<br> Module Type -' + mail_module)
        $.ajax({
            url: "<?php echo base_url(); ?>sales/sendmail/getMail",
            method: "post",
            data: {
                mail_user: mail_user, mail_page: mail_page, mail_module:mail_module
            },
            success: function (data) {
                $('#mailFunction').html(data);
                //$('#myModal').modal("show");
            }
        });
    });

    $(document).on('click', '.notes_manage', function () {
        $('.btn-notes-minus').show();
    })

    $(document).on('mouseenter', '.notes_manage', function() {
        $('.btn-notes-minus').show();
    });
    $(document).on('mouseleave', '.notes_manage', function() {
        $('.btn-notes-minus').hide();
    });

    function subject(){
        let subject = $("#subject").val();
        if(subject==''){
            return false;
            alert('false');
        }
        else{
            return true;
        }
    }

</script>
<!-- script for mail -->


<script>
    $('#saveEmpForm').submit('click', function() {
        var lead_id = $('#lead_id').val();
        var note = $('#note').val().trim();
        if(note==0)
        {
            alert('Can not empty note description');
            return false;
        }
        else
        {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>sales/lead/save",
            //dataType : "JSON",
            data: {
                lead_id: lead_id,
                note: note
            },
            success: function(data) {

                listEmployee();
                document.getElementById('note').value = "";
            }
        });
        }
        return false;
    });
</script>
<script>
    listEmployee();
    var table = $('#employeeListing').dataTable({
        "bPaginate": false,
        "bInfo": false,
        "bFilter": false,
        "bLengthChange": false,
        "pageLength": 5
    });
    // list all employee in datatable
    function listEmployee() {
        var lead_id = $('#lead_id').val();
        // console.log(lead_id);


        $.ajax({
            type: 'ajax',
            url: '<?php echo base_url(); ?>sales/lead/show/?id=' + lead_id + '',
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) { 
                    html += '<div class="note">' +
                        '<div class="note-content">' +
                        '<p> ' + data[i].note + '</p>' +
                        '</div>' +
                        '<span class="timess">' + data[i].created_at + '</span>' +
                            '<div class="btn-group " role="group" aria-label="Basic outlined example">' +
                            '<button type="button" data-bs-toggle="modal" data-bs-target="#editEmpFormmodel" class="btn  rounded-0 editRecord" data-id="' +
                            data[i].id + '" data-note="' + data[i].note +
                            '"><box-icon class="bx-de" color="grey" name="edit"></box-icon>' +
                            '</button>' +
                                '<a href="javascript:void(0);" class="btn  btn-sm deleteRecord" data-id="' +
                                data[i].id + '"><box-icon class="bx-de" color="#313949 " name="trash"></box-icon></a>' +
                                '</div>' +
                            '</span>' +

                            '</div>';
                }
                if (html == "") {
					$(".note-container").attr("style", "height:0px !important;");
				} else {
					$(".note-container").removeAttr("style", "height:0px !important;");
				}
                $('#listRecords').html(html);
            }

        });
    }
</script>

<script>
    // show delete form
    $('#listRecords').on('click', '.deleteRecord', function() {
        var empId = $(this).data('id');
        $('#exampleModal').modal('show');
        $('#deleteEmpId').val(empId);
    });

    // delete emp record
    $('#deleteEmpForm').on('submit', function() {

        var empId = $('#deleteEmpId').val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>sales/lead/delete",
            dataType: "JSON",
            data: {
                id: empId
            },
            success: function(data) {
                $("#" + empId).remove();
                $('#deleteEmpId').val("");
                $('#exampleModal').modal('hide');
                listEmployee();
            }
        });
        return false;
    });
</script>
<script>
    // show edit modal form with emp data
    $('#listRecords').on('click', '.editRecord', function() {
        $('#editEmpFormmodel').modal('show');
        $("#empId").val($(this).data('id'));
        $("#empName").val($(this).data('note'));


    });
    // save edit record
    $('#editEmpForm').on('submit', function() {

        var empId = $('#empId').val();
        var empName = $('#empName').val();
        console.log(empName);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>sales/lead/updatenote",
            // dataType: "JSON",
            data: {
                id: empId,
                note: empName
            },
            success: function(data) {
                $("#empId").val("");
                $("#empName").val("");
                $('#editEmpFormmodel').modal('hide');
                listEmployee();
            }
        });
        return false;
    });
    if ($('.Callback').val('Callback')) {

    }
</script>
<script>
    $(document).ready(function() {
        $("#button_1").click(function(e) {
            var too = $('#too').val();
            var cc = $('#cc').val();
            var bcc = $('#bcc').val();
            var message = CKEDITOR.instances["ckeditor"].getData();
            var subject = $('#subject').val();
            var module_name = $('#module_name').val();
            var lead_id = $('#lead_id').val();
            if(too == '' ){
                $("#mailmessage").text('Please Fill Email Address');
            }
            else if(subject == ''){
                $("#mailmessage").text('Please Fill Subject');
            }
            else{
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>sales/Lead/emaildraft",
                    //dataType : "JSON",
                    data: {
                        too: too,
                        cc: cc,
                        bcc: bcc,
                        message: message,
                        subject: subject,
                        module_name: module_name,
                        lead_id: lead_id
                    },
                    success: function(data) {
                        if(data==1){
                            var message = data;
                            $('#success_message').text("Message Save Draft");
                            window.location.reload();

                        }   
                        // console.log(data);
                    }
                });
            }
        });
    });
</script>
<script>
    function insertTemplate(template_id) {

        let id = template_id;
        $.ajax({
            url: "<?php echo base_url(); ?>sales/Lead/fetchtemplate",
            type: "POST",
            // sending data
            data: {
                template_id: id,
            },
            // response text
            success: function(data) {

                var arr = $.parseJSON(data);
                console.log(arr[0]['template_code']);
                let temp_code = arr[0]['template_code'];

                CKEDITOR.instances['ckeditor'].setData(temp_code);

            }
        });
    };

    function emaildatafetch(id) {
        let t_id = id;
        $.ajax({

            url: "<?php echo base_url(); ?>sales/Message/fetchdraft",
            type: "POST",
            data: {
                t_id: t_id,

            },
            success: function(data) {


                var getdraft = $.parseJSON(data);
                let too = getdraft[0]['too'];
                let cc = getdraft[0]['cc'];
                let bcc = getdraft[0]['bcc'];
                let subject = getdraft[0]['subject'];
                let message = getdraft[0]['message'];
                CKEDITOR.instances['ckeditor'].setData(message);
                $("#too").val(too);
                $("#cc").val(cc);
                $("#bcc").val(bcc);
                $("#subject").val(subject);
            }
        });
    }

    function sendemaildatafetch(id) {
        let t_id = id;
        $.ajax({

            url: "<?php echo base_url(); ?>sales/Message/sendemailfetchdraft",
            type: "POST",
            data: {
                t_id: t_id,

            },
            success: function(data) {


                var getdraft = $.parseJSON(data);
                let too = getdraft[0]['too'];
                let cc = getdraft[0]['cc'];
                let bcc = getdraft[0]['bcc'];
                let subject = getdraft[0]['subject'];
                let message = getdraft[0]['message'];
                CKEDITOR.instances['ckeditor'].setData(message);
                $("#too").val(too);
                $("#cc").val(cc);
                $("#bcc").val(bcc);
                $("#subject").val(subject);
            }

        });
    }

    function composeemail(id) {
        $id = id;
        $("#source").val($id);
        $("#too").val('');
    }
</script>

<!-- mail delete script  -->
<script>
    $(document).ready(function() {

        var $checkboxes = $('#sub_chk td input[type="checkbox"]');
        $checkboxes.change(function() {
            var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
            $('.print_count_seleted_row').text(countCheckedCheckboxes);
        });


        var $checkboxes = $('#sub_chk td input[type="checkbox"]');
        $checkboxes.change(function() {
            var countCheckedCheckboxes = $checkboxes.filter(':unchecked').length;
            $('.print_count_seleted_row').text(countCheckedCheckboxes);
        });


        $('#master').on('click', function(e) {

            $('.delete_all').removeClass('d-none');
            $('.cancle_all').removeClass('d-none');
            $('.Show-delete-email').removeClass('d-none');


            if ($(this).is(':checked', true)) {
                $(".sub_chk").prop('checked', true);
                var $checkboxes = $('#sub_chk td input[type="checkbox"]');
                var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
                $('.print_count_seleted_row').text(countCheckedCheckboxes);


            } else {
                $(".sub_chk").prop('checked', false);
                var $checkboxes = $('#sub_chk td input[type="checkbox"]');
                var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
                $('.print_count_seleted_row').text(countCheckedCheckboxes);
            }


        });
        $('.sub_chk').on('click', function() {
            $('.delete_all').removeClass('d-none');
            $('.cancle_all').removeClass('d-none');
            $(".Show-delete-email").removeClass('d-none');

        });
        $('.cancle_all').on('click', function() {
            $('.delete_all').addClass('d-none');
            $('.cancle_all').addClass('d-none');
            $('.Show-delete-email').addClass('d-none');

            if ($(this).is(':checked', true)) {
                $(".sub_chk").prop('checked', true);

            } else {
                $(".sub_chk").prop('checked', false);
            }
            if ($(this).is(':checked', true)) {
                $("#master").prop('checked', true);
            } else {
                $("#master").prop('checked', false);
            }
        });

        $('.delete_all').on('click', function(e) {

            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            if (allVals.length <= 0) {
                alert("Please select row.");
            } else {

                var check = confirm("Are you sure you want to delete this row?");
                if (check == true) {

                    var join_selected_values = allVals.join(",");

                    $.ajax({
                        url: "<?php echo base_url(); ?>sales/Lead/DeleteEmail",
                        type: 'POST',
                        data: 'ids=' + join_selected_values,
                        success: function(data) {
                            console.log(data);
                            $(".sub_chk:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                            alert("Send Email Deleted successfully.");
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });

                    $.each(allVals, function(index, value) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            }
        });
    });
</script>
<script>
    $(document).ready(function() {

        var $checkboxes = $('#sub_chk_draft td input[type="checkbox"]');
        $checkboxes.change(function() {
            var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
            $('.print_count_seleted_row_draft').text(countCheckedCheckboxes);
        });


        var $checkboxes = $('#sub_chk_draft td input[type="checkbox"]');
        $checkboxes.change(function() {
            var countCheckedCheckboxes = $checkboxes.filter(':unchecked').length;
            $('.print_count_seleted_row_draft').text(countCheckedCheckboxes);
        });


        $('#master_draft').on('click', function(e) {

            $('.delete_all_draft').removeClass('d-none');
            $('.cancle_all_draft').removeClass('d-none');
            $('.Show-delete-email-draft').removeClass('d-none');

            if ($(this).is(':checked', true)) {
                $(".sub_chk_draft").prop('checked', true);
                var $checkboxes = $('#sub_chk_draft td input[type="checkbox"]');
                var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
                $('.print_count_seleted_row_draft').text(countCheckedCheckboxes);


            } else {
                $(".sub_chk_draft").prop('checked', false);
                var $checkboxes = $('#sub_chk_draft td input[type="checkbox"]');
                var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
                $('.print_count_seleted_row_draft').text(countCheckedCheckboxes);
            }

        });
        $('.sub_chk_draft').on('click', function() {
            $('.delete_all_draft').removeClass('d-none');
            $('.cancle_all_draft').removeClass('d-none');
            $(".Show-delete-email-draft").removeClass('d-none');

        });
        $('.cancle_all_draft').on('click', function() {
            $('.delete_all_draft').addClass('d-none');
            $('.cancle_all_draft').addClass('d-none');
            $('.Show-delete-email-draft').addClass('d-none');

            if ($(this).is(':checked', true)) {
                $(".sub_chk_draft").prop('checked', true);

            } else {
                $(".sub_chk_draft").prop('checked', false);
            }
            if ($(this).is(':checked', true)) {
                $("#master_draft").prop('checked', true);
            } else {
                $("#master_draft").prop('checked', false);
            }
        });

        $('.delete_all_draft').on('click', function(e) {

            var allVals = [];
            $(".sub_chk_draft:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            if (allVals.length <= 0) {
                alert("Please select row.");
            } else {

                var check = confirm("Are you sure you want to delete this row?");
                if (check == true) {

                    var join_selected_values = allVals.join(",");

                    $.ajax({
                        url: "<?php echo base_url(); ?>sales/Lead/DeleteEmaildraft",
                        type: 'POST',
                        data: 'ids=' + join_selected_values,
                        success: function(data) {
                            console.log(data);
                            $(".sub_chk_draft:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                            alert("Send Email Draft Deleted successfully.");
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });

                    $.each(allVals, function(index, value) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            }
        });
    });
</script>
<script>
    $(".hoverable").click(function() {
        $(".editable").removeClass('d-none');


    });
    $(".editable").click(function() {
        $(this).parent('.hoverable').find('.savechanges').removeClass('d-none');
        $(".editable").hide();
        $('.setinput').removeAttr('readonly');

    });
    $(".crossicon").click(function() {
        $(".editable").hide();
        $(this).parent('.hoverable').find('.savechanges').addClass('d-none');
        window.location.reload();

    });
</script>
<script>
    $('.saveupdatefilled').on('click', function() {

        $hidden_id = $('#hidden_id').val();
        $name = $('#name').val();
        $date_of_sale = $('#date_of_sale').val();
        $phone = $('#phone').val();
        $payment = $('#payment').val();
        $other_phone = $('#other_phone').val();
        $company_name = $('#company_name').val();
        $email = $('#email').val();
        $password = $('#password').val();
        $issue = $('#issue').val();
        $amount = $('#amount').val();
        $address = $('#address').val();
        $lead_status = $('#lead_status').val();

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>sales/Lead/updateformfilled",
            data: {
                hidden_id: $hidden_id,
                name: $name,
                date_of_sale: $date_of_sale,
                phone: $phone,
                payment: $payment,
                other_phone: $other_phone,
                company_name: $company_name,
                email: $email,
                password: $password,
                issue: $issue,
                amount: $amount,
                address: $address,
                lead_status: $lead_status,
            },
            success: function(data) {
                window.location.reload();
            }
        });

    });
</script>
<script>
    document.querySelector('#success-message').value = location.href
</script>
<script>
$('#customer').on('submit',function(){
    if($("#lead_status").val()==2){
        if(confirm('Are You Sure Lead Status Is Sale')){
            return true;
        }
        else{
            return false;
        }
    }
}) 
</script>
<script>
    function valid()
    {
       let mobile_1 = $("#phone").val();
       let mobile_2 = $("#other_phone").val();
 
       if($('#phone').val().length == 0){
		    return true;
		}
       else if($('#phone').val().length != 10){
		    alert('Phone number must be 10 digits') ;
		    return false;
		}
		else if($('#other_phone').val().length==0){
        return true;
        }
        else if($('#other_phone').val().length != 10){
        alert('Alt Phone No must be 10 digits');
        return false;
        }
        else if((mobile_1 == mobile_2) &&  (mobile_2 != ''))
       {
        alert('Phone number 2 should not be same as phone number 1');
        $('#other_phone').css("border","1px solid red");
        $('#other_phone').focus();
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
        }); 
</script>