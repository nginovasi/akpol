<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.3.3/jscolor.min.js'></script>
<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script> -->

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<style type="text/css">
	.opt-tools {
		height: 100%;
		width: 25px;
		right: -21px;
		position: absolute;
		border: 1px solid #E8E8E8;
		border-top-right-radius: 8px;
		border-bottom-right-radius: 8px;
	}

	.opt-edit,
	.opt-trash {
		height: 50%;
		line-height: 25px;
		text-align: center;
		font-size: 13px;
		cursor: pointer;
	}

	.opt-edit {
		border-bottom: 1px solid #E8E8E8;
		border-top-right-radius: 8px;
		background-color: #fff;
		color: #ff8e00;
	}

	.opt-edit:hover {
		color: #fff;
		background-color: #ff8e00;
	}

	.opt-trash {
		border-bottom-right-radius: 8px;
		background-color: #fff;
		color: #cc0000;
	}

	.opt-trash:hover {
		color: #fff;
		background-color: #cc0000;
	}

	/* LOCK HEADER AND FIRST COLUMN */
	.table td,
	.table th {
		padding: 5px !important;
	}

	.height1day {
		height: 370px;
	}

	th:first-child {
		position: sticky;
		left: 0;
		z-index: 1030;
	}

	td:first-child {
		position: sticky;
		left: 0;
		z-index: 1010;
	}

	thead th {
		position: sticky;
		top: 10px;
		z-index: 1020;
	}

	thead th {
		position: sticky;
		top: 0;
		z-index: 1020;
		height: 50px;

	}

	thead tr.a {
		position: sticky;
		bottom: 0;
		z-index: 1020;
		height: 100px;
		background-color: red;

	}

	thead tr.row2 th {
		position: sticky;
		top: 50px;
		z-index: 1020;
		height: 50px;

	}

	/* ---------- END (LOCK HEADER AND FIRST COLUMN ) --------- */

	.datetimepicker {
		width: 70% !important;
		height: 70% !important;
	}

	.cal-container {
		max-width: 900px;
		max-height: 500px;
		overflow: auto;
		margin: auto;
	}

	.cal-table {
		position: relative;
		border: solid #ebebeb;
		border-width: 0 1px 0 0;
		overscroll-behavior: contain;
	}

	.cal-thead {
		top: 0px;
		box-shadow: 0 10px 50px rgba(0, 0, 0, 0.04);
	}

	.cal-viewmonth {
		font-size: 16px;
		background: #fdfdfd;
		width: 150px;
		height: 50px;
	}

	.cal-toprow {
		width: 182px;
		min-width: 182px;
		color: #3e5569;
		background-color: #f7f9fb !important;
		border: 1px solid #ebebeb !important;
	}

	.cal-viewmonth,
	.cal-toprow {
		font-weight: 700 !important;
		text-align: center;
		vertical-align: middle !important;
	}

	.cal-userinfo {
		height: 68px;
		box-shadow: 20px 0 50px rgba(0, 0, 0, 0.05);
	}

	.cal-tbody .cal-userinfo {
		min-width: 150px !important;
		text-align: right;
		color: hsla(210, 5%, 40%, 1);
		font-weight: 600;
		font-size: 12px;
		letter-spacing: 0.03em;
		background: #fdfdfd;
		padding: 0.3em;
		border: 1px solid #ebebeb;
	}

	.cal-usersheader {
		height: 20px;
		box-shadow: 20px 0 50px rgba(0, 0, 0, 0.05);
		min-width: 150px !important;
		text-align: center;
		font-weight: bold;
		font-size: 15px;
		letter-spacing: 0.03em;
		padding: 0.3em;
	}

	.weekend {
		background-color: #b5b5b582;
	}

	.drag {
		z-index: 10;
		cursor: all-scroll;
	}

	.span-info {
		display: inline-block;
		padding: 0.25em 0.4em;
		text-align: center;
		white-space: nowrap;
		vertical-align: baseline;
		width: 25px;
		background-color: red;
		cursor: pointer;
	}

	.ui-draggable-dragging {
		z-index: 9999 !important;
	}

	.cal-usercounter {
		bottom: 0;
		right: 0;
		position: absolute;
		text-align: right;
		border-radius: 0px;
		border: 2px thick red;
	}

	.cal-userbadge {
		border-radius: 0;
		font-weight: 600;
		font-size: 11px;
	}

	/* USER TASKS */
	.details {
		border-radius: 4px;
		background: #fff;
		box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
		border: 1px solid #ebecee;
		padding: 0px 0px 5px 10px;
		margin: 2px;
		z-index: 1;
	}

	.details-uren {
		font-size: 12px;
		color: #333;
		font-weight: 500;
		margin: 0;
		right: 0px;
		text-align: right;
		padding-right: 10px;
	}

	.details-task {
		margin-top: 5px;
		margin-bottom: 2px;
		font-size: 12px;
		padding: 2px 5px;
		font-weight: 600;
		line-height: 1.4;
		border-radius: 2px;
		width: 94%;
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
						<a class="nav-link active" data-toggle="tab" href="#tab-jadwal" role="tab" aria-controls="tab-jadwal" aria-selected="false">Jadwal</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="padding">
					<div class="tab-content">
						<div class="tab-pane fade active show" id="tab-jadwal" role="tabpanel" aria-labelledby="tab-jadwal">
							<form data-plugin="parsley" data-option="{}" id="form" autocomplete="off">
								<input type="hidden" class="form-control" id="id" name="id" value="" required>
								<?= csrf_field(); ?>
								<div class="form-group row">
									<div class="col-4">
										<label for="id_batalyon">Batalyon</label>
										<select class="form-control sel2" id="id_batalyon" name="id_batalyon" required>
										</select>
									</div>
									<div class="col-4">
										<label for="tanggal">Tanggal <small>(Dalam 1 minggu)</small></label>
										<input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Pilih Tanggal" required />
									</div>
									<div class="col-4">
										<label for="is_ujian">Ujian</label>
										<select class="form-control sel2" id="is_ujian" name="is_ujian" required>
											<option value="0">Tidak</option>
											<option value="1">Ya</option>
										</select>
									</div>
								</div>
								<div class="text-right">
									<a id="d-pdf" class="btn btn-light-primary font-weight-bold">Download PDF</a>
									<?php
									if ($rules->i == '1') { ?>
										<button type="submit" class="btn btn-primary">Cari</button>
									<?php }
									?>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card" id="card_table_jadwal" style="display: none">
			<div class="card-body">
				<br>
				<div>
					<div style="text-align: center;">
						<h3 style="font-size: 1rem" id="_batalyon"></h3>
					</div>
					<div style="text-align: center;">
						<h3 style="font-size: 1rem" id="_periode"></h3>
					</div>
					<div style="text-align: center;" id="_verif"></div>
					<div style="text-align: center;" id="_buttonverif"></div>
				</div>
				<br>
				<div class="table-responsive">
					<div data-parse="1595877840000" id="calplaceholder" style="max-height: 684px; margin-bottom: 0;">
						<div class="cal-sectionDiv">

							<div id="data_tabel_jadwal"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- DISPLAY MODAL: EDIT -->
	<div class="modal fade" id="edittask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<form id="updategadik">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit Pendidik</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div id="modal-edit" class="modal-body">
						<div class="form-group row">
							<div class="col-12">
								<label for="taskmatapelajaran">Mata Pelajaran</label>
								<input type="text" class="form-control" id="taskmatapelajaran" disabled="">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-12">
								<label for="id_user_pendidik">Pendidik Mengajar</label>
								<input type="hidden" id="taskid_jadwal" type="hidden" name="taskid_jadwal">
								<input type="hidden" id="taskid_mata_pelajaran" type="hidden" name="taskid_mata_pelajaran">
								<input type="hidden" id="taskid_batalyon" type="hidden" name="taskid_batalyon">
								<input type="hidden" id="taskid">
								<select class="form-control select2pendidik" id="id_user_pendidik" name="id_user_pendidik" required>\
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button id="confupdates" type="submit" class="btn btn-danger">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- DISPLAY MODAL: DELETE -->
	<div class="modal fade" id="deletetask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">

				<div id="modal-delete" class="modal-body" style="text-align: center;">
				</div>
				<div class="modal-footer">
					<input id="taskdelid" type="hidden" value="">
					<input id="id_jadwal" type="hidden" value="">
					<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
					<button id="confdelete" type="button" class="btn btn-danger">Yes</button>

				</div>
			</div>
		</div>
	</div>
	<!-- partial -->

</div>
<script type="text/javascript">
	const auth_insert = '<?= $rules->i ?>';
	const auth_edit = '<?= $rules->e ?>';
	const auth_delete = '<?= $rules->d ?>';
	const auth_otorisasi = '<?= $rules->o ?>';

	const url_insert = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_save" ?>';
	const url_edit = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_edit" ?>';
	const url_delete = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_delete" ?>';
	const url_load = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_load" ?>';
	const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';
	const url_download = '<?= base_url() . "/" . uri_segment(0) . "/action/pdf/" . uri_segment(1) ?>';

	const url = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) ?>';

	var coreEvents;

	var dataStart = 0;
	var table;

	var height45 = 'style=" height : 45px; "';

	var colorTabel = ['#F9F5FF', '#FEF3F2', '#FEF0C7', '#D1FADF', '#EAECF5', '#D1E9FF', '#FCE7F6', '#FFEAD5'];
	var colorTabelfooter = ['#D6BBFB', '#FDA29B', '#FEC84B', '#6CE9A6', '#9EA5D1', '#84CAFF', '#FAA7E0', '#FEB273'];
	var colorr = ["#000"];
	var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

	$(document).ready(function() {
		$('#d-pdf').on('click', function(e) {
			$(this).attr("href", url_download + "?id_batalyon=" + $('#id_batalyon').select2('data')[0]['id'] + '&tanggal=' + $('#tanggal').val() + '&is_ujian=' + $('#is_ujian').val() + '&o=L');
			$(this).attr("target", "_blank");
		});

		toastr.options = {
			'closeButton': true,
			'debug': false,
			'newestOnTop': false,
			'progressBar': false,
			'positionClass': 'toast-top-right',
			'preventDuplicates': false,
			'showDuration': '1000',
			'hideDuration': '1000',
			'timeOut': '5000',
			'extendedTimeOut': '1000',
			'showEasing': 'swing',
			'hideEasing': 'linear',
			'showMethod': 'fadeIn',
			'hideMethod': 'fadeOut',
		};


		$('input[name="tanggal"]').daterangepicker({
			singleDatePicker: true,
			showDropdowns: false,
			autoUpdateInput: false,
			locale: {
				cancelLabel: 'Clear'
			},
			"autoApply": true,
			isInvalidDate: function(date) {
				// return 1 !== new Date(date).getDay();
			}

		}).on('apply.daterangepicker', function(ev, picker) {
			var value = picker.startDate.format('DD/MM/YYYY');
			var startdate = moment(value, 'DD/MM/YYYY').day(1).format('DD/MM/YYYY');
			var enddate = moment(value, 'DD/MM/YYYY').day(7).format('DD/MM/YYYY');
			$(this).val(startdate);
			if ($('#id_pendidik').val() != null) {
				tampildata($('#id_pendidik').val(), $('#tanggal').val());
			}
		});

		$(document).on('submit', '#form', function(e) {
			e.preventDefault();
			let $this = $(this);
			Swal.fire({
				title: "",
				icon: "info",
				text: "Proses mencari jadwal, mohon ditunggu...",
				didOpen: function() {
					Swal.showLoading();
				}
			});
			$('#data_tabel_jadwal').html("");
			$('#card_table_jadwal').hide();
			$.ajax({
				url: url_load,
				type: 'post',
				data: $this.serialize(),
				dataType: 'json',
				success: function(result) {
					// console.log(result);
					Swal.close();
					if (result.success) {
						if (result.data.header.length == 0) {
							$('#data_tabel_jadwal').html("");
							$('#card_table_jadwal').hide();
							Swal.fire('Error', "Maaf Kelompok Tidak Ditemukan", 'info');
						} else {
							var tabel = '';
							tabel += `<table class="table table-striped table-bordered">\
										<thead class="cal-thead">\
											<tr>\
												<th rowspan="2" class="cal-viewmonth" id="changemonth" >Hari</th>`;
							dataStart = 0;

							var objheader = result.data.header; //header table
							var orderobjheader = objheader.sort((a, b) => parseFloat(a.id_kelompok) - parseFloat(b.id_kelompok));

							result.data.header.forEach(function(list) {
								tabel += '<th class="cal-toprow" style="background-color: ' + colorTabelfooter[dataStart] + ' !important;">' + list.nama_kelompok + '</th>';
								colorr[list.id_kelompok] = colorTabelfooter[dataStart];
								dataStart++;
							});

							tabel += '</tr><tr class="row2">';

							dataStart = 0;

							result.data.header.forEach(function(list) {
								tabel += '<th class="cal-toprow" style="background-color: ' + colorTabelfooter[dataStart] + ' !important;">\
											<select class="form-control select2kelas" id="' + list.nama_kelompok.replaceAll(' ', '_') + '" name="id_kelompok[]" required></select>\
										</th>';
								dataStart++;
							});

							tabel += '</tr></thead><tbody class="cal-tbody">';

							result.data.body.forEach(function(list) {
								var arrhari = new Date(list.tanggal);
								tabel += '<tr id="' + list.tanggal.replaceAll('-', '_') + '">\
												<td class="cal-usersheader" style="color:#fff; background-color:#389fe8; padding: 0px;">' + days[arrhari.getDay()] + ', ' + list.tanggal + '</td>\
												<td colspan="' + parseInt(result.data.header.length) + '" class="cal-usersheader" style="color:#000; background-color:#389fe8; padding: 0px;"></td>\
											</tr>';
								var obj = JSON.parse(list.data_unit);
								// console.log(list.data_unit);
								var orderobj = obj.sort((a, b) => parseFloat(a.jam_mulai) - parseFloat(b.jam_mulai));
								orderobj.forEach(function(isi) {
									tabel += `<tr id="u2">`;

									if (isi.id_pertemuan == 1) {
										tabel += '<td class="cal-userinfo" \
													data-unitpertemuan="' + isi.id_pertemuan + '" \
													data-dateheaderr="' + list.tanggal + '" \
													style="height : 45px" \
													align="center">'
									} else if (isi.id_pertemuan == 5) {
										tabel += '<td class="cal-userinfo" \
													data-unitpertemuan="' + isi.id_pertemuan + '" \
													data-dateheaderr="' + list.tanggal + '" \
													style="height : 45px" \
													align="center">'
									} else {
										tabel += '<td class="cal-userinfo" \
													data-unitpertemuan="' + isi.id_pertemuan + '" \
													data-dateheaderr="' + list.tanggal + '" \
													align="center" >'
									}

									tabel += ' <span><b>' + isi.unit_pertemuan + '</b></span>\
													<div class="cal-usercounter">\
														<span class="cal-userbadge badge badge-light">' + isi.jam_mulai + '</span>\
														<span class="cal-userbadge badge badge-warning">' + isi.jam_selesai + '</span>\
													</div>\
													<div class="cal-userarrows">\
														<i class="up mdi mdi-arrow-up-bold"></i><i class="down mdi mdi-arrow-down-bold"></i>\
													</div>\
												</td>\
											';
									if (isi.id_pertemuan == 1) {
										result.data.header.forEach(function(head) {
											tabel += '<td class="weekend cal-userinfo" style="height : 45px; text-align: center;  padding: 11px !important; background : #d9d9d9">Olahraga Pagi</td>';
										});
									} else if (isi.id_pertemuan == 5) {
										result.data.header.forEach(function(head) {
											tabel += '<td class="weekend ui-userinfo" \
														data-date="' + list.tanggal + '" \
														data-namakelompoktaruna="' + head.nama_kelompok.replaceAll(' ', '_') + '" \
														style="height : 45px; text-align: center; padding: 11px !important; background : #d9d9d9" >Isoma</td>';
										});
									} else {
										dataStart = 0;
										result.data.header.forEach(function(head) {
											if (list.kunci == 1) {
												tabel += '<td class="weekend ui-userinfo" \
															style="background-color: ' + colorTabel[dataStart] + ' !important;" \
															id="' + list.tanggal + '_' + isi.id_pertemuan + '_' + head.id_kelompok + '"></td>';
											} else {
												tabel += '<td class="ui-droppable" \
															style="background-color:' + colorTabel[dataStart] + ' !important;" \
															data-date="' + list.tanggal + '" \
															data-unit="' + isi.id_pertemuan + '" \
															data-kelompoktaruna="' + head.id_kelompok + '" \
															data-namakelompoktaruna="' + head.nama_kelompok.replaceAll(' ', '_') + '" \
															id="' + list.tanggal + '_' + isi.id_pertemuan + '_' + head.id_kelompok + '" \
															data-jammulai="' + isi.jam_mulai + '" \
															data-jamselesai="' + isi.jam_selesai + '"></td>';
											}
											dataStart++;
										});
									}
									tabel += '</tr>';
								});
							});

							tabel += `<tbody>
										<thead>
										<tr class="a">
											<th rowspan="2" class="cal-viewmonth" id="changemonth" style="background-color : #d9d9d9; height: 123px">
												<select class="form-control select2matapalajaran" id="mata_pelajaran"  name="mata_pelajaran" required></select>
											</th>`;
							dataStart = 0;
							result.data.header.forEach(function(list) {
								tabel += '<td class="ui-droppable reloadlistjadwal" \
											style="background-color: ' + colorTabelfooter[dataStart] + ' !important;" \
											data-date="2000-01-01" \
											data-userid="' + list.id_kelompok + '" \
											id="' + list.id_kelompok + '_' + list.nama_kelompok.replaceAll(' ', '_') + '" \
											data-kelompoktaruna="' + list.id_kelompok + '" \
											data-unit="' + list.id_kelompok + '"></td>';
								dataStart++;
							});
							tabel += `</tr></thead></table>`;

							$('#data_tabel_jadwal').html(tabel);
							select2();

							var _verif = [];
							var verif = 1;
							result.data.content.forEach(function(content) {
								var isikontent = '';
								_verif.push(content.is_verif);

								if (content.is_verif == 0) {
									verif = 0;
								}

								if (content.kunci == 1) {
									isikontent += '<div class="details ui-draggable ui-draggable-handle" \
														data-taskid="' + content.tanggal + '_' + content.id_jam_pertemuan + '_' + content.id_kelompok_taruna + '"\
														data-userid="' + content.id_jam_pertemuan + '" \
														data-satuanjenis="' + content.satuan + '" \
														data-idjadwal="' + content.id_jadwal + '" \
														data-idbahanajar="' + content.id_bahan_ajar + '" \
														data-iduserpendidik="' + content.id_user_pendidik + '" \
														style="border-left: 5px solid ' + colorr[content.id_kelompok_taruna] + '; position: relative;">';

								} else {
									isikontent += '<div class="drag details ui-draggable ui-draggable-handle" \
														data-taskid="' + content.tanggal + '_' + content.id_jam_pertemuan + '_' + content.id_kelompok_taruna + '"\
														data-userid="' + content.id_jam_pertemuan + '" \
														data-satuanjenis="' + content.satuan + '" \
														data-idjadwal="' + content.id_jadwal + '" \
														data-idbahanajar="' + content.id_bahan_ajar + '" \
														data-iduserpendidik="' + content.id_user_pendidik + '" \
														data-idmatapelajaran="' + content.id_mata_pelajaran + '" \
														style="border-left: 5px solid ' + colorr[content.id_kelompok_taruna] + '; position: relative;">';
								}

								isikontent += '\
												<h3 class="details-task" style=" background: ' + colorr[content.id_kelompok_taruna] + '; color: #FFFFFF; overflow: hidden; white-space: nowrap; text-overflow: ellipsis; max-width: 142px;">' + content.kode_mk + ' - ' + content.mata_pelajaran + '</h3>\
												<div class="details-uren row"  >\
													<div class="col-5" align="left" style="padding-left: 0; padding-right: 0;">';

								if (content.id_jenis_ujian == '1') {
									isikontent += "UTS";

								} else if (content.id_jenis_ujian == '2') {
									isikontent += "UAS";

								} else if (content.id_jenis_ujian == '0') {
									isikontent += content.jumlah_pertemuan + '-' + content.pertemuan_ke + ' = ' + content.sisa_pertemuan;
								}

								isikontent += '</div>\
													<div class="col-7" align="right" style="padding-left: 5px; padding-right: 0; overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 120px;">' + content.nama_pendidik + '</div>\
													</div>\
												</div>';


								// asdasdasdads
								$('#' + content.tanggal + '_' + content.id_jam_pertemuan + '_' + content.id_kelompok_taruna).html(isikontent);

								if (content.satuan == 'hari') {
									var namakelompoktaruna = $('#' + content.tanggal + '_' + content.id_jam_pertemuan + '_' + content.id_kelompok_taruna).data('namakelompoktaruna');
									var newDate = $('#' + content.tanggal + '_' + content.id_jam_pertemuan + '_' + content.id_kelompok_taruna).data('date');
									document.querySelectorAll("tr [data-namakelompoktaruna='" + namakelompoktaruna + "'][data-date='" + newDate + "'] ").forEach(
										function(el) {
											if (el.children.item(0) != null) {
												satuhari = el;
											}
											el.remove();
										}
									);
									$("tr [data-unitpertemuan='2'][data-dateheaderr='" + newDate + "']").parent().append(satuhari);
									$("tr [data-namakelompoktaruna='" + namakelompoktaruna + "'][data-date='" + newDate + "'] ").attr({
										rowspan: '6',
										'data-jammulai': '07:15',
										'data-jamselesai': '17:15',
										'data-unit': '2'
									});

									$("tr [data-namakelompoktaruna='" + namakelompoktaruna + "'][data-date='" + newDate + "'] div.details ").addClass('height1day');
								}
							});

							result.data.header.forEach(function(list) {
								if (list.id_ruangan.length != 0) {
									$('#' + list.nama_kelompok.replaceAll(' ', '_')).select2('trigger', 'select', {
										data: {
											id: list.id_ruangan,
											text: list.nama_ruangan
										}
									});
								}
							})

							dragable();

							if (verif == 0) {
								$('#_verif').html("Belum di verifikasi");
								$('#_buttonverif').html('<button class="btn btn-sm btn-outline-success verif" \
															data-id_batalyon="' + $('#id_batalyon').val() + '" \
															data-tanggal="' + $('#tanggal').val() + '" title="Verif">\
															<i class="fa fa-check"></i>\
														</button>');

							} else {
								if (result.data.content.length == 0) {
									$('#_verif').html("Belum di verifikasi");
									$('#_buttonverif').html('<button class="btn btn-sm btn-outline-success verif" \
																data-id_batalyon="' + $('#id_batalyon').val() + '" \
																data-tanggal="' + $('#tanggal').val() + '" title="Verif">\
																<i class="fa fa-check"></i>\
															</button>');
								} else {
									$('#_verif').html("Sudah di verifikasi");
									$('#_buttonverif').html('');
								}
							}
							$('#_batalyon').html($('#id_batalyon').select2('data')[0]['text']);
							$('#_periode').html(result.data.body[0]['tglindo'] + " sd " + result.data.body[result.data.body.length - 1]['tglindo']);
							$('#card_table_jadwal').show();

						}

					} else {
						Swal.fire('Error', result.message, 'error');
					}
				},
				error: function() {
					Swal.close();
					Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
				}
			});
		}).on('click', '.verif', function(e) {
			let $this = $(this);
			Swal.fire({
				title: "Verifikasi data ?",
				icon: "info",
				html: 'Yakin ingin memverifikasi data ini ?',
				showCancelButton: true,
				confirmButtonText: "Verif",
				confirmButtonColor: '#d33',
				cancelButtonText: "Batal",
				reverseButtons: true
			}).then(function(result) {
				if (result.value) {
					$.ajax({
						url: url + "_otorisasi",
						type: 'post',
						data: {
							id: $this.attr('data-id'),
							id_batalyon: $this.attr('data-id_batalyon'),
							tanggal: $this.attr('data-tanggal'),
							"<?= csrf_token() ?>": "<?= csrf_hash() ?>"
						},
						dataType: 'json',
						success: function(result) {
							Swal.close();
							if (result.success) {
								$('#_verif').html("Sudah di verifikasi");
								$('#_buttonverif').html('');
								Swal.fire('Sukses', 'Berhasil memverifikasi data paket mata kuliah', 'success');
								// table.ajax.reload();
								// coreEvents.table.ajax.reload();
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
		});

		select2Init("#id_batalyon", "/batalyon_select_get", null, function(data) {
			return data.text;
		}, function(data) {
			if (data.id === '') {
				return "Cari Batalyon";
			}
			return data.text;
		});

		select2Init("#id_user_pendidik", "/pendidik_batalandmapel_select_get", {
			id_mata_pelajaran: function() {
				return $('#taskid_mata_pelajaran').val();
			},
			id_batalyon: function() {
				return $('#taskid_batalyon').val();
			}
		}, function(data) {
			return data.text;
		}, function(data) {
			if (data.id === '') {
				return "Cari Pendidik";
			}

			return data.text;
		});
		$('#is_ujian').select2();

		$(document).on('click', '.opt-edit', function() {

			var idjadwal = $(this).parent().parent().data('idjadwal');
			var idmatapelajaran = $(this).parent().parent().data('idmatapelajaran');
			var id_batalyon = $('#id_batalyon').val();
			var id_pendidik = $(this).parent().parent().attr('data-iduserpendidik');
			var taskid = $(this).parent().parent().data('taskid');
			var nama_pendidik = $(this).parent().parent().find('.col-7').html();

			$('#taskid_jadwal').val(idjadwal);
			$('#taskid_mata_pelajaran').val(idmatapelajaran);
			$('#taskid_batalyon').val(id_batalyon);
			$('#taskid').val(taskid);
			$('#taskmatapelajaran').val($(this).parent().parent().find('h3').html());
			$('#id_user_pendidik').select2('trigger', 'select', {
				data: {
					id: id_pendidik,
					text: nama_pendidik
				}
			});
			$('#edittask').modal('show');

		});
		$(document).on('submit', '#updategadik', function(e) {
			e.preventDefault();
			// e.stopPropagation();
			// alert('asd');
			var taskid = $('#taskid').val();
			var id_jadwal = $('#taskid_jadwal').val();
			var id_user_pendidik = $('#id_user_pendidik').val();
			var nama_user_pendidik = $('#id_user_pendidik').select2('data')[0]['text'];
			// updatependidik(id_jadwal, id_user_pendidik, taskid , nama_user_pendidik);

			$.ajax({
				url: url_insert,
				type: 'post',
				data: {
					id: id_jadwal,
					id_user_pendidik: id_user_pendidik,
					"<?= csrf_token() ?>": "<?= csrf_hash() ?>"
				},
				dataType: 'json',
				success: function(result) {
					if (result.success) {
						toastr.success('Berhasil Mengganti Pengajar');

						$("div [data-taskid='" + taskid + "']").attr('data-iduserpendidik', id_user_pendidik);
						$("div [data-taskid='" + taskid + "']").find('.col-7').html(nama_user_pendidik);

						$('#edittask').modal('hide');
					} else {
						toastr.success('Gagal Mengganti Pengajar')
					}
				},
				error: function() {
					Swal.close();
					Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
				}
			});
		});

		// Modal remove task ?
		//dng
		$(document).on('click', '.opt-trash', function() {
			var idjadwal = $(this).parent().parent().data('idjadwal');
			var kode_mk = $(this).parent().parent().find('h3').html();
			var taskid = $(this).parent().parent().data('taskid');

			$('#taskdelid').val(taskid);
			$('#id_jadwal').val(idjadwal);
			$('#modal-delete').html('Apa anda yakin ingin menghapus jadwal ini <b>' + kode_mk + '</b>?');
			$('#deletetask').modal('show');

		});

		// Remove task after conformation
		$(document).on('click', '#confdelete', function() {

			var taskid = $('#taskdelid').val();
			var id_jadwal = $('#id_jadwal').val();
			$.ajax({
				url: url_delete,
				type: 'post',
				data: {
					id: id_jadwal,
					"<?= csrf_token() ?>": "<?= csrf_hash() ?>"
				},
				dataType: 'json',
				success: function(result) {
					// console.log(result);
					Swal.close();
					if (result.success) {
						$("div").find('[data-taskid=' + taskid + ']').remove();
						$('#deletetask').modal('hide');
						select2matkul();
					} else {
						Swal.fire('Error', result.message, 'error');
					}
				},
				error: function() {
					Swal.close();
					Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
				}
			});

		});
	});


	function dragable() {
		// Drag tasks around
		$(".drag").draggable({
			revert: "invalid",
			start: function(e, ui) {
				// Date from where task was dragged from
				$(this).data("oldDate", $(this).parent().data("date"));
				$(this).data("oldKelompoktaruna", $(this).parent().data("kelompoktaruna"));
			}
		});

		// Select drop area for Tasks (only droppable on TD which have "data-date" attribute)
		$("td[data-date]").droppable({
			drop: function(e, ui) {
				var drag = ui.draggable,
					drop = $(this),
					oldDate = drag.data("oldDate"), // Task date on drag
					newDate = drop.data("date"), // Task date on drop 

					dragID = drag.data("userid"), // Task userid on drag
					dropID = drop.data("unit"), // Task userid on drop

					oldkelompokID = drag.data("oldKelompoktaruna"), // Task date on drag
					kelompokID = drop.data("kelompoktaruna"),

					namakelompoktaruna = drop.data("namakelompoktaruna"), // Task userid on drop
					jammulai = drop.data("jammulai"),
					jamselesai = drop.data("jamselesai"),

					idjadwal = drag.last().attr("data-idjadwal"),
					idbahanajar = drag.data("idbahanajar"),
					iduserpendidik = drag.data("iduserpendidik"),
					taskid = drag.data("taskid"),
					satuanjenis = drag.data("satuanjenis"),
					tdold = drag.parent().data();

				// console.log(drag.parent().data());



				idruangkelas = $('#' + namakelompoktaruna).val();

				if (oldkelompokID != kelompokID && $('#' + namakelompoktaruna).val() == null || oldkelompokID != kelompokID && $('#' + namakelompoktaruna).val() == $('#' + namakelompoktaruna).val()) {

					// alert('maaf beda Kelompok');

					// toastr.warning('Maaf Kelompok Berbeda');
					toastr.warning('Maaf Kelompok Berbeda')
					return $(drag).css({
						top: 0,
						left: 0
					});

				} else if (oldkelompokID == kelompokID && $('#' + namakelompoktaruna).val() == null) {

					// alert('Mohon Pilih Ruangan');
					toastr.warning('Mohon Pilih Ruangan')

					return $(drag).css({
						top: 0,
						left: 0
					}); // Return task to old position

				} else {

					if ((oldDate != newDate || dragID != dropID) && oldkelompokID == kelompokID) {

						if ($(this).html() == '') {
							$(drag).detach().css({
								top: 0,
								left: 0
							}).appendTo(drop);
							$(drag).data("userid", dropID); // Update task userid
							var satuhari;
							if (satuanjenis == 'hari') {
								var satusks;
								// for (let i = 1; i <= 6; i++) {
								//     if (i==4) {

								//       satusks += '<td class="weekend ui-userinfo" data-date="'+tdold['date']+'" data-namakelompoktaruna="'+tdold['namakelompoktaruna']+'" style="height : 45px; text-align: center; padding: 11px !important; background : #d9d9d9" >Isoma</td>';

								//     } else {

								//       satusks += '<td class="ui-droppable"  !important;" data-date="'+tdold['date']+'" data-unit="'+tdold['unit']+'" data-kelompoktaruna="'+tdold['kelompoktaruna']+'"\
								//         data-namakelompoktaruna="'+tdold['namakelompoktaruna']+'" id='+tdold['namakelompoktaruna']+'_'+tdold['unit']+'_'+tdold['kelompoktaruna']+'\
								//         data-jammulai=""\
								//         data-jamselesai=""></td>';
								//     }

								// }
								//     console.log(satusks);

								document.querySelectorAll("tr [data-namakelompoktaruna='" + namakelompoktaruna + "'][data-date='" + newDate + "'] ").forEach(
									function(el) {
										if (el.children.item(0) == null) {} else {
											satuhari = el;
										}
										el.remove();
									}
								);
								$("tr [data-unitpertemuan='2'][data-dateheaderr='" + newDate + "']").parent().append(satuhari);
								$("tr [data-namakelompoktaruna='" + namakelompoktaruna + "'][data-date='" + newDate + "'] ").attr({
									rowspan: '6',
									'data-jammulai': '07:15',
									'data-jamselesai': '17:15',
									'data-unit': '2'
								});
								$("tr [data-namakelompoktaruna='" + namakelompoktaruna + "'][data-date='" + newDate + "'] div.details ").attr('class', 'details height1day');
								jammulai = '07:15';
								jamselesai = '17:15';
								dropID = '2';

							}
							savejadwal(idjadwal, idbahanajar, iduserpendidik, newDate, dropID, kelompokID, idruangkelas, jamselesai, jammulai, taskid);
						} else {

							// alert('Maaf Kelas Sudah Terisi');
							toastr.warning('Maaf Kelas Sudah Terisi')

							return $(drag).css({
								top: 0,
								left: 0
							}); // Return task to old position
						}

					} else {

						return $(drag).css({
							top: 0,
							left: 0
						}); // Return task to old position
					}
				}



			}
		});

		// show EDIT and TRASH tools
		$(".drag").hover(
			function() {
				var isAdmin = 1; // Ability to hide or show edit and delete options
				if (isAdmin == 1) {
					$(this)
						.css('z-index', '999')
						// .prepend('<div class="opt-tools"><div class="opt-trash"><i class="fas fa-trash"></i></div></div>');
						.prepend('<div class="opt-tools"><div class="opt-edit"><i class="fas fa-pen"></i></div><div class="opt-trash"><i class="fas fa-trash"></i></div></div>');
				}
			},
			function() {
				//When mouse hovers out DIV remove tools
				$(this).css("z-index", "0").find(".opt-tools").remove();
			}
		);

		// Show modal to edit task

	}

	function changeColor(id, c) {
		if (id == 'ctxt') {
			$('#demotaak2').css('color', '#' + c);
		} else if (id == 'cbg') {
			$('#demotaak1').css('border-left-color', '#' + c);
			$('#demotaak2').css('background-color', '#' + c);
		}
		return false;
	}

	function select2Init(id, url, parameter, template, selection) {
		$(id).select2({
			id: function(e) {
				return e.id
			},
			placeholder: '',
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
			templateResult: template,
			templateSelection: selection,
			escapeMarkup: function(m) {
				return m;
			}
		});
	}

	function select2() {

		$('.select2kelas').select2({
			id: function(e) {
				return e.id
			},
			placeholder: '',
			multiple: false,
			ajax: {
				url: url_ajax + "/ruangkelas_select_get",
				dataType: 'json',
				quietMillis: 500,
				delay: 500,
				data: function(param) {
					var def_param = {
						keyword: param.term, //search term
						perpage: 5, // page size
						page: param.page || 0, // page number
					};

					return Object.assign({}, def_param, null);
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
					return "Cari Ruang Kelas";
				}

				return data.text;
			},
			escapeMarkup: function(m) {
				return m;
			}
		});

		//dng
		$('.select2matapalajaran').select2({
			id: function(e) {
				return e.id
			},
			placeholder: '',
			multiple: false,
			ajax: {
				url: url_ajax + "/matapelajaran_select_get",
				dataType: 'json',
				quietMillis: 500,
				delay: 500,
				data: function(param) {
					var def_param = {
						'id_batalyon': $('#id_batalyon').val(), //search term
						keyword: param.term, //search term
						perpage: 5, // page size
						page: param.page || 0, // page number
					};

					return Object.assign({}, def_param, null);
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
				return '<div style="font-weight: bold;">' + data.kode_mk + '</div><div>' + data.mata_pelajaran + '</div>'
			},
			templateSelection: function(data) {
				if (data.id === '') {
					return "Cari mata Pelajaran";
				}

				return data.kode_mk;
			},
			escapeMarkup: function(m) {
				return m;
			}
		}).on('select2:select', function(e) {

			$.ajax({
				url: url_ajax + "/matapelajaran_list_get",
				type: 'post',
				data: {
					id_batalyon: $('#id_batalyon').val(),
					id_mata_pelajaran: $('#mata_pelajaran').val(),
					is_ujian: $('#is_ujian').val(),
					"<?= csrf_token() ?>": "<?= csrf_hash() ?>"
				},
				dataType: 'json',
				success: function(result) {
					Swal.close();
					if (result.success) {


						$('.reloadlistjadwal').html('');

						result.data.forEach(function(list) {
							var contenttd = '';

							var obj = JSON.parse(list.detail);
							var orderobj = obj.sort((a, b) => parseFloat(a.pertemuan_ke) - parseFloat(b.pertemuan_ke));

							var objlimit2 = orderobj.slice(0, 2);
							objlimit2.forEach(function(isi) {

								contenttd += '<div class="drag details ui-draggable ui-draggable-handle" \
													data-taskid="2000-01-01_' + list['id_kelompok'] + '_' + isi.id_bahan_ajar + '" \
													data-userid="' + isi.id_bahan_ajar + '" data-idjadwal="" \
													data-idbahanajar="' + isi.id_bahan_ajar + '" \
													data-iduserpendidik="' + isi.id_user_pendidik + '" \
													data-satuanjenis="' + isi.satuan + '" \
													data-idmatapelajaran="' + isi.id_mata_pelajaran + '" \
													style="border-left: 5px solid ' + colorr[list.id_kelompok] + '; position: relative;">\
												<h3 class="details-task" \
													style="background: ' + colorr[list.id_kelompok] + '; color: #FFFFFF; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;max-width: 142px;">' + isi.kode_mk + ' - ' + isi.mata_pelajaran + '</h3>\
												<div class="details-uren row">\
													<div class="col-5" align="left" style="padding-left: 0; padding-right: 0;">';
								// if (isi.is_ujian=='1') {
								if (isi.id_jenis_ujian == '1') {
									contenttd += "UTS";
								} else if (isi.id_jenis_ujian == '2') {
									contenttd += "UAS";
								} else if (isi.id_jenis_ujian == '0') {
									contenttd += isi.jumlah_pertemuan + '-' + isi.pertemuan_ke + ' = ' + isi.sisa_pertemuan;
								}

								// } else {
								//    contenttd += isi.jumlah_pertemuan+'-'+isi.pertemuan_ke+' = '+isi.sisa_pertemuan;
								// }

								//dng hasil lemparan data sel2 
								contenttd += '</div>\
													<div class="col-7" align="right" style="padding-left: 5px; padding-right: 0; overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 120px;">' + isi.nama_pendidik + '</div>\
												</div>\
											</div>';
								// var_dump(contenttd);
							});

							//dng show data hasil lemparan
							$('#' + list['id_kelompok'] + '_' + list['kelompok'].replaceAll(' ', '_')).html(contenttd);

						});
						dragable();
					} else {
						Swal.fire('Error', result.message, 'error');
					}
				},
				error: function() {
					Swal.close();
					Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
				}
			});

		});
	}

	function select2matkul() {
		$.ajax({
			url: url_ajax + "/matapelajaran_list_get",
			type: 'post',
			data: {
				id_batalyon: $('#id_batalyon').val(),
				id_mata_pelajaran: $('#mata_pelajaran').val(),
				is_ujian: $('#is_ujian').val(),
				"<?= csrf_token() ?>": "<?= csrf_hash() ?>"
			},
			dataType: 'json',
			success: function(result) {
				Swal.close();
				if (result.success) {


					$('.reloadlistjadwal').html('');

					result.data.forEach(function(list) {
						var contenttd = '';

						var obj = JSON.parse(list.detail);
						var orderobj = obj.sort((a, b) => parseFloat(a.pertemuan_ke) - parseFloat(b.pertemuan_ke));

						var objlimit2 = orderobj.slice(0, 2);
						objlimit2.forEach(function(isi) {

							contenttd += '<div class="drag details ui-draggable ui-draggable-handle" \
													data-taskid="2000-01-01_' + list['id_kelompok'] + '_' + isi.id_bahan_ajar + '" \
													data-userid="' + isi.id_bahan_ajar + '" data-idjadwal="" \
													data-idbahanajar="' + isi.id_bahan_ajar + '" \
													data-iduserpendidik="' + isi.id_user_pendidik + '" \
													data-satuanjenis="' + isi.satuan + '" \
													data-idmatapelajaran="' + isi.id_mata_pelajaran + '" \
													style="border-left: 5px solid ' + colorr[list.id_kelompok] + '; position: relative;">\
												<h3 class="details-task" \
													style="background: ' + colorr[list.id_kelompok] + '; color: #FFFFFF; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;max-width: 142px;">' + isi.kode_mk + ' - ' + isi.mata_pelajaran + '</h3>\
												<div class="details-uren row">\
													<div class="col-5" align="left" style="padding-left: 0; padding-right: 0;">';
							// if (isi.is_ujian=='1') {
							if (isi.id_jenis_ujian == '1') {
								contenttd += "UTS";
							} else if (isi.id_jenis_ujian == '2') {
								contenttd += "UAS";
							} else if (isi.id_jenis_ujian == '0') {
								contenttd += isi.jumlah_pertemuan + '-' + isi.pertemuan_ke + ' = ' + isi.sisa_pertemuan;
							}

							// } else {
							//    contenttd += isi.jumlah_pertemuan+'-'+isi.pertemuan_ke+' = '+isi.sisa_pertemuan;
							// }

							//dng hasil lemparan data sel2 
							contenttd += '</div>\
													<div class="col-7" align="right" style="padding-left: 5px; padding-right: 0; overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 120px;">' + isi.nama_pendidik + '</div>\
												</div>\
											</div>';
							// var_dump(contenttd);
						});

						//dng show data hasil lemparan
						$('#' + list['id_kelompok'] + '_' + list['kelompok'].replaceAll(' ', '_')).html(contenttd);

					});
					dragable();
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

	function savejadwal(idjadwal, idbahanajar, iduserpendidik, tanggal, idjampertemuan, idkelompoktaruna, idruangkelas, jamselesai, jammulai, taskid) {

		$.ajax({
			url: url_insert,
			type: 'post',
			data: {
				id: idjadwal,
				id_bahan_ajar: idbahanajar,
				id_user_pendidik: iduserpendidik,
				tanggal: tanggal,
				id_jam_pertemuan: idjampertemuan,
				id_kelompok_taruna: idkelompoktaruna,
				id_ruang_kelas: idruangkelas,
				jam_selesai: jamselesai,
				jam_mulai: jammulai,
				id_batalyon: $('#id_batalyon').val(),
				is_verif: '0',
				"<?= csrf_token() ?>": "<?= csrf_hash() ?>"
			},
			dataType: 'json',
			success: function(result) {
				if (result.success) {
					toastr.success('Berhasil Menyimpan Jadwal');
					$('#_verif').html("Belum di verifikasi");
					$('#_buttonverif').html('<button class="btn btn-sm btn-outline-success verif" \
												data-id_batalyon="' + $('#id_batalyon').val() + '" \
												data-tanggal="' + $('#tanggal').val() + '" title="Verif">\
													<i class="fa fa-check"></i>\
											</button>');

					if (idjadwal == '') {
						// console.log($("div [data-taskid='"+taskid+"']").parent().html());
						$("div [data-taskid='" + taskid + "']").attr('data-idjadwal', result.message);
					}
					select2matkul();
				} else {
					toastr.success('Gagal Menyimpan Jadwal')
				}
			},
			error: function() {
				Swal.close();
				Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
			}
		});
	}

	function updatependidik(idjadwal, iduserpendidik, taskid, nama_user_pendidik) {
		$.ajax({
			url: url_insert,
			type: 'post',
			data: {
				id: idjadwal,
				id_user_pendidik: iduserpendidik,
				"<?= csrf_token() ?>": "<?= csrf_hash() ?>"
			},
			dataType: 'json',
			success: function(result) {
				if (result.success) {
					toastr.success('Berhasil Mengganti Pfengajar');
					$("div [data-taskid='" + taskid + "']").attr('data-iduserpendidik', iduserpendidik);
					$("div [data-taskid='" + taskid + "']").find('.col-7').html(nama_user_pendidik);
					$('#edittask').modal('hide');
				} else {
					toastr.success('Gagal Mengganti Pengajar')
				}
			},
			error: function() {
				Swal.close();
				Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
			}
		});
	}
</script>