<?php


class Pasien extends CI_Controller
{
    public function create_patient()
    {
        $nik                = $this->input->post('nik');
        $nama_depan         = $this->input->post('nama_depan');
        $nama_terakhir      = $this->input->post('nama_terakhir');
        $kota_asal          = $this->input->post('kota_asal');
        $tanggal_lahir      = $this->input->post('tanggal_lahir');
        $no_tel             = $this->input->post('no_tel');
        $alamat             = $this->input->post('alamat');
        $jk                 = $this->input->post('jk');
        $goldar             = $this->input->post('goldar');

        $data = array(
            'nik'               => $nik,
            'nama_pasien'       => $nama_depan . ' ' . $nama_terakhir,
            'ttl'               => $kota_asal . '.' . $tanggal_lahir,
            'no_telepon'        => $no_tel,
            'alamat'            => $alamat,
            'jk'                => $jk,
            'goldar'            => $goldar,
        );

        $this->M_Patient->register_patient($data);
        redirect('');
    }
}
