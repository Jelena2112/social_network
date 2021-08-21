<?php

if( !isset($_POST['email']) || !isset($_POST['password']) )
{
    header("Location: ../log_in.php?error=All input fields are required in log in");
    die();
}

require "functions.php";

$email = $_POST['email'];
$password = $_POST['password'];

if (fieldsLogInEmpty( $email, $password))
{
    header("Location: ../log_in.php?error=Fields must not be empty");
    die();
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    header("Location: ../log_in.php?error=Email must be format @mail.something");
    die();
}


require "base.php";

if( !userExists($email) )
{
    header("Location: ../log_in?error=Email doesnt exist in database");
    die();
}

$user = getUser($email);

if( !password_verify($password, $user['password']) )
{
    header("Location: ../log_in?error=Your password is incorrect");
    die();
}

 session_start();
$_SESSION["logged_in"] = true;
$_SESSION["user_id"] = $user['id'];

//var_dump($_SESSION);

//var_dump($user['password']);
//die("sjdkdsj");

header( "Location: ../index.php");

