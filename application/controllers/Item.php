<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model([
			'Item_model',
			'Category_model',
			'Unit_model'
		]);
		must_login();
	}

	public function index()
	{
		$data = [
			"title" => "Kelola Barang",
			"items" => $this->Item_model->getAllItems()
		];

		$this->load->view("items/v_index", $data);
	}

	public function create()
	{
		$data = [
			"title" => "Tambah Data Barang",
			"categories" => $this->db->get("kategori")->result_array(),
			"units" => $this->db->get("satuan")->result_array(),
			"item_code" => $this->Item_model->makeItemCode()
		];

		$this->_validateFormRequest();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("items/v_create", $data);
		} else {
			// if user upload item image
			$itemImage = $_FILES["foto_barang"];
			if ($itemImage) {
				$config = [
					"allowed_types" => "jpg|jpeg|png|bmp|gif",
					"upload_path" => "./assets/uploads/items/",
					"file_name" => $this->input->post("item_code")
				];
				$this->load->library("upload", $config);
				if ($this->upload->do_upload("foto_barang")) {
					$itemImage = $this->upload->data("file_name");
				} else {
					return "default.jpg";
				}
			}
			$itemData = [
				"id_kategori" => $this->input->post("id_category"),
				"id_satuan" => $this->input->post("id_unit"),
				"kode_barang" => $this->input->post("item_code"),
				"nama_barang" => $this->input->post("item_name"),
				"foto_barang" => $itemImage,
				// "foto_barang" => "defauld.jpg",
				"stok_barang" => $this->input->post("item_stock"),
				"harga_barang" => $this->input->post("item_price"),
				"diskripsi_barang" => $this->input->post("item_description")
			];

			$this->Item_model->insertNewItem($itemData);
			$this->session->set_flashdata('message', 'Ditambah');
			redirect('item');
		}
	}

	public function update($id)
	{
		$data = [
			"title" => "Update Data Barang",
			"item" => $this->Item_model->getItemById($id),
			"categories" => $this->db->get("kategori")->result_array(),
			"units" => $this->db->get("satuan")->result_array(),
		];

		$this->_validateFormRequest();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view("items/v_update", $data);
		} else {
			$itemImage = $_FILES["item_image"];
			if ($itemImage) {
				$config = [
					"allowed_types" => "jpg|jpeg|png|bmp|gif",
					"upload_path" => "./assets/uploads/items/",
					"file_name" => $this->input->post("item_code")
				];
				$this->load->library("upload", $config);
				if ($this->upload->do_upload("item_image")) {
					$item = $this->Item_model->getItemById($id);
					$oldImage = $item["foto_barang"];
					if ($oldImage != "default.jpg") {
						unlink('./assets/uploads/items/' . $oldImage);
					}
					$newImage = $this->upload->data("file_name");
					$itemImage = $newImage;
				} else {
					$item = $this->Item_model->getItemById($id);
					$itemImage = $item["foto_barang"];
				}
			}
			$itemData = [
				"id_kategori" => $this->input->post("id_category"),
				"id_satuan" => $this->input->post("id_unit"),
				"kode_barang" => $this->input->post("item_code"),
				"nama_barang" => $this->input->post("item_name"),
				"foto_barang" => $itemImage,
				"stok_barang" => $this->input->post("item_stock"),
				"harga_barang" => $this->input->post("item_price"),
				"diskripsi_barang" => $this->input->post("item_description")
			];

			$this->Item_model->updateSelectedItem($itemData, $id);
			$this->session->set_flashdata('message', 'Diubah');
			redirect('item');
		}
	}

	public function delete($id)
	{

		$item = $this->Item_model->getItemById($id);
		if (file_exists('./assets/uploads/items/' . $item["foto_barang"]) && $item["foto_barang"]) {
			unlink('./assets/uploads/items/' . $item["foto_barang"]);
		}

		$this->Item_model->deleteSelectedItem($id);
		$this->session->set_flashdata('message', 'Dihapus');
		redirect('item');
	}

	// public function cekItemStock($id)
	// {
	// 	$itemId = encode_php_tags($id);
	// 	$query = $this->Item_model->cekItemStock($itemId);
	// 	output_json($query);
	// }

	private function _validateFormRequest()
	{
		$this->form_validation->set_rules('id_category', 'Kategori', 'required');
		$this->form_validation->set_rules('id_unit', 'Satuan', 'required');
		$this->form_validation->set_rules('item_code', 'Kode Barang', 'required');
		$this->form_validation->set_rules('item_name', 'Nama Barang', 'required');
		$this->form_validation->set_rules('item_stock', 'Stok Barang', 'required');
		$this->form_validation->Set_rules('item_price', 'Harga Barang', 'required');
	}
}
