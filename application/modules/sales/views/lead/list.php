<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<style>
    #sendemailModal {
        --bs-modal-margin: 0px 1.75rem 1.75rem 1.75rem;
    }

    #sendemailModal .modal-dialog {
        right: 0;
        left: 0;
    }

    #sendemailModal .modal-dialog .modal-content {
        border: none;
        border-radius: 0 0 10px 10px;
    }

    #sendemailModal .modal-dialog .modal-content .modal-header {

        border-bottom: none;
    }

    #sendemailModal .date-e-mail {
        position: absolute;
        left: 1.5%;
    }

    #sendemailModal .modal-body form.s-email-form label.form-label {
        width: 130px;
    }
</style>
<!-- user table  -->
<section class="customer-header-login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="customer-header d-flex justify-content-between">
                    <div class="right">
                        <div class="btn-group me-3" role="group">
                            <a href="#" class="btn newgraybtn send_email d-none" data-bs-toggle="modal" data-bs-target="#sendemailModal">Send Email </a>
                        </div>
                        <div class="myHeading">
                            <?php if ($role_id == 1 || $role_id == 4) { ?>
                                <form action="<?php echo base_url(); ?>sales/list-lead" method="get">
                                    <div class="form-group">
                                        <select name="data" class="selection" required>
                                            <option value="" class="form-control">Select User</option>
                                            <?php
                                            if (!empty($searchuser)) {
                                                $n = 1;
                                                foreach ($searchuser as $row) { ?>
                                                    <option value="<?php echo  base64_encode($row->id); ?>" class="form-control">
                                                        <?php echo $row->name; ?></option>
                                            <?php
                                                    $n++;
                                                }
                                            }
                                            ?>
                                        </select>

                                        <input type="submit" class="newbutton sendmailgroupbtn primarybtn mR0">
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="left align-items-center">

                        <div class="btn-group me-3" role="group">
                            <a href="<?php echo base_url(); ?>sales/create-lead/" class="btn theme-btn-2 create_lead">Create Leads </a>

                        </div>
                        <div class="btn-group">
                            <div class="dropdown">
                                <button type="button" class="btn newgreybtn dropdown-toggle" data-bs-toggle="dropdown">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>sales/list-massemail/">Mass email </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- send e-mail Modal -->
<div class="popoupform">

</div>


<!-- send e-mail Modal -->
<!-- <div class="modal fade" id="selectemailModal">
    <div class="modal-dialog modal-lg  mx-auto">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><b>Mass Email</b></h3>
            
            </div>
            <div class="modal-body pt-4 pb-5">
               <div class="container">
                   <div class="row">
                        <div class="col-md-12">
                            <form action="" class="s-email-form">
                                    <div class="d-flex">
                                        <div class="py-2">
                                            <label class="form-label">To</label>
                                        </div>
                                        <div class="px-4 py-2">
                                            <p>amitkumar.cotginanalytics@gmail.com</p>                                           
                                        </div>
                                    </div> 
                                    <div class="d-flex">
                                        <div class="py-2">
                                            <label class="form-label">Tamplates</label>
                                        </div>
                                        <div class="px-4 py-2">
                                            <button type="button" class="btn newgraybtn" data-bs-dismiss="modal">Select Tampaltes</button>                                  
                                        </div>
                                    </div>                     
                            </form>                            
                        </div>
                   </div>                      
               </div>
            </div>

            <div class="modal-footer">        
                    <div class="date-e-mail">
                        <p>Email Sent Today: 04-09-2023</p>                               
                    </div>
                    <div class="btn-e-mail">
                        <button type="button" class="btn newgraybtn" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn theme-btn-2">Send</button>
                    </div>
                
            </div>
        </div>
    </div>
</div> -->
<section class="user-table">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-3">
                <div id="leftCol" class="mt-3">
                    <h2 class="heading-filter text-center py-2">Filter Leads by </h2>
                    <div id="content">
                        <!-- <form class='form-inline'>
                            <div class="input-group">
                                <input type='text' id="myInput"  class="form-control search-form" placeholder="Search by name ">
                                <div class="input-group-addon">
                                    <span class="input-group-text bg-white d-block">
                                        <box-icon name='search' id="myInputpost" color='#b31942'></box-icon>
                                    </span>
                                </div>
                            </div>
                        </form> -->
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button ac-text" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    System Defined Filters
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse  " data-bs-parent="#accordionExample">
                                <form action="<?php echo base_url(); ?>sales/list-lead" method="post">
                                    <div class="accordion-body">
                                        <div class="search_box position-relative">
                                            <input class="form-control mb-3 search_filter" type="search" id="gsearch" name="gsearch">
                                        </div>
                                        <div class="form-check user-system-dropdown">
                                            <input class="form-check-input " name="option-1" id="option-1" type="checkbox" value="">
                                            <label class="form-check-label" for="option-1">
                                                Lead Status
                                            </label>
                                            <div class="user-system" id="actions" hidden>
                                                <div class="ac-dropdown d-flex justify-content-around">
                                                    <span class="mt-1" style="font-size: 14px;"> By </span>
                                                    <select class="form-select form-select-md ms-1" aria-label=".form-select-md example" name="lead-status">
                                                        <option value="">Lead Status</option>
                                                        <option value="1">Callback</option>
                                                        <option value="2">Sale</option>
                                                        <option value="3">Not Intersted</option>
                                                        <option value="4">VM</option>
                                                        <option value="5">DND</option>
                                                    </select>
                                                </div>
                                                <div class="second-select d-flex justify-content-evenly mt-2">
                                                    <select class="form-select form-select-md" id="time-range" aria-label=".form-select-ms example" name="time-range">
                                                        <option value="0" selected id="shown">in the last</option>
                                                        <option value="1" id="choose-date">Custom</option>
                                                        <option value="Today" id="gettoday">Today</option>
                                                        <option value="This week" id="getsecond">This week </option>
                                                        <option value="This month">This month</option>
                                                        <option value="This year">This year</option>
                                                        <option value="in the last 30 days">in the last 30 days</option>
                                                        <option value="in the last 60 days">in the last 60 days</option>
                                                        <option value="in the last 90 days">in the last 90 days</option>
                                                    </select>
                                                    <input type="number" id="time-input" name="getnumber" class="center-box form-control getpreoption mx-1">
                                                    <select class="form-select form-select-md" id="time-unit" aria-label=".form-select-ms example" name="getdays">
                                                        <option value="">Select</option>
                                                        <option value="days">days</option>
                                                        <option value="Weeks">Weeks</option>
                                                        <option value="Months">Months</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-1"> <label for="start-date" class="d-none custom-date-label">From:</label>
                                            <input placeholder="Date" class="d-none start-date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="from" />
                                        </div>
                                        <div class="my-2"> <label for="start-date" class="d-none custom-date-label">To: &nbsp;&nbsp;&nbsp;&nbsp; </label>
                                            <input placeholder="Date" class="d-none start-date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="too" />
                                        </div>
                                        <div class="form-question">
                                            <div class="form-question__title">
                                                <span> Date of Sale</span>
                                            </div>
                                            <div class="input-group date">
                                                <input type="date" class="form-control" name="date-data-sale">
                                                <div class="input-group-addon">
                                                    <span class="input-group-text bg-white d-block">
                                                        <box-icon name='calendar' type='solid' color='#202123'></box-icon>
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="footerLV footerActionEle">
                                        <lyte-button class="mL0" id="applyBtn" final-class="lyte-button lytePrimaryBtn" lyte-rendered=""><template is="registerYield" yield-name="text"></template>
                                            <button type="submit" class="lyte-button lytePrimaryBtn" value="" tabindex="" id="" name="" style="">
                                                <lyte-yield yield-name="text">Apply Filter</lyte-yield>
                                            </button>
                                        </lyte-button>
                                        <a href="<?php echo base_url(); ?>sales/list-lead">
                                            <span id="clearBtn" class="clear newgraybtn dIB" cursor="pointer" click="crm-custom-filter => clearAllFilter(isFromModal,module_info.api_name)">Clear</span>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-10 col-lg-9">
                <div class="mt-3">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="text-center">Lead Data </h2>
                                </div>
                            </div>
                        </div>
                        <div class="d-none Show-delete-email-draft">
                            <span class="mx-3 print_count_seleted_row_draft"></span><span>Seleted Row</span>
                            <span>
                                <button class="btn text-primary d-none cancle_all_draft"><i class="fa fa-close"></i></button>
                                <button class="btn newbutton2 sendmailgroupbtn primarybtn22 mR01 d-none delete_all_draft">
                                    <i class="fa fa-trash"></i> </button>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <?php if (!empty($this->session->flashdata('done'))) { ?>
                                    <div class="alert alert-success" style="background-color:green;color:white;" id="success">
                                        <?php echo $this->session->flashdata('done'); ?>

                                    </div>
                                <?php } ?>
                                <?php if (!empty($this->session->flashdata('error'))) { ?>
                                    <div class="alert alert-danger" style="background-color:red; color:white;" id="error">
                                        <?php echo $this->session->flashdata('error'); ?>

                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <table class="table table-striped display table-hover table-responsive" id="example" style="width:100%">
                            <thead id="data-heading-show">
                                <tr>
                                    <td scope="col" style="width:12px;">
                                        <input type="checkbox" id="master_draft">
                                        <input type="hidden" id="total_lead_record" value="<?=count($result)?>"/>
                                    </td>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Alt Phone No</th>
                                    <!-- <th>Date Of Sale </th> -->
                                    <th class="vertical-align-middle"> Leads Status </th>
                                </tr>
                            </thead>
                            <tbody id="data-show">
                                <?php if (!empty($result)) {
                                    $n = 1;
                                    foreach ($result as $row) {
                                ?>
                                    <tr id="sub_chk_draft">
                                        <td>
                                            <input type="checkbox" class="sub_chk_draft" data-id="<?php echo $row->lead_id; ?>">
                                        </td>
                                        <td><?php echo $n; ?></td>
                                        <td><a href="<?php echo base_url(); ?>sales/update-lead/?id=<?php echo base64_encode($row->lead_id); ?>"><img src="<?php echo base_url(); ?>assets/lead/front_assets/assets/images/user.png" class="avatar" alt="Avatar"> <?php echo $row->name; ?> </a></td>
                                        <td><?php echo $row->last_name; ?> </td>
                                        <td><?php echo $row->email; ?> </td>
                                        <td><?php echo $row->phone; ?></td>
                                        <td><?php echo $row->other_phone; ?></td>
                                        <!-- <td><?php echo date("m-d-Y h:i A", strtotime($row->date_of_sale)); ?></td> -->
                                        <td 
                                            <?php if ($row->lead_status == 2) { echo 'class="text-danger"'; } ?>>
                                            <?php 
                                                if ($row->lead_status == 1) {
                                                    echo 'Callback';
                                                } elseif ($row->lead_status == 2) {
                                                    echo 'Sale';
                                                } elseif ($row->lead_status == 3) {
                                                    echo 'Not interested';
                                                } elseif ($row->lead_status == 4) {
                                                    echo 'VM';
                                                } else {
                                                    echo 'DND';
                                                } 
                                            ?>
                                        </td>
                                    </tr>
                                <?php $n++;
                                    }
                                } ?>
                                <?php ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<input type="text" value="<?php echo $activeSender[0]->id; ?>" class="sender_id1 d-none">
<input type="text" value="<?php echo $user_detail->id; ?>" class="user_id1 d-none">
<input type="text" value="<?php echo $user_detail->name; ?>" class="sent_by_name1 d-none">
<input type="text" value="<?php echo $activeSender[0]->sender_email; ?>" class="sent_by_email1 d-none">
<script>
    $("#success").show();
    setTimeout(function() {
        $("#success").hide();
    }, 2000);
</script>
<script>
    $("#error").show();
    setTimeout(function() {
        $("#error").hide();
    }, 2000);
</script>
<script>
    $(document).ready(function() {

        var $checkboxes = $('#sub_chk_draft td input[type="checkbox"]');
        $checkboxes.change(function() {
            var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
            $('.print_count_seleted_row_draft').text(countCheckedCheckboxes);

        });


        var $checkboxes = $('#sub_chk_draft td input[type="checkbox"]');
        $checkboxes.change(function() {
            var countCheckedCheckboxes = $checkboxes.filter(':unchecked').length;
            $('.print_count_seleted_row_draft').text(countCheckedCheckboxes);

        });


        $('#master_draft').on('click', function(e) {
            countCheckedCheckboxes = 0;
            let total_lead_record = $('#total_lead_record').val();
            if(total_lead_record<1)
            {   
                if($(this).is(':checked', true))
                {
                $('#master_draft').attr('checked', false); // Checks it
                alert('There is no lead to select');
                }
            }
            else
            {
          
            $('.delete_all_draft').removeClass('d-none');
            $('.send_email').removeClass('d-none');
            $('.myHeading').addClass('d-none');
            $('.create_lead').addClass('d-none');
            $('.action').removeClass('d-none');
            $('.cancle_all_draft').removeClass('d-none');
            $('.Show-delete-email-draft').removeClass('d-none');

            if ($(this).is(':checked', true)) {
                $(".sub_chk_draft").prop('checked', true);
                var $checkboxes = $('#sub_chk_draft td input[type="checkbox"]');
                var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
                $('.print_count_seleted_row_draft').text(countCheckedCheckboxes);


            } else {
                $(".sub_chk_draft").prop('checked', false);
                var $checkboxes = $('#sub_chk_draft td input[type="checkbox"]');
                var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
                $('.print_count_seleted_row_draft').text(countCheckedCheckboxes);
                $('.delete_all_draft').addClass('d-none');
                $('.send_email').addClass('d-none');
                $('.myHeading').removeClass('d-none');
                $('.create_lead').removeClass('d-none');
                $('.action').addClass('d-none');
                $('.cancle_all_draft').addClass('d-none');
                $('.Show-delete-email-draft').addClass('d-none');
            }
        }
        });
        $('.sub_chk_draft').on('click', function() {
            var $checkboxes = $('#sub_chk_draft td input[type="checkbox"]');
            var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
            if(countCheckedCheckboxes==0)
            {
            
            $('#master_draft').prop('checked', false);
            $('.send_email').addClass('d-none');
            $('.myHeading').removeClass('d-none');
            $('.action').addClass('d-none');
            $('.create_lead').removeClass('d-none');
            $('.delete_all_draft').addClass('d-none');
            $('.cancle_all_draft').addClass('d-none');
            $(".Show-delete-email-draft").addClass('d-none');
            }
            else
            {    
            $('.send_email').removeClass('d-none');
            $('.myHeading').addClass('d-none');
            $('.action').removeClass('d-none');
            $('.create_lead').addClass('d-none');
            $('.delete_all_draft').removeClass('d-none');
            $('.cancle_all_draft').removeClass('d-none');
            $(".Show-delete-email-draft").removeClass('d-none');
            }

        });
        $('.cancle_all_draft').on('click', function() {
            $('.send_email').addClass('d-none');
            $('.myHeading').removeClass('d-none');
            $('.action').addClass('d-none');
            $('.create_lead').removeClass('d-none');
            $('.delete_all_draft').addClass('d-none');
            $('.cancle_all_draft').addClass('d-none');
            $('.Show-delete-email-draft').addClass('d-none');

            if ($(this).is(':checked', true)) {
                $(".sub_chk_draft").prop('checked', true);

            } else {
                $(".sub_chk_draft").prop('checked', false);
            }
            if ($(this).is(':checked', true)) {
                $("#master_draft").prop('checked', true);
            } else {
                $("#master_draft").prop('checked', false);
            }
        });

        $('.delete_all_draft').on('click', function(e) {
            var allVals = [];
            $(".sub_chk_draft:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });
            if (allVals.length <= 0) {
                alert("Please select row.");
            } else {
                var check = confirm("Are you sure you want to delete this row?");
                if (check == true) {

                    var join_selected_values = allVals.join(",");

                    $.ajax({
                        url: "<?php echo base_url(); ?>sales/Lead/deletelead",
                        type: 'POST',
                        data: 'ids=' + join_selected_values,
                        success: function(data) {
                            console.log(data);
                            $(".sub_chk_draft:checked").each(function() {
                                $(this).parents("tr").remove();
                            });
                            alert("Deleted Lead Row successfully.");
                            location.reload();
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });

                    $.each(allVals, function(index, value) {
                        $('table tr').filter("[data-row-id='" + value + "']").remove();
                    });
                }
            }
        });

    });
</script>
<script>
    // select date filter 
    function SelectDate() {
        let pickedDate = $("#filter_date_get").val();
        $.ajax({
            url: '<?php echo base_url(); ?>Lead/selectdate',
            type: 'post',
            async: false,
            dataType: 'json',
            data: {
                date: pickedDate,
            },
            success: function(data) {
                var html = '';
                var html1 = '';
                var i;
                for (let i = 1; i < data.length; i++) {
                    html1 =
                        '<tr>' +
                        // '<th>' +'ID'+'</th>'+
                        '<th>' + '#' + '</th>' +
                        '<th>' + 'Name' + '</th>' +
                        '<th>' + 'Email' + '</th>' +
                        '<th>' + 'Phone' + '</th>' +
                        '<th>' + 'Second Phone' + '</th>' +
                        '<th>' + 'Date Of Sale' + '</th>' +
                        '<th>' + 'Lead Status' + '</th>' +
                        '<tr>';

                    html +=
                        '<tr>' +
                        // '<td>' +data[i].name +'</td>'+
                        '<td>' + i + '</td>' +
                        '<td>' + data[i].name + '</td>' +
                        '<td>' + data[i].email + '</td>' +
                        '<td>' + data[i].phone + '</td>' +
                        '<td>' + data[i].other_phone + '</td>' +
                        '<td>' + data[i].date_of_sale + '</td>' +
                        '<td>' + data[i].lead_status + '</td>' +
                        '<tr>';

                }

                $('#data-show').html(html);
                $('#data-heading-show').html(html1);

            },
        });
    }

    // select lead status filter 
    $('#dropdown_selector').change(function() {
        var $option = $(this).find('option:selected');
        var value = $option.val();
        $.ajax({
            url: '<?php echo base_url(); ?>Lead/selectstatus',
            type: 'post',
            async: false,
            dataType: 'json',
            data: {
                lead_status: value,
            },
            success: function(data) {
                var html = '';
                var html1 = '';
                var i;
                for (let i = 1; i < data.length; i++) {
                    html1 =
                        '<tr>' +
                        // '<th>' +'ID'+'</th>'+
                        '<th>' + '#' + '</th>' +
                        '<th>' + 'Name' + '</th>' +
                        '<th>' + 'Email' + '</th>' +
                        '<th>' + 'Phone' + '</th>' +
                        '<th>' + 'Second Phone' + '</th>' +
                        '<th>' + 'Date Of Sale' + '</th>' +
                        '<th>' + 'Lead Status' + '</th>' +
                        '<tr>';

                    html +=
                        '<tr>' +
                        // '<td>' +data[i].name +'</td>'+
                        '<td>' + i + '</td>' +
                        '<td>' + data[i].name + '</td>' +
                        '<td>' + data[i].email + '</td>' +
                        '<td>' + data[i].phone + '</td>' +
                        '<td>' + data[i].other_phone + '</td>' +
                        '<td>' + data[i].date_of_sale + '</td>' +
                        '<td>' + data[i].lead_status + '</td>' +
                        '<tr>';

                }
                $('#data-show').html(html);
                $('#data-heading-show').html(html1);
            },

        });
    });

    // search name and any value 
</script>
<script>
    $(document).ready(function() {
        $('#time-range').change(function() {
            var selectedOption = $(this).find('option:selected').val();
            if (selectedOption == 1) {
                $('#time-range').siblings('select, input').not('#time-range').hide();
                $('.custom-date-label').removeClass("d-none");
                $('.start-date').removeClass("d-none");

            } else {
                if (selectedOption != 0 && selectedOption != 1) {
                    $('.custom-date-label').addClass("d-none");
                    $('.start-date').addClass("d-none");
                    $('#time-range').siblings('select, input').not('#time-range').hide();
                } else {
                    if (selectedOption == 0) {
                        $('#time-input').show();
                        $('#time-unit').show();
                        $('.custom-date-label').addClass("d-none");
                        $('.start-date').addClass("d-none");
                    }
                }
            }
        });

    });
</script>
<script>
    // send email popup form 
    $(".send_email").click(function() {
        var allVals = [];
        $(".sub_chk_draft:checked").each(function() {
            allVals.push($(this).attr('data-id'));
        });
        var join_selected_values = allVals.join(",");
        var module_type = 1;
        var sender_id = $(".sender_id1").val();
        var sent_by_name = $(".sent_by_name1").val();
        var sent_by_email = $(".sent_by_email1").val();
        var user_id = $(".user_id1").val();
        $.ajax({
            url: "<?php echo base_url() ?>sales/lead/mailForm",
            type: "post",
            data: {
                ids: join_selected_values
            },
            success: function(data) {
                $('.popoupform').html(data);
                $('.email_id').val(join_selected_values);
                $('.sender_id').val(sender_id);
                $('.sent_by_email').val(sent_by_email);
                $('.sent_by_name').val(sent_by_name);
                $('.user_id').val(user_id);
                $('.module_type').val(module_type);
            },
        });
    });
</script>