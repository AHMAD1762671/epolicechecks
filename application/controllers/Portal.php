<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        $public = array(
            'portal/index',
            'portal/signin',
            'portal/forgot_password',
            'portal/forgot_password_send',
            'portal/reset_password',
            'portal/reset_password_save',
        );
        $private = array(
            'portal/dashboard',
            'portal/logout',
            'portal/account',
            'portal/account_save',
            'portal/countries_list',
            'portal/add_country_save',
            'portal/edit_country_save',
            'portal/delete_country',
            'portal/states_list',
            'portal/add_state_save',
            'portal/add_user_save',
            'portal/edit_user_save',


            'portal/agents',
            'portal/agents_list',
            'portal/locations_list',
            'portal/locations',
            'portal/users_list',
            'portal/get_invoices',
            'portal/prices',
            'portal/prices_details',
            'portal/corporates_list',

            'portal/add_reseller_save',



            'portal/edit_state_save',
            'portal/delete_state',
            'portal/search_country_ajax',
            'portal/cities_list',
            'portal/add_city_save',
            'portal/edit_city_save',
            'portal/delete_city',
            'portal/get_city_by_state',
            'portal/get_agent_by_city',
            'portal/add_location_save',
            'portal/edit_location_save',
            'portal/delete_location',
            'portal/get_country_states',
            'portal/office_desk_list',
            'portal/add_office_desk_save',
            'portal/edit_office_desk_save',
            'portal/delete_office_desk',
            'portal/download_office_desk_document',
            'portal/user_access',
            'portal/update_price_save',
            'portal/name_based_check_application_details',
            'portal/name_based_check_application_download',
            'portal/record_suspension_application_details',
            'portal/record_suspension_application_download',
            'portal/us_entry_waiver_application_details',
            'portal/us_entry_waiver_application_download',
            'portal/add_application_comment_save',
            'portal/edit_agent_save',
            'portal/delete_agent',
            'portal/add_corporate_save',
            'portal/edit_corporate_save',
            'portal/delete_corporate',


            'portal/save_edit_application_status',
            'portal/save_upload_certificate',
//            'portal/get_users_by_roles',
            'portal/get_notification',
            'portal/notificationDetails',
            'portal/brands_dashboard_before',
            'portal/brands_dashboard',
            'portal/epolice_services',
            'portal/security_screening',
            'portal/name_based_check_applications',
            'portal/digital_fingerprinting_applications',
            'portal/record_suspension_applications',
            'portal/us_entry_waiver_applications',
            'portal/add_agent_save',



            'portal/add_application_certificate_save',
            'portal/fetch_users',
            'portal/get_user_by_role',
            'portal/forward_application_to_user',
            'portal/add_application_status_save',
            'portal/forward_us_entry_waiver_application_to_user',
            'portal/add_us_entry_waiver_applications_save',
            'portal/delete_certificate',
            'portal/delete_certificate_namebase',
            'portal/delete_certificate_record_suspensio',
            'portal/delete_certificate_digital',
            'portal/change_agent_status',
            'portal/add_application_conversation_save',
            'portal/message',
            'portal/add_application_conversation_save_by_admin',
            'portal/get_comment_data_save',
            'portal/add_application_status_save_record_suspension_application',
            'portal/add_application_status_save_u_s_entry_waiver_application',
            'portal/add_application_status_save_digital_fingerprinting_application',
            'portal/multiple_file_upload',
            'portal/delete_comment',
            'portal/delete_file',
            'portal/change_corporate_status',
            'portal/view_service_order_images',
            'portal/forward_service_order_images_to_reception',
            'portal/coupons',
            'portal/add_corporate_coupon_save',
            'portal/add_agent_coupon_save',
            'portal/add_outsider_user_coupon_save',
            'portal/add_new_invoice',
            'portal/invoice',
            'portal/get_account_invoices',
            'portal/get_invoice_list_by_account',
            'portal/get_invoice_detail',
            'portal/save_custom_invoice',
            'portal/invoice_description',
//            individual account list
            'portal/get_users',
            'portal/get_users_application_list_accounts',
            'portal/get_application_by_id',
//            corporate account list
            'portal/get_corporate_users',
            'portal/get_corporate_users_application_list_accounts',
            'portal/get_sub_corporate_users_application_list',
//            agent account list
            'portal/get_agent_users',
            'portal/get_agent_users_list_accounts',
            'portal/get_sub_agents_users_application_list',
//            payment
//            payment
            'portal/payment',
            'portal/success',
            'portal/error',
//            download excel file
            'portal/action_corporate',
            'portal/action_agent',
            'portal/action_outside_user',
            'portal/monthly_report',
            'portal/get_corporate_users_individual_list',
            'portal/pdfDownload',

//            payment status update
            'portal/update_payment_status',
            'portal/send_invoice_to_sub_corporate',
            'portal/invoice',
//            reports section
            'portal/emails_report',
            'portal/reports_type',
            'portal/fetch_state',
            'portal/fetch_city',
            'portal/reseller_list',

            'portal/test_join',
            'portal/index2',

//            series list
            'portal/series_list',
        );
        $this->load->model('portal_model');

        $this->load->library('uuid');

        $current_url = $this->router->fetch_class() . '/' . $this->router->fetch_method();
        if ($this->session->userdata('user_logged_in')) {
            $user_access = $this->portal_model->get_current_user_roles_permissions();
            if ((in_array($current_url, $public))) {
                redirect('portal/dashboard');
            } else if (in_array($current_url, $private)) {

            } else if ((!in_array($this->router->fetch_method(), array_column($user_access, 'user_permission_route')))) {
                redirect('portal');
            }
        } elseif (!$this->session->userdata('user_logged_in') && !in_array($current_url, $public)) {
            redirect('portal');
        }
    }

    public function index() {
        $data["page_title"] = "ePolice Portal";
        $data['main_view'] = "portal/login_view";
        $this->load->view('portal/login', $data);
    }

    public function index2() {
        //Data, connection, auth
//        $dataFromTheForm = $_POST['fieldName']; // request data from the form
        $soapUrl = "https://uat.eidfs.equifax.ca/uru/soap/ut/canadav3?wsdl"; // asmx URL of WSDL
        $soapUser = "/glavcov";  //  username
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
</soapenv:Envelope>';   // data from the form, e.g. some ID number

        $headers = array(
            "Content-type: text/xml;charset=\"utf-8\"",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: https://ifs-uat.ca.equifax.com/uru/soap/ut/canadav2",
            "Content-length: " . strlen($xml_post_string),
        ); //SOAPAction: your op URL

        $url = $soapUrl;

        // PHP cURL  for https connection with auth
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $soapUser . ":" . $soapPassword); // username and password - declared at the top of the doc
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // converting
        $response = curl_exec($ch);
//        var_dump($response); die();


//        dd(curl_error($ch));
        curl_close($ch);
        dd($response);

        // converting
        $response1 = str_replace("<soap:Body>", "", $response);
        $response2 = str_replace("</soap:Body>", "", $response1);

        // convertingc to XML
        $parser = simplexml_load_string($response2);

//        var_dump($parser->InitialResponse->InteractiveQuery);


        // user $parser to get your data out of XML response and to display it.
//        dd($parser->InitialResponse->InteractiveQuery);
        var_dump($parser->InitialResponse->InteractiveQuery);
    }






    public function signin() {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if (!$this->form_validation->run()) {
            $data["page_title"] = "ePolice Potal";
            $this->load->view('portal', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->load->model('portal_model');
            if ($user = $this->portal_model->login_user($email, $password)) {
                $userdata = array(
                    'user_id' => $user->id,
                    'name' => $user->first_name . ' ' . $user->last_name,
                    'user_profile_image' => $user->profile_image,
                    'user_logged_in' => true
                );
                $this->session->set_userdata($userdata);
                redirect('portal/dashboard');
            } else {
                $this->session->set_tempdata('no_user_access', 'Invalid Email / Password.',3);
                redirect('portal');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata($this->session->userdata('user_id'));
        $this->session->unset_userdata($this->session->userdata('name'));
        $this->session->unset_userdata($this->session->userdata('user_profile_image'));
        $userdata = array(
            'user_logged_in' => false
        );
        $this->session->set_userdata($userdata);

        redirect('portal');
    }

    public function forgot_password() {
        $data["page_title"] = "ePolic Portal";
        $data['main_view'] = "portal/forgot_password_view";
        $this->load->view('portal/forgot_password_view', $data);
    }

    public function forgot_password_send() {
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
            $this->session->set_tempdata('signup_success', 'Reset password link has been sent. Check your inbox.',3);
            redirect('portal/forgot-password');
        } else {
            $this->session->set_tempdata('no_user_access', 'Invalid Email! Please try again.',3);
            redirect('portal/forgot-password');
        }
    }

    public function reset_password($code) {
        $data['is_code_valid'] = $this->portal_model->user_check_secret_code($code);
        $data['secret_code'] = $code;
        $data["page_title"] = "SGIC - Admin Portal";
        $data['main_view'] = "portal/reset_password_view";
        $this->load->view('portal/reset_password_view', $data);
    }

    public function reset_password_save() {
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
                $this->session->set_tempdata('signup_success', 'Password changed successfully!',3);
                redirect('portal');
            } else {
                $this->session->set_tempdata('no_user_access', 'Something went wrong! Please try again.',3);
                redirect('portal/reset-password/' . $code);
            }
        }
    }

    public function account() {
        $data['page_title'] = "Account Settings";
        $data['main_view'] = "portal/account";
        $data['account'] = $this->db->where('id', $this->session->userdata('user_id'))->get('users')->row();
        $this->load->view('portal/layout', $data);
    }

    public function account_save() {
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
                $this->session->set_tempdata('success_message', 'Account updated successfully!',3);
                redirect('portal/account');
            } else {
                $data['account'] = $this->db->where('id', $this->session->userdata('user_id'))->get('users')->row();
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                $this->load->view('portal/layout', $data);
            }
        }
    }

    public function current_password_check($current_password) {
        if (!$this->portal_model->match_current_password($current_password)) {
            $this->form_validation->set_message('current_password_check', 'Current password doesn\'t not match');
            return FALSE;
        }
        return TRUE;
    }

    public function dashboard() {
        $data['page_title'] = "Dashboard";
        $data['main_view'] = "portal/dashboard";
        $data['total_countries'] = $this->db->count_all_results('countries');
        $data['total_states'] = $this->db->count_all_results('states');
        $data['total_cities'] = $this->db->count_all_results('cities');
        $data['total_office_desk'] = $this->db->count_all_results('office_desk');
        $data['total_roles'] = $this->db->count_all_results('user_roles');
        $this->load->view('portal/layout', $data);
    }

    public function error404() {
        $this->load->view('404');
    }

    public function all_user_permissions() {
        $data['page_title'] = "User Permissions";
        $data['user_permissions'] = $this->portal_model->get_all_user_permissions();
        $data['main_view'] = "portal/user_permissions";
        $this->load->view('portal/layout', $data);
    }

    public function add_user_permission_save() {
        $this->form_validation->set_rules('user_permission_name', 'User Permission Name', 'trim|required');
        $this->form_validation->set_rules('user_permission_route', 'Route', 'trim|required');
        $this->form_validation->set_rules('user_permission_url', 'URL', 'trim|required');
        $this->form_validation->set_rules('user_permission_type', 'Type', 'trim|required');
        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/user-permissions');
        } else {
            if ($this->portal_model->add_user_permission_save()) {
                $this->session->set_tempdata('success_message', 'User Permission added successfully.',3);
                redirect('portal/user-permissions');
            } else {
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                redirect('portal/user-permissions');
            }
        }
    }

    public function edit_user_permission_save() {
        $this->form_validation->set_rules('user_permission_name', 'User Permission Name', 'trim|required');
        $this->form_validation->set_rules('user_permission_route', 'Route', 'trim|required');
        $this->form_validation->set_rules('user_permission_url', 'URL', 'trim|required');
        $this->form_validation->set_rules('user_permission_type', 'Type', 'trim|required');
        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/user-permissions');
        } else {
            if ($this->portal_model->edit_user_permission_save()) {
                $this->session->set_tempdata('success_message', 'User Permission updated successfully.',3);
                redirect('portal/user-permissions');
            } else {
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                redirect('portal/user-permissions');
            }
        }
    }

    public function delete_user_permission() {
        $this->db->where('user_permission_id', $this->input->post('user_permission_id'))->delete('user_permissions');
    }

    public function all_user_roles() {
        $data['page_title'] = "User Roles";
        $data['user_roles'] = $this->portal_model->get_all_user_roles();
        $data['main_view'] = "portal/user_roles";
        $this->load->view('portal/layout', $data);
    }

    public function add_user_role_save() {
        $this->form_validation->set_rules('user_role_name', 'User Role Name', 'trim|required');
        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/user-roles');
        } else {
            if ($this->portal_model->add_user_role_save()) {
                $this->session->set_tempdata('success_message', 'User Role added successfully.',3);
                redirect('portal/user-roles');
            } else {
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                redirect('portal/user-roles');
            }
        }
    }

    public function edit_user_role_save() {
        $this->form_validation->set_rules('user_role_name', 'User Role Name', 'trim|required');
        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/user-roles');
        } else {
            if ($this->portal_model->edit_user_role_save()) {
                $this->session->set_tempdata('success_message', 'User Role updated successfully.',3);
                redirect('portal/user-roles');
            } else {
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                redirect('portal/user-roles');
            }
        }
    }

    public function delete_user_role() {
        $this->db->where('user_role_id', $this->input->post('user_role_id'))->delete('user_roles');
    }

    public function all_user_roles_permissions($user_role_id) {
        if ($role_name = $this->portal_model->get_user_role_name_by_id($user_role_id)) {
            $data['user_role_name'] = $role_name;
        } else {
            redirect('portal/user-roles');
        }
        $data['page_title'] = "Assign User Role's Permissions";
        $data['user_permissions'] = $this->portal_model->get_all_user_permissions();
        $data['user_role_id'] = $user_role_id;
        $data['main_view'] = "portal/user_roles_permissions";
        $this->load->view('portal/layout', $data);
    }

    public function add_user_roles_permissions_save() {
        if ($this->portal_model->add_user_roles_permissions_save()) {
            $this->session->set_tempdata('success_message', 'User Role\'s Permissions assigned successfully.',3);
            redirect('portal/user-roles');
        } else {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/user-roles');
        }
    }


    public function users_list() {
        $data['page_title'] = "Users List";
        $result = $this->portal_model->get_all_users();
        $data['users'] = $this->paginator->paginate($result, ['base_url' => 'portal/users']);

        $data["states"] = $this->portal_model->get_states('Canada');
        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();

        $whereagent = array('user_role_id' => '5f513b61-67f9-44b5-9c9d-5bb46e20');
        $wherecorporate = array('user_role_id' => '2dd65df9-7ed5-45bd-bef1-f2afa31a');
        $whereuser = array('user_role_id' => '3ee65tf9-7ed5-45ft-hdk1-f2afa31b');
        $wherereception = array('user_role_id' => 'c949666c-b2f2-4ad4-8ecb-fc7b1ec0');
        $whereaccount = array('user_role_id' => 'f971e9f3-57c9-4213-a35d-1700188b');

        $data['Totalagent'] = $this->portal_model->get_total_record('users', $whereagent);
        $data['Totalcorporate'] = $this->portal_model->get_total_record('users', $wherecorporate);
        $data['Totaluser'] = $this->portal_model->get_total_record('users', $whereuser);
        $data['Totalreception'] = $this->portal_model->get_total_record('users', $wherereception);
        $data['Totalaccount'] = $this->portal_model->get_total_record('users', $whereaccount);

        $data['user_roles'] = $this->db->order_by('created_at', 'ASC')->get('user_roles')->result();
        $data['search'] = $this->input->get('name');
        $data['main_view'] = "portal/users";
        $this->load->view('portal/layout', $data);
    }

    public function add_user_save() {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Email', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('user_role_id', 'User Role', 'trim|required');
        if (!$this->form_validation->run()) {
           $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
           $this->session->set_tempdata('add_user_error', 'Something went wrong. Please try again!',3);
           $this->users_list();
        }
        else {
            if ($this->portal_model->add_user_save()) {
                $this->session->set_tempdata('success_message', 'User added successfully.',3);
                redirect('portal/users');
            } else {
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                redirect('portal/users');
            }
        }
    }

    public function edit_user_save() {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('user_role_id', 'User Role', 'trim|required');
        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            $this->session->set_tempdata('add_user_error', 'Something went wrong. Please try again!',3);
//            redirect('portal/users');
            $this->users_list();
        } else {
            if ($this->portal_model->edit_user_save()) {
                $this->session->set_tempdata('success_message', 'User updated successfully.',3);
                redirect('portal/users');
            } else {
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                redirect('portal/users');
            }
        }
    }

    public function countries_list() {
        $data['page_title'] = "Countries List";
        $result = $this->portal_model->get_all_countries();
        $data['countries'] = $this->paginator->paginate($result, ['base_url' => 'portal/countries']);
        $data['search'] = $this->input->get('name');
        $data['main_view'] = "portal/countries";
        $this->load->view('portal/layout', $data);
    }

    public function delete_user() {
        $this->db->where('id', $this->input->post('user_id'))->delete('users');
    }

    public function add_country_save() {
        $this->form_validation->set_rules('name', 'Country Name', 'trim|required');
//        $this->form_validation->set_rules('phonecode', 'Phone Code', 'trim|required');
        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/countries');
        } else {
            if ($this->portal_model->add_country_save()) {
//                get the last ID
                $tableName = "countries";
                $idName = "country_id";
                $result = $this->portal_model->get_last_record_id($tableName, $idName);
                $id = $result[0]['country_id'];
                $details = "Country Added";

//                $data = array(
//                    'table_id' => $id,
//                    'table_name' => $tableName,
//                    'description' => $details
//                );
//                save the record for notification
//                $submitResult = $this->portal_model->save_notification($data);

                $this->session->set_tempdata('success_message', 'Country added successfully.',3);
                redirect('portal/countries');
            } else {
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                redirect('portal/countries');
            }
        }
    }

    public function edit_country_save() {
        $this->form_validation->set_rules('name', 'Country Name', 'trim|required');
        $this->form_validation->set_rules('phonecode', 'Phone Code', 'trim|required');
        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/countries');
        } else {
            if ($this->portal_model->edit_country_save()) {

//                for notification
                $tableName = "countries";
                $id = $this->input->post('country_id');
                $details = "Country Updated";

                $data = array(
                    'table_id' => $id,
                    'table_name' => $tableName,
                    'description' => $details
                );
                $submitResult = $this->portal_model->save_notification($data);
                $this->session->set_tempdata('success_message', 'Country updated successfully.',3);
                redirect('portal/countries');
            } else {
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                redirect('portal/countries');
            }
        }
    }

    public function delete_country() {
        $this->db->where('country_id', $this->input->post('country_id'))->delete('countries');

//        for notification
        $tableName = "countries";
        $id = $this->input->post('country_id');
        $details = "Country Deleted";

        $data = array(
            'table_id' => $id,
            'table_name' => $tableName,
            'description' => $details
        );
        $submitResult = $this->portal_model->save_notification($data);
    }

    public function states_list() {
        $data['page_title'] = "States List";
        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();
        $result = $this->portal_model->get_all_states();
        $data['states'] = $this->paginator->paginate($result, ['base_url' => 'portal/states']);
        $data['search'] = $this->input->get('name');
        $data['main_view'] = "portal/states";
        $this->load->view('portal/layout', $data);
    }

    public function add_state_save() {
        $this->form_validation->set_rules('name', 'State Name', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('tax_type', 'Tax Type', 'trim|required');
        $this->form_validation->set_rules('tax_rate', 'Tax Rate %', 'trim|required');
        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/states');
        } else {
            if ($this->portal_model->add_state_save()) {
                $this->session->set_tempdata('success_message', 'State added successfully.',3);
                redirect('portal/states');
            } else {
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                redirect('portal/states');
            }
        }
    }

    public function edit_state_save() {
        $this->form_validation->set_rules('name', 'State Name', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('tax_type', 'Tax Type', 'trim|required');
        $this->form_validation->set_rules('tax_rate', 'Tax Rate %', 'trim|required');
        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/states');
        } else {
            if ($this->portal_model->edit_state_save()) {
                $this->session->set_tempdata('success_message', 'State updated successfully.',3);
                redirect('portal/states');
            } else {
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                redirect('portal/states');
            }
        }
    }

    public function delete_state() {
        $this->db->where('state_id', $this->input->post('state_id'))->delete('states');
    }

    public function search_country_ajax() {
        $result = $this->portal_model->search_country_ajax();
        echo json_encode($result);
    }

    public function cities_list() {
        $data['page_title'] = "Cities List";
        $result = $this->portal_model->get_all_cities();
        $data['cities'] = $this->paginator->paginate($result, ['base_url' => 'portal/cities']);

        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();

        $data['search'] = $this->input->get('name');
        $data['main_view'] = "portal/cities";
        $this->load->view('portal/layout', $data);
    }

    public function add_city_save() {
        $this->form_validation->set_rules('name', 'City Name', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('state_id', 'Country', 'trim|required');
        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/cities');
        } else {
            if ($this->portal_model->add_city_save()) {
                $this->session->set_tempdata('success_message', 'City added successfully.',3);
                redirect('portal/cities');
            } else {
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                redirect('portal/cities');
            }
        }
    }

    public function edit_city_save() {
        $this->form_validation->set_rules('name', 'City Name', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('state_id', 'Country', 'trim|required');
        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/cities');
        } else {
            if ($this->portal_model->edit_city_save()) {
                $this->session->set_tempdata('success_message', 'City updated successfully.',3);
                redirect('portal/cities');
            } else {
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                redirect('portal/cities');
            }
        }
    }

    public function delete_city() {
        $this->db->where('city_id', $this->input->post('city_id'))->delete('cities');
    }

    public function locations_list() {
        $data['page_title'] = "Locations List";
        $result = $this->portal_model->get_all_locations();
        $data['locations'] = $this->paginator->paginate($result, ['base_url' => 'portal/agent-locations']);
        $data["states"] = $this->portal_model->get_states('Canada');
        $data['search'] = $this->input->get('name');
        $data['main_view'] = "portal/locations_list";
        $this->load->view('portal/layout', $data);
    }

    public function get_city_by_state() {
        $this->db->where('state_id', $this->input->post('state_id'));
        $result = $this->db->order_by('name', 'ASC')->get('cities')->result();
        $data = '<option value="">Select City</option>';
        foreach ($result as $value) {
            $data .= '<option value="' . $value->city_id . '">' . $value->name . '</option>';
        }
        echo $data;
    }

    public function get_agent_by_city() {
        $this->db->where('city_id', $this->input->post('city_id'));
        $result = $this->db->order_by('first_name', 'ASC')->get('agents')->result();
        $data = '<option value="">Select Agent</option>';
        foreach ($result as $value) {
            $data .= '<option value="' . $value->id . '">' . $value->first_name . ' ' . $value->last_name . '</option>';
        }
        echo $data;
    }

    public function add_location_save() {
        if ($this->portal_model->add_location_save()) {
            $this->session->set_tempdata('success_message', 'Location added successfully.',3);
            redirect('portal/locations_list');
        } else {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/locations_list');
        }
    }

    public function edit_location_save() {
        $this->form_validation->set_rules('name', 'City Name', 'trim|required');
        $this->form_validation->set_rules('country_id', 'Country', 'trim|required');
        $this->form_validation->set_rules('state_id', 'Country', 'trim|required');
        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/locations_list');
        } else {
            if ($this->portal_model->edit_location_save()) {
                $this->session->set_tempdata('success_message', 'Location updated successfully.',3);
                redirect('portal/locations_list');
            } else {
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                redirect('portal/locations_list');
            }
        }
    }

    public function delete_location() {
        $this->db->where('location_id', $this->input->post('location_id'))->delete('locations');
    }

    public function get_country_states() {
        $result = $this->portal_model->get_country_states();
        echo json_encode($result);
    }

    public function office_desk_list() {
        $data['page_title'] = "Office Desk";
        $result = $this->portal_model->get_all_office_desk();
        $data['office_desk'] = $this->paginator->paginate($result, ['base_url' => 'portal/office-desk']);
        $data['search'] = $this->input->get('name');
        $data['main_view'] = "portal/office_desk";
        $this->load->view('portal/layout', $data);
    }

    public function add_office_desk_save() {
        $extension = pathinfo($_FILES['office_desk_file']['name'], PATHINFO_EXTENSION);
        $unique_no = uniqid(rand()) . time();
        $filename = $unique_no . '.' . $extension;

        $target_path = "./upload/office-desk/";

        if (!is_dir($target_path)) {
            mkdir($target_path);
        }
        $config = array();
        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] = $filename;
        $config['upload_path'] = $target_path;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('office_desk_file')) {
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
            redirect('portal/office-desk');
        }
        if ($this->portal_model->add_office_desk_document($filename)) {
            $this->session->set_tempdata('success_message', 'Document is added successfully.',3);
        } else {
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
        }
        redirect('portal/office-desk');
    }

    public function edit_office_desk_save() {
        $this->form_validation->set_rules('office_desk_name', 'Document Name', 'trim|required');
        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/office-desk');
        } else {
            if ($this->portal_model->edit_office_desk_save()) {
                $this->session->set_tempdata('success_message', 'Document updated successfully.',3);
                redirect('portal/office-desk');
            } else {
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                redirect('portal/office-desk');
            }
        }
    }

    public function delete_office_desk() {
        $this->db->where('office_desk_id', $this->input->post('office_desk_id'))->delete('office_desk');
    }

    public function download_office_desk_document($office_desk_id) {
        if ($result = $this->portal_model->get_office_document_by_id($office_desk_id)) {
            $url = file_get_contents(base_url('upload/office-desk/') . $result->office_desk_file);
            force_download($result->office_desk_name . '.' . pathinfo($result->office_desk_file, PATHINFO_EXTENSION), $url);
        } else {
            redirect('portal/office-desk');
        }
    }

//    extra tab before epolice page
    public function brands_dashboard_before() {
        $data['page_title'] = "Brand Dashboard";
        $data['main_view'] = "portal/brand_dashboard_flag";
        $data['total_countries'] = $this->db->count_all_results('countries');
        $data['total_states'] = $this->db->count_all_results('states');
        $data['total_cities'] = $this->db->count_all_results('cities');
        $this->load->view('portal/layout', $data);
    }



    public function brands_dashboard() {
        $data['page_title'] = "Brand Dashboard";
        $data['main_view'] = "portal/brand_dashboard";
        $data['total_countries'] = $this->db->count_all_results('countries');
        $data['total_states'] = $this->db->count_all_results('states');
        $data['total_cities'] = $this->db->count_all_results('cities');

        $this->load->view('portal/layout', $data);
    }

    public function locations() {
        $data['page_title'] = "Location";
        $data['main_view'] = "portal/location";
        $data['total_countries'] = $this->db->count_all_results('countries');
        $data['total_states'] = $this->db->count_all_results('states');
        $data['total_locations'] = $this->db->count_all_results('cities');
        $this->load->view('portal/layout', $data);
    }

    public function epolice_services() {
        $data['page_title'] = "ePolice Services";
        $data['main_view'] = "portal/epolice_services";
//        $data['total_countries'] = $this->db->count_all_results('countries');
//        $data['total_states'] = $this->db->count_all_results('states');
//        $data['total_cities'] = $this->db->count_all_results('cities');
        $this->load->view('portal/layout', $data);
    }

    public function security_screening() {
        $data['page_title'] = "Security Screening";
        $data['main_view'] = "portal/security_screening";
        $data['total_countries'] = $this->db->count_all_results('countries');
        $data['total_states'] = $this->db->count_all_results('states');
        $data['total_cities'] = $this->db->count_all_results('cities');

        $data['toatlNamebasedApplications'] = $this->portal_model->get_total_record('name_based_applications', '');
        $data['totalDigitalFingerprintApplications'] = $this->portal_model->get_total_record('digital_fingerprinting_applications', '');
        $data['totalRecordSuspensionApplications'] = $this->portal_model->get_total_record('record_suspension_applications', '');
        $data['totalUs_entry_wavier_Applications'] = $this->portal_model->get_total_record('us_entry_waiver_applications', '');

        $this->load->view('portal/layout', $data);
    }

    public function user_access() {
        $data['page_title'] = "User Access";
        $data['main_view'] = "portal/user_access";
        $data['total_roles'] = $this->db->count_all_results('user_roles');

        $this->load->view('portal/layout', $data);
    }

    public function prices() {
        $data['page_title'] = "Prices";
        $data['main_view'] = "portal/prices";
        $this->load->view('portal/layout', $data);
    }

    public function prices_details($slug) {
        $data['service'] = $service = $this->db->where('service_slug', $slug)->get('services')->row();
        $data['service_details'] = $this->portal_model->get_prices_details($service->service_id);
        $data['page_title'] = $service->service_name . " Prices";
        $data['main_view'] = "portal/prices_details";
        $this->load->view('portal/layout', $data);
    }

    public function update_price_save() {
        if ($result = $this->portal_model->update_price_save()) {
            echo json_encode($result);
        } else {
            echo 'failed';
        }
    }

    public function name_based_check_applications() {
        $data['user_roles'] = $this->db->query("SELECT * FROM user_roles")->result();

        $data['page_title'] = "Name Based Check Applications";
        $result = $this->portal_model->get_name_based_applications();

        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'portal/security-screening/name-based-check']);

        $whereNew = array('application_status' => 'New');
        $whereProcess = array('application_status' => 'Under Processing');
        $wherePending = array('application_status' => 'Pending Documents');
        $whereComplete = array('application_status' => 'Completed');
        $whereNotApplied = array('application_status' => 'Not Applied');

        $data['namebasedTotalNew'] = $this->portal_model->get_total_record('name_based_applications', $whereNew);
        $data['namebasedTotalUnderProcess'] = $this->portal_model->get_total_record('name_based_applications', $whereProcess);
        $data['namebasedTotalPendingDocuments'] = $this->portal_model->get_total_record('name_based_applications', $wherePending);
        $data['namebasedTotalCompelted'] = $this->portal_model->get_total_record('name_based_applications', $whereComplete);
        $data['namebasedTotalNotApplied'] = $this->portal_model->get_total_record('name_based_applications', $whereNotApplied);

        $data['client_id'] = $this->input->get('id');
        $data['f_name'] = $this->input->get('f_name');
        $data['l_name'] = $this->input->get('l_name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');
        $data['status'] = $this->input->get('application_status');

        $data['main_view'] = "portal/name_based_check_applications";
        $this->load->view('portal/layout', $data);
    }


    public function get_user_by_role() {
        $this->db->where('user_role_id', $this->input->post('state_id'));
        $result = $this->db->order_by('first_name', 'ASC')->get('users')->result();
        $data = '<option value="">Select User</option>';
        foreach ($result as $value) {
            $data .= '<option value="' . $value->id . '">' . $value->email . '</option>';
        }
        echo $data;
    }

    public function name_based_check_application_details($application_id) {
        $data['page_title'] = "Name Based Check Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->portal_model->get_name_based_application_details($application_id);
        $data['services'] = $this->portal_model->get_name_based_application_services($application_id);
        $data['offences'] = $this->portal_model->get_name_based_application_offences($application_id);

        $data['comment_id'] = $this->db->query("SELECT * FROM application_comments WHERE application_id = '$application_id' ORDER BY created_at DESC LIMIT 1")->result_array();



        $data['comments'] = $this->portal_model->get_application_comments($application_id, 'name-based-check');


//        application status
        $data['status'] = $this->db->query("SELECT * FROM application_status WHERE application_id = '$application_id' ORDER BY created_at DESC LIMIT 1")->result();

//        var_dump($data['status']); die();

//        update the status to zero show that visited application it is
        $this->portal_model->update_application_status($application_id);

        $data['main_view'] = "portal/name_based_check_application_details";
        $this->load->view('portal/layout', $data);
    }

    public function name_based_check_application_download($application_id) {
        $this->load->library('pdfgenerator');
        $data['page_title'] = "Name Based Check Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->portal_model->get_name_based_application_details($application_id);
        $data['services'] = $this->portal_model->get_name_based_application_services($application_id);
        $data['offences'] = $this->portal_model->get_name_based_application_offences($application_id);
        $html = $this->load->view('portal/name_based_check_application_download', $data, true);
        $filename = 'Name Based Check Application - ' . $application_id;
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }

    public function digital_fingerprinting_applications() {
        $data['page_title'] = "Digital Fingerprinting Applications";
        $data['user_roles'] = $this->db->query("SELECT * FROM user_roles")->result();
        $result = $this->portal_model->get_digital_fingerprinting_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'portal/security-screening/digital-fingerprinting']);

        $whereNew = array('application_status' => 'New');
        $whereProcess = array('application_status' => 'Under Processing');
        $wherePending = array('application_status' => 'Pending Documents');
        $whereComplete = array('application_status' => 'Completed');
        $whereNotApplied = array('application_status' => 'Not Applied');

        $data['digitalTotalNew'] = $this->portal_model->get_total_record('digital_fingerprinting_applications', $whereNew);
        $data['digitalTotalUnderProcess'] = $this->portal_model->get_total_record('digital_fingerprinting_applications', $whereProcess);
        $data['digitalTotalPendingDocuments'] = $this->portal_model->get_total_record('digital_fingerprinting_applications', $wherePending);
        $data['digitalTotalCompelted'] = $this->portal_model->get_total_record('digital_fingerprinting_applications', $whereComplete);
        $data['digitalTotalNotApplied'] = $this->portal_model->get_total_record('digital_fingerprinting_applications', $whereNotApplied);

        $data['client_id'] = $this->input->get('id');
        $data['f_name'] = $this->input->get('f_name');
        $data['l_name'] = $this->input->get('l_name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');
        $data['status'] = $this->input->get('application_status');
        $data['main_view'] = "portal/digital_fingerprinting_applications";
        $this->load->view('portal/layout', $data);
    }

    public function digital_fingerprinting_application_details($application_id) {
        $data['page_title'] = "Digital Fingerprinting Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->portal_model->get_digital_fingerprinting_application_details($application_id);
        $data['services'] = $this->portal_model->get_digital_fingerprinting_application_services($application_id);
        $data['options'] = $this->portal_model->get_digital_fingerprinting_application_options($application_id);


        $data['comment_id'] = $this->db->query("SELECT * FROM application_comments WHERE application_id = '$application_id' ORDER BY created_at DESC LIMIT 1")->result_array();

        $data['comments'] = $this->portal_model->get_application_comments($application_id, 'digital-fingerprinting');

        //        application status
        $data['status'] = $this->db->query("SELECT * FROM application_status WHERE application_id = '$application_id' ORDER BY created_at DESC LIMIT 1")->result();

        //        update the status to zero show that visited application it is
        $this->portal_model->update_digital_fingerprinting_application_status($application_id);


        $data['main_view'] = "portal/digital_fingerprinting_application_details";
        $this->load->view('portal/layout', $data);
    }

    public function digital_fingerprinting_application_download($application_id) {
        $this->load->library('pdfgenerator');
        $data['page_title'] = "Digital Fingerprinting Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->portal_model->get_digital_fingerprinting_application_details($application_id);
        $data['services'] = $this->portal_model->get_digital_fingerprinting_application_services($application_id);
        $data['options'] = $this->portal_model->get_digital_fingerprinting_application_options($application_id);
        $html = $this->load->view('portal/digital_fingerprinting_application_download', $data, true);
        $filename = 'Digital Fingerprinting Application - ' . $application_id;
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }

    public function record_suspension_applications() {
        $data['user_roles'] = $this->db->query("SELECT * FROM user_roles")->result();
        $data['page_title'] = "Record Suspension Applications";
        $result = $this->portal_model->get_record_suspension_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'portal/security-screening/record-suspension']);

        $whereNew = array('application_status' => 'New');
        $whereProcess = array('application_status' => 'Under Processing');
        $wherePending = array('application_status' => 'Pending Documents');
        $whereComplete = array('application_status' => 'Completed');
        $whereNotApplied = array('application_status' => 'Not Applied');

        $data['recordTotalNew'] = $this->portal_model->get_total_record('record_suspension_applications', $whereNew);
        $data['recordTotalUnderProcess'] = $this->portal_model->get_total_record('record_suspension_applications', $whereProcess);
        $data['recordTotalPendingDocuments'] = $this->portal_model->get_total_record('record_suspension_applications', $wherePending);
        $data['recordTotalCompelted'] = $this->portal_model->get_total_record('record_suspension_applications', $whereComplete);
        $data['recordTotalNotApplied'] = $this->portal_model->get_total_record('record_suspension_applications', $whereNotApplied);

        $data['client_id'] = $this->input->get('id');
        $data['f_name'] = $this->input->get('f_name');
        $data['l_name'] = $this->input->get('l_name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');
        $data['status'] = $this->input->get('application_status');

        $data['main_view'] = "portal/record_suspension_applications";
        $this->load->view('portal/layout', $data);
    }

    public function record_suspension_application_details($application_id) {
        $data['page_title'] = "Record Suspension Application details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->portal_model->get_record_suspension_application_details($application_id);
        $data['services'] = $this->portal_model->get_record_suspension_application_services($application_id);
        $data['offences'] = $this->portal_model->get_record_suspension_application_offences($application_id);

        $data['comment_id'] = $this->db->query("SELECT * FROM application_comments WHERE application_id = '$application_id' ORDER BY created_at DESC LIMIT 1")->result_array();

        $data['comments'] = $this->portal_model->get_application_comments($application_id, 'record-suspension');

        $data['status'] = $this->db->query("SELECT * FROM application_status WHERE application_id = '$application_id' ORDER BY created_at DESC LIMIT 1")->result();


        //        update the status to zero show that visited application it is
        $this->portal_model->update_Record_Suspension_Applications_status($application_id);

        $data['main_view'] = "portal/record_suspension_application_details";
        $this->load->view('portal/layout', $data);
    }

    public function record_suspension_application_download($application_id) {
        $this->load->library('pdfgenerator');
        $data['page_title'] = "Record Suspension Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->portal_model->get_record_suspension_application_details($application_id);
        $data['services'] = $this->portal_model->get_record_suspension_application_services($application_id);
        $data['offences'] = $this->portal_model->get_record_suspension_application_offences($application_id);
        $html = $this->load->view('portal/record_suspension_application_download', $data, true);
        $filename = 'Record Suspension Application - ' . $application_id;
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }

    public function us_entry_waiver_applications() {
        $data['page_title'] = "U.S. Entry Waiver Applications";
        $result = $this->portal_model->get_us_entry_waiver_applications();
        $data['applications'] = $this->paginator->paginate($result, ['base_url' => 'portal/security-screening/us-entry-waiver']);

        $data['user_roles'] = $this->db->query("SELECT * FROM user_roles")->result();

        $whereNew = array('application_status' => 'New');
        $whereProcess = array('application_status' => 'Under Processing');
        $wherePending = array('application_status' => 'Pending Documents');
        $whereComplete = array('application_status' => 'Completed');
        $whereNotApplied = array('application_status' => 'Not Applied');

        $data['usTotalNew'] = $this->portal_model->get_total_record('us_entry_waiver_applications', $whereNew);
        $data['usTotalUnderProcess'] = $this->portal_model->get_total_record('us_entry_waiver_applications', $whereProcess);
        $data['usTotalPendingDocuments'] = $this->portal_model->get_total_record('us_entry_waiver_applications', $wherePending);
        $data['usTotalCompelted'] = $this->portal_model->get_total_record('us_entry_waiver_applications', $whereComplete);
        $data['usTotalNotApplied'] = $this->portal_model->get_total_record('us_entry_waiver_applications', $whereNotApplied);

        $data['client_id'] = $this->input->get('id');
        $data['f_name'] = $this->input->get('f_name');
        $data['l_name'] = $this->input->get('l_name');
        $data['phone'] = $this->input->get('phone');
        $data['dob'] = $this->input->get('dob');
        $data['status'] = $this->input->get('application_status');
        $data['main_view'] = "portal/us_entry_waiver_applications";
        $this->load->view('portal/layout', $data);
    }

    public function us_entry_waiver_application_details($application_id) {
        $data['page_title'] = "U.S. Entry Waiver Application";
        $data['application_id'] = $application_id;
        $data['application'] = $this->portal_model->get_us_entry_waiver_application_details($application_id);
        $data['services'] = $this->portal_model->get_us_entry_waiver_application_services($application_id);
        $data['offences'] = $this->portal_model->get_us_entry_waiver_application_offences($application_id);

        $data['comment_id'] = $this->db->query("SELECT * FROM application_comments WHERE application_id = '$application_id' ORDER BY created_at DESC LIMIT 1")->result_array();

        $data['comments'] = $this->portal_model->get_application_comments($application_id, 'us-entry-waiver');

        $data['status'] = $this->db->query("SELECT * FROM application_status WHERE application_id = '$application_id' ORDER BY created_at DESC LIMIT 1")->result();
        //        update the status to zero show that visited application it is
        $this->portal_model->update_us_entry_application_status($application_id);


        $data['main_view'] = "portal/us_entry_waiver_application_details";
        $this->load->view('portal/layout', $data);
    }

    public function us_entry_waiver_application_download($application_id) {
        $this->load->library('pdfgenerator');
        $data['page_title'] = "U.S. Entry Waiver Application Details";
        $data['application_id'] = $application_id;
        $data['application'] = $this->portal_model->get_us_entry_waiver_application_details($application_id);
        $data['services'] = $this->portal_model->get_us_entry_waiver_application_services($application_id);
        $data['offences'] = $this->portal_model->get_us_entry_waiver_application_offences($application_id);
        $html = $this->load->view('portal/us_entry_waiver_application_download', $data, true);
        $filename = 'U.S. Entry Waiver Application - ' . $application_id;
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }

    public function add_application_comment_save() {
        $this->portal_model->add_application_comment_save();
        redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#comments');
    }

    public function agents_list() {
        $data['page_title'] = "Agents List";
        $data["agent_list"] = $this->portal_model->get_all_agents_drop_down();
        $result = $this->portal_model->get_all_agents();
        $data['users'] = $this->paginator->paginate($result, ['base_url' => 'portal/agents']);
        $data["states"] = $this->portal_model->get_states('Canada');

        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();

        $where = array('user_role_id' => '5f513b61-67f9-44b5-9c9d-5bb46e20');
        $data['agents'] = $this->portal_model->get_total_record('users', $where);

        $data['client_id'] = $this->input->get('id');
        $data['company'] = $this->input->get('company');
        $data['telephone'] = $this->input->get('telephone');
        $data['address'] = $this->input->get('address');
        $data['user_role'] = $this->input->get('user_role');
        $data['status'] = $this->input->get('status');

        $data['main_view'] = "portal/agents";
        $this->load->view('portal/layout', $data);
    }

    public function fetch_state()
    {
        if($this->input->post('country_id'))
        {
            echo $this->portal_model->fetch_state($this->input->post('country_id'));
        }
    }

    function fetch_city()
    {
        if($this->input->post('state_id'))
        {
            echo $this->portal_model->fetch_city($this->input->post('state_id'));
        }
    }

    public function add_agent_save() {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Email', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('state_id', 'State', 'trim|required');
        $this->form_validation->set_rules('city_id', 'City', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
//        if (!$this->form_validation->run()) {
//            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
//            $this->session->set_tempdata('add_user_error', 'Something went wrong. Please try again!',3);
//            $this->agents_list();
//        } else {
//        $this->portal_model->add_agent_save();
//        die();
        if ($this->portal_model->add_agent_save()) {
            $this->session->set_tempdata('success_message', 'Agent added successfully.',3);
            redirect('portal/agents');
        } else {
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            redirect('portal/agents');
        }
//        }
    }

    public function edit_agent_save() {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
//        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Email', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('state_id', 'State', 'trim|required');
        $this->form_validation->set_rules('city_id', 'City', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
//        if (!$this->form_validation->run()) {
//            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
//            $this->session->set_tempdata('add_agent_error', 'Something went wrong. Please try again!',3);
////            redirect('portal/users');
//            $this->agents_list();
//        } else {
        if ($this->portal_model->edit_agent_save()) {
            $this->session->set_tempdata('success_message', 'Agent updated successfully.',3);
            redirect('portal/agents');
        } else {
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            redirect('portal/agents');
        }
//        }
    }

    public function delete_agent() {
        $this->db->where('id', $this->input->post('agent_id'))->delete('agents');
    }

    public function corporates_list() {
        $data['page_title'] = "Corporates List";
        $result = $this->portal_model->get_all_corporates();


        $data['users'] = $this->paginator->paginate($result, ['base_url' => 'portal/corporates']);
        $data["states"] = $this->portal_model->get_states('Canada');

//        $corporateId = $this->session->userdata('user_id');
        $corporateId = "2dd65df9-7ed5-45bd-bef1-f2afa31a";

        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();

        $data['corporates'] = $this->db->where('user_role_id', $corporateId)->get('users')->result();

        $data['search'] = $this->input->get('name');

        $data['status'] = $this->input->get('status');

        $data['main_view'] = "portal/corporates";

        $where = array('user_role_id' => $corporateId);
        $data['corporate'] = $this->portal_model->get_total_record('users', $where);
        $this->load->view('portal/layout', $data);
    }

    public function reseller_list() {
        $data['page_title'] = "Reseller List";
        $data["states"] = $this->portal_model->get_states('Canada');
        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();

        $result = $this->portal_model->get_all_resellers();
        $data['users'] = $this->paginator->paginate($result, ['base_url' => 'portal/reseller']);

        $where = array('user_role_id' => 'c949666c-b282-4ad4-8ecb-fc7b1e10');
        $data['reseller'] = $this->portal_model->get_total_record('users', $where);
//        var_dump($data['users']); die();
//        $data["states"] = $this->portal_model->get_states('Canada');
//        $corporateId = $this->session->userdata('user_id');
//        $corporateId = "2dd65df9-7ed5-45bd-bef1-f2afa31a";
//        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();
//        $data['corporates'] = $this->db->where('user_role_id', $corporateId)->get('users')->result();
//        $data['search'] = $this->input->get('name');
//        $data['status'] = $this->input->get('status');

        $data['main_view'] = "portal/reseller";
        $this->load->view('portal/layout', $data);
    }

    public function add_corporate_save() {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Email', 'trim|required|min_length[8]');
//        if (!$this->form_validation->run()) {
//            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
//            $this->session->set_tempdata('add_user_error', 'Something went wrong. Please try again!',3);
//            $this->corporates_list();
//        } else {
//        $this->portal_model->add_corporate_save(); die();
        if ($this->portal_model->add_corporate_save()) {
            $this->session->set_tempdata('success_message', 'Corporate added successfully.',3);
            redirect('portal/corporates');
        } else {
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            redirect('portal/corporates');
        }
//        }
    }

    public function add_reseller_save() {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Email', 'trim|required|min_length[8]');
//        if (!$this->form_validation->run()) {
//            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
//            $this->session->set_tempdata('add_user_error', 'Something went wrong. Please try again!',3);
//            $this->corporates_list();
//        } else {
//        $this->portal_model->add_corporate_save(); die();
        if ($this->portal_model->add_reseller_save()) {
            $this->session->set_tempdata('success_message', 'reseller added successfully.',3);
            redirect('portal/reseller_list');
        } else {
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            redirect('portal/reseller_list');
        }
//        }
    }

    public function edit_corporate_save() {
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
//        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
//        $this->form_validation->set_rules('password', 'Email', 'trim|required|min_length[8]');
        if (!$this->form_validation->run()) {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            $this->session->set_tempdata('add_user_error', 'Something went wrong. Please try again!',3);
//            redirect('portal/users');
            $this->corporates_list();
        } else {
            if ($this->portal_model->edit_corporate_save()) {
                $this->session->set_tempdata('success_message', 'Corporate updated successfully.',3);
                redirect('portal/corporates');
            } else {
                $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
                redirect('portal/corporates');
            }
        }
    }

    public function delete_corporate() {
        $this->db->where('id', $this->input->post('corporate_id'))->delete('corporates');
    }



//    new coding
//    new coding
//    new coding
    public function save_edit_application_status(){
        $update_status = $this->portal_model->edit_status_save();
        if ($update_status) {

            //            notification entry
            $tableName = "name_based_applications";
            $id = $this->input->post('name_based_application_id');
            $details = "Name based application's Comment/status updated";

            $data = array(
                'table_id' => $id,
                'table_name' => $tableName,
                'description' => $details
            );
            $submitResult = $this->portal_model->save_notification($data);

            $this->session->set_tempdata('success_message', 'Application status updated successfully.',3);
            redirect('portal/security-screening/name-based-check');
        } else {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/security-screening/name-based-check');
        }
    }

    public function save_upload_certificate(){
        $extension = pathinfo($_FILES['office_desk_file']['name'], PATHINFO_EXTENSION);
        $unique_no = uniqid(rand()) . time();
        $filename = $unique_no . '.' . $extension;
        $target_path = "./upload/user_certificates/";

        if (!is_dir($target_path)) {
            mkdir($target_path);
        }
        $config = array();
//        $config['allowed_types'] = '*';
        $config['allowed_types'] = 'gif|jpg|png|pdf|jpeg';
        $config['max_size'] = 12000;
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['file_name'] = $filename;
        $config['upload_path'] = $target_path;

        $id = $this->input->post('name_based_application_id');

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('office_desk_file')) {
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
            redirect('portal/name_based_check_applications');
        }
        if ($this->portal_model->upload_certificate($filename, $id)) {

//            notification entry
            $tableName = "name_based_applications";
            $id = $this->input->post('name_based_application_id');
            $details = "Name based application's Certificate Uploaded";

            $data = array(
                'table_id' => $id,
                'table_name' => $tableName,
                'description' => $details
            );
            $submitResult = $this->portal_model->save_notification($data);

            $this->session->set_tempdata('success_message', 'Document is added successfully.',3);
        } else {
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
        }
        redirect('portal/name_based_check_applications');
    }


    public function get_notification(){
        $tot = $this->portal_model->total_notifications();
        echo json_encode($tot);
    }


    public function notificationDetails(){
        $id = $this->uri->segment('3');
        $tableName = $this->uri->segment('4');

        if($tableName == "countries"){
            $data['record'] = $this->portal_model->get_country_by_id($id, $tableName);
            $data['page'] = "country_by_id";
            $this->load->view('portal/layout', $data);
        }
        elseif($tableName == "name_based_applications"){
            $data['record'] = $this->portal_model->get_namebasedapplication_by_id($id, $tableName);
            $data['page'] = "name_based_applications";
            $this->load->view('portal/layout', $data);
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

        if ($this->portal_model->update_certificate_of_namsebase_application($filename, $id)) {

//            notification entry
            $tableName = "name_based_applications";
            $id = $this->input->post('name_based_application_id');
            $details = "Name based application's Certificate updated";
            $data = array(
                'table_id' => $id,
                'table_name' => $tableName,
                'description' => $details
            );
            $submitResult = $this->portal_model->save_notification($data);
            //            end notification entry

            $this->session->set_tempdata('success_message', 'Document is added successfully.',3);
        } else {
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
        }
        redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#comments');
    }

    public function forward_application_to_user(){
        $data = array(
            "user_role_id" => $this->input->post('state_id'),
            "user_id" => $this->input->post('city_id'),
            "application_id" => $this->input->post('name_based_application_id'),
            "application_type" => "Name Based Check Applications"
        );
        $save_data = $this->portal_model->forward_application_to_user($data);

        if ($save_data) {
            $this->session->set_tempdata('success_message', 'Application forwarded successfully.',3);
            redirect('portal/security-screening/name-based-check');
        } else {
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            redirect('portal/security-screening/name-based-check');
        }
    }


    public function forward_us_entry_waiver_application_to_user(){
        $data = array(
            "user_role_id" => $this->input->post('state_id'),
            "user_id" => $this->input->post('city_id'),
            "application_id" => $this->input->post('us_entry_waiver_application_id'),
            "application_type" => "U.S. Entry Waiver Applications"
        );
        $save_data = $this->portal_model->forward_application_to_user($data);

        if ($save_data) {
            $this->session->set_tempdata('success_message', 'Application forwarded successfully.',3);
            redirect('portal/security-screening/us-entry-waiver');
        } else {
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            redirect('portal/security-screening/us-entry-waiver');
        }
    }

//    update the status of detail namebaseapplication that applicaiton is new underProcess or complete
    public function add_application_status_save(){
        $this->portal_model->add_application_status_save();
        redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#status');
    }

    public function add_application_status_save_digital_fingerprinting_application(){
        $this->portal_model->add_application_status_save_digital_fingerprinting_application();
        redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#status');
    }

    public function add_application_status_save_record_suspension_application(){
        $this->portal_model->add_application_status_save_record_suspension_application();
        redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#status');
    }

    public function add_application_status_save_u_s_entry_waiver_application(){
        $this->portal_model->add_application_status_save_u_s_entry_waiver_application();
        redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#status');
    }

    //    update application certificate
    public function add_us_entry_waiver_applications_save() {
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
        if ($this->portal_model->update_certificate_of_us_entry_waiver_application($filename, $id)) {

//            notification entry
            $tableName = "us_entry_waiver_applications";
            $id = $this->input->post('application_id');
            $details = "US Entry Waiver_applications added";
            $data = array(
                'table_id' => $id,
                'table_name' => $tableName,
                'description' => $details
            );
            $submitResult = $this->portal_model->save_notification($data);
//                        end notification entry

            $this->session->set_tempdata('success_message', 'Document is added successfully.',3);
        } else {
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
        }
        redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#comments');
    }

    public function delete_certificate(){
        $application_id = $this->input->post('application_id');
        $table_name = $this->input->post('table_name');
        if($this->portal_model->delete_certificate($application_id, $table_name)){
            $this->session->set_tempdata('success_message', 'Document is added successfully.',3);
            redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#comments');
        }
        else{
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
            redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#comments');
        }
    }

    public function delete_certificate_namebase(){
        $application_id = $this->input->post('application_id');
        $table_name = $this->input->post('table_name');
        if($this->portal_model->delete_certificate_namebase($application_id, $table_name)){
            $this->session->set_tempdata('success_message', 'Document is added successfully.',3);
            redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#comments');
        }
        else{
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
            redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#comments');
        }
    }

    public function delete_certificate_digital(){
        $application_id = $this->input->post('application_id');
        $table_name = $this->input->post('table_name');
        if($this->portal_model->delete_certificate_digital($application_id, $table_name)){
            $this->session->set_tempdata('success_message', 'Document is added successfully.',3);
            redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#comments');
        }
        else{
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
            redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#comments');
        }
    }

    public function delete_certificate_record_suspensio(){
        $application_id = $this->input->post('application_id');
        $table_name = $this->input->post('table_name');
        if($this->portal_model->delete_certificate_record_suspensio($application_id, $table_name)){
            $this->session->set_tempdata('success_message', 'Document is added successfully.',3);
            redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#comments');
        }
        else{
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
            redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#comments');
        }
    }

    public function change_agent_status(){
        $id = $this->input->post('id');
        $status = $this->input->post('status');
//        echo $id . $status; die();
        if($this->portal_model->change_agent_status($status, $id)){
            $this->session->set_tempdata('success_message', 'Status Update Successfully.',3);
            redirect('portal/agents/');
        }
        else{
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
            redirect('portal/agents/');
        }
    }


//communication between GAC and agent. e.g sending invoices to agent.
    public function add_application_conversation_save() {
        $this->portal_model->add_application_conversation_save();
        redirect('agent/message');
    }

    public function message(){
        $data['page_title'] = "Message";
        $data['main_view'] = "portal/conversation";
//        $data['account'] = $this->db->where('id', $this->session->userdata('agent_id'))->get('agents')->row();
        $data['comments'] = $this->db->where('created_by', $_GET['id'])->order_by('created_at', 'DESC')->get('communication_gac_agent')->result();
        $this->load->view('portal/layout', $data);
    }

    public function add_application_conversation_save_by_admin() {
        $this->portal_model->add_application_conversation_save_by_admin();
        redirect('portal/message/?id=' . $this->input->post('agent_id') );
    }

    public function get_comment_data_save(){
        $data = array(
            'comment' => $this->input->post('comment'),
            'application_id' => $this->input->post('application_id'),
            'type'=>$this->input->post('type'),
            'created_by'=>$this->input->post('created_by'),
        );
        $result=$this->portal_model->get_comment_data_save($data);

//        now files uploading
        if($result)
        {
            echo 1;
        }
        else
        {
            echo  0;
        }
    }



    public function multiple_file_upload(){
        //            file uploading code
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
                    $uploadPath = 'upload/comment_files/';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = '*';

                    // Load and initialize upload library
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    // Upload file to server
                    if($this->upload->do_upload('file')){
                        // Uploaded file data
                        $fileData = $this->upload->data();
                        $uploadData[$i]['file_name'] = $fileData['file_name'];
                        $uploadData[$i]['application_id'] = $this->input->post('application_id');
                        $uploadData[$i]['application_type'] = $this->input->post('type');
                        $uploadData[$i]['created_by'] = $this->input->post('submitted_by');
                        $uploadData[$i]['comment_id'] = $this->input->post('comment_id');
                    }else{
                        $errorUploadType .= $_FILES['file']['name'].' | ';
                    }
                }
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):'';
                if(!empty($uploadData)){
                    // Insert files data into the database
                    $insert = $this->portal_model->multiple_file_upload($uploadData);

                    redirect('portal/security-screening/'. $this->input->post('type') .'/details/'.  $this->input->post('application_id') );

                    // Upload status message
                }else{
                    $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
                }
            }else{
                $statusMsg = 'Please select image files to upload.';
            }
        }
    }


    public function delete_comment(){
        $id = $this->input->post('comment_id');
        $type = $this->input->post('type');
        $this->portal_model->delete_comment($id, $type);
        redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id'));
    }

    public function delete_file(){
        $file_id = $this->input->post('file_id');
        $type = $this->input->post('type');
        $this->portal_model->delete_file($file_id, $type);
        redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id'));
    }



    public function change_corporate_status(){
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if($this->portal_model->change_corporate_status($status, $id)){
            $this->session->set_tempdata('success_message', 'Status Update Successfully.',3);
            redirect('portal/corporates/');
        }
        else{
            $this->session->set_tempdata('no_access', 'Something went wrong! Please try again.',3);
            redirect('portal/corporates/');
        }
    }

    public function view_service_order_images(){
        $data['page_title'] = "Service Order";

        $data['user_roles'] = $this->db->query("SELECT * FROM users where user_role_id = 'c949666c-b2f2-4ad4-8ecb-fc7b1ec0' ")->result();


        $data['service_order_images'] = $this->db->query("SELECT * FROM service_order_images ORDER BY created_at DESC")->result_array();

        $data['main_view'] = "portal/view_service_order_images";
        $this->load->view('portal/layout', $data);
    }

    public function forward_service_order_images_to_reception(){
        $reception_id = $this->input->post('reception_id');
        $picture_id = $this->input->post('picture_id');

        $update_data = $this->portal_model->forward_service_order_images_to_reception($reception_id, $picture_id);

        if ($update_data) {
            $this->session->set_tempdata('success_message', 'Application forwarded successfully.',3);
            redirect('portal/view_service_order_images');
        } else {
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            redirect('portal/view_service_order_images');
        }
    }

    public function coupons(){
        $data['page_title'] = "Coupon";

//        $this->load->library('uuid');

        $result = $this->portal_model->get_all_coupons_details();
        $data['users'] = $this->paginator->paginate($result, ['base_url' => 'portal/coupons']);

        $data['corporate_users'] = $this->db->where('user_role_id', '2dd65df9-7ed5-45bd-bef1-f2afa31a')->get('users')->result();
        $data['agent_users'] = $this->db->where('user_role_id', '5f513b61-67f9-44b5-9c9d-5bb46e20')->get('users')->result();

//        var_dump($data['corporate_users']);

        $data['search'] = $this->input->get('name');
        $data['main_view'] = "portal/coupons";
        $this->load->view('portal/layout', $data);
    }

    public function add_corporate_coupon_save() {
//        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
//        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
//        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
//        $this->form_validation->set_rules('password', 'Email', 'trim|required|min_length[8]');
//        $this->form_validation->set_rules('user_role_id', 'User Role', 'trim|required');
//        if (!$this->form_validation->run()) {
//            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
//            $this->session->set_tempdata('add_user_error', 'Something went wrong. Please try again!',3);
//            redirect('portal/users');
//            $this->users_list();
//        } else {
        if (!$this->portal_model->add_corporate_coupon_save()) {
            $this->session->set_tempdata('success_message', 'Coupon added successfully.',3);
            redirect('portal/coupons');
        } else {

//<!--                <div class="alert alert-danger">-->
//
            $this->session->set_tempdata('error_message', 'Something went wrong. Please try again!',3);
            redirect('portal/coupons');
        }
//        }
    }


    public function add_agent_coupon_save() {
//        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
//        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
//        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
//        $this->form_validation->set_rules('password', 'Email', 'trim|required|min_length[8]');
//        $this->form_validation->set_rules('user_role_id', 'User Role', 'trim|required');
//        if (!$this->form_validation->run()) {
//            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
//            $this->session->set_tempdata('add_user_error', 'Something went wrong. Please try again!',3);
//            redirect('portal/users');
//            $this->users_list();
//        } else {
        if ($this->portal_model->add_agent_coupon_save()) {
            $this->session->set_tempdata('success_message', 'Coupon added successfully.',3);
            redirect('portal/coupons');
        } else {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/coupons');
        }
//        }
    }

    public function add_outsider_user_coupon_save() {
//        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
//        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
//        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
//        $this->form_validation->set_rules('password', 'Email', 'trim|required|min_length[8]');
//        $this->form_validation->set_rules('user_role_id', 'User Role', 'trim|required');
//        if (!$this->form_validation->run()) {
//            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
//            $this->session->set_tempdata('add_user_error', 'Something went wrong. Please try again!',3);
//            redirect('portal/users');
//            $this->users_list();
//        } else {
        if ($this->portal_model->add_outsider_user_coupon_save()) {
            $this->session->set_tempdata('success_message', 'Coupon added successfully.',3);
            redirect('portal/coupons');
        } else {
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/coupons');
        }
//        }
    }



//    invoicing details
//    invoicing details
//    invoicing details



    public function get_account_invoices() {
        $data['page_title'] = "Accounts List";
        $result = $this->portal_model->get_all_account_list_invoices();
        $data['account_list'] = $this->paginator->paginate($result, ['base_url' => 'portal/get_account_invoices']);
        $data['main_view'] = "portal/account_invoice_list";
        $this->load->view('portal/layout', $data);
    }

    public function get_invoice_list_by_account(){
        $id = $this->uri->segment(3);
        $account_id = get_account_id_by_user_id($id);

        $data['page_title'] = "Invoices List by User";
        $result = $this->portal_model->get_individual_account_invoice_list($account_id);
//        var_dump($result); die();
        $data['account_list'] = $this->paginator->paginate($result, ['base_url' => 'portal/get_invoice_by_account']);
//        $data['main_view'] = "portal/account_invoice_list";
        $data['main_view'] = "portal/get_invoice_list_by_account";
        $this->load->view('portal/layout', $data);
    }

    public function get_invoice_detail(){
        $id = $this->uri->segment(3);

        $data['page_title'] = "Invoices Detail";
        $data['result'] = $this->portal_model->get_invoice_detail($id);
        $data['main_view'] = "portal/get_invoice_detail";
        $this->load->view('portal/layout', $data);
    }

    public function invoice_description(){
        $id = $this->uri->segment('3');
        $data['result'] = $this->db->where('invoice_id ', $id)->get('invoices')->row();

        $data['main_view'] = "portal/get_invoice_detail";
        $this->load->view('portal/layout', $data);
    }



//    accounts portion start here
//    accounts portion start here
//    accounts portion start here
//    accounts portion start here

    public function get_users(){
        $data['user_list'] = $this->db->where('user_role_id', '3ee65tf9-7ed5-45ft-hdk1-f2afa31b')->get('users')->result();

        $data['page_title'] = "Individual Users Accounts";
        $data['main_view'] = "portal/accounts/individual_users_list";
        $this->load->view('portal/layout', $data);
    }

    public function get_users_application_list_accounts(){
        $id = $this->uri->segment('3');
        $data['result'] = $this->db->where('register_user_id ', $id)->get('name_based_applications')->result();
        $data['page_title'] = "Individual Users Applications";
        $data['main_view'] = "portal/accounts/individual_users_applications_list";
        $this->load->view('portal/layout', $data);
    }

    public function get_application_by_id(){
        $id = $this->uri->segment('3');
        $data['result'] = $this->db->where('name_based_application_id', $id)->get('name_based_applications')->result();
        $data['page_title'] = "Individual User Application detail";
        $data['main_view'] = "portal/accounts/individual_application_detail";
        $this->load->view('portal/layout', $data);
    }

    public function get_corporate_users(){
//        corporate users
        $data['user_list'] = $this->db->where('user_role_id', '2dd65df9-7ed5-45bd-bef1-f2afa31a')->get('users')->result();


//        corporate Sub - Users
//        $data['sub_corporate_user_list'][0] = $this->db->where('super_corporate_employee_id', $data['user_list'][0]->id)->get('users')->result();
//        $data['sub_corporate_user_list'][1] = $this->db->where('super_corporate_employee_id', $data['user_list'][1]->id)->get('users')->result();

//        Sub - Users applications
//        $data['sub_corporate_users_application_list'] = $this->db->where('sub_corporate_id', $data['sub_corporate_user_list'][0][0]->id)->get('name_based_applications')->result();


//        var_dump($data['sub_corporate_users_application_list']); die();


//        var_dump($data['sub_corporate_user_list'][0][0]->id);
//        var_dump($data['sub_corporate_user_list'][0][1]->id);

//        die();

        $data['page_title'] = "Corporate Users Accounts";
        $data['main_view'] = "portal/accounts/corporate_users_list";
        $this->load->view('portal/layout', $data);
    }

    public function test_join(){
        $data['result'] = $this->portal_model->test_join();
        var_dump($data['result']);
    }




    public function get_corporate_users_application_list_accounts(){
        $id = $this->uri->segment('3');
        $data['result'] = $this->db->where('super_corporate_employee_id', $id)->get('users')->result();


        $id = $data['result'][0]->id;

        //        get grand total of complete applications
        $data['result1'] = $this->db->select_sum('grand_total')->where('sub_corporate_id', $id)->where('payment_status', 1)->get('name_based_applications')->result();
//        get the remainig amount of application
        $data['result2'] = $this->db->select_sum('grand_total')->where('sub_corporate_id', $id)->where('payment_status', 0)->get('name_based_applications')->result();


        $data['page_title'] = "Sub - Corporate Users";
        $data['main_view'] = "portal/accounts/corporate_sub_users_list";
        $this->load->view('portal/layout', $data);
    }


    public function get_sub_corporate_users_application_list(){
        $id = $this->uri->segment('3');
//        get the applications
        $data['result'] = $this->db->where('sub_corporate_id', $id)->get('name_based_applications')->result();

        $data['page_title'] = "Sub-Corporate Users";
        $data['main_view'] = "portal/accounts/corporate_sub_users_application_list";
        $this->load->view('portal/layout', $data);
    }


//    agent account section
    public function get_agent_users(){
        $data['user_list'] = $this->db->where('user_role_id', '5f513b61-67f9-44b5-9c9d-5bb46e20')->get('users')->result();

        $data['page_title'] = "Agent Users Accounts";
        $data['main_view'] = "portal/accounts/agent_users_list";
        $this->load->view('portal/layout', $data);
    }

    public function get_agent_users_list_accounts(){
        $id = $this->uri->segment('3');
        $data['result'] = $this->db->where('super_agent_employee_id', $id)->get('users')->result();
        $data['page_title'] = "Agent Sub-Users Applications";
        $data['main_view'] = "portal/accounts/agent_sub_users_list";
        $this->load->view('portal/layout', $data);
    }

    public function get_sub_agents_users_application_list(){
        $id = $this->uri->segment('3');
        $data['result'] = $this->db->where('sub_agent_id', $id)->get('name_based_applications')->result();
        $data['page_title'] = "Agent Sub-Users Applications";
        $data['main_view'] = "portal/accounts/agent_sub_users_application_list";
        $this->load->view('portal/layout', $data);
    }

//    payment section
//    payment section
//    payment section


    public function individual_invoice_list(){

    }


    public function payment(){
        $data['page_title'] = "Payment";
        $data['main_view'] = "portal/payment/send_to_payment";
        $this->load->view('portal/layout', $data);
    }

//    public function success(){
//        $data['page_title'] = "Success Payment page (Portal Controller)";
//        $data['main_view'] = "portal/payment/success";
//        $this->load->view('portal/layout', $data);
//    }
//
//    public function error(){
//        $data['page_title'] = "error";
//        $data['main_view'] = "portal/payment/error";
//        $this->load->view('portal/layout', $data);
//    }


    public function monthly_report(){
        $data['page_title'] = "Monthly Report";
        $data['main_view'] = "portal/reports/monthly_report";
        $this->load->view('portal/layout', $data);
    }


    public function emails_report(){
        $data['page_title'] = "Emails Report";
        $data['main_view'] = "portal/reports/all_emails";
        $this->load->view('portal/layout', $data);
    }


//    invoice section
//    invoice section
//    invoice section
//    invoice section

    public function invoice(){
        $data['page_title'] = "Invoice Dashboard";
        $data['main_view'] = "portal/invoices_dashboard";
        $this->load->view('portal/layout', $data);
    }


//    individual outside user invoices
    public function get_invoices() {
        $data['page_title'] = "Invoicess List";
        $result = $this->portal_model->get_custom_all_invoices();

        $data['application_status'] = $this->input->get('application_status');

        $data['office_desk'] = $this->paginator->paginate($result, ['base_url' => 'portal/get_invoices']);

        $data['main_view'] = "portal/invoices_list";
        $this->load->view('portal/layout', $data);
    }



    public function action_outside_user(){

        if(1) {
            $this->load->library('Excel');
            $object = new PHPExcel();
            $object->setActiveSheetIndex(0);
            $table_columns = array(
                "Application Id",
                "Application Type",
                "Amount",
                "Payment Status",
                "Created At",
                "Delivery Method Price",
                "Sub Total",
                "Tax",
                "Grand Total",

            );
            $column = 0;


            foreach ($table_columns as $field) {
                $object->getActiveSheet()->setCellValueExplicitByColumnAndRow($column, 1, $field);
                $column++;
            }

            $excel_row = 2;
//            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100106");
//            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
//            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 3;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100107");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 4;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100108");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 5;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100109");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 6;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100110");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 7;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100111");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 8;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100112");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 9;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100113");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 17:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 10;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100114");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 15:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 11;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100115");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:22:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 12;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100116");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:24:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 13;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100117");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:33:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 14;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100118");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 15:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 15;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100119");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 11:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 16;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100120");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 11:29:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 17;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100121");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:55");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 18;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100122");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 9:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 19;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100123");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 6:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 20;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100124");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 5:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");


            $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Out Side User Application List.xls" ');

            $object_writer->save('php://output');
        }


        elseif(0){
            $this->load->library('Excel');
            $object = new PHPExcel();
            $object->setActiveSheetIndex(0);
            $table_columns = array(
                "Application Id",
                "Application Type",
                "Amount",
                "Payment Status",
                "Created At",
                "Delivery Method Price",
                "Sub Total",
                "Tax",
                "Grand Total",

            );
            $column = 0;


            foreach($table_columns as $field) {
                $object->getActiveSheet()->setCellValueExplicitByColumnAndRow($column, 1, $field);
                $column++;
            }

            $excel_row = 2;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100106");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 3;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100107");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 4;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100108");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 5;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100109");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 6;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100110");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 7;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100111");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 8;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100112");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 9;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100113");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 17:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 10;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100114");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 15:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 11;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100115");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:22:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 12;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100116");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:24:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 13;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100117");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:33:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 14;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100118");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 15:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 15;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100119");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 11:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 16;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100120");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 11:29:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 17;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100121");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:55");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 18;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100122");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 9:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 19;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100123");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 6:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 20;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100124");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 5:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");



            $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Out Side User Application List.xls" ');

            $object_writer->save('php://output');
        }

        else{
            $this->load->library('Excel');
            $object = new PHPExcel();
            $object->setActiveSheetIndex(0);
            $table_columns = array(
                "Application Id",
                "Application Type",
                "Amount",
                "Payment Status",
                "Created At",
                "Delivery Method Price",
                "Sub Total",
                "Tax",
                "Grand Total",

            );
            $column = 0;


            foreach($table_columns as $field) {
                $object->getActiveSheet()->setCellValueExplicitByColumnAndRow($column, 1, $field);
                $column++;
            }

            $excel_row = 2;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100106");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 3;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100107");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 4;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100108");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 5;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100109");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 6;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100110");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 7;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100111");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 8;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100112");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 9;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100113");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 17:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 10;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100114");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 15:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 11;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100115");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:22:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 12;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100116");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:24:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 13;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100117");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:33:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 14;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100118");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 15:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 15;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100119");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 11:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 16;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100120");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 11:29:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 17;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100121");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:55");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 18;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100122");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 9:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 19;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100123");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 6:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");

            $excel_row = 20;
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100124");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 5:26:18");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");



            $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Out Side User Application List.xls" ');

            $object_writer->save('php://output');
        }

    }




//    public function add_new_invoice($user_type, $id) {
    public function add_new_invoice() {
        $data['page_title'] = "Add Invoice";
        $data['main_view'] = "portal/add_invoice";
        $this->load->view('portal/layout', $data);
    }

    public function save_custom_invoice(){
        $data = array(
            "user_id" => $this->input->post('user_id'),
            "total_amount" => $this->input->post('total_amount'),
            "remaining" => $this->input->post('remaining_balance'),
            "payable_amount" => $this->input->post('payable_amount'),
            "tex" => $this->input->post('gst'),
            "created_by" => $this->session->userdata('user_id')
        );
        $save_data = $this->portal_model->save_custom_invoice($data);

        if($save_data){
            $this->session->set_tempdata('success_message', 'Invoice added successfully.',3);
            redirect('portal/add_new_invoice');
        }
        else{
            $this->session->set_tempdata('errorr_message', 'Something went wrong. Please try again!',3);
            redirect('portal/add_new_invoice');
        }
    }




    public function action_corporate(){
        $this->load->library('Excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array(
            "Application Id",
            "Application Type",
            "Email Id",
            "Delivery Phone",
            "Delivery Method Price",
            "Sub Total",
            "Tax",
            "Grand Total",
            "Corporate User",
        );
        $column = 0;


        foreach($table_columns as $field) {
            $object->getActiveSheet()->setCellValueExplicitByColumnAndRow($column, 1, $field);
            $column++;
        }

        $excel_row = 2;
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100112");
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "name based application");
        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "zainulabaidinz@gmail.com");
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "03084044366");
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "20");
        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "45");
        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "7");
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, '52');
        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, 'corporate@gmail.com');

        $excel_row = 3;
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100112");
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "name based application");
        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "zainulabaidinz@gmail.com");
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "03084044366");
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "20");
        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "45");
        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "7");
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, '52');
        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, 'corporate@gmail.com');

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Individual Corporate Application List.xls" ');

        $object_writer->save('php://output');

    }



    public function action_agent(){
        $this->load->library('Excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array(
            "Application Id",
            "Application Type",
            "Email Id",
            "Delivery Phone",
            "Delivery Method Price",
            "Sub Total",
            "Tax",
            "Grand Total",
            "Payment Status",
            "Corporate User",
        );
        $column = 0;


        foreach($table_columns as $field) {
            $object->getActiveSheet()->setCellValueExplicitByColumnAndRow($column, 1, $field);
            $column++;
        }

        $excel_row = 2;
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100120");
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "name based application");
        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "zainulabaidinz@gmail.com");
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "03084044366");
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "20");
        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "45");
        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "3");
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, '48');
        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, '0');
        $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, 'agent@gmail.com');

        $excel_row = 3;
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100122");
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "name based application");
        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "zainulabaidinz@gmail.com");
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "03084044366");
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "5");
        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "30");
        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "2");
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, '32');
        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, '0');
        $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, 'agent@gmail.com');

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Individual Agent Application List.xls" ');

        $object_writer->save('php://output');
    }



    public function get_corporate_users_individual_list(){
        $this->load->library('Excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);
        $table_columns = array(
            "Application Id",
            "Email Id",
            "Delivery Method Price",
            "Sub Total	",
            "Tax",
            "Grand Total",
            "Payment Status",
            "Email",
            "Application Type",
            "Corporate User",
            "Corporate Sub-User"
        );
        $column = 0;


        foreach($table_columns as $field) {
            $object->getActiveSheet()->setCellValueExplicitByColumnAndRow($column, 1, $field);
            $column++;
        }

        $excel_row = 2;
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100112");
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "zainulabaidinz@gmail.com");
        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "20");
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "45");
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "7");
        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "52");
        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "1");
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, 'Name Based Application');
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, 'sub_corporate@gmail.com');
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, 'corporate@gmail.com');


        $excel_row = 3;
        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100114");
        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "zainulabaidinz@gmail.com");
        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "20");
        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "45");
        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "3");
        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "48");
        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "1");
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, 'Name Based Application');
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, 'sub_corporate@gmail.com');
        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, 'corporate@gmail.com');

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Corporate User Individual List.xls" ');

        $object_writer->save('php://output');
    }


//    public function action_outside_user(){
//        $this->load->library('Excel');
//        $object = new PHPExcel();
//        $object->setActiveSheetIndex(0);
//        $table_columns = array(
//            "Application Id",
//            "Application Type",
//            "Amount",
//            "Payment Status",
//            "Created At",
//            "Delivery Method Price",
//            "Sub Total",
//            "Tax",
//            "Grand Total",
//
//        );
//        $column = 0;
//
//
//        foreach($table_columns as $field) {
//            $object->getActiveSheet()->setCellValueExplicitByColumnAndRow($column, 1, $field);
//            $column++;
//        }
//
//        $excel_row = 2;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100106");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 3;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100107");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 4;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100108");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 5;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100109");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 6;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100110");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 7;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100111");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 8;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100112");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 9;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100113");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 17:26:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 10;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100114");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 15:26:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 11;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100115");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:22:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 12;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100116");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:24:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 13;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100117");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:33:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 14;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100118");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 15:26:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 15;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100119");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 11:26:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 16;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100120");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 11:29:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 17;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100121");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 18:26:55");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 18;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100122");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 9:26:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 19;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100123");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 6:26:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//        $excel_row = 20;
//        $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, "100124");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, "Name Based Application");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, "84");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, "1");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, "2020-10-01 5:26:18");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, "20");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, "80");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, "4");
//        $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, "84");
//
//
//
//        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
//
//        header('Content-Type: application/vnd.ms-excel');
//        header('Content-Disposition: attachment;filename="Out Side User Application List.xls" ');
//
//        $object_writer->save('php://output');
//    }


    public function pdfDownload(){
//        if(!empty($id)){
//            $table = "Invoice PDF";
//            $where = array('id'=>$id);
//            $data = $this->Model_all->getingdataRecord($table, $where); // check allCategories from model


//            echo $data[0]->id;


        $this->load->library('Fpdf_gen');
//            $this->fpdf->SetFont('Times', 'B', 10);
//            $this->fpdf->cell(20, 10, '6');
//            $this->fpdf->Ln();
//            $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->cell(20, 10, 'Invoice Id');
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->cell(100, 10, '6');

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->cell(20, 10, 'user_id');
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->cell(100, 10, '1');

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->cell(20, 10, 'Total Amount	');
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->cell(100, 10, '23');

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->cell(20, 10, 'Remaining');
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->cell(100, 10, '23');

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->cell(20, 10, 'payable amount	');
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->cell(100, 10, '2423');

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->cell(20, 10, 'tax');
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->cell(100, 10, '	2');

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->cell(20, 10, 'created_at');
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->cell(100, 10, '1');

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->cell(20, 10, 'created by:');
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->cell(100, 10, 'GAC Global A.C');
        $this->fpdf->output('custom_invoice.pdf', 'D');
    }


    public function update_payment_status(){

        $payment_method = $this->input->post('payment_method');
        $payment_method_description = $this->input->post('payment_method_description');
        $sub_corporate_id = $this->input->post('user_id');

        $update_data = $this->portal_model->update_sub_corporate_application_status($payment_method, $payment_method_description, $sub_corporate_id);

        if($update_data){
            redirect('portal/get_corporate_users/');
        }

    }



    public function send_invoice_to_sub_corporate(){
        $remaining_payment = $this->input->post('remaining_payment');
        $send_to = $this->input->post('send_to');
        $update_data = $this->portal_model->send_invoice_to_sub_corporate($remaining_payment, $send_to);

        if($update_data){
            redirect('portal/get_corporate_users');
        }
    }


//    reports section
//    reports section
//    reports section
//    reports section

    public function reports_type(){
        $data['page_title'] = "Report Dashboard";
        $data['main_view'] = "portal/reports_type";
        $this->load->view('portal/layout', $data);
    }

//    public function dashboard_pree() {
//        $data['page_title'] = "Dashboard";
//        $data['main_view'] = "portal/dashboard_pree";
//        $this->load->view('portal/layout', $data);
//    }

//    series list
    public function series_list() {
        $data['page_title'] = "Series List";
//        $data["agent_list"] = $this->portal_model->get_all_agents_drop_down();
//        $result = $this->portal_model->get_all_agents();
//        $data['users'] = $this->paginator->paginate($result, ['base_url' => 'portal/agents']);
//        $data["states"] = $this->portal_model->get_states('Canada');
//        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();
//        $data['client_id'] = $this->input->get('id');
//        $data['company'] = $this->input->get('company');
//        $data['telephone'] = $this->input->get('telephone');
//        $data['address'] = $this->input->get('address');
//        $data['user_role'] = $this->input->get('user_role');
//        $data['status'] = $this->input->get('status');

        $data['main_view'] = "portal/series_table";
        $this->load->view('portal/layout', $data);
    }

    public function add_series_list_save(){
        $data['main_view'] = "portal/series_table";
        $this->load->view('portal/layout', $data);
    }
}