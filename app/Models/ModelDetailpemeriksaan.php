<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDetailpemeriksaan extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_detail_pemeriksaan')
            ->join('tbl_pemeriksaan', 'tbl_pemeriksaan.id_pemeriksaan=tbl_detail_pemeriksaan.id_pemeriksaan')
            ->join('tbl_jenis_pemeriksaan', 'tbl_jenis_pemeriksaan.id_jenis_pemeriksaan=tbl_detail_pemeriksaan.id_jenis_pemeriksaan')
            ->join('tbl_anak', 'tbl_anak.id_anak = tbl_pemeriksaan.id_anak')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_detail_pemeriksaan')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_detail_pemeriksaan')
            ->where('id_detail', $data['id_detail'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_detail_pemeriksaan')
            ->where('id_detail', $data['id_detail'])
            ->delete($data);
    }
}
