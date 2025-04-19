<?php

namespace App\Services;

use Supabase\Client;

class DatabaseService
{
    private $supabase;

    public function __construct()
    {
        $this->supabase = new Client('your-supabase-url', 'your-supabase-key');
    }

    public function getAll($table)
    {
        return $this->supabase->from($table)->select('*')->execute();
    }

    public function getById($table, $id)
    {
        return $this->supabase->from($table)->select('*')->eq('id', $id)->execute();
    }

    public function insert($table, $data)
    {
        return $this->supabase->from($table)->insert($data)->execute();
    }

    public function update($table, $id, $data)
    {
        return $this->supabase->from($table)->update($data)->eq('id', $id)->execute();
    }

    public function delete($table, $id)
    {
        return $this->supabase->from($table)->delete()->eq('id', $id)->execute();
    }
}