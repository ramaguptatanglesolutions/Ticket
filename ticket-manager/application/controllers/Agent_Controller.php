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
       // print_r($_POST);
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
   
  var_dump("kjhjkhkhiohkjiyih");
        print_r($data);
        
        $result=$this->callService("Agent_Service","add",$data,Rest_Client::POST);
        $result = json_decode($result, true);
       // print_r($result);
        }
        
        
        /* $result1=$this->callService("Department_Service","search",NULL,Rest_Client::GET);
      /*   $result1 =json_decode($result1,TRUE); */
       /*   if ($this->input->post('submit') != NULL) {
            
            $postData = $this->input->post();
            $this->form_validation->set_rules('id', 'Agent Id', 'required');   
            $this->form_validation->set_rules('firstName', 'First Name', 'required');
            $this->form_validation->set_rules('lastName', 'lastName', 'required');
            $this->form_validation->set_rules('mailingAddressLine1', 'mailingAddress', 'required');
            $this->form_validation->set_rules('mailingAddressCity', 'mailingAddressCity', 'required');
            $this->form_validation->set_rules('mobileNo', 'mobileNo', 'required');
            if ($this->form_validation->run() == FALSE) {
                $agent = array(
                    "id" => '',
                    "role" => "3",
                    "department" =>$result1['department']
                );
                $personalInfo = array(
                    "first_name" => '',
                    "last_name" => '',
                    "gender" => '1',
                    "date_of_birth" => '',
                    "date_of_joining" => ''
                );
                $permanentAddress = array(
                    "address_line_1" => '',
                    "address_line_2" => '',
                    "city" => '',
                    "state" => '',
                    "country" => '',
                    "zip_code" => ''
                );
                $mailingAddress = array(
                    "address_line_1" => '',
                    "address_line_2" => '',
                    "city" => '',
                    "state" => '',
                    "country" => '',
                    "zip_code" => ''
                );
                $contact = array(
                    "country_code" => '',
                    "area_code" => '',
                    "telephone_no" => '',
                    "mobile_no" => '',
                    "extension" => '',
                    "personal_email_id" => '',
                    "official_email_id" => ''
                );
                
                $data = array(
                    'agent' => $agent,
                    'personal_info' => $personalInfo,
                    'permanent_address' => $permanentAddress,
                    'mailing_address' => $mailingAddress,
                    "contact" => $contact,
                    'roless'=>$this->session->userdata('role'),
                    'dept'=>$this->session->userdata('department'),
                    'name'=>$this->session->userdata('department_id')
                );
                $data = json_encode($data, true);
                
               $this->load->view('frame', array(
                    'title' => 'Agents / Add New Agent',
                    'page' => 'agent',
                    'agent' => $data,
                   
                )); 
            } else {
                
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
                    "contact" => $contact,
                    'roless'=>$this->session->userdata('role'),
                    'dept'=>$this->session->userdata('department'),
                    'name'=>$this->session->userdata('department_id')
                    
                );
                
                $result = $this->callService("agents", "add", $data, Rest_Client::POST);
                
                $result = json_decode($result, true);
                 print_r($result);
                 if ($result['status'] == "commit") {
                    $result['data'] = $this->callService("agents", "search", NULL, Rest_Client::POST); 
                   $result['data'] = json_decode($result['data'], true);
                    /*
                     * echo"<pre>";
                     * print_r($result);
                     * echo"</pre>";
                     * die("died");
                     */
                 /*  if ($result != null) {
                        $this->load->view('frame', array(
                            'title' => 'Agents / Search Agents',
                            'page' => 'agents',
                            'agents' => $result['data'],
                            'department'=>$result1,
                            'roless'=>$this->session->userdata('role'),
                            'dept'=>$this->session->userdata('department'),
                            'name'=>$this->session->userdata('department_id')
                        ));
                    } 
                }
            }
        }  */ 
        /*     else {
            $agent = array(
                "id" => '',
                "role" => "3",
                "department" => $result1
            );
            $personalInfo = array(
                "first_name" => '',
                "last_name" => '',
                "gender" => '1',
                "date_of_birth" => '',
                "date_of_joining" => ''
            );
            $permanentAddress = array(
                "address_line_1" => '',
                "address_line_2" => '',
                "city" => '',
                "state" => '',
                "country" => '',
                "zip_code" => ''
            );
            $mailingAddress = array(
                "address_line_1" => '',
                "address_line_2" => '',
                "city" => '',
                "state" => '',
                "country" => '',
                "zip_code" => ''
            );
            $contact = array(
                "country_code" => '',
                "area_code" => '',
                "telephone_no" => '',
                "mobile_no" => '',
                "extension" => '',
                "personal_email_id" => '',
                "official_email_id" => ''
            );
            $data = array(
                'agent' => $agent,
                 'personal_info' => $personalInfo,
                'permanent_address' => $permanentAddress,
                'mailing_address' => $mailingAddress,
                "contact" => $contact, 
                'roless'=>$this->session->userdata('role'),
                'dept'=>$this->session->userdata('department'),
                'name'=>$this->session->userdata('department_id')
            );
            $data = json_decode(json_encode($data), true);
      /*      print_r($data);
            die('htryttyut'); */ 
           /*  $this->load->view('frame', array(
                'title' => 'Agents / Add New Agent',
                'page' => 'agent',
                'agent' => $data,
               // 'department'=>$result1
            ));
      */
    

    public function search()
    {
        if ($this->input->get('id') != null) {
            $id = $this->input->get('id');
            $result = $this->callService("agents", "get", $id, Rest_Client::POST);
            $result = json_decode($result, true);
            
         /*  print_r($result['data']);
            die("mbmbmbhb hhb m");  */
             print_r(json_encode($result,true));
            
         // $this->load->view('agents',array('agent'=>$result['data'])); 
           //   die('died');
      if ($result['status'] == "executed") {
                $this->load->view('frame', array(
                    'title' => 'Agents / Search Agents / (ID: ' . $id . ')',
                    'page' => 'agent',
                    'agent' => $result['data']
                ));
            }
        } else { 
            $result = $this->callService("agents", "search", NULL, Rest_Client::POST);
            
            $result =json_decode($result,true);
            
            
            $data=array(
                'agents'=>$result
            );
            if(!empty($data['agents'])){
                print_r(json_encode($data));
            }else{
                echo json_encode("No Data Found");
            }
     
         /*   die("hgdjgsjg");
            if ($result != NULL) {
                $this->load->view('frame', array(
                    'title' => 'Agents / Search Agents',
                    'page' => 'agents',
                   // 'agents' => $result
                ));
            } */
    
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
      //  print_r($_POST);
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