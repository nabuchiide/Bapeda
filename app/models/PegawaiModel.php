<?php 

class PegawaiModel{

    private $db;

    public function __construct(){
        $this->db= new Database;
    }

    public function getAllData(){
        $allData = [];
        $this->db->query(" SELECT * FROM pegawai ORDER BY Id DESC ");
        $allData = $this->db->resultset();
        for ($i=0; $i < count($allData) ; $i++) { 
            $bidang_type_loop = $allData[$i]['bidang'];
            if($bidang_type_loop == "PS"){
                $bidang_type_loop = "Prasarana";
            }else if($bidang_type_loop == "TR"){
                $bidang_type_loop = "Tata Ruang";
            }else if($bidang_type_loop == "PE"){
                $bidang_type_loop = "Perekonomian";
            }else if($bidang_type_loop == "PM"){
                $bidang_type_loop = "Pemerintahan";
            }else if($bidang_type_loop == "KS"){
                $bidang_type_loop = "Kesejahteraan Sosial";
            }else if($bidang_type_loop == "PM"){
                $bidang_type_loop = "Pembiayaan Monitoring";
            }else if($bidang_type_loop == "EV"){
                $bidang_type_loop = "Evaluasi";
            }else{
                $bidang_type_loop = " - ";
            }
            $allData[$i]['bidang'] = $bidang_type_loop;
            
            $jabatan_type_loop = $allData[$i]['jabatan'];

            if($jabatan_type_loop == "KPA"){
                $jabatan_type_loop = "KPA";
            }else if ($jabatan_type_loop == "PTK") {
                $jabatan_type_loop = "PPTK";
            }else if ($jabatan_type_loop == "BP") {
                $jabatan_type_loop = "BP";
            }else if ($jabatan_type_loop == "BPP") {
                $jabatan_type_loop = "BPP";
            }else{
                $jabatan_type_loop = " - ";
            }
            $allData[$i]['jabatan'] = $jabatan_type_loop;
        }

        return $allData;
    }

    public function getOneData($id){
        $this->db->query('select * from pegawai where id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function tambahData($data){
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

    public function hapus($id){
        $query = " DELETE  FROM pegawai WHERE id=:id ";
        $this->db->query($query);
        $this->db->bind('id', $id);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahData($data){
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
    
}
