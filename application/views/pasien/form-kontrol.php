<?php $user = $this->session->userdata('server_rs'); ?>
<div class="main-content">
    <h1>Daftar Kontrol Pasien</h1>
    <div class="container-a">
        <form method="post" action="<?= base_url() ?>process-kontrol" enctype="multipart/form-data">
            <div class="form-section">
                <div class="form-group">
                    <label>Nomor Pasien<span class="required">*</span></label>
                    <input type="text" name="patient_number" id="patient_number" placeholder="Masukkan Nama Pasien" value="" required>
                </div>
                <div class="form-group">
                    <label>Nama Pasien <span class="required">*</span></label>
                    <input type="text" name="nama_pasien" id="nama_pasien" placeholder="Masukkan Nama Pasien" value="<?= $user['nama_pasien'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon <span class="required">*</span></label>
                    <input type="text" name="no_whatsapp" id="no_whatsapp" placeholder="Masukkan Nomor Telepon" value="<?= $user['no_whatsapp'] ?>" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin <span class="required">*</span></label>
                    <select name="jk" id="jk" required>
                        <?php if ($user['jk'] == 'Laki-Laki') : ?>
                            <option value="Laki-Laki" selected>Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        <?php elseif ($user['jk'] == 'Perempuan') : ?>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan" selected>Perempuan</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" value="<?= $user['email'] ?>" placeholder="Masukkan email">
                </div>
                <div class="form-group">
                    <label>Tempat Lahir <span class="required">*</span></label>
                    <input type="text" name="place_of_birth" id="place_of_birth" value="<?= $user['place_of_birth'] ?>" placeholder="Masukkan Tempat Lahir" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir <span class="required">*</span></label>
                    <input type="date" name="date_of_birth" id="date_of_birth" value="<?= $user['date_of_birth'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Pilih Dokter <span class="required">*</span></label>
                    <select required name="dokter" id="dokter">
                        <!-- <option value="" selected>Pilih Dokter</option> -->
                        <?php $data_doctor = $this->db->query("select * from doctors")->result();
                        ?>
                        <?php foreach ($data_doctor as $key => $value) : ?>
                            <option value="<?= $value->name ?>">
                                <?= $value->name ?> <?= $value->specialist_doctor ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Hari Tanggal Kontrol <span class="required">*</span></label>
                    <input type="date" name="tgl_control" id="tgl_control" value="<?= date('Y-m-d'); ?>" required>
                </div>
                <button type="submit" class="submit-btn">Buat Jadwal</button>
        </form>
    </div>
</div>