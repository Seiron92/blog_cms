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

if(isset($_SESSION['loggedin'])){ 
   header("Location: admin.php");
};

?>
<section id="signIn">
  <div id="signInner">
    <div id="errmsg"></div>
    <!--SIGN IN-->
    <?php
 if (isset($_REQUEST['Fsubmit'])) {
    require('includes/forgotEmail.php');
 }
    ?>
    <!--FORGOT PASSWORD-->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="Fform" > 
      <label>E-mail:</label><br />
      <input type="email" id="forgotEmail" name="forgotEmail" ><br><br>
      <button type="submit" name="Fsubmit">Send</button> 
      <a href="signin.php">  <p id="exit">Nvm, I remember it! ;)</p></a></form>
    </div>
</section>
      <script src="js/menu.js"></script>
<script src="js/login.js"></script>
</body>
</html>