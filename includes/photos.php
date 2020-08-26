<?php

if (isset($_FILES['Pimage'])) {

    if((($_FILES["Pimage"]["type"] == "image/jpeg") || ($_FILES["Pimage"]["type"] == 
    "image/pjpeg")) && ($_FILES["Pimage"]["size"] < 200000)) {
        if ($_FILES["Pimage"]["error"] > 0 ) {
            echo "Error message: ". $_FILES["Pimage"]["error"] . "<br />";
        }else {
if(file_exists("../../writeable/profileImages/" . $_FILES["Pimage"]["name"])){
    echo $_FILES["Pimage"]["name"] . "Already exists, choose one with another filename";
}else{

    move_uploaded_file($_FILES["Pimage"]["tmp_name"], "../../writeable/profileImages/" . $_FILES["Pimage"]["name"]);
    $storedfile = $_FILES["Pimage"]["name"];
    $author = $_SESSION['BSusername'];
    $bloguser->addImage($author, $storedfile);
}
        }
    }
}

?>