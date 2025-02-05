<?php

class Dokter extends CI_Controller
{
    public function change_status()
    {
        $status = $this->M_SQL->get_id($id_dokter)->row()->status;

        $where = array('id_dokter' => $id_dokter)

        $data = array(
            'status' => $status
        );
        $this->M_SQL->update_status($data, $where);
    }
}
