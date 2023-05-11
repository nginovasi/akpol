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
                                            <th><span>Tipe Tugas</span></th>
                                            <th><span>File Tugas</span></th>
                                            <th><span>Deadline</span></th>
                                            <th class="column-2action"></th>
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

        <div class="collapse" id="tugas_accordion">

            <div class="card card-body">
                <div class="card-header modal-header px-4">
                    <h5 class="card-title">Detail Tugas</h5>
                </div>
                <div class="px-4">
                    <div class="py-3">
                        <div>
                            <small class="text-muted">Judul Tugas</small>
                            <div class="my-2" id="view_judul">1243 0303 0333</div>
                        </div>
                        <div class="mb-2">
                            <small class="text-muted">Deskripsi</small>
                            <div class="my-2" id="view_deskripsi">Ut maecenas sed purus ultrices sed sapien massa quam eu sed odio id dui, sed sed lectus amet cursus sed habitant est morbi adipiscing nam consectetur nullam urna, proin condimentum ut laoreet congue
                                felis, diam pulvinar aliquam libero non tortor turpis aliquet massa eu etiam eget quisque egestas tristique tempus purus blandit nunc volutpat aliquam amet, aliquet nec et sed</div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <small class="text-muted">Mata Pelajaran</small>
                                <div class="my-2" id="view_mata_pelajaran">Coch Jose</div>
                            </div>
                            <div class="col-3">
                                <small class="text-muted">Kelompok</small>
                                <div class="my-2" id="view_kelompok">James Richo</div>
                            </div>
                            <div class="col-3">
                                <small class="text-muted">Status Tugas</small>
                                <div class="my-2" id="view_status_tugas">James Richo</div>
                            </div>
                            <div class="col-3">
                                <small class="text-muted">Deadline</small>
                                <div class="my-2" id="view_waktu_pengumpulan">James Richo</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div>
                                    <small class="text-muted">Tipe Pengumpulan Tugas</small>
                                    <div class="my-2" id="view_tipe_tugas">James Richo</div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <small class="text-muted">Lihat File Materi Tugas</small>
                                    <div class="my-2">
                                        <a id="view_file_materi_tugas" href="#" class="item-author text-color" target="_blank">Lihat File Lampiran</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div id="file_tugas_container" style="display: none">
                                    <small class="text-muted">Lihat File Tugas Terkirim</small>
                                    <div class="my-2">
                                        <a id="view_file_tugas" href="#" class="item-author text-color" target="_blank">Lihat File Lampiran</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="px-4 py-4" id="input_file_tugas_container" style="display: none">
                    <h5 class="card-title">Input File Tugas</h5>
                    <small class="text-muted">
                        Anda dapat mengupdate file tugas yang sudah diupload sampai batas waktu pengumpulan
                    </small>
                    <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off" enctype="multipart/form-data">
                        <div class="page-content page-container" id="page-content">
                            <div class="padding">
                                <?= csrf_field(); ?>
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <input type="hidden" class="form-control" id="id_jadwal_tugas" name="id_jadwal_tugas" value="" required>
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
                                                <input type="file" class="custom-file-input" id="file_tugas" required name="file_tugas">
                                                <label class="custom-file-label" for="file_tugas">Pilih file</label>
                                            </div>
                                            <input type="text" class="form-control" id="link-input" name="link_materi_tugas" placeholder="Link File Tugas" style="display:none">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="catatan">Catatan</label>
                                            <input type="text" class="form-control" id="catatan" name="catatan" placeholder="Catatan Tugas" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-4">
                                <button class="btn btn-primary" type="submit">Submit Tugas</button>
                            </div>
                        </div>
                    </form>
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
    var lastDetail;

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
                $('#link-input').removeAttr('required');
                $('#file_tugas').attr('required', 'required');
            } else if ($('#link-radio').is(':checked')) {
                $('#upload-input').hide();
                $('#link-input').show();
                $('#file_tugas').removeAttr('required');
                $('#link-input').attr('required', 'required');
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
            $('#catatan').val('');
            $('#link-input').val('');
            $('#file_tugas').val('');
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

                        if (result.data['jenis_file_tugas'] === '1') {
                            $('#upload-radio').prop('checked', true).trigger('change');
                            $('.custom-file-label').html(result.data.file_tugas);
                        } else {
                            $('#link-radio').prop('checked', true).trigger('change');
                            $('#link-input').val(result.data['file_tugas']);
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
        }).on('click', '.show', function(event) {
            // event.preventDefault();
            event.stopPropagation();
            let $this = $(this);
            var detail;
            if ($this.data('detail') !== undefined) {

                $("#tugas_accordion").hide('collapse');
                $("#tugas_accordion").show('collapse');

                detail = JSON.parse($this.data('detail').replaceAll("'", '"'));
                $('#id').val(detail.id);
                $('#id_jadwal_tugas').val(detail.id_jadwal_tugas);
                $('#catatan').val(detail.catatan);
                for (key in detail) {
                    if (key === 'tipe_tugas') {
                        if (detail.tipe_tugas === '0') {
                            $('#view_tipe_tugas').html('Dikumpulkan Di Kelas');
                            $('#input_file_tugas_container').hide();
                        } else {
                            $('#view_tipe_tugas').html('Upload File Tugas');
                            if (new Date().getTime() <= new Date(detail.waktu_pengumpulan).getTime()) {
                                $('#input_file_tugas_container').show();
                            } else {
                                $('#input_file_tugas_container').hide();

                            }

                        }
                    } else {
                        $('#view_' + key).html(detail[key]);
                    }

                };

                $('#view_waktu_pengumpulan').html(detail['waktu']);

                if (detail.file_materi_tugas) {
                    let url = detail.file_materi_tugas.replaceAll('http://devel.nginovasi.id/akpol-api/', '');
                    $('#view_file_materi_tugas').attr("href", 'http://devel.nginovasi.id/akpol-api/' + url);
                    $('#view_file_materi_tugas').html("Lihat file lampiran")
                    $('#view_file_materi_tugas').addClass("btn btn-sm btn-outline-primary");
                    $('#view_file_materi_tugas').removeClass("text-color");
                } else {
                    $('#view_file_materi_tugas').html("Tidak ada lampiran")
                    $('#view_file_materi_tugas').removeAttr("href");
                    $('#view_file_materi_tugas').addClass("text-color");
                    $('#view_file_materi_tugas').removeClass("btn btn-sm btn-outline-primary");
                }

                if (detail.jenis_file_tugas === '1') {
                    $('#upload-radio').prop('checked', true).trigger('change');
                    $('.custom-file-label').html(detail.file_tugas);
                } else {
                    $('#link-radio').prop('checked', true).trigger('change');
                    $('#link-input').val(detail.file_tugas);
                }

                if (detail.file_tugas) {

                    $('#file_tugas_container').show();
                    $('#view_file_tugas').attr("href", detail.file_tugas);
                    // $('.custom-file-label').html(detail.file_tugas);
                    $('#view_file_tugas').html("Lihat file lampiran");
                    $('#view_file_tugas').addClass("btn btn-sm btn-outline-primary");
                    $('#view_file_tugas').removeClass("text-color");

                    if (new Date().getTime() <= new Date(detail.waktu_pengumpulan).getTime()) {
                        $('#view_status_tugas').html('<span class="badge badge-success text-uppercase">\
                                    Sudah mengupload\
                                </span>');
                    } else {
                        $('#view_status_tugas').html('<span class="badge badge-warning text-uppercase">\
                                    Melewati batas waktu pengumpulan\
                                </span>');
                    }
                } else {

                    $('#file_tugas_container').hide();
                    $('#view_file_tugas').removeClass("btn btn-sm btn-outline-primary");
                    $('#view_file_tugas').addClass("text-color");

                    if (new Date().getTime() <= new Date(detail.waktu_pengumpulan).getTime()) {
                        $('#view_status_tugas').html('<span class="badge badge-danger text-uppercase">\
                                    Belum mengupload\
                                </span>');
                    } else {
                        $('#view_status_tugas').html('<span class="badge badge-warning text-uppercase">\
                                    Melewati batas waktu pengumpulan\
                                </span>');
                    }
                }

                if (detail.tipe_tugas === '0') {
                    $('#view_status_tugas').html('<span class="badge badge-warning text-uppercase">\
                                    Dikumpulkan di kelas\
                                </span>');
                }


                // var formData = new FormData();
                // formData.append('id', detail.id);
                // formData.append("<?= csrf_token() ?>", "<?= csrf_hash() ?>");
                // $.ajax({
                //     url: url_load + '_nilai',
                //     method: "POST",
                //     data: formData,
                //     dataType: 'json',
                //     processData: false,
                //     contentType: false,
                //     success: function(result) {
                //         console.log(result);
                //         if (result.success) {
                //             if (result.data.length > 0) {
                //                 loadTable(result, is_ketua_tim);
                //             } else {
                //                 Swal.fire('Data Tidak Ditemukan', 'Data nilai belum tersedia untuk semester ini', 'warning');
                //                 $('#table-card').hide();
                //             }
                //         } else {
                //             $('#table-card').hide();
                //         }
                //     },
                //     error: function() {
                //         Swal.close();
                //         Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                //     }
                // });
            }

        });

        table = $('#datatable').DataTable({
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
                        "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                    };

                    $.extend(form, info);

                    return form;
                },
                "complete": function(response) {
                    console.log(response);
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
                data: "tipe_tugas",
                orderable: true,
                render: function(a, type, data, index) {
                    if (data.tipe_tugas === 0) {
                        return "Dikumpulkan di kelas";
                    } else {
                        return "Upload File Tugas";
                    }
                }

            },
            {
                data: "file_tugas",
                orderable: true,
                render: function(a, type, data, index) {
                    if (data.tipe_tugas === '0') {
                        return '<span class="badge badge-warning text-uppercase">\
                                    Dikumpulkan di kelas\
                                </span>';
                    } else {
                        if (data.file_tugas) {
                            return '<span class="badge badge-success text-uppercase">\
                                    Sudah mengupload\
                                </span>';
                        } else {
                            return '<span class="badge badge-danger text-uppercase">\
                                        Belum mengupload\
                                    </span>';
                        }
                    }
                }

            },
            {
                data: "waktu_pengumpulan",
                orderable: true,
                render: function(a, type, data, index) {
                    return '<span style="display:none;">' + (new Date(data.waktu_pengumpulan).getTime() / 1000) + '</span>' + data.waktu;
                }
            },
            {
                data: "id",
                orderable: false,
                render: function(a, type, data, index) {
                    let button = ""

                    button += '<button class="btn btn-sm btn-outline-info show" type="button" data-id="' + data.id + '" data-detail="' + JSON.stringify(data).replaceAll('"', "'") + '" title="Tampilkan Tugas">\
                                    <i class="fa fa-eye"></i>\
                                </button>\
                                ';


                    if (data.file_tugas) {
                        button += '<a href="' + data.file_tugas + '" target="_BLANK" class="btn btn-sm btn-outline-success" type="button" style="color: #31c971;" data-id="' + data.id + '" title="Download Tugas Saya">\
                                    <i class="fa fa-download"></i>\
                                    </a>\
                                    ';

                    }
                    // if (auth_edit == "1") {
                    //     button += '<button class="btn btn-sm btn-outline-primary edit" data-id="' + data.id + '" title="Edit">\
                    //                 <i class="fa fa-edit"></i>\
                    //             </button>\
                    //             ';
                    // }

                    // if (auth_delete == "1") {
                    //     button += '<button class="btn btn-sm btn-outline-danger delete" data-id="' + data.id + '" title="Delete">\
                    //                     <i class="fa fa-trash-o"></i>\
                    //                 </button></div>';
                    // }

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