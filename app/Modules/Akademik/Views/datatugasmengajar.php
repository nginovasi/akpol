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
        background-color: #ffffff;
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
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills no-border" id="tab">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-data" role="tab" aria-controls="tab-data" aria-selected="false">Data</a>
                    </li>
                    <?php if ($rules->i == 1) { ?>
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
                                            <th><span>Judul</span></th>
                                            <th><span>Mata Pelajaran</span></th>
                                            <th><span>Kelompok</span></th>
                                            <th><span>Deadline</span></th>
                                            <th class="column-2action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                            <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="id_jadwal">Jadwal</label>
                                            <select class="form-control sel2" id="id_jadwal" name="id_jadwal" required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="deskripsi">Jenis Tugas</label>
                                            <select class="form-control sel2" id="tipe_tugas" name="tipe_tugas" required>
                                                <option></option>
                                                <option value="0">Dikumpulkan di Kelas</option>
                                                <option value="1">Upload Tugas</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="judul">Judul</label>
                                            <input type="text" class="form-control" id="judul" name="judul" required placeholder="Judul Tugas">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="deskripsi">Deskripsi</label>
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="deskripsi">File Tugas</label>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="jenisfile" id="upload-radio" value="1" checked="">
                                                            <label class="form-check-label" for="upload-radio">
                                                                Upload File
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="jenisfile" id="link-radio" value="2">
                                                            <label class="form-check-label" for="link-radio">
                                                                Sematkan Link
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="custom-file" id="upload-input">
                                                <input type="file" class="custom-file-input" id="file_materi_tugas" name="file_materi_tugas">
                                                <label class="custom-file-label" for="file_materi_tugas">Pilih file</label>
                                            </div>
                                            <input type="text" class="form-control" id="link-input" name="link_materi_tugas" placeholder="Link File Tugas" style="display:none">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="waktu_pengumpulan">Waktu Pengumpulan</label>
                                            <input type="datetime-local" class="form-control" id="waktu_pengumpulannya" name="waktu_pengumpulan" value="<?= date("Y-m-d") . "T" . date("h:i:s") ?>">
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

        <div class="collapse" id="tugas_accordion">
            <div class="card card-body">
                <div class="px-2">
                    <div class="py-3">
                        <div>
                            <small class="text-muted">Judul Tugas</small>
                            <div class="my-2" id="view_judul">1243 0303 0333</div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <small class="text-muted">Mata Pelajaran</small>
                                <div class="my-2" id="view_mata_pelajaran">Coch Jose</div>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Deadline</small>
                                <div class="my-2" id="view_waktu_pengumpulan">James Richo</div>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">Lampiran File Tugas</small>
                            <div class="my-2">
                                <a id="view_file_materi_tugas" href="#" class="btn btn-sm btn-outline-primary" target="_blank">Lihat Lampiran</a>
                            </div>
                        </div>
                        <div class="mb-2">
                            <small class="text-muted">Deskripsi</small>
                            <div class="my-2" id="view_deskripsi">Ut maecenas sed purus ultrices sed sapien massa quam eu sed odio id dui, sed sed lectus amet cursus sed habitant est morbi adipiscing nam consectetur nullam urna, proin condimentum ut laoreet congue
                                felis, diam pulvinar aliquam libero non tortor turpis aliquet massa eu etiam eget quisque egestas tristique tempus purus blandit nunc volutpat aliquam amet, aliquet nec et sed</div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-4">
                    <h5 class="card-title">Input Nilai Tugas Per Taruna</h5>
                    <div class="page-content page-container" id="page-content">
                        <form id="absensi-form">
                            <div class="padding">
                                <?= csrf_field(); ?>
                                <!-- <pre  class="console">Click "Load" to load data from server</pre> -->
                                <div class="alert alert-info" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12" y2="8"></line>
                                    </svg>
                                    <span class="mx-2" id="example1console">Kolom nilai dapat diubah dan disimpans secara otomatis</span>
                                </div>
                                <div class="filterHeader"><input id="namataruna-search"></div>
                                <div class="filterHeader"><input id="noak-search"></div>
                                <div class="filterHeader"><input id="kelompok-search"></div>
                                <div id="list-container">
                                </div>
                                <!-- <div class="text-right mt-4">
                                        <button class="btn btn-primary" type="submit">Submit Kehadiran</button>
                                    </div> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css" />
<script type="text/javascript">
    const auth_insert = '<?= $rules->i ?>';
    const auth_edit = '<?= $rules->e ?>';
    const auth_delete = '<?= $rules->d ?>';
    const auth_otorisasi = '<?= $rules->o ?>';

    const url = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) ?>';
    const url_insert = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_save" ?>';
    const url_edit = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_edit" ?>';
    const url_delete = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_delete" ?>';
    const url_load = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_load" ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';

    var dataStart = 0;
    var coreEvents;
    var hot;

    const select2Array = [{
        id: 'id_jadwal',
        url: '/datajadwal_select_get',
        placeholder: 'Pilih Jadwal',
        params: null
    }];

    $(document).ready(function() {
        // coreEvents = new CoreEvents();
        // coreEvents.url = url;
        // coreEvents.ajax = url_ajax;
        // coreEvents.csrf = {
        //     "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
        // };
        // coreEvents.tableColumn = datatableColumn();

        // coreEvents.insertHandler = {
        //     placeholder: 'Berhasil menyimpan data tugas mengajar',
        //     afterAction: function(result) {
        //         $(".sel2").val('').trigger('change');
        //     }
        // }

        // coreEvents.editHandler = {
        //     placeholder: '',
        //     afterAction: function(result) {
        //         console.log(result.data);
        //         setTimeout(function() {
        //             select2Array.forEach(function(x) {
        //                 $('#' + x.id).select2('trigger', 'select', {
        //                     data: {
        //                         id: result.data[x.id],
        //                         text: result.data[x.id.replace('id', 'nama')]
        //                     }
        //                 });
        //             });
        //         }, 500);
        //     }
        // }

        // coreEvents.deleteHandler = {
        //     placeholder: 'Berhasil menghapus data tugas mengajar',
        //     afterAction: function() {
        //         $('.custom-file-label').html('Pilih File');
        //     }
        // }

        // coreEvents.resetHandler = {
        //     action: function() {

        //     }
        // }

        // coreEvents.load();

        $('input[type=radio][name=jenisfile]').change(function() {
            if ($('#upload-radio').is(':checked')) {
                $('#upload-input').show();
                $('#link-input').hide();
            } else if ($('#link-radio').is(':checked')) {
                $('#upload-input').hide();
                $('#link-input').show();
            }
        });

        select2Array.forEach(function(x) {
            select2Init('#' + x.id, x.url, x.placeholder, x.params);
        });

        $("#tipe_tugas").select2({
            placeholder: 'Pilih Tipe Tugas'
        });

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
                                Swal.fire('Sukses', 'Berhasil menyimpan data tugas mengajar', 'success');
                                $('#form').trigger("reset");
                                table.ajax.reload();
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
        }).on('reset', '#form', function() {
            $('#id').val('');
            $('.custom-file-label').html('Pilih File');
            $(".sel2").val(null).trigger('change');
            $('#upload-input').show();
            $('#link-input').hide();
        }).on('change', '.custom-file-input', function() {
            let $this = $(this)[0];
            $('.custom-file-label').html($this.files[0].name);
            if ($this.files[0].size > 3138576) {
                Swal.fire('Error', 'File teralu besar, maksimal besar file adalah 3mb', 'error');
                $this.value = "";
                $('.custom-file-label').html('Pilih File');
            };
        }).on('click', '.edit', function() {
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
                        for (key in result.data) {
                            if (key !== 'file_materi_tugas') {
                                $('#' + key).val(result.data[key]);
                            }
                        }

                        if (result.data['jenis_file_materi_tugas'] === '1') {
                            $('#upload-radio').prop('checked', true).trigger('change');
                            $('.custom-file-label').html(result.data.file_materi_tugas);
                        } else {
                            $('#link-radio').prop('checked', true).trigger('change');
                            $('#link-input').val(result.data['file_materi_tugas']);
                        }

                        $('ul#tab li a').eq(1).trigger('click');

                        setTimeout(function() {

                            $('#tipe_tugas').select2('trigger', 'select', {
                                data: {
                                    id: result.data.tipe_tugas
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
        }).on('click', '.delete', function() {
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
                if (result.value) {
                    $.ajax({
                        url: url_delete,
                        type: 'post',
                        data: {
                            id: $this.data('id'),
                            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                        },
                        dataType: 'json',
                        success: function(result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil menghapus data pendidik', 'success');
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
            })
        }).on('click', '.detail', function() {
            let $this = $(this);
            let dir = $this.data('dir');
            let url = dir.includes('http://devel.nginovasi.id/akpol-api/') ? dir : 'http://devel.nginovasi.id/akpol-api/' + dir;
            window.open(dir, '_blank').focus();
        }).on('click', '.show-detail', function(event) {
            event.stopPropagation();
            $("#tugas_accordion").hide('collapse');

            let $this = $(this);
            var detail;
            if ($this.data('detail') !== undefined) {

                detail = JSON.parse($this.data('detail').replaceAll("'", '"'));
                var is_ketua_tim = detail.is_ketua_tim ? parseInt(detail.is_ketua_tim) : 0;

                for (key in detail) {
                    if (key === 'file_materi_tugas') {

                        $('#view_' + key).attr("href", detail[key]);

                    } else {

                        $('#view_' + key).html(detail[key]);
                    }

                };
                var formData = new FormData();
                formData.append('id', detail.id);
                formData.append("<?= csrf_token() ?>", "<?= csrf_hash() ?>");
                $.ajax({
                    url: url_load + '_nilai',
                    method: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        if (result.success) {
                            if (result.data.length > 0) {
                                setTimeout(function() {
                                    loadTable(result, is_ketua_tim);
                                }, 500);

                            } else {
                                Swal.fire('Data Tidak Ditemukan', 'Data nilai belum tersedia untuk semester ini', 'warning');
                                $('#table-card').hide();
                            }
                        } else {
                            $('#table-card').hide();
                        }
                    },
                    error: function() {
                        Swal.close();
                        Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                    }
                });
            }
            setTimeout(function() {
                event.stopPropagation();
                $("#tugas_accordion").height('auto');
                $("#tugas_accordion").show('collapse');
            }, 1000);
        }).on('click', '.nav-item', function() {
            $("#tugas_accordion").hide();
        })

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
                        "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                    };

                    $.extend(form, info);

                    return form;
                },
                "complete": function(response) {
                    feather.replace();
                }
            },
            "columns": datatableColumn()
        }).on('init.dt', function() {
            $(this).css('width', '100%');
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
                data: "judul",
                orderable: true
            },
            {
                data: "mata_pelajaran",
                orderable: true
            },
            {
                data: "kelompok",
                orderable: true
            },

            {
                data: "waktu_pengumpulan",
                orderable: true
            },
            {
                data: "id",
                orderable: false,
                render: function(a, type, data, index) {
                    let button = ""

                    if (auth_edit == "1") {
                        button += '<button class="btn btn-sm btn-outline-info edit" data-id="' + data.id + '" title="Edit">\
                                    <i class="fa fa-edit"></i>\
                                </button>\
                                ';

                        // button += '<button class="btn text-align-auto btn-white" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">\
                        //             Button with data-target\
                        //         </button>\
                        //         ';

                        button += '<button class="btn btn-sm btn-outline-info show-detail" type="button" data-toggle="collapse" data-target="#tugas_accordion" data-id="' + data.id + '" data-detail="' + JSON.stringify(data).replaceAll('"', "'") + '" title="Tampilkan Tugas">\
                                    <i class="fa fa-eye"></i>\
                                </button>\
                                ';
                    }

                    // button += '<button class="btn btn-sm btn-outline-primary detail" data-id="' + data.id + '" data-dir="' + data.file_materi_tugas + '" title="Lihat File">\
                    //                 <i class="fa fa-eye"></i>\
                    //             </button>\
                    //             ';

                    if (auth_delete == "1") {
                        button += '<button class="btn btn-sm btn-outline-danger delete" data-id="' + data.id + '" title="Delete">\
                                        <i class="fa fa-trash-o"></i>\
                                    </button></div>';
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

    function loadTable(result, is_ketua_tim) {
        //processing data
        result.data.map((value) => {
            if (value.file_tugas) {
                value['link_file_tugas'] = "<a href='" + value.file_tugas + "' target='_BLANK'>Lihat File</a>"
            } else {
                value['link_file_tugas'] = "Belum mengumpulkan";
            }

        })

        if (hot !== undefined && !hot.isDestroyed) {
            hot.destroy();
        }
        $('#table-card').show();
        const container = document.querySelector('#list-container');
        const exampleConsole = document.querySelector('#example1console');
        let autosaveNotification;

        // Event for `keydown` event. Add condition after delay of 200 ms which is counted from the time of last pressed key.
        var debounceFn = Handsontable.helper.debounce(function(colIndex, event, input) {
            var filtersPlugin = hot.getPlugin('filters');
            var search = input.value;
            filtersPlugin.removeConditions(colIndex);
            filtersPlugin.addCondition(colIndex, 'contains', [event.target.value]);
            filtersPlugin.filter();
            input.value = search;
            input.focus();

        }, 200);

        const addEventListeners = (input, colIndex) => {
            input.addEventListener('keydown', event => {
                debounceFn(colIndex, event, input);
            });
        };

        // Build elements which will be displayed in header.
        const getInitializedElements = (colIndex, id) => {
            var input = document.getElementById(id);
            if (!input) {
                input = document.createElement('input');
                input.setAttribute("id", id);
            }
            addEventListeners(input, colIndex);
            return input;
        };

        // Add elements to header on `afterGetColHeader` hook.
        const addInput = (col, TH) => {
            // Hooks can return a value other than number (for example `columnSorting` plugin uses this).
            if (typeof col !== 'number') {
                return col;
            }

            let label = $(TH).find('.colHeader').html();
            if (col >= 0 && TH.childElementCount < 2) {
                // && (label === 'Nama Taruna' || label === 'No AK' || label === 'Kelompok')
                if (label === 'Nama Taruna') {
                    TH.appendChild(getInitializedElements(col, 'namataruna-search'));
                } else if (label === 'No AK') {
                    TH.appendChild(getInitializedElements(col, 'noak-search'));
                } else if (label === 'Kelompok') {
                    TH.appendChild(getInitializedElements(col, 'kelompok-search'));
                }
                // TH.appendChild(getInitializedElements(col));
            }
        };

        // Deselect column after click on input.
        var doNotSelectColumn = function(event, coords) {
            if (coords.row === -1 && event.target.nodeName === 'INPUT') {
                event.stopImmediatePropagation();
                this.deselectCell();
            }
        };

        setTimeout(function() {
            hot = new Handsontable(container, {
                data: result.data,
                width: '100%',
                height: 600,
                colHeaders: true,
                rowHeaders: true,
                manualColumnResize: true,
                fixedColumnsLeft: 7,
                fixedRowsTop: 0,
                contextMenu: false,
                manualColumnFreeze: true,
                stretchH: 'last',
                filters: true,
                afterGetColHeader: addInput,
                beforeOnCellMouseDown: doNotSelectColumn,
                renderAllRows: true,
                hiddenColumns: {
                    columns: [0, 1, 2, 3]
                },
                licenseKey: 'non-commercial-and-evaluation',
                nestedHeaders: [
                    [{
                        label: 'TARUNA',
                        colspan: 7,
                    }, {
                        label: 'NILAI',
                        colspan: 3
                    }, ],
                    ['#id', '#id_user_taruna', '#id_semester', '#id_jadwal_tugas', 'Nama Taruna', 'No AK', 'Kelompok', 'File Tugas', 'NILAI', 'CATATAN']
                ],
                columns: [{
                        data: 'id',
                        readOnly: true
                    },
                    {
                        data: 'id_user_taruna',
                        readOnly: true
                    },
                    {
                        data: 'id_semester',
                        readOnly: true
                    },
                    {
                        data: 'id_jadwal_tugas',
                        readOnly: true
                    },
                    {
                        data: 'namataruna',
                        readOnly: true
                    },
                    {
                        data: 'noaklong',
                        readOnly: true
                    },
                    {
                        data: 'kelompok',
                        readOnly: true
                    },
                    {
                        data: 'link_file_tugas',
                        readOnly: true,
                        renderer: 'html'
                    },
                    is_ketua_tim === 1 ? {
                        data: 'nilai',
                        type: 'numeric',
                        numericFormat: {
                            pattern: '0,0.00',
                            culture: 'en-US'
                        },
                        allowEmpty: false,
                        validator: nilaiValidator
                    } : {
                        data: 'nilai',
                        type: 'numeric',
                        numericFormat: {
                            pattern: '0,0.00',
                            culture: 'en-US'
                        },
                        allowEmpty: false,
                        validator: nilaiValidator,
                        readOnly: true,
                    }, {
                        data: 'catatan',
                        type: 'text',
                    },

                ],
                afterChange: function(change, source) {
                    if (source === 'loadData') {
                        return;
                    }
                    clearTimeout(autosaveNotification);
                    const rowData = hot.getData()[change[0][0]];
                    autosaveNotification = setTimeout(() => {
                        $(".alert").prop('class', 'alert alert-info');
                        exampleConsole.innerText = 'Ubahan pada tabel akan otomatis disimpan';
                    }, 5000);

                    if (rowData[8] <= 100 && rowData[8] >= 0) {
                        const formData = {
                            "<?= csrf_token() ?>": "<?= csrf_hash() ?>",
                            'id': rowData[0],
                            'id_user_taruna': rowData[1],
                            'id_jadwal_tugas': rowData[3],
                            'nilai': rowData[8],
                            'catatan': rowData[9]
                        };
                        $.ajax({
                            url: url_insert + '_nilai',
                            method: "POST",
                            data: formData,
                            dataType: 'json',
                            success: function(result) {
                                if (result.success) {
                                    let res = result.data;
                                    let row = hot.toPhysicalRow(change[0][0]);
                                    hot.setSourceDataAtCell(row, 'id', res.id);
                                    $(".alert").prop('class', 'alert alert-success');
                                    exampleConsole.innerText = 'Ubahan berhasil disimpan : (' + rowData[4] + ' ' + change[0][1] + ': ' + change[0][3] + ')';
                                } else {
                                    $(".alert").prop('class', 'alert alert-danger');
                                    exampleConsole.innerText = 'Gagal Menyimpan data ! : (' + rowData[4] + ' ' + change[0][1] + ': ' + change[0][3] + ')';
                                }
                            },
                            error: function() {
                                $(".alert").prop('class', 'alert alert-danger');
                                exampleConsole.innerText = 'Gagal Menyimpan data ! : (' + rowData[4] + ' ' + change[0][1] + ': ' + change[0][3] + ')';
                            }
                        });
                    } else {
                        $(".alert").prop('class', 'alert alert-danger');
                        exampleConsole.innerText = 'Gagal Menyimpan data ! Nilai diluar ketentuan : (' + change[0][3] + ')';
                    }
                }
            });
            $("#tugas_accordion").height('auto');
        }, 1000);

    }

    function nilaiValidator(value, callback) {
        if (value < 101 && value >= 0) {
            callback(true);
        } else {
            callback(false);
        }
    }
</script>