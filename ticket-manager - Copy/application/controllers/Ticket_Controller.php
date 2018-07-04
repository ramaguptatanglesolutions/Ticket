<?php
defined('BASEPATH') or exit('No direct script access allowed');

require (APPPATH . 'libraries\Session_Controller.php');

//
class Ticket_Controller extends Session_Controller
{

    // This method is used
    public function create($param = "")
    {
        $this->load->library('form_validation');
        if (count($this->input->post()) < 1) {
            $res = $this->callService('Department_Service', 'search', NULL, Rest_Client::GET);
            $res = json_decode($res, TRUE);
            
            $this->load->view('frame', array(
                'title' => 'Tickets / Create New Ticket',
                'page' => 'ticket',
                'demos' => $res['department']
            ));
        }
        
        if (count($this->input->post()) > 0) { // this veriable is used for
            
            $this->form_validation->set_rules('client_id', 'Client Id', 'required');
            $this->form_validation->set_rules('subject', 'Subject', 'required');
            $this->form_validation->set_rules('service', 'Service', 'required');
            $this->form_validation->set_rules('department', 'Department', 'required');
            $this->form_validation->set_rules('priority', 'Priority', 'required');
            
            if ($this->form_validation->run() == FALSE) {
                $res = $this->callService('Department_Service', 'search', NULL, Rest_Client::GET);
                $res = json_decode($res, TRUE);
                
                $this->load->view('frame', array(
                    'title' => 'Tickets / Create New Ticket',
                    'page' => 'ticket',
                    'demos' => $res['department']
                ));
            } else {
                
                $postData = $this->input->post();
                
                $tickets = array(
                    'id' => $postData['id'],
                    'client' => $postData['client_id'],
                    'open_date' => date("Y-m-d H:i:s", time()),
                    'close_date' => NULL,
                    'subject' => $postData['subject'],
                    'service' => $postData['service'],
                    'department' => $postData['department'],
                    'priority' => $postData['priority'],
                    'status' => '2'
                
                );
                
                $thread = array(
                    'agent' => null,
                    'type' => 1,
                    'date' => date("Y-m-d H:i:s", time()),
                    'text' => $postData['text'],
                    'status' => '2'
                );
                
                $data = array(
                    'ticket' => $tickets,
                    'thread' => $thread
                );
                
                if ($data['ticket'] != NULL && $data['ticket']['client'] != NULL) {
                    $result = $this->callService("TicketServices", "add", $data, Rest_Client::POST);
                    
                    $result = json_decode($result, True);
                    
                    if ($result['status'] == 'commit') {
                        
                        echo '<script> alert("Ticket Generated Successfully");</script>';
                        $result = $this->callService("TicketServices", "searchQueue", NULL, Rest_Client::POST);
                        $result = json_decode($result, TRUE);
                    }
                } else {
                    echo '<script> alert("Fill up the fields correctly");</script>';
                }
            }
        }
    }

    public function queued()
    {
        $criteria = array(
            'status' => '2',
            'dept' => $this->session->userdata('department_id'),
            'role' => $this->session->userdata('role'),
            'agent_id' => $this->session->userdata('id')
        );
        
        $result = $this->callService("TicketServices", "search", $criteria, Rest_Client::POST);
        $result = json_decode($result, TRUE);
        
        $res = $this->callService('Department_Service', 'search', NULL, Rest_Client::GET);
        $res = json_decode($res, TRUE);
        
        $res1 = $this->callService("Agent_Service", "search", NULL, Rest_Client::POST);
        $res1 = json_decode($res1, true);
        
        $data_final=array(
            "tickect"=>$result,
            "departments"=>$res,
            "agent"=>$res1
        );
        
        print_r(json_encode($data_final));
        //if ($result != NULL && $res['department'] != NULL && $res1 != NULL) {
           /*  $this->load->view('frame', array(
                'title' => 'Tickets / Queued Tickets',
                'page' => 'tickets',
                'demo' => $result,
                'demos' => $res['department'],
                'dem' => $res1,
                'status' => 2
            
            )); */
            
       // } else {
           /*  $this->load->view('frame', array(
                'title' => 'Tickets / Search',
                'page' => 'ticket_open',
                'status' => 3
            
            )); */
       // }
    }

    public function opened()
    {
        $criteria = array(
            'status' => '1',
            'dept' => $this->session->userdata('department_id'),
            'role' => $this->session->userdata('role'),
            'agent_id' => $this->session->userdata('id')
        );
        
        $result = $this->callService("TicketServices", "search", $criteria, Rest_Client::POST);
        $result = json_decode($result, TRUE);
        
        $res = $this->callService('Department_Service', 'search', NULL, Rest_Client::GET);
        $res = json_decode($res, TRUE);
        
        $res1 = $this->callService("Agent_Service", "search", NULL, Rest_Client::POST);
        $res1 = json_decode($res1, true);
        
        if ($result != NULL && $res['department'] != NULL) {
            $this->load->view('frame', array(
                'title' => 'Tickets / dffctest',
                'page' => 'test',
                'demo' => $result,
                'demos' => $res['department'],
                'dem' => $res1,
                'status' => 1
            
            ));
        } else {
            $this->load->view('frame', array(
                'title' => 'Tickets / Search',
                'page' => 'ticket_open',
                'status' => 3
            
            ));
        }
    }

    public function resolved()
    {
        $criteria = array(
            'status' => '3',
            'dept' => $this->session->userdata('department_id'),
            'role' => $this->session->userdata('role')
        );
        $result = $this->callService("TicketServices", "search", $criteria, Rest_Client::POST);
        $result = json_decode($result, TRUE);
        print_r($result);
        die("died");
        $res = $this->callService('Department_Service', 'search', NULL, Rest_Client::GET);
        $res = json_decode($res, TRUE);
        
        if ($result != NULL && $res['department'] != NULL) {
            $this->load->view('frame', array(
                'title' => 'Tickets / Search',
                'page' => 'tickets',
                'demo' => $result,
                'demos' => $res['department'],
                'status' => 3
            ));
        } else {
            $this->load->view('frame', array(
                'title' => 'Tickets / Search',
                'page' => 'ticket_open',
                'status' => 3
            ));
        }
    }

    public function delete($id = 'null')
    
    {
        $id = array();
        $id = $_POST['selected_id'];
        
        $criteria = array(
            'status' => $id
        );
        $result = $this->callService("TicketServices", "delete", $id, Rest_Client::POST);
        $result = json_decode($result, true);
        
        if ($_POST['ticket_status'] == "2") {
            $this->queued();
        } elseif ($_POST['ticket_status'] == "1") {
            $this->opened();
        } elseif ($_POST['ticket_status'] == "3") {
            $this->resolved();
        }
    }

    public function assign()
    {
        if (isset($_POST['submit'])) {
            
            log_message("info", "inside assign()");
            
            $postData = $this->input->post();
            
            $tickets = $postData['ref']; // ['10','11']
            
            $ticket_agent = array();
            for ($i = 0; $i < count($tickets); $i ++) { // 2 times
                $ticket_agent[] = array(
                    'ticket' => $tickets[$i],
                    'agent' => $postData['agent'],
                    'AgentStatus' => 1
                );
            } // [['ticket'=>'10','agent'=>'34543543534'],['ticket'=>'11','agent'=>'34543543534']]
            
            $ticket = array( // ['status'=>1]
                'status' => 1
            );
            $thread = array( // ['agent'=>'34535435','status'=>1]
                'agent' => $postData['agent'],
                'status' => 1
            );
            $datas = array( // [[['ticket'=>'10','agent'=>'34543543534'],['ticket'=>'11','agent'=>'34543543534']],['status'=>1],['agent'=>'34535435','status'=>1],['10','11']]
                'ticket_agent' => $ticket_agent, // agent mapping table
                'ticket' => $ticket, // ticket table me status
                'thread' => $thread, // tread
                'ticket_arr' => $tickets // where_in
            );
            
            if ($datas['ticket'] != NULL && $datas['thread'] != NULL) {
                log_message("debug", "inside TicketServices: assign()");
                
                $result = $this->callService("TicketServices", "assignAgent", $datas, Rest_Client::POST);
                
                log_message("debug", "inside TicketServices: " . $result . " assign()");
                
                if ($result == 'true') {
                    
                    redirect('tickets/opened');
                } else {
                    redirect('tickets/queued');
                }
            }
        }
    }

    public function view($id)
    {
        $data = array(
            'id' => $id
        );
        
        $result = $this->callService("TicketServices", "thread", $data, Rest_Client::POST);
        $result = json_decode($result, true);
        
        $result1 = $this->callService("TicketServices", "fetchClient", $id, Rest_Client::POST);
        $result1 = json_decode($result1, true);
        
        if ($result != NULL) {
            $this->load->view('frame', array(
                'title' => 'Ticket/Details',
                'page' => 'loginUI',
                'demo' => $result,
                'demos' => $result1
            
            ));
        }
    }

    public function updateThread($thread = null)
    {
        $postData = $this->input->post();
        
        $thread = array(
            'text' => $postData['text'],
            'agent' => $postData['agent'],
            'status' => $postData['status'],
            'ticket' => $postData['ticket'],
            'type' => 2,
            'date' => date("Y-m-d H:i:s", time())
        );
        print_r($thread);
        
        $result = $this->callService("TicketServices", "threadEntry", $thread, Rest_Client::POST);
        $result = json_decode($result, true);
        print_r($result);
        if ($result == 1) {
            $data = array(
                'id' => $postData['ticket']
            );
            $result = $this->callService("TicketServices", "thread", $data, Rest_Client::POST);
            $result = json_decode($result, true);
            $id = array(
                'id' => $result[0]['ticket']
            );
            $result1 = $this->callService("TicketServices", "fetchClient", $id, Rest_Client::POST);
            $result1 = json_decode($result1, true);
            
            if ($result != NULL) {
                $this->load->view('frame', array(
                    'title' => 'Ticket/Details',
                    'page' => 'loginUI',
                    'demo' => $result,
                    'demos' => $result1
                
                ));
            }
        }
    }

    public function filter()
    {
        $postData = $this->input->post();
        
        $data2 = array(
            
            'department' => $this->session->userdata('department_id'),
            'role' => $this->session->userdata('role'),
            'agent_id' => $this->session->userdata('id')
        );
        $data = array(
            'ticket.status' => $postData['status']
        );
        
        if ($_POST['id'] != null)
            $data['ticket.id'] = $postData['id'];
        if ($_POST['client_id'] != null)
            $data['ticket.client'] = $postData['client_id'];
        if (($_POST['priority']) != null)
            $data['ticket.priority'] = $postData['priority'];
        
        $result = $this->callService("TicketServices", "filter", $data, Rest_Client::POST);
        $result = json_decode($result, true);
        
        $res = $this->callService('Department_Service', 'search', NULL, Rest_Client::GET);
        $res = json_decode($res, TRUE);
        if ($result != NULL) {
            $this->load->view('frame', array(
                'title' => 'Ticket/Details',
                'page' => 'tickets',
                'demo' => $result,
                'demos' => $res['department'],
                'status' => $postData['status']
            ));
        } else {
            $this->load->view('frame', array(
                'title' => 'Tickets / Search',
                'page' => 'ticket_open',
                'status' => 3
            ));
        }
    }

    public function selfAssigned()
    {
        $criteria = array(
            'status' => '1',
            'dept' => $this->session->userdata('department_id'),
            'role' => $this->session->userdata('role'),
            'agent_id' => $this->session->userdata('id')
        );
        
        $result = $this->callService("TicketServices", "self", $criteria, Rest_Client::POST);
        $result = json_decode($result, true);
        $res = $this->callService('Department_Service', 'search', NULL, Rest_Client::GET);
        $res = json_decode($res, TRUE);
        if ($result != NULL && $res['department'] != NULL) {
            $this->load->view('frame', array(
                'title' => 'Tickets / Search',
                'page' => 'tickets',
                'demo' => $result,
                'demos' => $res['department'],
                'status' => 1
            ));
        } else {
            $this->load->view('frame', array(
                'title' => 'Tickets / Search',
                'page' => 'ticket_open',
                'status' => 3
            ));
        }
    }

    public function resolve()
    {
        $postData = $this->input->post();
        $id = $postData['selected_id'];
        $len = count($id);
        $data = array();
        for ($i = 0; $i < $len; $i ++) {
            $data[] = array(
                'status' => 3,
                'id' => $id[$i]
            );
        }
        $result = $this->callService("TicketServices", "resolve", $data, Rest_Client::POST);
        $result = json_decode($result, true);
        
        if ($result == 1) {
            $this->resolved();
        }
    }

    public function transferAgent()
    {
        $postData = $this->input->post();
        if (isset($_POST['submit'])) {
            
            log_message("info", "inside assign()");
            
            $postData = $this->input->post();
            
            $tickets = $postData['ref']; // ['10','11']
            
            $thread = array();
            
            $tick_agent = array();
            
            $ticket_agent = array();
            
            for ($i = 0; $i < count($tickets); $i ++) { // 2 times
                $ticket_agent[] = array(
                    'ticket' => $tickets[$i],
                    'agent' => $postData['agent'],
                    'AgentStatus' => 1
                );
                // [['ticket'=>'10','agent'=>'34543543534'],['ticket'=>'11','agent'=>'34543543534']]
                
                $thread[] = array( // ['agent'=>'34535435','status'=>1]
                    'agent' => $postData['agent'],
                    'status' => 1,
                    'ticket' => $tickets[$i],
                    'text' => '',
                    'type' => '2',
                    'date' => date("Y-m-d H:i:s", time()),
                    'status' => 1
                );
                
                $tick_agent[] = array(
                    'ticket' => $tickets[$i],
                    'AgentStatus' => 0
                );
            }
            $datas = array( // [[['ticket'=>'10','agent'=>'34543543534'],['ticket'=>'11','agent'=>'34543543534']],['status'=>1],['agent'=>'34535435','status'=>1],['10','11']]
                'ticket_agent' => $ticket_agent, // agent mapping table
                                                 // ticket table me status
                'thread' => $thread, // thread
                'ticket_arr' => $tickets,
                'tick_agent' => $tick_agent // where_in
            );
            print_r($datas);
            // die();
            
            if ($datas != NULL && $datas['thread'] != NULL) {
                log_message("debug", "inside TicketServices: assign()");
                
                $result = $this->callService("TicketServices", "transferAgent", $datas, Rest_Client::POST);
                $result = json_decode($result, true);
                
                if ($result == 1) {
                    redirect('tickets/opened');
                }
            }
        }
    }
}

?>