<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPemeriksaan;
use App\Models\ModelAnak;
use App\Models\ModelJadwal;
use App\Models\ModelUser;

class Pemeriksaan extends BaseController
{
    public function __construct()
    {
        $this->ModelPemeriksaan = new ModelPemeriksaan();
        $this->ModelAnak = new ModelAnak();
        $this->ModelJadwal = new ModelJadwal();
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'judul' => 'Pemeriksaan',
            'subjudul' => 'Pemeriksaan',
            'menu' => 'pemeriksaan',
            'submenu' => '',
            'page' => 'v_pemeriksaan',
            'pemeriksaan' => $this->ModelPemeriksaan->AllData(),
            'anak' => $this->ModelAnak->AllData(),
            'jadwal' => $this->ModelJadwal->AllData(),
            'petugas' => $this->ModelUser->getPetugas(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = [
            'id_anak' => $this->request->getPost('id_anak'),
            'id_jadwal' => $this->request->getPost('id_jadwal'),
            'id_user' => $this->request->getPost('id_user'),
            'tanggal_cek' => $this->request->getPost('tanggal_cek'),
            'catatan' => $this->request->getPost('catatan'),
        ];
        $this->ModelPemeriksaan->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('Pemeriksaan');
    }

    public function UpdateData($id_pemeriksaan)
    {
        $data = [
            'id_pemeriksaan' => $id_pemeriksaan,
            'id_anak' => $this->request->getPost('id_anak'),
            'id_jadwal' => $this->request->getPost('id_jadwal'),
            'id_user' => $this->request->getPost('id_user'),
            'tanggal_cek' => $this->request->getPost('tanggal_cek'),
            'catatan' => $this->request->getPost('catatan'),
        ];
        $this->ModelPemeriksaan->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!');
        return redirect()->to('Pemeriksaan');
    }

    public function DeleteData($id_pemeriksaan)
    {
        $data = [
            'id_pemeriksaan' => $id_pemeriksaan,
        ];
        $this->ModelPemeriksaan->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('Pemeriksaan');
    }
}
