<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Felancinggig Support Desk</title>
</head>

<link href="<?php echo base_url();?>assets/css/bootstrap.min.css"
	rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/style.css"
	rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/metisMenu.min.css"
	rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/css/custom.css"
	rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/sweetalert.css">

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>


<body class="nav-md">
	<div id="left_bar">
		<div id="logo" align="center">
			<img src="<?php echo base_url();?>assets/images/logo.png"
				width="100%" />
		</div>

		<div id="profile" class="clearfix">
			<div class="profile_pic">
				<img src="<?php echo base_url();?>assets/images/profile.jpg"
					class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Welcome</span>
				<h2><?php echo $this->session->userdata('name');?></h2>
			</div>
		</div>
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<h3><?php echo $this->session->userdata('department');?></h3>
				<h3><?php $role = $this->session->userdata('role');
                     ?></h3>
				<ul class="nav side-menu">
					<li><a><i class="fa fa-file-text"></i> Tickets <span
							class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
						<?php if($role!=3) {?>
							<li><a id="queued_ticket">Queued</a></li>
							<li><a id="self_assigned">Self Assigned</a></li>
							<?php }?>
							
							<li><a id="open_ticket">Open</a></li>
							<li><a id="resolved_ticket">Resolved</a></li>
							<li><a id="new_ticket">Create New
									Ticket</a></li>

						</ul></li>
						<?php if($role!=3){?>
					<li><a><i class="fa fa-user-secret"></i> Agents <span
							class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a id="add_agent">Add New Agent</a></li>
							<li><a id="search_agent">Search Agents</a></li>
						</ul></li>
						<?php }?>
						<?php if($role!=3 && $role!=2){?>
					<li><a><i class="fa fa-university"></i> Departments <span
							class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a id="add_department">Create New
									Department</a></li>
							<li><a id="search_department">Search
									Departments</a></li>
						</ul></li>
						<?php }?>
				</ul>
			</div>
		</div>
	</div>
	<div id="top_bar" class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<span class="navbar-text"><?php echo $title;?></span>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown"><?php echo $this->session->userdata('name');?> <span
						class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url();?>user/profile">Profile</a></li>
						<li><a href="<?php echo base_url();?>user/settings">Settings</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="<?php echo base_url();?>user/logout">Logout</a></li>
					</ul></li>
			</ul>
		</div>
	</div>
	<div class="container content">	
	<div id="div1">
		<?php include($page.'.php');?>	
		</div>	
		</div>
    </body>
    
<!-- Json 2 Html Script -->    
<script src="https://cdnjs.cloudflare.com/ajax/libs/json2html/1.2.0/json2html.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.json2html/1.2.0/jquery.json2html.min.js"></script>


<script>
var base_url='<?php echo base_url();?>';
</script> 
<!-- custom js script -->  
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
<!-- ------------------------Scripts for loading View Contents---------------------------->
<!-- Search Agent Script-->
<script src="<?php  echo base_url();?>assets/js/searchAgent.js"></script> 
<!-- Self Assigned Script -->
<!-- Resolved Ticket Script -->
<script src="<?php  echo base_url();?>assets/js/resolvedTicket.js"></script>
<!-- Add Agent -->
<script src="<?php  echo base_url();?>assets/js/addAgent.js"></script>
<!--  Search Department-->
<script src="<?php  echo base_url();?>assets/js/searchDepartment.js"></script>
<!-- Add Ticket -->
<script src="<?php  echo base_url();?>assets/js/newTicket.js"></script>
<!-- Open Ticket -->
<script src="<?php  echo base_url();?>assets/js/openTicket.js"></script>
<!-- queued Ticket -->
<script src="<?php  echo base_url();?>assets/js/queuedTicket.js"></script>
<!-- Add Department -->
<script src="<?php  echo base_url();?>assets/js/addDepartment.js"></script>
<!-- ----------------------------Sweet Alert Script------------------------------------ -->
<script src="<?php  echo base_url();?>assets/js/sweetalert.min.js"></script>

</html>