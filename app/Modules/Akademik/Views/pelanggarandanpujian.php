<div>
    <div class="page-hero page-container " id="page-hero">
        <div class="padding d-flex">
            <div class="page-title">
                <h2 class="text-md text-highlight"><?= $page_title ?></h2>
            </div>
            <div class="flex"></div>
        </div>
    </div>
    <div class="page-content page-container" id="page-content">
        <div class="card">
            <!-- <div class="card-header">
                <ul class="nav nav-pills card-header-pills no-border" id="tab">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-datapelanggaran" role="tab" aria-controls="tab-data" aria-selected="false">Pelanggaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " data-toggle="tab" href="#tab-datapujian" role="tab" aria-controls="tab-data" aria-selected="false">Pujian</a>
                    </li>
                </ul>
            </div> -->
            <div class="card-body">
                <div class="padding">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-datapelanggaran" role="tabpanel" aria-labelledby="tab-data">
                            <div class="table-responsive">
                                <table id="datapelanggaran" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Nama</span></th>
                                            <th><span>Nama</span></th>
                                            <th><span>Pelanggaran</span></th>
                                            <th><span>Semester</span></th>
                                            <th><span>Poin</span></th>
                                            <th class="column-2action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-datapujian" role="tabpanel" aria-labelledby="tab-form">
                            <div class="table-responsive">
                                <table id="datapujian" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Nama</span></th>
                                            <th><span>Pujian</span></th>
                                            <th><span>Semester</span></th>
                                            <th><span>Poin</span></th>
                                            <th class="column-2action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="modalpelanggarandanpujian" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg animate modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Pelanggaran & Pujian</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-4">
                    <img id="_poto" src="http://siap.akpol.ac.id/assets/profile%20picture.jpeg" width="100%">
                </div>
                <div class="col-8">
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label>Nama</label>
                            <p class="text-muted" id="_nama"></p>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Batalyon</label>
                            <p class="text-muted" id="_batalyon"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label>Semester</label>
                            <p class="text-muted" id="_semester"></p>
                        </div>
                        <!-- <div class="form-group col-sm-6">
                            <label>Tingkat</label>
                            <p class="text-muted" id="_tingkat"></p>
                        </div> -->
                    </div>
                    <div class="form-row" id="div_dasar_hukum">
                        <div class="form-group col-sm-12">
                            <label>Dasar Hukum</label>
                            <p class="text-muted" id="_dasarhukum"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label>Deskripsi</label>
                            <p class="text-muted" id="_deskripsi"></p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label>Pelapor</label>
                            <p class="text-muted" id="_pelapor"></p>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Dilaporkan</label>
                            <p class="text-muted" id="_dilaporkan"></p>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <?php if ($rules->i == 1) { ?>
                    <button type="submit" class="btn btn-primary verif" id="button_verif">Verif Pelanggaran</button>
                    <button type="submit" class="btn btn-primary verifpujian" id="button_verifpujian">Verif Pujian</button>
                <?php } ?>
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
    

    const url_insert = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_save"?>';
    const url_edit = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_edit"?>';
    const url_delete = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_delete"?>';
    const url_load = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_load"?>';
    const url_ajax = '<?=base_url()."/".uri_segment(0)."/ajax"?>';
    const url_pdf = '<?= base_url() . "/" . uri_segment(0) . "/action/pdf/" . uri_segment(1) . "" ?>';
    const url_excel = '<?= base_url() . "/" . uri_segment(0) . "/action/excel/" . uri_segment(1) . "" ?>';


    var dataStart = 0;
    var table;

    $(document).ready(function(){
        tampildata();  
        // tampildatapujian();  

         $(document).on("click", ".lihat", function(e) {
            let $this = $(this);

            $("#modalpelanggarandanpujian").modal('show');  
            $(".verif").show();  
            $(".verifpujian").hide();

            if ($this.data('pelanggaran')=="Pelanggaran") {
                lihatpelanggaran($this.data('id'));
            } else {
                lihatpujian($this.data('id'));
            }


        }).on('click', '.verif', function(e) {

            let $this = $(this);

            Swal.fire({
                title: "Menyetujui data ?",
                icon: "info",
                html: 'Yakin ingin menyetujui data ini ?',
                showCancelButton: true,
                confirmButtonText: "Approve",
                confirmButtonColor: '#d33',
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: url+"_otorisasi",
                        type: 'post',
                        data: {
                            id: $this.attr('data-id'),
                            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                        },
                        dataType: 'json',
                        success: function(result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil memverifikasi data pelanggaran', 'success');
                                $("#modalpelanggarandanpujian").modal('hide');    

                                // table.ajax.reload();
                                table.ajax.reload();
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
            })

        }).on("click", ".lihatpujian", function(e) {
            let $this = $(this);

            $("#modalpelanggarandanpujian").modal('show');    
            $(".verif").hide();  
            $(".verifpujian").show();      

        }).on('click', '.verifpujian', function(e) {

            let $this = $(this);

            Swal.fire({
                title: "Menyetujui data ?",
                icon: "info",
                html: 'Yakin ingin menyetujui data ini ?',
                showCancelButton: true,
                confirmButtonText: "Approve",
                confirmButtonColor: '#d33',
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: url+"_otorisasipujian",
                        type: 'post',
                        data: {
                            id: $this.attr('data-id'),
                            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                        },
                        dataType: 'json',
                        success: function(result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil memverifikasi data pujian', 'success');
                                // table.ajax.reload();
                                $("#modalpelanggarandanpujian").modal('hide');    
                                tablepujian.ajax.reload();
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
            })

        });

    });

    function datatableColumnpelanggaran(){
        let columns = [
                {
                    data: "id", orderable: false, width: 100,
                    render: function (a, type, data, index) {
                        return dataStart + index.row + 1
                    }
                },
                {data: "is_pelanggaran", orderable: true},
                {data: "namataruna", orderable: true},
                {data: "dasar_hukum", orderable: true},
                {data: "semester", orderable: true},
                {data: "poin", orderable: true},
                {data: "id", orderable: false,
                    render: function (a, type, data, index) {
                        let button = '';

                    if (auth_otorisasi == "1") {
                        if (data.is_verif == '1') {

                        } else {
                            button = '<button class="btn btn-sm btn-outline-info lihat" data-id="'+data.id+'" data-pelanggaran="'+data.is_pelanggaran+'"  title="Detail" >\
                                    <i class="fa fa-eye"></i>\
                                </button>\
                                ';
                            // button += '<button class="btn btn-sm btn-outline-success verif" data-id="' + data.id + '" title="Verif">\
                            //             <i class="fa fa-check"></i>\
                            //         </button>\
                            //         ';
                            // button += '<button class="btn btn-sm btn-outline-success tolak" data-id="' + data.id + '" title="tolak">\
                            //             <i class="fa fa-times"></i>\
                            //         </button>\
                            //         ';
                        }
                    }

                        button += (button == "") ? "<b>Tidak ada aksi</b>" : ""

                        return button;
                    }
                }
            ];

        return columns;
    }

    function datatableColumnpujian(){
        let columns = [
                {
                    data: "id", orderable: false, width: 100,
                    render: function (a, type, data, index) {
                        return dataStart + index.row + 1
                    }
                },
                {data: "namataruna", orderable: true},
                {data: "indikator", orderable: true},
                {data: "semester", orderable: true},
                {data: "poin", orderable: true},
                {data: "id", orderable: false,
                    render: function (a, type, data, index) {
                        let button = '';

                    if (auth_otorisasi == "1") {
                        if (data.is_verif == '1') {

                        } else {
                            button = '<button class="btn btn-sm btn-outline-info lihatpujian" data-id="'+data.id+'" data-id_batalyon="' + data.id_batalyon + '"data-id_semester="' + data.id_semester + '" title="Detail" >\
                                    <i class="fa fa-eye"></i>\
                                </button>\
                                ';
                            // button += '<button class="btn btn-sm btn-outline-success verif" data-id="' + data.id + '" title="Verif">\
                            //             <i class="fa fa-check"></i>\
                            //         </button>\
                            //         ';
                            // button += '<button class="btn btn-sm btn-outline-success tolak" data-id="' + data.id + '" title="tolak">\
                            //             <i class="fa fa-times"></i>\
                            //         </button>\
                            //         ';
                        }
                    }

                        button += (button == "") ? "<b>Tidak ada aksi</b>" : ""

                        return button;
                    }
                }
            ];

        return columns;
    }

    function tampildata(batalyon , aspek , semester){

        $('#datapelanggaran').dataTable().fnDestroy();
        table = $('#datapelanggaran').DataTable({
            // "dom": "<'row'<'col-sm-4'l><'col-sm-2'B><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p<br/>i>>",
            "dom": "<'row'<'col-sm-6'B><'col-sm-6 clear'>>" + "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p<br/>i>>",
            // "buttons": ['excelFlash', 'excel', 'pdf'],
            "buttons": [{
                    extend: 'collection',
                    text: 'Export',
                    className: 'btn btn-primary glyphicon glyphicon-save-file',
                    buttons: [{
                                text: 'Excel',
                                extend: 'excelHtml5',
                                footer: false,
                                exportOptions: {
                                    columns: ':visible'
                                }
                            }, {
                                text: 'CSV',
                                extend: 'csvHtml5',
                                fieldSeparator: ';',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            }, {
                                text: 'PDF',
                                extend: 'pdfHtml5',
                                message: '',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            }]
                    }]
                ,
            "serverSide": true,
            "processing": true,
            "ordering" : true,
            "paging": true,
            "searching": { "regex": true },
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            "pageLength": 10,
            "searchDelay" : 500,
            "ajax": {
                "type": "POST",
                "url": '<?=base_url()."/".uri_segment(0)."/action/pelanggaran_load"?>',
                "dataType": "json",
                "data": function (data) {
                    // console.log(data);
                    // Grab form values containing user options
                    dataStart = data.start;
                    let form = {};
                    Object.keys(data).forEach(function(key) {
                        form[key] = data[key] || "";
                    });

                    // Add options used by Datatables
                    let info = { 
                        "start": data.start || 0, 
                        "length": data.length, 
                        "draw": 1,  
                        "batalyon" : batalyon,
                        "aspek" : aspek,
                        "semester" : semester,
                        "<?=csrf_token()?>": "<?=csrf_hash()?>"
                    };

                    $.extend(form, info);

                    return form;
                },
                "complete": function(response) {

                    if (response.responseJSON.recordsTotal>0) {
                        $('#d-excel').show();
                        $('#d-pdf').show();
                    } else {
                        $('#d-excel').hide();
                        $('#d-pdf').hide();
                    }
                    feather.replace();
                }
            },
            "columns" : datatableColumnpelanggaran()
        }).on('init.dt', function(){
            $(this).css('width','100%');
        });
    }

    function tampildatapujian(batalyon , aspek , semester){

        $('#datapujian').dataTable().fnDestroy();
        tablepujian = $('#datapujian').DataTable({
            // "dom": "<'row'<'col-sm-4'l><'col-sm-2'B><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p<br/>i>>",
            "dom": "<'row'<'col-sm-6'B><'col-sm-6 clear'>>" + "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p<br/>i>>",
            // "buttons": ['excelFlash', 'excel', 'pdf'],
            "buttons": [{
                    extend: 'collection',
                    text: 'Export',
                    className: 'btn btn-primary glyphicon glyphicon-save-file',
                    buttons: [{
                                text: 'Excel',
                                extend: 'excelHtml5',
                                footer: false,
                                exportOptions: {
                                    columns: ':visible'
                                }
                            }, {
                                text: 'CSV',
                                extend: 'csvHtml5',
                                fieldSeparator: ';',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            }, {
                                text: 'PDF',
                                extend: 'pdfHtml5',
                                message: '',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            }]
                    }]
                ,
            "serverSide": true,
            "processing": true,
            "ordering" : true,
            "paging": true,
            "searching": { "regex": true },
            "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
            "pageLength": 10,
            "searchDelay" : 500,
            "ajax": {
                "type": "POST",
                "url": '<?=base_url()."/".uri_segment(0)."/action/pujian_load"?>',
                "dataType": "json",
                "data": function (data) {
                    // console.log(data);
                    // Grab form values containing user options
                    dataStart = data.start;
                    let form = {};
                    Object.keys(data).forEach(function(key) {
                        form[key] = data[key] || "";
                    });

                    // Add options used by Datatables
                    let info = { 
                        "start": data.start || 0, 
                        "length": data.length, 
                        "draw": 1,  
                        "batalyon" : batalyon,
                        "aspek" : aspek,
                        "semester" : semester,
                        "<?=csrf_token()?>": "<?=csrf_hash()?>"
                    };

                    $.extend(form, info);

                    return form;
                },
                "complete": function(response) {

                    if (response.responseJSON.recordsTotal>0) {
                        $('#d-excel').show();
                        $('#d-pdf').show();
                    } else {
                        $('#d-excel').hide();
                        $('#d-pdf').hide();
                    }
                    feather.replace();
                }
            },
            "columns" : datatableColumnpujian()
        }).on('init.dt', function(){
            $(this).css('width','100%');
        });
    }


    function lihatpelanggaran(id) {
        $.ajax({
                url: url_ajax+'/pelanggarankompi_list_get',
                type: 'post',
                data: {
                    'id': id,
                    "<?=csrf_token()?>": "<?=csrf_hash()?>"
                },
                dataType: 'json',
                beforeSend: function() {
                },
                success: function(result) {
                    Swal.close();
                    if (result.success) {
                        var no = 0;

                        if (result.data[0]['is_pelanggaran']=='Pelanggaran') {
                            $("#button_verif").show();
                            $("#button_verifpujian").hide();
                        }
                        $("#div_dasar_hukum").show();
                        $("#_nama").html(result.data[0]['namataruna']);
                        $("#_batalyon").html(result.data[0]['batalyon']);
                        $("#_semester").html(result.data[0]['semester']);
                        $("#_poto").attr('src', 'http://devel.nginovasi.id/akpol-api/'+result.data[0]['foto'] );
                        $("#_dasarhukum").html(result.data[0]['dasar_hukum']);
                        $("#_deskripsi").html(result.data[0]['deskripsi']);
                        $("#_pelapor").html(result.data[0]['namagadik']);
                        $("#_dilaporkan").html(result.data[0]['created_at']);

                        if (result.data[0]['is_approve']==1) {
                                $("#button_verif").hide()
                            } else {
                                $("#button_verif").show();
                                $("#button_verif").attr('data-id', id);
                            }

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

    function lihatpujian(id) {
        $.ajax({
                url: url_ajax+'/pujiankompi_list_get',
                type: 'post',
                data: {
                    'id': id,
                    "<?=csrf_token()?>": "<?=csrf_hash()?>"
                },
                dataType: 'json',
                beforeSend: function() {
                },
                success: function(result) {
                    Swal.close();
                    if (result.success) {
                        var no = 0;
                        $("#div_dasar_hukum").hide();

                        console.log(result.data[0]['is_pelanggaran']);
                        if (result.data[0]['is_pelanggaran']=='Pujian') {
                            $("#button_verifpujian").show();
                            $("#button_verif").hide();
                        }

                        $("#_nama").html(result.data[0]['namataruna']);
                        $("#_batalyon").html(result.data[0]['batalyon']);
                        $("#_semester").html(result.data[0]['semester']);
                        $("#_poto").attr('src', 'http://devel.nginovasi.id/akpol-api/'+result.data[0]['foto'] );
                        $("#_dasarhukum").html(result.data[0]['dasar_hukum']);
                        $("#_deskripsi").html(result.data[0]['ref1']+'. <br>'+result.data[0]['ref2']+'. <br>'+result.data[0]['ref3']+'. <br>'+result.data[0]['ref4']+'.');
                        $("#_pelapor").html(result.data[0]['namagadik']);
                        $("#_dilaporkan").html(result.data[0]['created_at']);

                        if (result.data[0]['is_approve']==1) {
                                $("#button_verifpujian").hide()
                            } else {
                                $("#button_verifpujian").show();
                                $("#button_verifpujian").attr('data-id', id);
                            }

                    } else {
                        $("#modalpelanggarandanpujian").modal('hide');          
                        Swal.fire('Error', result.message, 'error');
                    }
                },
                error: function() {
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                    $("#modalpelanggarandanpujian").modal('hide');          

                }
            });
    }
</script>