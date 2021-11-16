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
        <div class="col-lg-5">
            
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title"></h4>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-3 col-form-label">Nama Kegiatan</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" value="" id="nama_kegiatan" placeholder="nama kegiatan" readonly>
                            <input class="form-control" type="hidden" value="" id="nama_kegiatan_hide" name="nama_kegiatan">
                            <input class="form-control" type="hidden" value="" id="id_kegiatan">
                            <input class="form-control" type="hidden" value="" id="tanggal_kegiatan">
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-primary waves-effect waves-light" type="button" data-toggle="modal" data-target="#dataModal"> search </button>
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
                            <td>NO</td>
                            <td>Tanggal</td>
                            <td>Nama Kegiatan</td>
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
</div>