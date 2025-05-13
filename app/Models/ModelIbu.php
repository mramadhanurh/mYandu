<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelIbu extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_ibu')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_ibu')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_ibu')
            ->where('id_ibu', $data['id_ibu'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_ibu')
            ->where('id_ibu', $data['id_ibu'])
            ->delete($data);
    }
}
