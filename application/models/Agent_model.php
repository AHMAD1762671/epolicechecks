<?php

class Agent_model extends CI_model {

    public function login_agent($email, $password) {
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
        return $this->db->update('users', $data);
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
        //    'delivery_method_id' => $this->input->post('delivery_method'),
        //    'delivery_method_price' => $this->input->post('delivery_method_price'),
        //    'sub_total' => $this->input->post('sub_total'),
        //    'tax' => $this->input->post('tax'),
        //    'grand_total' => $this->input->post('grand_total'),
        //    'payment_status' => 0,
           'client_id' => $clinet_id,
           'agent_id' => $this->session->userdata('agent_id'),
        //    'application_country' => $this->input->post('country')
       );
       if ($this->db->insert('name_based_applications', $data)) {
           $aplication_id = $this->db->insert_id();
           return $aplication_id;
       } else {
           return FALSE;
       }
   }

   public function name_based_check_consent_save() {
    $application_id = $this->input->post('application_id');
    $data = array(
        'consent_last_name' => $this->input->post('consent_last_name'),
        'consent_first_name' => $this->input->post('consent_first_name'),
        'consent_middle_name' => $this->input->post('consent_middle_name'),
        'consent_nickname' => $this->input->post('consent_nickname'),
        'consent_dob' => $this->input->post('consent_dob'),
        'consent_birth_place' => $this->input->post('consent_birth_place'),
//            'consent_country' => $this->input->post('consent_current_address'),,
        'consent_phone' => $this->input->post('consent_phone'),
        'consent_cellphone' => $this->input->post('consent_cellphone'),
        'consent_email' => $this->input->post('consent_email'),
        'consent_current_address' => $this->input->post('consent_current_address'),
        'consent_current_city' => $this->input->post('consent_current_city'),
        'consent_current_state' => $this->input->post('consent_current_state'),
        'consent_current_post_code' => $this->input->post('consent_current_post_code'),
//            'consent_previous_address' => $this->input->post('consent_previous_address'),,
        'consent_arrested_canada' => $this->input->post('consent_arrested_canada'),
        'consent_arrested_america' => $this->input->post('consent_arrested_america'),
        'consent_arrested_foreign' => $this->input->post('consent_arrested_foreign'),
        'consent_refused_border' => $this->input->post('consent_refused_border'),
        'consent_refused_border_date' => $this->input->post('consent_refused_border_date'),
        'consent_deported_america' => $this->input->post('consent_deported_america'),
        'consent_deported_america_date' => $this->input->post('consent_deported_america_date'),
        'consent_criminal_country' => $this->input->post('consent_criminal_country'),
        'consent_criminal_offence' => $this->input->post('consent_criminal_offence'),
//            'consent_previous_city' => $this->input->post('consent_previous_city'),,
//            'consent_previous_state' => $this->input->post('consent_previous_state'),,
//            'consent_previous_post_code' => $this->input->post('consent_previous_post_code'),,
//            'consent_reason' => $this->input->post('consent_reason'),,
//            'consent_reason_other' => $this->input->post('consent_reason_other'),,
//            'consent_organization' => $this->input->post('consent_organization'),,
//            'consent_contact_name' => $this->input->post('consent_contact_name'),,
//            'consent_contact_phone' => $this->input->post('consent_contact_phone'),,
        'consent_comments' => $this->input->post('consent_comments'),
//            'created_at' => date('Y-m-d H:i:s', time()),
//            'application_completed' => 1
    );

//        var_dump($data);
//        var_dump($application_id);
//        die();

    $this->db->where('name_based_application_id', $application_id);
    if ($this->db->update('name_based_applications', $data)) {
        return $this->db->error();
//            return true;
    }
    else {
        return $this->db->error();
//            return FALSE;
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
        return $this->db->where('name_based_application_id', $application_id)->where('agent_id', $this->session->userdata('agent_id'))->get('name_based_applications')->row();
    }

    public function get_single_name_based_check_application_details_by_id($application_id) {
        return $this->db->where('name_based_application_id', $application_id)->get('name_based_applications')->row();
    }

//    public function name_based_check_payment_save() {
//        $application_id = $this->input->post('application_id');
//        $client_id = $this->input->post('client_id');
//        $data = array(
//            'card_number' => $this->input->post('card_number_1') . $this->input->post('card_number_2') . $this->input->post('card_number_3') . $this->input->post('card_number_4'),
//            'card_number' => $this->input->post('card_number_1'),
//            'card_cvc' => $this->input->post('card_cvc'),
//            'card_expiry' => $this->input->post('card_expiry_month') . '/' . $this->input->post('card_expiry_year'),
//            'card_expiry' => $this->input->post('card_expiry'),
//            'card_holder_name' => $this->input->post('card_holder_name'),
//            'card_holder_email' => $this->input->post('card_holder_email'),
//            'card_holder_phone' => $this->input->post('card_holder_phone'),
//            'payment_status' => 1
//        );
//        $this->db->where('name_based_application_id', $application_id)->where('client_id', $client_id);
//        return $this->db->update('name_based_applications', $data);
//    }

//     public function name_based_check_consent_save($signature_name) {
//         $application_id = UUID();
//         $client_id = bin2hex(random_bytes(64));

//         $data = array(
//             'consent_last_name' => $this->input->post('consent_last_name'),
//             'consent_first_name' => $this->input->post('consent_first_name'),
//             'consent_middle_name' => $this->input->post('consent_middle_name'),
//             'consent_nickname' => $this->input->post('consent_nickname'),
//             'consent_gender' => $this->input->post('consent_gender'),
//             'consent_dob' => $this->input->post('consent_dob'),
//             'consent_birth_place' => $this->input->post('consent_birth_place'),
//             'consent_country' => $this->input->post('consent_country'),
//             'consent_phone' => $this->input->post('consent_phone'),
//             'consent_cellphone' => $this->input->post('consent_cellphone'),
//             'consent_email' => $this->input->post('consent_email'),
//             'consent_current_address' => $this->input->post('consent_current_address'),
//             'consent_current_city' => $this->input->post('consent_current_city'),
//             'consent_current_state' => $this->input->post('consent_current_state'),
//             'consent_current_post_code' => $this->input->post('consent_current_post_code'),
//             'consent_previous_address' => $this->input->post('consent_previous_address'),
//             'consent_reason' => $this->input->post('consent_reason'),
//             'consent_reason_other' => $this->input->post('consent_reason_other'),
//             'consent_organization' => $this->input->post('consent_organization'),
//             'consent_contact_name' => $this->input->post('consent_contact_name'),
//             'consent_contact_phone' => $this->input->post('consent_contact_phone'),
//             'consent_criminal_offence' => $this->input->post('consent_criminal_offence'),
//             'consent_signature_drawable' => $signature_name,
//             'client_id' => $client_id,
//             'agent_id' => $this->session->userdata('agent_id'),
//         );

// //        var_dump($data); die();

//         if ($this->db->insert('name_based_applications', $data)) {
//             $application_id = $this->db->insert_id();
//             var_dump($application_id); die();
//             return $aplication_id;
//         }




//         $this->db->where('name_based_application_id', $application_id)->where('client_id', $client_id);
//         if ($this->db->update('name_based_applications', $data)) {
//             if ($this->name_based_check_consent_offence_save($application_id)) {

//                 //            insert data for notifications
//                 $data = array(
//                     'table_id' => $application_id,
//                     'table_name' => 'name_based_applications',
//                     'description' => 'record_inserted'
//                 );
//                 $this->db->insert('application_notification', $data);

//                 return $application_id;
//             } else {
//                 return FALSE;
//             }
//         } else {
//             return FALSE;
//         }
//     }

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

    public function save_signature_image($signature, $application_id){
        $this->db->set('consent_signature_picture', $signature);
        $this->db->where('name_based_application_id', $application_id);
        return $this->db->update('name_based_applications');
    }

    public function save_drawable_signature($signature, $application_id){
        $this->db->set('consent_signature_drawable', $signature);
        $this->db->where('name_based_application_id', $application_id);
        return $this->db->update('name_based_applications');
    }

//    public function save_drawable_signature($signature, $application_id){
//        $this->db->set('consent_signature_drawable', $signature);
//        $this->db->where('name_based_application_id', $application_id);
//        return $this->db->update('name_based_applications');
//    }


    // public function digital_fingerprinting_form_save() {
    //     $application_id = UUID();
    //     $clinet_id = bin2hex(random_bytes(64));
    //     $data = array(
    //         'state_id' => $this->input->post('state_id'),
    //         'agency_state' => $this->input->post('agency_state'),
    //         'agency_city' => $this->input->post('agency_city'),
    //         'agency_address' => $this->input->post('agency_address'),
    //         'delivery_name' => $this->input->post('delivery_name'),
    //         'delivery_address' => $this->input->post('delivery_address'),
    //         'delivery_city' => $this->input->post('delivery_city'),
    //         'delivery_state' => $this->input->post('delivery_state'),
    //         'delivery_country' => $this->input->post('delivery_country'),
    //         'delivery_phone' => $this->input->post('delivery_phone'),
    //         'delivery_email' => $this->input->post('delivery_email'),
    //         'share_result' => $this->input->post('share_result'),
    //         'share_email' => $this->input->post('share_email'),
    //         'delivery_method_id' => $this->input->post('delivery_method'),
    //         'delivery_method_price' => $this->input->post('delivery_method_price'),
    //         'sub_total' => $this->input->post('sub_total'),
    //         'tax' => $this->input->post('tax'),
    //         'grand_total' => $this->input->post('grand_total'),
    //         'payment_status' => 0,
    //         'client_id' => $clinet_id,
    //         'agent_id' => $this->session->userdata('agent_id'),
    //         'application_country' => $this->input->post('country')
    //     );
    //     if ($this->db->insert('digital_fingerprinting_applications', $data)) {
    //         $aplication_id = $this->db->insert_id();
    //         if ($this->digital_fingerprinting_form_services_save($aplication_id)) {
    //             $services = $this->input->post('digital_fingerprinting_options');
    //             foreach ($services as $value) {
    //                 $data = array(
    //                     'digital_fingerprinting_application_option' => $value,
    //                     'application_id' => $aplication_id
    //                 );
    //                 $this->db->insert('digital_fingerprinting_application_options', $data);
    //             }
    //             return $aplication_id;
    //         } else {
    //             return FALSE;
    //         }
    //     } else {
    //         return FALSE;
    //     }
    // }

    public function digital_fingerprinting_form_save() {
//        $application_id = UUID();
//        $clinet_id = bin2hex(random_bytes(64));
        $data = array(
            'series_type' => $this->input->post('series_type'),
            'consent_first_name' => $this->input->post('consent_first_name'),
            'consent_middle_name' => $this->input->post('consent_middle_name'),
            'consent_last_name' => $this->input->post('consent_last_name'),
            'consent_maiden_name' => $this->input->post('consent_nick_name'),
            'consent_dob' => $this->input->post('consent_dob'),
            'consent_place_of_birth' => $this->input->post('consent_place_of_birth'),
            'consent_phone' => $this->input->post('consent_phone'),
            'consent_cellphone' => $this->input->post('consent_cellphone'),
            'consent_email' => $this->input->post('consent_email'),
            'consent_current_address' => $this->input->post('consent_current_address'),
            'fingerprinting_agency_address' => $this->input->post('fingerprinting_agency_address'),
            'fingerprinting_agency_phone' => $this->input->post('fingerprinting_agency_tel'),
            'rcmp_type' => $this->input->post('rcmp_application_type'),
            'send_result' => $this->input->post('send_result_to'),
            'appointment_time' => $this->input->post('appointment_time'),
            'gender' => $this->input->post('consent_gender'),

            'hair_color' => $this->input->post('consent_hair_color'),
            'eye_color' => $this->input->post('consent_eye_color'),
            'height' => $this->input->post('consent_height'),
            'weight' => $this->input->post('consent_weight'),


            'federal_employment' => $this->input->post('federal_employment'),
            'federal_employer_name' => $this->input->post('federal_employer_name'),
            'federal_job_title' => $this->input->post('federal_job_title'),

            'provincial_employment' => $this->input->post('provincial_employment'),
            'provincial_employer_name' => $this->input->post('provincial_employer_name'),
            'provincial_employer_title' => $this->input->post('provincial_job_title'),

            'private_industry' => $this->input->post('private_industry'),
            'private_industry_company_name' => $this->input->post('private_industry_company_name'),
            'private_industry_position' => $this->input->post('private_industry_position'),

            'Citizenship' => $this->input->post('citizenship'),
            'citizenship_ircc_file_no' => $this->input->post('citizenship_ircc_file_no'),
            'citizenship_uci' => $this->input->post('citizenship_uci'),


            'permanent_residency' => $this->input->post('permanent_residency'),
            'permanent_residency_ircc_no' => $this->input->post('permanent_residency_ircc_file_no'),
            'permanent_residency_uci' => $this->input->post('permanent_residency_uci'),


            'vulnerable_sector' => $this->input->post('vulnerable_sector'),
            'volunteer_work' => $this->input->post('volunteer_work'),
            'adoption' => $this->input->post('adoption'),
            'fbi' => $this->input->post('fbi'),
            'international_fingerprints' => $this->input->post('international_fingerprints'),

            'record_suspension' => $this->input->post('record_suspension'),
            'us_entry_waiver_travel_visa' => $this->input->post('us_entry_waiver_travel_visa'),
            'name_change' => $this->input->post('name_change'),
            'other' => $this->input->post('other'),

            'other_text' => $this->input->post('other_text'),
            'comment' => $this->input->post('consent_comments'),

            'officer_name' => $this->input->post('officer_name'),
            'date_fingerprinted' => $this->input->post('date_fingerprinted'),
            'time_fingerprinted' => $this->input->post('time_fingerprinted'),
            'date_submitted' => $this->input->post('date_submitted'),
            'result_delivery' => $this->input->post('result_deliver'),
            'address' => $this->input->post('address'),
            'rcmp_status' => $this->input->post('rcmp_status'),
            'dcb_number' => $this->input->post('dcn_number'),
            'referred_by' => $this->input->post('referred_by'),
//            'edit_application' => $this->input->post('consent_comments'),
            'agent_id' => $this->session->userdata('agent_id'),
        );
//        var_dump($data); die();


        if ($this->db->insert('digital_fingerprinting_applications', $data)) {
            $aplication_id = $this->db->insert_id();
            return $aplication_id;
        }
        else {
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
        return $this->db->where('digital_fingerprinting_application_id', $application_id)->where('agent_id', $this->session->userdata('agent_id'))->get('digital_fingerprinting_applications')->row();
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
            'agent_id' => $this->session->userdata('agent_id'),
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
        return $this->db->where('record_suspension_id', $application_id)->where('agent_id', $this->session->userdata('agent_id'))->get('record_suspension_applications')->row();
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

    // public function record_suspension_consent_save() {
    //     $application_id = $this->input->post('application_id');
    //     $client_id = $this->input->post('client_id');
    //     $data = array(
    //         'consent_last_name' => $this->input->post('consent_last_name'),
    //         'consent_first_name' => $this->input->post('consent_first_name'),
    //         'consent_middle_name' => $this->input->post('consent_middle_name'),
    //         'consent_nickname' => $this->input->post('consent_nickname'),
    //         'consent_dob' => $this->input->post('consent_dob'),
    //         'consent_birth_place' => $this->input->post('consent_birth_place'),
    //         'consent_phone' => $this->input->post('consent_phone'),
    //         'consent_cellphone' => $this->input->post('consent_cellphone'),
    //         'consent_email' => $this->input->post('consent_email'),
    //         'consent_current_address' => $this->input->post('consent_current_address'),
    //         'consent_current_state' => $this->input->post('consent_current_state'),
    //         'consent_current_post_code' => $this->input->post('consent_current_post_code'),
    //         'consent_arrested_canada' => $this->input->post('consent_arrested_canada'),
    //         'consent_arrested_america' => $this->input->post('consent_arrested_america'),
    //         'consent_arrested_foreign' => $this->input->post('consent_arrested_foreign'),
    //         'consent_refused_border' => $this->input->post('consent_refused_border'),
    //         'consent_refused_border_date' => $this->input->post('consent_refused_border_date'),
    //         'consent_deported_america' => $this->input->post('consent_deported_america'),
    //         'consent_deported_america_date' => $this->input->post('consent_deported_america_date'),
    //         'consent_criminal_country' => $this->input->post('consent_criminal_country'),
    //         'consent_criminal_offence' => $this->input->post('consent_criminal_offence'),
    //         'consent_comments' => $this->input->post('consent_comments'),
    //         'created_at' => date('Y-m-d H:i:s', time()),
    //         'application_completed' => 1
    //     );
    //     $this->db->where('record_suspension_id', $application_id)->where('client_id', $client_id);
    //     if ($this->db->update('record_suspension_applications', $data)) {
    //         if ($this->record_suspension_consent_offence_save($application_id)) {
    //             return $application_id;
    //         } else {
    //             return FALSE;
    //         }
    //     } else {
    //         return FALSE;
    //     }
    // }


    public function record_suspension_consent_save() {
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
            'agent_id' => $this->session->userdata('agent_id'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'application_completed' => 1
        );
        if ($this->db->insert('record_suspension_applications', $data)) {
            $aplication_id = $this->db->insert_id();
            return $aplication_id;
        } else {
            return $this->db->error();
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
            'agent_id' => $this->session->userdata('agent_id'),
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
        return $this->db->where('us_entry_waiver_id', $application_id)->where('agent_id', $this->session->userdata('agent_id'))->get('us_entry_waiver_applications')->row();
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
        // $this->db->where('application_completed', 1);
        $this->db->where('agent_id', $this->session->userdata('agent_id'));
        return $this->db->order_by('name_based_application_id', 'DESC');
    }

    public function get_name_based_application_details($application_id) {
        $this->db->where('name_based_application_id', $application_id)->where('agent_id', $this->session->userdata('agent_id'));
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
       // $this->db->where('application_completed', 1);
        $this->db->where('agent_id', $this->session->userdata('agent_id'));
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
       // $this->db->where('application_completed', 1);
        $this->db->where('agent_id', $this->session->userdata('agent_id'));
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
        //$this->db->where('application_completed', 1);
        $this->db->where('agent_id', $this->session->userdata('agent_id'));
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

    public function forward_application_to_user($data){
        $result = $this->db->insert('assign_application_to_user', $data);
        return $result;
    }

    //    upload the certificate in the details page
    public function update_record_suspension_applications($filename, $id){
        $this->db->set('consent_certificate', $filename); //value that used to update column
        $this->db->where('record_suspension_id', $id); //which row want to upgrade
        $result = $this->db->update('record_suspension_applications');
        return $result;
    }

    //    status save from detail page
    public function add_application_status_save() {
        $data = array(
            'status' => $this->input->post('application_status'),
            'application_id' => $this->input->post('application_id'),
            'application_type' => $this->input->post('type'),
            'created_by' => $this->session->userdata('user_id')
        );

        $this->db->set('application_status', $this->input->post('application_status')); //value that used to update column
        $this->db->where('record_suspension_id', $this->input->post('application_id')); //which row want to upgrade
        $result = $this->db->update('record_suspension_applications');
        if($result) {
            $this->db->set('application_status_id', 'UUID()', FALSE);
            $this->db->insert('application_status', $data);
        }
    }

    public function get_agent_data_by_id($id){
        $this->db->where('agent_id', $id);
        return $this->db->get('agents')->result();
    }

    public function agent_edit_profile_save($filename){
//        echo "hi"; die();
        if(!empty($this->input->post('password'))) {
            $options = ['cost' => 10];
            $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
            if(empty($filename)) {
                $data = array(
                    'password' => $encrypted_pass,
                    'company' => $this->input->post('company'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'gender' => $this->input->post('gender'),
                    'address' => $this->input->post('address'),
                    'country_id' => $this->input->post('country_id'),
                    'state_id' => $this->input->post('state_id'),
                    'city_id' => $this->input->post('city_id'),
                    'telephone' => $this->input->post('telephone'),
                    'cell' => $this->input->post('cell'),
                    'fax' => $this->input->post('fax'),
//                'profile_image' => $filename,
                );
            }
            else{
                $data = array(
                    'password' => $encrypted_pass,
                    'company' => $this->input->post('company'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'gender' => $this->input->post('gender'),
                    'address' => $this->input->post('address'),
                    'country_id' => $this->input->post('country_id'),
                    'state_id' => $this->input->post('state_id'),
                    'city_id' => $this->input->post('city_id'),
                    'telephone' => $this->input->post('telephone'),
                    'cell' => $this->input->post('cell'),
                    'fax' => $this->input->post('fax'),
                    'profile_image' => $filename
                );
            }
        }
        else {
            if(empty($filename)) {
                $data = array(
                    'company' => $this->input->post('company'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'gender' => $this->input->post('gender'),
                    'address' => $this->input->post('address'),
                    'country_id' => $this->input->post('country_id'),
                    'state_id' => $this->input->post('state_id'),
                    'city_id' => $this->input->post('city_id'),
                    'telephone' => $this->input->post('telephone'),
                    'cell' => $this->input->post('cell'),
                    'fax' => $this->input->post('fax'),
                    'profile_image' => $filename
                );
//                var_dump($data); die();
            }
            else{
                $data = array(
                    'company' => $this->input->post('company'),
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'gender' => $this->input->post('gender'),
                    'address' => $this->input->post('address'),
                    'country_id' => $this->input->post('country_id'),
                    'state_id' => $this->input->post('state_id'),
                    'city_id' => $this->input->post('city_id'),
                    'telephone' => $this->input->post('telephone'),
                    'cell' => $this->input->post('cell'),
                    'fax' => $this->input->post('fax'),
                );
//                var_dump($data); die();
            }
        }
        $this->db->set($data); //value that used to update column
        $this->db->where('id', $this->session->userdata('agent_id')); //which row want to upgrade
        $result = $this->db->update('users');
        return $result;
    }


    public function save_agent_sub_employee($profile_img){
        $options = ['cost' => 10];
        $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

        $data = array(
            'super_agent_employee_id' => $this->session->userdata('agent_id'),
            'email' => $this->input->post('email'),
            'password' => $encrypted_pass,
            'active' => 1,
            'company' => $this->input->post('company'),
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'address' => $this->input->post('address'),


            'country_id' => $this->input->post('country'),
            'state_id' => $this->input->post('state_id'),
            'city_id' => $this->input->post('city'),

            'telephone' => $this->input->post('telephone'),
            'cell' => $this->input->post('cell'),

            'fax' => $this->input->post('fax'),
            'position' => $this->input->post('position'),
            'gender' => $this->input->post('gender'),
            'profile_image' => $profile_img,

            'user_role_id' => 'f971e9f3-53z5-9206-a35d-1700188b',
        );
        $uuid = UUID();
        $this->db->set('id', "$uuid", TRUE);
        $result = $this->db->insert('users', $data);
        if($result){
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $htmlContent = '<h1>ePolice Sub Agent User Request Approved</h1>';
            $htmlContent .= '<p>User Name:  "'.$email.'" </p>';
            $htmlContent .= '<p>Password: "'.$password.'"</p>';

            $this->email->to($email);
            $this->email->from(EMAIL_FROM_SMTP, 'ePolice');
            $this->email->subject('ePolice Sub Agent  User Request Approved');
            $this->email->message($htmlContent);
            $this->email->send();
        }
        return $result;
    }

    public function find_user($id){
        $this->db->select('*');
        $this->db->from('name_based_applications');
        $this->db->where(array('name_based_application_id' => $id));
        $result = $this->db->get()->result();
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
    }


    public function multiple_file_upload($data){
        $insert = $this->db->insert_batch('service_order_images',$data);
        return $insert?true:false;
    }


        //get the new application numbers
        public function get_total_record($table, $where){
            $this->db->from($table);
    //        $data = array(
    //            'new_application' => 1,
    //            'application_completed' => 1
    //        );
            if(! empty($where)) {
                $this->db->where($where);
            }
            return $this->db->count_all_results();
        }

    public function get_all_states() {
        $this->db->select('states.*');
        $this->db->from('states');

        return $this->db->order_by('states.name', 'ASC')->get()->result();
    }

    public function get_service_order_applications() {
        $this->db->select('service_order_images.*');
        $this->db->from('service_order_images');
        return $this->db->order_by('id', 'DESC');
    }

    public function get_agent_email_by_id($user_id) {
        $result = $this->db->where('id', $user_id)->get('users')->row();
        return $result->email;
    }


//    dynamic dependent modules to get country->state->city
    function fetch_state($country_id)
    {
        $this->db->where('country_id', $country_id);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('states');
        $output = '<option value="">Select State</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->state_id.'">'.$row->name.'</option>';
        }
        return $output;
    }

    function fetch_city($state_id)
    {
        $this->db->where('state_id', $state_id);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('cities');
        $output = '<option value="">Select City</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->city_id.'">'.$row->name.'</option>';
        }
        return $output;
    }

}