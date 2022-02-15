<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model');
        $this->load->model('Proyek_model');
        must_login();
    }

    public function index()
    {
        $data = [
            "title" => "Dashboard",
            "total_admins" => $this->db->get("users")->num_rows(),
            "total_suppliers" => $this->db->get("pemasok")->num_rows(),
            "total_customers" => $this->db->get("pelanggan")->num_rows(),
            "total_items" => $this->db->get("barang")->num_rows(),
            "total_proyek" => $this->db->get("proyek")->num_rows(),
            "total_proyekproses" => $this->db->query('select * from proyek where progres ="Proses"')->num_rows(),
            "total_proyekselesai" => $this->db->query('select * from proyek where progres ="Selesai"')->num_rows(),
            "total_nilai" => $this->Proyek_model->getTotalProyek(),
            "barang_terlaris" => $this->Item_model->getBarangTerlaris(),
            // "barang_terlaris" => $this->db->query('select * from barang order by harga_barang desc limit 4'),
        ];

        $this->load->view("v_dashboard", $data);
        // echo json_encode($this->session->userdata());
    }
}
