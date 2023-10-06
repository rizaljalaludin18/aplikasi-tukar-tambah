<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tukar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }
        $this->load->model("Tukar_model"); //load model tukar
        $this->load->model("Produk_model");
    }

    //method pertama yang akan di eksekusi
    public function index()
    {

        $data["title"] = "List Data Tukar";
        //ambil fungsi getAll untuk menampilkan semua data tukar
        $data["data_tukar"] = $this->Tukar_model->getAll();
        //load view header.php pada folder views/templates
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        //load view index.php pada folder views/tukar
        $this->load->view('tukar/index', $data);
        $this->load->view('templates/footer');
    }

    //method add digunakan untuk menampilkan form tambah data tukar
    public function add()
    {
        $Tukar = $this->Tukar_model; //objek model
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($Tukar->rules()); //menerapkan rules validasi pada produk_model
        //kondisi jika semua kolom telah divalidasi, maka akan menjalankan method save pada produk_model
        if ($validation->run()) {
            $Tukar->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Tukar berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("tukar");
        }
        $data["data_produk"] = $this->Produk_model->getAll();
        $data["title"] = "Tambah Data Tukar";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('tukar/add', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('tukar');

        $Tukar = $this->Tukar_model;
        $validation = $this->form_validation;
        $validation->set_rules($Tukar->rules());

        if ($validation->run()) {
            $Tukar->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Tukar berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("tukar");
        }
        $data["data_produk"] = $this->Produk_model->getAll();
        $data["title"] = "Edit Data Tukar";
        $data["data_tukar"] = $Tukar->getById($id);
        if (!$data["data_tukar"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('tukar/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->Tukar_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Tukar berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }

    public function export()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Tukar Tambah';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_tukar_tambah';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $this->data["data_tukar"] = $this->Tukar_model->getAll();
        
        $html = $this->load->view('tukar/laporan',$this->data, true);     
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    }
}