<?php

if(!isset($_POST['name']) || !isset($_POST['phone']) || !isset($_POST['city']) || !isset($_POST['country']) || !isset($_POST['about_me']) || !isset($_POST['age']) || !isset($_POST['email']) || !isset($_POST['password']) )
    {
        die("All input fields are required in sign in");
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
        die("Fields must not be empty");
    }

require "base.php";

createUser($name, $phone, $city, $country, $about_me, $age, $email, $password);

header( "Location: ../index.php");
