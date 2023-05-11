<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

$tgl = tgl_indo(date('Y-m-d'));
?>
<style type="text/css">
    

.slider {
  position: relative;
  height: 100%;
  width: 100%;
  background: #777;
  overflow: hidden;
}
.slider__wrap {
  position: absolute;
  width: 100%;
  height: 100%;
  transform: translateX(100%);
  top: 0%;
  left: 0;
  right: auto;
  overflow: hidden;
  transition: transform 450ms cubic-bezier(0.785, 0.135, 0.15, 0.86);
  transform-origin: 0% 50%;
  transition-delay: 450ms;
  opacity: 0;
}
.slider__wrap--hacked {
  opacity: 1;
}
.slider__back {
  position: absolute;
  width: 100%;
  height: 100%;
  background-size: auto 100%;
  background-position: center;
  background-repeat: none;
  transition: filter 450ms cubic-bezier(0.785, 0.135, 0.15, 0.86);
}
.slider__inner {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0%;
  background-size: auto 133.3333%;
  background-position: center;
  background-repeat: none;
  transform: scale(0.75);
  transition: transform 450ms cubic-bezier(0.785, 0.135, 0.15, 0.86), box-shadow 450ms cubic-bezier(0.785, 0.135, 0.15, 0.86), opacity 450ms step-end;
  opacity: 0;
  box-shadow: 0 3vh 3vh rgba(0, 0, 0, 0);
  padding: 15vh;
  box-sizing: border-box;
}
.slider__content {
  position: relative;
  top: 50%;
  width: auto;
  transform: translateY(-50%);
  color: white;
  font-family: "Heebo", sans-serif;
  opacity: 0;
  transition: opacity 450ms;
}
.slider__content h1 {
  font-weight: 900;
  font-size: 9vh;
  line-height: 0.85;
  margin-bottom: 0.75vh;
  pointer-events: none;
  text-shadow: 0 0.375vh 0.75vh rgba(0, 0, 0, 0.1);
}
.slider__content a {
  cursor: pointer;
  font-size: 2.4vh;
  letter-spacing: 0.3vh;
  font-weight: 100;
  position: relative;
}
.slider__content a:after {
  content: "";
  display: block;
  width: 9vh;
  background: white;
  height: 1px;
  position: absolute;
  top: 50%;
  left: 6vh;
  transform: translateY(-50%);
  transform-origin: 0% 50%;
  transition: transform 900ms cubic-bezier(0.785, 0.135, 0.15, 0.86);
}
.slider__content a:before {
  content: "";
  border-top: 1px solid white;
  border-right: 1px solid white;
  display: block;
  width: 1vh;
  height: 1vh;
  transform: translateX(0) translateY(-50%) rotate(45deg);
  position: absolute;
  font-family: "Heebo", sans-serif;
  font-weight: 100;
  top: 50%;
  left: 15vh;
  transition: transform 900ms cubic-bezier(0.785, 0.135, 0.15, 0.86);
}
.slider__content a:hover:after {
  transform: scaleX(1.5);
  transition: transform 1200ms cubic-bezier(0.785, 0.135, 0.15, 0.86);
}
.slider__content a:hover:before {
  transform: translateX(6vh) translateY(-50%) rotate(45deg);
  transition: transform 1200ms cubic-bezier(0.785, 0.135, 0.15, 0.86);
}
.slider__slide {
  position: absolute;
  left: 0;
  height: 100%;
  width: 100%;
  transition: transform 600ms cubic-bezier(0.785, 0.135, 0.15, 0.86);
  transition-delay: 600ms;
  pointer-events: none;
  z-index: 0;
}
.slider__slide--active {
  transform: translatex(0%);
  z-index: 2;
}
.slider__slide--active .slider__wrap {
  transform: translateX(0);
  transform-origin: 100% 50%;
  opacity: 1;
  -webkit-animation: none;
          animation: none;
}
.slider__slide--active .slider__back {
  filter: blur(1.5vh);
  transition: filter 900ms cubic-bezier(0.785, 0.135, 0.15, 0.86);
  transition-delay: 900ms !important;
}
.slider__slide--active .slider__inner {
  transform: scale(0.8);
  box-shadow: 0 1vh 6vh rgba(0, 0, 0, 0.2);
  pointer-events: auto;
  opacity: 1;
  transition: transform 900ms cubic-bezier(0.785, 0.135, 0.15, 0.86), box-shadow 900ms cubic-bezier(0.785, 0.135, 0.15, 0.86), opacity 1ms step-end;
  transition-delay: 900ms;
}
.slider__slide--active .slider__content {
  opacity: 1;
  transition-delay: 1350ms;
}
.slider__slide:not(.slider__slide--active) .slider__wrap {
  -webkit-animation-name: hack;
          animation-name: hack;
  -webkit-animation-duration: 900ms;
          animation-duration: 900ms;
  -webkit-animation-delay: 450ms;
          animation-delay: 450ms;
  -webkit-animation-timing-function: cubic-bezier(0.785, 0.135, 0.15, 0.86);
          animation-timing-function: cubic-bezier(0.785, 0.135, 0.15, 0.86);
}
@-webkit-keyframes hack {
  0% {
    transform: translateX(0);
    opacity: 1;
  }
  50% {
    transform: translateX(-100%);
    opacity: 1;
  }
  51% {
    transform: translateX(-100%);
    opacity: 0;
  }
  52% {
    transform: translateX(100%);
    opacity: 0;
  }
  100% {
    transform: translateX(100%);
    opacity: 1;
  }
}
@keyframes hack {
  0% {
    transform: translateX(0);
    opacity: 1;
  }
  50% {
    transform: translateX(-100%);
    opacity: 1;
  }
  51% {
    transform: translateX(-100%);
    opacity: 0;
  }
  52% {
    transform: translateX(100%);
    opacity: 0;
  }
  100% {
    transform: translateX(100%);
    opacity: 1;
  }
}
.slider__slide:nth-child(1) .slider__back, .slider__slide:nth-child(1) .slider__inner {
  /*background-image: url(http://devel.nginovasi.id/akpol-api/public/photo/trn/3308141904020002/1652876032_4780a4f7585f96521b45.jpg);*/
}
.slider__slide:nth-child(2) .slider__back, .slider__slide:nth-child(2) .slider__inner {
  /*background-image: url(https://unsplash.it/1600/800/?image=929);*/
}
.slider__slide:nth-child(3) .slider__back, .slider__slide:nth-child(3) .slider__inner {
  /*background-image: url(https://unsplash.it/1600/800/?image=927);*/
}

.sig {
  position: fixed;
  bottom: 8px;
  right: 8px;
  text-decoration: none;
  font-size: 12px;
  font-weight: 100;
  font-family: sans-serif;
  color: rgba(255, 255, 255, 0.4);
  letter-spacing: 2px;
  z-index: 9999;
}
</style>
<div>
    <div class="page-content page-container-fluid" id="page-content">
        <div class="padding">
            <div class="row row-sm sr">
                <div class="col-md-12">
                    <div class="row row-sm">
                        <div class="col-md-12">
                            <div class="row row-sm">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row row-sm">
                                                <div class="col-4">
                                                    <div>DATA TINGKAT</div>
                                                    <div class="mt-2 font-weight-500"><span id="tingkat_taruna" style="font-size: 1.4rem; color: black;">0</span></div>
                                                    <small class="text-muted" id="semester_taruna"></small>
                                                </div>
                                                <div class="col-4">
                                                    <div>JUMLAH PELAJARAN</div>
                                                    <div class="text-highlight mt-2 font-weight-500" id="pelajaran_taruna" style="font-size: 1.4rem; color: black;">0</div>
                                                    <small class="text-muted">Per <?= $tgl ?></small>
                                                </div>
                                                <div class="col-4">
                                                    <div>KEHADIRAN </div>
                                                    <div class="mt-2 font-weight-500" id="kehadiran_taruna" style="font-size: 1.4rem; color: black;">0</div>
                                                    <small class="text-muted">Per <?= $tgl ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div style="width: 100%; height: 350px;">
                                            <div class="slider">
                                              <div class="slider__slide slider__slide--active" data-slide="1">
                                                <div class="slider__wrap">
                                                  <div class="slider__back" style="background-image: url(https://thumb.viva.co.id/media/frontend/thumbs3/2012/08/01/165789_lulusan-taruna-akademi-kepolisian--akpol-_665_374.jpg) "></div>
                                                </div>
                                                <div class="slider__inner" style="background-image: url(https://thumb.viva.co.id/media/frontend/thumbs3/2012/08/01/165789_lulusan-taruna-akademi-kepolisian--akpol-_665_374.jpg) ">
                                                  <div class="slider__content">
                                                    <!-- <h1>Slide <br> One</h1> -->
                                                    <a class="go-to-next">next</a>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="slider__slide" data-slide="2">
                                                <div class="slider__wrap">
                                                  <div class="slider__back" style="background-image: url(https://akpol.ac.id/wp-content/uploads/2022/07/291173768_134686992295187_5173589913365287226_n.jpg) "></div>
                                                </div>
                                                <div class="slider__inner" style="background-image: url(https://akpol.ac.id/wp-content/uploads/2022/07/291173768_134686992295187_5173589913365287226_n.jpg) ">
                                                  <div class="slider__content">
                                                    <!-- <h1>Slide <br> Two</h1> -->
                                                    <a class="go-to-next">next</a>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="slider__slide" data-slide="3">
                                                <div class="slider__wrap">
                                                  <div class="slider__back" style="background-image: url(https://akcdn.detik.net.id/community/media/visual/2014/12/03/bc31f79c-db5f-429a-b799-b5c8385d22e9_169.jpg?w=700&q=90) "></div>
                                                </div>
                                                <div class="slider__inner" style="background-image: url(https://akcdn.detik.net.id/community/media/visual/2014/12/03/bc31f79c-db5f-429a-b799-b5c8385d22e9_169.jpg?w=700&q=90) ">
                                                  <div class="slider__content">
                                                    <!-- <h1>Slide <br> Three</h1> -->
                                                    <a class="go-to-next">next</a>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="slider__indicators"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="p-3-4">
                                            <div class="d-flex">
                                                <div>
                                                    <div style="font-weight: bold;">Tugas Pelajaran </div>
                                                </div>
                                                <span class="flex"></span>
                                                <div>
                                                    <!-- <small class="text-muted">Total: 230</small> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div style="height: 350px; margin-left: 10px; overflow: auto;">
                                            <div id="tugas_pelajaran"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="row row-sm">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body" style="height: 546px;">
                                            <div>
                                                <div style="font-weight: bold;">Pengumuman</div>
                                            </div>
                                            <div class="row row-sm">
                                                <div class="col-12">
                                                    <div id="pengumuman"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="p-3-4" style="">
                                    <div class="d-flex">
                                        <div>
                                            <div style="font-weight: bold;">Jadwal Perkuliahan <small>Jadwal Selama 7 Hari kedepan</small> </div>
                                        </div>
                                        <span class="flex"></span>
                                    </div>
                                </div>
                                <div style="height: 350px; margin-left: 10px; overflow: auto;">
                                    <div id="jadwal"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card pb-3" style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                <div class="p-3-4">
                                    <div class="d-flex">
                                        <div>
                                            <div>Pengumuman</div>
                                            <small class="text-muted" id="pengumuman-tot">Total: 12</small>
                                        </div>
                                        <span class="flex"></span>
                                        <div>
                                            <div class="btn-group-toggle" data-toggle="buttons" id="pengumuman-toggle">
                                                <label class="btn active" id="pengumuman-internal">
                                                    <input type="radio" name="pengumuman-jenis" value="1"> Internal
                                                </label>
                                                <label class="btn" id="pengumuman-umum">
                                                    <input type="radio" name="pengumuman-jenis" value="2"> Umum
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list list-row" id="pengumuman-list" style="height: 300px; overflow-y: auto;">

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card pb-3" style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">
                                <div class="p-3-4">
                                    <div class="d-flex">
                                        <div>
                                            <div class="btn-group-toggle" data-toggle="buttons" id="pelanggaran-toggle">
                                                <label class="btn active" id="pelanggaran-internal">
                                                    <input type="radio" name="pelanggaran-jenis" value="1"> Pelanggaran
                                                </label>
                                                <!-- <label class="btn" id="pelanggaran-umum">
                                                    <input type="radio" name="pelanggaran-jenis" value="2"> Pujian
                                                </label> -->
                                            </div>
                                        </div>
                                        <span class="flex"></span>
                                        <!-- <div>
                                            <div>Pengumuman</div>
                                            <small class="text-muted" id="pelanggaran-tot">Total: 12</small>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="list list-row" id="pelanggaran-list" style="height: 300px; overflow-y: auto;">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="p-3-4">
                                    <div class="d-flex">
                                        <div>
                                            <div>Kalender Akademik</div>
                                        </div>
                                        <span class="flex"></span>
                                    </div>
                                </div>
                                <div style="height: 300px; overflow-y: auto;">
        	                        <div id="_kalender_akademik"></div>
        						</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="modal-detail" class="modal fade" data-backdrop="true">
        <div class="modal-dialog modal-lg animate">
            <div class="modal-content ">
                <div class="modal-header ">
                    <div class="modal-title text-md">Detail</div>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="px-sm-4 my-3 my-sm-0 flex">
                        <h2 class="text-md mb-5" id="modal-title">Jacqueline Reid</h2>
                        <small class="d-block text-fade" id="modal-desc">Senior Industrial Designer</small>
                        <div class="row px-3">
                            <div class="tl-date text-muted mt-4" id="modal-by">1 day ago</div>
                            <div class="flex"></div>
                            <div class="tl-date text-muted mt-4" id="modal-at">1 day ago</div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="modal-detailakademik" class="modal fade" data-backdrop="true">
        <div class="modal-dialog modal-lg animate">
            <div class="modal-content ">
                <div class="modal-header ">
                    <div class="modal-title text-md">Info</div>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                	<iframe src='' id="kalenderakademik" width='100%' height='565px' frameborder='0'> </iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script type="text/javascript">
    const url_insert = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_save" ?>';
    const url_edit = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_edit" ?>';
    const url_delete = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_delete" ?>';
    const url_load = '<?= base_url() . "/" . uri_segment(0) . "/action/datataruna_load" ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';

    var tugas_pelajaran = '';
    var jadwal = '';
    var pengumuman = '';
    var pengumumanInternal;
    var pengumumanUmum;
    var _kalenderakademik = '';


    var pelanggaran;

    $(document).ready(function() {

        data_dashboard();

        $(document).on("click", ".button_modal", function(e) {
            $('#modal-detailakademik').modal('show');
            console.log($(this).data('content'));
            $('#kalenderakademik').attr('src', $(this).data('content'));
        })
    // });

    // $(document).ready(function(){
          for (var i=1; i <= $('.slider__slide').length; i++){
            $('.slider__indicators').append('<div class="slider__indicator" data-slide="'+i+'"></div>')
          }
          setTimeout(function(){
            $('.slider__wrap').addClass('slider__wrap--hacked');
          }, 100);
          setInterval(function(){
                var currentSlide = Number($('.slider__slide--active').data('slide'));
                  var totalSlides = $('.slider__slide').length;
                  currentSlide++
                  if (currentSlide > totalSlides){
                    currentSlide = 1;
                  }
                  goToSlide(currentSlide);
          }, 6000);
    })

    function goToSlide(number){
      $('.slider__slide').removeClass('slider__slide--active');
      $('.slider__slide[data-slide='+number+']').addClass('slider__slide--active');
    }

    $('.slider__next, .go-to-next').on('click', function(){
      var currentSlide = Number($('.slider__slide--active').data('slide'));
      var totalSlides = $('.slider__slide').length;
      currentSlide++
      if (currentSlide > totalSlides){
        currentSlide = 1;
      }
      goToSlide(currentSlide);
    })

    function data_dashboard() {

        $.ajax({
            url: url_load,
            type: 'post',
            data: {
                "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
            },
            dataType: 'json',
            success: function(result) {
                if (result.success) {

                    tugas_pelajaran += '<table id="table" class="table table-theme v-middle">\
					                                <thead>\
					                                    <tr style="background-color : #F9FAFB;">\
					                                        <th data-sortable="true" style="color: #83898f;">Mata Pelajaran</th>\
					                                        <th data-sortable="true" style="color: #83898f;">Jadwal Mengumpulkan</th>\
					                                        <th data-sortable="true" style="color: #83898f;">Jenis</th>\
                                                            <th data-sortable="true" style="color: #83898f;">Status</th>\
					                                    </tr>\
					                                </thead>\
				                                <tbody>';
                    result.data.tugastaruna.forEach(function(list) {
                        var pengumpulan = '';
                        var status = '';
                        if (list.pengumpulan === "Kumpulkan Online") {
                            pengumpulan = '<span class="badge badge-info text-uppercase">' + list.pengumpulan + '</span>';
                            if (list.file_tugas) {
                                status = '<span class="badge badge-success text-uppercase">Sudah mengumpulkan</span>';
                            } else {
                                status = '<span class="badge badge-danger text-uppercase">Belum mengumpulkan</span>';
                            }
                        } else {
                            pengumpulan = '<span class="badge badge-secondary text-uppercase">' + list.pengumpulan + '</span>'
                            status = '<span class="badge badge-secondary text-uppercase">dikumpulkan langsung</span>';
                        }

                        tugas_pelajaran += '<tr class=" " data-id="20">\
				                                        <td style="min-width:30px;">\
					                                    	<div class="item-except text-muted text-sm h-1x">\
				                                                ' + list.mata_pelajaran + ' \
				                                            </div>\
                                                            <div class="item-except text-muted text-sm h-1x">\
                                                            <a href="<?= base_url() . '/akademikkhs/tugastaruna' ?>" class="item-author text-color ">\
                                                                ' + list.judul + ' \
                                                            </a>\
                                                            </div>\
				                                        </td>\
				                                        <td>\
				                                        	<div class="item-except text-muted text-sm h-1x">\
				                                                ' + list.waktu_pengumpulan + ' \
				                                            </div>\
                                                            <div class="item-except text-muted text-sm h-1x">\
                                                                ' + list.jam_pengumpulan + ' \
                                                            </div>\
				                                        </td>\
				                                        <td class="flex">' + pengumpulan + '</td>\
                                                        <td class="flex">' + status + '</td>\
				                                    </tr>';
                    });

                    tugas_pelajaran += '</tbody></table>';

                    jadwal += '<table id="table" class="table table-theme v-middle">\
			                                <thead>\
			                                    <tr style="background-color : #F9FAFB;">\
			                                        <th data-sortable="true" style="color: #83898f;">Mata Pelajaran</th>\
			                                        <th data-sortable="true" style="color: #83898f;">Tanggal</th>\
			                                        <th data-sortable="true" style="color: #83898f;">Jam</th>\
			                                        <th data-sortable="true" style="color: #83898f;">Ruang Kelas</th>\
			                                        <th data-sortable="true" style="color: #83898f;">Pendidik</th>\
			                                    </tr>\
			                                </thead>\
		                                <tbody>';
                    result.data.jadwal.forEach(function(list) {
                        jadwal += '<tr class=" " data-id="20">\
		                                        <td style="min-width:30px;">\
			                                    	<div class="item-except text-muted text-sm h-1x">\
		                                                ' + list.mata_pelajaran + ' \
		                                            </div>\
		                                        </td>\
		                                        <td style="min-width:30px;">\
			                                    	<div class="item-except text-muted text-sm h-1x">\
		                                                ' + list.tanggal + ' \
		                                            </div>\
		                                        </td>\
		                                        <td style="min-width:30px;">\
			                                    	<div class="item-except text-muted text-sm h-1x">\
		                                                ' + list.jam_mulai + ' s/d ' + list.jam_selesai + ' \
		                                            </div>\
		                                        </td>\
		                                        <td>\
		                                        	<div class="item-except text-muted text-sm h-1x">\
		                                                ' + list.nama_ruang_kelas + ' \
		                                            </div>\
		                                        </td>\
		                                        <td class="flex">\
		                                        	<div class="item-except text-muted text-sm h-1x">\
		                                                ' + list.nama_pendidik + ' \
		                                            </div>\
		                                        </td>\
		                                    </tr>';
                    });

                    jadwal += '</tbody></table>';



                    // pengumuman += '<div class="list list-row" style="overflow: auto; height: 485px;">';
                    // result.data.pengumuman.forEach(function(list) {
                    //     pengumuman += '<div class="list-item " style="visibility: visible;" >\
                    //                                     <div class="flex"> \
                    //                                         <h4 href="#" class="item-title text-color h-1x " style="font-size: 0.9rem">' + list.judul + ' </h4>\
                    //                                         <div class="item-except text-muted text-sm h-1x">\
                    //                                             ' + list.deskripsi + ' \
                    //                                         </div>\
                    //                                     </div>\
                    //                                 </div>';
                    // });
                    // pengumuman += '</div>';

                    pengumumanInternal = _.filter(result.data.pengumuman, function(o) {
                        return o.jenis === 'internal';
                    });
                    pengumumanUmum = _.filter(result.data.pengumuman, function(o) {
                        return o.jenis === 'umum';
                    });

                    pelanggaran = result.data.pelanggaran;

                    populatePengumuman(pengumumanInternal);
                    
                    pelanggaranAndPujian(pelanggaran);

                    _kalenderakademik += '\
		                    	<table class="table table-theme v-middle m-0">\
		                            <tbody>';
		                            var no = 0;
		                            result.data.kalenderakademik.forEach (function(list) {
		                            	no++;
		                            	_kalenderakademik += '\
		                    			<tr class=" " >\
		                                    <td style="min-width:30px;text-align:center">\
		                                        '+no+'\
		                                    </td>\
		                                    <td class="flex">\
		                                        <a class="item-company ajax h-1x button_modal" data-id="'+list.id+'" data-content="'+list.file_kalender_akademik+'"  style="color:#34383b;">\
		                                            	'+list.nama+' \
		                                        </a>\
		                                    </td>\
		                                    <td class="flex">\
		                                        <span class="item-company ajax h-1x">\
		                                            	'+list.tahun_ajaran+' \
		                                        </span>\
		                                        <div class="item-mail text-muted h-1x d-none d-sm-block">\
		                                            '+list.created_at+'\
		                                        </div>\
		                                    </td>\
		                                </tr>';
                                                  })

		                            _kalenderakademik += '\
		                            </tbody>\
		                        </table>';
                                $('#_kalender_akademik').html(_kalenderakademik);
                    
                    $('#pengumuman').html(pengumuman);
                    $('#tugas_pelajaran').html(tugas_pelajaran);
                    $('#jadwal').html(jadwal);

                    $('#tingkat_taruna').html(result.data.tingkat);
                    $('#semester_taruna').html(result.data.semester);
                    $('#pelajaran_taruna').html(result.data.jmlmatkul);
                    $('#kehadiran_taruna').html(result.data.absen + ' %');




                } else {
                    Swal.fire('Error', result.message, 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
            }
        });

        $(document).on("click", "#pengumuman-toggle", function() {
            if ($('#pengumuman-internal').hasClass('active')) {
                populatePengumuman(pengumumanInternal);
            } else {
                populatePengumuman(pengumumanUmum);
            }
        }).on("click", ".pengumuman-data", function(e) {
            $('#modal-title').html($(this).data('title'));
            $('#modal-desc').html($(this).data('desc'));
            $('#modal-by').html($(this).data('by'));
            $('#modal-at').html($(this).data('at'));
            $('#modal-detail').modal('show');
        }).on("click", "#pelanggaran-toggle", function() {
            if ($('#pelanggaran-internal').hasClass('active')) {
                pelanggaranAndPujian(pelanggaran);
            } else {
                pelanggaranAndPujian(pelanggaran);
            }
        })

        function populatePengumuman(pengumuman) {
            var elm = '';
            var no = 0;
            pengumuman.forEach(function(list, index) {
                no++;
                elm += '\
                        <div class="list-item " data-id="8" style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">\
                                <div>\
                                    <span class="badge bg-secondary-lt">' + no + '</span>\
                                </div>\
                                <div class="flex">\
                                    <a class="item-author text-color pengumuman-data" data-title="' + list.judul + '" \
                                    data-desc="' + list.deskripsi + '" data-by="' + list.name + '" data-at="' + list.created_at + '"\
                                    >' + list.judul + '</a>\
                                    <div class="item-except text-muted text-sm h-1x">\
                                       ' + list.deskripsi + '\
                                    </div>\
                                </div>  \
                                <div class="tl-date text-muted mt-1" style="min-width: 200px">Oleh ' + list.name + '<br> pada ' + list.date_short + '</div>\
                            </div>    ';
            })
            $('#pengumuman-list').html(elm);
            $('#pengumuman-tot').html('Total : ' + pengumuman.length)
        }

        function pelanggaranAndPujian(pelanggaran) {
            var elm = '';
            var no = 0;
            pelanggaran.forEach(function(list, index) {
                console.log(list)
                no++;
                elm += '\
                        <div class="list-item " data-id="8" style="visibility: visible; transform: none; opacity: 1; transition: none 0s ease 0s;">\
                                <div>\
                                    <span class="badge bg-secondary-lt">' + no + '</span>\
                                </div>\
                                <div class="flex">\
                                    <div class="item-author text-color data-title="' + list.dasar_hukum + '" \
                                    data-desc="' + list.dasar_hukum + '" data-by="' + list.name + '" data-at="' + list.tgl + '"\
                                    >' + list.dasar_hukum + '</div>\
                                    <div class="item-except text-muted text-sm h-1x">\
                                       ' + list.deskripsi + '\
                                    </div>\
                                </div>  \
                                <div class="tl-date text-muted mt-1" style="min-width: 200px">Poin ' + list.poin + '<br> pada ' + list.tgl + '</div>\
                            </div>    ';
            })
            $('#pelanggaran-list').html(elm);
            $('#pelanggaran-tot').html('Total : ' + pelanggaran.length)
        }

    }
</script>