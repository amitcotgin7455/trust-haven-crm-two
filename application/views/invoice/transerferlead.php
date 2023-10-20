<style>
    .filter-main {
        position: absolute;
        right: 0;
    }

    .search_filter {
        width: 100%;
    }

    .search_box svg {
        position: absolute;
        left: 6px;
        top: 6px;
    }

    .search_box svg {
        position: absolute;
        left: 6px;
        top: 12px;
        color: #b41e45;
    }

    .side_bar_filter {
        background: #ffff;
        padding: 20px;
        border-radius: 5px;
        height: 70vh;
        overflow: hidden;
    }

    .leads-btn.bottom-btn {
        background: #fff;
        padding: 18px 20px 25px;
        box-shadow: 0 -2px 4px -1px rgba(0, 0, 0, .15);
        z-index: 9999;
        position: relative;
    }

    .filter_box_scroll {
        overflow-y: auto;
        height: 547px;
        margin-right: -20px;
        padding-right: 10px;
        overflow-x: hidden;
    }

    /* .lead_page .card .tab-pane {
        width: 2010px;
    } */

    .lead_page .card .card-body .tab-content {
        /* overflow: hidden; */
        /* width: 2044px; */
        /* overflow-x: scroll;
        height: 68vh; */
    }

    .center-box {
        width: 30px;
    }

    body .form-select-sm {
        font-size: 0.675rem;
    }

    /* width */
    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f2f2f2;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #afa9a9;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #b4b3b3;
    }

    .search_filter {
        padding: 7px 25px;
    }

    .delete-btn {
        padding-left: 18px;
    }
</style>
<!-- header end  -->
<div class="second_header">
    <div class="container-fluid ">
        <div class="row justify-content-between align-content-center">
            <div class="col-6">
                <h5 class="d-inline">Transfer Leads</h5>

            </div>
            <div class="col-6">
                <div class="leads-btn">
                    <a href="#" class="btn button_btn delete-btn d-none" data-bs-toggle="dropdown" aria-expanded="false">Acitons<i class="ps-1 fa-solid fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><input type="submit" value="Delete" id="DeleteBooking" class="dropdown-item" onclick="return confirm('Are You Sure Delete This Row');">
                    </ul>
                    <!-- <a href="<?php echo base_url(); ?>create-invoice" class="btn btn_save"> Create invoice</a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<main class="lead_page pt-3 mx-3">

    <div class="col-xl-12 col-lg-12" id="table_data_check">
        <div class="row">
            <div class="">
                <div class="card position-relative">
                    <div class="filter-main">
                        <ul class="dropdown-menu float-end">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>

                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="tab-content w-100" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                    <table class="table table-striped table-responsive">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <form action="<?=base_url();?>lead-transfer" method="get">
                                                    <div class="d-flex gap-2">
                                                        <input name="s" type="text" placeholder="Search.." class="form-control"> 
                                                        <input type="submit" value="Search" class="btn btn_save" >
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <thead>
                                            <tr>
                                                <!-- <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input all-select" type="checkbox" value="" id="flexCheckDefault70">
                                                        <label class="form-check-label " for="flexCheckDefault70">
                                                        </label>
                                                    </div>
                                                </th> -->
                                                <th>Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <!-- <th>Transfer User Name</th> -->
                                                <th>Lead Status</th>
                                                <th>Date</th>
                                                <!-- <th>Invoice Status</th>
                                                <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody id="">
                                            <?php if (!empty($result)) {
                                                $n = $segment + 1;
                                                foreach ($result as $row) { ?>
                                                    <tr <?=($row->tech_lead_status==1)?'class="bg-success text-white"':'Pending';?>>
                                                        <!-- <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input down-checkbox deletes_id" type="checkbox" name="leadIds[]" value="<?= $row->id; ?>" id="flexCheckDefault71">
                                                                <label class="form-check-label" for="flexCheckDefault71">
                                                                </label>
                                                            </div>
                                                        </td> -->
                                                        <td><?= $n ?></td>
                                                       
                                                        <td><?= $row->first_name ?></td>
                                                        <td><?= $row->last_name ?></td>
                                                        <td><?= $row->email ?></td>
                                                        <!-- <td><?= $row->tech_user_name ?></td> -->
                                                        <td><?=($row->tech_lead_status==1)?'Closed':'Pending';?></td>
                                                        <td><?= $row->created_date ?></td>
                                                        <td> 
                                                        <a href="<?php echo base_url('/update-lead-by-tech');?>?id=<?php echo base64_encode($row->id);?>"><span class="fa fa-eye text-success"></span>  </a>
                                                        <!-- <a href="<?php echo base_url('invoice/deleteinvoice');?>?id=<?php echo base64_encode($row->id);?>" onclick="return confirm('Are You Sure Delete This Row');"><span class="fa fa-trash text-danger"></span></a>   -->
                                                        </td>
                                                    </tr>
                                            <?php $n++;
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                    <!-- pagination start  -->
                    <?= $links ?>
                    <!-- pagination close  -->
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</main>

