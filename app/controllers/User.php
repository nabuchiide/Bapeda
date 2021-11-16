<?php

class User extends Controller{
    public function idex(){
        $data['judul']      = 'user management';
        $data['user']       = $this->model('UserModel')->getAllData();
        $data['pegawai']    = $this->model('PegawaiModel')->getAllData();
       
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function tambah(){
        if($this->model('UserModel')->tambahData($_POST)>0){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success', 'User');
            header('Location: '.BASEURL.'/user');
            exit;
        }else{
            Flasher::setFlash('gagal', 'ditambahkan', 'danger', 'User');
            header('Location: '.BASEURL.'/user');
            exit;
        }
    }

    public function ubah(){
        if($this->model('UserModel')->ubahData($_POST)>0){
            Flasher::setFlash('berhasil', 'diubah', 'success', 'User');
            header('Location: '.BASEURL.'/user');
            exit;
        }else{
            Flasher::setFlash('gagal', 'diubah', 'danger', 'User');
            header('Location: '.BASEURL.'/user');
            exit;
        }
    }

    public function hapus($id){
        if($this->model('UserModel')->hapusData($id)>0){
            Flasher::setFlash('berhasil', 'dihapus', 'success', 'User');
            header('Location: '.BASEURL.'/user');
            exit;
        }else{
            Flasher::setFlash('gagal', 'dihapus', 'danger', 'User');
            header('Location: '.BASEURL.'/user');
            exit;
        }
    }

    public function getUbah(){
        echo json_encode($this->model('UserModel')->getOneData($_POST['id']));
    }
}