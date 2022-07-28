<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Corporate extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        $public = array(
            'corporate/index',
            'corporate/signin',
            'corporate/forgot_password',
            'corporate/forgot_password_send',
            'corporate/reset_password',
            'corporate/reset_password_save',
        );
        $private = array(
            'corporate/dashboard',
            'corporate/logout',
            'corporate/account',
            'corporate/account_save',
            'corporate/upload_profile_img',
            'corporate/dashboard_pre',
            'corporate/add_corporate_sub_employee',
            'corporate/corporate_list',
            'corporate/invite_employee',
            'corporate/send_email_to_invite_employee',
            'corporate/save_corporate_sub_employee',
            'corporate/edit_corporate_profile',
            'corporate/edit_corporate_profile_save',
            'corporate/sub_employee_dashboard',
            'corporate/change_corporate_status',
            'corporate/multiple_file_upload',
            'corporate/test_email',

            'corporate/corporate_invoices',
        );
        $this->load->model('corporate_model');
        $this->load->helper('string');
        $current_url = $this->router->fetch_class() . '/' . $this->router->fetch_method();
        if ($this->session->userdata('corporate_logged_in')) {
            if ((in_array($current_url, $public))) {
                redirect('corporate/dashboard_pre');
            }
        } elseif (!$this->session->userdata('corporate_logged_in') && !in_array($current_url, $public)) {
            redirect('corporate');
        }
    }

    public function index() {
        $data["page_title"] = "ePolice Corporate";
        $this->load->view('corporate/login', $data);
    }

    public function signin() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if (!$this->form_validation->run()) {
            $data["page_title"] = "ePolice Potal";
            $this->load->view('corporate', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->load->model('corporate_model');
            if ($corporate = $this->corporate_model->login_corporate($email, $password)) {
                if($corporate->user_role_id == "2dd65df9-7ed5-45bd-bef1-f2afa31a") {
                    $corporatedata = array(
                        'corporate_id' => $corporate->id,
                        'corporate_type' => $corporate->user_role_id,
                        'name' => $corporate->first_name . ' ' . $corporate->last_name,
                        'corporate_profile_image' => $corporate->profile_image,
                        'corporate_logged_in' => true
                    );
                    $this->session->set_userdata($corporatedata);
                    redirect('corporate/dashboard_pre');
                }
            } else {
                $this->session->set_tempdata('no_user_access', 'Invalid Email / Password.',3);
                redirect('corporate');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('corporate');
    }

    public function forgot_password() {
        $data["page_title"] = "ePolic corporate";
        $data['main_view'] = "corporate/forgot_password_view";
        $this->load->view('corporate/forgot_password_view', $data);
    }

    public function forgot_password_send() {
        $email = $this->input->post('email');
//        $this->load->model('corporate_model');
        if ($secret = $this->corporate_model->user_forgot_password($email)) {
//            echo $secret; die();
            $htmlContent = '<h1>ePolice Reset Password Request</h1>';
            $htmlContent .= '<p>Click on the link below to reset your password.</p>';
            $htmlContent .= '<p><a href="' . base_url('corporate') . '/reset-password/' . $secret . '">Reset Password</a></p>';

            $this->email->to($this->input->post('email'));
            $this->email->from(EMAIL_FROM_SMTP, 'ePolice');
            $this->email->subject('ePolice Reset Password Request');
            $this->email->message($htmlContent);
            $this->email->send();
            $this->session->set_tempdata('signup_success', 'Reset password link has been sent. Check your inbox.',3);
            redirect('corporate/forgot-password');
        } else {
            $this->session->set_tempdata('no_user_access', 'Invalid Email! Please try again.',3);
            redirect('corporate/forgot-password');
        }
    }

    public function reset_password($code) {
        $data['is_code_valid'] = $this->corporate_model->user_check_secret_code($code);
        $data['secret_code'] = $code;
        $data["page_title"] = "SGIC - Admin corporate";
        $data['main_view'] = "corporate/reset_password_view";
        $this->load->view('corporate/reset_password_view', $data);
    }

    public function reset_password_save() {
        $code = $this->input->post('secret_code');
        $data['is_code_valid'] = $this->corporate_model->user_check_secret_code($code);
        $data['secret_code'] = $code;
        if (!$data['is_code_valid']) {
            redirect('corporate/reset-password/' . $code);
        }
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]');
        if (!$this->form_validation->run()) {
            $data['secret_code'] = $code;
            $data["page_title"] = "SGIC - Employee corporate";
            $data['main_view'] = "corporate/reset_password_view";
            $this->load->view('corporate/reset_password_view', $data);
        } else {
            if ($this->corporate_model->user_reset_password($code)) {
                $this->session->set_tempdata('signup_success', 'Password changed successfully!',3);
                redirect('corporate');
            } else {
                $this->session->set_tempdata('no_user_access', 'Something went wrong! Please try again.',3);
                redirect('corporate/reset-password/' . $code);
            }
        }
    }


    public function upload_profile_img(){
        if(isset($_POST["image"]))
        {
            $data = $_POST["image"];
            $image_array_1 = explode(";", $data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            $imageName = time() . '.png';
            file_put_contents($imageName, $data);
            echo '<img src="'. base_url().$imageName .'" name="filep" />';
            echo '<input type="hidden" value= "'.$imageName.'"  name="profile_picture" />';
        }
    }




    public function account() {
        $data['page_title'] = "Account Settings";
        $data['main_view'] = "corporate/account";
        $data['account'] = $this->db->where('id', $this->session->userdata('corporate_id'))->get('corporates')->row();
        $this->load->view('corporate/layout', $data);
    }

    public function account_save() {
        $data['page_title'] = "Account Settings";
        $data['main_view'] = "corporate/account";
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
            $data['account'] = $this->db->where('id', $this->session->userdata('corporate_id'))->get('corporates')->row();
            $this->load->view('corporate/layout', $data);
        } else {
            if ($this->corporate_model->user_account_update($is_password)) {
                $this->session->set_tempdata('success_message', 'Account updated successfully!',3);
                redirect('corporate/account');
            } else {
                $data['account'] = $this->db->where('id', $this->session->userdata('corporate_id'))->get('corporates')->row();
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                $this->load->view('corporate/layout', $data);
            }
        }
    }

    public function current_password_check($current_password) {
        if (!$this->corporate_model->match_current_password($current_password)) {
            $this->form_validation->set_message('current_password_check', 'Current password doesn\'t not match');
            return FALSE;
        }
        return TRUE;
    }

    public function dashboard() {
        $data['page_title'] = "My Applications";
        $data['main_view'] = "corporate/dashboard";
        $data['total_countries'] = $this->db->count_all_results('countries');
        $data['total_states'] = $this->db->count_all_results('states');
        $data['total_cities'] = $this->db->count_all_results('cities');
        $data['total_office_desk'] = $this->db->count_all_results('office_desk');
        $data['total_roles'] = $this->db->count_all_results('user_roles');
        //        get the total number of applications
        $corporate_id = $this->session->userdata('corporate_id');
        $data['get_namebase'] = $this->db->query("SELECT * FROM name_based_applications WHERE corporate_id = '$corporate_id' ")->result();
        $data['fingerprinting'] = $this->db->query("SELECT * FROM digital_fingerprinting_applications WHERE corporate_id = '$corporate_id' ")->result();
        $data['recordSuspension'] = $this->db->query("SELECT * FROM record_suspension_applications WHERE corporate_id = '$corporate_id' ")->result();
        $data['usEntry'] = $this->db->query("SELECT * FROM us_entry_waiver_applications WHERE corporate_id = '$corporate_id' ")->result();

        $this->load->view('corporate/layout', $data);
    }

    public function sub_employee_dashboard() {
        $data['page_title'] = "Sub-Employee Dashboard";
        $data['main_view'] = "corporate/sub_employee_dashboard";
        $data['total_countries'] = $this->db->count_all_results('countries');
        $data['total_states'] = $this->db->count_all_results('states');
        $data['total_cities'] = $this->db->count_all_results('cities');
        $data['total_office_desk'] = $this->db->count_all_results('office_desk');
        $data['total_roles'] = $this->db->count_all_results('user_roles');

        $this->load->view('corporate/layout', $data);
    }

//    public function dashboard_pre() {
//        $data['page_title'] = "Dashboard";
//        $data['main_view'] = "corporate/dashboard_pre";
//
////        get the total number of applications
//        $corporate_id = $this->session->userdata('corporate_id');
//        $data['get_namebase'] = $this->db->query("SELECT * FROM name_based_applications WHERE corporate_id = '$corporate_id' ")->result();
//        $data['fingerprinting'] = $this->db->query("SELECT * FROM digital_fingerprinting_applications WHERE corporate_id = '$corporate_id' ")->result();
//        $data['recordSuspension'] = $this->db->query("SELECT * FROM record_suspension_applications WHERE corporate_id = '$corporate_id' ")->result();
//        $data['usEntry'] = $this->db->query("SELECT * FROM us_entry_waiver_applications WHERE corporate_id = '$corporate_id' ")->result();
//
//        $data['total_applications'] = count($data['get_namebase']) + count($data['fingerprinting']) + count($data['recordSuspension']) + count($data['usEntry']);
//
//        $this->load->view('corporate/layout', $data);
//    }

    public function error404() {
        $this->load->view('404');
    }

    public function corporate_app() {
        $data["page_title"] = "ePolice Portal";
        $this->load->view('corporate/site/index_page', $data);
    }

    public function app_services() {
        $data["page_title"] = "ePolice Services";
        $data['main_view'] = "corporate/site/services";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_criminal_record_check() {
        $data["page_title"] = "Criminal Record Check";
        $data['main_view'] = "corporate/site/criminal_record_check";
        $this->load->view('corporate/site/layout', $data);
    }



    public function app_name_based_check() {
        $data["page_title"] = "Name Based Check";
        $data['main_view'] = "corporate/site/name_based_check";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_name_based_check_form($country) {
        $data["page_title"] = "Name Based Check " . strtoupper($country);
        $data['service'] = $this->db->where('service_slug', 'name-based-check')->get('services')->row();
        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
        $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
        $data["states"] = $this->corporate_model->get_states('Canada');
        $data['country'] = $country;
        $data['main_view'] = "corporate/site/name_based_check_form";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_name_based_check_form_save() {
        if ($application_id = $this->corporate_model->name_based_check_form_save()) {
            redirect('name-based-check/consent/' . $this->corporate_model->get_name_based_check_application_details($application_id)->client_id . '/' . $application_id);
        }
        redirect('corporate/application/name-based-check/' . $this->input->post('country'));
    }

    public function app_name_based_check_payment($client_id, $application_id) {
//        redirect('corporate/application/name-based-check/consent/' . $client_id . '/' . $application_id);
        $data["page_title"] = "Name Based Check Payment";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
            redirect('corporate/application');
        }
        $data["grand_total"] = $this->corporate_model->get_name_based_check_application_details($application_id)->grand_total;
        $data['main_view'] = "corporate/site/name_based_check_payment";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_name_based_check_payment_save() {
        if (!$this->corporate_model->name_based_check_payment_save()) {
            redirect('corporate/application/name-based-check/payment/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('corporate/application/name-based-check/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_name_based_check_consent($client_id, $application_id) {
        $data["page_title"] = "Consent Form - Name Based Criminal Record Check";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
//        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
//            redirect('corporate/application/name-based-check/payment/' . $client_id . '/' . $application_id);
//        }
        $data['main_view'] = "corporate/site/name_based_check_consent";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_name_based_check_consent_save() {
        if (!$this->corporate_model->name_based_check_consent_save()) {
            redirect('corporate/application/name-based-check/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('corporate/application/name-based-check/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_name_based_check_success($client_id, $application_id) {
        $data["page_title"] = "Success - Name Based Criminal Record Check";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
            redirect('corporate/application/name-based-check/consent/' . $client_id . '/' . $application_id);
        }
        $data['main_view'] = "corporate/site/name_based_check_success";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_digital_fingerprinting() {
        $data["page_title"] = "Digital Fingerprinting";
        $data['main_view'] = "corporate/site/digital_fingerprinting";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_digital_fingerprinting_form($country) {
        $data["page_title"] = "Digital Fingerprinting " . strtoupper($country);
        if ($this->input->post('fingerprint_options') == 'done') {
            if ($this->input->post('fingerprint_location') == 'done') {
                $data['service'] = $this->db->where('service_slug', 'digital-fingerprinting')->get('services')->row();
                $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
                $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
                $data["states"] = $this->corporate_model->get_states('Canada');
                $data['country'] = $country;
                $data['main_view'] = "corporate/site/digital_fingerprinting_form";
                $this->load->view('corporate/site/layout', $data);
            } else {
                $data['options'] = $this->input->post('digital_fingerprinting_options');
                $data["states"] = $this->corporate_model->get_states('Canada');
                $data['main_view'] = "corporate/site/digital_fingerprinting_locations";
                $this->load->view('corporate/site/layout', $data);
            }
        } else {
            $data['options'] = $this->db->order_by('created_at', 'ASC')->get('digital_fingerprinting_options')->result();
            $data['main_view'] = "corporate/site/digital_fingerprinting_options";
            $this->load->view('corporate/site/layout', $data);
        }
    }

    public function app_digital_fingerprinting_form_save() {
        if ($application_id = $this->corporate_model->digital_fingerprinting_form_save()) {
            redirect('corporate/application/digital-fingerprinting/consent/' . $this->corporate_model->get_digital_fingerprinting_application_details($application_id)->client_id . '/' . $application_id);
        }
        redirect('corporate/application/digital-fingerprinting/' . $this->input->post('country'));
    }

    public function app_digital_fingerprinting_payment($client_id, $application_id) {
//        redirect('corporate/application/digital-fingerprinting/consent/' . $client_id . '/' . $application_id);
        $data["page_title"] = "Digital Fingerprinting Payment";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('client_id', $client_id)->where('digital_fingerprinting_application_id', $application_id)->get('digital_fingerprinting_applications')->num_rows()) {
            redirect();
        }
        $data["grand_total"] = $this->corporate_model->get_digital_fingerprinting_application_details($application_id)->grand_total;
        $data['main_view'] = "corporate/site/digital_fingerprinting_payment";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_digital_fingerprinting_payment_save() {
        if (!$this->corporate_model->digital_fingerprinting_payment_save()) {
            redirect('corporate/application/digital-fingerprinting/payment/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('corporate/application/digital-fingerprinting/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_digital_fingerprinting_consent($client_id, $application_id) {
        $data["page_title"] = "Consent Form - Digital Fingerprinting";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
//        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('digital_fingerprinting_application_id', $application_id)->get('digital_fingerprinting_applications')->num_rows()) {
//            redirect('corporate/application/digital-fingerprinting/payment/' . $client_id . '/' . $application_id);
//        }
        $data['main_view'] = "corporate/site/digital_fingerprinting_consent";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_digital_fingerprinting_consent_save() {
        if (!$this->corporate_model->digital_fingerprinting_consent_save()) {
            redirect('corporate/application/digital-fingerprinting/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('corporate/application/digital-fingerprinting/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_digital_fingerprinting_success($client_id, $application_id) {
        $data["page_title"] = "Success - Digital Fingerprinting";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('digital_fingerprinting_application_id', $application_id)->get('digital_fingerprinting_applications')->num_rows()) {
            redirect('corporate/application/digital-fingerprinting/consent/' . $client_id . '/' . $application_id);
        }
        $data['main_view'] = "corporate/site/digital_fingerprinting_success";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_record_suspension() {
        $data["page_title"] = "Record Suspension";
        $data['main_view'] = "corporate/site/record_suspension";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_record_suspension_form($country) {
        $data["page_title"] = "Record Suspension " . strtoupper($country);
        $data['service'] = $this->db->where('service_slug', 'record-suspension')->get('services')->row();
        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
        $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
        $data["states"] = $this->corporate_model->get_states('Canada');
        $data['country'] = $country;
        $data['main_view'] = "corporate/site/record_suspension_form";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_record_suspension_form_save() {
        if ($application_id = $this->corporate_model->record_suspension_form_save()) {
            redirect('corporate/application/record-suspension/consent/' . $this->corporate_model->get_record_suspension_application_details($application_id)->client_id . '/' . $application_id);
        }
        redirect('corporate/application/record-suspension/' . $this->input->post('country'));
    }

    public function app_record_suspension_payment($client_id, $application_id) {
//        redirect('corporate/application/record-suspension/consent/' . $client_id . '/' . $application_id);
        $data["page_title"] = "Record Suspension Payment";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('client_id', $client_id)->where('record_suspension_id', $application_id)->get('record_suspension_applications')->num_rows()) {
            redirect();
        }
        $data["grand_total"] = $this->corporate_model->get_record_suspension_application_details($application_id)->grand_total;
        $data['main_view'] = "corporate/site/record_suspension_payment";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_record_suspension_payment_save() {
        if (!$this->corporate_model->record_suspension_payment_save()) {
            redirect('corporate/application/record-suspension/payment/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('corporate/application/record-suspension/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_record_suspension_consent($client_id, $application_id) {
        $data["page_title"] = "Consent Form - Record Suspension";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
//        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('record_suspension_id', $application_id)->get('record_suspension_applications')->num_rows()) {
//            redirect('corporate/application/record-suspension/payment/' . $client_id . '/' . $application_id);
//        }
        $data['main_view'] = "corporate/site/record_suspension_consent";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_record_suspension_consent_save() {
        if (!$this->corporate_model->record_suspension_consent_save()) {
            redirect('corporate/application/record-suspension/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('corporate/application/record-suspension/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_record_suspension_success($client_id, $application_id) {
        $data["page_title"] = "Success - Record Suspension";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('record_suspension_id', $application_id)->get('record_suspension_applications')->num_rows()) {
            redirect('corporate/application/record-suspension/consent/' . $client_id . '/' . $application_id);
        }
        $data['main_view'] = "corporate/site/record_suspension_success";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_us_entry_waiver() {
        $data["page_title"] = "US Entry Waiver";
        $data['main_view'] = "corporate/site/us_entry_waiver";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_us_entry_waiver_form($country) {
        $data["page_title"] = "US Entry Waiver " . strtoupper($country);
        $data['service'] = $this->db->where('service_slug', 'us-entry-waiver')->get('services')->row();
        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
        $data["states"] = $this->corporate_model->get_states('Canada');
        $data['country'] = $country;
        $data['main_view'] = "corporate/site/us_entry_waiver_form";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_us_entry_waiver_form_save() {
        if ($application_id = $this->corporate_model->us_entry_waiver_form_save()) {
            redirect('corporate/application/us-entry-waiver/consent/' . $this->corporate_model->get_us_entry_waiver_application_details($application_id)->client_id . '/' . $application_id);
        }
        redirect('corporate/application/us-entry-waiver/' . $this->input->post('country'));
    }

    public function app_us_entry_waiver_payment($client_id, $application_id) {
//        redirect('corporate/application/us-entry-waiver/consent/' . $client_id . '/' . $application_id);
        $data["page_title"] = "US Entry Waiver Payment";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('client_id', $client_id)->where('us_entry_waiver_id', $application_id)->get('us_entry_waiver_applications')->num_rows()) {
            redirect();
        }
        $data["grand_total"] = $this->corporate_model->get_us_entry_waiver_application_details($application_id)->grand_total;
        $data['main_view'] = "corporate/site/us_entry_waiver_payment";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_us_entry_waiver_payment_save() {
        if (!$this->corporate_model->us_entry_waiver_payment_save()) {
            redirect('corporate/application/us-entry-waiver/payment/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('corporate/application/us-entry-waiver/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_us_entry_waiver_consent($client_id, $application_id) {
        $data["page_title"] = "Consent Form - US Entry Waiver";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
//        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('us_entry_waiver_id', $application_id)->get('us_entry_waiver_applications')->num_rows()) {
//            redirect('corporate/application/us-entry-waiver/payment/' . $client_id . '/' . $application_id);
//        }
        $data['main_view'] = "corporate/site/us_entry_waiver_consent";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_us_entry_waiver_consent_save() {
        if (!$this->corporate_model->us_entry_waiver_consent_save()) {
            redirect('corporate/application/us-entry-waiver/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('corporate/application/us-entry-waiver/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_us_entry_waiver_success($client_id, $application_id) {
        $data["page_title"] = "Success - US Entry Waiver";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('us_entry_waiver_id', $application_id)->get('us_entry_waiver_applications')->num_rows()) {
            redirect('corporate/application/us-entry-waiver/consent/' . $client_id . '/' . $application_id);
        }
        $data['main_view'] = "corporate/site/us_entry_waiver_success";
        $this->load->view('corporate/site/layout', $data);
    }

    public function app_get_city_by_state() {
        $this->db->where('state_id', $this->input->post('state_id'));
        $result = $this->db->order_by('name', 'ASC')->get('cities')->result();
        echo '<option value="">Select City</option>';
        foreach ($result as $value) {
            echo '<option value="' . $value->city_id . '">' . $value->name . '</option>';
        }
    }

    public function name_based_check_applications() {
        $data['page_title'] = "Name Based Check Applications";
        $result = $this->corporate_model->get_name_based_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'corporate/security-screening/name-based-check']);

        $whereNew = array('application_status' => 'New', 'reception_id' => $this->session->userdata('reception_id'));
        $whereProcess = array('application_status' => 'Under Processing', 'reception_id' => $this->session->userdata('reception_id'));
        $wherePending = array('application_status' => 'Pending Documents', 'reception_id' => $this->session->userdata('reception_id'));
        $whereComplete = array('application_status' => 'Completed', 'reception_id' => $this->session->userdata('reception_id'));
        $whereNotApplied = array('application_status' => 'Not Applied', 'reception_id' => $this->session->userdata('reception_id'));

        $data['namebasedTotalNew'] = $this->corporate_model->get_total_record('name_based_applications', $whereNew);
        $data['namebasedTotalUnderProcess'] = $this->corporate_model->get_total_record('name_based_applications', $whereProcess);
        $data['namebasedTotalPendingDocuments'] = $this->corporate_model->get_total_record('name_based_applications', $wherePending);
        $data['namebasedTotalCompelted'] = $this->corporate_model->get_total_record('name_based_applications', $whereComplete);
        $data['namebasedTotalNotApplied'] = $this->corporate_model->get_total_record('name_based_applications', $whereNotApplied);


        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        $data['main_view'] = "corporate/name_based_check_applications";
        $this->load->view('corporate/layout', $data);
    }

    public function name_based_check_application_details($application_id) {
        $data['page_title'] = "Name Based Check Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->corporate_model->get_name_based_application_details($application_id);
        $data['services'] = $this->corporate_model->get_name_based_application_services($application_id);
        $data['offences'] = $this->corporate_model->get_name_based_application_offences($application_id);
        $data['main_view'] = "corporate/name_based_check_application_details";
        $this->load->view('corporate/layout', $data);
    }

    public function digital_fingerprinting_applications() {
        $data['page_title'] = "Digital Fingerprinting Applications";
        $result = $this->corporate_model->get_digital_fingerprinting_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'corporate/security-screening/digital-fingerprinting']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');
        $data['main_view'] = "corporate/digital_fingerprinting_applications";
        $this->load->view('corporate/layout', $data);
    }

    public function digital_fingerprinting_application_details($application_id) {
        $data['page_title'] = "Digital Fingerprinting Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->corporate_model->get_digital_fingerprinting_application_details($application_id);
        $data['services'] = $this->corporate_model->get_digital_fingerprinting_application_services($application_id);
        $data['options'] = $this->corporate_model->get_digital_fingerprinting_application_options($application_id);
        $data['main_view'] = "corporate/digital_fingerprinting_application_details";
        $this->load->view('corporate/layout', $data);
    }

    public function record_suspension_applications() {
        $data['page_title'] = "Record Suspension Applications";
        $result = $this->corporate_model->get_record_suspension_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'corporate/security-screening/record-suspension']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');
        $data['main_view'] = "corporate/record_suspension_applications";
        $this->load->view('corporate/layout', $data);
    }

    public function record_suspension_application_details($application_id) {
        $data['page_title'] = "Record Suspension Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->corporate_model->get_record_suspension_application_details($application_id);
        $data['services'] = $this->corporate_model->get_record_suspension_application_services($application_id);
        $data['offences'] = $this->corporate_model->get_record_suspension_application_offences($application_id);
        $data['main_view'] = "corporate/record_suspension_application_details";
        $this->load->view('corporate/layout', $data);
    }

    public function us_entry_waiver_applications() {
        $data['page_title'] = "U.S. Entry Waiver Applications";
        $result = $this->corporate_model->get_us_entry_waiver_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'corporate/security-screening/us-entry-waiver']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');
        $data['main_view'] = "corporate/us_entry_waiver_applications";
        $this->load->view('corporate/layout', $data);
    }

    public function us_entry_waiver_application_details($application_id) {
        $data['page_title'] = "U.S. Entry Waiver Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->corporate_model->get_us_entry_waiver_application_details($application_id);
        $data['services'] = $this->corporate_model->get_us_entry_waiver_application_services($application_id);
        $data['offences'] = $this->corporate_model->get_us_entry_waiver_application_offences($application_id);
        $data['main_view'] = "corporate/us_entry_waiver_application_details";
        $this->load->view('corporate/layout', $data);
    }

    public function get_agent_locations() {
        $this->db->select('agents.address')->from('locations')
                ->join('agents', 'locations.agent_id = agents.id');
        $this->db->where('locations.state_id', $this->input->post('state_id'));
        $this->db->where('locations.city_id', $this->input->post('city_id'));
        $result = $this->db->order_by('agents.address', 'ASC')->get()->result();
        echo '<option value="">Select Addresss</option>';
        foreach ($result as $value) {
            echo '<option value="' . $value->address . '">' . $value->address . '</option>';
        }
    }

    public function add_corporate_sub_employee(){
        $data['page_title'] = "Add User";
        $data['main_view'] = "corporate/add_corporate_sub_employee";
        $data["states"] = $this->corporate_model->get_states('Canada');
        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();

        $data['sub_corporate_users'] = $this->db->where('super_corporate_employee_id', $this->session->userdata('corporate_id'))->get('users')->result();
        $this->load->view('corporate/layout', $data);
    }

    public function save_corporate_sub_employee(){
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Email', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('state_id', 'State', 'trim|required');

//        $this->form_validation->set_rules('city_id', 'City', 'trim|required');
//        $this->form_validation->set_rules('address', 'Address', 'trim|required');

        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            $this->session->set_tempdata('add_user_error', 'Something went wrong. Please try again!',3);
            redirect('corporate/add_corporate_sub_employee');
        } else {
            if ($this->corporate_model->save_corporate_sub_employee()) {
                $this->session->set_tempdata('success_message', 'Sub Corporate Added successfully.',3);
                redirect('corporate/add_corporate_sub_employee');
            } else {
                $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
                redirect('corporate/add_corporate_sub_employee');
            }
        }
    }


    public function corporate_list(){
        $data['page_title'] = "Sub Employee List";
        $data['main_view'] = "corporate/corporates_list";

        $result = $this->corporate_model->get_all_corporates();
//        var_dump(count($result)); die();

        $data['users'] = $this->paginator->paginate($result, ['base_url' => 'corporate/corporate_list']);
//        var_dump($data); die();
//        $data["states"] = $this->portal_model->get_states('Canada');

        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();
        $data["corporates"] = $this->db->query("SELECT * FROM corporates")->result();

//        $data["states"] = $this->corporate_model->get_states('Canada');
//        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();
        $this->load->view('corporate/layout', $data);
    }


    public function invite_employee(){
        $data['page_title'] = "Send Invitation";
        $data['main_view'] = "corporate/invite_employees";
        $this->load->view('corporate/layout', $data);
    }


    public function service_order(){
        $data['page_title'] = "Service Order";
        $data['main_view'] = "corporate/service_order";

        $result = $this->corporate_model->get_service_order_applications();

        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'corporate/service_order']);

        $this->load->view('corporate/layout', $data);
    }


    public function send_email_to_invite_employee(){
        $session_id = $this->session->userdata('corporate_id');


        $number = count($this->input->get('name'));
        if($number>=1){
            for($i=0; $i<$number; $i++) {

//                echo $this->input->get('name')[$i];
//                echo $this->input->get('name_based_check')[$i];
//                echo $this->input->get('digital_fingerprinting')[$i];
//                echo $this->input->get('record_suspension')[$i];
//                echo $this->input->get('us_entry_waiver')[$i];

                $result = $this->corporate_model->signup_super_corporate_to_sub_employee(
                    $this->input->get('name')[$i],
                    $this->input->get('name_based_check')[$i],
                    $this->input->get('digital_fingerprinting')[$i],
                    $this->input->get('record_suspension')[$i],
                    $this->input->get('us_entry_waiver')[$i]
                    );

                if($result){
                    $query = $this->db->where('email', $this->input->post('name')[$i])->get('users');
                    if ($query->num_rows() > 0){
                        $row = $query->row();
                        $ind_user = array(
                            'ind_user_id' => $row->id,
                            'ind_user_name' => $row->first_name. " " . $row->last_name,
                            'ind_user_profile_image' => $row->profile_image,
                            'ind_user_role_id' => $row->user_role_id,
                            'ind_user_logged_in' => true
                        );
                        $this->session->set_userdata($ind_user);
                    }
                    redirect('user/dashboard');
                }
                else{
                    redirect('user/signin');
                }

                if (trim($this->input->get('name')[$i] != '')) {
                    $htmlContent = '<h1>ePolice Registration link</h1>';
                    $htmlContent .= '<p>Click on the link below for Registration.</p>';
                    $htmlContent .= '<p><a href="'. base_url('site/corporate_sub_employee/'). $session_id .'/'. $this->input->get('name_based_check')[$i]. '/'. $this->input->get('digital_fingerprinting')[$i]. '/'. $this->input->get('record_suspension')[$i].  '/'. $this->input->get('us_entry_waiver')[$i].'">Click here to Register</a></p>';

                    $this->email->to($this->input->get('name')[$i]);
                    $this->email->from(EMAIL_FROM_SMTP, 'ePolice');
                    $this->email->subject('ePolice Registration Request');
                    $this->email->message($htmlContent);
                    $this->email->send();
                }
                else {
                    $this->session->set_tempdata('error_message', 'Invalid Email! Please try again.',3);
                }
                $this->session->set_tempdata('success_message', 'Reset password link has been sent. Check your inbox.',3);
                redirect('corporate/invite_employee');
            }
        }
    }

    public function edit_corporate_profile(){
        $data['page_title'] = "My Profile";
        $data['main_view'] = "corporate/edit_corporate_profile";
        $data['edit_agent_data'] = $this->db->where('id', $this->session->userdata('corporate_id'))->get('users')->row_array();
        $this->load->view('corporate/layout', $data);
    }

    public function edit_corporate_profile_save(){
        if ($this->corporate_model->edit_corporate_profile_save()) {
            $this->session->set_tempdata('success_message', 'Corporate updated successfully.',3);
            redirect('corporate/edit_corporate_profile');
        } else {
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            $this->edit_corporate_profile();
        }
    }

    public function multiple_file_upload(){
        //            file uploading code
        $data = array();
        $errorUploadType = $statusMsg = '';
        // If file upload form submitted

        if($this->input->post('fileSubmit')){
//            echo "hi"; die();
            // If files are selected to upload
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){
                $filesCount = count($_FILES['files']['name']);

//                echo "hii"; die();
                for($i = 0; $i < $filesCount; $i++){
                    $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i];

                    // File upload configuration
                    $uploadPath = 'uploads/service_order_images/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';

                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    // Upload file to server
                    if($this->upload->do_upload('file')){
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                        $uploadData[$i]['created_by'] = $this->session->userdata('corporate_id');
                        $uploadData[$i]['submitted_to'] = $this->input->post('submitted_to');
                    }else{
                        $errorUploadType .= $_FILES['file']['name'].' | ';
                    }
                }
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):'';
                if(!empty($uploadData)){
                    // Insert files data into the database
                    $insert = $this->corporate_model->multiple_file_upload($uploadData);
                    redirect('corporate/service_order');

                    // Upload status message
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
                }
            }else{
                $statusMsg = 'Please select image files to upload.';
            }
        }
    }

    public function corporate_invoices(){
        $data['page_title'] = "Invoices";
        $data['main_view'] = "corporate/corporate_invoice";
//        $result = $this->corporate_model->get_service_order_applications();
//        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'corporate/service_order']);
        $this->load->view('corporate/layout', $data);
    }


    public function corporate_invoice_detail(){
        $data['page_title'] = "Corporate Invoice Details";
        $data['main_view'] = "corporate/corporate_invoice_detail";
        $this->load->view('corporate/layout', $data);
    }







    public function test_email(){

        $data[0] = 'nadeem.ahm89@gmail.com';
        $data[1] = 'zainulabaidinz@gmail.com';
        $data[2] = 'sezain007@gmail.com';

        for($i=0; $i<5; $i++) {
            $htmlContent = '<h1>ePolice Registration link</h1>';
            $htmlContent .= '<p>Click on the link below for Registration.</p>';
            $htmlContent .= '<p><a href="' . base_url('corporate/add-corporate-employee/') . '">Reset Password</a></p>';

            $this->email->to($data[$i]);
            $this->email->from(EMAIL_FROM_SMTP, 'ePolice');
            $this->email->subject('ePolice Registration Request');
            $this->email->message($htmlContent);
            $this->email->send();
        }
    }


    public function dashboard_pre() {
        $data['page_title'] = "Dashboard";
        $data['main_view'] = "corporate/dashboard_pree";

        $corporate_id = $this->session->userdata('corporate_id');
        $data['get_namebase'] = $this->db->query("SELECT * FROM name_based_applications WHERE corporate_id = '$corporate_id' ")->result();
        $data['fingerprinting'] = $this->db->query("SELECT * FROM digital_fingerprinting_applications WHERE corporate_id = '$corporate_id' ")->result();
        $data['recordSuspension'] = $this->db->query("SELECT * FROM record_suspension_applications WHERE corporate_id = '$corporate_id' ")->result();
        $data['usEntry'] = $this->db->query("SELECT * FROM us_entry_waiver_applications WHERE corporate_id = '$corporate_id' ")->result();

        $data['total_applications'] = count($data['get_namebase']) + count($data['fingerprinting']) + count($data['recordSuspension']) + count($data['usEntry']);
     
        $this->load->view('corporate/layout', $data);
    }





    public function error(){
        $data['page_title'] = "error";
        $data['main_view'] = "corporate/payment/error";
        $this->load->view('corporate/layout', $data);
    }
}