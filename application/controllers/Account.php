<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        $public = array(
            'account/index',
            'account/signin',
            'account/forgot_password',
            'account/forgot_password_send',
            'account/reset_password',
            'account/reset_password_save',
        );
        $private = array(
            'account/dashboard',
            'account/dashboard_pre',
            'account/dashboard_pree',
            'account/dashboard_preee',
            'account/logout',
            'account/automatic_corporate_invoices',
            'account/preview_corporate_invoices',
            'account/corporate_list',
            'account/agent_list',
            'account/user_list',
            'account/agent_applications_list',
            'account/invoice_list_all',
            'account/invoice_preview_web',
            'account/custom_invoices',
            'account/save_custom_invoice',
            'account/download_invoice',
            'account/reports',
            'account/search_report',
            'account/search_attribute',
            'account/search_user_by_id',
            'account/report_dashboard',
            'account/report_brand_dashboard',

            'account/attribute_search',
            'account/report_search',
            'account/user_id_search',

            'account/receiveable',
            'account/total_sales',

            'account/demo',
//            'portal/account',
//            'portal/account_save',
//            'portal/save_edit_application_status',
//            'portal/save_upload_certificate',
//            'portal/get_notification',
//            'portal/notificationDetails',
//            'portal/brands_dashboard_before',
        );
        $this->load->model('account_model');
        $current_url = $this->router->fetch_class() . '/' . $this->router->fetch_method();
        if ($this->session->userdata('account_logged_in')) {
            $user_access = $this->account_model->get_current_user_roles_permissions();
            if ((in_array($current_url, $public))) {
                redirect('account/dashboard');
            } else if (in_array($current_url, $private)) {

            } else if ((!in_array($this->router->fetch_method(), array_column($user_access, 'user_permission_route')))) {
                redirect('account');
            }
        } elseif (!$this->session->userdata('account_logged_in') && !in_array($current_url, $public)) {
            redirect('account');
        }
    }

    public function index()
    {
        $data["page_title"] = "ePolice Account";
        $data['main_view'] = "account/login_view";
        $this->load->view('account/login', $data);
    }

    public function signin()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if (!$this->form_validation->run()) {
            $data["page_title"] = "ePolice Account Potal";
            $this->load->view('account', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->load->model('account_model');
            if ($user = $this->account_model->login_user($email, $password)) {
                $account_userdata = array(
                    'account_user_id' => $user->id,
                    'account_name' => $user->first_name . ' ' . $user->last_name,
                    'account_profile_image' => $user->profile_image,
                    'account_logged_in' => true
                );
                $this->session->set_userdata($account_userdata);
                redirect('account/dashboard_pre');
            } else {
                $this->session->set_flashdata('no_user_access', 'Invalid Email / Password.');
                redirect('account');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata($this->session->userdata('account_user_id'));
        $this->session->unset_userdata($this->session->userdata('account_name'));
        $this->session->unset_userdata($this->session->userdata('account_profile_image'));
        $account_userdata = array(
            'account_logged_in' => false,
            'account_user_id' => '',
            'account_name' => '',
            'account_profile_image' => false
        );
        $this->session->set_userdata($account_userdata);
        redirect('account');
    }

    public function forgot_password()
    {
        $data["page_title"] = "ePolic Portal";
        $data['main_view'] = "portal/forgot_password_view";
        $this->load->view('portal/forgot_password_view', $data);
    }

    public function forgot_password_send()
    {
        $email = $this->input->post('email');
        $this->load->model('portal_model');
        if ($secret = $this->portal_model->user_forgot_password($email)) {
            $htmlContent = '<h1>ePolice Reset Password Request</h1>';
            $htmlContent .= '<p>Click on the link below to reset your password.</p>';
            $htmlContent .= '<p><a href="' . base_url('user') . '/reset-password/' . $secret . '">Reset Password</a></p>';

            $this->email->to($this->input->post('email'));
            $this->email->from(EMAIL_FROM_SMTP, 'ePolice');
            $this->email->subject('ePolice Reset Password Request');
            $this->email->message($htmlContent);
            $this->email->send();
            $this->session->set_flashdata('signup_success', 'Reset password link has been sent. Check your inbox.');
            redirect('portal/forgot-password');
        } else {
            $this->session->set_flashdata('no_user_access', 'Invalid Email! Please try again.');
            redirect('portal/forgot-password');
        }
    }

    public function reset_password($code)
    {
        $data['is_code_valid'] = $this->portal_model->user_check_secret_code($code);
        $data['secret_code'] = $code;
        $data["page_title"] = "SGIC - Admin Portal";
        $data['main_view'] = "portal/reset_password_view";
        $this->load->view('portal/reset_password_view', $data);
    }

    public function reset_password_save()
    {
        $code = $this->input->post('secret_code');
        $data['is_code_valid'] = $this->portal_model->user_check_secret_code($code);
        $data['secret_code'] = $code;
        if (!$data['is_code_valid']) {
            redirect('portal/reset-password/' . $code);
        }
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]');
        if (!$this->form_validation->run()) {
            $data['secret_code'] = $code;
            $data["page_title"] = "SGIC - Employee Portal";
            $data['main_view'] = "portal/reset_password_view";
            $this->load->view('portal/reset_password_view', $data);
        } else {
            if ($this->portal_model->user_reset_password($code)) {
                $this->session->set_flashdata('signup_success', 'Password changed successfully!');
                redirect('portal');
            } else {
                $this->session->set_flashdata('no_user_access', 'Something went wrong! Please try again.');
                redirect('portal/reset-password/' . $code);
            }
        }
    }

    public function account()
    {
        $data['page_title'] = "Account Settings";
        $data['main_view'] = "account/account";
        $data['account'] = $this->db->where('id', $this->session->userdata('account_user_id'))->get('users')->row();
        $this->load->view('account/layout', $data);
    }

    public function account_save()
    {
        $data['page_title'] = "Account Settings";
        $data['main_view'] = "portal/account";
        $is_password = FALSE;
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Surname', 'trim|required');
        if ($this->input->post('new_password')) {
            $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required|callback_current_password_check');
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');
            $is_password = TRUE;
        }
        if (!$this->form_validation->run()) {
            $data['account'] = $this->db->where('id', $this->session->userdata('user_id'))->get('users')->row();
            $this->load->view('portal/layout', $data);
        } else {
            if ($this->portal_model->user_account_update($is_password)) {
                $this->session->set_flashdata('success_message', 'Account updated successfully!');
                redirect('portal/account');
            } else {
                $data['account'] = $this->db->where('id', $this->session->userdata('user_id'))->get('users')->row();
                $this->session->set_flashdata('errorr_message', 'Something went wrong. Please try again!');
                $this->load->view('portal/layout', $data);
            }
        }
    }

    public function current_password_check($current_password)
    {
        if (!$this->portal_model->match_current_password($current_password)) {
            $this->form_validation->set_message('current_password_check', 'Current password doesn\'t not match');
            return FALSE;
        }
        return TRUE;
    }

    public function dashboard()
    {
        $data['page_title'] = "Dashboard Users";
        $data['main_view'] = "account/dashboard";
        $this->load->view('account/layout', $data);
    }


    public function dashboard_pre()
    {
        $data['page_title'] = "Dashboard";
        $data['main_view'] = "account/dashboard_pre";
        $this->load->view('account/layout', $data);
    }


    public function dashboard_pree()
    {
        $data['page_title'] = "Brand Dashboard";
        $data['main_view'] = "account/dashboard_pree";
        $this->load->view('account/layout', $data);
    }


    public function dashboard_preee()
    {
        $data['page_title'] = "Brand Dashboard";
        $data['main_view'] = "account/dashboard_preee";
        $this->load->view('account/layout', $data);
    }


    public function corporate_list(){
        $data['page_title'] = "Corporate List";
        $data['main_view'] = "account/corporate_list";
        $data["states"] = $this->account_model->get_states('Canada');
        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();
        $data['corporate_users'] = $this->db->where('user_role_id', '2dd65df9-7ed5-45bd-bef1-f2afa31a')->get('users')->result();
        $this->load->view('account/layout', $data);
    }


    public function agent_list(){
        $data['page_title'] = "Agent List";
        $data['main_view'] = "account/agent_list";
//        $data["states"] = $this->account_model->get_states('Canada');
//        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();

        $user_role_id = '5f513b61-67f9-44b5-9c9d-5bb46e20';
        $data['agent_users'] = $this->account_model->agent_list($user_role_id);
//        var_dump($data['agent_users']);
//        $data['agent_users'] = $this->db->where('user_role_id', '5f513b61-67f9-44b5-9c9d-5bb46e20')->get('users')->result();
        $this->load->view('account/layout', $data);
    }



    public function user_list(){
        $data['page_title'] = "User List";
        $data['main_view'] = "account/user_list";
        $data["states"] = $this->account_model->get_states('Canada');
        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();
        $data['user_users'] = $this->db->where('user_role_id', '3ee65tf9-7ed5-45ft-hdk1-f2afa31b')->get('users')->result();
        $this->load->view('account/layout', $data);
    }


    public function agent_applications_list(){
        $data['page_title'] = "User List";
        $data['main_view'] = "account/applications_list";
        $data["states"] = $this->account_model->get_states('Canada');
        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();
//        $data['user_users'] = $this->db->get('users')->result();
        $data['digital_fingerprint_application'] = $this->db->where('agent_id', '3ee65tf9-7ed5-45ft-hdk1-f2afa31b')->get('digital_fingerprinting_applications')->result();
        $this->load->view('account/layout', $data);
    }

    public function invoice_list_all(){
        $data['page_title'] = "Invoice List";
        $data['main_view'] = "account/invoice_list_all";
        $data["states"] = $this->account_model->get_states('Canada');

        $data['invoices_custom'] = $this->db->get('invoices_custom')->result();
        $this->load->view('account/layout', $data);
    }



    // corporate invoice automatic
    public function automatic_corporate_invoices(){
        $data['page_title'] = "Automatic Corporate Invoice";
        $data['main_view'] = "account/corporate_invoices";
        $this->load->view('account/layout', $data);
    }


    public function preview_corporate_invoices(){
        $data['page_title'] = "Preview Corporate Invoice";
        $data['main_view'] = "account/corporate_invoice_preview";
        $this->load->view('account/layout', $data);
    }




    public function invoice_preview_web(){
        $data['page_title'] = "Invoice Preview";
        $data['main_view'] = "account/invoice_preview";
        $this->load->view('account/layout', $data);
    }


    public function custom_invoices(){
        $data['page_title'] = "Cutom Invoice";
        $data['main_view'] = "account/custom_invoice";
        $this->load->view('account/layout', $data);
    }


    public function save_custom_invoice(){
//        $this->account_model->save_custom_invoice();
        if($this->account_model->save_custom_invoice()){
            redirect('account/invoice_list_all');
        }
    }



    public function download_invoice() {
        $this->load->library('pdfgenerator');
        $data['page_title'] = "Download Invoice";

        $invoice_id = $this->uri->segment('3');

        $data['invoice_data'] = $this->db->where('invoice_id', $invoice_id)->get('invoices_custom')->row();

//        var_dump($data['invoice_data']);
//        echo $data['invoice_data']->invoice_id;
//        die();



        $html = $this->load->view('account/download_invoice', $data, true);
        $filename = 'Download Invoice';
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }






    public function search_report(){
        $data['page_title'] = "Search Report";
        $data['main_view'] = "account/reports/search_report";
//        $data["states"] = $this->account_model->get_states('Canada');

//        $data['invoices_custom'] = $this->db->get('invoices_custom')->result();
        $this->load->view('account/layout', $data);
    }

    public function search_attribute(){
        $data['page_title'] = "Search Report";
        $data['main_view'] = "account/reports/search_attribute";
//        $data["states"] = $this->account_model->get_states('Canada');

//        $data['invoices_custom'] = $this->db->get('invoices_custom')->result();
        $this->load->view('account/layout', $data);
    }



    public function search_user_by_id(){
        $data['page_title'] = "Search Report";
        $data['main_view'] = "account/reports/search_user_by_id";
//        $data["states"] = $this->account_model->get_states('Canada');

//        $data['invoices_custom'] = $this->db->get('invoices_custom')->result();
        $this->load->view('account/layout', $data);
    }


    public function report_dashboard()
    {
        $data['page_title'] = "Report Dashboard";
        $data['main_view'] = "account/reports/report_dashboard";
        $this->load->view('account/layout', $data);
    }




    public function report_brand_dashboard()
    {
        $data['page_title'] = "Report Brand Dashboard";
        $data['main_view'] = "account/reports/report_brand_dashboard";
        $this->load->view('account/layout', $data);
    }


    public function reports(){
        $data['page_title'] = "Search Report";
        $data['main_view'] = "account/reports/report";
//        $data["states"] = $this->account_model->get_states('Canada');

//        $data['invoices_custom'] = $this->db->get('invoices_custom')->result();
        $this->load->view('account/layout', $data);
    }



    public function attribute_search(){
        $data['page_title'] = "Search attribute Report";
        $data['main_view'] = "account/reports/attribute_search";
//        $data["states"] = $this->account_model->get_states('Canada');

//        $data['invoices_custom'] = $this->db->get('invoices_custom')->result();
        $this->load->view('account/layout', $data);
    }

    public function report_search(){
        $data['page_title'] = "Search Report";
        $data['main_view'] = "account/reports/report_search";
//        $data["states"] = $this->account_model->get_states('Canada');

//        $data['invoices_custom'] = $this->db->get('invoices_custom')->result();
        $this->load->view('account/layout', $data);
    }

    public function user_id_search(){
        $data['page_title'] = "Search User ID Report";
        $data['main_view'] = "account/reports/user_id_search";
//        $data["states"] = $this->account_model->get_states('Canada');

//        $data['invoices_custom'] = $this->db->get('invoices_custom')->result();
        $this->load->view('account/layout', $data);
    }



    public function download_report_excel(){
        $data['page_title'] = "Download Report in Excel";
        $data['main_view'] = "account/reports/user_id_search";
        $this->load->view('account/layout', $data);
    }



    public function receiveable(){
        $data['page_title'] = "Receiveable List";
        $data['main_view'] = "account/reports/receiveable";
//        $data["states"] = $this->account_model->get_states('Canada');
//        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();

        $user_role_id = '5f513b61-67f9-44b5-9c9d-5bb46e20';
        $data['agent_users'] = $this->account_model->agent_list($user_role_id);
//        var_dump($data['agent_users']);
//        $data['agent_users'] = $this->db->where('user_role_id', '5f513b61-67f9-44b5-9c9d-5bb46e20')->get('users')->result();
        $this->load->view('account/layout', $data);
    }


//    public function total_sales(){
//        $data['page_title'] = "Sales List";
//        $data['main_view'] = "account/reports/sales";
//
////        $user_role_id = '5f513b61-67f9-44b5-9c9d-5bb46e20';
//        $data['agent_users'] = $this->account_model->agent_list();
//        $this->load->view('account/layout', $data);
//    }

    public function total_sales() {
//        $data['user_roles'] = $this->db->query("SELECT * FROM user_roles")->result();

        $data['page_title'] = "Sales List";
        $result = $this->account_model->get_name_based_applications();

        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'portal/security-screening/name-based-check']);

        $data['client_id'] = $this->input->get('id');
        $data['f_name'] = $this->input->get('f_name');
        $data['l_name'] = $this->input->get('l_name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');
        $data['status'] = $this->input->get('application_status');

        $data['main_view'] = "account/reports/sales";
        $this->load->view('account/layout', $data);
    }



    public function generate_corporate_invoice() {
        $data['page_title'] = "Generate Corporate Invoice";
        $result = $this->account_model->get_name_based_applications();

        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'portal/security-screening/name-based-check']);

        $data['client_id'] = $this->input->get('id');
        $data['f_name'] = $this->input->get('f_name');
        $data['l_name'] = $this->input->get('l_name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');
        $data['status'] = $this->input->get('application_status');

        $data['main_view'] = "account/reports/sales";
        $this->load->view('account/layout', $data);
    }









}