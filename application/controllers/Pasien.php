<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $qr_code_dir =  FCPATH . 'assets/qrcodes/';
        if (!file_exists($qr_code_dir)) {
            mkdir($qr_code_dir, 0777, true);
        }

        include APPPATH . 'third_party/phpqrcode/phpqrcode.php';
    }

    public function index()
    {
        $data['title'] = 'RSI Purwokerto';
        $data['file_header'] = 1;
        $data['file_footer'] = 1;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pasien/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function register()
    {
        // Sample Data
        $first_names = ["John", "Michael", "Sarah", "Emma", "David", "Daniel", "Sophia", "Olivia"];
        $last_names = ["Smith", "Johnson", "Brown", "Williams", "Jones", "Garcia", "Miller", "Davis"];
        $places = ["New York", "Los Angeles", "Chicago", "Houston", "Phoenix", "San Diego", "Dallas", "Miami"];
        $addresses = ["123 Main St", "456 Oak Rd", "789 Pine Ave", "321 Birch Ln", "654 Cedar Dr"];
        $domains = ["gmail.com", "yahoo.com", "outlook.com", "hotmail.com", "aol.com"];

        $front_name = $first_names[array_rand($first_names)];
        $back_name = $last_names[array_rand($last_names)];
        $identity_card = $this->generate_identity_card();
        $email = $this->generate_email($front_name, $back_name, $domains);

        // Generate Random Data
        $data['random_user'] = [
            'front_name' => $first_names[array_rand($first_names)],
            'back_name' => $last_names[array_rand($last_names)],
            'place_of_birth' => $places[array_rand($places)],
            'address' => $addresses[array_rand($addresses)],
            'identity_card' => $identity_card,
            'email' => $email,
        ];

        $data['title'] = 'RSI Purwokerto';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pasien/form-pendaftaran-pasien', $data);
        $this->load->view('templates/footer', $data);
    }

    private function generate_identity_card()
    {
        return sprintf("%04d-%04d-%04d", rand(1000, 9999), rand(1000, 9999), rand(1000, 9999));
    }

    private function generate_email($first_name, $last_name, $domains)
    {
        $email_username = strtolower($first_name . "." . $last_name . rand(10, 99));
        return $email_username . "@" . $domains[array_rand($domains)];
    }

    public function form_kontrol()
    {
        $data['title'] = 'RSI Purwokerto';
        $data['file_header'] = 1;
        $data['file_footer'] = 2;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pasien/form-kontrol', $data);
        $this->load->view('templates/footer', $data);
    }

    public function success()
    {
        $data['title'] = 'RSI Purwokerto';
        $data['file_header'] = 3;
        $data['file_footer'] = 2;
        // Get the stored patient data
        $data['patient_data'] = $this->session->flashdata('patient_data');

        // Check if we have data
        if (!$data['patient_data']) {
            redirect('kontrol-pasien');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pasien/success', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create_control_patient()
    {
        $nik            = $this->input->post('nik');
        $nama_pasien    = $this->input->post('nama_pasien');
        $no_telp        = $this->input->post('no_telp');
        $dokter         = $this->input->post('dokter');
        $tgl_control    = $this->input->post('tgl_control');

        $cek_nik = $this->M_Patient->cek_nik($nik);

        if ($cek_nik->num_rows() > 0) {
            // Generate QR code file name first
            $qr_code_file = 'assets/qrcodes/' . $nik . '_qr.png';
            $qr_code_path = FCPATH . $qr_code_file;

            // Prepare the patient data
            $data = array(
                'nik'           => $nik,
                'nama_pasien'   => $nama_pasien,
                'no_telepon'    => $no_telp,
                'dokter'        => $dokter,
                'tgl_kontrol'   => $tgl_control,
                'barcode'       => $qr_code_file  // Include barcode field in initial data
            );

            // Register patient and get the patient number
            $result = $this->M_Patient->register_patient($data);

            if ($result) {
                // QR code content including patient number
                $qr_content = "No. Pasien: {$result['patient_number']}\n";
                $qr_content .= "NIK: $nik\n";
                $qr_content .= "Nama: $nama_pasien\n";
                $qr_content .= "TTL: $tgl_control\n";
                $qr_content .= "No. Telp: $no_telp";

                // Generate QR code
                \QRcode::png($qr_content, $qr_code_path, QR_ECLEVEL_L, 10);

                // Add additional information to data array
                $data['patient_number'] = $result['patient_number'];
                $data['queue_number'] = $result['queue_number'];

                $this->session->set_flashdata('patient_data', $data);
                redirect('success-pasien');
            } else {
                $this->session->set_flashdata('error', 'Registration failed');
                redirect('kontrol-pasien');
            }
        } else {
            $this->session->set_flashdata('error', 'Registration failed');
            redirect('kontrol-pasien');
        }
    }

    public function create_patient()
    {
        $card_number            = $this->input->post('card_number');
        $nama_depan             = $this->input->post('nama_depan');
        $nama_terakhir          = $this->input->post('nama_terakhir');
        $card_type              = $this->input->post('card_type');
        $email                  = $this->input->post('email');
        $no_whatsapp            = $this->input->post('no_whatsapp');
        $no_hp1                 = $this->input->post('no_hp1');
        $no_hp2                 = $this->input->post('no_hp2');
        $jk                     = $this->input->post('jk');
        $agama                  = $this->input->post('agama');
        $place_of_birth         = $this->input->post('place_of_birth');
        $date_of_birth          = $this->input->post('date_of_birth');
        $status_perkawinan      = $this->input->post('status_perkawinan');
        $pendidikan             = $this->input->post('pendidikan');
        $pekerjaan              = $this->input->post('pekerjaan');
        $goldar                 = $this->input->post('goldar');
        $provinsi               = $this->input->post('provinsi');
        $kabupaten              = $this->input->post('kabupaten');
        $kota                   = $this->input->post('kota');
        $alamat                 = $this->input->post('alamat');

        $nama_pasien            = $nama_depan . ' ' . $nama_terakhir;
        $place_and_birth        = $place_of_birth . ',' . $date_of_birth;

        // Generate QR code file name first
        $qr_code_file = 'assets/qrcodes/' . $card_number . '_qr.png';
        $qr_code_path = $qr_code_file;

        // Prepare the patient data
        $data = array(
            'card_number'           => $card_number,
            'nama_pasien'           => $nama_pasien,
            'card_type'             => $card_type,
            'email'                 => $email,
            'no_whatsapp'           => $no_whatsapp,
            'no_hp1'                => $no_hp1,
            'no_hp2'                => $no_hp2,
            'jk'                    => $jk,
            'agama'                 => $agama,
            'ttl'                   => $place_and_birth,
            'status_perkawinan'     => $status_perkawinan,
            'pendidikan'            => $pendidikan,
            'pekerjaan'             => $pekerjaan,
            'goldar'                => $goldar,
            'goldar'                => $goldar,
            'provinsi'              => $provinsi,
            'kabupaten'             => $kabupaten,
            'kota'                  => $kota,
            'alamat'                => $alamat,
            'barcode'               => $qr_code_path,
        );

        // Register patient and get the patient number
        $result = $this->M_Patient->register_patient($data);

        if ($result) {
            // QR code content including patient number
            $qr_content = "No. Pasien: {$result['patient_number']}\n";
            $qr_content .= "NIK: $nik\n";
            $qr_content .= "Nama: $nama_pasien\n";
            $qr_content .= "TTL: $tgl_control\n";
            $qr_content .= "No. Telp: $no_telp";

            // Generate QR code
            \QRcode::png($qr_content, $qr_code_path, QR_ECLEVEL_L, 10);

            // Add additional information to data array
            $data['patient_number'] = $result['patient_number'];
            $data['queue_number'] = $result['queue_number'];

            $this->session->set_flashdata('patient_data', $data);
            redirect('success-pasien');
        } else {
            $this->session->set_flashdata('error', 'Registration failed');
            redirect('kontrol-pasien');
        }
    }
}
