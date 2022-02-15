<?php
class Supplier_model extends CI_Model
{

	public function getAllSuppliers()
	{
		return $this->db->get("pemasok")->result_array();
	}

	public function getSupplierById($id)
	{
		return $this->db->get_where("pemasok", ["id_pemasok" => $id])->row_array();
	}

	public function insertNewSupplier($supplierData)
	{
		$this->db->insert("pemasok", $supplierData);
	}

	public function updateSelectedSupplier($supplierData, $id)
	{
		$this->db->set("kode_pemasok", $supplierData["kode_pemasok"]);
		$this->db->set("nama_pemasok", $supplierData["nama_pemasok"]);
		$this->db->set("email_pemasok", $supplierData["email_pemasok"]);
		$this->db->set("no_pemasok", $supplierData["no_pemasok"]);
		$this->db->set("alamat_pemasok", $supplierData["alamat_pemasok"]);
		$this->db->where("id_pemasok", $id);
		$this->db->update("pemasok", $supplierData);
	}

	public function deleteSelectedSupplier($id)
	{
		$this->db->where("id_pemasok", $id);
		$this->db->delete("pemasok");
	}

	public function makeSupplierCode()
	{
		$this->db->select('RIGHT(pemasok.kode_pemasok, 2) as kode_pemasok', FALSE);
		$this->db->order_by('kode_pemasok', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get("pemasok");
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$supplierCode = intval($data->kode_pemasok) + 1;
		} else {
			$supplierCode = 1;
		}
		$date = date('dmY');
		$limit = str_pad($supplierCode, 3, "0", STR_PAD_LEFT);
		$showCode = "SPL" . $date . $limit;
		return $showCode;
	}
}
