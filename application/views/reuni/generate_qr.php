<?php
require 'vendor/autoload.php'; // Pastikan Composer autoload dimuat

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

$kode = $_GET['kode'] ?? 'default';
$qrCode = QrCode::create($kode)->setSize(150)->setMargin(5);
$writer = new PngWriter();

header('Content-Type: image/png');
echo $writer->write($qrCode)->getString();
