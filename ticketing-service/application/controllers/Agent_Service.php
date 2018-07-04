<?php
	require ('./application/libraries/REST_Controller.php');
	
	class Agent_Service extends REST_Controller 
	{    
		public function __construct() 
		{
			parent::__construct();     
			$this->load->model("Agent_Model","model");
		}	
		
		public function testService_get()
		{
			$books=array('Name'=>'Bookk Name','ISBN'=>'ISB002','Author'=>'Prakash Malik');
			
			$books->Name="Book Name";
			$books->SBN="ISB0-02";
			$books->uthor="Prakash Malik";
			
			$this->response($books);
		}
		
		public function validate_post()
		{
			try 
			{
			    $data=json_decode($this->post('data'));
				
				$id=$data->id;
				$password=$data->password;
				$lastLogin=$data->lastLogin;
				
				$result=$this->model->validate($id,$password,$lastLogin);
            }
			catch (Exception $e) 
			{
			    $result['status']="exception";
				$result['message']=$e->getMessage();
			}
			
			$this->response($result);
		}
		
		public function add_post()
		{
		    try
		    {
		        $data=json_decode($this->post('data'));
		        
		        $agent=$data->agent;
		        
		        $personalInfo=$data->personal_info;
		        $personalInfo->id=$agent->id;
		        
		        $permanentAddress=$data->permanent_address;
		        $permanentAddress->agent=$agent->id;
		        $permanentAddress->type='1';
		        
		        $mailingAddress=$data->mailing_address;
		        $mailingAddress->agent=$agent->id;
		        $mailingAddress->type='2';
		        
		        $contact=$data->contact;
		        $contact->id=$agent->id;
		        
		        $result=$this->model->add($agent, $personalInfo, $permanentAddress, $mailingAddress, $contact);
		    }
		    catch (Exception $e)
		    {
		        $result['status']="exception";
		        $result['message']=$e->getMessage();
		    }
		    
		    $this->response($result);
		}
		
		public function search_post()
		{
		    try
		    {
		        $result=$this->model->search();		        
		    }
		    catch (Exception $e)
		    {
		        $result['status']="exception";
		        $result['message']=$e->getMessage();
		    }
		    
		    $this->response($result);
		}
		
		public function get_post()
		{
		    try
		    {
		        $id=json_decode($this->post('data'));
		        $result=$this->model->get($id);
		    }
		    catch (Exception $e)
		    {
		        $result['status']="exception";
		        $result['message']=$e->getMessage();
		    }
		    
		    $this->response($result);
		}
		
		public function filter_post()
		{
		    try {
		        
		        $data = json_decode($this->post('data'),true);
		        
		        $data = $this->model->applyfilter($data);
		        $this->response($data);
		        
		    } catch (Exception $e) {
		        
		        return false;
		    }
		}
		
		public function delete_post()
		{
		    try {
		        $delete = json_decode($this->post('data'));
		        $data = $this->model->delete($delete);
		        $this->response($data);
		    } catch (Exception $e) {
		        
		        $result = array(
		            "status" => "exception",
		            "exception" => $e->getMessage()
		        );
		        $this->response($result);
		    }
		}
		
	}
?>