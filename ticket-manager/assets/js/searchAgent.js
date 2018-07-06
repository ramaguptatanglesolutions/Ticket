$("#search_agent").click(function(){
console.log("clicked",base_url);
$("#div1").empty();
$.ajax({
  url:base_url+"agents/search", 
  type:"POST",
  dataType:"json",
	success: function(result){
		console.log("inside success");
		console.log(result);
/*===============================Search Agent ============================================*/
		var transform ={"<>":"div","class":"col-md-9","html":[
		{"<>":"div","class":"table-responsive","style":"overflow-x: inherit;","html":[
		{"<>":"button","onclick":function(e){$("#add_agent").trigger("click");},"class":"btn btn-primary","value":"New Agent","html":"New Agent"},
		  {"<>":"span","html":"&nbsp"},  
		
		{"<>":"button","onclick":function(){return deleteAgent();},"type":"button","class":"btn btn-danger","id":"delete", "html":"Delete"},
		  {"<>":"span","html":"&nbsp"},
			  {"<>":"button","onclick":function(){return blockAgent();},"type":"button", "class":"btn btn-danger","id":"block","html":"Block"},
				{"<>":"br"},
		    {"<>":"table","class":"table","id":"table","html":[
		        {"<>":"thead","html":[
		            {"<>":"tr","html":[
		            	{"<>":"th","html":"Select"},
		            	  {"<>":"th","html":"S.No."},
		                {"<>":"th","html":"Name"},
		                {"<>":"th","html":"Department"},
		                {"<>":"th","html":"Role"},
		                {"<>":"th","html":"Status"},
		                {"<>":"th","html":"Id"}
		              ]}
		          ]},
		          {"<>":"tbody","id":"department_data","html":""}
		      ]}
			  ]}
		  ]}; 

		$('#div1').json2html({},transform);

		var transform1 = {'<>':'tr','html':[
			  {'<>':'td','html':[
	            	{"<>":"input", "type":"checkbox","onchange":function(){changeButton();},"id":"${agent_id}","name":"check_agent${agent_id}"} ]},
	            	{"<>":"td","html":function(result,index){return (' '+(index+1));}},
	            	{'<>':'td','class':"text-style",'html':'${first_name}&nbsp;${last_name}'},
	            	{'<>':'td','html':'${department}'},
	            	{'<>':'td','html':'${role}'},
	            	{'<>':'td','html':'${status}'},
	            	{'<>':'td','html':'${id}'},
          
        ]};
 	
		changeButton();
		$('#department_data').json2html(result.agents,transform1);

/*===============================================Filter Form===========================================*/
		var transformFilter={"<>":"div","class":"row","id":"filterDiv","html":[
		    
		    	{"<>":"div","class":"col-xs-3","id":"div2","html":[
		    	{"<>":"form","method":"post","id":"agentFilter","html":[
		    	    {"<>":"h3","style":"margin-top:0px","html":"Filters"},
		    	    {"<>":"hr","style":"margin-top:0px","html":""},
		    	    {"<>":"div","class":"form-group","html":[
		    	        {"<>":"label","class":"control-label","for":"id","html":"Agent Id"},
		    	        {"<>":"input","type":"text","class":"form-control","id":"id","name":"id","placeholder":"Agent Id","html":""}
		    	      ]},
		    	    {"<>":"div","class":"form-group","html":[
		    	        {"<>":"label","class":"control-label","for":"firstName","html":"First Name"},
		    	        {"<>":"input","type":"text","class":"form-control","id":"firstName","name":"firstName","placeholder":"First Name","html":""}
		    	      ]},
		    	    {"<>":"div","class":"form-group","html":[
		    	        {"<>":"label","class":"control-label","for":"lastName","html":"Last Name"},
		    	        {"<>":"input","type":"text","class":"form-control","id":"lastName","name":"lastName","placeholder":"Last Name","html":""}
		    	      ]},
		    	
		    	  {"<>":"div","class":"form-group","html":[
		    	        {"<>":"label","class":"control-label","for":"department","html":"Department"},
		    	        [
		    	        	{"<>":"select","class":"form-control","name":"department","disabled":"disabled","html":[
		    	          {"<>":"option","html":"All"},
		    	          {"<>":"option","html":"Technical Department"},
		    	          {"<>":"option","html":"Sales Department"},
		    	          {"<>":"option","html":"Marketing Department"}
		    	          ]}
		    	        ]
		    	      ]},
		    	      {"<>":"div","class":"form-group","html":[
		    	          {"<>":"label","class":"control-label","for":"type","html":"Agent Type"},
		    	          [
		    	        	  {"<>":"select","class":"form-control","name":"type","html":[
		    	            {"<>":"option","html":"All"},
		    	            {"<>":"option","value":"1","html":"Admin"},
		    	            {"<>":"option","value":"2","html":" Departmental Head "},
			                  {"<>":"option","value":"3","html":"Agent"}
		    	            ]}
		    	          ]
		    	        ]},
		    	        {"<>":"div","class":"form-group","html":[
		    	            {"<>":"label","class":"control-label","for":"status","html":"Status"},
		    	            [
		    	            	{"<>":"select","class":"form-control","name":"status", "disabled":"disabled", "html":[
		    	              {"<>":"option","html":"All"},
		    	              {"<>":"option", "value":"0","html":"Active"},
		    	              {"<>":"option","value":"1","html":"Blocked"}
		    	              ]}
		    	            ]
		    	          ]},
		    	          {"<>":"div","class":"form-group","html":[
		    	              {"<>":"label","class":"control-label","for":"rating","html":"Rating"},
		    	              [
		    	            	  {"<>":"select","class":"form-control","name":"rating","disabled":"disabled","html":[
		    	                {"<>":"option","html":"All Ratings"},
		    	                {"<>":"option","html":"1 star"},
		    	                {"<>":"option","html":"2 star"},
		    	                {"<>":"option","html":"3 star"},
		    	                {"<>":"option","html":"4 star"},
		    	                {"<>":"option","html":"5 star"}
		    	                ]}
		    	              ]
		    	            ]},
 {"<>":"button","type":"submit","name":"submit","value":"submit","class":"btn btn-primary pull-right","html":"Apply Filter"},
		      ]}
		    	]}
		    	
		    ]};
		
		
		$('#div1').json2html({},transformFilter);
		
/*==============================================Filter Function======================================*/		
	
			
			$("#agentFilter").submit(function(e) {
				e.preventDefault();
			    var url = base_url+"agents/filter"; // the script where you handle the form input.
		alert(url);
			    $.ajax({
			    	 async: false,
			           type: "POST",
			           url: url,
			           dataType:"json",
			           data: $("#agentFilter").serialize(), // serializes the form's elements.
			           success: function(result)
			           {
			        	   console.log(result);
			       		if(result!=''){
			    			$('#department_data').html('');
			    		
			    			var transform1 = {'<>':'tr','html':[
			    				  {'<>':'td','html':[
			    		            	{"<>":"input", "type":"checkbox","id":"${agent_id}","name":"check_agent${agent_id}"},
			    		            	{"<>":"span","html":function(result,index){return (' '+(index+1));}},
			    		            ]},
			    	            {'<>':'td','class':"text-style",'html':'${first_name}&nbsp;${last_name}'},
			    	            {'<>':'td','html':'${department}'},
			    	            {'<>':'td','html':'${role}'},
			    	            {'<>':'td','html':'${status}'},
			    	            {'<>':'td','html':'${id}'},
			    	          
			    	        ]};
			    	 	
			    			$('#department_data').json2html(result,transform1);
			    
			           }else{
			        		$('#department_data').html('');
				    		
			    			var transform1 = {'<>':'tr','html':[
			    				  
			    	            {'<>':'td','colspan ':'5','class':'text-style','html':'No Data found'},
			    	            
			    	          
			    	        ]};
			    	 	
			    			$('#department_data').json2html(result,transform1);
			        	   
			           }
			         }
			    });
			});
			
			
			
		
	},
		
error:function(error){
	console.log(error,"inside error");
		}
	});

function changeButton(){
	var checked = [];
    $(":checkbox").map(function() {
        this.checked ? checked.push(this.id) : '';
    });
	var len = checked.length;
	//alert(len);
	if(len==0){
		$("#delete,#block").prop( "disabled", true );
	}else{
		$("#delete,#block").prop( "disabled", false );	
	}
}



});


/*=============================Delete Agent Function===================================*/

function deleteAgent(){
	 var checked = [];
	    $(":checkbox").map(function() {
	        this.checked ? checked.push(this.id) : '';
	    });
	    alert("checked: " + checked);
	  $.ajax({
	      url:base_url+"Agent_Controller/deleteAgent", 
	      type:"POST",
	      data:{data:checked},
	    	success: function(result){
	    		console.log("inside success");
	    		console.log(result);
	    		if(result){
	    			$("#search_agent").trigger("click");	
	    		    	}
	    		
	    	}, 
	    	error:function(error){
	    	console.log(error,"inside error");
	    	}
	   });
}

/*===============================Block Agent====================================================*/
function blockAgent(){
	 var checked = [];
	    $(":checkbox").map(function() {
	    	this.checked ? checked.push(this.id) : '';
	    });
	    //alert("checked: " + checked);
	    
	    if(checked!='')
	    	{
	    	console.log("inside checked");
	    $.ajax({
	      url:base_url+"agents/block", 
	      type:"POST",
	      data:{data:checked},
	    	success: function(result){
	    		console.log(result);
	    		console.log("inside success");
	if(result){
		$("#search_agent").trigger("click");	
	    	}
	    	}, 
	    	error:function(error){
	    	console.log(error,"inside error");
	    	}
	   });
}
}

/*==========================================================================================================*/

