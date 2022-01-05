<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan.xls");
header("Program: no-cache");
header("Expires: 0");
?>


<body id="data-laporan-export">
    <br>
    <br>
    <center>
        <h2>Laporan pajak</h2>
        <input type="hidden" id="tanggal_kegiatan" value="<?= $data['month']; ?>">
    </center>
    <br>
    <table>
        <tr>
            <td></td>
            <td>
                <table>
                    <tr>
                        <td>OPD</td>
                        <td>:</td>
                        <td>BAPEDDA KAB KARAWANG</td>
                    </tr>
                    <tr>
                        <td>Pengguna Anggaran (PA)/Kuasa PA/PPTK</td>
                        <td>:</td>
                        <td><?= $data['KPA']['nama_pegawai']; ?></td>
                    </tr>
                    <tr>
                        <td>Bendahara (Penerimaan/Pengeluaran)</td>
                        <td>:</td>
                        <td><?= $data['BP']['nama_pegawai']; ?></td>
                    </tr>
                    <tr>
                        <td>Bendahara Pembantu</td>
                        <td>:</td>
                        <td> <?= $data['BPP']['nama_pegawai']; ?></td>
                    </tr>
                    <tr>
                        <td>Kegiatan</td>
                        <td>:</td>
                        <td width="100%"> <span class='kegiatan_search'><?= $data['kegiatan'][0]['nama_kegiatan'] ?></span></td>
                    </tr>
                    <tr>
                        <td>Bulan</td>
                        <td>:</td>
                        <td><span class="bulan_search"><?= $data['month']; ?></span></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr>
            <td></td>
            <td>
                <table width="100%" border="1">
                    <thead>
                        <tr>
                            <th>No Urut Buku</th>
                            <th>Tanggal</th>
                            <th>Uraian</th>
                            <th>Pemotongan</th>
                            <th>Penyetoran</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody id="result-data">
                        <?php
                        $no = 1;
                        $saldo = 0;
                        $total_pajak = 0;
                        $total_setor = 0;
                        foreach ($data['total_pajak'] as $data_loop) :
                            $total_pajak = $total_pajak + $data_loop['pajak'];
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $data_loop['tanggal']; ?></td>
                                <td><?= $data_loop['keterangan']; ?></td>
                                <td><?= $data_loop['pajak']; ?></td>
                                <?php if (intval($data_loop['status_pajak']) == 1) {
                                    $total_setor = $total_setor + $data_loop['pajak'];
                                ?>
                                    <td><?= $data_loop['pajak']; ?></td>
                                    <td> - </td>
                                <?php } else if (intval($data_loop['status_pajak']) == 0) {
                                    $saldo = $saldo + $data_loop['pajak'];
                                ?>
                                    <td> - </td>
                                    <!-- <td><?= $data_loop['pajak']; ?></td> -->
                                    <td> - </td>
                                <?php } ?>

                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Jumlah Bulan Ini</th>
                            <td><?= $total_pajak; ?></td>
                            <td><?= $total_setor; ?></td>
                            <td><?= $saldo; ?></td>
                        </tr>
                        <tr>
                            <th colspan="3">Jumlah s/d Bulan Lalu</th>
                            <td><?= $data['total_bulan_lalu']['pajak']; ?></td>
                            <td><?= $data['total_bulan_lalu']['lunas']; ?></td>
                            <td><?= $data['total_bulan_lalu']['nunggak']; ?></td>
                        </tr>

                        <tr>
                            <th colspan="3">Jumlah s/d Bulan Ini</th>
                            <td><?= $data['total_bulan_lalu']['pajak'] + $data['total_bulan_lalu']['allpajak']; ?></td>
                            <td><?= $data['total_bulan_lalu']['lunas'] + $data['total_bulan_lalu']['lunas_now']; ?></td>
                            <td><?= $data['total_bulan_lalu']['nunggak'] + $data['total_bulan_lalu']['nunggak_now']; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table>
        <tr>
            <td colspan="4">
            </td>
            <td colspan="2">
                <center>
                    Karawang, <?= date("d F Y") ?>
                </center>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="6">
                <center>
                    Mengetahui,
                </center>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
                <center>
                    Kuasa Pengguna Anggaran,
                </center>
            </td>
            <td></td>
            <td colspan="2">
                <center>
                    Bendahara Pembantu Pengeluaran,
                </center>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
            </td>
            <td></td>
            <td colspan="2">
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
            </td>
            <td></td>
            <td colspan="2">
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
            </td>
            <td></td>
            <td colspan="2">
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
            </td>
            <td></td>
            <td colspan="2">
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
            </td>
            <td></td>
            <td colspan="2">
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
                <center style="text-decoration: underline;">
                    <?= $data['KPA']['nama_pegawai']; ?>
                </center>
            </td>
            <td></td>
            <td colspan="2">
                <center style="text-decoration: underline;">
                    <?= $data['BPP']['nama_pegawai']; ?>
                </center>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
                <center>
                    NIP. <?= $data['KPA']['no_pegawai']; ?>
                </center>
            </td>
            <td></td>
            <td colspan="2">
                <center>
                    NIP. <?= $data['BPP']['no_pegawai']; ?>
                </center>
            </td>
        </tr>
    </table>
</body>

</html>