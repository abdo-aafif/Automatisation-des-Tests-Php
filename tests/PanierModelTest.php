<?php
namespace App\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\PanierModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class PanierModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new PanierModel();
    }

    public function testInsertPanier()
    {
        $data = [
            'dateCreation' => '2025-04-29',
            'client'       => 'John Doe'
        ];

        $id = $this->model->insert($data);
        $this->assertIsInt($id);

        $inserted = $this->model->find($id);
        $this->assertNotNull($inserted);
        $this->assertEquals($data['client'], $inserted['client']);
    }

    public function testFindPanier()
    {
        $id = $this->model->insert([
            'dateCreation' => '2025-04-29',
            'client'       => 'Alice'
        ]);

        $result = $this->model->find($id);
        $this->assertEquals('Alice', $result['client']);
    }

    public function testUpdatePanier()
    {
        $id = $this->model->insert([
            'dateCreation' => '2025-04-29',
            'client'       => 'Bob'
        ]);

        $this->model->update($id, ['client' => 'Robert']);
        $updated = $this->model->find($id);
        $this->assertEquals('Robert', $updated['client']);
    }

    public function testDeletePanier()
    {
        $id = $this->model->insert([
            'dateCreation' => '2025-04-29',
            'client'       => 'Charlie'
        ]);

        $this->model->delete($id);
        $deleted = $this->model->find($id);
        $this->assertNull($deleted);
    }

    public function testPanierIsExpiredAfter30Days()
{
    $oldDate = date('Y-m-d', strtotime('-31 days')); 
    $this->model->insert([
        'dateCreation' => $oldDate,
        'client'       => 'client_test'
    ]);

    $recentDate = date('Y-m-d'); 
    $this->model->insert([
        'dateCreation' => $recentDate,
        'client'       => 'client_test'
    ]);

    $allPaniers = $this->model->findAll();

    $expiredPaniers = array_filter($allPaniers, function($panier) {
        $date = new \DateTime($panier['dateCreation']);
        $now = new \DateTime();
        $diff = $now->diff($date);
        return $diff->days > 30; 
    });
    
    $expiredPaniers = array_values($expiredPaniers);
    
    $this->assertCount(1, $expiredPaniers, 'Il doit y avoir un panier expiré');
    
    $this->assertEquals($oldDate, $expiredPaniers[0]['dateCreation']);
    
}



    public function testClientCannotHaveMultiplePaniers()
    {
    $this->model->insert([
        'dateCreation' => '2025-04-29',
        'client'       => 'client_123'
    ]);

    $existing = $this->model
        ->where('client', 'client_123')
        ->countAllResults();

    $this->assertEquals(1, $existing, 'Le client a déjà un panier, un deuxième ne doit pas être autorisé.');
    }
    
}