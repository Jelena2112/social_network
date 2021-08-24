<?php

if(!isset($_POST['name']) || !isset($_POST['phone']) || !isset($_POST['city']) || !isset($_POST['country']) || !isset($_POST['about_me']) || !isset($_POST['age']) || !isset($_POST['email']) || !isset($_POST['password']) )
    {
        header( "Location: ../sign_in.php?error=All input fields are required in sign in");
    }

require "functions.php";

$name = $_POST['name'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$country = $_POST['country'];
$about_me = $_POST['about_me'];
$age = $_POST['age'];
$email = $_POST['email'];
$password = $_POST['password'];

if (fieldsEmpty($name, $phone, $city, $country, $about_me, (int) $age, $email, $password))
{
    header( "Location: ../sign_in.php?error=Fields must not be empty");
    die();
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
    header( "Location: ../sign_in.php?error=Email must be format @mail.something");
    die();
}

require "base.php";

if (userExists($email))
{
    header( "Location: ../sign_in.php?error=Email exists in database");
    die();
}

$result = createUser($name, $phone, $city, $country, $about_me, $age, $email, $password);

session_start();
$_SESSION["logged_in"] = true;
$_SESSION["user_id"] = $result;

//var_dump($_SESSION["user_id"]);

header( "Location: ../feed.php");
