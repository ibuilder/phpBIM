<?php

class Comment {
    private $id;
    private $clashId;
    private $userId;
    private $content;
    private $createdAt;

    public function __construct($clashId, $userId, $content) {
        $this->clashId = $clashId;
        $this->userId = $userId;
        $this->content = $content;
        $this->createdAt = date('Y-m-d H:i:s');
    }

    public function getId() {
        return $this->id;
    }

    public function getClashId() {
        return $this->clashId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getContent() {
        return $this->content;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function save() {
        // Logic to save the comment to the database
    }

    public static function findByClashId($clashId) {
        // Logic to retrieve comments by clash ID from the database
    }

    public static function delete($id) {
        // Logic to delete a comment from the database
    }
}