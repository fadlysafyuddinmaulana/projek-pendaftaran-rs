<?php

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ciqrcode');
    }

    public function register()
    {
        $nik = $this->input->post('nik');
        $nama_depan = $this->input->post('nama_depan');
        $nama_terakhir = $this->input->post('nama_terakhir');
        $tempat = $this->input->post('kota_asal');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $no_telp = $this->input->post('no_tel');
        $alamat =  $this->input->post('alamat');
        $jk =  $this->input->post('jk');
        $goldar = $this->input->post('goldar');

        $full_name = $nama_depan . '' . $nama_terakhir;
        $ttl = $tempat . ',' . $tanggal_lahir;

        // First prepare the patient data
        $data = array(
            'nik'               => $nik,
            'nama_pasien'       => $full_name,
            'ttl'               => $ttl,
            'no_telepon'        => $no_telp,
            'alamat'            => $alamat,
            'jk'                => $jk,
            'goldar'            => $goldar
        );

        $result = $this->M_Patient->register_patient($data);

        if ($result) {
            $qr_path = $this->generate_qr($result);
            $result['qr_code'] = $qr_path;

            $this->session->set_flashdata('patient_data', $data);
            redirect('pasien/success');
        } else {
            $this->session->set_flashdata('error', 'Registration failed');
            redirect('pasien/register');
        }
    }

    private function generate_qr($data)
    {
        $nik = $this->input->post('nik');
        $nama_depan = $this->input->post('nama_depan');
        $nama_terakhir = $this->input->post('nama_terakhir');

        $full_name = $nama_depan . ' ' . $nama_terakhir;

        $data = "Patient ID: " . $data['patient_number'] .
            "\nQueue Number: " . $data['queue_number'] .
            "\nName: " . $full_name .
            "\nNIK: " . $nik;

        // Ensure directory exists and is writable
        $qr_directory = FCPATH . 'qrcodes/';
        if (!file_exists($qr_directory)) {
            mkdir($qr_directory, 0777, true);
        }

        $qr_image = 'qrcodes/patient_' . $data['patient_number'] . '.png';
        $params['data'] = $data;
        $params['save_path'] = FCPATH . $qr_image;

        // Generate the QR code
        $this->ciqrcode->generate($params);

        return $qr_image;
    }


    public function success()
    {
        // Get the stored patient data
        $data['patient_data'] = $this->session->flashdata('patient_data');

        // Check if we have data
        if (!$data['patient_data']) {
            redirect('pasien/register');
        }

        $this->load->view('patient/success', $data);
    }
}
