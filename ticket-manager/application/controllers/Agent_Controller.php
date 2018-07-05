<?php
defined('BASEPATH') or exit('No direct script access allowed');

require (APPPATH . 'libraries\Session_Controller.php');

class Agent_Controller extends Session_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function create()
    {
       
        $this->form_validation->set_rules('Agentid', 'Agent Id', 'required|valid_email');
        $this->form_validation->set_rules('firstName', 'First Name', 'required|alpha');
        $this->form_validation->set_rules('lastName', 'lastName', 'required|alpha');
        $this->form_validation->set_rules('dob', 'dob', 'required');
        $this->form_validation->set_rules('doj', 'doj', 'required');
        $this->form_validation->set_rules('mailingAddressLine1', 'mailingAddressLine1', 'required');
        $this->form_validation->set_rules('mailingAddressCity', 'mailingAddressCity', 'required|alpha');
        $this->form_validation->set_rules('mailingAddressState', 'mailingAddressState', 'required|alpha');
        $this->form_validation->set_rules('mailingAddressCountry', 'mailingAddressCountry', 'required|alpha');
        $this->form_validation->set_rules('mailingAddressZipCode', 'mailingAddressZipCode', 'required|numeric');
        $this->form_validation->set_rules('permanentAddressLine1', 'permanentAddressLine1', 'required');
        $this->form_validation->set_rules('permanentAddressCity', 'permanentAddressCity', 'required|alpha');
        $this->form_validation->set_rules('permanentAddressState', 'permanentAddressState', 'required|alpha');
        $this->form_validation->set_rules('permanentAddressCountry', 'permanentAddressCountry', 'required|alpha');
        $this->form_validation->set_rules('permanentAddressZipCode', 'permanentAddressZipCode', 'required|numeric');
        $this->form_validation->set_rules('officialEmailId', 'officialEmailId', 'required|valid_email');
        $this->form_validation->set_rules('countryCode', 'countryCode', 'numeric');
        $this->form_validation->set_rules('areaCode', 'areaCode', 'numeric');
        $this->form_validation->set_rules('phoneNo', 'phoneNo', 'numeric');
        $this->form_validation->set_rules('mobileNo', 'mobileNo', 'required|numeric');
        $this->form_validation->set_rules('extension', 'extension', 'required|numeric');
        $this->form_validation->set_rules('personalEmailId', 'personalEmailId', 'required|valid_email');
        $this->form_validation->set_rules('officialEmailId', 'officialEmailId', 'required|valid_email');
    
        if ($this->form_validation->run() == FALSE) {
            $error=($this->form_validation->error_array());
            
            $error_data = array(
                "status"=>"failed",
                "response"=>$error
            );
            print_r(json_encode($error_data));
            
        }else{
        $postData=$this->input->post();
        $agent = array(
            "id" => $postData['id'],
            "password" => "password",
            "role" => $postData['role'],
            "department" => $postData['department'],
            "last_login" => "0"
        );
        $personalInfo = array(
            "first_name" => $postData['firstName'],
            "last_name" => $postData['lastName'],
            "gender" => '1',
            "date_of_birth" => $postData['dob'],
            "date_of_joining" => $postData['doj']
        );
        $permanentAddress = array(
            "address_line_1" => $postData['permanentAddressLine1'],
            "address_line_2" => $postData['permanentAddressLine2'],
            "city" => $postData['permanentAddressCity'],
            "state" => $postData['permanentAddressState'],
            "country" => $postData['permanentAddressCountry'],
            "zip_code" => $postData['permanentAddressZipCode']
        );
        $mailingAddress = array(
            "address_line_1" => $postData['mailingAddressLine1'],
            "address_line_2" => $postData['mailingAddressLine2'],
            "city" => $postData['mailingAddressCity'],
            "state" => $postData['mailingAddressState'],
            "country" => $postData['mailingAddressCountry'],
            "zip_code" => $postData['mailingAddressZipCode']
        );
        $contact = array(
            "country_code" => $postData['countryCode'],
            "area_code" => $postData['areaCode'],
            "telephone_no" => $postData['phoneNo'],
            "mobile_no" => $postData['mobileNo'],
            "extension" => $postData['extension'],
            "personal_email_id" => $postData['personalEmailId'],
            "official_email_id" => $postData['officialEmailId']
        );
        
        $data = array(
            'agent' => $agent,
            'personal_info' => $personalInfo,
            'permanent_address' => $permanentAddress,
            'mailing_address' => $mailingAddress,
            'contact' => $contact,
            
        );
        $result=$this->callService("Agent_Service","add",$data,Rest_Client::POST);
        $result = json_decode($result, true);
        $Result_data = array(
            "status"=>"success",
            "response"=>$result
        );
        print_r(json_encode($Result_data));
        }
    }
  
    public function search()
    {
        if ($this->input->get('id') != null) {
            $id = $this->input->get('id');
            $result = $this->callService("agents", "get", $id, Rest_Client::POST);
            $result = json_decode($result, true);
             print_r(json_encode($result,true));
      if ($result['status'] == "executed") {
                $this->load->view('frame', array(
                    'title' => 'Agents / Search Agents / (ID: ' . $id . ')',
                    'page' => 'agent',
                    'agent' => $result['data']
                ));
            }
        } else { 
            
           
            
            $data = array();
            $postData=$this->input->post();
           
            if (isset($postData) && isset($postData['id']))
                $data['agent.id'] = $postData['id'];
                if (isset($postData) && isset($postData['firstName']))
                $data['first_name'] = $postData['firstName'];
                if (isset($postData) && isset($postData['lastName']))
                 $data['last_name'] = $postData['lastName'];
                 log_message("info",json_encode($postData)."xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");
            
            
            $result = $this->callService("Agent_Service", "filter", $data, Rest_Client::POST);
            
            $result =json_decode($result,true);
            
            
            $data=array(
                'agents'=>$result
            );
            if(!empty($data['agents'])){
                print_r(json_encode($data));
            }else{
                echo json_encode("No Data Found");
            }
    
    } 
    }
    

    public function filter()
    {
        $data = array();
        $postData = $this->input->post();
        
        if ($_POST['id'] != null)
            $data['agent.id'] = $postData['id'];
        if ($_POST['firstName'] != null)
            $data['first_name'] = $postData['firstName'];
        if (($_POST['lastName']) != null)
            $data['last_name'] = $postData['lastName'];
       /*  if (($_POST['department']) != 'All')
            $data['department'] = $postData['department']; */
      /*   if (($_POST['status']) != 'All')
            $data['status'] = $postData['status'];
        if ($_POST['type'] != 'All')
            $data['type'] = $postData['type'];
        if ($_POST['rating'] != 'All Ratings')
            $data['rating'] = $postData['rating']; */
        
        // print_r($data);
        $result = $this->callService("Agent_Service", "filter", $data, Rest_Client::POST);
        // print_r($result);
        $result = json_decode($result, true);
        // print_r($result);
        
        if ($result != NULL) {
            $this->load->view('frame', array(
                'title' => 'Agent/Details',
                'page' => 'agents',
                'agents' => $result
            
            ));
        }
    }
    
    public function deleteAgent(){
        $postData = $this->input->post();
        $data= array(
            'agent_id'=>$postData['data']
 
        );
        print_r($data);
        $result=$this->callService("Agent_Service","delete",$data,Rest_Client::POST);
        $result= json_decode($result,true);
        
        
        print_r(json_encode($result,true));

    }
}

?>