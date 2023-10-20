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
                            <a href="<?php echo base_url();?>sales/setup/list_template"><img
                                    src="<?php echo base_url();?>assets/lead/front_assets/assets/images/left-arrow (1).png"></a>
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

        <body
            style="text-align: center; margin: 0; padding-top: 10px; padding-bottom: 10px; padding-left: 0; padding-right: 0; -webkit-text-size-adjust: 100%;background-color: #f2f4f6; color: #000000"
            align="center">

            <!-- Fallback force center content -->
            <div style="text-align: center;">


                <!-- Start container for logo -->
                <table align="center"
                    style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;"
                    width="600">
                    <tbody>
                        <tr>
                            <td style="width: 596px; vertical-align: top; padding-left: 0; padding-right: 0; padding-top: 15px; padding-bottom: 15px;"
                                width="596">

                                <!-- Your logo is here -->
                                <img style="width: 180px; max-width: 180px; height: 85px; max-height: 85px; text-align: center; color: #ffffff;"
                                    alt="Logo"
                                    src="https://fullsphere.co.uk/misc/free-template/images/logo-white-background.jpg"
                                    align="center" width="180" height="85">

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End container for logo -->

                <!-- Hero image -->
                <img style="width: 600px; max-width: 600px; height: 350px; max-height: 350px; text-align: center;"
                    alt="Hero image" src="https://fullsphere.co.uk/misc/free-template/images/hero.jpg" align="center"
                    width="600" height="350">
                <!-- Hero image -->

                <!-- Start single column section -->
                <table align="center"
                    style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;"
                    width="600">
                    <tbody>
                        <tr>
                            <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 40px;"
                                width="596">

                                <h1
                                    style="font-size: 20px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 600; text-decoration: none; color: #000000;">
                                    Single column, dolor sit amet shadab</h1>

                                <p
                                    style="font-size: 15px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis ante sed
                                    imperdiet euismod. Vivamus fermentum bibendum turpis, et tempor dui. Sed vitae
                                    lectus egestas, finibus purus ac, rutrum mauris.</p>

                                <p
                                    style="font-size: 15px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">
                                    You can download this template <a target="_blank"
                                        style="text-decoration: underline; color: #000000;"
                                        href="https://fullsphere.co.uk/misc/free-template/html-email-template.zip"
                                        download="HTML Email Template"><u>here</u></a></p>

                                <!-- Start button (You can change the background colour by the hex code below) -->
                                <a href="#" target="_blank"
                                    style="background-color: #000000; font-size: 15px; line-height: 22px; font-family: 'Helvetica', Arial, sans-serif; font-weight: normal; text-decoration: none; padding: 12px 15px; color: #ffffff; border-radius: 5px; display: inline-block; mso-padding-alt: 0;">
                                    <!--[if mso]>
                  <i style="letter-spacing: 25px; mso-font-width: -100%; mso-text-raise: 30pt;">&nbsp;</i>
                <![endif]-->

                                    <span style="mso-text-raise: 15pt; color: #ffffff;">Learn more</span>
                                    <!--[if mso]>
                  <i style="letter-spacing: 25px; mso-font-width: -100%;">&nbsp;</i>
                <![endif]-->
                                </a>
                                <!-- End button here -->

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End single column section -->

                <!-- Start image -->
                <img style="width: 600px; max-width: 600px; height: 240px; max-height: 240px; text-align: center;"
                    alt="Image" src="https://fullsphere.co.uk/misc/free-template/images/image-2.jpg" align="center"
                    width="600" height="240">
                <!-- End image -->

                <!-- Start heading for double column section -->
                <table align="center"
                    style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;"
                    width="600">
                    <tbody>
                        <tr>
                            <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 0;"
                                width="596">

                                <h1
                                    style="font-size: 20px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 600; text-decoration: none; color: #000000; margin-bottom: 0;">
                                    Double column, dolor sit amet</h1>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End heading for double column section -->

                <!-- Start double column section -->
                <table align="center"
                    style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #ffffff;"
                    width="600">
                    <tbody>
                        <tr>
                            <td style="width: 252px; vertical-align: top; padding-left: 30px; padding-right: 15px; padding-top: 0; padding-bottom: 30px; text-align: center;"
                                width="252">

                                <p
                                    style="font-size: 15px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">
                                    Vivamus felis velit, iaculis eu eros sed, consequat viverra libero. Aliquam ipsum
                                    eros, imperdiet eget fermentum eget, cursus a sapien.</p>

                            </td>

                            <td style="width: 252px; vertical-align: top; padding-left: 15px; padding-right: 30px; padding-top: 0; padding-bottom: 30px; text-align: center;"
                                width="252">
                                <p
                                    style="font-size: 15px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">
                                    Pellentesque mollis bibendum sollicitudin. Aenean tempor eros at risus mollis
                                    gravida. Aenean in urna eget elit pretium ultrices eu vitae elit.</p>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End double column section -->

                <!-- Start image -->
                <img style="width: 600px; max-width: 600px; height: 240px; max-height: 240px; text-align: center;"
                    alt="Image" src="https://fullsphere.co.uk/misc/free-template/images/image-3.jpg" align="center"
                    width="600" height="240">
                <!-- End image -->

                <!-- Start footer -->
                <table align="center"
                    style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #000000;"
                    width="600">
                    <tbody>
                        <tr>
                            <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 30px;"
                                width="596">

                                <!-- Your inverted logo is here -->
                                <img style="width: 180px; max-width: 180px; height: 85px; max-height: 85px; text-align: center; color: #ffffff;"
                                    alt="Logo"
                                    src="https://fullsphere.co.uk/misc/free-template/images/logo-black-background.jpg"
                                    align="center" width="180" height="85">

                                <p
                                    style="font-size: 13px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #ffffff;">
                                    Address line 1, London, L2 4LN
                                </p>

                                <p
                                    style="margin-bottom: 0; font-size: 13px; line-height: 24px; font-family: 'Helvetica', Arial, sans-serif; font-weight: 400; text-decoration: none; color: #ffffff;">
                                    <a target="_blank" style="text-decoration: underline; color: #ffffff;"
                                        href="www.example.com">
                                        www.example.com
                                    </a>
                                </p>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End footer -->

                <!-- Start unsubscribe section -->
                <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px;"
                    width="600">
                    <tbody>
                        <tr>
                            <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 30px;"
                                width="596">

                                <p
                                    style="font-size: 12px; line-height: 12px; font-family: 'Helvetica', Arial, sans-serif; font-weight: normal; text-decoration: none; color: #000000;">
                                    Not wanting to receive these emails?
                                </p>

                                <p
                                    style="font-size: 12px; line-height: 12px; font-family: 'Helvetica', Arial, sans-serif; font-weight: normal; text-decoration: none; color: #000000;">
                                    You can <a style="text-decoration: underline; color: #000000;"
                                        href="insert-unsubscribe-link-here"><u>unsubscribe here</u></a>
                                </p>

                                <p
                                    style="font-size: 12px; line-height: 12px; font-family: 'Helvetica', Arial, sans-serif; font-weight: normal; text-decoration: none; color: #919293; margin-top: 30px;">
                                    Email template built by <a style="text-decoration: none; color: #919293;"
                                        href="#"><u>FullPage</u></a>
                                </p>

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- End unsubscribe section -->

            </div>
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
                                elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (
                                    new Date().valueOf());
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