
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
                                <div class="d-flex align-items-start">
                                    <div class="tab-content w-100" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                            <div class="row">
                                                <form action="<?php echo base_url('custom_field/addSale'); ?>" method="POST">
                                                    <div class="row mt-3">
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Sale Status</label>
                                                                <input type="text" class="form-control" name="title" value="<?php if($edit_id) { echo $sale_status->title; } else { echo set_value('title'); } ?>">
                                                                <?php
                                                                if($edit_id)
                                                                {
                                                                ?>
                                                                <input type="hidden" value="<?=$edit_id?>" name="edit_id">
                                                                <?php
                                                                 } 
                                                                 ?>
                                                                <span class="text-danger"><?php echo form_error('title'); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Status</label>
                                                                <select name="status" class="form-select">
                                                                    <option value="1" <?php if(@$sale_status->status==1) { echo 'selected'; } ?>>Active</option>
                                                                    <option value="2" <?php if(@$sale_status->status==2) { echo 'selected'; } ?>>InActive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn_save my-3 float-start" id="user_info_btn">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- table code start  -->
                    <div class="col-lg-6">
                        <div class="card permission-categories">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="tab-content w-100" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                            <table class="table table-hover table-responsive mt-3">
                                                <thead>
                                                    <tr>
                                                        <th>S no.</th>
                                                        <th>Title</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <div class="col-md-4">
                                                    <input id="myInput" type="text" placeholder="Search.." class="form-control"> 
                                                </div>
                                                <tbody id="myTable">
                                                    <?php if (!empty($result)) {
                                                        
                                                        $n = $segment+1;
                                                        foreach ($result as $row) { ?>
                                                            <tr>
                                                                <td><?= $n ?></td>
                                                                <td><?= $row->title ?></td>
                                                                <?php if ($row->status == 1) {?>
                                                                      
                                                                    <td><label class="switch"><input type="checkbox" checked class="sale_status" data-id="<?=$row->id?>"><span class="slider round"></span></label></td>
                                                                <?php } else {?>
                                                                    <td><label class="switch"><input type="checkbox" class="sale_status" data-id="<?=$row->id?>"><span class="slider round"></span></label></td>

                                                                <?php } ?>
                                                                <td>
                                                                    <!-- <span><a href="javascript:void(0);"><i class="fa-solid fa-pen-to-square text-success icons-i"></i></a></span> -->
                                                                    <span><a href="<?=base_url()?>custom_field/sale-status-list?edit=<?=base64_encode($row->id)?>"><i class="fa-solid fa-edit text-secondary"></i> </a></span>
                                                                    <span class="sale_deleted" data-id="<?=$row->id?>"><i class="fa-regular fa-trash-can text-danger icons-i"></i></span>
                                                                </td>
                                                            </tr>
                                                    <?php $n++;
                                                        }
                                                    }
                                                    ?>
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
$(".sale_status").on('change', function() {
  if ($(this).is(':checked')) {
    var sale_id = $(this).attr('data-id');
    var status    = 1;
    var status_type      = "Activated";
  } else {
    var sale_id = $(this).attr('data-id');  
    var status = 2;
    var status_type  = "InActive";
  }
  $.ajax({
				type: "POST",
				url: "<?=base_url()?>custom_field/sale_update_status",
				data: {
					id     : sale_id,
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
$(".sale_deleted").on('click', function() {
    var sale_id = $(this).attr('data-id');
    var status    = 3;
    var status_type      = "Deleted";
    swal({
    title: "Are you sure?",
    text: "sale status Delete!",
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
				url: "<?=base_url()?>custom_field/sale_update_status",
				data: {
					id     : sale_id,
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
            swal("Cancelled", "sale Status Not Deleted", "error");
            e.preventDefault();    
        }
    });

});

</script>