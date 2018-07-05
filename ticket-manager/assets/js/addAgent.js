$(document).ready(function(){

	
$("#add_agent").click(function(){
console.log("clicked");
$.ajax({ 
	url:base_url+"departments/search",
	type:"GET",
	 dataType:"json",
		success: function(result){
		console.log(result);
		$("#div1").empty();
		var department_transform={"<>":"option","value":"${id}","html":"${name}"};
		var transform ={"<>":"form","id":"agentsForm","method":"POST","html":[
		    {"<>":"div","class":"row","html":[
		        {"<>":"div","class":"col-lg-6","html":[
		            {"<>":"h3","class":"page-header","style":"margin-top:20px;","html":"Agent Detail"},
		            {"<>":"div","class":"form-group","html":[
		                {"<>":"label","class":"control-label","for":"id","html":"Agent Id"},
		                {"<>":"font","color":"red","html":[
		                    {"<>":"span","html":"*"}
		                  ]},
		                {"<>":"input","type":"email","class":"form-control","id":"Agentid","name":"Agentid","placeholder":"Agent Id","required":"required","html":""},
		                {"<>":"font","color":"red","id":"Agent_id","html":" "}
		              ]},
		            {"<>":"div","class":"form-group","html":[
		                {"<>":"label","class":"control-label","for":"department","html":"Department"},
		                [
		                    {"<>":"font","color":"red","html":[
		                        {"<>":"span","html":"*"}
		                      ]},
		                	{"<>":"select","class":"form-control","name":"department","html":function(){
		                		
		                		return $.json2html(result.department,department_transform); 
		                	}}
		                ]
		              ]},
		              {"<>":"div","class":"form-group","html":[
			                {"<>":"label","class":"control-label","for":"department","html":"Role"},
			                [ {"<>":"font","color":"red","html":[
			                    {"<>":"span","html":"*"}
			                    ]},
			                	{"<>":"select","class":"form-control", "name":"role","html":[
			                		 {"<>":"option","value":"","html":"-Select-"},
			                  {"<>":"option","value":"2","html":" Departmental Head "},
			                  {"<>":"option","value":"3","html":"Agent"}]}
			                ]
			              ]},
			              {"<>":"h3","class":"page-header","html":"Personal Detail"},
			              {"<>":"div","class":"form-group","html":[
			                  {"<>":"label","class":"control-label","for":"firstName","html":"First Name"},
			                  {"<>":"font","color":"red","html":[
			                      {"<>":"span","html":"*"}
			                    ]},
			                  {"<>":"input","type":"text","class":"form-control","id":"firstName","name":"firstName","value":"","placeholder":"First Name","required":"required","html":""},
			                    {"<>":"font","color":"red","id":"first_Name","html":" "}
			                ]},
			             {"<>":"div","class":"form-group","html":[
				          {"<>":"label","class":"control-label","for":"LastName","html":"Last Name"},
				          {"<>":"font","color":"red","html":[
			                    {"<>":"span","html":"*"}
			                  ]},
				          {"<>":"input","type":"text","class":"form-control","id":"lastName","name":"lastName","value":"","placeholder":"Last Name","required":"required","html":""},
				          {"<>":"font","color":"red","id":"last_Name","html":" "}
				        ]},
				           {"<>":"div","class":"form-group","html":[
				                {"<>":"label","class":"control-label","for":"gender","html":"Gender"},
				                {"<>":"font","color":"red","html":[
				                    {"<>":"span","html":"*"}
				                  ]},
				                [
				                	{"<>":"select","class":"form-control","name":"gender","html":[
				                  {"<>":"option","value":"1","html":"Male"},
				                  {"<>":"option","value":"2","html":"Female"}]}
				                ]
				              ]},
				              {"<>":"div","class":"form-group","html":[
				                  {"<>":"label","class":"control-label","for":"dob","html":"Date of Birth"},
				                  {"<>":"font","color":"red","html":[
				                      {"<>":"span","html":"*"}
				                    ]},
				                  {"<>":"input","type":"date","class":"form-control","id":"dob","name":"dob","min":"1990-01-01","value":"","placeholder":"Date of Birth","required":"required","html":""},
						          {"<>":"font","color":"red","id":"d_o_b","html":" "}
				                ]},
				              {"<>":"div","class":"form-group","html":[
				                  {"<>":"label","class":"control-label","for":"doj","html":"Date of Joining"},
				                  {"<>":"font","color":"red","html":[
				                      {"<>":"span","html":"*"}
				                    ]},
				                  {"<>":"input","type":"date","class":"form-control","id":"doj","name":"doj","min":"2016-06-01","value":"","placeholder":"Date of Joining","required":"required","html":""},
				                  {"<>":"font","color":"red","id":"d_o_j","html":" "}
				                ]}
			              
		          ]}
		      ]},

		      {"<>":"div","class":"row","id":"address","html":[
		          {"<>":"div","class":"col-lg-6","html":[
		              {"<>":"h3","class":"page-header","html":"Mailing Address"},
		              {"<>":"div","class":"form-group","html":[
		            	  {"<>":"label","class":"control-label","for":"Mailing Address","html":"Address Line 1"},
		                  {"<>":"font","color":"red","html":[
		                      {"<>":"span","html":"*"}
		                    ]},
		                  {"<>":"input","type":"text","class":"form-control","id":"mailingAddressLine1","name":"mailingAddressLine1","value":"","placeholder":"Address Line 1","html":""},
		                  {"<>":"font","color":"red","id":"mailing_Address_Line1","html":" "}
		                ]},
		                {"<>":"div","class":"form-group","html":[
		                	 {"<>":"label","class":"control-label","for":"Mailing Address","html":"Address Line 2"},
		                    {"<>":"input","type":"text","class":"form-control","id":"mailingAddressLine1","name":"mailingAddressLine2","value":"","placeholder":"Address Line 2","html":""}

		                  ]},
		                  {"<>":"div","class":"row","html":[
		                      {"<>":"div","class":"col-lg-6","html":[
		                          {"<>":"div","class":"form-group","html":[
		                              {"<>":"label","class":"control-label","for":"mailingAddressCity","html":"City"},
		                              {"<>":"font","color":"red","html":[
		    		                      {"<>":"span","html":"*"}
		    		                    ]},
		                              {"<>":"input","type":"text","class":"form-control","id":"mailingAddressCity","name":"mailingAddressCity","value":"","placeholder":"City","html":""},
                                      {"<>":"font","color":"red","id":"mailing_Address_City","html":" "}
		                            ]}
		                        ]},
		                      {"<>":"div","class":"col-lg-6","html":[
		                          {"<>":"div","class":"form-group","html":[
		                              {"<>":"label","class":"control-label","for":"mailingAddressState","html":"State"},
		                              {"<>":"font","color":"red","html":[
		    		                      {"<>":"span","html":"*"}
		    		                    ]},
		                              {"<>":"input","type":"text","class":"form-control","id":"mailingAddressState","name":"mailingAddressState","value":"","placeholder":"State","html":""},
                                      {"<>":"font","color":"red","id":"mailing_Address_State","html":" "}
		                            ]}
		                        ]}
		                    ]},
		                    {"<>":"div","class":"row","html":[
		                        {"<>":"div","class":"col-lg-6","html":[
		                            {"<>":"div","class":"form-group","html":[
		                                {"<>":"label","class":"control-label","for":"mailingAddressCountry","html":"Country"},
		                                {"<>":"font","color":"red","html":[
		      		                      {"<>":"span","html":"*"}
		      		                    ]},
		                                {"<>":"input","type":"text","class":"form-control","id":"mailingAddressCountry","name":"mailingAddressCountry","value":"","placeholder":"Country","html":""},
                                        {"<>":"font","color":"red","id":"mailing_Address_Country","html":" "}
		                              ]}
		                          ]},
		                        {"<>":"div","class":"col-lg-6","html":[
		                            {"<>":"div","class":"form-group","html":[
		                                {"<>":"label","class":"control-label","for":"mailingAddressZipCode","html":"Zip Code"},
		                                {"<>":"font","color":"red","html":[
		      		                      {"<>":"span","html":"*"}
		      		                    ]},
		                                {"<>":"input","type":"text","class":"form-control","id":"mailingAddressZipCode","name":"mailingAddressZipCode","value":"","placeholder":"Zip Code","html":""},
                                        {"<>":"font","color":"red","id":"mailing_Address_ZipCode","html":" "}

                                    ]}
		                          ]}
		                      ]},
		                     
		                
		            ]},
		          {"<>":"div","class":"col-lg-6","html":[
                      {"<>":"h3","class":"page-header","html":"Permanent Address"},
                      {"<>":"div","class":"form-group","html":[
                    	  {"<>":"label","class":"control-label","for":"PermanentAddress","html":"Address Line 1"},
		                  {"<>":"font","color":"red","html":[
		                      {"<>":"span","html":"*"}
		                    ]},
                          {"<>":"input","type":"text","class":"form-control","id":"permanentAddressLine1","name":"permanentAddressLine1","value":"","placeholder":"Address Line 1","required":"","html":""},
                          {"<>":"font","color":"red","id":"permanent_Address_Line1","html":" "}
                        ]},
                      {"<>":"div","class":"form-group","html":[
                    	  {"<>":"label","class":"control-label","for":"Permanent Address","html":"Address Line 2"},
                          {"<>":"input","type":"text","class":"form-control","id":"permanentAddressLine2","name":"permanentAddressLine2","value":"","placeholder":"Address Line 2","required":"","html":""}

                        ]},
                      {"<>":"div","class":"row","html":[
                          {"<>":"div","class":"col-lg-6","html":[
                              {"<>":"div","class":"form-group","html":[
                                  {"<>":"label","class":"control-label","for":"permanentAddressCity","html":"City"},
                                  {"<>":"font","color":"red","html":[
        		                      {"<>":"span","html":"*"}
        		                    ]},
                                  {"<>":"input","type":"text","class":"form-control","id":"permanentAddressCity","name":"permanentAddressCity","value":"","placeholder":"City","html":""},
                                  {"<>":"font","color":"red","id":"permanent_Address_City","html":" "}
                                ]}
                            ]},
                          {"<>":"div","class":"col-lg-6","html":[
                              {"<>":"div","class":"form-group","html":[
                                  {"<>":"label","class":"control-label","for":"permanentAddressState","html":"State"},
                                  {"<>":"font","color":"red","html":[
        		                      {"<>":"span","html":"*"}
        		                    ]},
                                  {"<>":"input","type":"text","class":"form-control","id":"permanentAddressState","name":"permanentAddressState","value":"","placeholder":"State","html":""},
                                  {"<>":"font","color":"red","id":"permanent_Address_State","html":" "}
                                ]}
                            ]}
                        ]},
                      {"<>":"div","class":"row","html":[
                          {"<>":"div","class":"col-lg-6","html":[
                              {"<>":"div","class":"form-group","html":[
                                  {"<>":"label","class":"control-label","for":"permanentAddressCountry","html":"Country"},
                                  {"<>":"font","color":"red","html":[
        		                      {"<>":"span","html":"*"}
        		                    ]},
                                  {"<>":"input","type":"text","class":"form-control","id":"permanentAddressCountry","name":"permanentAddressCountry","value":"","placeholder":"Country","html":""},
                                  {"<>":"font","color":"red","id":"permanent_Address_Country","html":" "}

                              ]}
                            ]},
                          {"<>":"div","class":"col-lg-6","html":[
                              {"<>":"div","class":"form-group","html":[
                                  {"<>":"label","class":"control-label","for":"permanentAddressZipCode","html":"Zip Code"},
                                  {"<>":"font","color":"red","html":[
        		                      {"<>":"span","html":"*"}
        		                    ]},
                                  {"<>":"input","type":"text","class":"form-control","id":"permanentAddressZipCode","name":"permanentAddressZipCode","value":"","placeholder":"Zip Code","html":""},
                                  {"<>":"font","color":"red","id":"permanent_Address_ZipCode","html":" "}

                              ]}
                            ]}
                        ]}
                    ]},
                    {"<>":"div","class":"row","html":[
                        {"<>":"div","class":"col-lg-6","html":[
                            {"<>":"h3","class":"page-header","html":"Contact Detail"},
                            {"<>":"label","class":"control-label","html":"Phone"},
                            
                            {"<>":"div","class":"row","html":[
                                {"<>":"div","class":"col-lg-2","html":[
                                    {"<>":"div","class":"form-group","html":[
                                        {"<>":"input","type":"text","class":"form-control","id":"countryCode","name":"countryCode","placeholder":" ","value":"","html":""},
                                        {"<>":"font","color":"red","id":"country_Code","html":" "}

                                    ]}
                                  ]},
                                {"<>":"div","class":"col-lg-4","html":[
                                    {"<>":"input","type":"text","class":"form-control","id":"areaCode","name":"areaCode","placeholder":"Area Code","value":"","html":""},
                                    {"<>":"font","color":"red","id":"area_Code","html":" "}

                                ]},
                                {"<>":"div","class":"col-lg-6","html":[
                                    {"<>":"input","type":"text","class":"form-control","id":"phoneNo","name":"phoneNo","placeholder":"Phone No.","value":"","html":""},
                                    {"<>":"font","color":"red","id":"phone_No","html":" "}
                                ]}
                              ]},
                            {"<>":"div","class":"form-group","html":[
                                {"<>":"label","class":"control-label","for":"mobileNo","html":"Mobile"},
                                {"<>":"font","color":"red","html":[
      		                      {"<>":"span","html":"*"}
      		                    ]},
                                {"<>":"input","type":"text","class":"form-control","id":"mobileNo","name":"mobileNo","value":"","placeholder":"Mobile No.","required":"","html":""},
                                {"<>":"font","color":"red","id":"mobile_No","html":" "}

                            ]},
                            {"<>":"div","class":"form-group","html":[
                                {"<>":"label","class":"control-label","for":"extension","html":"Extension No."},
                                {"<>":"font","color":"red","html":[
      		                      {"<>":"span","html":"*"}
      		                    ]},
                                {"<>":"input","type":"number","class":"form-control","id":"extension","name":"extension","value":"","placeholder":"Extension","required":"","html":""},
                                {"<>":"font","color":"red","id":"extension_No","html":" "}

                            ]},
                            {"<>":"div","class":"form-group","html":[
                                {"<>":"label","class":"control-label","for":"personalEmailId","html":"Personal Email Id"},
                                {"<>":"font","color":"red","html":[
      		                      {"<>":"span","html":"*"}
      		                    ]},
                                {"<>":"input","type":"email","class":"form-control","id":"personalEmailId","name":"personalEmailId","value":"","placeholder":"Personal Email Id","required":"","html":""},
                                {"<>":"font","color":"red","id":"personal_Email_Id","html":" "}

                            ]},
                            {"<>":"div","class":"form-group","html":[
                                {"<>":"label","class":"control-label","for":"officialEmailId","html":"Office Email Id"},
                                {"<>":"font","color":"red","html":[
      		                      {"<>":"span","html":"*"}
      		                    ]},
                                {"<>":"input","type":"email","class":"form-control","id":"officialEmailId","name":"officialEmailId","value":"","placeholder":"Official Email Id","required":"","html":""},
                                {"<>":"font","color":"red","id":"official_Email_Id","html":" "}

                            ]}
                          ]}
                      ]},


  ]},
  {"<>":"div","align":"center","style":"padding:10px;","html":[
      {"<>":"input","type":"submit","name":"submit","value":"Submit","class":"btn btn-primary","html":""}
    ]},
		      
		  ]};

		$('#div1').json2html({},transform);
		
		$("#agentsForm").submit(function(e) {
			e.preventDefault();
			console.log("agentform");

		    var url = base_url+"agents/new"; // the script where you handle the form input.
	alert(url);
		    $.ajax({
		    	  async: false,
		           type: "POST",
		           url: url,
		         dataType:"json", 
		           data: $("#agentsForm").serialize(), // serializes the form's elements.
		           success: function(data)
		           {
		        	   console.log(data.status);
		        	   if(data.status=="failed"){
		        		   $("#Agent_id").html("").html(data.response.Agentid);
		        		   $("#first_Name").html("").html(data.response.firstName);
		        		   $("#last_Name").html("").html(data.response.lastName);
		        		   $("#d_o_b").html("").html(data.response.dob);
		        		   $("#d_o_j").html("").html(data.response.doj);
		        		   $("#mailing_Address_Line1").html("").html(data.response.mailingAddressLine1);
		        		   $("#mailing_Address_City").html("").html(data.response.mailingAddressCity);
		        		   $("#mailing_Address_State").html("").html(data.response.mailingAddressState);
		        		   $("#mailing_Address_Country").html("").html(data.response.mailingAddressCountry);
		        		   $("#mailing_Address_ZipCode").html("").html(data.response.mailingAddressZipCode);
		        		   $("#permanent_Address_Line1").html("").html(data.response.permanentAddressLine1);
		        		   $("#permanent_Address_City").html("").html(data.response.permanentAddressCity);
		        		   $("#permanent_Address_State").html("").html(data.response.permanentAddressState);
		        		   $("#permanent_Address_Country").html("").html(data.response.permanentAddressCountry);
		        		   $("#permanent_Address_ZipCode").html("").html(data.response.permanentAddressZipCode);
		        		   $("#country_Code").html("").html(data.response.countryCode);
		        		   $("#area_Code").html("").html(data.response.areaCode);
		        		   $("#phone_No").html("").html(data.response.phoneNo);
		        		   $("#mobile_No").html("").html(data.response.mobileNo);

		        		   
		        		   $("#extension_No").html("").html(data.response.extension);
		        		   $("#personal_Email_Id").html("").html(data.response.personalEmailId);
		        		   $("#official_Email_Id").html("").html(data.response.officialEmailId);

		        	   }else if(data.status=="success"){
		        		    swal("Saved!", "Agent added successfully.", "success");
		        		    $("#search_agent").trigger("click");
		        	   }
		               console.log(data); // show response from the php script.
		           }
		         });	
	});
		
		
		
		},
	 
	 
	 
	 });

});
});