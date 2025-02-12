<?php

class M_Patient extends CI_Model
{

    public function cek_nik($u)
    {
        $this->db->where('nik', $u);

        return $this->db->get('tb_pasien');
    }

    public function register_patient($data)
    {
        $this->db->trans_start();

        // Generate patient number
        $data['patient_number'] = $this->generate_patient_number();

        // Insert patient data
        $this->db->insert('tb_pasien', $data);
        $patient_id = $this->db->insert_id();

        $queue_number = $this->M_Queue->add_to_queue($patient_id);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return FALSE;
        }

        return array(
            'patient_id' => $patient_id,
            'patient_number' => $data['patient_number'],
            'queue_number' => $queue_number
        );
    }

    private function generate_patient_number()
    {
        $year = date('Y');
        $month = date('m');

        $query = $this->db->query(
            "
            SELECT MAX(patient_number) as last_number 
            FROM tb_pasien 
            WHERE patient_number LIKE ?",
            array($year . $month . '%')
        );

        $result = $query->row();
        $last_number = $result->last_number;

        if (!$last_number) {
            $sequence = '0001';
        } else {
            $sequence = substr($last_number, -4);
            $sequence = str_pad((intval($sequence) + 1), 4, '0', STR_PAD_LEFT);
        }

        return $year . $month . $sequence;
    }

    public function get_patient_by_id($id)
    {
        $query = $this->db->get_where('patients', array('id' => $id));
        return $query->row();
    }

    public function search_patients($term)
    {
        $this->db->like('patient_number', $term);
        $this->db->or_like('full_name', $term);
        $this->db->or_like('phone_number', $term);
        $query = $this->db->get('patients');
        return $query->result();
    }

    public function reset_registration_numbers()
    {
        $this->db->trans_start();

        // Create backup of current registrations
        $this->db->query(
            "
            CREATE TABLE IF NOT EXISTS patients_archive AS 
            SELECT *, CURRENT_TIMESTAMP as archived_at 
            FROM patients 
            WHERE 1=0"
        );

        // Move current registrations to archive
        $this->db->query(
            "
            INSERT INTO patients_archive 
            SELECT *, CURRENT_TIMESTAMP 
            FROM patients"
        );

        // Clear current patients table
        $this->db->truncate('patients');

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    // Get archive data
    public function get_archive_data($limit = 10, $offset = 0)
    {
        $this->db->order_by('archived_at', 'DESC');
        $query = $this->db->get('patients_archive', $limit, $offset);
        return $query->result();
    }
}
