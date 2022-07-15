<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function dd($content = '') {
    echo '<pre>';
    print_r($content);
    die();
}

function UUID() {
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function admin_profile_image() {
    $CI = get_instance();
    $image_path = base_url('assets') . '/images/admin/' . str_replace(' ', '_', $CI->session->userdata('admin_profile_image'));
    if (getimagesize($image_path)) {
        return $image_path;
    } else {
        $image_path = base_url('assets') . '/images/admin/no-image.png';
        return $image_path;
    }
}


function agent_profile_image() {
    $CI = get_instance();
    $image_path = base_url('assets') . '/images/agent/' . str_replace(' ', '_', $CI->session->userdata('agent_profile_image'));
    if (getimagesize($image_path)) {
        return $image_path;
    } else {
        $image_path = base_url('assets') . '/images/agent/no-image.png';
        return $image_path;
    }
}

function corporate_profile_image() {
    $CI = get_instance();
    $image_path = base_url('assets') . '/images/corporate/' . str_replace(' ', '_', $CI->session->userdata('corporate_profile_image'));
    if (getimagesize($image_path)) {
        return $image_path;
    } else {
        $image_path = base_url('assets') . '/images/corporate/no-image.png';
        return $image_path;
    }
}

function get_admin_profile_image_by_id($user_id) {
    $CI = get_instance();
    $CI->load->model('portal_model');
    $image_path = base_url('assets') . '/images/admin/' . str_replace(' ', '_', $CI->portal_model->get_admin_profile_image_by_id($user_id));
    if (getimagesize($image_path)) {
        return $image_path;
    } else {
        $image_path = base_url('assets') . '/images/admin/no-image.png';
        return $image_path;
    }
}


function get_profile_picture_by_id($user_id) {
    $CI = get_instance();
    $CI->load->model('reception_model');
    $image_path = str_replace(' ', '_', $CI->reception_model->get_admin_profile_image_by_id($user_id));
    if (getimagesize($image_path)) {
        return $image_path;
    } else {
        $image_path = base_url('assets') . '/images/admin/no-image.png';
        return $image_path;
    }
}



function get_admin_name_by_id($user_id) {
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_admin_name_by_id($user_id);
}

function get_admin_email_by_id($user_id) {
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_admin_email_by_id($user_id);
}


function get_agent_email_by_id($user_id) {
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->agent_model->get_agent_email_by_id($user_id);
}

function get_email_by_id($user_id) {
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_email_by_id($user_id);
}

function check_user_role_permissions($user_permission_id, $user_role_id) {
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->check_user_role_permissions($user_permission_id, $user_role_id);
}

function use_role_permission_checkbox($user_permission_id, $user_role_id) {
    if (check_user_role_permissions($user_permission_id, $user_role_id)) {
        return 'checked';
    }
}

function get_subservice_price($subservice_id) {
    $CI = get_instance();
    $CI->load->model('site_model');
    return $CI->site_model->get_subservice_price($subservice_id);
}

function get_state_name_by_id($state_id) {
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_state_name_by_id($state_id);
}

function get_city_name_by_id($city_id) {
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_city_name_by_id($city_id);
}

function get_delivery_method_name_by_id($delivery_method_id) {
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_delivery_method_name_by_id($delivery_method_id);
}

function check_route($url, $type) {
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_users_route_access($url, $type);
}

function get_agent_name_by_id($agent_id) {
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_agent_name_by_id($agent_id);
}

function get_corporate_name_by_id($corporate_id) {
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_corporate_name_by_id($corporate_id);
}


function get_application_submitted_by($agent_id, $corporate_id) {
    if ($agent_id) {
        return 'Agent - ' . get_agent_name_by_id($agent_id);
    } else if ($corporate_id) {
        return 'Corporate - ' . get_corporate_name_by_id($corporate_id);
    } else {
        return 'User';
    }
}

function get_application_payment_status($payment_status) {
    if ($payment_status) {
        return '<span class="text-success">Paid</span>';
    } else {
        return '<span class="text-danger">Unpaid</span>';
    }
}

function get_cities_by_state_id($state_id){
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_cities_by_state_id($state_id);
}


//get the images against comments
function get_images_against_comment_id($comment_id, $type) {
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_images_against_comment_id($comment_id, $type);
}

function get_user_roles_by_id($id){
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_user_roles_by_id($id);
}

function get_user_role_name_by_id($id){
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_user_role_name_by_id($id);
}

function get_user_name_by_id($id){
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_user_name_by_id($id);
}

function get_application_comments($application_id){
//    $this->db->where('application_id', $application_id)->where('type', $type);
    $this->db->where('application_id', $application_id);
    $result = $this->db->order_by('created_at', 'DESC')->get('application_comments')->result();
    if(!empty($result)){
        return true;
    }else{
        return false;
    }
}

function get_account_id_by_user_id($id){
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_account_id_by_user_id($id);
}



function get_user_picture_name_by_id($id){
    $CI = get_instance();
    $CI->load->model('User_model');
//    $id = $this->session->userdata('ind_user_id');
    return $CI->User_model->get_account_id_by_user_id($id);
}

//invoice section
//invoice section
//invoice section

function get_subcorporate_by_supercorporate_id($id){
    $CI = get_instance();
    $CI->load->model('portal_model');
    return $CI->portal_model->get_subcorporates_by_supercorporate_id($id);
}



