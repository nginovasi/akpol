<style>
    .custom-file-label {
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        display: inline-block;
        padding-right: 20%;
    }

    .btn-outline-primary {
        color: #a62c47;
        border-color: #a62c47;
    }

    .btn-outline-primary:hover {
        color: #ffffff;
        background-color: #ffffff;
        border-color: #a62c47;
    }

    .btn-outline-primary:focus,
    .btn-outline-primary.focus {
        box-shadow: 0 0 0 0.2rem rgba(68, 139, 255, 0.5);
    }

    .btn-outline-primary.disabled,
    .btn-outline-primary:disabled {
        color: #a62c47;
        background-color: transparent;
    }

    .btn-outline-primary:not(:disabled):not(.disabled):active,
    .btn-outline-primary:not(:disabled):not(.disabled).active,
    .show>.btn-outline-primary.dropdown-toggle {
        color: #ffffff;
        background-color: #a62c47;
        border-color: #a62c47;
    }

    .btn-outline-primary:not(:disabled):not(.disabled):active:focus,
    .btn-outline-primary:not(:disabled):not(.disabled).active:focus,
    .show>.btn-outline-primary.dropdown-toggle:focus {
        box-shadow: 0 0 0 0.2rem rgba(68, 139, 255, 0.5);
    }

    .w-96 {
        width: 96px;
        height: 96px;
    }

    .w-128 {
        width: 128px;
        height: 128px;
    }
</style>
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
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-data" role="tab" aria-controls="tab-data" aria-selected="false">Data</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off">
                    <input type="hidden" class="form-control" id="id" name="id" value="" required>
                    <input type="hidden" class="form-control" id="type_code" name="type_code" value="<?= $rules->type_code ?>" required>
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="id_batalyon">Batalyon</label>
                                <ul class="list-unstyled text-sm mt-1 text-muted"></ul>
                                <select class="form-control sel2" id="id_batalyon" name="id_batalyon" required>
                                </select>
                            </div>
                            <!-- <div class="col-6">
                                <label for="id_batalyon">Taruna/Taruni</label>
                                <ul class="list-unstyled text-sm mt-1 text-muted"></ul>
                                <select class="form-control sel2" id="id_gender" name="id_gender" required>
                                    <option value="">Semua</option>
                                    <option value="1">Taruna</option>
                                    <option value="2">Taruni</option>
                                </select>
                            </div> -->
                            <div class="col-6">
                                <label for="id_batalyon">Semester</label>
                                <ul class="list-unstyled text-sm mt-1 text-muted"></ul>
                                <select class="form-control sel2" id="id_semester" name="id_semester" required>
                                </select>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="" style="height: 15px;"></label><br>
                                    <!-- <a id="d-excel" class="btn mb-1 btn-outline-dark" style="display: none">Download Excel</a> -->
                                    <!-- <a id="d-pdf" class="btn mb-1 btn-outline-dark" style="display: none">Download PDF</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <!-- <button type="reset" class="btn btn-light">Reset</button> -->
                        <a id="d-pdf" class="btn btn-light-primary font-weight-bold" style="display: none;">Download PDF</a>
                        <!-- <button type="submit" class="btn btn-primary">Cari</button> -->
                    </div>
                </form>
                <div class="padding">
                    <div class="tab-content" id="accordion">
                        <div class="tab-pane fade active show" id="tab-data" role="tabpanel" aria-labelledby="tab-data">
                            <div>
                                <h4 align="center" style="font-size: 1rem" id="_batalyon"></h4>
                                <h4 align="center" style="font-size: 1rem" id="_gender"></h4>
                            </div>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th style="width:30px;"><span>#</span></th>
                                            <th><span></span></th>
                                            <th><span>Nama Lengkap</span></th>
                                            <th><span>Batalyon</span></th>
                                            <th style="width:40px;"><span>Karakter</span></th>
                                            <th style="width:40px;"><span>Pengetahuan</span></th>
                                            <th style="width:40px;"><span>Keterampilan</span></th>
                                            <th style="width:40px;"><span>Jasmani</span></th>
                                            <th style="width:40px;"><span>Kesehatan</span></th>
                                            <th style="width:40px;"><span>Rerata</span></th>
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
    <div id="modalverifikasitaruna" class="modal fade" data-backdrop="true" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <form id="verifikasitaruna">
                    <div class="modal-header ">
                        <div class="modal-title text-md">Detail Taruna</div>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="p-4">
                            <?= csrf_field(); ?>
                            <div class="d-sm-flex no-shrink mb-4">
                                <div>
                                    <div class="avatar w-96" data-pjax-state="" id="photopath_anchor">
                                        <img class="w-96" id="photopath_modal" src="../assets/img/a1.jpg" alt="." style="object-fit:cover;">
                                    </div>
                                </div>
                                <div class="px-sm-4 my-3 my-sm-0 flex">
                                    <h2 class="text-md" id="namataruna_modal">Jacqueline Reid</h2>
                                    <small class="d-block text-fade" id="noaklong_modal">Senior Industrial Designer</small>
                                    <!-- <div class="my-3">
                                        <a class="mr-2" data-pjax-state=""><strong>Telp</strong>
                                            <span class="text-muted" id="telp_modal">Followers</span>
                                        </a>
                                        <a data-pjax-state=""><strong>Email</strong>
                                            <span class="text-muted" id="email_modal">Following</span>
                                        </a>
                                    </div> -->
                                </div>
                                <!-- <div>
                                    <label for="id_batalyon">Semester</label>
                                    <ul class="list-unstyled text-sm mt-1 text-muted"></ul>
                                    <select class="form-control sel2" id="id_semester" name="id_semester" required>
                                    </select>
                                </div> -->
                            </div>
                            <div class="row mb-4">
                                <div class="row col-12">
                                    <div class="col-3">
                                        <small class="text-muted">Jenis Kelamin</small>
                                        <div class="my-2" id="nama_gender_modal"></div>
                                    </div>
                                    <div class="col-3">
                                        <small class="text-muted">Batalyon</small>
                                        <div class="my-2" id="batalyon_modal"></div>
                                    </div>
                                    <div class="col-3">
                                        <small class="text-muted">Semester</small>
                                        <div class="my-2" id="semester_modal"></div>
                                    </div>
                                    <div class="col-3">
                                        <small class="text-muted">Kelompok</small>
                                        <div class="my-2" id="kelompok_modal"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-12">
                                <div class="col-9">
                                    <div class="text-center">
                                        <div class="block d-inline-flex">
                                            <div id="nilai-chart" class="pos-rlt" style="width: 450px; height: 240px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="text-center">
                                        <div class="block d-inline-flex">
                                            <div class="p-4 p-sm-2 b-r">
                                                <div class="text-muted">Nilai Rerata Aspek</div>
                                                <span class="h2" id="rerata_modal">30</span>
                                                <div class="py-4">
                                                    <small class="text-muted">Nilai dihitung untuk <strong class="smt-label">semester terpilih</strong></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block d-inline-flex">
                                            <div class="p-4 p-sm-2 b-r">
                                                <div class="text-muted">Tingkat Kehadiran</div>
                                                <span class="h2" id="kehadiran_modal">30</span>
                                                <div class="py-4">
                                                    <small class="text-muted">Kehadiran dihitung untuk <strong class="smt-label">semester terpilih</strong></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="block d-inline-flex">
                                    <div class="p-4 p-sm-2 b-r">
                                        <div class="text-muted">Nilai Karakter</div>
                                        <span class="h2" id="karakter_modal">30</span>
                                        <div class="py-4"><a href="#" class="btn btn-sm btn-rounded btn-outline-primary detail-nilai-toggle" data-idaspek="3" data-aspek="t_penilaian_aspek_karakter">Lihat Detail</a></div><small class="text-muted">Nilai dihitung untuk <strong class="smt-label">semester terpilih</strong></small>
                                    </div>
                                    <div class="p-4 p-sm-2 b-r">
                                        <div class="text-muted">Nilai Pengetahuan</div>
                                        <span class="h2" id="pengetahuan_modal">30</span>
                                        <div class="py-4"><a href="#" class="btn btn-sm btn-rounded btn-outline-primary detail-nilai-toggle" data-idaspek="1" data-aspek="t_penilaian_aspek_pengetahuan">Lihat Detail</a></div><small class="text-muted">Nilai dihitung untuk <strong class="smt-label">semester terpilih</strong></small>
                                    </div>
                                    <div class="p-4 p-sm-2 b-r">
                                        <div class="text-muted">Nilai Keterampilan</div>
                                        <span class="h2" id="keterampilan_modal">30</span>
                                        <div class="py-4"><a href="#" class="btn btn-sm btn-rounded btn-outline-primary detail-nilai-toggle" data-idaspek="2" data-aspek="t_penilaian_aspek_keterampilan">Lihat Detail</a></div><small class="text-muted">Nilai dihitung untuk <strong class="smt-label">semester terpilih</strong></small>
                                    </div>
                                    <div class="p-4 p-sm-2 b-r">
                                        <div class="text-muted">Nilai Jasmani</div>
                                        <span class="h2" id="jasmani_modal">30</span>
                                        <div class="py-4"><a href="#" class="btn btn-sm btn-rounded btn-outline-primary detail-nilai-toggle" data-idaspek="5" data-aspek="t_penilaian_aspek_jasmani">Lihat Detail</a></div><small class="text-muted">Nilai dihitung untuk <strong class="smt-label">semester terpilih</strong></small>
                                    </div>
                                    <div class="p-4 p-sm-2 b-r">
                                        <div class="text-muted">Nilai Kesehatan</div>
                                        <span class="h2" id="kesehatan_modal">30</span>
                                        <div class="py-4"><a href="#" class="btn btn-sm btn-rounded btn-outline-primary detail-nilai-toggle" data-idaspek="4" data-aspek="t_penilaian_aspek_kesehatan">Lihat Detail</a></div><small class="text-muted">Nilai dihitung untuk <strong class="smt-label">semester terpilih</strong></small>
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" class="form-control" id="id_modal" name="id" value="" required>
                        </div>
                    </div>
                    <div class="modal-footer" id="verif_container" style="display: none">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>
                </form>

                <!-- <form id="form_login_as" name="form_login_as" class="sign-in-form mx-4 my-4" method="post" enctype="multipart/form-data" autocomplete="off">
                    <?= csrf_field() ?>
                    <input type="hidden" id="username_modal" name="username" required="">
                    <input id="submit_modal" class="btn btn-outline-info" type="submit" name="" value="Login Sebagai Taruna">
                </form> -->
            </div>
            <!-- /.modal-content -->
        </div>
    </div>

    <div id="modaldetailnilai" class="modal fade" data-backdrop="true" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">

                <div class="modal-header ">
                    <div class="modal-title text-md">Detail Nilai</div>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="p-4">
                        <div class="text-center p-2">
                            <h2 class="text-highlight" id="aspek_title_detail" style="text-transform: capitalize;">Simple price for your great product.</h2>
                        </div>
                        <div>
                            <div class="text-center">
                                <div class="block d-inline-flex">
                                    <div class="p-4 p-sm-4 b-r">
                                        <div class="text-muted">Nama</div>
                                        <span class="h3" id="namataruna_detail">30</span>
                                    </div>
                                    <div class="p-4 p-sm-4 b-r">
                                        <div class="text-muted">Semester</div>
                                        <span class="h3" id="semester_detail">30</span>
                                    </div>
                                    <div class="p-4 p-sm-4 b-r">
                                        <div class="text-muted">NA Rerata</div>
                                        <span class="h3" id="nilai_akhir_detail">30</span>
                                    </div>

                                </div>
                            </div>
                            <div style="overflow:auto;">
                                <table class="table table-theme v-middle table-hover" style="overflow-x: auto;">
                                    <thead class="text-muted" id="header-nilai-table">
                                    </thead>
                                    <tbody id="detail-nilai-table">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="close-detail-nilai btn btn-light" data-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script type="text/javascript">
    const auth_insert = '<?= $rules->i ?>';
    const auth_edit = '<?= $rules->e ?>';
    const auth_delete = '<?= $rules->d ?>';
    const auth_otorisasi = '<?= $rules->o ?>';

    const url_insert = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_save" ?>';
    const url_edit = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_edit" ?>';
    const url_delete = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_delete" ?>';
    const url_load = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_load" ?>';
    const url_load_nilai = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_load_nilai" ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';
    const url_pdf = '<?= base_url() . "/" . uri_segment(0) . "/action/pdf/" . uri_segment(1) . "" ?>';
    const url_excel = '<?= base_url() . "/" . uri_segment(0) . "/action/excel/" . uri_segment(1) . "" ?>';

    var dataStart = 0;
    var table;
    var kerabat_index = 0;
    var chart;

    const select2Array = [{
            id: 'id_batalyon',
            url: '/batalyon_select_get',
            placeholder: 'Pilih Batalion',
            params: null
        },
        {
            id: 'id_semester',
            url: '/semester_select_get',
            placeholder: 'Pilih Semester',
            params: null
        }

    ];

    $(document).ready(function() {
        $('.modal').on('hidden.bs.modal', function(e) {
            if ($('.modal').hasClass('in')) {
                $('body').addClass('modal-open');
            }
        });

        $(document).on('change', '#id_batalyon', function() {
            if ($('#id_batalyon').val() != null) {
                $('#tahun_masuk').val($('#id_batalyon').select2('data')[0]['tahun_masuk']);
            }
        });

        $("#form_login_as").submit(function(event) {
            event.preventDefault();
            var $form = $(this);

            Swal.fire({
                title: "",
                icon: "info",
                text: "Mohon ditunggu...",
                onOpen: function() {
                    Swal.showLoading()
                }
            })

            var url = '<?= base_url() ?>/auth/action/login_as';

            $.post(url, $form.serialize(), function(data) {
                var ret = $.parseJSON(data);
                swal.close();
                if (ret.success) {
                    window.location = "<?= base_url() ?>/main";
                } else {
                    Swal.fire({
                        title: ret.title,
                        text: ret.text,
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2500
                    })
                }
            }).fail(function(data) {
                swal.close();
                Swal.fire({
                    title: 'Error',
                    text: '404 Halaman Tidak Ditemukan',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2500
                })
            });
        });



        $(document).on('click', '.detail', function() {
            let $this = $(this);
            $('#id_modal').val($(this).data('id'));
            tampilDetail($this.data('id'));
        }).on('change', '#id_batalyon', function() {
            if ($('#id_semester').val()) {
                tampilData($('#id_batalyon').val(), $('#id_semester').val());
            }
        }).on('change', '#id_semester', function() {
            if ($('#id_batalyon').val()) {
                $('.smt-label').html($('#id_semester').select2('data')[0]['text'])
                tampilData($('#id_batalyon').val(), $('#id_semester').val());
            }
        })
        // .on('change', '#id_semester', function() {
        //     $('.smt-label').html($('#id_semester').select2('data')[0]['text'])
        //     tampilDetail($('#id_modal').val());
        // });

        select2Array.forEach(function(x) {
            select2Init('#' + x.id, x.url, x.placeholder, x.params);
        });

        $("#id_gender").select2({
            placeholder: 'Pilih Taruna/Taruni'
        });


        $('#d-excel').on('click', function(e) {
            $(this).attr("href", url_excel + "?o=P&id_batalyon=" + $('#id_batalyon').val() + '&id_semester=' + $('#id_semester').val());
            $(this).attr("target", "_blank");
        })

        $('#d-pdf').on('click', function(e) {
            $(this).attr("href", url_pdf + "?o=L&id_batalyon=" + $('#id_batalyon').val() + '&id_semester=' + $('#id_semester').val());
            $(this).attr("target", "_blank");
        })


        $('.detail-nilai-toggle').on('click', function(e) {
            $('#modaldetailnilai').css('overflow', 'auto');
            $('#modalverifikasitaruna').modal('hide');
            $('#modaldetailnilai').modal('show');
            tampilDetailNilai($(this).data('idaspek'), $(this).data('aspek'), $(this).data('id-taruna'), $('#id_semester').val())
        })

        $('.close-detail-nilai').on('click', function(e) {
            $('#modalverifikasitaruna').css('overflow', 'auto');
            $('#modalverifikasitaruna').modal('show');
            $('#modaldetailnilai').modal('hide');
        })
    });

    function datatableColumn() {
        let columns = [{
                data: "id",
                orderable: false,
                width: 40,
                render: function(a, type, data, index) {
                    return dataStart + index.row + 1
                }
            },
            {
                data: "noaklong",
                orderable: true,
                render: function(a, type, data, index) {
                    if (data.photopath) {
                        return '<a href="#"><span class="w-32 avatar circle bg-info-lt">' +
                            '<img src="' + data.photopath + '" alt="." style="width: 32px; height: 32px; object-fit: cover;">' +
                            '</span></a>';
                    } else {
                        return '<a href="#" ><span class="w-32 avatar gd-warning">' + data.namataruna.charAt(0) + '</span></a>';
                    }

                }
            },
            {
                data: "namataruna",
                orderable: true,
                render: function(a, type, data, index) {
                    return '<a href = "#"class = "item-title text-color detail" data-id="' + data.id + '"> ' + data.namataruna + ' </a>' +
                        '<div class="item-except text-muted text-sm h-1x">' + data.noaklong + '</div >'
                }
            },
            {
                data: "batalyon",
                orderable: true,
                render: function(a, type, data, index) {
                    return '<div href = "#"class = "item-title text-color" > ' + data.batalyon + ' </div>' +
                        '<div class="item-except text-muted text-sm h-1x">' + data.nama_gender + '</div >'
                }
            },
            {
                data: "rata_karakter",
                width: 40,
                className: 'text-right',
                orderable: true,
                render: function(a, type, data, index) {
                    return '<div href = "#"class = "item-title text-color" > ' + data.rata_karakter ? data.rata_karakter : 0 + ' </div>' +
                        '<div class="item-except text-muted text-sm h-1x">Rank(' + data.rata_karakter ? data.karakter_rank : 'Nilai Kosong' + ')</div >'
                }
            },
            {
                data: "rata_pengetahuan",
                width: 40,
                className: 'text-right',
                orderable: true,
                render: function(a, type, data, index) {
                    return '<div href = "#"class = "item-title text-color" > ' + data.rata_pengetahuan ? data.rata_pengetahuan : 0 + ' </div>' +
                        '<div class="item-except text-muted text-sm h-1x">Rank(' + data.rata_pengetahuan ? data.pengetahuan_rank : 'Nilai Kosong' + ')</div >'
                }
            },
            {
                data: "rata_keterampilan",
                width: 40,
                className: 'text-right',
                orderable: true,
                render: function(a, type, data, index) {
                    return '<div href = "#"class = "item-title text-color" > ' + data.rata_keterampilan ? data.rata_keterampilan : 0 + ' </div>' +
                        '<div class="item-except text-muted text-sm h-1x">Rank(' + data.rata_keterampilan ? data.keterampilan_rank : 'Nilai Kosong' + ')</div >'
                }
            },
            {
                data: "rata_jasmani",
                width: 40,
                className: 'text-right',
                orderable: true,
                render: function(a, type, data, index) {
                    return '<div href = "#"class = "item-title text-color" > ' + data.rata_jasmani ? data.rata_jasmani : 0 + ' </div>' +
                        '<div class="item-except text-muted text-sm h-1x">Rank(' + data.rata_jasmani ? data.jasmani_rank : 'Nilai Kosong' + ')</div >'
                }
            },
            {
                data: "rata_kesehatan",
                width: 40,
                className: 'text-right',
                orderable: true,
                render: function(a, type, data, index) {
                    return '<div href = "#"class = "item-title text-color" > ' + data.rata_kesehatan ? data.rata_kesehatan : 0 + ' </div>' +
                        '<div class="item-except text-muted text-sm h-1x">Rank(' + data.rata_kesehatan ? data.kesehatan_rank : 'Nilai Kosong' + ')</div >'
                }
            },
            {
                data: "rerata",
                width: 40,
                className: 'text-right',
                orderable: true,
                render: function(a, type, data, index) {
                    return '<div href = "#"class = "item-title text-color" > ' + data.rerata ? data.rerata : 0 + ' </div>' +
                        '<div class="item-except text-muted text-sm h-1x">Rank(' + data.rerata ? data.rerata_rank : 'Nilai Kosong' + ')</div >'
                }
            },
            // {
            //     data: "id",
            //     orderable: false,
            //     render: function(a, type, data, index) {
            //         let button = ""


            //         button += '<button class="btn btn-sm btn-outline-info detail" data-id="' + data.id + '" title="Detail">\
            //                             <i class="fa fa-eye"></i>\
            //                         </button>\
            //                         ';

            //         button += (button == "") ? "<b>Tidak ada aksi</b>" : ""

            //         return button;
            //     }
            // }
        ];

        return columns;
    }

    function tampilData(batalyon, semester) {

        if (batalyon != null) {
            $('#_batalyon').html('BATALYON ' + $('#id_batalyon').select2('data')[0]['text']);
        }

        if (semester != null || semester == '') {
            $('#_gender').html('Semester : ' + $('#id_semester').select2('data')[0]['text']);
        }

        $('#datatable').dataTable().fnDestroy();
        table = $('#datatable').DataTable({
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
            }],
            "serverSide": true,
            "processing": true,
            "ordering": true,
            "paging": true,
            "searching": {
                "regex": true
            },
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "pageLength": 10,
            "searchDelay": 500,
            "ajax": {
                "type": "POST",
                "url": url_load,
                "dataType": "json",
                "data": function(data) {
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
                        "id_batalyon": batalyon,
                        "id_semester": semester,
                        "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                    };

                    $.extend(form, info);

                    return form;
                },
                "complete": function(response) {

                    if (response.responseJSON.recordsTotal > 0) {
                        $('#d-excel').show();
                        $('#d-pdf').show();
                    } else {
                        $('#d-excel').hide();
                        $('#d-pdf').hide();
                    }
                    feather.replace();
                }
            },
            "columns": datatableColumn()
        }).on('init.dt', function() {
            $(this).css('width', '100%');
        });
    }

    function tampilDetail(id) {
        $('#modalverifikasitaruna').modal('show');
        Swal.fire({
            title: "",
            icon: "info",
            text: "Proses mengambil data, mohon ditunggu...",
            didOpen: function() {
                Swal.showLoading()
            }
        });

        $.ajax({
            url: url_edit,
            type: 'post',
            data: {
                id: id,
                id_semester: $('#id_semester').val(),
                id_batalyon: $('#id_batalyon').val(),
                "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
            },
            dataType: 'json',
            success: function(result) {
                Swal.close();
               // console.log(result);
                if (result.success) {
                    var image_url;
                    if (result.data.photopath) {
                        image_url = result.data.photopath.includes('./public/photo') ? result.data.photopath.replace('./', 'http://devel.nginovasi.id/akpol-api/') : result.data.photopath;
                        $("#photopath_anchor").html('<img class="w-96" id="photopath_modal" src="' + image_url + '" alt="." style="object-fit:cover;">')
                    } else {
                        $("#photopath_anchor").html('<span class="w-96 avatar gd-warning" style="width: 96px; height: 96px">\
                                            <span class="avatar-status on b-white avatar-right" style="width: 14px; height: 14px"></span>\
                                            <h2 class="alert-heading">' + result.data.namataruna.charAt(0) + '</h2>\
                                        </span>')
                    }

                    // var image_url = result.data.photopath.includes('./public/photo') ? result.data.photopath.replace('./', 'http://devel.nginovasi.id/akpol-api/') : result.data.photopath;
                    // $("#photopath_modal").attr("src", image_url);
                    $('#id_m_usermodal').val(result.data['id_m_user']);
                    for (key in result.data) {
                        $('#' + key + '_modal').html(result.data[key]);
                    }
                    $('#nik_modal').html('NIK : ' + result.data.nik)
                    $('#alamat_modal').html(result.data.alamat_ktp + ', ' + result.data.nama_kel_ktp + ', ' + result.data.nama_kec_ktp + ', ' + result.data.nama_kota_kab_ktp + ', ' + result.data.nama_prov_ktp)
                    if (result.data.is_verif === '1') {
                        $('#verif_container').hide();
                    } else {
                        $('#verif_container').show();
                    }
                    $('#username_modal').val(result.data.username);
                    $('#password_modal').val(result.data.password);

                    $('#kehadiran_modal').html(result.absen + '%');
                    $('.detail-nilai-toggle').data("id-taruna", id);

                    renderNilaiChart(result.data);
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

    function tampilDetailNilai(id_aspek, aspek, id_taruna, id_semester) {
        $('#aspek_title_detail').html(aspek.replace(/t_/g, "").replace(/_/g, " "));
        $.ajax({
            url: url_load_nilai,
            type: 'post',
            data: {
                "<?= csrf_token() ?>": "<?= csrf_hash() ?>",
                "id_batalyon": $('#id_batalyon').val(),
                "id_aspek": id_aspek,
                "aspek": aspek,
                "id_m_user": id_taruna,
                "id_semester": id_semester
            },
            dataType: 'json',
            success: function(result) {
                if (result.success) {
                    if (result.data) {
                        var content = '';
                        var header = '<tr>';
                        result.data.forEach(function(x, index) {
                            var row = '<tr class=" v-middle"><tr>';
                            for (key in x) {
                                $('#' + key + '_detail').html(x[key]);
                                if ((!isNaN(Number(x[key])) || key === 'mata_pelajaran' || key === 'kategori' ||
                                        key === 'kelompok' || key === 'klasifikasi') && key.substring(key.length - 1) !== "_" &&
                                    !key.includes('_by') && key !== 'is_deleted' && !key.includes('id') &&
                                    key !== 'kompi' && key !== 'peleton' && key !== 'last_edited_at' && key !== 'photopath' && key !== 'created_at') {
                                    if (index == result.data.length - 1) {
                                        header += '<th style="text-transform: uppercase;">' + key.replace(/_/g, " ") + '</th>';
                                    }
                                    row += '<td>\
                                            <span class="item-amount d-none d-sm-block text-sm ">' + (x[key] ? x[key] : '-') + '</span>\
                                        </td>';
                                }

                            };
                            row += '</tr>';
                            header += '</tr>';
                            content += row;
                        });
                        $('#nilai_akhir_detail').html(_.meanBy(result.data, function(o) {
                            return parseFloat(o.nilai_akhir ? o.nilai_akhir : 0.0)
                        }).toFixed(2));
                        $('#namataruna_detail').html(result.data[0].namataruna);
                        $('#semester_detail').html($('#id_semester').select2('data')[0]['text'].replace('Semester ', ''));
                        $('#detail-nilai-table').html(content);
                        $('#header-nilai-table').html(header);
                    }
                } else {
                    Swal.fire('Error', result.message, 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
            }
        });
    }

    function select2Init(id, url, placeholder, parameter) {
        $(id).select2({
            id: function(e) {
                return e.id
            },
            placeholder: placeholder,
            multiple: false,
            ajax: {
                url: url_ajax + url,
                dataType: 'json',
                quietMillis: 500,
                delay: 500,
                data: function(param) {
                    var def_param = {
                        keyword: param.term, //search term
                        perpage: 5, // page size
                        page: param.page || 0, // page number
                    };

                    return Object.assign({}, def_param, parameter);
                },
                processResults: function(data, params) {
                    params.page = params.page || 0

                    return {
                        results: data.rows,
                        pagination: {
                            more: false
                        }
                    }
                }
            },
            templateResult: function(data) {
                return data.text;
            },
            templateSelection: function(data) {
                if (data.id === '') {
                    return placeholder;
                }

                return data.text;
            },
            escapeMarkup: function(m) {
                return m;
            }
        });
    }

    function renderNilaiChart(rs) {
        // $('#nilai-chart').html('');


        var options = {
            series: [{
                name: 'Nilai',
                data: [rs.kesehatan, rs.keterampilan, rs.jasmani, rs.karakter, rs.pengetahuan],
            }],
            chart: {
                height: 360,
                type: 'radar',
            },
            dataLabels: {
                enabled: true,
                background: {
                    enabled: true,
                    borderRadius: 2,
                }
            },
            plotOptions: {
                radar: {
                    size: 140,
                    polygons: {
                        strokeColors: '#e9e9e9',
                        fill: {
                            colors: ['#f8f8f8', '#fff']
                        }
                    }
                }
            },
            title: {
                text: 'Persebaran Penilaian Taruna'
            },
            colors: ['#FF4560'],
            markers: {
                size: 4,
                colors: ['#fff'],
                strokeColor: '#FF4560',
                strokeWidth: 2,
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return val
                    }
                }
            },
            xaxis: {
                categories: ['Kesehatan', 'Keterampilan', 'Jasmani', 'Karakter', 'Pengetahuan']
            },
            yaxis: {
                tickAmount: 5,
                labels: {
                    formatter: function(val, i) {
                        if (i % 2 === 0) {
                            return val
                        } else {
                            return ''
                        }
                    }
                },
                min: 0,
                max: 100,
            }
        };
        if (chart !== undefined) {
            chart.destroy();
        }

        chart = new ApexCharts(document.querySelector("#nilai-chart"), options);
        chart.render();

        // var options = {
        //     series: [{
        //         name: 'Nilai',
        //         data: [rs.kesehatan, rs.keterampilan, rs.jasmani, rs.karakter, rs.pengetahuan],
        //     }],
        //     chart: {
        //         height: 350,
        //         type: 'radar',
        //     },
        //     title: {
        //         text: 'Persebaran Penilaian Taruna'
        //     },
        //     xaxis: {
        //         categories: ['Kesehatan', 'Keterampilan', 'Jasmani', 'Karakter', 'Pengetahuan']
        //     }
        // };

        // var chart = new ApexCharts(document.querySelector("#nilai-chart"), options);
        // chart.render();

    }
</script>