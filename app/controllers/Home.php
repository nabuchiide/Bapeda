<?php

class Home extends Controller{
    public function idex(){
        $data['judul'] = 'dashboard';
        $data['lunas'] = $this->model("PajakModel")->getTotalPajakByStatus("1");
        $data['tunggakan'] = $this->model("PajakModel")->getTotalPajakByStatus("0");
        $data['totalAnggran'] = $this->model("AnggaranModel")->getAllDataByStatus("1");
        $data['totalKegitan'] = $this->model("KegiatanModel")->getCountKegiatan();
     

        $data['pegawai'] = $this->model('PegawaiModel')->getAllData();
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}