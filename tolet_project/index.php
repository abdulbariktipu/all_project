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
      <a class="navbar-brand" href="#"><img src="img/logo.png" /> </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
        <li><a href="register.php"></span>Add Tolet</a></li>
        <li><a href="subdivision.php">Subdivision</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <a class="btn btn-info btn-lg" href="register.php"><span class="glyphicon glyphicon-log-out"></span>Register</a>
        <a class="btn btn-info btn-lg" href="login.php"><span class="glyphicon glyphicon-home"></span>Login</a>
      </ul>
  </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<!--------------//Paging Data show end ----------->
    <h1>Chose your Tolet</h1>


    <div tabindex="-1" class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
    		<button class="close" type="button" data-dismiss="modal">X</button>
    		<h3 class="modal-title">Heading</h3>
    	</div>
    	<div class="modal-body">
    		
    	</div>
    	<div class="modal-footer">
    		<button class="btn btn-default" data-dismiss="modal">Close</button>
    	</div>
       </div>
      </div>
    </div>

<!---------------Data List View End-------------------------->
     
     <div class='container-fluid body-width  blog-border'>   
       
            <div class='col-xs-12 col-small-6 col-md-8 blog' style='margin-bottom: 20px;'>
          <?php     
          error_reporting(0);     
          
          require "dbconnect.php";
        
            //pageing
            $page=$_GET["page"];
            if($page=="" || $page=="1")
            {
                $page1=0;
            }
                else
                {
                    $page1=($page*4)-4; //algorithom
                }
                 
            $res=mysql_query("select * from tolet_table ORDER by id DESC limit $page1,4");
            while($row=mysql_fetch_array($res))
            {
               echo"<tr>
                        <td>";?><div id="text_hover" class="col-xs-12 col-small-6 col-md-6" style="text-decoration: none;"><a title="<?php echo $row["username"];?>" href="#">                        
                        <img class="thumbnail img-responsive" style=" height: 250px; width: 300px;" src="<?php echo $row["path"];?>"/>
                        Name: <?php echo $row["username"];?><br/>
                        
                        Insert Time: <?php                        
                        $originalDate = $row["created"];
                        $newDate = date("d M Y H:i:s", strtotime($originalDate));
                        echo $newDate;
                        ?><br /></a>
                        
                        <a target="_blank" href='details.php?epr=details&id=<?php echo $row['id'];?>'>Click to Detail</a><br />
                                                
                        <br /></div>
                        <?php echo "</td>
   
                  </tr>";
            } 
                   
        ?>
        
        
            <center>
    <div style="margin-left: 180px; margin-bottom: 50px;" class="footer-bg-img">
        <?php
            require "dbconnect.php";
            
              //this is for counting number of page
                $sql=mysql_query("select * from tolet_table");
                $cou=mysql_num_rows($sql);
                
                $a=$cou/4;
                $a=ceil($a);
                echo "<br>"; echo "<br>";
                    for($b=1;$b<=$a;$b++)
                    {
                        ?>                     
                        <nav aria-label="Page navigation" style="display: inline; ">
                          <ul class="pagination">
                        
                            <li><a href="index.php?page=<?php echo $b; ?>"><?php echo $b." ";?></a></li>
                        
                          </ul>
                        </nav>

                        <?php
                            }
                                        
                        ?>
    
    </div>
 </center>
     
            </div>
  
           <div class="col-xs-12 col-sm-6 col-md-4">                        
                <p class="archive" style="text-align: center;">Archive</p>
                
                <ul class="right-nav"><br />
                    <li class="active"><a href="#">2017<img style="padding-left: 120px;" src="img/arrow-up.png" /></a></li>
                    <hr />
                  <ul class="right-nav2" style="border-bottom: 1px solid silver; ">
                    <li><a href="#">December</a></li>
                    <li><a href="#">November</a></li>
                    <li><a href="#">October</a></li>
                    <li><a href="#">Septempter</a></li>
                    <li><a href="#">August</a></li>
                    <li><a href="#">July</a></li>
                    <li><a href="#">June</a></li>
                    <li><a href="#">May</a></li>
                    <li><a href="#">April</a></li>
                    <li><a href="#">March</a></li>
                    <li><a href="#">February</a></li>
                    <li><a href="#">January</a></li><br />
                    
                  </ul><br />
                     <li id="first-2023"><a href="#">2016<img style="padding-left: 120px;" src="img/arrow-down.png" /></a></li>
                  <hr />
                   <li id="first-2023"><a href="#">2015<img style="padding-left: 120px;" src="img/arrow-down.png" /></a></li>
                   <br />
                  </ul>
           </div>                    
    </div>


    
   <?php include'page/footer.php'?>  

