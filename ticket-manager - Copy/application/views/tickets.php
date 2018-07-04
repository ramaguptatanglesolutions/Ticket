<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
$(document).ready(function(){
    $("#cb").on('click',function(){
        if(this.checked){
            $(':checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $(':checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $(':checkbox').on('click',function(){
        if($(':checkbox:checked').length == $(':checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});

</script>




</head>
<body>
	
<div id="sub_top_bar">

<?php if($status==2){?>
	<a ><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Assign Agent</button></a>
	<?php }?>
	
	<?php if($status==1){?>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal_2">Transfer Agent</button>
	<?php }?>
	
</div>
<!-- -----------------------------------------Filter Form------------------------------------------------- -->
<div id="right_bar">
<form method="post" action="<?php echo base_url()?>tickets/filter">
<input type="hidden" name="status" value="<?php echo $demo[0]['status'];?>"/>		
	<h3 style="margin-top:0px">Filters</h3>
	<hr style="margin-top:0px">
	<div class="form-group">
		<label class="control-label" for="id">Ticket Id</label>	
       	<input type="text" class="form-control" id="id" name="id"	placeholder="Ticket Id" />
	</div>
	<div class="form-group">
		<label class="control-label" for="firstName">Client Id</label>			
		<input type="text" class="form-control" id="Client_id" name="client_id"	placeholder="Client_Id" />
	</div>        		
	<div class="form-group">
		<label class="control-label" for="Service">Services</label>			
		<select class ="form-control" id="Service" name='service' disabled>
		<option> All</option>
		
		</select>
	</div>  
  
	<div class="form-group">
    	<label class="control-label" for="department">Department</label>			
    	<select class="form-control" id="department" name="department" disabled>	
    	<option>All</option> 
    <?php	$len=sizeof($demos);
    for($i=0;$i<$len;$i++){?>
    	       <option <?php echo $demos[$i]['id'] ?> > <?php echo $demos[$i]['name']; ?> </option><?php }?>	
        </select>
        
    </div>
   
    <div class="form-group">
    	<label class="control-label" for="priority">Priority</label>			
    	<select class="form-control" id="priority" name="priority" >
    		<option  value="">All</option>
            <option  value="1">High</option>
            <option  value="2">Medium</option>
            <option  value="3">Low</option>
        </select>
    </div>
    <button type="submit" name="submit" value="submit" class="btn btn-primary pull-right">Apply Filter</button>
        </form>
</div>
<!-- --------------------------------------------Filter Form End-------------------------------------------- -->
<!-- -------------------------------------------Table Starts----------------------------------------------- -->
<form method="post" action="<?php echo base_url()?>tickets/<?php if(isset($_POST['delete'])){echo "delete";}
else{echo "resolved/tickets";}?>">

<div id="list_header" style="height:40px;">

	<table class="table table-striped table-bordered table-hover table-responsive" id="ticketTable">
		<thead style="background-color:#EBEBEB">
			<tr>
				<th class="vcenter text-center" width="30"><input type="checkbox" id="cb" /></th>
				<th width="60">S.No.</th>
				<th width="70"> Ref </th>
				<th width="180">Client</th>
				<th width="180">Department</th>
				<th width="243">Subject</th>
				<th width="100">Date</th>
				<th width="100">Status</th>
				<th width="80">Priority</th>
				
			</tr>
		</thead>
		<tbody>
	</table>

	
	
</div>
<div id="list_panel">
	<table class="table table-striped table-bordered table-hover table-responsive" id="listTable">
		<tbody>
			<?php $i=1; foreach($demo as $tickets){?>						
				<tr>
					<td width="30" class="vcenter text-center">
	
					<input type="checkbox" class="check" name="selected_id[]" value="<?php echo $tickets['id'];?>"/>
					<input type="hidden"  name="ticket_status" value="<?php echo $tickets['status'];?>"/></td>
					<td width="60"><?php echo $i++;?></td>
					<td width="70" class="clickable-cell" onclick="gotodetails('<?php echo $tickets['id'];?>');" style="cursor:pointer"> 
					<?php echo $tickets['id'];?> </td>
					<td width="180" class="clickable-cell" onclick="gotodetails('<?php echo $tickets['id'];?>');" style="cursor: pointer"> 
					<?php echo $tickets['client'];?> </td>
    	        
					<td width="180"> <?php echo $tickets['name'];?> </td>
					<td width="243"><?php echo $tickets['subject'] ?></td>
					<td width="100"><?php echo $tickets['open_date'] ?></td> 
					<td width="100"><?php $stat= $tickets['status'];
					if($stat==1){
					    echo "Open";
					}
					elseif($stat==2){
					    echo "Queued";
					}elseif($stat==3){
					    echo "Resolved";
					}
					?></td>
					<td width="80"><?php $var= $tickets['priority']; if($var==1){
					echo "HIGH";}
					elseif($var==2){
					echo "MEDIUM";}
					elseif($var==3){
					echo "LOW";}
					?></td>
				</tr>
			<?php }?>
		</tbody>
		
	</table>
		<button type="submit" class="btn btn-danger" style="float:right" name="delete" value="delete">Delete</button>
		<?php if($status!=2 && $status!=3){?>
		<button type="submit" class="btn btn-info" name="resolved" value="resolved">Resolved</button>
		<?php }?>	
	</div>
	</form>
	<!-- ------------------------------------------Table End---------------------------------------------- -->
	<!-- --------------------------------Assign Agent Modal Box------------------------------------------- -->
	
	<div class="modal fade" id="myModal" >
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Assign Agent</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url()?>tickets/assign/">
          <input type="hidden" name="id" value="<?php echo $tickets['id'];?>" />
          
          	<div class="form-group">
    	<label class="control-label" for="department">Department</label>			
    	<select class="form-control" id="department" name="department">	
    	<option>All</option> 
    	<?php foreach ($demos as $dept){  
    	    ?>
    	       <option value=""> <?php echo $dept['department']; 
    	       ?> </option>
    	    <?php }?>
        </select>  
    </div>
          	<div class="form-group">
    	<label class="control-label" for="agent">Agent</label>			
    	<select class="form-control" name="agent">	
    	<option>-Select-</option> 
        <?php $len= sizeof($dem);
        foreach($dem as $agent) {?>
        <option value="<?php echo $agent['id'];?>" ><?php echo $agent['first_name'];?></option>
        <?php } ?>
   	</select>
    </div> 
     <div class="form-group">
    <label class="control-label" for="ticketRef">Ticket Ref No.</label>
   	 <select class="js-example-basic-multiple" name="ref[]" multiple="multiple" style="width: 100%">
  		<?php foreach($demo as $tickets){?>
  			<option value="<?php  echo $tickets['id'];?>"><?php echo $tickets['id'];?></option>
    	<?php } ?>
	</select>
   	</div>   
       <button type="submit" class="btn btn-info" name="submit" >Assign</button>
        </form>
        </div>
       
        <div class="modal-footer">
        
           	
   	
          
         <button type="button" class="btn btn-default" data-dismiss="modal" style="float:right">Close</button>
       </div>
      </div>
     
        </div>
  </div>
  <!-- ------------------------------Assign Agent Modal Closed-------------------------------------------- -->
 <!-- --------------------------------Transfer Agent Modal Box-------------------------------------------- --> 
  <div class="modal fade" id="myModal_2" >
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Transfer Agent</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url()?>tickets/transfer/">
          <input type="hidden" name="id" value="<?php echo $tickets['id'];?>" />
          
          	<div class="form-group">
    	<label class="control-label" for="department">Department</label>			
    	<select class="form-control" id="department" name="department">	
    	<option>All</option> 
    	<?php foreach ($demos as $dept){  
    	    ?>
    	       <option value=""> <?php echo $dept['department']; 
    	       ?> </option>
    	    <?php }?>
        </select>  
    </div>
          	<div class="form-group">
    	<label class="control-label" for="agent">Agent</label>			
    	<select class="form-control" name="agent">	
    	<option>-Select-</option> 
        <?php $len= sizeof($dem);
        foreach($dem as $agent) {?>
        <option value="<?php echo $agent['id'];?>" ><?php echo $agent['first_name'];?></option>
        <?php } ?>
   	</select>
    </div> 
     <div class="form-group">
    <label class="control-label" for="ticketRef">Ticket Ref No.</label>
   	 <select class="js-example-basic-multiple" name="ref[]" multiple="multiple" style="width: 100%" >
  		<?php foreach($demo as $tickets){?>
  			<option value="<?php  echo $tickets['id'];?>"><?php echo $tickets['id'];?></option>
    	<?php } ?>
	</select>
   	</div>   
       <button type="submit" class="btn btn-info" name="submit" >Transfer</button>
        </form>
        </div>
       
        <div class="modal-footer">
        
           	
   	
          
         <button type="button" class="btn btn-default" data-dismiss="modal" style="float:right">Close</button>
       </div>
      </div>
     
        </div>
  </div>
  <!-- ------------------------------------Transfer Agent Modal Closed------------------------------------ -->
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
$('#myModal,#myModal_2').on('show.bs.modal', function (e) {
	console.log("rrrrrrrrrrrr",$('input[name="selected_id[]"]'));
	var ids = [];
	$('input[name="selected_id[]"]:checked').each(function() {
	   ids.push(this.value); 
	});
 	console.log(ids);
 	$('.js-example-basic-multiple').select2().val(ids).trigger('change');
 	
});
});

</script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	console.log("222222222");
    $('.js-example-basic-multiple').select2();
});
function gotodetails(id) {
	window.location.href = "<?php echo base_url()."tickets/view/";?>"+id; 
}



</script>
