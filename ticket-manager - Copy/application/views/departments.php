<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<div id="sub_top_bar">
<a href="<?php echo base_url()?>departments/new">
	<button type="submit" name="submit" value="New Agent" class="btn btn-primary">New Department</button></a>
	<button type="submit" name="submit" value="Block" class="btn btn-primary">Block</button>
	
	
</div>
<form method="post" action="<?php echo base_url()?>department/delete"> 	

<div id="right_bar">
	<h3 style="margin-top:0px">Filters</h3>
	<hr style="margin-top:0px">
</div>
   
<div id="list_header">
	<table class="table table-bordered table-striped">
    	<thead style="background-color: #f9f9f9">
      		<tr>
        		<th width="30"><input type="checkbox"></th>
        		<th width="80">S.No.</th>
        		<th width="200">Department Name</th>
        		
        		<th width="150">Status</th>
      		</tr>
    	</thead>
</table>
</div>
 	
<div id="list_panel">


	<table class="table table-bordered table-striped table-hover">
    	<tbody>
    	<tr>
    		<?php $i=1; foreach($department as $key=>$departments){?>
                <td width="30"><input type="checkbox" class="check" name="selected_id[]" value="<?php echo $departments['id'];?>"/></td>
                <td width="80"><?php echo $i++; ?></td>
                
                <td width="200"><?php echo $departments['name']; ?></td>
                
                <td width="150"><?php //echo $departments->id; ?></td>
                
      	</tr>
      		<?php } ?>
    	</tbody>
    	
  	</table>
  
  <button type="submit" name="submit" value="Delete" class="btn btn-danger" style="clear:left">Delete</button>
</form>	
  	
</div>

</body>
</html>