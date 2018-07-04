<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Rest_Client extends CI_Controller 
    {
        const POST=1;
        const GET=2;
        
        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
        }
        
        protected function callService($controller, $function, $data, $type)
        {
            $ch = curl_init();
            
            try
            {
               
                
                //initialize URL
                $url=SERVICE_URL.$controller.'/'.$function;
                
                //initialize CURL
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                if($type==Rest_Client::POST)
                {
                    ////initialize post request
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, array("data"=>json_encode($data,TRUE)));
                }
                curl_setopt($ch,CURLOPT_FOLLOWLOCATION,TRUE);
                curl_setopt($ch,CURLOPT_MAXREDIRS,2);
                
                //sending post request            
                $response = curl_exec($ch);
             
                
                $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                
                if(curl_errno($ch))
                {
                    $result=json_encode(array("Curl_Error"=>curl_error($ch)));
                }
                else
                {
                    if($responseCode==200)
                    {
                        $result=$response;
                    }
                    else
                    {
                        $result=json_encode(array("Status"=>$responseCode,"Response"=>$response));
                    }
                }
            }
            catch(Exception $e)
            {
                $result=json_encode(array("PHP_Error"=>$e->getMessage()));
            }
            
            curl_close($ch);
            
            return $result;
        }
    }
    
?>