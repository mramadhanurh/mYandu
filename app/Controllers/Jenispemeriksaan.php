<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJenispemeriksaan;

class Jenispemeriksaan extends BaseController
{
    public function __construct()
    {
        $this->ModelJenispemeriksaan = new ModelJenispemeriksaan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Jenis Pemeriksaan',
            'subjudul' => 'Jenis Pemeriksaan',
            'menu' => 'jenis',
            'submenu' => '',
            'page' => 'v_jenispemeriksaan',
            'jenis' => $this->ModelJenispemeriksaan->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = [
            'nama_pemeriksaan' => $this->request->getPost('nama_pemeriksaan'),
        ];
        $this->ModelJenispemeriksaan->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('Jenispemeriksaan');
    }

    public function UpdateData($id_jenis_pemeriksaan)
    {
        $data = [
            'id_jenis_pemeriksaan' => $id_jenis_pemeriksaan,
            'nama_pemeriksaan' => $this->request->getPost('nama_pemeriksaan'),
        ];
        $this->ModelJenispemeriksaan->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!');
        return redirect()->to('Jenispemeriksaan');
    }

    public function DeleteData($id_jenis_pemeriksaan)
    {
        $data = [
            'id_jenis_pemeriksaan' => $id_jenis_pemeriksaan,
        ];
        $this->ModelJenispemeriksaan->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('Jenispemeriksaan');
    }
}
