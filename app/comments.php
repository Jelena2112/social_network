<?php

if( !isset($_POST["comment"]) || !isset($_POST["post_id"]))
{
    die();
}

require "functions.php";

$comment = $_POST["comment"];
$postId = $_POST["post_id"];

if( fieldCommentEmpty($comment, $postId))
{
    die();
}
session_start();
$userId = $_SESSION["user_id"];

require "base.php";

createComment($comment, $postId, $userId);

header("Location: ../feed.php");
