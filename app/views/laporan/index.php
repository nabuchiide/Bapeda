
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="<?= BASEURL ?>"><?= APL_NAME; ?></a></li>
                            <li class="breadcrumb-item active"><?= $data['judul']; ?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= ucwords($data['judul']); ?></h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="row container-fluid">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title"></h4>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Tanggal </label>
                        <div class="col-sm-7">
                            <input class="form-control" type="month" id="tanggal_kegiatan">
                            <input class="form-control" type="hidden" id="id_kegiatan">
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-primary waves-effect waves-light get-kegiatan-by-date" type="button"> search </button>
                            <!-- <button class="btn btn-primary waves-effect waves-light" type="button" data-toggle="modal" data-target="#dataModal"> search </button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row container-fluid" style="display: none;" id="row-data-laporan">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">OPD</label>
                        <label for="example-text-input" class="col-sm-2 col-form-label">: BAPEDDA KAB KARAWANG</label>
                    </div>
                    <!-- <pre>
                        <?php print_r($data);?>
                    </pre> -->
                    <div class="row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Pengguna Anggaran (PA)/Kuasa PA/PPTK</label>
                        <!-- <label for="example-text-input" class="col-sm-2 col-form-label">: <?= implode("", $data['PPTK']); ?></label> -->
                        <label for="example-text-input" class="col-sm-2 col-form-label">: <?= $data['KPA']['nama_pegawai']; ?></label>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Bendahara (Penerimaan/Pengeluaran)</label>
                        <!-- <label for="example-text-input" class="col-sm-2 col-form-label">: <?= implode("", $data['BPP']); ?></label> -->
                        <label for="example-text-input" class="col-sm-2 col-form-label">: <?= $data['BPP']['nama_pegawai']; ?></label>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Bendahara Pembantu</label>
                        <!-- <label for="example-text-input" class="col-sm-2 col-form-label">: <?= implode("", $data['BP']); ?></label> -->
                        <label for="example-text-input" class="col-sm-2 col-form-label">: <?= $data['BP']['nama_pegawai']; ?></label>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Kegiatan</label>
                        <label for="example-text-input" class="col-sm-2 col-form-label">: <span class='kegiatan_search'></span></label>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Bulan</label>
                        <label for="example-text-input" class="col-sm-2 col-form-label">: <span class="bulan_search"></span></label>
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
                            <tr>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                            </tr>
                            <tr>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                            </tr>
                            <tr>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                            </tr>
                            <tr>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                                <td>xxxxxxxxxxx</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Jumlah Bulan Ini</th>
                                <th><span id="total-pajak-bulan-ini"></span></th>
                                <th><span id="total-setor-bulan-ini"></span></th>
                                <th><span id="total-saldo-bulan-ini"></span></th>
                            </tr>
                            <tr>
                                <th colspan="3">Jumlah s/d Bulan Lalu</th>
                                <th><span id="total-pajak-bulan-lalu"></th>
                                <th><span id="total-setor-bulan-lalu"></th>
                                <th><span id="total-saldo-bulan-lalu"></th>
                            </tr>
                            <tr>
                                <th colspan="3">Jumlah s/d Bulan Ini</th>
                                <th><span id="total-pajak-keseluruhan"></th>
                                <th><span id="total-setor-keseluruhan"></th>
                                <th><span id="total-saldo-keseluruhan"></th>
                            </tr>
                        </tfoot>
                    </table>


                </div>
            </div>
            <!-- <a href="<?= BASEURL; ?>/laporan/printLaporanPajak" class="btn btn-primary" id="print_excel"> Print </a> -->
            <a href="#" class="btn btn-primary" id="print_excel" onclick="func_print_excel();"> Print Excel</a>
            <a href="#" class="btn btn-success" id="print_excel" onclick="func_print_pdf();"> Print PDF</a>
        </div>
    </div>

</div>

<div class="modal fade bd-example-modal-lg" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataModalLabel">Data Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered data-table-format" width="100%">

                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.get-kegiatan-by-date', function(event) {
                const month = $('#tanggal_kegiatan').val();
                if (month == '') {
                    alert('Tanggal harap di isi')
                } else {
                    getKegitanByDate(month)
                    getUntilMonthOne(month)
                }
                $('#row-data-laporan').show();
                // document.getElementById("print_excel").href = "<?= BASEURL; ?>/laporan/printLaporanPajak/"+month+"/"+$('#id_kegiatan').val();

            })
        })

        function getKegitanByDate(month) {
            $.ajax({
                url: '<?= BASEURL; ?>/laporan/getKegitanByDate',
                data: {
                    month: month
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    var data_load = ""
                    if (data.length != 0) {
                        for (let i = 0; i < data.length; i++) {
                            const element = data[i];
                            getTotalPajak(element.id)
                            $('#id_kegiatan').val(element.id)
                            $('.kegiatan_search').html(element.nama_kegiatan)
                            $('.bulan_search').html(month);
                        }
                    } else {
                        $('#id_kegiatan').val("")
                        $('.bulan_search').html(month);
                        $('.kegiatan_search').html(" - ");

                        $('#result-data').empty();

                        data_load += '<tr>'
                        data_load += '    <td> - </td>'
                        data_load += '    <td> - </td>'
                        data_load += '    <td> - </td>'
                        data_load += '    <td> - </td>'
                        data_load += '    <td> - </td>'
                        data_load += '    <td> - </td>'
                        data_load += '</tr>'
                        $('#result-data').append(numberWithCommas(data_load));
                        $('#total-pajak-bulan-ini').html(numberWithCommas(0))
                        $('#total-setor-bulan-ini').html(numberWithCommas(0))
                        $('#total-saldo-bulan-ini').html(numberWithCommas(0))
                    }
                },
                error: function(data) {
                    console.log("ERROR");
                    console.log(data);
                }
            });
        }

        function getTotalPajak(id) {
            $.ajax({
                url: '<?= BASEURL; ?>/laporan/getTotalPajak',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var data_load = ""
                    let no = 1
                    let saldo = 0;
                    let total_pajak = 0;
                    let total_setor = 0;
                    $('#result-data').empty();
                    if (data.length != 0) {
                        for (let i = 0; i < data.length; i++) {
                            const element = data[i];
                            total_pajak = parseInt(total_pajak) + parseInt(element.pajak)
                            data_load += '<tr>'
                            data_load += '    <td>' + no + '</td>'
                            data_load += '    <td>' + element.tanggal + '</td>'
                            data_load += '    <td>' + element.keterangan + '</td>'
                            data_load += '    <td>' + numberWithCommas(element.pajak) + '</td>'
                            if (element.status_pajak == '1') {
                                total_setor = parseInt(total_setor) + parseInt(element.pajak);
                                data_load += '    <td>' + element.pajak + '</td>'
                                data_load += '    <td> - </td>'
                            } else if (element.status_pajak == '0') {
                                saldo = parseInt(saldo) + parseInt(element.pajak)
                                data_load += '    <td> - </td>'
                                // data_load += '    <td>' + numberWithCommas(saldo) + '</td>'
                                data_load += '    <td> - </td>'
                            }
                            data_load += '</tr>'
                            no++;
                        }
                        $('#result-data').append(numberWithCommas(data_load));
                        $('#total-pajak-bulan-ini').html(numberWithCommas(total_pajak))
                        $('#total-setor-bulan-ini').html(numberWithCommas(total_setor))
                        $('#total-saldo-bulan-ini').html(numberWithCommas(saldo))
                    } else {
                        log("data kosong");
                    }
                },
                error: function(data) {
                    console.log("data Error");
                }
            })
        }

        function getUntilMonthOne(month) {
            $.ajax({
                url: '<?= BASEURL; ?>/laporan/getTotalPajakUntilLastMonth',
                data: {
                    month: month
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#total-pajak-bulan-lalu').html(numberWithCommas(data.pajak))
                    $('#total-setor-bulan-lalu').html(numberWithCommas(data.lunas))
                    $('#total-saldo-bulan-lalu').html(numberWithCommas(data.nunggak))

                    $('#total-pajak-keseluruhan').html(numberWithCommas(parseInt(data.pajak) + parseInt(data.allpajak)));
                    $('#total-setor-keseluruhan').html(numberWithCommas(parseInt(data.lunas) + parseInt(data.lunas_now)));
                    $('#total-saldo-keseluruhan').html(numberWithCommas(parseInt(data.nunggak) + parseInt(data.nunggak_now)));
                },
                error: function(data) {
                    console.log("ERROR");
                    console.log(data);
                }
            });
        }

        function func_print_excel() {
            const month = $('#tanggal_kegiatan').val();
            const id = $('#id_kegiatan').val();
            if (id == "") {
                alert("data Kosong ");
            } else {
                var loaction_url = "<?= BASEURL; ?>/laporan/printLaporanPajak/" + month + "/" + id
                window.open(loaction_url)
            }
        }

        function func_print_pdf() {
            const month = $('#tanggal_kegiatan').val();
            const id = $('#id_kegiatan').val();
            if (id == "") {
                alert("data Kosong ");
            } else {
                var loaction_url = "<?= BASEURL; ?>/laporan/printLaporanPajakPDF/" + month + "/" + id
                window.open(loaction_url)
            }

        }

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>