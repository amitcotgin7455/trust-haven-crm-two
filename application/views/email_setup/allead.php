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
                                                        <th>First Name <?php echo $segment;?></th>
                                                        <th>Last Name</th>
                                                        <th>Email</th>
                                                        <th>Phone No</th>
                                                        <th>Alt Phone No</th>
                                                        <th>Created Date</th>
                                                        <th>View Email History</th>
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
                                                        // prx($all_leads);
                                                        $n = $segment + 1;
                                                        foreach ($all_leads as $row) { ?>
                                                            <tr>
                                                                <td><?= $n ?></td>
                                                                <td><?= $row->first_name ?></td>
                                                                <td><?= $row->last_name ?></td>
                                                                <td><?= $row->email ?></td>
                                                                <td><?= $row->mobile_1 ?></td>
                                                                <td><?= $row->mobile_2 ?></td>
                                                                <td><?= date('M d Y H:i:s',strtotime($row->created_date)) ?></td>
                                                                <td  class="text-center"><a href="<?=base_url()?>email-setup/lead-email-history?email_history_id=<?=base64_encode(explode('-',$row->a_id)[0])?>&lead_type=<?=base64_encode(explode('-',$row->a_id)[1])?>"><i class="fa fa-eye" style="color:#b41e45" ></i></a></td>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
