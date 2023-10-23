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
    <style>
        .new-login-page{
            background-color:#fff;
           
        }
        .new-log-sec{
            background: url(../assets/images/login-bg.png);
            background-position:bottom;
            background-size:cover;
            background-repeat:no-repeat;
            height:100vh
        }
        .new-log-txt {
            width:100%;
            max-width:550px;
            text-align:center;
            /* padding: 0 50px;
            position: relative;
            top: 40%; */
            
        }
        .new-log-txt h2{
            color: #1D1D1F;
            text-align: center;
            font-family: "Zoho_Puvi_SemiBold", sans-serif;
            font-size: 28px;
            font-weight: 700;
        }
        .new-log-txt input[type=text], .new-log-txt input[type=password], .new-log-txt input[type=email]{
            border-radius: 5px;
            background: #edf2f4c7;
            color: #6E6E73;
            font-family: 'Open Sans' !important;
            font-size: 14px;
            font-weight: 600;
            padding: 12px;
            border: none;
        }
        .new-log-txt input.btn{
            border-radius: 5px;
            background: #0A3161;
            color: #FAFAFA;
            text-align: center;
            font-family: 'Open Sans' !important;
            font-size: 18px;
            font-weight: 800;
            padding:10px
        }
        .new-log-txt a.Mybtn{
            color: #0A3161;
            font-family: 'Open Sans' !important;
            font-size: 14px;            
            font-weight: 600;
        }
        .login-text p{
            color: var(--Content, #303030);
            font-family: 'Open Sans' !important;
            font-size: 14px;
            font-weight: 600;
        }
        .google-login a{
            border-radius: 5px;
            background: #edf2f4c7;
            color: #6E6E73;
            font-family: 'Open Sans' !important;
            font-size: 14px;
            font-weight: 600;
            padding: 12px;
            border: none;
        }
        .logo-image img{
            width:150px;
            padding-left:20px
        }
        #togglePassword{
            position: absolute;
            right: 10px;
            top: 9px;
        }
        .resend-otp{
            color: #1D1D1F;
            text-align: right;
            font-family: 'Open Sans' !important;
            font-size: 13px;
            font-weight: 600;
        }
        .resend-otp span{
            color: #ABABAB;
            
        }
    </style>
</head>
<body style="background:#fff;height:100%;padding:0">
    <section class="new-login-page">
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="new-log-sec p-5">
                        <a class="logo-image text-center" href="javascript:void(0)"><img src="<?php echo base_url('assets/'); ?>images/thslogo.png" alt="" width="150"></a>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-around align-items-center">
                    <div class="new-log-txt text-center py-3">
                        <div class="mb-5">
                            <h2><strong>Sign In </strong></h2>
                            <!-- <p>Enter your User Name and password to access .</p> -->
                        </div>
                        <form action="" method="post">
                            <div class="form-group mb-4">
                                <input type="text" name="login_id" id="login_id" class="form-control"  placeholder="Enter Email / Phone No.">                                    
                            </div>
                            <div class="form-group mb-4 d-flex position-relative">
                                <!-- <input type="password" class="form-control" name="login_password"  id="loginPassword" placeholder="Enter Passcode"> -->
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Passcode" />                
                                <span id="togglePassword">
                                        <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.24914 3.7715C6.38348 3.09746 7.67967 2.74438 8.99914 2.75C13.7294 2.75 16.0244 7.01225 16.4316 7.856C16.4766 7.94825 16.4766 8.05175 16.4316 8.14475C16.1676 8.69075 15.1146 10.6662 13.1241 11.993M10.4991 13.1C10.0055 13.2006 9.50293 13.2509 8.99914 13.25C4.26889 13.25 1.97389 8.98775 1.56664 8.144C1.54464 8.09892 1.5332 8.04941 1.5332 7.99925C1.5332 7.94909 1.54464 7.89958 1.56664 7.8545C1.73089 7.5155 2.19664 6.6305 2.99914 5.69075M7.49914 6.323C7.9278 5.93982 8.48688 5.73528 9.06161 5.75136C9.63633 5.76745 10.1831 6.00294 10.5897 6.40949C10.9962 6.81604 11.2317 7.36281 11.2478 7.93754C11.2639 8.51227 11.0593 9.07135 10.6761 9.5M2.24914 1.25L15.7491 14.75" stroke="#6E6E73" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                </span>
                            </div>
                            <div class="form-group mb-3">
                                <input type="submit" class="form-control btn" value="Sign In">
                            </div>
                            <div class="text-end  mb-4"><a href="#" class="text-decoration-none Mybtn">Forgot Password?</a></div>
                            <div class="login-text  mb-4"> <p>- Or Sign in with -</p></div>
                            <div class="google-login">
                                <a href="#" class="text-decoration-none Mybtn form-control">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M23.622 10.8783H22.7493V10.8334H12.9993V15.1667H19.1218C18.2286 17.6892 15.8285 19.5 12.9993 19.5C9.40972 19.5 6.49935 16.5896 6.49935 13C6.49935 9.41039 9.40972 6.50002 12.9993 6.50002C14.6563 6.50002 16.1638 7.1251 17.3116 8.14614L20.3758 5.08194C18.4409 3.27873 15.8528 2.16669 12.9993 2.16669C7.01664 2.16669 2.16602 7.01731 2.16602 13C2.16602 18.9827 7.01664 23.8334 12.9993 23.8334C18.9821 23.8334 23.8327 18.9827 23.8327 13C23.8327 12.2736 23.7579 11.5646 23.622 10.8783Z" fill="#FFC107"/>
                                        <path d="M3.41602 7.95764L6.97531 10.5679C7.93839 8.18352 10.2708 6.50002 13.0003 6.50002C14.6572 6.50002 16.1647 7.1251 17.3125 8.14614L20.3767 5.08194C18.4418 3.27873 15.8538 2.16669 13.0003 2.16669C8.83918 2.16669 5.2306 4.5159 3.41602 7.95764Z" fill="#FF3D00"/>
                                        <path d="M13.0001 23.8333C15.7983 23.8333 18.3409 22.7625 20.2633 21.021L16.9104 18.1838C15.7862 19.0387 14.4125 19.5011 13.0001 19.5C10.1823 19.5 7.7898 17.7033 6.88846 15.1959L3.35571 17.9178C5.14863 21.4262 8.78971 23.8333 13.0001 23.8333Z" fill="#4CAF50"/>
                                        <path d="M23.6226 10.8783H22.75V10.8333H13V15.1666H19.1225C18.6952 16.3672 17.9256 17.4163 16.9087 18.1843L16.9103 18.1832L20.2632 21.0204C20.026 21.236 23.8333 18.4166 23.8333 13C23.8333 12.2736 23.7586 11.5646 23.6226 10.8783Z" fill="#1976D2"/>
                                        </svg>

                                        Google Account
                                </a>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- otp email section -->
    <section class="new-login-page">
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="new-log-sec p-5">
                        <a class="logo-image text-center" href="javascript:void(0)"><img src="<?php echo base_url('assets/'); ?>images/thslogo.png" alt="" width="150"></a>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-around align-items-center">
                    <div class="new-log-txt text-center py-3">
                        <div class="mb-5">
                            <h2><strong>Enter OTP</strong></h2>
                            <!-- <p>Enter your User Name and password to access .</p> -->
                        </div>
                        <form action="" method="post">
                            <div class="form-group mb-4">
                                <input type="email" name="email" id="email" class="form-control"  placeholder="admin@gmail.com">                                    
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control" name="otp"  id="otp" placeholder="Enter OTP">
                                
                            </div>
                            <div class="form-group mb-3">
                                <input type="submit" class="form-control btn" value="Submit">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- otp no section -->
    <section class="new-login-page">
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="new-log-sec p-5">
                        <a class="logo-image text-center" href="javascript:void(0)"><img src="<?php echo base_url('assets/'); ?>images/thslogo.png" alt="" width="150"></a>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-around align-items-center">
                    <div class="new-log-txt text-center py-3">
                        <div class="mb-5">
                            <h2><strong>Enter OTP</strong></h2>
                            <!-- <p>Enter your User Name and password to access .</p> -->
                        </div>
                        <form action="" method="post">
                            <div class="form-group mb-4">
                                <input type="text" name="email" id="email" class="form-control"  placeholder="admin@gmail.com">                                    
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control" name="otp"  id="otp" placeholder="Enter OTP">
                                <p class="float-end pt-4 resend-otp"><b>Resend OTP </b><span>00:59</span></p>
                            </div>
                            <div class="form-group mb-3">
                                <input type="submit" class="form-control btn" value="Submit">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- Forget password section -->
     <section class="new-login-page">
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="new-log-sec p-5">
                        <a class="logo-image text-center" href="javascript:void(0)"><img src="<?php echo base_url('assets/'); ?>images/thslogo.png" alt="" width="150"></a>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-around align-items-center">
                    <div class="new-log-txt text-center py-3">
                        <div class="mb-5">
                            <h2><strong>Forget Password</strong></h2>
                            <!-- <p>Enter your User Name and password to access .</p> -->
                        </div>
                        <form action="" method="post">
                            <div class="form-group mb-4">
                                <input type="email" name="email" id="email" class="form-control"  placeholder="Enter Email Address, Phone Number">                                    
                            </div>
                           
                            <div class="form-group mb-3">
                                <input type="submit" class="form-control btn" value="Submit">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- password show hide script -->
<script>
    const togglePassword = document
        .querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', () => {
        // Toggle the type attribute using
        // getAttribure() method
        const type = password
        .getAttribute('type') === 'password' ?
        'text' : 'password';
        password.setAttribute('type', type);
        // Toggle the eye and bi-eye icon
        this.classList.toggle('bi-eye');
    });
</script>
</body>
</html>