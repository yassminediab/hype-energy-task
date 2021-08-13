<?php

function validateRegister($data) {
    $errors = [];
    if (empty($data['username']))
        $errors[] = 'Username is required';
    if (empty($data['password']))
        $errors[] = 'Password is required';
    if (empty($data['email']))
        $errors[] = 'Email is required';
    if (empty($data['password_confirm']))
        $errors[] = 'Password confirmation is required';

    if ($data['password'] !== $data['password_confirm'])
        $errors[] = "Password and Password confirmation didn't match";

    if(strlen($data['password']) < 6 )
        $errors[] = "Password should be at least 6 chars";

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'invalid email format';
    }
    return $errors;
}

function validateLogin($data) {
    $errors = [];
    if (empty($data['password']))
        $errors[] = 'Password is required';
    if (empty($data['email']))
        $errors[] = 'Email is required';

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'invalid email format';
    }
    return $errors;
}