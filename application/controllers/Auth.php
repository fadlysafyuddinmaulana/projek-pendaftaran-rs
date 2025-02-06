<?php

class Auth extends CI_Controller
{
    public function index()
    {
        $user = $this->session->userdata('server_rs');
        $this['title']  = 'RSI PURWOKERTO';

        $this->load->view('layout/header_login', $data);
        $this->load->view('Starter-Page/Login_Pasien', $data);
        $this->load->view('layout/footer_login', $data);
    }

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

    // public function auth_petugas()
    // {
    //     $u = $this->input->post('nik');
    //     $cek = $this->M_Auth->cek_user($u);

    //     if ($cek->num_rows() > 0) {
    //         $user_data = $cek->row_array();
    //         $session['id_pasien']       = $user_data['id_pasien'];
    //         $session['nama_pasien']     = $user_data['nama_pasien'];
    //         $session['nik']             = $user_data['nik'];
    //         $session['jk']              = $user_data['jk'];
    //         $session['tanggal_lahir']   = $user_data['tanggal_lahir'];
    //         $session['role_id']         = $user_data['role_id'];
    //         $session['status']          = 1;
    //         $this->session->set_userdata('server_rs', $session);

    //         $this->M_Auth->update_user_status($user_data['id_pasien'], 'online');

    //         redirect('dashboard');
    //     } else {
    //         # code...;
    //     }
    // }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
