<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Grafik_model');


        must_login();
    }

    function index()
    {
        $data = [
            "title" => "Kelola Grafik",
            "jml_stok" => $this->Grafik_model->get_data_stok(),
        ];



        $this->load->view('v_grafik', $data);
    }
}
