<!DOCTYPE HTML>
<html>
<head>
<style>
font {
	color: red;
}
</style>
</head>
<body>
	<div class="container content">
		<form action="<?php echo base_url()?>tickets/new" method="post">
<?php // echo validation_errors(); ?>
<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<h3 class="page-header" style="margin-top: 20px;">Ticket Detail</h3>
						<label class="control-label" for="name">Client Id:</label> <input
							type="text" name="client_id" placeholder="Client Id"
							class="form-control"> <font> <?php echo form_error('client_id');?></font>
					</div>
					<div class="form-group">
						<label class="control-label" for="Service">Service:</label> <input
							type="text" name="service" placeholder="Service"
							class="form-control"> <font> <?php  echo form_error('service');?></font>
					</div>
					<div class="form-group">
						<input type="hidden" name="id">
					</div>

					<div class="form-group">
						<label class="control-label" for="Subject">Subject:</label> <input
							type="text" name="subject" placeholder="Subject"
							class="form-control"> <font><?php  echo form_error('subject');?></font>
					</div>

					<div class="form-group">
		if($)
      <?php echo print_r($_SESSION);?>         
        			<label class="control-label" for="department">Department:</label>
						<select class="form-control" id="department" name="department">
        		    <?php
            
                    $len = sizeof($demos);
                    for ($i = 0; $i < $len; $i ++) {
                ?>   
                	       <option value="<?php echo$demos[$i]['id']?>">
                	         <?php  print_r($demos[$i]['name']);?>
                	        </option>
    	   <?php } ?>
                    </select>
                    <?php  echo form_error('department');?>
                    
        		</div>
					<div class="form-group">
						<label class="control-label" for="priority">Chosse Priority:</label>
						<select class="form-control" id="department" name="priority">
							<option value="1">HIGH</option>
							<option value="2">MEDIUM</option>
							<option value="3">LOW</option>
						</select>
					</div>
					<div class="form-group" hidden="hidden">
						<label class="control-label" for="priority">Status:</label> <select
							class="form-control" id="department" name="status">
							<option value="1">Open</option>
							<option value="2">Queued</option>
							<option value="3">Resolved</option>
						</select>

					</div>

					<div class="form-group">
						<label for="exampleFormControlTextarea2">Details about the issue </label>
						<textarea class="form-control rounded-0"
							id="exampleFormControlTextarea2" rows="3" name="text"></textarea>
						<font><?php  echo form_error('text');?></font>

					</div>

					<div align="center" style="padding: 10px;">
						<input type="submit" name="submit" class="btn btn-primary">
					</div>


				</div>
			</div>
		</form>
	</div>
</body>
</html>