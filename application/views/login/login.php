<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <title><?php echo $title; ?></title>
</head>
<style>
    .account-block {
        padding: 0;
        background-image: url('<?php echo base_url(); ?>assets/images/form-side.png');
        background-repeat: no-repeat;
        background-size: contain;
        height: 100%;
        position: relative;
    }

    #main-wrapper {
        margin: 80px auto;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        padding: 60px 0;
    }

    .login-form-box {
        height: 100vh;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .account-block .overlay {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .Mybtn {
        padding: 7px 18px;
        background-color: var(--red);
        color: var(--white);
        font-size: 13px;
    }

    .login-form-box .form-control:focus {
        color: var(--bs-body-color);
        background-color: var(--bs-body-bg);
        border-color: #B31942;
        outline: 0;
        box-shadow: none;
    }
</style>

<body>
    <section class="login-form-box d-flex align-items-center justify-content-center">
        <div id="main-wrapper" class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <div class="row no-gutters">
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="mb-5">
                                            <a class="logo-image" href="javascript:void(0)"><img src="<?php echo base_url('assets/'); ?>images/thslogo.png" alt=""></a>
                                        </div>
                                        <p class=" fs-5 mt-2 mb-5">Enter your User Name and password to access .</p>
                                        <?php if (!empty($this->session->flashdata('error'))) { ?>
                                            <h6 class="text-danger mt-4"> <?php echo  $this->session->flashdata('error'); ?> </h6>
                                        <?php } ?>
                                        <?php echo form_open('Login/loginUser'); ?>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" name="username" class="form-control " id="exampleInputEmail1" value="<?php echo set_value('username'); ?>">
                                            <span class="text-danger"><?php echo form_error('username'); ?></span>
                                        </div>
                                        <div class="form-group mb-5">
                                            <label for="exampleInputPassword1">Password</label> 
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                            <span class="text-danger"><?php echo form_error('password'); ?></span>
                                        </div>
                                        <div class="login-btn d-flex justify-content-between">
                                            <a href="<?=base_url()?>forget-password" class="text-decoration-none Mybtn">Forgot Password?</a>
                                            <a href="<?=base_url()?>googlelogin/login" class="text-decoration-none Mybtn">Sign In With Google</a>
                                            <input type="submit" class="text-decoration-none Mybtn " value="Login" style="border:none;">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-5 mt-5 d-none d-lg-inline-block">
                                    <div class="account-block rounded-right">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- Row -->
        </div>
    </section>
</body>

</html>