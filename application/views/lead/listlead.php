<style>
    .filter-main {
        position: absolute;
        right: 0;
    }

    .search_filter {
        width: 100%;
    }

    /* .side_bar_filter {
        background: #ffff;
        padding: 20px;
        border-radius: 12px;
        height: 70vh;
        overflow: hidden;
    } */

    .leads-btn.bottom-btn {
        background: #fff;
        padding: 18px 20px 25px;
        box-shadow: 0 -2px 4px -1px rgba(0, 0, 0, .15);
        z-index: 1;
        position: relative;
    }
/* 
    .filter_box_scroll {
        overflow-y: auto;
        height: 547px;
        margin-right: -20px;
        padding-right: 10px;
        overflow-x: hidden;
    } */

    /* .lead_page .card .tab-pane {
        width: 2010px;
    } */

    .lead_page .card .card-body .tab-content {
        /*overflow: hidden;
        /* width: 2044px; */
        /* overflow: scroll;
        height: 68vh; */
        width: auto !important;
    min-width: 100%;
    overflow: auto;
    height: 76.5vh;
    max-height: inherit;
}
    
/* 
    .center-box {
        width: 30px;
    } */

    /* body .form-select-sm {
        font-size: 0.675rem;
    }

   
    ::-webkit-scrollbar {
        width: 5px;
    }

    ::-webkit-scrollbar-track {
        background: #f2f2f2;
    }

    
    ::-webkit-scrollbar-thumb {
        background: #afa9a9;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #b4b3b3;
    } */

    /* .search_filter {
        padding: 7px 25px;
    } */

    .delete-btn {
        padding-left: 18px;
    }
</style>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <div></div>
        <button type="button" class="btn-close float-end" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="user_bg">
        <div class="offcanvas-body">
            <div class="user-side-bar">
                <a class="User_profile" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <span>
                        S
                </a>
                </span>
            </div>
            <div class="user_detail pt-3">
                <p class="user_name">Shivam Saini</p>
                <p class="user_id"><b>User Id</b>: 0871674889</p>
            </div>
            <div class="d-grid gap-2 d-md-block text-center">
                <button class="btn  btn_save" type="button">My Account</button>
                <button class="btn  btn_save" type="button">Log Out</button>
            </div>
        </div>

    </div>
    <div class="p-4">
        <h6> SUBSCRIPTION</h6>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        </p>
    </div>
</div>

<!-- header end  -->
<div class="second_header">
    <div class="container-fluid ">
        <div class="row justify-content-between align-content-center">
            <div class="col-6">
                <h5 class="d-inline">All Leads</h5>

            </div>
            <div class="col-6">
                <div class="leads-btn mb-2">
                    <a href="#" class="btn button_btn delete-btn d-none" data-bs-toggle="dropdown" aria-expanded="false">Acitons<i class="ps-1 fa-solid fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <!-- <li><a class="dropdown-item" href="#">Add to Campaigns</a></li>
                        <li><a class="dropdown-item" href="#">Add to Campaigns</a></li> -->
                        <?php
                        //9 - delete lead
                        if ((!empty($permission_role)) && $user_detail->role_id == 2) {
                            if (in_array(9, $permission_role)) {
                        ?>
                                <li><input type="submit" value="Delete" id="return confirm('Are You Sure Delete This Row');" class="dropdown-item">
                                <?php }
                        } elseif ($user_detail->role_id == 1 || $user_detail->role_id == 4) {
                                ?>
                                <li><input type="submit" value="Delete" id="Delete" class="dropdown-item">
                                <?php
                            }
                                ?>
                    </ul>
                    <?php
                    //1 -- create lead
                    if ((!empty($permission_role)) && $user_detail->role_id == 2) {
                        if (in_array(1, $permission_role)) {
                    ?>

                            <a href="<?php echo base_url(); ?>create-lead" class="btn btn_save"> Create Lead</a>
                        <?php }
                    } elseif ($user_detail->role_id == 1 || $user_detail->role_id == 4 || $user_detail->role_id == 3) {
                        ?>
                        <a href="<?php echo base_url(); ?>create-lead" class="btn btn_save"> Create Lead</a>

                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="lead_page pt-3">
    <form action="<?php echo base_url(); ?>list-lead" method="get">
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
                                                    
                                                    <div class="form-check" class="search-filter">
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
                                                    <div class="form-check" class="search-filter">
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
                                                    <div class="form-check" class="search-filter">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault3">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault3">
                                                            Phone Number
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input class="form-control me-1" type="text" name="phone_no" placeholder="Type here " oninput="this.value =this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check" class="search-filter">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault4">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault4">
                                                           Alt Phone Number
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input class="form-control me-1" type="text" name="second_phone_no" placeholder="Type here " oninput="this.value =this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check" class="search-filter">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault5">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault5">
                                                           Email 
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input class="form-control me-1" type="text" name="email" placeholder="Type here " > 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check" class="search-filter">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault6">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault6">
                                                            Lead Status
                                                        </label>
                                                        <div class="user-system d-none" id="actions">
                                                            <div class="ac-dropdown pe-3">                                                            
                                                                <select class="form-select form-select-md me-3" aria-label=".form-select-md example" id="dropdown_selector" name="lead_status" >
                                                                    <option value="">Select lead status</option>
                                                                    <option value="1">Call Back</option>
                                                                    <option value="2">Sale</option>
                                                                    <option value="3">Not Intrested</option>
                                                                    <option value="4">VM</option>
                                                                    <option value="5">DND</option>
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
                                                                        type="text" readonly name="from" value=""/> 
                                                                    <span class="input-group-addon"> 
                                                                        <i class="glyphicon glyphicon-calendar"></i> 
                                                                    </span> 
                                                                </div> 

                                                                <div id="to_date" style="width: 200px;padding-left: 24px;" 
                                                                        class="input-group date" 
                                                                        data-date-format="mm-dd-yyyy"> 
                                                                    <input class="form-control" 
                                                                            type="text" readonly name="too" value=""/> 
                                                                    <span class="input-group-addon"> 
                                                                        <i class="glyphicon glyphicon-calendar"></i> 
                                                                    </span> 
                                                                </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-check" class="search-filter">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault7">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault7">
                                                           Date 
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input class="form-control me-1" type="date" name="from"> 
                                                                <input class="form-control me-1" type="date" name="too"> 
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
                        <a href="<?php echo base_url(); ?>list-lead" class="btn button_btn clear_check">Clear</a>
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
            $filters .= ($_GET['second_phone_no'])?' ,Alt Phone No':'';
            $filters .= ($_GET['email'])?' ,Email':'';
            $filters .= ($_GET['lead_status'])?' ,lead Status':'';
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
                                        <i class="pe-3 pt-2 filter-main1 float-end fa-solid fa-sliders"></i>
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
                                        <div class="tab-content w-100" id="v-pills-tabContent" >
                                            <?php
                                            if(base64_decode(@$_GET['lead_type']) == 'transfer_by_manager' &&  (base64_decode(@$_GET['role_id'])==1  || base64_decode(@$_GET['role_id'])==4 || base64_decode(@$_GET['role_id'])==2))
                                            {
                                                ?>
                                                <div class="row">
                                                <div class="col-md-4 pb-3">
                                            <select id="select-state22" placeholder="Search Tech User..." name="tech_user" <?php if(!empty($first_name)){ echo 'required';}?> class="tech_user">
                                                <option value="">Search Name</option>
                                                <?php if(!empty($tech_user)){
                                                    foreach ($tech_user as $name) { ?>
                                                <option value="<?php echo $name->id;?>" ><?=ucwords($name->title)?></option>
                                                <?php } }?>
                                            </select>
                                            <span class="text-danger"><?php echo form_error('first_name'); ?></span>
                                        </div>

                                        <div class="col-md-4 pb-3">
                                            <button type="button"  class="btn btn_save" id="transferLead">Transfer Lead</button>
                                        </div>
                                        </div>
                                        <?php
                                            }
                                            ?>
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                                                <table class="table table-hover table-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th width="3%">
                                                                <div class="form-check">
                                                                    <input class="form-check-input all-select  mt-2" type="checkbox" value="" id="flexCheckDefault70">
                                                                    <input type="hidden" id="total_record" value="<?=count($result)?>">
                                                                    <label class="form-check-label " for="flexCheckDefault70">
                                                                    </label>
                                                                </div>
                                                            </th>
                                                            <th width="3%">Id</th>
                                                            <?php if ($manage_column[0]->first_name_col == 1) { ?>
                                                                <th width="13%">First Name</th><?php } ?>
                                                            <?php if ($manage_column[0]->last_name_col == 1) { ?>
                                                                <th width="10%">Last Name</th><?php } ?>
                                                            <?php if ($manage_column[0]->mobile_1_col == 1) { ?>
                                                                <th width="10%">Phone Number</th><?php } ?>
                                                            <?php if ($manage_column[0]->mobile_2_col == 1) { ?>
                                                                <th width="10%">Alt Phone No</th><?php } ?>
                                                            <?php if ($manage_column[0]->email_col == 1) { ?>
                                                                <th width="25%">Email</th><?php } ?>
                                                            <?php if ($manage_column[0]->lead_status_col == 1) { ?>
                                                                <th width="10%">Lead Status</th><?php } ?>
                                                            <?php if ($manage_column[0]->description_col == 1) { ?>
                                                                <th width="17%">Description</th><?php } ?>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="sub_chk_draft">
                                                        <?php if (!empty($result)) {
                                                            $n = $segment + 1;
                                                            foreach ($result as $row) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-check">
                                                                            <input class="form-check-input down-checkbox deletes_id" type="checkbox" name="leadIds[]" value="<?= $row->id; ?>" id="flexCheckDefault71">
                                                                            <label class="form-check-label" for="flexCheckDefault71">
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td><?= $n ?></td>

                                                                    <?php if ($manage_column[0]->first_name_col == 1) { ?>
                                                                        <td><a href="<?php echo base_url(); ?>lead-detail?id=<?= base64_encode($row->id); ?>"><?= $row->first_name ?></a></td><?php } ?>

                                                                    <?php if ($manage_column[0]->last_name_col == 1) { ?>
                                                                        <td><a href="<?php echo base_url(); ?>lead-detail?id=<?= base64_encode($row->id); ?>"><?= $row->last_name ?></a></td><?php } ?>

                                                                    <?php if ($manage_column[0]->mobile_1_col == 1) { ?><td class="mobile_no_list" data-id="<?= $row->id ?>" id="mobile_1-<?= $row->id ?>" data-mobile1="<?= $row->mobile_1 ?>"><?php if (!empty($row->mobile_1)) {
                                                                                                                                                                                                                                                echo '<span class="fa fa-eye-slash text-danger"></span>';
                                                                                                                                                                                                                                            } ?></td><?php } ?>
                                                                    <?php if ($manage_column[0]->mobile_2_col == 1) { ?><td class="mobile_no_list2" data-id="<?= $row->id ?>" id="mobile_2-<?= $row->id ?>" data-mobile2="<?= $row->mobile_2 ?>"><?php if (!empty($row->mobile_2)) {
                                                                                                                                                                                                                                                echo '<span class="fa fa-eye-slash text-danger"></span>';
                                                                                                                                                                                                                                            } ?></td><?php } ?>


                                                                    <!-- <?php if ($manage_column[0]->mobile_1_col == 1) { ?>
                                                                            <td><a href="tel:<?= $row->mobile_1 ?>"><?php if (!empty($row->mobile_1)) {
                                                                                                                        echo '<span class="fa fa-phone text-danger"></span>';
                                                                                                                    } ?> </a></td><?php } ?>

                                                                        <?php if ($manage_column[0]->mobile_2_col == 1) { ?>
                                                                            <td><a href="tel:<?= $row->mobile_2 ?>"><?php if (!empty($row->mobile_2)) {
                                                                                                                        echo '<span class="fa fa-phone text-danger"></span>';
                                                                                                                    } ?></a></td><?php } ?> -->

                                                                    <?php if ($manage_column[0]->email_col == 1) { ?>
                                                                        <td><a href="#"><?= $row->email ?></a></td><?php } ?>

                                                                    <?php if ($manage_column[0]->lead_status_col == 1) { ?>
                                                                        <td>
                                                                            <?php if ($row->lead_status == 1) {
                                                                                echo 'Callback';
                                                                            } elseif ($row->lead_status == 2) {
                                                                                echo 'Sale';
                                                                            } elseif ($row->lead_status == 3) {
                                                                                echo 'Not Intrested';
                                                                            } elseif ($row->lead_status == 4) {
                                                                                echo 'VM';
                                                                            } else {
                                                                                echo 'DND';
                                                                            } ?></td><?php } ?>

                                                                    <?php if ($manage_column[0]->description_col == 1) { ?>
                                                                        <td><?= $row->description ?></td><?php } ?>
                                                                </tr>
                                                        <?php $n++;
                                                            }
                                                        }
                                                        else
                                                        {
                                                        echo '<tr><td colspan="10" class="text-center">No Record Found</td></tr>';
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- </form> -->
                                <?= $links ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</main>


<!-- Modal -->
<form action="Lead/managecolumn" method="post">
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
                            <input class="form-check-input" type="checkbox" value="1" name="first_name_col" id="flexCheck" <?php if ($manage_column[0]->first_name_col == 1) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                            <label class="form-check-label" for="flexCheck">
                                First Name
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="last_name_col" id="flexCheck1" <?php if ($manage_column[0]->last_name_col == 1) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                            <label class="form-check-label" for="flexCheck1">
                                Last Name
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="mobile_1_col" id="flexCheck2" <?php if ($manage_column[0]->mobile_1_col == 1) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                            <label class="form-check-label" for="flexCheck2">
                                Phone
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="mobile_2_col" id="flexCheck3" <?php if ($manage_column[0]->mobile_2_col == 1) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                            <label class="form-check-label" for="flexCheck3">
                                Second Phone
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="email_col" id="flexCheck4" <?php if ($manage_column[0]->email_col == 1) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                            <label class="form-check-label" for="flexCheck4">
                                Email
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="lead_status_col" id="flexCheck5" <?php if ($manage_column[0]->lead_status_col == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                            <label class="form-check-label" for="flexCheck5">
                                Lead Status
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="description_col" id="flexCheck6" <?php if ($manage_column[0]->description_col == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                            <label class="form-check-label" for="flexCheck6">
                                Description
                            </label>
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

$(function () { 
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
</script>