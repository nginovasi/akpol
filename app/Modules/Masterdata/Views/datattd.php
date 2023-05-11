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
                                            <th><span>Jabatan</span></th>
                                            <th><span>Nama TTD</span></th>
                                            <th><span>NRP</span></th>
                                            <th><span>Tahun Mulai Jabatan</span></th>
                                            <th><span>Aktiv</span></th>
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
                                            <label for="id_jabatan">Jabatan</label>
                                            <select class="form-control sel2" id="id_jabatan" name="id_jabatan" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="nama">Nama TTD</label>
                                            <input type="tel" class="form-control" id="nama" name="nama" required placeholder="Masukan Nama TTD">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="nrp">Pangkat dan NRP</label>
                                            <input type="tel" class="form-control" id="nrp" name="nrp" required placeholder="Masukan Pangkat dan NO NRP">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="tanggal_mulai">Tanggal Menjabat</label>
                                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required="">
                                        </div>
                                        <div class="col-6">
                                            <label for="tanggal_selesai">Tanggal Lepas Jabatan</label>
                                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="url_ttd">TTD</label>
                                            <input type="tel" class="form-control" id="url_ttd" name="url_ttd">
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

    const url_aktiv = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_saveaktiv"?>';


    var dataStart = 0;
    var coreEvents;

    const select2Array = [
        {
            id: 'id_jabatan',
            url: '/ttdjabatan_select_get',
            placeholder: 'Pilih Jabatan',
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
            placeholder : 'Berhasil menyimpan data ttd',
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
            placeholder : 'Berhasil menghapus data ttd',
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



        $(document).on('click' , '.aktiv' , function(e){

            let $this = $(this);

            if ($this.val()==1) {
                $this.val('0');
            } else if ($this.val()==0) {
                $this.val('1');
            }

            var id = $this.parent().attr('data-id');
            var is_aktiv = $this.val();
            // console.log($this.parent().attr('data-id') );

            // console.log($this.val());

            Swal.fire({
                        title: "",
                        icon: "info",
                        text: "Proses menyimpan data, mohon ditunggu...",
                        didOpen: function() {
                            Swal.showLoading()
                        }
                    });

            $.ajax({
                    url     : url_aktiv,
                    type    : 'post',
                    data    : {
                        id : id,
                        is_aktiv : is_aktiv,
                        "<?=csrf_token()?>": "<?=csrf_hash()?>"
                    },
                    dataType: 'json',
                    success: function(result){
                        Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil update data', 'success');
                                coreEvents.table.ajax.reload();
                            } else {
                                Swal.fire('Error', result.message, 'error');
                            }
                    },
                    error: function(){
                        Swal.close();
                        Swal.fire('Error','Terjadi kesalahan pada server', 'error');
                    }
                });

        })

    });

    function datatableColumn(){
        let columns = [
                {
                    data: "id", orderable: false, width: 100,
                    render: function (a, type, data, index) {
                        return dataStart + index.row + 1
                    }
                },
                {data: "jabatan", orderable: true},
                {data: "nama", orderable: true},
                {data: "nrp", orderable: true},
                {data: "tanggal_mulai", orderable: true},
                {
                    data: "is_aktiv", orderable: true,
                    render: function (a, type, data, index) {

                        if (data.is_aktiv==1) {
                            return '<label class="ui-switch ui-switch-md info m-t-xs" data-id="'+data.id+'"><input type="checkbox" class="aktiv" name="is_aktiv" value="'+data.is_aktiv+'" checked ><i></i></label>';
                        } else if (data.is_aktiv==0) {
                            return '<label class="ui-switch ui-switch-md info m-t-xs" data-id="'+data.id+'"><input type="checkbox" class="aktiv" name="is_aktiv" value="'+data.is_aktiv+'" ><i></i></label>';
                        } else {
                            return 'Tidak Ada Data';
                        }
                    }
                },
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