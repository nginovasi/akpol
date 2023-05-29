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
                            <input type="hidden" class="form-control" id="id" name="id" value="" required>
                            <input type="hidden" class="form-control" id="type_code" name="type_code" value="<?= $rules->type_code ?>" required>
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <div class="row">
                                    <!-- <div class="col-6">
                                        <label for="id_semester">Tahun Ajaran</label>
                                        <input type="number" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="####" min="2019" max="2022" required>
                                    </div> -->
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
                <strong>Tabel Nilai</strong>
            </div>
            <div class="card-body">
                <div class="padding">
                    <div class="tab-content">
                        <!-- <div class="col-sm-12">
                            <div class="list list-row block" id="list-container">
                            </div>
                        </div> -->
                        <h5 class="card-title">Input Nilai Per Taruna</h5>
                        <small class="text-muted" id="input-title" style="display:none">Mata pelajaran</small>
                        <div class="page-content page-container" id="page-content">
                            <form id="absensi-form">
                                <div class="padding" id="pad-container">
                                    <?= csrf_field(); ?>
                                    <!-- <pre  class="console">Click "Load" to load data from server</pre> -->
                                    <div class="alert alert-console alert-info" role="alert">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="16" x2="12" y2="12"></line>
                                            <line x1="12" y1="8" x2="12" y2="8"></line>
                                        </svg>
                                        <span class="mx-2" id="example1console">Kolom nilai dapat diubah dan disimpans secara otomatis</span>
                                    </div>
                                    <div class="alert alert-warning" role="alert">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="16" x2="12" y2="12"></line>
                                            <line x1="12" y1="8" x2="12" y2="8"></line>
                                        </svg>
                                        <span class="mx-2" id="example2console">Kolom nilai dapat diubah dan disimpans secara otomatis</span>
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
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css" />
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


    var tahun_ajaran = null;
    var dataStart = 0;
    var table;
    var noticed = true;
    var hot;

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
                            var id_batalyon = document.getElementById("id_batalyon");
                            var nama_batalyon = id_batalyon.options[id_batalyon.selectedIndex].text;
                            var id_mapel = document.getElementById("id_mata_pelajaran");
                            var nama_mapel = id_mapel.options[id_mapel.selectedIndex].text;
                            $('#input-title').show();
                            $('#input-title').html('Daftar nilai taruna Batalyon <strong>' + nama_batalyon + '</strong> mata pelajaran <strong>' + nama_mapel + ' </strong>');
                            $('#d-pdf').show();
                        } else {
                            Swal.fire('Data Tidak Ditemukan', 'Data nilai belum tersedia untuk semester ini', 'warning');
                            $('#table-card').hide();
                            $('#input-title').hide();
                            $('#d-pdf').hide();
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
        }).on('reset', '#form', function() {
            $('#id').val('');
            $(".sel2").val(null).trigger('change');
        }).on('change', '#id_batalyon', function() {
            $("#id_mata_pelajaran").val(null).trigger('change');
        });

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

        select2Init("#id_mata_pelajaran", "/matapelajaranbybatalyon_select_get", {
            id_batalyon: function() {
                return $('#id_batalyon').val()
            },
            id_aspek: 1,
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
                return "Pilih Batalyon terlebih dulu";
            }

            return data.text;
        });

        $('#id_mata_pelajaran').on('select2:select', function(e) {
            var data = e.params.data;
            tahun_ajaran = data.tahun_ajaran;
        });


        $('#d-pdf').on('click', function(e) {
            $(this).attr("href", url_pdf + "?o=L&id_batalyon=" + $('#id_batalyon').val() + '&id_mata_pelajaran=' + $('#id_mata_pelajaran').val() + '&type_code=<?= $_SESSION['usertype'] ?>&userid=<?= $_SESSION['id'] ?>');
            $(this).attr("target", "_blank");
        })

        //fullsceen logic
        var elem = document.getElementById("absensi-form");

        elem.onclick = function() {
            elem.style.height = '100%';
            elem.style.backgroundColor = 'white';
            document.getElementById("pad-container").style.height = '90%';
            document.getElementById("list-container").style.height = '95%';
            req = elem.requestFullScreen || elem.webkitRequestFullScreen || elem.mozRequestFullScreen;
            req.call(elem);
        }

        document.addEventListener('fullscreenchange', exitHandler);
        document.addEventListener('webkitfullscreenchange', exitHandler);
        document.addEventListener('mozfullscreenchange', exitHandler);
        document.addEventListener('MSFullscreenChange', exitHandler);

        function exitHandler() {
            if (!document.fullscreenElement && !document.webkitIsFullScreen && !document.mozFullScreen && !document.msFullscreenElement) {
                document.getElementById("pad-container").style.height = null;
                document.getElementById("list-container").style.height = '600px';
            }
        }
        // end fullscreen logic

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

    function loadTable(result) {
        if (hot !== undefined && !hot.isDestroyed) {
            hot.destroy();
        }
        $('#table-card').show();
        const container = document.querySelector('#list-container');
        const exampleConsole = document.querySelector('#example1console');
        const example2Console = document.querySelector('#example2console');
        let autosaveNotification;

        let limit = result.data[0];

        example2Console.innerText = 'Batas atas nilai untuk LJK adalah : (' + limit.limit_ljk + ') & batas atas nilai untuk essay adalah : (' + limit.limit_esai + ') ';

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
            if (input) {
                input.addEventListener('keydown', event => {
                    debounceFn(colIndex, event, input);
                });
            }


        };

        // Build elements which will be displayed in header.
        const getInitializedElements = (colIndex, id) => {
            var input = document.getElementById(id);
            if (!input) {
                input = document.createElement('input');
                input.setAttribute("id", id);
            }
            addEventListeners(input, colIndex);
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
            manualColumnResize: true,
            manualColumnFreeze: true,
            fixedColumnsLeft: 9,
            fixedRowsTop: 0,
            rowHeaders: true,
            contextMenu: false,
            filters: true,
            afterGetColHeader: addInput,
            beforeOnCellMouseDown: doNotSelectColumn,
            hiddenColumns: {
                columns: [0, 1, 2, 3, 4, 5, 9]
            },
            licenseKey: 'non-commercial-and-evaluation',
            nestedHeaders: [
                [{
                    label: '',
                    colspan: 10,
                    rowspan: 2,
                }, {
                    label: 'NILAI',
                    colspan: 14
                }],
                [{
                        label: 'TARUNA',
                        colspan: 10,
                        rowspan: 2,
                    }, {
                        label: 'UTS',
                        colspan: 2
                    }, {
                        label: 'UAS',
                        colspan: 2
                    }, {
                        label: 'HER',
                        colspan: 2
                    },
                    {
                        label: '',
                        colspan: 3
                    }, {
                        label: 'NILAI AKHIR',
                        colspan: 4
                    }
                ],
                ['#id', '#id_mata_pelajaran', '#id_user_taruna', '#id_semester', '#id_batalyon', '#batasher', 'Nama Taruna', 'No AK', 'Kelompok', 'Thn Ajaran', 'LJK', 'ESSAY', 'LJK', 'ESSAY', 'LJK', 'ESSAY', 'PROSJAR', 'TUGAS', 'HER', 'NILAI AKHIR', 'KATEGORI', 'BOBOT', 'KLASIFIKASI']
            ],
            columns: [{
                    data: 'id',
                    readOnly: true
                },
                {
                    data: 'id_mata_pelajaran',
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
                    data: 'id_batalyon',
                    readOnly: true
                },
                {
                    data: 'batas_her',
                    readOnly: true
                },
                {
                    data: 'namataruna',
                    readOnly: true,
                    renderer: herValidator,
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
                    renderer: function(hotInstance, TD, row, col, prop, value, cellProperties) {
                        TD.innerHTML = tahun_ajaran;
                    },
                    readOnly: true
                },
                {
                    data: 'uts_ljk',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: function(value, callback) {
                       // console.log(result.data[0].id_semester);
                        // check if semester 7 and 8 then value always 0
                        // if (semester == 7 || semester == 8) {
                        //     return true;
                        // }
                        return nilaiValidator(value, callback, limit.limit_ljk);
                    },
                    allowInvalid: false,
                    renderer: colorValidator,
                },
                {
                    data: 'uts_esai',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: function(value, callback) {
                        return nilaiValidator(value, callback, limit.limit_esai);
                    },
                    allowInvalid: false,
                    renderer: colorValidator
                },
                {
                    data: 'uas_ljk',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: function(value, callback) {
                        return nilaiValidator(value, callback, limit.limit_ljk);
                    },
                    renderer: colorValidator,
                    allowInvalid: false
                },
                {
                    data: 'uas_esai',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: function(value, callback) {
                        return nilaiValidator(value, callback, limit.limit_esai);
                    },
                    renderer: colorValidator,
                    allowInvalid: false
                },
                {
                    data: 'her_ljk',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: function(value, callback) {
                        return nilaiValidator(value, callback, limit.limit_ljk);
                    },
                    allowInvalid: false
                },
                {
                    data: 'her_esai',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: function(value, callback) {
                        return nilaiValidator(value, callback, limit.limit_esai);
                    },
                    allowInvalid: false
                },
                {
                    data: 'proses_ajar',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: defaultValidator,
                    renderer: colorValidator,
                    allowInvalid: false
                },
                {
                    data: 'tugas',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: defaultValidator,
                    renderer: colorValidator,
                    allowInvalid: false
                },
                {
                    data: 'her',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: defaultValidator,
                    allowInvalid: false
                },
                {
                    data: 'nilai_akhir',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: defaultValidator,
                    renderer: herValidator,
                    // readOnly: true,
                },
                {
                    data: 'kategori',
                    type: 'text',
                    allowEmpty: false,
                    readOnly: true,
                },
                {
                    data: 'bobot',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: defaultValidator,
                    readOnly: true,
                },
                {
                    data: 'klasifikasi',
                    type: 'text',
                    allowEmpty: false,
                    readOnly: true,
                },
            ],
            beforeChange: (change, source) => {
                // [[row, prop, oldVal, newVal], ...]
                const rowData = hot.getData()[change[0][0]];
                if (auth_insert === '1' || auth_edit === '1') {
                    if (auth_edit === '1' && auth_insert !== '1') {
                        if (rowData[0] === null) {
                            return true;
                        } else {
                            Swal
                                .fire({
                                    title: "Error!",
                                    timer: 1000,
                                    showConfirmButton: false,
                                    text: "Anda tidak memiliki akses",
                                    icon: "error",
                                    allowOutsideClick: true,
                                    target: document.getElementById("absensi-form"),
                                })
                            return false;
                        }
                    } else {
                        return true
                    }
                } else {
                    Swal
                        .fire({
                            title: "Error!",
                            timer: 1000,
                            showConfirmButton: false,
                            text: "Anda tidak memiliki akses",
                            icon: "error",
                            allowOutsideClick: true,
                            target: document.getElementById("absensi-form"),
                        })
                    return false;
                }

            },
            afterChange: function(change, source) {
                if (source === 'loadData') {
                    return;
                }
                clearTimeout(autosaveNotification);
                const rowData = hot.getData()[change[0][0]];
                autosaveNotification = setTimeout(() => {
                    $(".alert-console").prop('class', 'alert alert-console alert-info');
                    exampleConsole.innerText = 'Ubahan pada tabel akan otomatis disimpan';
                }, 5000);

                var limitNilai = 100;

                if (change[0][1].includes('ljk')) {
                    limitNilai = limit.limit_ljk;
                } else if (change[0][1].includes('esai')) {
                    limitNilai = limit.limit_esai;
                }
                if (change[0][3] <= limitNilai && change[0][3] >= 0) {
                    const formData = {
                        "<?= csrf_token() ?>": "<?= csrf_hash() ?>",
                        'id': rowData[0],
                        'id_mata_pelajaran': rowData[1],
                        'id_user_taruna': rowData[2],
                        'id_semester': rowData[3],
                        'id_batalyon': rowData[4],
                        'uts_ljk': rowData[10],
                        'uts_esai': rowData[11],
                        'uas_ljk': rowData[12],
                        'uas_esai': rowData[13],
                        'her_ljk': rowData[14],
                        'her_esai': rowData[15],
                        'proses_ajar': rowData[16],
                        'tugas': rowData[17],
                        'her': rowData[18],
                        'nilai_akhir': rowData[19],
                        'kategori': rowData[20],
                        'bobot': rowData[21],
                        'klasifikasi': rowData[22]
                    };
                    $.ajax({
                        url: url_insert,
                        method: "POST",
                        data: formData,
                        dataType: 'json',
                        success: function(result) {
                            if (result.success) {
                                let res = result.data;
                                let row = hot.toPhysicalRow(change[0][0]);

                                // hot.updateSettings({
                                //     readOnly: true
                                // });

                                for (key in result.data) {
                                    hot.setSourceDataAtCell(row, key, result.data[key]);
                                }
                                $(".alert-console").prop('class', 'alert alert-console alert-success');
                                exampleConsole.innerText = 'Ubahan berhasil disimpan : (' + rowData[6] + ' ' + change[0][1] + ': ' + change[0][3] + ')';
                            } else {
                                $(".alert-console").prop('class', 'alert alert-console alert-danger');
                                exampleConsole.innerText = 'Gagal Menyimpan data ! : (' + rowData[6] + ' ' + change[0][1] + ': ' + change[0][3] + ')';
                            }
                        },
                        error: function() {
                            $(".alert-console").prop('class', 'alert alert-console alert-danger');
                            exampleConsole.innerText = 'Gagal Menyimpan data ! : (' + rowData[6] + ' ' + change[0][1] + ': ' + change[0][3] + ')';
                        }
                    });
                } else {
                    $(".alert-console").prop('class', 'alert alert-console alert-danger');
                    exampleConsole.innerText = 'Gagal Menyimpan data ! Nilai diluar ketentuan : (' + change[0][3] + ')';
                }
            }
        });
    }

    function resetTable() {
        $('#table-card').hide();
        $('#list-container').html('');
        hot.destroy();
    }

    function nilaiValidator(value, callback, limit) {
        if (value <= limit && value >= 0) {
            return callback(true);
        } else {
            let exampleConsole = document.getElementById('example1console');
            $(".alert-console").prop('class', 'alert alert-console alert-danger');
            exampleConsole.innerText = 'Gagal Menyimpan data ! Nilai diluar ketentuan : (' + limit + ')';
            return callback(false);
        }
    }

    function defaultValidator(value, callback) {
        if (value <= 100 && value >= 0) {
            callback(true);
        } else {
            callback(false);
        }
    }

    function colorValidator(hotInstance, TD, row, col, prop, value, cellProperties) {
        if (value == 0) {
            TD.style.color = 'red';
            TD.style.backgroundColor = 'yellow';
        }
        TD.innerHTML = value;
    }

    function herValidator(hotInstance, TD, row, col, prop, value, cellProperties) {
        var nilaiAkhir = 0.0;
        if (prop === 'nilai_akhir') {
            nilaiAkhir = value;
        } else {
            nilaiAkhir = hotInstance.getDataAtRowProp(row, 'nilai_akhir')
        }
        var batas_nilai_akhir = hotInstance.getDataAtRowProp(row, 'batas_her')
        if (parseFloat(nilaiAkhir) < parseFloat(batas_nilai_akhir)) {
            TD.style.color = 'red';
            TD.style.backgroundColor = 'yellow';
        } else {
            TD.style.color = null;
            TD.style.backgroundColor = null;
        }
        TD.innerHTML = value;

    }
</script>