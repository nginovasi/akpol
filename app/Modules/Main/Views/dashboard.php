<style type="text/css">
    a {
        cursor: default !important;
    }
</style>
<div>
    <?php
    $session = \Config\Services::session();
    $menu = $session->get('usertype');
    ?>
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
	     	<?php // echo json_encode($session->get()); 
                ?>
	    </div>
	</div> -->
    <div class="page-content page-container-fluid" id="page-content">
        <div class="padding">
            <div class="row row-sm sr">
                <div class="col-md-12">

                    <div class="row row-sm">
                        <div class="col-md-12">
                            <div class="row row-sm">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row row-sm">
                                                <div class="col-4">
                                                    <small class="text-muted">Status Anda</small>
                                                    <div class="mt-2 font-weight-500"><span class="text-info"><?= $session->get('usertype_name_singkatan') ?></span></div>
                                                </div>
                                                <div class="col-4">
                                                    <small class="text-muted">Taruna Aktif</small>
                                                    <div class="text-highlight mt-2 font-weight-500" id="tar_aktiv">0000000</div>
                                                </div>
                                                <div class="col-4">
                                                    <small class="text-muted">Alumni Taruna</small>
                                                    <div class="mt-2 font-weight-500" id="tar_alumni">000000</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="row row-sm">
                                        <div class="col-6 d-flex">
                                            <div class="card flex">
                                                <div class="card-body">
                                                    <small>Internal:
                                                        <strong class="text-primary" id="pen_dalam">0</strong>
                                                    </small>
                                                    <div class="progress my-3 circle" style="height:6px;">
                                                        <div class="progress-bar circle gd-primary" data-toggle="tooltip" title="25%" style="width: 25%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 d-flex">
                                            <div class="card flex">
                                                <div class="card-body">
                                                    <small>External:
                                                        <strong class="text-primary" id="pen_luar">0</strong>
                                                    </small>
                                                    <div class="progress my-3 circle" style="height:6px;">
                                                        <div class="progress-bar circle gd-warning" data-toggle="tooltip" title="25%" style="width: 25%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center justify-content-center flex-column align-content-center">
                                            <div class="position-static" style="height: 12px">
                                                <div class="d-flex align-items-center justify-content-center" id="tingkat1a">
                                                    <small>0</small>
                                                </div>
                                            </div>
                                            <div class="px-3 pt-3 text-center">
                                                <small>Tingkat I<br><span class="text-success">Aktif</span></small>
                                            </div>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-center flex-column align-content-center">
                                            <div class="position-static" style="height: 12px">
                                                <div class="d-flex align-items-center justify-content-center" id="tingkat1b">
                                                    <small>0</small>
                                                </div>
                                            </div>
                                            <div class="px-3 pt-3 text-center">
                                                <small>Tingkat I<br><span class="text-primary">Belum Aktif</span></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex">
                                        <div class="flex">
                                            <div class="text-highlight" id="tingkat2">0</div>
                                            <small class="h-1x">Tingkat II</small>
                                        </div>
                                        <div>
                                            <!-- <small class="text-muted" id="tingkat2">- 2.0</small> -->
                                        </div>
                                    </div>
                                    <div class="w-50" style="height: 30px;">
                                        <canvas data-plugin="chartjs" id="chart-line-2">
                                        </canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex">
                                        <div class="flex">
                                            <div class="text-highlight" id="tingkat3">0</div>
                                            <small class="h-1x">Tingkat III</small>
                                        </div>
                                        <div>
                                            <!-- <small class="text-muted">+ 4.5%</small> -->
                                        </div>
                                    </div>
                                    <div class="w-50" style="height: 30px;">
                                        <canvas data-plugin="chartjs" id="chart-line-3">
                                        </canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex">
                                        <div class="flex">
                                            <div class="text-highlight" id="tingkat4">0</div>
                                            <small class="h-1x">Tingkat IV</small>
                                        </div>
                                        <div>
                                            <!-- <small class="text-muted">+ 3.5%</small> -->
                                        </div>
                                    </div>
                                    <div class="w-50" style="height: 30px;">
                                        <canvas data-plugin="chartjs" id="chart-line-1">
                                        </canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="p-3-4">
                            <div class="d-flex">
                                <div>
                                    <div>Pelanggaran Taruna</div>
                                </div>
                                <span class="flex"></span>
                            </div>
                        </div>
                        <div style="height: 300px; overflow-y: auto;">
                            <div id="pelanggaran_taruna">
                                <div class="position-absolute w-100 h-75 d-flex flex-column align-items-center justify-content-center">
                                    <div class="loading">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="p-3-4">
                            <div class="d-flex">
                                <div>
                                    <div>Absensi Pendidik</div>
                                </div>
                                <span class="flex"></span>
                            </div>
                        </div>
                        <div style="height: 300px; overflow-y: auto;">
                            <div id="absensi_pendidik">
                                <div class="position-absolute w-100 h-75 d-flex flex-column align-items-center justify-content-center">
                                    <div class="loading">
                                    </div>
                                </div>
                            </div>
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
                            <div id="_kalender_akademik">
                                <div class="position-absolute w-100 h-75 d-flex flex-column align-items-center justify-content-center">
                                    <div class="loading">
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script type="text/javascript">
    const url_insert = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_save" ?>';
    const url_edit = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_edit" ?>';
    const url_delete = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_delete" ?>';
    const url_load = '<?= base_url() . "/" . uri_segment(0) . "/action/datadashboard_load" ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';

    var pelanggaran_taruna = '';
    var absensipendidik = '';
    var _kalenderakademik = '';

    const emptyState = `<div class="text-center p-5"><div class="p-4 p-sm-5">
                            <div class="mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox mx-2"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                            </div>
                            <small class="text-muted">Data 
                               tidak ditemukan</small>
                        </div></div>`;

    $(document).ready(function() {

        data_dashboard();

        $(document).on("click", ".button_modal", function(e) {
            $('#modal-detail').modal('show');
            console.log($(this).data('content'));
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

                    pelanggaran_taruna += '<table class="table table-theme v-middle m-0"><tbody>';
                    var no = 0;
                    result.data.pelanggaran_taruna.forEach(function(list) {
                        no++;
                        pelanggaran_taruna += '<tr class=" " >\
                                                <td style="min-width:30px;text-align:center">' + no + '</td>\
                                                <td><div class="avatar-group ">\
                                                    <a  class="avatar ajax w-32" data-toggle="tooltip" title="' + list.namataruna + '">';

                        if (list.photopath == null) {
                            pelanggaran_taruna += '<span class="w-32 avatar gd-warning"><span class="b-white avatar-right"></span>' + list.namataruna.slice(0, 1) + '</span> ';
                        } else {
                            pelanggaran_taruna += '<img src="' + list.photopath + '" alt="' + list.photopath + '" style="width: 32px; height: 32px; object-fit: cover;">';
                        }
                        pelanggaran_taruna += '</a></div></td><td class="flex">\
		                                        <a class="item-company ajax h-1x">' + list.namataruna + ' (' + list.noaklong + ')</a>\
		                                        <div class="item-mail text-muted h-1x d-none d-sm-block">' + list.dasar_hukum + '</div>\
		                                        </td></tr>';
                    });
                    pelanggaran_taruna += '</tbody></table>';
                    absensipendidik += '<table class="table table-theme v-middle m-0"><tbody>';
                    var no = 0;
                    result.data.absenterbaru.forEach(function(list) {
                        no++;
                        absensipendidik += '\
		                    			<tr class=" " >\
		                                    <td style="min-width:30px;text-align:center">\
		                                        ' + no + '\
		                                    </td>\
		                                    <td>\
		                                        <div class="avatar-group "><a  class="avatar ajax w-32" data-toggle="tooltip" title="' + list.gadik + '">';
                        if (list.photopath == null) {

                            absensipendidik += '\
			                                            <span class="w-32 avatar gd-warning">\
								                            <span class="b-white avatar-right"></span>' + list.gadik.slice(0, 1) + '\
								                        </span> ';
                        } else {
                            absensipendidik += '<img src="' + list.photo_gadik + '" alt="' + list.photo_gadik + '" style="width: 32px; height: 32px; object-fit: cover;">';
                        }

                        absensipendidik += '</a>\
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

                    _kalenderakademik += '\
		                    	<table class="table table-theme v-middle m-0">\
		                            <tbody>';
                    var no = 0;
                    result.data.kalenderakademik.forEach(function(list) {
                        no++;
                        _kalenderakademik += '\
		                    			<tr class=" " >\
		                                    <td style="min-width:30px;text-align:center">\
		                                        ' + no + '\
		                                    </td>\
		                                    <td class="flex">\
		                                        <a class="item-company ajax h-1x button_modal" data-id="' + list.id + '" data-content="' + list.file_kalender_akademik + '"  style="color:#34383b;">\
		                                            	' + list.nama + ' \
		                                        </a>\
		                                    </td>\
		                                    <td class="flex">\
		                                        <span class="item-company ajax h-1x">\
		                                            	' + list.tahun_ajaran + ' \
		                                        </span>\
		                                        <div class="item-mail text-muted h-1x d-none d-sm-block">\
		                                            ' + list.created_at + '\
		                                        </div>\
		                                    </td>\
		                                </tr>';
                    })

                    _kalenderakademik += '\
		                            </tbody>\
		                        </table>';

                    if (result.data.pelanggaran_taruna.length > 0) {
                        $('#pelanggaran_taruna').html(pelanggaran_taruna);
                    } else {
                        $('#pelanggaran_taruna').html(emptyState);
                    }

                    if (result.data.absenterbaru.length > 0) {
                        $('#absensi_pendidik').html(absensipendidik);
                    } else {
                        $('#absensi_pendidik').html(emptyState);
                    }

                    if (result.data.kalenderakademik.length > 0) {
                        $('#_kalender_akademik').html(_kalenderakademik);
                    } else {
                        $('#_kalender_akademik').html(emptyState);
                    }

                    // console.log(result.data.aktiv.);
                    $('#tar_aktiv').html(result.data.aktiv.jml_aktiv);
                    $('#tar_alumni').html(result.data.alumni.jml_alumni);
                    $('#pen_dalam').html(result.data.dalam.pendidik_dalam);
                    $('#pen_luar').html(result.data.luar.pendidik_luar);

                    // $('#tingkat1').html(result.data.tingkat[0].jml || 0 + ' Taruna Aktif');
                    $('#tingkat1a').html("<small><span class='text-success'>" + result.data.tingkat[3].jml_verif + "</span></small>");
                    $('#tingkat1b').html("<small><span class='text-primary'>" + result.data.tingkat[3].jml_unverif + "</span></small>");
                    $('#tingkat2').html(result.data.tingkat[2].jml_verif || 0 + ' Taruna');
                    $('#tingkat3').html(result.data.tingkat[1].jml_verif || 0 + ' Taruna');
                    $('#tingkat4').html(result.data.tingkat[0].jml_verif || 0 + ' Taruna');
                } else {
                    Swal.fire('Error', result.message, 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
            }
        });


    }
</script>