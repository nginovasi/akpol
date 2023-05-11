<!-- ############ Main START-->

<head>
    <style>
        .hero {
            position: relative;
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('https://placekitten.com/1200/800');
            background-size: cover;

            &::before {
                content: "";
                position: absolute;
                top: 0px;
                right: 0px;
                bottom: 0px;
                left: 0px;
                background-color: rgba(0, 0, 0, 0.25);
                /* background-color: rgba(152, 66, 211, 0.63); */
            }
        }

        .showanim {
            opacity: 1;
            transition: opacity 0.5s linear;
        }

        .showanim.hide {
            opacity: 0;
        }

        span.parsley-error,
        input.parsley-error,
        textarea.parsley-error,
        select.parsley-error {
            background: #FAEDEC !important;
            border: 1px solid #E85445 !important;
        }

        li.parsley-required {
            color: #E85445 !important;
        }
    </style>
</head>
<div class="pt-5">
    <div class="page-hero page-container " id="page-hero">
        <div class="padding d-flex">
            <div class="page-title">
                <h2 class="text-md text-highlight pl-4">Registrasi Taruna</h2>
                <small class="text-muted">Pengisian data informasi digital taruna di SIAP AKPOL</small>
            </div>
            <div class="flex"></div>
            <div>
                <button class="btn btn-md text-muted" id="back-menu" style="display:none;">
                    <span class="d-none d-sm-inline mx-1">Kembali ke menu</span>
                    <i data-feather="arrow-left"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="page-content page-container" id="page-content">
        <div class="padding showanim" id="menu-option">
            <div class="text-center p-5">
                <h2 class="text-highlight">Selamat datang di menu Registrasi Taruna</h2>
            </div>
            <div class="text-center">
                <div class="block d-md-inline-flex">
                    <div class="p-4 p-sm-5 b-r" style="background-image:url(<?= base_url() ?>/assets/img/daftar-baru.png);background-size: cover;">
                        <div style="height: 100px"></div>
                        <span class="h1 text-white">Daftar Akun</span>
                        <div class="text-white">Jika belum melakukan pendaftaran</div>
                        <div class="py-4">
                            <button id="daftar-akun" class="btn btn-md w-lg btn-rounded btn-primary">Pilih</button>
                        </div>

                    </div>
                    <div class="p-4 p-sm-5" style="background-image:url(<?= base_url() ?>/assets/img/cetak-bukti.png);background-size: cover;">
                        <div style="height: 100px"></div>
                        <span class="h1 text-white">Cetak Bukti Daftar</span>
                        <div class="text-white">Jika sudah melakukan pendaftaran</div>
                        <div class="py-4">
                            <button id="cetak-bukti" class="btn btn-md w-lg btn-rounded btn-primary">Pilih</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mt-4 p-5 text-center">
                Dikhususkan untuk taruna yang sudah aktif
            </div>
        </div>
        <div class="padding showanim" id="registrasi-container" style="display:none;">
            <div class="card">
                <div class="card-header">
                    <strong>Form Registrasi</strong>
                </div>
                <div class="card-body">
                    <form data-plugin="parsley" data-option="{}" data-parsley-validate="" id="form" autocomplete="off" method="post" enctype="multipart/form-data">
                        <div id="rootwizard" data-plugin="bootstrapWizard" data-option="{
                            tabClass: '',
                            nextSelector: '.button-next', 
                            previousSelector: '.button-previous', 
                            firstSelector: '.button-first', 
                            lastSelector: '.button-last',
                            onTabClick: function(tab, navigation, index) {
                                return false;
                            },
                            onNext: function(tab, navigation, index) {
                                var curIndex = parseInt(index) - 1;
                                var instance = $('#form').parsley();
                                instance.validate({
                                    group: 'block-' + curIndex
                                });
                                if(!instance.isValid({
                                    group: 'block-' + curIndex
                                })) { 
                                    return false;
                                }
                            }
                        }">
                            <ul class="nav mb-3">
                                <li class="nav-item">
                                    <a class="nav-link text-center" href="#tab1" data-toggle="tab">
                                        <span class="w-32 d-inline-flex align-items-center justify-content-center circle bg-light active-bg-success">1</span>
                                        <div class="mt-2">
                                            <div class="text-muted">Informasi Taruna</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-center" href="#tab2" data-toggle="tab">
                                        <span class="w-32 d-inline-flex align-items-center justify-content-center circle bg-light active-bg-success">2</span>
                                        <div class="mt-2">
                                            <div class="text-muted">Data Diri</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-center" href="#tab3" data-toggle="tab">
                                        <span class="w-32 d-inline-flex align-items-center justify-content-center circle bg-light active-bg-success">3</span>
                                        <div class="mt-2">
                                            <div class="text-muted">Informasi Tambahan</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content p-2">
                                <div class="tab-pane form-section active" id="tab1">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                    <input type="hidden" class="form-control" id="id_m_user" name="id_m_user" value="" required>
                                    <input type="hidden" class="form-control" id="id_semester" name="id_semester" value="" required>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12">
                                                <label>NIK</label>
                                                <input type="tel" class="form-control" id="nik" name="nik" minlength="16" maxlength="16" required placeholder="NIK">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <!-- <div class="col-6">
                                                <label>No Akademik Pendek</label>
                                                <input type="tel" class="form-control" id="noakshort" name="noakshort" placeholder="Masukkan nomor akademik pendek">
                                            </div> -->
                                            <!-- <div class="col-6">
                                                <label>No Akademik Panjang</label>
                                                <input type="tel" class="form-control" id="noaklong" name="noaklong" placeholder="Masukkan nomor akademik lengkap">
                                            </div> -->
                                            <div class="col-6">
                                                <label>No Akademik</label>
                                                <input type="tel" class="form-control" id="noaklong" name="noaklong" maxlength="22" placeholder="Masukkan nomor akademik" required>
                                            </div>
                                            <div class="col-6">
                                                <label>Nama Taruna</label>
                                                <input type="text" class="form-control" id="namataruna" name="namataruna" maxlength="100" style="text-transform: uppercase" required placeholder="Nama Taruna">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Batalyon</label>
                                                <select class="form-control sel2" id="id_batalyon" name="id_batalyon" required>
                                                </select>
                                                <input type="hidden" id="tahun_masuk" name="tahun_masuk">
                                            </div>
                                            <div class="col-6">
                                                <label>Kelas</label>
                                                <select class="form-control sel2" id="id_kelompok" name="id_kelompok" required>
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
                                                <select class="form-control sel2" id="id_peleton" name="id_peleton" required>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane form-section" id="tab2">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>No Telephone</label>
                                                <input type="tel" class="form-control" id="telp" name="telp" minlength="10" maxlength="14" placeholder="No Telepon Taruna" required>
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
                                                <select class="form-control sel2" id="id_gender" name="id_gender" required>
                                                    <option></option>
                                                    <option value="1">Laki-laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label>Foto Taruna</label>
                                                <div class="custom-file">
                                                    <input type="file" class="photo-input custom-file-input" id="photopath_file" name="photopath_file" accept=".gif,.jpg,.jpeg,.png" required>
                                                    <label class="custom-file-label photopath_label" for="photopath_file">Pilih file</label>
                                                </div>
                                                <div class="small">Ukuran Maksimal 1 MB</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Tempat Lahir</label>
                                                <select class="form-control sel2" id="id_kabkota_lhr" name="id_kabkota_lhr" required>
                                                    <option></option>
                                                </select>
                                                <!-- <input type="text" class="form-control" id="tmpt_lhr" name="tmpt_lhr" placeholder="Tempat Lahir" required>                                                 -->
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
                                                <!-- <select class="form-control sel2" id="id_suku" name="id_suku" >
                                                </select> -->
                                                <input type="text" class="form-control" id="suku" name="suku" placeholder="Nama Suku" maxlength="50" required>
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
                                                <label>Asal Pengiriman</label>
                                                <input type="text" class="form-control" id="asal_pengiriman" name="asal_pengiriman" placeholder="Asal Instansi Pengiriman" required>
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
                                                <select class="form-control sel2" id="id_tkpendid" name="id_tkpendid" required>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label>SMA / SMK</label>
                                                <input type="text" class="form-control" id="nama_slta" name="nama_slta" placeholder="SMA / SMK" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Tahun Lulus</label>
                                                <input type="text" pattern="\d*" class="form-control" id="thn_lulus" name="thn_lulus" placeholder="Tahun Lulus" maxlength="4" required>
                                            </div>
                                            <div class="col-6">
                                                <label>Jurusan SMA / SMK</label>
                                                <input type="text" class="form-control" id="jurusan_slta" name="jurusan_slta" placeholder="Jurusan SMA / SMK" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12">
                                                <label>Alamat</label>
                                                <textarea class="form-control" id="alamat_ktp" name="alamat_ktp" placeholder="Alamat Lengkap" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Provinsi</label>
                                                <select class="form-control sel2" id="id_prov_ktp" name="id_prov_ktp" required>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label>Kabupaten / Kota</label>
                                                <select class="form-control sel2" id="id_kota_kab_ktp" name="id_kota_kab_ktp" required>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <label>Kecamatan</label>
                                                <select class="form-control sel2" id="id_kec_ktp" name="id_kec_ktp" required>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label>Kelurahan</label>
                                                <select class="form-control sel2" id="id_kel_ktp" name="id_kel_ktp" required>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane form-section" id="tab3">
                                    <div class="form-group">
                                        <p>
                                            <strong>Informasi Kerabat</strong>
                                        </p>
                                        <p>Anda dapat menambahkan data kerabat dengan mengklik teks <strong>Tambahkan
                                                Kerabat</strong> di bawah ini. Anda wajib menambahkan minimal 2 kerabat
                                            (Orang Tua Wajib Ditambahkan)</p>
                                    </div>
                                    <div class="d-flex align-items-center py-3 b-t pointer" id="kerabat_collapse" data-toggle="collapse" data-target="#kerabat_accordion">
                                        <i data-feather="user-plus"></i>
                                        <div class="px-3">
                                            <div><strong>Tambahkan Kerabat</strong></div>
                                        </div>
                                        <div class="flex"></div>
                                        <div>
                                            <i data-feather="chevron-right"></i>
                                        </div>
                                    </div>
                                    <?= csrf_field(); ?>
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
                                        <div class="row p-3">
                                            <div class="checkbox">
                                                <label class="ui-check">
                                                    <input type="checkbox" checked="" required="true" data-parsley-multiple="check">
                                                    <i></i>Seluruh pernyataan data dan informasi yang saya
                                                    isikan pada form registrasi taruna adalah benar.
                                                </label>
                                            </div>
                                            <div class="flex"></div>
                                            <div class="text-right">
                                                <button type="reset" class="btn btn-light">Reset</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-3">
                                    <div class="col-6">
                                        <a href="#" class="btn btn-white button-first">
                                            <i data-feather="chevron-left"></i>
                                        </a>
                                        <a href="#" class="btn btn-white button-previous">
                                            <i data-feather="arrow-left"></i>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex justify-content-end">
                                            <a href="#" class="btn btn-white button-next" id="next-step">
                                                <i data-feather="arrow-right"></i>
                                            </a>
                                            <a href="#" class="btn btn-white button-last">
                                                <i data-feather="chevron-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="padding showanim" id="success-container" style="display:none;">
            <div class="text-center p-5">
                <h2 class="text-highlight" id="cetak-title">Registrasi berhasil!</h2>
                <h2 class="text-highlight" id="cetak-subtitle">Form anda telah kami terima dan akan divalidasi terlebih
                    dahulu</h2>
            </div>
            <div class="text-center">
                <div class="">
                    <div class="p-8 p-sm-7 b-r">
                        <img src="https://img.icons8.com/color/240/000000/checked--v4.png" />
                        <div class="text-muted">Klik di bawah ini untuk mencetak bukti pendaftaran</div>
                        <div class="py-4">
                            <form data-plugin="parsley" data-option="{}" id="forma-cetak" action="<?= base_url() ?>/portal/pdftaruna/cetakregistrasi/<?= base64_encode('P') . '-' . time() ?>" method="post" target="_BLANK" autocomplete="off">
                                <?= csrf_field() ?>
                                <input type="hidden" class="form-control" id="id_cetak" name="noaklong" required>
                                <button type="submit" class="btn btn-md btn-rounded btn-primary">Cetak Bukti Pendaftaran</button>
                            </form>
                        </div>
                        <small class="text-muted hasil">-</small>
                    </div>
                </div>
            </div>
            <div class="p-5 text-center">
                Untuk info lebih lanjut klik di tautan <a href="https://akpol.ac.id/info-pendaftaran/">ini</a>
            </div>
        </div>
        <div class="padding showanimate" id="caribukti-container" style="display:none;">
            <div class="card">
                <div class="card-header">
                    <strong>Form Cetak Bukti</strong>
                </div>
                <div class="card-body">
                    <form id="form-cetak" name="form-cetak" class="sign-in-form" method="post" enctype="multipart/form-data" autocomplete="off">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label class="text-muted" for="noak_cetak">No AK</label>
                            <input type="tel" class="form-control" id="noak_cetak" name="noak" maxlength="16" required placeholder="Masukkan No AK">
                            <small id="emailHelp" class="form-text text-muted">Masukkan nomor Nomor AK yang digunakan untuk mendaftar</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ############ Main END-->

<script type="text/javascript">
    // const url_insert = '<?= base_url() . "/" . uri_segment(0) . "/action/datataruna_save" ?>';
    // const url_edit = '<?= base_url() . "/registrasitaruna/action/datataruna_edit" ?>';
    // const url_delete = '<?= base_url() . "/registrasitaruna/action/datataruna_delete" ?>';
    // const url_load = '<?= base_url() . "/registrasitaruna/action/datataruna_load" ?>';
    // const url_ajax = '<?= base_url() . "/registrasitaruna/ajax" ?>';

    const url_insert = '<?= base_url() . "/" . uri_segment(0) . "/action/datataruna_save" ?>';
    const url_edit = '<?= base_url() . "/" . uri_segment(0) . "/action/datataruna_edit" ?>';
    const url_delete = '<?= base_url() . "/" . uri_segment(0) . "/action/datataruna_delete" ?>';
    const url_load = '<?= base_url() . "/" . uri_segment(0) . "/action/datataruna_load" ?>';
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
                id_batalyon: function() {
                    return $('#id_batalyon').val()
                }
            }
        },
        {
            id: 'id_kelompok',
            url: '/kelompok_select_get',
            placeholder: 'Pilih Kelas',
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

        // $('#datatable')

        var $sections = $('.form-section');

        $sections.each(function(index, section) {
            $(section).find(':input').attr('data-parsley-group', 'block-' + index);
        });

        $(document).on('submit', '#form', function(e) {
            e.preventDefault();
            let $this = $(this);

            if ($('.kerabat-form').length < 2) {
                Swal.fire('Invalid', 'Diwajibkan menambahkan minimal 2 kerabat (orang tua)', 'warning');
            } else {
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
                        var formData = new FormData(document.getElementById("form"));
                        $.ajax({
                            url: url_insert,
                            method: "POST",
                            data: formData,
                            contentType: false,
                            cache: false,
                            processData: false,
                            dataType: "json",
                            success: function(result) {
                                Swal.close();
                                if (result.success) {
                                    Swal.fire('Sukses', 'Berhasil menyimpan data taruna', 'success');
                                    $('#form').trigger("reset");
                                    // $(".active").removeClass("active");
                                    // $('#tab1').addClass("active");
                                    $('[href="#tab1"]').tab('show');
                                    $('#registrasi-container').hide();
                                    $('#success-container').show();
                                    $('.hasil').html(result);
                                    $('#id_cetak').val(result.message.noaklong);
                                    $('#cetak-title').html('Registrasi berhasil!');
                                    $('#cetak-subtitle').html('Form anda telah kami terima dan akan divalidasi terlebih dahulu');
                                } else {
                                    Swal.fire('Error', result.message, 'error');
                                }
                            },
                            error: function(err) {
                                console.log(err);
                                Swal.close();
                                Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                            }
                        });
                    }
                });
            }

        }).on('reset', '#form', function() {
            $('#id').val('');
            $('.custom-file-label').html('Pilih File');
            $(".sel2").val(null).trigger('change');
            $('#kerabat_container').html('');
            $("#kerabat_collapse").toggleClass("collapsed");
            $("#kerabat_accordion").toggleClass("show");
            kerabat_index = 0;
        }).on('change', '.photo-input', function() {
            let $this = $(this)[0];
            if ($this.files[0].type.toLowerCase().includes("image")) {
                $('.' + $this.id.replace('_file', '_label')).html($this.files[0].name);
                if ($this.files[0].size > 1048576) {
                    Swal.fire('Error', 'File teralu besar, maksimal besar file adalah 1mb', 'error');
                    $this.value = "";
                    $('.' + $this.id.replace('_file', '_label')).html('Pilih File');
                };
            } else {
                Swal.fire('Error', 'Bukan file gambar', 'error');
            }

        }).on('change', '#id_batalyon', function() {
            if ($('#id_batalyon').val() != null) {
                $('#tahun_masuk').val($('#id_batalyon').select2('data')[0]['tahun_masuk']);
                $('#id_semester').val($('#id_batalyon').select2('data')[0]['id_semester']);
            }
        }).on('click', '#daftar-akun', function() {
            $('#menu-option').toggle('hide');
            $('#registrasi-container').show();
            $('#back-menu').show();
            $('#next-step').prop("disabled", false);
        }).on('click', '#cetak-bukti', function() {
            $('#menu-option').toggle('hide');
            $('#caribukti-container').show();
            $('#back-menu').show();
        }).on('click', '#back-menu', function() {
            $('#menu-option').toggle('show');
            $('#registrasi-container').hide();
            $('#caribukti-container').hide();
            $('#success-container').hide();
            $('#back-menu').hide();
            $('#next-step').prop("disabled", false);
        });

        $("#form-cetak").submit(function(event) {
            event.preventDefault();
            var $form = $(this);

            Swal.fire({
                title: "",
                icon: "info",
                text: "Mohon ditunggu...",
                onOpen: function() {
                    Swal.showLoading()
                }
            })

            var url = '<?= base_url() ?>/portal/action/cektaruna';

            $.post(url, $form.serialize(), function(data) {

                var ret = $.parseJSON(data);
                swal.close();
                if (ret.success) {
                    $('#caribukti-container').hide();
                    $('#success-container').toggle('show');
                    $('#id_cetak').val(ret.user.id);
                    $('#cetak-title').html('Data berhasil ditemukan!');
                    $('#cetak-subtitle').html('Data ditemukan untuk data a.n. : ' + ret.user.namataruna);
                } else {
                    Swal.fire({
                        title: ret.title,
                        text: ret.text,
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2500
                    })
                }
            }).fail(function(data) {
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

        $(document).on('click', '.edit', function() {
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
                url: url_edit,
                type: 'post',
                data: {
                    id: $this.data('id'),
                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                },
                dataType: 'json',
                success: function(result) {
                    Swal.close();
                    if (result.success) {
                        $('#form')[0].reset();
                        for (key in result.data) {
                            $('#' + key).val(result.data[key]);
                        }

                        $('ul#tab li a').eq(1).trigger('click');
                        result.data['data_saudara'].forEach((saudara, index) => {
                            $.when($("#add_kerabat").trigger("click")).done(function() {
                                setTimeout(function() {
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
                            $('.photopath_label').html(result.data.photopath);
                            $('.photo_ayah_label').html(result.data.photo_ayah);
                            $('.photo_ibu_label').html(result.data.photo_ibu);
                            // document.getElementById('tab-form').focus();
                        }, 500);
                    } else {
                        Swal.fire('Error', result.message, 'error');
                    }
                },
                error: function() {
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });
        }).on('click', '.detail', function() {
            let $this = $(this);
            $('#id_modal').val($(this).data('id'));
            $('#modalverifikasitaruna').modal('show');
            Swal.fire({
                title: "",
                icon: "info",
                text: "Proses mengambil data, mohon ditunggu...",
                didOpen: function() {
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
                success: function(result) {
                    Swal.close();
                    if (result.success) {
                        var image_url;
                        if (result.data.photopath) {
                            image_url = result.data.photopath.includes('./public/photo') ? result.data.photopath.replace('./', 'http://devel.nginovasi.id/akpol-api/') : result.data.photopath;
                            $("#photopath_anchor").html('<img class="w-96" id="photopath_modal" src="' + image_url + '" alt="." style="object-fit:cover;">')
                        } else {
                            $("#photopath_anchor").html('<span class="w-96 avatar gd-warning" style="width: 96px; height: 96px">\
                                            <span class="avatar-status on b-white avatar-right" style="width: 14px; height: 14px"></span>\
                                            <h2 class="alert-heading">' + result.data.namagadik.charAt(0) + '</h2>\
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
                error: function() {
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });
        }).on('click', '#add_kerabat', function(e) {
            e.preventDefault();
            kerabat_index += 1;
            let form = '\
            <div class="kerabat-form" id="kerabat-form' + kerabat_index + '">\
                <div class="card-header modal-header px-0">\
                    Keluarga/Kerabat ' + (kerabat_index) + '\
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
                            <label>Nama Keluarga/Kerabat</label>\
                            <input type="text" class="form-control" id="nama[' + kerabat_index + ']" name="nama[' + kerabat_index + ']" placeholder="Nama Keluarga/Kerabat">\
                        </div>\
                        <div class="col-6">\
                            <label>Foto</label>\
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
                            <label>Hubungan Keluarga</label>\
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
                            <label>Pekerjaan</label>\
                            <input type="text" class="form-control" id="pekerjaan[' + kerabat_index + ']" name="pekerjaan[' + kerabat_index + ']" placeholder="Jenis Pekerjaan Keluarga/Kerabat">\
                        </div>\
                    </div>\
                </div>\
                <div class="form-group">\
                    <div class="row">\
                        <div class="col-6">\
                            <label>Status</label>\
                            <select class="form-control sel2 status_kerabat" id="status[' + kerabat_index + ']" name="status[' + kerabat_index + ']" required>\
                                <option></option>\
                                <option value="1">Hidup</option>\
                                <option value="2">Meninggal</option>\
                            </select>\
                        </div>\
                        <div class="col-6">\
                            <label>Alamat</label>\
                            <textarea class="form-control" id="alamat[' + kerabat_index + ']" name="alamat[' + kerabat_index + ']" placeholder="Alamat Keluarga/Kerabat"></textarea>\
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

            $('.kerabat-photo-input').on('change', function() {
                let $this = $(this)[0];
                $(this).next().html($this.files[0].name);
                if ($this.files[0].size > 1048576) {
                    Swal.fire('Error', 'File teralu besar, maksimal besar file adalah 1mb', 'error');
                    $this.value = "";
                    $(this).next().html('Pilih File');
                };
            })

        });

        select2Array.forEach(function(x) {
            select2Init('#' + x.id, x.url, x.placeholder, x.params);
        });

        $("#id_gender").select2({
            placeholder: 'Pilih Jenis Kelamin'
        });
    });

    function select2Init(id, url, placeholder, parameter) {
        $(id).select2({
            id: function(e) {
                return e.id
            },
            placeholder: placeholder,
            multiple: false,
            ajax: {
                url: url_ajax + url,
                dataType: 'json',
                quietMillis: 500,
                delay: 500,
                data: function(param) {
                    var def_param = {
                        keyword: param.term, //search term
                        perpage: 5, // page size
                        page: param.page || 0, // page number
                    };

                    return Object.assign({}, def_param, parameter);
                },
                processResults: function(data, params) {
                    params.page = params.page || 0

                    return {
                        results: data.rows,
                        pagination: {
                            more: false
                        }
                    }
                }
            },
            templateResult: function(data) {
                return data.text;
            },
            templateSelection: function(data) {
                if (data.id === '') {
                    return placeholder;
                }

                return data.text;
            },
            escapeMarkup: function(m) {
                return m;
            }
        });
    }

    function remove_kerabat(index, e) {
        e.preventDefault();
        $('#kerabat-form' + index).remove();
    }
</script>