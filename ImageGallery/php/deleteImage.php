<?php
    
    require 'C:\xampp\htdocs\ImageGallery\php\init.php';
    if (isset($_POST['getMember']) )
    {

        $title = $_POST['getMember'];
        $table = 'image'.((string)$_SESSION['user_id']);
        //Insert the image name and image content in image_table
        $insert_image= "DELETE FROM $table WHERE p_title = '$title' limit 1";
        
        if (mysqli_query($GLOBALS['con'],$insert_image)) {
            echo "DELETED";
        } else {
            echo "Error creating table: " . $con->error;
        }

    }
        
    
?>