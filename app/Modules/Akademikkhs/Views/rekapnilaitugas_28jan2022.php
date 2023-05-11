
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
                        <div class="tab-pane fade" id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="collapse" id="collapseKelas">
            <div class="card card-body">
                <div class="px-2">
                    <div class="py-3">
                        <div class="row">
                            <div class="col-4">
                                <small class="text-muted">Batalyon</small>
                                <div class="my-2" id="view_batalyon">Pancasila</div>
                            </div>
                            <div class="col-4">
                                <small class="text-muted">Kelas</small>
                                <div class="my-2" id="view_kelas">James Richo</div>
                            </div>
                            <div class="col-4">
                                <small class="text-muted">Mata Pelajaran</small>
                                <div class="my-2" id="view_mapel">James Richo</div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <small class="text-muted">Deskripsi</small>
                            <div class="my-2" id="view_deskripsi">Ut maecenas sed purus ultrices sed sapien massa quam eu sed odio id dui, sed sed lectus amet cursus sed habitant est morbi adipiscing nam consectetur nullam urna, proin condimentum ut laoreet congue
                                felis, diam pulvinar aliquam libero non tortor turpis aliquet massa eu etiam eget quisque egestas tristique tempus purus blandit nunc volutpat aliquam amet, aliquet nec et sed</div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-4">
                    <div class="page-content page-container" id="page-content">

                            <div class="padding" >
                                <?= csrf_field(); ?>
                                <!-- <pre  class="console">Click "Load" to load data from server</pre> -->
                                <div class="alert alert-info" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12" y2="8"></line>
                                    </svg>
                                    <span class="mx-2" id="example1console">Nilai tugas yang sudah terposting tidak bisa di rubah.</span>
                                    <!-- <span class="mx-2" id="example1console">Kolom nilai dapat diubah dan disimpans secara otomatis</span> -->
                                </div>
<!--                                 <div class="filterHeader"><input id="namataruna-search"></div>
                                <div class="filterHeader"><input id="noak-search"></div> -->
                                <!-- <div class="filterHeader"><input id="kelompok-search"></div> -->
                                <div id="list-container">
                                </div>
                                <div class="text-right mt-4">
                                  <button class="btn btn-primary" onclick="kirimnilai()">Posting Nilai</button>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css" />

<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js"></script>

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
    var hot;



    var dataheader = ['#id','#id_m_user', '#id_mata_pelajaran', '#id_semester', '#id_batalyon', 'Nama Taruna', 'No AK'];
    var datacontent = [{
                    data: 'id',
                    readOnly: true
                },{
                    data: 'id_m_user',
                    readOnly: true
                },{
                    data: 'id_mata_pelajaran',
                    readOnly: true
                },{
                    data: 'id_semester',
                    readOnly: true
                },{
                    data: 'id_batalyon',
                    readOnly: true
                },
                {
                    data: 'namataruna'
                },
                {
                    data: 'noaklong',
                    readOnly: true
                }
            ];


    var tempdataheader = [];
    var tempdatacontent = [];





    $(document).ready(function() {

        $(document).on('click', '.show', function(event) {
            event.stopPropagation();
            let $this = $(this);
            var detail;
            if ($this.data('detail') !== undefined) {

                detail = JSON.parse($this.data('detail').replaceAll("'", '"'));
                
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

                                loadTable(result, is_ketua_tim);
                                // loadTabelKelas(result, is_ketua_tim);

                                $('#view_batalyon').html(detail.info_semester);
                                $('#view_kelas').html(detail.kelompok);
                                $('#view_mapel').html(detail.mata_pelajaran);
                                $('#view_deskripsi').html(detail.deskripsi);
                                $('#table-card').show();

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

        });

        table = $('#datatable').DataTable({
            "dom": "<'row'<'col-sm-6'B><'col-sm-6 clear'>>" + "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p<br/>i>>",
            "buttons": [{
                extend: 'collection',
                text: 'Export',
                className: 'btn btn-primary glyphicon glyphicon-save-file',
                buttons: [{
                    text: 'Excel',
                    extend: 'excelHtml5',
                    footer: false,
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    text: 'CSV',
                    extend: 'csvHtml5',
                    fieldSeparator: ';',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    text: 'PDF',
                    extend: 'pdfHtml5',
                    message: '',
                    exportOptions: {
                        columns: ':visible'
                    }
                }]
            }],
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


    

    function loadTable(result, is_ketua_tim) {

        if (hot!=undefined) {

            hot.destroy();
            tempdataheader = [];
            tempdatacontent = [];

        }

        tempdataheader = dataheader;
        tempdatacontent = datacontent;
        
        tempdataheader.splice(7);
        tempdatacontent.splice(7);

        var tugas_ke = 0;
        for(key in result.data[0]){
            if(key.includes('pertemuan_ke')){
                tugas_ke++;

                tempdataheader.push("Tugas ke "+tugas_ke);

                tempdatacontent.push({
                        data: key,
                        readOnly: true
                    });
            }
        }

        tempdataheader.push("Rata-rata");
        tempdatacontent.push({
            data: 'rata',
            readOnly: true
        });


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
            colHeaders: tempdataheader,
            stretchH: 'all',
            rowHeaders: true,
            manualColumnResize: true,
            fixedColumnsLeft: 7,
            fixedRowsTop: 0,
            contextMenu: false,
            manualColumnFreeze: true,
            filters: true,
            // afterGetColHeader: addInput,
            beforeOnCellMouseDown: doNotSelectColumn,
            hiddenColumns: {
                columns: [0, 1, 2, 3, 4]
                // columns: [0]
            },
            licenseKey: 'non-commercial-and-evaluation',
            // nestedHeaders: [
            //     dataheader
            // ],
            columns: tempdatacontent,
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

                if (rowData[8] <= 100 && rowData[8] >= 0) {
                    const formData = {
                        "<?= csrf_token() ?>": "<?= csrf_hash() ?>",
                        'id': rowData[0],
                        'id_user_taruna': rowData[1],
                        'id_jadwal_tugas': rowData[3],
                        'nilai': rowData[8],
                        'catatan': rowData[9]
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


        // console.log(hot.getSourceData());
    }

    function nilaiValidator(value, callback) {
        if (value < 101 && value >= 0) {
            callback(true);
        } else {
            callback(false);
        }
    }

    function kirimnilai(){
        Swal.fire({
                title: "Posting Nilai Tugas ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Posting",
                confirmButtonColor: '#d33',
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    var dataarr = new FormData();

                    dataarr = hot.getSourceData();

                    Swal.fire({
                        title: "",
                        icon: "info",
                        text: "Proses memposting data, mohon ditunggu...",
                        didOpen: function() {
                            Swal.showLoading()
                        }
                    });

                    $.ajax({

                            url: url_insert + '_savenilai',
                            method: "POST",
                            data: {
                                "data" : dataarr,
                                "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                            },
                            dataType: 'json',
                            success: function(result) {
                                Swal.close();
                                if (result.success) {
                                    Swal.fire('Sukses', 'Berhasil Memposting Nilai', 'success');
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


        
    }
</script>