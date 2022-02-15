<?php
class Customer_model extends CI_Model
{

	public function getAllCustomers()
	{
		return $this->db->get("pelanggan")->result_array();
	}

	public function getCustomerById($id)
	{
		return $this->db->get_where("pelanggan", ["id_pelanggan" => $id])->row_array();
	}

	public function insertNewCustomer($customerData)
	{
		$this->db->insert("pelanggan", $customerData);
	}

	public function updateSelectedCustomer($customerData, $id)
	{
		$this->db->set("kode_pelanggan", $customerData["kode_pelanggan"]);
		$this->db->set("nama_pelanggan", $customerData["nama_pelanggan"]);
		$this->db->set("email_pelanggan", $customerData["email_pelanggan"]);
		$this->db->set("no_pelanggan", $customerData["no_pelanggan"]);
		$this->db->set("alamat_pelanggan", $customerData["alamat_pelanggan"]);
		$this->db->where("id_pelanggan", $id);
		$this->db->update("pelanggan", $customerData);
	}

	public function deleteSelectedCustomer($id)
	{
		$this->db->where("id_pelanggan", $id);
		$this->db->delete("pelanggan");
	}

	public function makeCustomerCode()
	{
		$this->db->select('RIGHT(pelanggan.kode_pelanggan, 2) as kode_pelanggan', FALSE);
		$this->db->order_by('kode_pelanggan', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get("pelanggan");
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$customerCode = intval($data->kode_pelanggan) + 1;
		} else {
			$customerCode = 1;
		}
		$date = date('dmY');
		$limit = str_pad($customerCode, 3, "0", STR_PAD_LEFT);
		$showCode = "CUS" . $date . $limit;
		return $showCode;
	}
}
