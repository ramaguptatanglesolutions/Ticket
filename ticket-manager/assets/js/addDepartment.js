$("#add_department").click(function(){
console.log("clicked",base_url);
$("#div1").empty();
$.ajax({
	url:base_url+"tickets/queued", 
	type:"POST",
	 dataType:"json", 
	success: function(result){
		console.log("inside success");
		console.log(result);
		var len= result.agent.length;
		console.log(len);
		
var transform= {"<>":"form","id":"departmentForm","method":"post","html":[
    {"<>":"div","class":"row","html":[
        {"<>":"div","class":"col-lg-6","html":[
            {"<>":"h3","class":"page-header","style":"margin-top:20px;","html":"Department Detail"},
            {"<>":"div","class":"form-group","html":[
                {"<>":"label","class":"control-label","for":"id","html":"Department Name"},
                {"<>":"font","color":"red","html":[
                    {"<>":"span","html":"*"}
                  ]},
                {"<>":"input","type":"text","class":"form-control","name":"department","placeholder":"department name","required":"required","html":""},
                {"<>":"font","color":"red","id":"department","html":" "}
              ]}
          ]}
      ]},
    {"<>":"div","align":"left","style":"padding:10px;","html":[
        {"<>":"input","type":"submit", "onclick":function(){return addDepartment();},"name":"submit","class":"btn btn-primary","html":""}
      ]}
  ]};


$('#div1').json2html({},transform);
	},
	error: function(error){
		console.log(error,"inside error");
			},
			
});			
			function addDepartment(){
				
					$("#departmentForm").submit(function(e) {
						e.preventDefault();
					    var url = base_url+"departments/new"; // the script where you handle the form input.
				//alert(url);
					    $.ajax({
					    	 async: false,
					           type: "POST",
					           url: url,
					           dataType:"json", 
					           data: $("#departmentForm").serialize(), // serializes the form's elements.
					           success: function(data)
					           {
					        	  
					        	   console.log(data.status);
					        	   if(data.status=="failed"){
					        		   $("#department").html("").html(data.response.department);
					        	   }else if(data.status=="success"){
					        		    swal("Saved!", "Department added successfully.", "success");
					        		    $("#search_department").trigger("click");
					        	   }
					        	   
					        	   
					               console.log(data); // show response from the php script.
					           }
					         });	
				});
					
					
				}

});