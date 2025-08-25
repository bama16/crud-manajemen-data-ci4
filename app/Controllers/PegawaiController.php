<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use App\Models\JabatanModel;
use CodeIgniter\HTTP\ResponseInterface;

class PegawaiController extends BaseController
{
    protected $modelPegawai;
    protected $modelJabatan;
    public function __construct()
    {
        $this->modelPegawai = new PegawaiModel();
        $this->modelJabatan = new JabatanModel();
    }

    public function index()
    {
        $data['pegawais'] = $this->modelPegawai->getPegawaiWithJabatan();
        return view('pegawai/index', $data);
    }

    public function create()
    {
        $data['jabatan'] = $this->modelJabatan->findAll();
        return view('pegawai/create', $data);
    }

    public function store()
    {
        $data = [
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
            'jabatan_id' => $this->request->getPost('jabatan_id'),
        ];
        $this->modelPegawai->insert($data);
        return redirect()->to('/pegawai');
    }

    public function show($id = null)
    {
        //
    }

    public function edit($id = null)
    {
        $data = [
            'pegawai' => $this->modelPegawai->find($id),
            'jabatan' => $this->modelJabatan->findAll()
        ]; 
        return view('pegawai/edit', $data);    
    }

    public function update($id = null)
    {
        $data = [
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
            'jabatan_id' => $this->request->getPost('jabatan_id'),
        ];
        $this->modelPegawai->update($id, $data);
        return redirect()->to('/pegawai');
    }

    public function delete($id = null)
    {
        $this->modelPegawai->delete($id);
        return redirect()->to('/pegawai');
    }
    
}
