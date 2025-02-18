<div class="main-content">
    <h1>Pendaftaran Online Rawat Jalan</h1>
    <div class="container-a">
        <h2>Alur Pendaftaran Online Pemeriksaan Rawat Jalan</h2>
        <div class="process">
            <div class="content">
                <i class="fa-solid fa-address-card"></i>
                <p>Pendaftar menyiapkan dokumen persyaratan.</p>
            </div>
            <?php $user = $this->session->userdata('server_rs');
            if ($user == '') {
                $active = 'disabled';
            } else {
                $active = '';
            }
            ?>
            <div class="content">
                <i class="fa-solid fa-user-clock"></i>
                <p>Pendaftar mendaftar secara online dan mendapatkan nomor pendaftaran.</p>
            </div>
            <div class="content">
                <i class="fa-solid fa-file-contract"></i>
                <p>Pendaftar datang ke RSUD dengan membawa berkas.</p>
            </div>
            <div class="content">
                <i class="fa-solid fa-stethoscope"></i>
                <p>Pendaftar menuju klinik untuk pemeriksaan.</p>
            </div>
        </div>

        <button class="button" onclick=" window.location.href='<?= base_url() ?>pasien-baru'" <?= $active ?>>
            Pendaftaran Online
        </button>
    </div>
</div>