<?php

class AnggaranModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllData()
    {
        $allData = [];
        $this->db->query(" SELECT * FROM anggaran ");
        $allData = $this->db->resultset();
        return $allData;
    }

    public function getDataByIdKegiatan($id_kegiatan)
    {
        $allData = [];
        $this->db->query(" SELECT * FROM anggaran WHERE id_kegiatan =:id_kegiatan ");
        $this->db->bind('id_kegiatan', $id_kegiatan);
        $allData = $this->db->resultset();
        for ($i = 0; $i < count($allData); $i++) {
            $allData[$i]['biaya'] = number_format($allData[$i]['biaya']);
        }
        return $allData;
    }

    public function tambahData($data)
    {
        $query = " INSERT INTO anggaran
                    VALUES
                    ('', :biaya, :status, :id_kegiatan, :keterangan)
            ";
        $this->db->query($query);
        $this->db->bind('biaya', $data['biaya']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('id_kegiatan', $data['id_kegiatan']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $query = " UPDATE anggaran
                    SET
                        biaya       =:biaya, 
                        status      =:status, 
                        id_kegiatan =:id_kegiatan,
                        keterangan  =:keterangan
                    WHERE 
                        id =:id
            ";
        $this->db->query($query);
        $this->db->bind('biaya', $data['biaya']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('id_kegiatan', $data['id_kegiatan']);
        $this->db->bind('id', $data['id']);
        $this->db->bind('keterangan', $data['keterangan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahStatus($id_kegiatan, $status)
    {

        $query = " UPDATE anggaran
                   SET
                       status      =:status 
                   WHERE 
                       id_kegiatan =:id_kegiatan
           ";
        $this->db->query($query);
        $this->db->bind('status', $status);
        $this->db->bind('id_kegiatan', $id_kegiatan);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getOneData($id)
    {
        $this->db->query(" SELECT * FROM anggaran WHERE id =:id");
        $this->db->bind('id', $id);
        return $this->db->resultset();
    }

    public function cekingData($id)
    {
        $allData = [];
        $query = " SELECT count(*) AS CountData FROM anggaran WHERE id =:id ";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $allData = $this->db->single();
        return $allData;
    }

    public function hapusData($id)
    {
        $query = " DELETE FROM anggaran WHERE id =:id ";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataByKegiatan($id_kegiatan)
    {
        $query = " DELETE FROM anggaran WHERE id_kegiatan =:id_kegiatan ";
        $this->db->query($query);
        $this->db->bind('id_kegiatan', $id_kegiatan);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
