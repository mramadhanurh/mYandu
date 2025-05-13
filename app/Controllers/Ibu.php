<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelIbu;

class Ibu extends BaseController
{
    public function __construct()
    {
        $this->ModelIbu = new ModelIbu();
    }

    public function index()
    {
        $data = [
            'judul' => 'Ibu',
            'subjudul' => 'Ibu',
            'menu' => 'ibu',
            'submenu' => '',
            'page' => 'v_ibu',
            'ibu' => $this->ModelIbu->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = [
            'nama_ibu' => $this->request->getPost('nama_ibu'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
        ];
        $this->ModelIbu->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('Ibu');
    }

    public function UpdateData($id_ibu)
    {
        $data = [
            'id_ibu' => $id_ibu,
            'nama_ibu' => $this->request->getPost('nama_ibu'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
        ];
        $this->ModelIbu->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!');
        return redirect()->to('Ibu');
    }

    public function DeleteData($id_ibu)
    {
        $data = [
            'id_ibu' => $id_ibu,
        ];
        $this->ModelIbu->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('Ibu');
    }
}
