<div class="col-md-9">
<div class="table responsve">
<table class="table table-striped">
<thead>
<tr>
<th>S.No.</th>
<th>Ref</th>
<th>Client</th>
<th>Department</th>
<th>Subject</th>
<th>Date</th>
<th>Status</th>
<th>Priority</th>
</tr>
</thead>
<tbody id="department_body">
<tr>



</tr>
</tbody>
</table>
</div>
</div>
<div class="col-md-3">
<form method="post" action="<?php echo base_url()?>tickets/filter">
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