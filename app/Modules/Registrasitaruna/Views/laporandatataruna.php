
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
                        <!-- <form method="post" action="/registrasitaruna/action/prosesExcel" enctype="multipart/form-data">
                            <?=csrf_field();?>

                            <div class="form-group">
                                <label>File Excel</label>
                                <input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx,.csv" /></p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Upload</button>
                            </div>
                        </form> -->
                        <!-- <form data-plugin="parsley" data-option="{}" target="_BLANK" id="forma" action="<?=base_url()?>/registrasitaruna/action/pdf/laporandatataruna" method="POST" autocomplete="off"> -->
                        <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off">
                            <input type="hidden" class="form-control" id="id" name="id" value="" required>
                            <?=csrf_field();?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="id_batalyon">Batalyon</label>
                                        <select class="form-control sel2" id="id_batalyon" name="id_batalyon" required>
                                        </select>
                                    </div>
                                    <!-- <div class="col-6">
                                        <label for="id_kelompok">Kelompok</label>
                                        <select class="form-control sel2" id="id_kelompok" name="id_kelompok" required>
                                        </select>
                                    </div> -->
                                </div>
                            </div>
                            <div class="text-right">
                                <!-- <button type="reset" class="btn btn-light">Reset</button> -->
                                <a id="d-excel" class="btn btn-light-primary font-weight-bold" style="display: none">Download Excel</a> 
                                <a id="d-pdf" class="btn btn-light-primary font-weight-bold" style="display: none">Download PDF</a> 
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" id="card_table_jadwal" style="display: none">
            <div class="card-body">
                <div id="datalaporantaruna"></div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    const auth_insert = '<?=$rules->i?>';
    const auth_edit = '<?=$rules->e?>';
    const auth_delete = '<?=$rules->d?>';
    const auth_otorisasi = '<?=$rules->o?>';

    const url_insert = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_save"?>';
    const url_edit = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_edit"?>';
    const url_delete = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_delete"?>';
    const url_load = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_load"?>';
    const url_ajax = '<?=base_url()."/".uri_segment(0)."/ajax"?>';

    var dataStart = 0;
    var table;

    $(document).ready(function(){
        // $('#datatable')

        $('#d-pdf').on('click', function (e) {
            $(this).attr("href", "<?=base_url()?>/registrasitaruna/action/pdf/laporandatataruna?nama_batalyon="+ $('#id_batalyon').select2('data')[0]['text'] + '&id_batalyon='+ $('#id_batalyon').val()+ '&thun_batalyon='+ $('#id_batalyon').select2('data')[0]['tahun_masuk']);
            $(this).attr("target", "_blank");
        })

        $('#d-excel').on('click', function (e) {
            $(this).attr("href", "<?=base_url()?>/registrasitaruna/action/excel/laporandatataruna?nama_batalyon="+ $('#id_batalyon').select2('data')[0]['text'] + '&id_batalyon='+ $('#id_batalyon').val()+ '&thun_batalyon='+ $('#id_batalyon').select2('data')[0]['tahun_masuk']);
            $(this).attr("target", "_blank");
        })

        $(document).on('submit', '#form', function(e){
            e.preventDefault();
            let $this = $(this);

            Swal.fire({
                title: "",
                icon: "info",
                text: "Proses menyimpan data, mohon ditunggu...",
                didOpen: function() {
                    Swal.showLoading()
                }
            });

            $.ajax({
                url     : url_load,
                type    : 'post',
                data    : $this.serialize(),
                dataType: 'json',
                success: function(result){
                        $('#card_table_jadwal').hide();
                        $('#datalaporantaruna').html('');
                    Swal.close();
                    if(result.success){

                        var datataruna = '';

                        datataruna += '<div style="text-align:center;"><h3>'+ $('#id_batalyon').select2('data')[0]['batalyon'] +' - '+ $('#id_batalyon').select2('data')[0]['tahun_masuk'] +'</h3></div>\
                        <table width="100%" class="table table-theme table-row v-middle dataTable no-footer">\
                            <thead>\
                                <tr>\
                                    <th>No</th>\
                                    <th>Kelompok</th>\
                                    <th>Nama</th>\
                                    <th>NO AK</th>\
                                    <th>Kompi</th>\
                                    <th>Peleton</th>\
                                    <th>Asal Pengiriman</th>\
                                </tr>\
                            </thead>\
                        ';
                        var urut = 0;
                        result.data.forEach(function(content) { urut++;
                            datataruna += '<tr>\
                                                <td>'+urut+'</td>\
                                                <td>'+content.nama_kelompok+'</td>\
                                                <td>'+content.namataruna+'</td>\
                                                <td>'+content.noaklong+'</td>\
                                                <td>'+content.nama_kompi+'</td>\
                                                <td>'+content.nama_peleton+'</td>\
                                                <td>'+content.asal_pengiriman+'</td>\
                                            </tr>';
                        });

                        datataruna += '</table>';

                        $('#_id_tingkat').val($('#id_tingkat').val());
                        $('#_id_batalyon').val($('#id_batalyon').val());
                        $('#datalaporantaruna').html(datataruna);
                        $('#card_table_jadwal').show();
                        $('#d-excel').show();
                        $('#d-pdf').show();
                    }else{
                        Swal.fire('Error',result.message, 'warning');
                        $('#d-excel').hide();
                        $('#d-pdf').hide();
                    }
                },
                error: function(){
                    Swal.close();
                    Swal.fire('Error','Terjadi kesalahan pada server', 'error');
                    $('#d-excel').hide();
                    $('#d-pdf').hide();
                }
            });
        });

        $(document).on('click', '.edit', function(){
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
                url     : url_edit,
                type    : 'post',
                data    : {
                    id : $this.data('id'),
                    "<?=csrf_token()?>": "<?=csrf_hash()?>"
                },
                dataType: 'json',
                success: function(result){
                    Swal.close();
                    if(result.success){
                        for(key in result.data){
                            $('#'+key).val(result.data[key]);
                        }

                        $('ul#tab li a').eq(1).trigger('click');
                    }else{
                        Swal.fire('Error',result.message, 'error');
                    }
                },
                error: function(){
                    Swal.close();
                    Swal.fire('Error','Terjadi kesalahan pada server', 'error');
                }
            });
        }).on('click', '.delete', function(){
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
                if(result.value) {
                    $.ajax({
                        url     : url_delete,
                        type    : 'post',
                        data    : {
                            id : $this.data('id'),
                            "<?=csrf_token()?>": "<?=csrf_hash()?>"
                        },
                        dataType: 'json',
                        success: function(result){
                            Swal.close();
                            if(result.success){
                                Swal.fire('Sukses','Berhasil menghapus data pendidik', 'success');
                                table.ajax.reload();
                            }else{
                                Swal.fire('Error',result.message, 'error');
                            }
                        },
                        error: function(){
                            Swal.close();
                            Swal.fire('Error','Terjadi kesalahan pada server', 'error');
                        }
                    });
                }
            })
        });

        select2Init("#id_tingkat", "/tingkat_select_get", null, function(data) { return data.text; }, function(data){ 
            if (data.id === '') { 
                return "Pilih Tingkat";
            }

            return data.text; 
        });

        select2Init("#id_batalyon", "/batalyon_select_get", null, function(data) { return data.text; }, function(data){ 
            if (data.id === '') { 
                return "Pilih Batalyon";
            }

            return data.text; 
        });

    });


    function select2Init(id, url, parameter, template, selection){
        $(id).select2({
            id: function(e) { return e.id },
            placeholder: '',
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
</script>

