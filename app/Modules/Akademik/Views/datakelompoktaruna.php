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
                                        <select class="form-control" id="id_batalyon" name="id_batalyon" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_aspek">Aspek</label>
                                        <select class="form-control" id="id_aspek" name="id_aspek" required>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_semester">Semester</label>
                                        <select class="form-control" id="id_semester" name="id_semester" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group" >
                                        <label for="" style="height: 15px;"></label><br>
                                        <!-- <a id="d-excel" class="btn mb-1 btn-outline-dark" style="display: none">Download Excel</a> -->
                                        <a id="d-pdf" class="btn mb-1 btn-outline-dark" style="display: none">Download PDF</a>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div>
                                <h4 align="center" style="font-size: 1rem" id="_batalyon"></h4>
                                <h4 align="center" style="font-size: 1rem" id="_aspek"></h4>
                                <h4 align="center" style="font-size: 1rem" id="_semester"></h4>
                            </div>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Kode Mata Pelajaran</span></th>
                                            <th><span>Mata Kuliah</span></th>
                                            <th><span>Semester</span></th>
                                            <th><span>Aspek</span></th>
                                            <th><span>SKS</span></th>
                                            <!-- <th class="column-2action"></th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                            <div class="table-responsive">
                                <table id="datatable2" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Kode Mata Pelajaran</span></th>
                                            <th><span>Mata Kuliah</span></th>
                                            <th><span>Semester</span></th>
                                            <th><span>Jenis Pembelajaran</span></th>
                                            <th><span>SKS</span></th>
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
    const url_pdf = '<?= base_url() . "/" . uri_segment(0) . "/action/pdf/" . uri_segment(1) . "" ?>';
    const url_excel = '<?= base_url() . "/" . uri_segment(0) . "/action/excel/" . uri_segment(1) . "" ?>';


    var dataStart = 0;
    var table;

    $(document).ready(function(){

        $(document).on('change' , '#id_batalyon' , function() {
            tampildata($('#id_batalyon').val() , $('#id_aspek').val() , $('#id_semester').val());
        }).on('change' , '#id_aspek' , function() {
            tampildata($('#id_batalyon').val() , $('#id_aspek').val() , $('#id_semester').val());
        }).on('change' , '#id_semester' , function() {
            tampildata($('#id_batalyon').val() , $('#id_aspek').val() , $('#id_semester').val());
        });

        select2Init("#id_batalyon", "/batalyon_select_get", null, function(data) { return data.text; }, function(data){ 
            if (data.id === '') { 
                return "Cari Batalyon";
            }

            return data.text; 
        });

        select2Init("#id_aspek", "/aspek_select_get", null, function(data) { return data.text; }, function(data){ 
            if (data.id === '') { 
                return "Cari Aspek";
            }

            return data.text; 
        });

        select2Init("#id_semester", "/semester_select_get", null, function(data) { return data.text; }, function(data){ 
            if (data.id === '') { 
                return "Cari Semester";
            }

            return data.text; 
        });


        $('#d-excel').on('click', function (e) {
           $(this).attr("href", url_excel + "?o=P&id_batalyon=" + $('#id_batalyon').val() + '&id_aspek=' + $('#id_aspek').val() + '&id_semester=' + $('#id_semester').val() );
            $(this).attr("target", "_blank");
        })

         $('#d-pdf').on('click', function(e) {
            $(this).attr("href", url_pdf + "?o=P&id_batalyon=" + $('#id_batalyon').val() + '&id_aspek=' + $('#id_aspek').val() + '&id_semester=' + $('#id_semester').val() );
            $(this).attr("target", "_blank");
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
                {data: "kode_mk", orderable: true},
                {data: "mata_pelajaran", orderable: true},
                {data: "semester", orderable: true},
                {data: "aspek", orderable: true},
                {data: "sks", orderable: true}
            ];

        return columns;
    }

    function select2Init(id, url, parameter, template, selection){
        $(id).select2({
            id: function(e) { return e.id },
            placeholder: '',
            allowClear: true,
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

    function tampildata(batalyon , aspek , semester){

        if (batalyon!=null) {
            $('#_batalyon').html( 'BATALYON '+$('#id_batalyon').select2('data')[0]['text']);
        }

        if (aspek!=null) {
            $('#_aspek').html( 'ASPEK '+$('#id_aspek').select2('data')[0]['text']);
        }

        if (semester!=null) {
            $('#_semester').html( 'SEMESTER '+$('#id_semester').select2('data')[0]['text']);
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
            "columns" : datatableColumn()
        }).on('init.dt', function(){
            $(this).css('width','100%');
        });
    }
</script>