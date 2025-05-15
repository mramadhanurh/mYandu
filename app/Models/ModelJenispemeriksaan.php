<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJenispemeriksaan extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_jenis_pemeriksaan')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_jenis_pemeriksaan')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_jenis_pemeriksaan')
            ->where('id_jenis_pemeriksaan', $data['id_jenis_pemeriksaan'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_jenis_pemeriksaan')
            ->where('id_jenis_pemeriksaan', $data['id_jenis_pemeriksaan'])
            ->delete($data);
    }
}
