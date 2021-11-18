<?php

class Pajak extends Controller
{
    public function idex()
    {
        $data['judul'] = 'pajak';
        $data['kegiatan'] = $this->model("KegiatanModel")->getKegiatanStatusPajak();
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view('pajak/index', $data);
        $this->view('templates/footer');
    }

    public function getByKegiatanPajak()
    {
        $allData = [];
        $allData = $this->model("PajakModel")->getDataByKegiatan($_POST['id']);
        echo json_encode($allData);
    }

    public function pelunasan()
    {
        if ($this->model('PajakModel')->ubahStatus($_POST['id'], "1") > 0) {
            echo json_encode("success");
            exit;
        } else {
            echo json_encode("failed");
            exit;
        }
    }
}
