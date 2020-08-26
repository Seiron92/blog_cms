<?php $css = "css/css.css"; 
$href = "index.php";
$dirname ="Home";
$href2 = "create.php";
$dirname2 ="Create account";
include("includes/header.php");
include("includes/menu.php");
include("includes/config/config.php");
include("includes/config/dbconnect.php");
session_start();
if(isset($_SESSION['BSusername'])){ 
   header("Location: admin.php");
}
?>
<section id="signIn">
  <div id="signInner">
    <div id="errmsg"></div>
    <!--SIGN IN-->
    <?php
  if(isset($_POST['submit'])){
  require_once ("includes/login.php");
}
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="logform" autocomplete="off">
     <label>Username:</label>
      <input type="text" id="username" name="username"><br>
      <label>Password:</label>
      <input type="password" id="password" name="password"><br><br>
      <button type="submit" name="submit">Sign in</button>
     <a href="forgot.php"> <p id="forgot">Forgot your password?</p></a>
    </form>
    </div>
</section>
      <script src="js/menu.js"></script>
<script src="js/login.js"></script>
</body>
</html>