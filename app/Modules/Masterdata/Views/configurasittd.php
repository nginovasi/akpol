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
                        <a class="nav-link active" data-toggle="tab" href="#tab-data" role="tab" aria-controls="tab-data" aria-selected="false">Data</a>
                    </li>
                    <?php if($rules->i == 1) {?>
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
                                            <th><span>Nama Menu</span></th>
                                            <th><span>Nama TTD</span></th>
                                            <th><span>Jabatan TTD</span></th>
                                            <th><span>Taruna View</span></th>
                                            <th class="column-2action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                            <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <?=csrf_field();?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="id_ttd_jabatan">Nama TTD</label>
                                            <select class="form-control sel2" id="id_ttd_jabatan" name="id_ttd_jabatan" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="id_menu">Nama Menu</label>
                                            <select class="form-control sel2" id="id_menu" name="id_menu" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="id_taruna">Taruna View</label>
                                            <select class="form-control sel2" id="id_taruna" name="id_taruna" required>
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="reset" class="btn btn-light">Reset</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
    const auth_insert = '<?=$rules->i?>';
    const auth_edit = '<?=$rules->e?>';
    const auth_delete = '<?=$rules->d?>';
    const auth_otorisasi = '<?=$rules->o?>';

    const url = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)?>';
    const url_ajax = '<?=base_url()."/".uri_segment(0)."/ajax"?>';

    var data = [
                    {
                        id: 0,
                        text: 'TIDAK'
                    },
                    {
                        id: 1,
                        text: 'YA'
                    }
                ];

    var dataStart = 0;
    var coreEvents;

    const select2Array = [
        {
            id: 'id_ttd_jabatan',
            url: '/namattd_select_get',
            placeholder: 'Pilih Jabatan',
            params: null
        },
        {
            id: 'id_menu',
            url: '/namamenu_select_get',
            placeholder: 'Pilih Menu',
            params: null
        }
    ];

    $(document).ready(function(){

        $("#id_taruna").select2({
            placeholder: "Pilih lihat atau tidak",
            data : data
        });


        coreEvents = new CoreEvents();
        coreEvents.url = url;
        coreEvents.ajax = url_ajax;
        coreEvents.csrf = { "<?=csrf_token()?>": "<?=csrf_hash()?>" };
        coreEvents.tableColumn = datatableColumn();

        coreEvents.insertHandler = {
            placeholder : 'Berhasil menyimpan configurasi ttd',
            afterAction : function(result) {
                $('.sel2').val(null).trigger('change')
            }
        }

        coreEvents.editHandler = {
            placeholder : '',
            afterAction : function(result) {
                setTimeout(function() {
                    select2Array.forEach (function(x) {
                        $('#' + x.id).select2('trigger', 'select', {
                            data : {
                                id: result.data[x.id],
                                text: result.data[x.id.replace('id', 'nama')]
                            }
                        });
                    });

                    $('#id_taruna').select2('trigger', 'select', {
                            data : {
                                id: result.data['id_taruna'],
                                text: result.data['nama_taruna']
                            }
                        });

                },500);
            }
        }

        coreEvents.deleteHandler = {
            placeholder : 'Berhasil menghapus configurasi ttd',
            afterAction : function() {
                
            }
        }

        coreEvents.resetHandler = {
            action : function() {
            }
        }

        coreEvents.load();

        select2Array.forEach (function(x) {
            coreEvents.select2Init('#' + x.id, x.url, x.placeholder, x.params);
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
                {data: "name", orderable: true},
                {data: "nama", orderable: true},
                {data: "jabatan", orderable: true},
                {
                    data: "id_taruna", orderable: true,
                    render: function (a, type, data, index) {

                        if (data.id_taruna=='1') {
                            return "YA";
                        } else {
                            return "TIDAK";
                        }
                    }},
                {
                    data: "id", orderable: false,
                    render: function (a, type, data, index) {
                        let button = ""

                        if(auth_edit == "1"){
                            button += '<button class="btn btn-sm btn-outline-primary edit" data-id="'+data.id+'" title="Edit">\
                                    <i class="fa fa-edit"></i>\
                                </button>\
                                ';
                        }

                        if(auth_delete == "1"){
                            button += '<button class="btn btn-sm btn-outline-danger delete" data-id="'+data.id+'" title="Delete">\
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
</script>