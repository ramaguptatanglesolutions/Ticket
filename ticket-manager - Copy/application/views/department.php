<!DOCTYPE HTML>
<html>
<head></head>
<body>
<div class="container content">
<form action="<?php echo base_url();?>departments/new" method="post">

		<div class="row">
			<div class="col-lg-6">
				<h3 class="page-header" style="margin-top:20px;">Department Detail</h3>        		

    				<div class="form-group">
            			<label class="control-label" for="id">Department Name</label>			
            			<input type="text" class="form-control" id="id" name="department"  placeholder="department name">
            			<font color="red"> <?php echo validation_errors(); ?></font>
            		</div>
            </div>
        </div>
         <div align="left" style="padding:10px;">
        	<input type="submit" name="submit" class="btn btn-primary">
        	</div>
        
</form>
</div>
</body>
</html>