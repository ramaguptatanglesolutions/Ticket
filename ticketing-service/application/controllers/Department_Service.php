<?php
	require ('./application/libraries/REST_Controller.php');
	
	class Department_Service extends REST_Controller 
	{    
		public function __construct() 
		{
			parent::__construct();     
			$this->load->model("Department_Model",'model');
		}
        
		public function add_post()
		{
			try 
			{
				$data=json_decode($this->post('data'));
				
				$department= $data;
				
				$result=$this->model->add($department);
				
				if($result)
				{
					$result=array("status"=>"success");
					$this->response($result);
				}
				else
				{
					$result=array("status"=>"failed");
					$this->response($result);
				}
            }
			catch (Exception $e) 
			{
				$result=array("status"=>"exception", "exception"=>$e->getMessage());
			
			}
			$this->response($result);
		}
		
		public function updateDepartment_post()
		{
			try 
			{
				$data=json_decode($this->post('data'));
				
				$department=$data->department;
								
				$result=$this->model->update($agent);
				
				if($result)
				{
					$result=array("status"=>"success");
					$this->response($result);
				}
				else
				{
					$result=array("status"=>"failed");
					$this->response($result);
				}
            }
			catch (Exception $e) 
			{
				$result=array("status"=>"exception", "exception"=>$e->getMessage());
				$this->response($result);
			}
		}
		
		public function search_get()
		{
			try 
			{
							
				$data=$this->model->search();
				$this->response($data);
            }
			catch (Exception $e) 
			{
				$result=array("status"=>"exception", "exception"=>$e->getMessage());
				$this->response($result);
			}
		}
		
		public function delete_post()
		{
		    try {
		        $delete = json_decode($this->post('data'));
		        $data=$this->model->delete($delete);
		        $this->response($data);
		        
		        
		    } catch (Exception $e) {
		        
		        $result= array("status"=>"exception", "exception"=>$e->getMessage());
		        $this->response($result);
		    }
		}
		
		public function login_get()
		{
			try 
			{
				$data=json_decode($this->post('data'));
				$agent=$data->agent;
				$personalInfo=$data->personal_info;
				$permanentAddress=$data->permanent_address;
				$mailingAddress=$data->mailing_addrtess;
				$contact=$data->contact;			
            }
			catch (Exception $e) 
			{
				echo $e->getData();
			}
		}
		
		public function block_post()
		{
		    try {
		        $block = json_decode($this->post('data'));
		        $data=$this->model->block($block);
		        $this->response($data);
		        
		        
		    } catch (Exception $e) {
		        
		        $result= array("status"=>"exception", "exception"=>$e->getMessage());
		        $this->response($result);
		    }
		}
	}
?>