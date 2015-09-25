<?php

header("Content-Type: application/json");

$users = [
    [ "username" => "Mike", "password" => "nothing"],
    [ "username" => "Frank", "password" => "sdsd"],
    [ "username" => "Bob", "password" => "sdsdsd"],
    [ "username" => "Sue", "password" => "dsfdsfd"],
    [ "username" => "Sarah", "password" => "fgdfgdf"],
    [ "username" => "Jene", "password" => "erergerger"],
];

echo json_encode($users);