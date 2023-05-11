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
                                        <label for="id_kelompok">Kelompok</label>
                                        <select class="form-control sel2" id="id_kelompok" name="id_kelompok" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <!-- <button type="reset" class="btn btn-light">Reset</button> -->
                                <a id="d-pdf" class="btn btn-light-primary font-weight-bold" style="display: none;">Download PDF</a>
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" id="table-card" style="display:none">
            <div class="card-header">
                <strong>Daftar Kelayakan</strong>
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
                                        <div class="toolbar ">
                                            <div class="btn-group mt-2 ml-3">
                                                <div class="checkbox mr-4">
                                                    <label class="ui-check ui-check-md">
                                                        <input type="checkbox" class="checkall_uts" onClick='toggleUts(this)'>
                                                        <i class="dark-white"></i>
                                                    </label>
                                                </div>
                                                <div class="checkbox ">
                                                    <label class="ui-check ui-check-md">
                                                        <input type="checkbox" class="checkall_uas" onClick='toggleUas(this)'>
                                                        <i class="dark-white"></i>
                                                    </label>
                                                </div>
                                                <button class="btn btn-sm btn-icon btn-white sort hide" data-sort="item-title" data-toggle="tooltip" title="Sort">
                                                    <i class="sorting"></i>
                                                </button>
                                            </div>
                                            <form class="flex">
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-theme form-control-md search" placeholder="Search">
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
                                                        <th style="width:20px;">UTS Cek</th>
                                                        <th style="width:20px;">UAS Cek</th>
                                                        <th class="text-muted " data-sort="id" style="width:40px;text-align:center">No.</th>
                                                        <th class="text-muted " data-sort="item-taruna" style="min-width:200px;">Taruna</th>
                                                        <th class="text-muted " data-sort="item-status" style="width:150px;">Kelayakan</th>
                                                        <th class="text-muted " data-sort="item-status-uts" style="width:80px;">UTS</th>
                                                        <th class="text-muted " data-sort="item-status-uas" style="width:80px;">UAS</th>
                                                        <th class="text-muted " style="width:200px;">Catatan</th>
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
                                        <button class="btn btn-primary" type="submit">Submit Kelayakan</button>
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
                            console.log(result.data);
                            loadTable(result);
                            $('#d-pdf').show();
                        } else {
                            Swal.fire('Error', 'Data jadwal belum tersedia untuk pertemuan ini', 'error');
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


        select2Init("#id_batalyon", "/batalyonsmt_select_get", null, function(data) {
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
        }, function(data) {
            return data.text;
        }, function(data) {
            if (data.id === '') {
                return "Pilih Batalyon terlebih dulu";
            }

            return data.text;
        });

        select2Init("#id_kelompok", "/kelompok_select_get", null, function(data) {
            return data.text;
        }, function(data) {
            if (data.id === '') {
                return "Pilih Kelompok";
            }

            return data.text;
        });

        $('#d-pdf').on('click', function(e) {
            $(this).attr("href", url_pdf + "?o=L&id_batalyon=" + $('#id_batalyon').val() + '&id_mata_pelajaran=' + $('#id_mata_pelajaran').val() + '&id_kelompok=' + $('#id_kelompok').val());
            $(this).attr("target", "_blank");
        })

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

    function toggleUts(source) {
        var aInputs = document.getElementsByClassName('checkall_uts');
        for (var i = 0; i < aInputs.length; i++) {
            if (aInputs[i] != source && aInputs[i].className == source.className) {
                aInputs[i].checked = source.checked;
                const tr = $(aInputs[i]).closest('td').closest('tr').find('.item-status-uts').parent();
                if (aInputs[i].checked) {
                    tr.html('<span span class = "item-status-uts badge text-uppercase bg-success" > ' +
                        "Layak" +
                        '</span>');
                } else {
                    tr.html('<span span class = "item-status-uts badge text-uppercase bg-danger" > ' +
                        "Belum Layak" +
                        '</span>');
                }
            }
        }
    }

    function toggleUas(source) {
        var aInputs = document.getElementsByClassName('checkall_uas');
        for (var i = 0; i < aInputs.length; i++) {
            if (aInputs[i] != source && aInputs[i].className == source.className) {
                aInputs[i].checked = source.checked;
                const tr = $(aInputs[i]).closest('td').closest('tr').find('.item-status-uas').parent();
                if (aInputs[i].checked) {
                    tr.html('<span span class = "item-status-uas badge text-uppercase bg-success" > ' +
                        "Layak" +
                        '</span>');
                } else {
                    tr.html('<span span class = "item-status-uas badge text-uppercase bg-danger" > ' +
                        "Belum Layak" +
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
                    'item-status',
                    'item-status-uts',
                    'item-status-uas'
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

    function loadTable(result) {
        $('#table-card').show();
        var element = '';
        result.data.forEach(function(data, index) {
            console.log(data);
            var status_uts = data.is_uts === "1" ? '<span class="item-status-uts badge text-uppercase bg-success">' +
                "Layak" +
                '</span>' : '<span class="item-status-uts badge text-uppercase bg-danger">' +
                "Belum Layak" +
                '</span>';
            var status_uas = data.is_uas === "1" ? '<span class="item-status-uas badge text-uppercase bg-success">' +
                "Layak" +
                '</span>' : '<span class="item-status-uas badge text-uppercase bg-danger">' +
                "Belum Layak" +
                '</span>';
            var checkbox_uts = data.is_uts === "1" ? '<label class="ui-check m-0 ui-check-md">' +
                '<input type="checkbox" class="checkall_uts" name="is_uts[' + index + ']" value="1" checked>' +
                '<i></i>' +
                '</label>' : '<label class="ui-check m-0 ui-check-md">' +
                '<input type="checkbox" class="checkall_uts" name="is_uts[' + index + ']" value="0">' +
                '<i></i>' +
                '</label>';
            var checkbox_uas = data.is_uas === "1" ? '<label class="ui-check m-0 ui-check-md">' +
                '<input type="checkbox" class="checkall_uas" name="is_uas[' + index + ']" value="1" checked>' +
                '<i></i>' +
                '</label>' : '<label class="ui-check m-0 ui-check-md">' +
                '<input type="checkbox" class="checkall_uas" name="is_uas[' + index + ']" value="0">' +
                '<i></i>' +
                '</label>';
            var select = data.is_absen === "1" ? '' : '<select class="form-control sel2 keterangan_sel2" id="keterangan_sel2" name="keterangan[' + index + ']" required>' +
                '<option id="' + data.keterangan + '" selected="selected">' + data.keterangan + '</option>' +
                '</select>';
            element += '<tr class=" v-middle" data-id=' + data.id + ' data-index=' + index + '>' +
                '<input type="hidden" name="id[' + index + ']" value="' + data.id + '">' +
                '<input type="hidden" name="id_mata_pelajaran[' + index + ']" value="' + data.id_mata_pelajaran + '">' +
                '<input type="hidden" name="id_semester[' + index + ']" value="' + data.id_semester + '">' +
                '<input type="hidden" name="tahun_ajaran[' + index + ']" value="' + data.tahun_ajaran + '">' +
                '<td>' +
                checkbox_uts +
                ' </td>' +
                '<td>' +
                checkbox_uas +
                ' </td>' +
                '<td style="min-width:30px;text-align:center">' +
                '<small class="text-muted">' + (index + 1) + '</small>' +
                ' </td>' +
                '<td class="flex">' +
                '<input type="hidden" name="id_user_taruna[' + index + ']" value="' + data.id_user_taruna + '">' +
                '<h6 class="item-taruna ajax h-1x">' +
                data.nama_taruna +
                '</h6>' +
                '<div class="item-noaklong text-muted h-1x d-none d-sm-block">' +
                data.noaklong +
                '</div>' +
                '</td>' +
                '<td class="flex">' +
                '<h6 class="item-taruna ajax h-1x">' + [
                    data.kehadiran || "Belum ada data"
                ] +
                '</h6>' +
                '</td>' +
                '<td>' +
                status_uts + '</td>' +
                '<td>' +
                status_uas + '</td>' +
                '<td>' +
                '<input type="text" class="form-control" name="keterangan[' + index + ']" placeholder="Masukkan catatan">' +
                '</td>' +
                '</tr>';
        });
        $('#list-container').html(element);
        setTimeout(function() {
            initList();
            $('input.checkall_uts').change(function() {
                const tr = $(this).closest('td').closest('tr').find('.item-status-uts').parent();
                const index = $(this).closest('td').closest('tr').data('index');
                if (this.checked) {
                    tr.html('<span span class = "item-status-uts badge text-uppercase bg-success" > ' +
                        "Layak" +
                        '</span>');
                } else {
                    tr.html('<span span class = "item-status-uts badge text-uppercase bg-danger" > ' +
                        "Belum Layak" +
                        '</span>');
                }
            });
            $('input.checkall_uas').change(function() {
                const tr = $(this).closest('td').closest('tr').find('.item-status-uas').parent();
                const index = $(this).closest('td').closest('tr').data('index');
                if (this.checked) {
                    tr.html('<span span class = "item-status-uas badge text-uppercase bg-success" > ' +
                        "Layak" +
                        '</span>');
                } else {
                    tr.html('<span span class = "item-status-uas badge text-uppercase bg-danger" > ' +
                        "Belum Layak" +
                        '</span>');
                }
            });

        }, 500);
    }

    function resetTable() {
        $('#table-card').hide();
        $('#list-container').html('');
    }
</script>