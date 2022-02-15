<?php

class User_model extends CI_Model
{

	public function getAllUsers()
	{
		return $this->db->get("users")->result_array();
	}

	public function getAllUsersDepan()
	{
		$this->db->select("*");
		$this->db->from("users");
		$this->db->limit(10);
		return $this->db->get()->result_array();
	}

	public function getUserById($id)
	{
		return $this->db->get_where("users", ["id_user" => $id])->row_array();
	}

	public function insertNewUser($userData)
	{
		$this->db->insert("users", $userData);
	}

	public function updateSelectedUser($userData, $id)
	{
		$this->db->set('nama_user', $userData["user_name"]);
		$this->db->set("email_user", $userData["user_email"]);
		$this->db->set("no_user", $userData["user_phone"]);
		$this->db->set("alamat_user", $userData["user_address"]);
		$this->db->set("foto_user", $userData["user_avatar"]);
		$this->db->set("hak_akses", $userData["user_role"]);
		$this->db->where("id_user", $id);
		$this->db->update("users");
	}

	public function deleteSelectedUser($id)
	{
		$this->db->where("id_user", $id);
		$this->db->delete("users");
	}
}
