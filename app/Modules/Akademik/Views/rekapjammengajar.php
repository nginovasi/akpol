<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<div>
	<div class="page-hero page-container " id="page-hero">
		<div class="padding d-flex">
			<div class="page-title">
				<h2 class="text-md text-highlight"><?= $page_title ?></h2>
			</div>
			<div class="flex"></div>
		</div>
	</div>
	<div class="page-content page-container" id="page-content">
		<div class="card">
			<div class="card-body">
				<div class="padding">
					<div class="tab-content">
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="id_pendidik">Pendidik</label>

									<?php
									if ($rules->type_code == 'gdk') { ?>
										<input type="hidden" class="form-control" name="id_pendidik" value="<?= $_SESSION['id'] ?>">
										<input type="text" class="form-control" value="<?= $_SESSION['name'] ?>" readonly>
									<?php } else { ?>
										<select class="form-control" id="id_pendidik" name="id_pendidik" required>
										</select>

									<?php }
									?>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="tanggal">Periode</label>
									<input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" autocomplete="off">
								</div>
							</div>
						</div>
						<br>
						<div style="text-align: center; font-size: 1rem; display: none" id="header_pendidik">
						</div>
						<div style="text-align: center; font-size: 1rem; display: none" id="header_periode">
						</div>
						<div class="table-responsive">
							<table id="datatable" class="table table-theme table-row v-middle">
								<thead>
									<tr>
										<th><span>#</span></th>
										<th><span>Tanggal</span></th>
										<th><span>Kelas</span></th>
										<th><span>Kelompok</span></th>
										<th><span>Mata Pelajaran</span></th>
										<th><span>Bahan Ajar</span></th>
										<th><span>Pertemuan Ke</span></th>
										<th><span>Kehadiran</span></th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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

	var dataStart = 0;
	var table;

	var typecode = '<?= $rules->type_code ?>';

	$(document).ready(function() {


		$('input[name="tanggal"]').daterangepicker({
			autoUpdateInput: false,
			locale: {
				cancelLabel: 'Clear'
			},
			"autoApply": true,
		}).on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
			if ($('[name="id_pendidik"]').val() != null) {
				tampildata($('[name="id_pendidik"]').val(), $('#tanggal').val());
			}
		});

		$(document).on('change', '[name="id_pendidik"]', function() {
			tampildata($('[name="id_pendidik"]').val(), $('#tanggal').val());
		});

		select2Init("#id_pendidik", "/pendidik_select_get", null, function(data) {
			return data.text;
		}, function(data) {
			if (data.id === '') {
				return "Cari Pendidik";
			}

			return data.text;
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
				data: "tanggal",
				orderable: true,
				render: function(a, type, data, index) {
					let button = ""

					button += '<div>' + data.tanggal + '</div><div class="small">' + data.jam_mulai + '-' + data.jam_selesai + '</div>';


					button += (button == "") ? "<b>Tidak ada aksi</b>" : ""

					return button;
				}
			},
			{
				data: "kelompok",
				orderable: true
			},
			{
				data: "nama",
				orderable: true
			},
			{
				data: "mata_pelajaran",
				orderable: true
			},
			{
				data: "judul",
				orderable: true
			},
			{
				data: "pertemuan_ke",
				orderable: true
			},
			{
				data: "is_absensi",
				orderable: true
			},
		];

		return columns;
	}

	function select2Init(id, url, parameter, template, selection) {
		$(id).select2({
			id: function(e) {
				return e.id
			},
			placeholder: '',
			allowClear: true,
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

	function tampildata(pendidik, tanggal) {
		$('#datatable').dataTable().fnDestroy();
		table = $('#datatable').DataTable({
			// "dom": "<'row'<'col-sm-4'l><'col-sm-2'B><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p<br/>i>>",
			"dom": "<'row'<'col-sm-6'B><'col-sm-6 clear'>>" + "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p<br/>i>>",
			// "buttons": ['excelFlash', 'excel', 'pdf'],
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
				"data": function(data) {
					console.log(data);
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
						"pendidik": pendidik,
						"tanggal": tanggal,
						"<?= csrf_token() ?>": "<?= csrf_hash() ?>"
					};

					$.extend(form, info);

					return form;
				},
				"complete": function(response) {
					console.log(response);
					feather.replace();
					$('#header_pendidik').show();
					if (typecode == 'gdk') {
						$('#header_pendidik').html('REKAP JAM MENGAJAR <br> <?= $_SESSION['name'] ?> ');
						if (tanggal != '') {
							$('#header_periode').show();
							$('#header_periode').html('PERIODE ' + tanggal);
						}

					} else {

						$('#header_pendidik').html('Rekap Jam Mengajar <br> ' + $('#id_pendidik').select2('data')[0]['text']);
						if (tanggal != '') {
							$('#header_periode').show();
							$('#header_periode').html('PERIODE ' + tanggal);
						}
					}

				}
			},
			"columns": datatableColumn()
		}).on('init.dt', function() {
			$(this).css('width', '100%');
		});
	}
</script>