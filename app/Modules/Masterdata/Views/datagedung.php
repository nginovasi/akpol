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
                                            <th><span>Kode</span></th>
                                            <th><span>Nama Gedung</span></th>
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
                                            <label for="kode">Kode Gedung</label>
                                            <input type="text" class="form-control" id="kode" name="kode" required  placeholder="Kode Gedung">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="nama">Nama Gedung</label>
                                            <input type="tel" class="form-control" id="nama" name="nama" required placeholder="Nama Gedung">
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


    $(document).ready(function(){
        coreEvents = new CoreEvents();
        coreEvents.url = url;
        coreEvents.ajax = url_ajax;
        coreEvents.csrf = { "<?=csrf_token()?>": "<?=csrf_hash()?>" };
        coreEvents.tableColumn = datatableColumn();

        coreEvents.insertHandler = {
            placeholder : 'Berhasil menyimpan data gedung',
            afterAction : function(result) {

            }
        }

        coreEvents.editHandler = {
            placeholder : '',
            afterAction : function(result) {
            }
        }

        coreEvents.deleteHandler = {
            placeholder : 'Berhasil menghapus data gedung',
            afterAction : function() {
                
            }
        }

        coreEvents.resetHandler = {
            action : function() {
                
            }
        }

        coreEvents.load();

    });

    function datatableColumn(){
        let columns = [
                {
                    data: "id", orderable: false, width: 100,
                    render: function (a, type, data, index) {
                        return dataStart + index.row + 1
                    }
                },
                {data: "kode", orderable: true},
                {data: "nama", orderable: true},
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