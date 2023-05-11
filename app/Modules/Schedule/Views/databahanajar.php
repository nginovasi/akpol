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
                                        <col style="width:25%" />
                                        <col style="width:13%" />
                                        <col style="" />
                                        <col style="width:15%" />
                                        <col style="width:15%" />
                                        <col style="width:15%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Mata Pelajaran</span></th>
                                            <th><span>Ketua Tim Pendidik</span></th>
                                            <th><span>Tingkat</span></th>
                                            <th><span>Semester</span></th>
                                            <th><span>Tahun Ajaran</span></th>
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
                                        <label for="id_mata_pelajaran">Mata Pelajaran</label>
                                        <select class="form-control sel2" id="id_mata_pelajaran" name="id_mata_pelajaran" required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="id_user_pendidik">Ketuan Tim Pendidik</label>
                                        <select class="form-control sel2" id="id_user_pendidik" name="id_user_pendidik" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="id_tingkat">Tingkat</label>
                                        <select class="form-control sel2" id="id_tingkat" name="id_tingkat" required>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="id_semester">Semester</label>
                                        <select class="form-control sel2" id="id_semester" name="id_semester" required>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label for="tahun_ajaran">Tahun Ajaran</label>
                                        <input type="tel" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="####" min="2019" max="2022" required>
                                    </div>
                                </div>
                                <table id="bahan-ajar" class="table table-theme table-row v-middle" style="border: 1px solid rgba(135, 150, 165, 0.15); border-radius: 0.25rem; border-spacing: 0 !important">
                                    <colgroup>
                                        <col style="width:5%" />
                                        <col style="width: 30%" />
                                        <col style="width: 40%" />
                                        <col style="width:15%" />
                                        <col style="width:10%" />
                                    </colgroup>
                                    <thead style="background-color: #F9FAFB;">
                                      <tr>
                                        <th class="text-muted" style="padding: 10px;" >No</th>
                                        <th class="text-muted" style="padding: 10px;" >Judul</th>
                                        <th class="text-muted" style="padding: 10px;" >Deskripsi</th>
                                        <th class="text-muted" style="padding: 10px;" >Pertemuan</th>
                                        <th class="text-muted" style="padding: 10px;" >Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="counting">
                                            <td>1</td>
                                            <td><input type="hidden" name="id[0]" ><input type="text" class="form-control judul" name="judul[0]" value="" placeholder="Judul "  required></td>
                                            <td><input type="text" class="form-control deskripsi" name="deskripsi[0]" value="" placeholder="Deskripsi " required ></td>
                                            <td><input type="text" class="form-control pertemuan_ke" name="pertemuan_ke[0]" value="" placeholder="Pertemuan"  required></td>
                                            <td><a class='del-bahan-ajar' href='#' title='Click to remove this entry'><i class='fa fa-trash-o'></i></a></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5">
                                                <button type="button" id="add-service-button" style="width: 100%" class="btn mb-1 btn-outline-akpol">Tambah</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                <div class="modal-header ">
                    <div class="modal-title text-md">List Kelompok Taruna</div>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table id="list-kelompod-id" class="table table-theme table-row v-middle">
                        <thead>
                          <tr>
                            <th class="text-muted">NO</th>
                            <th class="text-muted">TARUNA</th>
                            <th class="text-muted">NIK</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
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
            id: 'id_mata_pelajaran',
            url: '/mata_pelajaran_select_get',
            placeholder: 'Pilih Mata Pelajaran',
            params: null
        },
        {
            id: 'id_user_pendidik',
            url: '/pendidik_select_get',
            placeholder: 'Pilih Ketua Tim Pendidik',
            params: null
        },
        {
            id: 'id_tingkat',
            url: '/tingkat_select_get',
            placeholder: 'Pilih Tingkatan',
            params: null
        },
        {
            id: 'id_semester',
            url: '/semester_select_get',
            placeholder: 'Pilih Semester',
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
            placeholder : 'Berhasil menyimpan data bahan ajar',
            afterAction : function(result) {
                $('.sel2').val(null).trigger('change')
                $("#bahan-ajar tbody").html("");
                $("#datadelete").html("");
                addrows();
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
                    $("#bahan-ajar tbody").html("");
                    result.list.forEach (function(list) {

                        var count = $('tr.counting').length;
                        var $row = $("<tr class='counting'>");

                        $row.append($("<td>").html(count+1+'.'));
                        $row.append($("<td>").html('<input type="hidden" class="id" name="id['+count+']" value="'+list.id+'" > <input type="text" class="form-control judul" name="judul['+count+']" value="'+list.judul+'" placeholder="Judul "  required>'));

                        $row.append($("<td>").html('<input type="text" class="form-control deskripsi" name="deskripsi['+count+']" value="'+list.deskripsi+'" placeholder="Deskripsi " required >'));
                        $row.append($("<td>").html('<input type="text" class="form-control pertemuan_ke" name="pertemuan_ke['+count+']" value="'+list.pertemuan_ke+'" placeholder="Pertemuan"  required>'));

                        $row.append($("<td>").html("<a class='del-bahan-ajar' data-id='"+list.id+"' href='#' title='Click to remove this entry'><i class='fa fa-trash-o'></i></a>"));

                        $row.appendTo($("#bahan-ajar tbody"));
                    });
                },500);
            }
        }

        coreEvents.deleteHandler = {
            placeholder : 'Berhasil menghapus data bahan ajar',
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

        $(document).on('click' , '#add-service-button' , function(){
            if ($("#bahan-ajar").find("input.judul").last().val()=='') {
                $("#bahan-ajar").find("input.judul").last().focus();
            } else if ($("#bahan-ajar").find("input.deskripsi").last().val()=='') {
                $("#bahan-ajar").find("input.deskripsi").last().focus();
            } else if ($("#bahan-ajar").find("input.pertemuan_ke").last().val()=='') {
                $("#bahan-ajar").find("input.pertemuan_ke").last().focus();
            } else {
                addrows();
            }

        }).on("click", ".del-bahan-ajar", function(e) {
            let $this = $(this);
            e.preventDefault();
            var $row = $(this).parent().parent();
            var retResult = confirm("Are you sure you wish to remove this entry?");

            if (retResult) {
                if ($this.data('id')) {
                    $("#datadelete").append('<input type="hidden" name="is_deleted[]" value="'+$this.data('id')+'" > ');
                }
                $row.remove();
                numberRows($("#bahan-ajar"));
            }

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
                {data: "namagadik", orderable: true},
                {data: "tingkatan", orderable: true},
                {data: "semester", orderable: true},
                {data: "tahun_ajaran", orderable: true},
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

    function addrows(){
        var count = $('tr.counting').length;
        var $row = $("<tr class='counting'>");
        $row.append($("<td>").html(count+1+'.'));
        $row.append($("<td>").html('<input type="hidden" class="id" name="id['+count+']" ><input type="text" class="form-control judul" name="judul['+count+']" value="" placeholder="Judul "  required>'));
        $row.append($("<td>").html('<input type="text" class="form-control deskripsi" name="deskripsi['+count+']" value="" placeholder="Deskripsi " required >'));
        $row.append($("<td>").html('<input type="text" class="form-control pertemuan_ke" name="pertemuan_ke['+count+']" value="" placeholder="Pertemuan"  required>'));
        $row.append($("<td>").html("<a class='del-bahan-ajar' href='#' title='Click to remove this entry'><i class='fa fa-trash-o'></i></a>"));
        $row.appendTo($("#bahan-ajar tbody"));
        // numberRows($("#bahan-ajar"));

          $(".select2pendidik").append($("<select ><select/>"));
    }

    function numberRows($t) {
        var c = 0;
        $t.find("tbody tr").each(function(ind, el) {
          $(el).find("td:eq(0)").html(ind+1 +'.');
          $(el).find("td:eq(1) .id").attr("name", "id["+ind+"]");
          $(el).find("td:eq(1) .judul").attr("name", "judul["+ind+"]");
          $(el).find("td:eq(2) .deskripsi").attr("name", "deskripsi["+ind+"]");
          $(el).find("td:eq(3) .pertemuan_ke").attr("name", "pertemuan_ke["+ind+"]");
        });
    }

</script>