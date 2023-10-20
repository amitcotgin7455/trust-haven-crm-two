<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/slick.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <title>Success Payment</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        h1 {
            font-size: 62px;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        svg.text-success {
            fill: #b31942;
            width: 150px;
        }

        .thankyoupage {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 95vh;
            text-align: center;
        }

        .btn.btn_save {
            background: #b41e45;
            color: #fff;
            padding: 12px 26px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 18px;
            font-family: 'Poppins', sans-serif;
        }

        p {
            font-size: 16px;
            margin-top: 0;
            font-family: 'Poppins', sans-serif;

        }

        .card {
            box-shadow: 5px 7px 93px 24px #edededb0;
            padding: 90px;
            border-radius: 39px;
        }
    </style>


</head>

<body>
    <div class="thankyoupage">
        <div class="card col-md-4 bg-white shadow-md p-5">
            <div class="mb-4 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-success" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"></path>
                </svg>
            </div>
            <div class="text-center">
                <h1>Payment Successfull !</h1>
                <p>For the purchase. </p><br>
                <a href="<?= base_url() ?>pay?id=<?= $this->input->get('id'); ?>" class="btn btn_save my-4 float-end" id="user_info_btn"> View Invoice</a>
            </div>
        </div>
    </div>

</body>

</html>