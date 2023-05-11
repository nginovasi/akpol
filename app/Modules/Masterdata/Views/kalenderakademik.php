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
                                            <th><span>Nama File Kalender</span></th>
                                            <th><span>Tahun Ajaran</span></th>
                                            <th><span>Date</span></th>
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
                                        <div class="col-12">
                                            <label for="nama">Nama Kalender Akademik</label>
                                            <input type="text" class="form-control" id="nama" name="nama" required placeholder="Nama Kalender Akademik">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="tahun_ajaran">Tahun Ajaran</label>
                                            <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="Deskripsi" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="deskripsi">File Kalender Akademik</label>
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
                                                <input type="file" class="custom-file-input" id="file_kalender_akademik" name="file_kalender_akademik">
                                                <label class="custom-file-label" for="file_kalender_akademik">Pilih file</label>
                                            </div>
                                            <input type="text" class="form-control" id="link-input" name="link_materi_tugas" placeholder="Link File Kalender Akademik" style="display:none">
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
                                Swal.fire('Sukses', 'Berhasil menyimpan data kalender akademik', 'success');
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
                            if (key !== 'file_kalender_akademik') {
                                $('#' + key).val(result.data[key]);
                            }
                        }

                        if (result.data['jenis_file_kalender_akademik'] === '1') {
                            $('#upload-radio').prop('checked', true).trigger('change');
                            $('.custom-file-label').html(result.data.file_kalender_akademik);
                        } else {
                            $('#link-radio').prop('checked', true).trigger('change');
                            $('#link-input').val(result.data['file_kalender_akademik']);
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
                data: "nama",
                orderable: true
            },
            {
                data: "tahun_ajaran",
                orderable: true
            },
            {
                data: "created_at",
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
                    }

                    // button += '<button class="btn btn-sm btn-outline-primary detail" data-id="' + data.id + '" data-dir="' + data.file_kalender_akademik + '" title="Lihat File">\
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

</script>