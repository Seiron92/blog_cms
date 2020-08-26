<?php
class Profile
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_error < 0) {
            die('Fel vid anslutning: ' + $this->db->connect_error);
        }
    }
 

    /*SET USER FIRSTNAME */
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

    /*SET USER LAST NAME */
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
    /*SET USER LAST NAME */
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
  function addPinfo($profileText, $author)
    {
        if (!$this->setProfile($profileText)) {
            return false;
        }
        if (!$this->setUserName($author)) {
            return false;
        }
        $sql = "INSERT INTO profile (name ,profile)
VALUES ('" . $this->author . "', '" . $this->profileText . "')";
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


    public function setEmail($email)
    {
        if ($email != "") {
            $this->email = $this->db->real_escape_string($email);
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


    public function setProfile($profileText)
    {
        if ($profileText != "") {
            $this->profileText = $this->db->real_escape_string($profileText);
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

    public function setImage($storedfile)
    {
        if ($storedfile != "") {
            $this->storedfile = $this->db->real_escape_string($storedfile);
            return true;
        } else {
            return false;
        }
    }

}
