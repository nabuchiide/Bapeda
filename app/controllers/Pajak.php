<?php

class Pajak extends Controller {
    public function idex(){
        $data['judul'] = 'pajak';
        $data['kegiatan'] = $this->model("KegiatanModel")->getKegiatanStatusPajak();
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view('pajak/index', $data);
        $this->view('templates/footer');
    }
}
