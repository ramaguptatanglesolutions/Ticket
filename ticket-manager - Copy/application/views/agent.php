
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<div class="container content">
<fieldset>
	<form action="<?php echo base_url();?>agents/new" id="agentsForm" method="post">
		<div class="row">
			<div class="col-lg-6">
			
			<font color="red"> <?php //echo validation_errors(); ?></font>
				<h3 class="page-header" style="margin-top:20px;">Agent Detail</h3>        		
				<?php if(!$agent['agent']['id']){ ?>
    				<div class="form-group">
            			<label class="control-label" for="id">Agent Id</label>			
            			<input type="text" class="form-control" id="id" name="id"  placeholder="Agent Id" required>
            		</div>	
				<?php  } ?>
				<div class="form-group">
        			<label class="control-label" for="department">Department</label>			
        			<select class="form-control" id="department" name="department" required>
        			<?php 
				if($agent['roless']!=1){?>
				<option value="<?php echo $agent['name']?>"> <?php echo $agent['dept']?></option>
        			<?php }else{?>
        			<?php $len = sizeof( $agent['agent']['department']);
								for($i=0;$i<$len;$i++)
				                {?>
                      <option value="<?php echo $agent['agent']['department'][$i]['id']?>">
                      <?php echo $agent['agent']['department'][$i]['name'];?>
                      </option>
                        <?php }}?>
                    </select>
                   
        		</div>		
				<div class="form-group">
        			<label class="control-label" for="role">Role</label>	
        			<select class="form-control" id="role" name="role" required>
        			  <?php if($agent['roless']==1){?>		
                     
                      <option value="2">Departmentmental Head</option>
                      <option value="3">Agent</option>
                      <?php }
                      else{?>
                      <option >Agent</option>
                      <?php }?>
                    </select>
        		</div>
        		
        		<h3 class="page-header">Personal Detail</h3>        		
				<div class="form-group">
        			<label class="control-label" for="firstName">First Name</label>			
        			<input type="text" class="form-control" id="firstName" name="firstName"	value="<?php echo $agent['personal_info']['first_name'];?>" placeholder="First Name" required>
        		</div>        		
				<div class="form-group">
        			<label class="control-label" for="lastName">Last Name</label>			
        			<input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $agent['personal_info']['last_name'];?>" placeholder="Last Name" required>
        		</div>        		
				<div class="form-group">
        			<label class="control-label" for="gender">Gender</label>			
        			<select class="form-control" id="gender" name="gender" required>
                      <option <?php if($agent['personal_info']['gender']) echo 'selected';?>>Male</option>
                      <option <?php if($agent['personal_info']['gender']) echo 'selected';?>>Female</option>
                    </select>
        		</div>        		
				<div class="form-group">
        			<label class="control-label" for="dob">Date of Birth :</label>			
        			<input type="date" class="form-control" id="dob" name="dob" min="1990-01-01" value="<?php echo $agent['personal_info']['date_of_birth'];?>" placeholder="Date of Birth" required>
        		</div>        		
				<div class="form-group">
        			<label class="control-label" for="doj">Date of Joining :</label>			
        			<input type="date" class="form-control" id="doj" name="doj" min="2016-06-01" value="<?php echo $agent['personal_info']['date_of_joining'];?>" placeholder="Date of Joining" required>
        		</div>
			</div>			
		</div>
		<div class="row" id="address">
			<div class="col-lg-6">
				<h3 class="page-header">Mailing Address</h3>				
				<div class="form-group">
        			<input type="text" class="form-control" id="mailingAddressLine1" name="mailingAddressLine1" value="<?php echo $agent['mailing_address']['address_line_1'];?>" placeholder="Address Line 1">
        		</div>
        		<div class="form-group">
        			<input type="text" class="form-control" id="mailingAddressLine2" name="mailingAddressLine2" value="<?php echo $agent['mailing_address']['address_line_2'];?>" placeholder="Address Line 2">
        		</div>
        		<div class="row">
            		<div class="col-lg-6">
            			<div class="form-group">
                			<label class="control-label" for="mailingAddressCity">City</label>			
                			<input type="text" class="form-control" id="mailingAddressCity"	name="mailingAddressCity" value="<?php echo $agent['mailing_address']['city'];?>" placeholder="City">
                		</div>
            		</div>
            		<div class="col-lg-6">
            			<div class="form-group">
                			<label class="control-label" for="mailingAddressState">State</label>			
                			<input type="text" class="form-control" id="mailingAddressState" name="mailingAddressState" value="<?php echo $agent['mailing_address']['state'];?>" placeholder="State">
                		</div>
            		</div>
        		</div>
        		<div class="row">
            		<div class="col-lg-6">
            			<div class="form-group">
                			<label class="control-label" for="mailingAddressCountry">Country</label>			
                			<input type="text" class="form-control" id="mailingAddressCountry"	name="mailingAddressCountry" value="<?php echo $agent['mailing_address']['country'];?>" placeholder="Country">
                		</div>
            		</div>
            		<div class="col-lg-6">
            			<div class="form-group">
                			<label class="control-label" for="mailingAddressZipCode">Zip Code</label>			
                			<input type="text" class="form-control" id="mailingAddressZipCode"	name="mailingAddressZipCode" value="<?php echo $agent['mailing_address']['zip_code'];?>" placeholder="Zip Code">
                		</div>
            		</div>
        		</div>
			</div>
			<div class="col-lg-6">
				<h3 class="page-header">Permanent Address</h3>				
				<div class="form-group">
        			<input type="text" class="form-control" id="permanentAddressLine1" name="permanentAddressLine1" value="<?php echo $agent['permanent_address']['address_line_1'];?>" placeholder="Address Line 1" required>
        		</div>
        		<div class="form-group">
        			<input type="text" class="form-control" id="permanentAddressLine2" name="permanentAddressLine2" value="<?php echo $agent['permanent_address']['address_line_2'];?>" placeholder="Address Line 2" required>
        		</div>
        		<div class="row">
            		<div class="col-lg-6">
            			<div class="form-group">
                			<label class="control-label" for="permanentAddressCity">City</label>			
                			<input type="text" class="form-control" id="permanentAddressCity" name="permanentAddressCity" value="<?php echo $agent['permanent_address']['city'];?>" placeholder="City">
                		</div>
            		</div>
            		<div class="col-lg-6">
            			<div class="form-group">
                			<label class="control-label" for="permanentAddressState">State</label>			
                			<input type="text" class="form-control" id="permanentAddressState" name="permanentAddressState" value="<?php echo $agent['permanent_address']['state'];?>" placeholder="State">
                		</div>
            		</div>
        		</div>
        		<div class="row">
            		<div class="col-lg-6">
            			<div class="form-group">
                			<label class="control-label" for="permanentAddressCountry">Country</label>			
                			<input type="text" class="form-control" id="permanentAddressCountry" name="permanentAddressCountry" value="<?php echo $agent['permanent_address']['country'];?>" placeholder="Country">
                		</div>
            		</div>
            		<div class="col-lg-6">
            			<div class="form-group">
                			<label class="control-label" for="permanentAddressZipCode">Zip Code</label>			
                			<input type="text" class="form-control" id="permanentAddressZipCode" name="permanentAddressZipCode" value="<?php echo $agent['permanent_address']['zip_code'];?>" placeholder="Zip Code">
                		</div>
            		</div>
        		</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<h3 class="page-header">Contact Detail</h3>
    			<label class="control-label">Phone</label>			
    			<div class="row">
            		<div class="col-lg-2">
            			<div class="form-group">
                			<input type="text" class="form-control" id="countryCode" name="countryCode" value="<?php echo $agent['contact']['country_code'];?>" required>
                		</div>
            		</div>
            		<div class="col-lg-4">            			
                		<input type="text" class="form-control" id="areaCode" name="areaCode" placeholder="Area Code" value="<?php echo $agent['contact']['area_code'];?>" required>
            		</div>
            		<div class="col-lg-6">            			
                		<input type="text" class="form-control" id="phoneNo" name="phoneNo" placeholder="Phone No." value="<?php echo $agent['contact']['telephone_no'];?>" required>
            		</div>
    			</div>        			
				<div class="form-group">
        			<label class="control-label" for="mobileNo">Mobile</label>			
        			<input type="text" class="form-control" id="mobileNo" name="mobileNo" value="<?php echo $agent['contact']['mobile_no'];?>" placeholder="Mobile No." required>
        		</div>
        		<div class="form-group">
        			<label class="control-label" for="extension">Extension No.</label>			
        			<input type="text" class="form-control" id="extension" name="extension" value="<?php echo $agent['contact']['extension'];?>"	placeholder="Extension" required>
        		</div>
        		<div class="form-group">
        			<label class="control-label" for="personalEmailId">Personal Email Id</label>			
        			<input type="email" class="form-control" id="personalEmailId" name="personalEmailId" value="<?php echo $agent['contact']['personal_email_id'];?>" placeholder="Personal Email Id" required>
        		</div>
        		<div class="form-group">
        			<label class="control-label" for="officialEmailId">Office Email Id</label>			
        			<input type="email" class="form-control" id="officialEmailId" name="officialEmailId" value="<?php echo $agent['contact']['official_email_id'];?>" placeholder="Official Email Id" required>
        		</div>
        	</div>
        </div>
        <div align="center" style="padding:10px;">
        	<input type="submit" name="submit" value="<?php if(!$agent['agent']['id']) echo "Submit"; else echo "Save"; ?>" class="btn btn-primary">
        </div>
    <script type="text/javascript">
    $.validate({
        form : '#agentsForm',
        modules : 'html5',
        
        onError : function($form) {
          alert('Validation of form '+$form.attr('id')+' failed!');
        },
        onSuccess : function($form) {
          alert('The form '+$form.attr('id')+' is valid!');
          return false; // Will stop the submission of the form
        },
        onValidate : function($form) {
          return {
            element : $('#some-input'),
            message : 'This input has an invalid value for some reason'
          }
        },
        onElementValidate : function(valid, $el, $form, errorMess) {
          console.log('Input ' +$el.attr('name')+ ' is ' + ( valid ? 'VALID':'NOT VALID') );
        }
      });
</script>    
	</form>
</fieldset >
</div>
