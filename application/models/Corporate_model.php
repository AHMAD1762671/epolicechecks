<?php

class Corporate_model extends CI_model {

    public function login_corporate($email, $password) {
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


    public function signup_super_corporate_to_sub_employee($email, $namebase, $digital, $record, $usentry){

        if(!empty($namebase))
        {
            $namebase = 1;
        }
        else{
            $namebase = 0;
        }

        if(!empty($digital))
        {
            $digital = 1;
        }
        else{
            $digital = 0;
        }

        if(!empty($record))
        {
            $record = 1;
        }
        else{
            $record = 0;
        }

        if(!empty($usentry))
        {
            $usentry = 1;
        }
        else{
            $usentry = 0;
        }

        $options = ['cost' => 10];
        $encry_pass = '12345';
        $encrypted_pass = password_hash($encry_pass, PASSWORD_BCRYPT, $options);
        $data = array(
//            'first_name' => $this->input->post('first_name'),
//            'last_name' => $this->input->post('last_name'),
            'email' => $email,
            'password' => $encrypted_pass,

            'name_based_check_price' => $namebase,
            'digital_fingerprinting_price' => $digital,
            'record_suspension_price' => $record,
            'us_entry_waiver_price' => $usentry,
//            'canada_immigration_price' => $encrypted_pass,

            'user_role_id' => '3cd43787-2e60-4e00-9f7c-e403ecd6',
            'super_corporate_employee_id' => $this->session->userdata('corporate_id'),
            'created_by' => $this->session->userdata('corporate_id')
        );

//        var_dump($data); die();

        $uuid = UUID();
        $this->db->set('id', "$uuid", TRUE);
        $result = $this->db->insert('users', $data);

        if($result)
        {
//            $email = $this->input->post('email');
//            $password = $this->input->post('password');
            $url = base_url('/user');

            $htmlContent = '<h1>ePolice User Request Approved</h1>';
            $htmlContent .= '<p>User Name:  "'.$email.'" </p>';
            $htmlContent .= '<p>Password: "'.$encry_pass.'"</p>';
            $htmlContent .= '<p>URL: "'.$url.'"</p>';

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



//    public function login_corporate($email, $password) {
//        $this->db->where('email', $email);
//        $result = $this->db->get('corporates');
//        if ($result->num_rows()) {
//            $db_password = $result->row(1)->password;
//            if (password_verify($password, $db_password)) {
//                return $result->row(1);
//            } else {
//                return false;
//            }
//        } else {
//            return false;
//        }
//    }

    public function match_current_password($current_password) {
        $this->db->where('id', $this->session->userdata('user_id'));
        $result = $this->db->get('users');
        if ($result->num_rows()) {
            $db_password = $result->row(1)->password;

            if (password_verify($current_password, $db_password)) {
                return True;
            } else {
                return false;
            }
        } else {
            return false;
        }
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
        $this->db->where('secret_code', $secret);
        $this->db->update('users', $data);
        return $this->db->affected_rows();
    }

    public function user_account_update($is_password = FALSE) {
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
        );
        $this->session->set_userdata('name', $this->input->post('first_name') . ' ' . $this->input->post('last_name'));
        if ($is_password) {
            $options = ['cost' => 10];
            $encrypted_pass = password_hash($this->input->post('new_password'), PASSWORD_BCRYPT, $options);
            $data['password'] = $encrypted_pass;
        }
        if (isset($_FILES['profile_image']) && $_FILES['profile_image']['name'] != '') {
            $config['upload_path'] = './assets/images/admin/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['file_name'] = time() . $_FILES['profile_image']['name'];
            $profile_image = $config['file_name'];
            $this->upload->initialize($config);
            if ($this->upload->do_upload('profile_image')) {
                $data['profile_image'] = $profile_image;
                $this->session->set_userdata('user_profile_image', $profile_image);
            }
        }
        $this->db->where('id', $this->session->userdata('user_id'));
        return $this->db->update('corporates', $data);
    }
    
    
    public function get_states($country = '') {
        $this->db->select('states.*');
        $this->db->from('states');
        $this->db->join('countries', 'countries.country_id = states.country_id');
        if ($country != '') {
            $this->db->like('countries.name', $country);
        }
        return $this->db->order_by('states.name', 'ASC')->get()->result();
    }

    public function get_subservice_price($subservice_id) {
        return $this->db->where('subservice_id', $subservice_id)->get('service_prices')->row()->service_price;
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
            'corporate_id' => $this->session->userdata('corporate_id'),
            'application_country' => $this->input->post('country')
        );
        if ($this->db->insert('name_based_applications', $data)) {
            $aplication_id = $this->db->insert_id();
            if ($this->name_based_check_form_services_save($aplication_id)) {
                return $aplication_id;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function name_based_check_form_services_save($application_id) {
        $data = array();
        $services = $this->input->post('services');
        $services_prices = $this->input->post('services_prices');
        if ($services != NULL && $services != '' && !empty($services)) {
            foreach ($services as $key => $value) {
                if ($value != "" && $value != NULL) {
                    $new = array(
                        'application_service_id' => UUID(),
                        'subservice_id' => $value,
                        'service_price' => $services_prices[$value],
                        'application_id' => $application_id
                    );
                    array_push($data, $new);
                }
            }
            return $this->db->insert_batch('application_services', $data);
        }
    }

    public function get_name_based_check_application_details($application_id) {
        return $this->db->where('name_based_application_id', $application_id)->where('corporate_id', $this->session->userdata('corporate_id'))->get('name_based_applications')->row();
    }

    public function name_based_check_payment_save() {
        $application_id = $this->input->post('application_id');
        $client_id = $this->input->post('client_id');
        $data = array(
//            'card_number' => $this->input->post('card_number_1') . $this->input->post('card_number_2') . $this->input->post('card_number_3') . $this->input->post('card_number_4'),
            'card_number' => $this->input->post('card_number_1'),
            'card_cvc' => $this->input->post('card_cvc'),
//            'card_expiry' => $this->input->post('card_expiry_month') . '/' . $this->input->post('card_expiry_year'),
            'card_expiry' => $this->input->post('card_expiry'),
            'card_holder_name' => $this->input->post('card_holder_name'),
            'card_holder_email' => $this->input->post('card_holder_email'),
            'card_holder_phone' => $this->input->post('card_holder_phone'),
            'payment_status' => 1
        );
        $this->db->where('name_based_application_id', $application_id)->where('client_id', $client_id);
        return $this->db->update('name_based_applications', $data);
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
            'corporate_id' => $this->session->userdata('corporate_id'),
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

    public function digital_fingerprinting_form_services_save($application_id) {
        $data = array();
        $services = $this->input->post('services');
        $services_prices = $this->input->post('services_prices');
        if ($services != NULL && $services != '' && !empty($services)) {
            foreach ($services as $key => $value) {
                if ($value != "" && $value != NULL) {
                    $new = array(
                        'digital_fingerprinting_service_id' => UUID(),
                        'subservice_id' => $value,
                        'service_price' => $services_prices[$value],
                        'application_id' => $application_id
                    );
                    array_push($data, $new);
                }
            }
            return $this->db->insert_batch('digital_fingerprinting_services', $data);
        }
    }

    public function get_digital_fingerprinting_application_details($application_id) {
        return $this->db->where('digital_fingerprinting_application_id', $application_id)->where('corporate_id', $this->session->userdata('corporate_id'))->get('digital_fingerprinting_applications')->row();
    }

    public function digital_fingerprinting_payment_save() {
        $application_id = $this->input->post('application_id');
        $client_id = $this->input->post('client_id');
        $data = array(
//            'card_number' => $this->input->post('card_number_1') . $this->input->post('card_number_2') . $this->input->post('card_number_3') . $this->input->post('card_number_4'),
            'card_number' => $this->input->post('card_number_1'),
            'card_cvc' => $this->input->post('card_cvc'),
//            'card_expiry' => $this->input->post('card_expiry_month') . '/' . $this->input->post('card_expiry_year'),
            'card_expiry' => $this->input->post('card_expiry'),
            'card_holder_name' => $this->input->post('card_holder_name'),
            'card_holder_email' => $this->input->post('card_holder_email'),
            'card_holder_phone' => $this->input->post('card_holder_phone'),
            'payment_status' => 1
        );
        $this->db->where('digital_fingerprinting_application_id', $application_id)->where('client_id', $client_id);
        return $this->db->update('digital_fingerprinting_applications', $data);
    }

    public function digital_fingerprinting_consent_save() {
        $application_id = $this->input->post('application_id');
        $client_id = $this->input->post('client_id');
        $data = array(
            'consent_last_name' => $this->input->post('consent_last_name'),
            'consent_first_name' => $this->input->post('consent_first_name'),
            'consent_middle_name' => $this->input->post('consent_middle_name'),
            'consent_nickname' => $this->input->post('consent_nickname'),
            'consent_dob' => $this->input->post('consent_dob'),
            'consent_phone' => $this->input->post('consent_phone'),
            'consent_cellphone' => $this->input->post('consent_cellphone'),
            'consent_email' => $this->input->post('consent_email'),
            'consent_current_address' => $this->input->post('consent_current_address'),
            'fingerprinting_agency_address' => $this->input->post('fingerprinting_agency_address'),
            'fingerprinting_agency_phone' => $this->input->post('fingerprinting_agency_phone'),
            'rcmp_type' => $this->input->post('rcmp_type'),
            'send_result' => $this->input->post('send_result'),
            'send_home_address' => $this->input->post('send_home_address'),
            'send_third_party' => $this->input->post('send_third_party'),
            'consent_signature' => $this->input->post('consent_signature'),
            'consent_date' => $this->input->post('consent_date'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'application_completed' => 1
        );
        $this->db->where('digital_fingerprinting_application_id', $application_id)->where('client_id', $client_id);
        return $this->db->update('digital_fingerprinting_applications', $data);
    }

    public function digital_fingerprinting_consent_offence_save($application_id) {
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
            return $this->db->insert_batch('application_consent_offence', $data);
        }
    }

    public function record_suspension_form_save() {
        $application_id = UUID();
        $clinet_id = bin2hex(random_bytes(64));
        $data = array(
            'state_id' => $this->input->post('state_id'),
            'all_installment_1_payment' => $this->input->post('all_installment_1_payment'),
            'all_installment_2_payment' => $this->input->post('all_installment_2_payment'),
            'all_installment_3_payment' => $this->input->post('all_installment_3_payment'),
            'both_installment_1_payment' => $this->input->post('both_installment_1_payment'),
            'both_installment_2_payment' => $this->input->post('both_installment_2_payment'),
            'both_installment_3_payment' => $this->input->post('both_installment_3_payment'),
            'sub_total' => $this->input->post('sub_total'),
            'tax' => $this->input->post('tax'),
            'grand_total' => $this->input->post('grand_total'),
            'payment_status' => 0,
            'client_id' => $clinet_id,
            'corporate_id' => $this->session->userdata('corporate_id'),
            'application_country' => $this->input->post('country')
        );
        if ($this->db->insert('record_suspension_applications', $data)) {
            $aplication_id = $this->db->insert_id();
            if ($this->record_suspension_form_services_save($aplication_id)) {
                return $aplication_id;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function record_suspension_form_services_save($application_id) {
        $data = array();
        $services = $this->input->post('services');
        $services_prices = $this->input->post('services_prices');
        if ($services != NULL && $services != '' && !empty($services)) {
            foreach ($services as $key => $value) {
                if ($value != "" && $value != NULL) {
                    $new = array(
                        'record_suspension_service_id' => UUID(),
                        'subservice_id' => $value,
                        'service_price' => $services_prices[$value],
                        'application_id' => $application_id
                    );
                    array_push($data, $new);
                }
            }
            return $this->db->insert_batch('record_suspension_services', $data);
        }
    }

    public function get_record_suspension_application_details($application_id) {
        return $this->db->where('record_suspension_id', $application_id)->where('corporate_id', $this->session->userdata('corporate_id'))->get('record_suspension_applications')->row();
    }

    public function record_suspension_payment_save() {
        $application_id = $this->input->post('application_id');
        $client_id = $this->input->post('client_id');
        $data = array(
//            'card_number' => $this->input->post('card_number_1') . $this->input->post('card_number_2') . $this->input->post('card_number_3') . $this->input->post('card_number_4'),
            'card_number' => $this->input->post('card_number_1'),
            'card_cvc' => $this->input->post('card_cvc'),
//            'card_expiry' => $this->input->post('card_expiry_month') . '/' . $this->input->post('card_expiry_year'),
            'card_expiry' => $this->input->post('card_expiry'),
            'card_holder_name' => $this->input->post('card_holder_name'),
            'card_holder_email' => $this->input->post('card_holder_email'),
            'card_holder_phone' => $this->input->post('card_holder_phone'),
            'payment_status' => 1
        );
        $this->db->where('record_suspension_id', $application_id)->where('client_id', $client_id);
        return $this->db->update('record_suspension_applications', $data);
    }

    public function record_suspension_consent_save() {
        $application_id = $this->input->post('application_id');
        $client_id = $this->input->post('client_id');
        $data = array(
            'consent_last_name' => $this->input->post('consent_last_name'),
            'consent_first_name' => $this->input->post('consent_first_name'),
            'consent_middle_name' => $this->input->post('consent_middle_name'),
            'consent_nickname' => $this->input->post('consent_nickname'),
            'consent_dob' => $this->input->post('consent_dob'),
            'consent_birth_place' => $this->input->post('consent_birth_place'),
            'consent_phone' => $this->input->post('consent_phone'),
            'consent_cellphone' => $this->input->post('consent_cellphone'),
            'consent_email' => $this->input->post('consent_email'),
            'consent_current_address' => $this->input->post('consent_current_address'),
            'consent_current_state' => $this->input->post('consent_current_state'),
            'consent_current_post_code' => $this->input->post('consent_current_post_code'),
            'consent_arrested_canada' => $this->input->post('consent_arrested_canada'),
            'consent_arrested_america' => $this->input->post('consent_arrested_america'),
            'consent_arrested_foreign' => $this->input->post('consent_arrested_foreign'),
            'consent_refused_border' => $this->input->post('consent_refused_border'),
            'consent_refused_border_date' => $this->input->post('consent_refused_border_date'),
            'consent_deported_america' => $this->input->post('consent_deported_america'),
            'consent_deported_america_date' => $this->input->post('consent_deported_america_date'),
            'consent_criminal_country' => $this->input->post('consent_criminal_country'),
            'consent_criminal_offence' => $this->input->post('consent_criminal_offence'),
            'consent_comments' => $this->input->post('consent_comments'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'application_completed' => 1
        );
        $this->db->where('record_suspension_id', $application_id)->where('client_id', $client_id);
        if ($this->db->update('record_suspension_applications', $data)) {
            if ($this->record_suspension_consent_offence_save($application_id)) {
                return $application_id;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function record_suspension_consent_offence_save($application_id) {
        $this->db->where('application_id', $application_id)->delete('application_consent_offence');
        $data = array();
        $consent_offence = $this->input->post('consent_offence');
        $consent_offence_date = $this->input->post('consent_offence_date');
        $consent_offence_court = $this->input->post('consent_offence_court');
        $consent_fine = $this->input->post('consent_fine');
        $consent_paid = $this->input->post('consent_paid');
        if ($consent_offence != NULL && $consent_offence != '' && !empty($consent_offence)) {
            foreach ($consent_offence as $key => $value) {
                if ($value != "" && $value != NULL) {
                    $new = array(
                        'record_suspension_consent_offence_id' => UUID(),
                        'consent_offence' => $value,
                        'consent_offence_date' => $consent_offence_date[$key],
                        'consent_offence_court' => $consent_offence_court[$key],
                        'consent_fine' => $consent_fine[$key],
                        'consent_paid' => $consent_paid[$key],
                        'application_id' => $application_id
                    );
                    array_push($data, $new);
                }
            }
            if (!empty($data)) {
                return $this->db->insert_batch('record_suspension_consent_offence', $data);
            } else {
                return TRUE;
            }
        }
    }

    public function us_entry_waiver_form_save() {
        $application_id = UUID();
        $clinet_id = bin2hex(random_bytes(64));
        $data = array(
            'state_id' => $this->input->post('state_id'),
            'all_installment_1_payment' => $this->input->post('all_installment_1_payment'),
            'all_installment_2_payment' => $this->input->post('all_installment_2_payment'),
            'all_installment_3_payment' => $this->input->post('all_installment_3_payment'),
            'both_installment_1_payment' => $this->input->post('both_installment_1_payment'),
            'both_installment_2_payment' => $this->input->post('both_installment_2_payment'),
            'both_installment_3_payment' => $this->input->post('both_installment_3_payment'),
            'sub_total' => $this->input->post('sub_total'),
            'tax' => $this->input->post('tax'),
            'grand_total' => $this->input->post('grand_total'),
            'payment_status' => 0,
            'client_id' => $clinet_id,
            'corporate_id' => $this->session->userdata('corporate_id'),
            'application_country' => $this->input->post('country')
        );
        if ($this->db->insert('us_entry_waiver_applications', $data)) {
            $aplication_id = $this->db->insert_id();
            if ($this->us_entry_waiver_form_services_save($aplication_id)) {
                return $aplication_id;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function us_entry_waiver_form_services_save($application_id) {
        $data = array();
        $services = $this->input->post('services');
        $services_prices = $this->input->post('services_prices');
        if ($services != NULL && $services != '' && !empty($services)) {
            foreach ($services as $key => $value) {
                if ($value != "" && $value != NULL) {
                    $new = array(
                        'us_entry_waiver_service_id' => UUID(),
                        'subservice_id' => $value,
                        'service_price' => $services_prices[$value],
                        'application_id' => $application_id
                    );
                    array_push($data, $new);
                }
            }
            return $this->db->insert_batch('us_entry_waiver_services', $data);
        }
    }

    public function get_us_entry_waiver_application_details($application_id) {
        return $this->db->where('us_entry_waiver_id', $application_id)->where('corporate_id', $this->session->userdata('corporate_id'))->get('us_entry_waiver_applications')->row();
    }

    public function us_entry_waiver_payment_save() {
        $application_id = $this->input->post('application_id');
        $client_id = $this->input->post('client_id');
        $data = array(
//            'card_number' => $this->input->post('card_number_1') . $this->input->post('card_number_2') . $this->input->post('card_number_3') . $this->input->post('card_number_4'),
            'card_number' => $this->input->post('card_number_1'),
            'card_cvc' => $this->input->post('card_cvc'),
//            'card_expiry' => $this->input->post('card_expiry_month') . '/' . $this->input->post('card_expiry_year'),
            'card_expiry' => $this->input->post('card_expiry'),
            'card_holder_name' => $this->input->post('card_holder_name'),
            'card_holder_email' => $this->input->post('card_holder_email'),
            'card_holder_phone' => $this->input->post('card_holder_phone'),
            'payment_status' => 1
        );
        $this->db->where('us_entry_waiver_id', $application_id)->where('client_id', $client_id);
        return $this->db->update('us_entry_waiver_applications', $data);
    }

    public function us_entry_waiver_consent_save() {
        $application_id = $this->input->post('application_id');
        $client_id = $this->input->post('client_id');
        $data = array(
            'consent_last_name' => $this->input->post('consent_last_name'),
            'consent_first_name' => $this->input->post('consent_first_name'),
            'consent_middle_name' => $this->input->post('consent_middle_name'),
            'consent_nickname' => $this->input->post('consent_nickname'),
            'consent_dob' => $this->input->post('consent_dob'),
            'consent_birth_place' => $this->input->post('consent_birth_place'),
            'consent_phone' => $this->input->post('consent_phone'),
            'consent_cellphone' => $this->input->post('consent_cellphone'),
            'consent_email' => $this->input->post('consent_email'),
            'consent_current_address' => $this->input->post('consent_current_address'),
            'consent_current_city' => $this->input->post('consent_current_city'),
            'consent_current_state' => $this->input->post('consent_current_state'),
            'consent_current_post_code' => $this->input->post('consent_current_post_code'),
            'consent_arrested_canada' => $this->input->post('consent_arrested_canada'),
            'consent_arrested_america' => $this->input->post('consent_arrested_america'),
            'consent_arrested_foreign' => $this->input->post('consent_arrested_foreign'),
            'consent_refused_border' => $this->input->post('consent_refused_border'),
            'consent_refused_border_date' => $this->input->post('consent_refused_border_date'),
            'consent_deported_america' => $this->input->post('consent_deported_america'),
            'consent_deported_america_date' => $this->input->post('consent_deported_america_date'),
            'consent_criminal_country' => $this->input->post('consent_criminal_country'),
            'consent_criminal_offence' => $this->input->post('consent_criminal_offence'),
            'consent_comments' => $this->input->post('consent_comments'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'application_completed' => 1
        );
        $this->db->where('us_entry_waiver_id', $application_id)->where('client_id', $client_id);
        if ($this->db->update('us_entry_waiver_applications', $data)) {
            if ($this->us_entry_waiver_consent_offence_save($application_id)) {
                return $application_id;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function us_entry_waiver_consent_offence_save($application_id) {
        $this->db->where('application_id', $application_id)->delete('application_consent_offence');
        $data = array();
        $consent_offence = $this->input->post('consent_offence');
        $consent_offence_date = $this->input->post('consent_offence_date');
        $consent_offence_court = $this->input->post('consent_offence_court');
        $consent_fine = $this->input->post('consent_fine');
        $consent_paid = $this->input->post('consent_paid');
        if ($consent_offence != NULL && $consent_offence != '' && !empty($consent_offence)) {
            foreach ($consent_offence as $key => $value) {
                if ($value != "" && $value != NULL) {
                    $new = array(
                        'us_entry_waiver_consent_offence_id' => UUID(),
                        'consent_offence' => $value,
                        'consent_offence_date' => $consent_offence_date[$key],
                        'consent_offence_court' => $consent_offence_court[$key],
                        'consent_fine' => $consent_fine[$key],
                        'consent_paid' => $consent_paid[$key],
                        'application_id' => $application_id
                    );
                    array_push($data, $new);
                }
            }
            if (!empty($data)) {
                return $this->db->insert_batch('us_entry_waiver_consent_offence', $data);
            } else {
                return TRUE;
            }
        }
    }
    
    
    public function get_name_based_applications() {
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
        $this->db->where('corporate_id', $this->session->userdata('corporate_id'));
        return $this->db->order_by('name_based_application_id', 'DESC');
    }

    public function get_name_based_application_details($application_id) {
        $this->db->where('name_based_application_id', $application_id)->where('corporate_id', $this->session->userdata('corporate_id'));
        $this->db->where('application_completed', 1);
        return $this->db->get('name_based_applications')->row();
    }

    public function get_name_based_application_services($application_id) {
        $this->db->select('application_services.*, subservices.subservice_name');
        $this->db->from('application_services');
        $this->db->join('subservices', 'subservices.subservice_id = application_services.subservice_id', 'left');
        $this->db->where('application_services.application_id', $application_id);
        return $this->db->get()->result();
    }

    public function get_name_based_application_offences($application_id) {
        $this->db->where('application_id', $application_id);
        return $this->db->get('application_consent_offence')->result();
    }

    public function get_digital_fingerprinting_applications() {
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
        $this->db->where('application_completed', 1);
        $this->db->where('corporate_id', $this->session->userdata('corporate_id'));
        return $this->db->order_by('digital_fingerprinting_application_id', 'DESC');
    }
//
//    public function get_digital_fingerprinting_application_details($application_id) {
//        $this->db->where('digital_fingerprinting_application_id', $application_id);
//        $this->db->where('application_completed', 1);
//        return $this->db->get('digital_fingerprinting_applications')->row();
//    }

    public function get_digital_fingerprinting_application_services($application_id) {
        $this->db->select('application_services.*, subservices.subservice_name');
        $this->db->from('application_services');
        $this->db->join('subservices', 'subservices.subservice_id = application_services.subservice_id', 'left');
        $this->db->where('application_services.application_id', $application_id);
        return $this->db->get()->result();
    }

    public function get_digital_fingerprinting_application_options($application_id) {
        $this->db->where('application_id', $application_id);
        return $this->db->get('digital_fingerprinting_application_options')->result();
    }

    public function get_record_suspension_applications() {
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
        $this->db->where('application_completed', 1);
        $this->db->where('corporate_id', $this->session->userdata('corporate_id'));
        return $this->db->order_by('record_suspension_id', 'DESC');
    }

//    public function get_record_suspension_application_details($application_id) {
//        $this->db->where('record_suspension_id', $application_id);
//        $this->db->where('application_completed', 1);
//        return $this->db->get('record_suspension_applications')->row();
//    }

    public function get_record_suspension_application_services($application_id) {
        $this->db->select('record_suspension_services.*, subservices.subservice_name');
        $this->db->from('record_suspension_services');
        $this->db->join('subservices', 'subservices.subservice_id = record_suspension_services.subservice_id', 'left');
        $this->db->where('record_suspension_services.application_id', $application_id);
        return $this->db->get()->result();
    }

    public function get_record_suspension_application_offences($application_id) {
        $this->db->where('application_id', $application_id);
        return $this->db->get('application_consent_offence')->result();
    }

    public function get_us_entry_waiver_applications() {
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
        $this->db->where('application_completed', 1);
        $this->db->where('corporate_id', $this->session->userdata('corporate_id'));
        return $this->db->order_by('us_entry_waiver_id', 'DESC');
    }

//    public function get_us_entry_waiver_application_details($application_id) {
//        $this->db->where('us_entry_waiver_id', $application_id);
//        $this->db->where('application_completed', 1);
//        return $this->db->get('us_entry_waiver_applications')->row();
//    }

    public function get_us_entry_waiver_application_services($application_id) {
        $this->db->select('us_entry_waiver_services.*, subservices.subservice_name');
        $this->db->from('us_entry_waiver_services');
        $this->db->join('subservices', 'subservices.subservice_id = us_entry_waiver_services.subservice_id', 'left');
        $this->db->where('us_entry_waiver_services.application_id', $application_id);
        return $this->db->get()->result();
    }

    public function get_us_entry_waiver_application_offences($application_id) {
        $this->db->where('application_id', $application_id);
        return $this->db->get('us_entry_waiver_consent_offence')->result();
    }



    public function get_all_corporates() {
        if ($this->input->get('id')) {
            $this->db->like('corporates.id', $this->input->get('id'));
        }

        if ($this->input->get('company')) {
            $this->db->like('corporates.company', $this->input->get('company'));
        }

        if ($this->input->get('telephone')) {
            $this->db->like('corporates.telephone', $this->input->get('telephone'));
        }

        if ($this->input->get('address')) {
            $this->db->like('corporates.address', $this->input->get('address'));
        }

        if ($this->input->get('user_role')) {
            $this->db->like('corporates.user_role', $this->input->get('user_role'));
        }

        if ($this->input->get('status')) {
            $this->db->like('corporates.status', $this->input->get('status'));
        }
        $this->db->from('corporates');
        return $this->db->order_by('corporates.id', 'ASC');
//        return $this->db->get('corporates')->result();
    }


    public function save_corporate_sub_employee(){
        $options = ['cost' => 10];
        $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

        $data = array(
            'super_corporate_employee_id' => $this->session->userdata('corporate_id'),
            'email' => $this->input->post('email'),
            'password' => $encrypted_pass,
            'active' => 1,

            'company' => $this->input->post('company'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'address' => $this->input->post('address'),
            'country_id' => $this->input->post('country_id'),
            'state_id' => $this->input->post('state_id'),
            'city_id' => $this->input->post('city_id'),
            'telephone' => $this->input->post('telephone'),
            'cell' => $this->input->post('cell'),
            'fax' => $this->input->post('fax'),
            'position' => $this->input->post('position'),
            'user_role_id' => 'f971e9f3-57c9-9206-a35d-1700188b',
        );
        $uuid = UUID();
        $this->db->set('id', "$uuid", TRUE);
        $result = $this->db->insert('users', $data);
        if($result){
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $htmlContent = '<h1>ePolice Sub Corporate User Request Approved</h1>';
            $htmlContent .= '<p>User Name:  "'.$email.'" </p>';
            $htmlContent .= '<p>Password: "'.$password.'"</p>';

            $this->email->to($email);
            $this->email->from(EMAIL_FROM_SMTP, 'ePolice');
            $this->email->subject('ePolice Sub Corporate  User Request Approved');
            $this->email->message($htmlContent);
            $this->email->send();
        }
        return $result;
    }

    public function edit_corporate_profile_save(){
        if(!empty($this->input->post('password'))) {
            $options = ['cost' => 10];
            $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
            $data = array(
                'password' => $encrypted_pass,
                'company' => $this->input->post('company'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'address' => $this->input->post('address'),
                'country_id' => $this->input->post('country_id'),
                'state_id' => $this->input->post('state_id'),
                'city_id' => $this->input->post('city_id'),
                'telephone' => $this->input->post('telephone'),
                'cell' => $this->input->post('cell'),
                'fax' => $this->input->post('fax'),
                'profile_image' => $this->input->post('profile_picture')
            );
        }

        else {
            $data = array(
                'company' => $this->input->post('company'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'address' => $this->input->post('address'),
                'country_id' => $this->input->post('country_id'),
                'state_id' => $this->input->post('state_id'),
                'city_id' => $this->input->post('city_id'),
                'telephone' => $this->input->post('telephone'),
                'cell' => $this->input->post('cell'),
                'fax' => $this->input->post('fax'),
                'comments' => $this->input->post('comments'),
                'profile_image' => $this->input->post('profile_picture')
            );
        }

//        var_dump($data); die();

        $this->db->set($data); //value that used to update column
        $this->db->where('id', $this->session->userdata('corporate_id')); //which row want to upgrade
        $result = $this->db->update('users');
        return $result;
    }


    public function multiple_file_upload($data){
        $insert = $this->db->insert_batch('service_order_images',$data);
        return $insert?true:false;
    }




    public function get_service_order_applications() {
        $this->db->select('service_order_images.*');
        $this->db->from('service_order_images');
        return $this->db->order_by('id', 'DESC');
    }

    public function get_total_record($table, $where){
        $this->db->from($table);
        if(! empty($where)) {
            $this->db->where($where);
        }
        return $this->db->count_all_results();
    }






}