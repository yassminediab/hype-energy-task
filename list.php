<?php

require_once 'init.php';

if(!checkUserLoggedIn()) {
    header('Location: login.php');
}

$controller = initNewUserController();

$controller->listUsers();
