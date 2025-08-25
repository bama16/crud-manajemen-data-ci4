<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JabatanModel;
use CodeIgniter\HTTP\ResponseInterface;

class JabatanController extends BaseController
{
    protected $modelJabatan;
    public function __construct()
    {
        $this->modelJabatan = new JabatanModel();

    }

    public function index()
    {
        $data['jabatans'] = $this->modelJabatan->findAll();
        return view('jabatan/index', $data);
    }
    public function create()
    {
        return view('jabatan/create');
    }
    public function store()
    {
        $data = [
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            'descripsi_jabatan' => $this->request->getPost('descripsi_jabatan'),
        ];
        $this->modelJabatan->insert($data);
        return redirect()->to('/jabatan');
    }
    public function show($id = null)
    {
        //
    }

    public function edit($id = null)
    {
        $data['jabatan'] = $this->modelJabatan->find($id);
        return view('jabatan/edit', $data);    
    }
    public function update($id = null)
    {
        $data = [
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
            'descripsi_jabatan' => $this->request->getPost('descripsi_jabatan'),
        ];
        $this->modelJabatan->update($id, $data);
        return redirect()->to('/jabatan');
    }
    public function delete($id = null)
    {
        $this->modelJabatan->delete($id);
        return redirect()->to('/jabatan');
    }
}
