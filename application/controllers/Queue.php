<?php

class Queue extends CI_Controller
{

    public function index()
    {
        $data['current_queue'] = $this->M_Queue->get_current_queue();
        $this->load->view('queue/index', $data);
    }

    public function add()
    {
        $data['current_queue'] = $this->M_Queue->get_current_queue();
        $this->load->view('queue/add', $data);
    }

    public function display_board()
    {
        $data['current_queue'] = $this->M_Queue->get_current_queue();
        $this->load->view('queue/display_board', $data);
    }

    public function create()
    {
        $patient_number     = 'P' . date('ymd') . rand(1000, 9999);
        $full_name          = $this->input->post('full_name');
        $date_of_birth      = $this->input->post('date_of_birth');
        $phone_number       = $this->input->post('full_name');
        $data = array(
            'patient_number'        => $patient_number,
            'full_name'             => $full_name,
            'date_of_birth'         => $date_of_birth,
            'phone_number'          => $phone_number
        );

        $this->M_SQL->insert_data($data, 'patients');
        $patient_id = $this->db->insert_id();

        $queue_number = $this->M_Queue->add_to_queue($patient_id);

        $this->session->set_flashdata('success', 'Queue number :' . $queue_number);
        redirect('queue');
    }

    public function update_status()
    {
        $queue_id = $this->input->post('queue_id');
        $status = $this->input->post('status');

        $result = $this->M_Queue->update_status($queue_id, $status);

        header('Content-Type: application/json');
        echo json_encode(['success' => $result]);
    }
}
