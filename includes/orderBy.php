<?php
 $count = 0;
 $blogComment = new Comment();
 foreach ($post as $row) {
  $count++;
  $delete = $row["id"];
  $upc = $row["author"];
  $upc = ucfirst($upc);
  $id = $row["id"];
  $post = $row["post"];
  $upcClean = strip_tags($upc, '<br><br />');
  echo '<section class="cont">';
  echo ' <a name="close' . $count . '"></a>';
  echo '<div class="top"><h3>' . $row['title'] . '</h3></div>';
  echo '<div class="author">By: ' .  $upcClean . ' <i class="far fa-clock"></i> ' .  $row['date'] . '</div>';
  echo '<div class="message">';
  echo  $post . '</div>';
  /* GET NUMBER OF COMMENTS */
  $sql = "SELECT * FROM comments WHERE bp_id = $id";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  $noOfcomments = mysqli_num_rows($result);
  echo ' <a name="read' . $count . '"></a>';
  echo ' <a name="post' . $count . '"></a>';
  echo '<div class="bottom">
<p class="comment"> <a href="#post' . $count . '">Comment</a></p>
<p class="numberOfComments"> <a href="#read' . $count . '">' . $noOfcomments . '</a></p>
</div>';
echo ' <div class="comments">';
/*GET COMMENTS */
$posts = $blogComment->getCommentsById($id);

foreach ($posts as $row) {
    $deleteComment = $row["id"];
    echo ' <div class="cmessage">';
    echo '<div class="aut"><p>From: ' . $row['co_name'] . ' <i class="far fa-clock"></i>' . $row['co_date'] . '</p></div>
<p>' . $row['co_post'] . '</p>';//hhhh
    /*SHOW REPLIES */
    $replies = $blogComment->getReplyById($deleteComment);
    foreach ($replies as $row) {
        $deleteComment = $row["id"];
        echo '<div class="cmessageRep">';
        echo '<div class="aut"><p>Reply from: ' . $row['rep_name'] . ' <i class="far fa-clock"></i>' . $row['co_date'] . '</div>
<p>' . $row['co_post'] . '</p>
</div>';
    }echo'</div>';
    /*LEAVE COMMENT */
}
echo '<div class="leavemsg">';
$sql = "SELECT * FROM blogpost WHERE id = $id";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
while ($row = $result->fetch_assoc()) {
echo '<h4>Leave a comment on post: '.' '. $row['title'].'</h4>';
}echo'
<div class="errmsg2"></div>
<form action="index.php#leavemsg" method="POST" class="commentForm">';
  echo '<input type="hidden" name="id" value="' . $id . '">
<label>Name:</label>
<input type="text" class="comname" name="comname"><br>
<label>E-mail:</label>
<input type="email" class="comemail" name="comemail" ><br>
<textarea name="comcomment"></textarea><br><br>
<button type="submit" name="comsubmit">Send</button>
</form>
</div>
<div class="closecomment">  <a href="#close' . $count . '">Close</a></div>
</div>
</section>' ;}
   ?>