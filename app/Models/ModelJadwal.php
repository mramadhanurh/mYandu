<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwal extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_jadwal')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori=tbl_jadwal.id_kategori')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_jadwal')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_jadwal')
            ->where('id_jadwal', $data['id_jadwal'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_jadwal')
            ->where('id_jadwal', $data['id_jadwal'])
            ->delete($data);
    }
}
