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
                        <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="id_batalyon">Batalyon</label>
                                        <select class="form-control sel2" id="id_batalyon" name="id_batalyon" required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="id_mata_pelajaran">Mata Pelajaran</label>
                                        <select class="form-control sel2" id="id_mata_pelajaran" name="id_mata_pelajaran" required>
                                        </select>
                                    </div>

                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <label for="id_kelompok">Kelas</label>
                                        <select class="form-control sel2" id="id_kelompok" name="id_kelompok" required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="id_kelompok">Pertemuan</label>
                                        <select class="form-control sel2" id="pertemuan_ke" name="pertemuan_ke" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <!-- <button type="reset" class="btn btn-light">Reset</button> -->
                                <!-- <a id="d-pdf" class="btn btn-light-primary font-weight-bold" style="display: none;">Download PDF</a> -->
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" id="table-card" style="display:none">
            <div class="card-header">
                <strong>Daftar Kehadiran</strong>
            </div>
            <div class="card-body">
                <div class="padding">
                    <div class="tab-content">
                        <!-- <div class="col-sm-12">
                            <div class="list list-row block" id="list-container">
                            </div>
                        </div> -->
                        <div class="page-content page-container" id="page-content">
                            <form id="absensi-form">
                                <div class="padding">
                                    <?= csrf_field(); ?>
                                    <div id="invoice-list" data-plugin="invoice">
                                        <div>
                                            <h5 class="card-title" id="input-title" style="display:none">Lakukan check pada taruna yang hadir, anda juga dapat mencari taruna pada kotak pencarian</h5>
                                        </div>
                                        <div class="mb-5">
                                            <small class="text-muted">Lakukan check pada taruna yang hadir, anda juga dapat mencari taruna pada kotak pencarian</small>
                                        </div>
                                        <div class="toolbar ">
                                            <div class="btn-group mt-2 ml-3">
                                                <!-- <div class="checkbox ">
                                                    <label class="ui-check ui-check-md">
                                                        <input type="checkbox" class="checkall" onClick='toggle(this)'>
                                                        <i class="dark-white"></i>
                                                    </label>
                                                </div>
                                                <button class="btn btn-sm btn-icon btn-white sort hide" data-sort="item-title" data-toggle="tooltip" title="Sort">
                                                    <i class="sorting"></i>
                                                </button> -->
                                            </div>
                                            <form class="flex">
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-md search" placeholder="Search">
                                                    <span class="input-group-append">
                                                        <button class="btn btn-white no-border btn-sm" type="button">
                                                            <span class="d-flex text-muted"><i data-feather="search"></i></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-theme table-row v-middle">
                                                <thead>
                                                    <tr>
                                                        <th style="width:20px;"></th>
                                                        <th class="text-muted " data-sort="id" style="width:40px;text-align:center">No.</th>
                                                        <th class="text-muted " data-sort="item-taruna" style="min-width:200px;">Taruna</th>
                                                        <th class="text-muted " data-sort="item-status" style="width:150px;">Status</th>
                                                        <th class="text-muted " style="width:150px;">Catatan</th>
                                                        <th style="min-width:150px;"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list" id="list-container">
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex">
                                            <ul class="pagination">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                        <span class="sr-only">Previous</span>
                                                    </a>
                                                </li>
                                                <li class="page-item active">
                                                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">4</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">5</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                        <span class="sr-only">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <small class="text-muted py-2 mx-2">Total <span id="count">15</span> items</small>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-primary" type="submit">Submit Kehadiran</button>
                                    </div>

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
    const type_code = '<?= $rules->type_code ?>';
    const id_pendidik = '<?= $_SESSION['id'] ?>';

    const url_insert = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_save" ?>';
    const url_edit = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_edit" ?>';
    const url_delete = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_delete" ?>';
    const url_load = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_load" ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';
    const url_pdf = '<?= base_url() . "/" . uri_segment(0) . "/action/pdf/" . uri_segment(1) . "" ?>';

    var dataStart = 0;
    var table;
    var noticed = true;

    $(document).ready(function() {


        // $('#datatable')

        $(document).on('submit', '#form', function(e) {
            e.preventDefault();
            let $this = $(this);
            $.ajax({
                url: url_load,
                method: "POST",
                data: $this.serialize(),
                dataType: 'json',
                success: function(result) {
                    if (result.success) {
                        if (result.data.length > 0) {
                            loadTable(result);
                            $('#d-pdf').show();

                        } else {
                            Swal.fire('Tidak ada data', 'Data jadwal belum tersedia untuk pertemuan ini', 'warning');
                            resetTable();
                            $('#d-pdf').hide();
                        }
                    } else {
                        resetTable();
                    }
                },
                error: function() {
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });
        }).on('reset', '#form', function() {
            $('#id').val('');
            $(".sel2").val(null).trigger('change');
        }).on('submit', '#absensi-form', function(e) {
            e.preventDefault();
            let $this = $(this);
            $.ajax({
                url: url_insert,
                method: "POST",
                data: $this.serialize(),
                dataType: 'json',
                success: function(result) {
                    if (result.success) {
                        Swal.fire('Sukses', 'Berhasil menyimpan data absensi', 'success');
                        resetTable();
                        $(".sel2").val(null).trigger('change');
                    } else {
                        Swal.fire('Error', result.message, 'error');
                        resetTable();
                    }
                }
            });
        })




        select2Init("#id_batalyon", "/batalyonsmt_select_get", {
            type_code: function() {
                return type_code
            },
            id_pendidik: function() {
                return id_pendidik
            },
        }, function(data) {
            return data.text;
        }, function(data) {
            if (data.id === '') {
                return "Pilih Batalyon";
            }

            return data.text;
        });

        select2Init("#id_mata_pelajaran", "/matapelajaranbybatalyonnoaspek_select_get", {
            id_batalyon: function() {
                return $('#id_batalyon').val()
            },
            type_code: function() {
                return type_code
            },
            id_pendidik: function() {
                return id_pendidik
            },
        }, function(data) {
            return data.text;
        }, function(data) {
            if (data.id === '') {
                return "Pilih mata pelajaran";
            }

            return data.text;
        });

        select2Init("#id_kelompok", "/kelompokbybatalandmatkul_select_get", 
        {
            id_batalyon: function() {
                return $('#id_batalyon').val()
            },
            id_mata_pelajaran: function() {
                return $('#id_mata_pelajaran').val()
            },
            type_code: function() {
                return type_code
            },
            id_pendidik: function() {
                return id_pendidik
            },
        }, function(data) {
            return data.text;
        }, function(data) {
            if (data.id === '') {
                return "Pilih Kelas";
            }

            return data.text;
        });

        select2Init("#pertemuan_ke", "/pertemuanbykelas_select_get", {
            id_batalyon: function() {
                return $('#id_batalyon').val()
            },
            id_mata_pelajaran: function() {
                return $('#id_mata_pelajaran').val()
            },
            id_kelompok: function() {
                return $('#id_kelompok').val()
            },
            type_code: function() {
                return type_code
            },
            id_pendidik: function() {
                return id_pendidik
            },
        }, function(data) {
            return data.text;
        }, function(data) {
            if (data.id === '') {
                return "Pilih Pertemuan";
            }

            return data.text;
        });


        $('#d-pdf').on('click', function(e) {
            $(this).attr("href", url_pdf + "?id_batalyon=" + $('#id_batalyon').val() + '&id_mata_pelajaran=' + $('#id_mata_pelajaran').val() + '&id_kelompok=' + $('#id_kelompok').val() + '&pertemuan_ke=' + $('#pertemuan_ke').val() + '&pertemuan=' + $('#pertemuan_ke').select2('data')[0]['text']);
            $(this).attr("target", "_blank");
        })

        $('#id_batalyon').on('change', function(e) {
            $("#id_mata_pelajaran").val(null).trigger('change');
            $("#id_kelompok").val(null).trigger('change');
            $("#pertemuan_ke").val(null).trigger('change');
        });

        $('#id_mata_pelajaran').on('change', function(e) {
            $("#id_kelompok").val(null).trigger('change');
            $("#pertemuan_ke").val(null).trigger('change');
        });

        $('#id_kelompok').on('change', function(e) {
            $("#pertemuan_ke").val(null).trigger('change');
        });
    });


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

    function toggle(source) {
        var aInputs = document.getElementsByClassName('checkall');
        for (var i = 0; i < aInputs.length; i++) {
            if (aInputs[i] != source && aInputs[i].className == source.className) {
                aInputs[i].checked = source.checked;
                const tr = $(aInputs[i]).closest('td').closest('tr').find('.item-status').parent();
                if (aInputs[i].checked) {
                    tr.html('<span span class = "item-status badge text-uppercase bg-success" > ' +
                        "Hadir" +
                        '</span>');
                } else {
                    tr.html('<span span class = "item-status badge text-uppercase bg-danger" > ' +
                        "Tidak Hadir" +
                        '</span>');
                }
            }
        }
    }

    function updateCount(count) {
        $('#count').text(count);
    }

    function initList() {
        var list_el = "#invoice-list";
        if ($(list_el).length) {
            list = new List(list_el.substr(1), {
                valueNames: [{
                        data: ['id']
                    },
                    'item-taruna',
                    'item-status'
                ],
                page: 40,
                pagination: false
            });

            list.on('updated', function(list) {
                updateCount(list.matchingItems.length);
                if (list.matchingItems.length > 0) {
                    $('.no-result').addClass('hide');
                } else {
                    $('.no-result').removeClass('hide');
                }
            });

            updateCount(list.items.length);
        }
        if (!noticed) {
            notie.alert({
                text: 'Ketik nama taruna untuk mencari',
                position: 'top'
            });
            noticed = true;
        }
    }

    function initKeteranganSelect() {
        select2Init(".keterangan_sel2", "/alasantidakhadir_select_get", null, function(data) {
            return data.text;
        }, function(data) {
            if (data.id === '') {
                return "Alasan ketidakhadiran";
            }
            return data.text;
        });
        $('.keterangan_sel2').on('select2:select', function(e) {
            const tr = $(this).closest('td').closest('tr');
            const index = tr.data("index");
            var data = e.params.data;
            if (data.ori_id === '4') {
                tr.append('<td>' +
                    '<input type="text" class="form-control" name="keterangan_lain[' + index + ']" placeholder="Masukkan keterangan absen">' +
                    '</td>');
            } else {
                $(this).closest('td').next().find('input').remove();
            }
        });
    };

    function loadTable(result) {
        $('#table-card').show();
        var id_kelompok = document.getElementById("id_kelompok");
        var nama_kelompok = id_kelompok.options[id_kelompok.selectedIndex].text;
        var id_mapel = document.getElementById("id_mata_pelajaran");
        var nama_mapel = id_mapel.options[id_mapel.selectedIndex].text;
        var id_pertemuan = document.getElementById("pertemuan_ke");
        var nama_pertemuan = id_pertemuan.options[id_pertemuan.selectedIndex].text;
        $('#input-title').show();
        $('#input-title').html('Daftar absensi taruna Kelas <strong>' + nama_kelompok + '</strong> pertemuan <strong>' + nama_pertemuan + ' </strong>');
        var element = '';
        result.data.forEach(function(data, index) {
            // var image_url = data.photopath.includes('./public/photo') ? data.photopath.replace('./', 'http://devel.nginovasi.id/akpol-api/') : data.photopath;
            var status = data.is_absen === "1" ? '<span class="item-status badge text-uppercase bg-success">' +
                "Hadir" +
                '</span>' : '<span class="item-status badge text-uppercase bg-danger">' +
                "Tidak Hadir" +
                '</span>';
            var checkbox = data.is_absen === "1" ? '<label class="ui-check m-0 ui-check-md">' +
                '<input type="checkbox" class="checkall" name="is_absen[' + index + ']" value="1" checked>' +
                '<i></i>' +
                '</label>' : '<label class="ui-check m-0 ui-check-md">' +
                '<input type="checkbox" class="checkall" name="is_absen[' + index + ']" value="0">' +
                '<i></i>' +
                '</label>';
            var select = data.is_absen === "1" ? '' : '<select class="form-control sel2 keterangan_sel2" id="keterangan_sel2" name="keterangan[' + index + ']" required>' +
                '<option id="' + data.keterangan + '" selected="selected">' + data.keterangan + '</option>' +
                '</select>';
            element += '<tr class=" v-middle" data-id=' + data.id + ' data-index=' + index + '>' +
                '<input type="hidden" name="id[' + index + ']" value="' + data.id + '">' +
                '<input type="hidden" name="id_jadwal[' + index + ']" value="' + data.id_jadwal + '">' +
                '<td>' +
                checkbox +
                ' </td>' +
                '<td style="min-width:30px;text-align:center">' +
                '<small class="text-muted">' + (index + 1) + '</small>' +
                ' </td>' +
                '<td class="flex">' +
                '<input type="hidden" name="id_taruna[' + index + ']" value="' + data.id_m_user + '">' +
                '<h6 class="item-taruna ajax h-1x">' +
                data.namataruna +
                '</h6>' +
                '<div class="item-noaklong text-muted h-1x d-none d-sm-block">' +
                data.noaklong +
                '</div>' +
                '</td>' +
                '<td>' +
                status + '</td>' +
                ' <td class="no-wrap sel-container">' +
                select +
                '</td>' +
                '</tr>';
        });
        $('#list-container').html(element);
        setTimeout(function() {
            initKeteranganSelect();
            initList();
            $('input.checkall').change(function() {
                const tr = $(this).closest('td').closest('tr').find('.item-status').parent();
                const trselect = $(this).closest('td').closest('tr').find('.sel-container');
                const index = $(this).closest('td').closest('tr').data('index');
                if (this.checked) {
                    tr.html('<span span class = "item-status badge text-uppercase bg-success" > ' +
                        "Hadir" +
                        '</span>');
                    trselect.html('')
                    trselect.closest('td').next().find('input').remove();
                } else {
                    tr.html('<span span class = "item-status badge text-uppercase bg-danger" > ' +
                        "Tidak Hadir" +
                        '</span>');
                    trselect.html('<select class="form-control sel2 keterangan_sel2" id="keterangan_sel2" name="keterangan[' + index + ']" required></select>');
                    initKeteranganSelect();
                }
            });
        }, 500);
    }

    function resetTable() {
        $('#table-card').hide();
        $('#list-container').html('');
    }
</script>


<!-- <script type="text/javascript">
    const auth_insert = '<?= $rules->i ?>';
    const auth_edit = '<?= $rules->e ?>';
    const auth_delete = '<?= $rules->d ?>';
    const auth_otorisasi = '<?= $rules->o ?>';

    const url = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';

    var dataStart = 0;
    var coreEvents;

    const select2Array = [{
            id: 'id_mata_pelajaran',
            url: '/matapelajaran_select_get',
            placeholder: 'Pilih Mata Pelajaran',
            params: null
        },
        {
            id: 'id_kelompok',
            url: '/kelompok_select_get',
            placeholder: 'Pilih Kelompok',
            params: null
        },
        {
            id: 'pertemuan_ke',
            url: '/pertemuan_select_get',
            placeholder: 'Pilih Pertemuan',
            params: {
                id_mata_pelajaran: function() {
                    return $('#id_mata_pelajaran').val()
                }
            }
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
            placeholder: 'Berhasil menyimpan data batalyon',
            afterAction: function(result) {

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
            placeholder: 'Berhasil menghapus data batalyon',
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
                data: "batalyon",
                orderable: true
            },
            {
                data: "namagadik",
                orderable: true
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
</script> -->