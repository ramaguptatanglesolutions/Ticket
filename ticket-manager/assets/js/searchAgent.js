$("#search_agent").click(function(){
	
 alert(JSON.stringify($("#agentFilter").serializeArray()));
	
	
	
console.log("clicked",base_url);
$("#div1").empty();
$.ajax({
  url:base_url+"agents/search", 
  type:"POST",
  data:JSON.stringify($("#agentFilter").serializeArray()),
  //dataType:"json",
	success: function(result){
		console.log("inside success");
		console.log(result);

		var transform ={"<>":"div","class":"col-md-9","html":[
		{"<>":"div","class":"table-responsive","style":"overflow-x: inherit;","html":[
		{"<>":"button","onclick":function(e){$("#add_agent").trigger("click");},"class":"btn btn-primary","value":"New Agent","html":"New Agent"},
		  {"<>":"span","html":"&nbsp"},  
		
		{"<>":"button","onclick":function(){return deleteAgent();},"type":"button","class":"btn btn-danger", "html":"Delete"},
		  {"<>":"span","html":"&nbsp"},
			  {"<>":"button","type":"button","class":"btn btn-danger","html":"Block"},
				{"<>":"br"},
		    {"<>":"table","class":"table","id":"table","html":[
		        {"<>":"thead","html":[
		            {"<>":"tr","html":[
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
	            	{"<>":"input", "type":"checkbox","id":"${agent_id}","name":"check_agent${agent_id}"},
	            	{"<>":"span","html":function(result,index){return (' '+(index+1));}},
	            ]},
            {'<>':'td','class':"text-style",'html':'${first_name}&nbsp;${last_name}'},
            {'<>':'td','html':'${department}'},
            {'<>':'td','html':'${role}'},
            {'<>':'td','html':'${status}'},
            {'<>':'td','html':'${id}'},
          
        ]};
 	
		$('#department_data').json2html(result.agents,transform1);


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
		    	        	{"<>":"select","class":"form-control","html":[
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
		    	        	  {"<>":"select","class":"form-control","html":[
		    	            {"<>":"option","html":"All"},
		    	            {"<>":"option","html":"Departmental Heads"},
		    	            {"<>":"option","html":"Agents"}
		    	            ]}
		    	          ]
		    	        ]},
		    	        {"<>":"div","class":"form-group","html":[
		    	            {"<>":"label","class":"control-label","for":"status","html":"Status"},
		    	            [
		    	            	{"<>":"select","class":"form-control","html":[
		    	              {"<>":"option","html":"All"},
		    	              {"<>":"option","html":"Active"},
		    	              {"<>":"option","html":"Blocked"},
		    	              {"<>":"option","html":"Deleted"}
		    	              ]}
		    	            ]
		    	          ]},
		    	          {"<>":"div","class":"form-group","html":[
		    	              {"<>":"label","class":"control-label","for":"rating","html":"Rating"},
		    	              [
		    	            	  {"<>":"select","class":"form-control","html":[
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
		$("#agentFilter").submit(function(e){
			  //trigger serach agent
			  e.preventDefault();
			  alert("clicked");
			  
			  $("#search_agent").trigger("click");
			  
		});
		}, 
		
error:function(error){
	console.log(error,"inside error");
		}
	});


});
function deleteAgent(){
	 var checked = [];
	    $(":checkbox").map(function() {
	        this.checked ? checked.push(this.id) : '';
	    });
	   // alert("checked: " + checked);
	  $.ajax({
	      url:base_url+"Agent_Controller/deleteAgent", 
	      type:"POST",
	      data:{data:checked},
	    	success: function(result){
	    		console.log(result);
	    	}, 
	    	error:function(error){
	    	console.log(error,"inside error");
	    	}
	   });
}