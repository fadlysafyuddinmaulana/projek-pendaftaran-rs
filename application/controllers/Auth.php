<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function auth_user()
    {
        $u = $this->input->post('nik');
        $cek = $this->M_Auth->cek_user($u);

        if ($cek->num_rows() > 0) {
            $user_data = $cek->row_array();

            $session['id_pasien']       = $user_data['id_pasien'];
            $session['patient_number']  = $user_data['patient_number'];
            $session['nik']             = $user_data['nik'];
            $session['nama_pasien']     = $user_data['nama_pasien'];
            $session['ttl']             = $user_data['ttl'];
            $session['no_telepon']      = $user_data['no_telepon'];
            $session['alamat']          = $user_data['alamat'];
            $session['jk']              = $user_data['jk'];
            $this->session->set_userdata('server_rs', $session);

            redirect('dashboard');
        } else {
            # code...;
        }
    }
}
