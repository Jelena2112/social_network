<?php
session_start();
//var_dump($_SESSION["user_id"]);
//die("lkxlzkxzkx");
if(!isset($_SESSION["user_id"]))
{
    header("Location: ../add_new_post.php?error=Log in to leave posts");
    die();
}

if( !isset($_POST["post_name"]) || !isset($_POST["post_text"]))
{
    header("Location: ../add_new_post.php?error=All input fields must be set");
    die();
}

require "functions.php";

$postName = $_POST["post_name"];
$postText = $_POST["post_text"];

if(fieldsPostEmpty($postName, $postText))
{
    header("Location: ../add_new_post.php?error=Fields must have input");
    die();
}

require "base.php";

$userId = $_SESSION["user_id"];
//var_dump($userId);

createPost($postName, $postText, $userId);

header("Location: ../feed.php");

