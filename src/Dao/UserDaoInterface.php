<?php

namespace App\Dao;

use App\Model\User;

interface UserDaoInterface {
    public function getAllUsers(): array;
    public function getUserById(int $id): ?User;
    public function getUserByEmail(string $email): ?User;
    public function newUser(User $user): int;
    public function editUser(User $user): void;
    public function deleteUser(int $id): void;
}
