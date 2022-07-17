<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        $this->load->model('User_model');
        $this->load->helper('string');

        $public = array(
            'user/index',
            'user/signin',
            'user/signup',
            'user/searchUserById',
            'user/register',
            'user/forgot_password',
            'user/forgot_password_send',
            'user/reset_password',
            'user/reset_password_save',

        );
        $private = array(
            'user/dashboard',
            'user/searchUserById',
        );
        $this->load->model('user_model');
        $current_url = $this->router->fetch_class() . '/' . $this->router->fetch_method();
        if ($this->session->userdata('ind_user_logged_in') || $this->session->userdata('sub_corporate_user_logged_in') || $this->session->userdata('sub_agent_user_logged_in') || $this->session->userdata('outsider_user_logged_in')) {
            if ((in_array($current_url, $public))) {
                redirect('user/dashboard');
            }
        } elseif (!$this->session->userdata('ind_user_logged_in') && !in_array($current_url, $public)) {
            redirect('user');
        }
    }

    public function index() {
        $data["page_title"] = "ePolice User";
        $this->load->view('user/login', $data);

    }


    public function register() {
        $data["page_title"] = "ePolice User Registration";
        $this->load->view('user/register', $data);
    }

    public function signin() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if (!$this->form_validation->run()) {
            $data["page_title"] = "ePolice User";
            $this->load->view('user', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            if ($user = $this->user_model->login_user($email, $password)) {
                if($user->user_role_id == '3ee65tf9-7ed5-45ft-hdk1-f2afa31b') {

                    $ind_user = array(
                        'ind_user_id' => $user->id,
                        'ind_user_name' => $user->first_name . ' ' . $user->last_name,
                        'ind_user_profile_image' => $user->profile_image,
                        'ind_user_role_id' => $user->user_role_id,
                        'ind_user_logged_in' => true
                    );
                    $this->session->set_userdata($ind_user);
                    redirect('user/dashboard_pre');
                }

                elseif($user->user_role_id == 'f971e9f3-57c9-9206-a35d-1700188b') {
                    $sub_corporate_user = array(
                        'sub_corporate_user_id' => $user->id,
                        'sub_corporate_user_name' => $user->first_name . ' ' . $user->last_name,
                        'sub_corporate_user_profile_image' => $user->profile_image,
                        'sub_corporate_user_role_id' => $user->user_role_id,
                        'sub_corporate_user_logged_in' => true
                    );
                    $this->session->set_userdata($sub_corporate_user);
                    redirect('user/dashboard_pre');
                }

                elseif($user->user_role_id == 'f971e9f3-53z5-9206-a35d-1700188b') {
                    $sub_agent_user = array(
                        'sub_agent_user_id' => $user->id,
                        'sub_agent_user_name' => $user->first_name . ' ' . $user->last_name,
                        'sub_agent_user_profile_image' => $user->profile_image,
                        'sub_agent_user_role_id' => $user->user_role_id,
                        'sub_agent_user_logged_in' => true
                    );
                    $this->session->set_userdata($sub_agent_user);
                    redirect('user/dashboard');
                }

                elseif($user->user_role_id == 'f971e9f3-98c9-9243-adrt-1700188b') {
                    $outsider_user = array(
                        'outsider_user_id' => $user->id,
                        'outsider_user_role_id' => $user->user_role_id,
                        'outsider_user_logged_in' => true
                    );
                    $this->session->set_userdata($outsider_user);
                    redirect('user/dashboard');
                }

            } else {
                $this->session->set_tempdata('no_user_access', 'Invalid Email / Password.',3);
                redirect('user');
            }
        }
    }

    public function signup(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $result = $this->user_model->signup();
        if($result){
            $query = $this->db->where('email', $this->input->post('email'))->get('users');
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
    }

    public function logout() {
        if(!empty($this->session->userdata('ind_user_id'))) {
            $userdata = array(
                'ind_user_id' => '',
                'ind_user_name' => '',
                'ind_user_profile_image' => '',
                'ind_user_role_id' => '',
                'ind_user_logged_in' => false
            );
            $this->session->set_userdata($userdata);
            redirect('user');
        }
        elseif(!empty($this->session->userdata('sub_corporate_user_id'))){
            $userdata = array(
                'sub_corporate_user_id' => '',
                'sub_corporate_user_name' => '',
                'sub_corporate_user_profile_image' => '',
                'sub_corporate_user_role_id' => '',
                'sub_corporate_user_logged_in' => false
            );
            $this->session->set_userdata($userdata);
            redirect('user');
        }


        elseif(!empty($this->session->userdata('sub_agent_user_id'))){
            $userdata = array(
                'sub_agent_user_id' => '',
                'sub_agent_user_name' => '',
                'sub_agent_user_profile_image' => '',
                'sub_agent_user_role_id' => '',
                'sub_agent_user_logged_in' => false
            );
            $this->session->set_userdata($userdata);
            redirect('user');
        }

        elseif(!empty($this->session->userdata('outsider_user_id'))){
            $userdata = array(
                'outsider_user_id' => '',
                'outsider_user_role_id' => '',
                'outsider_user_logged_in' => false
            );
            $this->session->set_userdata($userdata);
            redirect('user');
        }
    }




    public function forgot_password() {
        $data["page_title"] = "ePolic User";
        $data['main_view'] = "user/forgot_password_view";
        $this->load->view('user/forgot_password_view', $data);
    }


    public function forgot_password_send() {
         $email = $this->input->post('email');

        if ($secret = $this->user_model->user_forgot_password($email)) {
            $htmlContent = '<h1>ePolice Reset Password Request</h1>';
            $htmlContent .= '<p>Click on the link below to reset your password.</p>';
            $htmlContent .= '<p><a href="' . base_url('user') . '/reset-password/' . $secret . '">Reset Password</a></p>';

            $this->email->to($this->input->post('email'));
            $this->email->from(EMAIL_FROM_SMTP, 'ePolice');
            $this->email->subject('ePolice Reset Password Request');
            $this->email->message($htmlContent);
            $this->email->send();
            $this->session->set_tempdata('signup_success', 'Reset password link has been sent. Check your inbox.',3);
            redirect('user/forgot-password');
        } else {
            $this->session->set_tempdata('no_user_access', 'Invalid Email! Please try again.',3);
            redirect('user/forgot-password');
        }
    }

    public function reset_password($code) {
//        echo $this->uri->segment('3');
        $data['is_code_valid'] = $this->user_model->user_check_secret_code($code);
        $data['secret_code'] = $code;
        $data["page_title"] = "ePolice - User Password Reset";
        $data['main_view'] = "user/reset_password_view";
        $this->load->view('user/reset_password_view', $data);
    }

    public function reset_password_save() {
        $code = $this->input->post('secret_code');
        $data['is_code_valid'] = $this->user_model->user_check_secret_code($code);
        $data['secret_code'] = $code;
        if (!$data['is_code_valid']) {
            redirect('user/reset-password/' . $code);
        }
//        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
//        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]');
//        if (!$this->form_validation->run()) {
//            echo "not working, due validation"; die();
//            $data['secret_code'] = $code;
//            $data["page_title"] = "ePolice - User Password Reset";
//            $data['main_view'] = "user/reset_password_view";
//            $this->load->view('user/reset_password_view', $data);
//        } else {
//            echo "here is reset"; die();

            if ($this->user_model->user_reset_password($code)) {
                $this->session->set_tempdata('signup_success', 'Password changed successfully!',3);
                redirect('user');
            } else {
                $this->session->set_tempdata('no_user_access', 'Something went wrong! Please try again.',3);
                redirect('user/reset-password/' . $code);
            }
//        }
    }
    
    public function edit_user_profile(){
        $data['page_title'] = "My Profile";
        $data['main_view'] = "user/edit_user_profile";
        if(!empty($this->session->userdata('ind_user_id'))){
//            $data['user_id_for_update_profile'] = $this->session->userdata('ind_user_id');
            $data['edit_user_data'] = $this->db->where('id', $this->session->userdata('ind_user_id'))->get('users')->row_array();
        }
        elseif(!empty($this->session->userdata('sub_corporate_user_id'))){
//            $data['user_id_for_update_profile'] = $this->session->userdata('sub_corporate_user_id');
            $data['edit_user_data'] = $this->db->where('id', $this->session->userdata('sub_corporate_user_id'))->get('users')->row_array();
        }
        elseif(!empty($this->session->userdata('sub_agent_user_id'))){
//            $data['user_id_for_update_profile'] = $this->session->userdata('sub_agent_user_role_id');
            $data['edit_user_data'] = $this->db->where('id', $this->session->userdata('sub_agent_user_id'))->get('users')->row_array();
        }
        $this->load->view('user/layout', $data);
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
            echo '<input type="hidden" value= "'.$imageName.'"  name="demo" />';
        }
    }


    public function edit_user_profile_save(){
        if ($this->user_model->user_edit_profile_save()) {
            $this->session->set_tempdata('success_message', 'User updated successfully.',3);
            redirect('/user/edit_user_profile');
        } else {
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            $this->edit_user_profile();
        }
    }

    public function app_services() {
        $data["page_title"] = "ePolice Services";
        $data['main_view'] = "user/site/services";
        $this->load->view('user/layout', $data);
    }

    public function dashboard() {
        $data['page_title'] = "My Applications";
        $data['main_view'] = "user/dashboard";
        $data['total_countries'] = $this->db->count_all_results('countries');
        $data['total_states'] = $this->db->count_all_results('states');
        $data['total_cities'] = $this->db->count_all_results('cities');
        $data['total_office_desk'] = $this->db->count_all_results('office_desk');
        $data['total_roles'] = $this->db->count_all_results('user_roles');

        $user_email = get_email_by_id($this->session->userdata('ind_user_id'));
        $data['namebasedcomments'] = $this->user_model->get_name_based_applications_comments();
        $data['fingerprintcomments'] = $this->user_model->get_digital_fingerprint_comments();
        $data['recordsuspensioncomments'] = $this->user_model->get_record_suspension_applications_comments();
        $data['usentrywaivercomments'] = $this->user_model->get_us_entry_applications_comments();
        if(!empty($this->session->userdata('ind_user_id'))){
            $individual_user_id = $this->session->userdata('ind_user_role_id');
            $data['get_namebase'] = $this->db->query("SELECT * FROM name_based_applications WHERE register_user_id = '$individual_user_id'" )->result();
            $data['fingerprinting'] = $this->db->query("SELECT * FROM digital_fingerprinting_applications WHERE register_user_id = '$individual_user_id'")->result();
            $data['recordSuspension'] = $this->db->query("SELECT * FROM record_suspension_applications WHERE register_user_id = '$individual_user_id' ")->result();
            $data['usEntry'] = $this->db->query("SELECT * FROM us_entry_waiver_applications WHERE register_user_id = '$individual_user_id' ")->result();
        }
        if(!empty($this->session->userdata('sub_corporate_user_role_id'))){
            $individual_user_id = $this->session->userdata('sub_corporate_user_role_id');
            $data['get_namebase'] = $this->db->query("SELECT * FROM name_based_applications WHERE sub_corporate_id = '$individual_user_id'" )->result();
            $data['fingerprinting'] = $this->db->query("SELECT * FROM digital_fingerprinting_applications WHERE register_user_id = '$individual_user_id'")->result();
            $data['recordSuspension'] = $this->db->query("SELECT * FROM record_suspension_applications WHERE register_user_id = '$individual_user_id' ")->result();
            $data['usEntry'] = $this->db->query("SELECT * FROM us_entry_waiver_applications WHERE register_user_id = '$individual_user_id' ")->result();
        }
        if(!empty($this->session->userdata('sub_agent_user_id'))){
            $individual_user_id = $this->session->userdata('sub_agent_user_id');
            $data['get_namebase'] = $this->db->query("SELECT * FROM name_based_applications WHERE sub_agent_id = '$individual_user_id'" )->result();
            $data['fingerprinting'] = $this->db->query("SELECT * FROM digital_fingerprinting_applications WHERE sub_agent_id = '$individual_user_id'")->result();
            $data['recordSuspension'] = $this->db->query("SELECT * FROM record_suspension_applications WHERE register_user_id = '$individual_user_id' ")->result();
            $data['usEntry'] = $this->db->query("SELECT * FROM us_entry_waiver_applications WHERE register_user_id = '$individual_user_id' ")->result();
        }
        $data['get_coupons'] = $this->db->where('user_email_id', $user_email)->get('coupons')->row();

        $this->load->view('user/layout', $data);
    }



    public function dashboard_pre() {
        $data['page_title'] = "Dashboard";
        $data['main_view'] = "user/dashboard_pre";

        $individual_user_id = $this->session->userdata('ind_user_role_id');
        $whereuser = array('register_user_id' => $individual_user_id );
        $one = 1;
        $data['get_namebase'] = $this->user_model->get_total_record('name_based_applications', $whereuser);
        $data['fingerprinting'] = $this->user_model->get_total_record('digital_fingerprinting_applications', $whereuser);
        $data['recordSuspension'] = $this->user_model->get_total_record('record_suspension_applications', $whereuser);
        $data['usEntry'] = $this->user_model->get_total_record('us_entry_waiver_applications', $whereuser);
        $where = array('register_user_id' => $individual_user_id ,'application_completed' => $one);
        $data['completedget_namebase'] = $this->user_model->get_total_record('name_based_applications', $where);
        $data['completedfingerprinting'] = $this->user_model->get_total_record('digital_fingerprinting_applications', $where);
        $data['completedrecordSuspension'] = $this->user_model->get_total_record('record_suspension_applications', $where);
        $data['completedusEntry'] = $this->user_model->get_total_record('us_entry_waiver_applications', $where);

        $sub_agent_id = $this->session->userdata('sub_agent_user_id');
        $subagentwhereuser = array('sub_agent_id' => $sub_agent_id );
        $one = 1;
        $data['sub_agent_get_namebase'] = $this->user_model->get_total_record('name_based_applications', $subagentwhereuser);
        $data['sub_agent_fingerprinting'] = $this->user_model->get_total_record('digital_fingerprinting_applications', $subagentwhereuser);
       // $data['recordSuspension'] = $this->user_model->get_total_record('record_suspension_applications', $subagentwhereuser);
       // $data['usEntry'] = $this->user_model->get_total_record('us_entry_waiver_applications', $subagentwhereuser);
        $subagentwhere = array('sub_agent_id' => $sub_agent_id ,'application_completed' => $one);
        $data['sub_agent_completedget_namebase'] = $this->user_model->get_total_record('name_based_applications', $subagentwhere);
        $data['sub_agent_completedfingerprinting'] = $this->user_model->get_total_record('digital_fingerprinting_applications', $subagentwhere);
        //$data['completedrecordSuspension'] = $this->user_model->get_total_record('record_suspension_applications', $subagentwhere);
        //$data['completedusEntry'] = $this->user_model->get_total_record('us_entry_waiver_applications', $subagentwhere);


        $data['comments'] = $this->user_model->get_comments();
        $this->load->view('user/layout', $data);
    }




    public function app_criminal_record_check() {
        $data["page_title"] = "Criminal Record Check";
        $data['main_view'] = "user/site/criminal_record_check";
        $this->load->view('user/site/layout', $data);
    }

    public function app_name_based_check() {
        $data["page_title"] = "Name Based Check";
        $data['main_view'] = "user/site/name_based_check";
        $this->load->view('user/site/layout', $data);
    }

    public function app_name_based_check_form() {
//        echo "hi";
        $data["page_title"] = "Name Based Check";
//        $data["page_title"] = "Name Based Check " . strtoupper($country);
        $data['service'] = $this->db->where('service_slug', 'name-based-check')->get('services')->row();
        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
        $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
        $data["states"] = $this->user_model->get_states('Canada');
        $data['country'] = 'Canada';
//        $data['main_view'] = "user/site/name_based_check_form";
        $this->load->view('user/site/name_based_check_form', $data);
//        $this->load->view('user/site/layout', $data);
    }


    public function app_name_based_payment_aqua(){
        $data["page_title"] = "Name Based Check Payment";
        $this->load->view('user/site/name_based_check_form_payment_a', $data);
    }



    public function digital_fingerprinting_payment_summery(){
        $data["page_title"] = "Digital Fingerprinting Payment";
        $this->load->view('user/site/digital_fingerprinting_payment_summery', $data);
    }


    public function digital_fingerprint_new(){
        $data["page_title"] = "Digital Finger Printing";
        if ($this->input->post('fingerprint_options') == 'done') {
            if ($this->input->post('fingerprint_location') == 'done') {
                $data['service'] = $this->db->where('service_slug', 'digital-fingerprinting')->get('services')->row();
                $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
                $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
                $data["states"] = $this->agent_model->get_states('Canada');
//                $data['country'] = $country;
                $data['main_view'] = "agent/site/digital_fingerprinting_form";
                $this->load->view('agent/site/layout', $data);
            } else {
                $data['options'] = $this->input->post('digital_fingerprinting_options');
                $data["states"] = $this->agent_model->get_states('Canada');
                $data['main_view'] = "agent/site/digital_fingerprinting_locations";
                $this->load->view('agent/site/layout', $data);
            }
        } else {
            $data['options'] = $this->db->order_by('created_at', 'ASC')->get('digital_fingerprinting_options')->result();
        }
        $this->load->view('user/site/digital_fingerprinting_form_new', $data);
    }


    public function record_suspension_new(){
        $country = "Canada";
        $data["page_title"] = "Record Suspension " . strtoupper($country);
        $data['service'] = $this->db->where('service_slug', 'record-suspension')->get('services')->row();
        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
        $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
        $data["states"] = $this->user_model->get_states('Canada');
        $data['country'] = $country;

        $this->load->view('user/site/record_suspension', $data);
    }









//    register user namebase automatical invoice
//    register user namebase automatical invoice
//    register user namebase automatical invoice
//    register user namebase automatical invoice

    public function app_name_based_check_form_save() {
        $application_id = $this->user_model->name_based_check_form_save();
        die();


        if ($application_id = $this->user_model->name_based_check_form_save()) {
            redirect('name-based-check/consent/' . $this->user_model->get_name_based_check_application_details($application_id)->client_id . '/' . $application_id);
        }
        redirect('user/application/name-based-check/' . $this->input->post('country'));
    }

    public function app_name_based_check_payment($client_id, $application_id) {
        $data["page_title"] = "Name Based Check Payment";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
            redirect('user/application');
        }
        $data["grand_total"] = $this->user_model->get_name_based_check_application_details($application_id)->grand_total;
        $data['main_view'] = "user/site/name_based_check_payment";
        $this->load->view('user/site/layout', $data);
    }

    public function app_name_based_check_payment_save() {
        if (!$this->agent_model->name_based_check_payment_save()) {
            redirect('agent/application/name-based-check/payment/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('agent/application/name-based-check/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_name_based_check_consent($client_id, $application_id) {
        $data["page_title"] = "Consent Form - Name Based Criminal Record Check";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
//        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
//            redirect('agent/application/name-based-check/payment/' . $client_id . '/' . $application_id);
//        }
//        $data['main_view'] = "agent/site/name_based_check_consent";
        $this->load->view('user/site/name_based_check_consent', $data);
    }

    public function app_name_based_check_consent_save() {
        if (!$this->agent_model->name_based_check_consent_save()) {
            redirect('agent/application/name-based-check/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('agent/application/name-based-check/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }



//        namebased check signature

    public function namebased_check_signature() {
        $data["page_title"] = "Consent Form - Name Based check Signature";
//        $data["application_id"] = $application_id;
//        $data["client_id"] = $client_id;
//        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
//            redirect('agent/application/name-based-check/payment/' . $client_id . '/' . $application_id);
//        }
//        $data['main_view'] = "agent/site/name_based_check_consent";
        $this->load->view('user/site/namebased_check_signature', $data);
    }


    public function record_suspension_signature() {
        $data["page_title"] = "Consent Form - Name Based check Signature";
//        $data["application_id"] = $application_id;
//        $data["client_id"] = $client_id;
//        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
//            redirect('agent/application/name-based-check/payment/' . $client_id . '/' . $application_id);
//        }
//        $data['main_view'] = "agent/site/name_based_check_consent";
        $this->load->view('user/site/record_suspension_signature', $data);
    }

    public function us_entry_waiver_signature() {
        $data["page_title"] = "Consent Form - Name Based check Signature";
//        $data["application_id"] = $application_id;
//        $data["client_id"] = $client_id;
//        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
//            redirect('agent/application/name-based-check/payment/' . $client_id . '/' . $application_id);
//        }
//        $data['main_view'] = "agent/site/name_based_check_consent";
        $this->load->view('user/site/us_entry_waiver_signature', $data);
    }






    public function app_name_based_check_success($client_id, $application_id) {
        $data["page_title"] = "Success - Name Based Criminal Record Check";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
            redirect('agent/application/name-based-check/consent/' . $client_id . '/' . $application_id);
        }
        $data['main_view'] = "agent/site/name_based_check_success";
        $this->load->view('agent/site/layout', $data);
    }


    public function app_services_sub_user() {
        $data["page_title"] = "ePolice Services";
        $data['main_view'] = "user/site_sub_user/services";
        $this->load->view('user/site/layout', $data);
    }


    public function dashboard_sub_user() {
        $data['page_title'] = "My Applications";
        $data['main_view'] = "user/dashboard";
        $data['total_countries'] = $this->db->count_all_results('countries');
        $data['total_states'] = $this->db->count_all_results('states');
        $data['total_cities'] = $this->db->count_all_results('cities');
        $data['total_office_desk'] = $this->db->count_all_results('office_desk');
        $data['total_roles'] = $this->db->count_all_results('user_roles');



        $user_email = get_email_by_id($this->session->userdata('outsider_user_id'));

        $data['get_coupons'] = $this->db->where('user_email_id', $user_email)->get('coupons')->row();

        $this->load->view('user/layout', $data);
    }


    public function app_criminal_record_check_sub_user() {
        $data["page_title"] = "Criminal Record Check";
        $data['main_view'] = "user/site_sub_user/criminal_record_check";
        $this->load->view('user/site/layout', $data);
    }

    public function app_name_based_check_sub_user() {
        $data["page_title"] = "Name Based Check";
        $data['main_view'] = "user/site_sub_user/name_based_check";
        $this->load->view('user/site/layout', $data);
    }

    public function app_name_based_check_form_sub_user($country) {
        $data["page_title"] = "Name Based Check " . strtoupper($country);
        $data['service'] = $this->db->where('service_slug', 'name-based-check')->get('services')->row();
        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
        $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
        $data["states"] = $this->user_model->get_states('Canada');
        $data['country'] = $country;
        $data['main_view'] = "user/site_sub_user/name_based_check_form";
        $this->load->view('user/site/layout', $data);
    }


    public function app_name_based_check_form_save_sub_user() {
        if ($application_id = $this->user_model->name_based_check_form_save_sub_user()) {
//            echo "hellow"; die();
            redirect('user/application/name-based-check-sub-user/consent/' . $this->user_model->get_name_based_check_application_details($application_id)->client_id . '/' . $application_id);
        }
        redirect('user/application/name-based-check/' . $this->input->post('country'));
    }

//    public function app_name_based_check_payment_sub_user($client_id, $application_id) {
//        $data["page_title"] = "Name Based Check Payment";
//        $data["application_id"] = $application_id;
//        $data["client_id"] = $client_id;
//        if (!$this->db->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
//            redirect('user/application');
//        }
//        $data["grand_total"] = $this->user_model->get_name_based_check_application_details($application_id)->grand_total;
//        $data['main_view'] = "user/site_sub_user/name_based_check_payment";
//        $this->load->view('user/site/layout', $data);
//    }
//
//    public function app_name_based_check_payment_save_sub_user() {
//        if (!$this->agent_model->name_based_check_payment_save()) {
//            redirect('agent/application/name-based-check/payment/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
//        } else {
//            redirect('agent/application/name-based-check/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
//        }
//    }

    public function app_name_based_check_consent_sub_user($client_id, $application_id) {
        $data["page_title"] = "Consent Form - Name Based Criminal Record Check";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
//        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
//            redirect('agent/application/name-based-check/payment/' . $client_id . '/' . $application_id);
//        }
        $data['main_view'] = "user/site_sub_user/name_based_check_consent";
        $this->load->view('user/site/layout', $data);
    }

    public function app_name_based_check_consent_save_sub_user() {
        if (!$this->user_model->name_based_check_consent_save()) {
            redirect('user/application/name-based-check-sub-user/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('user/application/name-based-check-sub-user/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_name_based_check_success_sub_user($client_id, $application_id) {
        $data["page_title"] = "Success - Name Based Criminal Record Check";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
            redirect('user/application/name-based-check-sub-user/consent/' . $client_id . '/' . $application_id);
        }
        $data['main_view'] = "user/site_sub_user/name_based_check_success";
        $this->load->view('user/site/layout', $data);
    }










//user gidital finger print part
//user gidital finger print part
//user gidital finger print part
//user gidital finger print part
//user gidital finger print part

    public function app_digital_fingerprinting() {
        $data["page_title"] = "Digital Fingerprinting";
        $data['main_view'] = "user/site/digital_fingerprinting";
        $this->load->view('user/site/layout', $data);
    }

    public function app_digital_fingerprinting_form($country) {
        $data["page_title"] = "Digital Fingerprinting " . strtoupper($country);
        if ($this->input->post('fingerprint_options') == 'done') {
            if ($this->input->post('fingerprint_location') == 'done') {
                $data['service'] = $this->db->where('service_slug', 'digital-fingerprinting')->get('services')->row();
                $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
                $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
                $data["states"] = $this->user_model->get_states('Canada');
                $data['country'] = $country;
                $data['main_view'] = "user/site/digital_fingerprinting_form";
                $this->load->view('user/site/layout', $data);
            } else {
                $data['options'] = $this->input->post('digital_fingerprinting_options');
                $data["states"] = $this->user_model->get_states('Canada');
                $data['main_view'] = "user/site/digital_fingerprinting_locations";
                $this->load->view('user/site/layout', $data);
            }
        } else {
            $data['options'] = $this->db->order_by('created_at', 'ASC')->get('digital_fingerprinting_options')->result();
            $data['main_view'] = "user/site/digital_fingerprinting_options";
            $this->load->view('user/site/layout', $data);
        }
    }


    public function digital_fingerprinting_signature() {
        $data["page_title"] = "Consent Form - Digital Fingerprinting Signature";
//        $data["application_id"] = $application_id;
//        $data["client_id"] = $client_id;
//        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
//            redirect('agent/application/name-based-check/payment/' . $client_id . '/' . $application_id);
//        }
//        $data['main_view'] = "agent/site/name_based_check_consent";
        $this->load->view('user/site/digital_fingerprinting_signature', $data);
    }



    public function app_digital_fingerprinting_form_save() {
        if ($application_id = $this->user_model->digital_fingerprinting_form_save()) {
//            echo $application_id; die();
            redirect('user/application/digital-fingerprinting/consent/' . $this->agent_model->get_digital_fingerprinting_application_details($application_id)->client_id . '/' . $application_id);
        }
        redirect('user/application/digital-fingerprinting/' . $this->input->post('country'));
    }

    public function app_digital_fingerprinting_payment($client_id, $application_id) {
//        redirect('agent/application/digital-fingerprinting/consent/' . $client_id . '/' . $application_id);
        $data["page_title"] = "Digital Fingerprinting Payment";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('client_id', $client_id)->where('digital_fingerprinting_application_id', $application_id)->get('digital_fingerprinting_applications')->num_rows()) {
            redirect();
        }
        $data["grand_total"] = $this->agent_model->get_digital_fingerprinting_application_details($application_id)->grand_total;
        $data['main_view'] = "agent/site/digital_fingerprinting_payment";
        $this->load->view('agent/site/layout', $data);
    }

    public function app_digital_fingerprinting_payment_save() {
        if (!$this->agent_model->digital_fingerprinting_payment_save()) {
            redirect('agent/application/digital-fingerprinting/payment/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('agent/application/digital-fingerprinting/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_digital_fingerprinting_consent($client_id, $application_id) {
        $data["page_title"] = "Consent Form - Digital Fingerprinting";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
//        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('digital_fingerprinting_application_id', $application_id)->get('digital_fingerprinting_applications')->num_rows()) {
//            redirect('agent/application/digital-fingerprinting/payment/' . $client_id . '/' . $application_id);
//        }
        $data['main_view'] = "agent/site/digital_fingerprinting_consent";
        $this->load->view('agent/site/layout', $data);
    }

    public function app_digital_fingerprinting_consent_save() {
        if (!$this->agent_model->digital_fingerprinting_consent_save()) {
            redirect('agent/application/digital-fingerprinting/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('agent/application/digital-fingerprinting/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_digital_fingerprinting_success($client_id, $application_id) {
        $data["page_title"] = "Success - Digital Fingerprinting";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('digital_fingerprinting_application_id', $application_id)->get('digital_fingerprinting_applications')->num_rows()) {
            redirect('agent/application/digital-fingerprinting/consent/' . $client_id . '/' . $application_id);
        }
        $data['main_view'] = "agent/site/digital_fingerprinting_success";
        $this->load->view('agent/site/layout', $data);
    }

    public function app_record_suspension() {
        $data["page_title"] = "Record Suspension";
        $data['service'] = $this->db->where('service_slug', 'record-suspension')->get('services')->row();
        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
        $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
        $data["states"] = $this->user_model->get_states('Canada');

        $this->load->view('user/site/record_suspension', $data);
    }

    public function app_record_suspension_form($country) {
        $data["page_title"] = "Record Suspension " . strtoupper($country);
        $data['service'] = $this->db->where('service_slug', 'record-suspension')->get('services')->row();
        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
        $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
//        $data["states"] = $this->agent_model->get_states('Canada');
        $data['country'] = $country;
        $data['main_view'] = "user/site/record_suspension_form";
        $this->load->view('user/site/layout', $data);
    }

    public function app_record_suspension_form_save() {
        if ($application_id = $this->agent_model->record_suspension_form_save()) {
            redirect('agent/application/record-suspension/consent/' . $this->agent_model->get_record_suspension_application_details($application_id)->client_id . '/' . $application_id);
        }
        redirect('agent/application/record-suspension/' . $this->input->post('country'));
    }

    public function app_record_suspension_payment($client_id, $application_id) {
        $data["page_title"] = "Record Suspension Payment";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
//        if (!$this->db->where('client_id', $client_id)->where('record_suspension_id', $application_id)->get('record_suspension_applications')->num_rows()) {
//            redirect();
//        }
//        $data["grand_total"] = $this->agent_model->get_record_suspension_application_details($application_id)->grand_total;
//        $data['main_view'] = "user/site/record_suspension_payment";
        $this->load->view('user/site/record_suspension_payment', $data);
    }




    public function app_record_suspension_payment_save() {
        if (!$this->agent_model->record_suspension_payment_save()) {
            redirect('agent/application/record-suspension/payment/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('agent/application/record-suspension/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_record_suspension_consent($client_id, $application_id) {
        $data["page_title"] = "Consent Form - Record Suspension";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
//        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('record_suspension_id', $application_id)->get('record_suspension_applications')->num_rows()) {
//            redirect('agent/application/record-suspension/payment/' . $client_id . '/' . $application_id);
//        }
//        $data['main_view'] = "user/site/record_suspension_consent";
        $this->load->view('user/site/record_suspension_consent', $data);
    }

    public function app_record_suspension_consent_save() {
        if (!$this->agent_model->record_suspension_consent_save()) {
            redirect('agent/application/record-suspension/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('agent/application/record-suspension/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_record_suspension_success($client_id, $application_id) {
        $data["page_title"] = "Success - Record Suspension";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('record_suspension_id', $application_id)->get('record_suspension_applications')->num_rows()) {
            redirect('agent/application/record-suspension/consent/' . $client_id . '/' . $application_id);
        }
        $data['main_view'] = "agent/site/record_suspension_success";
        $this->load->view('agent/site/layout', $data);
    }

    public function app_us_entry_waiver() {
        $data["page_title"] = "US Entry Waiver";
        $data['main_view'] = "agent/site/us_entry_waiver";
        $this->load->view('agent/site/layout', $data);
    }

    public function app_us_entry_waiver_form($country) {
        $data["page_title"] = "US Entry Waiver " . strtoupper($country);
        $data['service'] = $this->db->where('service_slug', 'us-entry-waiver')->get('services')->row();
        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
        $data["states"] = $this->agent_model->get_states('Canada');
        $data['country'] = $country;
        $data['main_view'] = "agent/site/us_entry_waiver_form";
        $this->load->view('agent/site/layout', $data);
    }

    public function app_us_entry_waiver_form_save() {
        if ($application_id = $this->agent_model->us_entry_waiver_form_save()) {
            redirect('agent/application/us-entry-waiver/consent/' . $this->agent_model->get_us_entry_waiver_application_details($application_id)->client_id . '/' . $application_id);
        }
        redirect('agent/application/us-entry-waiver/' . $this->input->post('country'));
    }

    public function app_us_entry_waiver_payment($client_id, $application_id) {
//        redirect('agent/application/us-entry-waiver/consent/' . $client_id . '/' . $application_id);
        $data["page_title"] = "US Entry Waiver Payment";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('client_id', $client_id)->where('us_entry_waiver_id', $application_id)->get('us_entry_waiver_applications')->num_rows()) {
            redirect();
        }
        $data["grand_total"] = $this->agent_model->get_us_entry_waiver_application_details($application_id)->grand_total;
        $data['main_view'] = "agent/site/us_entry_waiver_payment";
        $this->load->view('agent/site/layout', $data);
    }

    public function app_us_entry_waiver_payment_save() {
        if (!$this->agent_model->us_entry_waiver_payment_save()) {
            redirect('agent/application/us-entry-waiver/payment/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('agent/application/us-entry-waiver/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_us_entry_waiver_consent($client_id, $application_id) {
        $data["page_title"] = "Consent Form - US Entry Waiver";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
//        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('us_entry_waiver_id', $application_id)->get('us_entry_waiver_applications')->num_rows()) {
//            redirect('agent/application/us-entry-waiver/payment/' . $client_id . '/' . $application_id);
//        }
        $data['main_view'] = "agent/site/us_entry_waiver_consent";
        $this->load->view('agent/site/layout', $data);
    }

    public function app_us_entry_waiver_consent_save() {
        if (!$this->agent_model->us_entry_waiver_consent_save()) {
            redirect('agent/application/us-entry-waiver/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('agent/application/us-entry-waiver/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function app_us_entry_waiver_success($client_id, $application_id) {
        $data["page_title"] = "Success - US Entry Waiver";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('us_entry_waiver_id', $application_id)->get('us_entry_waiver_applications')->num_rows()) {
            redirect('agent/application/us-entry-waiver/consent/' . $client_id . '/' . $application_id);
        }
        $data['main_view'] = "agent/site/us_entry_waiver_success";
        $this->load->view('agent/site/layout', $data);
    }

    public function app_get_city_by_state() {
        $this->db->where('state_id', $this->input->post('state_id'));
        $result = $this->db->order_by('name', 'ASC')->get('cities')->result();
        echo '<option value="">Select City</option>';
        foreach ($result as $value) {
            echo '<option value="' . $value->city_id . '">' . $value->name . '</option>';
        }
    }



    ///////////////////////////////////
    ///////////////////////////////////
    ///////////////////////////////////
    ///////////////////////////////////

    public function name_based_check_applications() {
        $data['page_title'] = "Name Based Check Applications";
        $result = $this->user_model->get_name_based_applications($this->session->userdata('ind_user_id'));
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/security-screening/name-based-check']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');
        $data['comments'] = $this->user_model->get_application_comments(100070, 'name-based-check');
        $data['main_view'] = "user/name_based_check_applications";
        $this->load->view('user/layout', $data);
    }



    public function name_based_check_applications_sub_agent() {
        $data['page_title'] = "Name Based Check Applications";
        $result = $this->user_model->get_name_based_applications_sub_agent($this->session->userdata('sub_agent_user_id'));
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/name_based_check_applications_sub_agent']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        $data['comments'] = $this->user_model->get_application_comments(100070, 'name-based-check');
        $data['main_view'] = "user/name_based_check_applications_sub_agent";
        $this->load->view('user/layout', $data);
    }


    public function name_based_check_applications_sub_corporate() {
        $data['page_title'] = "Name Based Check Applications";
        $result = $this->user_model->get_name_based_applications_sub_corporate();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/name_based_check_applications_sub_corporate']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

//        $data['comments'] = $this->user_model->get_application_comments(100070, 'name-based-check');
        $data['main_view'] = "user/name_based_check_applications_sub_corporate";
        $this->load->view('user/layout', $data);
    }


//    check it
    public function name_based_check_application_details($application_id) {
        $data['page_title'] = "Name Based Check Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->agent_model->get_name_based_application_details($application_id);
        $data['services'] = $this->agent_model->get_name_based_application_services($application_id);
        $data['offences'] = $this->agent_model->get_name_based_application_offences($application_id);
        $data['main_view'] = "user/name_based_check_application_details";
        $this->load->view('user/layout', $data);
    }


    public function digital_fingerprinting_applications() {
        $data['page_title'] = "Digital Fingerprinting Applications";
        $result = $this->user_model->get_digital_fingerprinting_applications($this->session->userdata('ind_user_id'));

        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/security-screening/digital-fingerprinting']);
   //     $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/digital_fingerprinting_applications']);

//        var_dump($data['applications']);
//        die();



        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        $data['comments'] = $this->user_model->get_application_comments(200011, 'digital-fingerprinting');

        $data['main_view'] = "user/digital_fingerprinting_applications";
    //    $this->load->view('user/digital_fingerprinting_applications', $data);
        $this->load->view('user/layout', $data);
    }




    public function digital_fingerprinting_applications_sub_agent() {
        $data['page_title'] = "Digital Fingerprinting Applications";
        $result = $this->user_model->get_digital_fingerprinting_applications($this->session->userdata('sub_agent_user_id'));
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/digital_fingerprinting_applications_sub_agent']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        $data['comments'] = $this->user_model->get_application_comments(200011, 'digital-fingerprinting');

        $data['main_view'] = "user/digital_fingerprinting_applications_sub_agent";
        $this->load->view('user/layout', $data);
    }


    public function digital_fingerprinting_applications_sub_corporate() {
        $data['page_title'] = "Digital Fingerprinting Applications";
        $result = $this->user_model->get_digital_fingerprinting_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/digital_fingerprinting_applications_sub_corporate']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        $data['comments'] = $this->user_model->get_application_comments(200011, 'digital-fingerprinting');

        $data['main_view'] = "user/digital_fingerprinting_applications_sub_corporate";
        $this->load->view('user/layout', $data);
    }

//    check it
    public function digital_fingerprinting_application_details($application_id) {
        $data['page_title'] = "Digital Fingerprinting Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->agent_model->get_digital_fingerprinting_application_details($application_id);
        $data['services'] = $this->agent_model->get_digital_fingerprinting_application_services($application_id);
        $data['options'] = $this->agent_model->get_digital_fingerprinting_application_options($application_id);
        $data['main_view'] = "agent/digital_fingerprinting_application_details";
        $this->load->view('agent/layout', $data);
    }

    public function record_suspension_applications() {
       $data['page_title'] = "Record Suspension Applications";
       $result = $this->user_model->get_record_suspension_applications($this->session->userdata('ind_user_id'));
       $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/security-screening/record-suspension']);
       $data['client_id'] = $this->input->get('id');
       $data['name'] = $this->input->get('name');
       $data['phone'] = $this->input->get('phone');
       $data['dob'] = $this->input->get('dob');

       $data['comments'] = $this->user_model->get_application_comments(4008, 'record-suspension');

       $data['main_view'] = "user/record_suspension_applications";
       $this->load->view('user/layout', $data);


        // $data['page_title'] = "Record Suspension Applications";
        // $result = $this->user_model->get_name_based_applications($this->session->userdata('ind_user_id'));
        // $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/security-screening/name-based-check']);
        // $data['client_id'] = $this->input->get('id');
        // $data['name'] = $this->input->get('name');
        // $data['phone'] = $this->input->get('phone');
        // $data['dob'] = $this->input->get('dob');

        // $data['comments'] = $this->user_model->get_application_comments(100070, 'name-based-check');
        // $data['main_view'] = "user/record_suspension_applications";
        // $this->load->view('user/layout', $data);




    }



    public function record_suspension_applications_sub_agent() {
        $data['page_title'] = "Record Suspension Applications";
        $result = $this->user_model->get_record_suspension_applications($this->session->userdata('sub_agent_user_id'));
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/record_suspension_applications_sub_agent']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        $data['comments'] = $this->user_model->get_application_comments(4008, 'record-suspension');

        $data['main_view'] = "user/record_suspension_applications_sub_agent";
        $this->load->view('user/layout', $data);
    }

    public function record_suspension_applications_sub_corporate() {
        $data['page_title'] = "Record Suspension Applications";
        $result = $this->user_model->get_record_suspension_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/record_suspension_applications_sub_corporate']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        $data['comments'] = $this->user_model->get_application_comments(4008, 'record-suspension');

        $data['main_view'] = "user/record_suspension_applications_sub_corporate";
        $this->load->view('user/layout', $data);
    }

//    check it
    public function record_suspension_application_details($application_id) {
        $data['page_title'] = "Record Suspension Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->agent_model->get_record_suspension_application_details($application_id);
        $data['services'] = $this->agent_model->get_record_suspension_application_services($application_id);
        $data['offences'] = $this->agent_model->get_record_suspension_application_offences($application_id);

        //        update the status to zero show that visited application it is
        $this->potal_model->update_Record_Suspension_Applications_status($application_id);

        $data['main_view'] = "agent/record_suspension_application_details";
        $this->load->view('agent/layout', $data);
    }

    public function us_entry_waiver_applications() {
        $data['page_title'] = "U.S. Entry Waiver Applications";
        $result = $this->user_model->get_us_entry_waiver_applications($this->session->userdata('ind_user_id'));
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/security-screening/us-entry-waiver']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        $data['comments'] = $this->user_model->get_application_comments(400006, 'us-entry-waiver');

        $data['main_view'] = "user/us_entry_waiver_applications";
        $this->load->view('user/layout', $data);
    }

    public function us_entry_waiver_applications_sub_agent() {
        $data['page_title'] = "U.S. Entry Waiver Applications";
        $result = $this->user_model->get_us_entry_waiver_applications($this->session->userdata('sub_agent_user_id'));
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/us_entry_waiver_applications_sub_agent']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        $data['comments'] = $this->user_model->get_application_comments(400006, 'us-entry-waiver');

        $data['main_view'] = "user/us_entry_waiver_applications_sub_agent";
        $this->load->view('user/layout', $data);
    }

    public function us_entry_waiver_applications_sub_corporate() {
        $data['page_title'] = "U.S. Entry Waiver Applications";
        $result = $this->user_model->get_us_entry_waiver_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/us_entry_waiver_applications_sub_corporate']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        $data['comments'] = $this->user_model->get_application_comments(400006, 'us-entry-waiver');

        $data['main_view'] = "user/us_entry_waiver_applications_sub_corporate";
        $this->load->view('user/layout', $data);
    }

//    check it
    public function us_entry_waiver_application_details($application_id) {
        $data['page_title'] = "U.S. Entry Waiver Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->agent_model->get_us_entry_waiver_application_details($application_id);
        $data['services'] = $this->agent_model->get_us_entry_waiver_application_services($application_id);
        $data['offences'] = $this->agent_model->get_us_entry_waiver_application_offences($application_id);
        $data['main_view'] = "agent/us_entry_waiver_application_details";
        $this->load->view('agent/layout', $data);
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


    public function searchUserById(){
//        echo "hi"; die();
        $data['page_title'] = "Application Status Engine";
        $data['main_view'] = "user/searchById";
        $this->load->view('user/layout', $data);
    }

    public function find_user(){
        $id = $this->input->post('userId');
        $result = $this->User_model->find_user($id);
        if(count($result) == 1){
           redirect(base_url('User/user_varification'));
        }
        else{
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
            redirect('User/searchUserById');
        }
    }

    public function user_varification(){
        $data['page_title'] = "Application Status Engine";
        $data['main_view'] = "user/user_varification";

        $data['f_name'] = $this->input->get('f_name');
        $data['l_name'] = $this->input->get('l_name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        if(!empty($this->input->get('f_name'))){
            $data['filter_data'] = $this->User_model->name_based_applications_users();
        }
        $this->load->view('user/layout', $data);
    }

    public function invite_corporate_employees(){
        $data['page_title'] = "Send Invitation";
        $data['main_view'] = "user/invite_corporate_employees";
        $this->load->view('user/layout', $data);
    }



    public function send_email_to_invite_sub_corporate_employees(){
        $session_id = $this->session->userdata('corporate_id');

        $number = count($this->input->get('name'));
        if($number>=1){
            for($i=0; $i<$number; $i++) {
                if (trim($this->input->get('name')[$i] != '')) {

                    $htmlContent = '<h1>ePolice Registration link</h1>';
                    $htmlContent .= '<p>Click on the link below for Registration.</p>';
                    $htmlContent .= '<p><a href="'. base_url('site/corporate_sub_employee/'). $session_id .'/'. $this->input->get('name_based_check')[$i]. '/'. $this->input->get('digital_fingerprinting')[$i]. '/'. $this->input->get('record_suspension')[$i].  '/'. $this->input->get('us_entry_waiver')[$i].'">Click here to Register</a></p>';

                    $this->email->to($this->input->get('name')[$i]);
                    $this->email->from(EMAIL_FROM_SMTP, 'ePolice');
                    $this->email->subject('ePolice Registration Request');
                    $this->email->message($htmlContent);
                    $this->email->send();
                } else {
                    $this->session->set_tempdata('no_user_access', 'Invalid Email! Please try again.',3);
                }
                redirect('corporate/invite_employee');
            }
        }
    }

    public function invite_agent_employees(){
        $data['page_title'] = "Send Invitation to Employees";
        $data['main_view'] = "user/invite_agent_employees";
        $this->load->view('user/layout', $data);
    }

    public function send_email_to_invite_sub_agent_employees(){
        $session_id = $this->session->userdata('corporate_id');

        $number = count($this->input->get('name'));
        if($number>=1){
            for($i=0; $i<$number; $i++) {
                if (trim($this->input->get('name')[$i] != '')) {

                    $htmlContent = '<h1>ePolice Registration link</h1>';
                    $htmlContent .= '<p>Click on the link below for Registration.</p>';
                    $htmlContent .= '<p><a href="'. base_url('site/corporate_sub_employee/'). $session_id .'/'. $this->input->get('name_based_check')[$i]. '/'. $this->input->get('digital_fingerprinting')[$i]. '/'. $this->input->get('record_suspension')[$i].  '/'. $this->input->get('us_entry_waiver')[$i].'">Click here to Register</a></p>';

                    $this->email->to($this->input->get('name')[$i]);
                    $this->email->from(EMAIL_FROM_SMTP, 'ePolice');
                    $this->email->subject('ePolice Registration Request');
                    $this->email->message($htmlContent);
                    $this->email->send();
                } else {
                    $this->session->set_tempdata('no_user_access', 'Invalid Email! Please try again.',3);
                }
                redirect('corporate/invite_employee');
            }
        }
    }

    public function corporate_service_order(){
        $data['page_title'] = "Service Order";
        $data['main_view'] = "user/corporate_service_order";
        $result = $this->user_model->get_corporate_service_order_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/corporate_service_order']);
        $this->load->view('user/layout', $data);
    }

    public function agent_service_order(){
        $data['page_title'] = "Service Order";
        $data['main_view'] = "user/agent_service_order";
        $result = $this->user_model->get_agent_service_order_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/agent_service_order']);
        $this->load->view('user/layout', $data);
    }


    public function multiple_file_upload_corporate(){
        $data = array();
        $errorUploadType = $statusMsg = '';
        // If file upload form submitted

        if($this->input->post('fileSubmit')){
            // If files are selected to upload
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){
                $filesCount = count($_FILES['files']['name']);

                for($i = 0; $i < $filesCount; $i++){
                    $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i];

                    // File upload configuration
                    $uploadPath = 'upload/service_order_images/';
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
                        $uploadData[$i]['created_by'] = $this->session->userdata('sub_corporate_user_id');
                        $uploadData[$i]['submitted_to'] = $this->input->post('submitted_to');
                    }else{
                        $errorUploadType .= $_FILES['file']['name'].' | ';
                    }
                }
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):'';
                if(!empty($uploadData)){
                    // Insert files data into the database
                    $insert = $this->user_model->multiple_file_upload($uploadData);
                    redirect('user/corporate_service_order');

                    // Upload status message
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
                }
            }else{
                $statusMsg = 'Please select image files to upload.';
            }
        }
        else{
//            echo "else part"; die();
            redirect('user/corporate_service_order');
        }
    }







//    application submit for sub-corporate and sub agent user
//    application submit for sub-corporate and sub agent user
//    application submit for sub-corporate and sub agent user
//    application submit for sub-corporate and sub agent user





    public function user_download($user_id) {
//        echo $application_id; die();
        $this->load->library('pdfgenerator');
        $data['page_title'] = "User Detail";
        $data['application_id'] = $user_id;
        $data['application'] = $this->user_model->get_name_based_application_details($user_id);
//        $data['services'] = $this->portal_model->get_name_based_application_services($application_id);
//        $data['offences'] = $this->portal_model->get_name_based_application_offences($application_id);
        $html = $this->load->view('user/name_based_check_application_download', $data, true);
        $filename = 'Name Based Check Application - ' . $user_id;
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }



    public function user_invoices(){
        $data['page_title'] = "Invoices";
        $data['main_view'] = "user/user_invoice";
//        $result = $this->corporate_model->get_service_order_applications();
//        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'corporate/service_order']);
        $this->load->view('user/layout', $data);
    }


    public function user_invoice_detail(){
        $data['page_title'] = "User Invoice Details";
        $data['main_view'] = "user/user_invoice_detail";
        $this->load->view('user/layout', $data);
    }



    public function user_invitations(){
        $data['page_title'] = "User Invitations";
        $data['main_view'] = "user/user_invitations";
        $this->load->view('user/layout', $data);
    }



    public function user_pending_applications(){
        $data['page_title'] = "Pending Applications";
        $data['main_view'] = "user/user_pending_applications";
        $this->load->view('user/layout', $data);
    }



//    public function corporate_invoices(){
//        $data['page_title'] = "Invoices";
//        $data['main_view'] = "corporate/corporate_invoice";
////        $result = $this->corporate_model->get_service_order_applications();
////        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'corporate/service_order']);
//        $this->load->view('corporate/layout', $data);
//    }
//
//
//    public function corporate_invoice_detail(){
//        $data['page_title'] = "Corporate Invoice Details";
//        $data['main_view'] = "corporate/corporate_invoice_detail";
//        $this->load->view('corporate/layout', $data);
//    }


    public function user_api(){
        $data['page_title'] = "Electronic Identity Verification";
        $data['main_view'] = "user/site/aquafax_api";
        $this->load->view('user/layout', $data);
    }


    public function user_welcome(){
        $data['page_title'] = "Namebased Application";
        $data['main_view'] = "user/site/namebased_successful";
        $this->load->view('user/layout', $data);
    }

    public function save_namebase_comments()
    {
        $data = array(
            'comment' => $this->input->post('comment'),
            'application_id'=>$this->input->post('application_id'),
            'type'=>$this->input->post('type'),
            'created_by'=>$this->input->post('created_by')
        );
        $result=$this->user_model->save_namebase_comments($data);
        if($result)
        {
            echo  1;
        }
        else
        {
            echo  0;
        }
    }

//    Payment area
//    Payment area
    public function success(){
        $data['page_title'] = "Success Payment page (User Controller)";
        $data['main_view'] = "user/payment/success";
        $this->load->view('user/layout', $data);
    }

    public function error(){
        $data['page_title'] = "error";
        $data['main_view'] = "user/payment/error";
        $this->load->view('user/layout', $data);
    }



//    user apis aquafex

    public function user_api_aq(){
//        $dataFromTheForm = $_POST['fieldName']; // request data from the form
//        $soapUrl = "https://uat.eidfs.equifax.ca/uru/soap/ut/canadav3?wsdl"; // asmx URL of WSDL
        $soapUrl = "https://ifs-uat.ca.equifax.com/uru/soap/ut/canadav2"; // asmx URL of WSDL
        $soapUser = "/glavcov";  //  username
//        $soapPassword = "pjT0hqjdb/TVTpysJoURGjuW8mtOa0gU"; // password
        $soapPassword = "pjT0hqjdb/TVTpysJoURGjuW8mtOa0gU"; // password
        // xml post structure

        $xml_post_string = '<?xml version ="1.0" encoding="utf-8"?>
        <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:v2="http://eid.equifax.com/soap/schema/canada/v2">
            <soapenv:Header>
                <wsse:Security soapenv:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
                <wsse:UsernameToken>
                    <wsse:Username>/glavcov</wsse:Username>
                    <wsse:Password>pjT0hqjdb/TVTpysJoURGjuW8mtOa0gU</wsse:Password>
                    </wsse:UsernameToken>
                </wsse:Security>
            </soapenv:Header>

            <soapenv:Body>
      <v2:InitialRequest>
         <v2:Identity>
            <v2:Name>
               <v2:FirstName>MILO</v2:FirstName>
               <v2:LastName>TESTADD</v2:LastName>
            </v2:Name>
            <!--1 to 3 repetitions:-->
            <v2:Address timeAtAddress="50" addressType="Current">
               <v2:HybridAddress>
                  <v2:AddressLine>731 BAY AVE</v2:AddressLine>
                  <v2:City>Kelowna</v2:City>
                  <v2:Province>BC</v2:Province>
                  <v2:PostalCode>V1Y7K2</v2:PostalCode>
               </v2:HybridAddress>
            </v2:Address>
            <v2:DateOfBirth>
               <v2:Day>03</v2:Day>
               <v2:Month>03</v2:Month>
               <v2:Year>1989</v2:Year>
            </v2:DateOfBirth>
            <v2:PhoneNumber phoneType="Home">
               <!--You have a CHOICE of the next 2 items at this level-->
               <v2:PhoneNumber>5145291282</v2:PhoneNumber>
            </v2:PhoneNumber>


            <v2:CustomerId>TEST</v2:CustomerId>
         </v2:Identity>
         <v2:ProcessingOptions>
            <v2:Language>English</v2:Language>
         </v2:ProcessingOptions>
      </v2:InitialRequest>
   </soapenv:Body>
        </soapenv:Envelope>';
        // data from the form, e.g. some ID number

        $headers = array(
            "Content-type: text/xml;charset=\"utf-8\"",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: https://ifs-uat.ca.equifax.com/uru/soap/ut/canadav2",
            "Content-length: " . strlen($xml_post_string),
        ); //SOAPAction: your op URL

        $url = $soapUrl;

//        dd($url); die();

        // PHP cURL  for https connection with auth
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $soapUser . ":" . $soapPassword); // username and password - declared at the top of the doc
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_TIMEOUT, 100);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // converting
        $response = curl_exec($ch);
//        echo "<pre>";
//        print_r($response);
//        echo '</pre>';
//        dd(curl_error($ch));
        curl_close($ch);
//        dd($response);
        // converting
//        $response1 = str_replace("<soap:Body>", "", $response);
//        $response2 = str_replace("</soap:Body>", "", $response1);

        // convertingc to XML
        $parser = simplexml_load_string($response);
//        echo $parser;
        print_r($response);
        echo($parser);



        // Test XML
        $xml = '<InitialResponse xmlns="http://eid.equifax.com/soap/schema/canada/v2" transactionKey="0000000006144000000410005"><InteractiveQuery interactiveQueryId="1"><Question questionId="1"><QuestionText>Which of the following is currently or has been in the past one of your phone numbers?</QuestionText><AnswerChoice answerId="1" correctAnswer="false">6041565743</AnswerChoice><AnswerChoice answerId="2" correctAnswer="false">6042385791</AnswerChoice><AnswerChoice answerId="3" correctAnswer="false">6048304873</AnswerChoice><AnswerChoice answerId="4" correctAnswer="false">6048546820</AnswerChoice><AnswerChoice answerId="5" correctAnswer="true">NONE OF THE ABOVE</AnswerChoice></Question><Question questionId="2"><QuestionText>Which of the following is your age today?</QuestionText><AnswerChoice answerId="1" correctAnswer="false">30 years</AnswerChoice><AnswerChoice answerId="2" correctAnswer="false">31 years</AnswerChoice><AnswerChoice answerId="3" correctAnswer="true">32 years</AnswerChoice><AnswerChoice answerId="4" correctAnswer="false">33 years</AnswerChoice><AnswerChoice answerId="5" correctAnswer="false">NONE OF THE ABOVE</AnswerChoice></Question><Question questionId="3"><QuestionText>Your credit file indicates you may have a loan or financing arrangement which was opened approximately January 2021. Please choose the credit provider for this account from the following options.</QuestionText><AnswerChoice answerId="1" correctAnswer="false">ISRAEL BANK </AnswerChoice><AnswerChoice answerId="2" correctAnswer="false">KOREA  BANK</AnswerChoice><AnswerChoice answerId="3" correctAnswer="false">LAURENTIAN BANK</AnswerChoice><AnswerChoice answerId="4" correctAnswer="false">PC FINANCIAL </AnswerChoice><AnswerChoice answerId="5" correctAnswer="true">NONE OF THE ABOVE</AnswerChoice></Question><Question questionId="4"><QuestionText>Please choose the range within which your semi-annual payment falls for the previously referenced account.</QuestionText><AnswerChoice answerId="1" correctAnswer="false">$300 - $399</AnswerChoice><AnswerChoice answerId="2" correctAnswer="false">$400 - $499</AnswerChoice><AnswerChoice answerId="3" correctAnswer="false">$500 - $599</AnswerChoice><AnswerChoice answerId="4" correctAnswer="false">$600 - $699</AnswerChoice><AnswerChoice answerId="5" correctAnswer="true">NONE OF THE ABOVE</AnswerChoice></Question></InteractiveQuery></InitialResponse>';
        $xml = simplexml_load_string($xml);
        print_r($xml->InteractiveQuery->Question->attributes()->interactiveQueryId);
        print_r($xml->InteractiveQuery[0]->Question->AnswerChoice[1]->attributes()->correctAnswer);
        print_r($xml->InteractiveQuery[0]->Question->AnswerChoice[2]->attributes()->correctAnswer);
        print_r($xml->InteractiveQuery[0]->Question->AnswerChoice[3]->attributes()->correctAnswer);
        print_r($xml->InteractiveQuery[0]->Question->AnswerChoice[4]->attributes()->correctAnswer);
        print_r($xml->InteractiveQuery[0]->Question->AnswerChoice[5]->attributes()->correctAnswer);



//        print_r($xml->InteractiveQuery->Question->attributes()->interactiveQueryId);
        print_r($xml->InteractiveQuery[1]->Question->AnswerChoice[1]->attributes()->correctAnswer);
        print_r($xml->InteractiveQuery[1]->Question->AnswerChoice[2]->attributes()->correctAnswer);
        print_r($xml->InteractiveQuery[1]->Question->AnswerChoice[3]->attributes()->correctAnswer);
        print_r($xml->InteractiveQuery[1]->Question->AnswerChoice[4]->attributes()->correctAnswer);
        print_r($xml->InteractiveQuery[1]->Question->AnswerChoice[5]->attributes()->correctAnswer);



        // user $parser to get your data out of XML response and to display it.
        dd($parser->InitialResponse->InteractiveQuery);


//        $data['page_title'] = "User Api";
//        $data['main_view'] = "user/payment/user_api";
//        $this->load->view('user/layout', $data);
    }

    public function user_api_aqq(){
        echo "<soap:Envelope xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">
    <soap:Body>
        <InitialResponse xmlns=\"http://eid.equifax.com/soap/schema/canada/v2\" transactionKey=\"0000000006144000000370002\">
            <InteractiveQuery interactiveQueryId=\"1\">
                <Question questionId=\"1\">
                    <QuestionText>Which of the following is currently or has been in the past one of your phone numbers?</QuestionText>
                    <AnswerChoice answerId=\"1\" correctAnswer=\"false\">7786566122</AnswerChoice>
                    <AnswerChoice answerId=\"2\" correctAnswer=\"false\">7789746379</AnswerChoice>
                    <AnswerChoice answerId=\"3\" correctAnswer=\"false\">7789850342</AnswerChoice>
                    <AnswerChoice answerId=\"4\" correctAnswer=\"false\">7789876699</AnswerChoice>
                    <AnswerChoice answerId=\"5\" correctAnswer=\"true\">NONE OF THE ABOVE</AnswerChoice>
                </Question>
                <Question questionId=\"2\">
                    <QuestionText>Which of the following is your age today?</QuestionText>
                    <AnswerChoice answerId=\"1\" correctAnswer=\"false\">29 years</AnswerChoice>
                    <AnswerChoice answerId=\"2\" correctAnswer=\"false\">30 years</AnswerChoice>
                    <AnswerChoice answerId=\"3\" correctAnswer=\"false\">31 years</AnswerChoice>
                    <AnswerChoice answerId=\"4\" correctAnswer=\"true\">32 years</AnswerChoice>
                    <AnswerChoice answerId=\"5\" correctAnswer=\"false\">NONE OF THE ABOVE</AnswerChoice>
                </Question>
                <Question questionId=\"3\">
                    <QuestionText>Your credit file indicates you may have an auto loan/lease which was opened approximately August 2018. Please choose the credit provider for this account from the following options.</QuestionText>
                    <AnswerChoice answerId=\"1\" correctAnswer=\"false\">CIBC </AnswerChoice>
                    <AnswerChoice answerId=\"2\" correctAnswer=\"false\">ING BANK</AnswerChoice>
                    <AnswerChoice answerId=\"3\" correctAnswer=\"false\">LAND ROVER FIN SERV</AnswerChoice>
                    <AnswerChoice answerId=\"4\" correctAnswer=\"false\">NISSAN CREDIT </AnswerChoice>
                    <AnswerChoice answerId=\"5\" correctAnswer=\"true\">NONE OF THE ABOVE</AnswerChoice>
                </Question>
                <Question questionId=\"4\">
                    <QuestionText>Please choose the range within which your monthly payment falls for the previously referenced account.</QuestionText>
                    <AnswerChoice answerId=\"1\" correctAnswer=\"false\">$425 - $474</AnswerChoice>
                    <AnswerChoice answerId=\"2\" correctAnswer=\"false\">$475 - $524</AnswerChoice>
                    <AnswerChoice answerId=\"3\" correctAnswer=\"false\">$525 - $574</AnswerChoice>
                    <AnswerChoice answerId=\"4\" correctAnswer=\"false\">$575 - $624</AnswerChoice>
                    <AnswerChoice answerId=\"5\" correctAnswer=\"true\">NONE OF THE ABOVE</AnswerChoice>
                </Question>
            </InteractiveQuery>
        </InitialResponse>
    </soap:Body>
</soap:Envelope>";
    }





    public function all_receipt(){
        $data['page_title'] = "All Receipts details";
        $data['main_view'] = "user/all_receipts";
        $this->load->view('user/layout', $data);
    }


    public function invoice(){
        $data['page_title'] = "All Invoice";
        $data['main_view'] = "user/invoice";
        $this->load->view('user/layout', $data);
    }


    public function download_invoice() {
        $this->load->library('pdfgenerator');
        $data['page_title'] = "Download Invoice";
//        $data['application_id'] = $application_id;
//        $data['application'] = $this->reception_model->get_digital_fingerprinting_application_details($application_id);
//        $data['services'] = $this->reception_model->get_digital_fingerprinting_application_services($application_id);
//        $data['options'] = $this->reception_model->get_digital_fingerprinting_application_options($application_id);
        $html = $this->load->view('user/download_invoice', $data, true);
        $filename = 'Download Invoice';
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }




}
?>