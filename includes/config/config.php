<?php
error_reporting(-1);
ini_set("display_errors" , 1);
function __autoload($class_name){
    include $class_name . ".php";
    
}

define("DBHOST", "studentmysql.miun.se");
define("DBUSER", "rese1800");
define("DBPASS", "5d1azfoh"); 
define("DBDATABASE", "rese1800");
/*
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", ""); 
define("DBDATABASE", "projektw2");
*/
?>