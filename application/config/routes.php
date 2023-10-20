<?php

defined('BASEPATH') OR exit('No direct script access allowed');



/*

| -------------------------------------------------------------------------

| URI ROUTING

| -------------------------------------------------------------------------

| This file lets you re-map URI requests to specific controller functions.

|

| Typically there is a one-to-one relationship between a URL string

| and its corresponding controller class/method. The segments in a

| URL normally follow this pattern:

|

|	example.com/class/method/id/

|

| In some instances, however, you may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

|

| Please see the user guide for complete details:

|

|	https://codeigniter.com/userguide3/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There are three reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router which controller/method to use if those

| provided in the URL cannot be matched to a valid route.

|

|	$route['translate_uri_dashes'] = FALSE;

|

| This is not exactly a route, but allows you to automatically route

| controller and method names that contain dashes. '-' isn't a valid

| class or method name character, so it requires translation.

| When you set this option to TRUE, it will replace ALL dashes in the

| controller and method URI segments.

|

| Examples:	my-controller	-> my_controller

|		my-controller/my-method	-> my_controller/my_method

*/

$route['default_controller'] = 'Login';

$route['404_override'] = 'Custom404';

$route['translate_uri_dashes'] = FALSE;

$route['create-table/(:any)'] = 'Database_config/create_table/$1';



// dashboard route

$route['dashboard'] = 'admin';



// lead module routes

$route['list-lead']= 'Lead';

$route['lead-transfer']= 'lead/transferLeadList';

$route['create-lead']= 'Lead/create';

$route['update-lead']= 'Lead/update';

$route['lead-detail']= 'Lead/detail';





// contacts module routes

$route['list-contact']= 'Contacts';

$route['create-contact']= 'Contacts/create';

$route['update-contact']= 'Contacts/update';

$route['contact-detail']= 'Contacts/detail';



// Booking module routes

$route['list-booking']= 'Bookings';

$route['create-booking']= 'Bookings/create';

$route['update-booking']= 'Bookings/update';

$route['booking-detail']= 'Bookings/detail';



// setting route 

$route['setting']='Settings';



// admin panel routes 





$route['admin-dashboard']='backend/Security';

$route['remote_status'] = 'custom_field/manage_remote_status';

$route['remote_status/manage_status'] = 'custom_field/manage_remote_status';

$route['remote_status/index'] = 'custom_field/manage_remote_status';



// user management routes 

$route['user_management/user-list']='User_management/manage_user';

// Logout Routes

$route['logout'] = 'Logout/logout';



$route['admin'] = 'Admin';



$route['tech'] = 'Tech';

$route['users_management/dashboard'] = "User_management";

$route['custom_field/dashboard'] = "custom_field";

$route['custom_field/remote-list'] = "custom_field/manage_remote_status";

$route['custom_field/sale-status-list'] = "custom_field/manage_sale_status";

$route['custom_field/worked-status-list'] = "custom_field/manage_work_status";

$route['custom_field/plan'] = "custom_field/plan";

$route['security-control/dashboard']="backend/security";

$route['security/permission-category'] = "backend/security/permission_category";

$route['security/addPermissionCategory'] = "backend/security/addPermissionCategory";

$route['security/permissionCat_update_status'] = "backend/security/permissionCat_update_status";



$route['security/permission-section'] = "backend/security/permission_section";

$route['security/addPermissionSection'] = "backend/security/addPermissionSection";

$route['security/permissionSec_update_status'] = "backend/security/permissionSec_update_status";

$route['security/manage-role'] = "backend/security/manage_role";

$route['security/addRole'] = "backend/security/addRole";

$route['security/role_update_status'] = "backend/security/role_update_status";



$route['security/permission-role_list'] = "backend/security/manage_permission_role";

$route['security/log-system'] = "backend/security/app_log";

$route['security/UpdatePermissionRole'] = "backend/security/UpdatePermissionRole";



// invoice module routes 

$route['list-invoice'] = "invoice/index";
$route['manage-transaction'] = "invoice/manage_transaction";

// $route['create-invoice'] = "invoice/create";

// $route['create-invoice-two'] = "invoice/createtwo";



$route['create-invoice'] = "invoice/createtwo";





$route['update-invoice'] = "invoice/create";

$route['detail-invoice'] = "invoice/detailinvoice";

$route['view-invoice'] = "invoice/viewinvoice";

$route['payment-invoice'] = "View_invoice";

$route['payment_success'] = "View_invoice/payment_success";

$route['payment_failed'] = "View_invoice/payment_failed";

$route['pay'] = "View_invoice/pay";

$route['update-lead-by-tech']= 'Lead/updateByTech';

$route['forget-password']= 'Forget_password';

$route['my-account']= 'Admin/my_account';

$route['welcome_template']= 'contacts/welcome_template';

$route['update_password'] = 'Forget_password/update_password';



// import leads data routes

$route['import/import-data'] = "import/index";

$route['import/import-list'] = "import/list";

$route['import/list-import'] = "import/listimport";

$route['import/duplicate-list-import'] = "import/duplicatelistimport";

$route['import/imported-data-detail-list/(:any)'] = "import/importdetaillist/$1";



//email setup backend routes

$route['email-setup/dashboard'] = "backend/email_setup/index";

$route['email-setup/create'] = "backend/email_setup/create_email";

$route['email-setup/store'] = "backend/email_setup/create_store";

//chat message send

$route['getmessage'] = 'Chat/getmessage';

$route['sendmessage'] = 'Chat/sendmessage';

$route['user_management/user-expire-days'] = 'User_management/user_expire_days';
$route['email-setup/all-leads'] = "backend/email_setup/all_leads";
$route['email-setup/lead-email-history'] = "backend/email_setup/lead_email_history";
$route['user_management/user-login-activity'] = 'User_management/user_login_activity';
$route['user_management/user-cookie-logout'] = 'User_management/user_cookie_logout';
$route['invoice-reminder'] = 'invoice/invoice_reminder';


