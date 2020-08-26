<?php
class Post
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_error < 0) {
            die('Fel vid anslutning: ' + $this->db->connect_error);
        }
    }
    /* ADD POST */
    function addPost($user_id, $author, $title, $post, $datetime)
    {
        if (!$this->setUserName($author)) {
            return false;
        }
        if (!$this->setUserId($user_id)) {
            return false;
        }
        if (!$this->setTitle($title)) {
            return false;
        }
        $datetime = date("y-m-d H:i:s");

        if (!$this->setPost($post)) {
            return false;
        }

        $sql = "INSERT INTO blogpost (user_id, author, title, post, date)
VALUES ('" . $this->user_id . "', '" . $this->author . "', '" . $this->title . "', '" . $this->post . "','" . $datetime . "')";
        return $result = $this->db->query($sql);
    }
    /* ADD COMMENT */
    function addComment($author, $email, $comment, $datetime, $pid)
    {
        if (!$this->setUserName($author)) {
            return false;
        }
        if (!$this->setPostId($pid)) {
            return false;
        }

        $datetime = date("y-m-d H:i:s");

        if (!$this->setComment($comment)) {
            return false;
        }
        if (!$this->setEmail($email)) {
            return false;
        }

        $sql = "INSERT INTO comments (co_name, co_email, co_post, co_date, bp_id)
VALUES ('" . $this->author . "', '" . $this->email . "', '" . $this->comment . "','" . $datetime . "','" . $this->pid . "')";
        return $result = $this->db->query($sql);
    }

    /*REPLY TO COMMENTS */
    function replyComment($author, $comment, $datetime, $pid)
    {
        if (!$this->setUserName($author)) {
            return false;
        }
        if (!$this->setPostId($pid)) {
            return false;
        }
        $datetime = date("y-m-d H:i:s");

        if (!$this->setComment($comment)) {
            return false;
        }
        $sql = "INSERT INTO reply (rep_name, co_post, co_date, rep_id)
VALUES ('" . $this->author . "', '" . $this->comment . "','" . $datetime . "','" . $this->pid . "')";
        return $result = $this->db->query($sql);
    }
    /*UPDATE BLOGPOST */
    function updatePost($title, $post, $pid)
    {

        if (!$this->setTitle($title)) {
            return false;
        }
        if (!$this->setPostId($pid)) {
            return false;
        }

        if (!$this->setPost($post)) {
            return false;
        }

        $sql =  "UPDATE blogpost SET title='" . $this->title . "', post='" . $this->post . "' WHERE id='" . $this->pid . "'";
        return $result = $this->db->query($sql);
    }


    /*UPDATE USER FIRSTNAME */
    function addFirstName($author, $name)
    {

        if (!$this->setProfileName($name)) {
            return false;
        }
        if (!$this->setUserName($author)) {
            return false;
        }

        $sql =  "UPDATE blogUsers SET firstname='" . $this->name . "' WHERE username='" . $this->author . "'";
        return $result = $this->db->query($sql);
    }

    /*UPDATE USER LAST NAME */
    function addLastName($author, $lname)
    {

        if (!$this->setProfileLName($lname)) {
            return false;
        }
        if (!$this->setUserName($author)) {
            return false;
        }

        $sql =  "UPDATE blogUsers SET lastname='" . $this->lname . "' WHERE username='" . $this->author . "'";
        return $result = $this->db->query($sql);
    }
    /*UPDATE USER LAST NAME */
    function addEmail($author, $email)
    {

        if (!$this->setEmail($email)) {
            return false;
        }
        if (!$this->setUserName($author)) {
            return false;
        }

        $sql =  "UPDATE blogUsers SET email='" . $this->email . "' WHERE username='" . $this->author . "'";
        return $result = $this->db->query($sql);
    }




    /* UPLOAD PROFILE IMAGE */
    function addImage($author, $storedfile)
    {
        if (!$this->setImage($storedfile)) {
            return false;
        }
        if (!$this->setUserName($author)) {
            return false;
        }
        $sql = "INSERT INTO images (name ,image)
VALUES ('" . $this->author . "', '" . $this->storedfile . "')";
        return $result = $this->db->query($sql);
    }
    /* ADD PROFILE INFO */
    function addPinfo($profile, $author)
    {
        if (!$this->setProfile($profile)) {
            return false;
        }
        if (!$this->setUserName($author)) {
            return false;
        }
        $sql = "INSERT INTO profile (name ,profile)
VALUES ('" . $this->author . "', '" . $this->profile . "')";
        return $result = $this->db->query($sql);
    }

    /*GET PROFILE IMAGE */

    public function getImage()
    {
        $sql = "SELECT * FROM images WHERE name = '" .  $_SESSION['BSusername'] . "' ORDER BY id DESC LIMIT 1";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /*GET PROFILE INFO */

    public function getinfo($aut)
    {
        $sql = "SELECT * FROM blogUsers WHERE username = '" .  $aut . "'";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /*GET PROFILE TEXT */

    public function getText()
    {
        $sql = "SELECT * FROM profile WHERE name = '" .  $_SESSION['BSusername'] . "'";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }



    /*GET (ADMIN) BLOGPOSTS */
    function getPosts()
    {
        $sql = "SELECT * FROM blogpost WHERE author = '" .  $_SESSION['BSusername'] . "' ORDER BY id DESC";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /*GET COMMENT */
    function getComment($pid)
    {
        if (!$this->setPostId($pid)) {
            return false;
        }
        $sql = "SELECT * FROM comments WHERE bp_id = '" . $this->pid . "' ORDER BY id DESC";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /*GET ALL POSTS (FOR INDEX) */
    function getAllPosts($ORDERBY, $id)
    {
        $sql = "SELECT * FROM blogpost ORDER BY $ORDERBY $id LIMIT 5";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /*GET COMMENTS */
    public function getCommentsById($id)
    {
        $sql = "SELECT * FROM comments WHERE bp_id=$id";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /*GET REPLIES */
    public function getReplyById($deleteComment)
    {
        $sql = "SELECT * FROM reply WHERE rep_id=$deleteComment";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    /* GET SPECIFIC USER POSTS */
    public function getSpecUser($id2)
    {
        $sql = "SELECT * FROM blogpost WHERE author='$id2' ORDER BY id DESC;";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    /*GET PROFILE IMAGE */

    public function getSImage($id2)
    {
        $sql = "SELECT * FROM images WHERE name = '" . $id2 . "' ORDER BY id DESC LIMIT 1";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /*GET PROFILE INFO */

    public function getSinfo($id2)
    {
        $sql = "SELECT * FROM blogUsers WHERE username = '" . $id2 . "'";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /*GET PROFILE TEXT */

    public function getSText($id2)
    {
        $sql = "SELECT * FROM profile WHERE name = '" . $id2 . "'";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }























    /*GET COMMENTS POSTED */
    public function getCommentsPosted($email)
    {
        $sql = "SELECT COUNT(*) AS numcompos FROM comments WHERE co_email='$email' ORDER BY co_email;";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /* GET WRITTEN POSTS */
    public function getWrittenPosts($session)
    {
        $sql = "SELECT COUNT(*) AS numcomrec FROM blogpost WHERE author='$session' ORDER BY author;";
        $result = $this->db->query($sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* GET OLDEST POSTS */
    public function oldest()
    {
        $sql = "SELECT * FROM blogpost WHERE ORDER BY id ASC;";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /* DELETE BLOGPOST */
    function deletePost($id)
    {

        $sql = "DELETE FROM blogpost WHERE id=$id";
        return $this->db->query($sql);
    }
    /* DELETE (SINGLE) COMMENT */
    function deleteComment($id)
    {
        $sql = "DELETE FROM comments WHERE id=$id";
        return $this->db->query($sql);
    }
    /* DELETE ALL BLOGPOSTS -----------------------------> */
    function deleteAll($id)
    {
        $sql = "DELETE FROM blogpost WHERE user_id =$id";
        return $this->db->query($sql);
    }


    public function setEmail($email)
    {
        if ($email != "") {
            $this->email = $this->db->real_escape_string($email);
            return true;
        } else {
            return false;
        }
    }
    public function setComment($comment)
    {
        if ($comment != "") {
            $this->comment = $this->db->real_escape_string($comment);
            return true;
        } else {
            return false;
        }
    }
    public function setPostId($pid)
    {
        if ($pid != "") {
            $this->pid = $this->db->real_escape_string($pid);
            return true;
        } else {
            return false;
        }
    }
    public function setUserName($author)
    {
        if ($author != "") {
            $this->author = $this->db->real_escape_string($author);
            return true;
        } else {
            return false;
        }
    }
    public function setUserId($user_id)
    {
        if ($user_id != "") {
            $this->user_id = $this->db->real_escape_string($user_id);
            return true;
        } else {
            return false;
        }
    }

    public function setPost($post)
    {
        if ($post != "") {
            $this->post = $this->db->real_escape_string($post);
            return true;
        } else {
            return false;
        }
    }

    public function setProfile($profile)
    {
        if ($profile != "") {
            $this->profile = $this->db->real_escape_string($profile);
            return true;
        } else {
            return false;
        }
    }
    public function setProfileName($name)
    {
        if ($name != "") {
            $this->name = $this->db->real_escape_string($name);
            return true;
        } else {
            return false;
        }
    }
    public function setProfileLName($lname)
    {
        if ($lname != "") {
            $this->lname = $this->db->real_escape_string($lname);
            return true;
        } else {
            return false;
        }
    }
    public function setProfileEmail($email)
    {
        if ($email != "") {
            $this->email = $this->db->real_escape_string($email);
            return true;
        } else {
            return false;
        }
    }
    public function setImage($storedfile)
    {
        if ($storedfile != "") {
            $this->storedfile = $this->db->real_escape_string($storedfile);
            return true;
        } else {
            return false;
        }
    }
    public function setTitle($title)
    {
        if ($title != "") {
            $this->title = $this->db->real_escape_string($title);
            return true;
        } else {
            return false;
        }
    }
}
