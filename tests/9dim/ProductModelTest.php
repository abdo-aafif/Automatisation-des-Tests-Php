<?php
namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\ProductModel;

class ProductModelTest extends TestCase {
    public function testFindAllProducts()
    {
        $model = new ProductModel();
        $products = $model->findAll();

        $this->assertIsArray($products, "findAll retourne un tableau !");
    }

    public function testInsertProduct()
    {
        $model = new ProductModel();
        $data = ['name' => 'PC Gamer', 'price' => 15000.00];
        $id = $model->insert($data);

        $this->assertGreaterThan(0, $id, "ID produit inséré > 0");
    }
}
?>
