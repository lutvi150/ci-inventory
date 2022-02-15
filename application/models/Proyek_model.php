<?php
class Proyek_model extends CI_Model
{

    public function getAllProyek()
    {
        $this->db->select("*");
        $this->db->from("proyek");
        // $this->db->join("proyek", "proyek.id_proyek = proyek.id_proyek");
        $this->db->join("pelanggan", "pelanggan.id_pelanggan = proyek.id_pelanggan");
        return $this->db->get()->result_array();
    }

    public function getAllProyekDepan()
    {
        $this->db->select("*");
        $this->db->from("proyek");
        // $this->db->join("proyek", "proyek.id_proyek = proyek.id_proyek");
        $this->db->join("pelanggan", "pelanggan.id_pelanggan = proyek.id_pelanggan");
        $this->db->limit(7);
        return $this->db->get()->result_array();
    }


    public function getAllProyekSelesai()
    {
        $this->db->select("*");
        $this->db->from("proyek");
        // $this->db->join("proyek", "proyek.id_proyek = proyek.id_proyek");
        $this->db->join("pelanggan", "pelanggan.id_pelanggan = proyek.id_pelanggan");
        $this->db->where('progres', 'selesai');
        return $this->db->get()->result_array();
    }

    public function getProyek()
    {
        return $this->db->get("proyek")->result_array();
    }

    public function getProyekById($id)
    {
        return $this->db->get_where("proyek", ["id_proyek" => $id])->row_array();
    }

    public function insertNewProyek($itemData)
    {
        $this->db->insert("proyek", $itemData);
    }

    public function updateSelectedProyek($proyekData, $id)
    {
        $this->db->set("kode_proyek", $proyekData["kode_proyek"]);
        $this->db->set("nama_proyek", $proyekData["nama_proyek"]);
        $this->db->set("id_pelanggan", $proyekData["id_pelanggan"]);
        $this->db->set("progres", $proyekData["progres"]);
        $this->db->set("diskripsi", $proyekData["diskripsi"]);
        $this->db->set("total", $proyekData["total"]);
        $this->db->set("tgl_mulai", $proyekData["tgl_mulai"]);
        $this->db->set("tgl_selesai", $proyekData["tgl_selesai"]);

        $this->db->where("id_proyek", $id);
        $this->db->update("proyek", $proyekData);
    }

    public function makeProyekCode()
    {
        $this->db->select('RIGHT(proyek.kode_proyek, 2) as kode_proyek', FALSE);
        $this->db->order_by('kode_proyek', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get("proyek");
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $proyekCode = intval($data->kode_proyek) + 1;
        } else {
            $proyekCode = 1;
        }
        $date = date('dmY');
        $limit = str_pad($proyekCode, 3, "0", STR_PAD_LEFT);
        $showCode = "PYK" . $date . $limit;
        return $showCode;
    }

    public function deleteSelectedProyek($id)
    {

        $this->db->where("id_proyek", $id);
        $this->db->delete("proyek");
    }

    public function getTotalProyek()
    {

        $this->db->select_sum("total");
        $query = $this->db->get("proyek");
        if ($query->num_rows() > 0) {
            return $query->row()->total;
        } else {
            return 0;
        }
    }
}
