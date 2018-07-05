<?php

	class Agent_Model extends CI_Model
    {
		public function __construct() 
		{
			parent::__construct();
			$this->load->database();
		}	
		
        public function validate($id, $password, $lastLogin)
		{
			try
			{
				$result=array('status'=>'executed');
				
				$this->db->select("first_name, last_name,role,department.name as department,department.id as department_id");
				$this->db->from("agent");
				$this->db->where(array('agent.id'=>$id,'password'=>$password));
				$this->db->join("personal_info","agent.id=personal_info.id");
				$this->db->join("department","agent.department=department.id");
				$query = $this->db->get();
				
				if($query->num_rows()>0)
				{
					$result['data']=$query->result()[0];
				}
			}
			catch (Exception $e) 
			{
				$result['status']="exception";
				$result['message']=$e->getMessage();
			}
			
			return $result;
        }
        
        public function add($agent, $personalInfo, $permanentAddress, $mailingAddress, $contact)
        {
            try
            {
                $result=array('status'=>'executed');
                
                $this->db->trans_start();
                
                $this->db->insert("agent",$agent);
                $this->db->insert("personal_info",$personalInfo);
                $this->db->insert("address",$permanentAddress);
                $this->db->insert("address",$mailingAddress);
                $this->db->insert("contact",$contact);
                
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
            }
            catch (Exception $e)
            {
                $result['status']="exception";
                $result['message']=$e->getMessage();
            }
            
            return $result;
        }
        
        public function search()
        {
            try
            {
                $result=array('status'=>'executed');
                
                $this->db->select("agent.id, agent_id,first_name, last_name, department.name as department, role.name as role,case when agent.status = 0 then 'Active' else 'Block' end as status, rating",FALSE);
                $this->db->from("agent");
                $this->db->join("personal_info","agent.id=personal_info.id");
                $this->db->join("department","department.id=agent.department");
                $this->db->join("role","role.id=agent.role");
                $result=$this->db->get()->result();
            }
            catch (Exception $e)
            {
                $result['status']="exception";
                $result['message']=$e->getMessage();
            }
            
           return $result;
        }
        
        public function get($id)
        {
            try
            {
                $result=array('status'=>'executed');
                
                $data['agent'] = $this->db->get_where('agent', array('id' => $id))->row();
                $data['personal_info'] = $this->db->get_where('personal_info', array('id' => $id))->row();
                $data['permanent_address'] = $this->db->get_where('address', array('agent' => $id, 'type'=>'1'))->row();
                $data['mailing_address'] = $this->db->get_where('address', array('agent' => $id, 'type'=>'2'))->row();
                $data['contact'] = $this->db->get_where('contact', array('id' => $id))->row();
                
                $result['data']=$data;
            }
            catch (Exception $e)
            {
                $result['status']="exception";
                $result['message']=$e->getMessage();
            }
            
            return $result;
        }
        
        public function applyfilter($data){
            
            try{
                
                log_message("info",json_encode($data));
                
                $this->db->select("agent.id, agent_id,first_name, last_name, department.name as department, role.name as role,case when agent.status = 0 then 'Active' else 'Block' end as status, rating",FALSE);
                $this->db->from("agent");
                $this->db->join("personal_info","agent.id=personal_info.id");
                $this->db->join("department","department.id=agent.department");
                $this->db->join("role","role.id=agent.role");
                if(isset($data)){
                    $this->db->where($data);
                } 
                return $result=$this->db->get()->result();
                
                /* $this->db->select('*');
                $this->db->from('agent');
                $this->db->join("personal_info","agent.id=personal_info.id");
                $this->db->join("department","agent.department=department.id"); */
                            
                //return $this->db->get()->result();
                
            }catch(Exception $e){
                return false;
            }
            
        }
        
        function delete($data)
        {
            
            try{
                $this->db->where_in('agent_id',$data->agent_id);
                $this->db->delete("agent");
                $this->db->select('*');
                $this->db->from("agent");
                return $this->db->get()->result();
                
                
            }catch(Exception $e){
                return FALSE;
            }
            
        }
        
        
	}
?>