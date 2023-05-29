<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= isset($titles) == 0 ? 'Dashboard' : $titles ?></title>
    <meta name="description" content="Sistem Akademik Kepolisian" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>/assets/img/favico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>/assets/img/favico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/assets/img/favico/favicon-16x16.png">
    <link rel="manifest" href="<?=base_url()?>/assets/img/favico/site.webmanifest">
    
    <!-- style -->
    <!-- build:css ../assets/css/site.min.css -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/theme.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/libs/select2/dist/css/select2.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/libs/dropzone/dist/min/dropzone.min.css" type="text/css" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>

    <!-- dataTabel button -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css" />
    <!-- jQuery -->
    <script src="<?= base_url() ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js'></script>

    <!-- endbuild -->
    <style type="text/css">
        .select2 {
            width: 100% !important;
        }

        .btn-icon-datatable {
            width: 2.125rem;
            height: 2.125rem;
            padding: 7px;
            margin: 0 3px;
        }

        .column-2action {
            width: 100px !important;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            background-color: #a62c47 !important;
        }

        .nav-link: hover {
            color: white !important;
        }

        .btn-primary {
            background-color: #a62c47 !important;
            border-color: #a62c47 !important;
        }

        a:not(.active):hover {
            color: #a62c47 !important;
        }

        #datatable.table td {
            padding: 0.25rem !important;
        }

        .page-hero .padding {
            padding: 1rem 2rem;
        }

        div.dt-buttons {
            /*float: left; */
            padding-bottom: 15px;
        }

        .page-title>h2.text-highlight {
            margin-left: -23px !important;
            font-size: 1.05rem !important;
        }
    </style>
</head>

<body class="layout-row">
    <?php
    $session = \Config\Services::session();
    $menu = $session->get('usertype');
    ?>
    <?php echo view('App\Modules\Main\Views\menu'); ?>

    <div id="main" class="layout-column flex">

        <?php echo view('App\Modules\Main\Views\navbar'); ?>

        <!-- ############ Content START-->
        <div id="content" class="flex ">
            <!-- ############ Main START-->
            <?php if (isset($load_view)) {
                echo view($load_view);
            } else {
                if ($menu == 'trn') {
                    if ($test==1) {
                        echo view('App\Modules\Main\Views\taruna_v2');
                    } else {
                        echo view('App\Modules\Main\Views\taruna');
                    }
                } else if ($menu == 'gba') {
                    echo view('App\Modules\Main\Views\gubernur');
                } else if ($menu == 'vds') {
                    echo view('App\Modules\Main\Views\evadasi');
                } else {
                    echo view('App\Modules\Main\Views\dashboard');
                }
            } ?>
            <!-- ############ Main END-->
        </div>
        <div id="lengkapi-data-pendidik" class="modal  fade" data-backdrop="false" style="background-color: #192039 !important;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content ">
                    <div class="modal-header ">
                        <div class="modal-title text-md">Data Pendidik</div>
                        <!-- <button class="close" data-dismiss="modal">&times;</button> -->
                    </div>
                    <div class="modal-body">
                        <form data-plugin="parsley" data-option="{}" id="form-updatependidik" enctype="multipart/form-data" autocomplete="off">
                            <input type="hidden" class="form-control" id="temp_id" name="id" value="" required>
                            <?= csrf_field(); ?>
                            <input type="hidden" class="form-control" id="temp_id_m_user" name="id_m_user" value="" required>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>NIK</label>
                                        <input type="tel" class="form-control" id="temp_nik" name="nik" minlength="16" maxlength="16" required placeholder="Nomor Induk Kependudukan">
                                    </div>
                                    <div class="col-6">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" id="temp_namagadik" name="namagadik" required placeholder="Nama Lengkap">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Pangkat</label>
                                        <input type="text" class="form-control" id="temp_pangkat" name="pangkat" placeholder="Pangkat" required>
                                    </div>
                                    <div class="col-6">
                                        <label>Jabatan</label>
                                        <input type="text" class="form-control" id="temp_jab" name="jab" placeholder="Jabatan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Satuan Kerja</label>
                                        <select class="form-control sel2" id="temp_id_satker" name="id_satker" required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>NRP</label>
                                        <input type="text" class="form-control" id="temp_nrp" name="nrp" placeholder="Nomor NRP" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>No WhatsApp</label>
                                        <input type="tel" class="form-control" id="temp_telp" name="telp" placeholder="No WhatsApp" minlength="10" maxlength="12" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" required>
                                        <small>Contoh format : 0812xxxxxxxx</small>
                                    </div>
                                    <div class="col-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="temp_email" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control sel2" id="temp_id_gendera" name="id_gender" required>
                                            <option>Pilih Jenis Kelamin</option>
                                            <option value="1">Laki-laki</option>
                                            <option value="2">Perempuan</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="photopath">
                                    <!-- <div class="col-6">
                                        <label for="deskripsi">File Foto</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file_foto" name="file_foto" accept=".gif,.jpg,.jpeg,.png">
                                            <label class="custom-file-label" for="file_foto">Pilih file</label>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Tempat Lahir</label>
                                        <select class="form-control  sel2" id="temp_id_kabkota_lhr" name="id_kabkota_lhr" required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="temp_tglhr" name="tglhr" placeholder="Tanggal Lahir" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Suku</label>
                                        <select class="form-control sel2" id="temp_id_suku" name="id_suku" required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Agama</label>
                                        <select class="form-control sel2" id="temp_id_agama" name="id_agama" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Alamat</label>
                                        <textarea class="form-control" id="temp_alamat_ktp" name="alamat_ktp" placeholder="Alamat Lengkap"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Provinsi</label>
                                        <select class="form-control sel2" id="temp_id_prov_ktp" name="id_prov_ktp" required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Kabupaten / Kota</label>
                                        <select class="form-control sel2" id="temp_id_kota_kab_ktp" name="id_kota_kab_ktp" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Kecamatan</label>
                                        <select class="form-control sel2" id="temp_id_kec_ktp" name="id_kec_ktp" required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Kelurahan</label>
                                        <select class="form-control sel2" id="temp_id_kel_ktp" name="id_kel_ktp" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label>Status Pendidik</label>
                                        <select class="form-control  sel2" id="temp_is_internala" name="is_internal" required>
                                            <option>Pilih Status Pendidik</option>
                                            <option value="0">External</option>
                                            <option value="1">Internal</option>
                                            <option value="2">PNS</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div> -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="<?=base_url()?>/auth/action/logout" class="btn btn-light">Log out</a>
                        <button type="submit" class="btn btn-primary" form="form-updatependidik" >Verif</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
        <!-- ############ Content END-->

        <?php echo view('App\Modules\Main\Views\footer'); ?>
    </div>
    <script type="text/javascript">

        const url_ajaxa = '<?= base_url() . "/akademik/ajax" ?>';
        const url_inserta = '<?= base_url() . "/portal/action/datapendidik_save" ?>';
        const url_reqotop = '<?= base_url() . "/portal/action/req_otp" ?>';

        // const arr = [2, 2, 12, null];
        // const arr2 = [null, null, null, null];

        function otherThanNull(arr) {
          return arr.some(el => el == null);
        }

        // console.log(otherThanNull(arr));
        // console.log(otherThanNull(arr2));

        var user_type = '<?=$menu?>';
        var data_diri = '<?=json_encode($session->get('userdetail'))?>';
        var data_json = JSON.parse('<?=json_encode($session->get('userdetail'))?>');

        const select2Array_ = [{
            id: 'temp_id_satker',
            url: '/satker_select_get',
            placeholder: 'Cari Satuan Kerja',
            params: null
        },
        {
            id: 'temp_id_kabkota_lhr',
            url: '/birthday_place_select_get',
            placeholder: 'Cari Tempat Lahir',
            params: null
        }, {
            id: 'temp_id_agama',
            url: '/agama_select_get',
            placeholder: 'Pilih Agama',
            params: null
        },
        {
            id: 'temp_id_suku',
            url: '/suku_select_get',
            placeholder: 'Pilih Suku',
            params: null
        },
        {
            id: 'temp_id_prov_ktp',
            url: '/prov_select_get',
            placeholder: 'Pilih Provinsi',
            params: null
        },
        {
            id: 'temp_id_kota_kab_ktp',
            url: '/kab_select_get',
            placeholder: 'Pilih Koba / Kabupaten',
            params: {
                id_prov: function() {
                    return $('#temp_id_prov_ktp').val()
                }
            }
        },
        {
            id: 'temp_id_kec_ktp',
            url: '/kec_select_get',
            placeholder: 'Pilih Kecamatan',
            params: {
                id_kab: function() {
                    return $('#temp_id_kota_kab_ktp').val()
                }
            }
        },
        {
            id: 'temp_id_kel_ktp',
            url: '/kel_select_get',
            placeholder: 'Pilih Kelurahan',
            params: {
                id_kec: function() {
                    return $('#temp_id_kec_ktp').val()
                }
            }
        }
    ];


        $(document).ready(function() {

            // $('#temp_telp').keypress(function(e){ 
            //         if (this.value.length == 0 && e.which == 48 ){
            //             return false;
            //         }
            //     });

            $(document).on('submit', '#form-updatependidik', function(e) {
                e.preventDefault();
                let $this = $(this);

                var formData = new FormData(document.getElementById("form-updatependidik"));

                $.ajax({
                    url: url_reqotop,
                    type: 'post',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(result) {
                        Swal.close();
                        if (result.status=='1') {

                            // console.log(result);
                            Swal.fire({
                              title: 'Masukan Kode OTP',
                              input: 'text',
                              inputAttributes: {
                                autocapitalize: 'off'
                              },
                              showCancelButton: true,
                              confirmButtonText: 'Simpan',
                              showLoaderOnConfirm: true,
                              preConfirm: (login) => {
                               // console.log(login);
                                formData.append('token_otp', login);
                              },
                              allowOutsideClick: () => !Swal.isLoading()
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // console.log(formData);
                                    Swal.fire({
                                        title: "",
                                        icon: "info",
                                        text: "Proses menyimpan data, mohon ditunggu...",
                                        didOpen: function() {
                                            Swal.showLoading()
                                        }
                                    });
                                    $.ajax({
                                        url: url_inserta,
                                        type: 'post',
                                        data: formData,
                                        contentType: false,
                                        cache: false,
                                        processData: false,
                                        dataType: "json",
                                        success: function(result) {
                                            Swal.close();
                                            if (result.success) {
                                                $('#lengkapi-data-pendidik').modal('hide');
                                                Swal.fire('Sukses', 'Berhasil menyimpan data pendidik', 'success');
                                            } else {
                                                Swal.fire('Info', result.message, 'info');
                                            }
                                        },
                                        error: function() {
                                            Swal.close();
                                            Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                                        }
                                    });

                                }
                            })
                        } else {
                            Swal.fire('Info', result.message, 'info');
                        }
                    },
                    error: function() {
                        Swal.close();
                        Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                    }
                });

                


            });

            select2Array_.forEach(function(x) {
                select2Init_('#' + x.id, x.url, x.placeholder, x.params);
            });

            $("#temp_id_gender").select2({
                placeholder: 'Pilih Jenis Kelamin'
            });

            $("#temp_is_internala").select2({
                placeholder: 'Pilih Status Pendidik'
            });

            $("#temp_status_pendidik").select2({
                placeholder: 'Pilih Status Pendidik'
            });

            if (user_type=='gdk') {
                var cek_data_null = [];
                cek_data_null.push(data_json['nik']);
                cek_data_null.push(data_json['namagadik']);
                cek_data_null.push(data_json['pangkat']);
                cek_data_null.push(data_json['jab']);
                cek_data_null.push(data_json['id_satker']);
                cek_data_null.push(data_json['nrp']);
                cek_data_null.push(data_json['telp']);
                cek_data_null.push(data_json['email']);
                cek_data_null.push(data_json['id_gender']);
                cek_data_null.push(data_json['id_kabkota_lhr']);
                cek_data_null.push(data_json['tglhr']);
                cek_data_null.push(data_json['id_suku']);
                cek_data_null.push(data_json['id_agama']);
                cek_data_null.push(data_json['alamat_ktp']);
                cek_data_null.push(data_json['id_prov_ktp']);
                cek_data_null.push(data_json['id_kota_kab_ktp']);
                cek_data_null.push(data_json['id_kec_ktp']);
                cek_data_null.push(data_json['id_kel_ktp']);

               // console.log(otherThanNull(cek_data_null));
               // console.log(cek_data_null);

                if (otherThanNull(cek_data_null)==true) {
                    // $('#lengkapi-data-pendidik').modal('show');


                    // select2Array_.forEach(function(x) {
                    // // console.log('#' + x.id + ' 0 '+ data_json[x.id.replace('temp_id', 'id')] + ' 0 '+ data_json[x.id.replace('temp_id', 'nama')]);

                    //     $('#'+ x.id).select2('trigger', 'select', {
                    //         data: {
                    //             id: data_json[x.id.replace('temp_id', 'id')],
                    //             text: data_json[x.id.replace('temp_id', 'nama')]
                    //         }
                    //     });
                    // });

                    for (key in data_json) {
                            $('#temp_' + key).val(data_json[key]);
                            if (key === 'is_gadik' || key === 'is_instruktur' || key === 'is_pengasuh') {
                                if (data_json[key] === '1') {
                                    $("#" + key + "1").prop("checked", true);
                                } else {
                                    $("#" + key + "0").prop("checked", true);
                                }
                            }
                        }
                }
            }


            
        });

        function select2Init_(id, url, placeholder, parameter) {
            $(id).select2({
                id: function(e) {
                    return e.id
                },
                placeholder: placeholder,
                multiple: false,
                ajax: {
                    url: url_ajaxa + url,
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
    </script>
    <!-- build:js ../assets/js/site.min.js -->
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ajax page -->
    <!-- <script src="<?= base_url() ?>assets/libs/pjax/pjax.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>assets/js/ajax.js"></script> -->
    <!-- lazyload plugin -->
    <script src="<?= base_url() ?>/assets/js/lazyload.config.js"></script>
    <script src="<?= base_url() ?>/assets/js/lazyload.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugin.js"></script>
    <!-- scrollreveal -->
    <script src="<?= base_url() ?>/assets/libs/scrollreveal/dist/scrollreveal.min.js"></script>
    <!-- feathericon -->
    <script src="<?= base_url() ?>/assets/libs/feather-icons/dist/feather.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/feathericon.js"></script>
    <!-- theme -->
    <script src="<?= base_url() ?>/assets/js/theme.js"></script>
    <script src="<?= base_url() ?>/assets/js/utils.js"></script>
    <!-- endbuild -->
    <script src="<?= base_url() ?>/assets/libs/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/sweetalert.js"></script>



    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script> -->
    <!-- dataTabel button -->

    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/2.1.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/2.1.1/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/2.1.1/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/2.1.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>/assets/libs/datatables/2.1.1/js/buttons.print.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script> -->




    <!-- Default jquerya action -->
    <script src="<?= base_url() ?>/assets/js/coreevents.js"></script>
</body>

</html>