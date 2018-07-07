$('#open_ticket').click(function(){
console.log("clicked",base_url);
$("#div1").empty();
$("#open_ticket").addClass('disabled');

$.ajax({
	url:base_url+"tickets/opened", 
	type:"GET",
	 dataType:"json", 
	success: function(result){
		console.log("inside success");
		console.log(result);
/*=========================================Table======================================================*/		
	var transform={"<>":"div","class":"col-md-10","html":[
		{"<>":"button","type":"button","class":"btn btn-info","html":"Transfer Agent"},
		{"<>":"span","html":"&nbsp"},
		{"<>":"button","type":"button","class":"btn btn-info","html":"Resolved"},
		{"<>":"span","html":"&nbsp"},
		{"<>":"button","type":"button","class":"btn btn-danger","html":"Delete"},
		{"<>":"div","class":"table-responsive","style":"overflow-x: inherit;","html":[
			
			{"<>":"br"},
	    {"<>":"table","class":"table table-bordered","id":"table","html":[
	        {"<>":"thead","html":[
	            {"<>":"tr","html":[
	            	{"<>":"th","html":"Select"},
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
  	{"<>":"td","html":function(result,index){return (' '+(index+1));}},


  {'<>':'td','html':'${id}'},
  {'<>':'td','html':'${client}'},
  {'<>':'td','html':'${open_date}'},
  {'<>':'td','html':'${subject}'},
  {'<>':'td','html':'${status}'},
  {'<>':'td','html':'${priority}'},

]};

$('#department_data').json2html(result.ticket,transform1);
/*=====================================================================================================*/
/*==============================Filter Form Transform======================================================*/

var transformFilter={"<>":"div","id":"right_bar","html":[
	{"<>":"form","method":"post","id":"filterForm","html":[
	    {"<>":"input","type":"hidden","name":"status","value":"","html":""},
	    {"<>":"h3","style":"margin-top:0px","html":"Filters"},
	    {"<>":"hr","style":"margin-top:0px","html":""},
	    {"<>":"div","class":"form-group","html":[
	        {"<>":"label","class":"control-label","for":"id","html":"Ticket Id"},
	        {"<>":"input","type":"text","class":"form-control","id":"id","name":"id","placeholder":"Ticket Id","html":""}
	      ]},
	    {"<>":"div","class":"form-group","html":[
	        {"<>":"label","class":"control-label","for":"firstName","html":"Client Id"},
	        {"<>":"input","type":"text","class":"form-control","id":"Client_id","name":"client_id","placeholder":"Client_Id","html":""}
	      ]}
	  ]},
	  {"<>":"div","class":"form-group","html":[
	        {"<>":"label","class":"control-label","for":"Service","html":"Services"},
	        {"<>":"select","class":"form-control","id":"Service","name":"service","disabled":"","html":[
	            {"<>":"option","html":" All"}
	          ]}
	  ]},
	  {"<>":"div","class":"form-group","html":[
	        {"<>":"label","class":"control-label","for":"department","html":"Department"},
	        {"<>":"select","class":"form-control","id":"department","name":"department","disabled":"","html":[
	            {"<>":"option","html":"All"}
	          ]}
	      ]},
	      {"<>":"div","class":"form-group","html":[
	          {"<>":"label","class":"control-label","for":"priority","html":"Priority"},
	    {"<>":"select","class":"form-control","id":"priority","name":"priority","disabled":"disabled","html":[
	            {"<>":"option","value":"","html":"All"},
	            {"<>":"option","value":"1","html":"High"},
	            {"<>":"option","value":"2","html":"Medium"},
	            {"<>":"option","value":"3","html":"Low"}
	          ]}
	        ]},
	        {"<>":"button","type":"submit","name":"submit","value":"submit","class":"btn btn-primary pull-right","html":"Apply Filter"}
	]};
        
$('#div1').json2html({},transformFilter);
$("#open_ticket").removeClass('disabled');

	},
});
});