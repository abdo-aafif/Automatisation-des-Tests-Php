<?php
namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\CategoryModel;

class CategoryModelTest extends TestCase {
    public function testFindAllCategories()
    {
        $model = new CategoryModel();
        $categories = $model->findAll();

        $this->assertIsArray($categories, "findAll retourne un tableau !");
    }

    public function testInsertCategory()
    {
        $model = new CategoryModel();
        $data = ['title' => 'Électronique'];
        $id = $model->insert($data);

        $this->assertGreaterThan(0, $id, "ID catégorie inséré > 0");
    }
}
?>
