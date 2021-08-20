<?php

function connection()
    {
        $hosting = "localhost";
        $user = "root";
        $password = "";
        $base = "social_network";

        return mysqli_connect($hosting, $user, $password, $base);

    }

    function createUser(string $name, string $phone, string  $city, string $country, string $about_me, int $age, string $email, string $password) : void
    {
        $connect = connection();

        $name = $connect->real_escape_string($name);
        $phone = $connect->real_escape_string($phone);
        $city = $connect->real_escape_string($city);
        $country = $connect->real_escape_string($country);
        $about_me = $connect->real_escape_string($about_me);
        $age = $connect->real_escape_string($age);
        $email = $connect->real_escape_string($email);

        $password = str_split($password);

        $password =  password_hash("rasmuslerdorf", PASSWORD_DEFAULT, $password);

        $password = $connect->real_escape_string($password);

        $query = $connect->query("INSERT INTO users 
                                (name, phone, city, country, about_me, age, email, password) 
                                VALUES
                                ('$name', '$phone', '$city', '$country', '$about_me', $age, '$email', '$password')
                        ");
//
//        var_dump( mysqli_error($connect));
//

        $connect->close();

    }