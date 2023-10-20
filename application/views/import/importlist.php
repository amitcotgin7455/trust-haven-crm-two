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
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <?php if (!empty($this->session->flashdata('success'))) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php } ?>
                                <?php if (!empty($this->session->flashdata('error'))) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                                <?php } ?>
                                <div class="text-success"  id="success"></div>
                                <div class="text-danger"  id="error"></div>
                                <div class="d-flex align-items-start">
                                    <div class="tab-content w-100" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                            <div class="row">   
                                                <form  method="post" enctype="multipart/form-data" id="form-upload-user">
                                                    <div class="row mt-3">
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Download Sample File</label> <br>
                                                                <a href="<?=base_url()?>documents/file/sample.xlsx" download> <span class="btn btn-primary">Click Here To Download</span></a>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Select Sale User</label>
                                                                <select name="user_id" class="form-select" required id="select-user">
                                                                    <option value="" >Select User</option>
                                                                    <?php if(!empty($getsaleuser)){
                                                                     foreach($getsaleuser as $user){?>
                                                                    <option value="<?=$user->id?>"><?=$user->name?></option>
                                                                    <?php }} ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Choose File</label>
                                                                <input type="file" class="form-control form-control-sm" id="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                                                                <small class="text-danger">Upload excel or csv file only.</small>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Status</label>
                                                                <select name="status" class="form-select" id="status">
                                                                    <option value="1" <?php if(@$permission_cat->status==1) { echo 'selected'; } ?>>Active</option>
                                                                    <option value="2" <?php if(@$permission_cat->status==2) { echo 'selected'; } ?>>InActive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn_save my-3 float-start" id="user_info_btn" >Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script>
    $(document).ready(function() {
        $("body").on("submit", "#form-upload-user", function(e) {
            e.preventDefault();
            var data = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('Import/import') ?>",
                data: data,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function() {
                   // $("#btnUpload").prop('disabled', true);
                    $(".user-loader").show();
                }, 
                success: function(result) {

                    if($.isEmptyObject(result.error_message)) {
                        $("#success").html(result.success_message);
                    } else {
                        $("#error").html(result.error_message);
                    }
                }
            });
        });
    });
</script>
<script>
$(".permission_cat").on('change', function() {
  if ($(this).is(':checked')) {
    var permission_category_id = $(this).attr('data-id');
    var status    = 1;
    var status_type      = "Activated";
  } else {
    var permission_category_id = $(this).attr('data-id');
    var status = 2;
    var status_type  = "InActive";
  }
  $.ajax({
				type: "POST",
				url: "<?=base_url()?>security/permissionCat_update_status",
				data: {
					id     : permission_category_id,
					status : status,
				},
				success: function (data) {
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
$(".category_deleted").on('click', function() {
    var permission_category_id = $(this).attr('data-id');
    var status    = 3;
    var status_type      = "Deleted";
    swal({
    title: "Are you sure?",
    text: "Permission Category Delete!",
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
				url: "<?=base_url()?>security/permissionCat_update_status",
				data: {
					id     : permission_category_id,
					status : status,
				},
				success: function (data) {
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
        }
        else
        {
            swal("Cancelled", "Permission Category Status Not Deleted", "error");
            e.preventDefault();    
        }
    });

});

</script>
