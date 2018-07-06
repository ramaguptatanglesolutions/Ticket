$("#new_ticket").click(function(){
console.log("clicked",base_url);
$("#div1").empty();
$.ajax({
	
	url:base_url+"departments/search",
	type:"GET",
	dataType:"json",
	success: function(result){
		console.log(result.department);
	var department_transform={"<>":"option","value":"${id}","html":"${name}"};
	var transform={"<>":"form","id":"addTicketform","method":"post","action":"","html":[
	    {"<>":"div","class":"row","html":[
	        {"<>":"div","class":"col-sm-6","html":[
	            {"<>":"div","class":"form-group","html":[
	                {"<>":"h3","class":"page-header","style":"margin-top: 20px;","html":"Ticket Detail"},
	                {"<>":"label","class":"control-label","for":"name","html":"Client Id:"},
	                {"<>":"input","type":"text","name":"client_id","placeholder":"Client Id","class":"form-control","html":""},
	                {"<>":"font","html":" "}
	              ]},
	            {"<>":"div","class":"form-group","html":[
	                {"<>":"label","class":"control-label","for":"Service","html":"Service:"},
	                {"<>":"input","type":"text","name":"service","placeholder":"Service","class":"form-control","html":""},
	                {"<>":"font","html":" "}
	              ]},
	            {"<>":"div","class":"form-group","html":[
	                {"<>":"input","type":"hidden","name":"id","html":""}
	              ]},
	              {"<>":"div","class":"form-group","html":[
	                  {"<>":"label","class":"control-label","for":"Subject","html":"Subject:"},
	                  {"<>":"input","type":"text","name":"subject","placeholder":"Subject","class":"form-control","html":""},
	                  {"<>":"font","html":""}
	                ]},
	                {"<>":"div","class":"form-group","html":[
	                    {"<>":"label","class":"control-label","for":"department","html":"Department:"},
	                    {"<>":"select","class":"form-control","id":"department","name":"department","html":function(){
	                		return $.json2html(result.department,department_transform); 
	                	}
	                    }
	                  ]},
	                  {"<>":"div","class":"form-group","html":[
	                      {"<>":"label","class":"control-label","for":"priority","html":"Chosse Priority:"},
	                      [
	                    	  {"<>":"select","class":"form-control","name":"priority", "html":[
	                        {"<>":"option","value":"1","html":"HIGH"},
	                        {"<>":"option","value":"2","html":"MEDIUM"},
	                        {"<>":"option","value":"3","html":"LOW"}
	                      ]}
	                    	  ]
	                    ]},
	                    {"<>":"div","class":"form-group","html":[
	                        {"<>":"label","for":"exampleFormControlTextarea2","html":"Details about the issue "},
	                        {"<>":"textarea","class":"form-control rounded-0","id":"exampleFormControlTextarea2","rows":"3","name":"text","html":""},
	                        {"<>":"font","html":""}
	                      ]},
	                      {"<>":"div","align":"center","style":"padding: 10px;","html":[
	                          {"<>":"input","type":"submit","name":"submit","class":"btn btn-primary","html":""}
	                        ]}
	          ]}
	      ]}
	  ]};


$('#div1').json2html({},transform); 


	$("#addTicketform").submit(function(e) {
		e.preventDefault();
		console.log("inside");
	    var url = base_url+"tickets/new"; // the script where you handle the form input.

	    $.ajax({
	    	   async: false,
	           type: "POST",
	           url: url,
	           dataType:"json",
	           data: $("#addTicketform").serialize(), // serializes the form's elements.
	           success: function(data)
	           {
	        	   console.log("inside success");
	        	   console.log(data);
	        	   if(data.status=="failed"){
//	        		   $("#").html("").html(data.response.department);
	        		   alert("error");
	        	   }else if(data.status=="success"){
	        		    swal("Saved!", "Ticket added successfully.", "success");
	        		    $("#queued_ticket").trigger("click");
	        	   }
	        	   
	           }
	         });	
});



	},
});
	
	
});	
	
