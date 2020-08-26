<?php $css = "css/css.css";
session_start();
if (!isset($_SESSION['BSusername'])) {

  $href = "signin.php";
  $dirname = "Sign in";
  $href2 = "create.php";
  $dirname2 = "Create account";
} else {
  $href = "signin.php";
  $dirname = "Admin";
  $href2 = "create.php";
  $dirname2 = "";
}
include("includes/header.php");
include("includes/menu.php");
include("includes/config/config.php");
include("includes/config/dbconnect.php");
include("includes/classes/addUserClass.php");
include("includes/classes/addPostClass.php");
include("includes/classes/addProfileClass.php");
include("includes/classes/addCommentClass.php");
$blogComment = new Comment();
$profile = new Profile();
?>
<div id="d2cont">
    <div class="scroll-indicator" onclick="scrollMeDown();">
        <i class="fas fa-chevron-down"></i>
    </div>
</div>
<div id="container">
    <div class="scroll-indicator" onclick="scrollMeDown();">
        <i class="fas fa-chevron-down"></i>
    </div>
    <script>
        function scrollMeDown() {
            $('html,body').animate({
                    scrollTop: 1550
                },
                'fast');
        }
    </script>
</div>
<!--MAIN CONTAINER-->
<div class="mainCon">
    <section id="latestPosts">
        <div id="forScroll">
            <div id="outer">
                <h1>BlogSpace</h1>
                <h2><i class="fas fa-angle-double-right"></i> Read | Write | Share <i class="fas fa-angle-double-left"></i></h2>
            </div>
            <div class="inner">
                <!--POST ORDER OPTIONS-->
                <div id="options">
                    <form action="indeex.php#leavemsg" method="POST" class="commentForm">
                        <select name="options">
                            <option value="DESC">Latest</option>
                            <option value="ASC">Oldest</option>
                            <option value="TITLE1">Title A-Ö</option>
                            <option value="TITLE2">Title Ö-A</option>
                            <option value="AUTHOR1">Author A-Ö</option>
                            <option value="AUTHOR2">Author Ö-A</option>
                        </select>
                        <button type="submit" name="opt">Sort</button>
                    </form>
                </div>
                <?php
 /* SEND COMMENT TO DATABASE */
                $bloguser = new Post();
                $blogComment = new Comment();
                if (isset($_REQUEST['comsubmit'])) {
                  $blogComment->addComment($_REQUEST["comname"], $_REQUEST["comemail"], $_REQUEST["comcomment"], Date('Y-m-d h:i:s'), $_REQUEST['id']);
                  header("Location: http://studenter.miun.se/~rese1800/dt093g/projekt/indeex.php#leavemsg ");
                  exit;
                }
                /* CHANGE ORDER ON POSTS DEPENDING ON USER SELECTION */
                include("includes/changeOrder.php");
                ?>
                <!--"JOIN-SECTION"-->
                <section class="join">
                    <h3>Join us today <br />and share <br />your story! :)
                    </h3><i id="arrow" class="fas fa-angle-double-right"></i>
                </section>
                <section id="meet">
                    <h3>Our community:</h3>
                </section>
                <!--ADD USER LIST-->
                <div id="jump"></div>
                <div id="userList">
                    <?php
                    $sql = "SELECT * FROM blogUsers ORDER BY create_date DESC";
                    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    echo '<ul>';
                    while ($row = $result->fetch_assoc()) {
                      $userID = $row['id'];
                      $username = $row['username'];
                      echo '<li>' . "<a href='indeex.php?user=$username'>" . $username . '</a></li>';
                    }
                    echo '</ul>';
                    if (isset($_GET['user'])) {
                      $id2 = $_GET["user"];
                      $sql = "SELECT * FROM blogUsers WHERE username='" . $id2 . "'";
                      $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                      while ($row = $result->fetch_assoc()) {
                        $username = $row['username'];
                        echo '<div id="allPostsBySpecUser"><h2>' . $username . '\'s profile:</h2></div>';
                      }
                      // GET IMAGE //
                      $image = $profile->getSImage($id2);
                      foreach ($image as $row) {
                        $retImage = $row['image'];
                        $image_src = "http://studenter.miun.se/~rese1800/writeable/profileImages/" . $retImage;
                      }
                      //GET INFO //

                      $info = $profile->getSinfo($id2);
                      foreach ($info as $row) {
                        $profileName = $row['firstname'];
                        $profileLName = $row['lastname'];
                        $profileEmail = $row['email'];
                      }
                      //GET PROFILE TEXT //
                      $text = $profile->getSText($id2);
                      foreach ($text as $row) {
                        $profileText = $row['profile'];
                      }
                      ?>
                </div>
                <div id="alpb">
                    <div id="profileSection">
                        <img id="profileImage" src='<?php 
                                                    if (!isset($image_src)) {
                                                      echo 'http://studenter.miun.se/~rese1800/writeable/profileImages/tmpprofile.jpg';
                                                    } else {
                                                      echo $image_src;
                                                    } ?>' alt="Profile image">
                        <form action="#profileSection" method="POST" enctype="multipart/form-data">
                            <label>First name:</label>
                            <input type="text" value="<?php echo $profileName;  ?>" name="pname" id="pname" readonly><br />
                            <label>Last name:</label>
                            <input type="text" value="<?php echo $profileLName;  ?>" name="plname" id="plname" readonly><br />
                            <label>Email:</label>
                            <input type="email" value="<?php echo $profileEmail;  ?>" name="pemail" id="pemail" readonly><br />
                            <label>About me:</label>
                            <div id="ptext" readonly name="ptext"> <?php if (!isset($profileText)) {
                                                                      echo 'Nothing is written yet';
                                                                    } else {
                                                                      echo $profileText;
                                                                    } ?></div><br /><br />

                        </form>
                    </div>
                    <?php
                    /*SHOW SPECIFIC USERS POSTS */
                    include("includes/posts/specificUserPost.php");
                  }
                  ?>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="js/options.js"></script>
<script src="js/iejs.js"></script>
<script src="js/menu.js"></script>
</body>

</html> 