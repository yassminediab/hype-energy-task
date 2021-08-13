<?php

interface UserServiceInterface
{
    public function register(array $input);
    public function login(string $email, string $password);
    public function listUsers();
}
