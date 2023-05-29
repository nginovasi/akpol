<!-- <style type="text/css">
    body {margin:2em;}
ul.dt-button-collection{
    background-color: #e5e5e5;
    border: 1px solid #c0c0c0;
}
li.dt-button a:hover{
    background-color: transparent;
    color: #115094;
    font-weight: bold;
}
li.dt-button.active a,
li.dt-button.active a:hover,
li.dt-button.active a:focus{
    color: #337ab6;
    background-color: transparent;
    font-weight: bold;
}
li.dt-button.active a::before{
    content: '✔ ';
}
.dataTables_info {
    font-size: 0.8em;
    margin-top: -12px;
    text-align: right;
}
.previous a,
.next a
{
    font-weight: bold;
}
</style> -->

<style type="text/css">
    /* Right aligning the export button */
        div.dt-buttons {
            float: left; 
    padding-bottom: 15px;
            /*// Add !important for right aligned on mobiles*/
        }
        

        /* Not essential but thought looked better */
        .sorting:after, .sorting_desc:after, .sorting_asc:after {
          bottom: 2px !important;
        }

        /* Right aligning text and left aligning icon */
        .dataTable .sorting:after, 
        .dataTable .sorting_asc:after, 
        .dataTable .sorting_desc:after {
          left: 0px !important;
          right: auto !important;
        }

        .dataTable th {
          padding-left: 20px !important;
        }

        th.dt-right, td.dt-right {
          text-align: right !important;
          padding-right: 10px !important; 
        }
</style>

<style type="text/css">
	.tes {

	}
</style>
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
                            <div class="table-responsive">
                                <table id="datatable" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Nama Lengkap</span></th>
                                            <th><span>Batalion</span></th>
                                            <th><span>Semester</span></th>
                                            <th><span>Asal Pengiriman</span></th>
                                            <th><span>Status</span></th>
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

        
        var hCols = [3, 4];
        table = $('#datatable').DataTable({
            "dom": "<'row'<'col-sm-6'B><'col-sm-6 clear'>>" + "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12'p<br/>i>>",
            // dom: 'fBrtip<"clear">l',
            "columnDefs": [{
                    "visible": false,
                    "targets": hCols
                }],
            "buttons": [{
                    extend: 'colvis',
                    collectionLayout: 'three-column',
                    className: 'btn btn-primary glyphicon glyphicon-save-file',
                    text: function() {
                        var totCols = $('#datatable thead th').length;
                        var hiddenCols = hCols.length;
                        var shownCols = totCols - hiddenCols;
                        return 'Columns (' + shownCols + ' of ' + totCols + ')';
                    },
                    prefixButtons: [{
                        extend: 'colvisGroup',
                        text: 'Show all',
                        show: ':hidden'
                    }, {
                        extend: 'colvisRestore',
                        text: 'Restore'
                    }]
                }, {
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
                                text: 'PDF Portrait',
                                extend: 'pdfHtml5',
                                message: '',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            }, {
                                text: 'PDF Landscape',
                                extend: 'pdfHtml5',
                                message: '',
                                orientation: 'landscape',
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
                        "<?=csrf_token()?>": "<?=csrf_hash()?>"
                    };

                    $.extend(form, info);

                    return form;
                },
                "complete": function(response) {
                     $('#datatable').on('column-visibility.dt', function(e, settings, column, state) {
                            var visCols = $('#datatable thead tr:first th').length;
                            //Below: The minus 2 because of the 2 extra buttons Show all and Restore
                            var tblCols = $('.dt-button-collection li[aria-controls=datatable] a').length - 2;
                            $('.buttons-colvis[aria-controls=datatable] span').html('Columns (' + visCols + ' of ' + tblCols + ')');
                            e.stopPropagation();
                        });
                   // console.log(response);
                    feather.replace();
                }
            },
            "columns" : datatableColumn()
        }).on('init.dt', function(){
            $(this).css('width','100%');
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
                {data: "namataruna", orderable: true},
                {data: "nama_batalyon", orderable: true},
                {data: "nama_semester", orderable: true},
                {data: "asal_pengiriman", orderable: true},
                {data: "status_taruna", orderable: true}
            ];

        return columns;
    }

</script>