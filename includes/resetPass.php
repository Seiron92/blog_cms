<?php
require('includes/dbconnect.php');
  $email = $_POST['chemail'];
  $pass = $_POST['chpassword'];
  $sql = "SELECT * FROM blogUsers WHERE email = '" . $email . "'";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
  $row = mysqli_fetch_assoc($result);
  if(strcmp($row["email"], $email) == 0){
    $salt = substr(microtime(), 2, 2);
    $password = crypt($_POST['chpassword'], $salt);
    $sql = "UPDATE blogUsers SET password = '$password' WHERE email = '" . $email . "'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
    $name = "SELECT * FROM blogUsers WHERE email = '" . $email . "' LIMIT 1";
    $nameresult = mysqli_query($conn, $name) or die(mysqli_error($conn)); 
    while ($row2 = $nameresult->fetch_assoc()) {
        echo '<div id="errmsg"><p>Your password is updated '.$row2['firstname'].' :)</p></div>';
    }
  }else {
    echo '<div id="errmsg"><p>'.$email.' doesn\'t exist in our userbase</p></div>';
  }
 ?>