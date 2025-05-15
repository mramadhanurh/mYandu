<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJadwal;
use App\Models\ModelKategori;

class Jadwal extends BaseController
{
    public function __construct()
    {
        $this->ModelJadwal = new ModelJadwal();
        $this->ModelKategori = new ModelKategori();
    }

    public function index()
    {
        $data = [
            'judul' => 'Jadwal',
            'subjudul' => 'Jadwal',
            'menu' => 'jadwal',
            'submenu' => '',
            'page' => 'v_jadwal',
            'jadwal' => $this->ModelJadwal->AllData(),
            'kategori' => $this->ModelKategori->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = [
            'tanggal' => $this->request->getPost('tanggal'),
            'lokasi' => $this->request->getPost('lokasi'),
            'id_kategori' => $this->request->getPost('id_kategori'),
        ];
        $this->ModelJadwal->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('Jadwal');
    }

    public function UpdateData($id_jadwal)
    {
        $data = [
            'id_jadwal' => $id_jadwal,
            'tanggal' => $this->request->getPost('tanggal'),
            'lokasi' => $this->request->getPost('lokasi'),
            'id_kategori' => $this->request->getPost('id_kategori'),
        ];
        $this->ModelJadwal->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!');
        return redirect()->to('Jadwal');
    }

    public function DeleteData($id_jadwal)
    {
        $data = [
            'id_jadwal' => $id_jadwal,
        ];
        $this->ModelJadwal->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('Jadwal');
    }
}
