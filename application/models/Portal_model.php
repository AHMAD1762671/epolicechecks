<?php

class Portal_model extends CI_model {

    public function add_log($type, $id, $token) {
        $this->logger
                ->user($this->session->userdata('user_id'))
                ->type($type)
                ->id($id)
                ->token($token)
                ->comment($this->session->userdata('name') . ' ' . $token . ' ' . $type)
                ->log();
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

    public function get_admin_profile_image_by_id($user_id) {
        return $this->db->where('id', $user_id)->get('users')->row()->profile_image;
    }

    public function get_admin_name_by_id($user_id) {
        $result = $this->db->where('id', $user_id)->get('users')->row();
        return $result->first_name . ' ' . $result->last_name;
    }


    public function get_admin_email_by_id($user_id) {
        $result = $this->db->where('user_role_id', $user_id)->get('users')->row();
        return $result->email;
    }


    public function get_email_by_id($user_id) {
        $result = $this->db->where('id', $user_id)->get('users')->row();
        return $result->email;
    }


    public function get_all_user_permissions() {
        $this->db->select('user_permissions.*, CONCAT(users.`first_name`, " ", users.`last_name`) as created_by_user');
        $this->db->from('user_permissions');
        $this->db->join('users', 'user_permissions.created_by = users.id', 'left');
        return $this->db->order_by('user_permissions.created_at', 'ASC')->get()->result();
    }

    public function add_user_permission_save() {
        $data = array(
            'user_permission_id' => UUID(),
            'user_permission_name' => $this->input->post('user_permission_name'),
            'user_permission_route' => $this->input->post('user_permission_route'),
            'user_permission_url' => $this->input->post('user_permission_url'),
            'user_permission_type' => $this->input->post('user_permission_type'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'created_by' => $this->session->userdata('user_id')
        );
        return $this->db->insert('user_permissions', $data);
    }

    public function edit_user_permission_save() {
        $data = array(
            'user_permission_name' => $this->input->post('user_permission_name'),
            'user_permission_route' => $this->input->post('user_permission_route'),
            'user_permission_url' => $this->input->post('user_permission_url'),
            'user_permission_type' => $this->input->post('user_permission_type')
        );
        return $this->db->where('user_permission_id', $this->input->post('user_permission_id'))->update('user_permissions', $data);
    }

    public function get_user_role_name_by_id($user_role_id) {
        $result = $this->db->where('user_role_id', $user_role_id)->get('user_roles')->row();
        if ($result) {
            return $result->user_role_name;
        } else {
            return FALSE;
        }
    }

    public function check_user_role_permissions($user_permission_id, $user_role_id) {
        return $this->db->where('user_role_id', $user_role_id)->where('user_permission_id', $user_permission_id)->get('user_roles_permissions')->row();
    }

    public function add_user_roles_permissions_save() {
        $this->db->where('user_role_id', $this->input->post('user_role_id'))->delete('user_roles_permissions');
        $data = array();
        $user_permission_id = $this->input->post('user_role_permission');
        if ($user_permission_id != NULL && $user_permission_id != '' && !empty($user_permission_id)) {
            foreach ($user_permission_id as $key => $value) {
                if ($value != "" && $value != NULL) {
                    $new = array(
                        'user_roles_permissions_id' => UUID(),
                        'user_role_id' => $this->input->post('user_role_id'),
                        'user_permission_id' => $value
                    );
                    array_push($data, $new);
                }
            }
            return $this->db->insert_batch('user_roles_permissions', $data);
        }
    }

    public function get_all_user_roles() {
        $this->db->select('user_roles.*, CONCAT(users.`first_name`, " ", users.`last_name`) as created_by_user');
        $this->db->from('user_roles');
        $this->db->join('users', 'user_roles.created_by = users.id', 'left');
        return $this->db->order_by('user_roles.created_at', 'ASC')->get()->result();
    }

    public function add_user_role_save() {
        $data = array(
            'user_role_id' => UUID(),
            'user_role_name' => $this->input->post('user_role_name'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'created_by' => $this->session->userdata('user_id')
        );
        return $this->db->insert('user_roles', $data);
    }

    public function edit_user_role_save() {
        $data = array(
            'user_role_name' => $this->input->post('user_role_name')
        );
        return $this->db->where('user_role_id', $this->input->post('user_role_id'))->update('user_roles', $data);
    }

    public function get_current_user_roles_permissions() {
        $user_role_id = $this->db->where('id', $this->session->userdata('user_id'))->get('users')->row()->user_role_id;
        $this->db->select('user_permissions.*');
        $this->db->from('user_permissions');
        $this->db->join('user_roles_permissions', 'user_permissions.user_permission_id = user_roles_permissions.user_permission_id', 'left');
        $this->db->where('user_roles_permissions.user_role_id', $user_role_id);
        return $this->db->get()->result();
    }

    public function get_all_users() {
        if ($this->input->get('name')) {
            $this->db->like('users.name', $this->input->get('name'));
        }
        $this->db->select('users.*, user_roles.user_role_name');
        $this->db->from('users');
        $this->db->join('user_roles', 'users.user_role_id = user_roles.user_role_id', 'left');
        return $this->db->order_by('users.id', 'ASC');
    }

    public function add_user_save() {

        $options = ['cost' => 10];
        $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'password' => $encrypted_pass,

            'company' => $this->input->post('company'),
            'gender' => $this->input->post('gender'),
            'address' => $this->input->post('address'),
            'country_id' => $this->input->post('country'),
            'state_id' => $this->input->post('state_id'),
            'city_id' => $this->input->post('city'),
            'telephone' => $this->input->post('telephone'),
            'cell' => $this->input->post('cell'),
            'fax' => $this->input->post('fax'),
            'position' => $this->input->post('position'),
            'comments' => $this->input->post('comments'),
//            'active' => $this->input->post('active'),
//            'active' => $this->input->post('active'),
            'active' => $this->input->post('active'),
            'user_role_id' => $this->input->post('user_role_id'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'created_by' => $this->session->userdata('user_id')
        );
        $uuid = $this->uuid->v4();
        $this->db->set('id', "$uuid", TRUE);
        $result = $this->db->insert('users', $data);
        $this->add_log('user', $uuid, 'added');
        return $result;
    }

    public function edit_user_save() {
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'active' => $this->input->post('active'),
            'user_role_id' => $this->input->post('user_role_id'),
        );
        if ($this->input->post('password')) {
//            echo "hellow"; die();
            $options = ['cost' => 10];
            $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
            $data['password'] = $encrypted_pass;
        }
        $this->db->where('id', $this->input->post('id'));
        $result = $this->db->update('users', $data);
        return $result;
    }

    public function get_all_countries() {
        if ($this->input->get('name')) {
            $this->db->like('countries.name', $this->input->get('name'));
        }
        $this->db->select('countries.*, CONCAT(users.`first_name`, " ", users.`last_name`) as created_by_user');
        $this->db->from('countries');
        $this->db->join('users', 'countries.created_by = users.id', 'left');
        return $this->db->order_by('countries.name', 'ASC');
    }

    public function add_country_save() {
        $data = array(
            'name' => $this->input->post('name'),
//            'phonecode' => $this->input->post('phonecode'),
            'active' => $this->input->post('active'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'created_by' => $this->session->userdata('user_id')
        );
        $result = $this->db->insert('countries', $data);
        $this->add_log('country', $this->db->insert_id(), 'added');
        return $result;
    }

    public function edit_country_save() {
        $data = array(
            'name' => $this->input->post('name'),
            'phonecode' => $this->input->post('phonecode'),
            'active' => $this->input->post('active')
        );
        $result = $this->db->where('country_id', $this->input->post('country_id'))->update('countries', $data);
        $this->add_log('country', $this->input->post('country_id'), 'updated');
        return $result;
    }

    public function get_all_states() {
        $this->db->where('countries.active', 1);
        if ($this->input->get('name')) {
            $this->db->like('states.name', $this->input->get('name'));
            $this->db->or_like('countries.name', $this->input->get('name'));
        }
        $this->db->select('states.*,countries.name as country_name,countries.country_id, CONCAT(users.`first_name`, " ", users.`last_name`) as created_by_user');
        $this->db->from('states');
        $this->db->join('countries', 'countries.country_id = states.country_id');
        $this->db->join('users', 'states.created_by = users.id', 'left');
        return $this->db->order_by('states.name', 'ASC');
    }

    public function add_state_save() {
        $data = array(
            'name' => $this->input->post('name'),
            'country_id' => $this->input->post('country_id'),
            'tax_type' => $this->input->post('tax_type'),
            'tax_rate' => $this->input->post('tax_rate'),
            'active' => $this->input->post('active'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'created_by' => $this->session->userdata('user_id')
        );
        $result = $this->db->insert('states', $data);
        $this->add_log('state', $this->db->insert_id(), 'added');
        return $result;
    }

    public function edit_state_save() {
        $data = array(
            'name' => $this->input->post('name'),
            'country_id' => $this->input->post('country_id'),
            'tax_type' => $this->input->post('tax_type'),
            'tax_rate' => $this->input->post('tax_rate'),
            'active' => $this->input->post('active')
        );
        return $this->db->where('state_id', $this->input->post('state_id'))->update('states', $data);
    }

    public function search_country_ajax() {
        return $this->db->like("name", $this->input->get('term'))->where('active', 1)->get('countries')->result();
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

    public function get_all_cities() {
        $this->db->where('states.active', 1);
        $this->db->where('countries.active', 1);
        if ($this->input->get('name')) {
            $this->db->like('cities.name', $this->input->get('name'));
            $this->db->or_like('states.name', $this->input->get('name'));
            $this->db->or_like('countries.name', $this->input->get('name'));
        }
        $this->db->select('cities.*,states.name as state_name,states.state_id, countries.name as country_name,countries.country_id, CONCAT(users.`first_name`, " ", users.`last_name`) as created_by_user');
        $this->db->from('cities');
        $this->db->join('states', 'states.state_id = cities.state_id');
        $this->db->join('countries', 'countries.country_id = cities.country_id');
        $this->db->join('users', 'cities.created_by = users.id', 'left');
        return $this->db->order_by('cities.name', 'ASC');
    }

    public function get_cities_by_state_id($state_id) {
        return $this->db->where('state_id', $state_id)->get('cities')->result();
    }

    public function add_city_save() {
        $data = array(
            'name' => $this->input->post('name'),
            'country_id' => $this->input->post('country_id'),
            'state_id' => $this->input->post('state_id'),
            'active' => $this->input->post('active'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'created_by' => $this->session->userdata('user_id')
        );
        return $this->db->insert('cities', $data);
    }

    public function edit_city_save() {
        $data = array(
            'name' => $this->input->post('name'),
            'country_id' => $this->input->post('country_id'),
            'state_id' => $this->input->post('state_id'),
            'active' => $this->input->post('active')
        );
        return $this->db->where('city_id', $this->input->post('city_id'))->update('cities', $data);
    }

    public function get_all_locations() {
//        if ($this->input->get('name')) {
//            $this->db->like('cities.name', $this->input->get('name'));
//            $this->db->or_like('states.name', $this->input->get('name'));
//            $this->db->or_like('countries.name', $this->input->get('name'));
//        }
//        $this->db->select('locations.*, cities.*, agents.id, agents.address, states.name as state_name,states.state_id, CONCAT(users.`first_name`, " ", users.`last_name`) as created_by_user');
        $this->db->select('locations.*');
        $this->db->from('locations');
//        $this->db->join('cities', 'locations.city_id = cities.city_id');
//        $this->db->join('states', 'states.state_id = cities.state_id');
//        $this->db->join('agents', 'locations.agent_id = agents.id');
//        $this->db->join('users', 'locations.created_by = users.id', 'left');
        return $this->db->order_by('locations.created_at', 'ASC');
    }

    public function add_location_save() {
        $data = array(
            'location_id' => UUID(),
            'agent_id' => $this->input->post('agent_id'),
            'state_id' => $this->input->post('state_id'),
            'city_id' => $this->input->post('city_id'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'created_by' => $this->session->userdata('user_id')
        );
        return $this->db->insert('locations', $data);
    }

    public function edit_location_save() {
        $data = array(
            'name' => $this->input->post('name'),
            'country_id' => $this->input->post('country_id'),
            'state_id' => $this->input->post('state_id'),
            'active' => $this->input->post('active')
        );
        return $this->db->where('location_id', $this->input->post('location_id'))->update('cities', $data);
    }

    public function get_country_states() {
        return $this->db->where("country_id", $this->input->post('country_id'))->where('active', 1)->get('states')->result();
    }

    public function get_all_office_desk() {
        if ($this->input->get('name')) {
            $this->db->like('office_desk.office_desk_name', $this->input->get('name'));
        }
        $this->db->select('office_desk.*, CONCAT(users.`first_name`, " ", users.`last_name`) as created_by_user');
        $this->db->from('office_desk');
        $this->db->join('users', 'office_desk.created_by = users.id', 'left');
        return $this->db->order_by('office_desk.created_at', 'DESC');
    }

    public function add_office_desk_document($filename) {
        $data = array(
            'office_desk_name' => $this->input->post('office_desk_name'),
            'office_desk_file' => $filename,
            'created_at' => date('Y-m-d H:i:s', time()),
            'created_by' => $this->session->userdata('user_id')
        );
        $this->db->set('office_desk_id', 'UUID()', FALSE);
        return $this->db->insert('office_desk', $data);
    }

    public function edit_office_desk_save() {
        $data = array(
            'office_desk_name' => $this->input->post('office_desk_name')
        );
        return $this->db->where('office_desk_id', $this->input->post('office_desk_id'))->update('office_desk', $data);
    }

    public function get_office_document_by_id($office_desk_id) {
        return $this->db->where('office_desk_id', $office_desk_id)->get('office_desk')->row();
    }

    public function get_prices_details($service_id) {
        return $this->db->select('service_prices.*,CONCAT(users.`first_name`, " ", users.`last_name`) as updated_by_user, subservices.subservice_name')
                        ->from('service_prices')
                        ->join('subservices', 'service_prices.subservice_id = subservices.subservice_id', 'left')
                        ->join('users', 'service_prices.updated_by = users.id', 'left')
                        ->where('subservices.service_id', $service_id)->get()->result();
    }

    public function update_price_save() {
        $data = array(
            'service_price' => $this->input->post('service_price'),
            'updated_at' => date('Y-m-d H:i:s', time()),
            'updated_by' => $this->session->userdata('user_id')
        );
        if ($this->db->where('service_price_id', $this->input->post('service_price_id'))->update('service_prices', $data)) {
            $data['id'] = $this->input->post('service_price_id');
            $data['name'] = $this->session->userdata('name');
            return $data;
        } else {
            return FALSE;
        }
    }

    public function get_state_name_by_id($state_id) {
        return $this->db->where('state_id', $state_id)->get('states')->row()->name;
    }

    public function get_city_name_by_id($city_id) {
        return $this->db->where('id', $city_id)->get('cities')->row()->name;
    }

    public function get_delivery_method_name_by_id($delivery_method_id) {
        return $this->db->where('delivery_method_id', $delivery_method_id)->get('delivery_methods')->row()->delivery_method_name;
    }

    public function get_users_route_access($url, $type) {
        $this->db->select('*')->from('users');
        $this->db->join('user_roles_permissions', 'users.user_role_id = user_roles_permissions.user_role_id', 'left');
        $this->db->join('user_permissions', 'user_permissions.user_permission_id = user_roles_permissions.user_permission_id', 'left');
        $this->db->where('users.id', $this->session->userdata('user_id'));
        $this->db->where('user_permissions.user_permission_url', $url);
        return $this->db->where('user_permissions.user_permission_type', $type)->get()->row();
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
//        $this->db->where('application_completed', 1);

        return $this->db->order_by('name_based_application_id', 'DESC');
    }

    public function get_name_based_application_details($application_id) {
        $this->db->where('name_based_application_id', $application_id);
        // $this->db->where('application_completed', 1);
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
            $this->db->where('digital_fingerprinting_application_id_new', $this->input->get('id'));
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
            $this->db->or_like('consent_phone', $this->input->get('phone'));
            $this->db->or_like('consent_cellphone', $this->input->get('phone'))->group_end();
        }
        if ($this->input->get('application_status')) {
            $this->db->where('application_status', $this->input->get('application_status'));
        }

        $this->db->select('digital_fingerprinting_applications.*');
        $this->db->from('digital_fingerprinting_applications');
//        $this->db->where('application_completed', 1);
        return $this->db->order_by('digital_fingerprinting_application_id', 'DESC');
    }

    public function get_digital_fingerprinting_application_details($application_id) {
        $this->db->where('digital_fingerprinting_application_id', $application_id);
        //$this->db->where('application_completed', 1);
        return $this->db->get('digital_fingerprinting_applications')->row();
    }

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
            $this->db->where('record_suspension_id_new', $this->input->get('id'));
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
//            $this->db->or_like('card_holder_phone', $this->input->get('phone'));
            $this->db->or_like('consent_phone', $this->input->get('phone'));
//            $this->db->or_like('consent_cellphone', $this->input->get('phone'))->group_end();
        }
        if ($this->input->get('application_status')) {
            $this->db->where('application_status', $this->input->get('application_status'));
        }

        $this->db->select('record_suspension_applications.*');
        $this->db->from('record_suspension_applications');
//        $this->db->where('application_completed', 1);
        return $this->db->order_by('record_suspension_id', 'DESC');
    }

    public function get_record_suspension_application_details($application_id) {
        $this->db->where('record_suspension_id', $application_id);
        $this->db->where('application_completed', 1);
        return $this->db->get('record_suspension_applications')->row();
    }

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
            $this->db->where('us_entry_waiver_id_new', $this->input->get('id'));
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
            $this->db->where('consent_phone', $this->input->get('phone'));
        }
        if ($this->input->get('application_status')) {
            $this->db->where('application_status', $this->input->get('application_status'));
        }

        $this->db->select('us_entry_waiver_applications.*');
        $this->db->from('us_entry_waiver_applications');
//        $this->db->where('application_completed', 1);
        return $this->db->order_by('us_entry_waiver_id', 'DESC');
    }

    public function get_us_entry_waiver_application_details($application_id) {
        $this->db->where('us_entry_waiver_id', $application_id);
        $this->db->where('application_completed', 1);
        return $this->db->get('us_entry_waiver_applications')->row();
    }

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

    public function add_application_comment_save() {
        $data = array(
            'comment' => $this->input->post('comment'),
            'application_id' => $this->input->post('application_id'),
            'type' => $this->input->post('type'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'created_by' => $this->session->userdata('user_id')
        );
        $this->db->set('application_comment_id', 'UUID()', FALSE);
        return $this->db->insert('application_comments', $data);
    }

    public function get_application_comments($application_id, $type) {
        $this->db->where('application_id', $application_id)->where('type', $type);
        return $this->db->order_by('created_at', 'DESC')->get('application_comments')->result();
    }

    public function get_agent_name_by_id($agent_id) {
        $result = $this->db->where('id', $agent_id)->get('agents')->row();
        if ($result) {
            return $result->first_name . ' ' . $result->last_name;
        } else {
            return '';
        }
    }

    public function get_corporate_name_by_id($corporate_id) {
        $result = $this->db->where('id', $corporate_id)->get('corporates')->row();
        if ($result) {
            return $result->first_name . ' ' . $result->last_name;
        } else {
            return '';
        }
    }

    public function get_all_agents() {
        if ($this->input->get('id')) {
            $this->db->like('agents.id', $this->input->get('id'));
        }

        if ($this->input->get('company')) {
            $this->db->like('agents.company', $this->input->get('company'));
        }

        if ($this->input->get('telephone')) {
            $this->db->like('agents.telephone', $this->input->get('telephone'));
        }

        if ($this->input->get('address')) {
            $this->db->like('agents.address', $this->input->get('address'));
        }

        if ($this->input->get('user_role')) {
            $this->db->like('agents.user_role', $this->input->get('user_role'));
        }

        if ($this->input->get('status')) {
            $this->db->like('agents.status', $this->input->get('status'));
        }
        $this->db->from('users');
        $this->db->where('user_role_id', '5f513b61-67f9-44b5-9c9d-5bb46e20');
        return $this->db->order_by('users.id', 'ASC');
    }

    public function get_all_agents_drop_down() {
        $this->db->from('users');
        $this->db->where('user_role_id', '5f513b61-67f9-44b5-9c9d-5bb46e20');
        return $this->db->get()->result();
//        return $this->db->order_by('users.id', 'ASC')->result();
    }

    public function add_agent_save() {
        $options = ['cost' => 10];
        $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

        $data = array(
            'user_role_id' => '5f513b61-67f9-44b5-9c9d-5bb46e20',
//            'agent_of' => $this->input->post('agent_of'),
            'email' => $this->input->post('email'),
            'password' => $encrypted_pass,
            'status' => $this->input->post('status'),
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
            'comments' => $this->input->post('comments'),


            'name_based_check_price' => $this->input->post('name_based_check'),
            'digital_fingerprinting_price' => $this->input->post('digital_fingerprinting'),
            'record_suspension_price' => $this->input->post('record_suspension'),
            'us_entry_waiver_price' => $this->input->post('us_entry_waiver'),
            'canada_immigration_price' => $this->input->post('canada_immigration'),
            'created_by' => $this->session->userdata('user_id')
        );

        $uuid = $this->uuid->v4();
        $this->db->set('id', "$uuid", TRUE);
        $result = $this->db->insert('users', $data);
        $this->add_log('agent', $uuid, 'added');
        return $result;
    }

    public function edit_agent_save() {
        if(!empty($this->input->post('password'))) {
            $options = ['cost' => 10];
            $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
            $data = array(
                'status' => $this->input->post('status'),
                'company' => $this->input->post('company'),
                'password' => $encrypted_pass,

                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'address' => $this->input->post('address'),
                'telephone' => $this->input->post('telephone'),
                'cell' => $this->input->post('cell'),
                'fax' => $this->input->post('fax'),
                'comments' => $this->input->post('comments'),
                'name_based_check' => $this->input->post('name_based_check'),
                'digital_fingerprinting' => $this->input->post('digital_fingerprinting'),
                'record_suspension' => $this->input->post('record_suspension'),
                'us_entry_waiver' => $this->input->post('us_entry_waiver'),
                'canada_immigration' => $this->input->post('canada_immigration'),
            );
        }
        else{
            $data = array(
                'status' => $this->input->post('status'),
                'company' => $this->input->post('company'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'address' => $this->input->post('address'),
                'telephone' => $this->input->post('telephone'),
                'cell' => $this->input->post('cell'),
                'fax' => $this->input->post('fax'),
                'comments' => $this->input->post('comments'),
                'name_based_check' => $this->input->post('name_based_check'),
                'digital_fingerprinting' => $this->input->post('digital_fingerprinting'),
                'record_suspension' => $this->input->post('record_suspension'),
                'us_entry_waiver' => $this->input->post('us_entry_waiver'),
                'canada_immigration' => $this->input->post('canada_immigration'),
            );
        }

        $this->db->where('id', $this->input->post('id'));
        $result = $this->db->update('agents', $data);
        return $result;
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
        $this->db->from('users');
        $this->db->where('user_role_id', '2dd65df9-7ed5-45bd-bef1-f2afa31a');
        return $this->db->order_by('users.id', 'ASC');
    }

    public function get_all_resellers() {
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
        $this->db->from('users');
        $this->db->where('user_role_id', 'c949666c-b282-4ad4-8ecb-fc7b1e10');
        return $this->db->order_by('users.id', 'ASC');
    }

    public function add_corporate_save() {
        $options = ['cost' => 10];
        $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

        $data = array(
            'user_role_id' => $this->input->post('user_role'),
//            'sub_corporate_employee' => $this->input->post('sub_corporate'),
            'email' => $this->input->post('email'),
            'password' => $encrypted_pass,
            'active' => $this->input->post('status'),

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
            'comments' => $this->input->post('comments'),


            'name_based_check_price' => $this->input->post('name_based_check'),
            'digital_fingerprinting_price' => $this->input->post('digital_fingerprinting'),
            'record_suspension_price' => $this->input->post('record_suspension'),
            'us_entry_waiver_price' => $this->input->post('us_entry_waiver'),
            'canada_immigration_price' => $this->input->post('canada_immigration'),
        );
        $uuid = $this->uuid->v4();
        $this->db->set('id', "$uuid", TRUE);
        $result = $this->db->insert('users', $data);
        $this->add_log('corporate', $uuid, 'added');
        return $result;
    }


    public function add_reseller_save() {
        $options = ['cost' => 10];
        $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

        $data = array(
            'user_role_id' => 'c949666c-b282-4ad4-8ecb-fc7b1e10',
            'email' => $this->input->post('email'),
            'password' => $encrypted_pass,
            'active' => $this->input->post('status'),

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
            'comments' => $this->input->post('comments'),


            'name_based_check_price' => $this->input->post('name_based_check'),
            'digital_fingerprinting_price' => $this->input->post('digital_fingerprinting'),
            'record_suspension_price' => $this->input->post('record_suspension'),
            'us_entry_waiver_price' => $this->input->post('us_entry_waiver'),
            'canada_immigration_price' => $this->input->post('canada_immigration'),
        );
        $uuid = $this->uuid->v4();
        $this->db->set('id', "$uuid", TRUE);
        $result = $this->db->insert('users', $data);
//        $this->add_log('corporate', $uuid, 'added');
        return $result;
    }

    public function edit_corporate_save() {
//        $options = ['cost' => 10];
//        $encrypted_pass = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
//            'email' => $this->input->post('email'),
//            'password' => $encrypted_pass,
            'active' => 1,
//            'created_by' => $this->session->userdata('user_id')
        );
        $this->db->where('id', $this->input->post('id'));
        $result = $this->db->update('corporates', $data);
        return $result;
    }

    public function get_individual_all_invoices() {
        if ($this->input->get('application_status') == 0 || $this->input->get('application_status') == 1) {
            $this->db->where('payment_status', $this->input->get('application_status'));
        }

        $this->db->select('*');
        $this->db->from('name_based_applications');
        return $this->db->order_by('name_based_applications.name_based_application_id', 'DESC');
    }


    public function get_custom_all_invoices() {
        $this->db->select('*');
        $this->db->from('invoices_custom');
        return $this->db->order_by('invoices_custom.invoice_id', 'DESC');
    }



//    public function get_name_based_app() {
//        if ($this->input->get('id')) {
//            $this->db->where('name_based_application_id_new', $this->input->get('id'));
//        }
//        if ($this->input->get('f_name')) {
//            $this->db->like('consent_first_name', $this->input->get('f_name'));
//        }
//
//
//        $this->db->select('name_based_applications.*');
//        $this->db->from('name_based_applications');
//        $this->db->where('application_completed', 1);
//
//        return $this->db->order_by('name_based_application_id', 'DESC');
//    }





//    public function get_individual_grand_total() {
//        $this->db->select('sum(name_based_applications.grand_total AS namebase_grand_total');
//        $this->db->from('name_based_applications')->result();
//    }



//new code
//new code
//new code

    public function edit_status_save() {
//        now insert the comments into comments table
            $data = array(
                'name_based_application_id' => $this->input->post('name_based_application_id'),
                'application_comment' => $this->input->post('application_comments'),
                'application_status' => $this->input->post('application_status'),
            );
            $result = $this->db->insert('name_base_applications_comments', $data);
            return $result;
    }

    public function upload_certificate($filename, $id){
        if(!empty($filename) && !empty($id)){
            $data = array(
                'consent_certificate' => $filename
            );
            $this->db->where('name_based_application_id', $id);
            $result = $this->db->update('name_based_applications', $data);
            return $result;

        }
    }

    // for notification get the record ID
    // for notification get the record ID
    // for notification get the record ID
    public function get_last_record_id($tName, $idName){
        $this->db->select("*");
        $this->db->from($tName);
        $this->db->limit(1);
        $this->db->order_by($idName,"DESC");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function save_notification($data){
        $this->db->insert('application_notification',$data);
        return true;
    }



    public function total_notifications(){
        $this->db->select("*");
        $this->db->from("application_notification");
        $this->db->limit(20);
        $this->db->order_by('id',"DESC");
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function get_country_by_id($id, $tab){
        $this->db->where('country_id', $id);
        $query = $this->db->get($tab);
        return $query->result_array();
    }

    public function get_namebasedapplication_by_id($id, $tab){
        $this->db->where('name_based_application_id', $id);
        $query = $this->db->get($tab);
        return $query->result_array();
    }

    //get the new application numbers
    public function get_number_of_new_applications(){
        $this->db->from('name_based_applications');
        $data = array(
            'new_application' => 1,
            'application_completed' => 1
        );
        $this->db->where($data);
        return $this->db->count_all_results();
    }

    //update the status of application into zero(0)
    public function update_application_status($id){
        $data = array(
            'new_application' => 0
        );
        $this->db->where('name_based_application_id', $id);
        $this->db->update('name_based_applications', $data);
    }

//    get the application namebase comment and status
    public function get_namebase_application_comment_status($application_id) {
        $this->db->get('name_base_applications_comments'); // Songs query
        $this->db->where('name_based_application_id', $application_id); // Where
        $this->db->order_by('created_at', 'DESC'); // Order by
        $this->db->limit(1); // Limit, 15 entries
        $this->db->result_array(); // Fetch All
    }

//    upload the certificate in the details page
    public function update_certificate_of_namsebase_application($filename, $id){
        $this->db->set('consent_certificate', $filename); //value that used to update column
        $this->db->where('name_based_application_id', $id); //which row want to upgrade
        $result = $this->db->update('name_based_applications');
        return $result;
    }


    public function get_user_roles() {
        $this->db->select('user_roles.*');
        $this->db->from('user_roles');
        $this->db->join('users', 'users.user_role_id = user_roles.user_role_id');

        return $this->db->order_by('user_roles.user_role_name', 'ASC')->get()->result();
    }


    public function forward_application_to_user($data){
        $result = $this->db->insert('assign_application_to_user', $data);
        return $result;
    }

    public function add_application_status_save() {
        $data = array(
            'status' => $this->input->post('application_status'),
            'application_id' => $this->input->post('application_id'),
            'application_type' => $this->input->post('type'),
            'created_by' => $this->session->userdata('user_id')
        );



        $this->db->set('application_status', $this->input->post('application_status')); //value that used to update column
        $this->db->where('name_based_application_id', $this->input->post('application_id')); //which row want to upgrade
        $result = $this->db->update('name_based_applications');

        if($result) {
            $this->db->set('application_status_id', 'UUID()', FALSE);
            $this->db->insert('application_status', $data);
        }
    }

    public function add_application_status_save_digital_fingerprinting_application() {
        $data = array(
            'status' => $this->input->post('application_status'),
            'application_id' => $this->input->post('application_id'),
            'application_type' => $this->input->post('type'),
            'created_by' => $this->session->userdata('user_id')
        );
//        var_dump($data); die();
        $this->db->set('application_status', $this->input->post('application_status')); //value that used to update column
        $this->db->where('digital_fingerprinting_application_id', $this->input->post('application_id')); //which row want to upgrade
        $result = $this->db->update('digital_fingerprinting_applications');

        if($result) {
            $this->db->set('application_status_id', 'UUID()', FALSE);
            $this->db->insert('application_status', $data);
        }
    }

    public function add_application_status_save_record_suspension_application() {
        $data = array(
            'status' => $this->input->post('application_status'),
            'application_id' => $this->input->post('application_id'),
            'application_type' => $this->input->post('type'),
            'created_by' => $this->session->userdata('user_id')
        );
//        var_dump($data); die();
        $this->db->set('application_status', $this->input->post('application_status')); //value that used to update column
        $this->db->where('record_suspension_id', $this->input->post('application_id')); //which row want to upgrade
        $result = $this->db->update('record_suspension_applications');

        if($result) {
            $this->db->set('application_status_id', 'UUID()', FALSE);
            $this->db->insert('application_status', $data);
        }
    }




    public function add_application_status_save_u_s_entry_waiver_application() {
        $data = array(
            'status' => $this->input->post('application_status'),
            'application_id' => $this->input->post('application_id'),
            'application_type' => $this->input->post('type'),
            'created_by' => $this->session->userdata('user_id')
        );
//        var_dump($data); die();
        $this->db->set('application_status', $this->input->post('application_status')); //value that used to update column
        $this->db->where('us_entry_waiver_id', $this->input->post('application_id')); //which row want to upgrade
        $result = $this->db->update('us_entry_waiver_applications');

        if($result) {
            $this->db->set('application_status_id', 'UUID()', FALSE);
            $this->db->insert('application_status', $data);
        }
    }

    //update the status of digital-fingerprinting into zero(0)
    public function update_digital_fingerprinting_application_status($id){
        $data = array(
            'new_application' => 0
        );
        $this->db->where('digital_fingerprinting_application_id', $id);
        $this->db->update('digital_fingerprinting_applications', $data);
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


    //get the new application numbers
//    public function get_number_of_new_digital_fingerprintingapplications(){
//        $this->db->from('digital_fingerprinting_applications');
//        $data = array(
//            'new_application' => 1,
//            'application_completed' => 1
//        );
//        $this->db->where($data);
//        return $this->db->count_all_results();
//    }

    //get the new application numbers
//    public function get_number_of_new_record_suspension(){
//        $this->db->from('record_suspension_applications');
//        $data = array(
//            'new_application' => 1,
//            'application_completed' => 1
//        );
//        $this->db->where($data);
//        return $this->db->count_all_results();
//    }


    //get the new application numbers
//    public function get_number_of_new_us_entry_wavier(){
//        $this->db->from('us_entry_waiver_applications');
//        $data = array(
//            'new_application' => 1,
//            'application_completed' => 1
//        );
//        $this->db->where($data);
//        return $this->db->count_all_results();
//    }




//update the status of Record_Suspension_Applications into zero(0)
    public function update_Record_Suspension_Applications_status($id){
        $data = array(
            'new_application' => 0
        );
        $this->db->where('record_suspension_id', $id);
        $this->db->update('record_suspension_applications', $data);
    }

    //update the status of application into zero(0)
    public function update_us_entry_application_status($id){
        $data = array(
            'new_application' => 0
        );
        $this->db->where('us_entry_waiver_id', $id);
        $this->db->update('us_entry_waiver_applications', $data);
    }


    //    upload the certificate in the details page
    public function update_certificate_of_us_entry_waiver_application($filename, $id){
        $this->db->set('consent_certificate', $filename); //value that used to update column
        $this->db->where('us_entry_waiver_id', $id); //which row want to upgrade
        $result = $this->db->update('us_entry_waiver_applications');
        return $result;
    }


    //    delete the certificate in the details page
    public function delete_certificate($application_id, $table_name){
        $this->db->set('consent_certificate', ''); //value that used to update column
        $this->db->where('us_entry_waiver_id', $application_id); //which row want to upgrade
        $result = $this->db->update($table_name);
        return $result;
    }

    //    delete the certificate in the details page namebase
    public function delete_certificate_digital($application_id, $table_name){
        $this->db->set('consent_certificate', ''); //value that used to update column
        $this->db->where('digital_fingerprinting_application_id', $application_id); //which row want to upgrade
        $result = $this->db->update($table_name);
        return $result;
    }

    public function delete_certificate_record_suspensio($application_id, $table_name){
        $this->db->set('consent_certificate', ''); //value that used to update column
        $this->db->where('record_suspension_id', $application_id); //which row want to upgrade
        $result = $this->db->update($table_name);
        return $result;
    }

    public function delete_certificate_namebase($application_id, $table_name){
        $this->db->set('consent_certificate', ''); //value that used to update column
        $this->db->where('name_based_application_id', $application_id); //which row want to upgrade
        $result = $this->db->update($table_name);
        return $result;
    }

    public function change_agent_status($status, $id){
        $this->db->set('status', $status); //value that used to update column
        $this->db->where('id', $id); //which row want to upgrade
        $result = $this->db->update('agents');
        return $result;
    }

    public function change_corporate_status($status, $id){
        $this->db->set('status', $status); //value that used to update column
        $this->db->where('id', $id); //which row want to upgrade
        $result = $this->db->update('corporates');
        return $result;
    }


    //communication between GAC and agent. e.g sending invoices to agent.
    public function add_application_conversation_save() {
        $data = array(
            'conversation' => $this->input->post('conversation'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'created_by' => $this->session->userdata('agent_id')
        );
        $this->db->set('communication_id', 'UUID()', FALSE);
        return $this->db->insert('communication_gac_agent', $data);
    }

    public function add_application_conversation_save_by_admin() {
        $data = array(
            'conversation' => $this->input->post('conversation'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'created_by' => $this->input->post('agent_id'),
            'gac_admin' => $this->input->post('admin_id'),
        );
        $this->db->set('communication_id', 'UUID()', FALSE);
        $this->db->insert('communication_gac_agent', $data);
    }

    public function get_comment_data_save($data){
        if($this->db->insert('application_comments',$data))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

//    multiple file upload of comment
    public function multiple_file_upload($data){
        $insert = $this->db->insert_batch('application_comments_files',$data);
        return $insert?true:false;
    }

    public function get_images_against_comment_id($comment_id, $type){
        $this->db->where('comment_id', $comment_id)->where('application_type', $type);
        return $this->db->order_by('created_at', 'DESC')->get('application_comments_files')->result();
    }

    public function delete_comment($id, $type){
        $data = array(
            'application_comment_id' =>$id,
            'type'=> $type
        );
        $this->db->where($data);
        $result = $this->db->delete('application_comments');

        if($result){
            $data = array(
                'comment_id' =>$id,
                'application_type'=> $type
            );
            $this->db->where($data);
            $result = $this->db->delete('application_comments_files');
            return $result;
        }
        return $result;
    }

    public function delete_file($id, $type){
        $data = array(
            'id' =>$id,
            'application_type'=> $type
        );
        $this->db->where($data);
        $result = $this->db->delete('application_comments_files');
        return $result;
    }

    public function get_user_roles_by_id($id){
        $this->db->where('application_id', $id);
        return $this->db->order_by('id', 'DESC')->limit(1)->get('assign_application_to_user')->row();
    }


    public function get_user_name_by_id($id) {
        $result = $this->db->where('id', $id)->get('users')->row();
        if ($result) {
            return $result->first_name . ' ' . $result->last_name;
        } else {
            return FALSE;
        }
    }

    public function forward_service_order_images_to_reception($reception_id, $picture_id){
        $query=$this->db->query("update service_order_images SET submitted_to='$reception_id' where id='".$picture_id."'");
        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function get_all_coupons_details() {
        if ($this->input->get('name')) {
            $this->db->like('users.name', $this->input->get('name'));
        }
        $this->db->select('*');
        $this->db->from('coupons');
        return $this->db->order_by('id', 'ASC');
    }

    public function add_corporate_coupon_save() {
        $data = array(
            'coupon_id' => $this->input->post('coupon_code_corporate'),
            'total_coupons' => $this->input->post('number_of_coupons_corporate'),
            'remaining_coupons' => $this->input->post('number_of_coupons_corporate'),
            'discount' => $this->input->post('discount_in_percentage_corporate'),
            'user_type' => $this->input->post('user_type_corporate'),
            'user_email_id' => $this->input->post('user_id_corporate'),
            'created_by' => $this->session->userdata('user_id')
        );
        $result = $this->db->insert('coupons', $data);
        return $result;
    }

    public function add_agent_coupon_save() {
        $data = array(
            'coupon_id' => $this->input->post('coupon_code_agent'),
            'total_coupons' => $this->input->post('number_of_coupons_agent'),
            'remaining_coupons' => $this->input->post('number_of_coupons_agent'),
            'discount' => $this->input->post('discount_in_percentage_agent'),
            'user_type' => $this->input->post('user_type_agent'),
            'user_email_id' => $this->input->post('user_id_agent'),
            'created_by' => $this->session->userdata('user_id')
        );
        $result = $this->db->insert('coupons', $data);
        return $result;
    }


    public function add_outsider_user_coupon_save() {
        $password = UUID();
        $options = ['cost' => 10];
        $encrypted_pass = password_hash($password, PASSWORD_BCRYPT, $options);
        $data = array(
            'email' => $this->input->post('email_user'),
            'password' => $encrypted_pass,
            'user_role_id' => 'f971e9f3-98c9-9243-adrt-1700188b',
            'created_by' => $this->session->userdata('user_id')
        );
        $uuid = $this->uuid->v4();
        $this->db->set('id', "$uuid", TRUE);
        $result = $this->db->insert('users', $data);
        
        if($result) {
            $data2 = array(
                'coupon_id' => $this->input->post('coupon_code_user'),
                'total_coupons' => $this->input->post('number_of_coupons_user'),
                'remaining_coupons' => $this->input->post('number_of_coupons_user'),
                'discount' => $this->input->post('discount_in_percentage_user'),
                'user_type' => $this->input->post('user_type_user'),
                'user_email_id' => $this->input->post('email_user'),
                'created_by' => $this->session->userdata('user_id')
            );
//            var_dump($data2); die();
            $result2 = $this->db->insert('coupons', $data2);
        }
        if($result2){
            $email = $this->input->post('email_user');
//            $password = $this->input->post('password');
            $htmlContent = '<h1>ePolice User Coupons</h1>';
            $htmlContent .= '<p>User Name:  "'.$email.'" </p>';
            $htmlContent .= '<p>Password: "'.$password.'"</p>';
            $htmlContent .= '<p>URL: "'.base_url('user').'"</p>';

            $this->email->to($email);
            $this->email->from(EMAIL_FROM_SMTP, 'ePolice');
            $this->email->subject('ePolice User Coupons');
            $this->email->message($htmlContent);
            $this->email->send();
        }
        return true;
    }


    public function get_all_account_list_invoices() {
        $this->db->select('*');
        $this->db->from('users');
//        return $this->db->where('user_role_id', '2dd65df9-7ed5-45bd-bef1-f2afa31a' || 'user_role_id', '5f513b61-67f9-44b5-9c9d-5bb46e20');
        return $this->db->where('user_role_id', '2dd65df9-7ed5-45bd-bef1-f2afa31a');
//         $this->db->where('user_role_id', '5f513b61-67f9-44b5-9c9d-5bb46e20');
    }



    public function get_individual_account_invoice_list($id){
        $this->db->select('*');
        $this->db->from('invoices');
//        $this->db->join('invoices', 'accounts.user_id = invoices.created_by', 'left');
        return $this->db->where('invoices.account_id', $id);
//        return $this->db->order_by('invoices.created_at', 'ASC');
    }

    public function get_account_id_by_user_id($id){
        $result = $this->db->where('user_id', $id)->get('accounts')->row();
        return $result->id;
    }

    public function get_invoice_detail($id){
//        $this->db->select('*');
//        $this->db->from('invoices');
//        return $this->db->where('invoices.invoice_id', $id)->result();

        $result = $this->db->where('invoice_id', $id)->get('invoices')->row();
        return $result;
    }

    public function save_custom_invoice($data){
        return $this->db->insert('invoices_custom', $data);
    }


//    now payment status change area for applications
//    now payment status change area for applications

    public function update_sub_corporate_application_status($payment_method, $payment_method_description, $sub_corporate_id){
        if(!empty($payment_method) && !empty($payment_method_description) && !empty($sub_corporate_id)){
            $data = array(
                'payment_method' => $payment_method,
                'payment_method_description' => $payment_method_description,
                'show_on_user_pannel' => 0,
                'payment_status' => 1
            );
            $this->db->where('sub_corporate_id', $sub_corporate_id);
            return $this->db->update('name_based_applications', $data);

        } else {
            return FALSE;
        }
    }


    public function send_invoice_to_sub_corporate($remaining_payment, $send_to){
        $data = array(
            'amount_payable' => $remaining_payment,
            'user_id' => $send_to,
            'created_by' => $this->session->userdata('user_id')
        );
        return $this->db->insert('sub_corporate_user_invoice', $data);
    }


//    invoices section corporate
//    invoices section corporate
    public function get_subcorporates_by_supercorporate($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('super_corporate_employee_id', $id);
        return $this->db->order_by('users.id', 'ASC')->result();
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


//    public function test_join(){
//        $this->db->select('*');
//        $this->db->from('table1');
//        $this->db->join('table2', 'table1.id = table2.id');
//        $this->db->join('table3', 'table1.id = table3.id');
//        $query = $this->db->get();
//
//        return $query;
//    }
}
?>