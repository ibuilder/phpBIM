<?php

class Company {
    private $id;
    private $name;
    private $users = [];

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function addUser($user) {
        $this->users[] = $user;
    }

    public function getUsers() {
        return $this->users;
    }

    public function removeUser($userId) {
        foreach ($this->users as $key => $user) {
            if ($user->getId() === $userId) {
                unset($this->users[$key]);
                break;
            }
        }
    }
}