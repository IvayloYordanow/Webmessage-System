<?php
require 'sessions.php';
?>



<h3>Please type your message<h3>
 <?php
$today = date("Y-m-d g:i:s");
?>
<form method="POST">
Date:<input type="text" name="date" value="<?php echo $today ?>"/><br/>
Title:<input type="text" name="title"><br/>
User:<input type="text" name="user"><br/>
Your message:<textarea name="txt"></textarea><br/>

<input type="submit" value="Add"/></br>


</form>




<?php

$connection=mysqli_connect('localhost', 'Ivaylo','sony10','webmessages');
if(!$connection){
    echo"You don't have connection to MySql";
    exit;
}

mysqli_set_charset($connection,'utf8');

$sql='';
if($_POST){
    $dt=trim($_POST['date']);
    $tt=trim($_POST['title']);
    $us=trim($_POST['user']);
    $msc=trim($_POST['txt']);
    
    $dt=  mysqli_real_escape_string($connection, $dt);
    $sql='INSERT INTO messages (date,title,user_posted,message_content)VALUES ("'.$dt.'","'.$tt.'","'.$us.'","'.$msc.'")';
    
    
}

if (!mysqli_query($connection,$sql)){
    
    echo "Error-data not inserted";
    echo mysqli_error($connection);
}
else {
    
    header("Location:messages.php");
}
?>
        
        
<?php
include "logout.html"
?>
