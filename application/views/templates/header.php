<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Pasien</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/web-pendaftaran-rs-online/pages/style.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <?php if ($file_header == "data-pasien-lama") { ?>
        <style>
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f5f5f5;
            }

            .header {
                background-color: #4CAF50;
                color: white;
                text-align: center;
                padding: 20px 0;
            }

            .header h1 {
                margin: 0;
            }

            .container {
                max-width: 1000px;
                margin: 30px auto;
                background-color: white;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .container h2 {
                text-align: center;
                color: #333;
            }

            .patient-info {
                margin-bottom: 15px;
                padding: 10px;
                background-color: #f1f1f1;
                border-radius: 5px;
            }

            .patient-info span {
                font-weight: bold;
            }

            .footer {
                text-align: center;
                padding: 20px;
                background-color: #222;
                color: white;
            }
        </style>
    <?php } ?>
</head>

<body>