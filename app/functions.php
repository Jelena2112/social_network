<?php

function fieldsEmpty (string $name, string $phone, string $city, string $country, string $about_me, int $age, string $email, string $password) : bool
    {
        if($name == "" || $phone == "" || $city =="" || $country == "" || $about_me == "" || $age == "" || $email == "" || $password == "")
            {
                return true;
            }
        return false;
    }
