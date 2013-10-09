<?php
session_start();

    
    $username=$_POST['username'];
    $password=$_POST['password'];
    $ses=  session_id();
    
    $connection=mysqli_connect('localhost', 'Ivaylo','sony10','webmessages');
if(!$connection){
    echo"You don't have connection to MySql";
    exit;
}
    //Проверяваме дали потребителят е логнат 
    $query = mysqli_query($connection,"SELECT * FROM `users` WHERE session='$ses'");
    $red = mysqli_num_rows($query);
    
    
    if ($red != NULL) {
                 echo "The user is logged as:<br/>";
                 $my_name = mysql_result($query, "0", "user_name");
                 echo "<b>".$my_name."</b>";
    }
    else {
        
        //Потребителят не е логнат, тогава го логваме с името и паролата от формата 
        $query2 = mysqli_query($connection,"SELECT * FROM `users` WHERE user_name='$username'");
        $r = mysqli_num_rows($query2);
    }
    
    
         
         if ($r != NULL) {
             //Има такъв потребител, сега проверяваме и паролата
        $query3 = mysqli_query($connection,"SELECT * FROM `users` WHERE user_name='$username' AND user_password='$password'");
        $r2 = mysqli_num_rows($query3);
         
   
        
    
    
    
                if ($r2 != NULL) {
                    //Всичко е наред, създаваме сесия 
                      $query4 = mysqli_query("UPDATE `users` SET session='$ses' WHERE user_name='$username' AND user_password='$password'");
    
                           echo header("Location:messages.php");
                }

                       else {
    
    
                                     echo"Wrong password for user <b>".$username."</b>";
                        }
         }
         ?>
