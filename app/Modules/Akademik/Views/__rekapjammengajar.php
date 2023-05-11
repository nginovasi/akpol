<div>
    <div class="page-hero page-container " id="page-hero">
        <div class="padding d-flex">
            <div class="page-title">
                <h2 class="text-md text-highlight"><?=$page_title?></h2>
            </div>
            <div class="flex"></div>
        </div>
    </div>
    <div class="page-content page-container" id="page-content">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills no-border" id="tab">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-data" role="tab" aria-controls="tab-data" aria-selected="false">Rekap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-form" role="tab" aria-controls="tab-form" aria-selected="false">Review</a>
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
                                            <th><span>Nama Pendidik</span></th>
                                            <th><span>Jumlah Mengajar</span></th>
                                            <th class="column-2action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                            <div class="table-responsive">
                                <table id="datatable2" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Tanggal</span></th>
                                            <th><span>Kelas</span></th>
                                            <th><span>Kelompok</span></th>
                                            <th><span>Mata Pelajaran</span></th>
                                            <th><span>Pertemuan Ke</span></th>
                                            <th><span>Bahan Ajar</span></th>
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
    </div>
</div>
<script type="text/javascript">
    const auth_insert = '<?=$rules->i?>';
    const auth_edit = '<?=$rules->e?>';
    const auth_delete = '<?=$rules->d?>';
    const auth_otorisasi = '<?=$rules->o?>';

    const url_insert = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_save"?>';
    const url_edit = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_edit"?>';
    const url_delete = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_delete"?>';
    const url_load = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_load"?>';
    const url_ajax = '<?=base_url()."/".uri_segment(0)."/ajax"?>';

    var dataStart = 0;
    var table;

    $(document).ready(function(){

        table = $('#datatable').DataTable({
            "serverSide": true,
            "processing": true,
            "ordering" : true,
            "paging": true,
            "searching": { "regex": true },
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            "pageLength": 10,
            "searchDelay" : 500,
            "ajax": {
                "type": "POST",
                "url": url_load,
                "dataType": "json",
                "data": function (data) {
                    console.log(data);
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
                        "<?=csrf_token()?>": "<?=csrf_hash()?>"
                    };

                    $.extend(form, info);

                    return form;
                },
                "complete": function(response) {
                    console.log(response);
                    feather.replace();
                }
            },
            "columns" : datatableColumn()
        }).on('init.dt', function(){
            $(this).css('width','100%');
        });

        $(document).on('click', '.detail', function(){
            let $this = $(this);

                $('#datatable2').dataTable().fnDestroy();
                table = $('#datatable2').DataTable({
                    "serverSide": true,
                    "processing": true,
                    "ordering" : true,
                    "paging": true,
                    "searching": { "regex": true },
                    "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
                    "pageLength": 10,
                    "searchDelay" : 500,
                    "ajax": {
                        "type": "POST",
                        "url": url_edit,
                        "dataType": "json",
                        "data": function (data) {
                            console.log(data);
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
                                "id_user_pendidik" : $this.data('id'),
                                "<?=csrf_token()?>": "<?=csrf_hash()?>"
                            };

                            $.extend(form, info);

                            return form;
                        },
                        "complete": function(response) {
                            console.log(response);
                            feather.replace();
                            $('ul#tab li a').eq(1).trigger('click');

                        }
                    },
                    "columns" : datatableColumnDetail()
                }).on('init.dt', function(){
                    $(this).css('width','100%');
                });
        });
    });

    function datatableColumn(){
        let columns = [
                {
                    data: "id", orderable: false, width: 100,
                    render: function (a, type, data, index) {
                        return dataStart + index.row + 1
                    }
                },
                {data: "namagadik", orderable: true},
                {data: "jml", orderable: true},
                {
                    data: "id", orderable: false,
                    render: function (a, type, data, index) {
                        let button = ""

                            button += '<button class="btn btn-sm btn-outline-primary detail" data-id="'+data.id+'" title="Detail">\
                                    <i class="fa fa-list-ul"></i>\
                                </button>\
                                ';

                        button += (button == "") ? "<b>Tidak ada aksi</b>" : ""

                        return button;
                    }
                }
            ];

        return columns;
    }

    function datatableColumnDetail(){
        let columns = [
                {
                    data: "id", orderable: false, width: 100,
                    render: function (a, type, data, index) {
                        return dataStart + index.row + 1
                    }
                },
                {data: "tanggal", orderable: true},
                {data: "kelompok", orderable: true},
                {data: "nama", orderable: true},
                {data: "mata_pelajaran", orderable: true},
                {data: "judul", orderable: true},
                {data: "pertemuan_ke", orderable: true}
            ];

        return columns;
    }
</script>