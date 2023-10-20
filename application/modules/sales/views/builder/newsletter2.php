<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Email </title>
    <meta content="Best Free Open Source Responsive No-Code Newsletter HTML Email Builder" name="description">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/lead/builder_assets/stylesheets/grapes.min.css?v0.21.1">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/lead/builder_assets/stylesheets/material.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/lead/builder_assets/stylesheets/tooltip.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/lead/builder_assets/stylesheets/demos.css?v2">

    <script src="<?php echo base_url();?>assets/lead/builder_assets/js/grapes.min.js?v0.21.1"></script>
    <script src="<?php echo base_url();?>assets/lead/builder_assets/js/ckeditor/ckeditor.js"></script>
    <script src="https://unpkg.com/grapesjs-plugin-ckeditor@0.0.10"></script>
    <script src="https://unpkg.com/grapesjs-preset-newsletter@1.0.1"></script>

</head>
<style type="text/css">
a,
a[href],
a:hover,
a:link,
a:visited {
    /* This is the link colour */
    text-decoration: none !important;
    color: #0000EE;
}

.link {
    text-decoration: underline !important;
}

p,
p:visited {
    /* Fallback paragraph style */
    font-size: 15px;
    line-height: 24px;
    font-family: 'Helvetica', Arial, sans-serif;
    font-weight: 300;
    text-decoration: none;
    color: #000000;
}

h1 {
    /* Fallback heading style */
    font-size: 22px;
    line-height: 24px;
    font-family: 'Helvetica', Arial, sans-serif;
    font-weight: normal;
    text-decoration: none;
    color: #000000;
}

.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td {
    line-height: 100%;
}

.ExternalClass {
    width: 100%;
}
</style>
<style>
.nl-link {
    color: inherit;
}

.gjs-logo-version {
    background-color: #5a606d;
}
</style>

<body>
    <section class="customer-header " style="background-color:var(--blue)">
        <div class="container-fluid ">
            <div class="row">
                <div class="customer-header d-flex justify-content-between">
                    <div class="right">
                        <div class="myHeading">
                            <a href="<?php echo base_url();?>sales/setup/list_template"><img src="<?php echo base_url();?>assets/lead/front_assets/assets/images/left-arrow (1).png"></a>
                            <form action="<?php echo base_url();?>sales/setup/savemtemplate" method="post">
                                <input type="text" name="template_name" id="enter-temp-id"
                                    placeholder="Enter Template Name" required>
                                <input type="text" name="template_subject" id="enter-temp-id-sed"
                                    placeholder="Enter Subject Name" required>
                                <input type="hidden"  name="template_code" id="template" required>
                                <select required name="module_name">
                                    <option value="">Select Module</option>
                                    <option value="1">Lead</option>
                                    <option value="2">Callback</option>
                                    <option value="3">New Lead</option>
                                </select>
                                <input type="submit" class="btn newbutton sendmailgroupbtn primarybtn mR0 text-white" value="Save Template" id="btnSubmit" >
                            </form>
                        </div>
                    </div>
                    <div class="left">
                        <div class="btn-group" role="group">
                            <!-- <span class="dIB  bR2  cP cb vat mR8" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <input name="Mail" type="button" data-zcqa="sendMail" cscript-tag="send_mail" value="Cancel" class="newbutton sendmailgroupbtn primarybtn mR0" fdprocessedid="bttywm"> </span> -->
                            <span class="dIB  bR2  cP cb vat mR8" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                <input name="Mail" type="button" data-zcqa="sendMail" cscript-tag="send_mail"
                                    value="Export" class="newbutton sendmailgroupbtn primarybtn mR0"
                                    fdprocessedid="bttywm" onclick="getInline()"> </span>
                            <!-- <span class="dIB1  bR2  cP cb vat mR81" onclick="Edit_customer_info()"> <input name="Mail" type="button" data-zcqa="sendMail" cscript-tag="send_mail" value="Save" class="newbutton2 sendmailgroupbtn primarybtn3 mR01" fdprocessedid="4fczvu"> </span> -->
                            <!-- <nav aria-label="...">
                            <ul class="pagination pagination-lg">

                                <li class="page-item"><a class="page-link" href="#">
                                        <box-icon name="chevron-left" class="my-2" style="height: 12px;" color="#b31942"></box-icon>
                                    </a></li>
                                <li class="page-item"><a class="page-link" href="#">
                                        <box-icon name="chevron-right" class="my-2" style="height: 12px;" color="#b31942"></box-icon>
                                    </a></li>
                            </ul>
                        </nav> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="gjs" style="height:0px; overflow:hidden">
        <!-- table mail  -->
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

            <!-- START HEADER/BANNER -->

            <tbody>
                <tr>
                    <td align="center">
                        <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top"
                                        background="https://designmodo.com/demo/emailtemplate/images/header-background.jpg"
                                        bgcolor="#66809b" style="background-size:cover; background-position:top;height="
                                        400""="">
                                        <table class="col-600" width="600" height="400" border="0" align="center"
                                            cellpadding="0" cellspacing="0">

                                            <tbody>
                                                <tr>
                                                    <td height="40"></td>
                                                </tr>


                                                <tr>
                                                    <td align="center" style="line-height: 0px;">
                                                        <img style="display:block; line-height:0px; font-size:0px; border:0px;"
                                                            src="https://designmodo.com/demo/emailtemplate/images/logo.png"
                                                            width="109" height="103" alt="logo">
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td align="center"
                                                        style="font-family: 'Raleway', sans-serif; font-size:37px; color:#ffffff; line-height:24px; font-weight: bold; letter-spacing: 7px;">
                                                        EMAIL <span
                                                            style="font-family: 'Raleway', sans-serif; font-size:37px; color:#ffffff; line-height:39px; font-weight: 300; letter-spacing: 7px;">TEMPLATE</span>
                                                    </td>
                                                </tr>





                                                <tr>
                                                    <td align="center"
                                                        style="font-family: 'Lato', sans-serif; font-size:15px; color:#ffffff; line-height:24px; font-weight: 300;">
                                                        A creative email template for your email campaigns, promotions
                                                        <br>and products across different email platforms.
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td height="50"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>


                <!-- END HEADER/BANNER -->


                <!-- START 3 BOX SHOWCASE -->

                <tr>
                    <td align="center">
                        <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0"
                            style="margin-left:20px; margin-right:20px; border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                            <tbody>
                                <tr>
                                    <td height="35"></td>
                                </tr>

                                <tr>
                                    <td align="center"
                                        style="font-family: 'Raleway', sans-serif; font-size:22px; font-weight: bold; color:#2a3a4b;">
                                        A creative way to showcase your content</td>
                                </tr>

                                <tr>
                                    <td height="10"></td>
                                </tr>


                                <tr>
                                    <td align="center"
                                        style="font-family: 'Lato', sans-serif; font-size:14px; color:#757575; line-height:24px; font-weight: 300;">
                                        Prepare some flat icons of your choice. You can place your content below.<br>
                                        Make sure it's awesome.
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td align="center">
                        <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0"
                            style="border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9; ">
                            <tbody>
                                <tr>
                                    <td height="10"></td>
                                </tr>
                                <tr>
                                    <td>


                                        <table class="col3" width="183" border="0" align="left" cellpadding="0"
                                            cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td height="30"></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table class="insider" width="133" border="0" align="center"
                                                            cellpadding="0" cellspacing="0">

                                                            <tbody>
                                                                <tr align="center" style="line-height:0px;">
                                                                    <td>
                                                                        <img style="display:block; line-height:0px; font-size:0px; border:0px;"
                                                                            src="https://designmodo.com/demo/emailtemplate/images/icon-about.png"
                                                                            width="69" height="78" alt="icon">
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <td height="15"></td>
                                                                </tr>


                                                                <tr align="center">
                                                                    <td
                                                                        style="font-family: 'Raleway', Arial, sans-serif; font-size:20px; color:#2b3c4d; line-height:24px; font-weight: bold;">
                                                                        About Us</td>
                                                                </tr>


                                                                <tr>
                                                                    <td height="10"></td>
                                                                </tr>


                                                                <tr align="center">
                                                                    <td
                                                                        style="font-family: 'Lato', sans-serif; font-size:14px; color:#757575; line-height:24px; font-weight: 300;">
                                                                        Place some cool text here.</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30"></td>
                                                </tr>
                                            </tbody>
                                        </table>





                                        <table width="1" height="20" border="0" cellpadding="0" cellspacing="0"
                                            align="left">
                                            <tbody>
                                                <tr>
                                                    <td height="20"
                                                        style="font-size: 0;line-height: 0;border-collapse: collapse;">
                                                        <p style="padding-left: 24px;">&nbsp;</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>



                                        <table class="col3" width="183" border="0" align="left" cellpadding="0"
                                            cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td height="30"></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table class="insider" width="133" border="0" align="center"
                                                            cellpadding="0" cellspacing="0">

                                                            <tbody>
                                                                <tr align="center" style="line-height:0px;">
                                                                    <td>
                                                                        <img style="display:block; line-height:0px; font-size:0px; border:0px;"
                                                                            src="https://designmodo.com/demo/emailtemplate/images/icon-team.png"
                                                                            width="69" height="78" alt="icon">
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <td height="15"></td>
                                                                </tr>


                                                                <tr align="center">
                                                                    <td
                                                                        style="font-family: 'Raleway', sans-serif; font-size:20px; color:#2b3c4d; line-height:24px; font-weight: bold;">
                                                                        Our Team</td>
                                                                </tr>


                                                                <tr>
                                                                    <td height="10"></td>
                                                                </tr>


                                                                <tr align="center">
                                                                    <td
                                                                        style="font-family: 'Lato', sans-serif; font-size:14px; color:#757575; line-height:24px; font-weight: 300;">
                                                                        Place some cool text here.</td>
                                                                </tr>



                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30"></td>
                                                </tr>
                                            </tbody>
                                        </table>



                                        <table width="1" height="20" border="0" cellpadding="0" cellspacing="0"
                                            align="left">
                                            <tbody>
                                                <tr>
                                                    <td height="20"
                                                        style="font-size: 0;line-height: 0;border-collapse: collapse;">
                                                        <p style="padding-left: 24px;">&nbsp;</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>



                                        <table class="col3" width="183" border="0" align="right" cellpadding="0"
                                            cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td height="30"></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table class="insider" width="133" border="0" align="center"
                                                            cellpadding="0" cellspacing="0">

                                                            <tbody>
                                                                <tr align="center" style="line-height:0px;">
                                                                    <td>
                                                                        <img style="display:block; line-height:0px; font-size:0px; border:0px;"
                                                                            src="https://designmodo.com/demo/emailtemplate/images/icon-portfolio.png"
                                                                            width="69" height="78" alt="icon">
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <td height="15"></td>
                                                                </tr>


                                                                <tr align="center">
                                                                    <td
                                                                        style="font-family: 'Raleway',  sans-serif; font-size:20px; color:#2b3c4d; line-height:24px; font-weight: bold;">
                                                                        Our Portfolio</td>
                                                                </tr>


                                                                <tr>
                                                                    <td height="10"></td>
                                                                </tr>


                                                                <tr align="center">
                                                                    <td
                                                                        style="font-family: 'Lato', sans-serif; font-size:14px; color:#757575; line-height:24px; font-weight: 300;">
                                                                        Place some cool text here.</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="30"></td>
                                                </tr>
                                            </tbody>
                                        </table>


                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td height="5"></td>
                </tr>


                <!-- END 3 BOX SHOWCASE -->


                <!-- START AWESOME TITLE -->

                <tr>
                    <td align="center">
                        <table align="center" class="col-600" width="600" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td align="center" bgcolor="#2a3b4c">
                                        <table class="col-600" width="600" align="center" border="0" cellspacing="0"
                                            cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td height="33"></td>
                                                </tr>
                                                <tr>
                                                    <td>


                                                        <table class="col1" width="183" border="0" align="left"
                                                            cellpadding="0" cellspacing="0">

                                                            <tbody>
                                                                <tr>
                                                                    <td height="18"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td align="center">
                                                                        <img style="display:block; line-height:0px; font-size:0px; border:0px;"
                                                                            class="images_style"
                                                                            src="https://designmodo.com/demo/emailtemplate/images/icon-title.png"
                                                                            alt="img" width="156" height="136">
                                                                    </td>



                                                                </tr>
                                                            </tbody>
                                                        </table>



                                                        <table class="col3_one" width="380" border="0" align="right"
                                                            cellpadding="0" cellspacing="0">

                                                            <tbody>
                                                                <tr align="left" valign="top">
                                                                    <td
                                                                        style="font-family: 'Raleway', sans-serif; font-size:20px; color:#f1c40f; line-height:30px; font-weight: bold;">
                                                                        This title is definitely awesome! </td>
                                                                </tr>


                                                                <tr>
                                                                    <td height="5"></td>
                                                                </tr>


                                                                <tr align="left" valign="top">
                                                                    <td
                                                                        style="font-family: 'Lato', sans-serif; font-size:14px; color:#fff; line-height:24px; font-weight: 300;">
                                                                        The use of flat colors in web design is more
                                                                        than a recent trend, it is a style designers
                                                                        have used for years to create impactful visuals.
                                                                        When you hear "flat", it doesn't mean boring it
                                                                        just means minimalist.
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td height="10"></td>
                                                                </tr>

                                                                <tr align="left" valign="top">
                                                                    <td>
                                                                        <table class="button"
                                                                            style="border: 2px solid #fff;"
                                                                            bgcolor="#2b3c4d" width="30%" border="0"
                                                                            cellpadding="0" cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="10"></td>
                                                                                    <td height="30" align="center"
                                                                                        style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#ffffff;">
                                                                                        <a href="#"
                                                                                            style="color:#ffffff;">Read
                                                                                            more</a>
                                                                                    </td>
                                                                                    <td width="10"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="33"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>


                <!-- END AWESOME TITLE -->


                <!-- START WHAT WE DO -->

                <tr>
                    <td align="center">
                        <table class="col-600" width="600" border="0" align="center" cellpadding="0" cellspacing="0"
                            style="margin-left:20px; margin-right:20px;">



                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table class="col-600" width="600" border="0" align="center" cellpadding="0"
                                            cellspacing="0"
                                            style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                                            <tbody>
                                                <tr>
                                                    <td height="50"></td>
                                                </tr>
                                                <tr>
                                                    <td align="right">


                                                        <table class="col2" width="287" border="0" align="right"
                                                            cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" style="line-height:0px;">
                                                                        <img style="display:block; line-height:0px; font-size:0px; border:0px;"
                                                                            class="images_style"
                                                                            src="https://designmodo.com/demo/emailtemplate/images/icon-responsive.png"
                                                                            width="169" height="138">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>






                                                        <table width="287" border="0" align="left" cellpadding="0"
                                                            cellspacing="0" class="col2" style="">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center">
                                                                        <table class="insider" width="237" border="0"
                                                                            align="center" cellpadding="0"
                                                                            cellspacing="0">



                                                                            <tbody>
                                                                                <tr align="left">
                                                                                    <td
                                                                                        style="font-family: 'Raleway', sans-serif; font-size:23px; color:#2a3b4c; line-height:30px; font-weight: bold;">
                                                                                        What we do?</td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td height="5"></td>
                                                                                </tr>


                                                                                <tr>
                                                                                    <td
                                                                                        style="font-family: 'Lato', sans-serif; font-size:14px; color:#7f8c8d; line-height:24px; font-weight: 300;">
                                                                                        We create responsive websites
                                                                                        with modern designs and features
                                                                                        for small businesses and
                                                                                        organizations that are
                                                                                        professionally developed and SEO
                                                                                        optimized.
                                                                                    </td>
                                                                                </tr>


                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>


                                <!-- END WHAT WE DO -->



                                <!-- START READY FOR NEW PROJECT -->

                                <tr>
                                    <td align="center">
                                        <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0"
                                            style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                                            <tbody>
                                                <tr>
                                                    <td height="50"></td>
                                                </tr>
                                                <tr>


                                                    <td align="center" bgcolor="#34495e">
                                                        <table class="col-600" width="600" border="0" align="center"
                                                            cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="35"></td>
                                                                </tr>


                                                                <tr>
                                                                    <td align="center"
                                                                        style="font-family: 'Raleway', sans-serif; font-size:20px; color:#f1c40f; line-height:24px; font-weight: bold;">
                                                                        Ready for new project?</td>
                                                                </tr>


                                                                <tr>
                                                                    <td height="20"></td>
                                                                </tr>


                                                                <tr>
                                                                    <td align="center"
                                                                        style="font-family: 'Lato', sans-serif; font-size:14px; color:#fff; line-height: 1px; font-weight: 300;">
                                                                        Check out our price below.
                                                                    </td>
                                                                </tr>


                                                                <tr>
                                                                    <td height="40"></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>


                                <!-- END READY FOR NEW PROJECT -->


                                <!-- START PRICING TABLE -->

                                <tr>
                                    <td align="center">
                                        <table width="600" class="col-600" align="center" border="0" cellspacing="0"
                                            cellpadding="0"
                                            style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                                            <tbody>
                                                <tr>
                                                    <td height="50"></td>
                                                </tr>
                                                <tr>
                                                    <td>


                                                        <table style="border:1px solid #e2e2e2;" class="col2"
                                                            width="287" border="0" align="left" cellpadding="0"
                                                            cellspacing="0">


                                                            <tbody>
                                                                <tr>
                                                                    <td height="40" align="center" bgcolor="#2b3c4d"
                                                                        style="font-family: 'Raleway', sans-serif; font-size:18px; color:#f1c40f; line-height:30px; font-weight: bold;">
                                                                        Small Business Website</td>
                                                                </tr>


                                                                <tr>
                                                                    <td align="center">
                                                                        <table class="insider" width="237" border="0"
                                                                            align="center" cellpadding="0"
                                                                            cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="20"></td>
                                                                                </tr>

                                                                                <tr align="center"
                                                                                    style="line-height:0px;">
                                                                                    <td
                                                                                        style="font-family: 'Lato', sans-serif; font-size:48px; color:#2b3c4d; font-weight: bold; line-height: 44px;">
                                                                                        $150</td>
                                                                                </tr>


                                                                                <tr>
                                                                                    <td height="15"></td>
                                                                                </tr>


                                                                                <tr>
                                                                                    <td height="15"></td>
                                                                                </tr>



                                                                                <tr>
                                                                                    <td align="center">
                                                                                        <table width="100" border="0"
                                                                                            align="center"
                                                                                            cellpadding="0"
                                                                                            cellspacing="0"
                                                                                            style="border: 2px solid #2b3c4d;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td width="10"></td>
                                                                                                    <td height="30"
                                                                                                        align="center"
                                                                                                        style="font-family: 'Lato', sans-serif; font-size:14px; font-weight: 300; color:#2b3c4d;">
                                                                                                        <a href="#"
                                                                                                            style="color: #2b3c4d;">Learn
                                                                                                            More</a>
                                                                                                    </td>
                                                                                                    <td width="10"></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>


                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="30"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>





                                                        <table width="1" height="20" border="0" cellpadding="0"
                                                            cellspacing="0" align="left">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="20"
                                                                        style="font-size: 0;line-height: 0;border-collapse: collapse;">
                                                                        <p style="padding-left: 24px;">&nbsp;</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>


                                                        <table style="border:1px solid #e2e2e2;" class="col2"
                                                            width="287" border="0" align="right" cellpadding="0"
                                                            cellspacing="0">


                                                            <tbody>
                                                                <tr>
                                                                    <td height="40" align="center" bgcolor="#2b3c4d"
                                                                        style="font-family: 'Raleway', sans-serif; font-size:18px; color:#f1c40f; line-height:30px; font-weight: bold;">
                                                                        E-commerce Website</td>
                                                                </tr>


                                                                <tr>
                                                                    <td align="center">
                                                                        <table class="insider" width="237" border="0"
                                                                            align="center" cellpadding="0"
                                                                            cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="20"></td>
                                                                                </tr>

                                                                                <tr align="center"
                                                                                    style="line-height:0px;">
                                                                                    <td
                                                                                        style="font-family: 'Lato', sans-serif; font-size:48px; color:#2b3c4d; font-weight: bold; line-height: 44px;">
                                                                                        $289</td>
                                                                                </tr>


                                                                                <tr>
                                                                                    <td height="30"></td>
                                                                                </tr>



                                                                                <tr align="center">
                                                                                    <td>
                                                                                        <table width="100" border="0"
                                                                                            align="center"
                                                                                            cellpadding="0"
                                                                                            cellspacing="0"
                                                                                            style=" border: 2px solid #2b3c4d;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td width="10"></td>
                                                                                                    <td height="30"
                                                                                                        align="center"
                                                                                                        style="font-family: 'Lato', sans-serif; font-size:14px; font-weight: 300; color:#2b3c4d;">
                                                                                                        <a href="#"
                                                                                                            style="color: #2b3c4d;">Learn
                                                                                                            More</a>
                                                                                                    </td>
                                                                                                    <td width="10"></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>


                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="20"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>


                                <!-- END PRICING TABLE -->


                                <!-- START FOOTER -->

                                <tr>
                                    <td align="center">
                                        <table align="center" width="100%" border="0" cellspacing="0" cellpadding="0"
                                            style=" border-left: 1px solid #dbd9d9; border-right: 1px solid #dbd9d9;">
                                            <tbody>
                                                <tr>
                                                    <td height="50"></td>
                                                </tr>
                                                <tr>
                                                    <td align="center" bgcolor="#34495e"
                                                        background="https://designmodo.com/demo/emailtemplate/images/footer.jpg"
                                                        height="185">
                                                        <table class="col-600" width="600" border="0" align="center"
                                                            cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="25"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td align="center"
                                                                        style="font-family: 'Raleway',  sans-serif; font-size:26px; font-weight: 500; color:#f1c40f;">
                                                                        Follow us for some cool stuffs</td>
                                                                </tr>


                                                                <tr>
                                                                    <td height="25"></td>
                                                                </tr>



                                                            </tbody>
                                                        </table>
                                                        <table align="center" width="35%" border="0" cellspacing="0"
                                                            cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" width="30%"
                                                                        style="vertical-align: top;">
                                                                        <a href="https://www.facebook.com/designmodo"
                                                                            target="_blank"> <img
                                                                                src="https://designmodo.com/demo/emailtemplate/images/icon-fb.png">
                                                                        </a>
                                                                    </td>

                                                                    <td align="center" class="margin" width="30%"
                                                                        style="vertical-align: top;">
                                                                        <a href="https://twitter.com/designmodo"
                                                                            target="_blank"> <img
                                                                                src="https://designmodo.com/demo/emailtemplate/images/icon-twitter.png">
                                                                        </a>
                                                                    </td>

                                                                    <td align="center" width="30%"
                                                                        style="vertical-align: top;">
                                                                        <a href="https://plus.google.com/+Designmodo/posts"
                                                                            target="_blank"> <img
                                                                                src="https://designmodo.com/demo/emailtemplate/images/icon-googleplus.png">
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>



                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <!-- END FOOTER -->



            </tbody>
        </table>
        <script>
        // <![CDATA[  <-- For SVG support
        if ('WebSocket' in window) {
            (function() {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() ==
                            "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date()
                                .valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function(msg) {
                    if (msg.data == 'reload') window.location.reload();
                    else if (msg.data == 'refreshcss') refreshCSS();
                };
                if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                    console.log('Live reload enabled.');
                    sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                }
            })();
        } else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
        // ]]>
        </script>
    </div>
    <form id="test-form" class="test-form" action="//grapes.16mb.com/s" method="POST" style="display:none">
        <div class="putsmail-c">
            <a href="https://putsmail.com/" target="_blank">
                <img src="<?php echo base_url();?>assets/lead/builder_assets/img/putsmail.png" style="opacity:0.85;" />
            </a>
            <div class="gjs-sm-property" style="font-size: 10px">
                Test delivering offered by <a class="nl-link" href="https://litmus.com/" target="_blank">Litmus</a> with
                <a class="nl-link" href="https://putsmail.com/" target="_blank">Putsmail</a>
                <span class="form-status" style="opacity: 0">
                    <i class="fa fa-refresh anim-spin" aria-hidden="true"></i>
                </span>
            </div>
        </div>
        <div class="gjs-sm-property">
            <div class="gjs-field">
                <span id="gjs-sm-input-holder">
                    <input type="email" name="email" placeholder="Email" required>
                </span>
            </div>
        </div>

        <div class="gjs-sm-property">
            <div class="gjs-field">
                <span id="gjs-sm-input-holder">
                    <input type="text" name="subject" placeholder="Subject" required>
                </span>
            </div>
        </div>
        <input type="hidden" name="body">
        <button class="gjs-btn-prim gjs-btn-import" style="width: 100%">SEND</button>
    </form>




    <div style="display: none">
        <div class="gjs-logo-cont">
            <a href="."><img class="gjs-logo" src="<?php echo base_url();?>assets/lead/builder_assets/images/logo.svg"></a>
            <div class="gjs-logo-version"></div>
        </div>
    </div>



    <div class="ad-cont">
        <div id="native-carbon"></div>
        <script async type="text/javascript" src="<?php echo base_url();?>assets/lead/builder_assets/js/carbon-v2.js"></script>
    </div>


    <script type="text/javascript">
    var host = 'https://grapesjs.com/';

    // Set up GrapesJS editor with the Newsletter plugin
    var editor = grapesjs.init({
        selectorManager: {
            componentFirst: true
        },
        clearOnRender: true,
        height: '100%',
        storageManager: {
            options: {
                local: {
                    key: 'gjsProjectNl'
                }
            }
        },
        assetManager: {
            assets: [
                host + '<?php echo base_url();?>assets/lead/builder_assets/images/logo.svg',
                host + 'img/tmp-blocks.jpg',
                host + 'img/tmp-tgl-images.jpg',
                host + 'img/tmp-send-test.jpg',
                host + 'img/tmp-devices.jpg',
            ],
            upload: false,
            uploadText: 'Uploading is not available in this demo',
        },
        container: '#gjs',
        fromElement: true,
        plugins: ['grapesjs-preset-newsletter', 'gjs-plugin-ckeditor'],
        pluginsOpts: {
            'grapesjs-preset-newsletter': {
                modalLabelImport: 'Paste all your code here below and click import',
                modalLabelExport: 'Copy the code and use it wherever you want',
                codeViewerTheme: 'material',
                importPlaceholder: '<table class="table"><tr><td class="cell">Hello world!</td></tr></table>',
                cellStyle: {
                    'font-size': '12px',
                    'font-weight': 300,
                    'vertical-align': 'top',
                    color: 'rgb(111, 119, 125)',
                    margin: 0,
                    padding: 0,
                }
            },
            'gjs-plugin-ckeditor': {
                position: 'center',
                options: {
                    startupFocus: true,
                    extraAllowedContent: '*(*);*{*}', // Allows any class and any inline style
                    allowedContent: true, // Disable auto-formatting, class removing, etc.
                    enterMode: CKEDITOR.ENTER_BR,
                    extraPlugins: 'sharedspace,justify,colorbutton,panelbutton,font',
                    toolbar: [{
                            name: 'styles',
                            items: ['Font', 'FontSize']
                        },
                        ['Bold', 'Italic', 'Underline', 'Strike'],
                        {
                            name: 'paragraph',
                            items: ['NumberedList', 'BulletedList']
                        },
                        {
                            name: 'links',
                            items: ['Link', 'Unlink']
                        },
                        {
                            name: 'colors',
                            items: ['TextColor', 'BGColor']
                        },
                    ],
                }
            }
        }
    });


    // Let's add in this demo the possibility to test our newsletters
    var pnm = editor.Panels;
    var cmdm = editor.Commands;
    var md = editor.Modal;

    // Add info command
    var infoContainer = document.getElementById("info-panel");
    cmdm.add('open-info', {
        run: function(editor, sender) {
            var mdlClass = 'gjs-mdl-dialog-sm';
            sender.set('active', 0);
            var mdlDialog = document.querySelector('.gjs-mdl-dialog');
            mdlDialog.className += ' ' + mdlClass;
            infoContainer.style.display = 'block';
            md.open({
                title: 'About this demo',
                content: infoContainer,
            });
            md.getModel().once('change:open', function() {
                mdlDialog.className = mdlDialog.className.replace(mdlClass, '');
            })
        }
    });

    // Add info button
    const iconStyle = 'style="display: block; max-width: 22px"';
    pnm.addButton('options', [{
        id: 'view-info',
        label: `<svg ${iconStyle} viewBox="0 0 24 24">
            <path fill="currentColor" d="M15.07,11.25L14.17,12.17C13.45,12.89 13,13.5 13,15H11V14.5C11,13.39 11.45,12.39 12.17,11.67L13.41,10.41C13.78,10.05 14,9.55 14,9C14,7.89 13.1,7 12,7A2,2 0 0,0 10,9H8A4,4 0 0,1 12,5A4,4 0 0,1 16,9C16,9.88 15.64,10.67 15.07,11.25M13,19H11V17H13M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2Z" />
        </svg>`,
        command: 'open-info',
        attributes: {
            'title': 'About',
            'data-tooltip-pos': 'bottom',
        },
    }]);

    // Beautify tooltips
    [
        ['sw-visibility', 'Show Borders'],
        ['preview', 'Preview'],
        ['fullscreen', 'Fullscreen'],
        ['export-template', 'Export'],
        ['undo', 'Undo'],
        ['redo', 'Redo'],
        ['gjs-open-import-template', 'Import'],
        ['gjs-toggle-images', 'Toggle images'],
        ['canvas-clear', 'Clear canvas']
    ].forEach(function(item) {
        pnm.getButton('options', item[0]).set('attributes', {
            title: item[1],
            'data-tooltip-pos': 'bottom'
        });
    });
    // [
    //   ['open-sm', 'Style Manager'],
    //   ['open-layers', 'Layers'],
    //   ['open-blocks', 'Blocks']
    // ].forEach(function(item) {
    //   pnm.getButton('views', item[0]).set('attributes', { title: item[1], 'data-tooltip-pos': 'bottom', title2: item[1] });
    //   console.log('views', item[0], pnm.getButton('views', item[0]).get('attributes'))
    // });

    var titles = document.querySelectorAll('*[title]');
    for (var i = 0; i < titles.length; i++) {
        var el = titles[i];
        var title = el.getAttribute('title');
        title = title ? title.trim() : '';
        if (!title)
            break;
        el.setAttribute('data-tooltip', title);
        el.setAttribute('title', '');
    }

    // Update canvas-clear command
    cmdm.add('canvas-clear', function() {
        if (confirm('Are you sure to clean the canvas?')) {
            editor.runCommand('core:canvas-clear')
            setTimeout(function() {
                localStorage.clear()
            }, 0)
        }
    });

    // Do stuff on load
    editor.on('load', function() {
        // Show borders by default
        pnm.getButton('options', 'sw-visibility').set('active', 1);

        // Show logo with the version
        var logoCont = document.querySelector('.gjs-logo-cont');
        document.querySelector('.gjs-logo-version').innerHTML = 'v' + grapesjs.version;
        var logoPanel = document.querySelector('.gjs-pn-commands');
        logoPanel.appendChild(logoCont);
    });
    </script>
    <script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-74284223-1', 'auto');
    ga('send', 'pageview');


    function getInline() {
        $('#template').val(editor.Commands.run('gjs-get-inlined-html'));
        alert('Export successfully!');
    }
    </script>
    


<script src="<?php echo base_url();?>assets/lead/front_assets/assets/js/jquery.min.js"></script>
<script>
$('#btnSubmit').click(function () {
        if($('#template').val() == '' ) {
            confirm('Please Click Export Button');
          
        } else {

        }
});
</script>
</body>

</html>