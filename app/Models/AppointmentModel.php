<?php
// app/Models/AppointmentModel.php
namespace App\Models;

use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table = 'appointments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['client_name', 'appointment_date'];
}
