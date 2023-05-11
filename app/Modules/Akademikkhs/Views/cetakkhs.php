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
            <div class="card-body">
                <div class="padding">
                    <div class="tab-content">
                        <form data-plugin="parsley" data-option="{}" id="forma" target="_BLANK" action="<?= base_url() ?>/akademikkhs/action/pdf/cetakkhs?o=P" method="GET" autocomplete="off">
                            <!-- <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off"> -->
                            <input type="hidden" class="form-control" id="id" name="id" value="" required>
                            <input type="hidden" class="form-control" name="nama_menu" value="<?=$rules->menu_url?>" required>
                            <input type="hidden" class="form-control" name="trn" value="<?=$rules->type_code=='trn'? '1' : '0'?>" required>
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <div class="text-sm text-muted mb-4">Pilih semester dan klik tombol "Download PDF" untuk mencetak Kartu Hasil Studi per semester</div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="id_taruna">Nama Taruna</label>
                                        <?php
                                        if ($rules->type_code == 'trn') { ?>
                                            <input type="hidden" class="form-control" name="id_taruna" value="<?= $_SESSION['id'] ?>">
                                            <input type="text" class="form-control" value="<?= $_SESSION['name'] ?>" readonly>
                                        <?php } else { ?>
                                            <select class="form-control sel2" id="id_taruna" name="id_taruna"></select>
                                        <?php }
                                        ?>
                                    </div>
                                    <div class="col-6">
                                        <label for="id_semester">Semester</label>
                                        <select class="form-control sel2" id="id_semester" name="id_semester" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Download PDF</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    const auth_insert = '<?= $rules->i ?>';
    const auth_edit = '<?= $rules->e ?>';
    const auth_delete = '<?= $rules->d ?>';
    const auth_otorisasi = '<?= $rules->o ?>';

    const type_code = '<?= $rules->type_code ?>';

    const url_insert = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_save" ?>';
    const url_edit = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_edit" ?>';
    const url_delete = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_delete" ?>';
    const url_load = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_load" ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';

    var dataStart = 0;
    var table;

    var id_batalyon = '<?=isset($_SESSION['userdetail']->id_batalyon)==0? '' : $_SESSION['userdetail']->id_batalyon?>';

    $(document).ready(function() {

        $('#btn1').click(function() {
            $('#ipladder').attr('action', 'location1.php');
            $('#ipladder').submit();
        });

        $(document).on('change', '#id_taruna', function(){
            $('#id_semester').val(null).trigger('change')
        })

        select2Init("#id_taruna", "/taruna_select_get", null, function(data) {
            return data.text;
        }, function(data) {
            if (data.id === '') {
                return "Pilih Taruna";
            }

            return data.text;
        });

        $('#id_semester').select2({
                id: function(e) { return e.id },
                placeholder: '',
                multiple: false,
                ajax: {
                    url: url_ajax+'/semesterbybatalyon_select_get',
                    dataType: 'json',
                    quietMillis: 500,
                    delay: 500,
                    data: function (param) {
                        var def_param = {
                            keyword: param.term, //search term
                            perpage: 5, // page size
                            id_batalyon: type_code=='trn'? id_batalyon : $('#id_taruna').select2('data')[0]['id_batalyon'],
                            page: param.page || 0, // page number
                        };

                        return Object.assign({}, def_param, null);
                    },
                    processResults: function (data, params) {
                        params.page = params.page || 0


                        var datafilter = data.rows.map(function(el) {
                            if (el.is_mapel==0) {
                                var o = Object.assign({}, el);
                                o.disabled = true;
                                return o;
                            } else {

                                var o = Object.assign({}, el);
                                o.disabled = false;
                                return o;
                            }
                          });


                        return {
                            results: datafilter,
                            pagination: {
                                more: false
                            }
                        }
                    }
                },
                templateResult: function(data) { return data.text; },
                templateSelection: function(data){ 
                    if (data.id === '') { 
                        return "Pilih semester";
                    }

                    return data.text; 
                },
                escapeMarkup: function(m) {
                    return m;
                }
            });

    });


    function select2Init(id, url, parameter, template, selection) {
        $(id).select2({
            id: function(e) {
                return e.id
            },
            placeholder: '',
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
            templateResult: template,
            templateSelection: selection,
            escapeMarkup: function(m) {
                return m;
            }
        });
    }
</script>