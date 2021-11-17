<?php

class Anggaran extends Controller
{
    public function idex()
    {
        $data['judul'] = 'anggaran';
        $data['kegiatan'] = $this->model("KegiatanModel")->getAllData();
        $this->view('templates/header', $data);
        $this->view('templates/sidemenu');
        $this->view('anggaran/index', $data);
        $this->view('templates/footer');
    }

    public function getByKegitanAnggaran()
    {
        $allData = [];
        $allData = $this->model("AnggaranModel")->getDataByIdKegiatan($_POST['id']);
        echo json_encode($allData);
    }

    public function tambah()
    {
        $chkData = $this->model('AnggaranModel')->cekingData($_POST['id']);
        $_POST['biaya'] = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $_POST['biaya']);
        if ($chkData['CountData'] > 0) {
            if ($this->model('AnggaranModel')->ubahData($_POST) > 0) {
                echo json_encode("success update");
                exit;
            } else {
                echo json_encode("failed");
                exit;
            }
        } else {
            if ($this->model('AnggaranModel')->tambahData($_POST) > 0) {
                echo json_encode("success insert");
                exit;
            } else {
                echo json_encode("failed");
                exit;
            }
        }
    }

    public function hapus()
    {
        if ($this->model('AnggaranModel')->hapusData($_POST['id']) > 0) {
            echo json_encode("success");
            exit;
        } else {
            echo json_encode("failed");
            exit;
        }
    }

    public function generateStatus()
    {
        $id_kegiatan = $_POST['id'];
        if ($this->model('AnggaranModel')->ubahStatus($id_kegiatan, "1") > 0 ) {
            $this->model('KegiatanModel')->ubahStatus($id_kegiatan, "1");
            $data = $this->model("AnggaranModel")->getDataByIdKegiatan($id_kegiatan);
            for ($i=0; $i < count($data); $i++) {

                $data_loop = $data[$i];
                $biaya = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $data_loop['biaya']);
                $id_anggaran = $data_loop['id'];

                $chkData = $this->model('PajakModel')->cekingData($id_kegiatan,$id_anggaran);
                echo $chkData." ==========> \n";
                if($chkData['CountData'] > 0){
                    $this->model('PajakModel')->ubahData($biaya,$id_kegiatan,$id_anggaran);
                }else{
                    $this->model('PajakModel')->tambahData($biaya,$id_kegiatan,$id_anggaran);
                }
            }
            echo json_encode("success");
            exit;
        } else {
            echo json_encode("failed");
            exit;
        }
    }
}
