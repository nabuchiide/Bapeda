<?php

class PegawaiModel
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllData()
    {
        $allData = [];
        $this->db->query(" SELECT * FROM pegawai ORDER BY Id DESC ");
        $allData = $this->db->resultset();
        for ($i = 0; $i < count($allData); $i++) {
            $bidang_type_loop = $allData[$i]['bidang'];
            if ($bidang_type_loop == "PTR") {
                $bidang_type_loop = "Prasarana dan Tata Ruang";
            } else if ($bidang_type_loop == "PEK") {
                $bidang_type_loop = "Perekonomian";
            } else if ($bidang_type_loop == "PKS") {
                $bidang_type_loop = "Pemerintahan dan Kesejahteraan Sosial";
            } else if ($bidang_type_loop == "PME") {
                $bidang_type_loop = "Pembiayaan Monitoring dan Evaluasi";
            } else {
                $bidang_type_loop = " - ";
            }
            $allData[$i]['bidang'] = $bidang_type_loop;

            $jabatan_type_loop = $allData[$i]['jabatan'];

            if ($jabatan_type_loop == "KPA") {
                $jabatan_type_loop = "Kuasa Penerima Anggaran";
            } else if ($jabatan_type_loop == "PTK") {
                $jabatan_type_loop = "Pejabat Pelaksana Teknis Kegiatan";
            } else if ($jabatan_type_loop == "BP") {
                $jabatan_type_loop = "Bendahara pembantu";
            } else if ($jabatan_type_loop == "BPP") {
                $jabatan_type_loop = "Bendahara pembantu pengeluaran";
            } else {
                $jabatan_type_loop = " - ";
            }
            $allData[$i]['jabatan'] = $jabatan_type_loop;
        }

        return $allData;
    }

    public function getOneData($id)
    {
        $this->db->query('select * from pegawai where id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahData($data)
    {
        $query = " INSERT INTO pegawai
                    VALUES
                    ('', :nama_pegawai, :no_pegawai, :bidang,  :jabatan) 
                ";
        $this->db->query($query);
        $this->db->bind('nama_pegawai', $data['nama_pegawai']);
        $this->db->bind('no_pegawai', $data['no_pegawai']);
        $this->db->bind('bidang', $data['bidang']);
        $this->db->bind('jabatan', $data['jabatan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapus($id)
    {
        $query = " DELETE  FROM pegawai WHERE id=:id ";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data)
    {
        $query = " UPDATE pegawai SET 
                        nama_pegawai    =:nama_pegawai,
                        no_pegawai      =:no_pegawai,
                        bidang          =:bidang,
                        jabatan         =:jabatan
                    WHERE 
                        id=:id
                ";
        $this->db->query($query);
        $this->db->bind('nama_pegawai', $data['nama_pegawai']);
        $this->db->bind('no_pegawai', $data['no_pegawai']);
        $this->db->bind('bidang', $data['bidang']);
        $this->db->bind('jabatan', $data['jabatan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getDataByJabatan($jabatan)
    {
        $this->db->query("  SELECT nama_pegawai FROM pegawai WHERE jabatan =:jabatan ");
        $this->db->bind('jabatan', $jabatan);
        return $this->db->single();
    }
}
