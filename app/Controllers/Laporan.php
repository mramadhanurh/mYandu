<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDetailpemeriksaan;
use App\Models\ModelPemeriksaan;
use App\Models\ModelJenispemeriksaan;
use Dompdf\Dompdf;
use Dompdf\Options;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->ModelDetailpemeriksaan = new ModelDetailpemeriksaan();
        $this->ModelPemeriksaan = new ModelPemeriksaan();
        $this->ModelJenispemeriksaan = new ModelJenispemeriksaan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan',
            'menu' => 'laporan',
            'submenu' => '',
            'page' => 'v_laporan',
            'detail' => $this->ModelDetailpemeriksaan->AllData(),
            'pemeriksaan' => $this->ModelPemeriksaan->AllData(),
            'jenis' => $this->ModelJenispemeriksaan->AllData(),
        ];
        return view('v_template', $data);
    }

    public function cetak()
    {
        $data = [
            'judul' => 'Laporan Pemeriksaan',
            'detail' => $this->ModelDetailpemeriksaan->AllData(),
        ];

        // Load view khusus cetak
        $html = view('pdf_laporan', $data);

        // Konfigurasi Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('laporan_pemeriksaan.pdf', ['Attachment' => false]);
    }
}
