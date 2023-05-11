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
                            <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <?=csrf_field();?>
                                <div class="form-group">
                                	<div class="row">
                                		<div class="col-6">
                                			<label>NIK</label>
                                    		<input type="tel" class="form-control" id="nik" name="nik" minlength="16" maxlength="16" required  placeholder="NIK">
                                		</div>
                                		<div class="col-6">
                                			<label>Nama Taruna</label>
                                    		<input type="text" class="form-control" id="namataruna" name="namataruna" required  placeholder="Nama Taruna">
                                		</div>
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="row">
                                		<div class="col-6">
                                			<label>No Akademik Pendek</label>
		                                    <input type="tel" class="form-control" id="noakshort" name="noakshort" minlength="10" maxlength="10" required placeholder="Tentukan nama modul">
                                		</div>
                                		<div class="col-6">
                                			<label>No Akademik Panjang</label>
		                                    <input type="tel" class="form-control" id="noaklong" name="noaklong" minlength="16" maxlength="16" required placeholder="Tentukan nama modul">
                                		</div>
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="row">
                                		<div class="col-6">
                                			<label>Tingkat</label>
		                                    <select class="form-control" id="id_tingkat" name="id_tingkat" required>
		                                    </select>
                                		</div>
                                		<div class="col-6">
                                			<label>Batalion</label>
		                                    <select class="form-control" id="id_batalyon" name="id_batalyon" required>
		                                    </select>
                                		</div>
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="row">
                                		<div class="col-6">
                                			<label>Kompi</label>
		                                    <select class="form-control" id="id_kompi" name="id_kompi" required>
		                                    </select>
                                		</div>
                                		<div class="col-6">
                                			<label>Peleton</label>
		                                    <select class="form-control" id="id_peleton" name="id_peleton" required>
		                                    </select>
                                		</div>
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="row">
                                		<div class="col-6">
                                			<label>No Telephone</label>
		                                    <input type="tel" class="form-control" id="telp" name="telp" placeholder="No Telepn Taruna">
                                		</div>
                                		<div class="col-6">
                                			<label>Email</label>
		                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Taruna">
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
                                			<select class="form-control" id="id_kabkota_lhr" name="id_kabkota_lhr" required>
                                                <option></option>
		                                    </select>
                                		</div>
                                		<div class="col-6">
                                			<label>Tanggal Lahir</label>
		                                    <input type="text" class="form-control" id="tglhr" name="tglhr" placeholder="Tanggal Lahir">
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
                                		<div class="col-6">
                                			<label>Asal Pengiriman</label>
		                                    <input type="text" class="form-control" id="asal_pengiriman" name="asal_pengiriman" placeholder="Asal Sekolah">
                                		</div>
                                		<div class="col-6">
                                			<label>Prestasi</label>
		                                    <input type="text" class="form-control" id="prestasi" name="prestasi" placeholder="Prestasi">
                                		</div>
                                	</div>
                                </div>

                                <div class="form-group">
                                	<div class="row">
                                		<div class="col-6">
                                			<label>Tingkat Pendidikan Umum</label>
                                			<select class="form-control" id="id_tkpendid" name="id_tkpendid" required>
		                                    </select>
                                		</div>
                                		<div class="col-6">
                                			<label>SMA / SMK</label>
		                                    <input type="text" class="form-control" id="nama_slta" name="nama_slta" placeholder="SMA / SMK">
                                		</div>
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="row">
                                		<div class="col-6">
                                			<label>Tahun Lulus</label>
		                                    <input type="number" class="form-control" id="thn_lulus" name="thn_lulus" placeholder="Tahun Lulus">
                                		</div>
                                		<div class="col-6">
                                			<label>Jurusan SMA / SMK</label>
		                                    <input type="text" class="form-control" id="jurusan_slta" name="jurusan_slta" placeholder="Jurusan SMA / SMK">
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
                                			<label>Nama Ayah</label>
		                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Nama Ayah">
                                		</div>
                                		<div class="col-6">
                                			<label>Foto Ayah</label>
		                                    <input type="text" class="form-control" id="photo_ayah" name="photo_ayah" placeholder="url Foto Ayah">
                                		</div>
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="row">
                                		<div class="col-6">
                                			<label>Pekerjaan</label>
		                                    <input type="text" class="form-control" id="peker_ayah" name="peker_ayah" placeholder="Pekerjaan">
                                		</div>
                                		<div class="col-6">
                                			<label>Pangkat / Golongan Pekerjaan</label>
		                                    <input type="text" class="form-control" id="pktgol_ayah" name="pktgol_ayah" placeholder="Jurusan SMA / SMK">
                                		</div>
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="row">
                                		<div class="col-6">
                                			<label>Jabatan Pekerjaan Ayah</label>
		                                    <input type="text" class="form-control" id="jab_ayah" name="jab_ayah" placeholder="Jabatan Pekerjan Ayah">
                                		</div>
                                		<div class="col-6">
                                			<label>Nomor Telepon Ayah</label>
		                                    <input type="tel" class="form-control" id="telp_ayah" name="telp_ayah" placeholder="Nomor Telepon Ayah">
                                		</div>
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="row">
                                		<div class="col-6">
                                			<label>Nama Ibu</label>
		                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu">
                                		</div>
                                		<div class="col-6">
                                			<label>Foto Ibu</label>
		                                    <input type="text" class="form-control" id="photo_ibu" name="photo_ibu" placeholder="url Foto Ibu">
                                		</div>
                                	</div>
                                </div>
                                <div class="form-group">
                                	<div class="row">
                                		<div class="col-6">
                                			<label>Nomor Telepon Ibu</label>
		                                    <input type="tel" class="form-control" id="telp_ibu" name="telp_ibu" placeholder="Nomor Telepon Ibu">
                                		</div>
                                	</div>
                                </div>
                                <div class="text-right">
                                    <button type="reset" class="btn btn-light">Reset</button>
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

    const url = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)?>';
    const url_ajax = '<?=base_url()."/".uri_segment(0)."/ajax"?>';

    var dataStart = 0;
    var coreEvents;

    const select2Array = [
        {
            id: 'id_tingkat',
            url: '/tingkat_select_get',
            placeholder: 'Pilih Tingkat',
            params: null
        },
        {
            id: 'id_batalyon',
            url: '/batalyon_select_get',
            placeholder: 'Pilih Batalion',
            params: null
        },
        {
            id: 'id_kompi',
            url: '/kompi_select_get',
            placeholder: 'Pilih Kompi',
            params: { id_batalyon : function() { return $('#id_batalyon').val() } }
        },
        {
            id: 'id_peleton',
            url: '/peleton_select_get',
            placeholder: 'Pilih Peleton',
            params: { id_kompi : function() { return $('#id_kompi').val() } }
        },
        {
            id: 'id_kabkota_lhr',
            url: '/birthday_place_select_get',
            placeholder: 'Pilih Tempat Lahir',
            params: null
        },
        {
            id: 'id_agama',
            url: '/agama_select_get',
            placeholder: 'Pilih Agama',
            params: null
        },
        {
            id: 'id_suku',
            url: '/suku_select_get',
            placeholder: 'Pilih Suku',
            params: null
        },
        {
            id: 'id_tkpendid',
            url: '/tingkat_pendidikan_select_get',
            placeholder: 'Pilih Tingkat Pendidikan',
            params: null
        },
        {
            id: 'id_prov_ktp',
            url: '/prov_select_get',
            placeholder: 'Pilih Provinsi',
            params: null
        },
        {
            id: 'id_kota_kab_ktp',
            url: '/kab_select_get',
            placeholder: 'Pilih Koba / Kabupaten',
            params: { id_prov : function() { return $('#id_prov_ktp').val() } }
        },
        {
            id: 'id_kec_ktp',
            url: '/kec_select_get',
            placeholder: 'Pilih Kecamatan',
            params: { id_kab : function() { return $('#id_kota_kab_ktp').val() } }
        },
        {
            id: 'id_kel_ktp',
            url: '/kel_select_get',
            placeholder: 'Pilih Kelurahan',
            params: { id_kec : function() { return $('#id_kec_ktp').val() } }
        }
    ];

    $(document).ready(function(){
        coreEvents = new CoreEvents();
        coreEvents.url = url;
        coreEvents.ajax = url_ajax;
        coreEvents.csrf = { "<?=csrf_token()?>": "<?=csrf_hash()?>" };
        coreEvents.tableColumn = datatableColumn();

        coreEvents.insertHandler = {
            placeholder : 'Berhasil menyimpan data taruna',
            afterAction : function(result) {

            }
        }

        coreEvents.editHandler = {
            placeholder : '',
            afterAction : function(result) {
                setTimeout(function() {
                    select2Array.forEach (function(x) {
                        $('#' + x.id).select2('trigger', 'select', {
                            data : {
                                id: result.data[x.id],
                                text: result.data[x.id.replace('id', 'nama')]
                            }
                        });
                    });
                },500);
            }
        }

        coreEvents.deleteHandler = {
            placeholder : 'Berhasil menghapus data taruna',
            afterAction : function() {
                
            }
        }

        coreEvents.resetHandler = {
            action : function() {
                
            }
        }

        coreEvents.load();


        select2Array.forEach (function(x) {
            coreEvents.select2Init('#' + x.id, x.url, x.placeholder, x.params);
        });

        $("#gender").select2({
            placeholder: 'Pilih Jenis Kelamin'
        });

        coreEvents.datepicker('#tglhr');
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
                {data: "namataruna", orderable: true},
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
</script>