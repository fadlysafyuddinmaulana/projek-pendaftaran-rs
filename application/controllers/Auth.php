<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $user = $this->session->userdata('server_rs');
        $data['title'] = 'RSI Purwokerto';
        $data['active_tab'] = 'login';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('starter-page/form-reg-log', $data);
        $this->load->view('templates/footer', $data);
    }

    public function pofile_patient()
    {
        $user = $this->session->userdata('server_rs');
        $data['title'] = 'RSI Purwokerto';
        $data['active_tab'] = 'login';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function process_register()
    {
        $nik                        = $this->input->post('nik');
        $nama_pasien                = $this->input->post('nama_pasien');
        $no_whatsapp                = $this->input->post('no_whatsapp');
        $jk                         = $this->input->post('jk');
        $email                      = $this->input->post('email');
        $place_of_birth             = $this->input->post('place_of_birth');
        $date_of_birth              = $this->input->post('date_of_birth');
        $username                   = $this->input->post('username');
        $password                   = md5($this->input->post('password'));
        $confirmation_password      = md5($this->input->post('confirmation_password'));

        $this->form_validation->set_rules('username', 'usarname', 'required|alpha_numeric|is_unique[tb_username.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirmation_password', 'Confirmation Password', 'required|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'RSI Purwokerto';
            $data['active_tab'] = 'register';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('starter-page/form-reg-log', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = array(
                'card_number'       => $nik,
                'nama_pasien'       => $nama_pasien,
                'no_whatsapp'       => $no_whatsapp,
                'jk'                => $jk,
                'email'             => $email,
                'place_of_birth'    => $place_of_birth,
                'date_of_birth'     => $date_of_birth,
                'username'          => $username,
                'password'          => $confirmation_password,
            );
            $this->M_SQL->insert_data($data, 'tb_username');
            redirect('form-log-reg');
        }
    }

    public function auth_user()
    {
        $u = $this->input->post('username');
        $p = md5($this->input->post('password'));
        $cek = $this->M_Auth->cek_user($u, $p);

        if ($cek->num_rows() > 0) {
            $user_data = $cek->row_array();
            $session['id_username']         = $user_data['id_username'];
            $session['card_number']         = $user_data['card_number'];
            $session['nama_pasien']         = $user_data['nama_pasien'];
            $session['no_whatsapp']         = $user_data['no_whatsapp'];
            $session['jk']                  = $user_data['jk'];
            $session['email']               = $user_data['email'];
            $session['place_of_birth']      = $user_data['place_of_birth'];
            $session['date_of_birth']       = $user_data['date_of_birth'];
            $session['username']            = $user_data['username'];
            $session['password']            = $user_data['password'];
            $this->session->set_userdata('server_rs', $session);
            redirect('pasien/index');
        } else {
            redirect('pasien/index');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
