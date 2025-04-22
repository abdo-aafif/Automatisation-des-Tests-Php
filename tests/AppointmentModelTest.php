<?php
namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\AppointmentModel;

class AppointmentModelTest extends TestCase {
    public function testFindAllAppointments()
    {
        $model = new AppointmentModel();
        $appointments = $model->findAll();

        $this->assertIsArray($appointments, "findAll retourne un tableau !");
    }

    public function testInsertAppointment()
    {
        $model = new AppointmentModel();
        $data = [
            'client_name' => 'Ahmed Khouya',
            'appointment_date' => date('Y-m-d H:i:s')
        ];
        $id = $model->insert($data);

        $this->assertGreaterThan(0, $id, "ID rendez-vous inséré > 0");
    }
}
?>
