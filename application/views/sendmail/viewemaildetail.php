<style>
   .row-1 {
        border-bottom: 1px solid #D2D9E0;
        padding: 7px 3px;
    }
    .tosubject{
        font-size: 14px !important;
        vertical-align: middle;
        font-weight: 400 !important;
        color: #313949;
    }
    .row-1 span, .mailcontent p{
        font-size: 13px !important;
    vertical-align: middle;
    font-weight: 600 !important;
    color: #313949;
    padding-left: 3px;
    font-family: 'Open Sans' !important;
    margin-top: 2px;

    }
    .mailcontent{
        margin-top: 15px;
    }
    .mailcontent p{
        margin-top: 15px;
        font-size: 13px !important;
        font-weight: 400 !important;
        line-height: 23px;
    }
    .mailcontent-box{
        width:100%;
    
    }
@media screen and (max-width:991px){
    .mailcontent-box .mail-table-container table {
        width: 379px;
    }
}
</style>
<div class="modal-body p-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row row-1">
                    <div class="col-md-7 mailTo">
                        <?php if (!empty($email_detail[0]->too)) { ?>  
                            <div class="mailto d-flex"> 
                                <div class="tosubject">To : </div> 
                                <span><?php echo $email_detail[0]->too; ?></span>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-5 send-on">
                        <?php if (!empty($email_detail[0]->created_at)) { ?> 
                            <div class="maildate d-flex float-end">
                                <!-- <div class="tosubject">Send On : </div>  -->
                                     <span> <?php echo $email_detail[0]->created_at; ?></span>
                                </div>
                        <?php } ?> 
                    </div>
                </div>
                
                <div class="row row-1">
                    <div class="col-md-12">
                        <div class="mailtocc-box">
                            <?php if (!empty($email_detail[0]->too)) { ?>  
                                <div class="mailtocc d-flex">
                                    <div class="tosubject">Cc : </div> 
                                    <span>  <?php echo $email_detail[0]->too; ?></span>
                                    </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mailtobcc-box">
                            <div class="mailtobcc d-flex"> 
                                <div class="tosubject">Bcc : </div>
                                <span><?php if (!empty($email_detail[0]->too)) { echo $email_detail[0]->too; } ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-1">
                    <div class="col-md-12">
                        <div class="mailsubject-box">
                            <div class="mailsubject d-flex"> 
                                <div class="tosubject">Subject : </div>
                                    <span><?php if (!empty($email_detail[0]->subject)) { echo $email_detail[0]->subject; } ?></span>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="mailcontent-box">
                            <div class="mailcontent"> 
                                <div class="tosubject">Content : </div>
                                <div class="mail-table-container"><?php if (!empty($email_detail[0]->message)) { echo $email_detail[0]->message; } ?></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>