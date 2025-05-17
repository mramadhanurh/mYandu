<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function JumlahAnak()
    {
        return $this->db->table('tbl_anak')->countAll();
    }

    public function JumlahIbu()
    {
        return $this->db->table('tbl_ibu')->countAll();
    }

    public function JumlahPemeriksaan()
    {
        return $this->db->table('tbl_detail_pemeriksaan')->countAll();
    }

    public function JumlahUser()
    {
        return $this->db->table('tbl_user')->countAll();
    }

    public function JumlahJadwal()
    {
        return $this->db->table('tbl_jadwal')->countAll();
    }

    public function AllDataUser()
    {
        return $this->db->table('tbl_user')
            ->limit(5)
            ->get()
            ->getResultArray();
    }

    public function AllDataPemeriksaan()
    {
        return $this->db->table('tbl_detail_pemeriksaan')
            ->join('tbl_pemeriksaan', 'tbl_pemeriksaan.id_pemeriksaan=tbl_detail_pemeriksaan.id_pemeriksaan')
            ->join('tbl_jenis_pemeriksaan', 'tbl_jenis_pemeriksaan.id_jenis_pemeriksaan=tbl_detail_pemeriksaan.id_jenis_pemeriksaan')
            ->join('tbl_anak', 'tbl_anak.id_anak = tbl_pemeriksaan.id_anak')
            ->limit(5)
            ->get()
            ->getResultArray();
    }
}
