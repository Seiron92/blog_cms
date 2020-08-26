<?php
$profile = new Profile();
// UPDATE PROFILE TEXT
                              if (isset($_REQUEST["updateProfile"])) {
                                $author = $_SESSION['BSusername'];
                                $profileText = $_REQUEST['ptext'];
                                $profile->addPinfo($profileText, $author);
                              }
//UPDATE USER FIRST NAME
                              if (isset($_REQUEST["updateProfile"])) {
                                $author = $_SESSION['BSusername'];
                                $name = $_REQUEST['pname'];
                                $profile->addFirstName($author, $name);
                              }
                              //UPDATE USER LAST NAME
                              if (isset($_REQUEST["updateProfile"])) {
                                $author = $_SESSION['BSusername'];
                                $lname = $_REQUEST['plname'];
                                $profile->addLastName($author, $lname);
                              }
                              // UPDATE USER EMAIL
                              if (isset($_REQUEST["updateProfile"])) {
                                $author = $_SESSION['BSusername'];
                                $email = $_REQUEST['pemail'];
                                $profile->addEmail($author, $email);
                              }
                          ?>

                          