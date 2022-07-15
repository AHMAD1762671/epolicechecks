<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reseller extends CI_Controller
{

//    public function __construct()
//    {
//        parent::__construct();
//        date_default_timezone_set("Asia/Karachi");
//        $public = array(
//            'portal/index',
//            'portal/signin',
//            'portal/forgot_password',
//            'portal/forgot_password_send',
//            'portal/reset_password',
//            'portal/reset_password_save',
//        );
//        $private = array(
//            'portal/dashboard',
//            'portal/logout',
//            'portal/account',
//            'portal/account_save',
//            'portal/save_edit_application_status',
//            'portal/save_upload_certificate',
////            'portal/get_users_by_roles',
//            'portal/get_notification',
//            'portal/notificationDetails',
//            'portal/brands_dashboard_before',
//            'portal/add_application_certificate_save',
//            'portal/fetch_users',
//            'portal/get_user_by_role',
//            'portal/forward_application_to_user',
//            'portal/add_application_status_save',
//            'portal/forward_us_entry_waiver_application_to_user',
//            'portal/add_us_entry_waiver_applications_save',
//            'portal/delete_certificate',
//            'portal/delete_certificate_namebase',
//            'portal/delete_certificate_record_suspensio',
//            'portal/delete_certificate_digital',
//            'portal/change_agent_status',
//            'portal/add_application_conversation_save',
//            'portal/message',
//            'portal/add_application_conversation_save_by_admin',
//            'portal/get_comment_data_save',
//            'portal/add_application_status_save_record_suspension_application',
//            'portal/add_application_status_save_u_s_entry_waiver_application',
//            'portal/add_application_status_save_digital_fingerprinting_application',
//            'portal/multiple_file_upload',
//            'portal/delete_comment',
//            'portal/delete_file',
//            'portal/change_corporate_status',
//            'portal/view_service_order_images',
//            'portal/forward_service_order_images_to_reception',
//            'portal/coupons',
//            'portal/add_corporate_coupon_save',
//            'portal/add_agent_coupon_save',
//            'portal/add_outsider_user_coupon_save',
//            'portal/add_new_invoice',
//            'portal/invoice',
//            'portal/get_account_invoices',
//            'portal/get_invoice_list_by_account',
//            'portal/get_invoice_detail',
//            'portal/save_custom_invoice',
//            'portal/invoice_description',
////            individual account list
//            'portal/get_users',
//            'portal/get_users_application_list_accounts',
//            'portal/get_application_by_id',
////            corporate account list
//            'portal/get_corporate_users',
//            'portal/get_corporate_users_application_list_accounts',
//            'portal/get_sub_corporate_users_application_list',
////            agent account list
//            'portal/get_agent_users',
//            'portal/get_agent_users_list_accounts',
//            'portal/get_sub_agents_users_application_list',
////            payment
////            payment
//            'portal/payment',
//            'portal/success',
//            'portal/error',
////            download excel file
//            'portal/action_corporate',
//            'portal/action_agent',
//            'portal/action_outside_user',
//            'portal/monthly_report',
//            'portal/get_corporate_users_individual_list',
//            'portal/pdfDownload',
//
////            payment status update
//            'portal/update_payment_status',
//            'portal/send_invoice_to_sub_corporate',
////            reports section
//            'portal/emails_report',
//            'portal/reports_type',
//            'portal/fetch_state',
//            'portal/fetch_city',
//
//            'portal/test_join',
//            'portal/index2',
//
////            series list
//            'portal/series_list',
////            'portal/dashboard_pree',
//        );
//        $this->load->model('reseller_model');
//        $current_url = $this->router->fetch_class() . '/' . $this->router->fetch_method();
//        if ($this->session->userdata('user_logged_in')) {
//            $user_access = $this->portal_model->get_current_user_roles_permissions();
//            if ((in_array($current_url, $public))) {
//                redirect('portal/dashboard');
//            } else if (in_array($current_url, $private)) {
//
//            } else if ((!in_array($this->router->fetch_method(), array_column($user_access, 'user_permission_route')))) {
//                redirect('portal');
//            }
//        } elseif (!$this->session->userdata('user_logged_in') && !in_array($current_url, $public)) {
//            redirect('portal');
//        }
//    }

    public function index()
    {
        $data["page_title"] = "ePolice Reseller";
        $data['main_view'] = "reseller/generate_link";
        $this->load->view('reseller/layout', $data);
    }

    public function invite_employee(){
        $data['page_title'] = "Send Invitation";
        $data['main_view'] = "reseller/invite_employees";
        $this->load->view('reseller/layout', $data);
    }



    public function book_appointment(){
        $data['page_title'] = "Book An Appointment";
        $data['main_view'] = "reseller/book_appointment";
        $this->load->view('reseller/layout', $data);
    }


    public function dashboard(){
        $data['page_title'] = "Dashboard";
        $data['main_view'] = "reseller/dashboard";
        $this->load->view('reseller/layout', $data);
    }

    public function paid_history(){
        $data['page_title'] = "Payment History";
        $data['main_view'] = "reseller/paid_history";
//        $data["states"] = $this->account_model->get_states('Canada');
//        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();

//        $user_role_id = '5f513b61-67f9-44b5-9c9d-5bb46e20';
//        $data['agent_users'] = $this->account_model->agent_list($user_role_id);
//        var_dump($data['agent_users']);
//        $data['agent_users'] = $this->db->where('user_role_id', '5f513b61-67f9-44b5-9c9d-5bb46e20')->get('users')->result();
        $this->load->view('reseller/layout', $data);
    }


    public function message_templete(){
        $data['page_title'] = "Enter a General Message for all";
        $data['main_view'] = "reseller/message_templete";
        $this->load->view('reseller/layout', $data);
    }

}

