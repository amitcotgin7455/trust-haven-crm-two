<style>
    .edit_side_bar_filter {
        height: 79vh;
    }

    .side-bar-tab {
        font-weight: 500;
        display: block;
    }

    .side-bar-tab:hover {
        color: #b41e45;
    }

    .edit_side_bar_filter li {
        padding: 10px 15px;
        cursor: pointer;
    }

    .edit_side_bar_filter li:hover {
        background: #b41e45;
    }

    .edit_side_bar_filter li:hover a {
        color: #fff;
    }

    .next-page-btns a {
        padding: 10px;
    }

    .owner-detail {
        background-color: #fff;
        padding: 30px;
        border-radius: 5px;
    }

    body .editlead .form-select:focus {
        margin: 0;
    }

    .editlead .form-control {
        /* border-color: transparent;
        cursor: pointer;
        z-index: 1;
        position: relative;
        background: transparent; */
    }

    .edit-field {
        position: absolute;
        right: 15px;
        top: 14px;
        font-size: 12px;
    }

    .accordion-body .edit-field {
        right: 35px;
    }

    .accordion-body span.check-close {
        right: -40px;
    }

    .editlead .form-control:hover {
        /* border-color: #aaa6a6; */
    }

    .editlead .form-control:focus {
        /* border-color: #b41e45;
        box-shadow: 0px 0px 5px 0px #b41e45;
        width: 300px; */
    }

    .editlead select.form-control:focus {
        width: 100%;
    }

    .editlead .form-control:focus .edit-field {
        right: -10px;
    }

    #edit-field1,
    .down-select .fa-sort-down {
        opacity: 0;
        visibility: hidden;
    }

    .form-control:hover~#edit-field1,
    .editlead .form-control:focus~#edit-field1,
    .editlead .form-control:focus~.check-close a,
    .editlead .form-control:focus~.down-select .fa-sort-down,
    .editlead .form-control:hover~.down-select .fa-sort-down {
        opacity: 1;
        /* visibility: visible; */
        /* display: block; */
    }

    span.check-close {
        position: absolute;
        right: -60px;
        top: 8px;
    }

    .close-input-xmark .fa-xmark {
        color: #fff;
    }

    .check-close a {
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex !important;
        align-items: center;
        justify-content: center;
        opacity: 0;
        /* visibility: hidden; */
        display: none;

    }

    /* .check-close a:hover{
  opacity: 0.8;
} */
    .close-input-xmark {
        background: #0a3161;
        margin-right: 10px;
    }

    .check-input-check-booking .fa-check {
        color: #fff;
    }

    .check-input-check-booking {
        background: #b41e45;
    }

    .editlead input {
        /* width: 300px;
        padding-right: 20px; */
    }

    span.down-select {
        position: absolute;
        right: 32px;
        top: 6px;
    }

    .detail-body .accordion-body {
        padding: 40px;
    }

    .detail-box label {
        /* width: 130px;
        font-weight: 500;
        color: #2d2d2d;
        text-align: end; */
    }

    .date-time-day {
        font-size: 14px;
    }

    .editlead .textarea-style:focus {
        width: auto;
        height: 115px;
    }

    .editlead .textarea-style {
        border: var(--bs-border-width) solid var(--bs-border-color);
        Color: #4e5f81;
    font-weight: 600 !important;
    font-size: 13px;
    font-family: 'Open Sans', sans-serif;
    }

    .note-area-box .check-close a {
        border-radius: unset;
        width: unset;
        height: unset;
        display: unset;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        z-index: 999;
    }

    .note-area-box .check-close {
        background: #fff;
        position: absolute;
        top: 111px;
        border-radius: 3px;
        width: 93.2%;
        left: 25px;
        z-index: 99;
        opacity: 0;
    }

    .editlead .form-control:focus~.check-close {
        opacity: 1;
    }

    .note-area-box .check-close span {
        float: right;
        margin-right: 5px;
    }

    textarea {
        resize: none;
    }

    .side_bar_filter {
        position: sticky;
        top: 20px;
    }

    .ft-w {
        font-weight: 500;
    }

    .user-name {
        background: #0a3161;
        color: #fff;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .user-name p {
        margin: 0;
    }

    p.lead-notes a:hover {
        color: #8d8c8c !important;
    }

    p.lead-notes svg {
        color: #0a3161;
    }

    .user-notes:hover {
        display: block;
    }

    .add-trash-btn {
        display: none;
    }

    .user-notes-detail:hover .add-trash-btn {
        display: block;

    }

    .user-notes-detail {
        width: 43%;
    }
    /* mail module */
    #myModal {
        height: 97vh
    }

    .modal-fullscreen {
        width: 68vw;
        max-width: none;
        height: 97vh;
        margin: 0;
        left: 32%;
        right: 0;
    }

    .modal-footer {
        justify-content: flex-start !important;

    }

    .email-footer {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;

        justify-content: space-evenly;
        align-items: center;
    }

    .attach-email {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1;
        cursor: pointer;
    }

    .attach-email .dropup .dropdown-toggle::after {
        display: none
    }

    /* .attach-email > input[type='file'] {
        display: none
    }
*/
    .attach-email button {
        cursor: pointer;
        outline: 0;
        user-select: none;
        border-color: #338cf0;
        border-style: solid;
        border-width: 1px;
        border-radius: 4px;
        background-color: #338cf0;
        color: #fff;
        padding: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 32px;
        width: 32px
    }

    .attach-email .btn-check:checked+.btn,
    .attach-email .btn.active,
    .attach-email .btn.show,
    .attach-email .btn:first-child:active,
    .attach-email :not(.btn-check)+.btn:active {
        color: #333;
        background-color: #338cf0;
        border-color: #338cf0;
    }

    .attach-email button:hover {
        border-color: #338cf0;
        background: #338cf0
    }

    .attach-email .dropdown-menu {
        background: #fff;
        border: 1px solid #CACACA;
        ;
        box-sizing: border-box;
        z-index: 10020;
        vertical-align: middle;
        outline: 0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        ;
        border-radius: 6px;
    }

    .attach-email .dropdown-menu li.dropdown-item {
        color: #313949;
        font-size: 14px;
        padding: 6px 0px 6px 0px;
        z-index: 1;
    }

    .attach-email .dropdown-menu .dropdown-item:focus,
    .attach-email .dropdown-menu .dropdown-item:hover {
        color: #313949;
        background-color: #e7f2ff;
        ;
    }

    .btn-send {
        position: absolute;
        right: 15px;
        text-align: right;
        left: 0;
    }

    .send-msg-top {
        padding: 10px 15px;
        background-color: #07385d;
        color: #fff;
    }

    .send-msg-top h6 {
        font-size: 14px
    }

    .fun-btn {
        margin-right: 15px;
    }

    .btn-close {
        --bs-btn-close-bg: none;
    }

    .btn-close:focus {
        box-shadow: none;
    }

    .btm-border {
        border-top: 1px solid rgba(0, 0, 0, 0.175);
    }

    .sender-email {
        margin-top: 3px;
    }

    .sender-email span {
        color: #313949;
        font-size: 14px;
    }

    .btn-group button.btn.btn-secondary {
        color: #338CF0;
        padding: 4px 10px !important;
        border: 1px solid #338CF0;
        ;
        background: #EDF6FF;
        ;
        box-shadow: none;
        display: inline-block;
        border-radius: 5px 0 0 5px !important;
        font-size: 14px
    }

    .btn-group button.btn.btn-default {
        color: #338CF0;
        padding: 3px 10px !important;
        border: 1px solid #338CF0;
        ;
        background: #EDF6FF;
        ;
        box-shadow: none;
        display: inline-block;
        border-radius: 0 5px 5px 0 !important;
        font-size: 14px
    }

    .add-tamplate ul {
        padding: 5px
    }

    .add-tamplate ul li {
        cursor: pointer;
        white-space: nowrap;
        color: #313949;
        ;
        font-size: 14px;
        padding: 3px 15px;
    }

    .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 23px;
        right: 28px;
        width: 280px;
    }

    .form-popup {
        display: none;
        position: fixed;
        top: 0;
        bottom: 0;
        right: 0;
        height: 100vh;
        width: 100%;
        text-align: center;
        border: 3px solid #f1f1f1;
        z-index: 9;
        background: #4c4c4cb5;
    }

    .form-container {
        max-width: 600px;
        padding: 10px 25px;
        background-color: white;
        left: 50%;
        transform: translate(-50%);
        position: absolute;
    }

    .form-container h5 {
        font-size: 18px;
        text-align: left
    }

    .form-container .cancel {
        font-size: 5px;
        float: right;
    }

    .form-container .cancel:focus {
        border: none
    }

    select#tamplates {
        font-size: 14px;
        color: #212529;
        font-weight: 500
    }

    select#tamplates option {
        font-size: 13px;
        color: #212529;
        font-weight: 500;
        padding: 5px
    }

    .form-container .btn:hover,
    .open-button:hover {
        opacity: 1;
    }

    .form-container input[type=text] {
        background-image: url('assets/images/searchicon.png');
        background-size: 16px;
        background-position: 9px 9px;
        background-repeat: no-repeat;
        padding: 6px 8px 6px 39px;
        font-size: 14px;
        color: #212529;
        font-weight: 500
    }

    .ceCcbcc span {
        margin-left: 10px;
        color: #1b6bd3;
        font-size: 14px;
        line-height: 15px;
        white-space: nowrap;
    }

    .send-to-id {
        display: flex;
        /* align-content: center; */
        align-items: baseline;
        margin-bottom: 0;
        /* margin-top: 5px; */
    }

    .send-to-id ul {
        list-style-type: none;
    }

    .send-to-id ul span {
        font-size: 14px;
        color: #6c6c6c;
        font-weight: 400;
    }

    .send-to-id span.to {
        Color: #434D5F;
        font-size: 14px;
        line-height: 15px;
    }

    .input-add input[type="text"] {
        border: none;
        margin-left: 25px;
    }

    .send-to-sub input.form-control {
        padding: 10px 0;
        border: 0;
        Color: #434D5F;
        font-size: 14px;
        line-height: 15px;
    }

    .ck.ck-reset_all,
    .ck.ck-reset_all * {
        border: none;

        background: transparent;
    }

    .ck-blurred.ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline {
        border: none;
    }

    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
        border: none;
    }

    .ck.ck-editor__editable:not(.ck-editor__nested-editable).ck-focused {
        border: none;
        box-shadow: none
    }
    .ck-editor__editable {
        min-height: 500px;
    }
    .accordion-item{
        width:100%
    }
</style>
<?php
if($lead_detail[0]->date)
{
$date_exp =  explode('-',$lead_detail[0]->date);
$booking_date = $date_exp[2].','.($date_exp[0]-1).','.$date_exp[1];
}
?>

<!-- header end  -->
<div class="second_header">
    <div class="container-fluid ">
        <div class="row justify-content-between align-content-center">
            <div class="col-6">
                <h5 class="d-inline">Detail Booking</h5>
            </div>
            <div class="col-6">
                <div class="leads-btn mb-2">
                    <a href="javascript:void(0)" class="btn btn_save sendmailbtn" id="<?php echo $lead_detail[0]->id; ?>" data-bs-toggle="modal" data-bs-target="#myModal"> Send Email </a>
                    <!-- <a href="javascript:void(0)" class="btn button_btn">Convert</a> -->
                    <!-- <a href="<?php echo base_url(); ?>update-booking?id=<?php echo base64_encode($lead_detail[0]->id); ?>" class="btn button_btn"> Edit</a> -->
                    <!-- <a href="javascript:void(0)" class="btn button_btn"> ...</a> -->
                    <span class="next-page-btns">
                        <!-- <a href="javascript:void(0)"> <i class="fa-solid fa-chevron-left"></i></a>
                        <a href="javascript:void(0)"> <i class="fa-solid fa-chevron-right"></i></a> -->
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="editlead pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-3">
                <div class="side_bar_filter edit_side_bar_filter">
                    <h6>Related List</h6>
                    <ul class="pt-3 list-unstyled">
                        <li class="mb-2"><a href="#notes-section" class="side-bar-tab">Notes</a></li>
                        <li class="mb-2"><a href="#notes-sections" class="side-bar-tab">Emails</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-10 col-lg-9">
                <div class="accordion detail-body mb-4" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                <b>Details</b>
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <div class="row">
                                    <p class="text-danger" id="message"></p>
                                    <h4 class="mb-3">Booking Information</h4>

                                    <div class="col-lg-6">
                                        <div class="detail-box">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="">First Name :</label>
                                                </div>
                                                <div class="px-4 position-relative">
                                                    <input type="hidden" value="<?php if (!empty($lead_detail[0]->id)) {
                                                                                    echo $lead_detail[0]->id;
                                                                                } ?>" id="hidden_id">
                                                    <input class="form-control" value="<?php if (!empty($lead_detail[0]->first_name)) {
                                                                                            echo $lead_detail[0]->first_name;
                                                                                        } ?>" type="hidden" id="first_name" onkeydown="return /[a-z ]/i.test(event.key)" disabled>
                                                    <input class="form-control" id="get_booking_first_name" value="<?php if (!empty($first_name)) {
                                                                                                                        echo $first_name;
                                                                                                                    } ?>" type="text" onkeydown="return /[a-z ]/i.test(event.key)" disabled>
                                                    <!-- <select id="select-state22" placeholder="Search Name..." onchange="bookingsName();" class="bookings_name" id="first_name"  style="width:250px;" disabled> 
                                                        <option value="">Search Name</option>
                                                        <?php if (!empty($select_name)) {
                                                            foreach ($select_name as $name) { ?>
                                                        <option value="<?php echo $name->id; ?>" <?php if ($name->id == $lead_detail[0]->first_name) {
                                                                                                    echo 'selected';
                                                                                                } ?> ><?php echo $name->first_name; ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select> -->
                                                    <i id="edit-field1" class="edit-field fa-solid fa-pencil none-icon"></i>
                                                    <span class="check-close d-flex">
                                                        <a class="close-input-xmark" href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>
                                                        <a href="javascript:void(0)" class="check-input-check-booking"> <i class="fa-solid fa-check"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="">Phone Number :</label>
                                                </div>
                                                <div class="px-4 position-relative">
                                                    <input class="form-control" value="<?php if (!empty($lead_detail[0]->mobile_1)) {
                                                                                            echo $lead_detail[0]->mobile_1;
                                                                                        } ?>" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" id="mobile_1" disabled>
                                                    <i id="edit-field1" class="edit-field fa-solid fa-pencil none-icon"></i>
                                                    <span class="check-close d-flex">
                                                        <a class="close-input-xmark" href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>
                                                        <a href="javascript:void(0)" class="check-input-check-booking"> <i class="fa-solid fa-check"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="">Email :</label>
                                                </div>
                                                <div class="px-4 position-relative">
                                                    <input class="form-control" value="<?php if (!empty($lead_detail[0]->email)) {
                                                                                            echo $lead_detail[0]->email;
                                                                                        } ?>" type="email" id="email"  disabled> 
                                                    <i id="edit-field1" class="edit-field fa-solid fa-pencil none-icon"></i>
                                                    <span class="check-close d-flex">
                                                        <a class="close-input-xmark" href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>
                                                        <a href="javascript:void(0)" class="check-input-check-booking"> <i class="fa-solid fa-check"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="">Date :</label>
                                                </div>
                                                <div class="px-4 position-relative">
                                                    <!-- <?php $sale_exp =  explode('-', $lead_detail[0]->date);
                                                    $date = $sale_exp[2] . '-' . $sale_exp[0] . '-' . $sale_exp[1];
                                                    ?>
                                                    <input class="form-control" value="<?php if (!empty($lead_detail[0]->date)) {
                                                                                            echo $date;
                                                                                        } ?>" type="date" id="txtDate"> -->
                                                    
                                                    <div id="booking_date" style="width: 346px;padding-left: 24px;" 
             class="input-group date" 
             data-date-format="mm-dd-yyyy"> 
            <input class="form-control" 
                   type="text" name="date" id="input_booking_date"   disabled/>  
            <span class="input-group-addon"> 
                <i class="glyphicon glyphicon-calendar"></i> 
            </span> 
                                                    <i id="edit-field1" class="edit-field fa-solid fa-pencil none-icon"></i>
                                                    <span class="check-close d-flex">
                                                        <a class="close-input-xmark" href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>
                                                        <a href="javascript:void(0)" class="check-input-check-booking"> <i class="fa-solid fa-check"></i></a>
                                                    </span>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="">Added By :</label>
                                                </div>
                                                <div class="px-4 position-relative">
                                                    <p class="pt-2 px-3"> <span id="user_name"><?php echo $lead_added_name; ?></span> <br><span class="date-time-day"> <?php if (!empty($lead_detail[0]->created_date)) {
                                                                                                                                                                            echo date('m-d-Y g:i A', strtotime($lead_detail[0]->created_date));
                                                                                                                                                                        } ?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="detail-box">
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="">Last Name :</label>
                                                </div>
                                                <div class="px-4 position-relative">
                                                    <input class="form-control" value="<?php if (!empty($lead_detail[0]->last_name)) {
                                                                                            echo $lead_detail[0]->last_name;
                                                                                        } ?>" type="text" id="last_name" onkeydown="return /[a-z ]/i.test(event.key)" disabled>
                                                    <i id="edit-field1" class="edit-field fa-solid fa-pencil none-icon"></i>
                                                    <span class="check-close d-flex">
                                                        <a class="close-input-xmark" href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>
                                                        <a href="javascript:void(0)" class="check-input-check-booking"> <i class="fa-solid fa-check"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="">Alt Phone No :</label>
                                                </div>
                                                <div class="px-4 position-relative">
                                                    <input class="form-control" value="<?php if (!empty($lead_detail[0]->mobile_2)) {
                                                                                            echo $lead_detail[0]->mobile_2;
                                                                                        } ?>" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" id="mobile_2" disabled>
                                                    <i id="edit-field1" class="edit-field fa-solid fa-pencil none-icon"></i>
                                                    <span class="check-close d-flex">
                                                        <a class="close-input-xmark" href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>
                                                        <a href="javascript:void(0)" class="check-input-check-booking"> <i class="fa-solid fa-check"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="">Timezone :</label>
                                                </div>
                                                <div class="px-4 position-relative">
                                                    <select class="form-control form-select" aria-label="Default select example" style="width: 300px;" id="timezone" disabled>
                                                        <option value="1" <?php if ($lead_detail[0]->timezone == 1) {
                                                                                echo 'selected';
                                                                            } ?> disabled>EST</option>
                                                        <option value="2" <?php if ($lead_detail[0]->timezone == 2) {
                                                                                echo 'selected';
                                                                            } ?> disabled>CST</option>
                                                        <option value="3" <?php if ($lead_detail[0]->timezone == 3) {
                                                                                echo 'selected';
                                                                            } ?> disabled>PST </option>
                                                        <option value="4" <?php if ($lead_detail[0]->timezone == 4) {
                                                                                echo 'selected';
                                                                            } ?> disabled>MST </option>
                                                    </select>
                                                    <i id="edit-field1" class="edit-field fa-solid fa-pencil none-icon"></i>
                                                    <span class="check-close d-flex">
                                                        <a class="close-input-xmark" href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>
                                                        <a href="javascript:void(0)" class="check-input-check-booking"> <i class="fa-solid fa-check"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="">Time :</label>
                                                </div>
                                                <div class="px-4 position-relative">
                                                    <!-- <input class="form-control" value="<?php if (!empty($lead_detail[0]->time)) {
                                                                                            echo $lead_detail[0]->time;
                                                                                        } ?>" type="time" id="time"> -->
                                                    <!-- <input type="time" value="<?= $lead_detail[0]->time ?>" id="time"> -->

                                                <input type="text" class="form-control date-input timepicker" id="time" placeholder="time" name="time" aria-label="date" aria-describedby="basic-addon1" value="<?php if(!empty($lead_detail[0]->time)){ echo date('h:i A',strtotime($lead_detail[0]->time)); } else{ echo set_value('time'); } ?>" data-gtm-form-interact-field-id="0" disabled>

                                                    <i id="edit-field1" class="edit-field fa-solid fa-pencil none-icon"></i>
                                                    <span class="check-close d-flex">
                                                        <a class="close-input-xmark" href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>
                                                        <a href="javascript:void(0)" class="check-input-check-booking"> <i class="fa-solid fa-check"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-2">
                                                <div class="pt-2 ps-4 position-relative">
                                                    <label for="">Booking Status :</label>
                                                </div>
                                                <div class="px-4 position-relative">
                                                    <select class="form-control form-select" aria-label="Default select example" style="width: 300px;" id="booking_status" >
                                                        <option value="1" <?php if ($lead_detail[0]->booking_status == 1) {
                                                                                echo 'selected';
                                                                            } ?> >Open</option>
                                                        <option value="2" <?php if ($lead_detail[0]->booking_status == 2) {
                                                                                echo 'selected';
                                                                            } ?> >Pending</option>
                                                        <option value="3" <?php if ($lead_detail[0]->booking_status == 3) {
                                                                                echo 'selected';
                                                                            } ?> >Close</option>
                                                    </select>
                                                    <i id="edit-field1" class="edit-field fa-solid fa-pencil none-icon"></i>
                                                    <span class="check-close d-flex">
                                                        <a class="close-input-xmark" href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>
                                                        <a href="javascript:void(0)" class="check-input-check-booking"> <i class="fa-solid fa-check"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="notes-section" class="owner-detail note-area-box mb-4">
                    <h4 class="mb-4">Notes</h4>
                    <div id="listnotes_booking"></div>
                    <div class="d-flex pt-3 pb-2">
                        <div class="position-relative notes_manage">
                            <textarea class="form-control textarea-style" id="title" cols="80" rows="5" placeholder="Add a note..." required></textarea>
                            <input type="hidden" value="<?php if (!empty($lead_detail[0]->user_id)) {
                                                            echo $lead_detail[0]->user_id;
                                                        } ?>" id="user_id">
                            <input type="hidden" value="<?php if (!empty($lead_detail[0]->id)) {
                                                            echo $lead_detail[0]->id;
                                                        } ?>" id="module_id">
                            <input type="hidden" id="created_date" value="<?= date("F j, Y, g:i A"); ?>">
                            <input type="hidden" value="3" id="module_type">
                            <input type="hidden" value="Booking" id="module_name">
                            <div class="btn-notes-minus" style="display: none;">
                                <span class="d-flex mt-3 float-end">
                                    <button href="javascript:void(0)" class="btn button_btn me-2" id="cancel">Cancel</button>
                                    <button class="btn btn_save" id="submit_booking">Save</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- email-list-draft start -->
                <div id="notes-sections" class="email-detail note-area-box mb-4">
                    <div class="border-btm d-flex justify-content-between">
                        <div class="notes-txt">
                            <h4>Emails</h4>
                        </div>
                        <div class="comp-email">
                        <a href="javascript:void(0)" class="btn tb_newsmallbtn sendmailbtn" id="<?php echo $lead_detail[0]->id; ?>" data-bs-toggle="modal" data-bs-target="#myModal">  Compose Email</a>
                        </div>
                    </div>

                    <div class="email-tab-table">
                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="pill" href="#mailes" aria-selected="true" role="tab">Mails</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#drafts" aria-selected="false" role="tab" tabindex="-1">Drafts</a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="mailes" class="tab-pane active show" role="tabpanel">   
                                        <div class="data-list table-responsive-lg ">
                                        <table class="table" style="width:100%">
                                                <thead id="data-heading-show">
                                                    <tr>                                            
                                                        <!-- <th><input type="checkbox" id="checkbox"></th> -->
                                                        <th>Subject</th>
                                                        <th>Date</th>
                                                        <!-- <th>Description</th> -->
                                                        <th>Source</th>
                                                        <th>Sent By</th>
                                                        <th>Sender Email</th>
                                                        <th>Sender Name</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                               
                                                <tbody id="data-show">
                                                <?php
                                                    if(count($email_list)==0)
                                                    { 
                                                        echo '<tr><td></td><td></td><td></td><td></td><td><b>No Email Found</b></td><td></td><td></td><td></td></tr>';
                                                    }
                                                    else
                                                    {
                                                     $i=1;
                                                     foreach($email_list as $email=>$contact_email)
                                                     {
                                                        ?>                                
                                                    <tr id="sub_chk_draft" class="email_detail" data-email="<?= $contact_email->id ?>" data-bs-toggle="modal" data-bs-target="#emaildetailModal">                                               
                                                        <!-- <td><input type="checkbox" id="checkbox"></td> -->
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 496 496" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path fill="#ffffff" d="m176 152-50.969-26.695L56 248h240l-69.031-122.695zm0 0" data-original="#57a4ff" opacity="1" class=""></path><path fill="#ffffff" d="M125.04 125.281 176 152l50.969-26.695L344 64V30.625C344 18.129 333.871 8 321.375 8H30.625C18.129 8 8 18.129 8 30.625V64l117.031 61.305zm0 0" data-original="#57a4ff" opacity="1" class=""></path><g fill="#004fac"><path d="M321.375 0H30.625C13.719.023.023 13.719 0 30.625v194.75C.023 242.281 13.719 255.977 30.625 256h290.75c16.906-.023 30.602-13.719 30.625-30.625V30.625C351.977 13.719 338.281.023 321.375 0zM30.625 16h290.75c8.074.008 14.617 6.55 14.625 14.625v28.574l-112.871 59.09h-.09l-.047.047L176 142.969l-46.992-24.57-.047-.047h-.09L16 59.199V30.625c.008-8.074 6.55-14.617 14.625-14.625zm141.664 143.09a8.013 8.013 0 0 0 7.422 0L223.809 136l58.52 104H69.671l58.52-104zM16 225.375V77.223l98.016 51.336L51.328 240H30.625c-8.074-.008-14.617-6.55-14.625-14.625zM321.375 240h-20.703l-62.688-111.441L336 77.223v148.152c-.008 8.074-6.55 14.617-14.625 14.625zM368 48h80a8 8 0 0 0 0-16h-80a8 8 0 0 0 0 16zM488 120H368a8 8 0 0 0 0 16h120a8 8 0 0 0 0-16zM416 208h-48a8 8 0 0 0 0 16h48a8 8 0 0 0 0-16zM464 208h-24a8 8 0 0 0 0 16h24a8 8 0 0 0 0-16zm0 0" fill="#292929" data-original="#004fac" class="" opacity="1"></path></g></g></svg>
                                                                </div>
                                                                <div class="ps-3 email_history">
                                                                    <h6 class="mb-0"><b><?=$contact_email->subject?></b></h6>
                                                                    <p class="mb-0"> To &nbsp; : <?=$contact_email->too?>
                                                                    <?=($contact_email->cc)?'<br>Cc &nbsp; : '.$contact_email->cc:'';?>
                                                                    <?=($contact_email->bcc)?'<br>Bcc : '.$contact_email->bcc:'';?>
                                                                 </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><?=date('m-d-Y',strtotime($contact_email->created_at))?></td>
                                                        <!-- <td><?=substr(strip_tags($contact_email->message),0,200)?></td> -->
                                                        <td><?php if($contact_email->source_by==1){ echo 'Custom Email';}elseif($contact_email->source_by==2){ echo 'MassEmail';}else{ echo 'System Genrated';}?></td>
                                                        <td><?=$contact_email->user_name.' ( '.$contact_email->role.' ) '?></td>
                                                        <td><?=$contact_email->sent_by_name?></td>
                                                        <td><?=$contact_email->sent_by_email?></td>
                                                        <td>Active</td>
                                                    </tr>  
                                                     <?php } } ?>
                                                     </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="drafts" class="tab-pane fade" role="tabpanel">   
                                        <div class="data-list table-responsive-lg">
                                            <table class="table" style="width:100%">
                                                <thead id="data-heading-show">
                                                  <tr>
                                                        <!-- <th><input type="checkbox" id="checkbox"></th> -->
                                                        <th>Subject & Mail To</th>
                                                        <th width="8%">Date</th>
                                                        <th>Source</th>
                                                        <th width="12%">Sent By</th>
                                                        <th width="15%">Sender Name</th>
                                                        <th width="10%">Sender Email</th>
                                                        <th width="10%">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="data-show">                                    
                                                <?php
                                                    if (count($email_list_draft) == 0) {
                                                        echo '<tr><td colspan="7" style="text-align: center;"><span>No records found</span></td></tr>';
                                                    } else {
                                                        $i = 1;
                                                        foreach ($email_list_draft as $email => $contact_email) {
                                                    ?>
                                                        <tr class="sendmailbtn" id="<?php echo $contact_email->id; ?>" data-status="2" data-bs-toggle="modal" data-bs-target="#myModal"  >
                                                            <!-- <td><button >dd</button></td> -->
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 496 496" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                                            <g>
                                                                                <path fill="#ffffff" d="m176 152-50.969-26.695L56 248h240l-69.031-122.695zm0 0" data-original="#57a4ff" opacity="1" class=""></path>
                                                                                <path fill="#ffffff" d="M125.04 125.281 176 152l50.969-26.695L344 64V30.625C344 18.129 333.871 8 321.375 8H30.625C18.129 8 8 18.129 8 30.625V64l117.031 61.305zm0 0" data-original="#57a4ff" opacity="1" class=""></path>
                                                                                <g fill="#004fac">
                                                                                    <path d="M321.375 0H30.625C13.719.023.023 13.719 0 30.625v194.75C.023 242.281 13.719 255.977 30.625 256h290.75c16.906-.023 30.602-13.719 30.625-30.625V30.625C351.977 13.719 338.281.023 321.375 0zM30.625 16h290.75c8.074.008 14.617 6.55 14.625 14.625v28.574l-112.871 59.09h-.09l-.047.047L176 142.969l-46.992-24.57-.047-.047h-.09L16 59.199V30.625c.008-8.074 6.55-14.617 14.625-14.625zm141.664 143.09a8.013 8.013 0 0 0 7.422 0L223.809 136l58.52 104H69.671l58.52-104zM16 225.375V77.223l98.016 51.336L51.328 240H30.625c-8.074-.008-14.617-6.55-14.625-14.625zM321.375 240h-20.703l-62.688-111.441L336 77.223v148.152c-.008 8.074-6.55 14.617-14.625 14.625zM368 48h80a8 8 0 0 0 0-16h-80a8 8 0 0 0 0 16zM488 120H368a8 8 0 0 0 0 16h120a8 8 0 0 0 0-16zM416 208h-48a8 8 0 0 0 0 16h48a8 8 0 0 0 0-16zM464 208h-24a8 8 0 0 0 0 16h24a8 8 0 0 0 0-16zm0 0" fill="#292929" data-original="#004fac" class="" opacity="1"></path>
                                                                                </g>
                                                                            </g>
                                                                        </svg>
                                                                    </div>
                                                                    <div class="ps-3 email_history">
                                                                        <h6 class="mb-0"><b><?= $contact_email->subject ?></b></h6>
                                                                        <p class="mb-0"> To &nbsp; : <?= $contact_email->too ?>
                                                                            <?= ($contact_email->cc) ? '<br>Cc &nbsp; : ' . $contact_email->cc : ''; ?>
                                                                            <?= ($contact_email->bcc) ? '<br>Bcc : ' . $contact_email->bcc : ''; ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td><?= date('m-d-Y', strtotime($contact_email->created_at)) ?> <br> <?= date('h:i:s A', strtotime($contact_email->created_at)) ?></td>
                                                            <td><?php if($contact_email->source_by==1){ echo 'Custom Email';}elseif($contact_email->source_by==2){ echo 'MassEmail';}else{ echo 'System Genrated';}?></td>
                                                            <td><?= $contact_email->user_name . '(' . $contact_email->role . ')' ?></td>
                                                            <td><?= $contact_email->sent_by_name ?></td>
                                                            <td><?= $contact_email->sent_by_email ?></td>
                                                            <td>Mail Draft</td>
                                                        </tr>
                                                    <?php }
                                                    } ?>                                  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- email-list-draft end-->
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</main>

<!-- Modal trash  -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Note</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center"> Are you sure you want to delete </p>
            </div>
            <div class="modal-footer justify-content-center">
                <p class="deleteIdSet_booking d-none"></p>
                <button type="button" class="btn btn-primary deleteNotes_booking" data-bs-dismiss="modal" aria-label="Close">Yes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit  -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Note</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer justify-content-end">
                <input type="hidden" id="update_note_id">
                <textarea class="form-control" id="update_note_message" style="height:100px;"></textarea>
                <input type="hidden" id="updated_date" value="<?= date("j F, Y, g:i a"); ?>">
                <button type="button" class="btn btn-primary EditNotes_booking" data-bs-dismiss="modal" aria-label="Close">Update</button>
            </div>
        </div>
    </div>
</div>
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
<!-- email detail  -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-size: 1rem !important;">Mail Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="mailDetailShow"></div>
        </div>
    </div>
</div>
<!-- script for mail -->
<!-- script for mail -->
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).on('click', '.sendmailbtn', function () {
        var mail_user = $(this).attr("id");
        var mail_status = $(this).attr("data-status");
        var mail_page = 'booking';
        var mail_module = '6';
        //alert('page for -' + mail_page + '<br> mail to user -' + mail_user + '<br> Module Type -' + mail_module)
        $.ajax({
            url: "<?php echo base_url(); ?>sendmail/getMail",
            method: "post",
            data: {
                mail_user: mail_user, mail_page: mail_page, mail_module:mail_module,mail_status: mail_status
            },
            success: function (data) {
                $('#mailFunction').html(data);
                //$('#myModal').modal("show");
            }
        });
    });
    $(document).on('click', '.email_detail', function() {
        let eMailId = $(this).attr("data-email");
        //alert('mail detail working -' + eMailId);
        $.ajax({
            url: "<?php echo base_url(); ?>sendmail/getmaildetail",
            method: "post",
            data: {
                email_unique: eMailId
            },
            success: function(data) {
                $('#mailDetailShow').html(data);
                $('#exampleModal3').modal("show");
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
    $(function () { 
            $("#booking_date").datepicker({  
                autoclose: true,  
                todayHighlight: true, 
            }).datepicker('update', new Date(<?=$booking_date?>)); 
        });
        $(document).ready(function(){
        $('input.timepicker').timepicker({
          timeFormat: 'h:mm p',
          //defaultTime: new Date(),
        //   interval: 30,
          // minTime: '10',
          // maxTime: '11:00pm',
           startTime: '10:00',
          dynamic: true,
          dropdown: true,
          scrollbar: false
        });
    });
</script>

<!-- script for mail -->