// signin-popup

$(document).ready(function() {
    $('a.logout-window').click(function() {
        
        {
            $.ajax({
                type: 'POST',
               url: 'php/logout/logout.php',
               success: function(string) {
    
            },
            error: function (){
                alert("error ");
               
                                         
               }
                   });
        }
       
    });


$(document).ready(function() {
    $('a.login-window').click(function() {
        
        // Getting the variable's value from a link 
        var loginBox = $(this).attr('href');
        
                //Fade in the Popup and add close button
                $(loginBox).fadeIn(300);
                
                //Set the center alignment padding + border
                var popMargTop = ($(loginBox).height() + 24) / 2; 
                var popMargLeft = ($(loginBox).width() + 24) / 2; 
                
                $(loginBox).css({ 
                    'margin-top' : -popMargTop,
                    'margin-left' : -popMargLeft
                });
                
                // Add the mask to body
                $('body').append('<div id="mask"></div>');
                $('#mask').fadeIn(300);
                
                return false;

        
    
    });
});
    
    // When clicking on the button close or the mask layer the popup closed
    $('a.close, #mask').on('click', function() { 
      $('#mask , .login-popup').fadeOut(300 , function() {
        $('#mask').remove();  
    }); 
    return false;
    });
    // click to sign in
    $('input.signin').click( function(){
            $.ajax({
                type: 'POST',
               url: 'php/login/login.php',
               cache: false,
               data: 'getMember=view',
               success: function(dat) {
                var getData = $.parseJSON(dat);
                    if(getData.success === "false")
                    {
                        alert(getData.errors);
                    }
                    else if(getData.success === "true")
                    {
                        $('a.close, #mask').click();
                        $('a.navbar-brand').html(getData.username).show();
                        alert("Hello  " + getData.username);
                        for(var i = 0;i< getData.array_image.length;i++)
                        {
                           
                           var image = '<div style="position: relative"><img   id="closeImage" name ="'+getData.array_image[i]+'" src="img/X.png" /><a href="php/uploads/'+ getData.array_image[i]+'" data-fancybox="images" data-caption="My caption" data-width="2048" data-height="1365"><img   id="screen" src="php/uploads/'+getData.array_image[i]+'" /></a></div>';
                            $('#main').append(image);
                        }
                       
                        $('a.logout-window').fadeIn(300);
                        $('#upImage').fadeIn(300);
                        $('a.login-window').fadeOut(300);
                        $('#welcome').fadeOut(300);
                        $('#Home').fadeIn(300);

                   }
                    else
                    {
                        alert("error");
                    }
            
    
            },
            error: function (){
                alert("error ");
               
                                         
               }
                   }); 
        
        
        });
    //sign up popup
    $('a.signup').click(function() {
        
            $('.login-popup').fadeOut(300)
                    
                ;
             // Getting the variable's value from a link 
             var logupBox = $(this).attr('href');
        
             //Fade in the Popup and add close button
             $(logupBox).fadeIn(300);
                
             //Set the center alignment padding + border
             var popMargTop = ($(logupBox).height() + 24) / 2; 
             var popMargLeft = ($(logupBox).width() + 24) / 2; 
                
            $(logupBox).css({ 
                'margin-top' : -popMargTop,
                'margin-left' : -popMargLeft
             });
                
            // Add the mask to body
            $('body').append('<div id="mask"></div>');
            $('#mask').fadeIn(300);
                return false;
            });
            
            // When clicking on the button close or the mask layer the popup closed
        $('a.close, #mask').on('click', function() { 
            $('#mask , .logup-popup').fadeOut(300 , function() {
            $('#mask').remove();  
            }); 
        return false;
        });

            // click to sign in
        $('input.signup').click( function(){
            $.ajax({
             type: 'POST',
            url: 'php/signup/signup.php',
            success: function(data) {
            alert(data+$('#').val());
                                      
            }
                });
            });
    
        

        $(document).on('click','#closeImage', function() { 
            if(window.confirm("are you sure you want to delete this image?")){
               var x = $(this).attr('name');
               
                $(this).closest("div").remove();
                
                $.ajax({
                    type: 'POST',
                   url: 'php/deleteImage.php',
                   cache: false,
                   data: 'getMember= '+x,
                   success: function(dat) {
                       alert(dat);
                },
                error: function (){
                    alert("error ");
                   
                                             
                   }
                       }); 
            }
            
        return false;
        });

        $("#upImage").click(function(){
            $("#chooseImage").click();
            $('#uploadImage').fadeIn(300);
           
            
                });
            
         

         $("#uploadImage").click(function(){
            $(this).fadeOut(300);
            var file = $('#chooseImage').val().replace(/C:\\fakepath\\/i, '');
            var image = '<div style="position: relative"><img   id="closeImage" name = "'+file+'"src="img/X.png" /><a href="php/uploads/'+ file+'" data-fancybox="images" data-caption="My caption" data-width="2048" data-height="1365"><img   id="screen" src="php/uploads/'+file+'" /></a></div>';
            
            window.setTimeout(function(){
                $('#main').append(image);
              }, 1000);
            
         });

         $("#upImage").click(function(){
            $("#chooseImage").click();
            $('#uploadImage').fadeIn(300);
           
            
        });
        $("#About").click(function(){
            alert("Group5 ICT");
            
        });

        $("#Services").click(function(){
            alert("No service available");
           
        });


        $("#Contact").click(function(){
            alert("mitsumisi123@gmail.com");
           
        });

        $("#Hone").click(function(){
            
            $('input.signin').click();
        });

                
});



