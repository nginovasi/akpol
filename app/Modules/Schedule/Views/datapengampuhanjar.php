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
                                    <colgroup>
                                        <col style="width:1%" />
                                        <col style="width:25%" />
                                        <col style="width:15%" />
                                        <col style="" />
                                        <col style="width:15%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Mata Pelajaran</span></th>
                                            <th><span>Batalyon</span></th>
                                            <th><span>Kurikulum</span></th>
                                            <th><span>Pendidik</span></th>
                                            <th class="column-2action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                            <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off">
                                <div id="datadelete"></div>
                                <?= csrf_field(); ?>
                                <div class="form-group row">
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
                                <table id="data-pendidik" class="table table-theme table-row v-middle" style="border: 1px solid rgba(135, 150, 165, 0.15); border-radius: 0.25rem; border-spacing: 0 !important">
                                    <colgroup>
                                        <col style="width:10%" />
                                        <col style="" />
                                        <col style="width:10%" />
                                        <col style="width:15%" />
                                    </colgroup>
                                    <thead style="background-color: #F9FAFB;">
                                        <tr>
                                            <th class="text-muted" style="padding: 10px;">No</th>
                                            <th class="text-muted" style="padding: 10px;">Pendidik</th>
                                            <th class="text-muted" style="padding: 10px;">Ketua Tim</th>
                                            <th class="text-muted" style="padding: 10px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="counting">
                                            <td>1</td>
                                            <td><input type="hidden" name="id[0]"> <select class="form-control sel2 select2pendidik" id="id_pendidik" name="id_pendidik[0]" required></select></td>
                                            <td><label class="ui-switch ui-switch-md info m-t-xs"><input type="checkbox" name="is_ketua_tim[0]"><i></i></label></td>
                                            <td><a class='del-data-pendidik' href='#' title='Click to remove this entry'><i class='fa fa-trash-o'></i></a></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4">
                                                <button type="button" id="add-service-button" style="width: 100%" class="btn mb-1 btn-outline-akpol">Tambah</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-list-taruna" class="modal fade" data-backdrop="true">
        <div class="modal-dialog animate">
            <div class="modal-content ">
                <div class="modal-header ">
                    <div class="modal-title text-md">List Kelompok Taruna</div>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table id="list-kelompod-id" class="table table-theme table-row v-middle">
                        <thead>
                            <tr>
                                <th class="text-muted">NO</th>
                                <th class="text-muted">TARUNA</th>
                                <th class="text-muted">NIK</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="modaldetail" class="modal fade" data-backdrop="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <form id="verifikasitaruna">
                    <div class="modal-header ">
                        <div class="modal-title text-md">Detail Pengampu Hanjar</div>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="p-4">
                            <div class="row mb-4">
                                <div class="row col-12">
                                    <div class="col-6">
                                        <small class="text-muted">Batalyon</small>
                                        <div class="my-2" id="batalyon_modal">...</div>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Mata Pelajaran</small>
                                        <div class="my-2" id="mata_pelajaran_modal">...</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <table class="table table-theme table-row v-middle" style="border: 1px solid rgba(135, 150, 165, 0.15); border-radius: 0.25rem; border-spacing: 0 !important">
                                    <thead style="background-color: #F9FAFB;">
                                        <tr>
                                            <th class="text-muted" style="padding: 10px;">No</th>
                                            <th class="text-muted" style="padding: 10px;">Nama Pendidik</th>
                                            <th class="text-muted" style="padding: 10px;"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="list-modal-body">
                                    </tbody>
                                </table>
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
    const urldetail_load = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "detail_load" ?>';


    var dataStart = 0;
    var coreEvents;

    const select2Array = [{
            id: 'id_batalyon',
            url: '/batalyon_select_get',
            placeholder: 'Pilih Batalyon',
            params: null
        },
        {
            id: 'id_mata_pelajaran',
            url: '/mata_pelajaran_select_get',
            placeholder: 'Pilih Mata Pelajaran',
            params: {
                'id_kurikulum': function() {
                    return $("#id_batalyon").select2('data')['0']['id_kurikulum'];
                }
            }
        }
    ];

    $(document).ready(function() {
        addselect2();
        coreEvents = new CoreEvents();
        coreEvents.url = url;
        coreEvents.ajax = url_ajax;
        coreEvents.csrf = {
            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
        };
        coreEvents.tableColumn = datatableColumn();

        coreEvents.insertHandler = {
            placeholder: 'Berhasil menyimpan data pengampu hanjar',
            afterAction: function(result) {
                $("#data-pendidik tbody").html("");
                $("#datadelete").html("");
                addrows();
                $('.sel2').val(null).trigger('change');
                // reload window
                window.location.reload();
            }
        }

        coreEvents.editHandler = {
            placeholder: '',
            afterAction: function(result) {
                setTimeout(function() {
                    select2Array.forEach(function(x) {
                        if (x.id != 'taruna') {
                            if (x.id == 'id_kelompok') {
                                $('#' + x.id).select2('trigger', 'select', {
                                    data: {
                                        id: result.data[x.id],
                                        text: result.data[x.id.replace('id', 'nama')],
                                        max_kapasitas: result.data.max_kapasitas
                                    }
                                });
                            } else {
                                $('#' + x.id).select2('trigger', 'select', {
                                    data: {
                                        id: result.data[x.id],
                                        text: result.data[x.id.replace('id', 'nama')]
                                    }
                                });
                            }
                        }
                    });
                    $("#data-pendidik tbody").html("");
                    result.list.forEach(function(list) {

                        var count = $('tr.counting').length;
                        var $row = $("<tr class='counting'>");

                        $row.append($("<td>").html(count + 1 + '.'));
                        $row.append($("<td>").html('<input type="hidden" name="id[' + count + ']" value="' + list.id + '" > <select class="form-control sel2 select2pendidik" style="width:100%" name="id_pendidik[' + count + ']" required></select>'));
                        if (list.is_ketua_tim == 1) {
                            $row.append($("<td>").html('<label class="ui-switch ui-switch-md info m-t-xs"><input type="checkbox" name="is_ketua_tim[' + count + ']"  value="1" checked><i></i></label>'));
                        } else {
                            $row.append($("<td>").html('<label class="ui-switch ui-switch-md info m-t-xs"><input type="checkbox" name="is_ketua_tim[' + count + ']"  value="0" ><i></i></label>'));
                        }
                        $row.append($("<td>").html("<a class='del-data-pendidik' data-id='" + list.id + "' href='#' title='Click to remove this entry'><i class='fa fa-trash-o'></i></a>"));

                        $row.appendTo($("#data-pendidik tbody"));
                        addselect2();
                        $('select[name="id_pendidik[' + count + ']"]').select2("trigger", "select", {
                            data: {
                                id: list.id_pendidik,
                                text: list.nama_pendidik
                            }
                        });

                    });
                }, 500);
            }
        }

        coreEvents.deleteHandler = {
            placeholder: 'Berhasil menghapus data pengampu hanjar',
            afterAction: function() {}
        }

        coreEvents.resetHandler = {
            action: function() {}
        }

        coreEvents.load();

        select2Array.forEach(function(x) {
            coreEvents.select2Init('#' + x.id, x.url, x.placeholder, x.params);
        });

        $(document).on('click', '#add-service-button', function() {

            if ($("#data-pendidik").find("select.select2pendidik").last().val() == null) {
                $("#data-pendidik").find("select.select2pendidik").last().select2('open');
            } else {
                addrows();
            }

        }).on("click", ".del-data-pendidik", function(e) {
            let $this = $(this);
            e.preventDefault();
            var $row = $(this).parent().parent();
            var retResult = confirm("Are you sure you wish to remove this entry?");

            if (retResult) {
                if ($this.data('id')) {
                    $("#datadelete").append('<input type="hidden" name="is_deleted[]" value="' + $this.data('id') + '" > ');
                }
                $row.remove();
                numberRows($("#data-pendidik"));
            }

        }).on('click', '.detail', function() {
            let $this = $(this);
            $('#id_modal').val($(this).data('id'));
            Swal.fire({
                title: "",
                icon: "info",
                text: "Proses mengambil data, mohon ditunggu...",
                didOpen: function() {
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
                success: function(result) {
                    Swal.close();
                    $('#list-modal-body').html('');

                    $('#modaldetail').modal('show');

                    if (result.success) {

                        result.list.forEach((value, index) => {

                            var is_ketua_tim = "Anggota Tim";

                            if (value.is_ketua_tim === "1") {
                                is_ketua_tim = "Ketua Tim"
                            }

                            $('#list-modal-body').append('<tr>\
                                                    <td>' + (index + 1) + '</td>\
                                                    <td>' + value.nama_pendidik + '</td>\
                                                    <td>' + is_ketua_tim + '</td>\
                                                </tr>');
                        })


                        $('#batalyon_modal').html(result.data.nama_batalyon);
                        $('#mata_pelajaran_modal').html(result.data.nama_mata_pelajaran);
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

    function getAllpendidik(idnya) {
        var idpendidik = document.getElementsByClassName('select2pendidik');
        for (var i = 0; i < idpendidik.length; i++) {
            var inp = idpendidik[i];
            if (inp.value == idnya) {
                return true;
            }
        }
    }

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
                data: "mata_pelajaran",
                orderable: true
            },
            {
                data: "batalyon",
                orderable: true
            },
            {
                data: "kurikulum",
                orderable: true
            },
            {
                data: "pendidik",
                orderable: false,
                render: function(a, type, data, index) {

                    let profil = '<div class="d-flex flex-wrap align-items-center avatar-group"> ';
                    const obj = JSON.parse(data.pendidik);
                    if (obj.length <= 4) {
                        for (let i = 0; i < obj.length; i++) {
                            if (obj[i]['photopath'] != null) {

                                profil += '<a class="w-24 avatar circle bg-info-lt" data-pjax-state=""><img src="' + obj[i]['photopath'] + '" alt="' + obj[i]['nama'].slice(0, 1) + '"></a>';
                            } else {

                                profil += '<a class="w-24 avatar circle bg-info-lt" data-pjax-state=""><span class="w-24 avatar gd-warning">\
                            <span class="b-white avatar-right"></span>' + obj[i]['nama'].slice(0, 1) + '</span></a>';
                            }
                        }
                    } else {
                        for (let i = 0; i < 5; i++) {

                            // profil += '<a class="w-24 avatar circle bg-info-lt" data-pjax-state=""><img src="'+obj[i]['photopath']+'" alt="'+obj[i]['nama'].slice(0, 1)+'"></a>';

                            if (obj[i]['photopath'] != null) {

                                profil += '<a class="w-24 avatar circle bg-info-lt" data-pjax-state=""><img src="' + obj[i]['photopath'] + '" alt="' + obj[i]['nama'].slice(0, 1) + '"></a>';
                            } else {

                                profil += '<a class="w-24 avatar circle bg-info-lt" data-pjax-state=""><span class="w-24 avatar gd-warning">\
                            <span class="b-white avatar-right"></span>' + obj[i]['nama'].slice(0, 1) + '</span></a>';
                            }
                        }
                    }
                    // profil += '<a class="w-24 avatar circle bg-info-lt" data-pjax-state=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a>';
                    profil += ' </div>';
                    return profil;
                }
            },
            {
                data: "id",
                orderable: false,
                render: function(a, type, data, index) {
                    // let button = '<button class="btn btn-sm btn-outline-info lihat" data-id="'+data.id+'" title="Detail" data-toggle="modal" data-toggle-class="fade-down" data-toggle-class-target=".animate">\
                    //             <i class="fa fa-eye"></i>\
                    //         </button>\
                    //         '
                    let button = '';

                    button += '<button class="btn btn-sm btn-outline-info detail" data-id="' + data.id + '" title="Detail">\
                                        <i class="fa fa-eye"></i>\
                                    </button>\
                                    ';


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

    function addselect2() {
        $('.select2pendidik').select2({
            id: function(e) {return e.id},
            placeholder: '',
            multiple: false,
            ajax: {
                url: url_ajax + '/pendidik_select_get',
                dataType: 'json',
                quietMillis: 500,
                delay: 500,
                data: function(param) {
                    var def_param = {
                        keyword: param.term, //search term
                        perpage: 5, // page size
                        page: param.page || 0 // page number,
                    };
                    return Object.assign({}, def_param, null);
                },
                processResults: function(data, params) {
                    params.page = params.page || 0
                    var datafilter = data.rows.map(function(el) {
                        var o = Object.assign({}, el);
                        o.disabled = getAllpendidik(el.id) == undefined ? false : true;
                        return o;
                    });
                    return {
                        results: datafilter,
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
                    return "Pilih Pendidik";
                }
                return data.text;
            },
            escapeMarkup: function(m) {
                return m;
            }
        });
    }

    function addrows() {
        var count = $('tr.counting').length;
        var $row = $("<tr class='counting'>");
        $row.append($("<td>").html(count + 1 + '.'));
        $row.append($("<td>").html('<input type="hidden" name="id[' + count + ']" > <select class="form-control sel2 select2pendidik" style="width:100%" name="id_pendidik[' + count + ']" required></select>'));
        // check if last ui-switch has checked
        var lastChecked = $("#data-pendidik tbody tr:last-child td:eq(2) input").is(":checked");
        if (lastChecked) {
            $row.append($("<td>").html('<label class="ui-switch ui-switch-md info m-t-xs"><input type="checkbox" name="is_ketua_tim[' + count + ']" value="0" ><i></i></label>'));
        } else {
            $row.append($("<td>").html('<label class="ui-switch ui-switch-md info m-t-xs"><input type="checkbox" name="is_ketua_tim[' + count + ']" value="0" ><i></i></label>'));
        }
        // $row.append($("<td>").html('<label class="ui-switch ui-switch-md info m-t-xs"><input type="checkbox" name="is_ketua_tim[' + count + ']" value="1" ><i></i></label>'));
        $row.append($("<td>").html("<a class='del-data-pendidik' href='#' title='Click to remove this entry'><i class='fa fa-trash-o'></i></a>"));
        $row.appendTo($("#data-pendidik tbody"));
        addselect2();
    }

    function numberRows($t) {
        var c = 0;
        $t.find("tbody tr").each(function(ind, el) {
            $(el).find("td:eq(0)").html(ind + 1 + '.');
            $(el).find("td:eq(1) input").attr("name", "id[" + ind + "]");
            $(el).find("td:eq(1) select").attr("name", "id_pendidik[" + ind + "]");
            $(el).find("td:eq(2) input").attr("name", "is_ketua_tim[" + ind + "]");
        });
    }
</script>