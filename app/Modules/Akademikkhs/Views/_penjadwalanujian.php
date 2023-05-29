
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
                        <!-- <form data-plugin="parsley" data-option="{}" id="forma" action="<?=base_url()?>/akademikkhs/action/pdf/penjadwalanujian?o=P" method="POST" autocomplete="off"> -->
                          
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
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="2021-11-22" required />
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Pendidik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="modal-edit" class="modal-body">
        <div class="input-group mb-2 text-center">
        <i style="color:red">Edit box is only for preview purposes and does not save any data.</i>
        </div>
        <div class="form-group row">
            <div class="col-12">
              <!-- id_user_pendidik
update_id_jadwal -->
                <label for="id_user_pendidik">Nama Pendidik</label>
                <input id="update_id_jadwal" type="hidden" value="">
                <select class="form-control select2pendidik" id="id_user_pendidik" name="id_user_pendidik" required>\
                </select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="confupdate" type="button" class="btn btn-danger">Simpan</button>
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
        <input id="id_jadwal" type="hidden" value="">
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
                        url     : url_load,
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
                                                      tabel += '<th class="cal-toprow" style="    background-color: #F4EBFF !important;">'+list.nama_kelompok+'</th>';
                                                  })

                                                  tabel +='\
                                                  </tr>\
                                                    <tr class="row2">\
                                                      ' ;
                                                  result.data.header.forEach (function(list) {
                                                      tabel += '<th class="cal-toprow">\
                                                        <select class="form-control select2kelas" id="'+list.nama_kelompok.replaceAll(' ', '_')+'" name="id_kelompok[]" required>\
                                                        </select>\
                                                        </th>';
                                                  })

                                                  tabel +='\
                                                    </tr>\
                                                    </thead>\
                                                    <tbody class="cal-tbody">';

                                              result.data.body.forEach (function(list) {
                                                      tabel += '\
                                                      <tr id="'+list.tanggal.replaceAll('-', '_')+'">\
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
                                                                                                      tabel += '<td class="weekend ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.id_pertemuan+'" data-kelompoktaruna="'+head.id_kelompok+'">Olah Raga Pagi</td>';
                                                                                                  })
                                                                                              } else if (isi.id_pertemuan==5) {
                                                                                                  result.data.header.forEach (function(head) {
                                                                                                      tabel += '<td class="weekend ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.id_pertemuan+'" data-kelompoktaruna="'+head.id_kelompok+'">Isoma</td>';
                                                                                                  })
                                                                                              } else {
                                                                                                  result.data.header.forEach (function(head) {
                                                                                                      tabel += '<td class="ui-droppable" data-date="'+list.tanggal+'" data-unit="'+isi.id_pertemuan+'" data-kelompoktaruna="'+head.id_kelompok+'"\
                                                                                                        data-namakelompoktaruna="'+head.nama_kelompok.replaceAll(' ', '_')+'" id='+list.tanggal+'_'+isi.id_pertemuan+'_'+head.id_kelompok+'></td>';
                                                                                                  })
                                                                                              }

                                                                          tabel +='</tr>';
                                                                          })

                                              })

                                  tabel += '<tbody>\
                                    <thead >\
                                              <tr class="a">\
                                                <th rowspan="2" class="cal-viewmonth" id="changemonth" style="background-color: transparent;">\
                                                <select class="form-control select2matapalajaran" id="mata_pelajaran"  name="mata_pelajaran" required>\
                                                        </select>\
                                                        </th>';

                                                 result.data.header.forEach (function(list) {
                                                      tabel += '<td class="ui-droppable" data-date="2000-01-01" data-userid="'+list.id_kelompok+'" id="'+list.id_kelompok+'_'+list.nama_kelompok.replaceAll(' ', '_')+'" data-kelompoktaruna='+list.id_kelompok+' data-unit="'+list.id_kelompok+'"></td>\
                                                      ';
                                                  })
                                                tabel += '\
                                              </tr>\
                                            </thead>\
                                          </table>';

                                  $('#data_tabel_jadwal').html(tabel);
                                    select2();


                                  result.data.content.forEach(function(content) {
                                      $('#'+content.tanggal+'_'+content.id_jam_pertemuan+'_'+content.id_kelompok_taruna).html('\
                                          <div class="drag details ui-draggable ui-draggable-handle" \
                                            data-taskid="'+content.tanggal+'_'+content.id_jam_pertemuan+'_'+content.id_kelompok_taruna+'"\
                                            data-userid="'+content.id_jam_pertemuan+'"\
                                            \
                                            data-idjadwal="'+content.id_jadwal+'"\
                                            data-idbahanajar="'+content.id_bahan_ajar+'"\
                                            data-iduserpendidik="'+content.id_user_pendidik+'"\
                                            \
                                            style="border-left: 5px solid rgb(36, 115, 171); position: relative;">\
                                           <h3 class="details-task" style=" background: #2473AB; color: #FFFFFF">'+content.kode_mk+' : '+content.jumlah_pertemuan+'-'+content.pertemuan_ke+' = '+content.sisa_pertemuan+'</h3>\
                                           <div class="details-uren">\
                                             '+content.nama_pendidik+'\
                                           </div>\
                                         </div>');
                                  } );

                                  result.data.header.forEach (function(list) {

                                    if(list.id_ruangan.length!=0){

                                        $('#'+list.nama_kelompok.replaceAll(' ', '_')).select2('trigger', 'select', {
                                              data : {
                                                  id: list.id_ruangan,
                                                  text: list.nama_ruangan
                                              }
                                          });
                                    } 

                                  })

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

        select2Init("#id_semester", "/semester_select_get", null, function(data) { return data.text; }, function(data){ 
            if (data.id === '') { 
                return "Cari Semester";
            }

            return data.text; 
        });

        select2Init("#id_user_pendidik", "/birthday_place_select_get", null, function(data) { return data.text; }, function(data){ 
            if (data.id === '') { 
                return "Cari Pendidik";
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
    $(this).data("oldKelompoktaruna", $(this).parent().data("kelompoktaruna"));
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
      dropID = drop.data("unit"),   // Task userid on drop

      oldkelompokID = drag.data("oldKelompoktaruna"), // Task date on drag
      kelompokID = drop.data("kelompoktaruna"),

      namakelompoktaruna = drop.data("namakelompoktaruna"),   // Task userid on drop

      idjadwal = drag.data("idjadwal"),
      idbahanajar = drag.data("idbahanajar"),
      iduserpendidik = drag.data("iduserpendidik")

      ;   // Task userid on drop

      idruangkelas = $('#'+namakelompoktaruna).val();
// idjadwal
// idbahanajar
// iduserpendidik

      // console.log(idjadwal+' , '+idbahanajar+' , '+iduserpendidik);
      // console.log(namakelompoktaruna);
      // console.log(oldDate +' != '+ newDate+", "+dragID +' != '+ dropID+", "+oldkelompokID +' == '+ kelompokID);
      // console.log('tagl '+newDate+', jam pertemuan'+ dropID+' , kelompok taruna '+ kelompokID+ ' , ruangan' + idruangkelas);

      if (oldkelompokID!=kelompokID && $('#'+namakelompoktaruna).val()==null) {
            
            alert('maaf beda Kelompok');
            return $(drag).css({ top: 0,left: 0 });

      } else if (oldkelompokID==kelompokID && $('#'+namakelompoktaruna).val()==null) {

        alert('Mohon Pilih Ruangan');
        return $(drag).css({ top: 0,left: 0 }); // Return task to old position

      } else {

            if ((oldDate != newDate || dragID != dropID ) && oldkelompokID==kelompokID  ){
              $(drag).detach().css({ top: 0, left: 0 }).appendTo(drop);
              $(drag).data("userid", dropID); // Update task userid

              // console.log('dadi');

              savejadwal(idjadwal,idbahanajar,iduserpendidik,newDate,dropID,kelompokID,idruangkelas);
            } else {
                alert('maaf beda Kelompok');
              return $(drag).css({ top: 0,left: 0 }); // Return task to old position
            }
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

  var idjadwal = $(this).parent().parent().data('idjadwal');
  
  $('#id_user_pendidik').val(idjadwal);

  $('#update_id_jadwal').val(idjadwal);


 // console.log($(this).parent().parent().parent().html());
  // insert data to Modal 

  $('#edittask').modal('show');

}).on('click', '#confupdate', function() {
  var id_jadwal = $('#update_id_jadwal').val();

 // console.log(id_jadwal);
});

// Modal remove task ?
$(document).on('click', '.opt-trash', function() {
  var idjadwal = $(this).parent().parent().data('idjadwal');
  var kode_mk = $(this).parent().parent().find('h3').html();
  var taskid = $(this).parent().parent().data('taskid');
  
  $('#taskdelid').val(taskid);
  $('#id_jadwal').val(idjadwal);
    $('#modal-delete').html('Apa anda yakin ingin menghapus jadwal ini <b>' + kode_mk + '</b>?');
  $('#deletetask').modal('show');
});

// Remove task after conformation
$(document).on('click', '#confdelete', function() {

  var taskid = $('#taskdelid').val();
  var id_jadwal = $('#id_jadwal').val();
  $.ajax({
          url     : url_delete,
          type    : 'post',
          data    : {
              id : id_jadwal,
              "<?=csrf_token()?>": "<?=csrf_hash()?>"
          },
          dataType: 'json',
          success: function(result){
             // console.log(result);
              Swal.close();
              if(result.success){
                $("div").find('[data-taskid='+taskid+']').remove();
                $('#deletetask').modal('hide');
              }else{
                  Swal.fire('Error',result.message, 'error');
              }
          },
          error: function(){
              Swal.close();
              Swal.fire('Error','Terjadi kesalahan pada server', 'error');
          }
      });

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

      $('.select2kelas').select2({
            id: function(e) { return e.id },
            placeholder: '',
            multiple: false,
            ajax: {
                url: url_ajax + "/ruangkelas_select_get",
                dataType: 'json',
                quietMillis: 500,
                delay: 500,
                data: function (param) {
                    var def_param = {
                        keyword: param.term, //search term
                        perpage: 5, // page size
                        page: param.page || 0, // page number
                    };

                    return Object.assign({}, def_param, null);
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
                                                return "Cari Ruang Kelas";
                                            }

                                            return data.text; 
                                        },
            escapeMarkup: function(m) {
                return m;
            }
        });

      $('.select2matapalajaran').select2({
            id: function(e) { return e.id },
            placeholder: '',
            multiple: false,
            ajax: {
                url: url_ajax + "/matapelajaran_select_get",
                dataType: 'json',
                quietMillis: 500,
                delay: 500,
                data: function (param) {
                    var def_param = {
                        'id_semester': $('#id_semester').val(), //search term
                        keyword: param.term, //search term
                        perpage: 5, // page size
                        page: param.page || 0, // page number
                    };

                    return Object.assign({}, def_param, null);
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
            templateResult: function(data) { return '<div style="font-weight: bold;">'+data.kode_mk+'</div><div>'+data.text+'</div>' },
            templateSelection: function(data){ 
                                            if (data.id === '') { 
                                                return "Cari mata Pelajaran";
                                            }

                                            return data.kode_mk; 
                                        },
            escapeMarkup: function(m) {
                return m;
            }
        }).on('select2:select', function(e) {

            $.ajax({
                    url     : url_ajax + "/matapelajaran_list_get",
                    type    : 'post',
                    data    : {
                        id_mata_pelajaran : $('#mata_pelajaran').val(),
                        "<?=csrf_token()?>": "<?=csrf_hash()?>"
                    },
                    dataType: 'json',
                    success: function(result){
                        Swal.close();
                        if(result.success){

                            result.data.forEach (function(list) {

                                var contenttd = '';


                                var obj = JSON.parse(list.detail);
                                var orderobj = obj.sort((a, b) => parseFloat(a.pertemuan_ke) - parseFloat(b.pertemuan_ke));

                                var objlimit2 = orderobj.slice(0, 2);
                                objlimit2.forEach (function(isi) {

                                    contenttd += '<div class="drag details ui-draggable ui-draggable-handle" data-taskid="2000-01-01_'+list['id_kelompok']+'_'+isi.id_bahan_ajar+'" data-userid="'+isi.id_bahan_ajar+'"\
                                            data-idjadwal=""\
                                            data-idbahanajar="'+isi.id_bahan_ajar+'"\
                                            data-iduserpendidik="'+isi.id_user_pendidik+'"\ style="border-left: 5px solid rgb(36, 115, 171); position: relative;">\
                                           <h3 class="details-task" style=" background: #2473AB; color: #FFFFFF">'+isi.kode_mk+' : '+isi.jumlah_pertemuan+'-'+isi.pertemuan_ke+' = '+isi.sisa_pertemuan+'</h3>\
                                           <div class="details-uren">\
                                             '+isi.nama_pendidik+'\
                                           </div>\
                                         </div>';

                                });

                            $('#'+list['id_kelompok']+'_'+list['kelompok'].replaceAll(' ', '_')).html(contenttd);
                                  })

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

        });
    }

    function savejadwal(idjadwal,idbahanajar,iduserpendidik,tanggal,idjampertemuan,idkelompoktaruna,idruangkelas){

        $.ajax({
                    url     : url_insert,
                    type    : 'post',
                    data    : {
                        id : idjadwal,
                        id_bahan_ajar : idbahanajar,
                        id_user_pendidik : iduserpendidik,
                        tanggal : tanggal,
                        id_jam_pertemuan : idjampertemuan,
                        id_kelompok_taruna : idkelompoktaruna,
                        id_ruang_kelas : idruangkelas,
                        "<?=csrf_token()?>": "<?=csrf_hash()?>"
                    },
                    dataType: 'json',
                    success: function(result){
                       // console.log(result);
                        Swal.close();
                        if(result.success){

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
</script>
