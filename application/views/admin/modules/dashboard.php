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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="tab-content w-100" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                            
                                            <h2>Module Dashboard</h2>
                                             
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                </div>

            <div class="row">
            <div class="col-lg-10 mt-4">
                <div class="row">
                    <!-- table code start  -->
                    <div class="col-lg-6">
                        <div class="card permission-categories">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="tab-content w-100" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                            <h4 class="btn btn-primary btn-sm float-end mb-3">Remote Status</h4>
                                            <table class="table table-hover table-responsive mt-3">
                                                <thead>
                                                    <tr>
                                                        <th>S no.</th>
                                                        <th>Title</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($remote_list)) {
                                                        
                                                        $n = $segment+1;
                                                        foreach ($remote_list as $row) { 
                                                            if($n==5)
                                                            {
                                                                break;
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td><?= $n ?></td>
                                                                <td><?= $row->title ?></td>
                                                                <?php if ($row->status == 1) {?>
                                                                      
                                                                    <td><label class="switch"><input type="checkbox" checked class="remote_status" data-id="<?=$row->id?>"><span class="slider round"></span></label></td>
                                                                <?php } else {?>
                                                                    <td><label class="switch"><input type="checkbox" class="remote_status" data-id="<?=$row->id?>"><span class="slider round"></span></label></td>

                                                                <?php } ?>
                                                                <td>
                                                                    <!-- <span><a href="javascript:void(0);"><i class="fa-solid fa-pen-to-square text-success icons-i"></i></a></span> -->
                                                                    <span><a href="<?=base_url()?>custom_field/sale-status-list?edit=<?=base64_encode($row->id)?>"><i class="fa-solid fa-edit text-secondary"></i> </a></span>
                                                                    <span class="remote_deleted" data-id="<?=$row->id?>"><i class="fa-regular fa-trash-can text-danger icons-i"></i></span>
                                                                </td>
                                                            </tr>
                                                    <?php $n++;
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <?php echo $links; ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card permission-categories">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="tab-content w-100" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                        <h4 class="btn btn-primary btn-sm float-end mb-3">Sale Status</h4>
                                            <table class="table table-hover table-responsive mt-3">
                                                <thead>
                                                    <tr>
                                                        <th>S no.</th>
                                                        <th>Title</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($sale_list)) {
                                                        
                                                        $n = $segment+1;
                                                        foreach ($sale_list as $row) {
                                                             if($n==5)
                                                            {
                                                                break;
                                                            }
                                                            ?>
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
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="col-lg-6 mt-4">
                        <div class="card permission-categories">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="tab-content w-100" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                        <h4 class="btn btn-primary btn-sm float-end mb-3">Work Status</h4>
                                            <table class="table table-hover table-responsive mt-3">
                                                <thead>
                                                    <tr>
                                                        <th>S no.</th>
                                                        <th>Title</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($work_status)) {
                                                        
                                                        $n = $segment+1;
                                                        foreach ($work_status as $row) { 
                                                            if($n==5)
                                                            {
                                                                break;
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td><?= $n ?></td>
                                                                <td><?= $row->title ?></td>
                                                                <?php if ($row->status == 1) {?>
                                                                      
                                                                    <td><label class="switch"><input type="checkbox" checked class="work_status" data-id="<?=$row->id?>"><span class="slider round"></span></label></td>
                                                                <?php } else {?>
                                                                    <td><label class="switch"><input type="checkbox" class="work_status" data-id="<?=$row->id?>"><span class="slider round"></span></label></td>

                                                                <?php } ?>
                                                                <td>
                                                                    <!-- <span><a href="javascript:void(0);"><i class="fa-solid fa-pen-to-square text-success icons-i"></i></a></span> -->
                                                                    <span><a href="<?=base_url()?>custom_field/worked-status-list?edit=<?=base64_encode($row->id)?>"><i class="fa-solid fa-edit text-secondary"></i> </a></span>
                                                                    <span class="work_deleted" data-id="<?=$row->id?>"><i class="fa-regular fa-trash-can text-danger icons-i"></i></span>
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

$(".remote_status").on('change', function() {
  if ($(this).is(':checked')) {
    var remote_id = $(this).attr('data-id');
    var status    = 1;
    var status_type      = "Activated";
  } else {
    var remote_id = $(this).attr('data-id');  
    var status = 2;
    var status_type  = "InActive";
  }
  $.ajax({
				type: "POST",
				url: "<?=base_url()?>custom_field/remote_update_status",
				data: {
					id     : remote_id,
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
$(".remote_deleted").on('click', function() {
    var remote_id = $(this).attr('data-id');
    var status    = 3;
    var status_type      = "Deleted";
    swal({
    title: "Are you sure?",
    text: "Remote status Delete!",
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
				url: "<?=base_url()?>custom_field/remote_update_status",
				data: {
					id     : remote_id,
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
            swal("Cancelled", "Remote Status Not Deleted", "error");
            e.preventDefault();    
        }
    });

});
$(".work_status").on('change', function() {
  if ($(this).is(':checked')) {
    var work_id = $(this).attr('data-id');
    var status    = 1;
    var status_type      = "Activated";
  } else {
    var work_id = $(this).attr('data-id');  
    var status = 2;
    var status_type  = "InActive";
  }
  $.ajax({
				type: "POST",
				url: "<?=base_url()?>custom_field/work_update_status",
				data: {
					id     : work_id,
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
$(".work_deleted").on('click', function() {
    var work_id = $(this).attr('data-id');
    var status    = 3;
    var status_type      = "Deleted";
    swal({
    title: "Are you sure?",
    text: "Work status Delete!",
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
				url: "<?=base_url()?>custom_field/work_update_status",
				data: {
					id     : work_id,
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
            swal("Cancelled", "Work Status Not Deleted", "error");
            e.preventDefault();    
        }
    });

});

</script>