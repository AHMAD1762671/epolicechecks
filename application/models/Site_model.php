<?php

class Site_model extends CI_model {

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
        return $this->db->where('name_based_application_id', $application_id)->get('name_based_applications')->row();
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
            'application_status' => "New",
            'created_at' => date('Y-m-d H:i:s', time()),
            'application_completed' => 1
        );
        $this->db->where('name_based_application_id', $application_id)->where('client_id', $client_id);
        if ($this->db->update('name_based_applications', $data)) {

//            insert data for notifications
            $data = array(
                'table_id' => $application_id,
                'table_name' => 'name_based_applications',
                'description' => 'record_inserted'
            );
            $this->db->insert('application_notification', $data);

            if ($this->name_based_check_consent_offence_save($application_id)) {
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
        return $this->db->where('digital_fingerprinting_application_id', $application_id)->get('digital_fingerprinting_applications')->row();
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
        if($this->db->where('digital_fingerprinting_application_id', $application_id)->where('client_id', $client_id)){

            //            insert data for notifications
            $data = array(
                'table_id' => $application_id,
                'table_name' => 'digital_fingerprinting_applications',
                'description' => 'record_inserted'
            );
            $this->db->insert('digital_fingerprinting_applications', $data);


            return $this->db->update('digital_fingerprinting_applications', $data);
        }
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
        return $this->db->where('record_suspension_id', $application_id)->get('record_suspension_applications')->row();
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
        return $this->db->where('us_entry_waiver_id', $application_id)->get('us_entry_waiver_applications')->row();
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


    public function update_application_id($id, $newId){
        $data = array(
            'name_based_application_id_new' => $newId
        );
        $this->db->where('name_based_application_id', $id);
        $this->db->update('name_based_applications', $data);
    }


    public function update_digital_fingerprinting_application_id_new($id, $newId){
        $data = array(
            'digital_fingerprinting_application_id_new' => $newId
        );
        $this->db->where('digital_fingerprinting_application_id', $id);
        $this->db->update('digital_fingerprinting_applications', $data);
    }

    public function forward_application_to_user($data){
        $result = $this->db->insert('assign_application_to_user', $data);
        return $result;
    }

    //    upload the certificate in the details page
    public function update_certificate_of_digital_fingerprinting($filename, $id){
        $this->db->set('consent_certificate', $filename); //value that used to update column
        $this->db->where('digital_fingerprinting_application_id', $id); //which row want to upgrade
        $result = $this->db->update('digital_fingerprinting_applications');
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
        $this->db->where('digital_fingerprinting_application_id', $this->input->post('application_id')); //which row want to upgrade
        $result = $this->db->update('digital_fingerprinting_applications');
        if($result) {
            $this->db->set('application_status_id', 'UUID()', FALSE);
            $this->db->insert('application_status', $data);
        }
    }

//    namebase signature part
    public function save_text_signature($signature, $application_id){
        $this->db->set('consent_signature', $signature);
        $this->db->where('name_based_application_id', $application_id);
        return $this->db->update('name_based_applications');
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

//    record suspension signature
    public function save_drawable_signature_record_suspension_consent($signature, $application_id){
        $this->db->set('consent_signature_drawable', $signature);
        $this->db->where('record_suspension_id', $application_id);
        return $this->db->update('record_suspension_applications');
    }

    public function save_text_signature_record_suspension_consent($signature, $application_id){
        $this->db->set('consent_signature', $signature);
        $this->db->where('record_suspension_id', $application_id);
        return $this->db->update('record_suspension_applications');
    }

    public function save_record_suspension_consent_signature_image($signature, $application_id){
        $this->db->set('consent_signature_picture', $signature);
        $this->db->where('record_suspension_id', $application_id);
        return $this->db->update('record_suspension_applications');
    }

    public function update_application_id_record_suspension_consent($id, $newId){
        $data = array(
            'record_suspension_id_new' => $newId
        );
        $this->db->where('record_suspension_id', $id);
        $this->db->update('record_suspension_applications', $data);
    }


//    us entry waiver signature
//    us entry waiver signature
//    record suspension signature
    public function save_drawable_signature_us_entry_waiver_consent($signature, $application_id){
        $this->db->set('consent_signature_drawable', $signature);
        $this->db->where('us_entry_waiver_id', $application_id);
        return $this->db->update('us_entry_waiver_applications');
    }

    public function save_text_signature_us_entry_waiver_consent($signature, $application_id){
        $this->db->set('consent_signature', $signature);
        $this->db->where('us_entry_waiver_id', $application_id);
        return $this->db->update('us_entry_waiver_applications');
    }

    public function save_us_entry_waiver_consent_signature_image($signature, $application_id){
        $this->db->set('consent_signature_picture', $signature);
        $this->db->where('us_entry_waiver_id', $application_id);
        return $this->db->update('us_entry_waiver_applications');
    }

    public function update_application_id_us_entry_waiver_consent($id, $newId){
        $data = array(
            'us_entry_waiver_id_new' => $newId
        );
        $this->db->where('us_entry_waiver_id', $id);
        $this->db->update('us_entry_waiver_applications', $data);
    }


    public function save_corporate_sub_employee(){
        $options = ['cost' => 10];
        $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

        $data = array(
            'sub_corporate_employee' => $this->input->post('id'),

            'name_based_check' => $this->input->post('name_based_check'),
            'digital_fingerprinting' => $this->input->post('digital_fingerprinting'),
            'record_suspension' => $this->input->post('record_suspension'),
            'us_entry_waiver' => $this->input->post('us_entry_waiver'),

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
            'user_role' => 'sub-corporate-employee',
        );
//        var_dump($data); die();
        $uuid = UUID();
        $this->db->set('id', "$uuid", TRUE);
        $result = $this->db->insert('corporates', $data);
//        $this->add_log('corporate', $uuid, 'added');
        return $result;
    }


}