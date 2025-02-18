<?php
$user = $this->session->userdata('server_rs');
if ($user == '') {
    $icon = "fas fa-solid fa-sign-in-alt";
    $bg = "bg-primary";
    $url = 'form-log-reg';
    $btn_name = 'login';
} else {
    $icon = 'fas fa-solid fa-arrow-right-from-bracket';
    $bg = 'bg-danger';
    $url = 'logout-user';
    $btn_name = 'log out';
}

?>
<button class="menu-toggle">
    <i class="fas fa-bars"></i>
</button>

<div class="sidebar">
    <img src="<?= base_url() ?>assets/web-pendaftaran-rs-online/images/rsip.jpg" class="img" alt="Logo Rumah Sakit">
    <nav class="nav">
        <a href="<?= base_url() ?>pasien/index" class="nav-link">
            <i class="fas fa-home"></i>
            Beranda
        </a>
        <?php if ($user != '') : ?>
            <a href="<?= base_url() ?>auth/pofile_patient" class="nav-link">
                <i class="fas fa-regular fa-user"></i>
                Profile
            </a>
        <?php endif; ?>

        <a href="<?= base_url() ?>dokter" class="nav-link">
            <i class="fas fa-calendar"></i>
            Jadwal Dokter
        </a>
        <a href="https://wa.me/6282138402147" class="nav-link" target="_blank">
            <i class="fas fa-phone"></i>
            Kontak
        </a>
    </nav>

    <button class="login-button <?= $bg ?>" onclick=" window.location.href='<?= base_url() ?><?= $url ?>'">
        <i class=" <?= $icon ?>"></i> <?= $btn_name ?>
    </button>
</div>