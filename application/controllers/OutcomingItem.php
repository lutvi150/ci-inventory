<?php

class Outcomingitem extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Outcomingitem_model');
		$this->load->model('Item_model');
		$this->load->model('Proyek_model');

		must_login();
	}

	public function index()
	{
		$data = [
			"title" => "Kelola Barang Keluar",
			"outcoming_items" => $this->Outcomingitem_model->getAllOutcomingItems()
		];

		$this->load->view("outcoming_items/v_index", $data);
	}

	public function create()
	{
		$data = [
			"title" => "Tambah Data Barang Keluar",
			"outcoming_item_code" => $this->Outcomingitem_model->makeOutcomingItemCode(),
			"barang" => $this->Item_model->getAllItems(),
			"proyek" => $this->Proyek_model->getProyek()
		];

		$this->form_validation->set_rules('id_proyek', 'Proyek', 'required');
		$this->form_validation->set_rules('id_items', 'Barang', 'required');
		$this->form_validation->set_rules('outcoming_item_qty', 'Jumlah Barang Keluar', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("outcoming_items/v_create", $data);
		} else {
			$outcomingItemData = [
				"id_barang" => $this->input->post("id_items"),
				"id_proyek" => $this->input->post("id_proyek"),
				"kode_barangkeluar" => $this->input->post("outcoming_item_code"),
				"jml_barangkeluar" => $this->input->post("outcoming_item_qty")
			];
			$this->Outcomingitem_model->insertNewOutcomingItem($outcomingItemData);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('outcomingitem');
		}
	}

	public function delete($id)
	{
		$this->Outcomingitem_model->deleteSelectedOutcomingItem($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('outcomingitem');
	}
}
