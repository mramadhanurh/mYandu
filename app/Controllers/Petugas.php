<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Petugas extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'v_petugas',
        ];
        return view('v_template', $data);
    }
}
