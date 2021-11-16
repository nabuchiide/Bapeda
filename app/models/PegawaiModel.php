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
            $agama_type_loop = $allData[$i]['agama'];
            if($agama_type_loop == "ISL"){
                $agama_type_loop = "Islam";
            }else if($agama_type_loop == "KRI"){
                $agama_type_loop = "Kristen";
            }else if($agama_type_loop == "PRO"){
                $agama_type_loop = "Protestan";
            }else if($agama_type_loop == "BUD"){
                $agama_type_loop = "Budha";
            }else if($agama_type_loop == "HIN"){
                $agama_type_loop = "Hindu";
            }else{
                $agama_type_loop = " - ";
            }

            $allData[$i]['agama'] = $agama_type_loop;
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
                    ('', :nama_pegawai, :alamat, :no_pegawai, :agama) 
                ";
        $this->db->query($query);
        $this->db->bind('nama_pegawai', $data['nama_pegawai']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_pegawai', $data['no_pegawai']);
        $this->db->bind('agama', $data['agama']);
        
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
                        alamat          =:alamat,
                        no_pegawai      =:no_pegawai,
                        agama           =:agama
                    WHERE 
                        id=:id
                ";
        $this->db->query($query);
        $this->db->bind('nama_pegawai', $data['nama_pegawai']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_pegawai', $data['no_pegawai']);
        $this->db->bind('agama', $data['agama']);
        $this->db->bind('id', $data['id']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
    
}
