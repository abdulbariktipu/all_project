<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register User</title>

	<style type="text/css">

		::selection { background-color: #E13300; color: white; }
		::-moz-selection { background-color: #E13300; color: white; }

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
		#error_mess{
			color: red;
		}
		#succ_mess{
			color: green;
		}
	</style>

      <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css"> 
      <script type = 'text/javascript' src = "<?php echo base_url(); ?>js/sample.js"></script> 

</head>
<body>
	<div id="body">
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<div class="container">
		    <div class="row">
		        <div class="col-md-offset-5 col-md-3">
		            <div class="form-login">
			            <h4>Enter your Email and Password to Login</h4>

						<?php 
							$emsg=$this->session->flashdata('emsg');
							if ($emsg) 
							{
								echo '<span id="error_mess">'.$emsg.'<span>';
							}
						?>
			            <form method="post" action="<?php echo site_url('register_controller/loginFunction'); ?>"> 			            
				            <input type="text" name="email" id="email" class="form-control input-sm chat-input" placeholder="Email" /> <span id="email_result"></span></br>
				            <input type="text" name="password" id="password" class="form-control input-sm chat-input" placeholder="password" /> </br>			            
				            <div class="wrapper">
				            <input type="submit" name="submit" value="Login" class="">
					        </div>
				        </form>
				        <p>Not Registered! <a href="<?php echo site_url('register_controller/register'); ?>">Register Heare</a></p>
		            </div>        
		        </div>
		    </div>
		    <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
		     to execute the javascript function. <a href = 'javascript:test()'> Click Here</a></p>
		</div>
	</div> 
</body>
</html>