
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.3.3/jscolor.min.js'></script>
    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script> -->
<style type="text/css">
    .opt-tools {
      height: 100%;
      width: 25px;
      right: -21px;
      position: absolute;
      border: 1px solid #E8E8E8;
      border-top-right-radius: 8px;
      border-bottom-right-radius: 8px;
    }
    .opt-edit, .opt-trash {
      height: 50%;
      line-height: 25px;
      text-align: center;
      font-size: 13px;
      cursor: pointer;
    }
    .opt-edit {
      border-bottom: 1px solid #E8E8E8;
      border-top-right-radius: 8px;
      background-color: #fff;
      color: #ff8e00;
    }

    .opt-edit:hover {
      color: #fff;
      background-color: #ff8e00;
    }
    .opt-trash {
      border-bottom-right-radius: 8px;
      background-color: #fff;
      color: #cc0000;
    }
    .opt-trash:hover {
      color: #fff;
      background-color: #cc0000;
    }

    /* LOCK HEADER AND FIRST COLUMN */
    .table td,
    .table th {
      padding: 5px !important;
    }
    th:first-child {
      position: sticky;
      left: 0;
      z-index: 1030;
    }
    td:first-child {
      position: sticky;
      left: 0;
      z-index: 1010;
    }
    thead th {
      position: sticky;
      top: 10px;
      z-index: 1020;
    }
    thead th {
      position: sticky;
      top: 0;
      z-index: 1020;
      height: 50px;

    }

    thead tr.a{
      position: sticky;
      bottom: 0;
      z-index: 1020;
      height: 100px;
      background-color: red;

    }

    thead tr.row2 th {
      position: sticky;
      top: 50px;
      z-index: 1020;
      height: 50px;

    }
    /* ---------- END (LOCK HEADER AND FIRST COLUMN ) --------- */

    .datetimepicker {
      width: 70% !important;
      height: 70% !important;
    }

    .cal-container {
      max-width: 900px;
      max-height: 500px;
      overflow: auto;
      margin: auto;
    }
    .cal-table {
      position: relative;
      border: solid #ebebeb;
      border-width: 0 1px 0 0;
      overscroll-behavior: contain;
    }
    .cal-thead {
      top: 0px;
      box-shadow: 0 10px 50px rgba(0, 0, 0, 0.04);
    }

    .cal-viewmonth {
      font-size: 16px;
      background: #fdfdfd;
      width: 150px;
      height: 50px;
    }
    .cal-toprow {
      width: 182px;
      min-width: 182px;
      color: #3e5569;
      background-color: #f7f9fb !important;
      border: 1px solid #ebebeb !important;
    }

    .cal-viewmonth,
    .cal-toprow {
      font-weight: 700 !important;
      text-align: center;
      vertical-align: middle !important;
    }

    .cal-userinfo {
      height: 80px;
      box-shadow: 20px 0 50px rgba(0, 0, 0, 0.05);
    }

    .cal-tbody .cal-userinfo {
      min-width: 150px !important;
      text-align: right;
      color: hsla(210, 5%, 40%, 1);
      font-weight: 600;
      font-size: 12px;
      letter-spacing: 0.03em;
      background: #fdfdfd;
      padding: 0.3em;
      border: 1px solid #ebebeb;
    }

    .cal-usersheader {
      height: 20px;
      box-shadow: 20px 0 50px rgba(0, 0, 0, 0.05);
      min-width: 150px !important;
      text-align: center;
      font-weight: bold;
      font-size: 15px;
      letter-spacing: 0.03em;
      padding: 0.3em;
    }

    .weekend {
      background-color: #b5b5b5;
    }
    .drag {
      z-index: 10;
      cursor: all-scroll;
    }
    .span-info {
      display: inline-block;
      padding: 0.25em 0.4em;
      text-align: center;
      white-space: nowrap;
      vertical-align: baseline;
      width: 25px;
      background-color: red;
      cursor: pointer;
    }

    .ui-draggable-dragging {
      z-index: 9999 !important;
    }

    .cal-usercounter {
      bottom: 0;
      right: 0;
      position: absolute;
      text-align: right;
      border-radius: 0px;
      border: 2px thick red;
    }

    .cal-userbadge {
      border-radius: 0;
      font-weight: 600;
      font-size: 11px;
    }

    /* USER TASKS */
    .details {
      border-radius: 4px;
      background: #fff;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
      border: 1px solid #ebecee;
      padding: 0px 0px 5px 10px;
      margin: 2px;
      z-index: 1;
    }

    .details-uren {
      font-size: 12px;
      color: #333;
      font-weight: 500;
      margin: 0;
      right: 0px;
      text-align: right;
      padding-right: 10px;
    }

    .details-task {
      margin-top: 5px;
      margin-bottom: 2px;
      font-size: 12px;
      padding: 2px 5px;
      font-weight: 600;
      line-height: 1.4;
      border-radius: 2px;
      width: 94%;
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
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills no-border" id="tab">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-jadwal" role="tab" aria-controls="tab-jadwal" aria-selected="false">Jadwal</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="padding">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-jadwal" role="tabpanel" aria-labelledby="tab-jadwal">
                            <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <?=csrf_field();?>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label for="id_semester">Semester</label>
                                        <select class="form-control sel2" id="id_semester" name="id_semester" required>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required />
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" id="card_table_jadwal" style="display: none">
            <div class="card-body">
                <div class="table-responsive">
                  <div data-parse="1595877840000" id="calplaceholder" style="max-height: 814px; margin-bottom: 0;">
                    <div class="cal-sectionDiv">

                      <div id="data_tabel_jadwal"></div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DISPLAY MODAL: EDIT -->
<div class="modal fade" id="edittask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-edit" class="modal-body">
        <div class="input-group mb-2 text-center">
        <i style="color:red">Edit box is only for preview purposes and does not save any data.</i>
        </div>
        <div class="input-group mb-2">
          <label for="cono1" class="col-sm-2 text-left control-label col-form-label">Task:</label>
          <input type="text" class="form-control" id="taak" placeholder="Taak">
        </div>
        <div class="input-group mb-2">
          <label for="cono1" class="col-sm-2 text-left control-label col-form-label">Date:</label>
          <input id="date" class="form-control taskstart" placeholder="dd/mm/yyyy" type="text">
        </div>
        <div class="input-group">
          <div class="form-group" style="width:125px; margin-left:15px; margin-right:5px;">
            <label for="cono1" class="col-sm-3 text-left control-label col-form-label" style="padding-left: 0px;">Text:</label>
            <input type="text" id="ktxt" data-jscolor="" class="form-control" name="ctxt" value="" onchange="changeColor('ctxt', this.value);">
          </div>
          <div class="form-group" style="width:125px; margin-left:5px; margin-right:5px;">
            <label for="cono1" class="col-sm-3 text-left control-label col-form-label" style="padding-left: 0px;">Background:</label>
            <input type="text" id="kbg" data-jscolor="" class="form-control" name="cbg" value="" onchange="changeColor('cbg', this.value);">
          </div>
          <div class="form-group" style="width:175px; margin-left:5px;">
            <label for="cono1" class="col-sm-5 text-left control-label col-form-label" style="padding-left: 0px;">Preview:</label>
            <div id="demotaak1" data-taskid="3" class="form-control details" style="border-left:5px solid #959595; position:relative; height: 50px;">
              <h3 id="demotaak2" class="details-task" style="background:#959595; color:#FFFFFF">Example</h3>
              <p class="details-uren">08:00 - 16:30</p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- DISPLAY MODAL: DELETE -->
<div class="modal fade" id="deletetask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div id="modal-delete" class="modal-body" style="text-align: center;">
      </div>
      <div class="modal-footer">
        <input id="taskdelid" type="hidden" value="">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
        <button id="confdelete" type="button" class="btn btn-danger">Yes</button>

      </div>
    </div>
  </div>
</div>
<!-- partial -->

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

      $(document).on('submit', '#form', function(e){
            e.preventDefault();
            let $this = $(this);

          
                
                    Swal.fire({
                        title: "",
                        icon: "info",
                        text: "Proses mencari jadwal, mohon ditunggu...",
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
                                if(result.data.header.length==0) {
                                  $('#data_tabel_jadwal').html("");
                                  $('#card_table_jadwal').hide();

                                  Swal.fire('Error',"Maaf Kelompok Tidak Ditemukan", 'info');
                                } else {
                                  var tabel = '';

                                  tabel +='<table class="table table-striped table-bordered">\
                                              <thead class="cal-thead">\
                                                  <tr>\
                                                      <th rowspan="2" class="cal-viewmonth" id="changemonth" >Hari</th>\
                                                      ' ;
                                                  result.data.header.forEach (function(list) {
                                                      tabel += '<th class="cal-toprow">'+list.nama_kelompok+'</th>';
                                                  })

                                                  tabel +='\
                                                  </tr>\
                                                    <tr class="row2">\
                                                      ' ;
                                                  result.data.header.forEach (function(list) {
                                                      tabel += '<th class="cal-toprow">\
                                                        '+list.nama_ruangan+'</th>';
                                                  })

                                                  tabel +='\
                                                    </tr>\
                                                    </thead>\
                                                    <tbody class="cal-tbody">';

                                              result.data.body.forEach (function(list) {
                                                      tabel += '\
                                                      <tr ids="'+list.tanggal.replaceAll('-', '_')+'">\
                                                              <td colspan="'+parseInt(result.data.header.length)+1 +'" class="cal-usersheader" style="color:#000; background-color:#389fe8; padding: 0px;">'+list.tanggal+'</td>\
                                                            </tr>\
                                                            ';
                                                                      var obj = JSON.parse(list.data_unit);
                                                                      var orderobj = obj.sort((a, b) => parseFloat(a.jam_mulai) - parseFloat(b.jam_mulai));
                                                                          orderobj.forEach (function(isi) {
                                                                              tabel += '<tr id="u2">\
                                                      <td class="cal-userinfo">\
                                                        <span><b>'+isi.unit_pertemuan+'<span></span></span>\
                                                        <div class="cal-usercounter">\
                                                          <span class="cal-userbadge badge badge-light">'+isi.jam_mulai+'</span><span class="cal-userbadge badge badge-warning">'+isi.jam_selesai+'</span>\
                                                        </div>\
                                                        <div class="cal-userarrows">\
                                                          <i class="up mdi mdi-arrow-up-bold"></i><i class="down mdi mdi-arrow-down-bold"></i>\
                                                        </div>\
                                                      </td>\
                                                    ';
                                                                                              if (isi.id_pertemuan==1) {
                                                                                                  result.data.header.forEach (function(head) {
                                                                                                      tabel += '<td class="weekend ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.unit_pertemuan+'" data-kelompoktaruna="'+head.id_kelompok+'">Olah Raga Pagi</td>';
                                                                                                  })
                                                                                              } else if (isi.id_pertemuan==5) {
                                                                                                  result.data.header.forEach (function(head) {
                                                                                                      tabel += '<td class="weekend ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.unit_pertemuan+'" data-kelompoktaruna="'+head.id_kelompok+'">Isoma</td>';
                                                                                                  })
                                                                                              } else {
                                                                                                  result.data.header.forEach (function(head) {
                                                                                                      tabel += '<td class="ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.unit_pertemuan+'" data-kelompoktaruna="'+head.id_kelompok+'" id='+list.tanggal+'_'+isi.id_pertemuan+'_'+head.id_kelompok+'></td>';
                                                                                                  })
                                                                                              }

                                                                          tabel +='</tr>';
                                                                          })

                                              })

                                  tabel += '<tbody>\
                                    <thead >\
                                              <tr class="a">\
                                                <th rowspan="2" class="cal-viewmonth" id="changemonth" style="background-color: transparent;"></th>\
                                                <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                                      <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                                      <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                                      <div class="details-uren">\
                                                        15:00 - 16:30\
                                                      </div>\
                                                    </div>\
                                                    <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                                      <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                                      <div class="details-uren">\
                                                        15:00 - 16:30\
                                                      </div>\
                                                    </div>\
                                                  \
                                                </td>\
                                                <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                                  <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                                    <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                                    <div class="details-uren">\
                                                      15:00 - 16:30\
                                                    </div>\
                                                  </div>\
                                                </td>\
                                                <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                                  <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                                    <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                                    <div class="details-uren">\
                                                      15:00 - 16:30\
                                                    </div>\
                                                  </div>\
                                                </td>\
                                                <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                                  <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                                    <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                                    <div class="details-uren">\
                                                      15:00 - 16:30\
                                                    </div>\
                                                  </div>\
                                                </td>\
                                                <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                                  <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                                    <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                                    <div class="details-uren">\
                                                      15:00 - 16:30\
                                                    </div>\
                                                  </div>\
                                                </td>\
                                                <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                                  <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                                    <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                                    <div class="details-uren">\
                                                      15:00 - 16:30\
                                                    </div>\
                                                  </div>\
                                                </td>\
                                                <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                                  <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                                    <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                                    <div class="details-uren">\
                                                      15:00 - 16:30\
                                                    </div>\
                                                  </div>\
                                                </td>\
                                                <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                                  <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                                    <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                                    <div class="details-uren">\
                                                      15:00 - 16:30\
                                                    </div>\
                                                  </div>\
                                                </td>\
                                              </tr>\
                                            </thead>\
                                          </table>\
                                          <select class="form-control sel2" class="id_kelompok" name="id_kelompok" required>\
                                          <options>asd</options>\
                                          <options>asds</options>\
                                                        </select>';
                                  $('#data_tabel_jadwal').html(tabel);

                                  result.data.content.forEach(function(content) {
                                      $('#'+content.tanggal+'_'+content.id_jam_pertemuan+'_'+content.id_kelompok_taruna).html('\
                                          <div class="drag details ui-draggable ui-draggable-handle" data-taskid="'+content.tanggal+'_'+content.id_jam_pertemuan+'_'+content.id_kelompok_taruna+'" data-userid="'+content.id_jadwal+'" style="border-left: 5px solid rgb(36, 115, 171); position: relative;">\
                                           <h3 class="details-task" style=" background: #2473AB; color: #FFFFFF">'+content.kode_mk+'</h3>\
                                           <div class="details-uren">\
                                             12:00 - 19:00\
                                           </div>\
                                         </div>');
                                  } );

                                  dragable();

                                  $('#card_table_jadwal').show();

                                }

                              }else{
                                Swal.fire('Error',result.message, 'error');
                            }
                        },
                        error: function(){
                            Swal.close();
                            Swal.fire('Error','Terjadi kesalahan pada server', 'error');
                        }
                    });
     
        })

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
                    idsemester : "1",
                    tanggal : "2021-11-08",
                    "<?=csrf_token()?>": "<?=csrf_hash()?>"
                },
                dataType: 'json',
                success: function(result){
                    Swal.close();

                    if(result.success){
                        var tabel = '';

                        tabel +='<table class="table table-striped table-bordered">\
                                    <thead class="cal-thead">\
                                        <tr>\
                                            <th rowspan="2" class="cal-viewmonth" id="changemonth" >Hari</th>\
                                            ' ;
                                        result.data.header.forEach (function(list) {
                                            tabel += '<th class="cal-toprow">'+list.nama_kelompok+'</th>';
                                        })

                                        tabel +='\
                                        </tr>\
                                          <tr class="row2">\
                                            ' ;
                                        result.data.header.forEach (function(list) {
                                            tabel += '<th class="cal-toprow">'+list.nama_ruangan+'</th>';
                                        })

                                        tabel +='\
                                          </tr>\
                                          </thead>\
                                          <tbody class="cal-tbody">';

                                    result.data.body.forEach (function(list) {
                                            tabel += '\
                                            <tr ids="'+list.tanggal.replaceAll('-', '_')+'">\
                                                    <td colspan="'+parseInt(result.data.header.length)+1 +'" class="cal-usersheader" style="color:#000; background-color:#389fe8; padding: 0px;">'+list.tanggal+'</td>\
                                                  </tr>\
                                                  ';
                                                            var obj = JSON.parse(list.data_unit);
                                                            var orderobj = obj.sort((a, b) => parseFloat(a.jam_mulai) - parseFloat(b.jam_mulai));
                                                                orderobj.forEach (function(isi) {
                                                                    tabel += '<tr id="u2">\
                                            <td class="cal-userinfo">\
                                              <span><b>'+isi.unit_pertemuan+'<span></span></span>\
                                              <div class="cal-usercounter">\
                                                <span class="cal-userbadge badge badge-light">'+isi.jam_mulai+'</span><span class="cal-userbadge badge badge-warning">'+isi.jam_selesai+'</span>\
                                              </div>\
                                              <div class="cal-userarrows">\
                                                <i class="up mdi mdi-arrow-up-bold"></i><i class="down mdi mdi-arrow-down-bold"></i>\
                                              </div>\
                                            </td>\
                                          ';
                                                                                    if (isi.id_pertemuan==1) {
                                                                                        result.data.header.forEach (function(head) {
                                                                                            tabel += '<td class="weekend ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.unit_pertemuan+'" data-kelompoktaruna="'+head.id_kelompok+'">Olah Raga Pagi</td>';
                                                                                        })
                                                                                    } else if (isi.id_pertemuan==5) {
                                                                                        result.data.header.forEach (function(head) {
                                                                                            tabel += '<td class="weekend ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.unit_pertemuan+'" data-kelompoktaruna="'+head.id_kelompok+'">Isoma</td>';
                                                                                        })
                                                                                    } else {
                                                                                        result.data.header.forEach (function(head) {
                                                                                            tabel += '<td class="ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.unit_pertemuan+'" data-kelompoktaruna="'+head.id_kelompok+'" id='+list.tanggal+'_'+isi.id_pertemuan+'_'+head.id_kelompok+'></td>';
                                                                                        })
                                                                                    }

                                                                tabel +='</tr>';
                                                                })

                                    })

                        tabel += '<tbody>\
                        <thead >\
                                    <tr class="a">\
                                      <th rowspan="2" class="cal-viewmonth" id="changemonth" style="background-color: transparent;"></th>\
                                      <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                            <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                            <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                            <div class="details-uren">\
                                              15:00 - 16:30\
                                            </div>\
                                          </div>\
                                          <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                            <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                            <div class="details-uren">\
                                              15:00 - 16:30\
                                            </div>\
                                          </div>\
                                        \
                                      </td>\
                                      <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                        <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                          <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                          <div class="details-uren">\
                                            15:00 - 16:30\
                                          </div>\
                                        </div>\
                                      </td>\
                                      <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                        <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                          <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                          <div class="details-uren">\
                                            15:00 - 16:30\
                                          </div>\
                                        </div>\
                                      </td>\
                                      <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                        <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                          <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                          <div class="details-uren">\
                                            15:00 - 16:30\
                                          </div>\
                                        </div>\
                                      </td>\
                                      <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                        <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                          <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                          <div class="details-uren">\
                                            15:00 - 16:30\
                                          </div>\
                                        </div>\
                                      </td>\
                                      <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                        <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                          <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                          <div class="details-uren">\
                                            15:00 - 16:30\
                                          </div>\
                                        </div>\
                                      </td>\
                                      <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                        <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                          <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                          <div class="details-uren">\
                                            15:00 - 16:30\
                                          </div>\
                                        </div>\
                                      </td>\
                                      <td class="ui-droppable" data-date="1/7/2020" data-userid="1">\
                                        <div class="drag details ui-draggable ui-draggable-handle" data-taskid="13956" data-userid="1" style="border-left: 5px solid rgb(81, 255, 0); position: relative;">\
                                          <h3 class="details-task" style=" background: #51FF00; color: #000000">Training</h3>\
                                          <div class="details-uren">\
                                            15:00 - 16:30\
                                          </div>\
                                        </div>\
                                      </td>\
                                    </tr>\
                                  </thead>\
                                </table>';
                        $('#data_tabel_jadwal').html(tabel);

                        result.data.content.forEach(function(content) {
                            $('#'+content.tanggal+'_'+content.id_jam_pertemuan+'_'+content.id_kelompok_taruna).html('\
                                <div class="drag details ui-draggable ui-draggable-handle" data-taskid="'+content.tanggal+'_'+content.id_jam_pertemuan+'_'+content.id_kelompok_taruna+'" data-userid="'+content.id_jadwal+'" style="border-left: 5px solid rgb(36, 115, 171); position: relative;">\
                                 <h3 class="details-task" style=" background: #2473AB; color: #FFFFFF">'+content.kode_mk+'</h3>\
                                 <div class="details-uren">\
                                   12:00 - 19:00\
                                 </div>\
                               </div>');
                        } );

                        // <td class="ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.id_jam_pertemuan+'" data-kelompoktaruna="1"></td>\
                        //     <td class="ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.id_jam_pertemuan+'" data-kelompoktaruna="2">\
                        //     <div class="drag details ui-draggable ui-draggable-handle" data-taskid="12336" data-userid="1" style="border-left: 5px solid rgb(36, 115, 171); position: relative;">\
                        //         <h3 class="details-task" style=" background: #2473AB; color: #FFFFFF">Late shift</h3>\
                        //         <div class="details-uren">\
                        //           12:00 - 19:00\
                        //         </div>\
                        //       </div>\
                        //       </td>\
                        //     <td class="ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.id_jam_pertemuan+'" data-kelompoktaruna="3"></td>\
                        //     <td class="weekend ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.id_jam_pertemuan+'" data-kelompoktaruna="4"></td>\
                        //     <td class="weekend ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.id_jam_pertemuan+'" data-kelompoktaruna="5"></td>\
                        //     <td class="ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.id_jam_pertemuan+'" data-kelompoktaruna="6"></td>\
                        //     <td class="ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.id_jam_pertemuan+'" data-kelompoktaruna="7"></td>\
                        //     <td class="ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.id_jam_pertemuan+'" data-kelompoktaruna="8"></td>\
                        dragable();
                    }else{
                        Swal.fire('Error',result.message, 'error');
                    }
                },
                error: function(){
                    Swal.close();
                    Swal.fire('Error','Terjadi kesalahan pada server', 'error');
                }
            });
        })

        select2Init("#id_semester", "/semester_select_get", null, function(data) { return data.text; }, function(data){ 
            if (data.id === '') { 
                return "Cari Satuan Kerja";
            }

            return data.text; 
        });

        select2Init("#idkabkota_lhr", "/birthday_place_select_get", null, function(data) { return data.text; }, function(data){ 
            if (data.id === '') { 
                return "Cari Tempat Lahir";
            }

            return data.text; 
        });


        

    });


function dragable() {
    // Drag tasks around
$(".drag").draggable({
  revert: "invalid",
  start: function (e, ui) {
    // Date from where task was dragged from
    $(this).data("oldDate", $(this).parent().data("date"));
  }
});

// Select drop area for Tasks (only droppable on TD which have "data-date" attribute)
$("td[data-date]").droppable({
  drop: function (e, ui) {
    var drag = ui.draggable,
      drop = $(this),
      oldDate = drag.data("oldDate"), // Task date on drag
      newDate = drop.data("date"),    // Task date on drop 

      dragID = drag.data("userid"),   // Task userid on drag
      dropID = drop.data("unit");   // Task userid on drop
      kelompokID = drop.data("kelompoktaruna");   // Task userid on drop

   // console.log(oldDate);
   // console.log(newDate);
   // console.log(dragID);
   // console.log(dropID);
   // console.log(kelompokID);
    if (oldDate != newDate || dragID != dropID) {
      $(drag).detach().css({ top: 0, left: 0 }).appendTo(drop);
      $(drag).data("userid", dropID); // Update task userid
    } else {
      return $(drag).css({ top: 0,left: 0 }); // Return task to old position
    }
  }
});

// show EDIT and TRASH tools
$(".drag").hover(
  function () {
    var isAdmin = 1; // Ability to hide or show edit and delete options
    if (isAdmin == 1) {
      $(this)
        .css('z-index', '999')
        .prepend('<div class="opt-tools"><div class="opt-edit"><i class="fas fa-pen"></i></div><div class="opt-trash"><i class="fas fa-trash"></i></div></div>');
    }
  },
  function () {
    //When mouse hovers out DIV remove tools
    $(this).css("z-index", "0").find(".opt-tools").remove();
  }
);

// Show modal to edit task
$(document).on('click', '.opt-edit', function() {
  // Get task ID and DATE from DATA attribute
  var taskid = $(this).parent().parent().data('taskid'),
      userid = $(this).parent().parent().data('userid');
  // Get DATE 
  var date = $(this).closest('td').data('date');
  // insert data to Modal 
  $('#ktxt')[0].jscolor.fromString('FFFFFF');
  $('#kbg')[0].jscolor.fromString('8E8E8E');
  $('#demotaak2').css('color', '#FFFFFF');
  $('#demotaak1').css('border-left-color', '#8E8E8E');
  $('#demotaak2').css('background-color', '#8E8E8E');
  $('#edittask').modal('show');
});

// Modal remove task ?
$(document).on('click', '.opt-trash', function() {
  var taskid = $(this).parent().parent().data('taskid');
  
  $('#taskdelid').val(taskid);
    $('#modal-delete').html('Are you sure you want to delete task ID <b>' + taskid + '</b>?');
  $('#deletetask').modal('show');
});

// Remove task after conformation
$(document).on('click', '#confdelete', function() {
  var taskid = $('#taskdelid').val();
  $("div").find('[data-taskid='+taskid+']').remove();
  $('#deletetask').modal('hide');
});
}

function changeColor(id, c) {
    if (id == 'ctxt') {
        $('#demotaak2').css('color', '#' + c);
    } else if (id == 'cbg') {
        $('#demotaak1').css('border-left-color', '#' + c);
        $('#demotaak2').css('background-color', '#' + c);
    } 
    return false;
}

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

    function select2(){
      $('.id_kelompok').select2();
    }
</script>
