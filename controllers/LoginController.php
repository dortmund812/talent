<?php 
session_start();
require_once("../config/functions.php");
require_once("../models/LoginModel.php");

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
            
        $username = clearData($_POST['user_name']);
        $password = clearData($_POST['password']);
    
        $dataLogin = getUserByUserPassword(
                        array(["user_name" => $username, 
                                "password" => $password]));
        if($dataLogin["status"]) {
            $_SESSION["user_name"] = $dataLogin["data"]["user_name"];
            $_SESSION["email"] = $dataLogin["data"]["email"];
            $_SESSION["phone"] = $dataLogin["data"]["phone"];
    
            header('location: /talent/controllers/DashboardController.php');
        } else {
            $error = $dataLogin["message"];
        }
    } else {
        $error = "Completa todos los datos";
    }
}

require_once("../views/login/login.view.php");