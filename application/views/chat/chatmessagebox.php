<?php if (!empty($getmessage)) { ?>
    <div class="chat-section" id="chattoscroll">
        <ul class="chatbot__box ps-0">
            <?php
            foreach ($getmessage as $key => $result) {
                $attachment_file = $result->attachment;
                $attachment_extension = pathinfo($attachment_file, PATHINFO_EXTENSION);
                //gif|jpg|png|jpeg|pdf|doc|docx|xls|xlsx|mp4|avi|mov
                if ($attachment_extension === "gif" || $attachment_extension === "jpg" || $attachment_extension === "png" || $attachment_extension === "jpeg") {
                    $attachment = '<p><img src="' . base_url() . 'file/chat/' . $attachment_file . '" alt="" width="150px"></p>';
                } else if ($attachment_extension === "pdf") {
                    $attachment = '<p><img src="' . base_url() . 'file/default/default_pdf.png" alt=""></p>';
                } else if ($attachment_extension === "doc" || $attachment_extension === "docx" || $attachment_extension === "txt") {
                    $attachment = '<p><img src="' . base_url() . 'file/default/default_doc.png" alt=""></p>';
                } else if ($attachment_extension === "xls" || $attachment_extension === "xlsx" || $attachment_extension === "csv") {
                    $attachment = '<p><img src="' . base_url() . 'file/default/default_excel.png" alt=""></p>';
                } else if ($attachment_extension === "mp4" || $attachment_extension === "avi" || $attachment_extension === "mov") {
                    $attachment = '<p><img src="' . base_url() . 'file/default/default_video.png" alt=""></p>';
                } else {
                    $attachment = '<p><img src="' . base_url() . 'file/default/default_attachment.png" alt=""></p>';
                }
            ?>
                <?php
                if ($result->sender_id === $user_id) {
                    if ($result->status == '1') {
                        if (!empty($attachment_file)) {
                ?>
                            <li class="chatbot__chat outgoing">
                                <div class="material-symbols-inline">
                                    <p class="chat-names"><?php echo $result->name; ?></p>
                                </div>
                                <div class="dropdown dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>file/chat/<?php echo $attachment_file; ?>" Download>Download</a></li>
                                        <li><a class="dropdown-item delete_message" id="<?php echo $result->messageid; ?>" href="javascript:void(0);">Delete</a></li>
                                    </ul>
                                </div>
                                <div class="out-chat"><?php echo $attachment; ?></div>
                                <div class="date-time-secs">
                                    <span><?php echo date('h:i:A', strtotime($result->message_date)); ?></span> <span>/</span> <span><?php echo date('d-m-Y', strtotime($result->message_date)); ?></span>
                                </div>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li class="chatbot__chat outgoing">
                                <div class="material-symbols-inline">
                                    <p class="chat-names"><?php echo $result->name; ?></p>
                                </div>
                                <div class="dropdown dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item delete_message" id="<?php echo $result->messageid; ?>" href="javascript:void(0);">Delete</a></li>
                                    </ul>
                                </div>
                                <div class="out-chat">
                                    <p><?php echo $result->message; ?></p>
                                </div>
                                <div class="date-time-secs">
                                    <span><?php echo date('h:i:A', strtotime($result->message_date)); ?></span> <span>/</span> <span><?php echo date('d-m-Y', strtotime($result->message_date)); ?></span>
                                </div>
                            </li>
                        <?php }
                    } else { ?>
                        <li class="chatbot__chat outgoing">
                            <div class="material-symbols-inline">
                                <p class="chat-names"><?php echo $result->name; ?></p>
                            </div>
                            <div class="out-chat">
                                <p><i>This message was deleted</i></p>
                            </div>
                            <div class="date-time-secs">
                                <span><?php echo date('h:i:A', strtotime($result->message_date)); ?></span> <span>/</span> <span><?php echo date('d-m-Y', strtotime($result->message_date)); ?></span>
                            </div>
                        </li>
                        <?php
                    }
                } else {
                    if ($result->status == '1') {
                        if (!empty($attachment_file)) {
                        ?>
                            <li class="chatbot__chat incoming">
                                <span class="material-symbols-outlined">
                                    <!-- <img src="assets/lead/front_assets/assets/images/user-thumbnail.png" alt="" width="50">  -->
                                    <span class="icons-s"><?php echo ucfirst(substr($result->name, 0, 1)); ?></span>
                                    <span class="chat-name"> <?php echo $result->name; ?></span>
                                </span>
                                <div class="chat-in"><?php echo $attachment; ?></div>
                                <div class="dropdown dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>file/chat/<?php echo $attachment_file; ?>" Download>Download</a></li>
                                    </ul>
                                </div>
                                <div class="date-time-sec">
                                    <span><?php echo date('h:i:A', strtotime($result->message_date)); ?></span> <span>/</span> <span><?php echo date('d-m-Y', strtotime($result->message_date)); ?></span>
                                </div>
                            </li>
                        <?php
                            } else {
                        ?>
                            <li class="chatbot__chat incoming">
                                <span class="material-symbols-outlined">
                                    <!-- <img src="assets/lead/front_assets/assets/images/user-thumbnail.png" alt="" width="50">  -->
                                    <span class="icons-s"><?php echo ucfirst(substr($result->name, 0, 1)); ?></span>
                                    <span class="chat-name"> <?php echo $result->name; ?></span>
                                </span>
                                <div class="chat-in">
                                    <p><?php echo $result->message; ?></p>
                                </div>
                                <div class="date-time-sec">
                                    <span><?php echo date('h:i:A', strtotime($result->message_date)); ?></span> <span>/</span> <span><?php echo date('d-m-Y', strtotime($result->message_date)); ?></span>
                                </div>
                            </li>
                        <?php 
                            }
                            } else {
                        ?>
                            <li class="chatbot__chat incoming">
                                <span class="material-symbols-outlined">
                                    <span class="icons-s"><?php echo ucfirst(substr($result->name, 0, 1)); ?></span>
                                    <span class="chat-name"> <?php echo $result->name; ?></span>
                                </span>
                                <div class="chat-in">
                                    <p><i>This message was deleted </i></p>
                                </div>
                                <div class="date-time-sec">
                                    <span><?php echo date('h:i:A', strtotime($result->message_date)); ?></span> <span>/</span> <span><?php echo date('d-m-Y', strtotime($result->message_date)); ?></span>
                                </div>
                            </li>
                        <?php
                        }
                    }
                }
            ?>
        </ul>
    </div>
<?php } ?>