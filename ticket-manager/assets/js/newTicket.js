$("#new_ticket").click(function(){
console.log("clicked",base_url);
$("#div1").empty();
$("#new_ticket").addClass('disabled');
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
	                        {"<>":"label","for":"Textarea","html":"Details about the issue "},
	                        {"<>":"textarea","class":"form-control rounded-0","id":"Textarea","maxlength":"30","rows":"3","name":"text","html":""},
	                        {"<>":"font","html":""}
	                      ]},
	                      {"<>":"div","align":"center","style":"padding: 10px;","html":[
	                          {"<>":"input","type":"submit","name":"submit","class":"btn btn-primary","html":""}
	                        ]}
	          ]}
	      ]}
	  ]};


$('#div1').json2html({},transform); 
$("#new_ticket").removeClass('disabled');

		$("#addTicketform").validate({
			rules: {
			      
				client_id: {
			        required: true,
			      },
			      service:{
					required: true,
				},
			      subject:{
			    	  required: true,
			      },
			      text:{
			    	  required:true,
			    	  minlength:true,
			      }
			      
			 },
			 messages: {
			      // about
				 client_id: {
			        required: '<span class="field-error">Please Enter Client Id</span>',
			      },
			      service:{
			    	  required:'<span class="field-error">Please Enter Service</span>'
			      },
			      subject: {
				        required: '<span class="field-error">Please Enter Subject</span>',
				      },
				      text: {
					        required: '<span class="field-error">Please Enter Description</span>',
					      }
			 },
			      
			ignore: "",
		    errorClass: 'has-error',
		    validClass: 'has-success',
		   highlight: function (element, errorClass, validClass) {
		      $(element).closest('.form-group').removeClass('has-success has-feedback').addClass('has-error has-feedback');
		      $(element).closest('.form-group').find('span.glyphicon').remove();
		    },
		    unhighlight: function (element, errorClass, validClass) {
		      $(element).closest('.form-group').removeClass('has-error has-feedback').addClass('has-success has-feedback');
		      $(element).closest('.form-group').find('span.glyphicon').remove();
		    },
		    //focusInvalid: false,
			submitHandler: function(form) {
				 // alert("sdfsfdsfdsf");
				  $("button[type=submit]").attr("disabled", true).html('<i class="fa fa-spinner fa-pulse fa-fw" aria-hidden="true"></i> Saving...');

					console.log("addTicketform");
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
//					        		   $("#").html("").html(data.response.department);
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
	},
});		
	
});	
	
