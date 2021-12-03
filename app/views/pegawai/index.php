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
    <?php Flasher::flash(); ?>
    <div class="row container-fluid">

        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Input Data Pegawai</h4>
                    <!-- SELECT `id`, `nama_pegawai`, `alamat`, `no_pegawai`, `agama` FROM `pegawai` WHERE 1 -->
                    <form action="<?= BASEURL; ?>/pegawai/tambah" method="post" class="form-enter">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="hidden" value="" id="id_pegawai" name="id" placeholder="">
                                <input class="form-control" type="text" value="" id="nama_pegawai" name="nama_pegawai" placeholder="nama pegawai">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="" id="no_pegawai" name="no_pegawai" placeholder="nomor pegawai">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Bidang</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="bidang" id="bidang">
                                    <option value="">Select Bidang</option>
                                    <option value="PTR">Prasarana dan Tata Ruang</option>
                                    <option value="PEK">Perekonomian</option>
                                    <option value="PKS">Pemerintahan dan Kesejahteraan Sosial</option>
                                    <option value="PME">Pembiayaan Monitoring dan Evaluasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="jabatan" id="jabatan">
                                    <option value="">Select Jabatan</option>
                                    <option value="KPA">Kuasa Pengguna Anggaran</option>
                                    <option value="BPP">Bendahara pembantu</option>
                                    <option value="BPP">Bendahara pembantu pengeluaran</option>
                                    <option value="PTK">Pejabat Pelaksana Teknis Kegiatan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-5">
                                <button class="btn btn-primary waves-effect waves-light" type="submit"> Save </button>
                                <button class="btn btn-danger waves-effect waves-light" type="reset" onclick="reload_location('pegawai')"> Reset </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <table id="datatable2" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No Pegawai</th>
                                <th>Nama</th>
                                <th>Bidang</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['pegawai'] as $data) : ?>
                                <tr>
                                    <td><?= $data['no_pegawai']; ?></td>
                                    <td><?= $data['nama_pegawai']; ?></td>
                                    <td><?= $data['bidang']; ?></td>
                                    <td><?= $data['jabatan']; ?></td>
                                    <td>
                                        <a href="<?= BASEURL; ?>/pegawai/hapus/<?= $data['id']; ?>" class="" onclick="return confirm('Yakin?');">
                                            <span>
                                                Hapus
                                            </span>
                                        </a>
                                        <a href="#" class="getUbah" data-id="<?= $data['id']; ?>">
                                            <span>
                                                Ubah
                                            </span>
                                        </a>
                                        <!-- <a href="<?= BASEURL; ?>/pegawai/detail/<?= $data['id']; ?>" class="">
                                        <span>
                                            Detail
                                        </span>
                                    </a>  -->
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.form-enter').on('keypress', function(e) {
            return e.which !== 13;
        });

        $('#datatable2').DataTable();

        $('.getUbah').on('click', function() {

            const id = $(this).data('id')
            $.ajax({
                url: '<?= BASEURL; ?>/pegawai/getUbah/',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $("#id_pegawai").val(data.id);
                    $("#nama_pegawai").val(data.nama_pegawai);
                    $("#no_pegawai").val(data.no_pegawai);
                    $("#bidang").val(data.bidang);
                    $("#jabatan").val(data.jabatan);

                    $(".card-body form").attr('action', '<?= BASEURL; ?>/pegawai/ubah')
                    $('.card-body form button[type=submit]').html('Ubah Data')

                }
            });
        });
    });
</script>