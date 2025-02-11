<style>
    .step {
        display: none;
    }

    .step.active {
        display: block;
    }
</style>
<div class="step active"> <!-- Step 1 -->
    <div class="container-a">
        <form>
            <h1>Nomor Pasien</h1>
            <div class="form-row">
                <div class="form-group">
                    <label>No. HP 1 <span class="required">*</span></label>
                    <input type="text" placeholder="Masukkan nomor HP 1" required>
                </div>
                <div class="form-group">
                    <label>No. Whatsapp <span class="required">*</span></label>
                    <input type="text" placeholder="Masukkan nomor Whatsapp" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>No. HP 2</label>
                    <input type="text" placeholder="Masukkan nomor HP 2">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Masukkan email">
                </div>
            </div>
            <button type="button" class="next submit-btn">Selanjutnya</button>
        </form>
    </div>
</div>

<div class="step"> <!-- Step 2 -->
    <div class="container-a">
        <form>
            <h1>Data Pasien</h1>
            <div class="form-row">
                <div class="form-group">
                    <label>Nama Depan <span class="required">*</span></label>
                    <input type="text" placeholder="Masukkan nama depan" required>
                </div>
                <div class="form-group">
                    <label>Nama Belakang</label>
                    <input type="text" placeholder="Masukkan nama belakang">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Jenis Identitas <span class="required">*</span></label>
                    <select required>
                        <option value="">Pilih Jenis Identitas</option>
                        <option>KTP</option>
                        <option>SIM</option>
                        <option>Passport</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>No. Identitas <span class="required">*</span></label>
                    <input type="text" placeholder="Masukkan nomor identitas" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Agama <span class="required">*</span></label>
                    <select required>
                        <option value="">Pilih Agama</option>
                        <option>Islam</option>
                        <option>Kristen</option>
                        <option>Katolik</option>
                        <option>Hindu</option>
                        <option>Buddha</option>
                        <option>Konghucu</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Status Perkawinan <span class="required">*</span></label>
                    <select required>
                        <option value="">Pilih Status</option>
                        <option>Belum Menikah</option>
                        <option>Menikah</option>
                        <option>Cerai</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Tempat Lahir <span class="required">*</span></label>
                    <input type="text" placeholder="Masukkan Tempat Lahir" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir <span class="required">*</span></label>
                    <input type="date" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Jenis Kelamin <span class="required">*</span></label>
                    <select required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pendidikan<span class="required">*</span></label>
                    <select required>
                        <option value="">Pilih Pendidikan</option>
                        <option>SD</option>
                        <option>SMP</option>
                        <option>SMA/SMK</option>
                        <option>D3</option>
                        <option>S1</option>
                        <option>S2</option>
                        <option>S3</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Pekerjaan <span class="required">*</span></label>
                    <select required>
                        <option value="">Pilih Pekerjaan</option>
                        <option>Pegawai Negeri</option>
                        <option>Pegawai Swasta</option>
                        <option>Wiraswasta</option>
                        <option>Pelajar/Mahasiswa</option>
                        <option>Tidak Bekerja</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Golongan Darah<span class="required">*</span></label>
                    <select required>
                        <option value="">Pilih Golongan Darah</option>
                        <option>A</option>
                        <option>B</option>
                        <option>AB</option>
                        <option>O</option>
                    </select>
                </div>
            </div>

            <button type="button" class="next submit-btn">Selanjutnya</button>
            <button type="button" class="prev btn-back">Kembali</button>
        </form>
    </div>
</div>

<div class="step"> <!-- Step 3 -->
    <div class="container-a">
        <form>
            <h1>Alamat Pasien</h1>
            <div class="form-row">
                <div class="form-group">
                    <label>Kota/Kabupaten<span class="required">*</span></label>
                    <input type="text" placeholder="Masukkan letak Kota/Kabupaten" required>
                </div>
                <div class="form-group">
                    <label>Provinsi <span class="required">*</span></label>
                    <input type="text" placeholder="Masukkan letak Provinsi" required>
                </div>
                <div class="form-group">
                    <label>Alamat <span class="required">*</span></label>
                    <input type="text" placeholder="Masukkan alamat" required>
                </div>
            </div>
            <button type="button" class="next submit-btn">Selanjutnya</button>
            <button type="button" class="prev btn-back">Kembali</button>
        </form>
    </div>
</div>

<div class="step"> <!-- Step 4 -->
    <div class="container-a">
        <form>
            <h1>Pilihan Dokter</h1>
            <div class="form-row">
                <div class="form-group">
                    <label>Pilih Dokter <span class="required">*</span></label>
                    <select required>
                        <option value="">Pilih Dokter</option>
                        <option>Dr. Richard</option>
                        <option>Dr. Amba</option>
                        <option>Dr. Imut</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Pilih Spesialis <span class="required">*</span></label>
                    <select required>
                        <option value="">Pilih Spesialis</option>
                        <option>Umum</option>
                        <option>Anak</option>
                        <option>Gigi</option>
                        <option>Jantung</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="keluhan-pasien">Keluhan Pasien<span class="required">*</span></label>
                <textarea id="keluhan-pasien" name="keluhan_pasien" required></textarea>
            </div>
            <button type="button" class="next submit-btn">Selanjutnya</button>
            <button type="button" class="prev btn-back">Kembali</button>
        </form>
    </div>
</div>

<div class="step"> <!-- Step 5 -->
    <div class="container-a">
        <h1 class="title">Data Pasien Dibuat!</h1>
        <div class="patient-info">
            <div class="qrcode" id="qrcode"></div>
            <script>
                var qrcode = new QRCode(document.getElementById("qrcode"), {
                    text: "https://qrco.de/bfk6Rk",
                    width: 128,
                    height: 128
                });
            </script>
            <div class="queue-number">
                <h2>Nomor Urut Pasien:</h2>
                <div class="number">001</div>
            </div>
            <div class="alert">
                <b>SIMPAN NOMOR PASIEN UNTUK LOGIN</b>
                <div class="p">
                    <p><b>Nomor Pasien:</b> 2025020001</p>
                    <p><b>NIK:</b> 123456789</p>
                    <p><b>Nama:</b> Ujang Racing</p>
                    <p><b>TTL:</b> 01 Januari 2000</p>
                    <p><b>No.Hp:</b> 08123456789</p>
                </div>
                <button class="download">Unduh Data</button>
            </div>
        </div>
        <a href="index.html" class="back-btn">Kembali ke Beranda</a>
    </div>
</div>