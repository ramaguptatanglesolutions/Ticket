<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/json2html/1.2.0/json2html.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.json2html/1.2.0/jquery.json2html.min.js"></script>





<div class="container-content">
<button type="button" id="queue" >Click</button>

<div id="content_wrap">

</div>
</div>
<script>
$(document).ready(function(){

$("#queue").click(function(){
console.log("clicked");
$.ajax({
	url:"<?php echo base_url()?>tickets/queued", 
	type:"GET",
	dataType:"json",
	success: function(result){
		console.log("inside success");
		console.log(result);

		var transform = {'<>':'li','html':[
            {'<>':'span','html':'${id} (${name})'}
        ]};
		$('#content_wrap').json2html(result.departments.department,transform);


		
		},
	error:function(error){
	console.log(error,"inside error");
		}
	});
});
	
});
</script>






















