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
			  {"<>":"button","type":"button","onclick":function(){return deleteDepartment();},"class":"btn btn-danger","html":"Delete"},

			{"<>":"button","type":"button","class":"btn btn-danger","html":"Block"},

			{"<>":"div","class":"table-responsive","style":"overflow-x: inherit;","html":[
			
					{"<>":"br"},
			    {"<>":"table","class":"table","id":"table","html":[
			        {"<>":"thead","html":[
			            {"<>":"tr","html":[
			            	  {"<>":"th","html":"S.No."},
			                {"<>":"th","html":"Id"},
			                {"<>":"th","html":"Department"},
			                {"<>":"th","html":"Status"},
			               /* {"<>":"th","html":"Role"},
			                
			                {"<>":"th","html":"Id"}*/
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
            {'<>':'td','html':'${id}'},
            {'<>':'td','html':'${name}'},
            {'<>':'td','html':'${status}'},
           /* {'<>':'td','html':'${}'},
           
            {'<>':'td','html':'${id}'},*/
          
        ]};
		$('#department_data').json2html(result.department,transform1);
	},
	
	});
});
function deleteDepartment(){
	 var checked = [];
	    $(":checkbox").map(function() {
	        this.checked ? checked.push(this.id) : '';
	    });
	    alert("checked: " + checked);
	    $.ajax({
	      url:base_url+"department/delete", 
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