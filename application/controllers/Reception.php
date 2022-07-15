<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reception extends CI_Controller {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        $public = array(
            'reception/index',
            'reception/signin',
            'reception/forgot_password',
            'reception/forgot_password_send',
            'reception/reset_password',
            'reception/reset_password_save',
//            'reception/digital_fingerprint',
        );
        $private = array(
            'reception/dashboard',
            'reception/dashboard_pre',
            'reception/logout',
            'reception/edit_reception_profile',
            'reception/upload_profile_img',
            'reception/edit_reception_profile_save',
            'reception/app_name_based_check_form',
            'reception/app_name_based_check_consent',

//            save namebased app
            'reception/app_name_based_check_form_save',
            'reception/app_name_based_check_consent_save',
//            display namebased application
            'reception/name_based_check_applications',
            'reception/name_based_check_application_details',
            'reception/name_based_check_application_download',
            'reception/name_based_check_summery',
            'reception/complete_digital_fingerprinting_application',
            'reception/edit_digital_fingerprint_form',


            'reception/digital_fingerprint',
            'reception/digital_fingerprint_form',
            'reception/app_digital_fingerprinting_form_save',
            'reception/update_edit_digital_fingerprint_form_save',
//            'reception/digital_fingerprinting_applications',
            'reception/digital_fingerprinting_applications',
            'reception/digital_fingerprinting_application_details',
            'reception/digital_fingerprinting_application_download',

            'reception/digital_fingerprinting_summery',


            'reception/app_record_suspension',
            'reception/app_record_suspension_form',
            'reception/app_record_suspension_consent',
            'reception/app_record_suspension_consent_save',
            'reception/record_suspension_applications',
            'reception/record_suspension_application_details',
            'reception/record_suspension_application_download',

            'reception/us_entry_waiver',
            'reception/us_entry_summery',



            'reception/accounts',

            'reception/invoice',
            'reception/download_invoice',

//            'reception/account',
//            'reception/message',
//            'reception/messages_alert',
//            'reception/account_save',
//            'reception/add_application_conversation_save',
//            'reception/edit_agent_profile',
//            'reception/edit_agent_profile_save',
//            'reception/dashboard_pre',
//            'reception/searchUserById'
        );

        $this->load->model('reception_model');
        $current_url = $this->router->fetch_class() . '/' . $this->router->fetch_method();

//        var_dump($current_url); die();

        if ($this->session->userdata('reception_logged_in')) {
            $user_access = $this->reception_model->get_current_user_roles_permissions();
            if ((in_array($current_url, $public))) {
                redirect('reception/dashboard');
            } else if (in_array($current_url, $private)) {

            } else if ((!in_array($this->router->fetch_method(), array_column($user_access, 'user_permission_route')))) {
                redirect('reception');
            }
        } elseif (!$this->session->userdata('reception_logged_in') && !in_array($current_url, $public)) {
            redirect('reception');
        }
    }


    public function index() {
        $data["page_title"] = "ePolice Reception";
        $this->load->view('reception/login', $data);
    }


    public function signin() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if (!$this->form_validation->run()) {
            $data["page_title"] = "ePolice Reception";
            $this->load->view('reception', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->load->model('reception_model');

            if ($user = $this->reception_model->login_reception($email, $password)) {
                $receptiondata = array(
                    'reception_id' => $user->id,
                    'reception_name' => $user->first_name . ' ' . $user->last_name,
                    'reception_profile_image' => $user->profile_image,
                    'reception_logged_in' => true
                );
                $this->session->set_userdata($receptiondata);
//                echo $this->session->userdata('reception_logged_in'); die();
                redirect('reception/dashboard');
            } else {
                $this->session->set_tempdata('no_user_access', 'Invalid Email / Password.',3);
                redirect('reception');
            }
        }
    }


    public function logout() {
        $this->session->unset_userdata($this->session->userdata('reception_id'));
        $this->session->unset_userdata($this->session->userdata('reception_name'));
        $this->session->unset_userdata($this->session->userdata('reception_profile_image'));
        $receptiondata = array(
            'reception_logged_in' => false
        );
        $this->session->set_userdata($receptiondata);
        redirect('reception');
    }

    public function edit_reception_profile(){
        $data['page_title'] = "My Profile";
        $data['main_view'] = "reception/edit_reception_profile";
        $data['edit_reception_data'] = $this->db->where('id', $this->session->userdata('reception_id'))->get('users')->row_array();
        $this->load->view('reception/layout', $data);
    }

    public function edit_reception_profile_save(){
        if ($this->reception_model->edit_reception_profile_save()) {
//            set updated user profile s picture name
            $profile_pic_name = get_profile_picture_by_id($this->session->userdata('reception_id'));
            $this->session->set_userdata('reception_profile_image', $profile_pic_name);

            $this->session->set_tempdata('success_message', 'Reception updated successfully.',3);
            redirect('/reception/edit_reception_profile');
        } else {
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            $this->edit_reception_profile();
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

    public function dashboard() {
        $data['page_title'] = "My Application";
        $data['main_view'] = "reception/dashboard";

        $whereNamebase = array('reception_id' => $this->session->userdata('reception_id'));
//        var_dump($whereNamebase); die();
//        $whereDigital = array('application_status' => 'New');
//        $whereRecord = array('application_status' => 'New');
//        $whereUs = array('application_status' => 'New');
        $data['namebased_application_count'] = $this->reception_model->get_total_record('name_based_applications', $whereNamebase);
        $data['digitalfingerprinting_application_count'] = $this->reception_model->get_total_record('digital_fingerprinting_applications', $whereNamebase);
        $data['record_suspension_application_count'] = $this->reception_model->get_total_record('record_suspension_applications', $whereNamebase);
        $data['usentry_application_count'] = $this->reception_model->get_total_record('us_entry_waiver_applications', '');

//        var_dump($data);

        $this->load->view('reception/layout', $data);
    }


    public function dashboard_pre() {
        $data['page_title'] = "Dashboard";
        $data['main_view'] = "reception/dashboard_pre";
        $data['namebased_application_count'] = $this->reception_model->count_namebase_app();
        $data['digitalfingerprinting_application_count'] = $this->reception_model->count_digitalfingerprinting_app();
        $data['record_suspension_application_count'] = $this->reception_model->count_record_suspension_app();
        $data['usentry_application_count'] = $this->reception_model->count_usentry_app();
        $this->load->view('reception/layout', $data);
    }


//    namebased applicaiton start

    public function app_name_based_check_form() {
        $data["page_title"] = "Name Based Check";
        $data['service'] = $this->db->where('service_slug', 'name-based-check')->get('services')->row();
        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
        $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
        $data["states"] = $this->reception_model->get_states('Canada');
        $data['country'] = 'Canada';
        $this->load->view('reception/site/name_based_check_form', $data);
    }


    //    save namebased application
    public function app_name_based_check_form_save() {
        if ($application_id = $this->reception_model->name_based_check_form_save()) {
            redirect('reception/app_name_based_check_consent'. '/' . $application_id);
        }
        redirect('app_name_based_check_form');
    }

    public function app_name_based_check_consent() {
        $data["page_title"] = "Consent Form - Name Based Criminal Record Check";
        $data["application_id"] = $this->uri->segment('3');
        $this->load->view('reception/site/name_based_check_consent', $data);
    }


    public function app_name_based_check_consent_save() {
        if ($this->reception_model->name_based_check_consent_save()) {
            $this->session->set_tempdata('success_message', 'Application Added Successfully.',3);
            redirect('reception/name_based_check_applications');
        }
        else{
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            redirect('reception/name_based_check_applications');
        }
    }


//    namebased application display data
    public function name_based_check_applications() {
        $data['page_title'] = "Name Based Check Applications";
        $result = $this->reception_model->get_name_based_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'reception/name_based_check_applications']);
        $data['client_id'] = $this->input->get('id');
        $data['name'] = $this->input->get('name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');

        $whereNew = array('application_status' => 'New', 'reception_id' => $this->session->userdata('reception_id'));
        $whereProcess = array('application_status' => 'Under Processing', 'reception_id' => $this->session->userdata('reception_id'));
        $wherePending = array('application_status' => 'Pending Documents', 'reception_id' => $this->session->userdata('reception_id'));
        $whereComplete = array('application_status' => 'Completed', 'reception_id' => $this->session->userdata('reception_id'));
        $whereNotApplied = array('application_status' => 'Not Applied', 'reception_id' => $this->session->userdata('reception_id'));

        $data['namebasedTotalNew'] = $this->reception_model->get_total_record('name_based_applications', $whereNew);
        $data['namebasedTotalUnderProcess'] = $this->reception_model->get_total_record('name_based_applications', $whereProcess);
        $data['namebasedTotalPendingDocuments'] = $this->reception_model->get_total_record('name_based_applications', $wherePending);
        $data['namebasedTotalCompelted'] = $this->reception_model->get_total_record('name_based_applications', $whereComplete);
        $data['namebasedTotalNotApplied'] = $this->reception_model->get_total_record('name_based_applications', $whereNotApplied);

//        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'user/security-screening/name-based-check']);
//        $data['client_id'] = $this->input->get('id');
//        $data['name'] = $this->input->get('name');
//        $data['phone'] = $this->input->get('phone');
//        $data['dob'] = $this->input->get('dob');

        $data['main_view'] = "reception/name_based_check_applications";
        $this->load->view('reception/layout', $data);
    }



    //    check it
        public function name_based_check_application_details($application_id) {
        $data['page_title'] = "Name Based Check Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->reception_model->get_name_based_application_details($application_id);
        $data['services'] = $this->reception_model->get_name_based_application_services($application_id);
        $data['offences'] = $this->reception_model->get_name_based_application_offences($application_id);
        $data['main_view'] = "reception/name_based_check_application_details";
        $this->load->view('reception/layout', $data);
    }


    public function name_based_check_application_download($application_id) {
        $this->load->library('pdfgenerator');
        $data['page_title'] = "Name Based Check Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->reception_model->get_name_based_application_details($application_id);
        $data['services'] = $this->reception_model->get_name_based_application_services($application_id);
        $data['offences'] = $this->reception_model->get_name_based_application_offences($application_id);
        $html = $this->load->view('reception/name_based_check_application_download', $data, true);
        $filename = 'Name Based Check Application - ' . $application_id;
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }




    public function name_based_check_summery(){
        $data['page_title'] = "Name Based Check Application Review";

//        $data['application_id'] = $application_id;
//        $data['application'] = $this->reception_model->get_name_based_application_details($application_id);
//        $data['services'] = $this->reception_model->get_name_based_application_services($application_id);
//        $data['offences'] = $this->reception_model->get_name_based_application_offences($application_id);
        $data['main_view'] = "reception/site/name_based_check_summery";
        $this->load->view('reception/site/name_based_check_summery', $data);
    }

    public function us_entry_summery(){
        $data['page_title'] = "Name Based Check Application Review";

//        $data['application_id'] = $application_id;
//        $data['application'] = $this->reception_model->get_name_based_application_details($application_id);
//        $data['services'] = $this->reception_model->get_name_based_application_services($application_id);
//        $data['offences'] = $this->reception_model->get_name_based_application_offences($application_id);
        $data['main_view'] = "reception/site/us_entry_summery";
        $this->load->view('reception/site/us_entry_summery', $data);
    }


    public function digital_fingerprinting_summery(){
        $data['page_title'] = "Name Based Check Application Review";

//        $data['application_id'] = $application_id;
//        $data['application'] = $this->reception_model->get_name_based_application_details($application_id);
//        $data['services'] = $this->reception_model->get_name_based_application_services($application_id);
//        $data['offences'] = $this->reception_model->get_name_based_application_offences($application_id);
        $data['main_view'] = "reception/site/digital_fingerprinting_summery";
        $this->load->view('reception/site/digital_fingerprinting_summery', $data);
    }







//    digital fingerprint applicaiton
//    first form like ticket on phone
    public function digital_fingerprint(){
        $data["page_title"] = "Digital Finger Printing";
        if ($this->input->post('fingerprint_options') == 'done') {
            if ($this->input->post('fingerprint_location') == 'done') {
                $data['service'] = $this->db->where('service_slug', 'digital-fingerprinting')->get('services')->row();
                $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
                $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
                $data["states"] = $this->reception_model->get_states('Canada');
//                $data['country'] = $country;
                $data['main_view'] = "reception/site/digital_fingerprinting_form";
                $this->load->view('reception/site/layout', $data);
            }
//            else {
//                $data['options'] = $this->input->post('digital_fingerprinting_options');
//                $data["states"] = $this->reception_model->get_states('Canada');
//                $data['main_view'] = "agent/site/digital_fingerprinting_locations";
//                $this->load->view('agent/site/layout', $data);
//            }
        } else {
            $data['options'] = $this->db->order_by('created_at', 'ASC')->get('digital_fingerprinting_options')->result();
        }
        $this->load->view('reception/site/digital_fingerprinting_form_new', $data);
    }

    public function digital_fingerprint_form(){
        $data["page_title"] = "Digital Finger Printing Form";
        $data['options'] = $this->db->order_by('created_at', 'ASC')->get('digital_fingerprinting_options')->result();
        $this->load->view('reception/site/digital_fingerprinting_form', $data);
    }

    public function app_digital_fingerprinting_form_save() {
        if (!$application_id = $this->reception_model->digital_fingerprinting_form_save()) {
            $this->session->set_tempdata('success_message', ' Digital Fingerprinting Application Added Successfully.',3);
            redirect('reception/digital_fingerprinting_applications');
        }
        else {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('reception/digital_fingerprinting_applications');
        }
    }

//    public function digital_fingerprint_consent(){
//        $data["page_title"] = "Digital Finger Printing Form";
//        $data['options'] = $this->db->order_by('created_at', 'ASC')->get('digital_fingerprinting_options')->result();
//        $this->load->view('reception/site/digital_fingerprinting', $data);
//    }

    public function digital_fingerprinting_applications() {
        $data['page_title'] = "Digital Fingerprinting Applications";
        $result = $this->reception_model->get_digital_fingerprinting_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'reception/digital_fingerprinting_applications']);


        $whereNew = array('application_status' => 'New', 'reception_id' => $this->session->userdata('reception_id'));
        $whereProcess = array('application_status' => 'Under Processing', 'reception_id' => $this->session->userdata('reception_id'));
        $wherePending = array('application_status' => 'Pending Documents', 'reception_id' => $this->session->userdata('reception_id'));
        $whereComplete = array('application_status' => 'Completed', 'reception_id' => $this->session->userdata('reception_id'));
//        $whereNotApplied = array('application_status' => 'Not Applied');

        $data['digitalTotalNew'] = $this->reception_model->get_total_record('digital_fingerprinting_applications', $whereNew);
        $data['digitalTotalUnderProcess'] = $this->reception_model->get_total_record('digital_fingerprinting_applications', $whereProcess);
        $data['digitalTotalPendingDocuments'] = $this->reception_model->get_total_record('digital_fingerprinting_applications', $wherePending);
        $data['digitalTotalCompelted'] = $this->reception_model->get_total_record('digital_fingerprinting_applications', $whereComplete);
//        $data['digitalTotalNotApplied'] = $this->reception_model->get_total_record('digital_fingerprinting_applications', $whereNotApplied);



        $data['client_id'] = $this->input->get('id');
        $data['f_name'] = $this->input->get('f_name');
        $data['l_name'] = $this->input->get('l_name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');
        $data['status'] = $this->input->get('application_status');
        $data['main_view'] = "reception/digital_fingerprinting_applications";
        $this->load->view('reception/layout', $data);
    }


    public function digital_fingerprinting_application_download($application_id) {
        $this->load->library('pdfgenerator');
        $data['page_title'] = "Digital Fingerprinting Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->reception_model->get_digital_fingerprinting_application_details($application_id);
        $data['services'] = $this->reception_model->get_digital_fingerprinting_application_services($application_id);
        $data['options'] = $this->reception_model->get_digital_fingerprinting_application_options($application_id);
        $html = $this->load->view('reception/digital_fingerprinting_application_download', $data, true);
        $filename = 'Digital Fingerprinting Application - ' . $application_id;
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }


    public function digital_fingerprinting_application_download_new() {
        $this->load->library('pdfgenerator');
        $data['page_title'] = "Digital Fingerprinting Application Details";
//        $data['application_id'] = $application_id;
//        $data['application'] = $this->reception_model->get_digital_fingerprinting_application_details($application_id);
//        $data['services'] = $this->reception_model->get_digital_fingerprinting_application_services($application_id);
//        $data['options'] = $this->reception_model->get_digital_fingerprinting_application_options($application_id);
        $html = $this->load->view('reception/digital_fingerprinting_application_download', $data, true);
        $filename = 'Digital Fingerprinting Application - ';
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }

    public function digital_fingerprinting_application_details($application_id) {
        $data['page_title'] = "Digital Fingerprinting Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->reception_model->get_digital_fingerprinting_application_details($application_id);
        $data['services'] = $this->reception_model->get_digital_fingerprinting_application_services($application_id);
        $data['options'] = $this->reception_model->get_digital_fingerprinting_application_options($application_id);

//        var_dump($data['options']); die();

//        $data['comment_id'] = $this->db->query("SELECT * FROM application_comments WHERE application_id = '$application_id' ORDER BY created_at DESC LIMIT 1")->result_array();

//        $data['comments'] = $this->reception_model->get_application_comments($application_id, 'digital-fingerprinting');

        //        application status
//        $data['status'] = $this->db->query("SELECT * FROM application_status WHERE application_id = '$application_id' ORDER BY created_at DESC LIMIT 1")->result();
        //        update the status to zero show that visited application it is
//        $this->reception_model->update_digital_fingerprinting_application_status($application_id);

        $data['main_view'] = "reception/digital_fingerprinting_application_details";
        $this->load->view('reception/layout', $data);
    }

    public function complete_digital_fingerprinting_application() {
        $application_id = $this->uri->segment('3');
//        echo $application_id; die();
        $result = $this->reception_model->complete_digital_fingerprinting_application($application_id);
        if($result){
            redirect('reception/digital_fingerprinting_applications');
        } else{
            $this->load->view('reception/digital_fingerprinting_applications');
        }
    }



    public function edit_digital_fingerprint_form(){
        $data["page_title"] = "Edit Digital Finger Printing Form";

        $application_id = $this->uri->segment('3');

        $data['application'] = $this->reception_model->get_digital_fingerprinting_application_details($application_id);

        $this->load->view('reception/site/edit_digital_fingerprinting_application', $data);
    }



    public function update_edit_digital_fingerprint_form_save() {
        if ($application_id = $this->reception_model->update_edit_digital_fingerprint_form_save()) {
            redirect('reception/digital_fingerprinting_applications');
        }
        else {
            redirect('reception/digital_fingerprint_form');
        }

//        if ($application_id = $this->reception_model->digital_fingerprinting_form_save()) {
//
//            $this->digital_fingerprinting_applications();
//
//
////            redirect('user/application/digital-fingerprinting/consent/' . $this->reception_model->get_digital_fingerprinting_application_details($application_id)->client_id . '/' . $application_id);
//        }
//        redirect('reception/digital_fingerprint_form');
    }




//    public function app_record_suspension() {
//        $data["page_title"] = "Record Suspension";
//        $data['service'] = $this->db->where('service_slug', 'record-suspension')->get('services')->row();
//        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
//        $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
//        $data["states"] = $this->reception_model->get_states('Canada');
//
//        $this->load->view('reception/site/record_suspension', $data);
//    }
//
//    public function app_record_suspension_form($country) {
//        $data["page_title"] = "Record Suspension " . strtoupper($country);
//        $data['service'] = $this->db->where('service_slug', 'record-suspension')->get('services')->row();
//        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
//        $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
//        $data['country'] = $country;
//        $data['main_view'] = "reception/site/record_suspension_form";
//        $this->load->view('reception/site/layout', $data);
//    }

    public function app_record_suspension() {
        $data["page_title"] = "Record Suspension Form";
//        $data["application_id"] = $application_id;
//        $data["client_id"] = $client_id;
        $this->load->view('reception/site/record_suspension_consent', $data);
    }

    public function app_record_suspension_consent_save() {

//        echo "hi"; die();
//        $error = $this->reception_model->record_suspension_consent_save();
//        var_dump($error);
//        die();


        if (!$this->reception_model->record_suspension_consent_save()) {
            $this->session->set_tempdata('success_message', 'Record Suspension Application Added Successfully.',3);
            redirect('reception/record_suspension_applications');
        } else {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('reception/record_suspension_applications');
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





    public function record_suspension_applications() {
        $data['page_title'] = "Record Suspension Applications";
        $data['user_roles'] = $this->db->query("SELECT * FROM user_roles")->result();
        $result = $this->reception_model->get_record_suspension_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'reception/record_suspension_applications']);

        $whereNew = array('application_status' => 'New', 'reception_id' => $this->session->userdata('reception_id'));
        $whereProcess = array('application_status' => 'Under Processing', 'reception_id' => $this->session->userdata('reception_id'));
        $wherePending = array('application_status' => 'Pending Documents', 'reception_id' => $this->session->userdata('reception_id'));
        $whereComplete = array('application_status' => 'Completed', 'reception_id' => $this->session->userdata('reception_id'));
        $whereNotApplied = array('application_status' => 'Not Applied', 'reception_id' => $this->session->userdata('reception_id'));

        $data['namebasedTotalNew'] = $this->reception_model->get_total_record('record_suspension_applications', $whereNew);
        $data['namebasedTotalUnderProcess'] = $this->reception_model->get_total_record('record_suspension_applications', $whereProcess);
        $data['namebasedTotalPendingDocuments'] = $this->reception_model->get_total_record('record_suspension_applications', $wherePending);
        $data['namebasedTotalCompelted'] = $this->reception_model->get_total_record('record_suspension_applications', $whereComplete);
        $data['namebasedTotalNotApplied'] = $this->reception_model->get_total_record('record_suspension_applications', $whereNotApplied);
        
        $data['client_id'] = $this->input->get('id');
        $data['f_name'] = $this->input->get('f_name');
        $data['l_name'] = $this->input->get('l_name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');
        $data['status'] = $this->input->get('application_status');
        $data['main_view'] = "reception/record_suspension_applications";
        $this->load->view('reception/layout', $data);
    }


    public function record_suspension_application_details($application_id) {
        $data['page_title'] = "Record Suspension Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->reception_model->get_record_suspension_application_details($application_id);
        $data['services'] = $this->reception_model->get_record_suspension_application_services($application_id);
        $data['options'] = $this->reception_model->get_record_suspension_application_options($application_id);
        $data['main_view'] = "reception/record_suspension_application_details";
        $this->load->view('reception/layout', $data);
    }



    public function us_entry_waiver() {
        $data['page_title'] = "Digital Fingerprinting Applications";
        $result = $this->reception_model->get_digital_fingerprinting_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'reception/digital_fingerprinting_applications']);


        $whereNew = array('application_status' => 'New');
        $whereProcess = array('application_status' => 'Under Processing');
        $wherePending = array('application_status' => 'Pending Documents');
        $whereComplete = array('application_status' => 'Completed');
//        $whereNotApplied = array('application_status' => 'Not Applied');

        $data['digitalTotalNew'] = $this->reception_model->get_total_record('digital_fingerprinting_applications', $whereNew);
        $data['digitalTotalUnderProcess'] = $this->reception_model->get_total_record('digital_fingerprinting_applications', $whereProcess);
        $data['digitalTotalPendingDocuments'] = $this->reception_model->get_total_record('digital_fingerprinting_applications', $wherePending);
        $data['digitalTotalCompelted'] = $this->reception_model->get_total_record('digital_fingerprinting_applications', $whereComplete);
//        $data['digitalTotalNotApplied'] = $this->reception_model->get_total_record('digital_fingerprinting_applications', $whereNotApplied);



        $data['client_id'] = $this->input->get('id');
        $data['f_name'] = $this->input->get('f_name');
        $data['l_name'] = $this->input->get('l_name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');
        $data['status'] = $this->input->get('application_status');
        $data['main_view'] = "reception/digital_fingerprinting_applications";
        $this->load->view('reception/layout', $data);
    }











//    applicaitons end




//    accounts start

    public function accounts(){
        $data['page_title'] = "Accounts";
        $data['main_view'] = "reception/accounts";
//        $result = $this->corporate_model->get_service_order_applications();
//        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'corporate/service_order']);
        $this->load->view('reception/layout', $data);
    }



    public function invoice(){
        $data['page_title'] = "Invoices";
        $data['main_view'] = "reception/invoices";
        $this->load->view('reception/layout', $data);
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