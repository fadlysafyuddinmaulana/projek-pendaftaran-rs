<?php

class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Create directory for QR codes if it doesn't exist
        $qr_code_dir = FCPATH . 'assets/qrcodes/';
        if (!file_exists($qr_code_dir)) {
            mkdir($qr_code_dir, 0777, true);
        }

        // Load the QR Code library
        include APPPATH . 'third_party/phpqrcode/phpqrcode.php';
    }

    public function register()
    {
        $nik = $this->input->post('nik');
        $nama_depan = $this->input->post('nama_depan');
        $nama_terakhir = $this->input->post('nama_terakhir');
        $tempat = $this->input->post('kota_asal');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $no_telp = $this->input->post('no_tel');
        $alamat = $this->input->post('alamat');
        $jk = $this->input->post('jk');
        $goldar = $this->input->post('goldar');

        $full_name = $nama_depan . ' ' . $nama_terakhir;
        $ttl = $tempat . ',' . $tanggal_lahir;

        // Generate QR code file name first
        $qr_code_file = 'assets/qrcodes/' . $nik . '_qr.png';
        $qr_code_path = FCPATH . $qr_code_file;

        // Prepare the patient data
        $data = array(
            'nik' => $nik,
            'nama_pasien' => $full_name,
            'ttl' => $ttl,
            'no_telepon' => $no_telp,
            'alamat' => $alamat,
            'jk' => $jk,
            'goldar' => $goldar,
            'barcode' => $qr_code_file  // Include barcode field in initial data
        );

        // Register patient and get the patient number
        $result = $this->M_Patient->register_patient($data);

        if ($result) {
            // QR code content including patient number
            $qr_content = "No. Pasien: {$result['patient_number']}\n";
            $qr_content .= "NIK: $nik\n";
            $qr_content .= "Nama: $full_name\n";
            $qr_content .= "TTL: $ttl\n";
            $qr_content .= "No. Telp: $no_telp";

            // Generate QR code
            \QRcode::png($qr_content, $qr_code_path, QR_ECLEVEL_L, 10);

            // Add additional information to data array
            $data['patient_number'] = $result['patient_number'];
            $data['queue_number'] = $result['queue_number'];

            $this->session->set_flashdata('patient_data', $data);
            redirect('pasien/success');
        } else {
            $this->session->set_flashdata('error', 'Registration failed');
            redirect('pasien/register');
        }
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
