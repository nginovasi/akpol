<style>
    .w-96 {
        width: 96px;
        height: 96px;
    }

    .w-128 {
        width: 128px;
        height: 128px;
    }
</style>
<div id="content" class="flex ">
    <!-- ############ Main START-->
    <div>
        <div class="page-hero page-container " id="page-hero">
            <div class="padding d-flex">
                <div class="page-title">
                    <h2 class="text-md text-highlight"><?= $page_title ?></h2>
                </div>
            </div>
        </div>
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div id="accordion">
                    <p class="text-muted">
                        <strong>Informasi User</strong>
                    </p>
                    <div class="card">
                        <div class="d-flex align-items-center px-4 py-3 pointer" data-toggle="collapse" data-parent="#accordion" data-target="#c_1">
                            <div>
                                <?php if ($userdetail == null) {
                                    echo ('<span class="w-96 avatar gd-warning" style="width: 96px; height: 96px">
                                            <span class="avatar-status on b-white avatar-right" style="width: 14px; height: 14px"></span>
                                            <span class="avatar-status b-white avatar-bottom center modal-photo" style="width: 24px; height: 24px; padding: 2px"><i style="color:#343a40" data-feather="eye"></i></span>
                                            <h2 class="alert-heading">' . $name[0] . '</h2>
                                        </span>');
                                } else {
                                    if ($userdetail->photopath) {
                                        echo ('<span class="avatar w-128 circle bg-info-lt">
                                        <img src="' . $userdetail->photopath . '" alt="." class="w-128" style="object-fit: cover;">
                                        <span class="avatar-status b-white avatar-bottom center modal-photo" style="width: 24px; height: 24px; padding: 2px"><i style="color:#343a40" data-feather="eye"></i></span>
                                        </span> ');
                                    } else {
                                        echo ('<span class="w-96 avatar gd-warning" style="width: 96px; height: 96px">
                                        <span class="avatar-status on b-white avatar-right" style="width: 14px; height: 14px"></span>
                                        <span class="avatar-status b-white avatar-bottom center modal-photo" style="width: 24px; height: 24px; padding: 2px"><i style="color:#343a40" data-feather="eye"></i></span>
                                        <h2 class="alert-heading">' . $name[0] . '</h2>
                                    </span>');
                                    }
                                } ?>
                            </div>
                            <div class="mx-4 d-none d-md-block">
                                <h2 class="text-md"><?= $name ?></h2>
                                <div class="text-muted"><?= $email ?></div>
                            </div>
                            <div class="flex"></div>
                            <div>
                                <a data-toggle="collapse" data-parent="#accordion" data-target="#c_1" class="text-prmary text-sm">Edit Profil</a>
                            </div>
                            <div class="mx-3">
                                <i data-feather="chevron-right"></i>
                            </div>
                        </div>
                        <div class="px-4 py-4">
                            <div class="row mb-2">
                                <div class="col-4">
                                    <small class="text-muted">Username</small>
                                    <div class="my-2"><?= $username ?></div>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted">Kode User</small>
                                    <div class="my-2"><?= $usertype ?></div>
                                </div>
                                <?php if ($userdetail != null) {
                                    echo ('<div class="col-4">
                                    <small class="text-muted">NIK</small>
                                    <div class="my-2">' . $userdetail->nik . '</div>
                                </div>');
                                } ?>
                            </div>
                            <?php if ($userdetail != null) {
                                if ($usertype == 'gdk') {
                                    echo ('
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <small class="text-muted">Jenis Kelamin</small>
                                            <div class="my-2">' . $userdetail->nama_gender . '</div>
                                        </div>
                                        <div class="col-4">
                                            <small class="text-muted">Satuan Kerja</small>
                                            <div class="my-2">' . $userdetail->nama_satker . '</div>
                                        </div>
                                        <div class="col-4">
                                            <small class="text-muted">NRP</small>
                                            <div class="my-2">' . $userdetail->nrp . '</div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <small class="text-muted">Kontak</small>
                                            <div class="my-2">' . $userdetail->telp . '</div>
                                        </div>
                                        <div class="col-8">
                                            <small class="text-muted">Alamat</small>
                                            <div class="my-2">' . $userdetail->alamat_ktp . ', ' . $userdetail->nama_kel_ktp . ', ' . $userdetail->nama_kec_ktp . ', ' . $userdetail->nama_kota_kab_ktp . ', ' . $userdetail->nama_prov_ktp . '</div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <small class="text-muted">Tanggal Lahir</small>
                                            <div class="my-2">' . $userdetail->nama_kabkota_lhr . ', ' . $userdetail->tglhr . '</div>
                                        </div>
                                        <div class="col-4">
                                            <small class="text-muted">Nomor SKEP PAT</small>
                                            <div class="my-2">' . $userdetail->no_skep_pat_akpol . '</div>
                                        </div>
                                        <div class="col-4">
                                            <small class="text-muted">Nomor Tamat Akpol</small>
                                            <div class="my-2">' . $userdetail->tmt_pat_akpol . '</div>
                                        </div>
                                    </div>
                                    ');
                                } else if ($usertype == 'trn') {
                                    echo ('
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <small class="text-muted">Tanggal Lahir</small>
                                            <div class="my-2">' . $userdetail->nama_kabkota_lhr . ', ' . $userdetail->tglhr . '</div>
                                        </div>
                                        <div class="col-4">
                                            <small class="text-muted">Nama SLTA</small>
                                            <div class="my-2">' . $userdetail->nama_slta . '</div>
                                        </div>
                                        <div class="col-4">
                                            <small class="text-muted">Tahun Lulus</small>
                                            <div class="my-2">' . $userdetail->thn_lulus . '</div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <small class="text-muted">No AK</small>
                                            <div class="my-2">' . $userdetail->noaklong . '</div>
                                        </div>
                                        <div class="col-4">
                                            <small class="text-muted">Batalyon</small>
                                            <div class="my-2">' . $userdetail->nama_batalyon . '</div>
                                        </div>
                                        <div class="col-4">
                                            <small class="text-muted">Kompi</small>
                                            <div class="my-2">' . $userdetail->nama_kompi . '</div>
                                        </div>

                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-4">
                                            <small class="text-muted">Jenis Kelamin</small>
                                            <div class="my-2">' . $userdetail->nama_gender . '</div>
                                        </div>
                                        <div class="col-4">
                                            <small class="text-muted">Kontak</small>
                                            <div class="my-2">' . $userdetail->telp . '</div>
                                        </div>
                                        <div class="col-3">
                                            <small class="text-muted">Peleton</small>
                                            <div class="my-2">' . $userdetail->nama_peleton . '</div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">

                                        <div class="col-12">
                                            <small class="text-muted">Alamat</small>
                                            <div class="my-2">' . $userdetail->alamat_ktp . ', ' . $userdetail->nama_kel_ktp . ', ' . $userdetail->nama_kec_ktp . ', ' . $userdetail->nama_kota_kab_ktp . ', ' . $userdetail->nama_prov_ktp . '</div>
                                        </div>
                                    </div>

                                    ');
                                }
                            } ?>
                        </div>
                        <div class="collapse p-4" id="c_1">
                            <form id="changeinfoform">
                                <?php if ($userdetail != null) {
                                    echo ('<div class="form-group">
                                        <label>Foto Profil</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file_foto" name="file_foto" accept=".gif,.jpg,.jpeg,.png">
                                            <label class="custom-file-label" for="file_foto">Choose file</label>
                                        </div>
                                        <div class="small">Ukuran Maksimal 1 MB</div>
                                    </div>');
                                } ?>
                                <?= csrf_field(); ?>
                                <?php if ($userdetail != null) {
                                    echo ('
                                        <input type="hidden" class="form-control" value="' . $userdetail->nik . '" name="nik" id="nik">
                                        <input type="hidden" class="form-control" value="' . $userdetail->id . '" name="id_user_detail" id="id_user_detail">
                                    ');
                                } ?>
                                <?php if ($userdetail != null) {
                                    echo ('');
                                } ?>
                                <input type="hidden" class="form-control" value="<?= $usertype ?>" name="usertype" id="usertype">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" value="<?= $username ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" value="<?= $name ?>" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <!-- <div class="col-6">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control sel2" value="<?= $userdetail->nama_gender ?>" id="id_gender" name="id_gender">
                                                <option></option>
                                                <option value="1">Laki-laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div> -->
                                        <div class="col-6">
                                            <label>No Telephone</label>
                                            <input type="text" class="form-control" value="<?= $userdetail->telp ?>" name="telp" id="telp">
                                            <!-- <input type="tel" class="form-control" id="telp" name="telp" minlength="10" maxlength="14" placeholder="No Telepon Taruna" required> -->
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Tempat Lahir</label>
                                            <select class="form-control sel2" value="<?= $userdetail->nama_kabkota_lhr ?>" id="id_kabkota_lhr" name="id_kabkota_lhr">
                                                <option></option>
                                            </select>
                                                                                       
                                        </div>
                                        <div class="col-6">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tglhr" name="tglhr" placeholder="Tanggal Lahir">
                                        </div>
                                    </div>
                                </div> -->

                                <button type="submit" class="btn btn-primary mt-2">Update</button>
                            </form>
                        </div>
                        <div class="d-flex align-items-center px-4 py-3 b-t pointer" data-toggle="collapse" data-parent="#accordion" data-target="#c_2">
                            <i data-feather="lock"></i>
                            <div class="px-3">
                                <div>Ubah Password</div>
                            </div>
                            <div class="flex"></div>
                            <div>
                                <i data-feather="chevron-right"></i>
                            </div>
                        </div>
                        <div class="collapse p-4" id="c_2">
                            <form id="changepassform">
                                <?= csrf_field(); ?>
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input type="password" name="old_password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" id="confirm_password" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Update</button>
                            </form>
                        </div>
                        <div class="d-flex align-items-center px-4 py-3 b-t pointer" data-parent="#accordion" data-target="#c_2">
                            <i data-feather="power"></i>
                            <div class="px-3">
                                <a href="<?= base_url() ?>/auth/action/logout" class="text-prmary text-sm">Logout</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ############ Main END-->
    <div id="modal-photo-container" class="modal fade" data-backdrop="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <form id="modal-photo-form">
                    <div class="modal-header ">
                        <div class="modal-title text-md">Foto Profil</div>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="p-4">
                            <?= csrf_field(); ?>
                            <div class="row row-xs">
                                <div class="col-12">
                                    <div class="media r ">
                                        <?php if ($userdetail == null) {
                                            echo ('<a class="media-content" style="background-image: url(https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg);"></a>');
                                        } else {
                                            if ($userdetail->photopath) {
                                                echo ('<a class="media-content" style="background-image: url(' . $userdetail->photopath . ');"></a>');
                                            } else {
                                                echo ('<a class="media-content" style="background-image: url(https://st3.depositphotos.com/23594922/31822/v/600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg);"></a>');
                                            }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="d-sm-flex no-shrink mb-4">
                                <div>
                                    <a href="#" class="avatar w-96" data-pjax-state="" id="photopath_anchor">
                                        <img class="w-96" id="photopath_modal" src="../assets/img/a1.jpg" alt="." style="object-fit:cover;">
                                    </a>
                                </div>

                            </div> -->
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>
</div>
<script type="text/javascript">
    const url_change_pass = '<?= base_url() . "/" . uri_segment(0) . "/action/change_pass" ?>';
    const url_change_info = '<?= base_url() . "/" . uri_segment(0) . "/action/change_info" ?>';
    $(document).ready(function() {

        $(document).on('submit', '#changepassform', function(e) {
            e.preventDefault();
            let $this = $(this);
            let new_password = $('#new_password').val();
            let confirm_password = $('#confirm_password').val();
            if (new_password == confirm_password) {
                $.ajax({
                    url: url_change_pass,
                    method: "POST",
                    data: $this.serialize(),
                    dataType: 'json',
                    success: function(result) {
                        if (result.success) {
                            Swal.fire('Sukses', 'Berhasil mengubah password', 'success');
                            $('#changepassform').trigger("reset");
                        } else {
                            Swal.fire('Error', 'Password lama salah', 'error');
                        }
                    },
                    error: function() {
                        Swal.close();
                        Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                    }
                });
            } else {
                Swal.fire('Password tidak sesuai', 'Password baru dan konfirmasi password tidak sama', 'warning');
            }
        }).on('submit', '#changeinfoform', function(e) {
            e.preventDefault();
            let $this = $(this);
            var formData = new FormData(this);
            let name = $('#name').val();
            let telp = $('#telp').val();
            if (name != '' && telp!= '') {
                $.ajax({
                    url: url_change_info,
                    method: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(result) {
                        if (result.success) {
                            Swal.fire('Sukses', 'Berhasil mengubah profil, lakukan login ulang untuk melihat ubahan', 'success');
                            $('#changeinfoform').trigger("reset");
                        } else {
                            Swal.fire('Error', 'Gagal mengubah profil', 'error');
                        }
                    },
                    error: function() {
                        Swal.close();
                        Swal.fire('Error', 'Terjadi kesalahan pada server', 'error');
                    }
                });
            } else {
                Swal.fire('Isian tidak lengkap', 'Nama user tidak boleh kosong', 'warning');
            }
        }).on('change', '.custom-file-input', function() {
            let $this = $(this)[0];
            $('.custom-file-label').html($this.files[0].name);
            if ($this.files[0].size > 1048576) {
                Swal.fire('Error', 'File teralu besar, maksimal besar file adalah 1mb', 'error');
                $this.value = "";
                $('.custom-file-label').html('Pilih File');
            };
        }).on('click', '.modal-photo', function() {
            $('#modal-photo-container').modal('show');
        })
    });
</script>