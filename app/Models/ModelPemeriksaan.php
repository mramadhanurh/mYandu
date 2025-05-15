<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPemeriksaan extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_pemeriksaan')
            ->join('tbl_anak', 'tbl_anak.id_anak=tbl_pemeriksaan.id_anak')
            ->join('tbl_jadwal', 'tbl_jadwal.id_jadwal=tbl_pemeriksaan.id_jadwal')
            ->join('tbl_user', 'tbl_user.id_user=tbl_pemeriksaan.id_user')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_pemeriksaan')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_pemeriksaan')
            ->where('id_pemeriksaan', $data['id_pemeriksaan'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_pemeriksaan')
            ->where('id_pemeriksaan', $data['id_pemeriksaan'])
            ->delete($data);
    }
}
