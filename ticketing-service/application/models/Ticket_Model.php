<?php

class Ticket_Model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    function add_ticket($ticket, $thread)
    {
        try {
            $result = array(
                'status' => 'executed'
            );
            $this->db->trans_start();
            
            $this->db->insert("ticket", $ticket);
            $thread->ticket = $this->db->insert_id();
            $this->db->insert("thread", $thread);
            
            $this->db->trans_complete();
            
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return FALSE;
            } else {
                $this->db->trans_commit();
                $result = array(
                    'status' => 'commit'
                );
                
            }
        } catch (Exception $e) {
            return FALSE;
        }
        return $thread;
    }

    function add_thread($thread)
    {
        try {
            $this->db->trans_start();
            
            $this->db->insert("thread", $thread);
            
            $this->db->trans_complete();
            
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return FALSE;
            } else {
                $this->db->trans_commit();
                return TRUE;
            }
        } catch (Exception $e) {
            return FALSE;
        }
    }

    function assign_agent($datas)
    
    {
       try {
            $this->db->trans_start();
            $this->db->insert_batch('ticket_agent', $datas["ticket_agent"]);
            
            $this->db->where_in("id",$datas['ticket_arr']);
            $this->db->update("ticket", $datas['ticket']); 
            
            log_message("error",$this->db->last_query());
            
            
            $this->db->where_in("ticket",$datas['ticket_arr']);
            $this->db->update("thread",$datas['thread']);
            
            log_message("error",$this->db->last_query());
            
            $this->db->trans_complete();
            
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return FALSE;
            } else {
                $this->db->trans_commit();
                return TRUE;
            }
        } catch (Exception $e) {
            return FALSE;
        } 
    }

    function change_agent($data)
    {
        try {
            $this->db->trans_start();
            $this->db->update_batch("ticket_agent",$data['tick_agent'],'ticket');
            $this->db->insert_batch("ticket_agent", $data['ticket_agent']);
            $this->db->insert_batch("thread",$data['thread']);
            
            $this->db->trans_complete();
            
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return FALSE;
            } else {
                $this->db->trans_commit();
                return TRUE;
            }
        } catch (Exception $e) {
            return FALSE;
        }
    }

    function searchQueue($criteria)
    {
 
        try {
            $result = array(
                'status' => 'executed'
            );
            
            
            $this->db->select('ticket.id,client,open_date,subject,department,priority,ticket.status,department.name');
            $this->db->from('ticket');
            $this->db->join('department','ticket.department=department.id');
            $this->db->join('thread','ticket.id=thread.ticket');
            $this->db->where("ticket.status",$criteria['status']);
            
            if($criteria['role']==3){
                $this->db->where("thread.agent",$criteria['agent_id']);
                log_message("info","inside if");
                              
            }else{
                log_message("info","inside else");
            }
            if($criteria['role']!=1){
                $this->db->where("department.id",$criteria['dept']);
            }
            
            log_message("info",$this->db->last_query());
  
            return $this->db->get()->result();
        } catch (Exception $e) {
            return False;
        } 
    }

function delete($id)
{
      
    try{
        $this->db->where_in("id",$id);
        $this->db->delete("ticket");
        $this->db->select('*');
      $this->db->from("ticket");
       return $this->db->get()->result();
        
        
    }catch(Exception $e){
        return FALSE;
    }
   
}
    
    function get_threads($id)
    
    {
        
        try {
            $agent->personal_info = $this->db->get_where('personal_info', array(
                'id' => $id
            ))->row();
            $agent->permanent_address = $this->db->get_where('address', array(
                'agent' => $id,
                'type' => '1'
            ))->row();
            $agent->mailing_address = $this->db->get_where('address', array(
                'agent' => $id,
                'type' => '2'
            ))->row();
            $agent->contact = $this->db->get_where('contact', array(
                'id' => $id
            ))->row();
            
            return $agent;
        } catch (Exception $e) {
            return false;
        }
    }
    
    function thread($data)
    {
        try{
            $this->db->where('ticket',$data['id']);
            $this->db->select('*');
            $this->db->from('thread');
            return $this->db->get()->result();
        }catch(Exception $e){
            return false;
        }
    }
    
    function fetchclient($id){
        
        $this->db->where_in('id',$id);
        $this->db->select("client");
        $this->db->from('ticket');
        return $this->db->get()->result();
    }
    
    function applyfilter($data){
        
        try{
            $this->db->select('ticket.id,client,open_date,subject,department,priority,ticket.status,department.name');
            $this->db->from('ticket');
            $this->db->join('department','ticket.department=department.id');
          $this->db->join('thread','ticket.id=thread.ticket');
               $this->db->where($data);
                 
            return $this->db->get()->result();
           
        }catch(Exception $e){
        return false;
    }
    
    }

    function self($criteria){
        try {
            $result = array(
                'status' => 'executed'
            );
            
            
            $this->db->select('ticket.id,client,open_date,subject,department,priority,ticket.status,department.name');
            $this->db->from('ticket');
            $this->db->join('department','ticket.department=department.id');
            $this->db->join('thread','ticket.id=thread.ticket');
            $this->db->where("ticket.status",$criteria['status']);
            if($criteria['role']!=3){
                $this->db->where("thread.agent",$criteria['agent_id']);
                log_message("info","inside if");
                
            }else{
                log_message("info","inside else");
            }
          
            log_message("info",$this->db->last_query());
            
            return $this->db->get()->result();
        } catch (Exception $e) {
            return False;
        } 
    
    }
    
    
    function resolve($data)
    {
        try{
            $this->db->trans_start();
            
            $this->db->update_batch('ticket',$data,'id');
            $this->db->trans_complete();
            
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                return FALSE;
            } else {
                $this->db->trans_commit();
                return TRUE;
            }
        } catch (Exception $e) {
            return FALSE;
        } 
        
        
        
        
    }
    
    
    
    
    

}
?>