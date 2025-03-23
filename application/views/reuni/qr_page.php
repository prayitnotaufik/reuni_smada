<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code - <?= $kode ?></title>

    <!-- Open Graph Meta Tags untuk WhatsApp -->
    <meta property="og:title" content="Scan QR Code Anda!">
    <meta property="og:description" content="Gunakan QR Code ini untuk validasi peserta.">
    <meta property="og:image" content="<?= base_url('qrgenerator/generate/' . urlencode($kode)) ?>">
    <meta property="og:url" content="<?= current_url(); ?>">
    <meta property="og:type" content="website">

    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            margin: 50px;
        }

        img {
            max-width: 300px;
        }
    </style>
</head>

<body>
    <h2>Scan QR Code Anda</h2>
    <p>Kode: <?= $kode ?></p>
    <img src="<?= base_url('qrgenerator/generate/' . urlencode($kode)) ?>" alt="QR Code">
</body>

</html>