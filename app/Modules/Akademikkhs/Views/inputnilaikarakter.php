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
                        <!-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-form" role="tab" aria-controls="tab-form" aria-selected="false">Form</a>
                        </li> -->
                    <?php } ?>
                </ul>
            </div>
            <div class="card-body">
                <div class="padding">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-data" role="tabpanel" aria-labelledby="tab-data">
                            <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <input type="hidden" class="form-control" id="type_code" name="type_code" value="<?= $rules->type_code ?>" required>
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <div class="row">
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
                        <div class="tab-pane fade" id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                            <form data-plugin="parsley" data-option="{}" id="form_input" autocomplete="off">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <input type="hidden" class="form-control" id="type_code" name="type_code" value="<?= $rules->type_code ?>" required>
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <div class="row mb-4">
                                        <div class="col-6">
                                            <label for="id_batalyon">Batalyon</label>
                                            <ul class="list-unstyled text-sm mt-1 text-muted" id="parsley-id-7"></ul>
                                            <select class="form-control sel2" id="id_batalyon_input" name="id_batalyon" required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="id_kompi">Kompi</label>
                                            <ul class="list-unstyled text-sm mt-1 text-muted" id="parsley-id-7"></ul>
                                            <select class="form-control sel2" id="id_kompi" name="id_kompi" required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="id_peleton">Peleton</label>
                                            <ul class="list-unstyled text-sm mt-1 text-muted" id="parsley-id-7"></ul>
                                            <select class="form-control sel2" id="id_peleton" name="id_peleton" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <!-- <button type="reset" class="btn btn-light">Reset</button> -->
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </form>
                        </div>
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
    const type_code = '<?= $rules->type_code ?>'

    const url_insert = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_save" ?>';
    const url_edit = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_edit" ?>';
    const url_delete = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_delete" ?>';
    const url_load = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_load" ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';
    const url_pdf = '<?= base_url() . "/" . uri_segment(0) . "/action/pdf/" . uri_segment(1) . "" ?>';

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
                            // if (hot !== undefined) {
                            //     resetTable();
                            // }
                            loadTable(result);
                            var id_batalyon = document.getElementById("id_batalyon");
                            var nama_batalyon = id_batalyon.options[id_batalyon.selectedIndex].text;
                            var id_mapel = document.getElementById("id_mata_pelajaran");
                            // var nama_mapel = id_mapel.options[id_mapel.selectedIndex].text;
                            $('#input-title').show();
                            $('#input-title').html('Daftar nilai taruna Batalyon <strong>' + nama_batalyon + ' Aspek Karakter</strong>');
                            $('#d-pdf').show();
                        } else {
                            Swal.fire('Data Tidak Ditemukan', 'Data nilai belum tersedia untuk semester ini', 'warning');
                            resetTable();
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
        }).on('change', '#id_batalyon', function() {
            $("#id_mata_pelajaran").val(null).trigger('change');
        });

        select2Init("#id_batalyon", "/batalyonsmt_select_get", null, function(data) {
            return data.text;
        }, function(data) {
            // console.log('<pre>');
            // console.log(data);
            // console.log('</pre>');
            if (data.id === '') {
                return "Pilih Batalyon";
            }

            return data.text;
        });

        select2Init("#id_mata_pelajaran", "/matapelajaranbybatalyon_select_get", {
            id_batalyon: function() {
                return $('#id_batalyon').val()
            },
            id_aspek: 3
        }, function(data) {
            return data.text;
        }, function(data) {
            if (data.id === '') {
                return "Pilih Batalyon terlebih dulu";
            }

            return data.text;
        });

        select2Init("#id_batalyon_input", "/batalyonsmt_select_get", null, function(data) {
            return data.text;
        }, function(data) {
            if (data.id === '') {
                return "Pilih Batalyon";
            }

            return data.text;
        });

        select2Init("#id_kompi", "/kompibybatalyon_select_get", {
            id_batalyon: function() {
                return $('#id_batalyon_input').val()
            },
        }, function(data) {
            return data.text;
        }, function(data) {
            if (data.id === '') {
                return "Pilih Batalyon terlebih dulu";
            }

            return data.text;
        });

        select2Init("#id_peleton", "/peletonbykompi_select_get", {
            id_kompi: function() {
                return $('#id_kompi').val()
            },
        }, function(data) {
            return data.text;
        }, function(data) {
            if (data.id === '') {
                return "Pilih Kompi terlebih dulu";
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
            rowHeaders: true,
            manualColumnResize: true,
            fixedColumnsLeft: 8,
            fixedRowsTop: 0,
            contextMenu: false,
            manualColumnFreeze: true,
            filters: true,
            afterGetColHeader: addInput,
            beforeOnCellMouseDown: doNotSelectColumn,
            hiddenColumns: {
                columns: [0, 1, 2, 3, 4]
            },
            licenseKey: 'non-commercial-and-evaluation',
            nestedHeaders: [
                [{
                    label: '',
                    colspan: 8,
                }, {
                    label: 'NILAI',
                    colspan: 10
                }],
                [{
                    label: 'TARUNA',
                    colspan: 8,
                }, {
                    label: '',
                    colspan: 6
                }, {
                    label: 'NILAI AKHIR',
                    colspan: 4
                }, ],
                ['#id', '#id_mata_pelajaran', '#id_user_taruna', '#id_semester', '#id_batalyon', 'Nama Taruna', 'No AK', 'Kelompok', 'BLN 1', 'BLN 2', 'BLN 3', 'BLN 4', 'BLN 5', 'BLN 6', 'NILAI AKHIR', 'KATEGORI', 'BOBOT', 'KLASIFIKASI']
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
                    data: 'namataruna',
                    readOnly: true,
                    renderer: herValidator
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
                    data: 'bulan_1',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: nilaiValidator
                },
                {
                    data: 'bulan_2',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: nilaiValidator
                },
                {
                    data: 'bulan_3',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: nilaiValidator
                },
                {
                    data: 'bulan_4',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: nilaiValidator
                },
                {
                    data: 'bulan_5',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: nilaiValidator
                },
                {
                    data: 'bulan_6',
                    type: 'numeric',
                    numericFormat: {
                        pattern: '0,0.00',
                        culture: 'en-US'
                    },
                    allowEmpty: false,
                    validator: nilaiValidator
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
                    readOnly: true,
                    renderer: herValidator
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

                if (change[0][3] <= 100 && change[0][3] >= 0) {
                    const formData = {
                        "<?= csrf_token() ?>": "<?= csrf_hash() ?>",
                        'id': rowData[0],
                        'id_user_taruna': rowData[2],
                        'id_semester': rowData[3],
                        'id_batalyon': rowData[4],
                        'bulan_1': rowData[8],
                        'bulan_2': rowData[9],
                        'bulan_3': rowData[10],
                        'bulan_4': rowData[11],
                        'bulan_5': rowData[12],
                        'bulan_6': rowData[13],
                        'nilai_akhir': rowData[14],
                        'kategori': rowData[15],
                        'bobot': rowData[16],
                        'klasifikasi': rowData[17]
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
                                hot.setSourceDataAtCell(row, 'nilai_akhir', res.nilai_akhir);
                                hot.setSourceDataAtCell(row, 'kategori', res.kategori);
                                hot.setSourceDataAtCell(row, 'bobot', res.bobot);
                                hot.setSourceDataAtCell(row, 'klasifikasi', res.klasifikasi);
                                $(".alert-console").prop('class', 'alert alert-console alert-success');
                                exampleConsole.innerText = 'Ubahan berhasil disimpan : (' + rowData[5] + ' ' + change[0][1] + ': ' + change[0][3] + ')';
                            } else {
                                $(".alert-console").prop('class', 'alert alert-console alert-danger');
                                exampleConsole.innerText = 'Gagal Menyimpan data ! : (' + rowData[5] + ' ' + change[0][1] + ': ' + change[0][3] + ')';
                            }
                        },
                        error: function() {
                            $(".alert-console").prop('class', 'alert alert-console alert-danger');
                            exampleConsole.innerText = 'Gagal Menyimpan data ! : (' + rowData[5] + ' ' + change[0][1] + ': ' + change[0][3] + ')';
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
    }

    function nilaiValidator(value, callback) {
        if (value < 101 && value >= 0) {
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