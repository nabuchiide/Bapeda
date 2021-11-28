<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data Pegawai.xls");
    header("Program: no-cache");
    header("Expires: 0");
?>

<body>
    <br>
    <br>
    <center>
        <h1>Laporan pajak</h1>
    </center>
    <br>
    <table>
        <tr>
            <td></td>
            <td>
                <table>
                    <tr>
                        <td>OPD</td>
                        <td>: BAPEDDA KAB KARAWANG</td>
                    </tr>
                    <tr>
                        <td>Pengguna Anggaran (PA)/Kuasa PA/PPTK</td>
                        <td>: ANI MUTHIA,SKM,MARS</td>
                    </tr>
                    <tr>
                        <td>Bendahara (Penerimaan/Pengeluaran)</td>
                        <td>: Hani Agustiani</td>
                    </tr>
                    <tr>
                        <td>Bendahara Pembantu</td>
                        <td>Bendahara Pembantu</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <br>
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
                    <tbody>
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
                            <th>xxxxxxxxxxx</th>
                            <th>xxxxxxxxxxx</th>
                            <th>xxxxxxxxxxx</th>
                        </tr>
                        <tr>
                            <th colspan="3">Jumlah s/d Bulan Lalu</th>
                            <th>xxxxxxxxxxx</th>
                            <th>xxxxxxxxxxx</th>
                            <th>xxxxxxxxxxx</th>
                        </tr>
                        <tr>
                            <th colspan="3">Jumlah s/d Bulan Ini</th>
                            <th>xxxxxxxxxxx</th>
                            <th>xxxxxxxxxxx</th>
                            <th>xxxxxxxxxxx</th>
                        </tr>
                    </tfoot>
                </table>
            </td>
        </tr>
    </table>

</body>

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
                            $('.kegiatan_search').html(element.nama_kegiatan)
                            $('.bulan_search').html(month);
                        }
                    } else {
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
                                data_load += '    <td>' + numberWithCommas(saldo) + '</td>'
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

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>

</html>