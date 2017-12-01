<?php
    
    require 'C:\xampp\htdocs\ImageGallery\php\init.php';
        $imagename=$_FILES["myimage"]["name"]; 
        
        //Get the content of the image and then add slashes to it 
        $imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
        $table = 'image'.((string)$_SESSION['user_id']);
        //Insert the image name and image content in image_table
        $insert_image="INSERT INTO $table(p_img,p_title) VALUES('$imagetmp','$imagename')";
        
        mysqli_query($GLOBALS['con'],$insert_image);

    
    
?>