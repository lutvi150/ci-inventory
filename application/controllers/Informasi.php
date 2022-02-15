<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Informasi extends CI_Controller
{



    public function __construct()
    {


        parent::__construct();
        $this->load->model([
            'Customer_model',
            'Proyek_model',
            'Supplier_model',
            'Informasi_model'
        ]);

        must_login();
    }
    public function index()
    {
        $data = [
            "title" => "Daftar Pesan",
            "informasi" => $this->Informasi_model->getAllInformasi(),
            "pelanggan" => $this->Customer_model->getAllCustomers(),
            "pemasok" => $this->Supplier_model->getAllSuppliers(),
            "informasi_code" => $this->Informasi_model->makeInformasiCode()
            // "proyek" => $this->db->query('select * from proyek where progres ="Selesai"')->result_array(),

        ];

        $this->load->view("informasi/v_index", $data);
    }
}
