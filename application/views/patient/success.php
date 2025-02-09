<!DOCTYPE html>
<html>

<head>
    <title>Registration Success</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h3 class="card-title">Registration Successful!</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h4>Patient Information</h4>
                            <div class="mb-3">
                                <?php if (isset($patient_data) && isset($patient_data['barcode']) && file_exists(FCPATH . $patient_data['barcode'])): ?>
                                    <img src="<?php echo base_url($patient_data['barcode']); ?>"
                                        alt="Patient QR Code"
                                        class="img-fluid"
                                        style="max-width: 200px;">
                                <?php else: ?>
                                    <div class="alert alert-warning">QR Code not available</div>
                                <?php endif; ?>
                            </div>

                            <div class="patient-details">
                                <p><strong>NIK:</strong> <?php echo $patient_data['nik']; ?></p>
                                <p><strong>Nama:</strong> <?php echo $patient_data['nama_pasien']; ?></p>
                                <p><strong>TTL:</strong> <?php echo $patient_data['ttl']; ?></p>
                                <p><strong>No. Telepon:</strong> <?php echo $patient_data['no_telepon']; ?></p>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="<?php echo site_url('pasien/register'); ?>"
                                class="btn btn-secondary">
                                Register Another Patient
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>