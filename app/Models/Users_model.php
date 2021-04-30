<?php

namespace App\Models;

use CodeIgniter\Model;

class Users_model extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id_users';

    protected $allowedFields = ['foto', 'nama_users', 'password', 'email', 'hak_akses', 'created_at'];

    public function getDataUsers($id_users = false)
    {
        if ($id_users == true) {
            return $this->where(['id_users' => $id_users])->first();
        }
        return $this->findAll();
    }
}
