<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php'; // Panggil autoload Composer

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class QrGenerator extends CI_Controller
{
    // Halaman QR Code (Untuk WhatsApp)
    public function index($kode = "default")
    {
        $data['kode'] = $kode;
        $this->load->view('reuni/qr_page', $data);
    }

    public function generate($kode = "default")
    {
        $qrCode = QrCode::create($kode)->setSize(150)->setMargin(5);
        $writer = new PngWriter();

        header('Content-Type: image/png');
        echo $writer->write($qrCode)->getString();
    }
}
