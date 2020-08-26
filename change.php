<?php $css = "css/css.css"; 
$href = "index.php";
$dirname ="Home";
$href2 = "create.php";
$dirname2 ="Create account";
include("includes/header.php");
include("includes/menu.php");
include("includes/config/config.php");
include("includes/config/dbconnect.php");
include("includes/loginClass.php");

?>
<section id="signIn">
  <div id="signInner">
  <h2>Change your password</h2>
    <div id="errmsg"></div>
    <!--SIGN IN-->
    <?php
 if (isset($_REQUEST['chsubmit'])) {
  require('includes/resetPass.php');
 }
    ?>
    <!--FORGOT PASSWORD-->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="change">
    <label>Email:</label>
    <input type="email" id="chemail" name="chemail"><br>
     <label>Password:</label>
     <input type="password" id="chpassword" name="chpassword" ><br>
     <label>Confirm password:</label>
     <input type="password" id="cohpassword" name="cohpassword" ><br><br>
     <button type="submit" name="chsubmit">Change</button>
   </form>

    </div>
</section>
     
      <script src="js/menu.js"></script>
<script src="js/login.js"></script>
</body>
</html>