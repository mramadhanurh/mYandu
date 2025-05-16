<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDetailpemeriksaan;
use App\Models\ModelPemeriksaan;
use App\Models\ModelJenispemeriksaan;

class Detailpemeriksaan extends BaseController
{
    public function __construct()
    {
        $this->ModelDetailpemeriksaan = new ModelDetailpemeriksaan();
        $this->ModelPemeriksaan = new ModelPemeriksaan();
        $this->ModelJenispemeriksaan = new ModelJenispemeriksaan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Detail Pemeriksaan',
            'subjudul' => 'Detail Pemeriksaan',
            'menu' => 'detail',
            'submenu' => '',
            'page' => 'v_detailpemeriksaan',
            'detail' => $this->ModelDetailpemeriksaan->AllData(),
            'pemeriksaan' => $this->ModelPemeriksaan->AllData(),
            'jenis' => $this->ModelJenispemeriksaan->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = [
            'id_pemeriksaan' => $this->request->getPost('id_pemeriksaan'),
            'id_jenis_pemeriksaan' => $this->request->getPost('id_jenis_pemeriksaan'),
            'hasil' => $this->request->getPost('hasil'),
        ];
        $this->ModelDetailpemeriksaan->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('Detailpemeriksaan');
    }

    public function UpdateData($id_detail)
    {
        $data = [
            'id_detail' => $id_detail,
            'id_pemeriksaan' => $this->request->getPost('id_pemeriksaan'),
            'id_jenis_pemeriksaan' => $this->request->getPost('id_jenis_pemeriksaan'),
            'hasil' => $this->request->getPost('hasil'),
        ];
        $this->ModelDetailpemeriksaan->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!');
        return redirect()->to('Detailpemeriksaan');
    }

    public function DeleteData($id_detail)
    {
        $data = [
            'id_detail' => $id_detail,
        ];
        $this->ModelDetailpemeriksaan->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('Detailpemeriksaan');
    }
}
