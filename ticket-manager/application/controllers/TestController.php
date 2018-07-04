<?php
	
	class TestController extends CI_Controller 
	{
		public function __construct() 
		{
			parent::__construct();
		}

		function addAgent() 
		{
			$ch = curl_init();
			$result;
			
			try
			{
				$url="http://localhost/freelancinggig/ticketing-service/index.php/AgentService/addAgent";
				
				//initialize CURL				
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch,CURLOPT_FOLLOWLOCATION,TRUE);
				curl_setopt($ch,CURLOPT_MAXREDIRS,2);
				
				//initialize post fields
				$agent=array("id"=>$_GET['id'],"password"=>"1234","role"=>"3","department"=>"5","last_login"=>"0",);
				$personalInfo=array("first_name"=>"Sukant","last_name"=>"Tiwari","gender"=>"1");
				$permanentAddress=array("house_no"=>"95/124","area"=>"sohabatiyabag","city"=>"Allahabad","state"=>"U.P","zip_code"=>"211006");
				$mailingAddress=array("house_no"=>"95/124","area"=>"sohabatiyabag","city"=>"Allahabad","state"=>"U.P","zip_code"=>"211006");
				$contact=array("mobile_no"=>"9648136212");
				
				$data = array('agent' => $agent,'personal_info' => $personalInfo,'permanent_address' => $permanentAddress,'mailing_address'=>$mailingAddress,"contact"=>$contact);

				//sending post request
				curl_setopt($ch, CURLOPT_POSTFIELDS, array("data"=>json_encode($data)));
				$response = curl_exec($ch);
				$responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				
				if(curl_errno($ch))
				{
					$result=array("Curl Error"=>curl_error($ch));
				}
				else
				{
					if($responseCode==200)
					{
						$result=array($response);
					}
					else
					{
						$result=array("Status"=>$responseCode);
					}	
				}
			}
			catch(Exception $e)
			{
				$result=array("Exception"=>$e->getMessage());
			}
			
			curl_close($ch);
			echo ($response);		
		}
		
		function updateAgent() 
		{
			$ch = curl_init();
			$result;
			
			try
			{
				$url="http://localhost/freelancinggig/ticketing-service/index.php/AgentService/updateAgent";
				
				//initialize CURL				
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch,CURLOPT_FOLLOWLOCATION,TRUE);
				curl_setopt($ch,CURLOPT_MAXREDIRS,2);
				
				//initialize post fields
				$agent=array("id"=>$_GET['id']);
				$personalInfo=array("first_name"=>"Sukant","last_name"=>"Tiwari","gender"=>"1");
				$permanentAddress=array("house_no"=>"95/124","area"=>"sohabatiyabag","city"=>"Allahabad","state"=>"U.P","zip_code"=>"211006");
				$mailingAddress=array("house_no"=>"95/124","area"=>"sohabatiyabag","city"=>"Allahabad","state"=>"U.P","zip_code"=>"211006");
				$contact=array("mobile_no"=>"9648136212");
				
				$data = array('agent' => $agent,'personal_info' => $personalInfo,'permanent_address' => $permanentAddress,'mailing_address'=>$mailingAddress,"contact"=>$contact);

				//sending post request
				curl_setopt($ch, CURLOPT_POSTFIELDS, array("data"=>json_encode($data)));
				$response = curl_exec($ch);
				$responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				
				if(curl_errno($ch))
				{
					$result=array("Curl Error"=>curl_error($ch));
				}
				else
				{
					if($responseCode==200)
					{
						$result=array($response);
					}
					else
					{
						$result=array("Status"=>$responseCode);
					}	
				}
			}
			catch(Exception $e)
			{
				$result=array("Exception"=>$e->getMessage());
			}
			
			curl_close($ch);
			echo ($response);		
		}
		
		function getAgent() 
		{
			$ch = curl_init();
			$result;
			
			try
			{
				$url="http://localhost/freelancinggig/ticketing-service/index.php/AgentService/getAgent";
				
				//initialize CURL				
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch,CURLOPT_FOLLOWLOCATION,TRUE);
				curl_setopt($ch,CURLOPT_MAXREDIRS,2);
				
				//initialize post fields
				$agent=array("id"=>"id01");

				//sending post request
				curl_setopt($ch, CURLOPT_POSTFIELDS, array("data"=>json_encode($agent)));
				$response = curl_exec($ch);
				$responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				
				if(curl_errno($ch))
				{
					$result=array("Curl Error"=>curl_error($ch));
				}
				else
				{
					if($responseCode==200)
					{
						$result=array($response);
					}
					else
					{
						$result=array("Status"=>$responseCode);
					}	
				}
			}
			catch(Exception $e)
			{
				$result=array("Exception"=>$e->getMessage());
			}
			
			curl_close($ch);
			echo ($response);		
		}
	}
	
?>