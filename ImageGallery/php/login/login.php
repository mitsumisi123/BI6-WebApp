<?php
    require 'C:\xampp\htdocs\ImageGallery\php\init.php';
    $errors ="";
    
    if(empty($_POST === false))
    {
        $username = (isset($_POST['username']) ? $_POST['username'] : null);
        $password = (isset($_POST['password']) ? $_POST['password'] : null);
       
        
    }

    if(empty($username) === true || empty($password)=== true)
    {
        $errors = "you need to fill username and password";
        
    }else if(user_exists($username) == 0){
        $errors = "we cant find your username. Have you registered?";
        
    }else if(user_active($username) == 0){
        $errors = "Havent you actived your account?";
        
    }else{
        $login = login($username,$password);
        if($login == false){
            $errors = 'Wrong username or password';
            
        }else{
            $_SESSION['user_id'] = $login;
        }
    }

    if(logged_in() == false)
    {
        
        if (isset($_POST['getMember']) && $_POST['getMember'] == 'view')
        {
             
            $member = array('errors' => $errors
                            ,"success" => "false"
                           );
                            
           echo json_encode($member);
           
           
           die;
        }
        
    }
    
      
        
    
?>