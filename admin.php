<?php
$css = "css/admin.css";
include("includes/header.php");
include("includes/config/config.php");
include("includes/config/dbconnect.php");
include("includes/classes/addPostClass.php");
include("includes/classes/addCommentClass.php");
include("includes/classes/addProfileClass.php");
session_start();

if (!isset($_SESSION['BSusername'])) {
    header("Location: signin.php");
};
?>
<?php
if (isset($_POST["signOut"])) {
    session_start();
    session_destroy();
    header('Location: index.php');
};
if (isset($_POST["start"])) {
    header('Location: index.php');
};

$bloguser = new Post();
$blogComment = new Comment();
$profile = new Profile();

// SET NEW PROFILE TEXT
include("includes/profile.php");
// SET PROFILE IMAGE
include("includes/photos.php");

?>
<form action="admin.php" method="POST" class="sOut">
    <input type="submit" name="signOut" value="Sign out" id="signOut">
    <input type="submit" name="start" value="Home" id="start" />
</form>
</nav>
</div>
</section>
<div class="mainCon">
    <section id="latestPosts">
        <div id="forScroll">
            <div id="outer">
                <h1>Welcome</h1>
                <!--WELCOME GREETING-->
                <?php
                $sql = "SELECT * FROM blogUsers WHERE Username = '" . $_SESSION['BSusername'] . "'";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                while ($row2 = $result->fetch_assoc()) {
                    echo '<h2><i class="fas fa-angle-double-right"></i> ' . $row2['firstname'] . ' ' . ' <i class="fas fa-angle-double-left"></i></h2>';
                }
                /*ADD BLOGPPOST */
                $sql = "SELECT * FROM blogUsers WHERE Username = '" . $_SESSION['BSusername'] . "'";
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if (isset($_REQUEST['submitPost'])) {
                    while ($row2 = $result->fetch_assoc()) {
                        $bloguser->addPost($row2['id'], $_SESSION['BSusername'], $_REQUEST["title"], $_REQUEST["textarea"], Date('Y-m-d h:i:s'));
                    }
                };
                ?>
                <?php
                // GET IMAGE //
                $image = $profile->getImage();
                foreach ($image as $row) {
                    $retImage = $row['image'];
                    $image_src = "http://studenter.miun.se/~rese1800/writeable/profileImages/" . $retImage;
                }
                //GET INFO //
                $aut =  $_SESSION['BSusername'];
                $info = $profile->getinfo($aut);
                foreach ($info as $row) {
                    $profileName = $row['firstname'];
                    $profileLName = $row['lastname'];
                    $profileEmail = $row['email'];
                }
                //GET PROFILE TEXT //
                $text = $profile->getText();
                foreach ($text as $row) {
                    $profileText = $row['profile'];
                }

                ?>
                <!--BLOG STATISTICS -->
                <div id="stats">
                    <p>Your stats</p>
                    <ul>
                        <li id="commetsrecieved"></li>
                        <?php
                        $sql = "SELECT * FROM blogUsers WHERE Username = '" . $_SESSION['BSusername'] . "'";
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while ($row2 = $result->fetch_assoc()) {
                            $email = $row2['email'];
                            $blogComment->getCommentsPosted($email);
                            $numberCom = $blogComment->getCommentsPosted($email);
                            foreach ($numberCom as $row3) {
                                echo '<li>|</li><li>Comments posted: <b>' . $row3['numcompos'] . '</b></li>
    <li>|</li>';
                            }
                        }
                        $session =  $_SESSION['BSusername'];
                        $bloguser->getWrittenPosts($session);
                        $numberCom = $bloguser->getWrittenPosts($session);
                        foreach ($numberCom as $row3) {
                            echo '<li>Blogposts written : <b>' . $row3['numcomrec'] . '</b></li>
   </ul>';
                        }
                        ?>
                </div>
            </div>
            <section class="writePost">
                <div class="writePostIn">
                    <div class="errmsg2"></div>
                    <?php


                    /*REPLY TO COMMENT */
                    if (isset($_REQUEST['repsubmit'])) {
                        $id = $_REQUEST["id"];
                        $blogComment->replyComment($_SESSION['BSusername'], $_REQUEST["repcomment"], Date('Y-m-d h:i:s'), $id);

                        header("Location: http://studenter.miun.se/~rese1800/dt093g/projekt/admin.php#leavemsg ");
                        exit;
                    }
                    ?>
                    <!--CREATE BLOGPOST SECTION -->
                    <form method="POST" action="admin.php" class="writeForm">
                        <label>Title</label><input type="text" name="title" class="title" id="title"><br />
                        <textarea id="textarea" class="textarea" name="textarea"></textarea><br><br>
                        <button type="submit" name="submitPost">Post</button>
                    </form>
                </div>
            </section>
            <div id="yp">
                <h3>Your posts</h3>
            </div>
            <div class="inner">
                <?php 

                /* SEND REQUEST TO CLASSFILE */
                include("includes/databaseRequests.php");
                /* SHOW BLOGPOST */
                include("includes/posts/getUserBlogpost.php");
                ?>
                <section id="deleteAllPosts">
                    <form method="POST" action="admin.php">
                        <button type="submit" name="deleteAll">Delete all blogposts</button>
                    </form>
                    <?php
                    ?>
                </section>
                <div id="profileSection">
                    <h3>Your Profile</h3>
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
                        <input type="email" value="<?php echo $profileEmail;  ?>" name="pemail" id="pemail" readonly><br/>
                        <label id="about">About me:</label>
                        <textarea id="ptext" readonly name="ptext"> <?php if (!isset($profileText)) {
                        echo 'Nothing is written yet';
                        } else {
                        echo $profileText;
                        } ?></textarea><br /><br />
                        <p id="updP">Update Profile</p>
                        <input type="hidden" name="MAX_FILE_SEIZE" value="200000" />
                        <label id="label" >Filename</label>
                        <input id="Pimage" type="file" name="Pimage" />
                        <br />
                        <button id="subbut" type="submit" name="updateProfile">Update profile</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    /*CHANGE TO CK EDITOR, TRIED A LOOP BUT DIDN'T WORK :'( */
    CKEDITOR.replace('textarea');
    CKEDITOR.replace('textarea1');
    CKEDITOR.replace('textarea2');
    CKEDITOR.replace('textarea3');
    CKEDITOR.replace('textarea4');
    CKEDITOR.replace('textarea5');
    CKEDITOR.replace('textarea6');
    CKEDITOR.replace('textarea7');
    CKEDITOR.replace('textarea8');
    CKEDITOR.replace('textarea9');
    CKEDITOR.replace('textarea10');
    CKEDITOR.replace('textarea11');
    CKEDITOR.replace('textarea12');
    CKEDITOR.replace('textarea13');
    CKEDITOR.replace('textarea14');
    CKEDITOR.replace('textarea15');
    CKEDITOR.replace('textarea16');
    CKEDITOR.replace('textarea17');
    CKEDITOR.replace('textarea18');
    CKEDITOR.replace('textarea19');
    CKEDITOR.replace('textarea20');
    CKEDITOR.replace('textarea21');
    CKEDITOR.replace('textarea22');
    CKEDITOR.replace('textarea23');
    CKEDITOR.replace('textarea24');
    CKEDITOR.replace('textarea25');
    /* RESET DEFAULT IMAGE SIZE SETTINGS */
    CKEDITOR.on('instanceReady', function(ev) {
        ev.editor.dataProcessor.htmlFilter.addRules({
            elements: {
                $: function(element) {
                    if (element.name == 'img') {
                        var style = element.attributes.style;
                        if (style) {
                            delete element.attributes.style;
                        }
                    }
                    return element;
                }
            }
        });
    });
</script>
<script src="js/profile.js"></script>
<script src="js/menu.js"></script>
<script src="js/textoptions.js"></script>
</body>

</html> 