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

    /* .side_bar_filter {
        background: #ffff;
        padding: 20px;
        border-radius: 5px;
        height: 70vh;
        overflow: hidden;
    } */
/* 
    .leads-btn.bottom-btn {
        background: #fff;
        padding: 18px 20px 25px;
        box-shadow: 0 -2px 4px -1px rgba(0, 0, 0, .15);
        z-index: 9999;
        position: relative;
    } */

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

    /* .search_filter {
        padding: 7px 25px;
    } */

    .delete-btn {
        padding-left: 18px;
    }
</style>

<!-- header end  -->
<div class="second_header">
    <div class="container-fluid ">
        <div class="row justify-content-between align-content-center">
            <div class="col-6">
                <h5 class="d-inline">All Booking</h5>

            </div>
            <div class="col-6">
                <div class="leads-btn mb-2">
                    <a href="#" class="btn button_btn delete-btn d-none" data-bs-toggle="dropdown" aria-expanded="false">Acitons<i class="ps-1 fa-solid fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <!-- <li><a class="dropdown-item" href="#">Add to Campaigns</a></li>
                        <li><a class="dropdown-item" href="#">Add to Campaigns</a></li> -->
                        <li><input type="submit" value="Delete" id="DeleteBooking" class="dropdown-item" >
                        <!-- onclick=" return confirm('Are You Sure Delete This Row');" -->
                    </ul>

                    <a href="<?php echo base_url(); ?>create-booking" class="btn btn_save"> Create Booking</a>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="lead_page pt-3">
    <form action="<?php echo base_url(); ?>list-booking" method="get">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-3">
                    <div class="side_bar_filter">   
                        <div class="filter_box position-relative">
                            <div class="filtr-heading-search">
                                <h5 class="mb-2">Filter Leads by</h5>
                                <div class="search_box position-relative mt-3">
                                    <input class="form-control mb-3 search_filter" type="search" id="search_filter"  placeholder="Search">
                                    <i class="search_icon fa-solid fa-magnifying-glass" type="submit" placeholder="Search"></i>
                                </div>
                            </div>
                            <div class="position-relative">
                                <div class="filter_box_scroll overflow-auto">
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <span>Filter By Fields</span>
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                                <div class="accordion-body" id="search-input-filter">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault1">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault1">
                                                            First Name
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input class="form-control me-1" type="text" name="first_name" placeholder="Type here">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault2">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault2">
                                                            Last Name
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input class="form-control me-1" type="text" name="last_name" placeholder="Type here">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault3">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault3">
                                                            Phone No
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input class="form-control me-1" type="text" name="phone_no" placeholder="Type here" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault4">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault4">
                                                            Alt Phone No
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input class="form-control me-1" type="text" name="phone_no2" placeholder="Type here" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault5">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault5">
                                                            Email
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input class="form-control me-1" type="text" name="email" placeholder="Type here">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault6">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault6">
                                                            Booking Date
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input class="form-control me-1" type="date" name="booking_date" placeholder="Type here">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault6">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault6">
                                                            Booking Date
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <!-- <input class="form-control me-1"  type="date" name="sale_date" placeholder="Type here" > -->
                                                                <div id="booking_date" style="width: 200px;padding-left: 24px;" 
                                                                    class="input-group date" 
                                                                    data-date-format="mm-dd-yyyy"> 
                                                                <input class="form-control" 
                                                                        type="text" readonly name="booking_date" value=""/> 
                                                                <span class="input-group-addon"> 
                                                                    <i class="glyphicon glyphicon-calendar"></i> 
                                                                </span> 
                                                            </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault7">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault7">
                                                            Time
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <!-- <input class="form-control me-1" type="time" name="time" placeholder="Type here"> -->
                                                                <input type="text" class="form-control date-input timepicker" placeholder="time" name="time" aria-label="date" aria-describedby="basic-addon1"  data-gtm-form-interact-field-id="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault8">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault8">
                                                            Timezone
                                                        </label>
                                                        <div class="user-system d-none" id="actions">
                                                            <div class="ac-dropdown pe-3">                                                            
                                                                <select class="form-select form-select-md me-3" aria-label=".form-select-md example" id="dropdown_selector" name="timezone" >
                                                                    <option value="">Select Timezone</option>
                                                                    <option value="1">EST</option>
                                                                    <option value="2">CST</option>
                                                                    <option value="3">PST</option>
                                                                    <option value="4">MST</option>
                                                                </select>                                                            
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault9">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault9">
                                                            Booking Status
                                                        </label>
                                                        <div class="user-system d-none" id="actions">
                                                            <div class="ac-dropdown pe-3">                                                            
                                                                <select class="form-select form-select-md me-3" aria-label=".form-select-md example" id="dropdown_selector" name="booking_status" >
                                                                    <option value="">Select Booking status</option>
                                                                    <option value="1">Open</option>
                                                                    <option value="2">Pending</option>
                                                                    <option value="3">Close</option>
                                                                </select>                                                            
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault22">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault22">
                                                         Date
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <!-- <input class="form-control me-1"  type="date" name="from" placeholder="Type here" >
                                                                <input class="form-control me-1"  type="date" name="too" placeholder="Type here" > -->

                                                                <div id="from_date" style="width: 200px;padding-left: 24px;" 
                                                                    class="input-group date" 
                                                                    data-date-format="mm-dd-yyyy"> 
                                                                    <input class="form-control" 
                                                                        type="text" readonly name="from" value="<?=$sale_date?>"/> 
                                                                    <span class="input-group-addon"> 
                                                                        <i class="glyphicon glyphicon-calendar"></i> 
                                                                    </span> 
                                                                </div> 

                                                                <div id="to_date" style="width: 200px;padding-left: 24px;" 
                                                                        class="input-group date" 
                                                                        data-date-format="mm-dd-yyyy"> 
                                                                    <input class="form-control" 
                                                                            type="text" readonly name="too" value="<?=$sale_date?>"/> 
                                                                    <span class="input-group-addon"> 
                                                                        <i class="glyphicon glyphicon-calendar"></i> 
                                                                    </span> 
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault10">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault10">
                                                            Date
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input class="form-control me-1" type="date" name="from" placeholder="Type here">
                                                                <input class="form-control me-1" type="date" name="too" placeholder="Type here">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                    
                                                   


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="leads-btn bottom-btn">
                        <a href="<?php echo base_url(); ?>list-booking" class="btn button_btn clear_check">Clear</a>
                        <!-- <a href="#" class="btn btn_save">Apply Filter</a> -->
                        <input type="submit" class="btn btn_save" value="Apply Filter">
                    </div>
                </div>
    </form>
    <div class="col-xl-10 col-lg-9" id="table_data_check">
    <div class="row ">
        <?php
        $filters = "";
         if(!empty($_GET))
         {
            $filters .= ($_GET['first_name'])?' ,First Name':'';
            $filters .= ($_GET['last_name'])?' ,Last Name':'';
            $filters .= ($_GET['phone_no'])?' ,Phone No':'';
            $filters .= ($_GET['phone_no2'])?' ,Alt Phone No':'';
            $filters .= ($_GET['booking_date'])?' ,Booking Date':'';
            $filters .= ($_GET['email'])?' ,Email':'';
            $filters .= ($_GET['time'])?' ,Time':'';
            $filters .= ($_GET['timezone'])?' ,Timezone':'';
            $filters .= ($_GET['booking_status'])?' ,Booking Status':'';
            if(!empty($_GET['from']) || !empty($_GET['too']))
            {
            $filters .= ' ,Date';
            }
            $filters .= ($_GET['s'])?' ,Search by':'';
            
            ?>
  <div class="col-12">
    <p class="p-para"> <b>Total Record :</b> <?=count($result)?> . <b> Filter by :</b> <?=substr($filters,+2)?></p>
    </div>
    <?php } ?>
    </div>
        <div class="row">
            <div class="">
                <div class="card position-relative">
                    <div class="filter-main">
                        <a href="#" class="position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="pe-3 pt-2 pb-2 filter-main1 float-end fa-solid fa-sliders"></i>
                            <ul class="dropdown-menu float-end">
                                <li><a class="dropdown-item" href="javascript:void(0)" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Manage Columns</a></li>
                                <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>

                        </a>
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
                        <!-- <form action="Lead/deleteLead" method="post"> -->
                        <div class="d-flex align-items-start">
                            <div class="tab-content w-100" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                    <table class="table table-hover table-responsive">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check">
                                                        <input class="form-check-input all-select mt-2" type="checkbox" value="" id="flexCheckDefault70">
                                                        <input type="hidden" id="total_record" value="<?=count($result)?>">
                                                        <label class="form-check-label " for="flexCheckDefault70">
                                                        </label>
                                                    </div>
                                                </th>
                                                <th>Id</th>
                                                    <?php if ($manage_column[0]->first_name_col == 1) { ?><th>First Name</th><?php } ?>
                                                    <?php if ($manage_column[0]->last_name_col == 1) { ?><th>Last Name</th><?php } ?>
                                                    <?php if ($manage_column[0]->mobile_1_col == 1) { ?><th>Phone Number</th><?php } ?>
                                                    <?php if ($manage_column[0]->mobile_2_col == 1) { ?><th>Alt Phone No</th><?php } ?>
                                                    <?php if ($manage_column[0]->email_col == 1) { ?><th>Email</th><?php } ?>
                                                    <?php if ($manage_column[0]->date_col == 1) { ?><th>Date</th><?php } ?>
                                                    <?php if ($manage_column[0]->date_col == 1) { ?><th>Time</th><?php } ?>
                                                    <?php if ($manage_column[0]->time_col == 1) { ?><th>Timezone</th><?php } ?>
                                                    <?php if ($manage_column[0]->booking_status_col == 1) { ?><th>Booking Status</th><?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody id="sub_chk_draft">
                                            <?php if (!empty($result)) {
                                                $n = $segment + 1;
                                                foreach ($result as $row) { ?>
                                                    <tr>
                                                        <td><div class="form-check">
                                                                <input class="form-check-input down-checkbox deletes_id" type="checkbox" name="leadIds[]" value="<?= $row->id; ?>" id="flexCheckDefault71">
                                                                <label class="form-check-label" for="flexCheckDefault71">
                                                                </label>
                                                        </div></td>
                                                        <td><?= $n ?></td>
                                                        <?php if ($manage_column[0]->first_name_col == 1) { ?><td><a href="<?php echo base_url(); ?>booking-detail?id=<?= base64_encode($row->id); ?>"><?= $row->first ?></a></td><?php } ?>
                                                        <?php if ($manage_column[0]->last_name_col == 1) { ?><td><a href="<?php echo base_url(); ?>booking-detail?id=<?= base64_encode($row->id); ?>"><?= $row->last_name ?></a></td><?php } ?>
                                                        <?php if ($manage_column[0]->mobile_1_col == 1) { ?><td class="mobile_no_list" data-id ="<?=$row->id?>" id="mobile_1-<?=$row->id?>" data-mobile1="<?=$row->mobile_1?>"><?php if(!empty($row->mobile_1)) { echo '<span class="fa fa-eye-slash text-danger"></span>'; }?></td><?php } ?>
                                                        <?php if ($manage_column[0]->mobile_2_col == 1) { ?><td class="mobile_no_list2" data-id ="<?=$row->id?>" id="mobile_2-<?=$row->id?>" data-mobile2="<?=$row->mobile_2?>"><?php if(!empty($row->mobile_2)) { echo '<span class="fa fa-eye-slash text-danger"></span>'; }?></td><?php } ?>
                                                        <?php if ($manage_column[0]->email_col == 1) { ?><td><?= $row->email ?></td><?php } ?>
                                                        <?php if ($manage_column[0]->date_col == 1) { ?><td><?= $row->date ?></td><?php } ?>
                                                        <?php if ($manage_column[0]->date_col == 1) { ?><td><?= date('h:i A', strtotime($row->time)) ?></td><?php } ?>
                                                        <?php if ($manage_column[0]->time_col == 1) { ?><td><?php if($row->timezone==1)  {echo 'EST';}elseif($row->timezone==2){ echo 'CST';}elseif($row->timezone==3){ echo 'PST' ;} else { echo 'MST'; } ?></td><?php } ?>
                                                        <?php if ($manage_column[0]->booking_status_col == 1) { ?><td><?php if($row->booking_status==1)  {echo 'Open';}elseif($row->booking_status==2){ echo 'Pending';}else{ echo 'Close' ;}  ?></td><?php } ?>
                                                    </tr>
                                            <?php $n++;
                                                }
                                            }  
                                            else
                                            {
                                            echo '<tr><td colspan="12" class="text-center">No Record Found</td></tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </form> -->
                    <?= $links ?>
                    <!-- <nav aria-label="Page navigation example " class="float-end">

                                <ul class="pagination float-end pe-2">
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
</main>


<!-- Modal -->
<form action="bookings/managecolumn" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Manage Columns</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-filter">
                        <div class="form-check d-none">
                            <input class="form-check-input" type="checkbox" value="1" name="first_name_col" id="flexCheck" <?php if ($manage_column[0]->first_name_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="flexCheck">First Name</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="last_name_col" id="flexCheck1" <?php if ($manage_column[0]->last_name_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="flexCheck1">Last Name</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="mobile_1_col" id="flexCheck2" <?php if ($manage_column[0]->mobile_1_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="flexCheck2">Phone</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="mobile_2_col" id="flexCheck3" <?php if ($manage_column[0]->mobile_2_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="flexCheck3">Second Phone</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="email_col" id="flexCheck4" <?php if ($manage_column[0]->email_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="flexCheck4">Email</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="date_col" id="date_col" <?php if ($manage_column[0]->date_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="date_col">Date</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="time_col" id="time_col" <?php if ($manage_column[0]->time_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="time_col">Time </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="booking_status_col" id="booking_status_col" <?php if ($manage_column[0]->booking_status_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="booking_status_col">Booking Status </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn_save">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#search_filter").on("keyup", function() {
      var value = $(this).val().toLowerCase();
    $("#search-input-filter .form-check").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>
            $(function () { 

        $("#booking_date").datepicker({  
            autoclose: true,  
            todayHighlight: true,
            defaultDate: "+1w" 
        }).datepicker('update', new Date('')); 
        $("#from_date").datepicker({  
            autoclose: true,  
            todayHighlight: true,
            defaultDate: "+1w" 
        }).datepicker('update', new Date('')); 
        $("#to_date").datepicker({  
            autoclose: true,  
            todayHighlight: true,
            defaultDate: "+1w" 
        }).datepicker('update', new Date('')); 
    }); 

    $(function () { 
            $("#booking_date").datepicker({  
                autoclose: true,  
                todayHighlight: true, 
            }).datepicker('update', new Date('')); 
        });
        $(document).ready(function(){
        $('input.timepicker').timepicker({
          timeFormat: 'h:mm p',
          // defaultTime: new Date(),
          // interval: 30,
          // minTime: '10',
          // maxTime: '11:00pm',
           startTime: '11:00',
          dynamic: true,
          dropdown: true,
          scrollbar: false
        });
    });
</script>