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

    function getAllPosts () : array
    {
        $connect = connection();
        $result = $connect->query("SELECT posts.*, users.name FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.id DESC");

//        $user = $result["user_id"];
//
//        $users = $connect->query("SELECT * FROM users WHERE id =  $user");

        $connect->close();
        return  $result->fetch_all(MYSQLI_ASSOC);
    }

    function createComment(string $comment, int $postId, int $userId) : void
    {
        $connect = connection();

        $comment = $connect->real_escape_string($comment);
        $postId = $connect->real_escape_string($postId);

        if( !$connect->query("SELECT id FROM posts"))
        {
            die("Post Id doesnt exist in posts");
        }

        $connect->query("INSERT INTO comments (comment, user_id, post_id) VALUES ('$comment', $userId, $postId)");

        $connect->close();
    }

    function getAllComments() : array
    {
        $connect = connection();
        $result =$connect->query("SELECT * FROM comments ORDER BY id DESC ");
        $connect->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function createLike( int $postId, int $userId) : void
    {
        $connect = connection();

        $connect->query("INSERT INTO likes (post_id,user_id ) VALUES ( $postId, $userId)");
        $connect->close();
    }