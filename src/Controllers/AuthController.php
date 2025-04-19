<?php

namespace App\Controllers;

use App\Services\AuthService;
use App\Services\DatabaseService;

class AuthController
{
    protected $authService;
    protected $dbService;

    public function __construct()
    {
        $this->authService = new AuthService();
        $this->dbService = new DatabaseService();
    }

    public function register($request)
    {
        $data = $request->getBody();
        $result = $this->authService->register($data);

        if ($result['success']) {
            // Redirect to login or dashboard
            header("Location: /auth/login");
            exit;
        } else {
            // Handle registration error
            return $this->render('auth/register', ['errors' => $result['errors']]);
        }
    }

    public function login($request)
    {
        $data = $request->getBody();
        $result = $this->authService->login($data);

        if ($result['success']) {
            // Redirect to dashboard
            header("Location: /projects");
            exit;
        } else {
            // Handle login error
            return $this->render('auth/login', ['errors' => $result['errors']]);
        }
    }

    public function logout()
    {
        $this->authService->logout();
        header("Location: /auth/login");
        exit;
    }

    protected function render($view, $data = [])
    {
        extract($data);
        include "../src/Views/{$view}.php";
    }
}