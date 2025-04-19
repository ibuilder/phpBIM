<?php

namespace App\Services;

use App\Models\Clash;
use App\Models\Comment;
use App\Services\DatabaseService;

class ClashService
{
    protected $dbService;

    public function __construct()
    {
        $this->dbService = new DatabaseService();
    }

    public function createClash($data)
    {
        $clash = new Clash();
        $clash->coordinates = $data['coordinates'];
        $clash->screenshot = $data['screenshot'];
        $clash->companies = $data['companies'];
        $clash->comments = $data['comments'];

        return $this->dbService->insert('clashes', $clash);
    }

    public function getClashes($filters = [])
    {
        return $this->dbService->select('clashes', $filters);
    }

    public function getClashById($id)
    {
        return $this->dbService->selectById('clashes', $id);
    }

    public function updateClash($id, $data)
    {
        return $this->dbService->update('clashes', $id, $data);
    }

    public function deleteClash($id)
    {
        return $this->dbService->delete('clashes', $id);
    }

    public function addCommentToClash($clashId, $commentData)
    {
        $comment = new Comment();
        $comment->clash_id = $clashId;
        $comment->content = $commentData['content'];

        return $this->dbService->insert('comments', $comment);
    }

    public function getCommentsForClash($clashId)
    {
        return $this->dbService->select('comments', ['clash_id' => $clashId]);
    }
}