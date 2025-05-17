<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Kader extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'menu' => 'kader',
            'page' => 'v_kader',
            'jml_anak' => $this->ModelAdmin->JumlahAnak(),
            'jml_ibu' => $this->ModelAdmin->JumlahIbu(),
            'jml_pemeriksaan' => $this->ModelAdmin->JumlahPemeriksaan(),
            'jml_user' => $this->ModelAdmin->JumlahUser(),
        ];
        return view('v_template', $data);
    }
}
