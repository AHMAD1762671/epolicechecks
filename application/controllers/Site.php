<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Karachi");
        $this->load->model('site_model');
        if ($this->session->userdata('agent_logged_in')) {
            redirect('agent/application/services');
        }
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
        dd(curl_error($ch));
        curl_close($ch);
        dd($response);
        // converting
        $response1 = str_replace("<soap:Body>", "", $response);
        $response2 = str_replace("</soap:Body>", "", $response1);

        // convertingc to XML
        $parser = simplexml_load_string($response2);

//        var_dump($parser->InitialResponse->InteractiveQuery);


        // user $parser to get your data out of XML response and to display it.
        dd($parser->InitialResponse->InteractiveQuery);
    }

    public function index() {
        $data["page_title"] = "ePolice Portal";
        $this->load->view('site/index_page', $data);
    }

    public function services() {
        $data["page_title"] = "ePolice Services";
        $data['main_view'] = "site/services";
        $this->load->view('site/layout', $data);
    }

    public function criminal_record_check() {
        $data["page_title"] = "Criminal Record Check";
        $data['main_view'] = "site/criminal_record_check";
        $this->load->view('site/layout', $data);
    }

    public function name_based_check() {
        $data["page_title"] = "Name Based Check";
        $data['main_view'] = "site/name_based_check";
        $this->load->view('site/layout', $data);
    }

    public function name_based_check_form($country) {
        $data["page_title"] = "Name Based Check " . strtoupper($country);
        $data['service'] = $this->db->where('service_slug', 'name-based-check')->get('services')->row();
        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
        $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
        $data["states"] = $this->site_model->get_states('Canada');
        $data['country'] = $country;
        $data['main_view'] = "site/name_based_check_form";
        $this->load->view('site/layout', $data);
    }

    public function name_based_check_form_save() {
        if ($application_id = $this->site_model->name_based_check_form_save()) {
            redirect('name-based-check/payment/' . $this->site_model->get_name_based_check_application_details($application_id)->client_id . '/' . $application_id);
        }
        redirect('name-based-check/' . $this->input->post('country'));
    }

    public function name_based_check_payment($client_id, $application_id) {
        $data["page_title"] = "Name Based Check Payment";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
            redirect();
        }
        $data["grand_total"] = $this->site_model->get_name_based_check_application_details($application_id)->grand_total;
        $data['main_view'] = "site/name_based_check_payment";
        $this->load->view('site/layout', $data);
    }

    public function name_based_check_payment_save() {
        if (!$this->site_model->name_based_check_payment_save()) {
            redirect('name-based-check/payment/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            $application_id = $this->input->post('application_id');
            $price = $this->site_model->get_name_based_check_application_details($application_id)->grand_total;
            $msg = site_order_invoice($this->input->post('card_holder_name'), $this->input->post('card_holder_email'), $this->input->post('card_holder_phone'), 'Name Based Check', $price, $application_id);
            $this->email->to($this->input->post('card_holder_email'));
            $this->email->from(EMAIL_FROM_SMTP, 'GAC INC.');
            $this->email->subject('Name Based Check Order Invoice');
            $this->email->message($msg);
            $this->email->send();
            redirect('name-based-check/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function name_based_check_consent($client_id, $application_id) {
        $data["page_title"] = "Consent Form - Name Based Criminal Record Check";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
            redirect('name-based-check/payment/' . $client_id . '/' . $application_id);
        }
        $data['main_view'] = "site/name_based_check_consent";
        $this->load->view('site/layout', $data);
    }

    public function name_based_check_consent_save() {
        if (!$this->site_model->name_based_check_consent_save()) {
            redirect('name-based-check/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
//            redirect('name-based-check/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
            redirect('site/name_based_check_signature/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

//    public function name_based_check_signature($client_id, $application_id){
    public function name_based_check_signature(){
        $data["page_title"] = "Signature - Name Based Application Signature";
//        $data["application_id"] = $application_id;
//        $data["client_id"] = $client_id;
//        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
//            redirect('name-based-check/consent/' . $client_id . '/' . $application_id);
//        }
        $data['main_view'] = "site/name_based_check_signature";
        $this->load->view('site/layout', $data);
    }

    public function save_name_based_check_text_signature(){
        $signature = $this->input->post('consent_signature');
        $application_id = $this->input->post('application_id');
        if (!$this->site_model->save_text_signature($signature, $application_id)) {
            redirect('name-based-check/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('name-based-check/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
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
            $this->session->set_flashdata('no_access', 'Something went wrong! Please try again.');
            redirect('portal/name_based_check_applications');
        }
        if (!$this->site_model->save_signature_image($filename, $application_id)) {
            redirect('name-based-check/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('name-based-check/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
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
        if (!$this->site_model->save_drawable_signature($signatureFileName, $application_id)) {
            redirect('name-based-check/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('name-based-check/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }



    public function name_based_check_success($client_id, $application_id) {
        $data["page_title"] = "Success - Name Based Criminal Record Check";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('name_based_application_id', $application_id)->get('name_based_applications')->num_rows()) {
            redirect('name-based-check/consent/' . $client_id . '/' . $application_id);
        }

//        for update the ID to new one
        $newId = "2020-SS-".$application_id;
        $this->site_model->update_application_id($application_id, $newId);

        $data['main_view'] = "site/name_based_check_success";
        $this->load->view('site/layout', $data);
    }

    public function digital_fingerprinting() {
        $data["page_title"] = "Digital Fingerprinting";
        $data['main_view'] = "site/digital_fingerprinting";
        $this->load->view('site/layout', $data);
    }

    public function digital_fingerprinting_form($country) {
        $data["page_title"] = "Digital Fingerprinting " . strtoupper($country);
        if ($this->input->post('fingerprint_options') == 'done') {
            if ($this->input->post('fingerprint_location') == 'done') {
                $data['service'] = $this->db->where('service_slug', 'digital-fingerprinting')->get('services')->row();
                $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
                $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
                $data["states"] = $this->site_model->get_states('Canada');
                $data['country'] = $country;
                $data['main_view'] = "site/digital_fingerprinting_form";
                $this->load->view('site/layout', $data);
            } else {
                $data['options'] = $this->input->post('digital_fingerprinting_options');
                $data["states"] = $this->site_model->get_states('Canada');
                $data['main_view'] = "site/digital_fingerprinting_locations";
                $this->load->view('site/layout', $data);
            }
        } else {
            $data['options'] = $this->db->order_by('created_at', 'ASC')->get('digital_fingerprinting_options')->result();
            $data['main_view'] = "site/digital_fingerprinting_options";
            $this->load->view('site/layout', $data);
        }
    }

    public function digital_fingerprinting_form_save() {
        if ($application_id = $this->site_model->digital_fingerprinting_form_save()) {
            redirect('digital-fingerprinting/payment/' . $this->site_model->get_digital_fingerprinting_application_details($application_id)->client_id . '/' . $application_id);
        }
        redirect('digital-fingerprinting/' . $this->input->post('country'));
    }

    public function digital_fingerprinting_payment($client_id, $application_id) {
        $data["page_title"] = "Digital Fingerprinting Payment";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('client_id', $client_id)->where('digital_fingerprinting_application_id', $application_id)->get('digital_fingerprinting_applications')->num_rows()) {
            redirect();
        }
        $data["grand_total"] = $this->site_model->get_digital_fingerprinting_application_details($application_id)->grand_total;
        $data['main_view'] = "site/digital_fingerprinting_payment";
        $this->load->view('site/layout', $data);
    }

    public function digital_fingerprinting_payment_save() {
        if (!$this->site_model->digital_fingerprinting_payment_save()) {
            redirect('digital-fingerprinting/payment/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            $application_id = $this->input->post('application_id');
            $price = $this->site_model->get_digital_fingerprinting_application_details($application_id)->grand_total;
            $msg = site_order_invoice($this->input->post('card_holder_name'), $this->input->post('card_holder_email'), $this->input->post('card_holder_phone'), 'Digital Fingerprinting', $price, $application_id);
            $this->email->to($this->input->post('card_holder_email'));
            $this->email->from(EMAIL_FROM_SMTP, 'GAC INC.');
            $this->email->subject('Digital Fingerprinting Order Invoice');
            $this->email->message($msg);
            $this->email->send();
            redirect('digital-fingerprinting/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function digital_fingerprinting_consent($client_id, $application_id) {
        $data["page_title"] = "Consent Form - Digital Fingerprinting";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('digital_fingerprinting_application_id', $application_id)->get('digital_fingerprinting_applications')->num_rows()) {
            redirect('digital-fingerprinting/payment/' . $client_id . '/' . $application_id);
        }
        $data['main_view'] = "site/digital_fingerprinting_consent";
        $this->load->view('site/layout', $data);
    }

    public function digital_fingerprinting_consent_save() {
        if (!$this->site_model->digital_fingerprinting_consent_save()) {
            redirect('digital-fingerprinting/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('digital-fingerprinting/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function digital_fingerprinting_success($client_id, $application_id) {
        $data["page_title"] = "Success - Digital Fingerprinting";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('digital_fingerprinting_application_id', $application_id)->get('digital_fingerprinting_applications')->num_rows()) {
            redirect('digital-fingerprinting/consent/' . $client_id . '/' . $application_id);
        }

        $newId = "2020-SS-".$application_id;
        $this->site_model->update_digital_fingerprinting_application_id_new($application_id, $newId);


        $data['main_view'] = "site/digital_fingerprinting_success";
        $this->load->view('site/layout', $data);
    }

    public function record_suspension() {
        $data["page_title"] = "Record Suspension";
        $data['main_view'] = "site/record_suspension";
        $this->load->view('site/layout', $data);
    }

    public function record_suspension_form($country) {
        $data["page_title"] = "Record Suspension " . strtoupper($country);
        $data['service'] = $this->db->where('service_slug', 'record-suspension')->get('services')->row();
        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
        $data['delivery_methods'] = $this->db->order_by('created_at', 'ASC')->get('delivery_methods')->result();
        $data["states"] = $this->site_model->get_states('Canada');
        $data['country'] = $country;
        $data['main_view'] = "site/record_suspension_form";
        $this->load->view('site/layout', $data);
    }

    public function record_suspension_form_save() {
        if ($application_id = $this->site_model->record_suspension_form_save()) {
            redirect('record-suspension/payment/' . $this->site_model->get_record_suspension_application_details($application_id)->client_id . '/' . $application_id);
        }
        redirect('record-suspension/' . $this->input->post('country'));
    }

    public function record_suspension_payment($client_id, $application_id) {
        $data["page_title"] = "Record Suspension Payment";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('client_id', $client_id)->where('record_suspension_id', $application_id)->get('record_suspension_applications')->num_rows()) {
            redirect();
        }
        $data["grand_total"] = $this->site_model->get_record_suspension_application_details($application_id)->grand_total;
        $data['main_view'] = "site/record_suspension_payment";
        $this->load->view('site/layout', $data);
    }

    public function record_suspension_payment_save() {
        if (!$this->site_model->record_suspension_payment_save()) {
            redirect('record-suspension/payment/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            $application_id = $this->input->post('application_id');
            $price = $this->site_model->get_record_suspension_application_details($application_id)->grand_total;
            $msg = site_order_invoice($this->input->post('card_holder_name'), $this->input->post('card_holder_email'), $this->input->post('card_holder_phone'), 'Record Suspension', $price, $application_id);
            $this->email->to($this->input->post('card_holder_email'));
            $this->email->from(EMAIL_FROM_SMTP, 'GAC INC.');
            $this->email->subject('Record Suspension Order Invoice');
            $this->email->message($msg);
            $this->email->send();
            redirect('record-suspension/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function record_suspension_consent($client_id, $application_id) {
        $data["page_title"] = "Consent Form - Record Suspension";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('record_suspension_id', $application_id)->get('record_suspension_applications')->num_rows()) {
            redirect('record-suspension/payment/' . $client_id . '/' . $application_id);
        }
        $data['main_view'] = "site/record_suspension_consent";
        $this->load->view('site/layout', $data);
    }

    public function record_suspension_consent_save() {
        if (!$this->site_model->record_suspension_consent_save()) {
            redirect('record-suspension/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('site/record_suspension_consent_signature/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
//            redirect('record-suspension/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }


//    record suspension signature save
    public function record_suspension_consent_signature($client_id, $application_id){
        $data["page_title"] = "Signature - Record Suspension Consent Save Signature";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('record_suspension_id', $application_id)->get('record_suspension_applications')->num_rows()) {
            redirect('record-suspension/consent/' . $client_id . '/' . $application_id);
        }
        $data['main_view'] = "site/record_suspension_consent_signature";
        $this->load->view('site/layout', $data);
    }


    public function save_record_suspension_consent_drawable_signature(){
        $signature = $_POST['signature'];
        $signatureFileName = uniqid().'.png';
        $signature = str_replace('data:image/png;base64,', '', $signature);
        $signature = str_replace(' ', '+', $signature);
        $data = base64_decode($signature);
        $file = './upload/applicant_signatures/'.$signatureFileName;
        file_put_contents($file, $data);

        $application_id = $this->input->post('application_id');
        if (!$this->site_model->save_drawable_signature_record_suspension_consent($signatureFileName, $application_id)) {
            redirect('record-suspension/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('record-suspension/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }


    public function save_record_suspension_consent_text_signature(){
        $signature = $this->input->post('consent_signature');
        $application_id = $this->input->post('application_id');
        if (!$this->site_model->save_text_signature_record_suspension_consent($signature, $application_id)) {
            redirect('record-suspension/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('record-suspension/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function save_record_suspension_consent_picture_signature(){
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
            $this->session->set_flashdata('no_access', 'Something went wrong! Please try again.');
            redirect('portal/record_suspension_applications');
        }
        if (!$this->site_model->save_record_suspension_consent_signature_image($filename, $application_id)) {
            redirect('record-suspension/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('record-suspension/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function record_suspension_success($client_id, $application_id) {
        $data["page_title"] = "Success - Record Suspension";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('record_suspension_id', $application_id)->get('record_suspension_applications')->num_rows()) {
            redirect('record-suspension/consent/' . $client_id . '/' . $application_id);
        }

        //        for update the ID to new one
        $newId = "2020-SS-".$application_id;
        $this->site_model->update_application_id_record_suspension_consent($application_id, $newId);

        $data['main_view'] = "site/record_suspension_success";
        $this->load->view('site/layout', $data);
    }

    //    end of record_suspension_consent_signature part
    //    end of record_suspension_consent_signature part

    public function us_entry_waiver() {
        $data["page_title"] = "US Entry Waiver";
        $data['main_view'] = "site/us_entry_waiver";
        $this->load->view('site/layout', $data);
    }

    public function us_entry_waiver_form($country) {
        $data["page_title"] = "US Entry Waiver " . strtoupper($country);
        $data['service'] = $this->db->where('service_slug', 'us-entry-waiver')->get('services')->row();
        $data['sub_services'] = $this->db->where('service_id', $data['service']->service_id)->order_by('created_at', 'ASC')->get('subservices')->result();
        $data["states"] = $this->site_model->get_states('Canada');
        $data['country'] = $country;
        $data['main_view'] = "site/us_entry_waiver_form";
        $this->load->view('site/layout', $data);
    }

    public function us_entry_waiver_form_save() {
        if ($application_id = $this->site_model->us_entry_waiver_form_save()) {
            redirect('us-entry-waiver/payment/' . $this->site_model->get_us_entry_waiver_application_details($application_id)->client_id . '/' . $application_id);
        }
        redirect('us-entry-waiver/' . $this->input->post('country'));
    }

    public function us_entry_waiver_payment($client_id, $application_id) {
        $data["page_title"] = "US Entry Waiver Payment";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('client_id', $client_id)->where('us_entry_waiver_id', $application_id)->get('us_entry_waiver_applications')->num_rows()) {
            redirect();
        }
        $data["grand_total"] = $this->site_model->get_us_entry_waiver_application_details($application_id)->grand_total;
        $data['main_view'] = "site/us_entry_waiver_payment";
        $this->load->view('site/layout', $data);
    }

    public function us_entry_waiver_payment_save() {
        if (!$this->site_model->us_entry_waiver_payment_save()) {
            redirect('us-entry-waiver/payment/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            $application_id = $this->input->post('application_id');
            $price = $this->site_model->get_us_entry_waiver_application_details($application_id)->grand_total;
            $msg = site_order_invoice($this->input->post('card_holder_name'), $this->input->post('card_holder_email'), $this->input->post('card_holder_phone'), 'US Entry Waiver', $price, $application_id);
            $this->email->to($this->input->post('card_holder_email'));
            $this->email->from(EMAIL_FROM_SMTP, 'GAC INC.');
            $this->email->subject('US Entry Waiver Order Invoice');
            $this->email->message($msg);
            $this->email->send();
            redirect('us-entry-waiver/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function us_entry_waiver_consent($client_id, $application_id) {
        $data["page_title"] = "Consent Form - US Entry Waiver";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('payment_status', 1)->where('client_id', $client_id)->where('us_entry_waiver_id', $application_id)->get('us_entry_waiver_applications')->num_rows()) {
            redirect('us-entry-waiver/payment/' . $client_id . '/' . $application_id);
        }
        $data['main_view'] = "site/us_entry_waiver_consent";
        $this->load->view('site/layout', $data);
    }

    public function us_entry_waiver_consent_save() {
        if (!$this->site_model->us_entry_waiver_consent_save()) {
            redirect('us-entry-waiver/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('site/us_entry_waiver_consent_signature/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
//            redirect('us-entry-waiver/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }


//    record suspension signature save
//    record suspension signature save
    public function us_entry_waiver_consent_signature($client_id, $application_id){
        $data["page_title"] = "Signature - US Entry Waiver Consent Save Signature";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('us_entry_waiver_id', $application_id)->get('us_entry_waiver_applications')->num_rows()) {
            redirect('us-entry-waiver/consent/' . $client_id . '/' . $application_id);
        }
        $data['main_view'] = "site/us_entry_waiver_consent_signature";
        $this->load->view('site/layout', $data);
    }


    public function save_us_entry_waiver_consent_drawable_signature(){
        $signature = $_POST['signature'];
        $signatureFileName = uniqid().'.png';
        $signature = str_replace('data:image/png;base64,', '', $signature);
        $signature = str_replace(' ', '+', $signature);
        $data = base64_decode($signature);
        $file = './upload/applicant_signatures/'.$signatureFileName;
        file_put_contents($file, $data);

        $application_id = $this->input->post('application_id');
        if (!$this->site_model->save_drawable_signature_us_entry_waiver_consent($signatureFileName, $application_id)) {
            redirect('us-entry-waiver/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('us-entry-waiver/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }


    public function save_us_entry_waiver_consent_text_signature(){
        $signature = $this->input->post('consent_signature');
        $application_id = $this->input->post('application_id');
        if (!$this->site_model->save_text_signature_us_entry_waiver_consent($signature, $application_id)) {
            redirect('us-entry-waiver/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('us-entry-waiver/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }

    public function save_us_entry_waiver_consent_picture_signature(){
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
            $this->session->set_flashdata('no_access', 'Something went wrong! Please try again.');
            redirect('portal/us_entry_waiver_applications');
        }
        if (!$this->site_model->save_us_entry_waiver_consent_signature_image($filename, $application_id)) {
            redirect('us-entry-waiver/consent/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        } else {
            redirect('us-entry-waiver/success/' . $this->input->post('client_id') . '/' . $this->input->post('application_id'));
        }
    }


    public function us_entry_waiver_success($client_id, $application_id) {
        $data["page_title"] = "Success - US Entry Waiver";
        $data["application_id"] = $application_id;
        $data["client_id"] = $client_id;
        if (!$this->db->where('application_completed', 1)->where('client_id', $client_id)->where('us_entry_waiver_id', $application_id)->get('us_entry_waiver_applications')->num_rows()) {
            redirect('us-entry-waiver/consent/' . $client_id . '/' . $application_id);
        }

        //     for update the ID to new one
        $newId = "2020-SS-".$application_id;
        $this->site_model->update_application_id_us_entry_waiver_consent($application_id, $newId);

        $data['main_view'] = "site/us_entry_waiver_success";
        $this->load->view('site/layout', $data);
    }

    //    end of record_suspension_consent_signature part
    //    end of record_suspension_consent_signature part


    public function get_city_by_state() {
        $this->db->where('state_id', $this->input->post('state_id'));
        $result = $this->db->order_by('name', 'ASC')->get('cities')->result();
        echo '<option value="">Select City</option>';
        foreach ($result as $value) {
            echo '<option value="' . $value->city_id . '">' . $value->name . '</option>';
        }
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

    public function forward_application_to_user(){
        $data = array(
            "user_role_id" => $this->input->post('state_id'),
            "user_id" => $this->input->post('city_id'),
            "application_id" => $this->input->post('digital_fingerprinting_application_id'),
            "application_type" => "Digital Fingerprinting Applications"
        );
//        var_dump($data); die();
        $save_data = $this->site_model->forward_application_to_user($data);
        if ($save_data) {
            $this->session->set_flashdata('success_message', 'Application forwarded successfully.');
            redirect('portal/security-screening/digital-fingerprinting');
        } else {
            $this->session->set_flashdata('error_message', 'Something went wrong. Please try again!');
            redirect('portal/security-screening/digital-fingerprinting');
        }
    }


    public function add_application_certificate_save() {
        $extension = pathinfo($_FILES['office_desk_file']['name'], PATHINFO_EXTENSION);
        $unique_no = uniqid(rand()) . time();
        $filename = $unique_no . '.' . $extension;
        $target_path = "./upload/user_certificates/";

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

        $id = $this->input->post('application_id');

        if (!$this->upload->do_upload('office_desk_file')) {
            $this->session->set_flashdata('no_access', 'Something went wrong! Please try again.');
            redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#comments');
        }
//        var_dump($filename, $id); die();

        if ($this->site_model->update_certificate_of_digital_fingerprinting($filename, $id)) {

//            notification entry
//            $tableName = "digital_fingerprinting_applications";
//            $id = $this->input->post('digital_fingerprinting');
//            $details = "digital fingerprinting's Certificate updated";
//            $data = array(
//                'table_id' => $id,
//                'table_name' => $tableName,
//                'description' => $details
//            );
//            $submitResult = $this->portal_model->save_notification($data);
            //            end notification entry

            $this->session->set_flashdata('success_message', 'Document is added successfully.');
        } else {
            $this->session->set_flashdata('no_access', 'Something went wrong! Please try again.');
        }
        redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#comments');
    }

    //    update the status of detail namebaseapplication that applicaiton is new underProcess or complete
    public function add_application_status_save(){
        $this->site_model->add_application_status_save();
        redirect('portal/security-screening/' . $this->input->post('type') . '/details/' . $this->input->post('application_id') . '#status');
    }


    public function corporate_sub_employee(){
        $data["page_title"] = "Corporate Sub-Employee";
        $data['main_view'] = "site/add_corporate_sub_employee";
        $data["states"] = $this->site_model->get_states('Canada');
        $data["countries"] = $this->db->query("SELECT * FROM countries")->result();

        $data['id'] = $this->uri->segment('3');
        $data['name_based_check'] = $this->uri->segment('4');
        $data['digital_fingerprinting'] = $this->uri->segment('5');
        $data['record_suspension'] = $this->uri->segment('6');
        $data['us_entry_waiver'] = $this->uri->segment('7');


        $this->load->view('site/layout', $data);
    }

    public function save_corporate_sub_employee(){
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Email', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('state_id', 'State', 'trim|required');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('error_message', 'Something went wrong. Please try again!');
            $this->session->set_flashdata('add_user_error', 'Something went wrong. Please try again!');
            redirect('site/corporate_sub_employee');
        } else {
            if ($this->site_model->save_corporate_sub_employee()) {
                $this->session->set_flashdata('success_message', 'Agent added successfully.');
                redirect('site/corporate_sub_employee');
            } else {
                $this->session->set_flashdata('error_message', 'Something went wrong. Please try again!');
                redirect('site/corporate_sub_employee');
            }
        }
    }


    public function success(){
        $data['page_title'] = "Success Payment page (Site Controller)";
        $data['main_view'] = "site/payment/success";
        $this->load->view('site/layout', $data);
    }

    public function error(){
        $data['page_title'] = "error";
        $data['main_view'] = "site/payment/error";
        $this->load->view('site/layout', $data);
    }

}