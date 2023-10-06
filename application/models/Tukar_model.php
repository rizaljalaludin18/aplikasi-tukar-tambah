<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tukar_model extends CI_Model
{
    private $table = 'tukar';

    //validasi form, method ini akan mengembailkan data berupa rules validasi form       
    public function rules()
    {
        return [
            [
                'field' => 'produk_baru',  //samakan dengan atribute name pada tags input
                'label' => 'Produk Baru',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'produk_lama',
                'label' => 'Produk Lama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'harga_baru',
                'label' => 'Harga Produk Baru',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'harga_lama',
                'label' => 'Harga Produk Lama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'total_bayar',
                'label' => 'Total Bayar',
                'rules' => 'trim|required'
            ]
        ];
    }

    //menampilkan data tukar berdasarkan id tukar
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
        //query diatas seperti halnya query pada mysql 
    }

    //menampilkan semua data tukar
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from tukar order by IdMhsw desc
    }

    //menyimpan data tukar
    public function save()
    {
        $data = array(
            "produk_baru" => $this->input->post('produk_baru'),
            "produk_lama" => $this->input->post('produk_lama'),
            "harga_baru" => $this->input->post('harga_baru'),
            "harga_lama" => $this->input->post('harga_lama'),
            "total_bayar" => $this->input->post('total_bayar'),
        );
        return $this->db->insert($this->table, $data);
    }

    //edit data tukar
    public function update()
    {
        $data = array(
            "produk_baru" => $this->input->post('produk_baru'),
            "produk_lama" => $this->input->post('produk_lama'),
            "harga_baru" => $this->input->post('harga_baru'),
            "harga_lama" => $this->input->post('harga_lama'),
            "total_bayar" => $this->input->post('total_bayar'),
        );
        return $this->db->update($this->table, $data, array('id' => $this->input->post('id')));
    }

    //hapus data tukar
    public function delete($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }
}