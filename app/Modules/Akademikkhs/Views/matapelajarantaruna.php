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
                                            <th><span>Kode Mata Pelajaran</span></th>
                                            <th><span>Mata Pelajaran</span></th>
                                            <th>Materi</th>
                                            <th>Cek Absensi</th>
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
                                <table id="data-mata_pelajaran" class="table table-theme table-row v-middle" style="border: 1px solid rgba(135, 150, 165, 0.15); border-radius: 0.25rem; border-spacing: 0 !important;">
                                    <colgroup>
                                        <col style="width:5%" />
                                        <col style="width:40%" />
                                        <col style="width:20%" />
                                        <col style="width:10%" />
                                        <col style="width:10%" />
                                        <col style="width:10%" />
                                        <col style="width:5%" />
                                    </colgroup>
                                    <thead style="background-color: #F9FAFB;">
                                      <tr>
                                        <th class="text-muted" style="padding: 10px;" >No</th>
                                        <th class="text-muted" style="padding: 10px;" >Mata Pelajaran</th>
                                        <th class="text-muted" style="padding: 10px;" >Aspek</th>
                                        <th class="text-muted" style="padding: 10px;" >SKS</th>
                                        <th class="text-muted" style="padding: 10px;" >Jml</th>
                                        <th class="text-muted" style="padding: 10px;" >Pertemuan</th>
                                        <th class="text-muted" style="padding: 10px;" >Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="counting">
                                            <td>1</td>
                                            <td><input type="hidden" name="id[0]"> <select class="form-control sel2 select2matkul" name="id_mata_pelajaran[0]" onchange="mypendidik(0)"></select></td>
                                            <td><select class="form-control sel2 select2aspek" name="id_aspek[0]" onchange="myFunction(0)"></select></td>
                                            <td><select class="form-control sel2 select2satuan" name="satuan[0]" onchange="myFunction(0)">
                                                <option value="sks">SKS</option>
                                                <option value="jp">JP</option>
                                                <option value="hari">HARI</option>
                                            </select></td>
                                            <td><input type="text" class="form-control nilai" name="nilai[0]" oninput="myFunction(0)" placeholder="Jumlah"> </td>
                                            <td><input type="text" class="form-control" name="jumlah_pertemuan[0]" > </td>
                                            <td><a class='del-data-mata_pelajaran' href='#' title='Click to remove this entry'><i class='fa fa-trash-o'></i></a></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <button type="button" id="add-service-button" style="width: 100%" class="btn mb-1 btn-outline-akpol">Tambah</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
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

<!--     <div id="modal-list-taruna" class="modal fade" data-backdrop="true">
        <div class="modal-dialog modal-lg animate">
            <div class="modal-content ">
                <form id="verifikasitaruna">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="is_verif" value="1">
                    <div class="modal-header ">
                        <div class="modal-title text-md">List Pertemuan Absen</div>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="d-sm-flex no-shrink mb-4">
                                <div class="px-sm-4 my-3 my-sm-0 flex">
                                    <h2 class="text-md" id="nama_batalyon_modal">Jacqueline Reid</h2>
                                    <h5 class="text-md" id="nama_mata_pelajaran_modal">Jacqueline Reid</h5>
                                    <small class="d-block text-fade" id="nama_semester_modal">Senior Industrial Designer</small>
                                </div>
                            </div>
                        <table id="list-kelompod-id" class="table table-theme table-row v-middle">
                            <thead>
                              <tr>
                                <th class="text-muted">NO</th>
                                <th class="text-muted">Judul</th>
                                <th class="text-muted">Pertemuan</th>
                                <th class="text-muted">Kehadiran</th>
                                <th class="text-muted">Jam Absen</th>
                                <th class="text-muted">Keterangan</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

    <div class="modal fade" id="modal-list-taruna" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg animate modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalScrollableTitle">List Taruna</h5> -->
            <div class="modal-title text-md">List Pertemuan Absen</div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="d-sm-flex no-shrink mb-4">
                <div class="px-sm-4 my-3 my-sm-0 flex">
                    <h2 class="text-md" id="nama_batalyon_modal">Jacqueline Reid</h2>
                    <h5 class="text-md" id="nama_mata_pelajaran_modal">Jacqueline Reid</h5>
                    <small class="d-block text-fade" id="nama_semester_modal">Senior Industrial Designer</small>
                    <!-- <small class="d-block text-fade" id="nama_user_pendidik_modal" style="display: none;">Senior Industrial Designer</small> -->
                </div>
            </div>
            <table id="list-kelompod-id" class="table table-theme table-row v-middle">
                <thead>
                  <tr>
                    <th class="text-muted">NO</th>
                    <th class="text-muted">Judul</th>
                    <th class="text-muted">Pertemuan</th>
                    <th class="text-muted">Kehadiran</th>
                    <!-- <th class="text-muted">Jam Absen</th> -->
                    <th class="text-muted">Keterangan</th>
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

    <div class="modal fade" id="modal-list-materi" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg animate modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalScrollableTitle">List Taruna</h5> -->
            <div class="modal-title text-md">List Materi Pertemuan</div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="d-sm-flex no-shrink mb-4">
           
            </div>
            <table id="list-materi-id" class="table table-theme table-row v-middle">
                <thead>
                  <tr>
                    <th class="text-muted">NO</th>
                    <th class="text-muted">Materi Pembelajaran</th>
                    <th class="text-muted">Download</th>
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
                      

            $.ajax({
                // url: url_ajax+'/datapaketmatakuliah_list_get',
                url: url_ajax+'/datataruna_list_get',
                type: 'post',
                data: {
                    'id': $this.data('id'),
                    "<?=csrf_token()?>": "<?=csrf_hash()?>"
                },
                dataType: 'json',
                beforeSend: function() {
                    $("#list-kelompod-id tbody").html('');
                },
                success: function(result) {
                    Swal.close();
                    if (result.success) {
                        $("#modal-list-taruna").modal('show');
                        var no = 0;

                        $('#nama_batalyon_modal').html(result.data['batalyon']);
                        $('#nama_mata_pelajaran_modal').html(result.data['mata_pelajaran']);
                        $('#nama_semester_modal').html(result.data['semester']);
                        // $('#nama_user_pendidik_modal').html("Ketua Tim Pendidik : "+result.data['namagadik']);
                        result.list.forEach (function(x) {
                            no = no+1;
                            $("#list-kelompod-id tbody").append('<tr>\
                                <td class="text-muted">'+no+'</td>\
                                <td class="text-muted">'+x.judul+'</td>\
                                <td class="text-muted">'+x.pertemuan_ke+'</td>\
                                <td class="text-muted">'+x.is_absen+'</td>\
                                <td class="text-muted">'+x.keterangan+'</td>\
                              </tr>');
                                // <td class="text-muted">'+x.absen_at+'</td>\

                                $("#button_verif").hide()
                        })

                    } else {
                        $("#modal-list-taruna").hide('show');          
                        // Swal.fire('Error', result.message, 'error');
                        Swal.fire('Belum ada pertemuan', result.message, 'info');
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
        }).on("click", ".materi", function(e) {
            let $this = $(this);

            $.ajax({
                url: url_ajax+'/materibymapel_list_get',
                type: 'post',
                data: {
                    'id': $this.data('id'),
                    "<?=csrf_token()?>": "<?=csrf_hash()?>"
                },
                dataType: 'json',
                beforeSend: function() {
                    $("#list-materi-id tbody").html('');
                },
                success: function(result) {
                    Swal.close();
                    if (result.success) {
			            $("#modal-list-materi").modal('show');          
                    	
                        var no = 0;
                        // $('#nama_user_pendidik_modal').html("Ketua Tim Pendidik : "+result.data['namagadik']);
                        result.list.forEach (function(x) {
                            no = no+1;
                            $("#list-materi-id tbody").append('<tr>\
                                <td class="text-muted">'+no+'</td>\
                                <td class="text-muted">'+x.info_file+'</td>\
                                <td class="text-muted"><a href="'+x.lokasi_file+'" target="_BLANK">Download</a></td>\
                              </tr>');

                                $("#button_verif").hide()
                        })

                    } else {
                        Swal.fire('Data Tidak Ditemukan', result.message, 'info');
                    }
                },
                error: function() {
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
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
                {data: "kode_mk", orderable: true},
                {data: "mata_pelajaran", orderable: true},
                {
                    data: "id", orderable: false,
                    render: function (a, type, data, index) {
                        let materi = '<button class="btn btn-sm btn-outline-info materi" data-id="'+data.id+'" title="Materi" >\
                                    '+data.jml+' Materi\
                                </button>\
                                ';

                        return materi;
                    }
                },
                {
                    data: "id", orderable: false,
                    render: function (a, type, data, index) {
                        let button = '<button class="btn btn-sm btn-outline-info lihat" data-id="'+data.id+'" title="Detail" >\
                                    <i class="fa fa-eye"></i>\
                                </button>\
                                '
                        // let button = '';


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