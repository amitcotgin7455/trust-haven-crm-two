<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,400&display=swap" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    <div style="height:auto;width:700px;text-align:center;background-color:#fff; margin:auto; black;font-family: 'Roboto', sans-serif;">
        <div>
            <img src="<?= base_url() . 'assets/images/thslogo.png' ?>" style="width:300px; margin:20px 20px;padding-top:90px;" />
        </div>
        <div>
            <p style="text-align: left; font-size:18px;">Dear '.$first_name.' '.$last_name.',</p>
        </div>
        <div>
            <h2 style="color:#1ea5b4">Thank you for signing up with us!</h2>
            <p style="font-size:18px;">Here is your information:</p>
        </div>
        <div style="background-color: #efe9e978; border-radius:15px;padding:10px 10px; display:flex;">
            <div style="width:50%;  text-align:right;">
                <p style="font-size:18px;">Name </p>
                <p style="font-size:18px;">Address </p>
                <p style="font-size:18px;">City </p>
                <p style="font-size:18px;">State of Province </p>
                <p style="font-size:18px;">Postal Code </p>
                <p style="font-size:18px;">Country or Region </p>
                <p style="font-size:18px;">E-mail Address </p>
            </div>
            <div style="width:50%; text-align:left;padding-left:20px;font-weight:700">
                <p style="font-size:18px;">'.$first_name.' '.$last_name.'</p>
                <p style="font-size:18px;">Gali no 6 laxmi nagar</p>
                <p style="font-size:18px;">Laxmi nagar</p>
                <p style="font-size:18px;">Delhi</p>
                <p style="font-size:18px;">110092</p>
                <p style="font-size:18px;">India</p>
                <p style="font-size:18px;">'.$email.'</p>
            </div>
        </div>
        <div style="text-align:left;">
            <p style="font-size:17px;">If you would like to add or change your profile information, please call us on our help line number <br>
                1-800-235-0122 or 1-800-518-9122..
            </p>
            <p style="font-size:18px;">This is to informe you that you are now a registered customer for {plan} with your customer ID 848968. please make a copy of this customer ID. We request you to please never share this ID with anyone.</p>
            <p style="font-size:18px;">In case of any issues please feel free to reach us on our toll free number 1-800-235-0122 or you can write us on help@trusthavensolution.com or for billing info@trusthavensolution.com.</p>
            <p style="font-size:18px;">We look forword to assist you!</p>
            <p style="font-size:18px; font-weight:700;">Best regards, <br> Trust Haven Solution Inc. <br><a href="http://trusthavensolution.com/">trusthavensolution.com</a> <br>1800-235-0122</p>
        </div>
    </div>
</body>

</html>