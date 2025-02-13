<div class="container-a" id="patient-data">
    <h1 class="title">Data Pasien Dibuat!</h1>
    <div class="patient-info">
        <div class="qrcode" id="qrcode">
            <?php if (isset($patient_data) && isset($patient_data['barcode']) && file_exists(FCPATH . $patient_data['barcode'])): ?>
                <img src="<?php echo base_url($patient_data['barcode']); ?>"
                    alt="Patient QR Code"
                    class="img-fluid"
                    style="max-width: 200px;">
            <?php else: ?>
                <div class="alert alert-warning">
                    QR Code not available
                    <?php
                    // Debug: Show why it's not available
                    if (!isset($patient_data)) echo "- patient_data not set<br>";
                    if (!isset($patient_data['barcode'])) echo "- barcode not set<br>";
                    if (isset($patient_data['barcode']) && !file_exists(FCPATH . $patient_data['barcode']))
                        echo "- file does not exist: " . FCPATH . $patient_data['barcode'];
                    ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="queue-number">
            <h2>Nomor Urut Pasien:</h2>
            <div class="number"><?= $patient_data['patient_number']; ?></div>
        </div>
        <div class="alert">
            <b>SIMPAN NOMOR PASIEN UNTUK LOGIN</b>
            <div class="p">
                <p><b>Nomor Pasien:</b> <?= $patient_data['patient_number']; ?></p>
                <p><b>Nomor Identitas:</b> <?= $patient_data['card_number']; ?></p>
                <p><b>Nama:</b> <?= $patient_data['nama_pasien']; ?></p>
                <p><b>TTL:</b> <?= $patient_data['ttl']; ?></p>
            </div>

            <!-- Export options -->
            <div class="export-buttons">
                <!-- Download PDF -->
                <a href="<?= base_url() ?>pasien/export_to_pdf" class="btn-export download">
                    <i class="fas fa-file-pdf"></i> Unduh PDF
                </a>

                <!-- Email PDF -->
                <a href="<?= base_url() ?>pasien/email_pdf" class="btn-export email">
                    <i class="fas fa-envelope"></i> Kirim ke Email
                </a>

                <!-- Print directly -->
                <a href="javascript:window.print();" class="btn-export print">
                    <i class="fas fa-print"></i> Cetak Langsung
                </a>
            </div>
        </div>
    </div>
    <a href="<?= base_url() ?>" class="back-btn">Kembali ke Beranda</a>
</div>

<!-- Add this CSS to your stylesheet -->
<style>
    .export-buttons {
        margin-top: 20px;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .btn-export {
        display: inline-flex;
        align-items: center;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .btn-export i {
        margin-right: 8px;
    }

    .download {
        background-color: #4CAF50;
        color: white;
    }

    .download:hover {
        background-color: #45a049;
    }

    .email {
        background-color: #2196F3;
        color: white;
    }

    .email:hover {
        background-color: #1e87db;
    }

    .print {
        background-color: #ff9800;
        color: white;
    }

    .print:hover {
        background-color: #e68a00;
    }

    /* Print styles */
    @media print {

        .export-buttons,
        .back-btn {
            display: none;
        }
    }
</style>