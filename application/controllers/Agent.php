<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        $public = array(
            'agent/index',
            'agent/signin',
            'agent/upload_profile_img',
            'agent/forgot_password',
            'agent/forgot_password_send',
            'agent/reset_password',
            'agent/reset_password_save',
            'agent/forward_Record_Suspension_application_to_user',
            'agent/add_application_certificate_save',
            'agent/add_application_status_save',
            'agent/add_application_conversation_save',
        );
        $private = array(
            'agent/upload_profile_img',
            'agent/dashboard',
            'agent/logout',
            'agent/account',
            'agent/app_name_based_check_form',
            'agent/message',
            'agent/digital_fingerprint_form',
            'agent/app_record_suspension',
            'agent/app_us_entry_waiver_form',
            'agent/messages_alert',
            'agent/account_save',
            'agent/add_application_conversation_save',
            'agent/edit_agent_profile',
            'agent/edit_agent_profile_save',
            'agent/dashboard_pre',
            'agent/searchUserById',
            'agent/save_name_based_check_drawable_signature',
            'agent/multiple_file_upload',


        );
        $this->load->model('agent_model');
        $this->load->helper('string');
        $current_url = $this->router->fetch_class() . '/' . $this->router->fetch_method();
        if ($this->session->userdata('agent_logged_in')) {
            if ((in_array($current_url, $public))) {
                redirect('agent/dashboard_pre');
            }
        } elseif (!$this->session->userdata('agent_logged_in') && !in_array($current_url, $public)) {
            redirect('agent');
        }
    }

    public function index() {
        $data["page_title"] = "ePolice Agent";
        $this->load->view('agent/login', $data);
    }

    public function signin() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if (!$this->form_validation->run()) {
            $data["page_title"] = "ePolice Potal";
            $this->load->view('agent', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->load->model('agent_model');
            if ($agent = $this->agent_model->login_agent($email, $password)) {
                if($agent->status == "off"){

                    $htmlContent = '<h1>ePolice Unblock Request</h1>';
                    $htmlContent .= '<p>Contact on the Below email to .</p>';
                    $htmlContent .= '<p><a href="info@gacportal.com">info@gacportal.com</a></p>';

                    $this->email->to($this->input->post('email'));
                    $this->email->from(EMAIL_FROM_SMTP, 'ePolice');
                    $this->email->subject('ePolice unblock Request');
                    $this->email->message($htmlContent);
                    $this->email->send();
//                    $this->session->set_tempdata('signup_success', 'Reset password link has been sent. Check your inbox.',3);
//                    redirect('agent/forgot-password');
                    echo "Your're block by the Admin, please contact to admin for more details.";
                }
                else {
                    $agentdata = array(
                        'agent_id' => $agent->id,
                        'name' => $agent->first_name . ' ' . $agent->last_name,
                        'agent_profile_image' => $agent->profile_image,

//                        session save for four services
                        'agent_namebase_check' => $agent->name_based_check,
                        'agent_digital_fingerprinting' => $agent->digital_fingerprinting,
                        'agent_record_suspension' => $agent->record_suspension,
                        'agent_us_entry_waiver' => $agent->us_entry_waiver,
                        'agent_canada_immigration' => $agent->canada_immigration,

                        'agent_logged_in' => true
                    );
                    $this->session->set_userdata($agentdata);
                    redirect('agent/dashboard_pre');
                }
            } else {
                $this->session->set_tempdata('no_user_access', 'Invalid Email / Password.',3);
                redirect('agent');
            }
        }
    }

    public function logout() {

        $this->session->unset_userdata($this->session->userdata('agent_id'));
        $this->session->unset_userdata($this->session->userdata('name'));
        $this->session->unset_userdata($this->session->userdata('agent_profile_image'));
        $this->session->unset_userdata($this->session->userdata('agent_namebase_check'));
        $this->session->unset_userdata($this->session->userdata('agent_digital_fingerprinting'));
        $this->session->unset_userdata($this->session->userdata('agent_record_suspension'));
        $this->session->unset_userdata($this->session->userdata('agent_us_entry_waiver'));
        $this->session->unset_userdata($this->session->userdata('agent_canada_immigration'));
        $userdata = array(
            'agent_logged_in' => false
        );
        $this->session->set_userdata($userdata);
        redirect('agent');
    }

    public function forgot_password() {
        $data["page_title"] = "ePolic agent password reset";
        $data['main_view'] = "agent/forgot_password_view";
        $this->load->view('agent/forgot_password_view', $data);
    }

    public function forgot_password_send() {
        $email = $this->input->post('email');
        $this->load->model('agent_model');
        if ($secret = $this->agent_model->user_forgot_password($email)) {
            $htmlContent = '<h1>ePolice Reset Password Request</h1>';
            $htmlContent .= '<p>Click on the link below to reset your password.</p>';
            $htmlContent .= '<p><a href="' . base_url('user') . '/reset-password/' . $secret . '">Reset Password</a></p>';

            $this->email->to($this->input->post('email'));
            $this->email->from(EMAIL_FROM_SMTP, 'ePolice');
            $this->email->subject('ePolice Reset Password Request');
            $this->email->message($htmlContent);
            $this->email->send();
            $this->session->set_tempdata('signup_success', 'Reset password link has been sent. Check your inbox.',3);
            redirect('agent/forgot-password');
        } else {
            $this->session->set_tempdata('no_user_access', 'Invalid Email! Please try again.',3);
            redirect('agent/forgot-password');
        }
    }

    public function reset_password($code) {
        $data['is_code_valid'] = $this->agent_model->user_check_secret_code($code);
        $data['secret_code'] = $code;
        $data["page_title"] = "SGIC - Admin agent";
        $data['main_view'] = "agent/reset_password_view";
        $this->load->view('agent/reset_password_view', $data);
    }

    public function reset_password_save() {
        $code = $this->input->post('secret_code');
        $data['is_code_valid'] = $this->agent_model->user_check_secret_code($code);
        $data['secret_code'] = $code;
        if (!$data['is_code_valid']) {
            redirect('agent/reset-password/' . $code);
        }
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]');
        if (!$this->form_validation->run()) {
            $data['secret_code'] = $code;
            $data["page_title"] = "SGIC - Employee agent";
            $data['main_view'] = "agent/reset_password_view";
            $this->load->view('agent/reset_password_view', $data);
        } else {
            if ($this->agent_model->user_reset_password($code)) {
                $this->session->set_tempdata('signup_success', 'Password changed successfully!',3);
                redirect('agent');
            } else {
                $this->session->set_tempdata('no_user_access', 'Something went wrong! Please try again.',3);
                redirect('agent/reset-password/' . $code);
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
        $data['main_view'] = "agent/account";
        $data['account'] = $this->db->where('id', $this->session->userdata('agent_id'))->get('agents')->row();
        $this->load->view('agent/layout', $data);
    }

    public function account_save() {
        $data['page_title'] = "Account Settings";
        $data['main_view'] = "agent/account";
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
            $data['account'] = $this->db->where('id', $this->session->userdata('agent_id'))->get('agents')->row();
            $this->load->view('agent/layout', $data);
        } else {
            if ($this->agent_model->user_account_update($is_password)) {
                $this->session->set_tempdata('success_message', 'Account updated successfully!',3);
                redirect('agent/account');
            } else {
                $data['account'] = $this->db->where('id', $this->session->userdata('agent_id'))->get('agents')->row();
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                $this->load->view('agent/layout', $data);
            }
        }
    }

    public function current_password_check($current_password) {
        if (!$this->agent_model->match_current_password($current_password)) {
            $this->form_validation->set_message('current_password_check', 'Current password doesn\'t not match');
            return FALSE;
        }
        return TRUE;
    }

    public function dashboard() {
        $data['page_title'] = "My Application";
        $data['main_view'] = "agent/dashboard";
        $data['total_countries'] = $this->db->count_all_results('countries');
        $data['total_states'] = $this->db->count_all_results('states');
        $data['total_cities'] = $this->db->count_all_results('cities');
        $data['total_office_desk'] = $this->db->count_all_results('office_desk');
        $data['total_roles'] = $this->db->count_all_results('user_roles');

        $agent_id = $this->session->userdata('agent_id');
        $data['agent_id'] = $agent_id;
        // $data['get_namebase'] = $this->db->query("SELECT * FROM name_based_applications WHERE agent_id = '$agent_id' && application_completed = 1" )->result();
        $data['get_namebase'] = $this->db->query("SELECT * FROM name_based_applications WHERE agent_id = '$agent_id' " )->result();
        $data['fingerprinting'] = $this->db->query("SELECT * FROM digital_fingerprinting_applications WHERE agent_id = '$agent_id'")->result();
        $data['recordSuspension'] = $this->db->query("SELECT * FROM record_suspension_applications WHERE agent_id = '$agent_id' ")->result();
        $data['usEntry'] = $this->db->query("SELECT * FROM us_entry_waiver_applications WHERE agent_id = '$agent_id' ")->result();


        $this->load->view('agent/layout', $data);
    }

//    public function dashboard_pre() {
//        $data['page_title'] = "Dashboard";
//        $data['main_view'] = "agent/dashboard_pre";
//        $this->load->view('agent/layout', $data);
//    }

    public function error404() {
        $this->load->view('404');
    }

//    public function agent_app() {
//        $data["page_title"] = "ePolice Portal";
//        $this->load->view('agent/site/index_page', $data);
//    }

//    public function app_services() {
//        $data["page_title"] = "ePolice Services";
////        $data["page_title"] = "Name Based Check " . strtoupper($country);
//        $data['service'] = $this->db->where('service_slug', 'name-based-check')->get('services')->row();
//        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
//        $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
//        $data["states"] = $this->agent_model->get_states('Canada');
//        $this->load->view('agent/site/services', $data);
//    }

//    public function app_criminal_record_check() {
//        $data["page_title"] = "Criminal Record Check";
//        $data['main_view'] = "agent/site/criminal_record_check";
//        $this->load->view('agent/site/layout', $data);
//    }

//    public function app_name_based_check() {
//        $data["page_title"] = "Name Based Check";
//        $data['main_view'] = "agent/site/name_based_check";
//        $this->load->view('agent/site/layout', $data);
//    }


//    1st form of namebased application
    public function app_name_based_check_form() {
        $data["page_title"] = "Name Based Check " . strtoupper($country);
        $data['service'] = $this->db->where('service_slug', 'name-based-check')->get('services')->row();
        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
        $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
        $data["states"] = $this->agent_model->get_states('Canada');
        $data['country'] = $country;
//        $data['main_view'] = "agent/site/name_based_check_form";
//        $this->load->view('agent/site/name_based_check_form', $data);
        $this->load->view('agent/site/name_based_check_form', $data);
    }

//    2nd form of namebased application
    public function app_name_based_check_consent() {
        $data["page_title"] = "Consent Form - Name Based Criminal Record Check";
        $data["application_id"] = $this->uri->segment('3');
//        $data["client_id"] = $client_id;

        // $data["states"] = $this->agent_model->get_states('Canada');
        $this->load->view('agent/site/name_based_check_consent', $data);
    }

    //    save namebased application
    public function app_name_based_check_form_save() {
        if ($application_id = $this->agent_model->name_based_check_form_save()) {
            redirect('agent/app_name_based_check_consent'. '/' . $application_id);
        }
        redirect('app_name_based_check_form');
    }

//    Save the record step form first
    public function app_name_based_check_consent_save() {
        if ($this->agent_model->name_based_check_consent_save()) {
            $this->session->set_tempdata('success_message', 'Application Added Successfully.',3);
            redirect('agent/name_based_check_applications');
        }
        else{
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            redirect('agent/name_based_check_applications');
        }
        // $signature = $this->input->post('signature');
//        var_dump($signature); die();
        // $signatureFileName = uniqid().'.png';
        // $signature = str_replace('data:image/png;base64,', '', $signature);

        // $signature = str_replace(' ', '+', $signature);
        // $data = base64_decode($signature);
        // $file = './upload/applicant_signatures/'.$signatureFileName;
        // file_put_contents($file, $data);

//        var_dump($signature); die();

//        $application_id = $this->input->post('application_id');
//        if (!$this->agent_model->save_drawable_signature($signatureFileName, $application_id)) {
////            echo "not ok"; die();
//            redirect('agent/application/name-based-check/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
//        } else {
////            echo "ok"; die();
//            redirect('agent/application/name-based-check/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
//        }


        // $data["page_title"] = "Consent Form - Name Based Criminal Record Check";

        // if (!$this->agent_model->name_based_check_consent_save($signatureFileName)) {
//            echo "hi"; die();
//            redirect('agent/application/name-based-check/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
//            redirect('agent/application/name-based-check/witness' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        //     redirect('agent/application/name-based-check/witness/' . 12 . '/' . 21);
        // } else {
//            echo "No"; die();
//            redirect('agent/application/name-based-check/signature/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
//            redirect('agent/application/name-based-check/witness' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
            // redirect('agent/application/name-based-check/witness/' . 12 . '/' . 21);
        // }
    }





    public function app_name_based_check_witness($client_id, $application_id) {
        $data["page_title"] = "Witness Form - Name Based Criminal Record Check";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;

        $this->load->view('agent/site/name_based_witness', $data);
    }




    public function save_name_based_check_drawable_signature(){
        $signature = $_POST['signature'];
        $signatureFileName = uniqid().'.png';
        $signature = str_replace('data:image/png;base64,', '', $signature);
        $signature = str_replace(' ', '+', $signature);
        $data = base64_decode($signature);
        $file = './upload/applicant_signatures/'.$signatureFileName;
        file_put_contents($file, $data);

        $application_id = $this->input->post('application_id');
        if (!$this->agent_model->save_drawable_signature($signatureFileName, $application_id)) {
//            echo "not ok"; die();
            redirect('agent/application/name-based-check/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
//            echo "ok"; die();
            redirect('agent/application/name-based-check/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }



    public function save_name_based_check_picture_signature(){
        $extension = pathinfo($_FILES['consent_signature_picture']['name'], PATHINFO_EXTENSION);
        $unique_no = uniqid(rand()) . time();
        $filename = $unique_no . '.' . $extension;
        $target_path = "./upload/applicant_signatures/";
        if (!is_dir($target_path)) {
            mkdir($target_path);
        }
        $config = array();
        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] = $filename;
        $config['upload_path'] = $target_path;

//        $signature = $this->input->post('consent_signature');
        $application_id = $this->input->post('application_id');

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('consent_signature_picture')) {
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
            redirect('agent/name_based_check_applications');
        }
        if (!$this->agent_model->save_signature_image($filename, $application_id)) {
            redirect('name-based-check/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('name-based-check/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }


    public function digital_fingerprint_form(){
        $data["page_title"] = "Digital Finger Printing Form";
        $data['options'] = $this->db->order_by('created_at', 'ASC')->get('digital_fingerprinting_options')->result();
        //$data['states'] = $this->agent_model->get_all_states();
        $this->load->view('agent/site/digital_fingerprinting_form', $data);
    }


    public function app_name_based_check_success() {
        $application_id = 2212;
        $client_id = 14856;
        $data["page_title"] = "Success - Name Based Criminal Record Check";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
//        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
//            redirect('agent/application/name-based-check/consent/' . $client_id . '/' . $application_id);
//        }
        $data['main_view'] = "agent/site/name_based_check_success";
        $this->load->view('agent/layout', $data);
    }


//    end of 1st application Namebased
//    end of 1st application Namebased


    public function app_digital_fingerprinting() {
        $data["page_title"] = "Digital Fingerprinting";
        $data['main_view'] = "agent/site/digital_fingerprinting";
        $this->load->view('agent/site/layout', $data);
    }

    public function app_digital_fingerprinting_form($country) {
        $data["page_title"] = "Digital Fingerprinting " . strtoupper($country);
        if ($this->input->post('fingerprint_options') == 'done') {
            if ($this->input->post('fingerprint_location') == 'done') {
                $data['service'] = $this->db->where('service_slug', 'digital-fingerprinting')->get('services')->row();
                $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
                $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
                $data["states"] = $this->agent_model->get_states('Canada');
                $data['country'] = $country;
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
            $data['main_view'] = "agent/site/digital_fingerprinting_options";
            $this->load->view('agent/site/layout', $data);
        }
    }

    // public function app_digital_fingerprinting_form_save() {
    //     if ($application_id = $this->agent_model->digital_fingerprinting_form_save()) {
    //         redirect('agent/application/digital-fingerprinting/consent/' . $this->agent_model->get_digital_fingerprinting_application_details($application_id)->client_id . '/' . $application_id);
    //     }
    //     redirect('agent/application/digital-fingerprinting/' . $this->input->post('country'));
    // }

    
    public function app_digital_fingerprinting_form_save() {
        if (!$application_id = $this->agent_model->digital_fingerprinting_form_save()) {
            $this->session->set_tempdata('success_message', ' Digital Fingerprinting Application Added Successfully.',3);
            redirect('agent/digital_fingerprinting_applications');
        }
        else {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('agent/digital_fingerprinting_applications');
        }
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

    // public function app_record_suspension() {
    //     $data["page_title"] = "Record Suspension";
    //     $data['main_view'] = "agent/site/record_suspension";
    //     $this->load->view('agent/site/layout', $data);
    // }

    // public function app_record_suspension_form() {
    //     $data["page_title"] = "Record Suspension " ;
    //     // $data['service'] = $this->db->where('service_slug', 'record-suspension')->get('services')->row();
    //     // $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
    //     // $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
    //      $data["states"] = $this->agent_model->get_states('Canada');
    //     // $data['country'] = $country;
    //     $data['main_view'] = "agent/site/record_suspension_form";
    //     $this->load->view('agent/site/layout', $data);
    // }

    // public function app_record_suspension_form_save() {
    //     if ($application_id = $this->agent_model->record_suspension_form_save()) {
    //         redirect('agent/application/record-suspension/consent/' . $this->agent_model->get_record_suspension_application_details($application_id)->client_id . '/' . $application_id);
    //     }
    //     redirect('agent/application/record-suspension/' . $this->input->post('country'));
    // }
 
    public function app_record_suspension() {
        $data["page_title"] = "Record Suspension Form";
//        $data["application_id"] = $application_id;
//        $data["client_id"] = $client_id;
        $this->load->view('agent/site/record_suspension_consent', $data);
    }

    public function app_record_suspension_consent_save() {

//        echo "hi"; die();
//        $error = $this->reception_model->record_suspension_consent_save();
//        var_dump($error);
//        die();


        if (!$this->agent_model->record_suspension_consent_save()) {
            $this->session->set_tempdata('success_message', 'Record Suspension Application Added Successfully.',3);
            redirect('agent/record_suspension_applications');
        } else {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('agent/record_suspension_applications');
        }
    }


    public function app_record_suspension_payment($client_id, $application_id) {
//        redirect('agent/application/record-suspension/consent/' . $client_id . '/' . $application_id);
        $data["page_title"] = "Record Suspension Payment";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('client_id', $client_id)->where('record_suspension_id', $application_id)->get('record_suspension_applications')->num_rows()) {
            redirect();
        }
        $data["grand_total"] = $this->agent_model->get_record_suspension_application_details($application_id)->grand_total;
        $data['main_view'] = "agent/site/record_suspension_payment";
        $this->load->view('agent/site/layout', $data);
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
        $data['main_view'] = "agent/site/record_suspension_consent";
        $this->load->view('agent/site/layout', $data);
    }

    // public function app_record_suspension_consent_save() {
    //     if (!$this->agent_model->record_suspension_consent_save()) {
    //         redirect('agent/application/record-suspension/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
    //     } else {
    //         redirect('agent/application/record-suspension/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
    //     }
    // }

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

    public function app_us_entry_waiver_form() {
        $data["page_title"] = "US Entry Waiver ";
        // $data['service'] = $this->db->where('service_slug', 'us-entry-waiver')->get('services')->row();
        // $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
        $data["states"] = $this->agent_model->get_states('Canada');
        // $data['country'] = $country;
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

    public function name_based_check_applications() {
        $data['page_title'] = "Name Based Check Applications";
        $result = $this->agent_model->get_name_based_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'agent/security-screening/name-based-check']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        $whereNew = array('application_status' => 'New', 'agent_id' => $this->session->userdata('agent_id'));
        $whereProcess = array('application_status' => 'Under Processing', 'agent_id' => $this->session->userdata('agent_id'));
        $wherePending = array('application_status' => 'Pending Documents', 'agent_id' => $this->session->userdata('agent_id'));
        $whereComplete = array('application_status' => 'Completed', 'agent_id' => $this->session->userdata('agent_id'));
        $whereNotApplied = array('application_status' => 'Not Applied', 'agent_id' => $this->session->userdata('agent_id'));

        $data['namebasedTotalNew'] = $this->agent_model->get_total_record('name_based_applications', $whereNew);
        $data['namebasedTotalUnderProcess'] = $this->agent_model->get_total_record('name_based_applications', $whereProcess);
        $data['namebasedTotalPendingDocuments'] = $this->agent_model->get_total_record('name_based_applications', $wherePending);
        $data['namebasedTotalCompelted'] = $this->agent_model->get_total_record('name_based_applications', $whereComplete);
        $data['namebasedTotalNotApplied'] = $this->agent_model->get_total_record('name_based_applications', $whereNotApplied);
        
        $data['main_view'] = "agent/name_based_check_applications";
        $this->load->view('agent/layout', $data);
    }

    public function name_based_check_application_details($application_id) {
        $data['page_title'] = "Name Based Check Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->agent_model->get_name_based_application_details($application_id);
        $data['services'] = $this->agent_model->get_name_based_application_services($application_id);
        $data['offences'] = $this->agent_model->get_name_based_application_offences($application_id);
        $data['main_view'] = "agent/name_based_check_application_details";
        $this->load->view('agent/layout', $data);
    }

    public function digital_fingerprinting_applications() {
        $data['page_title'] = "Digital Fingerprinting Applications";
        $result = $this->agent_model->get_digital_fingerprinting_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'agent/security-screening/digital-fingerprinting']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        $whereNew = array('application_status' => 'New', 'agent_id' => $this->session->userdata('agent_id'));
        $whereProcess = array('application_status' => 'Under Processing', 'agent_id' => $this->session->userdata('agent_id'));
        $wherePending = array('application_status' => 'Pending Documents', 'agent_id' => $this->session->userdata('agent_id'));
        $whereComplete = array('application_status' => 'Completed', 'agent_id' => $this->session->userdata('agent_id'));
        $whereNotApplied = array('application_status' => 'Not Applied', 'agent_id' => $this->session->userdata('agent_id'));

        $data['fingerprintingTotalNew'] = $this->agent_model->get_total_record('digital_fingerprinting_applications', $whereNew);
        $data['fingerprintingTotalUnderProcess'] = $this->agent_model->get_total_record('digital_fingerprinting_applications', $whereProcess);
        $data['fingerprintingTotalPendingDocuments'] = $this->agent_model->get_total_record('digital_fingerprinting_applications', $wherePending);
        $data['fingerprintingTotalCompelted'] = $this->agent_model->get_total_record('digital_fingerprinting_applications', $whereComplete);
        $data['fingerprintingTotalNotApplied'] = $this->agent_model->get_total_record('digital_fingerprinting_applications', $whereNotApplied);
        
        $data['main_view'] = "agent/digital_fingerprinting_applications";
        $this->load->view('agent/layout', $data);
    }

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
        $result = $this->agent_model->get_record_suspension_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'agent/security-screening/record-suspension']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        $whereNew = array('application_status' => 'New', 'agent_id' => $this->session->userdata('agent_id'));
        $whereProcess = array('application_status' => 'Under Processing', 'agent_id' => $this->session->userdata('agent_id'));
        $wherePending = array('application_status' => 'Pending Documents', 'agent_id' => $this->session->userdata('agent_id'));
        $whereComplete = array('application_status' => 'Completed', 'agent_id' => $this->session->userdata('agent_id'));
        $whereNotApplied = array('application_status' => 'Not Applied', 'agent_id' => $this->session->userdata('agent_id'));

        $data['recordsuspensionTotalNew'] = $this->agent_model->get_total_record('record_suspension_applications', $whereNew);
        $data['recordsuspensionTotalUnderProcess'] = $this->agent_model->get_total_record('record_suspension_applications', $whereProcess);
        $data['recordsuspensionTotalPendingDocuments'] = $this->agent_model->get_total_record('record_suspension_applications', $wherePending);
        $data['recordsuspensionTotalCompelted'] = $this->agent_model->get_total_record('record_suspension_applications', $whereComplete);
        $data['recordsuspensionTotalNotApplied'] = $this->agent_model->get_total_record('record_suspension_applications', $whereNotApplied);
                
        $data['main_view'] = "agent/record_suspension_applications";
        $this->load->view('agent/layout', $data);
    }

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
        $result = $this->agent_model->get_us_entry_waiver_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'agent/security-screening/us-entry-waiver']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        $whereNew = array('application_status' => 'New', 'agent_id' => $this->session->userdata('agent_id'));
        $whereProcess = array('application_status' => 'Under Processing', 'agent_id' => $this->session->userdata('agent_id'));
        $wherePending = array('application_status' => 'Pending Documents', 'agent_id' => $this->session->userdata('agent_id'));
        $whereComplete = array('application_status' => 'Completed', 'agent_id' => $this->session->userdata('agent_id'));
        $whereNotApplied = array('application_status' => 'Not Applied', 'agent_id' => $this->session->userdata('agent_id'));

        $data['usentryTotalNew'] = $this->agent_model->get_total_record('us_entry_waiver_applications', $whereNew);
        $data['usentryTotalUnderProcess'] = $this->agent_model->get_total_record('us_entry_waiver_applications', $whereProcess);
        $data['usentryTotalPendingDocuments'] = $this->agent_model->get_total_record('us_entry_waiver_applications', $wherePending);
        $data['usentryTotalCompelted'] = $this->agent_model->get_total_record('us_entry_waiver_applications', $whereComplete);
        $data['usentryTotalNotApplied'] = $this->agent_model->get_total_record('us_entry_waiver_applications', $whereNotApplied);


        $data['main_view'] = "agent/us_entry_waiver_applications";
        $this->load->view('agent/layout', $data);
    }

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

    public function forward_Record_Suspension_application_to_user(){
        $data = array(
            "user_role_id" => $this->input->post('state_id'),
            "user_id" => $this->input->post('city_id'),
            "application_id" => $this->input->post('record_suspension_id'),
            "application_type" => "Record Suspension Applications"
        );
        $save_data = $this->agent_model->forward_application_to_user($data);

        if ($save_data) {
            $this->session->set_tempdata('success_message', 'Application forwarded successfully.',3);
            redirect('portal/security-screening/record-suspension');
        } else {
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            redirect('portal/security-screening/record-suspension');
        }
    }

//    update application certificate
    public function add_application_certificate_save() {
        $extension = pathinfo($_FILES['office_desk_file']['name'], PATHINFO_EXTENSION);
        $unique_no = uniqid(rand()) . time();
        $filename = $unique_no . '.' . $extension;
        $target_path = "./upload/user_certificates/";

        if (!is_dir($target_path)) {
            mkdir($target_path);
        }
        $config = array();
        $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
        $config['max_size'] = 12000;
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] = $filename;
        $config['upload_path'] = $target_path;
        $this->upload->initialize($config);
        $id = $this->input->post('application_id');

        if (!$this->upload->do_upload('office_desk_file')) {
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
            redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#comments');
        }

        if ($this->agent_model->update_record_suspension_applications($filename, $id)) {

//            notification entry
//            $tableName = "name_based_applications";
//            $id = $this->input->post('name_based_application_id');
//            $details = "Name based application's Certificate updated";
//            $data = array(
//                'table_id' => $id,
//                'table_name' => $tableName,
//                'description' => $details
//            );
//            $submitResult = $this->portal_model->save_notification($data);
            //            end notification entry

            $this->session->set_tempdata('success_message', 'Document is added successfully.',3);
        } else {
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
        }
        redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#comments');
    }


    //    update the status of detail record_suspension_applications that applicaiton is new underProcess or complete
    public function add_application_status_save(){
        $this->agent_model->add_application_status_save();
        redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#status');
    }

    public function message(){
        $data['page_title'] = "Message";
        $data['main_view'] = "agent/message";
        $data['account'] = $this->db->where('id', $this->session->userdata('agent_id'))->get('agents')->row();
        $data['comments'] = $this->db->where('created_by', $this->session->userdata('agent_id'))->order_by('created_at', 'DESC')->get('communication_gac_agent')->result();
        $this->load->view('agent/layout', $data);
    }


    public function add_application_conversation_save() {
        $this->portal_model->add_application_conversation_save();
        redirect('agent/message');
    }

    public function edit_agent_profile(){
        $data['page_title'] = "My Profile";
        $data['main_view'] = "agent/edit_agent_profile";
        $data['edit_agent_data'] = $this->db->where('id', $this->session->userdata('agent_id'))->get('users')->row_array();
        $this->load->view('agent/layout', $data);
    }

    public function edit_agent_profile_save(){
        $extension = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
        $unique_no = uniqid(rand()) . time();
        $filename = $unique_no . '.' . $extension;
        $target_path = "./upload/users_profile_images/";

        if (!is_dir($target_path)) {
            mkdir($target_path);
        }
        $config = array();
        $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
        $config['max_size'] = 12000;
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] = $filename;
        $config['upload_path'] = $target_path;
        $this->upload->initialize($config);
        $this->upload->do_upload('profile_picture');

        if ($this->agent_model->agent_edit_profile_save($filename)) {
            $this->session->set_tempdata('success_message', 'Agent updated successfully.',3);
            redirect('/agent/edit_agent_profile');
        } else {
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            $this->edit_agent_profile();
        }
    }

    public function add_agent_sub_employee(){
        $data['page_title'] = "Add Users";
        $data['main_view'] = "agent/add_sub_agent";
//        $data["states"] = $this->agent_model->get_states('Canada');
        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();
        $data['sub_corporate_users'] = $this->db->where('super_agent_employee_id', $this->session->userdata('agent_id'))->get('users')->result();
        $this->load->view('agent/layout', $data);
    }

    public function fetch_state()
    {
        if($this->input->post('country_id'))
        {
            echo $this->agent_model->fetch_state($this->input->post('country_id'));
        }
    }

    function fetch_city()
    {
        if($this->input->post('state_id'))
        {
            echo $this->agent_model->fetch_city($this->input->post('state_id'));
        }
    }

    public function save_agent_sub_employee(){
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Email', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('state_id', 'State', 'trim|required');


        $extension = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
        $unique_no = uniqid(rand()) . time();
        $filename = $unique_no . '.' . $extension;
        $target_path = "./upload/users_profile_images/";

        if (!is_dir($target_path)) {
            mkdir($target_path);
        }
        $config = array();
        $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
        $config['max_size'] = 12000;
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] = $filename;
        $config['upload_path'] = $target_path;
        $this->upload->initialize($config);
        $this->upload->do_upload('profile_picture');

        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('agent/add_agent_sub_employee');
        } else {
            if ($this->agent_model->save_agent_sub_employee($filename)) {
                $this->session->set_tempdata('success_message', 'Sub Agent Added successfully.',3);
                redirect('agent/add_agent_sub_employee');
            } else {
                $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
                redirect('agent/add_agent_sub_employee');
            }
        }
    }

    public function service_order(){
        $data['page_title'] = "Service Order";
        $data['main_view'] = "agent/service_order";


        $data['service_orders'] = $this->db->where('created_by', $this->session->userdata('agent_id'))->get('service_order_images')->result();

        $this->load->view('agent/layout', $data);
    }


    public function multiple_file_upload(){
        $data = array();
        $errorUploadType = $statusMsg = '';
        // If file upload form submitted

        if($this->input->post('fileSubmit')){
//            echo "hi"; die();
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
                        $uploadData[$i]['created_by'] = $this->session->userdata('agent_id');
                        $uploadData[$i]['submitted_to'] = $this->input->post('submitted_to');
                    }else{
                        $errorUploadType .= $_FILES['file']['name'].' | ';
                    }
                }
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):'';
                if(!empty($uploadData)){
                    // Insert files data into the database
                    $insert = $this->agent_model->multiple_file_upload($uploadData);
                    redirect('agent/service_order');

                    // Upload status message
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
                }
            }else{
                $statusMsg = 'Please select image files to upload.';
            }
        }
        else{
            redirect('agent/service_order');
        }
    }



//    serach user/ id varification
    public function searchUserById(){
        $data['page_title'] = "Id Verification";
        $data['main_view'] = "agent/searchById";
        $this->load->view('agent/layout', $data);
    }

    public function find_user(){
        $id = $this->input->post('userId');
        $result = $this->agent_model->find_user($id);

        if($result){
            $this->user_varification($id);
        }
        else{
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
            redirect('agent/searchUserById');
        }
    }

    public function user_varification($id){
        $data['page_title'] = "ID Veficication";
        $data['application_data'] = $this->agent_model->get_single_name_based_check_application_details_by_id($id);

//        var_dump($data['application_data']); die();

        $this->load->view('agent/name_based_check_consent', $data);
    }


    public function name_based_check_update_id_verification() {
        $data["page_title"] = "Wtiness Section";

        if (!$this->agent_model->name_based_check_consent_save()) {
//            echo "hi"; die();
//            redirect('agent/application/name-based-check/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
//            redirect('agent/application/name-based-check/witness' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
            redirect('agent/application/name-based-check/witness/' . 12 . '/' . 21);
        } else {
//            echo "No"; die();
//            redirect('agent/application/name-based-check/signature/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
//            redirect('agent/application/name-based-check/witness' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
            redirect('agent/application/name-based-check/witness/' . 12 . '/' . 21);
        }
    }





    public function agent_invoices(){
        $data['page_title'] = "Invoices";
        $data['main_view'] = "agent/agent_invoices";
//        $result = $this->corporate_model->get_service_order_applications();
//        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'corporate/service_order']);
        $this->load->view('agent/layout', $data);
    }

    public function agent_invoice_detail(){
        $data['page_title'] = "Agent Invoice Details";
        $data['main_view'] = "agent/agent_invoice_detail";
        $this->load->view('agent/layout', $data);
    }

    public function get_all_application_of_user() {
        $data['result'] = $this->db->query("SELECT * FROM users WHERE super_agent_employee_id = 'a21a0315-f127-4c8b-a607-0a886efd'" )->result();
        var_dump($data['result']);
    }


    public function dashboard_pre() {
        $data['page_title'] = "Dashboard";
        $where = array('status' => 'New');


        $agent_id = array('agent_id' => $this->session->userdata('agent_id'));
        $data['get_namebase'] = $this->agent_model->get_total_record('name_based_applications', $agent_id);
        $data['fingerprinting'] = $this->agent_model->get_total_record('digital_fingerprinting_applications', $agent_id);
        $data['recordSuspension'] = $this->agent_model->get_total_record('record_suspension_applications', $agent_id);
        $data['usEntry'] = $this->agent_model->get_total_record('us_entry_waiver_applications', $agent_id);

        // $data['activeapplication'] = $this->agent_model->get_total_record('application_status', $where);
        $data['main_view'] = "agent/dashboard_pree";
        $this->load->view('agent/layout', $data);
    }




    public function error(){
        $data['page_title'] = "error";
        $data['main_view'] = "agent/payment/error";
        $this->load->view('agent/layout', $data);
    }




}