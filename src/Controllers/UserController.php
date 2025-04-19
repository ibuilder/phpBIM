<?php

namespace App\Controllers;

use App\Services\AuthService;
use App\Services\DatabaseService;
use App\Models\User;

class UserController
{
    protected $authService;
    protected $databaseService;

    public function __construct()
    {
        $this->authService = new AuthService();
        $this->databaseService = new DatabaseService();
    }

    public function viewProfile($userId)
    {
        $user = $this->databaseService->getUserById($userId);
        include '../src/Views/auth/profile.php';
    }

    public function createUser($data)
    {
        $user = new User($data);
        $this->databaseService->createUser($user);
        // Redirect or return response
    }

    public function updateUser($userId, $data)
    {
        $user = new User($data);
        $this->databaseService->updateUser($userId, $user);
        // Redirect or return response
    }

    public function deleteUser($userId)
    {
        $this->databaseService->deleteUser($userId);
        // Redirect or return response
    }

    public function listUsers()
    {
        $users = $this->databaseService->getAllUsers();
        include '../src/Views/auth/userList.php';
    }
}