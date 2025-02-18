<?php
class M_Auth extends CI_Model
{
    public function cek_user($u, $p)
    {
        $this->db->where('username', $u);
        $this->db->where('password', $p);

        return $this->db->get('tb_username');
    }
}
