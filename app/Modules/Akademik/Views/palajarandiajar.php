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
                                    <colgroup>
                                        <col style="width:1%" />
                                        <col style="" />
                                        <col style="" />
                                        <col style="" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Mata Pelajaran</span></th>
                                            <th><span>Kelas</span></th>
                                            <th><span>Batalyon</span></th>
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
                                <div id="datadelete"></div>
                                <?=csrf_field();?>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="id_batalyon">Batalyon</label>
                                        <select class="form-control sel2" id="id_batalyon" name="id_batalyon" required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Semester</label>
                                        <select class="form-control sel2" id="id_semester" name="id_semester" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <input type="hidden" id="tahun_ajaran" name="tahun_ajaran">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-list-taruna" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg animate modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">List Taruna</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table id="list-kelompod-id" class="table table-theme table-row v-middle">
                <thead>
                  <tr>
                    <th class="text-muted">NO</th>
                    <th class="text-muted">Nama</th>
                    <th class="text-muted">No AK</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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

    var is_edit = 0;


    $(document).ready(function(){
        coreEvents = new CoreEvents();
        coreEvents.url = url;
        coreEvents.ajax = url_ajax;
        coreEvents.csrf = { "<?=csrf_token()?>": "<?=csrf_hash()?>" };
        coreEvents.tableColumn = datatableColumn();

        coreEvents.insertHandler = {
            placeholder : 'Berhasil menyimpan data paket mata kuliah',
            afterAction : function(result) {
            }
        }

        coreEvents.editHandler = {
            placeholder : '',
            afterAction : function(result) {
               

            }
        }

        coreEvents.deleteHandler = {
            placeholder : 'Berhasil menghapus data paket mata kuliah',
            afterAction : function() {
                
            }
        }

        coreEvents.resetHandler = {
            action : function() {
                
            }
        }

        coreEvents.load();

        $(document).on("click", ".lihat", function(e) {
            let $this = $(this);
            $("#modal-list-taruna").modal('show');          

            $.ajax({
                // url: url_ajax+'/datapaketmatakuliah_list_get',
                url: url_ajax+'/datatarunadiajar_list_get',
                type: 'post',
                data: {
                    'id_mata_pelajaran': $this.data('id_mata_pelajaran'),
                    'id_kelompok_taruna': $this.data('id_kelompok_taruna'),
                    "<?=csrf_token()?>": "<?=csrf_hash()?>"
                },
                dataType: 'json',
                beforeSend: function() {
                    $("#list-kelompod-id tbody").html('');
                },
                success: function(result) {
                    Swal.close();
                    if (result.success) {
                        var no = 0;
                        result.data.forEach (function(x) {
                            no = no+1;
                            $("#list-kelompod-id tbody").append('<tr>\
                                <td class="text-muted">'+no+'</td>\
                                <td class="text-muted">'+x.namataruna+'</td>\
                                <td class="text-muted">'+x.noaklong+'</td>\
                              </tr>');

                                $("#button_verif").hide()
                            
                            
                        })

                    } else {
                        Swal.fire('Error', result.message, 'error');
                    }
                },
                error: function() {
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });

        }).on('submit', '#verifikasitaruna', function(e) {
            e.preventDefault();
            let $this = $(this);
            console.log($this);

            Swal.fire({
                title: "Verifikasi data ?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    Swal.fire({
                        title: "",
                        icon: "info",
                        text: "Proses menyimpan data, mohon ditunggu...",
                        didOpen: function() {
                            Swal.showLoading()
                        }
                    });
                    var formData = new FormData(document.getElementById("verifikasitaruna"));
                    $.ajax({
                        url: url+'_save',
                        method: "POST",
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function(result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil memverifikasi data paket mata kuliah', 'success');
                                $('#verifikasitaruna').trigger("reset");
                                $('#modal-list-taruna').modal('hide');
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
                {data: "mata_pelajaran", orderable: true},
                {data: "kelompok", orderable: true},
                {data: "info_semester", orderable: true},
                {
                    data: "id", orderable: false,
                    render: function (a, type, data, index) {
                        let button = '<button class="btn btn-sm btn-outline-info lihat" data-id_mata_pelajaran="'+data.id_mata_pelajaran+'" data-id_kelompok_taruna="'+data.id_kelompok_taruna+'" title="Detail" >\
                                    <i class="fa fa-eye"></i>\
                                </button>\
                                '
                        // let button = '';


                        if(auth_edit == "1"){
                            button += '<button class="btn btn-sm btn-outline-primary edit" data-id_mata_pelajaran="'+data.id_mata_pelajaran+'" data-id_kelompok_taruna="'+data.id_kelompok_taruna+'" title="Edit">\
                                    <i class="fa fa-edit"></i>\
                                </button>\
                                ';
                        }

                        if(auth_delete == "1"){
                            button += '<button class="btn btn-sm btn-outline-danger delete" data-id_mata_pelajaran="'+data.id_mata_pelajaran+'" data-id_kelompok_taruna="'+data.id_kelompok_taruna+'" title="Delete">\
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