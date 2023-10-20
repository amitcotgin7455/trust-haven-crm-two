<style>
    .setting .cards-titles {
        font-size: 16px;
        font-weight: 700;
        color: #b41e45;
    }
    .setting .cards-analytics a {
        display: block;
        color:#313949;
        font-size: 15px;
        line-height: 18px;
        padding: 7px 0;
        font-weight: 500;
    }
    .setting .cards-analytics {
        min-height: 250px;
    }
    .setting .cards-analytics a:hover {
        color: #b41e45;
    }
</style>
<main class="setting">
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <div></div>
        <button type="button" class="btn-close float-end" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="user_bg">
        <div class="offcanvas-body">
            <div class="user-side-bar">
                <a class="User_profile" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <span>
                        S
                </a>
                </span>
            </div>
            <div class="user_detail pt-3">
                <p class="user_name">Shivam Saini</p>
                <p class="user_id"><b>User Id</b>: 0871674889</p>
            </div>
            <div class="d-grid gap-2 d-md-block text-center">
                <button class="btn  btn_save" type="button">My Account</button>
                <button class="btn  btn_save" type="button">Log Out</button>
            </div>
        </div>
    </div>
    <div class="p-4">
        <h6> SUBSCRIPTION</h6>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        </p>
    </div>
</div>
<section class="mt-3 px-3 ">
    <div class="container ">
        <div class="row">
            <div class="col-lg-3">
                <div class="cards-analytics card1 shadow-sm bg-white p-4 rounded-3">
                    <p class="cards-titles">General </p>
                    <a href="#">Personal Settings</a>
                    <a href="#">Company Details</a>
                    <a href="<?=base_url()?>sales">Manage Leads</a>
                    <?php
                    /*
                    if($user_detail->role_id==4 || $user_detail->role_id==1  || $user_detail->role_id == 2)
                    {
                        ?>
                    <a href="<?=base_url()?>list-lead?lead_type=<?=base64_encode('transfer_by_manager')?>&role_id=<?=base64_encode($user_detail->role_id)?>">Lead Transfer</a>
                    <?php }  */?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="cards-analytics card1 shadow-sm bg-white p-4 rounded-3">
                    <p class="cards-titles">Users and Control </p>
                    <a href="<?=base_url()?>users_management/dashboard">Users</a>
                    <a href="<?php echo base_url();?>security-control/dashboard">Security Control</a>
                    <a href="#">Compliance Settings</a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="cards-analytics card1 shadow-sm bg-white p-4 rounded-3">
                    <p class="cards-titles">Channels </p>
                    <a href="<?=base_url()?>email-setup/dashboard">Email</a>
                    <a href="#">Chat</a>
                    <a href="<?=base_url()?>import/import-data">Import Leads</a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="cards-analytics card1 shadow-sm bg-white p-4 rounded-3">
                    <p class="cards-titles">Customization </p>
                    <a href="<?=base_url()?>custom_field/dashboard">Modules and Fields</a>
                    <a href="#">Templates</a>
                    <a href="#">Customize Home page</a>
                    <!-- <a href="<?=base_url()?>timezone">Manage TimeZone</a> -->
                   
                </div>
            </div>
        </div>
    </div>
</section>
</main>