<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'menu' => 'admin',
            'page' => 'v_admin',
            'jml_anak' => $this->ModelAdmin->JumlahAnak(),
            'jml_ibu' => $this->ModelAdmin->JumlahIbu(),
            'jml_pemeriksaan' => $this->ModelAdmin->JumlahPemeriksaan(),
            'jml_user' => $this->ModelAdmin->JumlahUser(),
            'all_user' => $this->ModelAdmin->AllDataUser(),
            'all_pemeriksaan' => $this->ModelAdmin->AllDataPemeriksaan(),
        ];
        return view('v_template', $data);
    }
}
