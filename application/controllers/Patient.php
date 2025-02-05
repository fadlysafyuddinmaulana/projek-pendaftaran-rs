<?php

class Patient extends CI_Controller
{
    public function register()
    {
        $this->load->view('patient/register');
    }

    public function verify()
    {
        // Set validation rules
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|exact_length[16]');
        $this->form_validation->set_rules('full_name', 'Full Name', 'required|min_length[3]');
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('patient/register');
        } else {
            // Prepare patient data
            $patient_data = array(
                'nik' => $this->input->post('nik'),
                'full_name' => $this->input->post('full_name'),
                'date_of_birth' => $this->input->post('date_of_birth'),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'phone_number' => $this->input->post('phone_number'),
                'email' => $this->input->post('email'),
                'created_at' => date('Y-m-d H:i:s')
            );

            // Register patient and get queue number
            $result = $this->M_Patient->register_patient($patient_data);

            if ($result) {
                // Store registration result in session
                $this->session->set_flashdata('registration_success', $result);
                redirect('patient/success');
            } else {
                $this->session->set_flashdata('error', 'Registration failed. Please try again.');
                redirect('patient/register');
            }
        }
    }

    public function success()
    {
        $data['result'] = $this->session->flashdata('registration_success');
        if (!$data['result']) {
            redirect('patient/register');
        }
        $this->load->view('patient/success', $data);
    }

    public function search()
    {
        $term = $this->input->get('term');
        $results = $this->M_Patient->search_patients($term);
        echo json_encode($results);
    }
}
