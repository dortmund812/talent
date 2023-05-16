<?php

if(!empty($_SESSION)) {
    header('location: /talent/controllers/DashboardController.php');
} else {
    header('location: /talent/controllers/LoginController.php');
}