<?php

require 'C:\xampp\htdocs\ImageGallery\php\function\general.php';
require 'C:\xampp\htdocs\ImageGallery\php\function\user.php';

if(empty($_POST) === false)
{
    $username1 = (isset($_POST['username1']) ? $_POST['username1'] : null);
    $password1 = (isset($_POST['password1']) ? $_POST['password1'] : null);
    $password2 = (isset($_POST['re-password1']) ? $_POST['re-password1'] : null);
    $email1 = (isset($_POST['email1']) ? $_POST['email1'] : null);  
}

if(empty($username1) == true || empty($password1) == true ||  empty($password2) == true || empty($email1) == true)
{
    $errors = "  you need to fill all information    ";
    echo $errors;
}
elseif($password1 != $password2)
{
    $errors = "2 passwords do not match";
    echo $errors;
}
else if(!check_name($username1))
{
    $errors = "this username is exist";
    echo $errors;
}else
{
    $sql2 = "
    select *
    from user 
     ";
    
    $result1 = mysqli_query($GLOBALS['con'],$sql2);
    $num_rows = mysqli_num_rows($result1);
    $user_id1 = $num_rows +1 ;
    $password3 =md5($password1);
    $sql = "INSERT INTO user (username ,password, email)
    VALUES ('$username1','$password3' , '$email1')";

    
    $table = "image".((string)$user_id1);

    $sql1 ="CREATE TABLE $table (
        p_id int(100) NOT NULL AUTO_INCREMENT,
        p_img varchar(1000) NOT NULL,
        p_name varchar(100),
        PRIMARY KEY (p_id)
    )" ;

    mysqli_query($con,$sql);
      

    mysqli_query($con,$sql1);
    

}


    ?>
