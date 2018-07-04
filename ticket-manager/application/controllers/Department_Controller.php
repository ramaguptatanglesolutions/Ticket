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
    	  //  $this->load->view('frame', array('title'=>'Departments/ Add Departments','page'=>'department'));
    	    $this->form_validation->set_rules('department', 'Department', 'required');
    	    if ($this->form_validation->run() == FALSE) {
    	        $this->load->view('frame', 
    	            array('title'=>'Departments/ Add Departments',
    	            'page'=>'department'));
    	    }else{
    	        $postData = $this->input->post();
    	        $data= array(
    	            
    	            'name'=>$postData['department']
    	        );
    	        $result=$this->callService("Department_Service", "add", $data, Rest_Client::POST);
    	        $result=json_decode($result);
    	        print_r($result);
    	        }
    	}
    	
    	public function search()
    	{
    	    $result=$this->callService("Department_Service","search",NULL,Rest_Client::GET);
    	   
    	  $result =json_decode($result,TRUE);
    	$data= array("department"=>$result); 
    	 print_r(json_encode($result,true)); 
    	 
/*     	 die(); */
    	  
    	 /*  $this->load->view(
    	      
    	      'frame',
    	      array(
    	        'title'=>'Departments/Search',
    	          'page'=>'departments',
    	          'department'=>$result['department']
    	      )); */
    	}
    	public function delete()
    	{
    	    $postData = $this->input->post();
    	    $data= array(
    	        'department_id'=>$postData['data']
    	        
    	    );
    	    $result = $this->callService("Department_Service", "delete", $data, Rest_Client::POST);
    	    print_r($result);
    	/*     $result = json_decode($result, true); */
    	/*     if($result==true){
    	      $this->search();   */
    	    }
    	    
    	 
    	}
    
    
?>