<?php

function getUserName($username) {
    $content = getDataUserContent();
    return isset($content[$username]);
}

function addUser($data) {
    $content = getDataUserContent();
    $arrAdd = [];

    foreach($content AS $key => $value) {
        $arrAdd[$key] = $value;
    }

    $arrAdd[$data[0]["user_name"]] = array(
        "username" => $data[0]["user_name"],
        "phone" => clearInt($data[0]["phone"]),
        "email" => $data[0]["email"],
        "password" => $data[0]["password"]
    ); 

    $arrAdd = json_encode($arrAdd);
    pushDataUserContent($arrAdd);
}