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
                                    <!-- <div class="col-6">
                                        <label for="id_mata_pelajaran">Mata Pelajaran</label>
                                        <ul class="list-unstyled text-sm mt-1 text-muted" id="parsley-id-7"></ul>
                                        <select class="form-control sel2" id="id_mata_pelajaran" name="id_mata_pelajaran" required>
                                        </select>
                                    </div> -->
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
                        <div class="row">
                            <div class="col-9">
                                <h5 class="card-title">Input Nilai Per Taruna</h5>
                                <small class="text-muted" id="input-title" style="display:none">Mata pelajaran</small>
                            </div>
                            <div class="col-3 text-right">
                                <label class="md-switch">
                                    <input type="checkbox" id="her-switch">
                                    <i class="red"></i>
                                    Tampilkan hanya HER
                                </label>
                            </div>
                        </div>
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
                                        <span class="mx-2" id="example2console">Range nilai untuk lari adalah 1013-10000 Meter</span>
                                        <div>
                                            <span class="mx-4 px-1">Range nilai untuk kolom pull-up (taruna) adalah 1-17 dan untuk chinning (taruni) adalah 33-72</span>
                                        </div>
                                        <div>
                                            <span class="mx-4 px-1">Range nilai untuk kolom sit-up (taruna) adalah 6-40 dan untuk sit-up (taruni) adalah 17-50</span>
                                        </div>
                                        <div>
                                            <span class="mx-4 px-1">Range nilai untuk kolom push-up (taruna) adalah 1-42 dan untuk push-up (taruni) adalah 9-37</span>
                                        </div>
                                        <div>
                                            <span class="mx-4 px-1">Range nilai untuk kolom shuttle-run (taruna) adalah 21.6-16.2 dan untuk shuttle-run (taruni) adalah 27.5-17.6</span>
                                        </div>
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

    const url_insert = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_save" ?>';
    const url_edit = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_edit" ?>';
    const url_delete = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_delete" ?>';
    const url_load = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_load" ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';
    const url_pdf = '<?= base_url() . "/" . uri_segment(0) . "/action/pdf/" . uri_segment(1) . "" ?>';

    var dataStart = 0;
    var table;
    var noticed = true;
    var syarat_select;
    var hot;
    const container = document.querySelector('#list-container');
    const exampleConsole = document.querySelector('#example1console');

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
                        var tableData = result;
                        $.ajax({
                            url: url_ajax + '/syaratnilaijasmani_get',
                            method: "GET",
                            dataType: 'json',
                            success: function(result) {
                                if (result.success) {
                                    syarat_select = result.data;
                                    if (tableData.data.length > 0) {
                                        loadTable(tableData, result.data);
                                        var id_batalyon = document.getElementById("id_batalyon");
                                        var nama_batalyon = id_batalyon.options[id_batalyon.selectedIndex].text;
                                        var id_mapel = document.getElementById("id_mata_pelajaran");
                                        // var nama_mapel = id_mapel.options[id_mapel.selectedIndex].text;
                                        $('#input-title').show();
                                        $('#input-title').html('Daftar nilai taruna Batalyon <strong>' + nama_batalyon + '</strong> Aspek Jasmani </strong>');
                                        $('#d-pdf').show();
                                    } else {
                                        Swal.fire('Data Tidak Ditemukan', 'Data nilai belum tersedia untuk semester ini', 'warning');
                                        $('#table-card').hide();
                                        $('#d-pdf').hide();
                                    }
                                } else {
                                    $('#table-card').hide();
                                    Swal.fire('Data Tidak Ditemukan', 'Data syarat nilai jasmani tidak ditemukan', 'warning');
                                }
                            },
                            error: function() {
                                Swal.close();
                                Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                            }
                        });


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
        }).on('change', '#id_batalyon', function() {
            $("#id_mata_pelajaran").val(null).trigger('change');
        });

        select2Init("#id_batalyon", "/batalyonsmt_select_get", null, function(data) {
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
            id_aspek: 5
        }, function(data) {
            return data.text;
        }, function(data) {
            if (data.id === '') {
                return "Pilih Batalyon terlebih dulu";
            }

            return data.text;
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

        $('#her-switch').change(function() {
            if (this.checked) {
                $(this).prop("checked", true);
                filterHer();
            } else {
                filterReset();
            }
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

    function loadTable(result, select) {
        if (hot !== undefined && !hot.isDestroyed) {
            hot.destroy();
        }
        $('#table-card').show();
        let autosaveNotification;

        let limit = result.data[0];

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


        //select key-value
        class KeyValueListEditor extends Handsontable.editors.HandsontableEditor {
            prepare(row, col, prop, td, value, cellProperties) {
                super.prepare(row, col, prop, td, value, cellProperties);

                Object.assign(this.htOptions, {
                    licenseKey: 'non-commercial-and-evaluation',
                    data: this.cellProperties.source,
                    columns: [{
                            data: '_id',
                        },
                        {
                            data: 'label',
                        },
                    ],
                    hiddenColumns: {
                        columns: [1],
                    },
                    colWidths: 100,
                    beforeValueRender(value, {
                        row,
                        instance
                    }) {
                        return instance.getDataAtRowProp(row, 'label');
                    },
                });

                if (cellProperties.keyValueListCells) {
                    this.htOptions.cells = cellProperties.keyValueListCells;
                }
                if (this.htEditor) {
                    this.htEditor.destroy();
                }

                this.htEditor = new Handsontable(this.htContainer, this.htOptions);
            }

            setValue(value) {
                if (this.htEditor) {
                    const index = this.htEditor.getDataAtProp('_id').findIndex(id => id === value);

                    if (index !== -1) {
                        value = this.htEditor.getDataAtRowProp(index, 'label');
                    }
                }
                super.setValue(value);
            }

            getValue() {
                const value = super.getValue();

                if (this.htEditor) {
                    const labels = this.htEditor.getDataAtProp('label');
                    const row = labels.indexOf(value);

                    if (row !== -1) {
                        return this.htEditor.getDataAtRowProp(row, '_id');
                    }
                }

                return value;
            }
        }

        const keyValueListValidator = function(value, callback) {
            let valueToValidate = value;

            if (valueToValidate === null || valueToValidate === void 0) {
                valueToValidate = '';
            }

            if (this.allowEmpty && valueToValidate === '') {
                callback(true);
            } else {
                callback(this.source.find(({
                    _id
                }) => _id === value) ? true : false);
            }
        };
        const keyValueListRenderer = function(hot, TD, row, col, prop, value, cellProperties) {
            const item = cellProperties.source.find(({
                _id
            }) => _id === value);

            if (item) {
                value = item.label;
            }

            Handsontable.renderers.getRenderer('autocomplete').call(hot, hot, TD, row, col, prop, value, cellProperties);
        };

        Handsontable.cellTypes.registerCellType('key-value-list', {
            editor: KeyValueListEditor,
            validator: keyValueListValidator,
            renderer: keyValueListRenderer,
        });

        hot = new Handsontable(container, {
            data: result.data,
            width: '100%',
            height: 600,
            colHeaders: true,
            stretchH: 'all',
            rowHeaders: true,
            manualColumnResize: true,
            fixedColumnsLeft: 10,
            fixedRowsTop: 0,
            contextMenu: false,
            manualColumnFreeze: true,
            filters: true,
            afterGetColHeader: addInput,
            beforeOnCellMouseDown: doNotSelectColumn,
            licenseKey: 'non-commercial-and-evaluation',
            hiddenColumns: {
                columns: [0, 1, 2, 3, 4, 5, 29, 30, 31, 32, 33]
            },
            nestedHeaders: [
                // [
                // {
                //     label: 'nying',
                //     colspan: 24,
                // },
                // {
                //     label: 'SAMAPTA A',
                //     colspan: 4
                // },
                // {
                //     label: 'JML Nilai A',
                //     colspan: 1
                // },
                // {
                //     label: 'SAMAPTA B',
                //     colspan: 8
                // },
                // {
                //     label: 'JML Nilai B',
                //     colspan: 1
                // },
                // {
                //     label: 'NILAI AKHIR',
                //     colspan: 10
                // }
                // ],
                [{
                        label: 'TARUNA',
                        colspan: 10,
                    },
                    {
                        label: 'LARI',
                        colspan: 4
                    },
                    {
                        label: '',
                    },
                    {
                        label: 'PULL UP/CHINNING',
                        colspan: 2
                    }, {
                        label: 'SIT UP',
                        colspan: 2
                    }, {
                        label: 'PUSH UP',
                        colspan: 2
                    }, {
                        label: 'SHUTTLE RUN',
                        colspan: 2
                    },
                    {
                        label: '',
                    },
                    {
                        label: 'NILAI AKHIR',
                        colspan: 10
                    }
                ],
                // [{
                //     label: 'nying',
                //     colspan: 24,
                // }, {
                //     label: '',
                //     colspan: 10
                // }],
                ['#id', '#id_mata_pelajaran', '#id_user_taruna', '#id_semester', '#id_batalyon', '#batas_her', 'Nama Taruna', 'No AK', 'Kelompok', 'Gender', 'PUT', 'JML/MTR', 'TMBHN/MTR', 'TOTAL/MTR', 'SAMAPTA A', 'JML', 'NILAI', 'JML', 'NILAI', 'JML', 'NILAI', 'JML/DTK', 'NILAI', 'SAMAPTA B', 'NILAI AKHIR', 'KATEGORI', 'BOBOT', 'KLASIFIKASI', 'SYARAT PENILAIAN', '#batas_lari', '#batas_pull_up', '#batas_sit_up', '#batas_push_up', '#batas_shuttle_run']
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
                    data: 'gender',
                    readOnly: true
                },
                {
                    data: 'putaran',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    // renderer: function(hotInstance, TD, row, col, prop, value, cellProperties) {
                    //     putaran_jumlah = hotInstance.getData()[row][11] || 0;
                    //     if (putaran_jumlah > 0) {
                    //         TD.innerHTML = (parseInt(putaran_jumlah) / 400);
                    //     }

                    // },
                },
                {
                    data: 'putaran_jumlah',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0',
                        culture: 'en-US'
                    },
                    // renderer: function(hotInstance, TD, row, col, prop, value, cellProperties) {
                    //     putaran = hotInstance.getData()[row][10]
                    //     TD.innerHTML = putaran * 400;
                    // },
                    readOnly: true,
                },
                {
                    data: 'tambahan_jumlah',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0',
                        culture: 'en-US'
                    }
                },
                {
                    data: 'lari_jumlah',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0',
                        culture: 'en-US'
                    },
                    // renderer: function(hotInstance, TD, row, col, prop, value, cellProperties) {
                    //     putaran_jumlah = hotInstance.getData()[row][11] || 0
                    //     tambahan = hotInstance.getData()[row][12] || 0
                    //     if (putaran_jumlah > 0 || tambahan > 0) {
                    //         TD.innerHTML = parseInt(putaran_jumlah) + parseInt(tambahan);
                    //     }
                    //     // hotInstance.setDataAtCell(row, col, (parseInt(putaran) * 400) + parseInt(tambahan))
                    // },
                    readOnly: true,
                },
                {
                    data: 'samapta_a',
                    type: 'numeric',
                    readOnly: true,
                    renderer: nilaiMinimalValidator
                },
                {
                    data: 'pull_up_jumlah',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                },
                {
                    data: 'pull_up_nilai',
                    type: 'numeric',
                    readOnly: true,
                    renderer: nilaiMinimalValidator
                },
                {
                    data: 'sit_up_jumlah',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                },
                {
                    data: 'sit_up_nilai',
                    type: 'numeric',
                    readOnly: true,
                    renderer: nilaiMinimalValidator
                },
                {
                    data: 'push_up_jumlah',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                },
                {
                    data: 'push_up_nilai',
                    type: 'numeric',
                    readOnly: true,
                    renderer: nilaiMinimalValidator
                },
                {
                    data: 'run_jumlah',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                },
                {
                    data: 'run_nilai',
                    type: 'numeric',
                    readOnly: true,
                    renderer: nilaiMinimalValidator
                },

                {
                    data: 'samapta_b',
                    type: 'numeric',
                    readOnly: true,
                },
                {
                    data: 'nilai_akhir',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: nilaiValidator,
                    renderer: herValidator,
                    readOnly: true,
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
                    validator: nilaiValidator,
                    readOnly: true,
                },
                {
                    data: 'klasifikasi',
                    type: 'text',
                    allowEmpty: false,
                    readOnly: true,
                },
                {
                    data: 'id_syarat_penilaian',
                    type: 'key-value-list',
                    source: select,
                    allowEmpty: false,
                },
                {
                    data: 'batas_lari',
                    readOnly: true
                },
                {
                    data: 'batas_pull_up',
                    readOnly: true
                },
                {
                    data: 'batas_sit_up',
                    readOnly: true
                },
                {
                    data: 'batas_push_up',
                    readOnly: true
                },
                {
                    data: 'batas_shuttle_run',
                    readOnly: true
                }

            ],
            beforeChangeRender: (change, source) => {
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
                const rowIndex = change[0][0];
                const cellValue = change[0][3]
                autosaveNotification = setTimeout(() => {
                    $(".alert-console").prop('class', 'alert alert-console alert-info');
                    exampleConsole.innerText = 'Ubahan pada tabel akan otomatis disimpan';
                }, 5000);

                if (change[0][1] === 'putaran') {
                    hot.setDataAtCell(rowIndex, 11, (cellValue * 400))
                    hot.setDataAtCell(rowIndex, 13, parseInt(rowData[12] || 0) + (cellValue * 400))
                }
                if (change[0][1] === 'tambahan_jumlah') {
                    hot.setDataAtCell(rowIndex, 13, parseInt(rowData[11]) + parseInt(cellValue))
                }
                if (!(change[0][1].toString().includes('_jumlah'))) {
                    if (change[0][3] <= 100 && change[0][3] >= 0) {
                        submitCell(change, rowData);
                    } else {
                        $(".alert-console").prop('class', 'alert alert-console alert-danger');
                        exampleConsole.innerText = 'Gagal Menyimpan data ! Nilai diluar ketentuan : (' + change[0][3] + ')';
                    }
                } else {
                    submitCell(change, rowData);
                }
            }
        });
    }

    function submitCell(change, rowData) {
        const formData = {
            "<?= csrf_token() ?>": "<?= csrf_hash() ?>",
            'id': rowData[0],
            // 'id_mata_pelajaran': rowData[1],
            'id_user_taruna': rowData[2],
            'id_semester': rowData[3],
            'id_batalyon': rowData[4],
            'putaran_jumlah': rowData[11],
            'tambahan_jumlah': rowData[12] || 0,
            'samapta_a': rowData[14],
            'pull_up_jumlah': rowData[15],
            'pull_up_nilai': rowData[16],
            'sit_up_jumlah': rowData[17],
            'sit_up_nilai': rowData[18],
            'push_up_jumlah': rowData[19],
            'push_up_nilai': rowData[20],
            'run_jumlah': rowData[21],
            'run_nilai': rowData[22],
            'samapta_b': rowData[23],
            'nilai_akhir': rowData[24],
            'kategori': rowData[25],
            'bobot': rowData[26],
            'klasifikasi': rowData[27],
            'id_syarat_penilaian': rowData[28],
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
                    hot.setSourceDataAtCell(row, 'lari_nilai', res.lari_nilai);
                    hot.setSourceDataAtCell(row, 'pull_up_nilai', res.pull_up_nilai);
                    hot.setSourceDataAtCell(row, 'push_up_nilai', res.push_up_nilai);
                    hot.setSourceDataAtCell(row, 'chinning_nilai', res.chinning_nilai);
                    hot.setSourceDataAtCell(row, 'sit_up_nilai', res.sit_up_nilai);
                    hot.setSourceDataAtCell(row, 'run_nilai', res.run_nilai);
                    hot.setSourceDataAtCell(row, 'samapta_a', res.samapta_a);
                    hot.setSourceDataAtCell(row, 'samapta_b', res.samapta_b);
                    hot.setSourceDataAtCell(row, 'nilai_akhir', res.nilai_akhir);
                    hot.setSourceDataAtCell(row, 'kategori', res.kategori);
                    hot.setSourceDataAtCell(row, 'bobot', res.bobot);
                    hot.setSourceDataAtCell(row, 'klasifikasi', res.klasifikasi);
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
    }

    function resetTable() {
        $('#table-card').hide();
        $('#list-container').html('');
    }

    function nilaiValidator(value, callback) {
        if (value <= 100 && value >= 0) {
            callback(true);
        } else {
            callback(false);
        }
    }

    function herValidator(hotInstance, TD, row, col, prop, value, cellProperties) {

        var nilaiAkhir = 0.0;
        if (prop === 'nilai_akhir') {
            nilaiAkhir = value;
        } else {
            nilaiAkhir = hotInstance.getDataAtRowProp(row, 'nilai_akhir')
        }
        var syarat_penilaian = hotInstance.getDataAtRowProp(row, 'id_syarat_penilaian')
        var batas_nilai_akhir = hotInstance.getDataAtRowProp(row, 'batas_her')
        if (syarat_penilaian === '2' || syarat_penilaian === '5' || parseFloat(nilaiAkhir) < parseFloat(batas_nilai_akhir)) {
            TD.style.color = 'red';
            TD.style.backgroundColor = 'yellow';
        } else {
            TD.style.color = null;
            TD.style.backgroundColor = null;
        }
        TD.innerHTML = value;

    }


    function nilaiMinimalValidator(hotInstance, TD, row, col, prop, value, cellProperties) {
        var propName = ''
        var syarat_penilaian = hotInstance.getDataAtRowProp(row, 'id_syarat_penilaian')
        if (prop === 'samapta_a') {
            propName = 'batas_lari'
        } else {
            let firstText = 'batas_';
            propName = firstText.concat(prop.replace('_nilai', ''))
        }

        var batasNilai = hotInstance.getDataAtRowProp(row, propName)
        if (parseFloat(value) < parseFloat(batasNilai)) {
            TD.style.color = 'red';
            TD.style.backgroundColor = 'yellow';
        } else {
            TD.style.color = null;
            TD.style.backgroundColor = null;
        }
        TD.innerHTML = value;

    }

    function filterHer() {
        // access to filters plugin instance
        const filtersPlugin = hot.getPlugin('filters');
        filtersPlugin.addCondition(28, 'eq', '2');
        filtersPlugin.filter();
    }

    function filterReset() {
        const filtersPlugin = hot.getPlugin('filters');
        filtersPlugin.removeConditions(28);
        filtersPlugin.filter();
    }
</script>