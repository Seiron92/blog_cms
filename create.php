<?php $css = "css/forms.css"; 
$href = "index.php";
$dirname ="Home";
$href2 = "signin.php";
$dirname2 ="Sign in";
include("includes/header.php");
include("includes/menu.php");
include("includes/config/config.php");
include("includes/config/dbconnect.php");
include("includes/classes/addUserClass.php");
session_start();
if(isset($_SESSION['BSusername'])){ 
  header("Location: admin.php");
}
?>
<section id="signIn">
  <div id="signInner">
    <div id="errmsg"></div>
    <?php
    $user = new Users();
    if (isset($_REQUEST['csubmit'])) {
      $user_email = $_POST['cemail'];
      $user_name = $_POST['cusername'];
      $sql = $conn->query("SELECT * FROM blogUsers WHERE username = '$user_name'");
      $sql2 = $conn->query("SELECT * FROM blogUsers WHERE email='$user_email'");
       if(mysqli_num_rows($sql)>=1)
      {
          echo '<div id="errmsg"><p>Username already exists</p></div>';
      } else if(mysqli_num_rows($sql2)>=1){
      echo '<div id="errmsg"><p>Email already exists</p></div>';
      }
      else
      {
        session_start();
        $password = $_REQUEST['password'];
        $salt = substr(microtime(), 2, 2);
        $user->addUser($_REQUEST["cusername"], crypt($_POST['cpassword'], $salt), $_REQUEST["cname"], $_REQUEST["clast"],  $_REQUEST["cemail"], Date('Y-m-d h:i:s'));
    $username = $_POST['cusername'];
        $_SESSION['loggedin'] = true;
        $_SESSION['BSusername'] = $username;
        $_SESSION['id'] = $id;
        header("Location: signin.php");
          mysqli_close($conn);
          exit();
      }};
      ?>
    <!--CREATE ACCOUNT-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="createform">
    <label>First name:</label>
    <input type="text" id="cname" name="cname"><br>
    <label>Last name:</label>
    <input type="text" id="clast" name="clast"><br>
    <label>Email:</label>
    <input type="email" id="cemail" name="cemail"><br>
    <label>Username:</label>
     <input type="text" id="cusername" name="cusername"><br>
     <label>Password:</label>
     <input type="password" id="cpassword" name="cpassword" ><br>
     <label>Confirm password:</label>
     <input type="password" id="copassword" name="copassword" ><br><br>
     <button type="submit" name="csubmit">Create account</button>
   </form>
      </div>
    </section>
      <script src="js/menu.js"></script>
    <script src="js/create.js"></script>
</body>
</html>