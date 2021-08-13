<?php

require_once 'init.php';

if(checkUserLoggedIn()) {
    header('Location: list.php');
}

$controller = initNewUserController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->register($_POST);
}
else {
    $controller->viewRegisterForm();
}