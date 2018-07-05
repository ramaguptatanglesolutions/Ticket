<?php

	class Department_model extends CI_Model
    {
		public function __construct() 
		{
			parent::__construct();
			$this->load->database();
		}

		
		function add($department)
		{
		    try {
		        $result=array('status'=>'executed');
		        $this->db->trans_start();
		        
		        $this->db->insert("department",$department);
		        
		        $this->db->trans_complete();
		      
		        
		        if ($this->db->trans_status() === FALSE)
		        {
		            $this->db->trans_rollback();
		            $result=array('status'=>'rollback');
		           
		        }
		        else
		        {
		            $this->db->trans_commit();
		            $result=array('status'=>'commit');
		          
		        }
		        
		    } catch (Exception $e) {
		        
		        $result['status']="exception";
		        $result['message']=$e->getMessage();
		    }
		    return $result;
		}
		
		
		function update($data)
		{
		    try{
		        $this->db->trans_start();
		        
		        $this->db->update("department",$data,array($id=>$data->department_id));
		        
		        $this->db->trans_complete();
		        
		        if ($this->db->trans_status() === FALSE)
		        {
		            $this->db->trans_rollback();
		            return FALSE;
		        }
		        else
		        {
		            $this->db->trans_commit();
		            return TRUE;
		        }
		        
				    }catch(Exception $e){
				        return FALSE;
		        
		    }
	}
	
	function delete($data)
	{
	    
	    try{
	        $this->db->where_in('id',$data->department_id);
	        $this->db->delete("department");
	        $this->db->select("id,name,case when status = 0 then 'ACTIVE' else 'BLOCK' end as status");
	        $this->db->from("department");
	        return $this->db->get()->result();
	        
	        
	    }catch(Exception $e){
	        return FALSE;
	    }
	    
	}
	
	
	function search()
	{
	    try{
	       // $result=array('status'=>'executed');
	        
	        $this->db->select("id,name,case when status = 0 then 'ACTIVE' else 'BLOCK' end as status");
	        $this->db->from("department");       
	        $result['department']=$this->db->get()->result_array();
	        
	    }catch(Exception $e)
	    {
	        $result['status']="exception";
	        $result['message']=$e->getMessage();
	    }
	    
	    return $result;
	    
	}
	
	function block($data)
	{
	    try{
	        $this->db->set('status',$data->status);
	        $this->db->where_in("id",$data->department_id);
	        $this->db->update("department");
	        return true;
	    }catch(Exception $e)
	    {
	        return FALSE;
	    }
	    
	    
	}
	
	
	
}
 
?>
	    
	    
	   