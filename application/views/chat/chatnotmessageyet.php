<style>
    .chatbot__box{
        margin: auto;
        text-align: center;
    }
    #new_message_avtar{
        background: #c1c1c1;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        line-height: 35px;
        margin: auto;
        /* padding: 10px 26px 27px 12px; */
        text-align: center;
        margin-bottom: 10px;
    }
    #new_message_avtar span{
        font-size: 27px;
        color: #fff;
        /* padding: 5px; */
    }
</style>
<div class="chat-section">
    <div class="chatbot__box">
       
        <div id="not_message_yet">
            <div>
                <div id="new_message_avtar"><span><?php echo ucfirst(substr($name,0,1)); ?></span></div>
                <h4 id="new_message_name"><?php echo $name;?></h4>
                <p id="new_message_title" class="text-center">Start messaging with your friend</p>
            </div>
        </div>
        
    </div>
</div>