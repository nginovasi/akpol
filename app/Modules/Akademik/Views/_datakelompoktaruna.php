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
                                            <th><span>Kelompok</span></th>
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
                        <div class="tab-pane fade" id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                            <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <?=csrf_field();?>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label>Kelompok</label>
                                        <select class="form-control" id="id_kelompok" name="id_kelompok" required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label>Tahun Ajaran</label>
                                        <input type="tel" class="form-control" id="thnajaran" name="thnajaran" placeholder="####" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label>Tingkat</label>
                                        <select class="form-control" id="id_tingkat" name="id_tingkat" required>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Semester</label>
                                        <select class="form-control" id="id_semester" name="id_semester" required>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label>Jabatan</label>
                                        <select class="form-control" id="id_jabatan" name="id_jabatan" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Taruna</label>
                                    <select class="form-control" id="taruna">
                                    </select>
                                    <a id="add-service-button">Tambah</a>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Sudah DIKDAS</label>
                                    <select class="form-control" id="is_dikdasbhara" name="is_dikdasbhara" required>
                                        <option></option>
                                        <option value="1">Sudah</option>
                                        <option value="2">Belum</option>
                                    </select>
                                </div> -->

                                    <table id="service-table" class="table table-theme table-row v-middle">
                                        <thead>
                                          <tr>
                                            <th class="text-muted">NO</th>
                                            <th class="text-muted">TARUNA</th>
                                            <th class="text-muted">NIK</th>
                                            <th class="text-muted">Aksi</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
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
            id: 'taruna',
            url: '/taruna_select_get',
            placeholder: 'Pilih Taruna',
            params: null
        },
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

        // mask
        $('input[id="thnajaran"]').mask("0000");
        // mask

        $("#add-service-button").click(function(e) {
            if ($("#taruna").val()!=null) {
                addrows()
            } else {
                // alert('pilih taruna');select2:opening
                $("#taruna").select2('open');
                // document.getElementById('#taruna').click();
            }
        });

        $("#service-table").on("click", ".del-service", function(e) {
            e.preventDefault();
            var $row = $(this).parent().parent();
            var retResult = confirm("Are you sure you wish to remove this entry?");
            if (retResult) {
                $row.remove();
                numberRows($("#service-table"));
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
                {data: "nama_tingkatan", orderable: true},
                {data: "nama_semester", orderable: true},
                {
                    data: "id_tingkat", orderable: true,
                    render: function (a, type, data, index) {
                        return data.tahun_ajaran_awal+'/'+data.tahun_ajaran_akhir;
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

    function numberRows($t) {
        var c = 0;
        $t.find("tbody tr").each(function(ind, el) {
          $(el).find("td:eq(0)").html(++c + ".");
        });
    }

    function addrows(){
        var $row = $("<tr>");
        $row.append($("<td>"));
        $row.append($("<td>").html($("#taruna").select2('data')['0']['namataruna']+'  <input type="hidden" name="id[]" ><input type="hidden" name="id_taruna[]" value="'+$("#taruna").val()+'" >'));
        $row.append($("<td>").html($("#taruna").select2('data')['0']['nik']));
        $row.append($("<td>").html("<a class='del-service' href='#' title='Click to remove this entry'>X</a>"));
        $row.appendTo($("#service-table tbody"));
        numberRows($("#service-table"));
        $("#taruna").val('').trigger('change')
    }
</script>