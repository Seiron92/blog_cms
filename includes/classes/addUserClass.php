<?php
class Users
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_error < 0) {
            die('Fel vid anslutning: ' + $this->db->connect_error);
        }
    }

    function addUser($username, $password, $firstname, $lastname, $email, $datetime)
    {


        if (!$this->setUserName($username)) {
            return false;
        }
        if (!$this->setPassword($password)) {
            return false;
        }
        if (!$this->setFirstName($firstname)) {
            return false;
        }
        if (!$this->setLastName($lastname)) {
            return false;
        }
        if (!$this->setEmail($email)) {
            return false;
        }
        $datetime = date("y-m-d H:i:s");

        $sql = "INSERT INTO blogUsers (username, password, firstname, lastname, email, create_date)
        VALUES ('" . $this->username . "', '" . $this->password . "', '" . $this->firstname . "', '" . $this->lastname . "','" . $this->email . "','" . $datetime . "')";
        return $result = $this->db->query($sql);
    }


    public function setFirstName($firstname)
    {
        if ($firstname != "") {
            $this->firstname = $this->db->real_escape_string($firstname);
            return true;
        } else {
            return false;
        }
    }
    public function setLastName($lastname)
    {
        if ($lastname != "") {
            $this->lastname = $this->db->real_escape_string($lastname);
            return true;
        } else {
            return false;
        }
    }
    public function setUserName($username)
    {
        if ($username != "") {
            $this->username = $this->db->real_escape_string($username);
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


    public function setPassword($password)
    {
        if ($password != "") {
            $this->password = $this->db->real_escape_string($password);
            return true;
        } else {
            return false;
        }
    }
}
