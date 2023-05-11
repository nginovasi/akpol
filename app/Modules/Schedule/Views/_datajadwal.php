
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-jadwal" role="tab" aria-controls="tab-jadwal" aria-selected="false">Jadwal</a>
                    </li>
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
                                            <th><span>Batalyon</span></th>
                                            <th><span>Gadik</span></th>
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
                                        <label for="id_kelompok_taruna">Kelompok Taruna</label>
                                        <select class="js-data-example-ajax" id="mySelect2"></select>
                                        <!-- <select class="form-control sel2" id="id_kelompok_taruna" name="id_kelompok_taruna" required>
                                        </select> -->
                                    </div>
                                    <div class="col-6">
                                        <label for="id_ruang_kelas">Ruang Kelas</label>
                                        <select class="form-control sel2" id="id_ruang_kelas" name="id_ruang_kelas" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="id_jam_pertemuan">Jam Pembelajaran</label>
                                        <select class="form-control sel2" id="id_jam_pertemuan" name="id_jam_pertemuan" required>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label for="tanggal">Tanggal Pembelajaran</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="jam_mulai">Jam Mulai</label>
                                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="jam_selesai">Jam Selesai</label>
                                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="id_bahan_ajar">Bahan Ajar</label>
                                        <select class="form-control sel2" id="id_bahan_ajar" name="id_bahan_ajar" required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="id_user_pendidik">Nama Pendidik</label>
                                        <select class="form-control sel2" id="id_user_pendidik" name="id_user_pendidik" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="reset" class="btn btn-light">Reset</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="tab-jadwal" role="tabpanel" aria-labelledby="tab-jadwal">
                            <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <?=csrf_field();?>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="id_tingkatan">Tingkat</label>
                                        <select class="form-control sel2" id="id_tingkatan" name="id_tingkatan" required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="id_semester">Semester</label>
                                        <select class="form-control sel2" id="id_semester" name="id_semester" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="tahun_ajaran">Tahun Ajaran</label>
                                        <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="Tahun Ajaran">
                                    </div>
                                    <div class="col-6">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="text" class="form-control" id="tanggala" name="tanggal" />

                                    </div>
                                </div>
                                <style type="text/css">
                                    [draggable] {
                                        cursor: move;
                                    }

                                    #Unscheduled a {
                                        display: none;
                                    }
                                </style>
                                <div class="form-group row">
                                    <table id="Scheduled" border="1" width="100%">
                                        <caption>Scheduled</caption>
                                        <thead>
                                            <tr>
                                                <!-- <th rowspan="2">Hari</th> -->
                                                <th rowspan="2">Unit</th>
                                                <th rowspan="2">Jam</th>
                                                <th colspan="8">Kelas</th>
                                            </tr>
                                            <tr>
                                                <th width="100px">A</th>
                                                <th width="100px">B</th>
                                                <th width="100px">C</th>
                                                <th width="100px">D</th>
                                                <th width="100px">E</th>
                                                <th width="100px">F</th>
                                                <th width="100px">G</th>
                                                <th width="100px">H</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <!-- <div class="text-right">
                                    <button type="reset" class="btn btn-light">Reset</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div> -->
                            </form>
                            <div class="table-responsive">
                                
                            </div>
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
            id: 'id_kelompok_taruna',
            url: '/kelompok_taruna_select_get',
            placeholder: 'Pilih Kelompok Taruna',
            params: null
        },
        {
            id: 'id_tingkatan',
            url: '/tingkat_select_get',
            placeholder: 'Pilih Tingkat',
            params: null
        },
        {
            id: 'id_semester',
            url: '/semester_select_get',
            placeholder: 'Pilih Semester',
            params: null
        },
        {
            id: 'id_ruang_kelas',
            url: '/ruang_kelas_select_get',
            placeholder: 'Pilih Ruang Kelas',
            params: null
        },
        {
            id: 'id_jam_pertemuan',
            url: '/jam_pertemuan_select_get',
            placeholder: 'Pilih Jam Pembelajaran',
            params: null
        },
        {
            id: 'id_user_pendidik',
            url: '/pendidik_select_get',
            placeholder: 'Pilih Pendidik',
            params: null
        },
    ];

    $(document).ready(function(){
        $('#tanggala').daterangepicker();
        $(".js-data-example-ajax").select2({
          ajax: {
            // url: url_ajax+"/bahan_ajar_select_get",
            url: "https://api.github.com/search/repositories",
            dataType: 'json',
            delay: 250,
            data: function (params) {
              return {
                q: params.term, // search term
                page: params.page
              };
            },
            processResults: function (data, params) {
              // parse the results into the format expected by Select2
              // since we are using custom formatting functions we do not need to
              // alter the remote JSON data, except to indicate that infinite
              // scrolling can be used
              params.page = params.page || 1;
              return {
                results: data.items,
                pagination: {
                  more: (params.page * 10) < data.total_count
                }
              };
            },
            cache: false
          },
          placeholder: 'Search for a repository',
          minimumInputLength: 1,
          templateResult: formatRepo,
          templateSelection: formatRepoSelection
        });

        $("#id_bahan_ajar").select2({
          ajax: {
            url: url_ajax+"/bahan_ajar_select_get",
            // url: "https://api.github.com/search/repositories",
            dataType: 'json',
            delay: 250,
            data: function (params) {
              return {
                keyword: params.term, // search term
                page: params.page,
                perpage : 10
              };
            },
            processResults: function (data, params) {
              // parse the results into the format expected by Select2
              // since we are using custom formatting functions we do not need to
              // alter the remote JSON data, except to indicate that infinite
              // scrolling can be used
              params.page = params.page || 1;
              return {
                results: data.items,
                pagination: {
                  more: (params.page * 10) < data.total_count
                }
              };
            },
            cache: false
          },
          placeholder: 'Search for a repository',
          // minimumInputLength: 1,
          templateResult: formatRepo,
          templateSelection: formatRepoSelection
        });

        function formatRepo (repo) {
          if (repo.loading) {
            return repo.text;
          }

          var $container = $(
            "<div class='select2-result-repository clearfix'>" +
              "<div class='select2-result-repository__meta'>" +
                "<div class='select2-result-repository__title'></div>" +
                "<div class='select2-result-repository__statistics'>" +
                  "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> </div>" +
                  "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> </div>" +
                  "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> </div>" +
                "</div>" +
              "</div>" +
            "</div>"
          );

          $container.find(".select2-result-repository__title").text(repo.text);
          $container.find(".select2-result-repository__forks").append(repo.text + " Forks");
          $container.find(".select2-result-repository__stargazers").append(repo.text + " Stars");
          $container.find(".select2-result-repository__watchers").append(repo.text + " Watchers");

          return $container;
        }

        function formatRepoSelection (repo) {
          return repo.text || repo.text;
        }

        coreEvents = new CoreEvents();
        coreEvents.url = url;
        coreEvents.ajax = url_ajax;
        coreEvents.csrf = { "<?=csrf_token()?>": "<?=csrf_hash()?>" };
        coreEvents.tableColumn = datatableColumn();

        coreEvents.insertHandler = {
            placeholder : 'Berhasil menyimpan data batalyon',
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
            placeholder : 'Berhasil menghapus data batalyon',
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
                {data: "batalyon", orderable: true},
                {data: "namagadik", orderable: true},
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