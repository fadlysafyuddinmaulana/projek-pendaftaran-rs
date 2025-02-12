<style>
    .step {
        display: none;
    }

    .step.active {
        display: block;
    }
</style>
<form id="patientForm" method="post" action="<?= base_url() ?>process-patient" enctype="multipart/form-data">
    <div class="step active"> <!-- Step 1 -->
        <div class="container-a">
            <h1>Nomor Pasien</h1>
            <div class="form-row">
                <div class="form-group">
                    <label>No. HP 1 <span class="required">*</span></label>
                    <input type="text" name="no_hp1" id="no_hp1" value="08<?= random_string('numeric', 10) ?>" placeholder="Masukkan nomor HP 1" required>
                </div>
                <div class="form-group">
                    <label>No. Whatsapp <span class="required">*</span></label>
                    <input type="text" name="no_whatsapp" id="no_whatsapp" value="62<?= random_string('numeric', 11) ?>" placeholder="Masukkan nomor Whatsapp" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>No. HP 2</label>
                    <input type="text" name="no_hp2" id="no_hp2" placeholder="Masukkan nomor HP 2">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email" value="<?= $random_user['email'] ?>" placeholder="Masukkan email">
                </div>
            </div>
            <button type="button" class="next submit-btn">Selanjutnya</button>
        </div>
    </div>

    <div class="step"> <!-- Step 2 -->
        <div class="container-a">
            <h1>Data Pasien</h1>
            <div class="form-row">
                <div class="form-group">
                    <label>Nama Depan <span class="required">*</span></label>
                    <input type="text" name="nama_depan" id="nama_depan" value="<?= $random_user['front_name'] ?>" placeholder="Masukkan nama depan" required>
                </div>
                <div class="form-group">
                    <label>Nama Belakang</label>
                    <input type="text" name="nama_terakhir" id="nama_terakhir" value="<?= $random_user['back_name'] ?>" placeholder="Masukkan nama belakang">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Jenis Identitas Kartu<span class="required">*</span></label>
                    <select name="card_type" id="card_type" required>
                        <option value="">Pilih Jenis Identitas</option>
                        <option value="KTP" selected>KTP</option>
                        <option value="SIM">SIM</option>
                        <option value="Passport">Passport</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>No. Identitas <span class="required">*</span></label>
                    <input type="text" name="card_number" id="card_number" value="<?= $random_user['identity_card'] ?>" placeholder="Masukkan nomor identitas" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Agama <span class="required">*</span></label>
                    <select name="agama" id="agama" required>
                        <option value="">Pilih Agama</option>
                        <option value="Islam" selected>Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status Perkawinan <span class="required">*</span></label>
                    <select name="status_perkawinan" id="status_perkawinan" required>
                        <option value="">Pilih Status</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Menikah" selected>Menikah</option>
                        <option value="Cerai">Cerai</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Tempat Lahir <span class="required">*</span></label>
                    <input type="text" name="place_of_birth" id="place_of_birth" value="<?= $random_user['place_of_birth'] ?>" placeholder="Masukkan Tempat Lahir" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir <span class="required">*</span></label>
                    <input type="date" name="date_of_birth" id="date_of_birth" value="<?= date('Y-m-d', strtotime('-' . rand(18, 60) . ' years')) ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Jenis Kelamin <span class="required">*</span></label>
                    <select name="jk" id="jk" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L" selected>Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pendidikan<span class="required">*</span></label>
                    <select name="pendidikan" id="pendidikan" required>
                        <option value="">Pilih Pendidikan</option>
                        <option value="SD">SD</option>
                        <option value="SMP" selected>SMP</option>
                        <option value="SMA/SMK">SMA/SMK</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Pekerjaan <span class="required">*</span></label>
                    <select name="pekerjaan" id="pekerjaan" required>
                        <option value="">Pilih Pekerjaan</option>
                        <option value="Pegawai Negeri">Pegawai Negeri</option>
                        <option value="Pegawai Swasta" selected>Pegawai Swasta</option>
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Golongan Darah<span class="required">*</span></label>
                    <select name="goldar" id="goldar" required>
                        <option value="">Pilih Golongan Darah</option>
                        <option value="A" selected>A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                        <option value="-">-</option>
                    </select>
                </div>
            </div>

            <button type="button" class="next submit-btn">Selanjutnya</button>
            <button type="button" class="prev btn-back">Kembali</button>
        </div>
    </div>

    <div class="step"> <!-- Step 3 -->
        <div class="container-a">
            <div class="form-row">
                <div class="form-group">
                    <label>Provinsi <span class="required">*</span></label>
                    <select class="select2" id="provinsi" name="provinsi" onchange="updateCitiesAndKabupaten()" style="width: 200px;">
                        <option value="">Pilih Provinsi</option>
                        <option value="aceh">Aceh</option>
                        <option value="sumatera_utara">Sumatera Utara</option>
                        <option value="sumatera_barat">Sumatera Barat</option>
                        <option value="riau">Riau</option>
                        <option value="kepulauan_riau">Kepulauan Riau</option>
                        <option value="jambi">Jambi</option>
                        <option value="sumatera_selatan">Sumatera Selatan</option>
                        <option value="bengkulu">Bengkulu</option>
                        <option value="lampung">Lampung</option>
                        <option value="bangka_belitung">Bangka Belitung</option>
                        <option value="banten">Banten</option>
                        <option value="dki_jakarta">DKI Jakarta</option>
                        <option value="jawa_barat">Jawa Barat</option>
                        <option value="jawa_tengah">Jawa Tengah</option>
                        <option value="di_yogyakarta">DI Yogyakarta</option>
                        <option value="jawa_timur">Jawa Timur</option>
                        <option value="bali">Bali</option>
                        <option value="nusa_tenggara_barat">Nusa Tenggara Barat</option>
                        <option value="nusa_tenggara_timur">Nusa Tenggara Timur</option>
                        <option value="kalimantan_barat">Kalimantan Barat</option>
                        <option value="kalimantan_tengah">Kalimantan Tengah</option>
                        <option value="kalimantan_selatan">Kalimantan Selatan</option>
                        <option value="kalimantan_timur">Kalimantan Timur</option>
                        <option value="kalimantan_utara">Kalimantan Utara</option>
                        <option value="sulawesi_utara">Sulawesi Utara</option>
                        <option value="sulawesi_tengah">Sulawesi Tengah</option>
                        <option value="sulawesi_selatan">Sulawesi Selatan</option>
                        <option value="sulawesi_tenggara">Sulawesi Tenggara</option>
                        <option value="gorontalo">Gorontalo</option>
                        <option value="sulawesi_barat">Sulawesi Barat</option>
                        <option value="maluku">Maluku</option>
                        <option value="maluku_utara">Maluku Utara</option>
                        <option value="papua">Papua</option>
                        <option value="papua_barat">Papua Barat</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kabupaten<span class="required">*</span></label>
                    <select class="select2" id="kabupaten" name="kabupaten" style="width: 200px;">
                        <option value="">Pilih Kabupaten</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Kota<span class="required">*</span></label>
                    <select class="select2" id="kota" name="kota" style="width: 200px;">
                        <option value="">Pilih Kota</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat <span class="required">*</span></label>
                    <textarea name="alamat" id="alamat" placeholder="Masukkan alamat" required><?= $random_user['address'] ?></textarea>
                </div>
            </div>
            <button type="button" class="next submit-btn">Selanjutnya</button>
            <button type="button" class="prev btn-back">Kembali</button>
        </div>
    </div>

    <div class="step"> <!-- Step 4 -->
        <div class="container-a">
            <h1>Pilihan Dokter</h1>
            <div class="form-row">
                <div class="form-group">
                    <label>Pilih Dokter <span class="required">*</span></label>
                    <select required>
                        <option value="">Pilih Dokter</option>
                        <option value="Dr. Richard (Poli Umum)" selected>Dr. Richard (Poli Umum)</option>
                        <option value="Dr. Amba (Poli Anak)">Dr. Amba (Poli Anak)</option>
                        <option value="Dr. Imut (Poli Jantung)">Dr. Imut (Poli Jantung)</option>
                        <option value="Dr. Andre (Poli Gigi)">Dr. Andre (Poli Gigi)</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Keluhan Pasien <span class="required">*</span></label>
                <input type="text" value="sgfhjafgahj" placeholder="Masukkan Keluhan Pasien" required>
            </div>
            <button type="submit" class="submit-btn">Daftar</button>
            <button type="button" class="prev btn-back">Kembali</button>
        </div>
    </div>
</form>