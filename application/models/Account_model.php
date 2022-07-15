<?php

class Account_model extends CI_model
{
    public function get_current_user_roles_permissions()
    {
        $user_role_id = $this->db->where('id', $this->session->userdata('user_id'))->get('users')->row()->user_role_id;
        $this->db->select('user_permissions.*');
        $this->db->from('user_permissions');
        $this->db->join('user_roles_permissions', 'user_permissions.user_permission_id = user_roles_permissions.user_permission_id', 'left');
        $this->db->where('user_roles_permissions.user_role_id', $user_role_id);
        return $this->db->get()->result();
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



    public function save_custom_invoice(){
        $data = array(
            'user_id' => $this->input->post('user_email'),
            'company_name' => $this->input->post('company_name'),
            'user_name' => $this->input->post('user_name'),
            'address' => $this->input->post('address'),
            'city' => $this->input->post('city'),
            'province' => $this->input->post('province'),
            'postal_code' => $this->input->post('postal_code'),
            'country' => $this->input->post('country'),
            'services' => $this->input->post('services'), //Quantity,
            'quantity' => $this->input->post('quantity'), //Quantity,
            'note' => $this->input->post('note'),
            'total_amount' => $this->input->post('total_price'),
            'payment_status' => $this->input->post('payment_status'),


        );

//        var_dump($data); die();

        $result = $this->db->insert('invoices_custom', $data);
//        if($result){
//            $email = $this->input->post('email');
//            $password = $this->input->post('password');
//            $htmlContent = '<h1>ePolice Invoice Generated</h1>';
//            $htmlContent .= '<p>User Name:  "'.$email.'" </p>';
//            $htmlContent .= '<p>Password: "'.$password.'"</p>';
//
//            $this->email->to($email);
//            $this->email->from(EMAIL_FROM_SMTP, 'ePolice');
//            $this->email->subject('ePolice New Invoice generated');
//            $this->email->message($htmlContent);
//            $this->email->send();
//        }
        return $result;
    }




        public function agent_list($user_role_id) {
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

        if ($this->input->get('payment_status')) {
            $this->db->like('corporates.status', $this->input->get('status'));
        }
        $this->db->from('users');
        $this->db->where('user_role_id', $user_role_id);
        return $this->db->get()->result();
//        return $this->db->order_by('users.id', 'ASC');
    }

    public function get_name_based_applications() {
        if ($this->input->get('id')) {
            $this->db->where('name_based_application_id_new', $this->input->get('id'));
        }
        if ($this->input->get('f_name')) {
            $this->db->like('consent_first_name', $this->input->get('f_name'));
        }

        if ($this->input->get('l_name')) {
            $this->db->like('consent_last_name', $this->input->get('l_name'));
        }

        if ($this->input->get('dob')) {
            $this->db->like('consent_dob', $this->input->get('dob'));
        }

        if ($this->input->get('phone')) {
            $this->db->group_start()->like('delivery_phone', $this->input->get('phone'));
            $this->db->or_like('card_holder_phone', $this->input->get('phone'));
            $this->db->or_like('card_holder_phone', $this->input->get('phone'));
            $this->db->or_like('consent_phone', $this->input->get('phone'));
            $this->db->or_like('consent_cellphone', $this->input->get('phone'))->group_end();
        }
        if ($this->input->get('application_status')) {
            $this->db->where('application_status', $this->input->get('application_status'));
        }

        $this->db->select('name_based_applications.*');
        $this->db->from('name_based_applications');
        $this->db->where('application_completed', 1);

        return $this->db->order_by('name_based_application_id', 'DESC');
    }








}