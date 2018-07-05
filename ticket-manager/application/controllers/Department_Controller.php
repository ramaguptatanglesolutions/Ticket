<?php

    defined('BASEPATH') OR exit('No direct script access allowed');	
    
    require(APPPATH . 'libraries\Session_Controller.php');
    
    class Department_Controller extends Session_Controller 
    {
    	public function __construct() 
    	{
    		parent::__construct();
    		$this->load->library('form_validation');
    	}
    	
    	public function create()
    	{
    	    $this->form_validation->set_rules('department', 'Department', 'required');
    	
    	    if ($this->form_validation->run() == FALSE) {
    	        $error=($this->form_validation->error_array());
    	        
    	        $error_data = array(
    	            "status"=>"failed",
    	            "response"=>$error
    	        );
    	        print_r(json_encode($error_data));
    	        
    	    }else{
    	        $postData = $this->input->post();
    	        $data= array(
    	            
    	            'name'=>$postData['department']
    	        );
    	        $result=$this->callService("Department_Service", "add", $data, Rest_Client::POST);
    	        $Result_data = array(
    	            "status"=>"success",
    	            "response"=>json_decode($result)
    	        );    	        
    	        print_r(json_encode($Result_data));
    	        }
    	}
    	
    	public function search()
    	{
    	    $result=$this->callService("Department_Service","search",NULL,Rest_Client::GET);
    	   
    	  $result =json_decode($result,TRUE);
    	$data= array("department"=>$result); 
    	 print_r(json_encode($result,true)); 

    	}
    	public function delete()
    	{
    	    $postData = $this->input->post();
    	    
    	    $data= array(
    	        'department_id'=>$postData['data']
    	        
    	    );
    	    $result = $this->callService("Department_Service", "delete", $data, Rest_Client::POST);
    	    $result = json_decode($result, true);
    	    $data= array("department"=>$result);
    	    print_r(json_encode($data,true)); 
    	
    	    }
    	    
    	 
    	
    	
    	public function block()
    	{
    	    $postData = $this->input->post();
    	    
    	    $data= array(
    	        'department_id'=>$postData['data'],
    	        'status'=>1
    	        
    	    );
    	    
    	    $result= $this->callService("Department_Service","block",$data,Rest_Client::POST);
    	    $result= json_decode($result,true);
    	    print_r(json_encode($result,true));
    	    
    	}
    	
    	
    	
    }
    
?>