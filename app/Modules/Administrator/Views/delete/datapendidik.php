<div>
    <div class="page-hero page-container " id="page-hero">
        <div class="padding d-flex">
            <div class="page-title">
                <h2 class="text-md text-highlight"><?=$page_title?></h2>
            </div>
            <div class="flex"></div>
        </div>
    </div>
    <div class="page-content page-container" id="page-content">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills no-border" id="tab">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-data" role="tab" aria-controls="tab-data" aria-selected="false">Data</a>
                    </li>
                    <?php if($rules->i == 1) {?>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-form" role="tab" aria-controls="tab-form" aria-selected="false">Form</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="card-body">
                <div class="padding">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-data" role="tabpanel" aria-labelledby="tab-data">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Nama Modul</span></th>
                                            <th><span>Url Modul</span></th>
                                            <th class="column-2action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                            <form data-plugin="parsley" data-option="{}" id="form">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <?=csrf_field();?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>NIK</label>
                                            <input type="tel" class="form-control" id="nik" name="nik" minlength="16" maxlength="16" required placeholder="Nomor Induk Kependudukan">
                                        </div>
                                        <div class="col-6">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" id="namagadik" name="namagadik" required placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Foto pacth</label>
                                    <input type="text" class="form-control" id="photopath" name="photopath" required  placeholder="Foto pacth">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Pangkat</label>
                                            <input type="text" class="form-control" id="pangkat" name="pangkat" placeholder="Pangkat" required>
                                        </div>
                                        <div class="col-6">
                                            <label>Jabatan</label>
                                            <input type="text" class="form-control" id="jab" name="jab" placeholder="Jabatan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Satuan Kerja</label>
                                            <select class="form-control" id="id_satker" name="id_satker" required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>nrp</label>
                                            <input type="text" class="form-control" id="nrp" name="nrp" placeholder="nrp" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>No Telephone</label>
                                            <input type="tel" class="form-control" id="telp" name="telp" placeholder="No Telepn Taruna" required>
                                        </div>
                                        <div class="col-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Taruna" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option></option>
                                                <option value="1">Laki-laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Tempat Lahir</label>
                                            <select class="form-control" id="idkabkota_lhr" name="idkabkota_lhr" required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tglhr" name="tglhr" placeholder="Tanggal Lahir" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Suku</label>
                                            <select class="form-control" id="id_suku" name="id_suku" required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>Agama</label>
                                            <select class="form-control" id="id_agama" name="id_agama" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label>Alamat</label>
                                            <textarea class="form-control" id="alamat_ktp" name="alamat_ktp" placeholder="Alamat Lengkap"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Provinsi</label>
                                            <select class="form-control" id="id_prov_ktp" name="id_prov_ktp" required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>Kabupaten / Kota</label>
                                            <select class="form-control" id="id_kota_kab_ktp" name="id_kota_kab_ktp" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Kecamatan</label>
                                            <select class="form-control" id="id_kec_ktp" name="id_kec_ktp" required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>Kelurahan</label>
                                            <select class="form-control" id="id_kel_ktp" name="id_kel_ktp" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>No Skep Pat Akpol</label>
                                            <input type="text" class="form-control" id="no_skep_pat_akpol" name="no_skep_pat_akpol" placeholder="no_skep_pat_akpol">
                                        </div>
                                        <div class="col-6">
                                            <label>Tmp Pat Akpol</label>
                                            <input type="text" class="form-control" id="tmt_pat_akpol" name="tmt_pat_akpol" placeholder="tmt_pat_akpol">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Universitas Pendidikan S1</label>
                                            <input type="text" class="form-control" id="univ_dikum_s1" name="univ_dikum_s1" placeholder="Universitas Pendidikan S1">
                                        </div>
                                        <div class="col-6">
                                            <label>Jurusan Pendidikan s1</label>
                                            <input type="text" class="form-control" id="jurusan_dikum_s1" name="jurusan_dikum_s1" placeholder="Jurusan Pendidikan s1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Universitas Pendidikan S2</label>
                                            <input type="text" class="form-control" id="univ_dikum_s2" name="univ_dikum_s2" placeholder="Universitas Pendidikan S2">
                                        </div>
                                        <div class="col-6">
                                            <label>Jurusan Pendidikan s2</label>
                                            <input type="text" class="form-control" id="jurusan_dikum_s2" name="jurusan_dikum_s2" placeholder="Jurusan Pendidikan s2">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Universitas Pendidikan s3</label>
                                            <input type="text" class="form-control" id="univ_dikum_s3" name="univ_dikum_s3" placeholder="Universitas Pendidikan s3">
                                        </div>
                                        <div class="col-6">
                                            <label>Jurusan Pendidikan s3</label>
                                            <input type="text" class="form-control" id="jurusan_dikum_s3" name="jurusan_dikum_s3" placeholder="Jurusan Pendidikan s3">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Universitas Pendidikan s3</label>
                                            <input type="text" class="form-control" id="univ_dikum_s3" name="univ_dikum_s3" placeholder="Universitas Pendidikan s3">
                                        </div>
                                        <div class="col-6">
                                            <label>Jurusan Pendidikan s3</label>
                                            <input type="text" class="form-control" id="jurusan_dikum_s3" name="jurusan_dikum_s3" placeholder="Jurusan Pendidikan s3">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Lat 1</label>
                                            <input type="text" class="form-control" id="lat_1" name="lat_1" placeholder="lat_1">
                                        </div>
                                        <div class="col-6">
                                            <label>lat_2</label>
                                            <input type="text" class="form-control" id="lat_2" name="lat_2" placeholder="lat_2">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>lat_3</label>
                                            <input type="text" class="form-control" id="lat_3" name="lat_3" placeholder="lat_3">
                                        </div>
                                        <div class="col-6">
                                            <label>lat_4</label>
                                            <input type="text" class="form-control" id="lat_4" name="lat_4" placeholder="lat_4">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>lat_5</label>
                                            <input type="text" class="form-control" id="lat_5" name="lat_5" placeholder="lat_5">
                                        </div>
                                        <div class="col-6">
                                            <label>mp_1</label>
                                            <input type="text" class="form-control" id="mp_1" name="mp_1" placeholder="mp_1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>mp_2</label>
                                            <input type="text" class="form-control" id="mp_2" name="mp_2" placeholder="mp_2">
                                        </div>
                                        <div class="col-6">
                                            <label>mp_3</label>
                                            <input type="text" class="form-control" id="mp_3" name="mp_3" placeholder="mp_3">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>mp_4</label>
                                            <input type="text" class="form-control" id="mp_4" name="mp_4" placeholder="mp_4">
                                        </div>
                                        <div class="col-6">
                                            <label>mp_5</label>
                                            <input type="text" class="form-control" id="mp_5" name="mp_5" placeholder="mp_5">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Tingkat (Khusus Pengasuh)</label>
                                            <input type="text" class="form-control" id="tingkat" name="tingkat" placeholder="Khusus Pengasuh">
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Gadik</label>
                                                <div class="col-sm-8">
                                                    <div class="mt-2 mb-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_gadik" id="is_gadik0" value="0">
                                                            <label class="form-check-label" for="is_gadik0">Tidak</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_gadik" id="is_gadik1" value="1">
                                                            <label class="form-check-label" for="is_gadik1">Ya</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Pengasuh</label>
                                                <div class="col-sm-8">
                                                    <div class="mt-2 mb-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_pengasuh" id="is_pengasuh0" value="0">
                                                            <label class="form-check-label" for="is_pengasuh0">Tidak</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_pengasuh" id="is_pengasuh1" value="1">
                                                            <label class="form-check-label" for="is_pengasuh1">Ya</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Instruktur</label>
                                                <div class="col-sm-8">
                                                    <div class="mt-2 mb-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_instruktur" id="is_instruktur0" value="0">
                                                            <label class="form-check-label" for="is_instruktur0">Tidak</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_instruktur" id="is_instruktur1" value="1">
                                                            <label class="form-check-label" for="is_instruktur1">Ya</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    const auth_insert = '<?=$rules->i?>';
    const auth_edit = '<?=$rules->e?>';
    const auth_delete = '<?=$rules->d?>';
    const auth_otorisasi = '<?=$rules->o?>';

    const url_insert = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_save"?>';
    const url_edit = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_edit"?>';
    const url_delete = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_delete"?>';
    const url_load = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_load"?>';
    const url_ajax = '<?=base_url()."/".uri_segment(0)."/ajax"?>';

    var dataStart = 0;
    var table;

    $(document).ready(function(){
        // $('#datatable')

        $(document).on('submit', '#form', function(e){
            e.preventDefault();
            let $this = $(this);

            Swal.fire({
                title: "Simpan data ?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then(function(result) {
                if(result.value) {
                    Swal.fire({
                        title: "",
                        icon: "info",
                        text: "Proses menyimpan data, mohon ditunggu...",
                        didOpen: function() {
                            Swal.showLoading()
                        }
                    });

                    $.ajax({
                        url     : url_insert,
                        type    : 'post',
                        data    : $this.serialize(),
                        dataType: 'json',
                        success: function(result){
                            Swal.close();
                            if(result.success){
                                Swal.fire('Sukses','Berhasil menyimpan data pendidik', 'success');
                                $('#form').trigger("reset");
                                table.ajax.reload();
                            }else{
                                Swal.fire('Error',result.message, 'error');
                            }
                        },
                        error: function(){
                            Swal.close();
                            Swal.fire('Error','Terjadi kesalahan pada server', 'error');
                        }
                    });
                }
            });
        }).on('reset', '#form', function(){
            $('#id').val('');
        });

        table = $('#datatable').DataTable({
            "serverSide": true,
            "processing": true,
            "ordering" : true,
            "paging": true,
            "searching": { "regex": true },
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            "pageLength": 10,
            "searchDelay" : 500,
            "ajax": {
                "type": "POST",
                "url": url_load,
                "dataType": "json",
                "data": function (data) {
                   // console.log(data);
                    // Grab form values containing user options
                    dataStart = data.start;
                    let form = {};
                    Object.keys(data).forEach(function(key) {
                        form[key] = data[key] || "";
                    });

                    // Add options used by Datatables
                    let info = { 
                        "start": data.start || 0, 
                        "length": data.length, 
                        "draw": 1,  
                        "<?=csrf_token()?>": "<?=csrf_hash()?>"
                    };

                    $.extend(form, info);

                    return form;
                },
                "complete": function(response) {
                   // console.log(response);
                    feather.replace();
                }
            },
            "columns" : datatableColumn()
        }).on('init.dt', function(){
            $(this).css('width','100%');
        });

        $(document).on('click', '.edit', function(){
            let $this = $(this);

            Swal.fire({
                title: "",
                icon: "info",
                text: "Proses mengambil data, mohon ditunggu...",
                didOpen: function() {
                    Swal.showLoading()
                }
            });

            $.ajax({
                url     : url_edit,
                type    : 'post',
                data    : {
                    id : $this.data('id'),
                    "<?=csrf_token()?>": "<?=csrf_hash()?>"
                },
                dataType: 'json',
                success: function(result){
                    Swal.close();
                    if(result.success){
                        for(key in result.data){
                            $('#'+key).val(result.data[key]);
                        }

                        $('ul#tab li a').eq(1).trigger('click');
                    }else{
                        Swal.fire('Error',result.message, 'error');
                    }
                },
                error: function(){
                    Swal.close();
                    Swal.fire('Error','Terjadi kesalahan pada server', 'error');
                }
            });
        }).on('click', '.delete', function(){
            let $this = $(this);

            Swal.fire({
                title: "Hapus data ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                confirmButtonColor: '#d33',
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then(function(result) {
                if(result.value) {
                    $.ajax({
                        url     : url_delete,
                        type    : 'post',
                        data    : {
                            id : $this.data('id'),
                            "<?=csrf_token()?>": "<?=csrf_hash()?>"
                        },
                        dataType: 'json',
                        success: function(result){
                            Swal.close();
                            if(result.success){
                                Swal.fire('Sukses','Berhasil menghapus data pendidik', 'success');
                                table.ajax.reload();
                            }else{
                                Swal.fire('Error',result.message, 'error');
                            }
                        },
                        error: function(){
                            Swal.close();
                            Swal.fire('Error','Terjadi kesalahan pada server', 'error');
                        }
                    });
                }
            })
        });

        select2Init("#id_satker", "/satker_select_get", null, function(data) { return data.nama; }, function(data){ 
            if (data.id === '') { 
                return "Cari Satuan Kerja";
            }

            return data.nama; 
        });

        select2Init("#idkabkota_lhr", "/birthday_place_select_get", null, function(data) { return data.nama; }, function(data){ 
            if (data.id === '') { 
                return "Cari Tempat Lahir";
            }

            return data.nama; 
        });

        select2Init("#id_agama", "/agama_select_get", null, function(data) { return data.agama; }, function(data){ 
            if (data.id === '') { 
                return "Pilih Agama";
            }

            return data.agama; 
        });

        select2Init("#id_suku", "/suku_select_get", null, function(data) { return data.nm_suku; }, function(data){ 
            if (data.id === '') { 
                return "Pilih Suku";
            }

            return data.nm_suku; 
        });

        select2Init("#id_prov_ktp", "/prov_select_get", null, function(data) { return data.nama; }, function(data){ 
            if (data.id === '') { 
                return "Pilih Provinsi";
            }

            return data.nama; 
        });

        select2Init("#id_kota_kab_ktp", "/kab_select_get", { id_prov : function() { return $('#id_prov_ktp').val() } }, function(data) { return data.nama; }, function(data){ 
            if (data.id === '') { 
                return "Pilih Koba / Kabupaten";
            }

            return data.nama; 
        });

        select2Init("#id_kec_ktp", "/kec_select_get", { id_kab : function() { return $('#id_kota_kab_ktp').val() } }, function(data) { return data.nama; }, function(data){ 
            if (data.id === '') { 
                return "Pilih Kecamatan";
            }

            return data.nama; 
        });

        select2Init("#id_kel_ktp", "/kel_select_get", { id_kec : function() { return $('#id_kec_ktp').val() } }, function(data) { return data.nama; }, function(data){ 
            if (data.id === '') { 
                return "Pilih Kelurahan";
            }

            return data.nama; 
        });

        $("#gender").select2({
            placeholder: 'Pilih Jenis Kelamin'
        });
    });

    function datatableColumn(){
        let columns = [
                {
                    data: "id", orderable: false, width: 100,
                    render: function (a, type, data, index) {
                        return dataStart + index.row + 1
                    }
                },
                {data: "nik", orderable: true},
                {data: "namagadik", orderable: true},
                {
                    data: "id", orderable: false,
                    render: function (a, type, data, index) {
                        let button = ""

                        if(auth_edit == "1"){
                            button += '<button class="btn btn-wave btn-icon-datatable btn-rounded mb-2 light-blue text-white edit" data-id="'+data.id+'">\
                                    <i data-feather="edit-3"></i>\
                                </button>';
                        }

                        if(auth_delete == "1"){
                            button += '<button class="btn btn-wave btn-icon-datatable btn-rounded mb-2 red text-white delete" data-id="'+data.id+'">\
                                        <i data-feather="trash-2"></i>\
                                    </button>';
                        }

                        button += (button == "") ? "<b>Tidak ada aksi</b>" : ""

                        return button;
                    }
                }
            ];

        return columns;
    }

    function select2Init(id, url, parameter, template, selection){
        $(id).select2({
            id: function(e) { return e.id },
            placeholder: '',
            multiple: false,
            ajax: {
                url: url_ajax + url,
                dataType: 'json',
                quietMillis: 500,
                delay: 500,
                data: function (param) {
                    var def_param = {
                        keyword: param.term, //search term
                        perpage: 5, // page size
                        page: param.page || 0, // page number
                    };

                    return Object.assign({}, def_param, parameter);
                },
                processResults: function (data, params) {
                    params.page = params.page || 0

                    return {
                        results: data.rows,
                        pagination: {
                            more: false
                        }
                    }
                }
            },
            templateResult: template,
            templateSelection: selection,
            escapeMarkup: function(m) {
                return m;
            }
        });
    }
</script>