$('#resolved_ticket').click(function(){
console.log("clicked",base_url);
$("#div1").empty();
$.ajax({
	url:base_url+"tickets/resolved", 
	type:"GET",
	 dataType:"json", 
	success: function(result){
		console.log("inside success");
		console.log(result);
		
	var transform={"<>":"div","class":"col-md-9","html":[
		{"<>":"button","type":"button","class":"btn btn-danger","html":"Delete"},
		{"<>":"div","class":"table-responsive","style":"overflow-x: inherit;","html":[
			
			{"<>":"br"},
	    {"<>":"table","class":"table","id":"table","html":[
	        {"<>":"thead","html":[
	            {"<>":"tr","html":[
	            	  {"<>":"th","html":"S.No."},
	    
	                {"<>":"th","html":"Ref No."},
	                {"<>":"th","html":"Client"},
	                {"<>":"th","html":"Open Date"},
	                {"<>":"th","html":"Subject"},
	                {"<>":"th","html":"Status"},
	                {"<>":"th","html":"Priority"}
	              ]}
	          ]},
	          {"<>":"tbody","id":"department_data","html":""}
	      ]}
		  ]}
	  ]}; 
$('#div1').json2html({},transform);
	
var transform1 = {'<>':'tr','html':[
	  {'<>':'td','html':[
      	{"<>":"input", "type":"checkbox","value":'${this.index}'}
      ]},

  {'<>':'td','html':'${id}'},
  {'<>':'td','html':'${client}'},
  {'<>':'td','html':'${open_date}'},
  {'<>':'td','html':'${subject}'},
  {'<>':'td','html':'${status}'},
  {'<>':'td','html':'${priority}'},

]};

$('#department_data').json2html(result.ticket,transform1);
	
	
var transformFilter={"<>":"div","class":"row","id":"filterDiv","html":[
    
	{"<>":"div","class":"col-xs-3","id":"div2","html":[
	{"<>":"form","method":"post","action":"<?php echo base_url()?>agents/filter","html":[
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

	},
});
});