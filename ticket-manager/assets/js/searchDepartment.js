$("#search_department").click(function(){
console.log("clicked",base_url);
$("#div1").empty();
$.ajax({
	url:base_url+"departments/search", 
	type:"GET",
 dataType:"json",
	success: function(result){
		console.log("inside success");
		console.log(result);
		var transform ={"<>":"div","class":"col-md-9","html":[
			{"<>":"button","onclick":function(e){$("#add_department").trigger("click");},"class":"btn btn-primary","value":"New Department","html":"New Department"},
			  {"<>":"span","html":"&nbsp"},
			{"<>":"button","type":"button","onclick":function(){return deleteDepartment();},"class":"btn btn-danger","id":"delete","html":"Delete"},
			  {"<>":"span","html":"&nbsp"},
			{"<>":"button","type":"button","onclick":function(){return blockDepartment();},"class":"btn btn-danger","id":"block","html":"Block"},

			{"<>":"div","class":"table-responsive","style":"overflow-x: inherit;","html":[
			
					{"<>":"br"},
			    {"<>":"table","class":"table","id":"table","html":[
			        {"<>":"thead","html":[
			            {"<>":"tr","html":[
			            	{"<>":"th","html":"Select"},
			            	  {"<>":"th","html":"S.No."},
			                {"<>":"th","html":"Department"},
			                {"<>":"th","html":"Status"},
			              
			              ]}
			          ]},
			          {"<>":"tbody","id":"department_data","html":""}
			      ]}
				  ]}
			
			  ]}; 
		
		$('#div1').json2html({},transform);

		var transform1 = {'<>':'tr','html':[
			  {'<>':'td','html':[
				  {"<>":"input", "type":"checkbox","id":"${id}","name":"check_department${id}"}
	            ]},
            	{"<>":"td","html":function(result,index){return (' '+(index+1));}},
            {'<>':'td','html':'${name}'},
            {'<>':'td','html':'${status}'},
           
        ]};
		
		$('#department_data').json2html(result.department,transform1);
},
});
});

/*=========================================Delete Department Function===========================================================================*/


function deleteDepartment(){
	 var checked = [];
	    $(":checkbox").map(function() {
	        this.checked ? checked.push(this.id) : '';
	    });
	    //alert("checked: " + checked);

	    if(checked!='')
	    	{
	    	
	    	console.log("inside checked");
	    $.ajax({
	      url:base_url+"department/delete", 
	      type:"POST",
	      data:{data:checked},
	    	success: function(result){
	    		if(result!=''){
	    			$('#department_data').html('');
	    			var newresult=JSON.parse(result);
		    		var transform1 = [{'<>':'tr','html':[
		  			  {'<>':'td','html':[
		  	            	{"<>":"input", "type":"checkbox","id":"${id}","name":"check_department${id}"}
		  	            ]},
		            	{"<>":"td","html":function(result,index){return (' '+(index+1));}},

		              {'<>':'td','html':'${id}'},
		              {'<>':'td','html':'${name}'},
		              {'<>':'td','html':'${status}'},
		            
		          ]}];
		  		$('#department_data').json2html(newresult.department,transform1);
	    		}
	    	}, 
	    	error:function(error){
	    	console.log(error,"inside error");
	    	}
	   });
}
}


/*============================================Block Department Function=============================================================================*/


function blockDepartment(){
	 var checked = [];
	    $(":checkbox").map(function() {
	        this.checked ? checked.push(this.id) : '';
	    });
	    alert("checked: " + checked);
	    
	    if(checked!='')
	    	{
	    	console.log("inside checked");
	    $.ajax({
	      url:base_url+"department/block", 
	      type:"POST",
	      data:{data:checked},
	    	success: function(result){
	    		console.log(result);
	    		console.log("inside success");
	if(result){
		$("#search_department").trigger("click");	
	    	}
	    	}, 
	    	error:function(error){
	    	console.log(error,"inside error");
	    	}
	   });
}
}

/*==========================================================================================================================================*/