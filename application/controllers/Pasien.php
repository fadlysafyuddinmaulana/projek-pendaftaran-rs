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
        // First prepare the patient data
        $data = array(
            'nik'               => $this->input->post('nik'),
            'nama_pasien'       => $this->input->post('nama_depan') . ' ' . $this->input->post('nama_terakhir'),
            'ttl'               => $this->input->post('kota_asal') . '.' . $this->input->post('tanggal_lahir'),
            'no_telepon'        => $this->input->post('no_tel'),
            'alamat'            => $this->input->post('alamat'),
            'jk'                => $this->input->post('jk'),
            'goldar'            => $this->input->post('goldar')
        );

        // Generate QR code
        $qr_path = $this->generate_qr($data);

        // Debug: Check QR path
        var_dump($qr_path);

        if ($qr_path) {
            $data['barcode'] = $qr_path;
        } else {
            $data['barcode'] = null;
            log_message('error', 'Failed to generate QR code');
        }

        // Save to database
        $result = $this->M_Patient->register_patient($data);

        if ($result) {
            // Debug: Check data before setting flashdata
            var_dump($data);

            $this->session->set_flashdata('patient_data', $data);
            redirect('pasien/success');
        } else {
            $this->session->set_flashdata('error', 'Registration failed');
            redirect('pasien/register');
        }
    }

    private function generate_qr($data)
    {
        // Debug: Print the current path
        echo FCPATH; // This will show you where files are being saved

        // Create QR code content
        $qr_content =
            "NIK: " . $data['nik'] . "\n" .
            "Nama: " . $data['nama_pasien'] . "\n" .
            "TTL: " . $data['ttl'] . "\n" .
            "No. Telepon: " . $data['no_telepon'];

        // Ensure directory exists and is writable
        $qr_directory = FCPATH . 'qrcodes/';
        if (!file_exists($qr_directory)) {
            mkdir($qr_directory, 0777, true);
        }

        // Create unique filename
        $qr_image = 'qrcodes/patient_' . $data['nik'] . '_' . time() . '.png';
        $full_path = FCPATH . $qr_image;

        // Setup QR code parameters
        $params = array(
            'data' => $qr_content,
            'level' => 'H',
            'size' => 10,
            'savename' => $full_path
        );

        // Debug: Print parameters
        var_dump($params);

        // Generate QR code
        if ($this->ciqrcode->generate($params)) {
            // Debug: Check if file exists
            if (file_exists($full_path)) {
                return $qr_image;
            } else {
                log_message('error', 'QR Code file not created: ' . $full_path);
                return false;
            }
        }
        return false;
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
