<?php
class Comment
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_error < 0) {
            die('Fel vid anslutning: ' + $this->db->connect_error);
        }
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
   

    /*GET COMMENTS */
    public function getCommentsById($id)
    {
        $sql = "SELECT * FROM comments WHERE bp_id=$id";
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
    /*GET REPLIES */
    public function getReplyById($deleteComment)
    {
        $sql = "SELECT * FROM reply WHERE rep_id=$deleteComment";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    /* DELETE (SINGLE) COMMENT */
    function deleteComment($id)
    {
        $sql = "DELETE FROM comments WHERE id=$id";
        return $this->db->query($sql);
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

    public function setEmail($email)
    {
        if ($email != "") {
            $this->email = $this->db->real_escape_string($email);
            return true;
        } else {
            return false;
        }
    }
   
}
