<?php
    if(!empty($_FILES)){
        if(is_uploaded_file($_FILES['uploadFile']['tmp_name'])){
            $srcPath = $_FILES['uploadFile']['tmp_name'];
            $trgPath = "images/".$_FILES['uploadFile']['name'];
            if(move_uploaded_file($srcPath,$trgPath)){
                ?>
                <img src="<?php echo $trgPath; ?>" width="300px" height="250px" />
                <?php
            }
        }
    }
?>