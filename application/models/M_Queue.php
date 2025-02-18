<?php

class M_Queue extends CI_Model
{
    public function generate_queue_number()
    {
        $today = date('Y-m-d');
        $query = $this->db->query(
            "
            SELECT MAX(queue_number) as last_number 
            FROM tb_r_queues 
            WHERE queue_date = ?",
            array($today)
        );

        $result = $query->row();
        $last_number = $result->last_number;

        if (!$last_number) {
            return 'A001';
        }

        $number = intval(substr($last_number, 1)) + 1;
        return 'A' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }


    public function add_to_queue($patient_id)
    {
        $queue_number = $this->generate_queue_number();

        $data = array(
            'queue_number' => $queue_number,
            'patient_id' => $patient_id,
            'status' => 'waiting',
            'queue_type' => 'registration',
            'queue_date' => date('Y-m-d')
        );

        $this->db->insert('tb_r_queues', $data);
        return $queue_number;
    }

    // Get current queue status
    public function get_current_queue()
    {
        $query = $this->db->query(
            "
            SELECT q.*, p.nama_pasien, p.patient_number 
            FROM tb_queues_pasien q
            JOIN tb_pasien p ON p.id_pasien = q.patient_id
            WHERE q.queue_date = CURRENT_DATE
            AND q.status IN ('waiting', 'in_progress')
            ORDER BY q.created_at ASC"
        );

        return $query->result();
    }

    // Update queue status
    public function update_status($queue_id, $status)
    {
        $data = array('status' => $status);

        if ($status == 'in_progress') {
            $data['called_at'] = date('Y-m-d H:i:s');
        } else if ($status == 'completed') {
            $data['completed_at'] = date('Y-m-d H:i:s');
        }

        $this->db->where('id', $queue_id);
        return $this->db->update('queues', $data);
    }

    public function reset_queue()
    {
        // Archive current queues
        $this->db->query(
            "
            CREATE TABLE IF NOT EXISTS queues_archive AS 
            SELECT *, CURRENT_TIMESTAMP as archived_at 
            FROM queues 
            WHERE 1=0"
        );

        // Insert current queues to archive
        $this->db->query(
            "
            INSERT INTO queues_archive 
            SELECT *, CURRENT_TIMESTAMP 
            FROM queues"
        );

        // Clear current queues table
        $this->db->truncate('queues');

        return TRUE;
    }
}
