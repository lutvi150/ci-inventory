<?php
class Incomingitem_model extends CI_Model
{

	public function getAllIncomingItems()
	{
		$this->db->select("*");
		$this->db->from("barang_masuk");
		$this->db->join("barang", "barang.id_barang = barang_masuk.id_barang");
		$this->db->join("pemasok", "pemasok.id_pemasok = barang_masuk.id_pemasok");
		return $this->db->get()->result_array();
	}

	public function getAllIncomingItemById($id)
	{
		$this->db->select("*");
		$this->db->from("barang_masuk");
		$this->db->join("barang", "barang.id_barang = barang_masuk.id_barang");
		$this->db->join("pemasok", "pemasok.id_pemasok = barang_masuk.id_pemasok");
		$this->db->where("id_barangmasuk", $id);
		return $this->db->get()->row_array();
	}
	public function makeIncomingItemCode()
	{
		$this->db->select('RIGHT(barang_masuk.kode_barangmasuk, 2) as kode_barangmasuk', FALSE);
		$this->db->order_by('kode_barangmasuk', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get("barang_masuk");
		if ($query->num_rows() > 0) {
			$data = $query->row();
			$itemCode = intval($data->kode_barangmasuk) + 1;
		} else {
			$itemCode = 1;
		}
		$date = date('dmY');
		$limit = str_pad($itemCode, 3, "0", STR_PAD_LEFT);
		$showCode = "TRX-M" . $date . $limit;
		return $showCode;
	}

	public function insertNewIncomingItem($incomingItemData)
	{
		$this->db->insert("barang_masuk", $incomingItemData);
	}

	public function deleteSelectedIncomingItem($id)
	{
		$this->db->where("id_barangmasuk", $id);
		$this->db->delete("barang_masuk");
	}
}
