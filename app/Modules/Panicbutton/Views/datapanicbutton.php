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
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills no-border" id="tab">
                    <li class="nav-item" onclick="hiddenform()">
                        <a class="nav-link active" data-toggle="tab" href="#tab-data" role="tab" aria-controls="tab-data" aria-selected="false">Data</a>
                    </li>
                    <!-- <?php if ($rules->i == 1) { ?> -->
                    <li class="nav-item" id="form-simpan" style="display: none;">
                        <a class="nav-link" data-toggle="tab" href="#tab-form" role="tab" aria-controls="tab-form" aria-selected="false">Form</a>
                    </li>
                    <!-- <?php } ?> -->
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
                                        <col style="width:12%" />
                                        <col style="width:13%" />
                                        <col style="" />
                                        <col style="width:15%" />
                                        <col style="width:15%" />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>KD Laporan</span></th>
                                            <th><span>Keterangan</span></th>
                                            <th><span>Alamat</span></th>
                                            <th><span>Status</span></th>
                                            <th><span>SIAK</span></th>
                                            <th><span>Bidang</span></th>
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
                                <?= csrf_field(); ?>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="id_batalyon">Batalyon</label>
                                        <!-- <select class="form-control sel2" id="id_batalyon" name="id_batalyon" required>
                                        </select> -->
                                        <input type="text" class="form-control" id="nama_batalyon" disabled>
                                        <input type="hidden" class="form-control" id="id_batalyon" name="id_batalyon">
                                    </div>
                                    <div class="col-6">
                                        <label for="id_semester">Semester</label>
                                        <!-- <select class="form-control sel2" id="id_semester" name="id_semester" required>
                                        </select> -->
                                        <input type="text" class="form-control" id="nama_semester" disabled>
                                        <input type="hidden" class="form-control" id="id_semester" name="id_semester">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="id_mata_pelajaran">Mata Pelajaran</label>
                                        <!-- <select class="form-control sel2" id="id_mata_pelajaran" name="id_mata_pelajaran" required>
                                        </select> -->
                                        <input type="text" class="form-control" id="nama_mata_pelajaran" disabled>
                                        <input type="hidden" class="form-control" id="id_mata_pelajaran" name="id_mata_pelajaran">
                                    </div>
                                    <div class="col-6">
                                        <label for="id_user_pendidik">Ketua Tim Pendidik</label>
                                        <!-- <select class="form-control sel2" id="id_user_pendidik" name="id_user_pendidik" required>
                                        </select> -->
                                        <input type="text" class="form-control" id="nama_user_pendidik" disabled>
                                        <input type="hidden" class="form-control" id="id_user_pendidik" name="id_user_pendidik">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <input type="hidden" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="Tahu Ajaran">
                                    <input type="hidden" class="form-control" id="id_tingkat" name="id_tingkat" placeholder="Tingkat">
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
                                            <th class="text-muted" style="padding: 10px;">No</th>
                                            <th class="text-muted" style="padding: 10px;">Judul</th>
                                            <th class="text-muted" style="padding: 10px;">Deskripsi</th>
                                            <th class="text-muted" style="padding: 10px;">Ujian</th>
                                            <th class="text-muted" style="padding: 10px;">Pertemuan</th>
                                            <th class="text-muted" style="padding: 10px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="counting">
                                            <td>1</td>
                                            <td><input type="hidden" name="id[0]"><input type="text" class="form-control judul" name="judul[0]" value="" placeholder="Judul " required></td>
                                            <td><input type="text" class="form-control deskripsi" name="deskripsi[0]" value="" placeholder="Deskripsi " required></td>
                                            <td><select class="form-control is_ujian" name="is_ujian[0]" value="" placeholder="Pertemuan" required>
                                                    <option value="0">Tidak</option>
                                                    <option value="1">UTS</option>
                                                    <option value="2">UAS</option>
                                                </select></td>
                                            <td><input type="text" class="form-control pertemuan_ke" name="pertemuan_ke[0]" value="" oninput="getAllPertemuan(0)" placeholder="Pertemuan" required></td>
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
    <div id="modaldetail" class="modal fade" data-backdrop="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <form id="verifikasitaruna">
                    <div class="modal-header ">
                        <div class="modal-title text-md">Detail Laporan</div>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="p-4">
                            <?= csrf_field(); ?>
                            <div class="d-sm-flex no-shrink mb-4">
                                <div class="px-sm-4 my-3 my-sm-0 flex">
                                    <h2 class="text-md" id="nama_batalyon_modal">Jacqueline Reid</h2>
                                    <h5 class="text-md" id="nama_mata_pelajaran_modal">Jacqueline Reid</h5>
                                    <small class="d-block text-fade" id="nama_semester_modal">Senior Industrial Designer</small>
                                    <small class="d-block text-fade" id="nama_user_pendidik_modal">Senior Industrial Designer</small>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <table class="table table-theme table-row v-middle" style="border: 1px solid rgba(135, 150, 165, 0.15); border-radius: 0.25rem; border-spacing: 0 !important">
                                    <colgroup>
                                        <col style="width:5%" />
                                        <col style="width: 30%" />
                                        <col style="width: 50%" />
                                        <col style="width:15%" />
                                    </colgroup>
                                    <thead style="background-color: #F9FAFB;">
                                        <tr>
                                            <th class="text-muted" style="padding: 10px;">No</th>
                                            <th class="text-muted" style="padding: 10px;">Judul</th>
                                            <th class="text-muted" style="padding: 10px;">Deskripsi</th>
                                            <th class="text-muted" style="padding: 10px;">Ujian</th>
                                            <th class="text-muted" style="padding: 10px;">Pertemuan Ke</th>

                                        </tr>
                                    </thead>
                                    <tbody id="list-modal-body">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
</div>

<script type="text/javascript">
    const auth_insert = '<?= $rules->i ?>';
    const auth_edit = '<?= $rules->e ?>';
    const auth_delete = '<?= $rules->d ?>';
    const auth_otorisasi = '<?= $rules->o ?>';

    const url = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';
    const url_edit = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_edit" ?>';
    const urldetail_load = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "detail_load" ?>';
    

    var dataStart = 0;
    var coreEvents;

    // const select2Array = [
    //     {
    //         id: 'id_mata_pelajaran',
    //         url: '/mata_pelajaran_batalyon_select_get',
    //         placeholder: 'Pilih Mata Pelajaran',
    //         params: { id_batalyon : function(){
    //                                     return $('#id_batalyon').val();
    //                                             },
    //                 id_semester : function(){
    //                                     return $('#id_semester').val();
    //                                             },
    //         }
    //     },
    //     {
    //         id: 'id_user_pendidik',
    //         url: '/pendidik_select_get',
    //         placeholder: 'Pilih Ketua Tim Pendidik',
    //         params: null
    //     },
    //     {
    //         id: 'id_batalyon',
    //         url: '/batalyon_select_get',
    //         placeholder: 'Pilih Batalyon',
    //         params: null
    //     },
    //     {
    //         id: 'id_semester',
    //         url: '/semester_select_get',
    //         placeholder: 'Pilih Semester',
    //         params: null
    //     }
    // ];

    $(document).ready(function() {
        coreEvents = new CoreEvents();
        coreEvents.url = url;
        coreEvents.ajax = url_ajax;
        coreEvents.csrf = {
            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
        };
        coreEvents.tableColumn = datatableColumn();

        coreEvents.insertHandler = {
            placeholder: 'Berhasil menyimpan data bahan ajar',
            afterAction: function(result) {
                $("#bahan-ajar tbody").html("");
                $("#datadelete").html("");
                addrows();
                $('.sel2').val(null).trigger('change');
                $('ul#tab li a').first().trigger('click');
                $("#form-simpan").hide();
            }
        }

        coreEvents.editHandler = {
            placeholder: '',
            afterAction: function(result) {
            }
        }

        coreEvents.deleteHandler = {
            placeholder: 'Berhasil menghapus data bahan ajar',
            afterAction: function() {

            }
        }

        coreEvents.resetHandler = {
            action: function() {

            }
        }

        coreEvents.load();


        // select2Array.forEach (function(x) {
        //     coreEvents.select2Init('#' + x.id, x.url, x.placeholder, x.params);
        // });

        $(document).on('click', '#add-service-button', function() {
            if ($("#bahan-ajar").find("input.judul").last().val() == '') {
                $("#bahan-ajar").find("input.judul").last().focus();
            } else if ($("#bahan-ajar").find("input.deskripsi").last().val() == '') {
                $("#bahan-ajar").find("input.deskripsi").last().focus();
            } else if ($("#bahan-ajar").find("input.pertemuan_ke").last().val() == '') {
                $("#bahan-ajar").find("input.pertemuan_ke").last().focus();
            } else {
                addrows();
            }

        }).on('change', '#id_prodi', function() {
            if ($("#id_prodi").val() == null) {
                $("#tahun_ajaran").val('');
            } else {
                $("#tahun_ajaran").val($("#id_prodi").select2('data')[0]['tahun_ajaran']);
            }
        }).on('change', '#id_semester', function() {

            if ($("#id_semester").val() == null) {
                $("#id_tingkat").val('');
            } else {
                $("#id_tingkat").val($("#id_semester").select2('data')[0]['id_tingkatan']);
            }
        }).on('click', '.detail', function() {
            let $this = $(this);
            $('#id_modal').val($(this).data('id'));
            $('#modaldetail').modal('show');
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
                        $('#list-modal-body').html('');
                        for (key in result.data) {
                            $('#' + key + '_modal').html(result.data[key]);
                        }
                        $('#nama_user_pendidik_modal').html('Ketua Tim Pendidik : ' + result.data.nama_user_pendidik)
                        result.list.forEach((value, index) => {
                           // console.log(value);
                            var is_ujian = "Tidak";
                            if(value.is_ujian === "1"){
                                is_ujian = "UTS"
                            }else if(value.is_ujian === "2"){
                                is_ujian = "UAS"   
                            }
                            $('#list-modal-body').append('<tr>\
                                                    <td>' + (index + 1) + '</td>\
                                                    <td>' + value.judul + '</td>\
                                                    <td>' + value.deskripsi + '</td>\
                                                    <td>' + is_ujian + '</td>\
                                                    <td>' + value.pertemuan_ke + '</td>\
                                                </tr>')
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
        }).on('click', '.siakverif', function(e) {

            let $this = $(this);

            Swal.fire({
                title: "Terima Laporan ?",
                icon: "info",
                html: 'Yakin ingin menerima laporan ini ?',
                showCancelButton: true,
                confirmButtonText: "Terima",
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
                            status : '2',
                            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                        },
                        dataType: 'json',
                        success: function(result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil menerima laporan', 'success');
                                // table.ajax.reload();
                                coreEvents.table.ajax.reload();
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

        }).on('click', '.bidangverif', function(e) {

            let $this = $(this);

            Swal.fire({
                title: "Sudah konfimasi ke bidang ?",
                icon: "info",
                html: 'Yakin ingin mengkonfirmasi sudah di laporan ke bidang ?',
                showCancelButton: true,
                confirmButtonText: "Yakin",
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
                            status : '3',
                            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                        },
                        dataType: 'json',
                        success: function(result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil konfirmasi ke bidang', 'success');
                                // table.ajax.reload();
                                coreEvents.table.ajax.reload();
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

        }).on('click', '.siaktolak', function(e) {

            let $this = $(this);

            Swal.fire({
                title: "Tolak Laporan ?",
                icon: "info",
                html: 'Yakin ingin menolak laporan ini ?',
                showCancelButton: true,
                confirmButtonText: "Tolak",
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
                            status : '9',
                            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                        },
                        dataType: 'json',
                        success: function(result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil menolak laporan', 'success');
                                // table.ajax.reload();
                                coreEvents.table.ajax.reload();
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

    function datatableColumn() {
        let columns = [{
                data: "id",
                orderable: false,
                width: 100,
                render: function(a, type, data, index) {
                    return dataStart + index.row + 1
                }
            },
            {
                data: "kd_aduan",
                orderable: true
            },
            {
                data: "laporan",
                orderable: true
            },
            {
                data: "alamat",
                orderable: true
            },
            {
                data: "keterangan",
                orderable: true
            },
            {
                data: "id",
                orderable: true,
                render: function(a, type, data, index) {
                    let button = '';

                    if (data.status==1) {
                        button += '<button class="btn btn-sm btn-outline-success siakverif" data-id="' + data.id + '" data-kdaduan="' + data.kd_aduan + '" title="Verif">\
                                        <i class="fa fa-check"></i>\
                                    </button>\
                                    ';
                        button += '<button class="btn btn-sm btn-outline-danger siaktolak" data-id="' + data.id + '" data-kdaduan="' + data.kd_aduan + '" title="Tolak">\
                                        <i class="fa fa-close"></i>\
                                    </button>\
                                    ';
                    } else if (data.status==2) {
                        button += 'OK';
                    } else if (data.status==3) {
                        
                        button += 'OK';
                    } else if (data.status==4) {
                        button += 'OK';
                        
                    } else if (data.status==9) {
                        button += 'NO';
                        
                    }

                    return button;

                }
            },
            {
                data: "id",
                orderable: true,
                render: function(a, type, data, index) {
                    let button = '';
                    if (data.status==1) {
                        button += 'Menunggu';

                    } else if (data.status==2) {
                        button += '<button class="btn btn-sm btn-outline-success bidangverif" data-id="' + data.id + '" data-kdaduan="' + data.kd_aduan + '" title="Verif">\
                                        <i class="fa fa-check"></i>\
                                    </button>\
                                    ';
                        button += '<button class="btn btn-sm btn-outline-danger siaktolak" data-id="' + data.id + '" data-kdaduan="' + data.kd_aduan + '" title="Tolak">\
                                        <i class="fa fa-close"></i>\
                                    </button>\
                                    ';

                    } else if (data.status==3) {
                        button += 'OK';
                    } else if (data.status==4) {
                        button += 'OK';
                        
                    } else if (data.status==9) {
                        button += 'NO';
                    }

                    return button;
                }
            }
            // ,
            // {
            //     data: "id",
            //     orderable: false,
            //     render: function(a, type, data, index) {
            //         // let button = '<button class="btn btn-sm btn-outline-info lihat" data-id="'+data.id+'" title="Detail" data-toggle="modal" data-toggle-class="fade-down" data-toggle-class-target=".animate">\
            //         //             <i class="fa fa-eye"></i>\
            //         //         </button>\
            //         //         '
            //         let button = '';
            //         // button += '<button class="btn btn-sm btn-outline-info detail" data-id="' + data.id + '" data-id_batalyon="' + data.id_batalyon + '" data-id_semester="' + data.id_semester + '" data-id_mata_pelajaran="' + data.id_mata_pelajaran + '" title="Detail">\
            //         //                     <i class="fa fa-eye"></i>\
            //         //                 </button>\
            //         //                 ';

            //         if (auth_otorisasi == "1") {
            //             if (data.is_verif == '1') {

            //             } else {
            //                 // button += '<button class="btn btn-sm btn-outline-success verif" data-id="' + data.id + '" data-id_batalyon="' + data.id_batalyon + '" data-id_semester="' + data.id_semester + '" data-id_mata_pelajaran="' + data.id_mata_pelajaran + '" title="Verif">\
            //                 //             <i class="fa fa-check"></i>\
            //                 //         </button>\
            //                 //         ';
            //             }
            //         }

            //         if (auth_edit == "1") {
            //             button += '<button class="btn btn-sm btn-outline-primary edit" data-id="' + data.id + '" title="Edit">\
            //                         <i class="fa fa-edit"></i>\
            //                     </button>\
            //                     ';
            //         }

                    

            //         if (auth_delete == "1") {
            //             button += '<button class="btn btn-sm btn-outline-danger delete" data-id="' + data.id + '" title="Delete">\
            //                             <i class="fa fa-trash-o"></i>\
            //                         </button></div>';
            //         }

            //         button += (button == "") ? "<b>Tidak ada aksi</b>" : ""

            //         return button;
            //     }
            // }
        ];

        return columns;
    }

 
</script>