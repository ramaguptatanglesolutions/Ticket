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
<h3><?php $role = $this->session->userdata('role');?></h3>
<ul class="nav side-menu">
<li><a><i class="fa fa-file-text"></i> Tickets <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<?php if($role!=3) {?>
<li><a href="<?php echo base_url();?>tickets/queued">Queued</a></li>
<li><a href="<?php echo base_url();?>tickets/self">Self Assigned</a></li>
<?php }?>
<li><a href="<?php echo base_url();?>tickets/opened">Open</a></li>
<li><a href="<?php echo base_url();?>tickets/resolved">Resolved</a></li>
<li><a href="<?php echo base_url();?>tickets/new">Create New Ticket</a></li>
</ul></li>
<?php if($role!=3){?>
<li><a><i class="fa fa-user-secret"></i> Agents <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="<?php echo base_url();?>agents/new">Add New Agent</a></li>
<li><a href="<?php echo base_url();?>agents/search">Search Agents</a></li>
</ul></li>
<?php }?>
<?php if($role!=3 && $role!=2){?>
<li><a><i class="fa fa-university"></i> Departments <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="<?php echo base_url();?>departments/new">Create New Department</a></li>
<li><a href="<?php echo base_url();?>departments/search">Search	Departments</a></li>
</ul></li>
<?php }?>
</ul>
</div>
</div>
 <!-- page content -->
 <div class="right_col" role="main">
         <button>jhjkuj</button>
        </div>
</div>
 
     
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
      