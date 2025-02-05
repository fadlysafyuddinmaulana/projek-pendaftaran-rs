<?php


class Pasien extends CI_Controller
{

    public function create_patient()
    {
        $nik            = $this->input->post('nik');
        $nama_depan     = $this->input->post('nama_depan');
        $nama_terakhir  = $this->input->post('nama_tengah');
        $kota_asal      = $this->input->post('kota_asal');
        $tanggal_lahir  = $this->input->post('tanggal_lahir');
        $jk             = $this->input->post('jk');
        $alamat         = $this->input->post('alamat');
        $no_tel         = $this->input->post('no_tel');
        $email          = $this->input->post('email');
        $create_at      = date('Y-m-d H:i:s');

        $data = array(
            'nik'           => $nik,
            'full_name'     => $nama_depan . ' ' . $nama_terakhir,
            'ttl'           => $kota_asal . '.' . $tanggal_lahir,
            'jk'            => $jk,
            'alamat'        => $alamat,
            'no_tel'        => $no_tel,
            'email'         => $email,
            'create_at'     => $create_at,
        );

        $this->M_Patient->register_patient($data);
        redirect('');
    }
}
