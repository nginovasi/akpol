<style>
    .custom-file-label {
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        display: inline-block;
        padding-right: 20%;
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
                                            <th><span>Mata Pelajaran</span></th>
                                            <th><span>Kelompok</span></th>
                                            <th><span>Ketua TIM</span></th>
                                            <th><span>Info Semester</span></th>
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
        <div class="collapse" id="collapseKelas">
            <div class="card card-body">
                <div class="table-responsive">
                    <table id="datatable-kelas" class="table table-theme table-row v-middle">
                        <thead>
                            <tr>
                                <th><span>#</span></th>
                                <th><span>Kelompok</span></th>
                                <th><span>Mata Pelajaran</span></th>
                                <th><span>Pertemuan Ke</span></th>
                                <th class="column-2action"></th>
                            </tr>
                        </thead>
                        <tbody id="list_kelas">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="px-2">
                    <div class="py-3">
                        <div class="row">
                            <div class="col-6">
                                <small class="text-muted">Mata Pelajaran</small>
                                <div class="my-2" id="view_mata_pelajaran">Coch Jose</div>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Info Semester</small>
                                <div class="my-2" id="view_info_semester">James Richo</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <small class="text-muted">Kelompok</small>
                                <div class="my-2" id="view_kelompok">James Richo</div>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Pertemuan</small>
                                <div class="my-2" id="view_pertemuan_ke">James Richo</div>
                            </div>
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

        select2Array.forEach(function(x) {
            select2Init('#' + x.id, x.url, x.placeholder, x.params);
        });

        $("#tipe_tugas").select2({
            placeholder: 'Pilih Tipe Tugas'
        });

        $(document).on('submit', '#form', function(e) {
            e.preventDefault();
            let $this = $(this);
            console.log($this);

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
                            console.log(result.data);
                            $('.custom-file-label').html(result.data.file_materi_tugas);
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
            event.stopPropagation();
            let $this = $(this);
            var detail;
            if ($this.data('detail') !== undefined) {

                detail = JSON.parse($this.data('detail').replaceAll("'", '"'));
                console.log(detail);
                var is_ketua_tim = detail.is_ketua_tim ? parseInt(detail.is_ketua_tim) : 0;

                var formData = new FormData();
                formData.append('id_mata_pelajaran', detail.id_mata_pelajaran);
                formData.append('id_batalyon', detail.id_batalyon);
                formData.append('id_semester', detail.id_semester);
                formData.append('id_kelompok', detail.id_kelompok_taruna);

                formData.append("<?= csrf_token() ?>", "<?= csrf_hash() ?>");
                $.ajax({
                    url: url_load + '_kelas',
                    method: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        if (result.success) {
                            if (result.data.length > 0) {
                                loadTabelKelas(result, is_ketua_tim);
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

        }).on('click', '.kelas-detail', function(event) {
            event.stopPropagation();
            let $this = $(this);
            var detail;
            if ($this.data('detail') !== undefined) {

                detail = JSON.parse($this.data('detail').replaceAll("'", '"'));
                console.log(detail);

                for (key in detail) {
                    $('#view_' + key).html(detail[key]);
                };

                var formData = new FormData();
                formData.append('id_mata_pelajaran', detail.id_mata_pelajaran);
                formData.append('id_batalyon', detail.id_batalyon);
                formData.append('id_semester', detail.id_semester);
                formData.append('id_kelompok', detail.id_kelompok_taruna);

                formData.append("<?= csrf_token() ?>", "<?= csrf_hash() ?>");
                $.ajax({
                    url: url_load + '_rekap',
                    method: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        if (result.success) {
                            if (result.data.length > 0) {
                                loadTabelKelas(result, is_ketua_tim);
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

        })

        table = $('#datatable').DataTable({
            "dom": "<'row'<'col-sm-4'l><'col-sm-2'B><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p<br/>i>>",
            // "dom": 'Bfrtip',

            // "dom": 'Blfrtip',
            "buttons": ['excelFlash', 'excel', 'pdf'],
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
                data: "mata_pelajaran",
                orderable: true
            },

            {
                data: "kelompok",
                orderable: true
            },
            {
                data: "is_ketua_tim",
                orderable: true,
                render: function(a, type, data, index) {
                    if (data.is_ketua_tim === '1') {
                        return 'Ya';
                    } else {
                        return 'Tidak';
                    }

                }
            },
            {
                data: "info_semester",
                orderable: true
            },
            {
                data: "id",
                orderable: false,
                render: function(a, type, data, index) {

                    console.log(data);
                    let button = ""

                    button += '<button class="btn btn-sm btn-outline-primary show" type="button" data-toggle="collapse" data-target="#collapseKelas" data-id="' + data.id + '" data-detail="' + JSON.stringify(data).replaceAll('"', "'") + '" title="Tampilkan Tugas">\
                                    <i class="fa fa-eye"></i>\
                                </button>\
                                ';

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

    function loadTabelKelas(result, is_ketua_tim) {
        console.log(result);
        var kelas = '';
        kelas += '\
                    <table class="table table-theme v-middle m-0">\
                        <tbody>';
        var no = 0;
        result.data.forEach(function(list) {
            no++;
            kelas += '\
                        <tr class=" " >\
                            <td style="min-width:30px;text-align:center">\
                                ' + no + '\
                            </td>\
                            <td class="flex">\
                                <a class="item-company ajax h-1x kelas-detail" data-toggle="collapse" data-target="#collapseExample" data-id="' + list.id_tugas + '" data-detail="' + JSON.stringify(list).replaceAll('"', "'") + '" title="Tampilkan Tugas">\
                                        ' + list.namataruna + '\
                                </a>\
                                <div class="item-mail text-muted h-1x d-none d-sm-block">\
                                    ' + list.noaklong + '\
                                </div>\
                            </td>\
                            <td class="flex">\
                                ' + list.noaklong + '\
                            </td>';
            for(key in list){
                if(key.includes('pertemuan_ke')){
                    kelas += '<td class="flex">\
                            '+ key +' = '+ list[key] + '\
                        </td>';
                }
            }

            kelas += '</tr>';
        })

        kelas += '\
                        </tbody>\
                    </table>';

        $('#list_kelas').html(kelas);
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
            // const div = document.createElement('div');
            // const input = document.createElement('input');

            const input = document.getElementById(id);
            // div.className = 'filterHeader';

            addEventListeners(input, colIndex);

            // div.appendChild(input);

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


        hot = new Handsontable(container, {
            data: result.data,
            width: '100%',
            height: 600,
            colHeaders: true,
            stretchH: 'all',
            rowHeaders: true,
            manualColumnResize: true,
            fixedColumnsLeft: 6,
            fixedRowsTop: 0,
            contextMenu: false,
            manualColumnFreeze: true,
            filters: true,
            afterGetColHeader: addInput,
            beforeOnCellMouseDown: doNotSelectColumn,
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

                if (change[0][3] <= 100 && change[0][3] >= 0) {
                    const formData = {
                        "<?= csrf_token() ?>": "<?= csrf_hash() ?>",
                        'id': rowData[0],
                        'id_user_taruna': rowData[1],
                        'id_jadwal_tugas': rowData[3],
                        'nilai': rowData[7],
                        'catatan': rowData[8]
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
    }

    function nilaiValidator(value, callback) {
        if (value < 101 && value >= 0) {
            callback(true);
        } else {
            callback(false);
        }
    }
</script>