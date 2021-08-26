<?php
session_start();

$userId = $_SESSION["user_id"];
$postId = $_GET["id"];
$like = 1;
//var_dump($userId);
//var_dump($postId);
 require "base.php";

 createLike($like, $postId, $userId);

 header("Location: ../feed.php");
