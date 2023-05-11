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
                                            <th><span>Tingkat</span></th>
                                            <th><span>Keterangan</span></th>
                                            <th><span>Bobot</span></th>
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
                                        <div class="col-6">
                                            <label for="kode_parent">Parent</label>
                                            <select class="form-control" id="kode_parent" name="kode_parent"></select>
                                        </div>
                                        <div class="col-6">
                                            <label for="kode">Kode</label>
                                            <input type="text" class="form-control" id="kode" name="kode" required  placeholder="Kode">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="id_tingkatan">Tingkatan</label>
                                            <select class="form-control" id="id_tingkatan" name="id_tingkatan"></select>
                                        </div>
                                        <div class="col-6">
                                            <label for="id_kurikulum">Kurikulum</label>
                                            <select class="form-control" id="id_kurikulum" name="id_kurikulum"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="keterangan">Keterangan</label>
                                            <input type="text" class="form-control" id="keterangan" name="keterangan" required  placeholder="Keterangan">
                                        </div>
                                        <div class="col-6">
                                            <label for="bobot">Bobot</label>
                                            <input type="text" class="form-control" id="bobot" name="bobot" required  placeholder="Bobot">
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

    var dataStart = 0;
    var coreEvents;

    const select2Array = [
        {
            id: 'kode_parent',
            url: '/pujian_select_get',
            placeholder: 'Pilih Parent',
            params: null
        },
        {
            id: 'id_tingkatan',
            url: '/tingkat_select_get',
            placeholder: 'Pilih Tingkatan',
            params: null
        },
        {
            id: 'id_kurikulum',
            url: '/kurikulum_select_get',
            placeholder: 'Pilih Kurikulum',
            params: null
        }
    ];

    $(document).ready(function(){
        coreEvents = new CoreEvents();
        coreEvents.url = url;
        coreEvents.ajax = url_ajax;
        coreEvents.csrf = { "<?=csrf_token()?>": "<?=csrf_hash()?>" };
        coreEvents.tableColumn = datatableColumn();

        coreEvents.insertHandler = {
            placeholder : 'Berhasil menyimpan data pujian',
            afterAction : function(result) {

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
                },500);
            }
        }

        coreEvents.deleteHandler = {
            placeholder : 'Berhasil menghapus data pujian',
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


        

        $(document).on('change', '#kode_parent', function() {
        	$('#id_tingkatan').select2('trigger', 'select', {
                data : {
                    id: $('#kode_parent').select2('data')['0']['id_tingkatan'],
                    text: $('#kode_parent').select2('data')['0']['tingkatan']
                }
            });

            $('#id_kurikulum').select2('trigger', 'select', {
                data : {
                    id: $('#kode_parent').select2('data')['0']['id_kurikulum'],
                    text: $('#kode_parent').select2('data')['0']['tentang']
                }
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
                {data: "tingkatan", orderable: true},
                {data: "keterangan", orderable: true},
                {data: "bobot", orderable: true},
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