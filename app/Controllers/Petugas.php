<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Petugas extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'menu' => 'petugas',
            'page' => 'v_petugas',
            'jml_anak' => $this->ModelAdmin->JumlahAnak(),
            'jml_ibu' => $this->ModelAdmin->JumlahIbu(),
            'jml_pemeriksaan' => $this->ModelAdmin->JumlahPemeriksaan(),
            'jml_user' => $this->ModelAdmin->JumlahUser(),
        ];
        return view('v_template', $data);
    }
}
