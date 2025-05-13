<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAnak extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_anak')
            ->join('tbl_ibu', 'tbl_ibu.id_ibu=tbl_anak.id_ibu')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_anak')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_anak')
            ->where('id_anak', $data['id_anak'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_anak')
            ->where('id_anak', $data['id_anak'])
            ->delete($data);
    }
}
