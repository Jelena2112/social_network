<?php

if( !isset($_POST['email']) || !isset($_POST['password']) )
{
    die("All input fields are required in log in");
}

require "functions.php";

$email = $_POST['email'];
$password = $_POST['password'];

if (fieldsLogInEmpty( $email, $password))
    {
        die("Fields must not be empty");
    }

require "base.php";

if( !userExists($email) )
    {
        die("Email doesnt exist in database");
    }

$user = getUser($email);

if( !password_verify($password, $user['password']) )
    {
        die("Your password is incorrect");
    }


//var_dump($user['password']);
//die("sjdkdsj");

header( "Location: ../index.php");

