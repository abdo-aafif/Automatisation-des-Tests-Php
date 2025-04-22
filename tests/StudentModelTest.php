<?php
namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\StudentModel;

class StudentModelTest extends TestCase {
    public function testFindAllStudents()
    {
        $model = new StudentModel();
        $students = $model->findAll();

        $this->assertIsArray($students, "findAll retourne un tableau !");
    }

    public function testInsertStudent()
    {
        $model = new StudentModel();
        $data = ['name' => 'Sara Benali', 'grade' => 16.5];
        $id = $model->insert($data);

        $this->assertGreaterThan(0, $id, "ID étudiant inséré > 0");
    }
}
?>
