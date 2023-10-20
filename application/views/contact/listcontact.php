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
    .leads-btn.bottom-btn {
        background: #fff;
        padding: 18px 20px 25px;
        box-shadow: 0 -2px 4px -1px rgba(0, 0, 0, .15);
        /* z-index: 9999; */
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
        width: auto !important;
    min-width: 100%;
    overflow: auto;
    height: 76.5vh;
    max-height: inherit;
    scrollbar-width: thin !important;
    }
    .center-box {
        width: 30px;
    }
    body .form-select-sm {
        font-size: 0.675rem;
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
                <h5 class="d-inline">All Contacts</h5>
            </div>
            <div class="col-6">
                <div class="leads-btn mb-2">
                    <a href="#" class="btn button_btn delete-btn d-none" data-bs-toggle="dropdown" aria-expanded="false">Acitons<i class="ps-1 fa-solid fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <!-- <li><a class="dropdown-item" href="#">Add to Campaigns</a></li>
                        <li><a class="dropdown-item" href="#">Add to Campaigns</a></li> -->
                        <li><input type="submit" value="Delete" id="DeleteContact" class="dropdown-item" >
                    </ul>
                    <a href="<?php echo base_url(); ?>create-contact" class="btn btn_save"> Create Contact</a>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="lead_page pt-3">

    <form action="<?php echo base_url(); ?>list-contact" method="get">
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
                                                                <input class="form-control me-1" type="text" name="last_name" placeholder="Type here" >
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
                                                                <input class="form-control me-1" type="email" name="email" placeholder="Type here">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault23">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault23">
                                                            Customer Id
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input class="form-control me-1" type="text" name="customer_id" placeholder="Type here">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault6">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault6">
                                                            Email Opt Out
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input  type="checkbox" name="email_opt_out" placeholder="Type here" value="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault7">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault7">
                                                            Plan Status
                                                        </label>
                                                        <div class="user-system d-none" id="actions">
                                                            <div class="ac-dropdown pe-3">                                                            
                                                                <select class="form-select form-select-md me-3" aria-label=".form-select-md example" id="dropdown_selector" name="plan_status" >
                                                                    <option value="">Select lead status</option>
                                                                    <option value="1">Active</option>
                                                                    <option value="2">Refunded Or Cancelled</option>
                                                                    <option value="3">DND</option>
                                                                    <option value="4">Voided</option>
                                                                </select>                                                            
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault8">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault8">
                                                            Plan
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input class="form-control me-1" type="text" name="plan" placeholder="Type here">
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault10">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault10">
                                                            Amount
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input class="form-control me-1" type="text" name="amount" placeholder="Type here" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault11">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault11">
                                                            Remote By
                                                        </label>
                                                        <div class="user-system d-none" id="actions">
                                                            <div class="ac-dropdown pe-3">                                                            
                                                                <select class="form-select form-select-md me-3" aria-label=".form-select-md example" id="dropdown_selector" name="remote_by" >
                                                                    <option value="">Select Remote By</option>
                                                                    <?php if(!empty($remote_id)){
                                                                        foreach($remote_id as $remote){ ?>    
                                                                        <option value="<?=$remote->id;?>"><?=$remote->title;?></option>
                                                                    <?php } } ?>
                                                                </select>                                                            
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault12">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault12">
                                                            Worked By
                                                        </label>
                                                        <div class="user-system d-none" id="actions">
                                                            <div class="ac-dropdown pe-3">                                                            
                                                                <select class="form-select form-select-md me-3" aria-label=".form-select-md example" id="dropdown_selector" name="worked_by" >
                                                                    <option value="">Select Worked By</option>
                                                                    <?php if(!empty($worked_id)){
                                                                        foreach($worked_id as $work){ ?>    
                                                                        <option value="<?=$work->id;?>"><?=$work->title;?></option>
                                                                    <?php } } ?>
                                                                </select>                                                            
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault13">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault13">
                                                            Sale By
                                                        </label>
                                                        <div class="user-system d-none" id="actions">
                                                            <div class="ac-dropdown pe-3">                                                            
                                                                <select class="form-select form-select-md me-3" aria-label=".form-select-md example" id="dropdown_selector" name="sale_by" >
                                                                    <option value="">Select Remote By</option>
                                                                    <?php if(!empty($sale_id)){
                                                                        foreach($sale_id as $sale){ ?>    
                                                                        <option value="<?=$sale->id;?>"><?=$sale->title;?></option>
                                                                    <?php } } ?>
                                                                </select>                                                            
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault14">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault14">
                                                            Work Status
                                                        </label>
                                                        <div class="user-system d-none" id="actions">
                                                            <div class="ac-dropdown pe-3">                                                            
                                                                <select class="form-select form-select-md me-3" aria-label=".form-select-md example" id="dropdown_selector" name="work_status" >
                                                                    <option value="">Select Work Status</option>
                                                                    <option value="1">Pending</option>
                                                                    <option value="2">Done</option>
                                                                </select>                                                            
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault15">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault15">
                                                           Courtesy
                                                        </label>
                                                        <div class="user-system d-none" id="actions">
                                                            <div class="ac-dropdown pe-3">                                                            
                                                                <select class="form-select form-select-md me-3" aria-label=".form-select-md example" id="dropdown_selector" name="courtesy" >
                                                                    <option value="">Select Courtesy </option>
                                                                    <option value="1">Pending</option>
                                                                    <option value="2">Done</option>
                                                                </select>                                                            
                                                            </div>                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault16">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault16">
                                                            BBB
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input  type="checkbox" name="bbb" placeholder="Type here" value="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault17">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault17">
                                                            HA
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input  type="checkbox" name="ha" placeholder="Type here" value="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault18">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault18">
                                                            FB
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input  type="checkbox" name="fb" placeholder="Type here" value="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault19">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault19">
                                                            Google
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input  type="checkbox" name="google" placeholder="Type here" value="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault20">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault20">
                                                            Service
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <input  type="checkbox" name="service" placeholder="Type here" value="1">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault21">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault21">
                                                            Sale Date
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                <!-- <input class="form-control me-1"  type="date" name="sale_date" placeholder="Type here" > -->
                                                                <div id="contact_sale_date" style="width: 200px;padding-left: 24px;" 
                                                                    class="input-group date" 
                                                                    data-date-format="mm-dd-yyyy"> 
                                                                <input class="form-control" 
                                                                        type="text" readonly name="sale_date" value="<?=$sale_date?>"/> 
                                                                <span class="input-group-addon"> 
                                                                    <i class="glyphicon glyphicon-calendar"></i> 
                                                                </span> 
                                                            </div> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="touch-record" id="flexCheckDefault55">
                                                        <label class="form-check-label mb-2" for="flexCheckDefault55">
                                                            Expiry Date
                                                        </label>
                                                        <div class="user-system usr-systm d-none" id="actions">
                                                            <div class="ac-dropdown pe-1">
                                                                From Date : 
                                                                <div id="expiry_from_date" style="width: 200px;padding-left: 24px;" 
                                                                    class="input-group date" 
                                                                    data-date-format="mm-dd-yyyy"> 
                                                                    <input class="form-control" 
                                                                        type="text" readonly name="from_expiry_date" value="<?=$sale_date?>"/> 
                                                                    <span class="input-group-addon"> 
                                                                        <i class="glyphicon glyphicon-calendar"></i> 
                                                                    </span> 
                                                                </div> 
                                                                <!-- <input class="form-control me-1"  type="date" name="from_expiry_date" placeholder="Type here" > -->
                                                            </div>
                                                            <div class="ac-dropdown pe-1">
                                                                To Date : 
                                                                <!-- <input class="form-control me-1"  type="date" name="to_expiry_date" placeholder="Type here" > -->
                                                                <div id="expiry_to_date" style="width: 200px;padding-left: 24px;" 
                                                                    class="input-group date" 
                                                                    data-date-format="mm-dd-yyyy"> 
                                                                    <input class="form-control" 
                                                                        type="text" readonly name="to_expiry_date" value="<?=$sale_date?>"/> 
                                                                    <span class="input-group-addon"> 
                                                                        <i class="glyphicon glyphicon-calendar"></i> 
                                                                    </span> 
                                                                </div> 
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
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="leads-btn bottom-btn">
                        <a href="<?php echo base_url(); ?>list-contact" class="btn button_btn clear_check">Clear</a>
                        <!-- <a href="#" class="btn btn_save">Apply Filter</a> -->
                        <input type="submit" class="btn btn_save" value="Apply Filter">
                    </div>
                </div>
    </form>
    <div class="col-xl-10 col-lg-9" id="table_data_check">
            
    <div class="row">
        <?php
        $filters = "";
         if(!empty($_GET))
         {
            $filters .= ($_GET['first_name'])?' ,First Name':'';
            $filters .= ($_GET['last_name'])?' ,Last Name':'';
            $filters .= ($_GET['phone_no'])?' ,Phone No':'';
            $filters .= ($_GET['phone_no2'])?' ,Alt Phone No':'';
            $filters .= ($_GET['email'])?' ,Email':'';
            $filters .= ($_GET['customer_id'])?' ,Customer Id':'';
            $filters .= ($_GET['plan_status'])?' ,Plan Status':'';
            $filters .= ($_GET['Plan'])?' ,Plan':'';
            $filters .= ($_GET['amount'])?' ,Amount':'';
            $filters .= ($_GET['remote_by'])?' ,Remote By':'';
            $filters .= ($_GET['sale_by'])?' ,Sale By':'';
            $filters .= ($_GET['work_status'])?' ,Work Status':'';
            $filters .= ($_GET['courtesy'])?' ,Courtesy':'';
            $filters .= ($_GET['ha'])?' ,HA':'';
            $filters .= ($_GET['fb'])?' ,FB':'';
            $filters .= ($_GET['bbb'])?' ,BBB':'';
            $filters .= ($_GET['google'])?' ,Google':'';
            $filters .= ($_GET['service'])?' ,Service':'';
            $filters .= ($_GET['sale_date'])?' ,Sale Date':'';
            if(!empty($_GET['from_expiry_date']) || !empty($_GET['to_expiry_date']))
            {
            $filters .= ' ,Expiry Date';
            }
            if(!empty($_GET['from']) || !empty($_GET['too']))
            {
            $filters .= ' ,Date';
            }
            $filters .= ($_GET['s'])?' ,Search by':'';
            
            ?>
    Total Record : <?=count($result)?>. Filter by : <?=substr($filters,+2)?>
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
                                                        <input class="form-check-input all-select" type="checkbox" value="" id="flexCheckDefault70">
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
                                                    <?php if ($manage_column[0]->customer_id_col == 1) { ?><th>Customer Id</th><?php } ?>
                                                    <?php if ($manage_column[0]->email_opt_out_col == 1) { ?><th>Email Opt Out</th><?php } ?>
                                                    <?php if ($manage_column[0]->plan_status_col == 1) { ?><th>Plan Status</th><?php } ?>
                                                    <?php if ($manage_column[0]->plan_col == 1) { ?><th>Plan</th><?php } ?>
                                                    <?php if ($manage_column[0]->amount_col == 1) { ?><th>Amount</th><?php } ?>
                                                    <?php if ($manage_column[0]->remote_by_col == 1) { ?><th>Remote By</th><?php } ?>
                                                    <?php if ($manage_column[0]->sale_by_col == 1) { ?><th>Sale By</th><?php } ?>
                                                    <?php if ($manage_column[0]->worked_by_col == 1) { ?><th>Worked By</th><?php } ?>
                                                    <?php if ($manage_column[0]->work_status_col == 1) { ?><th>Work Status</th><?php } ?>
                                                    <?php if ($manage_column[0]->courtesy_col == 1) { ?><th>Courtesy</th><?php } ?>
                                                    <?php if ($manage_column[0]->bbb_col == 1) { ?><th>BBB</th><?php } ?>
                                                    <?php if ($manage_column[0]->ha_col == 1) { ?><th>HA</th><?php } ?>
                                                    <?php if ($manage_column[0]->fb_col == 1) { ?><th>FB</th><?php } ?>
                                                    <?php if ($manage_column[0]->google_col == 1) { ?><th>Google</th><?php } ?>
                                                    <?php if ($manage_column[0]->service_col == 1) { ?><th>Service</th><?php } ?>
                                                    <?php if ($manage_column[0]->sale_date_col == 1) { ?><th>Sale Date</th><?php } ?>
                                                    <?php if ($manage_column[0]->description_col == 1) { ?><th>Description</th><?php } ?>
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
                                                        <?php if ($manage_column[0]->first_name_col == 1) { ?><td><a href="<?php echo base_url(); ?>contact-detail?id=<?= base64_encode($row->id); ?>"><?= $row->first_name ?></a></td><?php } ?>
                                                        <?php if ($manage_column[0]->last_name_col == 1) { ?><td><a href="<?php echo base_url(); ?>contact-detail?id=<?= base64_encode($row->id); ?>"><?= $row->last_name ?></a></td><?php } ?>
                                                        <?php if ($manage_column[0]->mobile_1_col == 1) { ?><td class="mobile_no_list" data-id ="<?=$row->id?>" id="mobile_1-<?=$row->id?>" data-mobile1="<?=$row->mobile_1?>"><?php if(!empty($row->mobile_1)) { echo '<span class="fa fa-eye-slash text-danger"></span>'; }?></td><?php } ?>
                                                        <?php if ($manage_column[0]->mobile_2_col == 1) { ?><td class="mobile_no_list2" data-id ="<?=$row->id?>" id="mobile_2-<?=$row->id?>" data-mobile2="<?=$row->mobile_2?>"><?php if(!empty($row->mobile_2)) { echo '<span class="fa fa-eye-slash text-danger"></span>'; }?></td><?php } ?>
                                                        <?php if ($manage_column[0]->email_col == 1) { ?><td><?= $row->email ?></td><?php } ?>
                                                        <?php if ($manage_column[0]->customer_id_col == 1) { ?><td class="customer_id_list" data-id="<?=$row->id?>" id="customer-id-<?=$row->id?>" data-customer="<?=$row->customer_id?>"><span class="fa fa-eye-slash text-danger"></span></td><?php } ?>
                                                        <?php if ($manage_column[0]->email_opt_out_col == 1) { ?><td><?php if($row->email_opt_out==1)  {echo 'Yes';}else{ echo 'No'; }?></td><?php } ?>
                                                        <?php if ($manage_column[0]->plan_status_col == 1) { ?><td><?php if($row->plan_status==1)  {echo 'Active';}elseif($row->plan_status==2){ echo 'Refunded ';}elseif($row->plan_status==3){ echo 'Cancelled' ;}elseif($row->plan_status==4){ echo 'DND';}elseif($row->plan_status==4){ echo 'Voided';}else{}?></td><?php } ?>
                                                        <?php if ($manage_column[0]->plan_col == 1) { ?><td><?= $row->plan ?></td><?php } ?>
                                                        <?php if ($manage_column[0]->amount_col == 1) { ?><td class="amount_id_list" data-id ="<?=$row->id?>" id="amount-<?=$row->id?>" data-amount="<?=$row->amount?>"><span class="fa fa-eye-slash text-danger"></span></td><?php } ?>
                                                        <?php if ($manage_column[0]->remote_by_col == 1) { ?><td><?= $row->remote_title ?></td><?php } ?>
                                                        <?php if ($manage_column[0]->sale_by_col == 1) { ?><td><?= $row->sale_title ?></td><?php } ?>
                                                        <?php if ($manage_column[0]->worked_by_col == 1) { ?><td><?= $row->work_title ?></td><?php } ?>
                                                        <?php if ($manage_column[0]->work_status_col == 1) { ?><td><?php if($row->work_status==1){ echo 'Pending';}else{ echo 'Done'; } ?></td><?php } ?>
                                                        <?php if ($manage_column[0]->courtesy_col == 1) { ?><td><?php if($row->courtesy==1){ echo 'Pending';}else{ echo 'Done'; } ?></td><?php } ?>
                                                        <?php if ($manage_column[0]->bbb_col == 1) { ?><td><?php if($row->bbb==1) {echo 'Yes';}else{ echo 'No'; }?></td><?php } ?>
                                                        <?php if ($manage_column[0]->ha_col == 1) { ?><td><?php if($row->ha==1) {echo 'Yes';}else{ echo 'No'; }?></td><?php } ?>
                                                        <?php if ($manage_column[0]->fb_col == 1) { ?><td><?php if($row->fb==1) {echo 'Yes';}else{ echo 'No'; }?></td><?php } ?>
                                                        <?php if ($manage_column[0]->google_col == 1) { ?><td><?php if($row->google==1) {echo 'Yes';}else{ echo 'No'; }?></td><?php } ?>
                                                        <?php if ($manage_column[0]->service_col == 1) { ?><td><?php if($row->service==1) {echo 'Yes';}else{ echo 'No'; }?></td><?php } ?>
                                                        <?php if ($manage_column[0]->sale_date_col == 1) { ?><td><?= $row->sale_date ?></td><?php } ?>
                                                        <?php if ($manage_column[0]->description_col == 1) { ?><td><?= $row->description ?></td><?php } ?>
                                                    </tr>
                                            <?php $n++;
                                                }
                                            } else
                                            {
                                            echo '<tr><td colspan="20" class="text-center">No Record Found</td></tr>';
                                            } ?>
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
<form action="contacts/managecolumn" method="post">
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
                            <input class="form-check-input" type="checkbox" value="1" name="customer_id_col" id="customer_id_col" <?php if ($manage_column[0]->customer_id_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="customer_id_col">Customer Id</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="email_opt_out_col" id="email_opt_out_col" <?php if ($manage_column[0]->email_opt_out_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="email_opt_out_col">Email Opt Out</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="plan_status_col" id="plan_status_col" <?php if ($manage_column[0]->plan_status_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="plan_status_col">Plan Status</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="plan_col" id="plan_col" <?php if ($manage_column[0]->plan_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="plan_col">Plan</label>
                        </div>
                       
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="amount_col" id="amount_col" <?php if ($manage_column[0]->amount_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="amount_col">Amount</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="remote_by_col" id="remote_by_col" <?php if ($manage_column[0]->remote_by_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="remote_by_col">Remote By</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="sale_by_col" id="sale_by_col" <?php if ($manage_column[0]->sale_by_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="sale_by_col">Sale By</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="worked_by_col" id="worked_by_col" <?php if ($manage_column[0]->worked_by_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="worked_by_col">Worked By</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="work_status_col" id="work_status_col" <?php if ($manage_column[0]->work_status_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="work_status_col">Work Status</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="courtesy_col" id="courtesy_col" <?php if ($manage_column[0]->courtesy_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="courtesy_col">Courtesy</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="bbb_col" id="bbb_col" <?php if ($manage_column[0]->bbb_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="bbb_col">BBB</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="ha_col" id="ha_col" <?php if ($manage_column[0]->ha_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="ha_col">HA</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="fb_col" id="fb_col" <?php if ($manage_column[0]->fb_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="fb_col">FB</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="google_col" id="google_col" <?php if ($manage_column[0]->google_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="google_col">Google</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="service_col" id="service_col" <?php if ($manage_column[0]->service_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="service_col">Service</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="sale_date_col" id="sale_date_col" <?php if ($manage_column[0]->sale_date_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="sale_date_col">Sale Date</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="description_col" id="flexCheck6" <?php if ($manage_column[0]->description_col == 1) {echo 'checked';} ?>>
                            <label class="form-check-label" for="flexCheck6">Description</label>
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
            $("#contact_sale_date").datepicker({  
                autoclose: true,  
                todayHighlight: true, 
            }).datepicker('update', new Date('')); 

            $("#expiry_from_date").datepicker({  
                autoclose: true,  
                todayHighlight: true,
                defaultDate: "+1w" 
            }).datepicker('update', new Date('')); 
            $("#expiry_to_date").datepicker({  
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


</script>