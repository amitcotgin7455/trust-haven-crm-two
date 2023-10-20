<link rel="stylesheet" href="<?php

use net\authorize\api\contract\v1\KeyManagementSchemeType\DUKPTAType\EncryptedDataAType;

 echo base_url(); ?>assets/css/status_checkbox.css">
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
                    <div class="col-lg-12 table-import">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    <div class="tab-content w-100" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                            <table class="table table-hover table-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>S no.</th>
                                                        <th>User Name</th>
                                                        <th>Total Duplicate Import Lead</th>
                                                        <th width="45%">Import Lead Detail</th>
                                        
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
                                                                <td><?= $row->total_lead ?></td>
                                                                <td><a href="<?=base_url()?>import/imported-data-detail-list/<?php echo $row->user_id;?>" class="text-primary"><?= $row->name ?> Lead Detail</a></td>
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