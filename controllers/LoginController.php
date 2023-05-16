<?php 
session_start();
require_once("../config/functions.php");
require_once("../models/UserModel.php");

$error = "";
$success = "";

if(!empty($_SESSION)) {
    header('location: /talent/controllers/DashboardController.php');
}

if(!empty($_GET["user"])) {
    $success = "Usuario creado correctamente.";
}

if(!empty($_POST)) {
    if((isset($_POST['user_name']) && !empty($_POST['user_name']))
        && (isset($_POST['password']) && !empty($_POST['password']))) {
        
        $user = new UserModel;
        $username = clearData($_POST['user_name']);
        $password = clearData($_POST['password']);
        
        $userSearch = $user->getUserByUserName($username);
        if (!empty($userSearch)) {
            if ($userSearch["password"] === $password) {
                $_SESSION["user_name"] = $dataLogin["data"]["user_name"];
                $_SESSION["email"] = $dataLogin["data"]["email"];
                $_SESSION["phone"] = $dataLogin["data"]["phone"];
                header('location: /talent/controllers/DashboardController.php');
            } else {
                $error = "Lo siento, el usuario y la contraseña no coinciden.";
            }
        } else {
            $error = "Lo siento, el usuario no se encuentra registrado.";
        }
    } else {
        $error = "Completa todos los datos";
    }
}

require_once("../views/login/login.view.php");