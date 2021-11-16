<?php

class Pegawai extends Controller{
    public function idex(){
        $data['judul']      = 'Pegawai';
        $data['pegawai']    = $this->model('PegawaiModel')->getAllData();
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view('pegawai/index', $data);
        $this->view('templates/footer');
    }

    public function tambah(){
        if( $this->model('PegawaiModel')->tambahData($_POST)>0){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success', 'Pegawai');
            header('Location: '.BASEURL.'/pegawai');
            exit;
        }else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger', 'Pegawai');
            header('Location: '.BASEURL.'/pegawai');
            exit;
        }
    }

    public function hapus($id){
        if( $this->model('PegawaiModel')->hapus($id)>0){
            Flasher::setFlash('berhasil', 'dihapus', 'success', 'Pegawai');
            header('Location: '.BASEURL.'/pegawai');
            exit;
        }else{
            Flasher::setFlash('gagal', 'dihapus', 'danger', 'Pegawai');
            header('Location: '.BASEURL.'/pegawai');
            exit;
        }
    }

    public function ubah(){
        if( $this->model('PegawaiModel')->ubahData($_POST)>0){
            Flasher::setFlash('berhasil', 'diubah', 'success', 'Pegawai');
            header('Location: '.BASEURL.'/pegawai');
            exit;
        }else{
            Flasher::setFlash('gagal', 'diubah', 'danger', 'Pegawai');
            header('Location: '.BASEURL.'/pegawai');
            exit;
        }
    }

    public function getUbah(){
        echo json_encode($this->model('PegawaiModel')->getOneData($_POST['id']));

     }
}