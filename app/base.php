<?php

function connection()
    {
        $hosting = "localhost";
        $user = "root";
        $password = "";
        $base = "social_network";

        return mysqli_connect($hosting, $user, $password, $base);

    }

    function userExists ( string $email) : bool
    {
        $connect = connection();

        $email = $connect->real_escape_string($email);

        $query = $connect->query("SELECT * FROM users WHERE email = '$email' LIMIT 1");

        $connect->close();

        if( $query->num_rows >= 1 )
        {
            return true;
        }
        return false;
    }

    function createUser(string $name, string $phone, string  $city, string $country, string $about_me, int $age, string $email, string $password) : int
    {
        $connect = connection();

        $name = $connect->real_escape_string($name);
        $phone = $connect->real_escape_string($phone);
        $city = $connect->real_escape_string($city);
        $country = $connect->real_escape_string($country);
        $about_me = $connect->real_escape_string($about_me);
        $age = $connect->real_escape_string($age);
        $email = $connect->real_escape_string($email);
        $password =  password_hash($password, PASSWORD_DEFAULT);

        $password = $connect->real_escape_string($password);

        $query = $connect->query("INSERT INTO users 
                                (name, phone, city, country, about_me, age, email, password) 
                                VALUES
                                ('$name', '$phone', '$city', '$country', '$about_me', $age, '$email', '$password')
                        ");

        return $connect->insert_id;

    }

    function getUser (string $email) : array
    {
        $connect = connection();
        $query = $connect->query("SELECT * FROM users WHERE  email = '$email' LIMIT 1");

        $connect->close();

        return $query->fetch_assoc();
    }

    function createPost(string $postName, string $postText, int $userId) : void
    {
        $connect = connection();

        $postName = $connect->real_escape_string($postName);
        $postText = $connect->real_escape_string($postText);
        $userId = $connect->real_escape_string($userId);

        $connect->query("INSERT INTO posts (post_name, post_text, user_id) VALUES ('$postName', '$postText', $userId)");

        $connect->close();
    }