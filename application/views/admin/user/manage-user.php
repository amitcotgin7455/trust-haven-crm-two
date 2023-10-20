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
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="tab-content w-100" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                            <div class="row">
                                                <form action="<?php echo base_url('user_management/addUser'); ?>" method="POST">
                                                    <div class="row mt-3">
                                                    <div class="form-group col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">User Role</label>
                                                                <select name="user_role" class="form-select">
                                                                    <option value="">Select User Role</option>
                                                                    <?php
                                                                   if($role_list)
                                                                    {
                                                                        foreach($role_list as $role)
                                                                        {
                                                                        ?>
                                                                    <option value="<?=$role->id?>" <?php if(!empty($edit_id)  && ($role->id==$user_info->role_id)) { echo 'selected';  }?>><?=$role->title?></option>  
                                                                        <?php
                                                                    }
                                                                    }
                                                                    ?>
                                                                 
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Agent Name</label>
                                                                <input type="text" class="form-control" name="agent_name" value="<?php if($edit_id) { echo $user_info->name; } else { echo set_value('agent_name'); } ?>" id="agent_name">
                                                                <?php
                                                                if($edit_id)
                                                                {
                                                                ?>
                                                                <input type="hidden" value="<?=$edit_id?>" name="edit_id">
                                                                <?php
                                                                 } 
                                                                 ?>
                                                                <span class="text-danger"><?php echo form_error('agent_name'); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Email Id</label>
                                                                <input type="email" class="form-control" name="email" value="<?php if($edit_id) { echo $user_info->email; } else { echo set_value('email'); } ?>" id="email" >
                                                              
                                                                <span class="text-danger"><?php echo form_error('email'); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">UserName</label>
                                                                <input type="text" class="form-control" name="username" value="<?php if($edit_id) { echo $user_info->username; } else { echo set_value('username'); } ?>" id="username" >
                                                              
                                                                <span class="text-danger"><?php echo form_error('username'); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Password</label>
                                                                <input type="text" class="form-control" name="password" value="<?php if($edit_id) { echo ''; } else { echo 'Welcome123'; } ?>" id="password">
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
                                                                    <option value="1" <?php if(@$user_info->status==1) { echo 'selected'; } ?>>Active</option>
                                                                    <option value="2" <?php if(@$user_info->status==2) { echo 'selected'; } ?>>InActive</option>
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
                                            <table class="table table-hover table-responsive mt-3" id="user_list">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">S no.</th>
                                                        <th>Name</th>
                                                        <th>Username</th>
                                                        <th>Role</th>
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
$(document).ready(function () {
    $('#user_list').DataTable({
        search: {
            return: true,
        },
    });
});
</script>