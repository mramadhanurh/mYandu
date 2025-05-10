<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kader extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'v_kader',
        ];
        return view('v_template', $data);
    }
}
