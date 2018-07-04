<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    require(APPPATH . 'libraries\REST_Client.php');

    class User_Controller extends Rest_Client 
    {
    	public function index()
    	{
    		$this->load->view('login');
    	}
    	
    	public function login()
    	{
    		$id=$this->input->post('id');
    		$password=$this->input->post('password');
    		
    		$data=array("id"=>$id,"password"=>$password,"lastLogin"=>0);	
    		
    		$result=$this->callService("agents", "validate", $data, Rest_Client::POST);
    		$result=json_decode($result); 
    
    		if($result->status=="executed")
    		{
    		    if(isset($result->data))
    		    {
    		        $this->session->set_userdata('id', $id);
    		        $name=$result->data->first_name." ".$result->data->last_name;
    		        $this->session->set_userdata('name', $name);
    		        $this->session->set_userdata('department', $result->data->department);
    		        $this->session->set_userdata('department_id', $result->data->department_id);
    		        $this->session->set_userdata('role',$result->data->role);
    		        redirect("tickets/opened");
    		    }
    		    else 
    		    {
    		        $this->load->view('login',array("msg"=>" Invalid Id or Password !"));
    		    }
    		}
    		
    	}
    	
    	public function logout()
    	{
    	    $this->session->sess_destroy();
    	    redirect(base_url());
    	}
    	
    	public function profile()
    	{
    	    $this->load->view('frame', array('title'=>'User / Profile'));
    	}
    	
    	public function settings()
    	{
    	    $this->load->view('frame', array('title'=>'User / Settings'));
    	}
    }
    
?>