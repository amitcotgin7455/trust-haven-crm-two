<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>    
<!-- user table  -->
<section class="customer-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="customer-header d-flex justify-content-between">
                    <div class="right">
                        <div class="myHeading">
                            <a href="<?php echo base_url(); ?>sales/list-lead">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="24" height="24" x="0" y="0" viewBox="0 0 486.65 486.65" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                    <g>
                                        <path d="M202.114 444.648a30.365 30.365 0 0 1-21.257-9.11L8.982 263.966c-11.907-11.81-11.986-31.037-.176-42.945l.176-.176L180.858 49.274c12.738-10.909 31.908-9.426 42.817 3.313 9.736 11.369 9.736 28.136 0 39.504L73.36 242.406l151.833 150.315c11.774 11.844 11.774 30.973 0 42.817a30.368 30.368 0 0 1-23.079 9.11z" fill="#000000" data-original="#000000" class="" opacity="1"></path>
                                        <path d="M456.283 272.773H31.15c-16.771 0-30.367-13.596-30.367-30.367s13.596-30.367 30.367-30.367h425.133c16.771 0 30.367 13.596 30.367 30.367s-13.596 30.367-30.367 30.367z" fill="#000000" data-original="#000000" class="" opacity="1"></path>
                                    </g>
                                </svg>
                            </a>
                            <!-- <h1 class="c-name">Ankit </h1> -->
                        </div>
                    </div>
                    <!-- <div class="left">
                        <div class="btn-group" role="group">
                            <span class="dIB  bR2  cP cb vat mR8" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <a href="javascript:void(0)" class="btn btn_save sendmailbtn" id="8" data-bs-toggle="modal" data-bs-target="#myModal"> Email Send</a>
                            </span>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="user-table">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="mass-email m-4">
                    <div class="row p-4">
                        <div class="col-xl-8 col-sm-6 col-12">
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link <?php echo $active; ?>" href="<?php echo base_url(); ?>sales/list-massemail/?scheduled=1">Scheduled</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo $active1; ?>" href="<?php echo base_url(); ?>sales/list-massemail/?sent=1">Sent</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo $active2; ?>" href="<?php echo base_url(); ?>sales/list-massemail/?stopped=1">Stopped</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12">
                            <div class="btn-group float-sm-end  mt-4 mt-sm-0">
                                <a href="<?php echo base_url(); ?>sales/create-massemail" class="btn theme-btn-2">Create mass Email </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="scheduled" class="tab-pane active">
                                    <div class="table-titles pb-4 px-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h6>Total Sent Email <?= $total_row; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 px-5 py-2">
                                            <form action="<?= base_url(); ?>sales/list-massemail/" method="get">
                                                <div class="d-flex gap-2">
                                                    <input name="s" type="text" placeholder="Search.." class="form-control">
                                                    <input name="sent" class="d-none" type="text" value="1">
                                                    <input type="submit" value="Search" class="btn btn_save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="data-list table-responsive-lg pb-5">
                                        <table class="table table-hover table-responsive-lg" style="width:100%">
                                            <thead id="data-heading-show">
                                                <tr>
                                                    <th width="25%">Agent Name</th>
                                                    <th width="25%">Email Tamplate</th>
                                                    <th width="25%">Sent Date</th>
                                                    <th width="25%">Mail Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="data-show">
                                                <?php if (!empty($result[0]->id)) {

                                                    foreach ($result as $sent) { ?>
                                                        <tr id="sub_chk_draft">
                                                            <td><?= $sent->username; ?></td>
                                                            <td><?php if ($sent->template_id == 1) {
                                                                    echo 'Cancellation';
                                                                } elseif ($sent->template_id == 2) {
                                                                    echo 'Follow Up';
                                                                } else {
                                                                    echo 'Schedule';
                                                                } ?></td>
                                                            <td><?= date('m-Y-d h:i A', strtotime($sent->created_date)); ?></td>
                                                            <td>Sent</td>
                                                        </tr>
                                                    <?php }
                                                } else { ?>
                                                    <tr></tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <?= $links ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>