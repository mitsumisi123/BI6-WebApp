<?php
    session_start();
    error_reporting();


    require 'database/connect.php';
    require 'function/general.php' ;
    require 'function/user.php' ;

    if(logged_in() == true)
    {
        $session_user_id = $_SESSION['user_id'];
        $user_data = user_data($session_user_id,'user_id','username','password','email');
        //echo $user_data['username'];
        

        if (isset($_POST['getMember']) && $_POST['getMember'] == 'view')
        {
            $table_selected = "image".$user_data['user_id'];
            $select_image="select * from $table_selected ";
            
            $var=mysqli_query($GLOBALS['con'],$select_image);
            $array_image = array();
            while($row=mysqli_fetch_array($var))
            {
             $image_path=$row["p_title"];
             array_push($array_image,$image_path);
            }
    
            
            $member = array('username' => $user_data['username']
                           ,'password' => $user_data['password']
                           ,'email' => $user_data['email']
                           ,"success" => "true"
                           ,"array_image" => $array_image
                           
                           );
                            
           
           echo json_encode($member);
           
            
         
           die;
        }
    }
        
    
    
    

?>