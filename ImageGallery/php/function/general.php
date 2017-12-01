<?php
    include 'C:\xampp\htdocs\ImageGallery\php\database\connect.php';
    function sanitize($data)
    {
        return mysqli_real_escape_string($GLOBALS['con'],$data);
        
    }
?>