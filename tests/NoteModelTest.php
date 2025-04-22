<?php
namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\NoteModel;

class NoteModelTest extends TestCase {
    public function testFindAllNotes()
    {
        $model = new NoteModel();
        $notes = $model->findAll();

        $this->assertIsArray($notes, "findAll retourne un tableau !");
    }

    public function testInsertNote()
    {
        $model = new NoteModel();
        $data = ['content' => 'Ceci est une note simple'];
        $id = $model->insert($data);

        $this->assertGreaterThan(0, $id, "ID note inséré > 0");
    }
}
?>
