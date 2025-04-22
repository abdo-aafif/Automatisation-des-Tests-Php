<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'db_users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','email'];
}?>