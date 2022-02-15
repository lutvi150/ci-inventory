<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafik_model extends CI_Model
{

    function get_data_stok()
    {
        $query = $this->db->query("SELECT nama_kategori,SUM(stok_barang) AS stok_barang FROM barang join kategori on kategori.id_kategori=barang.id_kategori GROUP BY nama_kategori");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}
