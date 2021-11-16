<?php

class Anggaran extends Controller{
    public function idex(){
        $data['judul'] = 'anggaran';
        $data['kegiatan'] = $this->model("KegiatanModel")->getKegiatanStatusAnggaran();
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view('anggaran/index', $data);
        $this->view('templates/footer');
    }

    public function getByKegitanAnggaran(){
        $allData = [];
        $allData = $this->model("AnggaranModel")->getDataByIdKegiatan($_POST['id']);
        echo json_encode($allData);
    }

    public function tambah(){
        $chkData = $this->model('AnggaranModel')->cekingData($_POST['id']);
        $_POST['biaya'] = preg_replace('/[^a-zA-Z0-9_ -]/s','',$_POST['biaya']);
        if($chkData['CountData'] > 0){
            if($this->model('AnggaranModel')->ubahData($_POST)>0){
                echo json_encode("success update");
                exit;
            }else{
                echo json_encode("failed");
                exit;
            }
        }else{
            if($this->model('AnggaranModel')->tambahData($_POST)>0){
                echo json_encode("success insert");
                exit;
            }else{
                echo json_encode("failed");
                exit;
            }
        }
    }

    public function hapus(){
        if($this->model('AnggaranModel')->hapusData($_POST['id'])>0){
            echo json_encode("success");
            exit;
        }else{
            echo json_encode("failed");
            exit;
        }
    }
}