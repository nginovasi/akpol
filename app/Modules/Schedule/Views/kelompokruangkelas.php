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
                                            <th><span>Kelompok</span></th>
                                            <th><span>Ruang Kelas</span></th>
                                            <th><span>Tahun Ajaran</span></th>
                                            <th><span>Semester</span></th>
                                            <th><span>Tingkat</span></th>
                                            <th><span>Jadwal Otomatis</span></th>
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
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="kode">Kelompok</label>
                                            <select class="form-control sel2" id="id_kelompok" name="id_kelompok" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="kode">Ruang Kelas</label>
                                            <select class="form-control sel2" id="id_ruang_kelas" name="id_ruang_kelas" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <input type="number" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="####" min="2019" max="2022" required>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="kode">Semester</label>
                                            <select class="form-control sel2" id="id_semester" name="id_semester" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="kode">Tingkat</label>
                                            <select class="form-control sel2" id="id_tingkat" name="id_tingkat" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="is_auto">Jadwal Otomatis</label>
                                            <select class="form-control" id="is_auto" name="is_auto" required="">
                                                <option value="0">TIDAK</option>
                                                <option value="1">YA</option>
                                            </select>
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
<script type="text/javascript">
    const auth_insert = '<?= $rules->i ?>';
    const auth_edit = '<?= $rules->e ?>';
    const auth_delete = '<?= $rules->d ?>';
    const auth_otorisasi = '<?= $rules->o ?>';

    const url = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';

    var dataStart = 0;
    var coreEvents;

    const select2Array = [{
            id: 'id_kelompok',
            url: '/kelompok_select_get',
            placeholder: 'Pilih Kelompok',
            params: null
        },
        {
            id: 'id_ruang_kelas',
            url: '/ruang_kelas_select_get',
            placeholder: 'Pilih Ruang Kelas',
            params: null
        },
        {
            id: 'id_semester',
            url: '/semester_select_get',
            placeholder: 'Pilih Semester',
            params: null
        },
        {
            id: 'id_tingkat',
            url: '/tingkat_select_get',
            placeholder: 'Pilih Tingkat',
            params: null
        }
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
            placeholder: 'Berhasil menyimpan data kelompok ruang kelas',
            afterAction: function(result) {

            }
        }

        coreEvents.editHandler = {
            placeholder: '',
            afterAction: function(result) {
                console.log(result.data);
                setTimeout(function() {
                    select2Array.forEach(function(x) {
                        $('#' + x.id).select2('trigger', 'select', {
                            data: {
                                id: result.data[x.id],
                                text: result.data[x.id.replace('id_', '')]
                            }
                        });
                    });
                }, 500);
            }
        }

        coreEvents.deleteHandler = {
            placeholder: 'Berhasil menghapus data kelompok ruang kelas',
            afterAction: function() {

            }
        }

        coreEvents.resetHandler = {
            action: function() {

            }
        }

        coreEvents.load();
        
        select2Array.forEach(function(x) {
            coreEvents.select2Init('#' + x.id, x.url, x.placeholder, x.params);
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
                data: "kelompok",
                orderable: true
            },
            {
                data: "ruang_kelas",
                orderable: true
            },
            {
                data: "tahun_ajaran",
                orderable: true
            },
            {
                data: "semester",
                orderable: true
            },
            {
                data: "tingkat",
                orderable: true
            },
            {
                data: "is_auto",
                orderable: true,
                render: function(a, type, data, index) {
                    if (data.is_auto == "1") {
                        return 'YA';
                    } else {
                        return 'TIDAK';
                    }
                }
            },
            {
                data: "id",
                orderable: false,
                render: function(a, type, data, index) {
                    let button = ""

                    if (auth_edit == "1") {
                        button += '<button class="btn btn-sm btn-outline-primary edit" data-id="' + data.id + '" title="Edit">\
                                    <i class="fa fa-edit"></i>\
                                </button>\
                                ';
                    }

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
</script>