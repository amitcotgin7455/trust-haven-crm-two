<?php
$CI = &get_instance();
$CI->load->database();
$CI->load->model('Chat_model');
$AcitveUser = $CI->Chat_model->fetchUSer($user_detail->id);
$url = $_SERVER['REQUEST_URI'];
$exp = explode('/',$url);
$panel_status  = (in_array('sales',$exp)) ? 2 : 1;
?>
<style>
    .out-chat{
        word-wrap: break-word !important;
    }
    .chat-in{
        word-wrap: break-word !important;
    }
    #chatbot-btn-sec .icons p {
        text-align: center;
        font-size: 10px;
        color: #999999;
        margin-top: -4px;
        margin-bottom: 0;
    }
    #chatbot-btn-sec .icons:hover {
        color: #2385ef;
    }
    .chatbot__button {
        cursor: pointer;
    }
    .chatbot {
        position: fixed;
        bottom: 37px;
        left: 1px;
        width: 312px;
        background-color: #ffffff;
        border-radius: 10px 10px 0 0;
        box-shadow: 0 0 7px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
        overflow: hidden;
        /* pointer-events: none; */
        z-index: 9999;
    }
    .show-chatbot .chatbot {
        opacity: 1;
        pointer-events: auto;
        transform: scale(1);
    }
    .chatbot__header {
        height: 60px;
        align-items: center;
        z-index: 22222;
        padding: 0 12px;
        position: relative;
        display: flex;
        flex-grow: 0;
        flex-shrink: 0;
        cursor: move;
        border-bottom: solid 1px #eaeaea;
    }
    .chatbot__search {
        border-bottom: solid 1px #eaeaea;
    }
    .search_contacts {
        width: 100%;
    }
    .search_box input {
        /* border: none; */
        padding: 9px 0 0 34px;
        font-size: 14px;
        border-radius: 50px
    }
    .search_filter::placeholder{
        
        padding:15px 10px;
    }
    .search_filter svg {
        padding-left: 5px;
    }
    
    .search_box svg {
        position: absolute;
        left: 11px !important;
        top: 11px;
        color: #424958 !important;
    }
    .chatbot__header div.close-btns-chat {
        position: absolute;
        top: 50%;
        right: 11px;
        color: #202020;
        transform: translateY(-83%);
        cursor: pointer;
    }
    .ths-user {
        width: 35px;
        height: 35px;
        line-height: 35px;
        border: 1px solid #fff;
        border-radius: 50%;
        display: block;
        margin-right: 14px;
        background: #c5c5c5;
        color: #fff;
        padding-left: 10px;
    }
    .ths-user span.badge.bg-success {
        position: absolute;
        top: 56%;
        left: 12.5%;
        width: 3px;
        height: 3px;
        line-height: 3px;
        padding: 4px;
    }
    .ths-user span.badge.bg-danger {
        position: absolute;
        top: 56%;
        left: 12.5%;
        width: 3px;
        height: 3px;
        line-height: 3px;
        padding: 4px;
    }
    .ths-user span.badge.bg-warning {
        position: absolute;
        top: 56%;
        left: 12.5%;
        width: 3px;
        height: 3px;
        line-height: 3px;
        padding: 4px;
    }
    .chatbox__title {
        font-size: 14px;
        color: #7f7f7f;
        font-weight: 700;
        font-family: 'Open Sans', sans-serif;
    }
    .userstatus {
        position: absolute;
        top: 54%;
        left: 62px;
        color: #999;
        display: inline-block;
        font-size: 12px;
        cursor: pointer;
        font-family: 'Open Sans', sans-serif;
    }
    .chat-section {
        height: 460px;
        overflow-y: auto;
        display: flex;
        flex-direction: column-reverse;
        padding: 0px 12px 66px 12px;
    }
    .chatbot__chat {
        display: flex;
        flex-wrap: wrap;
    }
    .chat-name {
        padding-left: 8px;
        padding-top: 3px;
        font-size: 13px;
        color: #666;
        position: relative;
    }
    <?php
        if ($panel_status==1) {
        // tech panel
    ?>
        .chatbot__chat .chat-in {
            max-width: 71%;
            color: #202020;
            background: #f8f8f8;
            border-radius: 10px;
            padding: 7px 10px 0px;
            margin: 34px 0px 0px -36px;
        }
    <?php
    } else if($panel_status==2) {
    // sales panel
    ?>
        .chatbot__chat .chat-in {
            max-width: 71%;
            color: #202020;
            background: #f8f8f8;
            border-radius: 10px;
            padding: 7px 10px 0px;
            margin: 34px 0px 0px -80px;
        }
    <?php } ?>
    .incoming .chat-in p {
        color: #313949;
        line-height: 18px;
        font-size: 13px;
        font-weight: 500;
        font-family: 'Open Sans', sans-serif;
        margin-bottom: 8px !important;
    }
    .chat-in p img {
        width: 140px;
        height: 140px;
        object-fit: contain;
    }
    .chatbot__chat p.error {
        color: #721c24;
        background: #f8d7da;
    }
    .out-chat {
        max-width: 75%;
        font-size: 0.95rem;
        color: #313949;
        background-color: #f8f8f8;
        border-radius: 10px;
        padding: 8px 10px;
    }
    .incoming span.material-symbols-outlined {
        align-self: self-start;
        margin: 0 7px 7px 0;
        top: 19%;
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
    }
    .incoming span .icons-s {
        width: 25px;
        height: 25px;
        line-height: 25px;
        color: #fff;
        padding: 0px 0 0 7px;
        border-radius: 50%;
        margin-top: 11px;
        background: #585858;
    }
    .material-symbols-inline {
        position: absolute;
        top: -26px;
    }
    .chat-names {
        font-size: 13px;
        color: #666;
        position: relative;
    }
    .out-chat p {
        color: #313949;
        line-height: 18px;
        font-size: 13px;
        font-weight: 500;
        font-family: 'Open Sans', sans-serif;
        margin-bottom: 1px !important;
    }
    .outgoing {
        justify-content: flex-end;
        margin: 45px 0;
        position: relative;
    }
    .incoming {
        margin: 10px 0;
    }
    .date-time-sec {
        margin-left: 33px;
        max-width: 71%;
        color: #a9a9a9;
        width: 100%;
        margin-top: 3px;
    }
    .date-time-sec span {
        font-size: 9px;
        font-family: 'Open Sans', sans-serif;
    }
    .date-time-secs {
        margin-left: 41px;
        padding-left: 114px;
        width: 80%;
    }
    .date-time-secs span {
        font-size: 9px;
        color: #a9a9a9;
        font-family: 'Open Sans', sans-serif;
    }
    .chatbot__input-box {
        position: absolute;
        bottom: 0;
        width: 100%;
        display: flex;
        gap: 5px;
        align-items: center;
        background: #fff;
        border-top: 1px solid #ddd;
    }
    .chatbot__input-box textarea.form-control {
        border: none;
        outline: none;
        resize: none;
        background: transparent;
        overflow-y: hidden;
        color: #5a5a5a;
        font-size: 13px;
        padding: 8px 0 0 10px;
        font-weight: 500;
        font-family: 'Open Sans', sans-serif;
    }
    .chatbot__input-box .input-group-prepend {
        background: #f6f6f6;
        padding: 12px;
    }
    .chatbot__textarea::placeholder {
        font-family: 'Open Sans', sans-serif;
    }
    .chatbot__input-box span.input-group-texts {
        cursor: pointer;
        border: none;
        padding: 10px 5px;
    }
    .chatbot__input-box span {
        color: #202020;
        cursor: pointer;
    }
    @media (max-width: 490px) {
        .chatbot {
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            border-radius: 0;
        }
        .chatbot__box {
            height: 90%;
        }
        .chatbot__header span {
            display: inline;
        }
        .chatbot__header span {
            display: inline;
        }
    }
    /*=============|contact chatbot|=============*/
    .chatbot__buttons {
        cursor: pointer;
    }
    .chatbots {
        position: fixed;
        bottom: 37px;
        left: 1px;
        width: 312px;
        background-color: #ffffff;
        border-radius: 10px 10px 0 0;
        box-shadow: 0 0 7px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
        overflow: hidden;
        /* pointer-events: none; */
        z-index: 9999;
    }
    .show-chatbots .chatbots {
        opacity: 1;
        pointer-events: auto;
        transform: scale(1);
    }
    .chatbot__headers {
        height: 60px;
        align-items: center;
        z-index: 22222;
        padding: 0 12px;
        position: relative;
        display: flex;
        flex-grow: 0;
        flex-shrink: 0;
        cursor: move;
        border-bottom: solid 1px #eaeaea;
    }
    .chatbot__searchs {
        border-bottom: solid 1px #eaeaea;
    }
    .search_contactss {
        width: 100%;
    }
    .search_boxs input {
        border: none;
        padding: 9px 0 0 34px;
        font-size: 14px;
    }
    .search_boxs svg {
        position: absolute;
        left: 11px !important;
        top: 11px;
        color: #424958 !important;
    }
    .chatbot__headers div.close-btns-chats {
        position: absolute;
        top: 50%;
        right: 11px;
        color: #202020;
        transform: translateY(-83%);
        cursor: pointer;
    }
    .ths-users {
        width: 35px;
        height: 35px;
        line-height: 35px;
        border: 1px solid #fff;
        border-radius: 50%;
        display: block;
        margin-right: 14px;
        background: #c5c5c5;
        color: #fff;
        padding-left: 10px;
    }
    .ths-users span.badge.bg-success {
        position: absolute;
        top: 56%;
        left: 12.5%;
        width: 3px;
        height: 3px;
        line-height: 3px;
        padding: 4px;
    }
    .chatbox__titles {
        font-size: 14px;
        color: #7f7f7f;
        font-weight: 700;
        font-family: 'Open Sans', sans-serif;
    }
    .userstatuss {
        position: absolute;
        top: 54%;
        left: 62px;
        color: #999;
        display: inline-block;
        font-size: 12px;
        cursor: pointer;
        font-family: 'Open Sans', sans-serif;
    }
    .chat-sections {
        height: 460px;
        overflow-y: auto;
        padding: 0px 12px 66px 12px;
    }
    .chatbot__chats {
        display: flex;
        flex-wrap: wrap;
    }
    .chat-names {
        padding-left: 8px;
        padding-top: 3px;
        font-size: 13px;
        color: #666;
        position: relative;
    }
    .chatbot__chats .chat-ins {
        max-width: 100%;
        width: 100%;
        color: #202020;
        border-radius: 10px;
        padding: 8px 10px 0px;
        margin: -24px 0px 0px 26px;
    }
    .incomings .chat-ins p {
        color: #313949;
        line-height: 18px;
        font-size: 11px;
        font-weight: 500;
        font-family: 'Open Sans', sans-serif;
    }
    .chatbot__chat p.error {
        color: #721c24;
        background: #f8d7da;
    }
    .out-chats {
        max-width: 75%;
        font-size: 0.95rem;
        color: #313949;
        background-color: #f8f8f8;
        border-radius: 10px;
        padding: 8px 10px;
    }
    .incomings span.material-symbols-outlineds {
        align-self: self-start;
        margin: 0 7px 7px 0;
        top: 19%;
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
    }
    .incomings span.material-symbols-outlineds span i img {
        width: 14px !important;
    }
    .incomings span .icons-ss {
        width: 25px;
        height: 25px;
        line-height: 25px;
        color: #fff;
        padding: 0px 0 0 7px;
        border-radius: 50%;
        margin-top: 11px;
        background: #585858;
    }
    .material-symbols-inlines {
        position: absolute;
        top: -26px;
    }
    .chat-namess {
        padding-left: 0px;
        padding-top: 0px;
        margin-left: -6px;
        font-size: 13px;
        color: #666;
        position: relative;
    }
    .out-chats p {
        color: #313949;
        line-height: 18px;
        font-size: 13px;
        font-weight: 500;
        font-family: 'Open Sans', sans-serif;
    }
    .outgoings {
        justify-content: flex-end;
        margin: 45px 0;
        position: relative;
    }
    .incomings {
        margin: 10px 0;
    }
    .dates-time-sec {
        margin-left: 227px;
        max-width: 100%;
        color: #a9a9a9;
        margin-top: -62px;
    }
    .dates-time-sec span {
        font-size: 9px;
        font-family: 'Open Sans', sans-serif;
    }
    .search_boxs i {
        position: absolute;
        left: 11px !important;
        top: 11px;
        color: #424958 !important;
    }
    .incomings {
        margin: 10px 0 0px;
        border-bottom: 1px solid #f5f5f5;
    }
    .dates-time-secs {
        margin-left: 41px;
        padding-left: 91px;
        width: 75%;
    }
    .dates-time-secs span {
        font-size: 11px;
        color: #a9a9a9;
        font-family: 'Open Sans', sans-serif;
    }
    .chatbot__input-boxs {
        position: absolute;
        bottom: 0;
        width: 100%;
        display: flex;
        gap: 5px;
        align-items: center;
        background: #fff;
        border-top: 1px solid #ddd;
    }
    .chatbot__input-boxs textarea.form-control {
        border: none;
        outline: none;
        resize: none;
        background: transparent;
        overflow-y: hidden;
        color: #5a5a5a;
        font-size: 13px;
        padding: 8px 0 0 10px;
        font-weight: 500;
        font-family: 'Open Sans', sans-serif;
    }
    .chatbot__input-boxs .input-group-prepend {
        background: #f6f6f6;
        padding: 12px;
    }
    .chatbot__textareas::placeholder {
        font-family: 'Open Sans', sans-serif;
    }
    .chatbot__input-boxs span.input-group-texts {
        cursor: pointer;
        border: none;
        padding: 10px 5px;
    }
    .chatbot__input-boxs span {
        color: #202020;
        cursor: pointer;
    }
    @media (max-width: 490px) {
        .chatbots {
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            border-radius: 0;
        }
        .chatbot__boxs {
            height: 90%;
        }
        .chatbot__headers span {
            display: inline;
        }
        .chatbot__headers span {
            display: inline;
        }
    }
    .chatbot .dropdown .dropdown-toggle::after {
        display: none;
    }
    .chatbot .dropdown .dropdown-item {
        padding: 4px 15px;
        font-size: 12px;
        color: #313949;
    }
    .chatbot .dropdown-menu {
        border-radius: 10px;
        box-shadow: 0px 0px 6px 0px #a5a5a5e6;
    }
    .chatbot .incoming .dropdown {
        margin-top: 23px;
    }
    .chatbot .outgoing .dropdown {
        margin-top: -10px;
    }
    .material-symbols-outlineds i {
        position: relative;
        top: 10px;
        left: -8px;
    }
    .chatbot__chat.outgoing .btn-check:checked + .btn, .chatbot__chat.outgoing .btn.active, .chatbot__chat.outgoing .btn.show, .chatbot__chat.outgoing .btn:first-child:active, .chatbot__chat.outgoing :not(.btn-check) + .btn:active{
        border-color: transparent !important;    
        border: none;
        outline: none;
    }
    .chatbot__chat.incoming .btn-check:checked + .btn, .chatbot__chat.incoming .btn.active, .chatbot__chat.incoming .btn.show, .chatbot__chat.incoming .btn:first-child:active, .chatbot__chat.incoming :not(.btn-check) + .btn:active{
        border-color: transparent !important;    
        border: none;
        outline: none;
    }
    button.btn.dropdown-toggle svg {
        color: #878787;
    }
    button.btn.dropdown-toggle i {
        color: #878787;
    }
    .chat-in p img {
        max-width: 140px;
        width: 100%;
        max-height: 140px;
        height: auto;
        object-fit: contain;
        text-align: center;
        margin: auto;
    }
        .out-chat p img {
        max-width: 140px;
        width: 100%;
        max-height: 140px;
        height: auto;
        object-fit: contain;
        text-align: center;
        margin: auto;
    }
    div#msg{
        background: red;
        font-size: 10px;
        color: #fff;
        padding: 10px 10px 23px;
        /* max-width: 94%; */
        margin-bottom: 16px;
    }
    #cke_1_bottom{
        display: none !important;
    }
    #cke_70_bottom{
    display: none !important;
    }
    .email_history
    {
        width     : 320px;
        max-width : 350px;
    }
    
</style>
<div class="chatbot d-none">
    <div id="chatbox"></div>
</div>
<!-- ebnd chat list -->
<!-- contact list -->
<div class="chatbots d-none">
    <div class="chatbot__headers">
        <span class="ths-users"><?= ucfirst(substr($AcitveUser[0]->name, 0, 1)) ?><span class="badge bg-success">.</span> </span>
        <h3 class="chatbox__titles"><?= $AcitveUser[0]->name; ?></h3>
        <div class="userstatuss">Online</div>
        <div class="close-btns-chats">
            <i class="fa fa-minus" aria-hidden="true" style="color: #7f7f7f !important;"></i>
        </div>
    </div>
    <div class="chatbot__searchs">
        <div class="search_boxs position-relative">
            <input class="form-control mb-2 search_contactss" type="search" id="myInput" name="gsearch" placeholder="Search Contact User">
            <i class="search_icon fa-solid fa-magnifying-glass" placeholder="Search" style="color: #7f7f7f !important;"></i>
        </div>
    </div>
    <div class="chat-sections">
        <ul class="chatbot__boxs ps-0">
            <div id="chatContactlist"></div>
        </ul>
    </div>
    <input type="hidden" value="<?php echo $user_detail->id;  ?>" id="logged_user">
    <input type="hidden" id="receiver_id">
</div>
<!-- ebnd contact list -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script>
    get_user_activity();
    setInterval(get_user_activity,10000000000000000);
    // schedule_mail();
    // setInterval(schedule_mail,1000);
    // setInterval(schedule_mail,60000);
    //get all user except me
    $(document).on('click', '.chatbot__buttons', function() {
        $(".chatbots").removeClass('d-none');
        $(".chatbot").addClass('d-none');
        let logged_id = $("#logged_user").val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>Chat/fetchchatUser',
            data: {
                user_id: logged_id
            },
            success: function(data) {
                $("#chatContactlist").html(data);
            }
        });
    });
    //get chat
    function userchatBox(receiver_id) {
        let sender_id = $("#logged_user").val();
        $.ajax({
            url: '<?php echo base_url() ?>Chat/getChatbox',
            type: 'POST',
            data: {
                receiver_id: receiver_id,
                sender_id: sender_id
            },
            success: function(data) {
                $(".chatbots").addClass('d-none');
                $(".chatbot").removeClass('d-none');
                $('#chatbox').html(data);
                $('#receiver_id').val(receiver_id);
                sendUserUniqIDForMsg(receiver_id, sender_id);
            }
        });
    }
    //sending unique_id which is clicked for messages
    function sendUserUniqIDForMsg(receiver, sender) {
        $.post('<?php echo base_url() ?>Chat/getmessage', {
            sender: sender,
            receiver: receiver
        }, function(data) {
            setMessageToChatArea(data);
             getTypingStatus(sender,receiver);
        });
    }
    //show if chat available or not conditional message
    function setMessageToChatArea(data) {
        var res_data;
        if (data.length > 5) {
            $('#chat_message_area').html(data);
        } else {
            var profileName = $('#avatarname').html();
            $.ajax({
                url: '<?php echo base_url() ?>Chat/getNoMessage',
                type: 'post',
                async: false,
                data: {
                    name: profileName
                },
                success: function(data) {
                    res_data = data;
                }
            });
            $('#chat_message_area').html(res_data);
        }
    }
    //textearea
    $(document).on('input', '.chatbot__textarea', function() {
        var textareaValue = $(this).val().trim();
        if (textareaValue !== "") {
            $("#send-btn").css("display", "inline");
        } else {
            $("#send-btn").css("display", "none");
        }
    });
    //insert message
    // $(document).on('keyup', '#chatbot_textarea', function(e) {
    //     if(e.keyCode == 13) {
    //         $('#send-btn').click();
    //     }
    // });   
    $(document).on('keyup', '#chatbot_textarea', function(e) {
        if (e.keyCode == 13 && !e.shiftKey) {
            if ($('#send-btn').is(':visible')) {
                $('#send-btn').click(); 
            }
        }
    });
    $(document).on('click', '#send-btn', function() {
        let chatmessage = $('.chatbot__textarea').val();
        let receiver_id = $('#receiver_id').val();
        let sender_id = $("#logged_user").val();
        if (chatmessage != '') {
            let data = {
                message: chatmessage,
                senderID: sender_id,
                receiverID: receiver_id
            };
            var jsonData = JSON.stringify(data);
            //console.log('message => [' + chatmessage + '] /n to receive => ' + getreceiveId + '/n to sender => ' + logged_id + jsonData);
            $.post('<?php echo base_url() ?>Chat/sendmessage', {
                data: jsonData
            }, function(data) {
                $('.chatbot__textarea').val('');
                $("#send-btn").css("display", "none");
                sendUserUniqIDForMsg(receiver_id, sender_id);
            });
        }
    });
    //insert 
    $(document).on('change', '#input-file', function() {
        var fileInput = $(this)[0];
        if (fileInput.files && fileInput.files[0]) {
            var formData = new FormData();
            formData.append('attachment', fileInput.files[0]);
            formData.append('sender_id', $(this).data('sender'));
            formData.append('receiver_id', $(this).data('receiver'));
            $.ajax({
                url: '<?php echo base_url() ?>Chat/sendattachment',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    $('#msg').show();
                    $('#msg').html(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(errorThrown);
                }
            });
        }
        $('#msg').delay(3000).fadeOut();
    });
    // AUTO SCROLL AND SCROLL TO BOTTTOM AND GET
    let intervalId;
    $(document).on('mouseenter', '#chat_message_area', function() {
        //console.log('yes im inside the div of chatbox');
        stopInterval();
    });
    $(document).on('mouseleave', '#chat_message_area', function() {
        //console.log('im outside of the div of chatbox');
        startInterval();
    });
    startInterval();
    function startInterval() {
        intervalId = setInterval(function () {
            let receiver_id = $('#receiver_id').val();
            let sender_id = $("#logged_user").val();
            sendUserUniqIDForMsg(receiver_id, sender_id);
        }, 500);
    }
    function stopInterval() {
        clearInterval(intervalId);
    }
    //delete message
    $(document).on('click', '.delete_message', function() {
        var messageId = $(this).attr("id");
        var sender_id = $("#logged_user").val();
        var receiver_id = $('#receiver_id').val();
        $.ajax({
            url: "<?php echo base_url() ?>Chat/delete_message",
            type: "POST",
            data: { id: messageId,sender_id:sender_id},
            success: function(response) {
                console.log(response);
                sendUserUniqIDForMsg(receiver_id, sender_id);
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
    //close
    $(document).on('click', '.close-btns-chats', function() { 
        $(".chatbots").addClass('d-none');
    });
    $(document).on('click', '.close-btns-chat', function() { 
        $(".chatbot").addClass('d-none');
    });
    //Get User Activity
    function get_user_activity() {
        $.ajax({
            url: '<?php echo base_url()?>Chat_pusher/get_user_activity',
            type: 'post',
            success: function (data) {
                if(data==1)
                {
                    window.location.href = "<?=base_url()?>logout"; //Will take you to Google.
                }
                
            }
        });
    }
    //Schedule Mail Send
    function schedule_mail() {
        $.ajax({
            url: '<?php echo base_url()?>sales/MassEmail/schedule_mail',
            type: 'post',
            success: function (data) {
                
            }
        });
    }
</script>
<script>
    var isTyping = 0;
    $(document).on('input', '.chatbot__textarea', function() {
        let receiver_id = $('#receiver_id').val();
        let sender_id = $("#logged_user").val();
        if ($(this).val().trim() !== "") {
            if (!isTyping) {
                isTyping = 1;
                sendTypingStatus(isTyping,sender_id,receiver_id);
                console.log("User started typing");
            }
        } else {
            if (isTyping) {
                isTyping = 0;
                sendTypingStatus(isTyping,sender_id,receiver_id);
                console.log("User stop typing");
            }
        }
    });
    function sendTypingStatus(isTyping,sender_id,receiver_id) {
        $.ajax({
            url: "<?php echo site_url('Chat/send_typing_status'); ?>",
            type: "POST",
            data: { sender: sender_id, receiver: receiver_id, status: isTyping},
            success: function(response) {
                // typingTimeout = setTimeout(function() {
                //     $("#typing_indicator").text(response);
                // }, 2000);
            }
        });
    }
    function getTypingStatus(sender_id,receiver_id) {
        $.ajax({
            url: "<?php echo site_url('Chat/get_typing_status'); ?>",
            type: "POST",
            data: { sender: sender_id, receiver: receiver_id},
            success: function(response) {
                typingTimeout = setTimeout(function() {
                    $("#typing_indicator").text(response);
                }, 1000);
            }
        });
    }
    //setInterval(getTypingStatus, 1000);
</script>