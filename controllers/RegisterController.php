<?php
session_start();
require_once("../config/functions.php");
require_once("../models/UserModel.php");

$error = "";
$errorList = array();

if(!empty($_POST)) {
    if((isset($_POST['user_name']) && !empty($_POST['user_name']))
        && (isset($_POST['phone']) && !empty($_POST['phone']))
        && (isset($_POST['email']) && !empty($_POST['email']))
        && (isset($_POST['password']) && !empty($_POST['password']))) {
            
        $user = new UserModel;

        $username = clearData($_POST['user_name']);
        $phone = clearData($_POST['phone']);
        $email = clearData($_POST['email']);
        $password = clearData($_POST['password']);

        $validUser = $user->getUserByUserName($username);
        if(empty($validUser)) {
            $errorList = $user->validUserData($username, $email, $phone, $password);

            if(empty($errorList)) {
                $user->addUser(array(["user_name" => $username, "email" => $email, "phone" => $phone, "password" => $password]));
                header('location: /talent/controllers/LoginController.php?user=created');
            }
        } else {
            $error = "El usuario ya se encuentra registrado";
        }

    } else {
        $error = "Completa todos los datos";
    }
}

require_once("../views/register/register.view.php");