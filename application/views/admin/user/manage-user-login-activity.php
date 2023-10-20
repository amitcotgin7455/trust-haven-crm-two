<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/status_checkbox.css">
<main class="security-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <!-- Aside section started -->
                <?php require_once(APPPATH . "views/admin/include/sidebar.php"); ?>
                <!-- Aside section end -->
            </div>
            <div class="col-lg-10 mt-4">
                <div class="row">
                    <!-- table code start  -->
                    <div class="col-lg-12">
                        <div class="card permission-categories">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="tab-content w-100" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                            <table class="table table-hover table-responsive mt-3" id="user_list">
                                                <thead>
                                                    <tr>
                                                        <th width="5%"><input type="checkbox" id="checkall"></th>
                                                        <th width="5%">S no.</th>
                                                        <th>Name <?php echo $segment;?></th>
                                                        <th>Role</th>
                                                        <th>Ip Address</th>
                                                        <th>User Agent</th>
                                                        <th>Pincode</th>
                                                        <th>City</th>
                                                        <th>Device</th>
                                                        <th>Operting system</th>
                                                        <th>Login</th>
                                                        <th>Logout</th>
                                                        <th>Activity</th>
                                                    </tr>
                                                </thead>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input id="myInput" type="text" placeholder="Search.." class="form-control">
                                                    </div>
                                                    <div class="col-md-6 dayschange" style="display: none;">
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <input type="number" name="days" id="days" placeholder="Enter Days" class="form-control">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="submit" id="update-days" class="btn btn-primary">
                                                            </div>
                                                        </div>
                                                        <span class="text-danger daysvalid"></span>
                                                        <span class="text-success daysupdate"></span>
                                                    </div>
                                                </div>
                                                <tbody id="myTable">
                                                    <?php if (!empty($result)) {
                                                        
                                                        $n = $segment + 1;
                                                        $login_status = "";
                                                        foreach ($result as $row) { 
                                                            switch($row->login_status)
                                                            {
                                                                case 1 : $login_status = 'First Time Login';
                                                                break;
                                                                case 2 : $login_status = 'Logged in';
                                                                break;
                                                                case 3 : $login_status = 'Logout';
                                                                break;
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td><input type="checkbox" value="<?= $row->id; ?>" class="cb-element"></td>
                                                                <td><?= $n ?></td>
                                                                <td><?= $row->username ?></td>
                                                                <td><?= $row->role ?></td>
                                                                <td><?= $row->ip_address ?></td>
                                                                <td><?= $row->user_agent ?></td>
                                                                <td><?= $row->postal ?></td>
                                                                <td><?= $row->city ?></td>
                                                                <td><?= $row->device_name ?></td>
                                                                <td><?= $row->os_name ?></td>
                                                                <td><?php if($row->login_status==1 || $row->login_status==2) { echo date('M d Y H:i:s',strtotime($row->login_date)); } else { echo ''; } ?></td>
                                                                <td><?= ($row->login_status==3)?date('M d Y H:i:s',strtotime($row->login_date)):''; ?></td>
                                                                <td><?= $row->expiry_days ?></td>
                                                                <td><?= $row->location ?></td>
                                                                <td  class="text-center"><?=$login_status?></td>

                                                            </tr>
                                                    <?php $n++;
                                                        }
                                                    } ?>
                                                </tbody>
                                            </table>
                                            <?php echo $links; ?>
                                            <!-- <nav aria-label="Page navigation example" class="float-end">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link prev" href="#">Previous</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link next" href="#">Next</a>
                                                    </li>
                                                </ul>
                                            </nav> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- table code close  -->
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


<script>
    $(".user_status").on('change', function() {
        if ($(this).is(':checked')) {
            var user_id = $(this).attr('data-id');
            var status = 1;
            var status_type = "Activated";
        } else {
            var user_id = $(this).attr('data-id');
            var status = 2;
            var status_type = "InActive";
        }
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>user_management/user_update_status",
            data: {
                id: user_id,
                status: status,
            },
            success: function(data) {
                setTimeout(function() {
                    swal({
                        title: "Done!",
                        text: status_type,
                        type: "success"
                    }, function() {
                        location.reload();
                    });
                }, 100);
            }
        });
    })
    $(".user_deleted").on('click', function() {
        var user_id = $(this).attr('data-id');
        var status = 3;
        var status_type = "Deleted";
        swal({
            title: "Are you sure?",
            text: "User Delete!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, I am sure!',
            cancelButtonText: "No, cancel it!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url() ?>user_management/user_update_status",
                    data: {
                        id: user_id,
                        status: status,
                    },
                    success: function(data) {
                        setTimeout(function() {
                            swal({
                                title: "Done!",
                                text: status_type,
                                type: "success"
                            }, function() {
                                location.reload();
                            });
                        }, 100);
                    }
                });
            } else {
                swal("Cancelled", "User Not Deleted", "error");
                e.preventDefault();
            }
        });
    });

    $('#agent_name').on('input', function() {
        var agent_name = $(this).val();
        var split_name = agent_name.split(' ');
        var username = split_name[0].toLowerCase() + '.ths';
        if (username) {
            $('#username').val(username);
        }
    })
    $(document).ready(function() {
        $('#user_list').DataTable({
            search: {
                return: true,
            },
        });
    });
</script>
<!-- check all script  -->
<script>
    $('#checkall').click(function() {
        $('.cb-element').prop('checked', this.checked);
        toggleUpdateButton();
    });
    // Individual checkbox
    $('.cb-element').change(function() {
        toggleUpdateButton();
    });
    //show delete button
    function toggleUpdateButton() {
        var checkedCheckboxes = $('.cb-element:checked');
        if (checkedCheckboxes.length > 0) {
            $('.dayschange').show();
        } else {
            $('.dayschange').hide();
        }
    }
    // update days 
    $("#update-days").click(function() {
        let userid = [];
        if ($("#days").val() == '') {
            $(".daysvalid").text('Please Enter The Updated Days');
            return false;
        } else {
            let days = $("#days").val();
            let id = [];
            $(".cb-element:checkbox:checked").each(function(i) {
                id[i] = $(this).val();
                userid.push(id[i]);
            });
            $.ajax({
                url: "<?php echo base_url(); ?>User_management/updateuserdays",
                type: "POST",
                data: {
                    id: userid,
                    days: days
                },
                success: function(data) {
                    $(".daysvalid").text('');
                    $(".daysupdate").text(data);
                    window.location.reload();
                },
            });
        }
    });
</script>