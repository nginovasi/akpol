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
            <div class="card-body">
                <div class="padding">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-data" role="tabpanel" aria-labelledby="tab-data">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_batalyon">Batalyon</label>
                                            <input type="hidden" id="temp_id_batalyon">
                                            <select class="form-control" id="id_batalyon" name="id_batalyon" required>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_kompi">Kompi</label>
                                            <input type="hidden" id="temp_id_kompi">
                                        <select class="form-control" id="id_kompi" name="id_kompi" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_peleton">Peleton</label>
                                            <input type="hidden" id="temp_id_peleton">
                                        <select class="form-control" id="id_peleton" name="id_peleton" required>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="bulan">Bulan</label>
                                        <select class="form-control" id="bulan" name="bulan" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_kelas">Kelas</label>
                                        <select class="form-control" id="id_kelas" name="id_kelas" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group" >
                                        <label for="" style="height: 15px;"></label><br>
                                        <a href="#" id="cek_data" class="btn mb-1 btn-outline-dark">Cari Data</a>
                                        <!-- <a id="d-excel" class="btn mb-1 btn-outline-dark" style="display: none">Download Excel</a> -->
                                        <!-- <a id="d-pdf" class="btn mb-1 btn-outline-dark" style="display: none">Download PDF</a> -->
                                    </div>
                                </div>
                            </div>                          
                            <br>
                            <div>
                                <h4 align="center" style="font-size: 1rem" id="_batalyon"></h4>
                                <h4 align="center" style="font-size: 1rem" id="_kompi"></h4>
                                <h4 align="center" style="font-size: 1rem" id="_peleton"></h4>
                                <h4 align="center" style="font-size: 1rem" id="_bulan"></h4>
                                <h4 align="center" style="font-size: 1rem" id="_kelas"></h4>
                            </div>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Nama</span></th>
                                            <th><span>NO AK</span></th>
                                            <th><span>TON</span></th>
                                            <th><span>KLS</span></th>
                                            <th><span>NA</span></th>
                                            <th><span>Reward</span></th>
                                            <th><span>Punishment</span></th>
                                            <th><span>Total</span></th>
                                            <th><span>Detail</span></th>
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

    <div id="newmodal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header ">
                <div class="modal-title text-md">Data NSP Taruna</div>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table id="list-kelompod-id" class="table table-theme table-row v-middle">
                    <thead>
                        <tr>
                            <th class="text-muted">TARUNA</th>
                            <th class="text-muted">No AK</th>
                        </tr>
                        <tr>
                            <td><div id="m_nama_taruna"></div> </td>
                            <td><div id="m_noak"></div></td>
                        </tr>
                        <tr>
                            <th class="text-muted">Batalyon</th>
                            <th class="text-muted">Kelas</th>
                        </tr>
                        <tr>
                            <td><div id="m_batalyon"></div> </td>
                            <td><div id="m_kelas"></div></td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="table-responsive">
                    <table id="datapelanggarandanpujian" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Jenis</span></th>
                                            <th><span>Deskripsi</span></th>
                                            <th><span>Poin</span></th>
                                            <th><span>Tanggal</span></th>
                                            <th><span>Aksi</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                </div>
                <span class="mx-2" id="example1console"></span>
                <div id="list-container">

            </div>
            <div class="modal-footer">
                <?php if ($rules->i == 1) { ?>
                    <button type="button" class="btn btn-light addpelanggaran"  >Tambah</button>
                <?php } ?>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
    </div>
</div>

<div id="newdatapelanggaranpujian" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabela" aria-hidden="false">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header ">
                <div class="modal-title text-md">Tambah </div>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form data-plugin="parsley" data-option="{}" id="addform" autocomplete="off">
                                <input type="hidden" class="form-control" id="id_nsp" name="id" value="" >
                                <input type="hidden" class="form-control" id="id_taruna_add" name="id_taruna" value="" required>
                                <input type="hidden" class="form-control" name="is_approve" value="1">
                                <input type="hidden" class="form-control" name="approve_at" value="<?=date("Y-m-d H:i:s")?>">
                                <input type="hidden" class="form-control" name="date_pelanggaranpujian" value="<?=date("Y-m-d H:i:s")?>">
                                <input type="hidden" class="form-control" id="id_semester_add" name="id_semester">
                                <input type="hidden" class="form-control" id="id_tingkat_add" name="id_tingkat">
                                <input type="hidden" class="form-control" id="tahun_ajaran_add" name="tahun_ajaran">
                                <?=csrf_field();?>
                                <div class="form-group">
                                    <label for="tahun_ajaran">Nama Taruna</label>
                                    <input type="text" class="form-control" id="nama_taruna_add" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="tgl">Tanggal</label>
                                    <input type="datetime-local" id="date_pelanggaranpujian" class="form-control" name="date_pelanggaranpujian" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Jenis</label>
                                    <select class="form-control" id="is_pelanggaran" name="is_pelanggaran" required>
                                        <option value="1">PELANGGARAN</option>
                                        <option value="0">PUJIAN</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tahun_ajaran">Deskripsi</label>
                                    <textarea class="form-control" id="pelanggaranpujian" name="pelanggaranpujian" style="text-transform: uppercase;" placeholder="Masukan Deskripsi" required="" maxlength="500"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tahun_ajaran">Poin</label>
                                    <input type="text" min='0' max="10"  class="form-control" id="poin" name="poin" maxlength="4" placeholder="Input poin." required="">
                                    <!-- <small>Gunakan tanda baca titik (.) untuk input poin, Contoh : 0.21</small> -->
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-light" form="addform" >Simpan</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css" />

<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.11/lodash.min.js"></script>
<script type="text/javascript">
    var nama_taruna;
    var id_taruna;
    var id_semester;
    var id_tingkat;
    var tahun_ajaran;
    var data_edit;

    const usertype = '<?=$_SESSION['usertype']?>';
    const auth_insert = '<?=$rules->i?>';
    const auth_edit = '<?=$rules->e?>';
    const auth_delete = '<?=$rules->d?>';
    const auth_otorisasi = '<?=$rules->o?>';

    const url_insert = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_save"?>';
    const url_edit = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_edit"?>';
    const url_delete = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_delete"?>';
    const url_load = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_load"?>';
    const url_ajax = '<?=base_url()."/".uri_segment(0)."/ajax"?>';
    const url_pdf = '<?= base_url() . "/" . uri_segment(0) . "/action/pdf/" . uri_segment(1) . "" ?>';
    const url_excel = '<?= base_url() . "/" . uri_segment(0) . "/action/excel/" . uri_segment(1) . "" ?>';
    const url_posting_nilai = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_posting"?>';
    const url_updatensp = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_updatensp"?>';




    var dataStart = 0;
    var table;
    var tablepelanggarandanpujian;
    var hot;

    var dataheader = ['#id','#id_taruna', 'Pelanggaran Dan Pujian', 'Poin'];
    var datacontent = [{
                    data: 'id',
                    readOnly: true
                },{
                    data: 'id_taruna',
                    readOnly: true
                },{
                    data: 'pelanggaranpujian',
                    readOnly: true
                },{
                    data: 'poin',
                    readOnly: true
                }
            ];


    var tempdataheader = [];
    var tempdatacontent = [];

    var allowClearsel2 = true;

    $(document).ready(function(){

        // $('#poin').keyup(function(){
        //     $('#poin').val($('#poin').val().replace(",", "."));
        // }) ;
        if (usertype=='btl' || usertype=='kmp' || usertype=='ptn') {
            allowClearsel2 = false;
            $.ajax({
                url: url_ajax+'/databatkomple',
                method: "POST",
                data: {
                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>",
                    'id' : '<?=$_SESSION['id']?>',
                    'type_code' : usertype
                },
                dataType: 'json',
                success: function(result) {
                    if (usertype=='btl') {
                        $("#temp_id_batalyon").val(result.id_batalyon);
                        $('#id_batalyon').select2('trigger', 'select', {
                            data: {
                                id: result.id_batalyon,
                                text: result.batalyon,
                                ganjil_genap : result.ganjil_genap
                            }
                        });

                    } else if (usertype=='kmp') {
                        $("#temp_id_batalyon").val(result.id_batalyon);
                        $("#temp_id_kompi").val(result.id_kompi);
                        $('#id_batalyon').select2('trigger', 'select', {
                            data: {
                                id: result.id_batalyon,
                                text: result.batalyon,
                                ganjil_genap : result.ganjil_genap
                            }
                        });

                        $('#id_kompi').select2('trigger', 'select', {
                            data: {
                                id: result.id_kompi,
                                text: result.kompi
                            }

                        });
                    } else if (usertype=='ptn') {
                        $("#temp_id_batalyon").val(result.id_batalyon);
                        $("#temp_id_kompi").val(result.id_kompi);
                        $("#temp_id_peleton").val(result.id_peleton);

                        $('#id_batalyon').select2('trigger', 'select', {
                            data: {
                                id: result.id_batalyon,
                                text: result.batalyon,
                                ganjil_genap : result.ganjil_genap
                            }
                        });

                        $('#id_kompi').select2('trigger', 'select', {
                            data: {
                                id: result.id_kompi,
                                text: result.kompi
                            }

                        });

                        $('#id_peleton').select2('trigger', 'select', {
                            data: {
                                id: result.id_peleton,
                                text: result.peleton
                            }
                        });
                    }

                },
                error: function() {
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });
        }


        $(document).on('submit', '#addform', function(e) {
            e.preventDefault();
            let $this = $(this);

            Swal.fire({
                title: "Simpan data ?",
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
                    var formData = new FormData(document.getElementById("addform"));
                    $.ajax({
                        url: url_insert,
                        method: "POST",
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function(result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil menyimpan data', 'success');
                                // $('#addform').trigger("reset");
                                $('#addform')[0].reset();
                                table.ajax.reload();
                                editpelanggaranpujian(data_edit);
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

        $(document).on('change' , '#id_batalyon' , function() {
            $("#id_kompi").val('').trigger('change');
            $("#id_peleton").val('').trigger('change');
            // $("#bulan").val('').trigger('change');
            // $("#id_kelas").val('').trigger('change');
            // tampildata($('#id_batalyon').val() , $('#id_kompi').val() , $('#id_peleton').val() , $('#bulan').val() , $('#id_kelas').val());

        }).on('change' , '#id_kompi' , function() {
            $("#id_peleton").val('').trigger('change');
            // $("#id_kelas").val('').trigger('change');
            // tampildata($('#id_batalyon').val() , $('#id_kompi').val() , $('#id_peleton').val() , $('#bulan').val() , $('#id_kelas').val());

        }).on('change' , '#id_peleton' , function() {
            // $("#id_kelas").val('').trigger('change');
            // tampildata($('#id_batalyon').val() , $('#id_kompi').val() , $('#id_peleton').val() , $('#bulan').val() , $('#id_kelas').val());

        }).on('change' , '#bulan' , function() {
            tampildata($('#id_batalyon').val() , $('#id_kompi').val() , $('#id_peleton').val() , $('#bulan').val() , $('#id_kelas').val());

        }).on('change' , '#id_kelas' , function() {
            tampildata($('#id_batalyon').val() , $('#id_kompi').val() , $('#id_peleton').val() , $('#bulan').val() , $('#id_kelas').val());
            
        });

        select2Init("#id_batalyon", "/batalyon_select_get",  {
            id_batalyon: function() {
                return $('#id_batalyon').val()
            },
            temp_id_batalyon: function() {
                return $('#temp_id_batalyon').val()
            },
        }, function(data) { return data.text; }, function(data){ 
            if (data.id === '') { 
                return "Cari Batalyon";
            }

            return data.text; 
        });

        select2Init("#id_kompi", "/kompi_select_get", {
            id_batalyon: function() {
                return $('#id_batalyon').val()
            },
            temp_id_kompi: function() {
                return $('#temp_id_kompi').val()
            },
        }, function(data) { return data.text; }, function(data){ 
            if (data.id === '') { 
                return "Cari Kompi";
            }

            return data.text; 
        });

        select2Init("#id_peleton", "/peleton_select_get", {
            id_kompi: function() {
                return $('#id_kompi').val()
            },
            temp_id_peleton: function() {
                return $('#temp_id_peleton').val()
            },
        }, function(data) { return data.text; }, function(data){ 
            if (data.id === '') { 
                return "Cari Peleton";
            }

            return data.text; 
        });

        select2Init("#bulan", "/bulan_select_get", {
            ganjil_genap: function() {
                if ($('#id_batalyon').val() == null ) {
                    return '';
                } else {
                    return $('#id_batalyon').select2('data')[0]['ganjil_genap']
                }
            },
        }, function(data) { return data.text; }, function(data){ 
            if (data.id === '') { 
                return "Cari Bulan";
            }

            return data.text; 
        });

        select2Init("#id_kelas", "/withbatkompel_kelas_select_get", {
            id_batalyon: function() {
                return $('#id_batalyon').val();
            },
            id_kompi: function() {
                return $('#id_kompi').val();
            },
            id_peleton: function() {
                return $('#id_peleton').val();
            },
        }, function(data) { return data.text; }, function(data){ 
            if (data.id === '') { 
                return "Cari Kelas";
            }

            return data.text; 
        });


        $('#cek_data').on('click', function (e) {
            tampildata($('#id_batalyon').val() , $('#id_kompi').val() , $('#id_peleton').val() , $('#bulan').val() , $('#id_kelas').val());
        });

        $('#d-excel').on('click', function (e) {
           $(this).attr("href", url_excel + "?o=P&id_batalyon=" + $('#id_batalyon').val() + '&id_aspek=' + $('#id_aspek').val() + '&id_semester=' + $('#id_semester').val() );
            $(this).attr("target", "_blank");
        });

        $('#d-pdf').on('click', function(e) {
            $(this).attr("href", url_pdf + "?o=P&id_batalyon=" + $('#id_batalyon').val() + '&id_aspek=' + $('#id_aspek').val() + '&id_semester=' + $('#id_semester').val() );
            $(this).attr("target", "_blank");
        });


         



        $(document).on('click', '.edit', function() {
        

            // $('#idbuttonnilaitugas').hide();
            // $('#collapseKelas').hide();
            // event.stopPropagation();

            let $this = $(this);
            data_edit = $this;

            editpelanggaranpujian($this);
                
                


        }).on('click', '.updatensp', function() {

            let $this = $(this);

            
                Swal.fire({
                    title: "",
                    icon: "info",
                    text: "Proses mengambil data, mohon ditunggu...",
                    didOpen: function() {
                        Swal.showLoading()
                    }
                });

                $.ajax({
                    url: url_updatensp,
                    type: 'post',
                    data: {
                        id: $this.data('id'),
                        is_pelanggaran: $this.data('is_pelanggaran'),
                        "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                    },
                    dataType: 'json',
                    success: function(result) {
                        Swal.close();
                        if (result.success) {
                            $('#addform').trigger("reset");
                            $('#newmodal').modal('hide');

                            $('#id_nsp').val(result.data['id']);
                            $('#id_taruna_add').val(result.data['id_taruna']);
                            $('#nama_taruna_add').val(nama_taruna);

                            $('#id_semester_add').val(result.data['id_semester']);
                            $('#id_tingkat_add').val(result.data['id_tingkat']);
                            $('#tahun_ajaran_add').val(result.data['tahun_ajaran']);

                            $('#date_pelanggaranpujian').val(result.data['date_pelanggaranpujian'].replace(" ", "T"));
                            $('#is_pelanggaran').val(result.data['is_pelanggaran']);
                            $('#pelanggaranpujian').val(result.data['pelanggaranpujian']);
                            $('#poin').val(result.data['poin']);

                            $('#newdatapelanggaranpujian').modal("show");
                            // $('#addform').trigger("reset");

                           // console.log(result.data['tahun_ajaran']);

                        } else {
                            Swal.fire('Error', result.message, 'error');
                        }
                    },
                    error: function() {
                        Swal.close();
                        Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                    }
                });
            

            

        }) .on('click', '.upload', function() {
           // console.log($(this).attr('data-bulan'))
            if ($(this).attr('data-bulan')=='null') {
                // Swal.fire('Info', 'Mohon Pilih bulan kejadian terlebih dahulu', 'info');
                $('#bulan').select2('open');
            } else {

                let $this = $(this).data();
                data_edit = $this;

                var formData = new FormData();
                formData.append('id_taruna', $(this).attr('data-id_taruna'));
                formData.append('id_semester', $(this).attr('data-semester'));
                formData.append('id_batalyon', $(this).attr('data-batalyon'));
                formData.append('bulan', $("#bulan").val());
                formData.append('nilai', $(this).attr('data-na'));

                formData.append("<?= csrf_token() ?>", "<?= csrf_hash() ?>");
                $.ajax({
                    url: url_posting_nilai,
                    method: "POST",
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(result) {
                        
                        if (result.success) {

                            Swal.fire('Sukses', 'Berhasil memposting nilai', 'success');

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

        }).on('click', '.addpelanggaran', function() {
            $('#addform').trigger("reset");
            $('#id_nsp').val('');
            
            $('#newmodal').modal('hide');
            $('#id_taruna_add').val(id_taruna);
            $('#nama_taruna_add').val(nama_taruna);

            $('#id_semester_add').val($('#id_batalyon').select2('data')[0]['id_semester']);
            $('#id_tingkat_add').val($('#id_batalyon').select2('data')[0]['id_tingkat']);
            $('#tahun_ajaran_add').val($('#id_batalyon').select2('data')[0]['tahun_masuk']);

            $('#newdatapelanggaranpujian').modal('show');
        }).on('click', '.delete', function() {
            let $this = $(this);

            Swal.fire({
                title: "Hapus data ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
                confirmButtonColor: '#d33',
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: url_delete,
                        type: 'post',
                        data: {
                            id: $this.data('id'),
                            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                        },
                        dataType: 'json',
                        success: function(result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil menghapus data pendidik', 'success');
                                table.ajax.reload();
                                // datapelanggarandanpujian.ajax.reload();
                                editpelanggaranpujian(data_edit);

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

    function editpelanggaranpujian($this) {
        $('#datapelanggarandanpujian').dataTable().fnDestroy();
        
        $('#newdatapelanggaranpujian').modal('hide');
        $('#newmodal').modal('show');
        $('#m_nama_taruna').html($this.attr('data-nama'));
        $('#m_noak').html($this.attr('data-no_ak'));
        $('#m_batalyon').html($this.attr('data-batalyon'));
        $('#m_kelas').html($this.attr('data-kelas'));
        
        nama_taruna = $this.attr('data-nama');
        id_taruna = $this.data('id_taruna');

        tablepelanggarandanpujian = $('#datapelanggarandanpujian').DataTable({
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
                "url": url_edit,
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
                        "id_taruna" : $this.data('id_taruna'),
                        "bulan" : $('#bulan').val(),
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
            "columns" : tablepelanggarandanpujianColumn()
        }).on('init.dt', function(){
            $(this).css('width','100%');
        });
    }

    function tablepelanggarandanpujianColumn(){
        let columns = [
                {
                    data: "id", orderable: false, width: 100,
                    render: function (a, type, data, index) {
                        return dataStart + index.row + 1
                    }
                },
                {data: "is_pelanggaran", orderable: true},
                {data: "deskripsi", orderable: true},
                {data: "poin", orderable: true},
                {data: "tgl_pelanggaran", orderable: true},
                {
                    data: "id_taruna", orderable: false,
                    render: function (a, type, data, index) {
                        let button = ''

                        if(auth_edit == "1"){
                            button += '<button class="btn btn-sm btn-outline-primary updatensp" \
                            data-id="'+data.id+'" \
                            data-is_pelanggaran="'+data.is_pelanggaran+'" \
                            title="Edit">\
                                    <i class="fa fa-edit"></i>\
                                </button>\
                                ';
                        }

                        if (auth_delete == "1") {
                            button += '<button class="btn btn-sm btn-outline-danger delete" data-id="' + data.id + '" title="Delete">\
                                            <i class="fa fa-trash-o"></i>\
                                        </button>';
                        }
                        
                        button += (button == '') ? "<b>Tidak ada aksi</b>" : ""

                        return button;
                    }
                }
            ];

        return columns;
    }
    function datatableColumn(){
        let columns = [
                {
                    data: "id", orderable: false, width: 100,
                    render: function (a, type, data, index) {
                        return dataStart + index.row + 1
                    }
                },
                {data: "namataruna", orderable: true},
                {data: "noaklong", orderable: true},
                {data: "batalyon", orderable: true},
                {data: "kelas", orderable: true},
                {data: "na", orderable: true},
                {data: "reward", orderable: true},
                {data: "punisment", orderable: true},
                {data: "total", orderable: true},
                {
                    data: "id_taruna", orderable: false,
                    render: function (a, type, data, index) {
                        let button = ''

                        button += '<button class="btn btn-sm btn-outline-primary edit" \
                        data-id_taruna="'+data.id_m_user+'" \
                        data-nama="'+data.namataruna+'" \
                        data-no_ak="'+data.noaklong+'" \
                        data-batalyon="'+data.batalyon+'" \
                        data-kelas="'+data.kelas+'" \
                        title="Edit">\
                                <i class="fa fa-eye"></i>\
                            </button>\
                            ';

                        if(auth_edit == "1"){
                            button += '<button class="btn btn-sm btn-outline-primary upload" \
                            data-id_taruna="'+data.id_m_user+'" \
                            data-batalyon="'+data.id_batalyon+'" \
                            data-bulan="'+$('#bulan').val()+'" \
                            data-semester="'+data.id_semester+'"\
                            data-na="'+data.total+'"\
                            title="Upload">\
                                    <i class="fa fa-cloud-upload"></i>\
                                </button>\
                                ';
                        }
                        
                        button += (button == '') ? "<b>Tidak ada aksi</b>" : ""

                        return button;
                    }
                }
            ];

        return columns;
    }

    function select2Init(id, url, parameter, template, selection){
        $(id).select2({
            id: function(e) { return e.id },
            placeholder: '',
            allowClear: allowClearsel2,
            multiple: false,
            ajax: {
                url: url_ajax + url,
                dataType: 'json',
                quietMillis: 500,
                delay: 500,
                data: function (param) {
                    var def_param = {
                        keyword: param.term, //search term
                        perpage: 5, // page size
                        page: param.page || 0, // page number
                    };

                    return Object.assign({}, def_param, parameter);
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
            templateResult: template,
            templateSelection: selection,
            escapeMarkup: function(m) {
                return m;
            }
        });
    }

    function tampildata(batalyon , kompi , peleton, bulan , kelas){

        if (batalyon!=null) {
            $('#_batalyon').html( 'BATALYON '+$('#id_batalyon').select2('data')[0]['text']);
        }

        if (kompi!=null) {
            $('#_kompi').html( 'KOMPI '+$('#id_kompi').select2('data')[0]['text']);
        }

        if (peleton!=null) {
            $('#_peleton').html( 'PELETON '+$('#id_peleton').select2('data')[0]['text']);
        }

        if (bulan!=null) {
            $('#_bulan').html( 'BULAN '+$('#bulan').select2('data')[0]['text']);
        }

        if (kelas!=null) {
            $('#_kelas').html( 'KELAS '+$('#id_kelas').select2('data')[0]['text']);
        }


        $('#datatable').dataTable().fnDestroy();
        table = $('#datatable').DataTable({
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
                "url": url_load,
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
                        "kompi" : kompi,
                        "peleton" : peleton,
                        "bulan" : bulan,
                        "kelas" : kelas,
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
            "columns" : datatableColumn()
        }).on('init.dt', function(){
            $(this).css('width','100%');
        });
    }

    function datapelanggarandanpujianload(){
        
    }

    function loadTable(result, is_ketua_tim) {
        //processing data
        result.data.map((value) => {
            if (value.is_pelanggaran==1) {
                value['is_pelanggaran'] = "PELANGGARAN";
            } else {
                value['is_pelanggaran'] = "PUJIAN";
            }

        })

        if (hot !== undefined && !hot.isDestroyed) {
            hot.destroy();
        }
        $('#table-card').show();
        const container = document.querySelector('#list-container');
        const exampleConsole = document.querySelector('#example1console');
        let autosaveNotification;

        // Event for `keydown` event. Add condition after delay of 200 ms which is counted from the time of last pressed key.
        var debounceFn = Handsontable.helper.debounce(function(colIndex, event, input) {
            var filtersPlugin = hot.getPlugin('filters');
            var search = input.value;
            filtersPlugin.removeConditions(colIndex);
            filtersPlugin.addCondition(colIndex, 'contains', [event.target.value]);
            filtersPlugin.filter();
            input.value = search;
            input.focus();

        }, 200);

        const addEventListeners = (input, colIndex) => {
            input.addEventListener('keydown', event => {
                debounceFn(colIndex, event, input);
            });
        };

        // Build elements which will be displayed in header.
        const getInitializedElements = (colIndex, id) => {
            var input = document.getElementById(id);
            if (!input) {
                input = document.createElement('input');
                input.setAttribute("id", id);
            }
            addEventListeners(input, colIndex);
            return input;
        };

        // Add elements to header on `afterGetColHeader` hook.
        const addInput = (col, TH) => {
            // Hooks can return a value other than number (for example `columnSorting` plugin uses this).
            if (typeof col !== 'number') {
                return col;
            }

            let label = $(TH).find('.colHeader').html();
            if (col >= 0 && TH.childElementCount < 2) {
                // && (label === 'Nama Taruna' || label === 'No AK' || label === 'Kelompok')
                if (label === 'Nama Taruna') {
                    TH.appendChild(getInitializedElements(col, 'namataruna-search'));
                } else if (label === 'No AK') {
                    TH.appendChild(getInitializedElements(col, 'noak-search'));
                } else if (label === 'Kelompok') {
                    TH.appendChild(getInitializedElements(col, 'kelompok-search'));
                }
                // TH.appendChild(getInitializedElements(col));
            }
        };

        // Deselect column after click on input.
        var doNotSelectColumn = function(event, coords) {
            if (coords.row === -1 && event.target.nodeName === 'INPUT') {
                event.stopImmediatePropagation();
                this.deselectCell();
            }
        };

        setTimeout(function() {

            hot = new Handsontable(container, {
                data: result.data,
                width: '100%',
                height: 400,
                colHeaders: true,
                rowHeaders: true,
                manualColumnResize: true,
                fixedColumnsLeft: 1,
                fixedRowsTop: 0,
                contextMenu: false,
                manualColumnFreeze: true,
                stretchH: 'last',
                filters: true,
                afterGetColHeader: addInput,
                beforeOnCellMouseDown: doNotSelectColumn,
                renderAllRows: true,
                hiddenColumns: {
                    columns: [0, 1, 2]
                },
                licenseKey: 'non-commercial-and-evaluation',
                nestedHeaders: [
                    ['#id', 'id_edit', '#id_taruna', 'JENIS', 'DESKRIPSI', 'POIN', 'TANGGAL' ]
                ],
                columns: [{
                        data: 'id',
                        readOnly: true
                    },
                    {
                        data: 'id_edit',
                        readOnly: true
                    },
                    {
                        data: 'id_taruna',
                        readOnly: true
                    },
                    {
                        data: 'is_pelanggaran',
                        readOnly: true
                    },
                    {
                        data: 'deskripsi',
                        type: 'text',
                    },
                    {
                        data: 'poin',
                        type: 'text',
                    },
                    {
                        data: 'tgl_pelanggaran',
                        readOnly: true,
                        width: 100,
                    },

                ],
                afterChange: function(change, source) {
                    if (source === 'loadData') {
                        return;
                    }
                    clearTimeout(autosaveNotification);
                    const rowData = hot.getData()[change[0][0]];
                    autosaveNotification = setTimeout(() => {
                        $(".alert").prop('class', 'alert alert-info');
                        exampleConsole.innerText = 'Ubahan pada tabel akan otomatis disimpan';
                    }, 5000);


                        const formData = {
                            "<?= csrf_token() ?>": "<?= csrf_hash() ?>",
                            'id': rowData[1],
                            'id_nsp': rowData[0],
                            'id_taruna': rowData[2],
                            'pelanggaranpujian': rowData[4],
                            'poin': rowData[5],
                            'is_edit': 1
                        };

                        $.ajax({
                            url: url_insert+'tmp',
                            method: "POST",
                            data: formData,
                            dataType: 'json',
                            success: function(result) {
                                if (result.success) {
                                    let res = result.data;
                                    let row = hot.toPhysicalRow(change[0][0]);
                                    hot.setSourceDataAtCell(row, 'id_edit', res.id);
                                    $(".alert").prop('class', 'alert alert-success');
                                    exampleConsole.innerText = 'Ubahan berhasil disimpan : (' + change[0][1] + ' di ubah ' + change[0][2] + ' => ' + change[0][3] + ')';
                                } else {
                                    $(".alert").prop('class', 'alert alert-danger');
                                    exampleConsole.innerText = 'Gagal Menyimpan data ! : (' + change[0][1] + ' di ubah ' + change[0][2] + ' => ' + change[0][3] + ')';
                                }
                            },
                            error: function() {
                                $(".alert").prop('class', 'alert alert-danger');
                                exampleConsole.innerText = 'Gagal Menyimpan data ! : (' + change[0][1] + ' di ubah ' + change[0][2] + ' => ' + change[0][3] + ')';
                            }
                        });
                }
            });
            $("#tugas_accordion").height('auto');
        }, 500);

    }

    function nilaiValidator(value, callback) {
        if (value < 101 && value >= 0) {
            callback(true);
        } else {
            callback(false);
        }
    }
</script>