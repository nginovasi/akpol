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
                                        <col style="width:10%" />
                                        <col style="width:20%" />
                                        <col style="width:20%" />
                                        <col style="width:10%" />
                                        <col style="width:15%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Kelompok</span></th>
                                            <th><span>Kapasitas</span></th>
                                            <th><span>Tingkat</span></th>
                                            <th><span>Semester</span></th>
                                            <th><span>Tahun</span></th>
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
                                        <label>Kelompok</label>
                                        <select class="form-control sel2" id="id_kelompok" name="id_kelompok" required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Tahun Ajaran</label>
                                        <input type="tel" class="form-control" id="tahun_ajaran_awal" name="tahun_ajaran_awal" placeholder="####" min="2019" max="2022" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Tingkat</label>
                                        <select class="form-control sel2" id="id_tingkat" name="id_tingkat" required>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Semester</label>
                                        <select class="form-control sel2" id="id_semester" name="id_semester" required>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Jabatan</label>
                                        <select class="form-control sel2" id="id_jabatan" name="id_jabatan" required>
                                        </select>
                                    </div>
                                </div>
                                <table id="data-pendidik" class="table table-theme table-row v-middle" style="border: 1px solid rgba(135, 150, 165, 0.15); border-radius: 0.25rem; border-spacing: 0 !important">
                                    <colgroup>
                                        <col style="width:10%" />
                                        <col style="" />
                                        <col style="width:10%" />
                                    </colgroup>
                                    <thead style="background-color: #F9FAFB;">
                                      <tr>
                                        <th class="text-muted" style="padding: 10px;" >No</th>
                                        <th class="text-muted" style="padding: 10px;" >Taruna</th>
                                        <th class="text-muted" style="padding: 10px;" >Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="counting">
                                            <td>1</td>
                                            <td><input type="hidden" name="id[0]"> <select class="form-control sel2 select2taruna" id="id_taruna" name="id_taruna[0]"></select></td>
                                            <td><a class='del-data-pendidik' href='#' title='Click to remove this entry'><i class='fa fa-trash-o'></i></a></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3">
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
            id: 'id_kelompok',
            url: '/kelompok_select_get',
            placeholder: 'Pilih Kelompok',
            params: null
        },
        {
            id: 'id_tingkat',
            url: '/tingkat_select_get',
            placeholder: 'Pilih Tingkatan',
            params: null
        },
        {
            id: 'id_jabatan',
            url: '/jabatan_select_get',
            placeholder: 'Pilih Jabatan',
            params: null
        },
        {
            id: 'id_semester',
            url: '/semester_select_get',
            placeholder: 'Pilih Semester',
            params: null
        },
        {
            id: 'id_taruna',
            url: '/taruna_select_get',
            placeholder: 'Pilih Taruna',
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
            placeholder : 'Berhasil menyimpan data kelompok taruna',
            afterAction : function(result) {
                $('.sel2').val(null).trigger('change')
                $("#data-pendidik tbody").html("");
                $("#datadelete").html("");
                addrows();
            }
        }

        coreEvents.editHandler = {
            placeholder : '',
            afterAction : function(result) {
                setTimeout(function() {
                    select2Array.forEach (function(x) {
                        if (x.id!='taruna') {
                            if (x.id=='id_kelompok') {
                                $('#' + x.id).select2('trigger', 'select', {
                                    data : {
                                        id: result.data[x.id],
                                        text: result.data[x.id.replace('id', 'nama')],
                                        max_kapasitas: result.data.max_kapasitas
                                    }
                                });
                            } else {
                                $('#' + x.id).select2('trigger', 'select', {
                                    data : {
                                        id: result.data[x.id],
                                        text: result.data[x.id.replace('id', 'nama')]
                                    }
                                });
                            }
                        }
                    });
                    $("#data-pendidik tbody").html("");
                    result.list.forEach (function(list) {

                        var count = $('tr.counting').length;
                        var $row = $("<tr class='counting'>");

                        $row.append($("<td>").html(count+1+'.'));
                        $row.append($("<td>").html('<input type="hidden" name="id['+count+']" value="'+list.id+'" > <select class="form-control sel2 select2taruna" style="width:100%" name="id_taruna['+count+']"></select>'));
                        $row.append($("<td>").html("<a class='del-data-pendidik' data-id='"+list.id+"' href='#' title='Click to remove this entry'><i class='fa fa-trash-o'></i></a>"));

                        $row.appendTo($("#data-pendidik tbody"));
                        $(".select2taruna").append($("<select ><select/>"));
                        $('select[name="id_taruna['+count+']"]').select2("trigger", "select", {
                            data: {
                                id: list.id_taruna,
                                text: list.nama_taruna 
                            }
                        });

                    });
                },500);
            }
        }

        coreEvents.deleteHandler = {
            placeholder : 'Berhasil menghapus data kelompok taruna',
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

        $(document).on("click", ".lihat", function(e) {
            let $this = $(this);
            $("#modal-list-taruna").modal('show');          

            $.ajax({
                url: url_ajax+'/kelompoktaruna_list_get',
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
                        var no = 0;
                        result.data.forEach (function(x) {
                            no = no+1;
                           // console.log(x.namataruna);
                            $("#list-kelompod-id tbody").append('<tr>\
                                <td class="text-muted">'+no+'</td>\
                                <td class="text-muted">'+x.namataruna+'</td>\
                                <td class="text-muted">'+x.noakshort+'</td>\
                              </tr>');
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

        });
        $(document).on('click' , '#add-service-button' , function(){

            if ($("#data-pendidik").find("select.select2taruna").last().val()==null) {
                $("#data-pendidik").find("select.select2taruna").last().select2('open');
            } else {
                addrows();
            }

        }).on("click", ".del-data-pendidik", function(e) {
            let $this = $(this);
            e.preventDefault();
            var $row = $(this).parent().parent();
            var retResult = confirm("Are you sure you wish to remove this entry?");

            if (retResult) {
                if ($this.data('id')) {
                    $("#datadelete").append('<input type="hidden" name="is_deleted[]" value="'+$this.data('id')+'" > ');
                }
                $row.remove();
                numberRows($("#data-pendidik"));
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
                {data: "nama_kelompok", orderable: true},
                {data: "max_kelompok", orderable: true},
                {data: "nama_tingkatan", orderable: true},
                {data: "nama_jabatan", orderable: true},
                {
                    data: "id_tingkat", orderable: true,
                    render: function (a, type, data, index) {
                        return data.tahun_ajaran_awal+'/'+data.tahun_ajaran_akhir;
                    }
                },
                {
                    data: "id", orderable: false,
                    render: function (a, type, data, index) {
                        let button = '<button class="btn btn-sm btn-outline-info lihat" data-id="'+data.id+'" title="Detail" data-toggle="modal" data-toggle-class="fade-down" data-toggle-class-target=".animate">\
                                    <i class="fa fa-eye"></i>\
                                </button>\
                                '

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

    $(function () {
        $('body').on('DOMNodeInserted', '.select2taruna', function () {
            $(this).select2();

            $('.select2taruna').select2({
                id: function(e) { return e.id },
                placeholder: '',
                multiple: false,
                ajax: {
                    url: url_ajax+'/taruna_select_get',
                    dataType: 'json',
                    quietMillis: 500,
                    delay: 500,
                    data: function (param) {
                        var def_param = {
                            keyword: param.term, //search term
                            perpage: 5, // page size
                            page: param.page || 0, // page number
                        };

                        return Object.assign({}, def_param, null);
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 0

                        return {
                            results: data.rows,
                            pagination: {
                                more: false
                            }
                        }
                    }
                },
                templateResult: function(data) { return data.text; },
                templateSelection: function(data){ 
                    if (data.id === '') { 
                        return "Pilih Taruna";
                    }

                    return data.text; 
                },
                escapeMarkup: function(m) {
                    return m;
                }
            });

        });
        
    });


    function addrows(){
        var count = $('tr.counting').length;
        var $row = $("<tr class='counting'>");
        $row.append($("<td>").html(count+1+'.'));
        $row.append($("<td>").html('<input type="hidden" name="id['+count+']"> <select class="form-control sel2 select2taruna" style="width:100%"  name="id_taruna['+count+']"></select>'));
        $row.append($("<td>").html("<a class='del-data-pendidik' href='#' title='Click to remove this entry'><i class='fa fa-trash-o'></i></a>"));
        $row.appendTo($("#data-pendidik tbody"));

          $(".select2taruna").append($("<select ><select/>"));
    }

    function numberRows($t) {
        var c = 0;
        $t.find("tbody tr").each(function(ind, el) {
          $(el).find("td:eq(0)").html(ind+1 +'.');
          $(el).find("td:eq(1) input").attr("name", "id["+ind+"]");
          $(el).find("td:eq(1) select").attr("name", "id_taruna["+ind+"]");
        });
    }

</script>