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
                                                        <th width="5%">S no.</th>
                                                        <th>Name </th>
                                                        <th>Sender Name</th>
                                                        <th>Sender Email</th>
                                                        <th>Username</th>
                                                        <th>Receive Email</th>
                                                        <th>Subject</th>
                                                        <th>Mail Status</th>
                                                        <th>Send Mail Date</th>
                                                        <th>Preview</th>
                                                    </tr>
                                                </thead>
                                                <div class="row">
                                                    <form action="<?=base_url()?>email-setup/all-leads" method="get">
                                                    <div class="col-md-4">
                                                           <input name="s" type="text" placeholder="Search.." class="form-control">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <input type="submit" value="Search" class="btn btn-primary">
                                                    </div>
                                                    </form>
                                                </div>
                                                <tbody id="myTable">
                                                    <?php if (!empty($all_leads)) {
                                                        
                                                        $n = $segment + 1;
                                                        foreach ($all_leads as $row) { ?>
                                                            <tr>
                                                                <td><?= $n ?></td>
                                                                <td><?= $row->first_name. ' '. $row->last_name ?></td>
                                                                <td><?= $row->sender_name ?></td>
                                                                <td><?= $row->sender_email ?></td>
                                                                <td><?= $row->username ?></td>
                                                                <td><?= "too: ".$row->too ?> <br><?= "cc: ".$row->cc ?><br><?= "bcc: ".$row->bcc ?></td>
                                                                <td><?= $row->subject ?></td>
                                                                <td><?php if($row->mail_status==1) { echo 'Mail Sent';}else{ echo 'Mail Draft';}?></td>
                                                                <td><?= date('M d Y H:i:s',strtotime($row->created_at)) ?></td>
                                                                <td><a href="#" class="email_detail" data-email="<?=$row->email_id ?>" data-bs-toggle="modal" data-bs-target="#emaildetailModal"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                                            </tr>
                                                    <?php $n++;
                                                        }
                                                    } ?>
                                                </tbody>
                                            </table>
                                            <?php echo $links; ?>
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
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-size: 1rem !important;">Mail Detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="mailDetailShow"></div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script>
    //view mail details
    $(document).on('click', '.email_detail', function() {
        let eMailId = $(this).attr("data-email");
        //alert('mail detail working -' + eMailId);
        $.ajax({
            url: "<?php echo base_url(); ?>sendmail/getmaildetail",
            method: "post",
            data: {
                email_unique: eMailId
            },
            success: function(data) {
                $('#mailDetailShow').html(data);
                $('#exampleModal3').modal("show");
            }
        });
    });
    </script>
