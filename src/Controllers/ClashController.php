<?php

namespace App\Controllers;

use App\Services\ClashService;
use App\Services\DatabaseService;

class ClashController
{
    protected $clashService;
    protected $dbService;

    public function __construct()
    {
        $this->clashService = new ClashService();
        $this->dbService = new DatabaseService();
    }

    public function index()
    {
        $clashes = $this->clashService->getAllClashes();
        include '../src/Views/clashes/index.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'screenshot' => $_FILES['screenshot'],
                'coordinates' => $_POST['coordinates'],
                'companies' => $_POST['companies'],
                'comments' => $_POST['comments']
            ];
            $this->clashService->createClash($data);
            header('Location: /clashes');
        } else {
            include '../src/Views/clashes/create.php';
        }
    }

    public function show($id)
    {
        $clash = $this->clashService->getClashById($id);
        include '../src/Views/clashes/show.php';
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'screenshot' => $_FILES['screenshot'],
                'coordinates' => $_POST['coordinates'],
                'companies' => $_POST['companies'],
                'comments' => $_POST['comments']
            ];
            $this->clashService->updateClash($id, $data);
            header('Location: /clashes');
        } else {
            $clash = $this->clashService->getClashById($id);
            include '../src/Views/clashes/edit.php';
        }
    }

    public function delete($id)
    {
        $this->clashService->deleteClash($id);
        header('Location: /clashes');
    }
}