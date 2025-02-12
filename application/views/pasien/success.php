<div class="container">
    <h1 class="title">Data Kontrol Pasien</h1>

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
            <h2>Nomor Antrean:</h2>
            <div class="number"><?= $patient_data['patient_number']; ?></div>
        </div>
        <div class="alert">
            <div class="p">
                <p><b>Nomor Pasien:</b> <?= $patient_data['patient_number']; ?></p>
                <p><b>Nama:</b> <?= $patient_data['nama_pasien']; ?></p>
                <p><b>No.Hp:</b> <?= $patient_data['no_telepon']; ?></p>
                <p><b>Dokter:</b> <?= $patient_data['dokter']; ?></p>
                <p><b>Tanggal:</b> <?= $patient_data['tgl_kontrol']; ?></p>
            </div>
            <button class="download">Unduh Data</button>
        </div>
    </div>

    <a href="index.html" class="back-btn">Kembali</a>
</div>