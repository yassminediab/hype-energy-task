<?php

interface UserRepositoryInterface
{
    public function register(User $user);
    public function getUserByEmail(string $email): ?User;
    public function get(): array;
}
