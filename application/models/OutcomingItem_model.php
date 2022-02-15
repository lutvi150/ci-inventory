<?php
class Outcomingitem_model extends CI_Model
{

	public function getAllOutcomingItems()
	{
		$this->db->select("*");
		$this->db->from("barang_keluar");
		$this->db->join("barang", "barang.id_barang = barang_keluar.id_barang");
		$this->db->join("proyek", "proyek.id_proyek = barang_keluar.id_proyek");
		return $this->db->get()->result_array();
	}

	public function insertNewOutcomingItem($outcomingItemData)
	{
		$this->db->insert("barang_keluar", $outcomingItemData);
	}

	public function deleteSelectedOutcomingItem($id)
	{
		$this->db->where("id_barangkeluar", $id);
		$this->db->delete("barang_keluar");
	}

	public function makeOutcomingItemCode()
	{
		$this->db->select('RIGHT(barang_keluar.kode_barangkeluar, 2) as kode_barangkeluar', FALSE);
		$this->db->order_by('kode_barangkeluar', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get("barang_keluar");
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$itemCode = intval($data->kode_barangkeluar) + 1;
		} else {
			$itemCode = 1;
		}
		$date = date('dmY');
		$limit = str_pad($itemCode, 3, "0", STR_PAD_LEFT);
		$showCode = "TRX-K" . $date . $limit;
		return $showCode;
	}
}
