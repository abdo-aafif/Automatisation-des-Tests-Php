<?php
namespace App\Controllers;

use App\Models\NoteModel;
use CodeIgniter\Controller;

class NoteController extends Controller
{
    public function index()
    {
        $model = new NoteModel();

        $data['notes'] = $model->findAll();
        return view('notes_view', $data);
    }

    public function create()
    {
        $model = new NoteModel();

      
        $model->insert([
            'content' => $this->request->getPost('content'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/notes');
    }
}
