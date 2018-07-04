$(document).ready(function(){

	
$("#add_agent").click(function(){
console.log("clicked");

$("#div1").empty();
		var transform ={"<>":"form","id":"agentsForm","method":"POST","html":[
		    {"<>":"div","class":"row","html":[
		        {"<>":"div","class":"col-lg-6","html":[
		            {"<>":"h3","class":"page-header","style":"margin-top:20px;","html":"Agent Detail"},
		            {"<>":"div","class":"form-group","html":[
		                {"<>":"label","class":"control-label","for":"id","html":"Agent Id"},
		                {"<>":"input","type":"text","class":"form-control","id":"id","name":"id","placeholder":"Agent Id","required":"required","html":""}
		              ]},
		            {"<>":"div","class":"form-group","html":[
		                {"<>":"label","class":"control-label","for":"department","html":"Department"},
		                [
		                	{"<>":"select","class":"form-control","name":"department","html":[
		                  {"<>":"option","value":"4","html":"Sales Department "},
		                  {"<>":"option","value":"5","html":" Technical Department"}]}
		                ]
		              ]},
		              {"<>":"div","class":"form-group","html":[
			                {"<>":"label","class":"control-label","for":"department","html":"Role"},
			                [
			                	{"<>":"select","class":"form-control", "name":"role","html":[
			                  {"<>":"option","value":"2","html":" Departmental Head "},
			                  {"<>":"option","value":"3","html":"Agent"}]}
			                ]
			              ]},
			              {"<>":"h3","class":"page-header","html":"Personal Detail"},
			              {"<>":"div","class":"form-group","html":[
			                  {"<>":"label","class":"control-label","for":"firstName","html":"First Name"},
			                  {"<>":"input","type":"text","class":"form-control","id":"firstName","name":"firstName","value":"","placeholder":"First Name","required":"","html":""}
			                ]},
			             {"<>":"div","class":"form-group","html":[
				          {"<>":"label","class":"control-label","for":"LastName","html":"Last Name"},
				          {"<>":"input","type":"text","class":"form-control","id":"lastName","name":"lastName","value":"","placeholder":"First Name","required":"","html":""}
				        ]},
				           {"<>":"div","class":"form-group","html":[
				                {"<>":"label","class":"control-label","for":"gender","html":"Gender"},
				                [
				                	{"<>":"select","class":"form-control","name":"gender","html":[
				                  {"<>":"option","html":"Male"},
				                  {"<>":"option","html":"Female"}]}
				                ]
				              ]},
				              {"<>":"div","class":"form-group","html":[
				                  {"<>":"label","class":"control-label","for":"dob","html":"Date of Birth :"},
				                  {"<>":"input","type":"date","class":"form-control","id":"dob","name":"dob","min":"1990-01-01","value":"","placeholder":"Date of Birth","required":"","html":""}
				                ]},
				              {"<>":"div","class":"form-group","html":[
				                  {"<>":"label","class":"control-label","for":"doj","html":"Date of Joining :"},
				                  {"<>":"input","type":"date","class":"form-control","id":"doj","name":"doj","min":"2016-06-01","value":"","placeholder":"Date of Joining","required":"","html":""}
				                ]}
			              
		          ]}
		      ]},

		      {"<>":"div","class":"row","id":"address","html":[
		          {"<>":"div","class":"col-lg-6","html":[
		              {"<>":"h3","class":"page-header","html":"Mailing Address"},
		              {"<>":"div","class":"form-group","html":[
		                  {"<>":"input","type":"text","class":"form-control","id":"mailingAddressLine1","name":"mailingAddressLine1","value":"","placeholder":"Address Line 1","html":""}
		                ]},
		                {"<>":"div","class":"form-group","html":[
		                    {"<>":"input","type":"text","class":"form-control","id":"mailingAddressLine2","name":"mailingAddressLine2","value":"","placeholder":"Address Line 2","html":""}
		                  ]},
		                  {"<>":"div","class":"row","html":[
		                      {"<>":"div","class":"col-lg-6","html":[
		                          {"<>":"div","class":"form-group","html":[
		                              {"<>":"label","class":"control-label","for":"permanentAddressCity","html":"City"},
		                              {"<>":"input","type":"text","class":"form-control","id":"mailingAddressCity","name":"mailingAddressCity","value":"","placeholder":"City","html":""}
		                            ]}
		                        ]},
		                      {"<>":"div","class":"col-lg-6","html":[
		                          {"<>":"div","class":"form-group","html":[
		                              {"<>":"label","class":"control-label","for":"permanentAddressState","html":"State"},
		                              {"<>":"input","type":"text","class":"form-control","id":"mailingAddressState","name":"mailingAddressState","value":"","placeholder":"State","html":""}
		                            ]}
		                        ]}
		                    ]},
		                    {"<>":"div","class":"row","html":[
		                        {"<>":"div","class":"col-lg-6","html":[
		                            {"<>":"div","class":"form-group","html":[
		                                {"<>":"label","class":"control-label","for":"permanentAddressCountry","html":"Country"},
		                                {"<>":"input","type":"text","class":"form-control","id":"mailingAddressCountry","name":"mailingAddressCountry","value":"","placeholder":"Country","html":""}
		                              ]}
		                          ]},
		                        {"<>":"div","class":"col-lg-6","html":[
		                            {"<>":"div","class":"form-group","html":[
		                                {"<>":"label","class":"control-label","for":"mailingAddressZipCode","html":"Zip Code"},
		                                {"<>":"input","type":"text","class":"form-control","id":"permanentAddressZipCode","name":"mailingAddressZipCode","value":"","placeholder":"Zip Code","html":""}
		                              ]}
		                          ]}
		                      ]},
		                     
		                
		            ]},
		          {"<>":"div","class":"col-lg-6","html":[
                      {"<>":"h3","class":"page-header","html":"Permanent Address"},
                      {"<>":"div","class":"form-group","html":[
                          {"<>":"input","type":"text","class":"form-control","id":"permanentAddressLine1","name":"permanentAddressLine1","value":"","placeholder":"Address Line 1","required":"","html":""}
                        ]},
                      {"<>":"div","class":"form-group","html":[
                          {"<>":"input","type":"text","class":"form-control","id":"permanentAddressLine2","name":"permanentAddressLine2","value":"","placeholder":"Address Line 2","required":"","html":""}
                        ]},
                      {"<>":"div","class":"row","html":[
                          {"<>":"div","class":"col-lg-6","html":[
                              {"<>":"div","class":"form-group","html":[
                                  {"<>":"label","class":"control-label","for":"permanentAddressCity","html":"City"},
                                  {"<>":"input","type":"text","class":"form-control","id":"permanentAddressCity","name":"permanentAddressCity","value":"","placeholder":"City","html":""}
                                ]}
                            ]},
                          {"<>":"div","class":"col-lg-6","html":[
                              {"<>":"div","class":"form-group","html":[
                                  {"<>":"label","class":"control-label","for":"permanentAddressState","html":"State"},
                                  {"<>":"input","type":"text","class":"form-control","id":"permanentAddressState","name":"permanentAddressState","value":"","placeholder":"State","html":""}
                                ]}
                            ]}
                        ]},
                      {"<>":"div","class":"row","html":[
                          {"<>":"div","class":"col-lg-6","html":[
                              {"<>":"div","class":"form-group","html":[
                                  {"<>":"label","class":"control-label","for":"permanentAddressCountry","html":"Country"},
                                  {"<>":"input","type":"text","class":"form-control","id":"permanentAddressCountry","name":"permanentAddressCountry","value":"","placeholder":"Country","html":""}
                                ]}
                            ]},
                          {"<>":"div","class":"col-lg-6","html":[
                              {"<>":"div","class":"form-group","html":[
                                  {"<>":"label","class":"control-label","for":"permanentAddressZipCode","html":"Zip Code"},
                                  {"<>":"input","type":"text","class":"form-control","id":"permanentAddressZipCode","name":"permanentAddressZipCode","value":"","placeholder":"Zip Code","html":""}
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
                                        {"<>":"input","type":"text","class":"form-control","id":"countryCode","name":"countryCode","value":"","required":"","html":""}
                                      ]}
                                  ]},
                                {"<>":"div","class":"col-lg-4","html":[
                                    {"<>":"input","type":"text","class":"form-control","id":"areaCode","name":"areaCode","placeholder":"Area Code","value":"","required":"","html":""}
                                  ]},
                                {"<>":"div","class":"col-lg-6","html":[
                                    {"<>":"input","type":"text","class":"form-control","id":"phoneNo","name":"phoneNo","placeholder":"Phone No.","value":"","required":"","html":""}
                                  ]}
                              ]},
                            {"<>":"div","class":"form-group","html":[
                                {"<>":"label","class":"control-label","for":"mobileNo","html":"Mobile"},
                                {"<>":"input","type":"text","class":"form-control","id":"mobileNo","name":"mobileNo","value":"","placeholder":"Mobile No.","required":"","html":""}
                              ]},
                            {"<>":"div","class":"form-group","html":[
                                {"<>":"label","class":"control-label","for":"extension","html":"Extension No."},
                                {"<>":"input","type":"text","class":"form-control","id":"extension","name":"extension","value":"","placeholder":"Extension","required":"","html":""}
                              ]},
                            {"<>":"div","class":"form-group","html":[
                                {"<>":"label","class":"control-label","for":"personalEmailId","html":"Personal Email Id"},
                                {"<>":"input","type":"email","class":"form-control","id":"personalEmailId","name":"personalEmailId","value":"","placeholder":"Personal Email Id","required":"","html":""}
                              ]},
                            {"<>":"div","class":"form-group","html":[
                                {"<>":"label","class":"control-label","for":"officialEmailId","html":"Office Email Id"},
                                {"<>":"input","type":"email","class":"form-control","id":"officialEmailId","name":"officialEmailId","value":"","placeholder":"Official Email Id","required":"","html":""}
                              ]}
                          ]}
                      ]},


  ]},
  {"<>":"div","align":"center","style":"padding:10px;","html":[
      {"<>":"input","type":"submit","name":"submit","value":"Submit","class":"btn btn-primary","html":""}
    ]},
		      
		  ]};

		$('#div1').json2html({},transform); 
		
		

//alert( $("#agentsForm").serialize());
	$("#agentsForm").submit(function(e) {
		e.preventDefault();
		console.log("agentform");

	    var url = base_url+"agents/new"; // the script where you handle the form input.
alert(url);
	    $.ajax({
	           type: "POST",
	           url: url,
	           data: $("#agentsForm").serialize(), // serializes the form's elements.
	           success: function(data)
	           {
	        	   console.log("inside success");
	               alert(data); // show response from the php script.
	           }
	         });	
});
	
	

	
});
});