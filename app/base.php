<?php

function connection()
    {
        $hosting = "localhost";
        $user = "root";
        $password = "";
        $base = "social_network";

        return mysqli_connect($hosting, $user, $password, $base);

    }

    function createUser(string $name, string $phone, string  $city, string $country, string $about_me, int $age) : void
    {
        $connect = connection();

        $name = $connect->real_escape_string($name);
        $phone = $connect->real_escape_string($phone);
        $city = $connect->real_escape_string($city);
        $country = $connect->real_escape_string($country);
        $about_me = $connect->real_escape_string($about_me);
        $age = $connect->real_escape_string($age);

        $query = $connect->query("INSERT INTO users 
                                (name, phone, city, country, about_me, age) 
                                VALUES
                                ('$name', '$phone', '$city', '$country', '$about_me', $age)
                        ");
//
//        var_dump( mysqli_error($connect));
//

        $connect->close();

    }