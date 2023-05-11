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
                                        <col style="" />
                                        <col style="width:15%" />
                                        <col style="width:15%" />
                                        <col style="width:15%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Program Studi</span></th>
                                            <th><span>Tahun Ajaran</span></th>
                                            <th><span>Semester</span></th>
                                            <th><span>Angkatan</span></th>
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
                                        <label>Semester</label>
                                        <select class="form-control sel2" id="id_semester" name="id_semester" required>
                                        </select>
                                    </div>
                                </div>
                                <table id="data-mata_pelajaran" class="table table-theme table-row v-middle" style="border: 1px solid rgba(135, 150, 165, 0.15); border-radius: 0.25rem; border-spacing: 0 !important;">
                                    <colgroup>
                                        <col style="width:5%" />
                                        <col style="width:40%" />
                                        <col style="width:20%" />
                                        <col style="width:10%" />
                                        <col style="width:10%" />
                                        <col style="width:10%" />
                                        <col style="width:5%" />
                                    </colgroup>
                                    <thead style="background-color: #F9FAFB;">
                                        <tr>
                                            <th class="text-muted" style="padding: 10px;">No</th>
                                            <th class="text-muted" style="padding: 10px;">Mata Pelajaran</th>
                                            <th class="text-muted" style="padding: 10px;">Aspek</th>
                                            <th class="text-muted" style="padding: 10px;">SKS</th>
                                            <th class="text-muted" style="padding: 10px;">Jml</th>
                                            <th class="text-muted" style="padding: 10px;">Pertemuan</th>
                                            <th class="text-muted" style="padding: 10px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="counting">
                                            <td>1</td>
                                            <td><input type="hidden" name="id[0]"> <select class="form-control sel2 select2matkul" name="id_mata_pelajaran[0]" onchange="mypendidik(0)"></select></td>
                                            <td><select class="form-control sel2 select2aspek" name="id_aspek[0]" onchange="myFunction(0)"></select></td>
                                            <td><select class="form-control sel2 select2satuan" name="satuan[0]" onchange="myFunction(0)">
                                                    <option value="sks">SKS</option>
                                                    <option value="jp">JP</option>
                                                    <option value="hari">HARI</option>
                                                </select></td>
                                            <td><input type="text" class="form-control nilai" name="nilai[0]" oninput="myFunction(0)" placeholder="Jumlah"> </td>
                                            <td><input type="text" class="form-control" name="jumlah_pertemuan[0]">
                                            </td>
                                            <td><a class='del-data-mata_pelajaran' href='#' title='Click to remove this entry'><i class='fa fa-trash-o'></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <button type="button" id="add-service-button" style="width: 100%" class="btn mb-1 btn-outline-akpol">Tambah</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="text-right">
                                    <input type="hidden" id="tahun_ajaran" name="tahun_ajaran">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--     <div id="modal-list-taruna" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg animate modal-dialog-scrollable" role="document">

            <div class="modal-content ">
                <form id="verifikasitaruna">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="is_verif" value="1">
                    <div class="modal-header ">
                        <div class="modal-title text-md">List Mata Pelajaran</div>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <table id="list-kelompod-id" class="table table-theme table-row v-middle">
                            <thead>
                              <tr>
                                <th class="text-muted">NO</th>
                                <th class="text-muted">Mata Pelajaran</th>
                                <th class="text-muted">Semester</th>
                                <th class="text-muted">Tahun</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div> -->

    <div class="modal fade" id="modal-list-taruna" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg animate modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">List Mata Pelajaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="list-kelompod-id" class="table table-theme table-row v-middle">
                        <thead>
                            <tr>
                                <th class="text-muted">NO</th>
                                <th class="text-muted">Nama</th>
                                <th class="text-muted">No AK</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary verif" id="button_verif">Verif</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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

    var is_edit = 0;

    const select2Array = [{
            id: 'id_batalyon',
            url: '/batalyon_select_get',
            placeholder: 'Pilih Batalyon',
            params: null
        },
        {
            id: 'id_semester',
            url: '/semestertahunajaran_select_get',
            placeholder: 'Pilih semester',
            params: {
                id_batalyon: function() {
                    return $('#id_batalyon').val()
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
            placeholder: 'Berhasil menyimpan data paket mata kuliah',
            afterAction: function(result) {
                console.log(result);
                $("#data-mata_pelajaran tbody").html("");
                $("#datadelete").html("");
                addrows();
                $('.sel2').val(null).trigger('change')
            }
        }

        coreEvents.editHandler = {
            placeholder: '',
            afterAction: function(result) {
                is_edit = 1;
                setTimeout(function() {
                    select2Array.forEach(function(x) {
                        if (x.id == 'id_semester') {
                            $('#' + x.id).select2('trigger', 'select', {
                                data: {
                                    id: result.data[x.id],
                                    text: result.data[x.id.replace('id', 'nama')],
                                    tahun_ajaran: result.data.tahun_ajaran
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
                    });
                    $("#data-mata_pelajaran tbody").html("");
                    result.list.forEach(function(list) {

                        var count = $('tr.counting').length;
                        var $row = $("<tr class='counting'>");

                        $row.append($("<td>").html(count + 1 + '.'));
                        $row.append($("<td>").html('<input type="hidden" name="id[' + count + ']" value="' + list.id + '" > <select class="form-control sel2 select2matkul" style="width:100%" name="id_mata_pelajaran[' + count + ']" onchange="mypendidik(' + count + ')"></select>'));

                        $row.append($("<td>").html('<select class="form-control sel2 select2aspek" onchange="myFunction(' + count + ')" name="id_aspek[' + count + ']" required></select>'));

                        $row.append($("<td>").html('<select class="form-control sel2 select2satuan"  onchange="myFunction(' + count + ')" name="satuan[' + count + ']" required>\
                                                                <option value="sks">SKS</option>\
                                                                <option value="jp">JP</option>\
                                                                <option value="hari">HARI</option>\
                                                            </select>'));
                        $row.append($("<td>").html('<input type="text" class="form-control nilai" name="nilai[' + count + ']" oninput="myFunction(' + count + ')" placeholder="Jumlah"  value="' + list.nilai + '" required>'));
                        $row.append($("<td>").html('<input type="text" class="form-control" name="jumlah_pertemuan[' + count + ']" value="' + list.jumlah_pertemuan + '" required>'));

                        $row.append($("<td>").html("<a class='del-data-mata_pelajaran' data-id='" + list.id + "' href='#' title='Click to remove this entry'><i class='fa fa-trash-o'></i></a>"));

                        $row.appendTo($("#data-mata_pelajaran tbody"));
                        select2matkul();
                        $('select[name="id_mata_pelajaran[' + count + ']"]').select2("trigger", "select", {
                            data: {
                                id: list.id_mata_pelajaran,
                                text: list.nama_mata_pelajaran
                            }
                        });

                        $('select[name="id_aspek[' + count + ']"]').select2("trigger", "select", {
                            data: {
                                id: list.id_aspek,
                                text: list.nama_aspek
                            }
                        });

                        $('select[name="satuan[' + count + ']"]').select2("trigger", "select", {
                            data: {
                                id: list.satuan
                            }
                        });

                    });

                    is_edit = 0;
                }, 500);

            }
        }

        coreEvents.deleteHandler = {
            placeholder: 'Berhasil menghapus data paket mata kuliah',
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

        $(document).on("click", ".lihat", function(e) {
            let $this = $(this);

            $("#modal-list-taruna").modal('show');

            $.ajax({
                url: url_ajax + '/datapaketmatakuliah_list_get',
                type: 'post',
                data: {
                    'id': $this.data('id'),
                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                },
                dataType: 'json',
                beforeSend: function() {
                    $("#list-kelompod-id tbody").html('');
                },
                success: function(result) {
                    Swal.close();
                    if (result.success) {
                        var no = 0;
                        result.data.forEach(function(x) {
                            var sts_pendidik = '';
                            no = no + 1;
                            if (x.id_pendidik == null) {
                                sts_pendidik = '( <text style="color : red; ">Belum Ada Pendidik </text> )';
                            }
                            $("#list-kelompod-id tbody").append('<tr>\
                                <td class="text-muted">' + no + '</td>\
                                <td class="text-muted" >' + x.nama_mata_pelajaran + ' ' + sts_pendidik + ' <input type="hidden" name="id_program_studi_mata_pelajaran[]" value="' + x.id + '"></td>\
                                <td class="text-muted">' + x.nama_semester + '</td>\
                                <td class="text-muted">' + x.tahun_masuk + '</td>\
                              </tr>');

                            if (x.is_verif == 1) {
                                $("#button_verif").hide()
                            } else {
                                $("#button_verif").show();
                                $("#button_verif").attr('data-id', $this.data('id'));
                                $("#button_verif").attr('data-id_batalyon', $this.data('id_batalyon'));
                                $("#button_verif").attr('data-id_semester', $this.data('id_semester'));
                            }


                        })

                    } else {
                        Swal.fire('Info', result.message, 'info');
                    }
                },
                error: function() {
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });

        }).on('click', '.verif', function(e) {

            let $this = $(this);

            Swal.fire({
                title: "Verifikasi data ?",
                icon: "info",
                html: 'Yakin ingin memverifikasi data ini ?',
                showCancelButton: true,
                confirmButtonText: "Verif",
                confirmButtonColor: '#d33',
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: url + "_otorisasi",
                        type: 'post',
                        data: {
                            id: $this.attr('data-id'),
                            id_batalyon: $this.attr('data-id_batalyon'),
                            id_semester: $this.attr('data-id_semester'),
                            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                        },
                        dataType: 'json',
                        success: function(result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil memverifikasi data paket mata kuliah', 'success');
                                var info = coreEvents.table.page.info();
                                coreEvents.table.ajax.reload();
                                coreEvents.table.page(info.page).draw('page');
                                $("#modal-list-taruna").modal('hide');
                            } else {
                                Swal.fire('Info', result.message, 'info');
                            }
                        },
                        error: function() {
                            Swal.close();
                            Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                        }
                    });

                    // $.ajax({
                    //     url: url+"_otorisasi",
                    //     type: 'post',
                    //     data: {
                    //         id: $this.attr('data-id'),
                    //         id_batalyon: $this.attr('data-id_batalyon'),
                    //         id_semester: $this.attr('data-id_semester'),
                    //         "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                    //     },
                    //     dataType: 'json',
                    //     success: function(result) {
                    //         Swal.close();
                    //         if (result.success) {
                    //             Swal.fire('Sukses', 'Berhasil memverifikasi data paket mata kuliah', 'success');
                    //             // table.ajax.reload();
                    //             coreEvents.table.ajax.reload();
                    //             $("#modal-list-taruna").modal('hide');          
                    //         } else {
                    //             Swal.fire('Info', result.message, 'info');
                    //         }
                    //     },
                    //     error: function() {
                    //         Swal.close();
                    //         Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                    //     }
                    // });
                }
            })

        });

        $(document).on('click', '#add-service-button', function() {

            if ($("#data-mata_pelajaran").find("select.select2matkul").last().val() == null) {
                $("#data-mata_pelajaran").find("select.select2matkul").last().select2('open');
            } else if ($("#data-mata_pelajaran").find("select.select2aspek").last().val() == null) {
                $("#data-mata_pelajaran").find("select.select2aspek").last().select2('open');

            } else if ($("#data-mata_pelajaran").find("input.nilai").last().val() == '') {

                $("#data-mata_pelajaran").find("input.nilai").last().focus();

            } else {
                console.log($("#data-mata_pelajaran").find("input.nilai").last().val());
                addrows();
            }

        }).on("click", ".del-data-mata_pelajaran", function(e) {
            let $this = $(this);
            e.preventDefault();
            var $row = $(this).parent().parent();
            var retResult = confirm("Are you sure you wish to remove this entry?");

            if (retResult) {
                if ($this.data('id')) {
                    $("#datadelete").append('<input type="hidden" name="is_deleted[]" value="' + $this.data('id') + '" > ');
                }
                $row.remove();
                numberRows($("#data-mata_pelajaran"));
            }

        }).on('change', '#id_semester', function() {


            if ($("#id_semester").val() == null) {
                $("#tahun_ajaran").val('');
            } else {
                $("#tahun_ajaran").val($("#id_semester").select2('data')[0]['tahun_ajaran']);
            }

            // console.log('asd');
            // load_content();

        }).on('change', '#id_batalyon', function() {

            // console.log($("#id_semester").val());
            if ($("#id_semester").val() != null) {
                $("#id_semester").val(null).trigger('change');
            }
            // console.log('asddd');
            // load_content();


        });


        select2matkul();



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
                data: "nama_batalyon",
                orderable: true
            },
            {
                data: "tahun_masuk",
                orderable: true
            },
            {
                data: "nama_semester",
                orderable: true
            },
            {
                data: "angkatan",
                orderable: true
            },
            {
                data: "id",
                orderable: false,
                render: function(a, type, data, index) {
                    let button = '<button class="btn btn-sm btn-outline-info lihat" data-id="' + data.id + '" data-id_batalyon="' + data.id_batalyon + '"data-id_semester="' + data.id_semester + '" title="Detail" >\
                                    <i class="fa fa-eye"></i>\
                                </button>\
                                '
                    // let button = '';


                    if (auth_otorisasi == "1") {
                        if (data._is_verif == '0') {
                            button += '<button class="btn btn-sm btn-outline-success verif" data-id="' + data.id + '" data-id_batalyon="' + data.id_batalyon + '"data-id_semester="' + data.id_semester + '" title="Verif">\
                                        <i class="fa fa-check"></i>\
                                    </button>\
                                    ';
                        } else {

                        }
                    }

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


    function getAllMatkul(idnya) {
        var idmatkul = document.getElementsByClassName('select2matkul');

        for (var i = 0; i < idmatkul.length; i++) {
            var inp = idmatkul[i];
            if (inp.value == idnya) {
                return true;
            }
        }

    }

    function select2matkul() {


        $('.select2matkul').select2({
            id: function(e) {
                return e.id
            },
            placeholder: '',
            multiple: false,
            ajax: {
                url: url_ajax + '/mata_pelajaran_select_get',
                dataType: 'json',
                quietMillis: 500,
                delay: 500,
                data: function(param) {
                    var def_param = {
                        keyword: param.term, //search term
                        perpage: 5, // page size
                        id_batalyon: $('#id_batalyon').val(),
                        page: param.page || 0, // page number
                    };

                    return Object.assign({}, def_param, null);
                },
                processResults: function(data, params) {
                    params.page = params.page || 0


                    var datafilter = data.rows.map(function(el) {
                        // console.log(el.active);
                        // if (el.active==0) {
                        var o = Object.assign({}, el);
                        o.disabled = false;
                        return o;
                        // } else {

                        //     var o = Object.assign({}, el);
                        //     o.disabled = true;
                        //     // o.disabled = getAllMatkul(el.id)==undefined? false : true;
                        //     return o;
                        // }
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
                    return "Pilih mata pelajaran";
                }

                return data.text;
            },
            escapeMarkup: function(m) {
                return m;
            }
        });

        $('.select2aspek').select2({
            id: function(e) {
                return e.id
            },
            placeholder: '',
            multiple: false,
            ajax: {
                url: url_ajax + '/aspek_select_get',
                dataType: 'json',
                quietMillis: 500,
                delay: 500,
                data: function(param) {
                    var def_param = {
                        keyword: param.term, //search term
                        perpage: 5, // page size
                        page: param.page || 0, // page number
                    };

                    return Object.assign({}, def_param, null);
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
                    return "Pilih Aspek";
                }

                return data.text;
            },
            escapeMarkup: function(m) {
                return m;
            }
        });

        $('.select2satuan').select2();
    }




    function addrows() {
        var count = $('tr.counting').length;
        var $row = $("<tr class='counting'>");
        $row.append($("<td>").html(count + 1 + '.'));
        $row.append($("<td>").html('<input type="hidden" name="id[' + count + ']" > <select class="form-control sel2 select2matkul" style="width:100%" name="id_mata_pelajaran[' + count + ']" onchange="mypendidik(' + count + ')" required></select>'));

        $row.append($("<td>").html('<select class="form-control sel2 select2aspek"  onchange="myFunction(' + count + ')" name="id_aspek[' + count + ']" required></select>'));
        $row.append($("<td>").html('<select class="form-control sel2 select2satuan"  onchange="myFunction(' + count + ')" name="satuan[' + count + ']" required>\
                                                <option value="sks">SKS</option>\
                                                <option value="jp">JP</option>\
                                                <option value="hari">HARI</option>\
                                            </select>'));
        $row.append($("<td>").html('<input type="text" class="form-control nilai" name="nilai[' + count + ']"   oninput="myFunction(' + count + ')" placeholder="Jumlah" required> '));
        $row.append($("<td>").html('<input type="text" class="form-control"   name="jumlah_pertemuan[' + count + ']" required >'));
        $row.append($("<td>").html("<a class='del-data-mata_pelajaran' href='#' title='Click to remove this entry'><i class='fa fa-trash-o'></i></a>"));

        $row.appendTo($("#data-mata_pelajaran tbody"));
        // numberRows($("#data-mata_pelajaran"));

        // $(".select2matkul").append($("<select ><select/>"));
        select2matkul();
    }

    function numberRows($t) {
        var c = 0;
        $t.find("tbody tr").each(function(ind, el) {
            $(el).find("td:eq(0)").html(ind + 1 + '.');
            $(el).find("td:eq(1) input").attr("name", "id[" + ind + "]");
            $(el).find("td:eq(1) select").attr("name", "id_mata_pelajaran[" + ind + "]");
            $(el).find("td:eq(2) select").attr("name", "id_aspek[" + ind + "]");
            $(el).find("td:eq(3) select").attr("name", "satuan[" + ind + "]");
            $(el).find("td:eq(4) input").attr("name", "nilai[" + ind + "]");
            $(el).find("td:eq(5) input").attr("name", "jumlah_pertemuan[" + ind + "]");
        });
    }


    function myFunction(x) {

        let valnilai = $("input[name='nilai[" + x + "]']").val();
        let valsatuan = $("select[name='satuan[" + x + "]']").val();
        let valaspek = $("select[name='id_aspek[" + x + "]']").val();

        let elemen = $("select[name='id_aspek[" + x + "]']");

        var jmlsatuan = 0;

        if (valsatuan == "sks") {
            jmlsatuan = 16;
        } else if (valsatuan == "jp") {
            jmlsatuan = 1;
        } else if (valsatuan == "hari") {
            jmlsatuan = 1;
        } else {
            jmlsatuan = 1;
        }

        if (valaspek == 1) {

            $("input[name='jumlah_pertemuan[" + x + "]']").val((jmlsatuan * valnilai) / 2);
        } else if (valaspek == 2) {

            $("input[name='jumlah_pertemuan[" + x + "]']").val((jmlsatuan * valnilai));

        } else if (valaspek == 3) {

            $("input[name='jumlah_pertemuan[" + x + "]']").val((jmlsatuan * valnilai));
        } else if (valaspek == 4) {

            $("input[name='jumlah_pertemuan[" + x + "]']").val((jmlsatuan * valnilai));
        } else if (valaspek == 5) {

            $("input[name='jumlah_pertemuan[" + x + "]']").val((jmlsatuan * valnilai));
        } else {

            $("input[name='jumlah_pertemuan[" + x + "]']").val((jmlsatuan * valnilai));
        }



    }

    function mypendidik(x) {
        if (is_edit == 0) {
            if ($("#id_batalyon").val() == null) {
                // alert('Mohon Pilih Batalyon');
            } else {
                console.log($("select[name='id_mata_pelajaran[" + x + "]']").val());
                console.log($("#id_batalyon").val());
            }

        } else {

        }
    }
</script>