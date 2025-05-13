<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnak;
use App\Models\ModelIbu;

class Anak extends BaseController
{
    public function __construct()
    {
        $this->ModelAnak = new ModelAnak();
        $this->ModelIbu = new ModelIbu();
    }

    public function index()
    {
        $data = [
            'judul' => 'Anak',
            'subjudul' => 'Anak',
            'menu' => 'anak',
            'submenu' => '',
            'page' => 'v_anak',
            'anak' => $this->ModelAnak->AllData(),
            'ibu' => $this->ModelIbu->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = [
            'nama_anak' => $this->request->getPost('nama_anak'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_ibu' => $this->request->getPost('id_ibu'),
        ];
        $this->ModelAnak->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('Anak');
    }

    public function UpdateData($id_anak)
    {
        $data = [
            'id_anak' => $id_anak,
            'nama_anak' => $this->request->getPost('nama_anak'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'id_ibu' => $this->request->getPost('id_ibu'),
        ];
        $this->ModelAnak->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!');
        return redirect()->to('Anak');
    }

    public function DeleteData($id_anak)
    {
        $data = [
            'id_anak' => $id_anak,
        ];
        $this->ModelAnak->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('Anak');
    }
}
