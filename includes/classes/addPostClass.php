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



    /*GET (ADMIN) BLOGPOSTS */
    function getPosts()
    {
        $sql = "SELECT * FROM blogpost WHERE author = '" .  $_SESSION['BSusername'] . "' ORDER BY id DESC";
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

    /* GET SPECIFIC USER POSTS */
    public function getSpecUser($id2)
    {
        $sql = "SELECT * FROM blogpost WHERE author='$id2' ORDER BY id DESC;";
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

    /* DELETE BLOGPOST */
    function deletePost($id)
    {

        $sql = "DELETE FROM blogpost WHERE id=$id";
        return $this->db->query($sql);
    }
    
    /* DELETE ALL BLOGPOSTS */
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
