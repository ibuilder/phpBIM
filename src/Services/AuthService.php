<?php

namespace App\Services;

use App\Models\User;
use Supabase\SupabaseClient;

class AuthService
{
    private $supabase;

    public function __construct(SupabaseClient $supabase)
    {
        $this->supabase = $supabase;
    }

    public function register($email, $password, $companyId)
    {
        $user = $this->supabase->auth->signUp([
            'email' => $email,
            'password' => $password,
        ]);

        if ($user) {
            // Add user to company in the database
            $this->addUserToCompany($user['user']['id'], $companyId);
            return $user;
        }

        return null;
    }

    public function login($email, $password)
    {
        return $this->supabase->auth->signIn([
            'email' => $email,
            'password' => $password,
        ]);
    }

    public function logout()
    {
        return $this->supabase->auth->signOut();
    }

    private function addUserToCompany($userId, $companyId)
    {
        // Logic to add user to company in the database
        $this->supabase->from('company_users')->insert([
            'user_id' => $userId,
            'company_id' => $companyId,
        ]);
    }

    public function getUser($userId)
    {
        return $this->supabase->from('users')->select('*')->eq('id', $userId)->single();
    }
}