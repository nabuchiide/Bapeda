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

    <div class="row container-fluid" id="cardAnggaran" style="display: none;">
        <div class="col-lg">
            <div id="message"></div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered data-table-format" width = "100%">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Tanggal</td>
                                <td>Keterngan</td>
                                <td>Anggaran</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <!-- <tbody> -->
                        <tbody id="resultAnggaran">
                            
                        </tbody>
                        <tbody>
                            <tr>
                                <td bgcolor="SteelBlue"></td>
                                <td><span id="tanggal_table_anggaran"></span></td>
                                <td>
                                      <div class="row_data" tabel-col-name="id" style="display:none"></div>
                                      <div class="row_data" tabel-col-name="keterangan">keterangan</div>
                                </td>
                                <td><div class="row_data" tabel-col-name="biaya">Anggaran</div></td>
                                <td>
                                    <span class="btn-edit"><a href="#" class="btn btn-warning">Edit</a></span>
                                    <span class="btn-save"><a href="#" class="btn btn-primary">Save</a></span>
                                    <span class="btn-cancel"><a href="#" class="btn btn-link">Cancel</a></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="post_msg" id="post_msg"></div>
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

<script>
    $(document).ready(function(){
        $(document).find('.btn-save').hide();
        $(document).find('.btn-cancel').hide();

        $('.getNamaKegiatan').on('click', function(){
            const kegiatan = $(this).data('kegiatan');
            const id = $(this).data('id');
            const tanggal = $(this).data('tanggal');
            reloadTabelAnggaran(id,tanggal);

            $("#nama_kegiatan").val(kegiatan);
            $("#nama_kegiatan_hide").val(kegiatan);
            $("#id_kegiatan").val(id);
            $("#tanggal_kegiatan").val(tanggal);
            $("#tanggal_table_anggaran").html(tanggal);
            $("#cardAnggaran").show();
        })

        $(document).on('click','.btn-edit',function(event){
            event.preventDefault();
            var tbl_row = $(this).closest('tr');
            var row_id = tbl_row.attr('row_id');
            tbl_row.find('.btn-save').show();
            tbl_row.find('.btn-cancel').show();

            tbl_row.find('.btn-edit').hide();
            tbl_row.find('.btn-delete').hide();

            tbl_row.find('.row_data')
                    .attr('contenteditable', 'true')
                    .attr('edit_type', 'button')
                    .addClass('bg-warning')
                    .css('padding','3px')

            tbl_row.find('.row_data').each(function(index, val) 
            {  
                $(this).attr('original_entry', $(this).html());
            }); 	

        });
    
        $(document).on('click','.btn-cancel' ,function(event){
            event.preventDefault();
            var tbl_row = $(this).closest('tr');
            var row_id = tbl_row.attr('row_id');

            tbl_row.find('.btn-save').hide();
            tbl_row.find('.btn-cancel').hide();

            tbl_row.find('.btn-edit').show();
            tbl_row.find('.btn-delete').show();
            
            tbl_row.find('.row_data')
                    .attr('edit_type', 'click')	 
                    .removeClass('bg-warning')
                    .css('padding','') 

            tbl_row.find('.row_data').each(function(index, val) 
            {   
                $(this).html( $(this).attr('original_entry') ); 
            });  

        });

       $(document).on('click','.btn-save', function(event){
            event.preventDefault();
            
            var tbl_row = $(this).closest('tr');
            var row_id = tbl_row.attr('row_id');
                
            tbl_row.find('.btn-save').hide();
            tbl_row.find('.btn-cancel').hide();

            tbl_row.find('.btn-edit').show();

            //make the whole row editable
            tbl_row.find('.row_data')
                    .attr('edit_type', 'click')	
                    .removeClass('bg-warning')
                    .css('padding','') 

            //--->get row data > start
            var arr = {}; 
            tbl_row.find('.row_data').each(function(index, val) 
            {   
                var col_name = $(this).attr('tabel-col-name');  
                var col_val  =  $(this).html();
                arr[col_name] = col_val;
            });
            //--->get row data > end
            
            //use the "arr"	object for your ajax call
            $.extend(arr, {row_id:row_id});
            
            //out put to show
            
            // Create a form synamically
            var form = document.createElement("form");
            form.setAttribute("id", "tambah-anggaran");
            form.setAttribute("method", "post");
            form.setAttribute("action", "<?= BASEURL;?>/anggaran/tambah");
            var stat = document.createElement("input");
                stat.setAttribute("type", "text");
                stat.setAttribute("name", "status");
                stat.setAttribute("value", "0");
                form.append(stat); 
            var id_kegiatan = document.createElement("input");
                id_kegiatan.setAttribute("type", "text");
                id_kegiatan.setAttribute("name", "id_kegiatan");
                id_kegiatan.setAttribute("value",  $("#id_kegiatan").val());
                form.append(id_kegiatan); 

            for(const[key,value] of Object.entries(arr)){
                //console.log(key+":"+value);
                var inp = document.createElement("input");
                inp.setAttribute("type", "text");
                inp.setAttribute("name", key);
                inp.setAttribute("value", value);
                form.append(inp); 
            }
                document.getElementsByClassName("post_msg")[0]
                .appendChild(form);

               $.ajax({
                    url      : '<?= BASEURL;?>/anggaran/tambah', 
                    data     : $("#tambah-anggaran").serialize(),
                    method   : 'post',
                    dataType : 'json',
                    success  : function(data){
                        console.log(data);
                        if(data == 'success insert'){
                            $("#message").html(message('berhasil','ditambahkan','success','Anggaran'));
                        }else if (data == 'success update'){
                            $("#message").html(message('berhasil','diubah','success','Anggaran'));
                        }else{
                            $("#message").html(message('gagal','diubah atau ditambahkan','danger','Anggaran'));
                        }

                        reloadTabelAnggaran($("#id_kegiatan").val(),$("#tanggal_kegiatan").val())
                        $("#post_msg").empty();
                    },
                    error    : function(){
                        alert("ERROR")
                    }
                   
               });
        });

    });

    function reloadTabelAnggaran(id,tanggal) {
        $.ajax({
                url         : '<?= BASEURL;?>/anggaran/getByKegitanAnggaran',
                data        : {id: id},
                method      : 'post',
                dataType    : 'json',
                success     : function(data){
                    $("#resultAnggaran").empty();
                    var data_load = "";
                    let no = 1;
                    if(data.length != 0){
                        for (let i = 0; i < data.length; i++) {
                            const element = data[i];
                            //console.log(element);
                            data_load += '<tr>'
                            data_load += '    <td>'+no+'</td>'
                            data_load += '    <td>'+tanggal+'</td>'
                            data_load += '    <td><div class="row_data" tabel-col-name="id" style="display:none">'+element.id+'</div>'
                            data_load += '          <div class="row_data" tabel-col-name="keterangan">'+element.keterangan+'</div>'
                            data_load += '    </td>'
                            data_load += '    <td><div class="row_data" tabel-col-name="biaya">'+element.biaya+'</div></td>'
                            data_load += '    <td>'
                            data_load += '        <span class="btn-edit"><a href="#" class="btn btn-warning">Edit</a></span>'
                            data_load += '        <a href="#" class="btn btn-danger btn-delete" onclick="deleteData('+element.id+')">delete</a>'
                            data_load += '        <span class="btn-save"><a href="#" class="btn btn-primary">Save</a></span>'
                            data_load += '        <span class="btn-cancel"><a href="#" class="btn btn-link">Cancel</a></span>'
                            data_load += '    </td>'
                            data_load += '</tr>'
                            no++
                        }
                        data_load += '<tr>'
                        data_load += '    <td colspan="5" bgcolor="SteelBlue">'
                        data_load += '    </td>'
                        data_load += '<tr>'
                        
                        $("#resultAnggaran").append(data_load);
                        $(document).find('.btn-save').hide();
                        $(document).find('.btn-cancel').hide(); 
                    }

                },
                error: function(data){
                    console.log(data);
                }
            });
    }

    function message(pesan,aksi,tipe,data){
        allert_load = "";
        allert_load += '<div class="alert alert-'+tipe+' alert-dismissible fade show" role="alert">'
        allert_load +=     'Data '+data+' <strong>'+pesan+' </strong> '+aksi
        allert_load +=     '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
        allert_load +=     '<span aria-hidden="true">&times;</span>'
        allert_load +=     '</button>'
        allert_load += '</div>'
        return allert_load
    }

    function deleteData(id){
        var konfirmasi = confirm("Data akan di hapus permanen dari database");
        if(konfirmasi == true){
            $.ajax({
                    url      : '<?= BASEURL;?>/anggaran/hapus', 
                    data     : {id,id},
                    method   : 'post',
                    dataType : 'json',
                    success  : function(data){
                        if(data == 'success'){
                            $("#message").html(message('berhasil','dihapus','success','Anggaran'));
                        }else{
                            $("#message").html(message('gagal','diubah atau ditambahkan','danger','Anggaran'));
                        }
    
                        reloadTabelAnggaran($("#id_kegiatan").val(),$("#tanggal_kegiatan").val())
                    },
                    error    : function(){
                        alert("ERROR")
                    }
                });
        }else{
            $("#message").html(message('tidak jadi','dihapus','danger','Anggaran'));
        }
    }
    
</script>