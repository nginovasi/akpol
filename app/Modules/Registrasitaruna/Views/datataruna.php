<style>
    .custom-file-label {
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        display: inline-block;
        padding-right: 20%;
    }

    .btn-outline-primary {
        color: #a62c47;
        border-color: #a62c47;
    }

    .btn-outline-primary:hover {
        color: #ffffff;
        background-color: #a62c47;
        border-color: #a62c47;
    }

    .btn-outline-primary:focus,
    .btn-outline-primary.focus {
        box-shadow: 0 0 0 0.2rem rgba(68, 139, 255, 0.5);
    }

    .btn-outline-primary.disabled,
    .btn-outline-primary:disabled {
        color: #a62c47;
        background-color: transparent;
    }

    .btn-outline-primary:not(:disabled):not(.disabled):active,
    .btn-outline-primary:not(:disabled):not(.disabled).active,
    .show>.btn-outline-primary.dropdown-toggle {
        color: #ffffff;
        background-color: #a62c47;
        border-color: #a62c47;
    }

    .btn-outline-primary:not(:disabled):not(.disabled):active:focus,
    .btn-outline-primary:not(:disabled):not(.disabled).active:focus,
    .show>.btn-outline-primary.dropdown-toggle:focus {
        box-shadow: 0 0 0 0.2rem rgba(68, 139, 255, 0.5);
    }

    .w-96 {
        width: 96px;
        height: 96px;
    }

    .w-128 {
        width: 128px;
        height: 128px;
    }
</style>
<div>
    <div class="page-hero page-container " id="page-hero">
        <div class="padding d-flex">
            <div class="page-title">
                <h2 class="text-md text-highlight">
                    <?= $page_title ?>
                </h2>
            </div>
            <div class="flex"></div>
        </div>
    </div>
    <div class="page-content page-container" id="page-content">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills no-border" id="tab">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-data" role="tab"
                            aria-controls="tab-data" aria-selected="false">Data</a>
                    </li>
                    <?php if ($rules->i == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-form" role="tab" aria-controls="tab-form"
                                aria-selected="false">Form</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="card-body">
                <div class="padding">
                    <div class="tab-content" id="accordion">
                        <div class="tab-pane fade active show" id="tab-data" role="tabpanel" aria-labelledby="tab-data">
                            <input type="hidden" id="temp_id_batalyon">
                            <input type="hidden" id="temp_id_kompi">
                            <input type="hidden" id="temp_id_peleton">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>No AK Short</span></th>
                                            <th><span>No AK Long</span></th>
                                            <th><span>Nama Lengkap</span></th>
                                            <th><span>Batalyon</span></th>
                                            <th><span>Semester</span></th>
                                            <th class="column-2action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                            <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <input type="hidden" class="form-control" id="id_m_user" name="id_m_user" value=""
                                    required>
                                <input type="hidden" class="form-control" id="id_semester" name="id_semester" value=""
                                    required>
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>NIK</label>
                                            <input type="tel" class="form-control" id="nik" name="nik" minlength="16"
                                                maxlength="16" required placeholder="NIK">
                                        </div>
                                        <div class="col-6">
                                            <label>Nama Taruna</label>
                                            <input type="text" class="form-control" id="namataruna" name="namataruna"
                                                style="text-transform: uppercase" required placeholder="Nama Taruna">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>No Akademik Pendek</label>
                                            <input type="tel" class="form-control" id="noakshort" name="noakshort"
                                                placeholder="Masukkan nomor akademik pendek">
                                        </div>
                                        <div class="col-6">
                                            <label>No Akademik Panjang</label>
                                            <input type="tel" class="form-control" id="noaklong" name="noaklong"
                                                placeholder="Masukkan nomor akademik lengkap">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Batalyon</label>
                                            <select class="form-control sel2" id="id_batalyon" name="id_batalyon"
                                                required>
                                            </select>
                                            <input type="hidden" id="tahun_masuk" name="tahun_masuk">
                                        </div>
                                        <div class="col-6">
                                            <label>Kelas</label>
                                            <select class="form-control sel2" id="id_kelompok" name="id_kelompok"
                                                required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Kompi</label>
                                            <select class="form-control sel2" id="id_kompi" name="id_kompi" required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>Peleton</label>
                                            <select class="form-control sel2" id="id_peleton" name="id_peleton"
                                                required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>No Telephone</label>
                                            <input type="tel" class="form-control" id="telp" name="telp" minlength="10"
                                                maxlength="14" placeholder="No Telepn Taruna">
                                        </div>
                                        <div class="col-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email Taruna">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control sel2" id="id_gender" name="id_gender" required>
                                                <option></option>
                                                <option value="1">Laki-laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>Foto Taruna</label>
                                            <div class="custom-file">
                                                <!-- <input type="text" class="form-control" id="photopath" name="photopath" hidden> -->
                                                <input type="file" class="photo-input custom-file-input"
                                                    id="photopath_file" name="photopath_file"
                                                    accept=".gif,.jpg,.jpeg,.png">
                                                <label class="custom-file-label photopath_label"
                                                    for="photopath_file">Pilih file</label>
                                            </div>
                                            <div class="small">Ukuran Maksimal 1 MB</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Tempat Lahir</label>
                                            <select class="form-control sel2" id="id_kabkota_lhr" name="id_kabkota_lhr"
                                                required>
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tglhr" name="tglhr"
                                                placeholder="Tanggal Lahir">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Suku</label>
                                            <!-- <select class="form-control sel2" id="id_suku" name="id_suku" required>
                                            </select> -->
                                            <input type="text" class="form-control" id="suku" name="suku"
                                                placeholder="Suku">
                                        </div>
                                        <div class="col-6">
                                            <label>Agama</label>
                                            <select class="form-control sel2" id="id_agama" name="id_agama" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Polda Asal Pendaftaran</label>
                                            <input type="text" class="form-control" id="asal_pengiriman"
                                                name="asal_pengiriman" placeholder="Asal Polda Pendaftaran">
                                        </div>
                                        <div class="col-6">
                                            <label>Prestasi</label>
                                            <input type="text" class="form-control" id="prestasi" name="prestasi"
                                                placeholder="Prestasi">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Tingkat Pendidikan Umum</label>
                                            <select class="form-control sel2" id="id_tkpendid" name="id_tkpendid"
                                                required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>SMA / SMK</label>
                                            <input type="text" class="form-control" id="nama_slta" name="nama_slta"
                                                placeholder="SMA / SMK">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Tahun Lulus</label>
                                            <input type="number" class="form-control" id="thn_lulus" name="thn_lulus"
                                                placeholder="Tahun Lulus">
                                        </div>
                                        <div class="col-6">
                                            <label>Jurusan SMA / SMK</label>
                                            <input type="text" class="form-control" id="jurusan_slta"
                                                name="jurusan_slta" placeholder="Jurusan SMA / SMK">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label>Alamat</label>
                                            <textarea class="form-control" id="alamat_ktp" name="alamat_ktp"
                                                placeholder="Alamat Lengkap"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Provinsi</label>
                                            <select class="form-control sel2" id="id_prov_ktp" name="id_prov_ktp"
                                                required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>Kabupaten / Kota</label>
                                            <select class="form-control sel2" id="id_kota_kab_ktp"
                                                name="id_kota_kab_ktp" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Kecamatan</label>
                                            <select class="form-control sel2" id="id_kec_ktp" name="id_kec_ktp"
                                                required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>Kelurahan</label>
                                            <select class="form-control sel2" id="id_kel_ktp" name="id_kel_ktp"
                                                required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center py-3 b-t pointer" id="kerabat_collapse"
                                    data-toggle="collapse" data-parent="#accordion" data-target="#kerabat_accordion">
                                    <i data-feather="user-plus"></i>
                                    <div class="px-3">
                                        <div><strong>Tambahkan Kerabat</strong></div>
                                    </div>
                                    <div class="flex"></div>
                                    <div>
                                        <i data-feather="chevron-right"></i>
                                    </div>
                                </div>
                                <div class="collapse" id="kerabat_accordion">
                                    <div id="kerabat_container">
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-outline-primary btn-block" id="add_kerabat">
                                            Tambah Kerabat
                                        </button>
                                    </div>
                                </div>
                                <div class="card-footer px-0">
                                    <div class="text-right">
                                        <button type="reset" class="btn btn-light">Reset</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modalverifikasitaruna" class="modal fade" data-backdrop="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <form id="verifikasitaruna">
                    <div class="modal-header ">
                        <div class="modal-title text-md">Detail & Verifikasi</div>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="p-4">
                            <?= csrf_field(); ?>
                            <div class="d-sm-flex no-shrink mb-4">
                                <div>
                                    <a href="#" class="avatar w-96" data-pjax-state="" id="photopath_anchor">
                                        <img class="w-96" id="photopath_modal" src="../assets/img/a1.jpg" alt="."
                                            style="object-fit:cover;">
                                    </a>
                                </div>
                                <div class="px-sm-4 my-3 my-sm-0 flex">
                                    <h2 class="text-md" id="namataruna_modal">Jacqueline Reid</h2>
                                    <h5 class="text-md" id="noaklong_modal">Jacqueline Reid</h5>
                                    <small class="d-block text-fade" id="nik_modal">Senior Industrial Designer</small>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <small class="text-muted">Jenis Kelamin</small>
                                    <div class="my-2" id="nama_gender_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Batalyon</small>
                                    <div class="my-2" id="nama_batalyon_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Kompi</small>
                                    <div class="my-2" id="nama_kompi_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Peleton</small>
                                    <div class="my-2" id="nama_peleton_modal"></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <small class="text-muted">Tempat Lahir</small>
                                    <div class="my-2" id="nama_kabkota_lhr_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Tanggal Lahir</small>
                                    <div class="my-2" id="tglhr_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Nama SLTA</small>
                                    <div class="my-2" id="nama_slta_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Tahun Lulus</small>
                                    <div class="my-2" id="thn_lulus_modal"></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <small class="text-muted">Kontak</small>
                                    <div class="my-2" id="telp_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Email</small>
                                    <div class="my-2" id="email_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Agama</small>
                                    <div class="my-2" id="nama_agama_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Prestasi</small>
                                    <div class="my-2" id="prestasi_modal"></div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-3">
                                    <small class="text-muted">Pendidikan Terakhir</small>
                                    <div class="my-2" id="nama_tkpendid_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Jurusan SMA/SMK</small>
                                    <div class="my-2" id="jurusan_slta_modal"></div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Alamat</small>
                                    <div class="my-2" id="alamat_modal"></div>
                                </div>

                            </div>

                            <input type="hidden" class="form-control" id="id_modal" name="id" value="" required>
                            <input type="hidden" class="form-control" id="id_m_usermodal" name="id_m_user" value=""
                                required>
                            <input type="hidden" class="form-control" id="is_verif" name="is_verif" value="1">
                            <input type="hidden" class="form-control" id="verif_by" name="verif_by"
                                value="<?= $_SESSION['id'] ?>">
                            <input type="hidden" class="form-control" id="verif_at" name="verif_at"
                                value="<?= date("Y-m-d H:i:s") ?>">
                        </div>
                    </div>
                    <div class="modal-footer" id="verif_container" style="display: none">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Verif</button>
                    </div>
                </form>

                <form id="form_login_as" name="form_login_as" class="sign-in-form mx-4 my-4" method="post"
                    enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" id="username_modal" name="username" required="">
                    <input id="submit_modal" class="btn btn-outline-info" type="submit" name=""
                        value="Login Sebagai Taruna">
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
</div>
<!-- <script type="text/javascript">
    const auth_insert = '<?= $rules->i ?>';
    const auth_edit = '<?= $rules->e ?>';
    const auth_delete = '<?= $rules->d ?>';
    const auth_otorisasi = '<?= $rules->o ?>';

    const url = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';

    var dataStart = 0;
    var coreEvents;

    const select2Array = [{
            id: 'id_tingkat_detail',
            url: '/tingkat_detail_by_smt_select_get',
            placeholder: 'Pilih Tingkat Detail',
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
            params: {
                id_batalyon: function() {
                    return $('#id_batalyon').val()
                }
            }
        },
        {
            id: 'id_peleton',
            url: '/peleton_select_get',
            placeholder: 'Pilih Peleton',
            params: {
                id_kompi: function() {
                    return $('#id_kompi').val()
                }
            }
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
            params: {
                id_prov: function() {
                    return $('#id_prov_ktp').val()
                }
            }
        },
        {
            id: 'id_kec_ktp',
            url: '/kec_select_get',
            placeholder: 'Pilih Kecamatan',
            params: {
                id_kab: function() {
                    return $('#id_kota_kab_ktp').val()
                }
            }
        },
        {
            id: 'id_kel_ktp',
            url: '/kel_select_get',
            placeholder: 'Pilih Kelurahan',
            params: {
                id_kec: function() {
                    return $('#id_kec_ktp').val()
                }
            }
        }
    ];

    $(document).ready(function() {
        coreEvents = new CoreEvents();
        coreEvents.url = url;
        coreEvents.ajax = url_ajax;
        coreEvents.csrf = {
            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
        };
        coreEvents.tableColumn = datatableColumn();

        // coreEvents.insertHandler = {
        //     placeholder: 'Berhasil menyimpan data taruna',
        //     afterAction: function(result) {

        //     }
        // }

        coreEvents.editHandler = {
            placeholder: '',
            afterAction: function(result) {
                setTimeout(function() {

                    $('#id_gender').select2('trigger', 'select', {
                        data: {
                            id: result.data.id_gender
                        }
                    });
                    select2Array.forEach(function(x) {
                        $('#' + x.id).select2('trigger', 'select', {
                            data: {
                                id: result.data[x.id],
                                text: result.data[x.id.replace('id', 'nama')]
                            }
                        });
                    });
                    console.log(result.data);
                    $('.photopath_label').html(result.data.photopath);
                    $('.photo_ayah_label').html(result.data.photo_ayah);
                    $('.photo_ibu_label').html(result.data.photo_ibu);
                    // document.getElementById('tab-form').focus();
                }, 500);
            }
        }

        coreEvents.deleteHandler = {
            placeholder: 'Berhasil menghapus data taruna',
            afterAction: function() {

            }
        }

        coreEvents.resetHandler = {
            action: function() {
                $('.custom-file-label').html('Pilih File');
            }
        }

        coreEvents.load();


        select2Array.forEach(function(x) {
            coreEvents.select2Init('#' + x.id, x.url, x.placeholder, x.params);
        });

        $("#id_gender").select2({
            placeholder: 'Pilih Jenis Kelamin'
        });

        coreEvents.datepicker('#tglhr');

        $(document).on('submit', '#form', function(e) {
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
                if (result.value) {
                    Swal.fire({
                        title: "",
                        icon: "info",
                        text: "Proses menyimpan data, mohon ditunggu...",
                        didOpen: function() {
                            Swal.showLoading()
                        }
                    });

                    $.ajax({
                        url: url_insert,
                        type: 'post',
                        data: $this.serialize(),
                        dataType: 'json',
                        success: function(result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil menyimpan data pendidik', 'success');
                                $('#form').trigger("reset");
                                table.ajax.reload();
                            } else {
                                Swal.fire('Error', result.message, 'error');
                            }
                        },
                        error: function() {
                            Swal.close();
                            Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                        }
                    });
                }
            });
        }).on('reset', '#form', function() {
            $('#id').val('');
        });

        $(document).on('click', '.verif', function() {
            $('#idverif').val($(this).data('id'));
            $('#modalverifikasitaruna').modal('show');
        }).on('submit', '#verifikasitaruna', function(e) {

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
                if (result.value) {
                    Swal.fire({
                        title: "",
                        icon: "info",
                        text: "Proses menyimpan data, mohon ditunggu...",
                        didOpen: function() {
                            Swal.showLoading()
                        }
                    });

                    $.ajax({
                        url: url + "_save",
                        type: 'post',
                        data: $this.serialize(),
                        dataType: 'json',
                        success: function(result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil memverifikasi data taruna', 'success');
                                $('#modalverifikasitaruna').modal('hide');
                                $('#form').trigger("reset");
                                coreEvents.table.ajax.reload();
                            } else {
                                Swal.fire('Error', result.message, 'error');
                            }
                        },
                        error: function() {
                            Swal.close();
                            Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                        }
                    });
                }
            });
        }).on('change', '.photo-input', function() {
            let $this = $(this)[0];
            $('.' + $this.id.replace('_file', '_label')).html($this.files[0].name);
            if ($this.files[0].size > 1048576) {
                Swal.fire('Error', 'File teralu besar, maksimal besar file adalah 1mb', 'error');
                $this.value = "";
                $('.' + $this.id.replace('_file', '_label')).html('Pilih File');
            };
        });
    });

    function datatableColumn() {
        let columns = [{
                data: "id",
                orderable: false,
                width: 100,
                render: function(a, type, data, index) {
                    return dataStart + index.row + 1
                }
            },
            {
                data: "namataruna",
                orderable: true
            },
            {
                data: "nama_batalyon",
                orderable: true
            },
            {
                data: "asal_pengiriman",
                orderable: true
            },
            {
                data: "nama_tingkatan",
                orderable: true
            },
            {
                data: "id",
                orderable: false,
                render: function(a, type, data, index) {
                    let button = ""

                    if (auth_otorisasi == "1") {
                        if (data.is_verif == '1') {

                        } else {
                            button += '<button class="btn btn-sm btn-outline-success verif" data-id="' + data.id + '" title="Verif">\
                                        <i class="fa fa-check"></i>\
                                    </button>\
                                    ';
                        }
                    }

                    if (auth_edit == "1") {
                        button += '<button class="btn btn-sm btn-outline-warning edit" data-id="' + data.id + '" title="Edit">\
                                    <i class="fa fa-edit"></i>\
                                </button>\
                                ';
                    }

                    if (auth_delete == "1") {
                        button += '<button class="btn btn-sm btn-outline-danger delete" data-id="' + data.id + '" title="Delete">\
                                        <i class="fa fa-trash-o"></i>\
                                    </button>';
                    }

                    button += (button == "") ? "<b>Tidak ada aksi</b>" : ""

                    return button;
                }
            }
        ];

        return columns;
    }
</script> -->

<script type="text/javascript">

    const usertype = '<?= $_SESSION['usertype'] ?>';

    const auth_insert = '<?= $rules->i ?>';
    const auth_edit = '<?= $rules->e ?>';
    const auth_delete = '<?= $rules->d ?>';
    const auth_otorisasi = '<?= $rules->o ?>';

    const url_insert = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_save" ?>';
    const url_edit = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_edit" ?>';
    const url_delete = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_delete" ?>';
    const url_load = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_load" ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';

    var dataStart = 0;
    var table;
    var kerabat_index = 0;


    const select2Array = [{
        id: 'id_tingkat_detail',
        url: '/tingkat_detail_by_smt_select_get',
        placeholder: 'Pilih Tingkat Detail',
        params: null
    },
    {
        id: 'id_batalyon',
        url: '/batalyon_select_get',
        placeholder: 'Pilih Batalyon',
        params: null
    },
    {
        id: 'id_kompi',
        url: '/kompi_select_get',
        placeholder: 'Pilih Kompi',
        params: {
            id_batalyon: function () {
                return $('#id_batalyon').val()
            }
        }
    },
    {
        id: 'id_kelompok',
        url: '/kelompok_select_get',
        placeholder: 'Pilih Kelas',
        params: {
            id_batalyon: function () {
                return $('#id_batalyon').val()
            }
        }
    },
    {
        id: 'id_peleton',
        url: '/peleton_select_get',
        placeholder: 'Pilih Peleton',
        params: {
            id_kompi: function () {
                return $('#id_kompi').val()
            }
        }
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
        params: {
            id_prov: function () {
                return $('#id_prov_ktp').val()
            }
        }
    },
    {
        id: 'id_kec_ktp',
        url: '/kec_select_get',
        placeholder: 'Pilih Kecamatan',
        params: {
            id_kab: function () {
                return $('#id_kota_kab_ktp').val()
            }
        }
    },
    {
        id: 'id_kel_ktp',
        url: '/kel_select_get',
        placeholder: 'Pilih Kelurahan',
        params: {
            id_kec: function () {
                return $('#id_kec_ktp').val()
            }
        }
    }
    ];

    $(document).ready(function () {
        if (usertype == 'btl' || usertype == 'kmp' || usertype == 'ptn') {
            allowClearsel2 = false;
            $.ajax({
                url: url_ajax + '/databatkomple',
                method: "POST",
                data: {
                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>",
                    'id': '<?= $_SESSION['id'] ?>',
                    'type_code': usertype
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result);


                    if (usertype == 'btl') {
                        $('#temp_id_batalyon').val(result.id_batalyon);
                        table.ajax.reload();
                    } else if (usertype == 'kmp') {
                        $('#temp_id_batalyon').val(result.id_batalyon);
                        $('#temp_id_kompi').val(result.id_kompi);
                        table.ajax.reload();
                    } else if (usertype == 'ptn') {
                        $('#temp_id_batalyon').val(result.id_batalyon);
                        $('#temp_id_kompi').val(result.id_kompi);
                        $('#temp_id_peleton').val(result.id_peleton);
                        table.ajax.reload();
                    }

                },
                error: function () {
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });
        }

        // $('#datatable')

        $(document).on('submit', '#form', function (e) {
            e.preventDefault();
            let $this = $(this);
            console.log($this);

            Swal.fire({
                title: "Simpan data ?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                        title: "",
                        icon: "info",
                        text: "Proses menyimpan data, mohon ditunggu...",
                        didOpen: function () {
                            Swal.showLoading()
                        }
                    });
                    var formData = new FormData(document.getElementById("form"));
                    $.ajax({
                        url: url_insert,
                        method: "POST",
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil menyimpan data taruna', 'success');
                                $('#form').trigger("reset");
                                //  let currentPage = table.page();
                                coreEvents.table.ajax.reload();
                                coreEvents.table.page('first').draw('page');
                                //  table.page(currentPage).draw(false);

                            } else {
                                Swal.fire('Error', result.message, 'error');
                            }
                        },
                        error: function () {
                            Swal.close();
                            Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                        }
                    });
                }
            });
        }).on('reset', '#form', function () {
            $('#id').val('');
            $('.custom-file-label').html('Pilih File');
            $(".sel2").val(null).trigger('change');
            $('#kerabat_container').html('');
            $("#kerabat_collapse").toggleClass("collapsed");
            $("#kerabat_accordion").toggleClass("show");
            kerabat_index = 0;
        }).on('change', '.photo-input', function () {
            let $this = $(this)[0];
            $('.' + $this.id.replace('_file', '_label')).html($this.files[0].name);
            if ($this.files[0].size > 1048576) {
                Swal.fire('Error', 'File teralu besar, maksimal besar file adalah 1mb', 'error');
                $this.value = "";
                $('.' + $this.id.replace('_file', '_label')).html('Pilih File');
            };
        }).on('change', '#id_batalyon', function () {
            if ($('#id_batalyon').val() != null) {
                $('#tahun_masuk').val($('#id_batalyon').select2('data')[0]['tahun_masuk']);
                $('#id_semester').val($('#id_batalyon').select2('data')[0]['id_semester']);
            }
        });

        $("#form_login_as").submit(function (event) {
            event.preventDefault();
            var $form = $(this);

            Swal.fire({
                title: "",
                icon: "info",
                text: "Mohon ditunggu...",
                onOpen: function () {
                    Swal.showLoading()
                }
            })

            var url = '<?= base_url() ?>/auth/action/login_as';

            $.post(url, $form.serialize(), function (data) {
                console.log(data);
                var ret = $.parseJSON(data);
                swal.close();
                if (ret.success) {
                    window.location = "<?= base_url() ?>/main";
                } else {
                    Swal.fire({
                        title: ret.title,
                        text: ret.text,
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2500
                    })
                }
            }).fail(function (data) {
                swal.close();
                Swal.fire({
                    title: 'Error',
                    text: '404 Halaman Tidak Ditemukan',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2500
                })
            });
        });

        table = $('#datatable').DataTable({
            "dom": "<'row'<'col-sm-6'B><'col-sm-6 clear'>>" + "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p<br/>i>>",

            "buttons": [{
                extend: 'collection',
                text: 'Export',
                className: 'btn btn-primary glyphicon glyphicon-save-file',
                buttons: [{
                    text: 'Excel',
                    extend: 'excelHtml5',
                    footer: false,
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    text: 'CSV',
                    extend: 'csvHtml5',
                    fieldSeparator: ';',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    text: 'PDF',
                    extend: 'pdfHtml5',
                    message: '',
                    exportOptions: {
                        columns: ':visible'
                    }
                }]
            }],
            "serverSide": true,
            "processing": true,
            "ordering": true,
            "paging": true,
            "searching": {
                "regex": true
            },
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "pageLength": 10,
            "searchDelay": 500,
            "ajax": {
                "type": "POST",
                "url": url_load,
                "dataType": "json",
                "data": function (data) {
                    console.log(data);
                    // Grab form values containing user options
                    dataStart = data.start;
                    let form = {};
                    Object.keys(data).forEach(function (key) {
                        form[key] = data[key] || "";
                    });

                    // Add options used by Datatables
                    let info = {
                        "start": data.start || 0,
                        "length": data.length,
                        "draw": 1,
                        "id_batalyon": $('#temp_id_batalyon').val(),
                        "id_kompi": $('#temp_id_kompi').val(),
                        "id_peleton": $('#temp_id_peleton').val(),
                        "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                    };

                    $.extend(form, info);

                    return form;
                },
                "complete": function (response) {
                    console.log(response);
                    feather.replace();
                }
            },
            "columns": datatableColumn()
        }).on('init.dt', function () {
            $(this).css('width', '100%');
        });

        $(document).on('click', '.edit', function () {
            let $this = $(this);

            Swal.fire({
                title: "",
                icon: "info",
                text: "Proses mengambil data, mohon ditunggu...",
                didOpen: function () {
                    Swal.showLoading()
                }
            });

            $.ajax({
                url: url_edit,
                type: 'post',
                data: {
                    id: $this.data('id'),
                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                },
                dataType: 'json',
                success: function (result) {
                    Swal.close();
                    if (result.success) {
                        $('#form')[0].reset();
                        for (key in result.data) {
                            $('#' + key).val(result.data[key]);
                        }

                        $('ul#tab li a').eq(1).trigger('click');
                        result.data['data_saudara'].forEach((saudara, index) => {
                            $.when($("#add_kerabat").trigger("click")).done(function () {
                                setTimeout(function () {
                                    $(document.getElementById('id_saudara' + '[' + (index + 1) + ']')).val(saudara.id);
                                    for (key in saudara) {
                                        $(document.getElementById(key + '[' + (index + 1) + ']')).val(saudara[key]);
                                    }
                                    $(document.getElementById('jenis_kelamin' + '[' + (index + 1) + ']')).select2('trigger', 'select', {
                                        data: {
                                            id: saudara.jenis_kelamin
                                        }
                                    });
                                    $(document.getElementById('hubungan' + '[' + (index + 1) + ']')).select2('trigger', 'select', {
                                        data: {
                                            id: saudara.hubungan
                                        }
                                    });
                                    $(document.getElementById('status' + '[' + (index + 1) + ']')).select2('trigger', 'select', {
                                        data: {
                                            id: saudara.status
                                        }
                                    });
                                    if (saudara.photopath) {
                                        $(document.getElementById('photo_kerabat_label' + '[' + (index + 1) + ']')).html(saudara.photopath);
                                    }
                                }, 500);
                            })
                        })

                        setTimeout(function () {

                            $('#id_gender').select2('trigger', 'select', {
                                data: {
                                    id: result.data.id_gender
                                }
                            });
                            select2Array.forEach(function (x) {
                                $('#' + x.id).select2('trigger', 'select', {
                                    data: {
                                        id: result.data[x.id],
                                        text: result.data[x.id.replace('id', 'nama')]
                                    }
                                });
                            });
                            $('.photopath_label').html(result.data.photopath);
                            $('.photo_ayah_label').html(result.data.photo_ayah);
                            $('.photo_ibu_label').html(result.data.photo_ibu);
                            // document.getElementById('tab-form').focus();
                        }, 500);
                    } else {
                        Swal.fire('Error', result.message, 'error');
                    }
                },
                error: function () {
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });
        }).on('click', '.delete', function () {
            let $this = $(this);

            Swal.fire({
                title: "Hapus data ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                confirmButtonColor: '#d33',
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: url_delete,
                        type: 'post',
                        data: {
                            id: $this.data('id'),
                            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                        },
                        dataType: 'json',
                        success: function (result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil menghapus data pendidik', 'success');
                                table.ajax.reload();
                            } else {
                                Swal.fire('Error', result.message, 'error');
                            }
                        },
                        error: function () {
                            Swal.close();
                            Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                        }
                    });
                }
            })
        }).on('click', '.detail', function () {
            let $this = $(this);
            $('#id_modal').val($(this).data('id'));
            $('#modalverifikasitaruna').modal('show');
            Swal.fire({
                title: "",
                icon: "info",
                text: "Proses mengambil data, mohon ditunggu...",
                didOpen: function () {
                    Swal.showLoading()
                }
            });

            $.ajax({
                url: url_edit,
                type: 'post',
                data: {
                    id: $this.data('id'),
                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                },
                dataType: 'json',
                success: function (result) {
                    Swal.close();
                    if (result.success) {
                        var image_url;
                        if (result.data.photopath) {
                            image_url = result.data.photopath.includes('./public/photo') ? result.data.photopath.replace('./', 'http://devel.nginovasi.id/akpol-api/') : result.data.photopath;
                            $("#photopath_anchor").html('<img class="w-96" id="photopath_modal" src="' + image_url + '" alt="." style="object-fit:cover;">')
                        } else {
                            $("#photopath_anchor").html('<span class="w-96 avatar gd-warning" style="width: 96px; height: 96px">\
                                            <span class="avatar-status on b-white avatar-right" style="width: 14px; height: 14px"></span>\
                                            <h2 class="alert-heading">' + result.data.namataruna.charAt(0) + '</h2>\
                                        </span>')
                        }
                        // var image_url = result.data.photopath.includes('./public/photo') ? result.data.photopath.replace('./', 'http://devel.nginovasi.id/akpol-api/') : result.data.photopath;
                        // $("#photopath_modal").attr("src", image_url);
                        $('#id_m_usermodal').val(result.data['id_m_user']);
                        for (key in result.data) {
                            $('#' + key + '_modal').html(result.data[key]);
                        }
                        $('#nik_modal').html('NIK : ' + result.data.nik)
                        $('#alamat_modal').html(result.data.alamat_ktp + ', ' + result.data.nama_kel_ktp + ', ' + result.data.nama_kec_ktp + ', ' + result.data.nama_kota_kab_ktp + ', ' + result.data.nama_prov_ktp)
                        if (result.data.is_verif === '1') {
                            $('#verif_container').hide();
                        } else {
                            $('#verif_container').show();
                        }
                        $('#username_modal').val(result.data.username);
                        $('#password_modal').val(result.data.password);

                    } else {
                        Swal.fire('Error', result.message, 'error');
                    }
                },
                error: function () {
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });
        }).on('submit', '#verifikasitaruna', function (e) {
            e.preventDefault();
            $('#is_verif').val(1);
            let $this = $(this);

            Swal.fire({
                title: "Verifikasi data ?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                        title: "",
                        icon: "info",
                        text: "Proses menyimpan data, mohon ditunggu...",
                        didOpen: function () {
                            Swal.showLoading()
                        }
                    });
                    var formData = new FormData(document.getElementById("verifikasitaruna"));
                    $.ajax({
                        url: url_insert,
                        method: "POST",
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil memverifikasi data taruna', 'success');
                                let currentPage = table.page();
                                table.ajax.reload(null, false); // reload the data
                                // set the page back to the current page
                                table.page(currentPage).draw(false);
                                // table.ajax.reload();
                                // table.page(table.row( $this.closest('tr') ).index() ).draw( false );
                                $('#modalverifikasitaruna').modal('hide');
                            } else {
                                Swal.fire('Error', result.message, 'error');
                            }
                        },
                        error: function () {
                            Swal.close();
                            Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                        }
                    });
                }
            });
        }).on('click', '#add_kerabat', function (e) {
            e.preventDefault();
            kerabat_index += 1;
            let form = '\
            <div class="kerabat-form' + kerabat_index + '">\
                <div class="card-header modal-header px-0">\
                    Kerabat ' + (kerabat_index) + '\
                    <button class="btn btn-icon btn-outline-danger delete-kerabat" onclick="remove_kerabat(' + kerabat_index + ',event);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus entri">\
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">\
                            <line x1="18" y1="6" x2="6" y2="18"></line>\
                            <line x1="6" y1="6" x2="18" y2="18"></line>\
                        </svg>\
                    </button>\
                </div>\
                <input type="hidden" class="form-control" id="id_saudara[' + kerabat_index + ']" name="id_saudara[' + kerabat_index + ']" value="" required>\
                <div class="form-group">\
                    <div class="row">\
                        <div class="col-6">\
                            <label>Nama Kerabat</label>\
                            <input type="text" class="form-control" id="nama[' + kerabat_index + ']" name="nama[' + kerabat_index + ']" placeholder="Nama Kerabat">\
                        </div>\
                        <div class="col-6">\
                            <label>Foto Kerabat</label>\
                            <div class="custom-file">\
                                <input type="file" class="kerabat-photo-input custom-file-input" id="photo_kerabat_file[' + kerabat_index + ']" name="photo_kerabat_file[' + kerabat_index + ']" accept=".gif,.jpg,.jpeg,.png">\
                                <label class="custom-file-label photo_kerabat_label[' + kerabat_index + ']" id="photo_kerabat_label[' + kerabat_index + ']" for="photo_kerabat_file[' + kerabat_index + ']">Pilih file</label>\
                            </div>\
                            <div class="small">Ukuran Maksimal 1 MB</div>\
                        </div>\
                    </div>\
                </div>\
                <div class="form-group">\
                    <div class="row">\
                        <div class="col-6">\
                            <label>Jenis Kelamin</label>\
                            <select class="form-control sel2 jenis_kelamin_kerabat" id="jenis_kelamin[' + kerabat_index + ']" name="jenis_kelamin[' + kerabat_index + ']" required>\
                                <option></option>\
                                <option value="1">Laki-laki</option>\
                                <option value="2">Perempuan</option>\
                            </select>\
                        </div>\
                        <div class="col-6">\
                            <label>Tanggal Lahir</label>\
                            <input type="date" class="form-control" id="tanggal_lahir[' + kerabat_index + ']" name="tanggal_lahir[' + kerabat_index + ']" placeholder="Tanggal Lahir">\
                        </div>\
                    </div>\
                </div>\
                <div class="form-group">\
                    <div class="row">\
                        <div class="col-6">\
                            <label>Hubungan Kerabat</label>\
                            <select class="form-control sel2 hubungan_kerabat" id="hubungan[' + kerabat_index + ']" name="hubungan[' + kerabat_index + ']" required>\
                                <option></option>\
                                <option value="Ayah">Ayah</option>\
                                <option value="Ibu">Ibu</option>\
                                <option value="Kakak">Kakak</option>\
                                <option value="Adik">Adik</option>\
                                <option value="Wali">Wali</option>\
                            </select>\
                        </div>\
                        <div class="col-6">\
                            <label>Pekerjaan Kerabat</label>\
                            <input type="text" class="form-control" id="pekerjaan[' + kerabat_index + ']" name="pekerjaan[' + kerabat_index + ']" placeholder="Jenis Pekerjaan Kerabat">\
                        </div>\
                    </div>\
                </div>\
                <div class="form-group">\
                    <div class="row">\
                        <div class="col-6">\
                            <label>Status Kerabat</label>\
                            <select class="form-control sel2 status_kerabat" id="status[' + kerabat_index + ']" name="status[' + kerabat_index + ']" required>\
                                <option></option>\
                                <option value="1">Hidup</option>\
                                <option value="2">Meninggal</option>\
                            </select>\
                        </div>\
                        <div class="col-6">\
                            <label>Alamat</label>\
                            <textarea class="form-control" id="alamat[' + kerabat_index + ']" name="alamat[' + kerabat_index + ']" placeholder="Alamat Kerabat"></textarea>\
                        </div>\
                    </div>\
                </div>\
            </div>\
            ';
            $('#kerabat_container').append(form);

            $(".jenis_kelamin_kerabat").select2({
                placeholder: 'Pilih Jenis Kelamin'
            });

            $(".status_kerabat").select2({
                placeholder: 'Pilih Status Kerabat'
            });

            $(".hubungan_kerabat").select2({
                placeholder: 'Pilih Hubungan Kerabat'
            });

            $('.kerabat-photo-input').on('change', function () {
                let $this = $(this)[0];
                $(this).next().html($this.files[0].name);
                if ($this.files[0].size > 1048576) {
                    Swal.fire('Error', 'File teralu besar, maksimal besar file adalah 1mb', 'error');
                    $this.value = "";
                    $(this).next().html('Pilih File');
                };
            })

        });

        select2Array.forEach(function (x) {
            select2Init('#' + x.id, x.url, x.placeholder, x.params);
        });

        $("#id_gender").select2({
            placeholder: 'Pilih Jenis Kelamin'
        });
    });

    function datatableColumn() {
        let columns = [{
            data: "id",
            orderable: false,
            width: 100,
            render: function (a, type, data, index) {
                return dataStart + index.row + 1
            }
        },
        {
            data: "noakshort",
            orderable: true
        },
        {
            data: "noaklong",
            orderable: true
        },
        {
            data: "namataruna",
            orderable: true
        },
        {
            data: "nama_batalyon",
            orderable: true
        },
        {
            data: "nama_semester",
            orderable: true
        },
        {
            data: "id",
            orderable: false,
            render: function (a, type, data, index) {
                let button = ""

                if (auth_otorisasi == "1") {
                    if (data.is_verif == '1') {

                    } else {
                        button += '<button class="btn btn-sm btn-outline-success detail verif" data-id="' + data.id + '" title="Verif">\
                                        <i class="fa fa-check"></i>\
                                    </button>\
                                    ';
                    }
                }

                if (auth_edit == "1") {
                    button += '<button class="btn btn-sm btn-outline-warning edit" data-id="' + data.id + '" title="Edit">\
                                    <i class="fa fa-edit"></i>\
                                </button>\
                                ';
                }

                button += '<button class="btn btn-sm btn-outline-info detail" data-id="' + data.id + '" title="Detail">\
                                        <i class="fa fa-eye"></i>\
                                    </button>\
                                    ';

                if (auth_delete == "1") {
                    button += '<button class="btn btn-sm btn-outline-danger delete" data-id="' + data.id + '" title="Delete">\
                                        <i class="fa fa-trash-o"></i>\
                                    </button>';
                }

                button += (button == "") ? "<b>Tidak ada aksi</b>" : ""

                return button;
            }
        }
        ];

        return columns;
    }

    function select2Init(id, url, placeholder, parameter) {
        $(id).select2({
            id: function (e) {
                return e.id
            },
            placeholder: placeholder,
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
            templateResult: function (data) {
                return data.text;
            },
            templateSelection: function (data) {
                if (data.id === '') {
                    return placeholder;
                }

                return data.text;
            },
            escapeMarkup: function (m) {
                return m;
            }
        });
    }

    function remove_kerabat(index, e) {
        e.preventDefault();
        $('.kerabat-form' + index).remove();
    }
</script>