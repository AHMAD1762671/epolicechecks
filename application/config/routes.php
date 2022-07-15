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
  |	https://codeigniter.com/user_guide/general/routing.html
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
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
 */
$route['default_controller'] = 'site';
$route['404_override'] = 'portal/error404';
$route['translate_uri_dashes'] = FALSE;


/////////////////////////   User Roles & Permissions  ////////////////////////////
/////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////


$route['portal/user-permissions']['GET'] = "portal/all_user_permissions";
$route['portal/add-user-permission']['POST'] = "portal/add_user_permission_save";
$route['portal/edit-user-permission']['POST'] = "portal/edit_user_permission_save";
$route['portal/delete-user-permission']['POST'] = "portal/delete_user_permission";
$route['portal/user-roles']['GET'] = "portal/all_user_roles";
$route['portal/add-user-role']['POST'] = "portal/add_user_role_save";
$route['portal/edit-user-role']['POST'] = "portal/edit_user_role_save";
$route['portal/delete-user-role']['POST'] = "portal/delete_user_role";
$route['portal/user-roles-permissions/(:any)']['GET'] = "portal/all_user_roles_permissions/$1";
$route['portal/add-user-roles-permissions']['POST'] = "portal/add_user_roles_permissions_save";


/////////////////////////   Admin Panel  ////////////////////////////
/////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////

//$route['portal'] = "portal";
$route['portal/signin']['POST'] = "portal/signin";
$route['portal/account']['GET'] = "portal/account";
$route['portal/account']['POST'] = "portal/account_save";
//$route['portal/dashboard'] = "portal/dashboard";
$route['portal/dashboard'] = "portal/brands_dashboard_before";


$route['portal/dashboard-flag'] = "portal/brands_dashboard";

$route['portal/forgot-password']['GET'] = "portal/forgot_password";
$route['portal/forgot-password']['POST'] = "portal/forgot_password_send";
$route['portal/reset-password/(:any)']['GET'] = "portal/reset_password/$1";


$route['portal/reset-password']['POST'] = "portal/reset_password_save";
$route['portal/countries']['GET'] = "portal/countries_list";
$route['portal/add-country']['POST'] = "portal/add_country_save";
$route['portal/edit-country']['POST'] = "portal/edit_country_save";
$route['portal/delete-country']['POST'] = "portal/delete_country";
$route['portal/states']['GET'] = "portal/states_list";
$route['portal/add-state']['POST'] = "portal/add_state_save";
$route['portal/edit-state']['POST'] = "portal/edit_state_save";
$route['portal/delete-state']['POST'] = "portal/delete_state";
$route['portal/get-country-select2-ajax']['GET'] = "portal/search_country_ajax";
$route['portal/cities']['GET'] = "portal/cities_list";
$route['portal/add-city']['POST'] = "portal/add_city_save";
$route['portal/edit-city']['POST'] = "portal/edit_city_save";
$route['portal/delete-city']['POST'] = "portal/delete_city";
$route['portal/agent-locations']['GET'] = "portal/locations_list";
$route['portal/add-location']['POST'] = "portal/add_location_save";
$route['portal/edit-location']['POST'] = "portal/edit_location_save";
$route['portal/delete-location']['POST'] = "portal/delete_location";
$route['portal/get-states-by-country']['POST'] = "portal/get_country_states";
$route['portal/office-desk']['GET'] = "portal/office_desk_list";
$route['portal/add-office-desk']['POST'] = "portal/add_office_desk_save";
$route['portal/edit-office-desk']['POST'] = "portal/edit_office_desk_save";
$route['portal/delete-office-desk']['POST'] = "portal/delete_office_desk";
$route['portal/download-office-desk-document/(:any)']['GET'] = "portal/download_office_desk_document/$1";
$route['portal/locations']['GET'] = "portal/locations";
$route['portal/brands-dashboard']['GET'] = "portal/brands_dashboard";
$route['portal/epolice-services']['GET'] = "portal/epolice_services";
$route['portal/security-screening']['GET'] = "portal/security_screening";
$route['portal/users-access']['GET'] = "portal/user_access";
$route['portal/prices']['GET'] = "portal/prices";
$route['portal/prices/(:any)']['GET'] = "portal/prices_details/$1";
$route['portal/update-price']['POST'] = "portal/update_price_save";
$route['portal/get-city-by-state']['POST'] = "portal/get_city_by_state";
$route['portal/get-agent-by-city']['POST'] = "portal/get_agent_by_city";

$route['portal/security-screening/name-based-check']['GET'] = "portal/name_based_check_applications";
$route['portal/security-screening/name-based-check/details/(:any)']['GET'] = "portal/name_based_check_application_details/$1";
$route['portal/security-screening/name-based-check/download/(:any)']['GET'] = "portal/name_based_check_application_download/$1";

$route['portal/security-screening/record-suspension']['GET'] = "portal/record_suspension_applications";
$route['portal/security-screening/record-suspension/details/(:any)']['GET'] = "portal/record_suspension_application_details/$1";
$route['portal/security-screening/record-suspension/download/(:any)']['GET'] = "portal/record_suspension_application_download/$1";

$route['portal/security-screening/us-entry-waiver']['GET'] = "portal/us_entry_waiver_applications";
$route['portal/security-screening/us-entry-waiver/details/(:any)']['GET'] = "portal/us_entry_waiver_application_details/$1";
$route['portal/security-screening/us-entry-waiver/download/(:any)']['GET'] = "portal/us_entry_waiver_application_download/$1";

$route['portal/security-screening/digital-fingerprinting']['GET'] = "portal/digital_fingerprinting_applications";
$route['portal/security-screening/digital-fingerprinting/details/(:any)']['GET'] = "portal/digital_fingerprinting_application_details/$1";
$route['portal/security-screening/digital-fingerprinting/download/(:any)']['GET'] = "portal/digital_fingerprinting_application_download/$1";

$route['portal/add-comment']['POST'] = "portal/add_application_comment_save";

$route['portal/users']['GET'] = "portal/users_list";
$route['portal/add-user']['POST'] = "portal/add_user_save";
$route['portal/edit-user']['POST'] = "portal/edit_user_save";
$route['portal/delete-user']['POST'] = "portal/delete_user";

$route['portal/agents']['GET'] = "portal/agents_list";
$route['portal/add-agent']['POST'] = "portal/add_agent_save";

$route['portal/edit-agent']['POST'] = "portal/edit_agent_save";
$route['portal/delete-agent']['POST'] = "portal/delete_agent";

$route['portal/corporates']['GET'] = "portal/corporates_list";
$route['portal/resellers']['GET'] = "portal/reseller_list";
$route['portal/add-corporate']['POST'] = "portal/add_corporate_save";
$route['portal/edit-corporate']['POST'] = "portal/edit_corporate_save";
$route['portal/delete-corporate']['POST'] = "portal/delete_corporate";

//$route['portal/invoices']['GET'] = "portal/get_invoices";
//$route['portal/account_lists']['GET'] = "portal/get_account_invoices";
$route['portal/add-invoice/(:any)/(:any)']['GET'] = "portal/add_new_invoice/$1/$2";

$route['portal/series_table']['GET'] = "portal/series_table";


//$route['portal/get-account-invoice']['GET'] = "portal/get_account_invoices";
//$route['portal/get-account-invoice/(:any)']['GET'] = "portal/get_invoice_list_by_account/$1";


/////////////////////////   Site  ////////////////////////////
/////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////


$route['/']['GET'] = "site/index";
$route['services']['GET'] = "site/services";
$route['criminal-record-check']['GET'] = "site/criminal_record_check";

$route['name-based-check']['GET'] = "site/name_based_check";
$route['name-based-check/(:any)']['GET'] = "site/name_based_check_form/$1";
$route['name-based-check']['POST'] = "site/name_based_check_form_save";
$route['name-based-check/payment/(:any)/(:any)']['GET'] = "site/name_based_check_payment/$1/$2";
$route['name-based-check/payment']['POST'] = "site/name_based_check_payment_save";
$route['name-based-check/consent/(:any)/(:any)']['GET'] = "site/name_based_check_consent/$1/$2";
$route['name-based-check/consent']['POST'] = "site/name_based_check_consent_save";
$route['name-based-check/success/(:any)/(:any)']['GET'] = "site/name_based_check_success/$1/$2";
$route['name-based-check/signature/(:any)/(:any)']['GET'] = "site/name_based_check_signature/$1/$2";

$route['digital-fingerprinting']['GET'] = "site/digital_fingerprinting";
$route['digital-fingerprinting/canada'] = "site/digital_fingerprinting_form/$1";
$route['digital-fingerprinting']['POST'] = "site/digital_fingerprinting_form_save";
$route['digital-fingerprinting/payment/(:any)/(:any)']['GET'] = "site/digital_fingerprinting_payment/$1/$2";
$route['digital-fingerprinting/payment']['POST'] = "site/digital_fingerprinting_payment_save";
$route['digital-fingerprinting/consent/(:any)/(:any)']['GET'] = "site/digital_fingerprinting_consent/$1/$2";
$route['digital-fingerprinting/consent']['POST'] = "site/digital_fingerprinting_consent_save";
$route['digital-fingerprinting/success/(:any)/(:any)']['GET'] = "site/digital_fingerprinting_success/$1/$2";

$route['record-suspension']['GET'] = "site/record_suspension";
$route['record-suspension/(:any)']['GET'] = "site/record_suspension_form/$1";
$route['record-suspension']['POST'] = "site/record_suspension_form_save";
$route['record-suspension/payment/(:any)/(:any)']['GET'] = "site/record_suspension_payment/$1/$2";
$route['record-suspension/payment']['POST'] = "site/record_suspension_payment_save";
$route['record-suspension/consent/(:any)/(:any)']['GET'] = "site/record_suspension_consent/$1/$2";
$route['record-suspension/consent']['POST'] = "site/record_suspension_consent_save";
$route['record-suspension/success/(:any)/(:any)']['GET'] = "site/record_suspension_success/$1/$2";
$route['get-city-by-state']['POST'] = "site/get_city_by_state";
$route['get-agent-locations']['POST'] = "site/get_agent_locations";

$route['us-entry-waiver']['GET'] = "site/us_entry_waiver";
$route['us-entry-waiver/(:any)']['GET'] = "site/us_entry_waiver_form/$1";
$route['us-entry-waiver']['POST'] = "site/us_entry_waiver_form_save";
$route['us-entry-waiver/payment/(:any)/(:any)']['GET'] = "site/us_entry_waiver_payment/$1/$2";
$route['us-entry-waiver/payment']['POST'] = "site/us_entry_waiver_payment_save";
$route['us-entry-waiver/consent/(:any)/(:any)']['GET'] = "site/us_entry_waiver_consent/$1/$2";
$route['us-entry-waiver/consent']['POST'] = "site/us_entry_waiver_consent_save";
$route['us-entry-waiver/success/(:any)/(:any)']['GET'] = "site/us_entry_waiver_success/$1/$2";



/////////////////////////   Agent  ////////////////////////////
/////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////


$route['agent/application']['GET'] = "agent/agent_app";
$route['agent/application/services']['GET'] = "agent/app_services";
$route['agent/application/criminal-record-check']['GET'] = "agent/app_criminal_record_check";

$route['agent/forgot-password']['GET'] = "agent/forgot_password";
$route['agent/forgot-password']['POST'] = "agent/forgot_password_send";
$route['agent/reset-password/(:any)']['GET'] = "agent/reset_password/$1";

$route['agent/application/name-based-check']['GET'] = "agent/app_name_based_check";
$route['agent/application/name-based-check/(:any)']['GET'] = "agent/user/name_based_check_applications/$1";
$route['agent/application/name-based-check']['POST'] = "agent/app_name_based_check_form_save";
$route['agent/application/name-based-check/payment/(:any)/(:any)']['GET'] = "agent/app_name_based_check_payment/$1/$2";
$route['agent/application/name-based-check/payment']['POST'] = "agent/app_name_based_check_payment_save";
//$route['agent/application/name-based-check/consent/(:any)/(:any)']['GET'] = "agent/app_name_based_check_consent/$1/$2";
$route['agent/application/name-based-check/consent']['GET'] = "agent/app_name_based_check_consent";
$route['agent/application/name-based-check/consent']['POST'] = "agent/app_name_based_check_consent_save";
$route['agent/application/name-based-check/signature/(:any)/(:any)']['GET'] = "agent/name_based_check_signature/$1/$2";
$route['agent/application/name-based-check/witness/(:any)/(:any)']['GET'] = "agent/app_name_based_check_witness/$1/$2";
$route['agent/application/name-based-check/success/(:any)/(:any)']['GET'] = "agent/app_name_based_check_success/$1/$2";

$route['agent/application/digital-fingerprinting']['GET'] = "agent/app_digital_fingerprinting";
$route['agent/application/digital-fingerprinting/canada'] = "agent/app_digital_fingerprinting_form/$1";
$route['agent/application/digital-fingerprinting']['POST'] = "agent/app_digital_fingerprinting_form_save";
$route['agent/application/digital-fingerprinting/payment/(:any)/(:any)']['GET'] = "agent/app_digital_fingerprinting_payment/$1/$2";
$route['agent/application/digital-fingerprinting/payment']['POST'] = "agent/app_digital_fingerprinting_payment_save";
$route['agent/application/digital-fingerprinting/consent/(:any)/(:any)']['GET'] = "agent/app_digital_fingerprinting_consent/$1/$2";
$route['agent/application/digital-fingerprinting/consent']['POST'] = "agent/app_digital_fingerprinting_consent_save";
$route['agent/application/digital-fingerprinting/success/(:any)/(:any)']['GET'] = "agent/app_digital_fingerprinting_success/$1/$2";

$route['agent/application/record-suspension']['GET'] = "agent/app_record_suspension";
$route['agent/application/record-suspension/(:any)']['GET'] = "agent/app_record_suspension_form/$1";
$route['agent/application/record-suspension']['POST'] = "agent/app_record_suspension_form_save";
$route['agent/application/record-suspension/payment/(:any)/(:any)']['GET'] = "agent/app_record_suspension_payment/$1/$2";
$route['agent/application/record-suspension/payment']['POST'] = "agent/app_record_suspension_payment_save";
$route['agent/application/record-suspension/consent/(:any)/(:any)']['GET'] = "agent/record-suspension/consent/$1/$2";
$route['agent/application/record-suspension/consent']['POST'] = "agent/app_record_suspension_consent_save";
$route['agent/application/record-suspension/success/(:any)/(:any)']['GET'] = "agent/app_record_suspension_success/$1/$2";
$route['agent/application/get-city-by-state']['POST'] = "agent/app_get_city_by_state";

$route['agent/application/us-entry-waiver']['GET'] = "agent/app_us_entry_waiver";
$route['agent/application/us-entry-waiver/(:any)']['GET'] = "agent/app_us_entry_waiver_form/$1";
$route['agent/application/us-entry-waiver']['POST'] = "agent/app_us_entry_waiver_form_save";
$route['agent/application/us-entry-waiver/payment/(:any)/(:any)']['GET'] = "agent/app_us_entry_waiver_payment/$1/$2";
$route['agent/application/us-entry-waiver/payment']['POST'] = "agent/app_us_entry_waiver_payment_save";
$route['agent/application/us-entry-waiver/consent/(:any)/(:any)']['GET'] = "agent/app_us_entry_waiver_consent/$1/$2";
$route['agent/application/us-entry-waiver/consent']['POST'] = "agent/app_us_entry_waiver_consent_save";
$route['agent/application/us-entry-waiver/success/(:any)/(:any)']['GET'] = "agent/app_us_entry_waiver_success/$1/$2";


$route['agent/security-screening/name-based-check']['GET'] = "agent/name_based_check_applications";
$route['agent/security-screening/name-based-check/details/(:any)']['GET'] = "agent/name_based_check_application_details/$1";

$route['agent/security-screening/record-suspension']['GET'] = "agent/record_suspension_applications";
$route['agent/security-screening/record-suspension/details/(:any)']['GET'] = "agent/record_suspension_application_details/$1";

$route['agent/security-screening/us-entry-waiver']['GET'] = "agent/us_entry_waiver_applications";
$route['agent/security-screening/us-entry-waiver/details/(:any)']['GET'] = "agent/us_entry_waiver_application_details/$1";

$route['agent/security-screening/digital-fingerprinting']['GET'] = "agent/digital_fingerprinting_applications";
$route['agent/security-screening/digital-fingerprinting/details/(:any)']['GET'] = "agent/digital_fingerprinting_application_details/$1";
$route['agent/get-agent-locations']['POST'] = "agent/get_agent_locations";



/////////////////////////   Corporate  ////////////////////////////
///////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////


$route['corporate/application']['GET'] = "corporate/corporate_app";
$route['corporate/corporates']['GET'] = "corporate/corporate_list";


$route['corporate/forgot-password']['GET'] = "corporate/forgot_password";
$route['corporate/forgot-password']['POST'] = "corporate/forgot_password_send";
$route['corporate/reset-password/(:any)']['GET'] = "corporate/reset_password/$1";



$route['corporate/add-corporate-employee/(:any)']['GET'] = "corporate/add_corporate_sub_employee";

$route['corporate/application/services']['GET'] = "corporate/app_services";
$route['corporate/application/criminal-record-check']['GET'] = "corporate/app_criminal_record_check";

$route['corporate/application/name-based-check']['GET'] = "corporate/app_name_based_check";
$route['corporate/application/name-based-check/(:any)']['GET'] = "corporate/app_name_based_check_form/$1";
$route['corporate/application/name-based-check']['POST'] = "corporate/app_name_based_check_form_save";
$route['corporate/application/name-based-check/payment/(:any)/(:any)']['GET'] = "corporate/app_name_based_check_payment/$1/$2";
$route['corporate/application/name-based-check/payment']['POST'] = "corporate/app_name_based_check_payment_save";
$route['corporate/application/name-based-check/consent/(:any)/(:any)']['GET'] = "corporate/app_name_based_check_consent/$1/$2";
$route['corporate/application/name-based-check/consent']['POST'] = "corporate/app_name_based_check_consent_save";
$route['corporate/application/name-based-check/success/(:any)/(:any)']['GET'] = "corporate/app_name_based_check_success/$1/$2";

$route['corporate/application/digital-fingerprinting']['GET'] = "corporate/app_digital_fingerprinting";
$route['corporate/application/digital-fingerprinting/canada'] = "corporate/app_digital_fingerprinting_form/$1";
$route['corporate/application/digital-fingerprinting']['POST'] = "corporate/app_digital_fingerprinting_form_save";
$route['corporate/application/digital-fingerprinting/payment/(:any)/(:any)']['GET'] = "corporate/app_digital_fingerprinting_payment/$1/$2";
$route['corporate/application/digital-fingerprinting/payment']['POST'] = "corporate/app_digital_fingerprinting_payment_save";
$route['corporate/application/digital-fingerprinting/consent/(:any)/(:any)']['GET'] = "corporate/app_digital_fingerprinting_consent/$1/$2";
$route['corporate/application/digital-fingerprinting/consent']['POST'] = "corporate/app_digital_fingerprinting_consent_save";
$route['corporate/application/digital-fingerprinting/success/(:any)/(:any)']['GET'] = "corporate/app_digital_fingerprinting_success/$1/$2";

$route['corporate/application/record-suspension']['GET'] = "corporate/app_record_suspension";
$route['corporate/application/record-suspension/(:any)']['GET'] = "corporate/app_record_suspension_form/$1";
$route['corporate/application/record-suspension']['POST'] = "corporate/app_record_suspension_form_save";
$route['corporate/application/record-suspension/payment/(:any)/(:any)']['GET'] = "corporate/app_record_suspension_payment/$1/$2";
$route['corporate/application/record-suspension/payment']['POST'] = "corporate/app_record_suspension_payment_save";
$route['corporate/application/record-suspension/consent/(:any)/(:any)']['GET'] = "corporate/app_record_suspension_consent/$1/$2";
$route['corporate/application/record-suspension/consent']['POST'] = "corporate/app_record_suspension_consent_save";
$route['corporate/application/record-suspension/success/(:any)/(:any)']['GET'] = "corporate/app_record_suspension_success/$1/$2";
$route['corporate/application/get-city-by-state']['POST'] = "corporate/app_get_city_by_state";

$route['corporate/application/us-entry-waiver']['GET'] = "corporate/app_us_entry_waiver";
$route['corporate/application/us-entry-waiver/(:any)']['GET'] = "corporate/app_us_entry_waiver_form/$1";
$route['corporate/application/us-entry-waiver']['POST'] = "corporate/app_us_entry_waiver_form_save";
$route['corporate/application/us-entry-waiver/payment/(:any)/(:any)']['GET'] = "corporate/app_us_entry_waiver_payment/$1/$2";
$route['corporate/application/us-entry-waiver/payment']['POST'] = "corporate/app_us_entry_waiver_payment_save";
$route['corporate/application/us-entry-waiver/consent/(:any)/(:any)']['GET'] = "corporate/app_us_entry_waiver_consent/$1/$2";
$route['corporate/application/us-entry-waiver/consent']['POST'] = "corporate/app_us_entry_waiver_consent_save";
$route['corporate/application/us-entry-waiver/success/(:any)/(:any)']['GET'] = "corporate/app_us_entry_waiver_success/$1/$2";


$route['corporate/security-screening/name-based-check']['GET'] = "corporate/name_based_check_applications";
$route['corporate/security-screening/name-based-check/details/(:any)']['GET'] = "corporate/name_based_check_application_details/$1";

$route['corporate/security-screening/record-suspension']['GET'] = "corporate/record_suspension_applications";
$route['corporate/security-screening/record-suspension/details/(:any)']['GET'] = "corporate/record_suspension_application_details/$1";

$route['corporate/security-screening/us-entry-waiver']['GET'] = "corporate/us_entry_waiver_applications";
$route['corporate/security-screening/us-entry-waiver/details/(:any)']['GET'] = "corporate/us_entry_waiver_application_details/$1";

$route['corporate/security-screening/digital-fingerprinting']['GET'] = "corporate/digital_fingerprinting_applications";
$route['corporate/security-screening/digital-fingerprinting/details/(:any)']['GET'] = "corporate/digital_fingerprinting_application_details/$1";

$route['corporate/get-agent-locations']['POST'] = "corporate/get_agent_locations";



/////////////////////////   Users  ////////////////////////////
/////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////


$route['user/forgot-password']['GET'] = "user/forgot_password";
$route['user/forgot-password']['POST'] = "user/forgot_password_send";
$route['user/reset-password/(:any)']['GET'] = "user/reset_password/$1";


$route['user/application/services']['GET'] = "user/app_services";
$route['user/application/services-sub-user']['GET'] = "user/app_services_sub_user";


$route['user/application/criminal-record-check']['GET'] = "user/app_criminal_record_check";
$route['user/application/criminal-record-check-sub-user']['GET'] = "user/app_criminal_record_check_sub_user";



$route['user/application/name-based-check']['GET'] = "user/app_name_based_check";
$route['user/application/name-based-check-sub-user']['GET'] = "user/app_name_based_check_sub_user";

$route['user/application/name-based-check/(:any)']['GET'] = "user/app_name_based_check_form/$1";
$route['user/application/name-based-check-sub-user/(:any)']['GET'] = "user/app_name_based_check_form_sub_user/$1";



$route['user/application/name-based-check']['POST'] = "user/app_name_based_check_form_save";
$route['user/application/name-based-check-sub-user']['POST'] = "user/app_name_based_check_form_save_sub_user";


//both needs to delete
$route['user/application/name-based-check/payment/(:any)/(:any)']['GET'] = "user/app_name_based_check_payment/$1/$2";
$route['user/application/name-based-check/payment']['POST'] = "user/app_name_based_check_payment_save";



//consent after application
$route['user/application/name-based-check/consent/(:any)/(:any)']['GET'] = "user/app_name_based_check_consent/$1/$2";
$route['user/application/name-based-check-sub-user/consent/(:any)/(:any)']['GET'] = "user/app_name_based_check_consent_sub_user/$1/$2";

$route['user/application/name-based-check/consent']['POST'] = "user/app_name_based_check_consent_save";
$route['user/application/name-based-check-sub-user/consent']['POST'] = "user/app_name_based_check_consent_save_sub_user";

$route['user/application/name-based-check/success/(:any)/(:any)']['GET'] = "user/app_name_based_check_success/$1/$2";
$route['user/application/name-based-check-sub-user/success/(:any)/(:any)']['GET'] = "user/app_name_based_check_success_sub_user/$1/$2";

//user digital fingerprint
//user digital fingerprint
//user digital fingerprint
//user digital fingerprint
$route['user/application/digital-fingerprinting']['GET'] = "user/app_digital_fingerprinting";
$route['user/application/digital-fingerprinting/canada'] = "user/app_digital_fingerprinting_form/$1";
$route['user/application/digital-fingerprinting']['POST'] = "user/app_digital_fingerprinting_form_save";
$route['user/application/digital-fingerprinting/payment/(:any)/(:any)']['GET'] = "user/app_digital_fingerprinting_payment/$1/$2";
$route['user/application/digital-fingerprinting/payment']['POST'] = "user/app_digital_fingerprinting_payment_save";
$route['user/application/digital-fingerprinting/consent/(:any)/(:any)']['GET'] = "user/app_digital_fingerprinting_consent/$1/$2";
$route['user/application/digital-fingerprinting/consent']['POST'] = "user/app_digital_fingerprinting_consent_save";
$route['user/application/digital-fingerprinting/success/(:any)/(:any)']['GET'] = "user/app_digital_fingerprinting_success/$1/$2";

$route['user/application/record-suspension']['GET'] = "user/app_record_suspension";
$route['user/application/record-suspension/(:any)']['GET'] = "user/app_record_suspension_form/$1";
$route['user/application/record-suspension']['POST'] = "user/app_record_suspension_form_save";
$route['user/application/record-suspension/payment/(:any)/(:any)']['GET'] = "user/app_record_suspension_payment/$1/$2";
$route['user/application/record-suspension/payment']['POST'] = "user/app_record_suspension_payment_save";
$route['user/application/record-suspension/consent/(:any)/(:any)']['GET'] = "user/record-suspension/consent/$1/$2";
$route['user/application/record-suspension/consent']['POST'] = "user/app_record_suspension_consent_save";
$route['user/application/record-suspension/success/(:any)/(:any)']['GET'] = "user/app_record_suspension_success/$1/$2";
$route['user/application/get-city-by-state']['POST'] = "user/get_agent_locations";

$route['user/application/us-entry-waiver']['GET'] = "user/app_us_entry_waiver";
$route['user/application/us-entry-waiver/(:any)']['GET'] = "user/app_us_entry_waiver_form/$1";
$route['user/application/us-entry-waiver']['POST'] = "user/app_us_entry_waiver_form_save";
$route['user/application/us-entry-waiver/payment/(:any)/(:any)']['GET'] = "user/app_us_entry_waiver_payment/$1/$2";
$route['user/application/us-entry-waiver/payment']['POST'] = "user/app_us_entry_waiver_payment_save";
$route['user/application/us-entry-waiver/consent/(:any)/(:any)']['GET'] = "user/app_us_entry_waiver_consent/$1/$2";
$route['user/application/us-entry-waiver/consent']['POST'] = "user/app_us_entry_waiver_consent_save";
$route['user/application/us-entry-waiver/success/(:any)/(:any)']['GET'] = "user/app_us_entry_waiver_success/$1/$2";


$route['user/security-screening/name-based-check']['GET'] = "user/name_based_check_applications";
$route['user/security-screening/name-based-check/details/(:any)']['GET'] = "user/name_based_check_application_details/$1";

$route['user/security-screening/record-suspension']['GET'] = "user/record_suspension_applications";
$route['user/security-screening/record-suspension/details/(:any)']['GET'] = "user/record_suspension_application_details/$1";

$route['user/security-screening/us-entry-waiver']['GET'] = "user/us_entry_waiver_applications";
$route['user/security-screening/us-entry-waiver/details/(:any)']['GET'] = "user/us_entry_waiver_application_details/$1";

$route['user/security-screening/digital-fingerprinting']['GET'] = "user/digital_fingerprinting_applications";
$route['user/security-screening/digital-fingerprinting/details/(:any)']['GET'] = "user/digital_fingerprinting_application_details/$1";
$route['user/get-user-locations']['POST'] = "user/get_agent_locations";
//$route['user/search-user-by-id'] = "user/searchUserById";





/////////////////////////   Reception  ////////////////////////////
/////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////

//$route['reception'] = "reception";
$route['reception/signin']['POST'] = "reception/signin";
$route['reception/dashboard'] = "reception/dashboard";



$route['reception/forgot-password']['GET'] = "reception/forgot_password";
$route['reception/forgot-password']['POST'] = "reception/forgot_password_send";
$route['reception/reset-password/(:any)']['GET'] = "reception/reset_password/$1";
$route['reception/reset-password']['POST'] = "reception/reset_password_save";

//namebased check application
//$route['reception/security-screening/name-based-check']['GET'] = "reception/name_based_check_applications";
//$route['reception/security-screening/name-based-check/details/(:any)']['GET'] = "reception/name_based_check_application_details/$1";




//$route['reception/digital_fingerprint_new']['GET'] = "reception/digital_fingerprint_new";
$route['reception/application/digital-fingerprinting']['GET'] = "reception/digital_fingerprint";
$route['reception/digital_fingerprinting_applications']['GET'] = "reception/digital_fingerprinting_applications";


//$route['corporate/application/digital-fingerprinting']['GET'] = "corporate/app_digital_fingerprinting";
//$route['corporate/application/digital-fingerprinting/canada'] = "corporate/app_digital_fingerprinting_form/$1";
//$route['corporate/application/digital-fingerprinting']['POST'] = "corporate/app_digital_fingerprinting_form_save";
//$route['corporate/application/digital-fingerprinting/payment/(:any)/(:any)']['GET'] = "corporate/app_digital_fingerprinting_payment/$1/$2";
//$route['corporate/application/digital-fingerprinting/payment']['POST'] = "corporate/app_digital_fingerprinting_payment_save";
//$route['corporate/application/digital-fingerprinting/consent/(:any)/(:any)']['GET'] = "corporate/app_digital_fingerprinting_consent/$1/$2";
//$route['corporate/application/digital-fingerprinting/consent']['POST'] = "corporate/app_digital_fingerprinting_consent_save";
//$route['corporate/application/digital-fingerprinting/success/(:any)/(:any)']['GET'] = "corporate/app_digital_fingerprinting_success/$1/$2";







/////////////////////////   Accounts Panel  ////////////////////////////
/////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////

$route['account'] = "account";
$route['account/signin']['POST'] = "account/signin";
$route['account/account']['GET'] = "account/account";
$route['account/account']['POST'] = "account/account_save";
$route['account/dashboard'] = "account/dashboard";
$route['account/invoice_preview_web'] = "account/invoice_preview_web";
$route['account/custom_invoices'] = "account/custom_invoices";


//$route['portal/dashboard-flag'] = "portal/brands_dashboard";
//
//$route['portal/forgot-password']['GET'] = "portal/forgot_password";
//$route['portal/forgot-password']['POST'] = "portal/forgot_password_send";
//$route['portal/reset-password/(:any)']['GET'] = "portal/reset_password/$1";
//
//
//$route['portal/reset-password']['POST'] = "portal/reset_password_save";
//$route['portal/countries']['GET'] = "portal/countries_list";
//$route['portal/add-country']['POST'] = "portal/add_country_save";
//$route['portal/edit-country']['POST'] = "portal/edit_country_save";
//$route['portal/delete-country']['POST'] = "portal/delete_country";
//$route['portal/states']['GET'] = "portal/states_list";
//$route['portal/add-state']['POST'] = "portal/add_state_save";
//$route['portal/edit-state']['POST'] = "portal/edit_state_save";
//$route['portal/delete-state']['POST'] = "portal/delete_state";