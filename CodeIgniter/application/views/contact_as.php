<?php
$id=$this->session->userdata('sid');
if (!$id) 
{
	redirect('Register_Controller/login_view');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<!-- Include the above in your HEAD tag -->

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
   	<link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
   	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<style type="text/css">
  		/*Contact sectiom*/
		.content-header{
		  font-family: 'Oleo Script', cursive;
		  color:#fcc500;
		  font-size: 45px;
		}

		.section-content{
		  text-align: center; 

		}
		#contact{
		    
		  font-family: 'Teko', sans-serif;
		  padding-top: 60px;
		  width: 100%;
		  width: 100vw;
		  height: 625px;
		  background: #3a6186; /* fallback for old browsers */
		  background: -webkit-linear-gradient(to left, #3a6186 , #89253e); /* Chrome 10-25, Safari 5.1-6 */
		  background: linear-gradient(to left, #3a6186 , #89253e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
		    color : #fff;    
		}
		.contact-section{
		  padding-top: 40px;
		}
		.contact-section .col-md-6{
		  width: 50%;
		}

		.form-line{
		  border-right: 1px solid #B29999;
		}

		.form-group{
		  margin-top: 10px;
		}
		label{
		  font-size: 1.3em;
		  line-height: 1em;
		  font-weight: normal;
		}
		.form-control{
		  font-size: 1.3em;
		  color: #080808;
		}
		textarea.form-control {
		    height: 135px;
		   /* margin-top: px;*/
		}

		.submit{
		  font-size: 1.1em;
		  float: right;
		  width: 150px;
		  background-color: transparent;
		  color: #fff;

		}

		/*Login animation start*/
		.scale-up-ver-center:hover {
			-webkit-animation: scale-up-ver-center 0.4s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
			        animation: scale-up-ver-center 0.4s cubic-bezier(0.390, 0.575, 0.565, 1.000) both; 
		    color: white;
		    position: relative;
		    font-weight: bold;
		    font-size: 20px; 
		    float: left; 
		    border-radius: 5px;
		    border: 1px solid #000000;
		    background: #dc3545;
		    margin: 10px;
		    text-decoration: none;
		}

		@-webkit-keyframes scale-up-ver-center {
		  0% {
		    -webkit-transform: scaleY(0.4);
		            transform: scaleY(0.4);
		  }
		  100% {
		    -webkit-transform: scaleY(1);
		            transform: scaleY(1);
		  }
		}
		@keyframes scale-up-ver-center {
		  0% {
		    -webkit-transform: scaleY(0.4);
		            transform: scaleY(0.4);
		  }
		  100% {
		    -webkit-transform: scaleY(1);
		            transform: scaleY(1);
		  }
		}
		.scale-up-ver-center {
		  background-color: #ddd;
		  border-radius: 5px;
		  color: black;
		  padding: 16px 32px;
		  text-align: center;
		  font-size: 20px;
		  margin: 4px 2px;   
		  position: relative;   
		  float: left; 
		  border-radius: 5px;
		  border: 1px solid #000000; 
		  margin: 10px;
		}
		/*Login animation end*/
  	</style>
</head>
<body>
	<section id="contact">
		<div style="float: left;">
			<h1>Welcome : <?php echo $this->session->userdata('name'); ?></h1>
		</div>
		<div style="float: right;">
			<div style="float: right;">				
				<a class="scale-up-ver-center"  href="<?php echo site_url('Register_Controller/home'); ?>">Home</a>
				<a class="scale-up-ver-center"  href="<?php echo site_url('Register_Controller/logout'); ?>">Logout</a>
			</div>
		</div>
		<div class="section-content">
			<h1 class="section-header">Get in <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Touch with us</span></h1>
			<h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
			<h3>
			<?php 
					$smsg=$this->session->flashdata('smsg');
					$emsg=$this->session->flashdata('emsg');
					if ($emsg) {
						echo '<span id="error_mess" style="color: red;">'.$emsg.'<span>';
					}
					if ($smsg) {
						echo '<span id="succ_mess" style="color: green;">'.$smsg.'<span>';
					}
				?>
			</h3>
		</div>
		<div class="contact-section">
		<div class="container">
			<form method="post" action="<?php echo site_url('Register_Controller/save_contact_info'); ?>">
				
				<div class="col-md-6 form-line">
		  			<div class="form-group">
		  				<label for="exampleInputUsername">Your name</label>
				    	<input type="text" class="form-control" id="InpuEame" name="InpuEame" placeholder=" Enter Name">
			  		</div>
			  		<div class="form-group">
				    	<label for="exampleInputEmail">Email Address</label>
				    	<input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder=" Enter Email id">
				  	</div>	
				  	<div class="form-group">
				    	<label for="telephone">Mobile No.</label>
				    	<input type="tel" class="form-control" id="telephone" name="telephone" placeholder=" Enter 10-digit mobile no.">
		  			</div>
		  		</div>
		  		<div class="col-md-6">
		  			<div class="form-group">
		  				<label for ="description"> Message</label>
		  			 	<textarea  class="form-control" id="MessageDescription" name="MessageDescription" placeholder="Enter Your Message"></textarea>
		  			</div>
		  			<div>
		  				<input type="submit" name="btnSubmit" id="shadow-drop-2-center" class="btn btn-default submit" value="Send Message" />
		  			</div>		  			
				</div>
			</form>
		</div>
	
	<!-- Data Show 1 -->
	<div class="row col-lg-12">
        <h2>Show Data Type 1, using View Only</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th> 
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Get order items from the database 
                $query = $this->db->query('SELECT * FROM contact_info');
                $query_result=$query->result_array();
				foreach ($query_result as $row)
				{
					?>
	                <tr>
	                    <td><?php echo $row["id"]; ?></td>
	                    <td><?php echo $row["name"]; ?></td>
	                    <td><?php echo $row["email"]; ?></td>
	                    <td><?php echo $row["message"]; ?></td>
	                </tr>
                	<?php 
				}
                ?>
            </tbody>
        </table>
    </div>
    <!-- Data Show 1 End -->
    </section>
</body>
</html> 
<!-- Data Show 2 Start -->
<div class="row col-lg-12">
	<h2>Show Data Type 2, using view, controller, model</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Get order items from the database 
				foreach($query->result() as $row)
				{ // = is echo 
					?>
				     <tr>
				     	<td><?=$row->id;?></td>
				     	<td><?=$row->name;?></td>
				     	<td><?=$row->email;?></td>
				     	<td><?=$row->telephone;?></td>
				     	<td><?=$row->message;?></td>
				     </tr>     
				    <?php 
				}
				?> 
            </tbody>
        </table>
</div>
<!-- Data Show 2 End -->