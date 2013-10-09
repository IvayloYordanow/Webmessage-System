<?php
require 'sessions.php';
?>


<a href="new_message.php">Create a new message</a>

<br><br>

<html>
    <title>Messages</title>
    
    <body>
        <table border="2">
            <caption> Messages from all users</caption>
            <tr>
              <th>Date</th> <th>User</th> <th>Title</th> <th>Content</th>  
            </tr>


<?php
$connection=mysqli_connect('localhost', 'Ivaylo','sony10','webmessages');
if(!$connection){
    echo"You don't have connection to MySql";
    exit;
}
    

$q= mysqli_query($connection,'SELECT date,user_posted,title, message_content FROM messages ORDER BY date DESC');

while ($row= mysqli_fetch_array($q)){
    
   
    echo '<tr>
                
            <td>'.$row["date"].'</td>
            <td>'.$row["user_posted"].'</td>
            <td>'.$row["title"].'</td>  
            <td>'.$row["message_content"].'</td>
            
                
          </tr>';
             
            
            }
?>       
          
        </table>
        
          
    </body>
    
</html><br>


<?php
include "logout.html"
?>
