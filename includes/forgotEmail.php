<?php
//require('includes/dbconnect.php');
  $email = $_POST['forgotEmail'];
  $sql = "SELECT * FROM blogUsers WHERE email = '" . $email . "'";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
  $row = mysqli_fetch_assoc($result);
  if(strcmp($row["email"], $email) == 0){
    echo '<div id="errmsg1"><p>A link is sent to '.$email.'.<br /> If it isn\'t in your regular inbox check your "junk mail".</p></div>';
  $sql = "SELECT password FROM blogUsers WHERE email = '" . $email . "'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
    $row = mysqli_fetch_assoc($result);
    function send()
    {
$email = $_POST['forgotEmail'];
$to = $email;
$subject = 'Your password request';
$message = '
<html>
<head>
Hello! <br>

You requested to change your password. <br>
Just click on the link and you will be blogging in no time! ;) <br><br>
<a href ="http://studenter.miun.se/~rese1800/dt093g/projekt/change.php">Change my password</a>.
 
</body>
</html>
';
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'To:' . $email;
$headers[] = 'From: BlogSpace <rese1800@student.miun.se>';
mail($to, $subject, $message, implode("\r\n", $headers));
}send();
  }else {
    echo '<div id="errmsg"><p>'.$email.' doesn\'t exist in our userbase</p></div>';
  }
  ?>