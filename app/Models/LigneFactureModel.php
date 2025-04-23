<?php
 namespace App\Models;
 use CodeIgniter\Model;
 
 class LigneFactureModel extends Model{
     protected $table = 'LigneFacture';
     protected $primaryKey = 'id';
     protected $allowedFields = ['article_id','Quantite','PrixUnit'];
 }?>