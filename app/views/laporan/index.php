<?php
// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: attachment; filename=Data Pegawai.xls");
// header("Program: no-cache");
// header("Expires: 0");

?>
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

    <div class="row container-fluid">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">OPD</label>
                        <label for="example-text-input" class="col-sm-2 col-form-label">: BAPEDDA KAB KARAWANG</label>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Pengguna Anggaran (PA)/Kuasa PA/PPTK</label>
                        <label for="example-text-input" class="col-sm-2 col-form-label">: ANI MUTHIA,SKM,MARS</label>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Bendahara (Penerimaan/Pengeluaran)</label>
                        <label for="example-text-input" class="col-sm-2 col-form-label">: Hani Agustiani</label>
                    </div>
                    <div class="row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Bendahara Pembantu</label>
                        <label for="example-text-input" class="col-sm-2 col-form-label">: Warsid</label>
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


                </div>
            </div>
            <a href="<?= BASEURL; ?>/laporan/printLaporanPajak" class="btn btn-primary"> Print </a>
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
                // alert($('#tanggal_kegiatan').val())
                const month = $('#tanggal_kegiatan').val();
                if (month == '') {
                    alert('Tanggal harap di isi')
                } else {
                    console.log(month);
                    $.ajax({
                        url: '<?= BASEURL; ?>/laporan/getKegitanByDate',
                        data: {
                            month: month
                        },
                        method: 'post',
                        dataType : 'json',
                        success: function(data) {
                            console.log("SUCCESS");
                            if(data.length != 0){
                                for (let i = 0; i < data.length; i++) {
                                    const element = array[i];
                                    console.log(element.id);
                                }
                            }
                        },
                        error: function(data) {
                            console.log("ERROR");
                            console.log(data);
                        }
                    });

                }
            })
        })

        function mont_val() {}
    </script>