<script type="text/javascript">
    $(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>

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

<div id="right_bar">
<form method="post" action="<?php echo base_url()?>agents/filter">
	<h3 style="margin-top:0px">Filters</h3>
	<hr style="margin-top:0px">
	<div class="form-group">
		<label class="control-label" for="id">Agent Id</label>			
       	<input type="text" class="form-control" id="id" name="id"	placeholder="Agent Id">
	</div>
	<div class="form-group">
		<label class="control-label" for="firstName">First Name</label>			
		<input type="text" class="form-control" id="firstName" name="firstName"	placeholder="First Name">
	</div>        		
	<div class="form-group">
		<label class="control-label" for="lastName">Last Name</label>			
		<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
	</div>  
	<div class="form-group">
    	<label class="control-label" for="department" >Department</label>			
    	<select class="form-control" id="department" name="department" disabled>	
			<option>All</option>
            <option >Technical Department</option>
            <option>Sales Department</option>
            <option>Marketing Department</option>
        </select>
    </div>
    <div class="form-group">
    	<label class="control-label" for="type" >Agent Type</label>			
    	<select class="form-control" id="type" name="type" disabled >	
			<option>All</option>
            <option>Departmental Heads</option>
            <option>Agents</option>
        </select>
    </div>
    <div class="form-group">
    	<label class="control-label" for="status">Status</label>			
    	<select class="form-control" id="status" name="status" disabled>
    		<option>All</option>
            <option>Active</option>
            <option>Blocked</option>
            <option>Deleted</option>
        </select>
    </div>
    <div class="form-group">
    	<label class="control-label" for="rating">Rating</label>			
    	<select class="form-control" id="rating" name="rating" disabled>
          <option>All Ratings</option>
          <option>1 star</option>
          <option>2 star</option>
          <option>3 star</option>
          <option>4 star</option>
          <option>5 star</option>
        </select>
    </div>
    <button type="submit" name="submit" value="submit" class="btn btn-primary pull-right">Apply Filter</button>
    </form>
</div>

<div id="sub_top_bar">
	<a href="<?php echo base_url()?>agents/new">
	<button type="submit" name="submit" value="New Agent" class="btn btn-primary">New Agent</button></a>
	<button type="submit" name="submit" value="Block" class="btn btn-primary">Block</button>
	<button type="submit" name="submit" value="Delete" class="btn btn-danger" disabled>Delete</button>
</div>

<div id="list_header" style="height:40px;">
	<table class="table table-bordered table-striped">
    	<thead style="background-color: #f9f9f9">
      		<tr>
        		<th width="30" ><input type="checkbox" id="cb"></th>
        		<th width="80">S.No.</th>
        		<th>Agent Name</th>
        		<th width="200">Department</th>
        		<th width="200">Role</th>
        		<th width="150">Status</th>
        		<th width="150">Rating</th>
      		</tr>
    	</thead>


    	<tbody>
    		<?php $i=1; foreach($agents as $agent){?>
      		<tr  data-href='<?php echo base_url().'agents/search?id='.$agent['id'];?>'>
                <td width="30"><input type="checkbox"/></td>
                <td width="80"><?php echo $i++; ?></td>
                <td class='clickable-cell' style="cursor: pointer"><?php echo $agent['first_name']; ?></td>
                <td width="200"><?php echo $agent['department']; ?></td>
                <td width="200"><?php echo $agent['role']; ?></td>
                <td width="150"><?php echo $agent['status']; ?></td>
                <td width="150"><?php echo $agent['rating']; ?></td>
      		</tr>
      		<?php } ?>
    	</tbody>
  	</table>
</div>