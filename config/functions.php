<?php

function clearData($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function clearInt($data) {
    return (int)clearData($data);
}

function clearLink($data) {
    $data = str_replace(" ", "%20", $data);
    $data = clearData($data);
    return $data;
}

function getDataUserContent() {
    if(file_exists("../data/users.json")) {
        $content = file_get_contents("../data/users.json");
        $content = json_decode($content, true);
        return $content;
    }
}

function pushDataUserContent($data) {
    if(file_exists("../data/users.json")) {
        file_put_contents("../data/users.json", $data);
    }
}