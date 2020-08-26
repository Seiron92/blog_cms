<?php
  $username = $_POST['username'];
    $password = $_POST['password'];
$sql = "SELECT * FROM blogUsers WHERE Username = '" . $username . "'";

      $result = mysqli_query($conn, $sql) or die(mysqli_error($conn)); 
      $row = mysqli_fetch_assoc($result);
      $salt = substr($row['password'], 0, 2); 
      $generated_password = crypt($password, $salt);
      if(strcmp($row["password"], $generated_password) == 0){
        session_start();
        $username = $_POST['username'];
        $_SESSION['BSloggedin'] = true;
        $_SESSION['BSusername'] = $username;
        header("Location: admin.php");
      } else {
        echo '<div id="errmsg"><p>Wrong username and/or password</p></div>';
      }
    
      mysqli_close($conn);
?>