<?php $user = $this->session->userdata('server_rs'); ?>
<div class="main-content">
    <h1>Pendaftaran Online Rawat Jalan</h1>
    <div class="profile-card">
        <div class="profile-header">
            <img src="<?= base_url() ?>assets/web-pendaftaran-rs-online/images/user.png" alt="Foto Pasien" class="profile-img">
            <p class="profile-status"><i class="fas fa-check-circle"></i> Aktif</p>
        </div>
        <div class="profile-body">
            <div class="profile-item">
                <i class="fas fa-user"></i> <strong>Nama:</strong> <span class="span-a"><?= $user['nama_pasien'] ?></span>
            </div>
            <div class="profile-item">
                <i class="fa-solid fa-address-card"></i> <strong>NIK:</strong> <span class="span-a"><?= $user['card_number'] ?></span>
            </div>
            <div class="profile-item">
                <i class="fa-solid fa-venus-mars"></i><strong>Jenis Kelamin:</strong> <span class="span-a"><?= $user['jk'] ?></span>
            </div>
            <div class="profile-item">
                <i class="fas fa-birthday-cake"></i> <strong>Tanggal Lahir:</strong> <span class="span-a"><?= $user['date_of_birth'] ?></span>
            </div>
        </div>
    </div>
</div>