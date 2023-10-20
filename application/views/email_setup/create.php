<!-- Main section started -->
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
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                Email Setup
                            </div>
                            <div class="card-body">
                                <?php echo form_open('email-setup/store'); ?>
                                <div class="row mt-3">
                                    <div class="form-group col-md-6">
                                        <div class="">
                                            <label class="form-label">Name</label>
                                            <input class="form-control" name="sender_name" type="text" placeholder="Enter Name" value="<?php if($edit_id) { echo $email_info->sender_name; } else { echo set_value('sender_name'); } ?>">
                                        </div>
                                        <span class="text-danger" style="font-size: 13px;"> <?php echo form_error('sender_name'); ?></span>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="">
                                            <label class="form-label">Sender Email </label>
                                            <input class="form-control" name="sender_email" type="email" placeholder="Enter Sender Email" value="<?php if($edit_id) { echo $email_info->sender_email; } else { echo set_value('sender_email'); } ?>">
                                        </div>
                                        <span class="text-danger" style="font-size: 13px;"> <?= form_error('sender_email'); ?></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="">
                                            <label class="form-label">Organization Phone No </label>
                                            <input class="form-control" name="organization_phone" type="text" placeholder="Enter Organization Phone No" value="<?php if($edit_id) { echo $email_info->organization_phone; } else { echo set_value('organization_phone'); } ?>">
                                        </div>
                                        <span class="text-danger" style="font-size: 13px;"> <?= form_error('organization_phone'); ?></span>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <div class="">
                                            <label class="form-label">Status</label>
                                            <select name="sender_status" class="form-select">
                                                <option value="1" <?php if(@$email_info->status==1) { echo 'selected'; } ?>>Active</option>
                                                <option value="2" <?php if(@$email_info->status==2) { echo 'selected'; } ?>>Inactive</option>
                                            </select>
                                        </div>
                                        <span class="text-danger" style="font-size: 13px;"> <?= form_error('sender_status'); ?></span>
                                    </div>
                                </div>
                                <?php if($edit_id) { ?>
                                    <input type="hidden" value="<?= $edit_id; ?>" name="edit_id">
                                    <?php } ?>
                                <button type="submit" name="create_mail" class="btn btn_save my-3 float-start" id="user_info_btn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                Email List
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="10px">S no.</th>
                                            <th>Sender Name</th>
                                            <th>Sender Email</th>
                                            <th>Organization Phone No</th>
                                            <th width="10px">Active Email</th>
                                            <th width="10px">Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($emailData)) {
                                            $i = 1;
                                            foreach ($emailData as $row) {
                                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $row->sender_name ?></td>
                                                <td><?= $row->sender_email ?></td>
                                                <td><?= $row->organization_phone ?></td>
                                                <td>
                                                    <label class="switch"><input type="checkbox" class="status_email" data-id="<?= $row->id ?>" <?php if ($row->sender_status == 1) { echo 'checked'; } ?>><span class="slider round"></span></label>
                                                </td>
                                                <td>
                                                    <label class="switch"><input type="checkbox" class="status_type" data-id="<?= $row->id ?>" <?php if ($row->status == 1) { echo 'checked'; } ?>><span class="slider round"></span></label>
                                                </td>
                                                <td>
                                                    <!-- <span><a href="javascript:void(0);"><i class="fa-solid fa-pen-to-square text-success icons-i"></i></a></span> -->
                                                    <span><a href="<?= base_url() ?>email-setup/create?edit=<?= base64_encode($row->id) ?>"><i class="fa-solid fa-edit text-secondary"></i> </a></span>
                                                    <span class="sender_deleted" data-id="<?= $row->id ?>"><i class="fa-regular fa-trash-can text-danger icons-i"></i></span>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main section end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script>
    $(document).ready(function() {
        $('.status_email').change(function() {
            let status = $(this).prop('checked') === true ? 1 : 2;
            let selectedID = $(this).data('id');
            let status_type = (status==1)?'Activated':'In Active';
            //console.log('[Selected Button ID: ' + selectedID + ']--[Selected Status Value: ' + status + ']');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo base_url(); ?>backend/Email_setup/update_status",
                data: {'status': status,'sender_id': selectedID},
                success: function(data) {
                    console.log(data);
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
            if (status === 1) {
                $('.status_email').not(this).prop('checked', false);
            }
        });
    });
    //status
    $('.status_type').change(function() {
        let status = $(this).prop('checked') === true ? 1 : 2;
        let selectedID = $(this).data('id');
        let status_message = (status==1)? 'Activated':'In Active';
        //console.log('[Selected Button ID: ' + selectedID + ']--[Selected Status Value: ' + status + ']');
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?php echo base_url(); ?>backend/Email_setup/update_emailstatus",
            data: {'status': status,'status_id': selectedID},
            success: function(data) {
                // console.log(data);
                // $('#msg').html(data);
                setTimeout(function() {
                swal({
                    title: "Done!",
                    text: data,
                    type: "success"
                }, function() {
                    location.reload();
                });
                }, 100);
            },
            // error: function(xhr, status, error) {
            //     let errorMessage = 'Error occurred while updating status.';
            //     $('#msg').html('<div class="text-danger">' + errorMessage + '</div>');
            // }
        });
    });
    //delete
    $(".sender_deleted").on('click', function() {
    var remote_id = $(this).attr('data-id');
    var status    = 3;
    swal({
        title: "Are you sure?",
        text: "Sender Email status Delete!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes, I am sure!',
        cancelButtonText: "No, cancel it!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function(isConfirm){
        if (isConfirm){
            $.ajax({
                type: "POST",
                url: "<?=base_url()?>backend/Email_setup/sender_delete_status",
                    data: { id : remote_id, status : status },
                    success: function (data) {
                        setTimeout(function() {
                        swal({
                            title: "Done!",
                            text: "Deleted",
                            type: "success"
                        }, function() {
                            location.reload();
                        });
                        }, 100);
                    }
            });
        } else {
            swal("Cancelled", "Remote Status Not Deleted", "error");
            e.preventDefault();    
        }
    });
});
</script>