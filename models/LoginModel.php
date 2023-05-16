<?php

function getUserByUserPassword($data) {
    $content = getDataUserContent();

    $username = $data[0]["user_name"];
    $password = $data[0]["password"];

    $dataReturn = ["status" => false,"message" => "","data" => ""];

    if(!isset($content[$username])) {
        $dataReturn["message"] = "Lo siento, el usuario no se encuentra registrado.";
        return $dataReturn;
    }

    if($content[$username]["password"] != $password) {
        $dataReturn["message"] = "Lo siento, el usuario y la contraseña no coinciden.";
        return $dataReturn;
    }

    $dataReturn["status"] = true;
    $dataReturn["message"] = "Bienvenido " . $username;
    $dataReturn["data"] = $content[$username];
    return $dataReturn;
}