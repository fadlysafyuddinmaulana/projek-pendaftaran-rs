<div class="main-content">
    <h1>Pendaftaran Online Rawat Jalan</h1>
    <div class="container">
        <div class="container-a" style="width: 100%;">
            <form method="post" action="<?= base_url() ?>auth-user" enctype="multipart/form-data">
                <h1>Login Pasien</h1>
                <div class="tab-container">
                    <button class="tab-btn active" onclick="showTab('login')">Login</button>
                    <button class="tab-btn" onclick="showTab('register')">Register</button>
                </div>

                <div id="login" class="tab-content active">
                    <p class="description">Masukan username dan Password anda</p>

                    <div class="form-group">
                        <label>Username <span class="required">*</span></label>
                        <input type="text" name="username" id="username" placeholder="Masukkan Nomor Pasien" required>
                    </div>
                    <div class="form-group">
                        <label>Password<span class="required">*</span></label>
                        <input type="password" name="password" id="password" placeholder="Masukkan Password" required>
                    </div>
                    <button type="submit" class="submit-btn">Login Pasien</button>
                </div>
            </form>
            <form method="post" action="<?= base_url() ?>process-register">
                <div id="register" class="tab-content">
                    <p class="description">Register dilakukan jika anda belum mempunyai akun. Proses register hanya sekali saja dan digunakan untuk membuat akun yang nantinya berfungsi untuk login</p>
                    <div class="form-group">
                        <label>NIK<span class="required">*</span></label>
                        <input type="text" name="nik" id="nik" placeholder="Masukkan NIK" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Pasien <span class="required">*</span></label>
                        <input type="text" name="nama_pasien" id="nama_pasien" placeholder="Masukkan Nama Pasien">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin <span class="required">*</span></label>
                        <select name="jk" id="jk" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>No Telepon <span class="required">*</span></label>
                        <input type="text" name="no_whatsapp" id="no_whatsapp" placeholder="Masukkan Nama Pasien">
                    </div>
                    <div class="form-group">
                        <label>Email <span class="required">*</span></label>
                        <input type="email" name="email" id="email" placeholder="Masukkan Alamat Email" required>
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir <span class="required">*</span></label>
                        <input type="text" name="place_of_birth" id="place_of_birth" placeholder="Masukkan Tempat Lahir" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir <span class="required">*</span></label>
                        <input type="date" name="date_of_birth" id="date_of_birth" required>
                    </div>
                    <div class="form-group">
                        <label>Username<span class="required">*</span></label>
                        <input type="text" name="username" id="username" placeholder="Masukkan Password" required>
                        <?= form_error('username', '<small class="float right text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label>Password<span class="required">*</span></label>
                        <input type="password" name="password" id="tgl_lahir" placeholder="Masukkan Password">
                        <?= form_error('password', '<small class="float right text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password<span class="required">*</span></label>
                        <input type="password" name="confirmation_password" placeholder="Konfirmasi Password">
                        <?= form_error('confirmation_password', '<small class="float right text-danger">', '</small>') ?>
                    </div>
                    <button type="submit" class="submit-btn">Buat Akun</button>
                </div>
            </form>
        </div>
    </div>
</div>