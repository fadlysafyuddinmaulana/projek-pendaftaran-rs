<?php
class M_Auth extends CI_Model
{
    public function cek_user($u)
    {
        $this->db->where('patient_number', $u);

        return $this->db->get('tb_pasien');
    }
}
