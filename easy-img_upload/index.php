<?php
 $db = mysqli_connect("localhost","root","","photos");//iatin1_SWEDISH_CI
    $msg = "";
    //if upload button is pressed
    if(isset($_POST['upload'])){
        
        
        //connect to the database
       
        $target = "images/".basename($_FILES['image']['name']);
        //Get all the submitted data from the form
        $image = $_FILES['image']['name'];
        $text = $_POST['text'];
        $sql = "INSERT INTO images (image,text) VALUES ('$image','$text')";
        mysqli_query($db, $sql); //stores the submitted data into the database table: images
        
        //Now let's move the uploaded image into the forlder: images'
        if (move_uploaded_file($_FILES['image']['tmp_name'],$target)){
            $msg = "Image uploaded successfully";
        }else{
            $msg = "There was a problem uploadeing image";
        }
    }
    
?>



<!DOCTYPE html>
<html>
<head>
    <title>Easy Image Upload</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="content">




    <form method="post" action="index.php" enctype="multipart/form-data">
        <input type="hidden" name="size" value="100000" />
        <div>
            <input type="file" name="image"/>
        </div>
        <div>
            <textarea name="text" cols="40" rows="4" placeholder="Some text"></textarea>
        </div>
        <div>
            <input type="submit" name="upload" value="Upload Image"/>
        </div>
    </form>
</div>
<?php

    $db = mysqli_connect("localhost","root","","photos");
    $sql = "SELECT * FROM images";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result)){
        echo "<div id='img_div'>";
            echo "<img src='images/".$row['image']."'>";
            echo "<p >".$row['text']."</p>";
        echo "</div";    
    }

?>
</body>
</html>