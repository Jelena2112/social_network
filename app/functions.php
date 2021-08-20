<?php

function fieldsEmpty (string $name, string $phone, string $city, string $country, string $about_me, int $age) : bool
    {
        if($name == "" || $phone == "" || $city =="" || $country == "" || $about_me == "" || $age == "")
            {
                return true;
            }
        return false;
    }
