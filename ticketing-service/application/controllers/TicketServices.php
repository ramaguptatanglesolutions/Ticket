<?php
require ('./application/libraries/REST_Controller.php');

class TicketServices extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Ticket_model", "model");
    }

    public function add_post()
    {
        try {
            $data = json_decode($this->post('data'));
            
            $ticket = $data->ticket;
            $threads = $data->thread;
            
            $result = $this->model->add_ticket($ticket, $threads);
        } catch (Exception $e) {
            $result = array(
                "status" => "exception",
                "exception" => $e->getMessage()
            );
        }
        $this->response($result);
    }

    public function updateAgent_post()
    {
        try {
            $data = json_decode($this->post('data'));
            
            $agent = $data->agent;
            $personalInfo = $data->personal_info;
            $permanentAddress = $data->permanent_address;
            $mailingAddress = $data->mailing_address;
            $contact = $data->contact;
            
            $result = $this->agent_model->update($agent, $personalInfo, $permanentAddress, $mailingAddress, $contact);
            
            if ($result) {
                $result = array(
                    "status" => "success"
                );
                $this->response($result);
            } else {
                $result = array(
                    "status" => "failed"
                );
                $this->response($result);
            }
        } catch (Exception $e) {
            $result = array(
                "status" => "exception",
                "exception" => $e->getMessage()
            );
            $this->response($result);
        }
    }

    public function getAgent_post()
    {
        try {
            $agent = json_decode($this->post('data'));
            $agent = $this->agent_model->get($agent->id);
            $this->response($agent);
        } catch (Exception $e) {
            $result = array(
                "status" => "exception",
                "exception" => $e->getMessage()
            );
            $this->response($result);
        }
    }

    public function search_post()
    {
        $result = array(
            'status' => 'executed'
        );
        try {
            
            $stat = json_decode($this->post('data'), true);
            $data = $this->model->searchQueue($stat);
            $this->response($data);
        } catch (Exception $e) {
            $result = array(
                "status" => "exception",
                "exception" => $e->getMessage()
            );
            $this->response($result);
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

    public function login_get()
    {
        try {
            $data = json_decode($this->post('data'));
            
            $agent = $data->agent;
            $personalInfo = $data->personal_info;
            $permanentAddress = $data->permanent_address;
            $mailingAddress = $data->mailing_addrtess;
            $contact = $data->contact;
        } catch (Exception $e) {
            echo $e->getData();
        }
    }

    public function assignAgent_post()
    {
        try {
            $datas = json_decode($this->post('data'), True);
            
            $data = $this->model->assign_agent($datas);
            $this->response($data);
        } catch (Exception $e) {
            echo $e->getData();
            return FALSE;
        }
    }

    public function fetchClient_post($id = null)
    {
        try {
            $id = json_decode($this->post('data'), true);
            $data = $this->model->fetchclient($id);
            $this->response($data);
        } catch (Exception $e) {
            
            return False;
        }
    }

    public function thread_post()
    {
        log_message("info", $this->post('data'));
        try {
            $data = json_decode($this->post('data'), true);
            
            $data = $this->model->thread($data);
            $this->response($data);
        } catch (Exception $e) {
            return False;
        }
    }

    public function threadEntry_post()
    {
        try {
            $thread = json_decode($this->post('data'), true);
            $data = $this->model->add_thread($thread);
            $this->response($data);
        } catch (Exception $e) {
            return False;
        }
    }

    public function filter_post()
    {
        try {
            
            $data = json_decode($this->post('data'), true);
            $data = $this->model->applyfilter($data);
            $this->response($data);
        } catch (Exception $e) {
            
            return FALSE;
        }
    }

    public function self_post()
    {
        try {
            $stat = json_decode($this->post('data'), true);
            $data = $this->model->self($stat);
            $this->response($data);
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function resolve_post(){
        try{
            $data= json_decode($this->post('data'),true);
            $data= $this->model->resolve($data);
            $this->response($data);
            
        } catch(Exception $e){
            return false;
        }
    }
    
    public function transferAgent_post()
    {
        try {
            $data= json_decode($this->post('data'), True);
            
            $data = $this->model->change_agent($data);
            $this->response($data);
        } catch (Exception $e) {
            echo $e->getData();
            return FALSE;
        }
    }
    
}
?>