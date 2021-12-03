<?php

class PajakModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getTotalPajakAllByStatus($status)
    {
        $query = "
                    SELECT
                        p.id as id_pajak, 
                        k.tanggal,
                        k.nama_kegiatan,
                        p.status, 
                        p.biaya as pajak, 
                        a.biaya as anggaran, 
                        a.keterangan
                    FROM 
                        pajak p, 
                        anggaran a, 
                        kegiatan k 
                    WHERE 
                        p.id_kegiatan = k.id 
                    AND 
                        p.id_anggaran = a.id 
                    AND 
                        p.status =:status
                    limit 5
                ";
        $this->db->query($query);
        $this->db->bind('status', $status);
        $allData = $this->db->resultset();
        return $allData;
    }

    public function getTotalPajakByStatus($status)
    {
        $query = "
                SELECT 
                    sum(p.biaya) as total_sum 
                FROM pajak p 
                    WHERE p.status =:status
            ";
        $this->db->query($query);
        $this->db->bind('status', $status);
        $allData = $this->db->single();
        return $allData;
    }

    public function getDataByKegiatan($id_kegiatan)
    {
        $query = "
                    SELECT
                        p.id as id_pajak, 
                        k.tanggal, 
                        p.status, 
                        p.biaya as pajak, 
                        a.biaya as anggaran, 
                        a.keterangan
                    FROM 
                        pajak p, 
                        anggaran a, 
                        kegiatan k 
                    WHERE 
                        p.id_kegiatan = k.id 
                    AND 
                        p.id_anggaran = a.id 
                    AND 
                        p.id_kegiatan =:id_kegiatan
                ";
        $this->db->query($query);
        $this->db->bind('id_kegiatan', $id_kegiatan);
        $allData = $this->db->resultset();
        for ($i = 0; $i < count($allData); $i++) {
            $allData[$i]['pajak'] = number_format($allData[$i]['pajak']);
            $allData[$i]['anggaran'] = number_format($allData[$i]['anggaran']);
        }
        return $allData;
    }

    public function cekingData($id_kegiatan, $id_anggaran)
    {
        $query = " SELECT count(*) AS CountData FROM pajak 
                    WHERE 
                        id_kegiatan =:id_kegiatan 
                    AND  
                        id_anggaran =:id_anggaran
                ";
        $this->db->query($query);
        $this->db->bind('id_kegiatan', $id_kegiatan);
        $this->db->bind('id_anggaran', $id_anggaran);
        $allData = $this->db->single();
        return $allData;
    }

    public function tambahData($biaya, $id_kegiatan, $id_anggaran)
    {
        $query = " INSERT INTO pajak
                    VALUES
                    ('', :biaya, :id_kegiatan, :id_anggaran, :status)
                ";
        $this->db->query($query);
        $this->db->bind('biaya', $biaya);
        $this->db->bind('id_kegiatan', $id_kegiatan);
        $this->db->bind('id_anggaran', $id_anggaran);
        $this->db->bind('status', '0');

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($biaya, $id_kegiatan, $id_anggaran)
    {
        $query = " UPDATE pajak
                    SET
                        biaya =:biaya 
                    WHERE
                        id_kegiatan =:id_kegiatan
                    AND 
                        id_anggaran =:id_anggaran
                ";
        $this->db->query($query);
        $this->db->bind('biaya', $biaya);
        $this->db->bind('id_kegiatan', $id_kegiatan);
        $this->db->bind('id_anggaran', $id_anggaran);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahStatus($id, $status)
    {
        $query = " UPDATE pajak
                    SET
                        status =:status
                    WHERE
                        id =:id
                ";

        $this->db->query($query);
        $this->db->bind('status', $status);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}
