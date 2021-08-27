<?php

if( !isset($_GET["id"]))
{
    die();
}
session_start();

$userId = $_SESSION["user_id"];
$postId = $_GET["id"];

//var_dump($userId);
//var_dump($postId);
 require "base.php";

 createLike( $postId, $userId);

 header("Location: ../feed.php");
