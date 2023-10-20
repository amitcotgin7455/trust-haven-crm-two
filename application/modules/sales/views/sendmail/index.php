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
        background: #0a3161;
        color: #fff;
    }
    .edit_side_bar_filter li a{
       
        color: #fff;
    }

    .edit_side_bar_filter li:hover {
        border: 1px solid #0a3161;
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
        border-color: transparent;
        cursor: pointer;
        z-index: 1;
        position: relative;
        background: transparent;
        Color: #313949;
        font-weight: 400 !important;
        font-size: 15px
    }

    .editlead .form-control div {
        Color: #313949;
        font-weight: 400 !important;
        font-size: 15px
    }

    .editlead p {
        Color: #313949;
        font-weight: 400 !important;
        font-size: 15px
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
        border-color: #aaa6a6;
    }

    .editlead .form-control:focus {
        border-color: #C0C6CC;
        box-shadow: 0px 0px 5px 0px #C0C6CC;
        width: 300px;
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

    .check-input-check .fa-check {
        color: #fff;
    }

    .check-input-check {
        background: #b41e45;
    }

    .editlead input {
        width: 300px;
        padding-right: 20px;
    }

    span.down-select {
        position: absolute;
        right: 32px;
        top: 6px;
    }

    .detail-body .accordion-body {
        padding: 10px 25px;
    }

    .detail-box label {
        width: 130px;
        font-weight: 500;
        Color: #616E88;
        text-align: end;
        line-height: 23px;
        font-size: 15px;
    }

    .date-time-day {
        font-size: 14px;
    }

    .editlead .textarea-style:focus {
        width: auto;
        height: 150px;
    }

    .editlead .textarea-style {
        border: var(--bs-border-width) solid var(--bs-border-color);
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
      
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .user-name p {
        margin: 0;
        color: #fff;
        
    }
    /* p.lead-notes a {
        font-weight: 500;
    color: #2196F3;
    font-size: 14px;
} */
 
    .user-notes-detail p {
        margin-bottom: 0px;
    Color: #4e5f81;
    font-weight: 600 !important;
    font-size: 13px;
    font-family: 'Open Sans', sans-serif;

}
    p.lead-notes a:hover {
        color: #8d8c8c !important;
    }

    p.lead-notes svg {
        color: #0a3161;
        width: 13px;
        height: 13px;
    }

    .user-notes:hover {
        display: block;
    }

    .add-trash-btn {
        /* display: none; */
        visibility: hidden;
    }

    .user-notes-detail:hover .add-trash-btn {
        /* display: block; */
        visibility: visible;

    }

    .user-notes-detail {
        width: 43%;
    }

    .detail-body h4,
    .owner-detail h4 {
        Color: #313949;
        font-size: 20px;
        font-family: "Inter", sans-serif !important;
        font-weight: 600;
    }

    /* #myModal {
        height: 97vh
    } */

    #myModal .modal-fullscreen {
        width: 68vw;
        max-width: none;
        height: 96.5vh;
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

    .btn.btn-primary, .btn.btn_save {
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
    .btn-notes-minus{
        margin-top: -3rem !important;
        /* margin-right: 1rem; */
        border-top: 1px solid #D2D9E0;
        padding: 5px 10px;
        /* z-index: 1; */
        z-index: 99999999;
    position: relative;
    }
    .v1 {
        color: #0070c9;
        background-color: #f5f5f5;
        border: 1px solid transparent;
        font-weight: 600;
        margin: 0 0 9px;
        overflow-y: hidden;
        padding: 6px 4px 4px 8px;
        font-size: 12px;
        max-width: 448px;
    }
    .cke_chrome {
        border: 1px solid #ffffff !important;
    }
    .cke_bottom {
        padding: 6px 8px 2px;
        position: relative;
        border-top: 1px solid #ffffff;
        background: #ffffff;
    }
    .ck-editor__editable_inline {
    min-height: 400px;
}
</style>
<!-- Modal body -->
<?php  $data = array('onsubmit' => 'return valid_sendmail()');?>
<?php echo form_open_multipart('sales/Sendmail/sendmail',$data); ?>
<div class="modal-body p-0" style="height: 810px;">
    <div class="container-fluid btm-border">
        <div class="row py-2">
            <div class="col-7">
                <div class="sender-email">
                    <img src="<?php echo base_url(); ?>assets/images/user-thumbnail.png" alt="" class="rounded-circle" style="width:31px">
                    <span><?php echo $activeSender[0]->sender_name; ?> &lt; <?php echo $activeSender[0]->sender_email; ?> &gt; </span>
                    <input type="email" name="senderemail" id="senderemail" value="<?php echo $activeSender[0]->sender_email; ?>" hidden>
                </div>
            </div>
            <!-- Send template -->
            <div class="col-5">
                <div class="btn-group dropdown float-end add-tamplate">
                    <button type="button" class="btn btn-secondary" id="templateForm">Insert Tamplate</button>
                    <div class="form-popup" id="templatescreen">
                        <div class="form-container">
                            <div class="row mb-4">
                                <div class="col-8">
                                    <h5>Select Template</h5>
                                </div>
                                <div class="col-4">
                                    <button type="button" class="btn cancel" id="closeTemplate">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="16" height="16" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <g data-name="02 User">
                                                    <path d="M25 512a25 25 0 0 1-17.68-42.68l462-462a25 25 0 0 1 35.36 35.36l-462 462A24.93 24.93 0 0 1 25 512z" fill="#000000" data-original="#000000" opacity="1" class=""></path>
                                                    <path d="M487 512a24.93 24.93 0 0 1-17.68-7.32l-462-462A25 25 0 0 1 42.68 7.32l462 462A25 25 0 0 1 487 512z" fill="#000000" data-original="#000000" opacity="1" class=""></path>
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <select name="tamplates" id="tamplates" class="form-control">
                                        <option value="1">All Tamplates</option>
                                        <option value="1">All Tamplates</option>
                                        <option value="1">All Tamplates</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <input type="text" name="search" placeholder="Search Tamplates" class="form-control">
                                </div>
                                <span class="py-5">No email templates in this folder</span>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li class="defaulttemplate" data-id="cancellation">Cancellation Mail</li>
                        <li class="defaulttemplate" data-id="followup">Followup Mail</li>
                        <li class="defaulttemplate" data-id="scheduled">Scheduled Maintenance</li>
                    </ul>
                </div>
            </div>
            <!-- Send template -->
        </div>
    </div>
    <div class="container-fluid btm-border">
        <div class="row pt-2">
            <div class="col-8">
                <div class="send-to-id">
                    <span class="to">To</span>
                    <ul>
                        <li>
                            <span>
                                <?php if (!empty($user_detail[0]->name)) {
                                    echo $user_detail[0]->name;
                                } ?>
                                <?php if (!empty($user_detail[0]->last_name)) {
                                    echo $user_detail[0]->last_name;
                                } ?>
                                <?php if (!empty($user_detail[0]->email)) {
                                    echo '&lt;' . $user_detail[0]->email . '&gt';
                                } ?>
                            </span>
                        </li>
                    </ul>
                    <input type="email" name="toemail" value="<?php echo $user_detail[0]->email; ?>" hidden>
                </div>
            </div>
            <div class="col-4">
                <div class="ceCcbcc text-end">
                    <span id="emailCc" class="cP odr1">Cc</span>
                    <span id="emailBcc" class="cP">Bcc</span>
                </div>
            </div>
        </div>
        <!--BCC AND CSS-->
        <!-- Cc -->
        <div class="row py-2 btm-border" id="thcemailCc" style="display: none;">
            <div class="col-8">
                <div class="send-to-id input-add">
                    <span class="to">Cc</span>
                    <input type="text" class="form-control" name="emailtocc">
                </div>
            </div>
            <div class="col-4">
                <div id="closemailCc" class="ceCcbcc text-end">
                    <span class="cP odr1">X</span>
                </div>
            </div>
        </div>
        <!-- BCC -->
        <div class="row py-2 btm-border" id="thcemailBcc" style="display: none;">
            <div class="col-8">
                <div class="send-to-id input-add">
                    <span class="to">Bcc</span>
                    <input type="text" class="form-control" name="emailtobcc">
                </div>
            </div>
            <div class="col-4">
                <div id="closemailBcc" class="ceCcbcc text-end">
                    <span class="cP odr1">X</span>
                </div>
            </div>
        </div>
        <!--BCC AND CSS-->
    </div>
    <div class="container-fluid btm-border">
        <div class="row py-2">
            <div class="col-8">
                <div class="send-to-sub">
                    <input type="text" class="form-control subject" placeholder="Subject"  name="emailsubject">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid btm-border">
        <div class="row py-2">
            <div class="col-12">
                <div class="send-to-sub">
                    <textarea name="emailmessage" id="editor" class="message-container" rows="8"></textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="v1" id="imageContainer" style="display: none;"></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal footer -->
<div class="modal-footer">
    <div class="email-footer">
        <div class="attach-email">
            <div class="dropup" data-bs-toggle="tooltip" data-bs-placement="left" title="Attach Files">
                <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                        <g>
                            <path d="M6.739 21.95a5.749 5.749 0 0 1-4.065-9.816l8.485-8.486a.75.75 0 1 1 1.061 1.061l-8.486 8.485A4.25 4.25 0 1 0 9.745 19.2l10.96-10.96a2.751 2.751 0 0 0-3.89-3.89l-8.838 8.844a1.25 1.25 0 1 0 1.768 1.768L15.4 9.306a.75.75 0 1 1 1.061 1.06l-5.656 5.657a2.75 2.75 0 0 1-3.89-3.889l8.84-8.834a4.25 4.25 0 1 1 6.011 6.01l-10.96 10.956a5.715 5.715 0 0 1-4.067 1.684z" data-name="Layer 2" fill="#ffffff" data-original="#000000" class="" opacity="1"></path>
                        </g>
                    </svg>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <label class="dropdown-item">
                            <input type="file" style="display: none;" id="attachment">
                            <a><span style="padding-right:10px"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="16" height="16" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                        <g>
                                            <path d="M27 3H5C3.346 3 2 4.346 2 6v15c0 1.654 1.346 3 3 3h10v3h-5a1 1 0 1 0 0 2h12a1 1 0 1 0 0-2h-5v-3h10c1.654 0 3-1.346 3-3V6c0-1.654-1.346-3-3-3zm1 18c0 .551-.448 1-1 1H5c-.552 0-1-.449-1-1V6c0-.551.448-1 1-1h22c.552 0 1 .449 1 1z" fill="#000000" data-original="#000000"></path>
                                        </g>
                                    </svg></span>
                                Desktop</a>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="btn-send">
            <input type="hidden" name="lead_id" id="lead_id" value="<?php echo $user_detail[0]->lead_id ?>" >
            <input type="hidden" name="sender_id" id="lead_id" value="<?php echo $activeSender[0]->id ?>" >
            <input type="hidden" name="user_id" id="lead_id" value="<?php echo $user_detail[0]->user_id ?>" >
            <input type="text" name="module_name" value="<?php echo $mailModule; ?>" hidden>
            <input type="text" id="imgValue" name="attachment" value="" hidden>
            <button type="submit" name="sendemail" class="btn btn_save">Send</button>
        </div>
    </div>
</div>
</form>
<script>
    //btn
    //Templates:
    $('#templateForm').click(function(e) {
        $('#templatescreen').css('display', 'block');
    })

    $('#closeTemplate').click(function(e) {
        $('#templatescreen').css('display', 'none');
    })
    // for Cc
    $('#emailCc').click(function(e) {
        $('#thcemailCc').show();
        //$('#thcemailCc').slideDown();
        $('#emailCc').hide();
    })
    $('#closemailCc').click(function(e) {
        $('#thcemailCc').hide();
        $('#emailCc').show();
    })
    //for Bcc
    $('#emailBcc').click(function(e) {
        $('#thcemailBcc').slideDown('');
        $('#emailBcc').hide();
    })
    $('#closemailBcc').click(function(e) {
        $('#thcemailBcc').hide();
        $('#emailBcc').show();
    })
    // ATTACHMENTS // 
    $('#attachment').on('change', function() {
        var fileInput = $(this)[0];
        if (fileInput.files && fileInput.files[0]) {
            var formData = new FormData();
            formData.append('file', fileInput.files[0]);
            // console.log(fileInput.files[0]);
            $.ajax({
                url: '<?php echo base_url('sales/sendmail/mail_attachment') ?>',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#imageContainer').show();
                    var imageimg = response.image_name;
                    var imagemsg = response.message;
                    $('#imgValue').val(imageimg);
                    $('#imageContainer').html(imageimg);
                    $('#msgname').html(imagemsg);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(errorThrown);
                }
            });
        }
    });
    // Default Mail Template //
    var ckEditorInstance;
    CKEDITOR.replace('editor', {
        on: {
            instanceReady: function(event) {
                ckEditorInstance = event.editor;
            }
        }
    });
    CKEDITOR.config.width="100%";
    CKEDITOR.config.height="500px";
    CKEDITOR.config.resize_enabled = false;
    $(document).on('click', '.defaulttemplate', function() {
        ckEditorInstance.setData('');
        var mailTemplate = $(this).data('id');
        var leadID = $('#lead_id').val();
        $.ajax({
            url: "<?php echo base_url() ?>sales/sendmail/default_template",
            type: "POST",
            data: {
                mail_template: mailTemplate,
                lead_id: leadID
            },
                success: function(response) {
                    console.log(response);
                    if (ckEditorInstance) {
                        ckEditorInstance.insertHtml(response);
                    }
                },
            error: function(error) {
                console.error(error);
            }
        });
    });

    function valid_sendmail(){
        var subject = $(".subject").val();
        if(subject==''){
            alert('Please Fill Subject');
            return false;
        }else{
            return true;
        }

    }
</script>