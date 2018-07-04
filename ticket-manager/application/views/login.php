<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FreelancingGig | Ticket Support </title>

        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <body>

        <section id="login">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="form-wrap">
						<h1>FreelancingGig Ticket Support</h1>
							<form role="form" action="<?php echo base_url();?>user/login" method="post" id="login-form" autocomplete="off">
								<div class="form-group">
									<label for="email" class="sr-only">Email</label>
									<input type="text" name="id" id="email" class="form-control" placeholder="somebody@example.com">
								</div>
								<div class="form-group">
									<label for="key" class="sr-only">Password</label>
									<input type="password" name="password" id="key" class="form-control" placeholder="Password">
								</div>
								<div class="checkbox">
									<span class="character-checkbox" onclick="showPassword()"></span>
									<span class="label">Show password</span>
								</div>
								<input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
							</form>
							<a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
							<hr>
						</div>
					</div>
				</div>
			</div>
		</section>


		<footer id="footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<p>Copyright © - 2018 FreelancingGig</p>
						<p>Powered by <strong><a href="http://www.facebook.com/tavo.qiqe.lucero" target="_blank">TavoQiqe</a></strong></p>
					</div>
				</div>
			</div>
		</footer>
    </body>
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/custom.js"></script>
</html>
