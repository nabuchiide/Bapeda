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

    public function printLaporanPajak($month,$id)
    {
        // $_POST['month'] = $month;
        $data['judul'] = 'Print Laporan Pajak';
        $data['BP'] = $this->model('PegawaiModel')->getNamaByJabatan("BP");
        $data['PPTK'] = $this->model('PegawaiModel')->getNamaByJabatan("PTK");
        $data['KPA'] = $this->model('PegawaiModel')->getNamaByJabatan("KPA");
        $data['BPP'] = $this->model('PegawaiModel')->getNamaByJabatan("BPP");
        $data['month'] = $month;
        $data['kegiatan'] = $this->model("KegiatanModel")->getDataByDate($month);
        $data['total_pajak'] = $this->model("LaporanModel")->getLaporanPajak($id);
        $data['total_bulan_lalu'] = $this->model("LaporanModel")->getTotalPajakUntilLastMonth($month);
        $this->view('templates/header', $data);
        $this->view("download_laporan/index", $data);
    }

    public function printLaporanPajakPDF($month,$id)
    {
        // $_POST['month'] = $month;
        $data['judul'] = 'Print Laporan Pajak';
        $data['BP'] = $this->model('PegawaiModel')->getNamaByJabatan("BP");
        $data['PPTK'] = $this->model('PegawaiModel')->getNamaByJabatan("PTK");
        $data['KPA'] = $this->model('PegawaiModel')->getNamaByJabatan("KPA");
        $data['BPP'] = $this->model('PegawaiModel')->getNamaByJabatan("BPP");
        $data['month'] = $month;
        $data['kegiatan'] = $this->model("KegiatanModel")->getDataByDate($month);
        $data['total_pajak'] = $this->model("LaporanModel")->getLaporanPajak($id);
        $data['total_bulan_lalu'] = $this->model("LaporanModel")->getTotalPajakUntilLastMonth($month);
        $this->view('templates/header', $data);
        $this->view("download_laporan/download_pdf", $data);
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
