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
        //
    }
    public function create()
    {
        //
    }
    public function store()
    {
        //
    }
    public function show($id = null)
    {
        //
    }

    public function edit($id = null){
        //
    }
    public function update($id = null)
    {
        //
    }
    public function delete($id = null)
    {
        //
    }
}
