<?php

class User {
    private $id;
    private $username;
    private $email;
    private $password;
    private $company_id;

    public function __construct($id, $username, $email, $password, $company_id = null) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->company_id = $company_id;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCompanyId() {
        return $this->company_id;
    }

    public function verifyPassword($password) {
        return password_verify($password, $this->password);
    }

    public function setCompanyId($company_id) {
        $this->company_id = $company_id;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'company_id' => $this->company_id
        ];
    }
}