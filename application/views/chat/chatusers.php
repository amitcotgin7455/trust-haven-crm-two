<?php if(!empty($fetchchatUser)){
    $current_time = date('Y-m-d H:i:s');
    foreach($fetchchatUser as $users){
        ?>
        <li class="chatbot__chats incomings" style="cursor: pointer;" onclick="userchatBox(<?php echo $users->id; ?>)">
            <span class="material-symbols-outlineds">
                <span class="icons-ss"><?php echo ucfirst(substr($users->name,0,1)); ?> </span>
                <span>
                <?php 
                    if($users->user_log_status->auth_status==1) { 
                        echo '<i><img src="'.base_url().'assets/lead/front_assets/assets/images/button-green.png" alt="Active" width="14"></i>';
                    } else if($users->user_log_status->auth_status==2) { 
                        echo '<i><img src="'.base_url().'assets/lead/front_assets/assets/images/button-yellow.png" alt="Sleep" width="14"></i>'; 
                    } else { 
                        echo '<i><img src="'.base_url().'assets/lead/front_assets/assets/images/button-red.png" alt="Inactive" width="14"></i>';
                    } 
                ?>
                </span>
                <span class="chat-namess"><?php echo $users->name; ?> </span>
            </span>
            <div class="chat-ins">
                <p><?=substr($users->last_message->message,0,20)?></p>
            </div>
            <div class="dates-time-sec">
                <?php
                
                $chat_time = date('Y-m-d H:i:s',strtotime($users->last_message->message_date));
                $current_time = date('Y-m-d H:i:s');
                $diff = (strtotime($current_time)-strtotime($chat_time));
                $getMin = ($diff/60);
                if($getMin > 1440)
                {
                    
                 ?>
                 
                <span><?=date('m-d-Y',strtotime($users->last_message->message_date))?></span>
                 <?php
                }
                else
                {
                   
                    ?>
                <span><?=date('D h:i A',strtotime($users->last_message->message_date))?></span>
                    
                    <?php
                }
                ?>
            </div>
        </li>
<?php } } ?> 