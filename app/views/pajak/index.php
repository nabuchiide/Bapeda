<?php 
    $dataKegiatan       = $data['kegiatan'];
?>
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="btn-group float-right">
                        <ol class="breadcrumb hide-phone p-0 m-0">
                            <li class="breadcrumb-item"><a href="<?= BASEURL?>"><?= APL_NAME; ?></a></li>
                            <li class="breadcrumb-item active"><?= $data['judul'];?></li>
                        </ol>
                    </div>
                    <h4 class="page-title"><?= ucwords($data['judul']);?></h4>
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
                        <label for="example-text-input" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" value="" id="nama_kegiatan" placeholder="nama kegiatan" readonly>
                            <input class="form-control" type="hidden" value="" id="nama_kegiatan_hide" name="nama_kegiatan">
                            <input class="form-control" type="hidden" value="" id="id_kegiatan">
                            <input class="form-control" type="hidden" value="" id="tanggal_kegiatan">
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-primary waves-effect waves-light" type="button" data-toggle="modal" data-target="#dataModal"> search </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row container-fluid" id="cardPajak" style="display: none;">
        <div class="col-lg">
            <div id="message"></div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered data-table-format" width = "100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Keterngan</th>
                                <th>Pajak</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <!-- <tbody> -->
                        <tbody id="resultPajak">
                            
                        </tbody>
                    </table>
                    <hr>
                    <div class="post_msg" id="post_msg"></div>
                    <div class="row justify-content-end generate-status">
                        <button class="btn btn-success" onclick="generate();">Generate Pajak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</div>

<!-- Modal -->
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
            <table class="table table-bordered data-table-format" width = "100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>Nama Kegiatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1; 
                        foreach($dataKegiatan as $data ):?>
                    <tr>
                        <td><?= $no;?></td>
                        <td><?= $data['tanggal'];?></td>
                        <td>
                            <a href= "#" class="getNamaKegiatan" data-kegiatan="<?= $data['nama_kegiatan']; ?>" 
                                                                data-id="<?=$data['id'];?>" 
                                                                data-tanggal="<?= $data['tanggal'];?>" 
                                                                data-dismiss="modal">
                                <span>
                                    <?= $data['nama_kegiatan'];?>
                                </span>
                            </a>
                            
                        </td>
                    </tr>
                    <?php
                        $no++; 
                        endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

        $('.getNamaKegiatan').on('click', function(){
            const kegiatan  = $(this).data('kegiatan');
            const id        = $(this).data('id');
            const tanggal   = $(this).data('tanggal');
            const status    = $(this).data('status');

            reloadTablePajak(id,tanggal);

            $("#nama_kegiatan").val(kegiatan);
            $("#nama_kegiatan_hide").val(kegiatan);
            $("#id_kegiatan").val(id);
            $("#tanggal_kegiatan").val(tanggal);
            $("#tanggal_table_anggaran").html(tanggal);
            
            if(status != 0){
                $("#form-anggaran").empty();
                $(".generate-status").empty();
            }

            $("#cardPajak").show();
        })

        $(document).on('click','.btn-lunasi', function(){
            const id        = $(this).data('id');
            update_status(id);
            reloadTablePajak($("#id_kegiatan").val(),$("#tanggal_kegiatan").val())
        });

    });

    function reloadTablePajak(id,tanggal) {
        $.ajax({
                url         : '<?= BASEURL;?>/pajak/getByKegiatanPajak',
                data        : {id: id},
                method      : 'post',
                dataType    : 'json',
                success     : function(data){
                    console.log(data);
                    $("#resultPajak").empty();
                    var data_load = "";
                    let no = 1;
                    if(data.length != 0){
                        for (let i = 0; i < data.length; i++) {
                            const element = data[i];
                            var stat        = ""
                            var action_text = ""
                            if(element.status == "0"){
                                stat = "Belum dibayar"
                                action_text = '<button class="btn btn-success btn-lunasi" data-id="'+element.id_pajak+'">Lunasi</button>'
                            }else if(element.status == "1"){
                                stat        = "Sudah dibayar"
                                action_text = 'Lunas'
                            }else{
                                stat         = " - "
                                action_text  = " - "
                            }
                            data_load += '<tr>'
                            data_load += '    <td>'+no+'</td>'
                            data_load += '    <td>'+tanggal+'</td>'
                            data_load += '    <td>'+element.keterangan+'</td>'
                            data_load += '    <td>'+element.pajak+'</td>'
                            data_load += '    <td>'+stat+'</td>'
                            data_load += '    <td>'
                            data_load += action_text
                            data_load += '    </td>'
                            data_load += '</tr>'
                            no++;
                        }
                    }
                    $("#resultPajak").append(data_load);
                },
                error: function(data){
                    console.log(data);
                }
        });
    }

    function update_status(id){
        $.ajax({
                url         : '<?= BASEURL;?>/pajak/pelunasan',
                data        : {id: id},
                method      : 'post',
                dataType    : 'json',
                success     : function(data){
                    console.log(data);
                    if(data == 'success'){
                        $("#message").html(message('Berhasil','Melakukan Pembayaran','success','Pajak'));
                    }else if (data == 'failed'){
                        $("#message").html(message('Gagal','Melakukan Pembayaran','danger','Pajak'));
                    }else{
                        $("#message").html(message('Gagal','Melakukan Pembayaran','danger','Pajak'));
                    }
                },
                error       : function(data){
                    console.log(data);
                }
        });
    }

    function message(pesan,aksi,tipe,data){
        allert_load = "";
        allert_load += '<div class="alert alert-'+tipe+' alert-dismissible fade show" role="alert">'
        allert_load +=     '<strong>'+pesan+' </strong> '+aksi+' '+data
        allert_load +=     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
        allert_load +=     '<span aria-hidden="true">&times;</span>'
        allert_load +=     '</button>'
        allert_load += '</div>'
        return allert_load
    }

</script>