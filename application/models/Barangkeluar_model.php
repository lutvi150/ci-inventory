<?php
class Barangkeluar_model extends CI_Model
{

    public function getAllOutcomingItems()
    {
        $this->db->select("*");
        $this->db->from("barang_keluar");
        $this->db->join("proyek", "proyek.id_proyek = barang_keluar.id_proyek");
        return $this->db->get()->result_array();
    }

    // public function insertNewOutcomingItem($outcomingItemData)
    // {
    // 	$this->db->insert("outcoming_items", $outcomingItemData);
    // }

    // public function deleteSelectedOutcomingItem($id)
    // {
    // 	$this->db->where("id_outcoming_item", $id);
    // 	$this->db->delete("outcoming_items");
    // }

    // public function makeOutcomingItemCode()
    // {
    // 	$this->db->select('RIGHT(outcoming_items.outcoming_item_code, 2) as outcoming_item_code', FALSE);
    // 	$this->db->order_by('outcoming_item_code', 'DESC');
    // 	$this->db->limit(1);
    // 	$query = $this->db->get("outcoming_items");
    // 	if ($query->num_rows() <> 0) {
    // 		$data = $query->row();
    // 		$itemCode = intval($data->outcoming_item_code) + 1;
    // 	} else {
    // 		$itemCode = 1;
    // 	}
    // 	$date = date('dmY');
    // 	$limit = str_pad($itemCode, 3, "0", STR_PAD_LEFT);
    // 	$showCode = "TRX-K" . $date . $limit;
    // 	return $showCode;
    // }
}
