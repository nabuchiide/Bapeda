<?php 

Class KegiatanModel {
    private $db;
    
    public function __construct()
    {
        $this->db=new Database;
    }

    public function getAllData(){
        $allData = [];
        $this->db->query(" SELECT * FROM kegiatan ORDER BY tanggal DESC ");
        $allData = $this->db->resultset();
        return $allData; 
    }

    public function tambahData($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        $query = " INSERT INTO kegiatan
                    VALUES
                    ('', :nama_kegiatan, :lokasi, :tanggal, :keterangan, :status)
                ";
        $this->db->query($query);
        $this->db->bind('nama_kegiatan', $data['nama_kegiatan']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('status', '0');

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";

        $query = " UPDATE kegiatan
                    SET
                    nama_kegiatan   =:nama_kegiatan, 
                    lokasi          =:lokasi, 
                    tanggal         =:tanggal, 
                    keterangan      =:keterangan
                    WHERE
                        id =:id
                ";
        $this->db->query($query);
        $this->db->bind('nama_kegiatan', $data['nama_kegiatan']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('keterangan', $data['keterangan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getOneData($id){
        $this->db->query(" SELECT * from kegiatan WHERE id =:id ");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function hapusData($id){
        $query = " DELETE FROM kegiatan WHERE id=:id;
                    DELETE FROM anggran WHERE id_kegiatan=:id;
                 ";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getKegiatanStatusPajak(){
        $allData = [];
        $this->db->query(" SELECT * FROM kegiatan WHERE status = 1 ORDER BY tanggal DESC ");
        $allData = $this->db->resultset();
        return $allData; 
    }

    public function getKegiatanStatusAnggaran(){
        $allData = [];
        $this->db->query(" SELECT * FROM kegiatan WHERE status = 0 ORDER BY tanggal DESC ");
        $allData = $this->db->resultset();
        return $allData; 
    }
}