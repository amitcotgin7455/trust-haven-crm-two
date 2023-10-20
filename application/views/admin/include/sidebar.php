<!-- Aside section started -->
<?php
$method = $this->router->fetch_class();
$all_routes = $this->router->routes;
$url = end($this->uri->segment_array());
$sidebar_menu = array();
switch(ucfirst($method))
{
    case 'Custom_field':
        $sidebar_menu = array(
            "Dashboard"     => "custom_field/dashboard",
            "Remote By" => "custom_field/remote-list",
            "Sale By" => "custom_field/sale-status-list",
            "Worked By" => "custom_field/worked-status-list"
        );
        break;
    case 'User_management':
        $sidebar_menu = array(
            "Dashboard"     => "users_management/dashboard",
            "User List"     => "user_management/user-list",
            "User Expire days"     => "user_management/user-expire-days"
        );
        break;  
    case 'Security':
        $sidebar_menu = array(
            "Dashboard"               => "security-control/dashboard",
            "Permission Category"     => "security/permission-category",
            "Permission Section"      => "security/permission-section",
            "Manage Role"             => "security/manage-role",
            //"Permission Role Listing" => "security/permission-role_list",
            "System Log"              => "security/log-system"
        );
        break; 
     case 'Import' ;
     $sidebar_menu = array(
        "Dashboard"               => "import/import-data",
        "Import Data"               => "import/import-list",
        "Imported Data List"               => "import/list-import",
        "Duplicate Data List"               => "import/duplicate-list-import",
      
    );
    break; 
    case 'Email_setup';
     $sidebar_menu = array(
        "Dashboard"               => "email-setup/dashboard",
        "Setup Email"               => "email-setup/create",
        "All Leads"               => "email-setup/all-leads",
    );
    break;              
}
?>
<style>
    .accordion-button:after {
    display: none;
}
</style>
<aside class="h-100">
    <div class="card">
        <div class="card-body h-100">
            <div class="accordion" id="accordionFlushExample">
                <?php
                foreach($sidebar_menu as $page_list=>$page_url)
                {   
                    ?>
                    <?php  $page_url1 = substr($page_url, strrpos($page_url, '/' )+1)?>
                <div class="accordion-item <?php echo $active;?>" >
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <a class="accordion-button collapsed<?php if($page_url1==$url){ echo 'Active-sidebar';}?>" href="<?=base_url().$page_url?>"  aria-expanded="false" aria-controls="flush-collapseTwo">
                        <i class="fa-regular fa-user icons"></i>
                            
                            <?=$page_list?>
                        </a>
                    </h2>
                    
                </div>
                <?php } ?>
                
              
            </div>
        </div>
    </div>
</aside>
<!-- Aside section end -->