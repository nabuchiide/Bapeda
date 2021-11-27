<?php 

class Laporan extends Controller{
    public function idex(){
        $data['judul'] = 'Laporan';
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view("laporan/index",$data);
        $this->view('templates/footer');
    }

    public function pajak(){
        $data['judul'] = 'Laporan Pajak';
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view("laporan/index",$data);
        $this->view('templates/footer');
    }

    public function kegiatan(){
        $data['judul'] = 'Laporan Pajak';
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view("laporan/index",$data);
        $this->view('templates/footer');
    }

    public function anggaran(){
        $data['judul'] = 'Laporan Pajak';
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view("laporan/index",$data);
        $this->view('templates/footer');
    }

    public function printLaporanPajak(){
        $data['judul'] = 'Print Laporan Pajak';
        $this->view('templates/header', $data);
        $this->view("download_laporan/index",$data);
    }

    public function getKegitanByDate(){
        $allData = [];
        $allData = $this->model("KegiatanModel")->getDataByDate($_POST['month']);
        echo json_encode($allData);
        // echo $allData;
    }
}