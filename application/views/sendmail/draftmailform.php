<style>
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
<?php echo form_open_multipart('Sendmail/sendmail',$data); ?>
<div class="modal-body p-0" style="height: 810px;">
    <div class="container-fluid btm-border">
        <div class="row py-2">
            <div class="col-7">
                <span class="text-success response_message"></span>
                <div class="sender-email">
                    <img src="<?php echo base_url(); ?>assets/images/user-thumbnail.png" alt="" class="rounded-circle" style="width:31px">
                    <span><?php echo $activeSender[0]->sender_name; ?> &lt; <?php echo $activeSender[0]->sender_email; ?> &gt; </span>
                    <input type="email" name="senderemail" id="senderemail" value="<?php echo $activeSender[0]->sender_email; ?>" hidden>
                    <input type="text" name="sender_name" id="sendername" value="<?php echo $activeSender[0]->sender_name; ?>" hidden>
                    <input type="text" name="sender_id" id="sender_id" value="<?php echo $activeSender[0]->id; ?>" hidden>
                </div>
            </div>
            <!-- Send template -->
            <div class="col-5">
                <div class="btn-group dropdown float-end add-tamplate">
                    <button type="button" class="btn btn-secondary" id="templateForm">Insert Tamplate  </button>
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
                                <?php if (!empty($draft_get_name)) {
                                    echo $draft_get_name->first_name;
                                } ?>
                                <?php if (!empty($draft_get_name)) {
                                    echo $draft_get_name->last_name;
                                } ?>
                                <?php if (!empty($getdraft_mail->too)) {
                                    echo '&lt;' . $getdraft_mail->too . '&gt';
                                } ?>
                            </span>
                        </li>
                    </ul>
                    <input type="email" name="toemail" id="toemail" value="<?php echo $getdraft_mail->too; ?>" hidden>
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
                    <input type="text" class="form-control" name="emailtocc" id="emailtocc" value="<?=$getdraft_mail->cc;?>">
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
                    <span class="to">Bcc </span>
                    <input type="text" class="form-control" name="emailtobcc" id="emailtobcc" value="<?=$getdraft_mail->bcc;?>">
                </div>
            </div>
            <div class="col-4">
                <div id="closemailBcc" class="ceCcbcc text-end">
                    <span class="cP odr1">X </span>
                </div>
            </div>
        </div>
        <!--BCC AND CSS-->
    </div>
    <div class="container-fluid btm-border">
        <div class="row py-2">
            <div class="col-8">
                <div class="send-to-sub">
                    <input type="text" class="form-control subject" placeholder="Subject" value="<?=$getdraft_mail->subject;?>" name="emailsubject">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid btm-border">
        <div class="row py-2">
            <div class="col-12">
                <div class="send-to-sub">
                    <textarea name="emailmessage" id="editor" class="message-container" rows="8"><?=$getdraft_mail->message;?></textarea>
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
            <input type="text" name="hidden_id"  value="<?php echo $getdraft_mail->id ?>" hidden>
            <input type="text" name="lead_id" id="lead_id" value="<?php echo $getdraft_mail->lead_id ?>" hidden>
            <input type="text" name="module_name" class="module_type" id="module_type" value="<?php echo $mailModule; ?>" hidden>
            <input type="text" name="mail_status"  id="mail_status" value="<?=$getdraft_mail->mail_status;?>" hidden>
            <input type="text" id="imgValue" name="attachment" value="<?=$getdraft_mail->image;?>" hidden>
            <button type="submit"  class="btn btn_save">Send</button>
        </div>
    </div>
</div>
</form>
<script>
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
                url: '<?php echo base_url('sendmail/mail_attachment') ?>',
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
            url: "<?php echo base_url() ?>sendmail/default_template",
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

    $(".btn_draft").click(function(){
        var lead_id = $("#lead_id").val();
        var sender_id = $("#sender_id").val();
        var module_type = $(".module_type").val();
        var senderemail = $("#senderemail").val();
        var sendername = $("#sendername").val();
        var subject = $(".subject").val();
        var toemail = $("#toemail").val();
        var emailtocc = $("#emailtocc").val();
        var emailtobcc = $("#emailtobcc").val();
        var imgvalue = $("#imgValue").val();
        var message = CKEDITOR.instances.editor.getData();
        var body_data =  CKEDITOR.instances.editor.document.getBody().getText();
        var body_data_length = body_data.length;   
        
        if( body_data_length == 1 ){
            alert('Message Is Blank');
            return false;
        }else{ 
         $.ajax({
            url:"<?=base_url()?>sendmail/savedraft",
            method:"post",
            data:{ 
            lead_id: lead_id,
            sender_id: sender_id,
            module_type: module_type,
            senderemail: senderemail,
            sendername: sendername,
            toemail: toemail,
            subject: subject,
            emailtocc: emailtocc,
            emailtobcc: emailtobcc,
            imgvalue: imgvalue,
            message: message
            },
            success:function(data){
            $(".response_message").text(data);
            },
         });
        }
    });

</script>