<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css" />
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
                    <?php if($rules->i == 1) {?>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-form" role="tab" aria-controls="tab-form" aria-selected="false">Form</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="card-body">
                <div class="padding">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-data" role="tabpanel" aria-labelledby="tab-data">
                            	<div id="example1" class="hot"></div>

								<pre id="example1console" class="console">Click "Load" to load data from server</pre>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Aspek</span></th>
                                            <th><span>Nilai Minimal</span></th>
                                            <th class="column-2action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                            <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <?=csrf_field();?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="aspek">Aspek</label>
                                            <input type="text" class="form-control" id="aspek" name="aspek" required  placeholder="Aspek">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="min_nilai">Nilai Minimal</label>
                                            <input type="tel" class="form-control" id="min_nilai" name="min_nilai" required placeholder="Nilai Minimal">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="reset" class="btn btn-light">Reset</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
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

    var datahot = '';

    $(document).ready(function(){
    	loaddata();
        // $('#datatable')

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
                        url     : url_insert,
                        type    : 'post',
                        data    : $this.serialize(),
                        dataType: 'json',
                        success: function(result){
                            Swal.close();
                            if(result.success){
                                Swal.fire('Sukses','Berhasil menyimpan data pendidik', 'success');
                                $('#form').trigger("reset");
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
            });
        }).on('reset', '#form', function(){
            $('#id').val('');
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

    });

    function loaddata(){
			$.ajax({
                url     : url_load,
                type    : 'post',
                data    : {
                    "<?=csrf_token()?>": "<?=csrf_hash()?>"
                },
                dataType: 'json',
                success: function(result){
                    Swal.close();
                    datahot = result;
                       // console.log(datahot);
                        laahhot();
                    if(result.success){
                        for(key in result.data){
                            $('#'+key).val(result.data[key]);
                        }

                        $('ul#tab li a').eq(1).trigger('click');
                    }else{
                        // Swal.fire('Error',result.message, 'error');
                    }
                },
                error: function(){
                    Swal.close();
                    Swal.fire('Error','Terjadi kesalahan pada server', 'error');
                }
            });
		
	}

function laahhot() {
	const container = document.querySelector('#example1');
	const exampleConsole = document.querySelector('#example1console');
	let autosaveNotification;

	const hot = new Handsontable(container, {
	  data: datahot,
	  colHeaders: ['id','Nama', 'No AK', 'Nilai' , 'Catatan'],
	  rowHeaders: true,
	  licenseKey: 'non-commercial-and-evaluation',
	  hiddenColumns: {
			    columns: [0]
			  },
	  columns: [
		{
		  data: 'id',
	      readOnly: true
		},
	    {
	      data: 'namataruna',
	      readOnly: true
	    },
	    {
	      data: 'noaklong',
	      readOnly: true
	    },
	    {
			data: 'nilai',
			type: 'numeric',
			numericFormat: {
				pattern: '0,0.00',
				culture: 'en-US'
			},
			allowEmpty: false,
			validator: function(value, callback) {
	           if (value <= 100 && value >= 0) {
	             callback(true);
	           } else {
	             callback(false);
	           }
	         }
	    },
	    {
	      data: 'catatan'
	    }
	  ],
	  afterChange: function (change, source) {
	    if (source === 'loadData') {
	      return; 
	    }

	   // console.log(change[0][0]);


	    clearTimeout(autosaveNotification);
	   // console.log(hot.getData()[change[0][0]]);

	    exampleConsole.innerText = 'Autosaved (' + change.length + ' ' + 'cell' + (change.length > 1 ? 's' : '') + ')';
	      autosaveNotification = setTimeout(() => {
	        exampleConsole.innerText ='Changes will be autosaved';
	      }, 1000);



	  }
	});
}
</script>