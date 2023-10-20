<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lead/front_assets/assets/css/index.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lead/front_assets/assets/css/style-email.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lead/front_assets/assets/css/jquery-ui.min.css">
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/thslogo.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lead/front_assets/assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lead/front_assets/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lead/front_assets/assets/css/boxicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lead/front_assets/assets/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lead/front_assets/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lead/front_assets/assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lead/front_assets/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lead/front_assets/assets/css/style.css">
    <title><?php echo $title; ?></title>

</head>


<body>
    <!-- navbar  -->
    <nav class="navbar navbar-expand-lg bg-white shadows py-0">
        <div class="container-fluid">
            <a class="navbar-brand nav-sales" href="#"> 
                <img src="<?php echo base_url(); ?>assets/images/thslogo.png" alt="logo"> 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex me-auto ps-5">
                    <li class="nav-item">
                        <a class="nav-link nav-link-grow-up <?php if (!empty($active))  echo  $active; ?>" aria-current="page" href="<?php echo base_url('sales/list-lead'); ?>">Leads</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-grow-up <?php if (!empty($active2))  echo  $active2; ?>" href="<?php echo base_url('sales/list-callback'); ?>">Call Backs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-grow-up <?php if (!empty($active1))  echo  $active1; ?>" href="<?php echo base_url('sales/list-newlead'); ?>">New Leads</a>
                    </li>

                </ul>
                <!-- <form class="form-inline" method="GET" action="<?php echo base_url(); ?>Search">
                    <div class="input-group">
                        <input type="text" id="myInput" onkeyup="myFunction()" name="text" class="form-control search-form" placeholder="Search by name " fdprocessedid="qw9l">
                        <div class="input-group-addon">
                            <button class="btn theme-btn" type="submit">Search</button>
                        </div>
                    </div>
                </form> -->
                <?php 
                    if ($role_id == 1 || $role_id ==4) {
                        echo '<a href="'.base_url().'" class="btn btn-primary" style="border-radius: 25px; width: 120px; height: 34px;font-size: 14px;padding: 5px;"><i class="fa fa-angle-left" aria-hidden="true"></i> Back To Main</a>';
                    }
                ?>
                <li class="nav-item dropdown  list-unstyled">
                    <button class="btn tp-btn-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome <?php echo $name; ?>
                    </button>

                    <ul class="dropdown-menu ">
                        <!-- <li><a class="dropdown-item" href="<?php echo base_url('sales/Profile'); ?>">Change Password</a></li> -->
                        <li><a class="dropdown-item" href="<?php echo base_url('logout'); ?>">Log out </a></li>
                        <!-- <li><a class="dropdown-item" href="<?php echo base_url('sales/setup/template'); ?>">Builder</a></li> -->
                    </ul>
                </li>
                <?php if ($user_role == 14) {
                } else { ?>
                    <!-- <a href="<?php echo base_url('Setup') ?>"><button class="btn tp-btn-2  fa fa-gear"></button></a> -->
                <?php } ?>
            </div>
        </div>
    </nav>