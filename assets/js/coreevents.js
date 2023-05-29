class CoreEvents {

    constructor() {
        
    }

    load(){
        var thisClass = this;

        this.table = $('#datatable').DataTable({

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
                "url": url + "_load",
                "dataType": "json",
                "data": function (data) {
                    // // console.log(thisClass);
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
                        "draw": 1
                    };

                    $.extend(form, info);
                    $.extend(form, thisClass.csrf);

                    return form;
                },
                "complete": function(response) {
                    // // console.log(response);
                    feather.replace();
                }
            },
            "columns" : thisClass.tableColumn
        }).on('init.dt', function(){
            $(this).css('width','100%');
        });

        $(document).on('submit', '#form', function(e){
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
                if(result.value) {
                    Swal.fire({
                        title: "",
                        icon: "info",
                        text: "Proses menyimpan data, mohon ditunggu...",
                        didOpen: function() {
                            Swal.showLoading()
                        }
                    });

                    $.ajax({
                        url : thisClass.url + "_save",
                        type : 'post',
                        data : $this.serialize(),
                        dataType : 'json',
                        success: function(result){
                            Swal.close();
                            // // console.log(result);
                            if(result.success){
                                Swal.fire('Sukses', thisClass.insertHandler.placeholder, 'success');
                                $('#form').trigger("reset");
                                thisClass.table.ajax.reload();
                                thisClass.insertHandler.afterAction(result);
                            }else{
                                if (result.title == 'mysqli_sql_exception') {
                                    Swal.fire('Warning', "Data sudah ada", 'warning');
                                } else if (result.message == '') {
                                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                                } else {
                                    Swal.fire('Error', result.message, 'error');
                                }
                            }
                        },
                        error: function(){
                            Swal.close();
                            Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                        }
                    });
                }
            });
        }).on('reset', '#form', function(){
            $('#id').val('');
            $(".sel2").val(null).trigger('change');
            thisClass.resetHandler.action();
        });

        $(document).on('click', '.edit', function(){
            let $this = $(this);
            let data = { id : $this.data('id') }
            $.extend(data, thisClass.csrf);

            Swal.fire({
                title: "",
                icon: "info",
                text: "Proses mengambil data, mohon ditunggu...",
                didOpen: function() {
                    Swal.showLoading()
                }
            });

            $.ajax({
                url : thisClass.url + "_edit",
                type : 'post',
                data : data,
                dataType: 'json',
                success: function(result){
                    Swal.close();
                    if(result.success){
                        for(var keyy in result.data){
                            $('#'+keyy).val(result.data[keyy]);
                        }

                        // console.log($('ul#tab li a').last());

                        $('ul#tab li a').last().trigger('click');

                        thisClass.editHandler.afterAction(result);
                    }else{
                        Swal.fire('Error',result.message, 'error');
                    }
                },
                error: function(){
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });
        }).on('click', '.delete', function(){
            let $this = $(this);
            let data = { id : $this.data('id') }
            $.extend(data, thisClass.csrf);

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
                        url : thisClass.url + "_delete",
                        type : 'post',
                        data : data,
                        dataType: 'json',
                        success: function(result){
                            Swal.close();
                            if(result.success){
                                Swal.fire('Sukses', thisClass.deleteHandler.placeholder, 'success');
                                thisClass.table.ajax.reload();
                                thisClass.deleteHandler.afterAction();
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
    }

    select2Init(id, url, placeholder, parameter){
        var thisClass = this;

        $(id).select2({
            id: function(e) { return e.id },
            placeholder: '',
            multiple: false,
            ajax: {
                url: thisClass.ajax + url,
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
            templateResult: function(data) { return data.text; },
            templateSelection: function(data){ 
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

    datepicker(element){
        $(element).datepicker({ 
            format: 'dd/mm/yyyy' 
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });
    }
}