    <h1>Daftar Kontrol Pasien</h1>
    <div class="container-a">
        <form method="post" action="<?= base_url() ?>process-kontrol" enctype="multipart/form-data">
            <div class="form-section">

                <div class="form-row">
                    <div class="form-group">
                        <label>NIK(Nomor Induk Kependudukkan)<span class="required">*</span></label>
                        <input type="text" name="nik" id="nik" placeholder="Masukkan Nama Pasien" value="111" required>
                        <div class="form-group">
                            <label>Nama Pasien <span class="required">*</span></label>
                            <input type="text" name="nama_pasien" id="nama_pasien" placeholder="Masukkan Nomor Telepon" value="test" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon <span class="required">*</span></label>
                            <input type="text" name="no_telp" id="no_telp" placeholder="Masukkan Nomor Telepon" value="111" required>
                        </div>
                        <div class="form-group">
                            <label>Pilih Dokter <span class="required">*</span></label>
                            <select required name="dokter" id="dokter">
                                <option value="">Pilih Dokter</option>
                                <option value="1" selected>Dr. Richard</option>
                                <option value="2">Dr. Amba</option>
                                <option value="3">Dr. Imut</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hari Tanggal Kontrol <span class="required">*</span></label>
                            <input type="date" name="tgl_control" id="tgl_control" value="<?= date('Y-m-d'); ?>" required>
                        </div>
                        <button type="submit" class="submit-btn">Buat Jadwal</button>
                    </div>
                </div>
        </form>
    </div>