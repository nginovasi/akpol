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
                                            <th><span>Jenis</span></th>
                                            <th><span>Deskripsi</span></th>
                                            <th><span>Poin</span></th>
                                            <th><span>Status</span></th>
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
    <div id="modaldetail" class="modal fade" data-backdrop="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                    <div class="modal-header ">
                        <div class="modal-title text-md">Detail Kurikulum</div>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="p-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-row">
                                        <div class="form-group col-sm-12">
                                            <label>Deskripsi</label>
                                            <p class="text-muted" id="_deskripsi"></p>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label>Poin</label>
                                            <p class="text-muted" id="_poin"></p>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Tanggal Pelanggaran</label>
                                            <p class="text-muted" id="_tanggal"></p>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label>Status Taruna</label>
                                            <p class="text-muted" id="_approvetrn"></p>
                                        </div>
                                        <div class="form-group col-sm-6" id="_datetrnhide" style="display: none;">
                                            <label>Tanggal Taruna</label>
                                            <p class="text-muted" id="_datetrn"></p>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label>Status Kompi</label>
                                            <p class="text-muted" id="_approvekmp"></p>
                                        </div>
                                        <div class="form-group col-sm-6" id="_datekmphide" style="display: none;">
                                            <label>Tanggal Kompi</label>
                                            <p class="text-muted" id="_datekmp"></p>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6">
                                            <label>Status Batalyon</label>
                                            <p class="text-muted" id="_approvebtl"></p>
                                        </div>
                                        <div class="form-group col-sm-6" id="_datebtlhide" style="display: none;">
                                            <label>Tanggal Batalyon</label>
                                            <p class="text-muted" id="_datebtl"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="_data_id setuju" ><button class="btn btn-danger ">Setuju</button></a>
                        <a href="#" class="_data_id tolak" ><button class="btn btn-light ">Tolak</button></a>
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
</div>
<script type="text/javascript">
    const usertype = '<?=$_SESSION['usertype']?>';
    const auth_insert = '<?=$rules->i?>';
    const auth_edit = '<?=$rules->e?>';
    const auth_delete = '<?=$rules->d?>';
    const auth_otorisasi = '<?=$rules->o?>';

    const url = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)?>';
    const url_ajax = '<?=base_url()."/".uri_segment(0)."/ajax"?>';
    const urldetail_load = '<?= base_url() . "/" . uri_segment(0) . "/action/datanspdetail_load" ?>';
    const urldetail_setuju = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "detail_setuju" ?>';
    const urldetail_tolak = '<?= base_url() . "/" . uri_segment(0) . "/action/datanspdetail_tolak" ?>';

    var dataStart = 0;
    var coreEvents;

    var approve;

    $(document).ready(function(){
       // console.log(usertype)
        coreEvents = new CoreEvents();
        coreEvents.url = url;
        coreEvents.ajax = url_ajax;
        coreEvents.csrf = { "<?=csrf_token()?>": "<?=csrf_hash()?>" };
        coreEvents.tableColumn = datatableColumn();

        coreEvents.insertHandler = {
            placeholder : 'Berhasil menyimpan config parameter',
            afterAction : function(result) {
                $('#nilaiconfigurasi').html('<label for="nilai">Nilai Config</label>\
                                            <input type="text" class="form-control" id="nilai" name="nilai"  required  placeholder="Nilai Config">');
            }
        }

        coreEvents.editHandler = {
            placeholder : '',
            afterAction : function(result) {
                if (result.data['kode']=='SMT') {
                    $('#nilaiconfigurasi').html('<label for="nilai">Nilai Config</label>\
                                            <select class="form-control" id="nilai" name="nilai" required>\
                                                <option value="GENAP" >GENAP</option>\
                                                <option value="GANJIL" ">GANJIL</option>\
                                            </select>\
                                            ');
                } else {
                    $('#nilaiconfigurasi').html('<label for="nilai">Nilai Config</label>\
                                            <input type="text" class="form-control" id="nilai" name="nilai"  required  placeholder="Nilai Config">');
                }
                $('#nilai').val(result.data['nilai']);
            }
        }

        coreEvents.deleteHandler = {
            placeholder : 'Berhasil menghapus config parameter',
            afterAction : function() {
                
            }
        }

        coreEvents.resetHandler = {
            action : function() {
                
            }
        }

        coreEvents.load();


        $(document).on('click', '.detail', function() {
            let $this = $(this);
            $('#id_modal').val($(this).data('id'));
            Swal.fire({
                title: "",
                icon: "info",
                text: "Proses mengambil data, mohon ditunggu...",
                didOpen: function() {
                    Swal.showLoading()
                }
            });

            $.ajax({
                url: urldetail_load,
                type: 'post',
                data: {
                    id: $this.data('id'),
                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                },
                dataType: 'json',
                success: function(result) {
                    Swal.close();
                    if (result.success) {
                        if (result.data['sts_trn']==0) {
                            $sts_trn = "Pending";
                            $("#_datetrnhide").hide();
                        } else if (result.data['sts_trn']==1) {
                            $sts_trn = "Disetujui";
                            $("#_datetrnhide").show();
                        } else if (result.data['sts_trn']==2) {
                            $sts_trn = "Ditolak";
                            $("#_datetrnhide").show();
                            $("._data_id").hide();
                        } else {
                            $sts_trn = "Tidak Terdeteksi";
                            $("#_datetrnhide").hide();
                        }

                        if (result.data['sts_kompi']==0) {
                            $sts_kompi = "Pending";
                            $("#_datekmphide").hide();
                        } else if (result.data['sts_kompi']==1) {
                            $sts_kompi = "Disetujui";
                            $("#_datekmphide").show();
                        } else if (result.data['sts_kompi']==2) {
                            $sts_kompi = "Ditolak";
                            $("#_datekmphide").show();
                        } else {
                            $sts_kompi = "Tidak Terdeteksi";
                            $("#_datekmphide").hide();
                        }

                        if (result.data['sts_btl']==0) {
                            $sts_btl = "Pending";
                            $("#_datebtlhide").hide();
                        } else if (result.data['sts_btl']==1) {
                            $sts_btl = "Disetujui";
                            $("#_datebtlhide").show();
                        } else if (result.data['sts_btl']==2) {
                            $sts_btl = "Ditolak";
                            $("#_datebtlhide").show();
                        } else {
                            $sts_btl = "Tidak Terdeteksi";
                            $("#_datebtlhide").hide();
                        }

                        $('#list-modal-body').html('');
                        $("#_deskripsi").html(result.data['deskripsi']);
                        $("#_poin").html(result.data['poin']);
                        $("#_tanggal").html(result.data['tgl_pelanggaran']);
                        $("#_approvetrn").html($sts_trn);
                        $("#_datetrn").html(result.data['date_trn']);
                        $("#_approvekmp").html($sts_kompi);
                        $("#_datekmp").html(result.data['date_kompi']);
                        $("#_approvebtl").html($sts_btl);
                        $("#_datebtl").html(result.data['date_btl']);
                        $("._data_id").attr('data-id',result.data['id']);
                        $('#modaldetail').modal('show');
                    } else {
                        Swal.fire('Error', result.message, 'error');
                    }
                },
                error: function() {
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });
        }).on('click', '.setuju', function() {
            let $this = $(this);

            Swal.fire({
                title: "",
                icon: "info",
                text: "Proses menyetujui data, mohon ditunggu...",
                didOpen: function() {
                    Swal.showLoading()
                }
            });
            $.ajax({
                url: urldetail_setuju,
                type: 'post',
                data: {
                    id: $(this).attr('data-id'),
                    approvebtl_sts : 1 ,
                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                },
                dataType: 'json',
                success: function(result) {
                    Swal.close();
                    if (result.success) {
                        Swal.fire('Sukses', 'Berhasil menyetujui', 'success');
                        coreEvents.table.ajax.reload();
                        $('#modaldetail').modal('hide');
                    } else {
                        Swal.fire('Error', result.message, 'error');
                    }
                },
                error: function() {
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });
        }).on('click', '.tolak', function() {
            let $this = $(this);
            Swal.fire({
                title: "",
                icon: "info",
                text: "Proses menolak data, mohon ditunggu...",
                didOpen: function() {
                    Swal.showLoading()
                }
            });
            $.ajax({
                url: urldetail_setuju,
                type: 'post',
                data: {
                    id: $(this).attr('data-id'),
                    approvebtl_sts : 2 ,
                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                },
                dataType: 'json',
                success: function(result) {
                    Swal.close();
                    if (result.success) {
                        Swal.fire('Sukses', 'Berhasil menolak', 'success');
                        coreEvents.table.ajax.reload();
                        $('#modaldetail').modal('hide');
                    } else {
                        Swal.fire('Error', result.message, 'error');
                    }
                },
                error: function() {
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
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
                {data: "is_pelanggaran", orderable: true,
                render: function (a, type, data, index) {

                    if (data.is_pelanggaran==1) {
                        return "PELANGGARAN";
                    } else {
                        return "PUJIAN";
                    }
                }
                },
                {data: "deskripsi", orderable: true},
                {data: "poin", orderable: true},
                {data: "approvebtl_sts", orderable: true,
                    render: function (a, type, data, index) {
                        if (data.approvebtl_sts==0) {
                            return "Menunggu persetujuan";
                        } else if (data.approvebtl_sts==1) {
                            return "Disetujui";
                        } else if (data.approvebtl_sts==2) {
                            return "Ditolak";
                        } else {
                            return "tidak terdeteksi";
                        }
                    }
                },
                {
                    data: "id", orderable: false,
                    render: function (a, type, data, index) {
                        let button = ""
                        button += '<button class="btn btn-sm btn-outline-info detail" data-id="' + data.id + '" data-id_batalyon="' + data.id_batalyon + '" data-id_semester="' + data.id_semester + '" data-id_mata_pelajaran="' + data.id_mata_pelajaran + '" title="Detail">\
                                        <i class="fa fa-eye"></i>\
                                    </button>\
                                    ';

                        // if(auth_edit == "1"){
                        //     button += '<button class="btn btn-sm btn-outline-primary edit" data-id="'+data.id+'" title="Edit">\
                        //             <i class="fa fa-edit"></i>\
                        //         </button>\
                        //         ';
                        // }

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