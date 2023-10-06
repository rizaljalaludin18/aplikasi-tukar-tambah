<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model
{
    private $table = 'produk';

    //validasi form, method ini akan mengembailkan data berupa rules validasi form       
    public function rules()
    {
        return [
            [
                'field' => 'Nama',  //samakan dengan atribute name pada tags input
                'label' => 'Nama',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'Harga',
                'label' => 'Harga',
                'rules' => 'trim|required'
            ]
        ];
    }

    //menampilkan data produk berdasarkan id produk
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from produk where IdMhsw='$id'
    }

    //menampilkan semua data produk
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from produk order by IdMhsw desc
    }

    //menyimpan data produk
    public function save($produk)
    {
        return $this->db->insert($this->table, $produk);
    }

    //edit data produk
    public function updateold()
    {
        $data = array(
            "Nama" => $this->input->post('Nama'),
            "Harga" => $this->input->post('Harga')
        );
        return $this->db->update($this->table, $data, array('id' => $this->input->post('id')));
    }

    public function update($id, $produk)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $produk);
    }  

    //hapus data produk
    public function delete($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }
}