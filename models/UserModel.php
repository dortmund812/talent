<?php

class UserModel
{
    public function getUserByUserName($username)
    {
        $content = getDataUserContent();
        return $content[$username] ?? array();
    }

    public function addUser($data)
    {
        $content = getDataUserContent();
        $arrAdd = [];

        foreach ($content as $key => $value) {
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

    public function validUserData($username, $email, $phone, $password)
    {
        $errors = [];
        if (!preg_match("/[a-zA-Z]/", $username)) {
            $errors[] = "El nombre de usuario no es valido, solo debe contener letras";
        }
        if (!preg_match("/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/", $email)) {
            $errors[] = "Debes ingresar un correo valido";
        }
        if (!preg_match("/^\+\d{9}$/", $phone)) {
            $errors[] = "El nombre de usuario no es valido, solo debe contener letras";
        }
        if (!preg_match("/^(?=.*[A-Z])(?=.*[\*\-.]).{6}$/", $password)) {
            $errors[] = "La contraseña no cumple con los estandares.";
        }
        return $errors;
    }
}
