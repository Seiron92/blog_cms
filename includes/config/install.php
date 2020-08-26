<?php

$servername = "studentmysql.miun.se";
$username = "rese1800";
$password = "5d1azfoh";
$dbname = "rese1800";
/*

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projektw2";
*/
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database 
/*
$sql = "CREATE DATABASE projektw2";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}  */
// SET UP DATABASE 

/*
$sql ="CREATE TABLE blogUsers (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR (64),
password VARCHAR(64),
firstname VARCHAR(64),
lastname VARCHAR(64),
email VARCHAR(64),
create_date TIMESTAMP

    )"; 
  
     */     


   /*
$sql ="CREATE TABLE blogpost (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
user_id INT,
author VARCHAR(64),
title VARCHAR (64),
post TEXT,
date TIMESTAMP,
FOREIGN KEY (user_id) REFERENCES blogUsers(id)
ON DELETE CASCADE
        )";
*/
/*
$sql ="CREATE TABLE comments (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
co_name VARCHAR(64),
co_email VARCHAR (64),
co_post TEXT,
co_date TIMESTAMP,
bp_id INT,
FOREIGN KEY (bp_id) REFERENCES blogpost(id)
    ON DELETE CASCADE
            )";
        */   
        /*
$sql ="CREATE TABLE reply (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    rep_name VARCHAR(64),
    co_post TEXT,
    co_date TIMESTAMP,
    rep_id INT,
    FOREIGN KEY (rep_id) REFERENCES comments(id)
    ON DELETE CASCADE
                )";

*/
/*
$sql ="CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR (264),
    image LONGTEXT
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1;"; 
      */
      $sql ="CREATE TABLE profile (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR (64),
        profile TEXT
        )";

    if ($conn->query($sql) === TRUE) {
        echo "Success";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    
    $conn->close();
    ?>