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
                <!-- <div class="text-right">
                    <a id="d-pdf" class="btn btn-light-primary font-weight-bold" style="">Download PDF</a> 
                </div> -->
                <div class="padding">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-data" role="tabpanel" aria-labelledby="tab-data">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-theme table-row v-middle">
                                    <colgroup>
                                        <col style="width:1%" />
                                        <col style="" />
                                        <col style="" />
                                        <col style="" />
                                        <col style="width:15%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Kelompok Taruna</span></th>
                                            <th><span>Mata Pelajaran</span></th>
                                            <th><span>Judul Materi</span></th>
                                            <th class="column-2action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                            <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <?=csrf_field();?>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="id_program_studi">Kelompok Taruna</label>
                                        <input type="text" class="form-control" id="kelompok" disabled="">
                                    </div>
                                    <div class="col-6">
                                        <label>Mata Pelajaran</label>
                                        <input type="text" class="form-control" id="mata_pelajaran" disabled="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="judul_pertemuan">Judul Pertemuan</label>
                                        <input type="text" class="form-control" id="judul_pertemuan" name="judul_pertemuan" placeholder="Judul Pertemuan" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="deskripsi_pertemuan">Deskripsi Pertemuan</label>
                                        <textarea class="form-control" id="deskripsi_pertemuan" name="deskripsi_pertemuan" placeholder="Deskripsi Pertemuan" required></textarea>
                                    </div>
                                </div>
                                
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary" id="buttonsimpan" style="display: none;">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-list-taruna" class="modal fade" data-backdrop="true">
        <div class="modal-dialog animate">
            <div class="modal-content ">
                <form id="verifikasitaruna">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="is_verif" value="1">
                    <div class="modal-header ">
                        <div class="modal-title text-md">List Mata Pelajaran</div>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <table id="list-kelompod-id" class="table table-theme table-row v-middle">
                            <thead>
                              <tr>
                                <th class="text-muted">NO</th>
                                <th class="text-muted">Mata Pelajaran</th>
                                <th class="text-muted">Semester</th>
                                <th class="text-muted">Tahun</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="button_verif">Verif</button>
                    </div>
                </form>
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
    const url_pdf = '<?= base_url() . "/" . uri_segment(0) . "/action/pdf/" . uri_segment(1) . "" ?>';


    var dataStart = 0;
    var coreEvents;

    const select2Array = [
        {
            id: 'id_program_studi',
            url: '/prodi_select_get',
            placeholder: 'Pilih program studi',
            params: null
        },
        {
            id: 'id_semester',
            url: '/semester_select_get',
            placeholder: 'Pilih semester',
            params: null
        },
        {
            id: 'id_mata_pelajaran',
            url: '/mata_pelajaran_select_get',
            placeholder: 'Pilih mata pelajaran',
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
            placeholder : 'Berhasil menyimpan pencapaian perkuliahan',
            afterAction : function(result) {
                $("#data-mata_pelajaran tbody").html("");
                $("#datadelete").html("");
                addrows();
                $("#buttonsimpan").hide();
                $('.sel2').val(null).trigger('change')
            }
        }

        coreEvents.editHandler = {
            placeholder : '',
            afterAction : function(result) {
                $("#buttonsimpan").show();
            }
        }

        coreEvents.deleteHandler = {
            placeholder : 'Berhasil menghapus pencapaian perkuliahan',
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

        $('#d-pdf').on('click', function (e) {
            $(this).attr("href", url_pdf+"?o=L");
            $(this).attr("target", "_blank");
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
                {data: "kelompok", orderable: true},
                {data: "mata_pelajaran", orderable: true,
                    render: function (a, type, data, index) {
                        return data.mata_pelajaran+ ' - ' +data.pertemuan_ke;
                    }
                },
                {data: "judul_pertemuan", orderable: true},
                {
                    data: "id", orderable: false,
                    render: function (a, type, data, index) {
                        // let button = '<button class="btn btn-sm btn-outline-info lihat" data-id="'+data.id+'" title="Detail" data-toggle="modal" data-toggle-class="fade-down" data-toggle-class-target=".animate">\
                        //             <i class="fa fa-eye"></i>\
                        //         </button>\
                        //         '
                        let button = '';


                        if(auth_edit == "1"){
                            button += '<button class="btn btn-sm btn-outline-primary edit" data-id="'+data.id+'" title="Edit">\
                                    <i class="fa fa-edit"></i>\
                                </button>\
                                ';
                        }

                        // if(auth_delete == "1"){
                        //     button += '<button class="btn btn-sm btn-outline-danger delete" data-id="'+data.id+'" title="Delete">\
                        //                 <i class="fa fa-trash-o"></i>\
                        //             </button></div>';
                        // }

                        button += (button == "") ? "<b>Tidak ada aksi</b>" : ""

                        return button;
                    }
                }
            ];

        return columns;
    }







</script>