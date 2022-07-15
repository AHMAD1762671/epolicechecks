<?php
class User_model extends CI_model{

    public function add_log($type, $id, $token) {
        $this->logger
            ->user($this->session->userdata('user_id'))
            ->type($type)
            ->id($id)
            ->token($token)
            ->comment($this->session->userdata('name') . ' ' . $token . ' ' . $type)
            ->log();
    }

    public function signup(){
        $options = ['cost' => 10];
        $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
        $data = array(
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => $encrypted_pass,
                'user_role_id' => '3ee65tf9-7ed5-45ft-hdk1-f2afa31b',
                'created_by' => '87f85b0b-2f3e-47d8-863c-9daf429f'
        );
        $uuid = UUID();
        $this->db->set('id', "$uuid", TRUE);
        $result = $this->db->insert('users', $data);

        if($result)
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $htmlContent = '<h1>ePolice User Request Approved</h1>';
            $htmlContent .= '<p>User Name:  "'.$email.'" </p>';
            $htmlContent .= '<p>Password: "'.$password.'"</p>';

            $this->email->to($email);
            $this->email->from(EMAIL_FROM_SMTP, 'ePolice');
            $this->email->subject('ePolice User Request Approved');
            $this->email->message($htmlContent);
            $this->email->send();
            $ind_user = array(
                'ind_user_id' => $uuid,
                'ind_user_logged_in' => true
            );
            $this->session->set_userdata($ind_user);
        }
        return $result;
    }


    public function user_forgot_password($email) {
        $this->db->where('email', $email);
        $result = $this->db->get('users');
        if ($result->num_rows()) {
            $secret_code = random_string('sha1');
            $data = array(
                'secret_code' => $secret_code
            );
            $this->db->where('email', $email);
            $this->db->update('users', $data);

            return $secret_code;
        } else {
            return FALSE;
        }
    }

    public function user_check_secret_code($secret) {
        $this->db->where('secret_code', $secret);
        $result = $this->db->get('users');
        if ($result->num_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function user_reset_password($secret) {
        $options = ['cost' => 10];
        $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
        $data = array(
            'password' => $encrypted_pass,
            'secret_code' => NULL
        );
//        var_dump($secret); die();
        $this->db->where('secret_code', $secret);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }








    public function login_user($email, $password) {
        $this->db->where('email', $email);
        $result = $this->db->get('users');
        if ($result->num_rows()) {
            $db_password = $result->row(1)->password;

            if (password_verify($password, $db_password)) {
                return $result->row(1);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function find_user($id){
        $this->db->select('*');
        $this->db->from('name_based_applications');
        $this->db->where(array('name_based_application_id' => $id));
        $result = $this->db->get()->result();

        if(empty($result)){
            $this->db->select('*');
            $this->db->from('digital_fingerprinting_applications');
            $this->db->where(array('digital_fingerprinting_application_id' => $id));
            $result = $this->db->get()->result();
        }
        if(empty($result)){
            $this->db->select('*');
            $this->db->from('record_suspension_applications');
            $this->db->where(array('record_suspension_id' => $id));
            $result = $this->db->get()->result();
        }
        if(empty($result)){
            $this->db->select('*');
            $this->db->from('us_entry_waiver_applications');
            $this->db->where(array('us_entry_waiver_id' => $id));
            $result = $this->db->get()->result();
        }
        return $result;
    }


    public function name_based_applications_users() {
//        if(!empty($this->input->get('f_name')) && !empty($this->input->get('l_name')) && !empty($this->input->get('phone')) && !empty($this->input->get('dob')) )
//        {
            $fname = $this->input->get('f_name');
            $lname = $this->input->get('l_name');
            $phone = $this->input->get('phone');
            $dob = $this->input->get('dob');

            $this->db->where('consent_first_name', $fname);
            $this->db->where('consent_last_name', $lname);
            $this->db->where('consent_phone', $phone);
            $this->db->where('consent_dob', $dob);
            $result = $this->db->get('name_based_applications')->row();
//        }

        if(empty($result)){
            $this->db->where('consent_first_name', $fname);
            $this->db->where('consent_last_name', $lname);
            $this->db->where('consent_phone', $phone);
            $this->db->where('consent_dob', $dob);
            $result = $this->db->get('digital_fingerprinting_applications')->row();
        }
        if(empty($result)){
            $this->db->where('consent_first_name', $fname);
            $this->db->where('consent_last_name', $lname);
            $this->db->where('consent_phone', $phone);
            $this->db->where('consent_dob', $dob);
            $result = $this->db->get('record_suspension_applications')->row();
        }
        if(empty($result)){
            $this->db->where('consent_first_name', $fname);
            $this->db->where('consent_last_name', $lname);
            $this->db->where('consent_phone', $phone);
            $this->db->where('consent_dob', $dob);
            $result = $this->db->get('us_entry_waiver_applications')->row();
        }
        return $result;

//        else{
//            return false;
//        }
    }

  

    public function get_name_based_applications($id) {
        if ($this->input->get('id')) {
            $this->db->where('name_based_application_id', $this->input->get('id'));
        }
        if ($this->input->get('name')) {
            $this->db->group_start()->like('delivery_name', $this->input->get('name'));
            $this->db->or_like('card_holder_name', $this->input->get('name'));
            $this->db->or_like('consent_last_name', $this->input->get('name'));
            $this->db->or_like('consent_first_name', $this->input->get('name'));
            $this->db->or_like('consent_middle_name', $this->input->get('name'));
            $this->db->or_like('consent_nickname', $this->input->get('name'));
            $this->db->or_like('consent_contact_name', $this->input->get('name'))->group_end();
        }
        if ($this->input->get('phone')) {
            $this->db->group_start()->like('delivery_phone', $this->input->get('phone'));
            $this->db->or_like('card_holder_phone', $this->input->get('phone'));
            $this->db->or_like('card_holder_phone', $this->input->get('phone'));
            $this->db->or_like('consent_phone', $this->input->get('phone'));
            $this->db->or_like('consent_cellphone', $this->input->get('phone'))->group_end();
        }
        if ($this->input->get('dob')) {
            $this->db->where('consent_dob', $this->input->get('dob'));
        }
        $this->db->select('name_based_applications.*');
        $this->db->from('name_based_applications');
//        $this->db->where('application_completed', 1);
        $this->db->where('register_user_id', $id);
        return $this->db->order_by('name_based_application_id', 'DESC');
    }



    public function get_name_based_applications_sub_agent() {
        if ($this->input->get('id')) {
            $this->db->where('name_based_application_id', $this->input->get('id'));
        }
        if ($this->input->get('name')) {
            $this->db->group_start()->like('delivery_name', $this->input->get('name'));
            $this->db->or_like('card_holder_name', $this->input->get('name'));
            $this->db->or_like('consent_last_name', $this->input->get('name'));
            $this->db->or_like('consent_first_name', $this->input->get('name'));
            $this->db->or_like('consent_middle_name', $this->input->get('name'));
            $this->db->or_like('consent_nickname', $this->input->get('name'));
            $this->db->or_like('consent_contact_name', $this->input->get('name'))->group_end();
        }
        if ($this->input->get('phone')) {
            $this->db->group_start()->like('delivery_phone', $this->input->get('phone'));
            $this->db->or_like('card_holder_phone', $this->input->get('phone'));
            $this->db->or_like('card_holder_phone', $this->input->get('phone'));
            $this->db->or_like('consent_phone', $this->input->get('phone'));
            $this->db->or_like('consent_cellphone', $this->input->get('phone'))->group_end();
        }
        if ($this->input->get('dob')) {
            $this->db->where('consent_dob', $this->input->get('dob'));
        }
        $this->db->select('name_based_applications.*');
        $this->db->from('name_based_applications');
        $this->db->where('application_completed', 1);
        $this->db->where('sub_agent_id', $this->session->userdata('sub_agent_user_id'));
        return $this->db->order_by('name_based_application_id', 'DESC');
    }


    public function get_name_based_applications_sub_corporate() {
        if ($this->input->get('id')) {
            $this->db->where('name_based_application_id', $this->input->get('id'));
        }
        if ($this->input->get('name')) {
            $this->db->group_start()->like('delivery_name', $this->input->get('name'));
            $this->db->or_like('card_holder_name', $this->input->get('name'));
            $this->db->or_like('consent_last_name', $this->input->get('name'));
            $this->db->or_like('consent_first_name', $this->input->get('name'));
            $this->db->or_like('consent_middle_name', $this->input->get('name'));
            $this->db->or_like('consent_nickname', $this->input->get('name'));
            $this->db->or_like('consent_contact_name', $this->input->get('name'))->group_end();
        }
        if ($this->input->get('phone')) {
            $this->db->group_start()->like('delivery_phone', $this->input->get('phone'));
            $this->db->or_like('card_holder_phone', $this->input->get('phone'));
            $this->db->or_like('card_holder_phone', $this->input->get('phone'));
            $this->db->or_like('consent_phone', $this->input->get('phone'));
            $this->db->or_like('consent_cellphone', $this->input->get('phone'))->group_end();
        }
        if ($this->input->get('dob')) {
            $this->db->where('consent_dob', $this->input->get('dob'));
        }
        $this->db->select('name_based_applications.*');
        $this->db->from('name_based_applications');
        $this->db->where('application_completed', 1);
        $this->db->where('sub_corporate_id', $this->session->userdata('sub_corporate_user_id'));
        return $this->db->order_by('name_based_application_id', 'DESC');
    }





    public function get_digital_fingerprinting_applications($id) {
        if ($this->input->get('id')) {
            $this->db->where('digital_fingerprinting_application_id', $this->input->get('id'));
        }
        if ($this->input->get('name')) {
            $this->db->group_start()->like('delivery_name', $this->input->get('name'));
            $this->db->or_like('card_holder_name', $this->input->get('name'));
            $this->db->or_like('consent_last_name', $this->input->get('name'));
            $this->db->or_like('consent_first_name', $this->input->get('name'));
            $this->db->or_like('consent_middle_name', $this->input->get('name'));
            $this->db->or_like('consent_nickname', $this->input->get('name'))->group_end();
        }
        if ($this->input->get('phone')) {
            $this->db->group_start()->like('delivery_phone', $this->input->get('phone'));
            $this->db->or_like('card_holder_phone', $this->input->get('phone'));
            $this->db->or_like('card_holder_phone', $this->input->get('phone'));
            $this->db->or_like('consent_phone', $this->input->get('phone'));
            $this->db->or_like('consent_cellphone', $this->input->get('phone'))->group_end();
        }
        if ($this->input->get('dob')) {
            $this->db->where('consent_dob', $this->input->get('dob'));
        }
        $this->db->select('digital_fingerprinting_applications.*');
        $this->db->from('digital_fingerprinting_applications');
//        $this->db->where('application_completed', 1);
//        $this->db->where('agent_id', $this->session->userdata('agent_id'));
        $this->db->where('sub_agent_id', $id);
        return $this->db->order_by('digital_fingerprinting_application_id', 'DESC');
    }


    public function get_record_suspension_applications($id) {
        if ($this->input->get('id')) {
            $this->db->where('record_suspension_id', $this->input->get('id'));
        }
        if ($this->input->get('name')) {
            $this->db->group_start()->like('card_holder_name', $this->input->get('name'));
            $this->db->or_like('consent_last_name', $this->input->get('name'));
            $this->db->or_like('consent_first_name', $this->input->get('name'));
            $this->db->or_like('consent_middle_name', $this->input->get('name'));
            $this->db->or_like('consent_nickname', $this->input->get('name'));
            $this->db->or_like('consent_contact_name', $this->input->get('name'))->group_end();
        }
        if ($this->input->get('phone')) {
            $this->db->group_start()->like('card_holder_phone', $this->input->get('phone'));
            $this->db->or_like('card_holder_phone', $this->input->get('phone'));
            $this->db->or_like('consent_phone', $this->input->get('phone'));
            $this->db->or_like('consent_cellphone', $this->input->get('phone'))->group_end();
        }
        if ($this->input->get('dob')) {
            $this->db->where('consent_dob', $this->input->get('dob'));
        }
        $this->db->select('record_suspension_applications.*');
        $this->db->from('record_suspension_applications');
        //$this->db->where('application_completed', 1);
//        $this->db->where('agent_id', $this->session->userdata('agent_id'));
        $this->db->where('register_user_id', $id);
        return $this->db->order_by('record_suspension_id', 'DESC');
    }

    public function get_us_entry_waiver_applications($id) {
        if ($this->input->get('id')) {
            $this->db->where('us_entry_waiver_id', $this->input->get('id'));
        }
        if ($this->input->get('name')) {
            $this->db->group_start()->like('card_holder_name', $this->input->get('name'));
            $this->db->or_like('consent_last_name', $this->input->get('name'));
            $this->db->or_like('consent_first_name', $this->input->get('name'));
            $this->db->or_like('consent_middle_name', $this->input->get('name'));
            $this->db->or_like('consent_nickname', $this->input->get('name'))->group_end();
        }
        if ($this->input->get('phone')) {
            $this->db->group_start()->like('card_holder_phone', $this->input->get('phone'));
            $this->db->or_like('card_holder_phone', $this->input->get('phone'));
            $this->db->or_like('consent_phone', $this->input->get('phone'));
            $this->db->or_like('consent_cellphone', $this->input->get('phone'))->group_end();
        }
        if ($this->input->get('dob')) {
            $this->db->where('consent_dob', $this->input->get('dob'));
        }
        $this->db->select('us_entry_waiver_applications.*');
        $this->db->from('us_entry_waiver_applications');
      //  $this->db->where('application_completed', 1);
        $this->db->where('register_user_id', $id);
//        $this->db->where('agent_id', $this->session->userdata('agent_id'));
        return $this->db->order_by('us_entry_waiver_id', 'DESC');
    }


    public function get_application_comments($application_id, $type) {
        $this->db->where('application_id', $application_id)->where('type', $type);
        return $this->db->order_by('created_at', 'DESC')->get('application_comments')->result();
    }

    public function get_comments() {
        
        $this->db->select('application_comments.comment');
        $this->db->from('application_comments');
        return $this->db->count_all_results();
        
    }

    public function get_name_based_applications_comments() {
        
        // $this->db->select('name_based_applications.*');
        // $this->db->from('name_based_applications');
        // $this->db->where('register_user_id', $id);
        // $this->db->select('application_comments.comment');
        // $this->db->from('application_comments');
        // $this->db->where('type', $type);

        $this->db->select('application_comments.comment');
        $this->db->from('application_comments');
        $this->db->join('name_based_applications', 'name_based_application_id = application_comments.application_id');
        return $this->db->count_all_results();
        
    }

    public function get_digital_fingerprint_comments() {
        $this->db->select('application_comments.comment');
        $this->db->from('application_comments');
        $this->db->join('digital_fingerprinting_applications', 'digital_fingerprinting_application_id = application_comments.application_id');
        return $this->db->count_all_results();
        
    }

    public function get_record_suspension_applications_comments() {
        $this->db->select('application_comments.comment');
        $this->db->from('application_comments');
        $this->db->join('record_suspension_applications', 'record_suspension_id = application_comments.application_id');
        return $this->db->count_all_results();
        
    }

    public function get_us_entry_applications_comments() {
        $this->db->select('application_comments.comment');
        $this->db->from('application_comments');
        $this->db->join('us_entry_waiver_applications', 'us_entry_waiver_id = application_comments.application_id');
        return $this->db->count_all_results();
        
    }

    public function get_corporate_service_order_applications() {
        $this->db->select('service_order_images.*');
        $this->db->from('service_order_images');
        return $this->db->order_by('id', 'DESC');
    }

    public function get_agent_service_order_applications() {
        $this->db->select('service_order_images.*');
        $this->db->from('service_order_images');
        return $this->db->order_by('id', 'DESC');
    }

//    applications related
    public function get_states($country = '') {
        $this->db->select('states.*');
        $this->db->from('states');
        $this->db->join('countries', 'countries.country_id = states.country_id');
        if ($country != '') {
            $this->db->like('countries.name', $country);
        }
        return $this->db->order_by('states.name', 'ASC')->get()->result();
    }

    public function name_based_check_form_save() {
        $application_id = UUID();
        $clinet_id = bin2hex(random_bytes(64));
        $data = array(
            'state_id' => $this->input->post('state_id'),
            'delivery_name' => $this->input->post('delivery_name'),
            'delivery_address' => $this->input->post('delivery_address'),
            'delivery_city' => $this->input->post('delivery_city'),
            'delivery_state' => $this->input->post('delivery_state'),
            'delivery_country' => $this->input->post('delivery_country'),
            'delivery_phone' => $this->input->post('delivery_phone'),
            'delivery_email' => $this->input->post('delivery_email'),
            'delivery_method_id' => $this->input->post('delivery_method'),
            'delivery_method_price' => $this->input->post('delivery_method_price'),
            'sub_total' => $this->input->post('sub_total'),
            'tax' => $this->input->post('tax'),
            'grand_total' => $this->input->post('grand_total'),
            'payment_status' => 0,
            'client_id' => $clinet_id,
            'register_user_id' => $this->session->userdata('ind_user_id'),
            'application_country' => $this->input->post('country')
        );
//        var_dump($data); die();

        if ($this->db->insert('name_based_applications', $data)) {
            $aplication_id = $this->db->insert_id();

//            register in accounts for invoice
            $data_account = array(
                'user_id' => $this->session->userdata('ind_user_id'),
                'total_bill' => $this->input->post('grand_total'),
                'remaining_bill' => $this->input->post('grand_total'),
            );
            if ($this->db->insert('accounts', $data_account)) {
                $account_id = $this->db->insert_id();


//            now make the automatic invoice
                $data_auto_invoice = array(
                    'account_id' => $account_id,
                    'application_type' => 'name-based-check',
//                    'service_criminal_record' => $this->input->post('grand_total'),
//                    'service_authentication' => $this->input->post('grand_total'),
//                    'service_legalization' => $this->input->post('grand_total'),
                    'delivery_method' => $this->input->post('delivery_method'),
                    'delivery_price' => $this->input->post('delivery_method_price'),
                    'sub_total' => $this->input->post('sub_total'),
                    'tax' => $this->input->post('tax'),
                    'grand_total' => $this->input->post('grand_total'),
                    'application_id' => $aplication_id,
                    'invoice_status' => "Pending",
                    'created_by' => $this->session->userdata('ind_user_id'),
                );
                $this->db->insert('invoices', $data_auto_invoice);
//                if ($this->db->insert('invoices', $data_auto_invoice)) {
//                    $account_id = $this->db->insert_id();
//                }
            }

            if ($this->name_based_check_form_services_save($aplication_id)) {
                return $aplication_id;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }




    public function name_based_check_form_save_sub_user() {
        if(!empty($this->session->userdata('sub_agent_user_id'))){
//            echo "sub corporate " .$this->session->userdata('sub_corporate_user_id');
            $application_id = UUID();
            $clinet_id = bin2hex(random_bytes(64));
            $data = array(
                'state_id' => $this->input->post('state_id'),
                'delivery_name' => $this->input->post('delivery_name'),
                'delivery_address' => $this->input->post('delivery_address'),
                'delivery_city' => $this->input->post('delivery_city'),
                'delivery_state' => $this->input->post('delivery_state'),
                'delivery_country' => $this->input->post('delivery_country'),
                'delivery_phone' => $this->input->post('delivery_phone'),
                'delivery_email' => $this->input->post('delivery_email'),

                'payment_status' => 0,
                'client_id' => $clinet_id,
                'sub_agent_id' => $this->session->userdata('sub_agent_user_id'),
                'application_country' => $this->input->post('country')
            );
            if ($this->db->insert('name_based_applications', $data)) {
                $aplication_id = $this->db->insert_id();

//                if ($this->name_based_check_form_services_save($aplication_id)) {
//                    echo $application_id; die();
                    return $aplication_id;
//                } else {
//                    return FALSE;
//                }
            } else {
                return FALSE;
            }
        }
        elseif(!empty($this->session->userdata('sub_corporate_user_id'))){
//            echo "sub agent " .$this->session->userdata('sub_corporate_user_id');

            $application_id = UUID();
            $clinet_id = bin2hex(random_bytes(64));
            $data = array(
                'state_id' => $this->input->post('state_id'),
                'delivery_name' => $this->input->post('delivery_name'),
                'delivery_address' => $this->input->post('delivery_address'),
                'delivery_city' => $this->input->post('delivery_city'),
                'delivery_state' => $this->input->post('delivery_state'),
                'delivery_country' => $this->input->post('delivery_country'),
                'delivery_phone' => $this->input->post('delivery_phone'),
                'delivery_email' => $this->input->post('delivery_email'),

                'payment_status' => 0,
                'client_id' => $clinet_id,
                'sub_corporate_id' => $this->session->userdata('sub_corporate_user_id'),
                'application_country' => $this->input->post('country')
            );

            if ($this->db->insert('name_based_applications', $data)) {
                $aplication_id = $this->db->insert_id();

//                if ($this->name_based_check_form_services_save($aplication_id)) {
//                    echo $application_id; die();
                    return $aplication_id;
//                } else {
//                    return FALSE;
//                }
            } else {
                return FALSE;
            }


        }


//        $application_id = UUID();
//        $clinet_id = bin2hex(random_bytes(64));
//        $data = array(
//            'state_id' => $this->input->post('state_id'),
//            'delivery_name' => $this->input->post('delivery_name'),
//            'delivery_address' => $this->input->post('delivery_address'),
//            'delivery_city' => $this->input->post('delivery_city'),
//            'delivery_state' => $this->input->post('delivery_state'),
//            'delivery_country' => $this->input->post('delivery_country'),
//            'delivery_phone' => $this->input->post('delivery_phone'),
//            'delivery_email' => $this->input->post('delivery_email'),
//
//            'payment_status' => 0,
//            'client_id' => $clinet_id,
//            'register_user_id' => $this->session->userdata('ind_user_id'),
//            'application_country' => $this->input->post('country')
//        );


//        if ($this->db->insert('name_based_applications', $data)) {
//            $aplication_id = $this->db->insert_id();
//
//            if ($this->name_based_check_form_services_save($aplication_id)) {
//                return $aplication_id;
//            } else {
//                return FALSE;
//            }
//        } else {
//            return FALSE;
//        }
    }




    public function name_based_check_consent_save() {

        $application_id = $this->input->post('application_id');
        $client_id = $this->input->post('client_id');
        $data = array(
            'consent_last_name' => $this->input->post('consent_last_name'),
            'consent_first_name' => $this->input->post('consent_first_name'),
            'consent_middle_name' => $this->input->post('consent_middle_name'),
            'consent_nickname' => $this->input->post('consent_nickname'),
            'consent_gender' => $this->input->post('consent_gender'),
            'consent_dob' => $this->input->post('consent_dob'),
            'consent_birth_place' => $this->input->post('consent_birth_place'),
            'consent_country' => $this->input->post('consent_country'),
            'consent_phone' => $this->input->post('consent_phone'),
            'consent_cellphone' => $this->input->post('consent_cellphone'),
            'consent_email' => $this->input->post('consent_email'),
            'consent_current_address' => $this->input->post('consent_current_address'),
            'consent_current_city' => $this->input->post('consent_current_city'),
            'consent_current_state' => $this->input->post('consent_current_state'),
            'consent_current_post_code' => $this->input->post('consent_current_post_code'),
            'consent_previous_address' => $this->input->post('consent_previous_address'),
            'consent_previous_city' => $this->input->post('consent_previous_city'),
            'consent_previous_state' => $this->input->post('consent_previous_state'),
            'consent_previous_post_code' => $this->input->post('consent_previous_post_code'),
            'consent_reason' => $this->input->post('consent_reason'),
            'consent_reason_other' => $this->input->post('consent_reason_other'),
            'consent_organization' => $this->input->post('consent_organization'),
            'consent_contact_name' => $this->input->post('consent_contact_name'),
            'consent_contact_phone' => $this->input->post('consent_contact_phone'),
            'consent_criminal_offence' => $this->input->post('consent_criminal_offence'),
            'consent_signature' => $this->input->post('consent_signature'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'application_completed' => 1
        );
        $this->db->where('name_based_application_id', $application_id)->where('client_id', $client_id);
        if ($this->db->update('name_based_applications', $data)) {
            if ($this->name_based_check_consent_offence_save($application_id)) {

                //            insert data for notifications
                $data = array(
                    'table_id' => $application_id,
                    'table_name' => 'name_based_applications',
                    'description' => 'record_inserted'
                );
                $this->db->insert('application_notification', $data);

                return $application_id;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }


    public function name_based_check_consent_offence_save($application_id) {
        $this->db->where('application_id', $application_id)->delete('application_consent_offence');
        $data = array();
        $consent_offence = $this->input->post('consent_offence');
        $consent_offence_date = $this->input->post('consent_offence_date');
        $consent_offence_court = $this->input->post('consent_offence_court');
        if ($consent_offence != NULL && $consent_offence != '' && !empty($consent_offence)) {
            foreach ($consent_offence as $key => $value) {
                if ($value != "" && $value != NULL) {
                    $new = array(
                        'application_consent_offence_id' => UUID(),
                        'consent_offence' => $value,
                        'consent_offence_date' => $consent_offence_date[$key],
                        'consent_offence_court' => $consent_offence_court[$key],
                        'application_id' => $application_id
                    );
                    array_push($data, $new);
                }
            }
            if (!empty($data)) {
                return $this->db->insert_batch('application_consent_offence', $data);
            } else {
                return TRUE;
            }
        }
    }







//    public function name_based_check_form_services_save($application_id) {
//        $data = array();
//        $services = $this->input->post('services');
//        $services_prices = $this->input->post('services_prices');
//        if ($services != NULL && $services != '' && !empty($services)) {
//            foreach ($services as $key => $value) {
//                if ($value != "" && $value != NULL) {
//                    $new = array(
//                        'application_service_id' => UUID(),
//                        'subservice_id' => $value,
//                        'service_price' => $services_prices[$value],
//                        'application_id' => $application_id
//                    );
//                    array_push($data, $new);
//                }
//            }
//            return $this->db->insert_batch('application_services', $data);
//        }
//    }


    public function get_name_based_check_application_details($application_id) {
        return $this->db->where('name_based_application_id', $application_id)->where('register_user_id', $this->session->userdata('ind_user_id'))->get('name_based_applications')->row();
    }

    public function save_namebase_comments($data)
    {
        if($this->db->insert('application_comments',$data))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }













//    for digital finger print
//    for digital finger print
//    for digital finger print
//    for digital finger print




    public function digital_fingerprinting_form_save() {

        $application_id = UUID();
        $clinet_id = bin2hex(random_bytes(64));
        $data = array(
            'state_id' => $this->input->post('state_id'),
            'agency_state' => $this->input->post('agency_state'),
            'agency_city' => $this->input->post('agency_city'),
            'agency_address' => $this->input->post('agency_address'),
            'delivery_name' => $this->input->post('delivery_name'),
            'delivery_address' => $this->input->post('delivery_address'),
            'delivery_city' => $this->input->post('delivery_city'),
            'delivery_state' => $this->input->post('delivery_state'),
            'delivery_country' => $this->input->post('delivery_country'),
            'delivery_phone' => $this->input->post('delivery_phone'),
            'delivery_email' => $this->input->post('delivery_email'),
            'share_result' => $this->input->post('share_result'),
            'share_email' => $this->input->post('share_email'),
            'delivery_method_id' => $this->input->post('delivery_method'),
            'delivery_method_price' => $this->input->post('delivery_method_price'),
            'sub_total' => $this->input->post('sub_total'),
            'tax' => $this->input->post('tax'),
            'grand_total' => $this->input->post('grand_total'),
            'payment_status' => 0,
            'client_id' => $clinet_id,
            'register_user_id' => $this->session->userdata('ind_user_id'),
            'application_country' => $this->input->post('country')
        );
        if ($this->db->insert('digital_fingerprinting_applications', $data)) {
            $aplication_id = $this->db->insert_id();
            if ($this->digital_fingerprinting_form_services_save($aplication_id)) {
                $services = $this->input->post('digital_fingerprinting_options');
                foreach ($services as $value) {
                    $data = array(
                        'digital_fingerprinting_application_option' => $value,
                        'application_id' => $aplication_id
                    );
                    $this->db->insert('digital_fingerprinting_application_options', $data);
                }
                return $aplication_id;

            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function get_digital_fingerprinting_application_details($application_id) {
        return $this->db->where('digital_fingerprinting_application_id', $application_id)->where('agent_id', $this->session->userdata('agent_id'))->get('digital_fingerprinting_applications')->row();
    }




    public function user_edit_profile_save(){
        if(!empty($this->input->post('password'))) {
            $options = ['cost' => 10];
            $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
            $data = array(
                'id' => $this->input->post('id'),
                'password' => $encrypted_pass,
                'email' => $this->input->post('email'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'profile_image' => $this->input->post('demo')
            );
        }
        else {
            $data = array(
                'id' => $this->input->post('id'),
                'email' => $this->input->post('email'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'profile_image' => $this->input->post('demo')
            );
        }

        $this->db->set($data); //value that used to update column
        $this->db->where('id', $this->input->post('id')); //which row want to upgrade
        $result = $this->db->update('users');
        return $result;
    }

    public function multiple_file_upload($data){
        $insert = $this->db->insert_batch('service_order_images',$data);
        return $insert?true:false;
    }




    public function get_user_details($application_id) {
        $this->db->where('name_based_application_id', $application_id);
        $this->db->where('application_completed', 1);
        return $this->db->get('name_based_applications')->row();
    }


    public function get_account_id_by_user_id($id){
        $result = $this->db->where('id', $id)->get('users')->row();
        return $result->profile_image;
    }


    public function get_total_record($table, $where){
        $this->db->from($table);
        if(! empty($where)) {
            $this->db->where($where);
        }
        return $this->db->count_all_results();
    }





}