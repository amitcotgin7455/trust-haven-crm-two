<section class="inbuild-template mt-3">
    <div class="container-flex ">
        <header class="m-head">

            <div class="name-t">
                Templates
            </div>
            <div class="search-b d-flex justify-arround">
                <!-- <div class="dropdown ">
                    <button class="btn mt-1  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        All Modules
                    </button>
                    <ul class="dropdown-menu  scrollbar2" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>

                    </ul>
                </div> -->
                <!-- <div class="input-group mx-3">
                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control search-form"
                        placeholder="Search Template " fdprocessedid="qw9l">
                    <div class="input-group-addon">
                        <span class="input-group-text bg-white d-block">
                            <box-icon name="search" color="#b31942"></box-icon>
                        </span>
                    </div>
                </div> -->
            </div>

        </header>
    </div>
</section>
<div class="container">
    <div class="row">

        <div class="col-md-4 mx-auto mt-4">
            <?php if(!empty($this->session->flashdata('done'))){?>
            <div class="alert alert-success" style="background-color:green;color:white; " id="success">
                <?php echo $this->session->flashdata('done');?>

            </div>
            <?php } ?>
            <?php if(!empty($this->session->flashdata('error'))){?>
            <div class="alert alert-danger" style="background-color:red; color:white;" id="error">
                <?php echo $this->session->flashdata('error');?>

            </div>
            <?php } ?>
        </div>

    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col-lg-3 sidepanel ">
            <button data-zcqa="createNewTemplate" class="mL25 primaryflatbtn createTemplateBtn theme-btn" id="letsclick"
                fdprocessedid="h61pwq"> <i class="fa fa-add"></i> New Template</button>
            <!-- Button trigger modal -->


            <!-- Modal -->




            <p class="lh-sm mx-3 mt-4"><a href="" class="text-decoration-none  fw-bold ">All Template</a></p>
            <template></template>
            <!-- <p class="lh-sm mx-3"><a href="" class="text-decoration-none text-black">Favorites</a></p>
            <p class="lh-sm mx-3"><a href="" class="text-decoration-none text-black">Associates Templates</a></p>
            <p class="lh-sm mx-3"><a href="" class="text-decoration-none text-black">Created by me</a></p>
            <p class="lh-sm mx-3"><a href="" class="text-decoration-none text-black">Shared by me</a></p>
            <p class="lh-sm mx-3"><a href="" class="text-decoration-none text-black">Public Email Templates</a></p> -->
            <p class="lh-sm mx-3"><a href="" class="text-decoration-none text-black"></a></p>
        </div>
        <div class="col-lg-9">
            <div class="div-top d-flex justify-between border-bottom">
                <div class="div1 ">
                    <p>Template Name</p>
                </div>
                <div class="div2">
                    <p>Modified By</p>
                </div>
            </div>
            <?php if(!empty($template)){
                foreach($template as $row){
                    ?>


            <div class="template-name d-flex justify-between border-bottom " id="delete-template">
                <div class="temp1">
                    <i class="fa-regular fa-star"></i>
                    <span class="mx-2 "> <?php echo $row->template_name;?>/<?php echo $row->template_subject;?> </span>
                    <p class="mx-4 " style="font-size: 13px; line-height:2px;"><span class="text-success">
                            <?php if($row->module_name==1) echo 'Lead';elseif($row->module_name==2){ echo 'Callback '; }else{ echo 'New Lead';  }?> .</span> <span> Email</span></p>
                </div>
                <div class="temp1">
                    <span><?php echo $row->username;?></span>
                    <p style="font-size: 13px; line-height:2px;"> <span class="text-muted"><?php echo $row->created_at;?></span> 
                            <a href="<?php echo base_url();?>sales/setup/deleteTemplate/?id=<?php  echo base64_encode($row->template_id); ?>" onclick="return confirm('Do You Want Delete This Template');">
                            <span class="fa fa-trash text-danger deleteemail"> </span></a>
                         </p>

                </div>
            </div>
            <?php
             }
            }
            ?>
        </div>
    </div>
</div>
<form action="<?php echo base_url();?>sales/setup/list_template" method="post">
    <div class="container position-relative d-none" id="tempmodal">
        <div class="modal-content bg-body shadow-lg p-3 modal-width">
            <div class="modal-header mb-3">
                <h5 class="modal-title  " id="modalTitleId">Create Email Template</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-3">
                <input type="date" class="d-none" name="created_at" value="<?php echo date('Y-m-d');?>">
                <div class="pT20 pB20 dIB d-flex justify-around">
                    <span class="">
                        Select Module :
                    </span>
                    <span class="selection-td">
                        <select class="form-select form-select-lg " aria-label=".form-select-lg example" required
                            name="section_name">
                            <option value="">Select Module</option>
                            <option value="Lead">Lead</option>
                            <option value="Callback">Callback</option>
                            <option value="New Lead">New Lead</option>
                        </select>
                    </span>
                </div>
                <div class="alignright mt-lg-4 "><input type="button" data-zcqa="createCancelBtn" value="Cancel"
                        class="cursorPointer newgraybtn cancel-btn cancelDeNT">
                    <!-- <a href="<?php echo base_url(); ?>setup/list_template"> -->
                    <input type="submit" data-zcqa="createNextBtn" value="Next"
                        class="cursorPointer yesDeNT primarybtn mR0">
                </div>
                <!-- </a> -->
            </div>
        </div>
    </div>
</form>
<script>
var modalId = document.getElementById('modalId');
modalId.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    let button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    let recipient = button.getAttribute('data-bs-whatever');

    // Use above variables to manipulate the DOM
});
</script>