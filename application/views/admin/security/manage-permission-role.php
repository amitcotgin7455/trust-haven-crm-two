<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/status_checkbox.css">
<main class="security-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <!-- Aside section started -->
                <?php require_once(APPPATH . "views/admin/include/sidebar.php"); ?>
                <!-- Aside section end -->
            </div>
            <div class="col-lg-10">
                <div class="row">
                    
                    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header" style="background-color:#b41e45;color:white;">
                        <h3 class="card-title">
                            Update Permission User                        </h3>
                        
                    </div>
                    <div class="card-body">
                        <!--  -->
                        <!--  -->
                        <!--  -->

                        <!-- form start  -->
                        <form action="<?=base_url()?>security/UpdatePermissionRole" method="POST">
                     
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>User Role :</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <select name="role" class="form-control" disabled>
                                        <option value="">Select User Role</option>
                                        <?php
                                        if($role_list)
                                        {
                                            foreach($role_list as $role)
                                            {
                                            ?>
                                        <option value="<?=$role->id?>" <?=($role->id==$role_id)?'selected':''?>><?=$role->title?></option>
                                          
                                    </option>  
                                            <?php
                                        }   
                                        }
                                        ?>
                                                                 
                                    </select>
 
                                    </div>
                                    <input type="hidden" value="<?=$role_id?>" name="user_role">
                                    <span class="text-danger"></span>
                                </div>
                                

                            </div>
                            <div class="row mt-4">
                                <?php
                                foreach($result as $section)
                                {
                                    ?>
                                <div class="form-group col-md-4 mt-4">
                                    <h5 style="color:#b41e45"><?=$section->title?> :</h5>
                                    <div class="input-group" style="flex-direction: column;">
                                        <?php
                                        foreach($section->section as $section_list)
                                        {
                                        ?>   
                                        <div>
                                            <input type="checkbox" <?=(in_array($section_list->id,$exist_permission))?'checked':''?> name="permission_id[]" value="<?=$section_list->id?>" style="margin-top:2px ;" id="leadCreate-<?=$section->id.'_'.$section_list->id?>">
                                            <label for="leadCreate-<?=$section->id.'_'.$section_list->id?>" style="font-weight:400">&nbsp; <?=$section_list->title?></label>
                                            <input type="hidden" value="<?=$section_list->id?>" name="section_id[]">
                                </div>
                                        <?php   
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                                <?php } ?>


                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mt-3">
                                    <button type="submit" class="btn btn-primary" style="background-color: #b41e45;border:none;" fdprocessedid="jl0fi">Save Changes</button>
                                </div>
                            </div>
                        </form>

                        <!-- form end  -->
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

</script>