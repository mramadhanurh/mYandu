<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Orangtua extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'menu' => 'orangtua',
            'page' => 'v_orangtua',
            'jml_anak' => $this->ModelAdmin->JumlahAnak(),
            'jml_ibu' => $this->ModelAdmin->JumlahIbu(),
            'jml_pemeriksaan' => $this->ModelAdmin->JumlahPemeriksaan(),
            'jml_jadwal' => $this->ModelAdmin->JumlahJadwal(),
        ];
        return view('v_template', $data);
    }
}
