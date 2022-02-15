<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Model
{
    public function getData($table)
    {
        $this->db->from($table);
        return $this->db->get()->result();
    }
}

/* End of file Model.php */
