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
                                           
                                                <h2>User Dashboard</h2>                                            
                                            
                                           
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                </div>

            <div class="row">
            <div class="col-lg-12 mt-4">
                <div class="row">
                    <!-- table code start  -->
                  <div class="col-lg-12">
                        <div class="card user-dashboard">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="tab-content w-100" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                        <h4 class="btn btn-primary btn-sm px-4 py-2 float-end">User List</h4>
                                        <table class="table table-hover table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">S no.</th>
                                                        <th width="30%">Name</th>
                                                        <th width="25%">Username</th>
                                                        <th width="15%">Role</th>
                                                        <th width="10%">Status</th>
                                                        <th width="15%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($user_list)) {
                                                        
                                                        $n = $segment+1;
                                                        foreach ($user_list as $row) { ?>
                                                            <tr>
                                                                <td><?= $n ?></td>
                                                                <td><?= $row->name ?></td>
                                                                <td><?= $row->username ?></td>
                                                                <td><?= $row->role ?></td>
                                                                <?php if ($row->status == 1) {?>
                                                                      
                                                                    <td><label class="switch"><input type="checkbox" checked class="user_status" data-id="<?=$row->id?>"><span class="slider round"></span></label></td>
                                                                <?php } else {?>
                                                                    <td><label class="switch"><input type="checkbox" class="user_status" data-id="<?=$row->id?>"><span class="slider round"></span></label></td>

                                                                <?php } ?>
                                                                <td>
                                                                    <!-- <span><a href="javascript:void(0);"><i class="fa-solid fa-pen-to-square text-success icons-i"></i></a></span> -->
                                                                    <span><a href="<?=base_url()?>user_management/user-list?edit=<?=base64_encode($row->id)?>"><i class="fa-solid fa-edit text-secondary"></i> </a></span>
                                                                    <span class="user_deleted" data-id="<?=$row->id?>"><i class="fa-regular fa-trash-can text-danger icons-i"></i></span>
                                                                </td>
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
$(".user_status").on('change', function() {
  if ($(this).is(':checked')) {
    var user_id = $(this).attr('data-id');
    var status    = 1;
    var status_type      = "Activated";
  } else {
    var user_id = $(this).attr('data-id');  
    var status = 2;
    var status_type  = "InActive";
  }
  $.ajax({
				type: "POST",
				url: "<?=base_url()?>user_management/user_update_status",
				data: {
					id     : user_id,
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
$(".user_deleted").on('click', function() {
    var user_id = $(this).attr('data-id');
    var status    = 3;
    var status_type      = "Deleted";
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
 function(isConfirm){

   if (isConfirm){
    $.ajax({
				type: "POST",
				url: "<?=base_url()?>user_management/user_update_status",
				data: {
					id     : user_id,
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
            swal("Cancelled", "User Not Deleted", "error");
            e.preventDefault();    
        }
    });

});

$('#agent_name').on('input',function(){
    var agent_name = $(this).val();
    var split_name = agent_name.split(' ');
    var username =   split_name[0].toLowerCase() + '.ths';
    if(username)
    {
        $('#username').val(username);
    }
    
})
</script>