<!DOCTYPE html>
<html>

<head>
    <title>Patient Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Patient Registration</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <form method="post" action="<?= base_url() ?>tambah-pasien" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik">
                            </div>

                            <div class="mb-3">
                                <label for="full_name" class="form-label">Nama Depan*</label>
                                <input type="text" class="form-control" id="nama_depan" name="nama_depan">
                            </div>

                            <div class="mb-3">
                                <label for="full_name" class="form-label">Nama Belakang</label>
                                <input type="text" class="form-control" id="nama_terakhir" name="nama_terakhir">
                            </div>

                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Kota Asal</label>
                                <input type="text" class="form-control" id="kota_asal" name="kota_asal">
                            </div>

                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                            </div>

                            <div class="mb-3">
                                <label for="no_tel" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_tel" name="no_tel">
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jk" name="jk">
                                    <option value="">Select Gender</option>
                                    <option value="L">Male</option>
                                    <option value="P">Female</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Golongan Darah</label>
                                <select class="form-select" id="goldar" name="goldar">
                                    <option value="-">-</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Register & Get Queue Number</button>
                                <a href="<?php echo site_url('queue'); ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>