<?php

namespace App\Models;

use CodeIgniter\Model;

class PanierModel extends Model
{
    protected $table      = 'paniers';
    protected $primaryKey = 'id';

    protected $allowedFields = ['dateCommande', 'client'];
    protected $useTimestamps = true;
}
