<div>
    <style type="text/css">
        a {
            cursor: default !important;
        }

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
    </style>

    <?php

    $session = \Config\Services::session();
    $menu = $session->get('usertype');
    // echo "<pre>";
    // echo json_encode($menu);
    // print_r($session->get('usertype'));
    // echo "</pre>";
    ?>

    <head>
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/libs/chartist/dist/chartist.min.css">
    </head>
    <div class="page-hero page-container-fluid" id="page-hero">
        <div class="padding d-flex">
            <div class="page-title">
                <h2 class="text-md text-highlight">Dashboard</h2>
                <small class="text-muted">Selamat Datang di SIAP AKPOL,
                    <strong><?= $session->get('name') ?></strong>
                </small>
            </div>
            <div class="flex"></div>
            <div>
                <!-- <a href="" class="btn btn-md text-muted">
	                <span class="d-none d-sm-inline mx-1">Explore</span>
	                <i data-feather="arrow-right"></i>
	            </a> -->
            </div>
        </div>
    </div>
    <!-- <div class="page-content page-container" id="page-content">
	    <div class="padding">
	     	<?php echo json_encode($session->get()); ?>
	    </div>
	</div> -->
    <div class="page-content page-container-fluid" id="page-content">
        <div class="padding">
            <div class="row row-sm sr">
                <div class="col-md-12">
                    <div class="row row-sm">
                        <div class="col-md-12">
                            <div class="row row-sm">
                                <div class="col-12">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row row-sm">
                                                    <div class="col-3 mb-3">
                                                        <small class="text-muted">Status Anda</small>
                                                        <div class="mt-2 font-weight-500"><span class="text-info"><?= $session->get('usertype_name_singkatan') ?></span></div>
                                                    </div>
                                                    <div class="col-3 mb-3">
                                                        <small class="text-muted">Taruna Aktif</small>
                                                        <div class="text-highlight mt-2 font-weight-500" id="tar_aktiv">0000000</div>
                                                    </div>
                                                    <div class="col-3 mb-3">
                                                        <small class="text-muted">Alumni Taruna</small>
                                                        <div class="mt-2 font-weight-500" id="tar_alumni">000000</div>
                                                    </div>
                                                    <div class="col-3 mb-3">
                                                        <small class="text-muted">Pendidik</small>
                                                        <div class="mt-2 font-weight-500" id="pendidik_aktiv">000000</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <div class="card flex" style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                        <div class="p-3-4">
                                            <div class="d-flex">
                                                <div>
                                                    <div>Taruna Per Semester</div>
                                                    <small class="text-muted" id="tot-semester">Total : 12</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list list-row" id="tarunapersmt-list">


                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            Persebaran Taruna per Semester
                                        </div>
                                        <div class="card-body">
                                            <div id="taruna-chart" class="pos-rlt" style="height: 240px">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <div class="card flex" style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                        <div class="p-3-4">
                                            <div class="d-flex">
                                                <div>
                                                    <div>Taruna Per Batalyon</div>
                                                    <small class="text-muted" id="tot-batalyon">Total : 12</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list list-row" id="tarunaperbatalyon-list">


                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            Persebaran Taruna per Batalyon
                                        </div>
                                        <div class="card-body">
                                            <div id="batalyon-chart" class="pos-rlt" style="height: 240px">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <div class="card flex pb-3" style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                        <div class="p-3-4">
                                            <div class="d-flex">
                                                <div>
                                                    <div>Mata Pelajaran</div>
                                                    <small class="text-muted" id="mapel-tot">Total: 12</small>
                                                </div>
                                                <span class="flex"></span>
                                            </div>
                                        </div>
                                        <div class="list list-row" id="mapelpersmt-list" style="height: 300px; overflow-y: auto;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">
                                            Mata Pelajaran per Semester
                                        </div>
                                        <div class="card-body">
                                            <div id="mapelpersmt-chart" class="pos-rlt" style="height: 240px">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card pb-3" style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                        <div class="p-3-4">
                            <div class="d-flex">
                                <div>
                                    <div>Pengumuman</div>
                                    <small class="text-muted" id="pengumuman-tot">Total: 12</small>
                                </div>
                                <span class="flex"></span>
                                <div>
                                    <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-form">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg> <span class="mx-1">Tambah Pengumuman</span>
                                    </button>
                                </div>
                                <div class="ml-3">
                                    <div class="btn-group-toggle" data-toggle="buttons" id="pengumuman-toggle">
                                        <label class="btn active" id="pengumuman-internal">
                                            <input type="radio" name="pengumuman-jenis" value="1"> Internal
                                        </label>
                                        <label class="btn" id="pengumuman-umum">
                                            <input type="radio" name="pengumuman-jenis" value="2"> Umum
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list list-row" id="pengumuman-list" style="height: 300px; overflow-y: auto;">

                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="p-3-4">
                            <div class="d-flex">
                                <div>
                                    <div>Kalender Akademik</div>
                                </div>
                                <span class="flex"></span>
                            </div>
                        </div>
                        <div style="height: 300px; overflow-y: auto;">
                            <div id="_kalender_akademik"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="modal-detail" class="modal fade" data-backdrop="true">
        <div class="modal-dialog modal-lg animate">
            <div class="modal-content ">
                <div class="modal-header ">
                    <div class="modal-title text-md">Detail</div>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="px-sm-4 my-3 my-sm-0 flex">
                        <h2 class="text-md mb-5" id="modal-title">Jacqueline Reid</h2>
                        <small class="d-block text-fade" id="modal-desc">Senior Industrial Designer</small>
                        <div class="row px-3">
                            <div class="tl-date text-muted mt-4" id="modal-by">1 day ago</div>
                            <div class="flex"></div>
                            <div class="tl-date text-muted mt-4" id="modal-at">1 day ago</div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <div id="modal-form" class="modal fade" data-backdrop="true">
        <div class="modal-dialog modal-lg animate">
            <form data-plugin="parsley" data-option="{}" id="form-pengumuman" autocomplete="off" enctype="multipart/form-data">
                <div class="modal-content ">
                    <div class="modal-header ">
                        <div class="modal-title text-md">Form</div>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body p-4">
                        <?= csrf_field(); ?>
                        <input type="hidden" class="form-control" id="id" name="id" value="" required>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-9">
                                <input id="judul" name="judul" type="text" class="form-control" placeholder="Title" required>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenis Pengumuman</label>
                            <div class="col-sm-9">
                                <div class="mt-2" id="event-type">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="jenis_pengumuman" value="internal"> Internal</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="jenis_pengumuman" value="umum"> Umum</label>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="file_banner">File Banner</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file_banner" name="file_banner" required>
                                    <label class="custom-file-label" for="file_tugas">Pilih file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Konten</label>
                            <div class="col-sm-9">
                                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="6" required></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>

<div id="modal-detailakademik" class="modal fade" data-backdrop="true">
        <div class="modal-dialog modal-lg animate">
            <div class="modal-content ">
                <div class="modal-header ">
                    <div class="modal-title text-md">Info</div>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <iframe src='' id="kalenderakademik" width='100%' height='565px' frameborder='0'> </iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script type="text/javascript">
    const url_insert = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_save" ?>';
    const url_edit = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_edit" ?>';
    const url_delete = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_delete" ?>';
    const url_load = '<?= base_url() . "/" . uri_segment(0) . "/action/datagubernur_load" ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';
    const url_pengumuman_insert = '<?= base_url() . "/" . uri_segment(0) . "/action/pengumuman_save" ?>';


    var pelanggaran_taruna = '';
    var absensipendidik = '';
    var mapelpersmt = '';
    var tarunapersmt = '';
    var tarunaperbatalyon = '';
    var pengumumanInternal;
    var pengumumanUmum;
    var _kalenderakademik = '';


    $(document).ready(function() {

        data_dashboard();

        $(document).on("click", ".button_modal", function(e) {
            $('#modal-detailakademik').modal('show');
           // console.log($(this).data('content'));
            $('#kalenderakademik').attr('src', $(this).data('content'));
        })
    });

    function data_dashboard() {

        $.ajax({
            url: url_load,
            type: 'post',
            data: {
                "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
            },
            dataType: 'json',
            success: function(result) {
                if (result.success) {

                    pelanggaran_taruna += '\
		                    	<table class="table table-theme v-middle m-0">\
		                            <tbody>';
                    var no = 0;
                    result.data.pelanggaran_taruna.forEach(function(list) {
                        no++;
                        pelanggaran_taruna += '\
		                    			<tr class=" " >\
		                                    <td style="min-width:30px;text-align:center">\
		                                        ' + no + '\
		                                    </td>\
		                                    <td>\
		                                        <div class="avatar-group ">\
		                                            <a  class="avatar ajax w-32" data-toggle="tooltip" title="' + list.namataruna + '">\
		                                                <img src="' + list.photopath + '" alt="' + list.photopath + '" style="width: 32px; height: 32px; object-fit: cover;">\
		                                            </a>\
		                                        </div>\
		                                    </td>\
		                                    <td class="flex">\
		                                        <a class="item-company ajax h-1x">\
		                                            	' + list.namataruna + ' (' + list.noaklong + ') \
		                                        </a>\
		                                        <div class="item-mail text-muted h-1x d-none d-sm-block">\
		                                            ' + list.dasar_hukum + '\
		                                        </div>\
		                                    </td>\
		                                </tr>';
                    })

                    pelanggaran_taruna += '\
		                            </tbody>\
		                        </table>';

                    absensipendidik += '\
		                    	<table class="table table-theme v-middle m-0">\
		                            <tbody>';
                    var no = 0;
                    result.data.absenterbaru.forEach(function(list) {
                        no++;
                        absensipendidik += '\
		                    			<tr class=" " >\
		                                    <td style="min-width:30px;text-align:center">\
		                                        ' + no + '\
		                                    </td>\
		                                    <td>\
		                                        <div class="avatar-group ">\
		                                            <a  class="avatar ajax w-32" data-toggle="tooltip" title="' + list.gadik + '">\
		                                                <img src="' + list.photo_gadik + '" alt="' + list.photo_gadik + '" style="width: 32px; height: 32px; object-fit: cover;">\
		                                            </a>\
		                                        </div>\
		                                    </td>\
		                                    <td class="flex">\
		                                        <a class="item-company ajax h-1x">\
		                                            	' + list.gadik + ' \
		                                        </a>\
		                                        <div class="item-mail text-muted h-1x d-none d-sm-block">\
		                                            ' + list.kode_mk + '-' + list.mata_pelajaran + '\
		                                        </div>\
		                                    </td>\
		                                    <td class="flex">\
		                                        <span class="item-company ajax h-1x">\
		                                            	' + list.kelompok + ' \
		                                        </span>\
		                                        <div class="item-mail text-muted h-1x d-none d-sm-block">\
		                                            ' + list.absen + '\
		                                        </div>\
		                                    </td>\
		                                </tr>';
                    })

                    absensipendidik += '\
		                            </tbody>\
		                        </table>';

                    var no = 0;
                    result.data.mapelpersmt.forEach(function(list, index) {
                        no++;
                        mapelpersmt += '\
                            <div class="list-item " data-id="' + index + '" style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">\
                                <div>\
                                <span class="badge bg-secondary-lt">' + no + '</span>\
                                </div>\
                                <div class="flex">\
                                    <a href="#" class="item-title text-color h-1x">' + list.semester + '</a>\
                                    <div class="item-except text-muted text-sm h-1x">' + list.jabatan + '</div>\
                                </div>\
                                <div>\
                                    <span class="item-amount d-none d-sm-block text-sm text-muted">\
                                        ' + list.tot_mata_pelajaran + '\
                                    </span>\
                                </div>\
                            </div>     ';
                    })

                    var no = 0;
                    result.data.chart_taruna.forEach(function(list, index) {
                        no++;
                        tarunapersmt += '<div class="list-item " data-id="17"  style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">\
                                                <div>\
                                                <span class="badge bg-secondary-lt">' + list.semester + '</span>\
                                                </div>\
                                                <div class="flex">\
                                                    <a href="#" class="item-title text-color h-1x">' + list.jabatan + '</a>\
                                                </div>\
                                                <div>\
                                                    <span class="item-amount d-none d-sm-block text-sm text-muted">\
                                                        ' + list.total + '\
                                                    </span>\
                                                </div>\
                                            </div>'
                    })

                    var no = 0;
                    result.data.chart_batalyon.forEach(function(list, index) {
                        no++;
                        tarunaperbatalyon += '<div class="list-item " data-id="17"  style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">\
                                                <div>\
                                                <span class="badge bg-secondary-lt">' + list.tahun_masuk + '</span>\
                                                </div>\
                                                <div class="flex">\
                                                    <a href="#" class="item-title text-color h-1x">' + list.batalyon + '</a>\
                                                    <span class="item-amount d-none d-sm-block text-sm text-muted">\
                                                        ' + list.namagadik + '\
                                                    </span>\
                                                    </div>\
                                                <div>\
                                                    <span class="item-amount d-none d-sm-block text-sm text-muted">\
                                                        ' + list.total + '\
                                                    </span>\
                                                </div>\
                                            </div>'
                    })

                    pengumumanInternal = _.filter(result.data.pengumuman, function(o) {
                        return o.jenis === 'internal';
                    });
                    pengumumanUmum = _.filter(result.data.pengumuman, function(o) {
                        return o.jenis === 'umum';
                    });
                    populatePengumuman(pengumumanInternal);

                    _kalenderakademik += '\
                                <table class="table table-theme v-middle m-0">\
                                    <tbody>';
                                    var no = 0;
                                    result.data.kalenderakademik.forEach (function(list) {
                                        no++;
                                        _kalenderakademik += '\
                                        <tr class=" " >\
                                            <td style="min-width:30px;text-align:center">\
                                                '+no+'\
                                            </td>\
                                            <td class="flex">\
                                                <a class="item-company ajax h-1x button_modal" data-id="'+list.id+'" data-content="'+list.file_kalender_akademik+'"  style="color:#34383b;">\
                                                        '+list.nama+' \
                                                </a>\
                                            </td>\
                                            <td class="flex">\
                                                <span class="item-company ajax h-1x">\
                                                        '+list.tahun_ajaran+' \
                                                </span>\
                                                <div class="item-mail text-muted h-1x d-none d-sm-block">\
                                                    '+list.created_at+'\
                                                </div>\
                                            </td>\
                                        </tr>';
                                                  })

                                    _kalenderakademik += '\
                                    </tbody>\
                                </table>';
                                $('#_kalender_akademik').html(_kalenderakademik);


                    $('#pelanggaran_taruna').html(pelanggaran_taruna);
                    $('#absensi_pendidik').html(absensipendidik);
                    $('#mapelpersmt-list').html(mapelpersmt);
                    $('#mapel-tot').html('Total : ' + _.sumBy(result.data.mapelpersmt, function(o) {
                        return parseInt(o.tot_mata_pelajaran);
                    }))
                    $('#tarunapersmt-list').html(tarunapersmt);
                    $('#tot-semester').html('Total : ' + result.data.chart_taruna.length)
                    $('#tarunaperbatalyon-list').html(tarunaperbatalyon);
                    $('#tot-batalyon').html('Total : ' + result.data.chart_batalyon.length)

                    initChartTaruna(result.data.chart_taruna);
                    initChartBatalyon(result.data.chart_batalyon);
                    initChartMapel(result.data.mapelpersmt);

                    $('#tar_aktiv').html(result.data.aktiv.jml_aktiv);
                    $('#pendidik_aktiv').html(result.data.pendidik.jml_pendidik);
                    $('#tar_alumni').html(result.data.alumni.jml_alumni);
                    $('#pen_dalam').html(result.data.dalam.pendidik_dalam);
                    $('#pen_luar').html(result.data.luar.pendidik_luar);

                    $('#tingkat1').html(result.data.tingkat[1].jml + ' Taruna');
                    $('#tingkat2').html(result.data.tingkat[2].jml + ' Taruna');
                    $('#tingkat3').html(result.data.tingkat[3].jml + ' Taruna');
                    $('#tingkat4').html(result.data.tingkat[4].jml + ' Taruna');
                } else {
                    Swal.fire('Error', result.message, 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
            }
        });

        $(document).on("click", "#pengumuman-toggle", function() {
            if ($('#pengumuman-internal').hasClass('active')) {
                populatePengumuman(pengumumanInternal);
            } else {
                populatePengumuman(pengumumanUmum);
            }
        }).on("click", ".pengumuman-data", function(e) {
            $('#modal-title').html($(this).data('title'));
            $('#modal-desc').html($(this).data('desc'));
            $('#modal-by').html($(this).data('by'));
            $('#modal-at').html($(this).data('at'));
            $('#modal-detail').modal('show');
        }).on('submit', '#form-pengumuman', function(e) {
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
                    var formData = new FormData(document.getElementById("form-pengumuman"));
                    $.ajax({
                        url: url_pengumuman_insert,
                        method: "POST",
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function(result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil menyimpan pengumuman', 'success');
                                reloadPengumumanList();
                                $('#form-pengumuman').trigger("reset");
                            } else {
                                Swal.fire('Error', result.message, 'warning');
                            }
                        },
                        error: function() {
                            Swal.close();
                            Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                        }
                    });
                }
            });
        }).on('reset', '#form-pengumuman', function() {
            $('#id').val('');
            $('.custom-file-label').html('Pilih File');
        }).on('change', '.custom-file-input', function() {
            let $this = $(this)[0];
            $('.custom-file-label').html($this.files[0].name);
            if ($this.files[0].size > 3138576) {
                Swal.fire('Error', 'File teralu besar, maksimal besar file adalah 3mb', 'error');
                $this.value = "";
                $('.custom-file-label').html('Pilih File');
            };
        })

        function populatePengumuman(pengumuman) {
            var elm = '';
            var no = 0;
            pengumuman.forEach(function(list, index) {
                no++;
                elm += '\
                        <div class="list-item " data-id="8" style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">\
                                <div>\
                                    <span class="badge bg-secondary-lt">' + no + '</span>\
                                </div>\
                                <div class="flex">\
                                    <a class="item-author text-color pengumuman-data" data-title="' + list.judul + '" \
                                    data-desc="' + list.deskripsi + '" data-by="' + list.name + '" data-at="' + list.created_at + '"\
                                    >' + list.judul + '</a>\
                                    <div class="item-except text-muted text-sm h-1x">\
                                       ' + list.deskripsi + '\
                                    </div>\
                                </div>  \
                                <div class="tl-date text-muted mt-1" style="min-width: 200px">Oleh ' + list.name + '<br> pada ' + list.date_short + '</div>\
                            </div>    ';
            })
            $('#pengumuman-list').html(elm);
            $('#pengumuman-tot').html('Total : ' + pengumuman.length)
        }

        function initChartTaruna(rs) {
            var options = {
                series: [{
                    name: 'Taruna',
                    data: _.map(rs, 'tot_taruna')
                }, {
                    name: 'Taruni',
                    data: _.map(rs, 'tot_taruni')
                }, ],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: _.map(rs, 'semester'),
                },
                yaxis: {
                    title: {
                        text: 'Taruna/Taruni'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " taruna"
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#taruna-chart"), options);
            chart.render();
        }

        function initChartBatalyon(rs) {
            var options = {
                series: [{
                    name: 'Taruna',
                    data: _.map(rs, 'tot_taruna')
                }, {
                    name: 'Taruni',
                    data: _.map(rs, 'tot_taruni')
                }, ],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: _.map(rs, 'tahun_masuk'),
                },
                yaxis: {
                    title: {
                        text: 'Tahun Masuk'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " taruna"
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#batalyon-chart"), options);
            chart.render();
        }

        function initChartMapel(rs) {
            var options = {
                series: [{
                    name: 'Mata Pelajaran',
                    data: _.map(rs, 'tot_mata_pelajaran')
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: _.map(rs, 'semester'),
                    title: {
                        text: 'Mata Pelajaran'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function(val) {
                            return val + " mata pelajaran"
                        }
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#mapelpersmt-chart"), options);
            chart.render();
        }

        function reloadPengumumanList() {
            $.ajax({
                url: url_load,
                type: 'post',
                data: {
                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success) {
                        pengumumanInternal = _.filter(result.data.pengumuman, function(o) {
                            return o.jenis === 'internal';
                        });
                        pengumumanUmum = _.filter(result.data.pengumuman, function(o) {
                            return o.jenis === 'umum';
                        });
                        populatePengumuman(pengumumanInternal);

                    } else {
                        Swal.fire('Error', result.message, 'error');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });
        }
    }
</script>