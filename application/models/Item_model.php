<?php
class Item_model extends CI_Model
{

	public function getAllItems()
	{
		$this->db->select("*");
		$this->db->from("barang");
		$this->db->join("kategori", "kategori.id_kategori = barang.id_kategori");
		$this->db->join("satuan", "satuan.id_satuan = barang.id_satuan");
		return $this->db->get()->result_array();
	}

	public function getItemById($id)
	{
		$this->db->select("*");
		$this->db->from("barang");
		$this->db->join("kategori", "kategori.id_kategori = barang.id_kategori");
		$this->db->join("satuan", "satuan.id_satuan = barang.id_satuan");
		$this->db->where("id_barang", $id);
		return $this->db->get()->row_array();
	}

	public function insertNewItem($itemData)
	{
		$this->db->insert("barang", $itemData);
	}

	public function updateSelectedItem($itemCode, $id)
	{
		$this->db->set("id_kategori", $itemCode["id_kategori"]);
		$this->db->set("id_satuan", $itemCode["id_satuan"]);
		$this->db->set("kode_barang", $itemCode["kode_barang"]);
		$this->db->set("nama_barang", $itemCode["nama_barang"]);
		$this->db->set("foto_barang", $itemCode["foto_barang"]);
		$this->db->set("stok_barang", $itemCode["stok_barang"]);
		$this->db->set("harga_barang", $itemCode["harga_barang"]);
		$this->db->set("diskripsi_barang", $itemCode["diskripsi_barang"]);
		$this->db->where("id_barang", $id);
		$this->db->update("barang");
	}

	public function deleteSelectedItem($id)
	{
		$item = $this->Item_model->getItemById($id);
		if (file_exists('./assets/uploads/items/' . $item["foto_barang"]) && $item["foto_barang"] != "default.jpg") {
			unlink('./assets/uploads/items/' . $item["foto_barang"]);
		}
		$this->db->where("id_barang", $id);
		$this->db->delete("barang");
	}

	public function makeItemCode()
	{
		$this->db->select('RIGHT(barang.kode_barang, 2) as kode_barang', FALSE);
		$this->db->order_by('kode_barang', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get("barang");
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$itemCode = intval($data->kode_barang) + 1;
		} else {
			$itemCode = 1;
		}
		$date = date('dmY');
		$limit = str_pad($itemCode, 3, "0", STR_PAD_LEFT);
		$showCode = "BRG" . $date . $limit;
		return $showCode;
	}

	public function cekItemStock($itemId)
	{
		$this->db->join("satuan", "barang.id_satuan = Satuan.id_satuan");
		return $this->db->get_where("barang", ["id_barang" => $itemId])->row_array();
	}
	public function getBarangTerlaris()
	{
		$this->db->select("*");
		$this->db->from("barang");
		$this->db->order_by('harga_barang', 'DESC');
		$this->db->limit(5);


		return $this->db->get()->result_array();
	}
}
