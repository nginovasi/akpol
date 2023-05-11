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
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="id_batalyon">Batalyon</label>
                                        <ul class="list-unstyled text-sm mt-1 text-muted"></ul>
                                        <select class="form-control sel2" id="id_batalyon" name="id_batalyon" required>
                                        </select>
                                    </div>
                                    <!-- <div class="col-6">
                                <label for="id_batalyon">Taruna/Taruni</label>
                                <ul class="list-unstyled text-sm mt-1 text-muted"></ul>
                                <select class="form-control sel2" id="id_gender" name="id_gender" required>
                                    <option value="">Semua</option>
                                    <option value="1">Taruna</option>
                                    <option value="2">Taruni</option>
                                </select>
                            </div> -->
                                    <div class="col-6">
                                        <label for="id_batalyon">Semester</label>
                                        <ul class="list-unstyled text-sm mt-1 text-muted"></ul>
                                        <select class="form-control sel2" id="id_semester" name="id_semester" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" id="table-card" style="display: none">
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
                        <h5 class="card-title">Detail Nilai Akhir Taruna</h5>
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
                                        <span class="mx-2" id="example1console">Kolom nilai tidak dapat diubah</span>
                                    </div>
                                    <!-- <div class="filterHeader"><input id="namataruna-search"></div>
                                    <div class="filterHeader"><input id="noak-search"></div>
                                    <div class="filterHeader"><input id="kelompok-search"></div> -->
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

    var dataStart = 0;
    var table;
    var noticed = true;
    var hot;


    $(document).ready(function() {
        // $('#datatable')
        // loadTable([]);

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
                        loadTable(result);
                        // if (result.data.length > 0) {
                        //     // if (hot !== undefined) {
                        //     //     resetTable();
                        //     // }
                        //     loadTable(result);
                        // } else {
                        //     Swal.fire('Data Tidak Ditemukan', 'Data nilai belum tersedia untuk semester ini', 'warning');
                        //     resetTable();
                        // }
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
        });

        select2Init("#id_semester", "/semester_select_get", null, function(data) {
            return data.text;
        }, function(data) {
            if (data.id === '') {
                return "Pilih Semester";
            }

            return data.text;
        });

        select2Init("#id_batalyon", "/batalyon_select_get", null, function(data) {
            return data.text;
        }, function(data) {
            if (data.id === '') {
                return "Pilih Batalyon";
            }

            return data.text;
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

    function loadTable(result) {
        $('#table-card').show();
        //process data
        var processedData = [];
        result.nilai.forEach(function(x) {
            var row = [];
            row.push(x.namataruna)
            row.push(x.noaklong)
            row.push(x.kelompok)
            row.push(parseFloat(x.nap).toFixed(2))
            row.push(parseFloat(x.rata_karakter).toFixed(2))
            row.push(parseFloat(x.rata_pengetahuan).toFixed(2))
            row.push(parseFloat(x.rata_keterampilan).toFixed(2))
            row.push(parseFloat(x.rata_jasmani).toFixed(2))
            row.push(parseFloat(x.rata_kesehatan).toFixed(2))
            var jasmani = JSON.parse(x.jasmani)
            jasmani.forEach(function(y) {
                var keys = Object.keys(y)
                keys.forEach(function(key) {
                    row.push(y[key].nilai_awal.toFixed(2))
                    row.push(y[key].her.toFixed(2))
                    row.push(y[key].nilai_akhir.toFixed(2))
                    row.push(y[key].bobot.toFixed(2))
                })
            })
            var karakter = JSON.parse(x.karakter)
            karakter.forEach(function(y) {
                var keys = Object.keys(y)
                keys.forEach(function(key) {
                    row.push(y[key].nilai_awal.toFixed(2))
                    row.push(y[key].her.toFixed(2))
                    row.push(y[key].nilai_akhir.toFixed(2))
                    row.push(y[key].bobot.toFixed(2))
                })
            })
            var kesehatan = JSON.parse(x.kesehatan)
            kesehatan.forEach(function(y) {
                var keys = Object.keys(y)
                keys.forEach(function(key) {
                    row.push(y[key].nilai_awal.toFixed(2))
                    row.push(y[key].her.toFixed(2))
                    row.push(y[key].nilai_akhir.toFixed(2))
                    row.push(y[key].bobot.toFixed(2))
                })
            })
            var keterampilan = JSON.parse(x.keterampilan)
            keterampilan.forEach(function(y) {
                var keys = Object.keys(y)
                keys.forEach(function(key) {
                    row.push(y[key].nilai_awal.toFixed(2))
                    row.push(y[key].her.toFixed(2))
                    row.push(y[key].nilai_akhir.toFixed(2))
                    row.push(y[key].bobot.toFixed(2))
                })
            })
            var pengetahuan = JSON.parse(x.pengetahuan)
            pengetahuan.forEach(function(y) {
                var keys = Object.keys(y)
                keys.forEach(function(key) {
                    row.push(y[key].nilai_awal.toFixed(2))
                    row.push(y[key].her.toFixed(2))
                    row.push(y[key].nilai_akhir.toFixed(2))
                    row.push(y[key].bobot.toFixed(2))
                })
            })
            processedData.push(row);
        })

        const container = document.querySelector('#list-container');
        const exampleConsole = document.querySelector('#example1console');
        let autosaveNotification;
        var colLength = 0;

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

            const input = document.getElementById(id);
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

        const generateHeader = function(result) {
            var nestedHeaders = [];
            var header1 = [{
                label: '',
                colspan: 9,
            }]
            var header2 = [{
                label: '',
                colspan: 9,
            }];
            var header3 = [{
                label: 'TARUNA',
                colspan: 3,
            }, {
                label: 'NILAI AKHIR',
                colspan: 6
            }];
            var header4 = [
                // '#id', '#id_mata_pelajaran', '#id_user_taruna', '#id_semester', '#tahun_ajaran',
                'Nama Taruna', 'No AK', 'Kelas',
                'NAP', 'KARAKTER', 'PENG', 'KET', 'JAS', 'KES',
            ];
            result.data_mata_pelajaran.forEach(function(mapel) {
                let obj2 = {
                    'label': mapel.sks + ' ' + mapel.satuan,
                    'colspan': 4
                }
                header2.push(obj2);
                let obj3 = {
                    'label': mapel.mata_pelajaran,
                    'colspan': 4
                }
                header3.push(obj3);

                header4.push('NAWAL', 'HER', 'NA', 'BBT');

            });
            const byAspek = result.data_mata_pelajaran.reduce(function(rv, x) {
                (rv[x['aspek']] = rv[x['aspek']] || []).push(x);
                return rv;
            }, {});
            Object.keys(byAspek).forEach(function(aspek) {
                let obj = {
                    'label': aspek,
                    'colspan': 4 * byAspek[aspek].length
                }
                header1.push(obj);

            });
            nestedHeaders.push(header1, header2, header3, header4);
            colLength = header4.length;
            return nestedHeaders;
        }

        let header = generateHeader(result);

        hot = new Handsontable(container, {
            data: processedData,
            width: '100%',
            height: 600,
            colHeaders: true,
            rowHeaders: true,
            manualColumnResize: true,
            fixedColumnsLeft: 3,
            fixedRowsTop: 0,
            contextMenu: false,
            readOnly: true,
            manualColumnFreeze: true,
            // filters: true,
            // afterGetColHeader: addInput,
            // beforeOnCellMouseDown: doNotSelectColumn,
            // hiddenColumns: {
            //     columns: [0, 1, 2, 3, 4]
            // },
            licenseKey: 'non-commercial-and-evaluation',
            nestedHeaders: header,

        });
    }

    function resetTable() {
        $('#table-card').hide();
        $('#list-container').html('');
    }

    function nilaiValidator(value, callback) {
        if (value < 101 && value >= 0) {
            callback(true);
        } else {
            callback(false);
        }
    }
</script>