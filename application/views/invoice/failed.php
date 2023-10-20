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
            font-weight: 500;
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
                <svg width="159" height="159" viewBox="0 0 159 159" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.2959 79.5002C9.2959 60.881 16.6924 43.0244 29.8581 29.8586C43.0239 16.6928 60.8805 9.29639 79.4997 9.29639C98.1189 9.29639 115.976 16.6928 129.141 29.8586C142.307 43.0244 149.704 60.881 149.704 79.5002C149.704 98.1194 142.307 115.976 129.141 129.142C115.976 142.308 98.1189 149.704 79.4997 149.704C60.8805 149.704 43.0239 142.308 29.8581 129.142C16.6924 115.976 9.2959 98.1194 9.2959 79.5002ZM79.4997 19.3664C63.5512 19.3664 48.256 25.7019 36.9787 36.9792C25.7014 48.2564 19.3659 63.5517 19.3659 79.5002C19.3659 95.4487 25.7014 110.744 36.9787 122.021C48.256 133.298 63.5512 139.634 79.4997 139.634C95.4482 139.634 110.743 133.298 122.021 122.021C133.298 110.744 139.634 95.4487 139.634 79.5002C139.634 63.5517 133.298 48.2564 122.021 36.9792C110.743 25.7019 95.4482 19.3664 79.4997 19.3664ZM104.452 54.5584C105.446 55.5523 106.004 56.9001 106.004 58.3055C106.004 59.7109 105.446 61.0587 104.452 62.0526L86.9939 79.5002L104.452 96.9478C105.447 97.943 106.006 99.2928 106.006 100.7C106.006 102.108 105.447 103.457 104.452 104.453C103.457 105.448 102.107 106.007 100.7 106.007C99.2923 106.007 97.9425 105.448 96.9473 104.453L79.4997 86.9944L62.0521 104.453C61.5593 104.945 60.9743 105.336 60.3305 105.603C59.6867 105.87 58.9966 106.007 58.2997 106.007C57.6028 106.007 56.9128 105.87 56.2689 105.603C55.6251 105.336 55.0401 104.945 54.5473 104.453C54.0545 103.96 53.6636 103.375 53.397 102.731C53.1303 102.087 52.993 101.397 52.993 100.7C52.993 100.003 53.1303 99.3132 53.397 98.6694C53.6636 98.0256 54.0545 97.4406 54.5473 96.9478L72.0055 79.5002L54.5473 62.0526C53.5521 61.0574 52.993 59.7076 52.993 58.3002C52.993 56.8928 53.5521 55.543 54.5473 54.5478C55.5425 53.5526 56.8923 52.9935 58.2997 52.9935C59.7071 52.9935 61.0569 53.5526 62.0521 54.5478L79.4997 72.006L96.9473 54.5478C97.4396 54.0542 98.0245 53.6626 98.6684 53.3954C99.3123 53.1282 100.003 52.9907 100.7 52.9907C101.397 52.9907 102.087 53.1282 102.731 53.3954C103.375 53.6626 103.96 54.0648 104.452 54.5584Z" fill="#B41E45" />
                </svg>

            </div>
            <div class="text-center">
                <h1>Payment Failed!</h1>
                <p>Try Now</p><br>
                <a href="<?= base_url() ?>pay?id=<?php echo $this->input->get('id'); ?>" class="btn btn_save my-4 float-end" id="user_info_btn"> Try Now</a>
            </div>
        </div>
    </div>

</body>

</html>