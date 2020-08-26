<?php
/* CHANGE ORDER ON POSTS DEPENDING ON USER SELECTION */
if (isset($_POST['options'])) {
    $options = $_POST['options'];
    switch ($options) {
      case 'DESC':
      $ORDERBY = 'id';
        $id = 'DESC';
        $post = $bloguser->getAllPosts($ORDERBY, $id);
        include("includes/orderBy.php");
        break;
      case 'ASC':
        $ORDERBY = 'id';
        $id = 'ASC';
        $post = $bloguser->getAllPosts($ORDERBY, $id);
        include("includes/orderBy.php");
        break;
      case 'TITLE1':
        $ORDERBY = 'title';
        $id = 'ASC';
        $post = $bloguser->getAllPosts($ORDERBY, $id);
        include("includes/orderBy.php");
        break;
      case 'TITLE2':
        $ORDERBY = 'title';
        $id = 'DESC';
        $post = $bloguser->getAllPosts($ORDERBY, $id);
        include("includes/orderBy.php");
        break;
      case 'AUTHOR1':
        $ORDERBY = 'author';
        $id = 'ASC';
        $post = $bloguser->getAllPosts($ORDERBY, $id);
        include("includes/orderBy.php");
        break;
      case 'AUTHOR2':
        $ORDERBY = 'author';
        $id = 'DESC';
        $post = $bloguser->getAllPosts($ORDERBY, $id);
        include("includes/orderBy.php");
        break;
      default:
      $ORDERBY = 'id';
      $id = 'DESC';
      $post = $bloguser->getAllPosts($ORDERBY, $id);
      include("includes/orderBy.php");
        break;
    }
  } else {
    $ORDERBY = 'id';
    $id = 'DESC';
    $post = $bloguser->getAllPosts($ORDERBY, $id);
    include("includes/orderBy.php");
  }
  