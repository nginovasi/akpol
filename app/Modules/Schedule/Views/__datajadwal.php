
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script> -->

<style type="text/css">
        table {
            border-collapse: collapse;
            /*margin: 32px;*/
        }

        th, td {
            border: 1px solid #CCC;
            padding: 4px;
        }

        th {
            color: #5e676f;
            font-size: 12px;
            font-weight: 400;
        }

        td.Droppable {
            background-color: #EEE;
        }

        div table {
            display: inline-block;
            vertical-align: top;
        }

        div table:first-child {
            margin-right: 0;
        }

        hr {
            border: none;
            border-top: 1px solid #CCC;
            margin: 0 32px;
        }

        p {
            margin: 8px 32px;
        }

        p label {
            display: inline-block;
            width: 100px;
        }

        [draggable] {
            background-color: #fff;
            cursor: move;
        }

        #Unscheduled a {
            display: none;
        }

        
    </style>
    <div id="draggablee">
        <div id="draggable">
    <script>
        // if (typeof jQuery != 'undefined') {  
        //     // jQuery is loaded => print the version
        //     alert(jQuery.fn.jquery);
        // }
        if (console.clear) {
            console.clear();
        };

        var unscheduledTbody = null,
            scheduledTbody = null,
            isDroppable = true;

        /// Work around for Chrome and Safari (maybe Opera, not 100% sure). Apparently WebKit (or was it the Chromium dev team) decided it was a good idea to avoid initializing the dataTransfer.getData object on the dragend event (also on dragstart it appears). Thus I have to use a global variable to get around it. Good job guys, that's two things you've failed on on an already difficult to implement API that's been around for years...
        var dataTransferValue = null;

        var Indecies = function (td) {
            var tr = td.parent(),
                tbody = tr.parent();
                
            var row = tbody.children().index(tr),
                column = tr.children().index(td);
                
            return [row, column];
        };

        var CheckCellRowspan = function (options) {

             if (options.html()=='') { 
                        isDroppable = true;
                } else {
                        isDroppable = false;
                }



            // var element = null;
            
            // for (var i = 1; i < options.rows; i++) {
            //     element = scheduledTbody.find("tr:eq(" + (options.row + i) + ") td." + options.column);
                
            //     if (element.attr("id") != null) {
            //         isDroppable = false;
                    
            //         return;
            //     } else {
            //         isDroppable = true;
            //         return;
            //     };
            // };
            
            // element = null;
            
        };

        var ToggleCellVisibility = function (options) {
            var selectors = "",
                i = 1;
            
            for (i; i < options.rows; i++) {
                if (options.hide) {
                    selectors = (selectors + ("tr:eq(" + (options.row + i) + ") td." + options.column + ","));
                } else {
                    selectors = (selectors + ("tr:eq(" + (options.row + i) + ") td." + options.column + ":hidden,"));
                };
            };
            
            selectors = selectors.substring(0, (selectors.length - 1));
            
            if (selectors.length > 0) {
                scheduledTbody.find(selectors).css({
                    display: (options.hide ? "none" : "table-cell")
                });
            };
        };

        var UpdateSchedule = function () {
        };

        $(function () {
            /// Add draggable="true" to all potential cells
            $("#Unscheduled tbody td,#Scheduled tbody td").prop("draggable", true);
            
            unscheduledTbody = $("#Unscheduled tbody");
            scheduledTbody = $("#Scheduled tbody");
            
            /// Add data-scheduled="false" to all unscheduled cells
            unscheduledTbody.find("td").data("scheduled", false);
            
            /// Find all cells in the Scheduled table
            var scheduledTds = scheduledTbody.find("td");
            
            $("[draggable]").on("dragstart", function (e) {
                /// Fired on an element when a drag is started. The user is requesting to drag the element
                /// the dragstart event is fired at. During this event, a listener would set information
                /// such the drag data and image to be associated with the drag.
                
                e.originalEvent.dataTransfer.effectAllowed = "move";
                e.originalEvent.dataTransfer.setData("text/plain", this.id);
            }).on("drag", function (e) {
                console.log('b');
                /// This event is fired at the source of the drag, that is, the element where dragstart
                /// was fired, during the drag operation.
            }).on("dragend", function (e) {
                /// The source of the drag will receive a dragend event when the drag operation is complete,
                /// whether it was successful or not.
                var dropEffect = e.originalEvent.dataTransfer.dropEffect;
                console.log(dropEffect);
                switch (dropEffect) {
                    case "copy":
                        /// Falling through to "move" because Chrome on Windows has a bug that makes it
                        /// always send "copy" as the dropEffect regardless of what it really is.
                        /// The bug has been around since 2010, I think. From what I understand the Chromium
                        /// dev team is aprehensive in fixing it because it would require too many changes.
                        /// That may be so, but every other browser seems to able to perform the operation
                        /// as expected, so that's really not an excuse, especially for two+ years...
                    case "move":
                        /// Rebuild the cells in the COLUMN at the source location
                        if (isDroppable) {
                            var source = $(this),
                                target = $("#" + dataTransferValue);
                        
                            if (source.data("scheduled")) {
                                /// Source cell is in the Scheduled table
                                var sourceIndecies = Indecies(source),
                                    sourceRow = sourceIndecies[0],
                                    sourceColumn = sourceIndecies[1],
                                    rows = target.data("rows");
                            
                                ToggleCellVisibility({
                                    rows: rows,
                                    row: sourceRow,
                                    column: sourceColumn,
                                    hide: false
                                });
                            
                                /// Clean up
                                sourceIndecies = null;
                                sourceRow = null;
                                sourceColumn = null;
                                rows = null;
                            } else {
                                /// Source cell is in the Unscheduled table
                                source.parent().remove();
                            };
                            
                            /// Clean up
                            dataTransferValue = null;
                            source = null;
                            target = null;
                        };
                        
                        break;
                    case "link":
                    case "none":
                    default:
                        break;
                };
            });
            
            /// Add class with the value of the cell's column index
            /// Add data-scheduled="true" to all scheduled cells
            scheduledTds.each(function () {
                var td = $(this);
                
                td.addClass("" + Indecies(td)[1]);
            }).data("scheduled", true).on("dragenter", function (e) {
                /// Fired when the mouse is first moved over an element while a drag is occuring.
                /// A listener for this event should indicate whether a drop is allowed over this location.
                /// If there are no listeners, or the listeners perform no operations, then a drop is not
                /// allowed by default. This is also the event to listen to if you want to provide feedback
                /// that a drop is allowed such as displaying a highlight or insertion marker.
                ///
                /// DragEnter is called when the mouse enters your control while dragging something.
                
                e.originalEvent.dataTransfer.dropEffect = "move";
                
                $(this).addClass("Droppable");
            }).on("dragover", function (e) {
                /// This event is fired as the mouse is moved over an element when a drag is occuring.
                /// Much of the time, the operation that occurs during a listener will be the same as
                /// the dragenter event.
                ///
                /// DragOver is called while the mouse is still in that rectangle and still dragging.
                
                e.preventDefault();
            }).on("dragleave", function (e) {
                /// This event is fired when the mouse leaves an element while a drag is occuring.
                /// Listeners should remove any highlighting or insertion markers used for drop feedback.
                
                $(this).removeClass("Droppable");
            }).on("drop", function (e) {
                // The drop event is fired on the element where the drop was occured at the end of the
                // drag operation. A listener would be responsible for retrieving the data being dragged and
                // inserting it at the drop location. This event will only fire if a drop is desired.
                // It will not fire if the user cancelled the drag operation, for example by pressing
                // the Escape key, or if the mouse button was released while the mouse was not over a
                // valid drop target.
                
                e.preventDefault();
                
                dataTransferValue = e.originalEvent.dataTransfer.getData("text/plain");
                
                var source = $("#" + dataTransferValue),
                    target = $(this),
                    targetIndecies = Indecies(target),
                    targetRow = targetIndecies[0],
                    targetColumn = targetIndecies[1],
                    rows = source.data("rows");
                
                // CheckCellRowspan({
                //     rows: rows,
                //     row: targetRow,
                //     column: targetColumn
                // });

                CheckCellRowspan(target);

                    // console.log(source);
                    // console.log(isDroppable);

               

                if (isDroppable) {
                    // console.log(target.html()!=''? 'a' : 'b');


                        var sourceIndecies = Indecies(source),
                            sourceRow = sourceIndecies[0],
                            sourceColumn = sourceIndecies[1],
                            url = source.data("url");
                        
                        target.removeClass("Droppable")
                            .html(source.html())
                            .attr("id", source.attr("id"))
                            .attr("rowspan", rows)
                            .data("rows", rows)
                            .data("url", url);
                
                        source.html("")
                            .removeAttr("id")
                            .removeAttr("rowspan")
                            .removeData("rows")
                            .removeData("url");
                        /// Hide any visible cells that are affected by the target cell's rowspan
                        ToggleCellVisibility({
                            rows: rows,
                            row: targetRow,
                            column: targetColumn,
                            hide: true
                        });
                        
                        // console.log(target.closest( "tbody" ).attr('data-hari'));
                        // console.log(target.closest( "tr" ).attr('data-time'));
                        /// Clean up
                        sourceIndecies = null;
                        sourceRow = null;
                        sourceColumn = null;
                    // } else {
                    //     $("b").text("The cell could not be dropped at the target location. It conflicted with an existing cell in its path.");
                    
                    //     target.removeClass("Droppable");
                    // }
                } else {
                    alert('Maaf Sudah Di gunakan');
                    $("b").text("The cell could not be dropped at the target location. It conflicted with an existing cell in its path.");
                    
                    target.removeClass("Droppable");
                };
                
                /// Clean up
                source = null;
                target = null;
                targetIndecies = null;
                targetRow = null;
                targetColumn = null;
                rows = null;
            }).find("a").on("click", function (e) {
                e.preventDefault();
                
                var source = $(this).closest("td"),
                    sourceIndecies = Indecies(source),
                    sourceRow = sourceIndecies[0],
                    sourceColumn = sourceIndecies[1],
                    rows = source.data("rows");
                
                /// Add a new cell to the Unscheduled table
                unscheduledTbody
                    .append($("<tr />")
                        .append($("<td draggable=\"true\" data-scheduled=\"false\" />")
                            .html(source.html())
                            .attr("id", source.attr("id"))
                            .data("rows", rows)));
                
                /// Blank-out the source cell
                source.html("")
                    .removeAttr("id")
                    .removeAttr("rowspan")
                    .removeData("rows");
                
                /// Unhide any hidden cells that are affected by the source cell's rowspan
                ToggleCellVisibility({
                    rows: rows,
                    row: sourceRow,
                    column: sourceColumn,
                    hide: false
                });
                
                /// Clean up
                source = null;
                sourceIndecies = null;
                sourceRow = null;
                sourceColumn = null;
                rows = null;
            });
            
            /// Clean up
            scheduledTds = null;
        });
    </script>
        </div>
    </div>


    <style type="text/css">
        /*CARD mapel */

        .card-mapel {
          width: 150px;
          /*max-width: 360px;*/
          border-left: 2px solid black;
        }

        .infos {
          background-color: #FFF;
          padding: .3rem;
          position: relative;
          box-shadow: 0 2px 5px #dedede;
          border-radius: 5px;
          border-top-left-radius: none;
          border-bottom-left-radius: none;
        }

        .top-icon {
          cursor: pointer;
          position: absolute;
          top: .3rem;
          right: 1rem;
          color: #7f7f7f;
          font-size: .6rem;
        }

        .infos{
          display: flex;
        }

        /* Infos */
        .infos {
          align-items: center;
          margin-bottom: .2rem;
        }
        .infos .name {
          font-size: 10px;
        }
        .infos .location {
          font-size: 9px;
          word-spacing: .1rem;
          font-weight: normal;
          text-overflow: ellipsis;
          width: 130px;
          white-space: nowrap;
          overflow: hidden;
        }
        .infos .location i {
          color: #f2d1e1;
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
                    <!-- <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-data" role="tab" aria-controls="tab-data" aria-selected="false">Data</a>
                    </li>
                    <?php if($rules->i == 1) {?>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-form" role="tab" aria-controls="tab-form" aria-selected="false">Form</a>
                    </li>
                    <?php } ?> -->
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-jadwal" role="tab" aria-controls="tab-jadwal" aria-selected="false">Jadwal</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="padding">
                    <div class="tab-content">
                        <!-- <div class="tab-pane fade active show" id="tab-data" role="tabpanel" aria-labelledby="tab-data">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>Batalyon</span></th>
                                            <th><span>Gadik</span></th>
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
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="id_kelompok_taruna">Kelompok Taruna</label>
                                        <select class="js-data-example-ajax" id="mySelect2"></select>
                                    </div>
                                    <div class="col-6">
                                        <label for="id_ruang_kelas">Ruang Kelas</label>
                                        <select class="form-control sel2" id="id_ruang_kelas" name="id_ruang_kelas" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3">
                                        <label for="id_jam_pertemuan">Jam Pembelajaran</label>
                                        <select class="form-control sel2" id="id_jam_pertemuan" name="id_jam_pertemuan" required>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label for="tanggal">Tanggal Pembelajaran</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="jam_mulai">Jam Mulai</label>
                                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="jam_selesai">Jam Selesai</label>
                                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="id_bahan_ajar">Bahan Ajar</label>
                                        <select class="form-control sel2" id="id_bahan_ajar" name="id_bahan_ajar" required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="id_user_pendidik">Nama Pendidik</label>
                                        <select class="form-control sel2" id="id_user_pendidik" name="id_user_pendidik" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="reset" class="btn btn-light">Reset</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div> -->
                        <div class="tab-pane fade active show" id="tab-jadwal" role="tabpanel" aria-labelledby="tab-jadwal">
                            <form data-plugin="parsley" data-option="{}" id="form" autocomplete="off">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <?=csrf_field();?>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="id_tingkatan">Tingkat</label>
                                        <select class="form-control sel2" id="id_tingkatan" name="id_tingkatan" required>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="id_semester">Semester</label>
                                        <select class="form-control sel2" id="id_semester" name="id_semester" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-6">
                                        <label for="tahun_ajaran">Tahun Ajaran</label>
                                        <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="Tahun Ajaran">
                                    </div>
                                    <div class="col-6">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="text" class="form-control" id="tanggala" name="tanggal" />

                                    </div>
                                </div>
                                <!-- <div class="text-right">
                                    <button type="reset" class="btn btn-light">Reset</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div> -->
                            </form>
                            <div class="table-responsive">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="padding" >
                    <button class="btn btn-sm btn-outline-primary edit" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </button>
                    <div >
                        <div id="asdd"></div>
                        <div id="asd"></div>

                    <table id="Scheduled" style="background-color: #f5f5f6 ; overflow-x: auto; ">
                        <thead>
                            <tr>
                                <th rowspan="2">Hari</th>
                                <th rowspan="2">Unit</th>
                                <th rowspan="2" width="100px">Jam</th>
                                <th colspan="8">Kelas</th>
                            </tr>
                            <tr>
                                <th width="160px">A</th>
                                <th width="160px">B</th>
                                <th width="160px">C</th>
                                <th width="160px">D</th>
                                <th width="160px">E</th>
                                <th width="160px">F</th>
                                <th width="160px">G</th>
                                <th width="160px">H</th>
                            </tr>
                        </thead>
                        <tbody data-hari="Senin">
                            <tr data-time="04:40 AM">
                                <th rowspan="7" scope="row">Senin</th>
                                <th scope="row" height="60px"> - </th>
                                <th scope="row">04.40 - 05.30</th>
                                <th scope="row"></th>
                                <th scope="row"></th>
                                <th scope="row"></th>
                                <th scope="row"></th>
                                <th scope="row"></th>
                                <th scope="row"></th>
                                <th scope="row"></th>
                                <th scope="row"></th>
                            </tr>
                            <tr data-time="07:15 AM">
                                <th scope="row" height="60px"> I </th>
                                <th scope="row">07.15 - 08.55</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr data-time="09:05 AM">
                                <th scope="row" height="60px"> II </th>
                                <th scope="row">09.05 - 10.45</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr data-time="10:55 AM">
                                <th scope="row" height="60px"> III </th>
                                <th scope="row">10.55 - 12.35</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr data-time="isoma">
                                <th scope="row" height="60px"> - </th>
                                <th scope="row">ISOMA</th>
                                <th scope="row"></th>
                                <th scope="row"></th>
                                <th scope="row"></th>
                                <th scope="row"></th>
                                <th scope="row"></th>
                                <th scope="row"></th>
                                <th scope="row"></th>
                                <th scope="row"></th>
                            </tr>
                            <tr data-time="14:00 AM">
                                <th scope="row" height="60px"> IV </th>
                                <th scope="row">14.00 - 15.40</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr data-time="15:50 AM">
                                <th scope="row" height="60px"> V </th>
                                <th scope="row">15.50 - 17.30</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>

                        <table id="Unscheduled">
                        <caption>Unscheduled</caption>
                        <tbody>
                            <tr>
                                <td id="A" data-rows="1" data-url="">
                                    Praktek a
                                    <a href="">✖</a>
                                </td>
                            </tr>
                            <tr>
                                <td id="B" data-rows="1" data-url="">
                                    Teori a
                                    <a href="">✖</a>
                                </td>
                            </tr>
                            <tr>
                                <td id="C" data-rows="1" data-url="">
                                    Praktek b
                                    <a href="">✖</a>
                                </td>
                            </tr>
                            <tr>
                                <td id="D" data-rows="1" data-url="">
                                      <div class="card-mapel">
                                        <div class="infos">
                                          <div class="">
                                            <h2 class="name">PS 16 : <text style="font-weight: 400">32-18=14</text> </h2>
                                            <h4 class="location">
                                              <!-- <i class="fa fa-map-marker"></i> -->
                                              KBP TOK satu ketut suitra atnyana koma S.I.K & tim 
                                            </h4>
                                          </div>
                                          <a href=""><i class="fas top-icon">x</i></a>
                                        </div>
                                      </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    const url = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)?>';
    const url_edit = '<?=base_url()."/".uri_segment(0)."/action/".uri_segment(1)."_edit"?>';

    var tbody = '';


    

    $(document).ready(function(){
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
                        var tabel = '';
                        console.log(result.data.header.length);
                        console.log(result.data.header.length);
                        console.log(result);
                        tabel +='<table id="Scheduled" style="background-color: #f5f5f6 ; overflow-x: auto; ">\
                                    <thead>\
                                        <tr>\
                                            <th rowspan="3">Hari</th>\
                                            <th rowspan="3">Unit</th>\
                                            <th rowspan="3" width="100px">Jam</th>\
                                            <th colspan="'+result.data.header.length+'">Kelas</th>\
                                        </tr>\
                                        <tr>' ;
                                        result.data.header.forEach (function(list) {
                                            tabel += '<th width="160px">'+list.nama_kelompok+'</th>';
                                        })

                                        tabel +='\
                                        </tr>\
                                        <tr>' ;
                                        result.data.header.forEach (function(list) {
                                            tabel += '<th width="160px">'+list.nama_ruangan+'</th>';
                                        })

                                        tabel +='\
                                        </tr>\
                                    </thead>';

                                    result.data.bodyy.forEach (function(list) {
                                            tabel += '  <tbody data-hari="Senin">\
                                                            <tr >\
                                                                <th rowspan="8" scope="row">'+list.tanggal+'</th>\
                                                            </tr>';
                                                            var obj = JSON.parse(list.data_unit);
                                                                obj.forEach (function(isi) {
                                                                    tabel += '<tr data-time="'+isi.jam_mulai+'">\
                                                                                    <th scope="row" height="60px">'+isi.unit_pertemuan+'</th>\
                                                                                    <th scope="row" >'+isi.jam_mulai+' - '+isi.jam_selesai+'</th>';
                                                                                    result.data.header.forEach (function(head) {
                                                                                        tabel += '<td id='+list.tanggal+'_'+isi.id_pertemuan+'_'+head.id_kelompok+'>-</td>';
                                                                                    })

                                                                tabel +='</tr>';
                                                                })

                                                                tabel +='\
                                                         </tbody>';
                                    })

                        tabel += '</table>';


                        $('#asd').html(tabel);
                        result.data.content.forEach(function(content) {
                            $('#'+content.tanggal+'_'+content.id_jam_pertemuan+'_'+content.id_kelompok_taruna).html(content.kode_mk);
                        } );
                        // result.forEach (function(list) {

                        //     tbody +='\
                        //             <tbody data-hari="Senin">\
                        //                 <tr data-time="04:40 AM">\
                        //                     <th rowspan="7" scope="row">'+list.tanggal+'</th>\
                        //                     <th scope="row" height="60px"> - </th>\
                        //                     <th scope="row">04.40 - 05.30</th>\
                        //                     <th scope="row"></th>\
                        //                     <th scope="row"></th>\
                        //                     <th scope="row"></th>\
                        //                     <th scope="row"></th>\
                        //                     <th scope="row"></th>\
                        //                     <th scope="row"></th>\
                        //                     <th scope="row"></th>\
                        //                     <th scope="row"></th>\
                        //                 </tr>\
                        //             </tbody>\
                        //             ';
                        // })
                            // console.log(tbody);
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
    });
</script>