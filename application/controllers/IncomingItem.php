<?php
class Incomingitem extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Incomingitem_model');
		$this->load->model('Item_model');
		$this->load->model('Supplier_model');

		must_login();
	}

	public function index()
	{
		$data = [
			"title" => "Kelola Barang Masuk",
			"incoming_items" => $this->Incomingitem_model->getAllIncomingItems()
		];

		$this->load->view("incoming_items/v_index", $data);
	}



	public function create()
	{
		$data = [
			"title" => "Tambah Data Barang Masuk",
			"kode_barangmasuk" => $this->Incomingitem_model->makeIncomingItemCode(),
			"barang" => $this->Item_model->getAllItems(),
			"pemasok" => $this->Supplier_model->getAllSuppliers()
		];

		$this->form_validation->Set_rules('id_supplier', 'Supplier', 'required');
		$this->form_validation->set_rules('id_items', 'Item', 'required');
		$this->form_validation->set_rules('incoming_item_qty', 'Jumlah Stok Masuk', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("incoming_items/v_create", $data);
		} else {
			$incomingItemData = [
				"id_barang" => $this->input->post("id_items"),
				"id_pemasok" => $this->input->post("id_supplier"),
				"kode_barangmasuk" => $this->input->post("incoming_item_code"),
				"jml_barangmasuk" => $this->input->post("incoming_item_qty")
			];

			$this->Incomingitem_model->insertNewIncomingItem($incomingItemData);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('incomingitem');
		}
	}

	public function delete($id)
	{
		$this->Incomingitem_model->deleteSelectedIncomingItem($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('incomingitem');

		
	}
}
