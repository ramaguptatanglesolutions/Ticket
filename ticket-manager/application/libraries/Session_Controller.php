<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    require(APPPATH . 'libraries\REST_Client.php');
    
    class Session_Controller extends Rest_Client 
    {
        public function __construct()
        {
            parent::__construct();
            $this->isLoggedIn();
        }
        
        protected function isLoggedIn()
        {
            if(! $this->session->userdata('id'))
            {
                redirect('user/logout');
            }
        }
    }
    
?>