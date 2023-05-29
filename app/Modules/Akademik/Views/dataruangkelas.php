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
                        <a class="nav-link active" data-toggle="tab" href="#tab-data" role="tab"
                            aria-controls="tab-data" aria-selected="false">Data</a>
                    </li>
                    <?php if ($rules->i == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-form" role="tab" aria-controls="tab-form"
                                aria-selected="false">Form</a>
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
                                            <th><span>Kode</span></th>
                                            <th><span>Ruang Kelas</span></th>
                                            <th><span>Gedung</span></th>
                                            <th><span>Kapasitas</span></th>
                                            <!-- <th><span>Jadwal Otomatis</span></th> -->
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
                                            <label for="kode">Kode Ruang Kelas</label>
                                            <input type="text" class="form-control" id="kode" name="kode" maxlength="10"
                                                required placeholder="Kode Ruang Kelas">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="nama">Nama Ruang Kelas</label>
                                            <input type="text" class="form-control" id="nama" name="nama" required
                                                placeholder="Nama Ruang Kelas">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="nama">Gedung</label>
                                            <select class="form-control sel2" id="id_gedung" name="id_gedung" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="nama">Kapasitas Ruang Kelas</label>
                                            <input type="number" class="form-control" id="kapasitas" name="kapasitas"
                                                required placeholder="Kapasitas Ruang Kelas">
                                        </div>
                                    </div>
                                </div>
                                <!--                                 <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="is_auto">Jadwal Otomatis</label>
                                            <select class="form-control" id="is_auto" name="is_auto" required="">
                                                <option value="0">TIDAK</option>
                                                <option value="1">YA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> -->
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
    <div id="modaldetail" class="modal fade" data-backdrop="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <form id="verifikasitaruna">
                    <div class="modal-header ">
                        <div class="modal-title text-md">Detail Ruang Kelas</div>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="p-4">
                            <?= csrf_field(); ?>
                            <div class="d-sm-flex no-shrink mb-4">
                                <div class="px-sm-4 my-3 my-sm-0 flex">
                                    <h2 class="text-md" id="nama_modal">Jacqueline Reid</h2>
                                    <h5 class="text-md" id="kode_modal">Jacqueline Reid</h5>
                                    <h5 class="text-sm" id="nama_gedung_modal">Jacqueline Reid</h5>
                                    <small class="d-block text-fade" id="kapasitas_modal">Senior Industrial
                                        Designer</small>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
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
    const url_edit = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_edit" ?>';
    const urldetail_load = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "detail_load" ?>';


    var dataStart = 0;
    var coreEvents;

    const select2Array = [{
        id: 'id_gedung',
        url: '/gedung_select_get',
        placeholder: 'Pilih Gedung',
        params: null
    }];

    $(document).ready(function () {
        coreEvents = new CoreEvents();
        coreEvents.url = url;
        coreEvents.ajax = url_ajax;
        coreEvents.csrf = {
            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
        };
        coreEvents.tableColumn = datatableColumn();

        coreEvents.insertHandler = {
            placeholder: 'Berhasil menyimpan data ruang kelas',
            afterAction: function (result) {
                $(".sel2").val('').trigger('change');
            }
        }

        coreEvents.editHandler = {
            placeholder: '',
            afterAction: function (result) {
               // console.log(result.data);
                setTimeout(function () {
                    select2Array.forEach(function (x) {
                        $('#' + x.id).select2('trigger', 'select', {
                            data: {
                                id: result.data[x.id],
                                text: result.data[x.id.replace('id', 'nama')]
                            }
                        });
                    });
                }, 500);
                coreEvents.table.ajax.reload();
                coreEvents.table.page('first').draw('page');
            }
        }


        coreEvents.deleteHandler = {
            placeholder: 'Berhasil menghapus data ruang kelas',
            afterAction: function () {

            }
        }

        coreEvents.resetHandler = {
            action: function () {

            }
        }

        coreEvents.load();

        select2Array.forEach(function (x) {
            coreEvents.select2Init('#' + x.id, x.url, x.placeholder, x.params);
        });
    }).on('click', '.detail', function () {
        let $this = $(this);
        $('#id_modal').val($(this).data('id'));
        $('#modaldetail').modal('show');
        Swal.fire({
            title: "",
            icon: "info",
            text: "Proses mengambil data, mohon ditunggu...",
            didOpen: function () {
                Swal.showLoading()
            }
        });

        $.ajax({
            url: urldetail_load,
            type: 'post',
            data: {
                id: $this.data('id'),
                "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
            },
            dataType: 'json',
            success: function (result) {
                Swal.close();
                if (result.success) {
                    for (key in result.data) {
                        $('#' + key + '_modal').html(result.data[key]);
                    }
                    $('#nama_gedung_modal').html('Gedung ' + result.data.nama_gedung);
                    $('#kapasitas_modal').html('Kapasitas ruangan : ' + result.data.kapasitas + ' peserta');
                } else {
                    Swal.fire('Error', result.message, 'error');
                }
            },
            error: function () {
                Swal.close();
                Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
            }
        });
    })

    function datatableColumn() {
        let columns = [{
            data: "id",
            orderable: false,
            width: 100,
            render: function (a, type, data, index) {
                return dataStart + index.row + 1
            }
        },
        {
            data: "kode",
            orderable: true
        },
        {
            data: "nama",
            orderable: true
        },
        {
            data: "gedung",
            orderable: true
        },
        {
            data: "kapasitas",
            orderable: true
        },
        // {
        //     data: "is_auto",
        //     orderable: true,
        //     render: function(a, type, data, index) {
        //         if (data.is_auto == "1") {
        //             return 'YA';
        //         } else {
        //             return 'TIDAK';
        //         }
        //     }
        // },
        {
            data: "id",
            orderable: false,
            render: function (a, type, data, index) {
                let button = ""

                if (auth_edit == "1") {
                    button += '<button class="btn btn-sm btn-outline-primary edit" data-id="' + data.id + '" title="Edit">\
                                    <i class="fa fa-edit"></i>\
                                </button>\
                                ';
                }

                button += '<button class="btn btn-sm btn-outline-info detail" data-id="' + data.id + '" title="Detail">\
                                        <i class="fa fa-eye"></i>\
                                    </button>\
                                    ';

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