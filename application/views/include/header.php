<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">  
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/images/thslogo.png">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg="crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>  
    
    <title><?php echo $first_name; ?>&nbsp;<?php echo $last_name; ?>&nbsp;<?php echo $title; ?></title>
</head>

<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap'); */
    .cards-analytics {
        background: #ffff;
        padding: 10px 25px;
        border-radius: 5px;
        font-family: 'Open Sans', sans-serif;
      
    }
    .cards-titles{
       
    }
    a,label,th, select{
        font-family: 'Open Sans', sans-serif;

    }
    .page_title svg {
        font-size: 40px;
    }

    .page_title span {
        color: #202123;
        /* font-weight: 600; */
        font-size: 20px;
        padding-left: 15px;
        vertical-align: middle;
        margin-top: 24px;  
        font-family: "Inter", sans-serif;      
    }

    .cards-analytics p.cards-titles {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px;
    }
    .cards-analytics p.cards-number {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .dashboard {
        background: #eeee;
    }

    .my_task h5 {
        /* border-bottom: 1px solid #1e1e1e; */
        padding-bottom: 9px;
        color: #202123;
        font-size: 16px;
        font-weight: 600;

    }

    .my_task {
        background: #fff;
        border-radius: 5px;
        padding: 30px;
        /* height: 400px;
        overflow: auto; */
    }
    
    p.cards-titles {
       
        color: #202123
    }
    .filter-main {
        position: absolute;
        right: 0;
        z-index: 9;
    }
    .Active{
         color: #0a3161!important; 
         border-bottom: 3px solid #0a3161 ; 
    }
    .my_task table thead tr th{    
        padding: 7px 10px!important;
        border-bottom: 1px double #EDF0F4;
        border-top: 1px solid #EDF0F4;
        position: relative;
        white-space: nowrap;
        font-size: 15px;
        color: #202123 !important;
        text-align: left;
        font-weight: 600;
    }
    .my_task table thead tr th:before, .my_task table thead tr th:before {
        content: "";
        height: 23px;
        width: 1px;
        display: inline-block;
        position: absolute;
        background: #E1E6EC;
        top: 6px;
        right: 0;
    }
    .my_task td {
        border-bottom: 1px solid #edf0f4;
        empty-cells: show;
        padding: 7px 10px!important;
        vertical-align: top;
        /* font-weight: 400; */
        text-align: left;
        font-size: 14px;
        font-family: 'Noto Sans', sans-serif;
        /* color: #313949; */
        /* color:#616E88; */
        border-left:0
    }
    .my_task td a{        
        color: #338cf0;
    }
    .table-over {
        overflow-y: scroll;
        height: 300px;
    }
    /* .navbar-expand-lg .navbar-nav .nav-link.Active:before {
        content: '';
        width: calc(100% - 16px);
        position: absolute;
        left: 50%;
        bottom: 1px;
        transform: translateX(-50%);
        border-bottom: 3px solid var(--br_trans);
    } */
    .navbar-expand-lg .nav-item a.nav-link {
        font-weight: 500;
        margin-right: 12px;
    }
    
</style>

<body>
    <header>
        <nav class="navbar navbar-expand-lg header_bg py-1">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">                   
                    <img src="<?php echo base_url(); ?>assets/images/thslogo.png" alt="">                   
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $active?>" aria-current="page" href="<?php echo base_url(); ?>dashboard">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $active1?>" href="<?php echo base_url(); ?>list-lead">Leads</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $active2?>" href="<?php echo base_url(); ?>list-contact">Contacts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $active3?>" href="<?php echo base_url(); ?>list-booking">Bookings</a>
                        </li>
                        <?php if($user_detail->role_id == 1 || $user_detail->role_id == 4 || $user_detail->role_id == 3) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $active4?>" href="<?php echo base_url(); ?>list-invoice">Invoice</a>
                        </li>
                        <?php } ?>
                         
                        <!-- <li class="nav-item">
                            <a class="nav-link <?php echo $active5?>" href="<?php echo base_url(); ?>lead-transfer">Transfer Lead</a>
                        </li> -->
                    </ul>
                    <div class="profile_setting d-flex align-items-center">
                        <a class="icons-color" href="<?php echo base_url(); ?>setting">
                        <!-- <i class="fa-solid fa-gear"></i> -->
                         <img src="<?=base_url()?>assets\images\settings.png" alt="" width="32">
                        </a>
                        <span>
                            <a class="User_profile" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <span>
                                    <?=ucfirst(substr($user_detail->name,0,1))?>
                                </span>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </nav>
    </header>
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
                        <?=ucfirst(substr($user_detail->name,0,1))?>
                    </a>
                    </span>
                </div>
                <div class="user_detail pt-3">
                    <p class="user_name"><?=$user_detail->name?> ( <span style="color:green"><?=$user_detail->role_type?> )</span></p>
                    
                    <p class="user_id"><b>User Id</b>: 0871674889</p>
                    <input type="hidden" value="<?=base_url()?>" id="base_url"/>
                </div>
                <div class="d-grid gap-2 d-md-block text-center">
                    <a class="btn  btn_save" href="<?=base_url()?>my-account">My Account</a>
                    <a class="btn  btn_save" href="<?=base_url()?>logout">Log Out</a>
                </div>
            </div>

        </div>
        <div class="p-4">
            <h6> SUBSCRIPTION</h6>
            <p class="para">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            </p>
        </div>
    </div>