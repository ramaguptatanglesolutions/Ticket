<?php

    defined('BASEPATH') OR exit('No direct script access allowed');	
    
    require(APPPATH . 'libraries\Session_Controller.php');
    
    class Department_Controller extends Session_Controller 
    {
    	public function __construct() 
    	{
    		parent::__construct();
    	}
    	
    	public function create()
    	{
    	    $this->load->library('form_validation');
    	    
    	    $this->load->view('frame', array('title'=>'Departments/ Add Departments','page'=>'department'));
    	
    	    
    	    $this->form_validation->set_rules('department', 'Department', 'required');
    	    if ($this->form_validation->run() == FALSE) {
    	        $this->load->view('frame', 
    	            array('title'=>'Departments/ Add Departments',
    	            'page'=>'department',
    	            'result'=>array('result'=>'no data found')));
    	    }else{
    	        $postData = $this->input->post();
    	        $data= array(
    	            
    	            'name'=>$postData['department']
    	        );
    	        if($data['name']!=NULL)
    	        {
   
    	        $result=$this->callService("Department_Service", "add", $data, Rest_Client::POST);
    	   
    	        $result=json_decode($result);
    	        }
    	  
    	        }
    	        
    	    
    	}
    	
    	public function search()
    	{
    	    $result=$this->callService("Department_Service","search",NULL,Rest_Client::GET);
    	   $result =json_decode($result,TRUE);
    	
    	    	   if($result!=NULL){
    	    	       
    	      	      $this->load->view('frame',array('title'=>'Departments / Search Departments','page'=>'departments','department'=>$result['department']));
    	  
    	    }
    	    
    	}
    	public function delete($id = 'null')
    	
    	{
    	    
    	    
    	    $id = array();
    	    $id = $_POST['selected_id'];
    	    
    	 
    	    $result = $this->callService("Department_Service", "delete", $id, Rest_Client::POST);
    	    $result = json_decode($result, true);
    	    if($result==true){
    	      $this->search();  
    	    }
    	    
    	 
    	}
    }
    
?>