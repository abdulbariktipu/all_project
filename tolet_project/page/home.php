    <?php include "page/head.php"?>
    

<nav class="navbar navbar-default " style="line-height: 120px;">
  <div class="container-fluid body-width">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="img/logo.png" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="page1.php">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="subdivision.php">Subdivision</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><?= $_SESSION['sess_user'];?><a href="index.php">Logout</a></li>
        <li>
        <form style="background-color: red;">
            <input type="button" name="Print" value="Print" onClick="window.print()">
        </form>
        </li>
       <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> -->
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav> 





     <div class="container-fluid body-width" style="padding-bottom: 80px; padding-top: 35px;">   
        <div class="col-xs-12" style="padding: 0px;">
            <div class="col-xs-12 col-small-6 col-md-6" style="text-align: left;">
                <img src="img/house.png" style="overflow: hidden;" />          
            </div>
            
            <div class="col-xs-12 col-small-6 col-md-6" style="text-align: right;">
                <img src="img/kayamura.png" style="overflow: hidden;" /> 
                <h4 class="holder">This is just a place holder</h4>
                <p class="holder-para1"> This website template has been designed by
                    Free Website Templates for you, for free. You can replace all this
                    text with your own text. You can remove any link to our website
                    from this website template, you're free to use this website template
                    without linking back to us. If you're having problems editing this
                    website template, then don't hesitate to ask for help on the
                    <p class="continue"><a href="#">Continue...</a></p>
                </p>            
            </div>
            </div> 
            
            
        <div class="col-xs-12" style="padding: 0px; margin-top: 30px;" >
            <div class="col-xs-12 col-small-6 col-md-6" style="text-align: left;">
                
                <h4 class="holder2">This is just a place holder</h4>
                <p class="holder-para1"> This website template has been designed by
                    Free Website Templates for you, for free.<br /><br />You can replace all this
                    text with your own text. You can remove any link to our website
                    from this website template, you're free to use this website template
                    without linking back to us.<br /><br />If you're having problems editing this
                    website template, then don't hesitate to ask for help on the
                    <p class="continue"><a href="#">Continue...</a></p>            
            </div>
            
            <div class="col-xs-12 col-small-6 col-md-6" style="text-align: right;">
                <img src="img/nature-place-photo.png" style="overflow: hidden;" />             
            </div>
        </div> 
        
        <div class="col-xs-12" style="padding: 0px; margin-top: 30px;">
            <div class="col-xs-12 col-small-6 col-md-6" style="text-align: left;">
                <img src="img/eco-park.png" style="overflow: hidden;" />          
            </div>
            
        <div class="col-xs-12 col-small-6 col-md-6" style="text-align: right;">                 
                <h4 class="holder">This is just a place holder</h4>
                <p class="holder-para1"> This website template has been designed by
                    Free Website Templates for you, for free. You can replace all this
                    text with your own text. You can remove any link to our website
                    from this website template, you're free to use this website template
                    without linking back to us. If you're having problems editing this
                    website template, then don't hesitate to ask for help on the
                    <p class="continue"><a href="#">Continue...</a></p>
                </p>            
            </div>
        </div>     
              
    </div>
    
