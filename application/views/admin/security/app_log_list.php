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
                    
                    <div class="col-lg-12">
                        <div class="card permission-categories">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="tab-content w-100" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <form action="http://localhost/github/trust-haven-crm/security/log-system" method="get">
                                                    <div class="d-flex gap-2">
                                                        <input name="s" type="text" placeholder="Search.." class="form-control" fdprocessedid="pawzwl"> 
                                                        <div id="date" style="width: 400px;padding-left: 24px;" 
                                                                    class="input-group date" 
                                                                    data-date-format="mm-dd-yyyy"> 
                                                                <input class="form-control" 
                                                                        type="text" readonly name="date" value=""/> 
                                                                <span class="input-group-addon"> 
                                                                    <i class="glyphicon glyphicon-calendar"></i> 
                                                                </span> 
                                                            </div> 
                                                        <!-- <input type="date" name="date" class="form-control"> -->
                                                        <input type="submit" value="Search" class="btn btn_save" fdprocessedid="rmi5k">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 table-scrollabe">
                                            <table class="table table-hover table-responsive mt-3">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">S no.</th>
                                                        <th width="30%">Name</th>
                                                        <th width="20%">Role</th>
                                                        <th width="30%">Title</th>
                                                        <th width="15%">Created Date</th>
                                                    </tr>
                                                </thead>
                                                <div class="col-md-4">
                                                    <!-- <input id="myInput" type="text" placeholder="Search.." class="form-control">  -->
                                                </div>
                                                <tbody >
                                                    <?php
                                                     if (!empty($result)) {
                                                        
                                                        $n = $segment+1;
                                                        foreach ($result as $row) { ?>
                                                            <tr>
                                                                <td><?= $n ?></td>
                                                                <td><?= $row->name ?></td>
                                                                <td><?= $row->role ?></td>
                                                                <td><?= $row->title ?></td>
                                                                <td><?= date('d M Y h:i:s',strtotime($row->created_date))?></td>
                                                               
                                                            </tr>
                                                    <?php $n++;
                                                        }
                                                    } ?>
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
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
<script>
    $(function () { 
        $("#date").datepicker({  
            autoclose: true,  
            todayHighlight: true,
            defaultDate: "+1w" 
        }).datepicker('update', new Date('')); 
    }); 
</script>