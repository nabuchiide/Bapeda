<?php

class Laporan extends Controller
{
    public function idex()
    {
        $data['judul'] = 'Laporan';
        $data['BP'] = $this->model('PegawaiModel')->getDataByJabatan("BP");
        $data['PPTK'] = $this->model('PegawaiModel')->getDataByJabatan("PTK");
        $data['KPA'] = $this->model('PegawaiModel')->getDataByJabatan("KPA");
        $data['BPP'] = $this->model('PegawaiModel')->getDataByJabatan("BPP");
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view("laporan/index", $data);
        $this->view('templates/footer');
    }

    public function pajak()
    {
        $data['judul'] = 'Laporan Pajak';
        $data['BP'] = $this->model('PegawaiModel')->getDataByJabatan("BP");
        $data['PPTK'] = $this->model('PegawaiModel')->getDataByJabatan("PTK");
        $data['KPA'] = $this->model('PegawaiModel')->getDataByJabatan("KPA");
        $data['BPP'] = $this->model('PegawaiModel')->getDataByJabatan("BPP");
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view("laporan/index", $data);
        $this->view('templates/footer');
    }

    public function kegiatan()
    {
        $data['judul'] = 'Laporan Pajak';
        $data['BP'] = $this->model('PegawaiModel')->getDataByJabatan("BP");
        $data['PPTK'] = $this->model('PegawaiModel')->getDataByJabatan("PTK");
        $data['KPA'] = $this->model('PegawaiModel')->getDataByJabatan("KPA");
        $data['BPP'] = $this->model('PegawaiModel')->getDataByJabatan("BPP");
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view("laporan/index", $data);
        $this->view('templates/footer');
    }

    public function anggaran()
    {
        $data['judul'] = 'Laporan Pajak';
        $data['BP'] = $this->model('PegawaiModel')->getDataByJabatan("BP");
        $data['PPTK'] = $this->model('PegawaiModel')->getDataByJabatan("PTK");
        $data['KPA'] = $this->model('PegawaiModel')->getDataByJabatan("KPA");
        $data['BPP'] = $this->model('PegawaiModel')->getDataByJabatan("BPP");
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view("laporan/index", $data);
        $this->view('templates/footer');
    }

    public function printLaporanPajak()
    {
        $data['judul'] = 'Print Laporan Pajak';
        $data['BP'] = $this->model('PegawaiModel')->getDataByJabatan("BP");
        $data['PPTK'] = $this->model('PegawaiModel')->getDataByJabatan("PTK");
        $data['KPA'] = $this->model('PegawaiModel')->getDataByJabatan("KPA");
        $data['BPP'] = $this->model('PegawaiModel')->getDataByJabatan("BPP");
        $this->view('templates/header', $data);
        $this->view("download_laporan/index", $data);
    }

    public function getKegitanByDate()
    {
        $allData = [];
        $allData = $this->model("KegiatanModel")->getDataByDate($_POST['month']);
        echo json_encode($allData);
        // echo $allData;
    }

    public function getTotalPajak()
    {
        $allData = [];
        $allData = $this->model("LaporanModel")->getLaporanPajak($_POST['id']);
        echo json_encode($allData);
    }

    public function getTotalPajakUntilLastMonth()
    {
        $allData = [];
        $allData = $this->model("LaporanModel")->getTotalPajakUntilLastMonth($_POST['month']);
        echo json_encode($allData);
    }
}
