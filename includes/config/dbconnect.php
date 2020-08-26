<?php 
 error_reporting(-1);
 ini_set("display_errors" , 1);
 

  $servername = "localhost";
  $susername = "root";
  $password = "";
  $dbname = "projektw2";

  // Create connection
  $conn = new mysqli($servername, $susername, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }   ?>