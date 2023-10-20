<div class="chatbot__header">
    <span class="ths-user">
        <?php echo ucfirst(substr($receiver_data[0]->name,0,1)); ?>
        <?php 
            if($auth_status[0]->auth_status==1){
                echo '<span class="badge bg-success">.</span>';
            } else if($auth_status[0]->auth_status==2){
                echo '<span class="badge bg-warning">.</span>';
            } else {
                echo '<span class="badge bg-danger">.</span>';
            }
        ?>
    </span>
    <h3 class="chatbox__title" id="avatarname"><?php echo $receiver_data[0]->name; ?></h3>
    <div class="userstatus"><?php if($auth_status[0]->auth_status==1){ echo "Online";}elseif($auth_status[0]->auth_status==2){ echo "Sleep";}else{ echo "Offline";}?></div>
    <div class="close-btns-chat">
        <i class="fa fa-minus" aria-hidden="true" style="color: #7f7f7f !important;"></i>
    </div>
</div>
<!-- <div class="chatbot__search">
    <div class="search_box position-relative">
        <input class="form-control mb-2 search_contacts" type="text" name="searchmessage" placeholder="Search Chats">
        <i class="search_icon fa-solid fa-magnifying-glass" aria-hidden="true" style="color: #7f7f7f !important;"></i>
    </div>
</div> -->
<div id="chat_message_area"></div>
<form method="post" class="typing-area" enctype="multipart/form-data">
    
    <span id="typing_indicator" style="font-size: 8px; color: grey;"></span>

  <div id="msg"></div>
    <div class="chatbot__input-box"> 
        <div class="input-group"> 
            <textarea class="form-control chatbot__textarea" id="chatbot_textarea" aria-label="With textarea" placeholder="Enter a message..." required></textarea>
            <div class="input-group-prepend">
                <label class="input-group-texts" for='input-file'>
                    <i class="fa fa-paperclip" aria-hidden="true" style=" transform: translate(0%, -0%) rotate(317deg); color: #7f7f7f !important; font-size:20px;"></i>
                    <input id='input-file' type='file' data-sender="<?php echo $user_id; ?>" data-receiver="<?php echo $receiver_data[0]->id; ?>" style="display:none;"/>
                </label>
                <span id="send-btn" class="input-group-texts" style="display: none;">
                    <button type="button" style="border:none;"><i class="fa fa-paper-plane" aria-hidden="true" style="color: #7f7f7f !important; font-size:20px;"></i></button>
                </span>
            </div>
        </div>   
    </div>
</form>