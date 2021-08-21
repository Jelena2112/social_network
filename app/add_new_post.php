<?php
session_start();
//var_dump($_SESSION["user_id"]);
//die("lkxlzkxzkx");
if(!isset($_SESSION["user_id"]))
{
    die("Log in to leave posts");
}

if( !isset($_POST["post_name"]) || !isset($_POST["post_text"]))
{
    die("All input fields must be set");
}

require "functions.php";

$postName = $_POST["post_name"];
$postText = $_POST["post_text"];

if(fieldsPostEmpty($postName, $postText))
{
    die("Fields must have input");
}

require "base.php";

$userId = $_SESSION["user_id"];
//var_dump($userId);

createPost($postName, $postText, $userId);

