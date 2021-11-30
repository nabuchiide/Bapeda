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
        $this->db->query("  SELECT 
                                a.keterangan, 
                                k.tanggal, 
                                a.biaya, 
                                a.status, 
                                p.biaya as pajak, 
                                p.status as status_pajak
                             FROM 
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

    public function getTotalPajakUntilLastMonth($month)
    {
        $allData = [];
        $total_lunas = 0;
        $total_pajak = 0;
        $total_nuggak = 0;
        $month_str = explode("-", $month);
        for ($i = intval($month_str[1]) - 1; $i > 0; $i--) {
            $str_i = strval($i);
            if (strlen($str_i) == 1) {
                $str_i = '0' . $str_i;
            }
            $mont_send = $month_str[0] . '-' . $str_i;
            $total_pajak = intval($total_pajak) + $this->getLaporanPajakOneData($mont_send);
            $total_lunas = intval($total_lunas) + $this->getLaporanPajakByDateLunas($mont_send);
            $total_nuggak = intval($total_nuggak) + $this->getLaporanPajakByDateNunggak($mont_send);
        }
        $allData['allpajak'] = $this->getLaporanPajakDataAll($month);
        $allData['lunas_now'] = $this->getLaporanPajakByDateLunas($month);
        $allData['nunggak_now'] = $this->getLaporanPajakByDateNunggak($month);
        $allData['nunggak'] = $total_nuggak;
        $allData['lunas'] = $total_lunas;
        $allData['pajak'] = $total_pajak;
        return $allData;
    }

    public function getLaporanPajakByDateLunas($month)
    {
        $allData = [];
        $dataReturn = 0;
        $query = " SELECT sum(p.biaya) as total_pajak 
                    FROM kegiatan k 
                        INNER JOIN anggaran a 
                            ON a.id_kegiatan = k.id 
                        RIGHT JOIN pajak p 
                            ON a.id = p.id_anggaran 
                    WHERE k.tanggal Like :month AND p.status = 1 ";
        $this->db->query($query);
        $this->db->bind('month', $month . '%');
        $allData = $this->db->resultset();
        for ($i = 0; $i < count($allData); $i++) {
            $dataReturn = $allData[$i]['total_pajak'];
        }
        if (is_null($dataReturn)) {
            return 0;
        } else {
            return intval($dataReturn);
        }
    }

    public function getLaporanPajakByDateNunggak($month)
    {
        $allData = [];
        $dataReturn = 0;
        $query = " SELECT sum(p.biaya) as total_pajak 
                    FROM kegiatan k 
                        INNER JOIN anggaran a 
                            ON a.id_kegiatan = k.id 
                        RIGHT JOIN pajak p 
                            ON a.id = p.id_anggaran 
                    WHERE k.tanggal Like :month AND p.status = 0 ";
        $this->db->query($query);
        $this->db->bind('month', $month . '%');
        $allData = $this->db->resultset();
        for ($i = 0; $i < count($allData); $i++) {
            $dataReturn = $allData[$i]['total_pajak'];
        }
        if (is_null($dataReturn)) {
            return 0;
        } else {
            return intval($dataReturn);
        }
    }

    public function getLaporanPajakDataAll($month)
    {
        $allData = [];
        $dataReturn = 0;
        $query = " SELECT sum(p.biaya) as total_pajak 
                    FROM kegiatan k 
                        INNER JOIN anggaran a 
                            ON a.id_kegiatan = k.id 
                        RIGHT JOIN pajak p 
                            ON a.id = p.id_anggaran 
                    WHERE k.tanggal Like :month ";
        $this->db->query($query);
        $this->db->bind('month', $month . '%');
        $allData = $this->db->resultset();
        for ($i = 0; $i < count($allData); $i++) {
            $dataReturn = $allData[$i]['total_pajak'];
        }
        if (is_null($dataReturn)) {
            return 0;
        } else {
            return intval($dataReturn);
        }
    }

    public function getLaporanPajakOneData($month)
    {
        $allData = [];
        $dataReturn = 0;
        $query = " SELECT sum(p.biaya) as total_pajak 
                    FROM kegiatan k 
                        INNER JOIN anggaran a 
                            ON a.id_kegiatan = k.id 
                        RIGHT JOIN pajak p 
                            ON a.id = p.id_anggaran 
                    WHERE k.tanggal Like :month ";
        $this->db->query($query);
        $this->db->bind('month', $month . '%');
        $allData = $this->db->resultset();
        for ($i = 0; $i < count($allData); $i++) {
            $dataReturn = $allData[$i]['total_pajak'];
        }
        if (is_null($dataReturn)) {
            return 0;
        } else {
            return intval($dataReturn);
        }
    }
}
