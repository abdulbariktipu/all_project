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
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> 
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<style type="text/css">
		body{
		    background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
		}
		.contact-form{
		    background: #fff;
		    margin-top: 5%;
		    margin-bottom: 5%;
		    width: 70%;
		}
		.contact-form .form-control{
		    border-radius:1rem;
		}
		.contact-image{
		    text-align: center;
		}
		.contact-image img{
		    border-radius: 6rem;
		    width: 11%;
		    margin-top: -3%;
		    transform: rotate(29deg);
		}
		.contact-form form{
		    padding: 8%;
		}
		.contact-form form .row{
		    margin-bottom: -7%;
		}
		.contact-form h3{
		    margin-bottom: 5%;
		    margin-top: -10%;
		    text-align: center;
		    color: #0062cc;
		}
		.contact-form .btnContact {
		    width: 50%;
		    border: none;
		    border-radius: 1rem;
		    padding: 1.5%;
		    background: #dc3545;
		    font-weight: 600;
		    color: #fff;
		    cursor: pointer;
		}
		.btnContactSubmit
		{
		    width: 50%;
		    border-radius: 1rem;
		    padding: 1.5%;
		    color: #fff;
		    background-color: #0062cc;
		    border: none;
		    cursor: pointer;
		    font-size: 1.75rem;
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

		/*Send animation start*/
		#shadow-drop-2-center:hover 
		{
		-webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
		animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
		}

		@-webkit-keyframes shadow-drop-2-center 
		{
			0% {
			-webkit-transform: translateZ(0);
			transform: translateZ(0);
			box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
			}
			100% {
			-webkit-transform: translateZ(50px);
			transform: translateZ(50px);
			box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
			}
		}
		@keyframes shadow-drop-2-center 
		{
			0% {
			-webkit-transform: translateZ(0);
			transform: translateZ(0);
			box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
			}
			100% {
			-webkit-transform: translateZ(50px);
			transform: translateZ(50px);
			box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
			}
		}
		/*Send animation end*/

		.custab{
		    border: 1px solid #ccc;
		    padding: 5px;
		    margin: 5% 0;
		    box-shadow: 3px 3px 2px #ccc;
		    transition: 0.5s;
	    }
		.custab:hover{
		    box-shadow: 3px 3px 0px transparent;
		    transition: 0.5s;
	    }
	</style>
</head>
<body>
	<div style="float: left;">
		<h1>Welcome  <?php echo $this->session->userdata('name'); ?></h1>
	</div>
	        
	<div style="float: right;">
		<a class="scale-up-ver-center"  href="<?php echo site_url('register_controller/logout'); ?>">Logout</a>
	</div><br> 	

		<div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form method="post" action="<?php echo site_url('register_controller/savingdata'); ?>"> 
            	<!-- savingdata is save function in controller -->
                <h3>Drop Us a Message</h3>
                <?php 
					$smsg=$this->session->flashdata('smsg');
					$emsg=$this->session->flashdata('emsg');
					if ($emsg) {
						echo '<span id="error_mess">'.$emsg.'<span>';
					}
					if ($smsg) {
						echo '<span id="succ_mess">'.$smsg.'<span>';
					}
				?>

               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="meaning" class="form-control" placeholder="Your meaning *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="gender" class="form-control" placeholder="gender *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="religion" class="form-control" placeholder="religion *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" id="shadow-drop-2-center" class="btnContact" value="Send Message" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 200px;"></textarea>
                        </div>

                    <!-- Model Start Show Data-->
                        <div class="form-group"> 
                            <!-- Button trigger modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
							  Show Data
							</button>

							<!-- Modal -->
							<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
							    <div class="modal-content">
							      	<div class="modal-header">
							        	<h5 class="modal-title" id="exampleModalLongTitle">Details View</h5>
							        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          	<span aria-hidden="true">&times;</span>
							        	</button>
							      	</div>
							      	<div class="modal-body"> 
									    <table class="table table-striped custab"> 
										    <thead> 
										        <tr>
										            <th>ID</th>
										            <th>NAME</th>
										            <th>MEANING</th>
										            <th>GENDER</th>
										            <th>RELIGION</th> 
										        </tr>
										    </thead>
									            <tr>
									            	<?php  
									                foreach($query->result() as $row)  
									                {  
									                    //name has to be same as in the database.  
									                    ?>
									                   	<tr>  
							                                <td><?php echo $row->id; ?></td>  
							                                <td><?php echo $row->name; ?></td>  
							                                <td><?php echo $row->meaning; ?></td>  
							                                <td><?php echo $row->gender; ?></td>  
							                                <td><?php echo $row->religion; ?></td>     
									                    </tr>
									                    <?php 
									                }  
									            	?>

									            </tr>
									    </table> 
									    <p><?php echo $links; // pagination ?></p>
							      	</div>
							      	<div class="modal-footer">
							        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
							      	</div>
							    </div>
							  </div>
							</div>
                        </div>
                      <!-- Model End -->
                    </div>
                </div>
            </form>
		</div>    
</body>
</html>