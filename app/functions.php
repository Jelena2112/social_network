<?php

    function fieldsEmpty (string $name, string $phone, string $city, string $country, string $about_me, int $age, string $email, string $password) : bool
    {
        if($name == "" || $phone == "" || $city =="" || $country == "" || $about_me == "" || $age == "" || $email == "" || $password == "")
            {
                return true;
            }
        return false;
    }

    function fieldsLogInEmpty ( string $email, string $password) : bool
    {
        if( $email == "" || $password == "")
        {
            return true;
        }
        return false;
    }

    function fieldsPostEmpty(string $postName, string $postText) : bool
    {
        if( $postName == "" || $postText == "" )
        {
            return true;
        }
        return false;
    }

    function fieldCommentEmpty( string $comment, int $post_id) : bool
    {
        if( $comment == ""|| $post_id == "")
        {
            return true;
        }
        return false;
    }


