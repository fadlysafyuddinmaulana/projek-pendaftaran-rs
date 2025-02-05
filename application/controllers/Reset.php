<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reset extends CI_Controller
{
    public function index()
    {
        $this->load->view('reset/confirm');
    }

    public function confirm()
    {
        if (!$this->input->post('confirm_reset')) {
            redirect('reset');
        }

        $this->db->trans_start();

        // Reset patient registration numbers
        $patient_reset = $this->M_Patient->reset_registration_numbers();

        // Reset queue numbers
        $queue_reset = $this->M_Queue->reset_queue();

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('error', 'Failed to reset numbers. Please try again.');
        } else {
            $this->session->set_flashdata('success', 'Registration and queue numbers have been reset successfully.');
        }

        redirect('reset');
    }

    public function view_archive()
    {
        $data['archived_patients'] = $this->M_Patient->get_archive_data();
        $this->load->view('reset/archive', $data);
    }
}
