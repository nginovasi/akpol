<style>
    .custom-file-label {
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        display: inline-block;
        padding-right: 20%;
    }
</style>
<div>
    <div class="page-hero page-container " id="page-hero">
        <div class="padding d-flex">
            <div class="page-title">
                <h2 class="text-md text-highlight">
                    <?= $page_title ?>
                </h2>
            </div>
            <div class="flex"></div>
        </div>
    </div>
    <div class="page-content page-container" id="page-content">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills card-header-pills no-border" id="tab">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-data" role="tab"
                            aria-controls="tab-data" aria-selected="false">Data</a>
                    </li>
                    <?php if ($rules->i == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-form" role="tab" aria-controls="tab-form"
                                aria-selected="false">Form</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="card-body">
                <div class="padding">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-data" role="tabpanel" aria-labelledby="tab-data">
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-6">
                                        <label for="id_batalyon">Status Pendidik</label>
                                        <ul class="list-unstyled text-sm mt-1 text-muted"></ul>
                                        <select class="form-control sel2" id="status_pendidik" name="is_internal"
                                            required>
                                            <option value="">Semua</option>
                                            <option value="1">Internal</option>
                                            <option value="0">Eksternal</option>
                                            <option value="2">PNS</option>
                                        </select>
                                    </div>
                                    <!-- <div class="col-6">
                                        <label for="id_mata_pelajaran">Kelas</label>
                                        <select class="form-control sel2" id="id_mata_pelajaran" name="id_mata_pelajaran" required>
                                        </select>
                                    </div> -->
                                </div>
                            </div>
                            <div>
                                <a id="d-excel" class="btn mb-1 btn-outline-dark">Download Excel</a>
                                <a id="d-pdf" class="btn mb-1 btn-outline-dark">Download PDF</a>
                            </div>
                            <div>
                                <h4 align="center" style="font-size: 1rem" id="_status"></h4>
                            </div>
                            <div class="table-responsive">
                                <table id="datatable" class="table table-theme table-row v-middle">
                                    <thead>
                                        <tr>
                                            <th><span>#</span></th>
                                            <th><span>NRP</span></th>
                                            <!-- <th><span>NIK</span></th> -->
                                            <th><span>NAMA PENDIDIK</span></th>
                                            <th><span>STATUS</span></th>
                                            <th class="column-2action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-form" role="tabpanel" aria-labelledby="tab-form">
                            <form data-plugin="parsley" data-option="{}" id="form" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" id="id" name="id" value="" required>
                                <?= csrf_field(); ?>
                                <input type="hidden" class="form-control" id="id_m_user" name="id_m_user" value=""
                                    required>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>NIK</label>
                                            <input type="tel" class="form-control" id="nik" name="nik" minlength="16"
                                                maxlength="16" required placeholder="Nomor Induk Kependudukan">
                                        </div>
                                        <div class="col-6">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" id="namagadik" name="namagadik"
                                                style="text-transform: uppercase" required placeholder="Nama Lengkap">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Pangkat</label>
                                            <input type="text" class="form-control" id="pangkat" name="pangkat"
                                                placeholder="Pangkat" required>
                                        </div>
                                        <div class="col-6">
                                            <label>Jabatan</label>
                                            <input type="text" class="form-control" id="jab" name="jab"
                                                placeholder="Jabatan" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Satuan Kerja</label>
                                            <select class="form-control sel2" id="id_satker" name="id_satker" required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>NRP</label>
                                            <input type="text" class="form-control" id="nrp" name="nrp"
                                                placeholder="Nomor NRP" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>No Telephone</label>
                                            <input type="tel" class="form-control" id="telp" name="telp"
                                                placeholder="No Telephone" required>
                                        </div>
                                        <div class="col-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control sel2" id="id_gender" name="id_gender" required>
                                                <option>Pilih Jenis Kelamin</option>
                                                <option value="1">Laki-laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="deskripsi">File Foto</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file_foto"
                                                    name="file_foto" accept=".gif,.jpg,.jpeg,.png">
                                                <label class="custom-file-label" for="file_foto">Pilih file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Tempat Lahir</label>
                                            <select class="form-control  sel2" id="id_kabkota_lhr" name="id_kabkota_lhr"
                                                required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tglhr" name="tglhr"
                                                placeholder="Tanggal Lahir" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Suku</label>
                                            <select class="form-control sel2" id="id_suku" name="id_suku" required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>Agama</label>
                                            <select class="form-control sel2" id="id_agama" name="id_agama" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label>Alamat</label>
                                            <textarea class="form-control" id="alamat_ktp" name="alamat_ktp"
                                                placeholder="Alamat Lengkap"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Provinsi</label>
                                            <select class="form-control sel2" id="id_prov_ktp" name="id_prov_ktp"
                                                required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>Kabupaten / Kota</label>
                                            <select class="form-control sel2" id="id_kota_kab_ktp"
                                                name="id_kota_kab_ktp" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Kecamatan</label>
                                            <select class="form-control sel2" id="id_kec_ktp" name="id_kec_ktp"
                                                required>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label>Kelurahan</label>
                                            <select class="form-control sel2" id="id_kel_ktp" name="id_kel_ktp"
                                                required>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <!--                                                              <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>No Skep Pat Akpol</label>
                                            <input type="text" class="form-control" id="no_skep_pat_akpol" name="no_skep_pat_akpol" placeholder="no_skep_pat_akpol">
                                        </div>
                                        <div class="col-6">
                                            <label>Tmp Pat Akpol</label>
                                            <input type="text" class="form-control" id="tmt_pat_akpol" name="tmt_pat_akpol" placeholder="tmt_pat_akpol">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Universitas Pendidikan S1</label>
                                            <input type="text" class="form-control" id="univ_dikum_s1" name="univ_dikum_s1" placeholder="Universitas Pendidikan S1">
                                        </div>
                                        <div class="col-6">
                                            <label>Jurusan Pendidikan s1</label>
                                            <input type="text" class="form-control" id="jurusan_dikum_s1" name="jurusan_dikum_s1" placeholder="Jurusan Pendidikan s1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Universitas Pendidikan S2</label>
                                            <input type="text" class="form-control" id="univ_dikum_s2" name="univ_dikum_s2" placeholder="Universitas Pendidikan S2">
                                        </div>
                                        <div class="col-6">
                                            <label>Jurusan Pendidikan s2</label>
                                            <input type="text" class="form-control" id="jurusan_dikum_s2" name="jurusan_dikum_s2" placeholder="Jurusan Pendidikan s2">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Universitas Pendidikan s3</label>
                                            <input type="text" class="form-control" id="univ_dikum_s3" name="univ_dikum_s3" placeholder="Universitas Pendidikan s3">
                                        </div>
                                        <div class="col-6">
                                            <label>Jurusan Pendidikan s3</label>
                                            <input type="text" class="form-control" id="jurusan_dikum_s3" name="jurusan_dikum_s3" placeholder="Jurusan Pendidikan s3">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Lat 1</label>
                                            <input type="text" class="form-control" id="lat_1" name="lat_1" placeholder="lat_1">
                                        </div>
                                        <div class="col-6">
                                            <label>lat_2</label>
                                            <input type="text" class="form-control" id="lat_2" name="lat_2" placeholder="lat_2">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>lat_3</label>
                                            <input type="text" class="form-control" id="lat_3" name="lat_3" placeholder="lat_3">
                                        </div>
                                        <div class="col-6">
                                            <label>lat_4</label>
                                            <input type="text" class="form-control" id="lat_4" name="lat_4" placeholder="lat_4">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>lat_5</label>
                                            <input type="text" class="form-control" id="lat_5" name="lat_5" placeholder="lat_5">
                                        </div>
                                        <div class="col-6">
                                            <label>mp_1</label>
                                            <input type="text" class="form-control" id="mp_1" name="mp_1" placeholder="mp_1">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>mp_2</label>
                                            <input type="text" class="form-control" id="mp_2" name="mp_2" placeholder="mp_2">
                                        </div>
                                        <div class="col-6">
                                            <label>mp_3</label>
                                            <input type="text" class="form-control" id="mp_3" name="mp_3" placeholder="mp_3">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>mp_4</label>
                                            <input type="text" class="form-control" id="mp_4" name="mp_4" placeholder="mp_4">
                                        </div>
                                        <div class="col-6">
                                            <label>mp_5</label>
                                            <input type="text" class="form-control" id="mp_5" name="mp_5" placeholder="mp_5">
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Tingkat (Khusus Pengasuh)</label>
                                            <input type="text" class="form-control" id="tingkat" name="tingkat" placeholder="Khusus Pengasuh">
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Gadik</label>
                                                <div class="col-sm-8">
                                                    <div class="mt-2 mb-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_gadik" id="is_gadik0" value="0">
                                                            <label class="form-check-label" for="is_gadik0">Tidak</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_gadik" id="is_gadik1" value="1">
                                                            <label class="form-check-label" for="is_gadik1">Ya</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!--                                 <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Pengasuh</label>
                                                <div class="col-sm-8">
                                                    <div class="mt-2 mb-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_pengasuh" id="is_pengasuh0" value="0">
                                                            <label class="form-check-label" for="is_pengasuh0">Tidak</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_pengasuh" id="is_pengasuh1" value="1">
                                                            <label class="form-check-label" for="is_pengasuh1">Ya</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Instruktur</label>
                                                <div class="col-sm-8">
                                                    <div class="mt-2 mb-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_instruktur" id="is_instruktur0" value="0">
                                                            <label class="form-check-label" for="is_instruktur0">Tidak</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="is_instruktur" id="is_instruktur1" value="1">
                                                            <label class="form-check-label" for="is_instruktur1">Ya</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Status Pendidik</label>
                                            <select class="form-control  sel2" id="is_internal" name="is_internal"
                                                required>
                                                <option>Pilih Status Pendidik</option>
                                                <option value="0">External</option>
                                                <option value="1">Internal</option>
                                                <option value="2">PNS</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modalverifikasitaruna" class="modal fade" data-backdrop="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <form id="verifikasitaruna">
                    <div class="modal-header ">
                        <div class="modal-title text-md">Detail Pendidik</div>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="p-4">
                            <?= csrf_field(); ?>
                            <div class="d-sm-flex no-shrink mb-4">
                                <div>
                                    <a href="#" class="avatar w-96" data-pjax-state="" id="photopath_anchor">
                                        <img class="w-96" id="photopath_modal" src="../assets/img/a1.jpg" alt="."
                                            style="object-fit:cover;">
                                    </a>
                                </div>
                                <div class="px-sm-4 my-3 my-sm-0 flex">
                                    <h2 class="text-md" id="namagadik_modal">Jacqueline Reid</h2>
                                    <h5 class="text-md" id="pangkat_modal">Jacqueline Reid</h5>
                                    <small class="d-block text-fade" id="nik_modal">Senior Industrial Designer</small>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <small class="text-muted">Jenis Kelamin</small>
                                    <div class="my-2" id="nama_gender_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Jabatan</small>
                                    <div class="my-2" id="jab_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Satuan Kerja</small>
                                    <div class="my-2" id="nama_satker_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">NRP</small>
                                    <div class="my-2" id="nrp_modal"></div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <small class="text-muted">Status Kepengasuhan</small>
                                    <div class="my-2" id="status_pengasuh_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Status Pendidik</small>
                                    <div class="my-2" id="status_pendidik_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Status Instruktur</small>
                                    <div class="my-2" id="status_instruktur_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Tempat, Tanggal Lahir</small>
                                    <div class="my-2" id="tglhr_modal"></div>
                                </div>

                            </div>
                            <div class="row mb-2">
                                <div class="col-3">
                                    <small class="text-muted">Kontak</small>
                                    <div class="my-2" id="telp_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Email</small>
                                    <div class="my-2" id="email_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Agama</small>
                                    <div class="my-2" id="nama_agama_modal"></div>
                                </div>
                                <div class="col-3">
                                    <small class="text-muted">Tingkat Pengasuh</small>
                                    <div class="my-2" id="tingkat_modal"></div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-6">
                                    <small class="text-muted">Alamat</small>
                                    <div class="my-2" id="alamat_modal"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
</div>
<script type="text/javascript">
    const auth_insert = '<?= $rules->i ?>';
    const auth_edit = '<?= $rules->e ?>';
    const auth_delete = '<?= $rules->d ?>';
    const auth_otorisasi = '<?= $rules->o ?>';

    const url_insert = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_save" ?>';
    const url_edit = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_edit" ?>';
    const url_delete = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_delete" ?>';
    const url_aktiv = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_aktiv" ?>';
    const url_load = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "_load" ?>';
    const urldetail_load = '<?= base_url() . "/" . uri_segment(0) . "/action/" . uri_segment(1) . "detail_load" ?>';
    const url_ajax = '<?= base_url() . "/" . uri_segment(0) . "/ajax" ?>';
    const url_pdf = '<?= base_url() . "/" . uri_segment(0) . "/action/pdf/" . uri_segment(1) . "" ?>';
    const url_excel = '<?= base_url() . "/" . uri_segment(0) . "/action/excel/" . uri_segment(1) . "" ?>';

    var dataStart = 0;
    var table;

    const select2Array = [{
        id: 'id_satker',
        url: '/satker_select_get',
        placeholder: 'Cari Satuan Kerja',
        params: null
    },
    {
        id: 'id_kabkota_lhr',
        url: '/birthday_place_select_get',
        placeholder: 'Cari Tempat Lahir',
        params: null
    }, {
        id: 'id_agama',
        url: '/agama_select_get',
        placeholder: 'Pilih Agama',
        params: null
    },
    {
        id: 'id_suku',
        url: '/suku_select_get',
        placeholder: 'Pilih Suku',
        params: null
    },
    {
        id: 'id_prov_ktp',
        url: '/prov_select_get',
        placeholder: 'Pilih Provinsi',
        params: null
    },
    {
        id: 'id_kota_kab_ktp',
        url: '/kab_select_get',
        placeholder: 'Pilih Koba / Kabupaten',
        params: {
            id_prov: function () {
                return $('#id_prov_ktp').val()
            }
        }
    },
    {
        id: 'id_kec_ktp',
        url: '/kec_select_get',
        placeholder: 'Pilih Kecamatan',
        params: {
            id_kab: function () {
                return $('#id_kota_kab_ktp').val()
            }
        }
    },
    {
        id: 'id_kel_ktp',
        url: '/kel_select_get',
        placeholder: 'Pilih Kelurahan',
        params: {
            id_kec: function () {
                return $('#id_kec_ktp').val()
            }
        }
    }
    ]

    $(document).ready(function () {

        // $('#datatable')

        $(document).on('submit', '#form', function (e) {
            e.preventDefault();
            let $this = $(this);

            Swal.fire({
                title: "Simpan data ?",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Simpan",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    Swal.fire({
                        title: "",
                        icon: "info",
                        text: "Proses menyimpan data, mohon ditunggu...",
                        didOpen: function () {
                            Swal.showLoading()
                        }
                    });
                    var formData = new FormData(document.getElementById("form"));
                    $.ajax({
                        url: url_insert,
                        type: 'post',
                        data: formData,
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (result) {
                            Swal.close();
                            if (result.success) {
                            $('#form').trigger("reset");
                            coreEvents.table.ajax.reload();
                            coreEvents.table.page( 'first' ).draw( 'page' );

                            $(".sel2").val('').trigger('change');
                            Swal.fire('Sukses', 'Berhasil menyimpan data pendidik', 'success');
                           

                        } else {

                                if (result.message.search("Duplicate") == '-1') {
                                    Swal.fire('Error', result.message, 'error');
                                } else {
                                    Swal.fire('Info', 'Data Sudah ada, Hubungi admin SIAK', 'info');
                                }

                            }
                        },
                        error: function () {
                            Swal.close();
                            Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                        }
                    });
                }
            });
        }).on('reset', '#form', function () {
            $('#id').val('');
            $('.custom-file-label').html('Pilih File');
            $(".sel2").val(null).trigger('change');
        }).on('change', '.custom-file-input', function () {
            let $this = $(this)[0];
            $('.custom-file-label').html($this.files[0].name);
            if ($this.files[0].size > 3138576) {
                Swal.fire('Error', 'File teralu besar, maksimal besar file adalah 3mb', 'error');
                $this.value = "";
                $('.custom-file-label').html('Pilih File');
            };
        }).on('change', '#status_pendidik', function () {
            tampilData($('#status_pendidik').val());
        })

        $(document).on('click', '.edit', function () {
            let $this = $(this);

            Swal.fire({
                title: "",
                icon: "info",
                text: "Proses mengambil data, mohon ditunggu...",
                didOpen: function () {
                    Swal.showLoading()
                }
            });

            $.ajax({
                url: url_edit,
                type: 'post',
                data: {
                    id: $this.data('id'),
                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                },
                dataType: 'json',
                success: function (result) {
                    Swal.close();
                    if (result.success) {
                       // console.log(result.data);
                        for (key in result.data) {
                            $('#' + key).val(result.data[key]);
                            if (key === 'is_gadik' || key === 'is_instruktur' || key === 'is_pengasuh') {
                                if (result.data[key] === '1') {
                                    $("#" + key + "1").prop("checked", true);
                                } else {
                                    $("#" + key + "0").prop("checked", true);
                                }
                            }
                        }
                        setTimeout(function () {
                            $('#id_gender').select2('trigger', 'select', {
                                data: {
                                    id: result.data.id_gender
                                }
                            });
                            $('#is_internal').select2('trigger', 'select', {
                                data: {
                                    id: result.data.is_internal
                                }
                            });
                            select2Array.forEach(function (x) {
                                $('#' + x.id).select2('trigger', 'select', {
                                    data: {
                                        id: result.data[x.id],
                                        text: result.data[x.id.replace('id', 'nama')]
                                    }
                                });
                            });
                            $('.custom-file-label').html(result.data.photopath);
                            $('ul#tab li a').eq(1).trigger('click');
                        }, 500);
                    } else {
                        Swal.fire('Error', result.message, 'error');
                    }
                },
                error: function () {
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });
        }).on('click', '.delete', function () {
            let $this = $(this);

            Swal.fire({
                title: "Non Aktivkan pendidik ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya",
                confirmButtonColor: '#d33',
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: url_delete,
                        type: 'post',
                        data: {
                            id: $this.data('id'),
                            "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                        },
                        dataType: 'json',
                        success: function (result) {
                            Swal.close();
                            if (result.success) {
                                Swal.fire('Sukses', 'Berhasil meng non aktivkan data pendidik', 'success');
                                // table.ajax.reload();
                                coreEvents.table.ajax.reload();
                                coreEvents.table.page('first').draw('page');
                            } else {
                                Swal.fire('Error', result.message, 'error');
                            }
                        },
                        error: function () {
                            Swal.close();
                            Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                        }
                    });
                }
            })
        }).on('click', '.is_deleted', function () {
            let $this = $(this);

            // console.log($this.val());
            // console.log($this.data('id'));
            if ($this.val() == 0) {
                Swal.fire({
                    title: "Non Aktivkan pendidik ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya",
                    confirmButtonColor: '#d33',
                    cancelButtonText: "Batal",
                    reverseButtons: true
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url: url_delete,
                            type: 'post',
                            data: {
                                id: $this.data('id'),
                                "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                            },
                            dataType: 'json',
                            success: function (result) {
                                Swal.close();
                                if (result.success) {
                                    Swal.fire('Sukses', 'Berhasil meng non aktivkan data pendidik', 'success');
                                    // table.ajax.reload();
                                    coreEvents.table.ajax.reload();
                                    coreEvents.table.page('first').draw('page');
                                } else {
                                    Swal.fire('Error', result.message, 'error');
                                }
                            },
                            error: function () {
                                Swal.close();
                                Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                            }
                        });
                    }
                })
            } else {

                Swal.fire({
                    title: "Aktivkan pendidik ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya",
                    confirmButtonColor: '#d33',
                    cancelButtonText: "Batal",
                    reverseButtons: true
                }).then(function (result) {
                    if (result.value) {
                        $.ajax({
                            url: url_aktiv,
                            type: 'post',
                            data: {
                                id: $this.data('id'),
                                is_deleted: 0,
                                "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                            },
                            dataType: 'json',
                            success: function (result) {
                                Swal.close();
                                if (result.success) {
                                    Swal.fire('Sukses', 'Berhasil mengaktivkan data pendidik', 'success');
                                    // table.ajax.reload();
                                    coreEvents.table.ajax.reload();
                                    coreEvents.table.page('first').draw('page');
                                } else {
                                    Swal.fire('Error', result.message, 'error');
                                }
                            },
                            error: function () {
                                Swal.close();
                                Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                            }
                        });
                    }
                })
            }

        }).on('click', '.detail', function () {
            let $this = $(this);
            $('#id_modal').val($(this).data('id'));
            $('#modalverifikasitaruna').modal('show');
            Swal.fire({
                title: "",
                icon: "info",
                text: "Proses mengambil data, mohon ditunggu...",
                didOpen: function () {
                    Swal.showLoading()
                }
            });

            $.ajax({
                url: urldetail_load,
                type: 'post',
                data: {
                    id: $this.data('id'),
                    "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                },
                dataType: 'json',
                success: function (result) {
                    Swal.close();
                    if (result.success) {
                        var image_url;
                        if (result.data.photopath) {
                            image_url = result.data.photopath.includes('./public/photo') ? result.data.photopath.replace('./', 'http://devel.nginovasi.id/akpol-api/') : result.data.photopath;
                            $("#photopath_anchor").html('<img class="w-96" id="photopath_modal" src="' + image_url + '" alt="." style="object-fit:cover;">')
                        } else {
                            $("#photopath_anchor").html('<span class="w-96 avatar gd-warning" style="width: 96px; height: 96px">\
                                            <span class="avatar-status on b-white avatar-right" style="width: 14px; height: 14px"></span>\
                                            <h2 class="alert-heading">' + result.data.namagadik.charAt(0) + '</h2>\
                                        </span>')
                        }

                        for (key in result.data) {
                            $('#' + key + '_modal').html(result.data[key]);
                        }
                        $('#pangkat_modal').html('Pangkat : ' + (
                            result.data.pangkat ? result.data.pangkat : '-'
                        ))
                        $('#nrp_modal').html((
                            result.data.nrp ? result.data.nrp : '-'
                        ))
                        $('#jab_modal').html((
                            result.data.jab ? result.data.jab : '-'
                        ))
                        $('#nik_modal').html('NIK : ' + result.data.nik);
                        $('tglhr_modal').html(result.data.nama_kabkota_lhr)
                        $('#alamat_modal').html(result.data.alamat_ktp + ', ' + result.data.nama_kel_ktp + ', ' + result.data.nama_kec_ktp + ', ' + result.data.nama_kota_kab_ktp + ', ' + result.data.nama_prov_ktp)
                        result.data.tingkat === "" ? $('#tingkat_modal').html('-') : $('#tingkat_modal').html(result.data.tingkat);
                        if (result.data.is_gadik === '1') {
                            $('#status_pendidik_modal').html('Pendidik');
                        } else {
                            $('#status_pendidik_modal').html('Bukan Pendidik');
                        }
                        if (result.data.is_instruktur === '1') {
                            $('#status_instruktur_modal').html('Instruktur');
                        } else {
                            $('#status_instruktur_modal').html('Bukan Instruktur');
                        }
                        if (result.data.is_pengasuh === '1') {
                            $('#status_pengasuh_modal').html('Pengasuh');
                        } else {
                            $('#status_pengasuh_modal').html('Bukan Pengasuh');
                        }

                    } else {
                        Swal.fire('Error', result.message, 'error');
                    }
                },
                error: function () {
                    Swal.close();
                    Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                }
            });
        })

        // select2Init("#id_satker", "/satker_select_get", null, function(data) {
        //     return data.text;
        // }, function(data) {
        //     if (data.id === '') {
        //         return "Cari Satuan Kerja";
        //     }

        //     return data.text;
        // });

        // select2Init("#idkabkota_lhr", "/birthday_place_select_get", null, function(data) {
        //     return data.text;
        // }, function(data) {
        //     if (data.id === '') {
        //         return "Cari Tempat Lahir";
        //     }

        //     return data.text;
        // });

        // select2Init("#id_agama", "/agama_select_get", null, function(data) {
        //     return data.text;
        // }, function(data) {
        //     if (data.id === '') {
        //         return "Pilih Agama";
        //     }

        //     return data.text;
        // });

        // select2Init("#id_suku", "/suku_select_get", null, function(data) {
        //     return data.text;
        // }, function(data) {
        //     if (data.id === '') {
        //         return "Pilih Suku";
        //     }

        //     return data.text;
        // });

        // select2Init("#id_prov_ktp", "/prov_select_get", null, function(data) {
        //     return data.text;
        // }, function(data) {
        //     if (data.id === '') {
        //         return "Pilih Provinsi";
        //     }

        //     return data.text;
        // });

        // select2Init("#id_kota_kab_ktp", "/kab_select_get", {
        //     id_prov: function() {
        //         return $('#id_prov_ktp').val()
        //     }
        // }, function(data) {
        //     return data.text;
        // }, function(data) {
        //     if (data.id === '') {
        //         return "Pilih Koba / Kabupaten";
        //     }

        //     return data.text;
        // });

        // select2Init("#id_kec_ktp", "/kec_select_get", {
        //     id_kab: function() {
        //         return $('#id_kota_kab_ktp').val()
        //     }
        // }, function(data) {
        //     return data.text;
        // }, function(data) {
        //     if (data.id === '') {
        //         return "Pilih Kecamatan";
        //     }

        //     return data.text;
        // });

        // select2Init("#id_kel_ktp", "/kel_select_get", {
        //     id_kec: function() {
        //         return $('#id_kec_ktp').val()
        //     }
        // }, function(data) {
        //     return data.text;
        // }, function(data) {
        //     if (data.id === '') {
        //         return "Pilih Kelurahan";
        //     }

        //     return data.text;
        // });

        select2Array.forEach(function (x) {
            select2Init('#' + x.id, x.url, x.placeholder, x.params);
        });

        $("#id_gender").select2({
            placeholder: 'Pilih Jenis Kelamin'
        });

        $("#is_internal").select2({
            placeholder: 'Pilih Status Pendidik'
        });

        $("#status_pendidik").select2({
            placeholder: 'Pilih Status Pendidik'
        });

        $('#d-excel').on('click', function (e) {
            $(this).attr("href", url_excel + "?o=P&search=" + $('input[type="search"]').val() + '&is_internal=' + $('#status_pendidik').val());
            $(this).attr("target", "_blank");
        })

        $('#d-pdf').on('click', function (e) {
            $(this).attr("href", url_pdf + "?o=P&search=" + $('input[type="search"]').val() + '&is_internal=' + $('#status_pendidik').val());
            $(this).attr("target", "_blank");
        })

        tampilData($('#status_pendidik').val());
    });

    function datatableColumn() {
        let columns = [{
            data: "id",
            orderable: false,
            width: 100,
            render: function (a, type, data, index) {
                return dataStart + index.row + 1
            }
        },
        {
            data: "nrp",
            orderable: true
        },
        // {
        //     data: "nik",
        //     orderable: true
        // },
        {
            data: "namagadik",
            orderable: true,
            render: function (a, type, data, index) {
                if (data.is_internal === '0') {
                    return data.namagadik + ' <span class="badge badge-info text-uppercase">\
                                    External\
                                </span>';
                } else if (data.is_internal === '1') {
                    return data.namagadik + ' <span class="badge badge-warning text-uppercase">\
                                    Internal\
                                </span>';
                } else if (data.is_internal === '2') {
                    return data.namagadik + ' <span class="badge badge-danger text-uppercase">\
                                    PNS\
                                </span>';
                } {
                    return data.namagadik + ' <span class="badge badge-success text-uppercase">\
                                    ?\
                                </span>';
                }
            }
        },
        {
            data: "is_deleted",
            orderable: true,
            render: function (a, type, data, index) {


                if (data.is_deleted === '0') {
                    return '<div class="col-sm-8">\
                                    <label class="ui-switch ui-switch-lg dark mt-1 mr-2">\
                                        <input type="checkbox" class="is_deleted" value="0" data-id="' + data.id + '" checked >\
                                        <i></i>\
                                    </label>\
                                </div>';
                } else if (data.is_deleted === '1') {
                    return '<div class="col-sm-8">\
                                    <label class="ui-switch ui-switch-lg dark mt-1 mr-2">\
                                        <input type="checkbox" class="is_deleted" value="1"  data-id="' + data.id + '">\
                                        <i></i>\
                                    </label>\
                                </div>';
                }
            }
        },
        {
            data: "id",
            orderable: false,
            render: function (a, type, data, index) {
                let button = ""

                if (auth_edit == "1") {
                    button += '<button class="btn btn-sm btn-outline-primary edit" data-id="' + data.id + '" title="Edit">\
                                    <i class="fa fa-edit"></i>\
                                </button>\
                                ';
                }

                button += '<button class="btn btn-sm btn-outline-info detail" data-id="' + data.id + '" title="Detail">\
                                        <i class="fa fa-eye"></i>\
                                    </button>\
                                    ';

                // if (auth_delete == "1") {
                //     if (data.is_deleted==1) {
                //         button += '<button class="btn btn-sm btn-outline-success aktiv" data-id="' + data.id + '" title="Aktiv">\
                //                         <i class="fa fa-check"></i>\
                //                     </button></div>';
                //     } else {
                //         button += '<button class="btn btn-sm btn-outline-danger delete" data-id="' + data.id + '" title="Non Aktiv">\
                //                         <i class="fa fa-trash-o"></i>\
                //                     </button></div>';
                //     }
                // }

                button += (button == "") ? "<b>Tidak ada aksi</b>" : ""

                return button;
            }
        }
        ];

        return columns;
    }

    function select2Init(id, url, placeholder, parameter) {
        $(id).select2({
            id: function (e) {
                return e.id
            },
            placeholder: placeholder,
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
            templateResult: function (data) {
                return data.text;
            },
            templateSelection: function (data) {
                if (data.id === '') {
                    return placeholder;
                }

                return data.text;
            },
            escapeMarkup: function (m) {
                return m;
            }
        });
    }

    function tampilData(status) {
        if (status != null || status == '') {
            $('#_status').html('Status Pendidik : ' + $('#status_pendidik').select2('data')[0]['text']);
        }

        $('#datatable').dataTable().fnDestroy();
        table = $('#datatable').DataTable({
            "serverSide": true,
            "processing": true,
            "ordering": true,
            "paging": true,
            "searching": {
                "regex": true
            },
            "lengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "pageLength": 10,
            "searchDelay": 500,
            "ajax": {
                "type": "POST",
                "url": url_load,
                "dataType": "json",
                "data": function (data) {
                   // console.log(data);
                    // Grab form values containing user options
                    dataStart = data.start;
                    let form = {};
                    Object.keys(data).forEach(function (key) {
                        form[key] = data[key] || "";
                    });

                    // Add options used by Datatables
                    let info = {
                        "start": data.start || 0,
                        "length": data.length,
                        "draw": 1,
                        "is_internal": status,
                        "<?= csrf_token() ?>": "<?= csrf_hash() ?>"
                    };

                    $.extend(form, info);

                    return form;
                },
                "complete": function (response) {
                   // console.log(response);
                    feather.replace();
                }
            },
            "columns": datatableColumn()
        }).on('init.dt', function () {
            $(this).css('width', '100%');
        });
    }
</script>