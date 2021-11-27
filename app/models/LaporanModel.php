<?php
// SELECT * FROM kegiatan k INNER JOIN anggaran a ON a.id_kegiatan = k.id RIGHT JOIN pajak p ON a.id = p.id_anggaran WHERE k.id = '1'
class LaporanModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLaporanPajak($id_kegiatan)
    {
        $allData = [];
        $this->db->query("  SELECT * FROM 
                                    kegiatan k 
                                    INNER JOIN anggaran a 
                                        ON a.id_kegiatan = k.id 
                                    RIGHT JOIN pajak p 
                                        ON a.id = p.id_anggaran 
                            WHERE k.id =:id_kegiatan ");
        $this->db->bind('id_kegiatan', $id_kegiatan);

        $allData = $this->db->resultset();
        return $allData;
    }

    
}
