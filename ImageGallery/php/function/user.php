<?php
include 'C:\xampp\htdocs\ImageGallery\php\database\connect.php';
    function user_exists($username)
    {
        $username = sanitize($username);
        
    $sql = "
        select username
        from user 
        where
        username = '$username'";
        
    $result = mysqli_query($GLOBALS['con'],$sql);
    $num_rows = mysqli_num_rows($result);
    
        return $num_rows;

    }


    function user_active($username)
    {
        $username = sanitize($username);
        
    $sql = "
        select username
        from user 
        where
        username = '$username' and active = 1";
        
    $result = mysqli_query($GLOBALS['con'],$sql);
    $num_rows = mysqli_num_rows($result);
    
    return $num_rows;

    }

    function user_id_from_username($username)
    {
        $username = sanitize($username);
        
    $sql = "
        select user_id
        from user 
        where
        username = '$username'";
        
    $result = mysqli_query($GLOBALS['con'],$sql);
    $row=mysqli_fetch_array($result);
    return $row["user_id"];  

    }

    function login($username,$password)
    {
        $user_id = user_id_from_username($username);
        $username = sanitize($username);
        $password = md5($password);
        
        $sql = "
        select user_id
        from user 
        where
        username = '$username' and password = '$password' ";
        
        $result = mysqli_query($GLOBALS['con'],$sql);
        $num_rows = mysqli_num_rows($result);
    
        return ($num_rows == 1)?$user_id : false;

    }
    
    function logged_in()
    {
        return (isset($_SESSION['user_id']))?true:false;
    }

    function user_data($user_id)
    {
        $data =array();
        $user_id = (int)$user_id;

        $fun_num_args = func_num_args();
        $fun_get_args = func_get_args();

        if($fun_num_args >1)
        {
            unset($fun_get_args[0]);
            $fields = implode(',',$fun_get_args);
           $data = mysqli_fetch_array(mysqli_query($GLOBALS['con'],"Select $fields from user where user_id = '$user_id'"));
           return $data;
        }
    }


    function check_name($username)
    {
       
        $username = sanitize($username);
        
        
        $sql = "
        select username
        from user 
        where
        username = '$username'  ";
        
        $result = mysqli_query($GLOBALS['con'],$sql);
        $num_rows = mysqli_num_rows($result);
    
        return ($num_rows == 0)?true : false;

    }
?>