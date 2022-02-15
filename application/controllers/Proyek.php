<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Proyek extends CI_Controller
{



    public function __construct()
    {


        parent::__construct();
        $this->load->model([
            'Customer_model',
            'Proyek_model'
        ]);

        must_login();
    }

    public function index()
    {
        $data = [
            "title" => "Daftar Proyek",
            "proyek" => $this->Proyek_model->getAllProyek(),
        ];

        $this->load->view("proyek/v_index", $data);
    }



    public function create()
    {
        $data = [
            "title" => "Tambah Data Proyek",
            // "categories" => $this->db->get("categories")->result_array(),
            "pelanggan" => $this->db->get("pelanggan")->result_array(),
            "proyek_code" => $this->Proyek_model->makeProyekCode()
        ];

        $this->_validateFormRequest();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("proyek/v_create", $data);
        } else {

            $itemData = [

                "kode_proyek" => $this->input->post("proyek_code"),
                "nama_proyek" => $this->input->post("proyek_name"),
                "id_pelanggan" => $this->input->post("id_customer"),
                "progres" => $this->input->post("progres"),
                "diskripsi" => $this->input->post("diskripsi"),
                "total" => $this->input->post("total"),
                "tgl_mulai" => $this->input->post("tgl_mulai"),
                "tgl_selesai" => $this->input->post("tgl_akhir"),

            ];

            $this->Proyek_model->insertNewProyek($itemData);
            $this->session->set_flashdata('message', 'Ditambah');
            redirect('proyek');
        }
    }

    public function edit($id)
    {
        $data = [
            "title" => "Ubah Data Proyek",
            // "customers" => $this->Customer_model->getCustomerById($id),
            "customers" => $this->db->get("pelanggan")->result_array(),
            "proyek" => $this->Proyek_model->getProyekById($id)
        ];

        $this->_validateFormRequest();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("proyek/v_update", $data);
        } else {
            $proyekData = [
                "kode_proyek" => $this->input->post("proyek_code"),
                "nama_proyek" => $this->input->post("proyek_name"),
                "id_pelanggan" => $this->input->post("id_customer"),
                "progres" => $this->input->post("progres"),
                "diskripsi" => $this->input->post("diskripsi"),
                "total" => $this->input->post("total"),
                "tgl_mulai" => $this->input->post("tgl_mulai"),
                "tgl_selesai" => $this->input->post("tgl_akhir"),
            ];

            $this->Proyek_model->updateSelectedProyek($proyekData, $id);
            $this->session->set_flashdata('message', 'Diubah');
            redirect('proyek');
        }
    }

    public function delete($id)
    {


        $this->Proyek_model->deleteSelectedProyek($id);
        $this->session->set_flashdata('message', 'Dihapus');
        redirect('proyek');
    }

    private function _validateFormRequest()
    {

        $this->form_validation->set_rules('proyek_name', 'Nama Proyek', 'required');
        $this->form_validation->set_rules('id_customer', 'Nama Customer', 'required');
        $this->form_validation->set_rules('total', 'Total Biaya', 'required');
        $this->form_validation->Set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->Set_rules('tgl_akhir', 'Tanggal Akhir', 'required');
    }
}
