<?php
  /* SEND REQUEST TO CLASSFILE */
                //UPDATE POST
                if (isset($_REQUEST['upadetPost'])) {
                    $bloguser->updatePost($_REQUEST["title1"], $_REQUEST["textarea1"], $_REQUEST['id']);
                };
                //DELETE (SINGLE) POST
                if (isset($_GET["delete"])) {
                    $id = $_GET["delete"];
                    if ($bloguser->deletePost($id)) { }
                    header('Location: admin.php');
                };
                //DELETE COMMENT
                if (isset($_GET["deleteComment"])) {
                    $id = $_GET["deleteComment"];
                    if ($blogComment->deleteComment($id)) {
                        header('Location: admin.php');
                    }}
         //DELETE ALL POSTS
         if (isset($_REQUEST["deleteAll"])) {
            $sql = "SELECT * FROM blogUsers WHERE username = '" . $_SESSION['BSusername'] . "'";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            while ($row = $result->fetch_assoc()) {
                 $id =  $row['id'];
                    if ($bloguser->deleteAll($id)) {
                    }}
            };
                ?>