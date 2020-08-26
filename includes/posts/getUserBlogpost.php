<?php
   $post = $bloguser->getPosts();
   $count = 0; //FOR MY "JUMPS"
   $blogComment = new Comment();
   foreach ($post as $row) {
       $count++;
       $delete = $row["id"];
       $upc = $row["author"];
       $upc = ucfirst($upc);
       $id = $row["id"];
       $post = $row["post"];
       echo '<section class="cont">';
       echo ' <a name="updt' . $count . '"></a>';
       echo ' <a name="close' . $count . '"></a>';
       echo '<div class="top"><h3>' . $row['title'] . '</h3></div>';
       echo '<div class="author">By: ' .  $upc . ' <i class="far fa-clock"></i> ' .  $row['date'] . '</div>';
       echo '<div class="message">';
       echo  $post . '</div>';
       /* GET NUMBER OF COMMENTS */
       $sql = "SELECT * FROM comments WHERE bp_id = $id";
       $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
       $noOfcomments = mysqli_num_rows($result);
       echo '<div class="bottom"><div class="delete">' . "<a href='admin.php?delete=$delete'>Delete" . '</a></div>';
       echo ' <a href="#updt' . $count . '"><div class="update">Update</div></a>';
       echo '<div class="numberOfComments"> <a href="#read' . $count . '"><div class="noc">' . $noOfcomments . '</div></a></div></div>';
       echo ' <a name="read' . $count . '"></a>';
       echo ' <div class="comments">';
       /*GET COMMENTS */
       $posts = $blogComment->getCommentsById($id);
       echo ' <a name="post' . $count . '"></a>';
       foreach ($posts as $row) {
           $deleteComment = $row["id"];
           echo ' <div class="cmessage">';
           echo '<div class="aut"><p>From: ' . $row['co_name'] . ' <i class="far fa-clock"></i>' . $row['co_date'] . '</p></div>
       <p>' . $row['co_post'] . '</p>
       <a name="updt' . $count . '"></a>';
           /* SHOW REPLY FORM */
           echo '<div class="rep">
       <form action="admin.php" method="POST" class="repform">';
           echo '<input type="hidden" name="id" value="' . $deleteComment . '">
             <textarea name="repcomment"></textarea><br><br>
             <button type="submit" name="repsubmit">Reply</button>
           </form>
      </div> ';
           /*SHOW REPLIES */
           $replies = $blogComment->getReplyById($deleteComment);
           echo ' <a name="post' . $count . '"></a>';
           foreach ($replies as $row) {
               $deleteComment = $row["id"];
               echo ' <br/><div class="cmessageRep">';
               echo '<div class="aut"><p>Reply from: ' . $row['rep_name'] . ' <i class="far fa-clock"></i>' . $row['co_date'] . '</div>
       <p>' . $row['co_post'] . '</p>
       </div>';
           }
           /*DELETE AND REPLY "BUTTONS" */
           echo ' <div class="wrap"><div class="commentDelete">' . "<a href='admin.php?deleteComment=$deleteComment'>Delete Comment" . '</a></div> <a href="#rep' . $count . '"></a></div> <div class="repOut">
      <div class="reply">Reply</div></div>
         </div>';
       }
       /* UPDATE BLOGPOST FORM */
       echo '
       <div class="leavemsg">
         <div class="errmsg2"></div>
         <form method="POST" action="admin.php" class="updateForm">';
       echo '<input type="hidden" name="id" value="' . $id . '">
         <label>Title</label><input type="text" name="title1" class="title1"><br />
             <textarea class="textarea" name="textarea' . $count . '"></textarea><br><br>
         <button type="submit" onClick="validate();" name="upadetPost">Update</button>
     </form>
       </div>';
       /* CLOSE "BUTTON */
       echo ' <div class="closecomment">  <a href="#close' . $count . '">Close</a></div>
     </div>
   </section>';
   }
?>