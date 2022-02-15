<?php
class Informasi_model extends CI_Model
{

    public function getAllInformasi()
    {
        $this->db->select("*");
        $this->db->from("informasi");
        $this->db->join("pelanggan as a", "informasi.id_pelanggan = a.id_pelanggan", "left");
        $this->db->join("pemasok as b", "b.id_pemasok = informasi.id_pemasok", "left");
        return $this->db->get()->result_array();
    }




    // public function getProyekById($id)
    // {
    //     return $this->db->get_where("proyek", ["id_proyek" => $id])->row_array();
    // }

    // public function insertNewProyek($itemData)
    // {
    //     $this->db->insert("proyek", $itemData);
    // }

    // public function updateSelectedProyek($proyekData, $id)
    // {
    //     $this->db->set("kode_proyek", $proyekData["kode_proyek"]);
    //     $this->db->set("nama_proyek", $proyekData["nama_proyek"]);
    //     $this->db->set("id_pelanggan", $proyekData["id_pelanggan"]);
    //     $this->db->set("progres", $proyekData["progres"]);
    //     $this->db->set("diskripsi", $proyekData["diskripsi"]);
    //     $this->db->set("total", $proyekData["total"]);
    //     $this->db->set("tgl_mulai", $proyekData["tgl_mulai"]);
    //     $this->db->set("tgl_selesai", $proyekData["tgl_selesai"]);

    //     $this->db->where("id_proyek", $id);
    //     $this->db->update("proyek", $proyekData);
    // }

    public function makeInformasiCode()
    {
        $this->db->select('RIGHT(informasi.kode_informasi, 2) as kode_informasi', FALSE);
        $this->db->order_by('kode_informasi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get("informasi");
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $informasiCode = intval($data->kode_informasi) + 1;
        } else {
            $informasiCode = 1;
        }
        $date = date('dmY');
        $limit = str_pad($informasiCode, 3, "0", STR_PAD_LEFT);
        $showCode = "INF" . $date . $limit;
        return $showCode;
    }

    // public function deleteSelectedProyek($id)
    // {

    //     $this->db->where("id_proyek", $id);
    //     $this->db->delete("proyek");
    // }
}
