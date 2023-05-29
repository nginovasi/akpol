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
                                            <th><span>Judul/Keterangan</span></th>
                                            <th><span>Mata Pelajaran</span></th>
                                            <th><span>Pertemuan</span></th>
                                            <!-- <th><span>UTS/UAS</span></th> -->
                                            <th><span>Batalyon</span></th>
                                            <th><span>Tipe File</span></th>
                                            <th class="column-2action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                            <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <div id="lokasi_file_arr"></div>
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label for="keternagan">Judul/Keterangan Materi</label>
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" required autocomplete="off" placeholder="Masukan judul materi atau keterangan materi">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="id_batalyon">Batalyon</label>
                                            <ul class="list-unstyled text-sm mt-1 text-muted" id="parsley-id-7"></ul>
                                            <select class="form-control sel2" id="id_batalyon" name="id_batalyon" required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="id_mata_pelajaran">Mata Pelajaran</label>
                                            <ul class="list-unstyled text-sm mt-1 text-muted" id="parsley-id-7"></ul>
                                            <select class="form-control sel2" id="id_mata_pelajaran" name="id_mata_pelajaran" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_mata_pelajaran">Pertemuan</label>
                                    <select class="form-control sel2" id="pertemuan_ke" name="pertemuan_ke" required>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_tingkatan_detail">Tingkatan</label>
                                    <select class="form-control sel2" id="id_tingkatan_detail" name="id_tingkatan_detail" required>
                                    </select>
                                </div>
                            </form>
                            <div class="page-content page-container" id="page-content">
                                <div class="padding">
                                    <p class="text-muted">Masukan file-file pendukung materi, file akan langsung diunggah</p>
                                    <form id="files-dropzone" class="dropzone white b-a b-3x b-dashed b-primary p-a rounded p-5 text-center" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                                        <div class="dz-message">
                                            <h4 class="my-4">Seret file atau klik untuk memilih file.</h4>
                                            <span class="text-muted d-block mb-4">(Anda bisa memilih lebih dari satu file untuk diunggah)</span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="text-right">
                                <button form="form" type="reset" class="btn btn-light">Reset</button>
                                <button form="form" type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>/assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script type="text/javascript">
    Dropzone.autoDiscover = false;
    const auth_insert = '<?= $rules->i ?>';
    const auth_edit = '<?= $rules->e ?>';
    const auth_delete = '<?= $rules->d ?>';
    const auth_otorisasi = '<?= $rules->o ?>';

    const url = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';

    var dataStart = 0;
    var coreEvents;

    const select2Array = [{
            id: 'pertemuan_ke',
            url: '/pertemuanke_select_get',
            placeholder: 'Pilih Mata Pelajaran Terlebih dulu',
            params: {
                id_mata_pelajaran: function() {
                    return $('#id_mata_pelajaran').val()
                }
            }
        },
        {
            id: 'id_tingkatan_detail',
            url: '/jabatan_select_get',
            placeholder: 'Pilih Tingkatan',
            params: null
        },
        {
            id: 'id_batalyon',
            url: '/batalyonsmt_select_get',
            placeholder: 'Pilih Batalyon',
            params: null
        },
        {
            id: 'id_mata_pelajaran',
            url: '/matapelajaranbybatalyon_select_get',
            placeholder: 'Pilih Batalyon Terlebih dulu',
            params: {
                id_batalyon: function() {
                    return $('#id_batalyon').val()
                },
            }
        },
    ];

    $(document).ready(function() {
        coreEvents = new CoreEvents();
        coreEvents.url = url;
        coreEvents.ajax = url_ajax;
        coreEvents.csrf = {
            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
        };
        coreEvents.tableColumn = datatableColumn();

        coreEvents.insertHandler = {
            placeholder: 'Berhasil menyimpan data file',
            afterAction: function(result) {
                $('#lokasi_file_arr').html('');
            }
        }

        coreEvents.editHandler = {
            placeholder: '',
            afterAction: function(result) {
                setTimeout(function() {
                    select2Array.forEach(function(x) {
                        $('#' + x.id).select2('trigger', 'select', {
                            data: {
                                id: result.data[x.id],
                                text: result.data[x.id.replace('id', 'nama')]
                            }
                        });
                    });
                }, 500);
            }
        }

        coreEvents.deleteHandler = {
            placeholder: 'Berhasil menghapus data file',
            afterAction: function() {

            }
        }

        coreEvents.resetHandler = {
            action: function() {
                var objDZ = Dropzone.forElement("#files-dropzone");
                //"resetFiles" Event Call
                objDZ.emit("resetFiles");
            }
        }

        coreEvents.load();


        select2Array.forEach(function(x) {
            coreEvents.select2Init('#' + x.id, x.url, x.placeholder, x.params);
        });

        $("#files-dropzone").dropzone({
            url: '<?php echo base_url() . "/" . uri_segment(0) . "/action/dropzoneStore" ?>',
            maxFilesize: 2, // 2 MB
            addRemoveLinks: true,
            removedfile: function(file) {
                let dir = $('#' + file.upload.uuid + ' input[name^=lokasi_file]').val();
                let data;
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() . "/" . uri_segment(0) . "/action/file_delete" ?>',
                    data: {
                        "dir": dir,
                        "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                    },
                    dataType: 'json',
                    success: function(response) {
                       // console.log('cek');
                       // console.log(response);
                        if (response.success) {
                            document.getElementById(file.upload.uuid).remove();
                            $(file.previewElement).remove();
                            file.previewElement.innerHTML = "";
                        }
                    }
                });

            },
            success: function(file, response) {
               // console.log(file);
                let obj = JSON.parse(response);
               // console.log(obj);
                $('#lokasi_file_arr').append("<div id='" + file.upload.uuid + "'><input type='hidden' name='lokasi_file[]' value='" + obj.data.dir + "' >\
                <input type='hidden' name='tipe_file[]' value='" + obj.data.ext + "' >\
                <input type='hidden' name='ukuran_file[]' value='" + obj.data.size + "' ></div>");
            },
            init: function() {
                this.on('resetFiles', function() {
                    if (this.files.length != 0) {
                        for (i = 0; i < this.files.length; i++) {
                            this.files[i].previewElement.remove();
                        }
                        this.files.length = 0;
                    }
                    $(".dz-message").show();
                });
            }
        });

        $(document).on('click', '.delete-file', function() {
            let $this = $(this);
            let data = {
                id: $this.data('id'),
                dir: $this.data('dir')
            }
            $.extend(data, coreEvents.csrf);

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
                        url: coreEvents.url + "_delete",
                        type: 'post',
                        data: data,
                        dataType: 'json',
                        success: function(result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', coreEvents.deleteHandler.placeholder, 'success');
                                coreEvents.table.ajax.reload();
                                coreEvents.deleteHandler.afterAction();
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
           // console.log(url);
            window.open(url, '_blank').focus();
        }).on('change', '#id_batalyon', function() {
            $("#id_mata_pelajaran").val(null).trigger('change');
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
                data: "keterangan",
                orderable: true
            },
            {
                data: "mata_pelajaran",
                orderable: true
            },
            {
                data: "pertemuan_ke",
                orderable: true,
                render: function(a, type, data, index) {
                    return 'ke - '+data.pertemuan_ke;
                }
            },
            // {
            //     data: "uts_uas",
            //     orderable: true
            // },
            {
                data: "batalyon",
                orderable: true,
                render: function(a, type, data, index) {
                    return data.batalyon + ' - ' + data.semester;
                }
            },
            {
                data: "tipe_mime",
                orderable: true
            },
            {
                data: "id",
                orderable: false,
                render: function(a, type, data, index) {
                    let button = ""

                    button += '<button class="btn btn-sm btn-outline-primary detail" data-id="' + data.id + '" data-dir="' + data.lokasi_file + '" title="Lihat File">\
                                    <i class="fa fa-eye"></i>\
                                </button>\
                                ';

                    if (auth_delete == "1") {
                        button += '<button class="btn btn-sm btn-outline-danger delete-file" data-id="' + data.id + '" data-dir="' + data.lokasi_file + '"title="Delete">\
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
</script>