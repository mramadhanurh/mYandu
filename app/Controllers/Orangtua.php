<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Orangtua extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'v_orangtua',
        ];
        return view('v_template', $data);
    }
}
