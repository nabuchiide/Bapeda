<body onload="window.print()">
    <div class="row container-fluid" id="row-data-laporan">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <center>
                        <h2>Laporan Pajak</h2>
                    </center>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">OPD</label>
                        <label for="example-text-input" class="col-sm-6 col-form-label">: BAPEDDA KAB KARAWANG</label>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Pengguna Anggaran (PA)/Kuasa PA/PPTK</label>
                        <label for="example-text-input" class="col-sm-6 col-form-label">: <?= $data['KPA']['nama_pegawai']; ?></label>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Bendahara (Penerimaan/Pengeluaran)</label>
                        <label for="example-text-input" class="col-sm-6 col-form-label">: <?= $data['BP']['nama_pegawai']; ?></label>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Bendahara Pembantu</label>
                        <label for="example-text-input" class="col-sm-6 col-form-label">: <?= $data['BPP']['nama_pegawai']; ?></label>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Kegiatan</label>
                        <label for="example-text-input" class="col-sm-6 col-form-label">: <span class='kegiatan_search'> <?= $data['kegiatan'][0]['nama_kegiatan'] ?></span></label>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-4 col-form-label">Bulan</label>
                        <label for="example-text-input" class="col-sm-6 col-form-label">: <span class="bulan_search"><?= $data['month']; ?></span></label>
                    </div>
                    <table class="table table-bordered data-table-format" width="100%">
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
                                    <td><?= number_format($data_loop['pajak']); ?></td>
                                    <?php if (intval($data_loop['status_pajak']) == 1) {
                                        $total_setor = $total_setor + $data_loop['pajak'];
                                    ?>
                                        <td><?= number_format($data_loop['pajak']); ?></td>
                                        <td> - </td>
                                    <?php } else if (intval($data_loop['status_pajak']) == 0) {
                                        $saldo = $saldo + $data_loop['pajak'];
                                    ?>
                                        <td> - </td>
                                        <!-- <td><?= number_format($data_loop['pajak']); ?></td> -->
                                        <td> - </td>
                                    <?php } ?>

                                </tr>
                            <?php $no++;
                            endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Jumlah Bulan Ini</th>
                                <th><?= number_format($total_pajak); ?></th>
                                <th><?= number_format($total_setor); ?></th>
                                <th><?= number_format($saldo); ?></th>
                            </tr>
                            <tr>
                                <th colspan="3">Jumlah s/d Bulan Lalu</th>
                                <th><?= number_format($data['total_bulan_lalu']['pajak']); ?></th>
                                <th><?= number_format($data['total_bulan_lalu']['lunas']); ?></th>
                                <th><?= number_format($data['total_bulan_lalu']['nunggak']); ?></th>
                            </tr>

                            <tr>
                                <th colspan="3">Jumlah s/d Bulan Ini</th>
                                <th><?= number_format($data['total_bulan_lalu']['pajak'] + $data['total_bulan_lalu']['allpajak']); ?></th>
                                <th><?= number_format($data['total_bulan_lalu']['lunas'] + $data['total_bulan_lalu']['lunas_now']); ?></th>
                                <th><?= number_format($data['total_bulan_lalu']['nunggak'] + $data['total_bulan_lalu']['nunggak_now']); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                    <br>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-11 col-form-label d-flex justify-content-end"> Karawang, <?= date("d F Y") ?></label>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-10 col-form-label d-flex justify-content-center">Mengetahui,</label>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-5 col-form-label d-flex justify-content-around"> Kuasa Pengguna Anggaran,</label>
                        <label for="example-text-input" class="col-sm-5 col-form-label d-flex justify-content-around"> Bendahara Pembantu Pengeluaran,</label>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-5 col-form-label d-flex justify-content-around"> <?= $data['KPA']['nama_pegawai']; ?></label>
                        <label for="example-text-input" class="col-sm-5 col-form-label d-flex justify-content-around"> <?= $data['BPP']['nama_pegawai']; ?></label>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-5 col-form-label d-flex justify-content-around"> <?= $data['KPA']['no_pegawai']; ?></label>
                        <label for="example-text-input" class="col-sm-5 col-form-label d-flex justify-content-around"> <?= $data['BPP']['no_pegawai']; ?></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>