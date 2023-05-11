<?php
$session = \Config\Services::session();
?>
<!-- ############ NAVBAR START-->
<div id="header" class="page-header ">
    <div class="navbar navbar-expand-lg">
        <!-- brand -->
        <a href="<?= base_url() ?>/main" class="navbar-brand d-lg-none">
            <img src="<?= base_url() ?>/assets/img/akpol_logo100.png" />
            <!-- <img src="../assets/img/logo.png" alt="..."> -->
            <span class="hidden-folded d-inline l-s-n-1x d-lg-none akpol">SIAP AKPOL</span>
        </a>
        <!-- / brand -->
        <!-- Navbar collapse -->
        <!-- <div class="collapse navbar-collapse order-2 order-lg-1" id="navbarToggler">
            <form class="input-group m-2 my-lg-0 ">
                <div class="input-group-prepend">
                    <button type="button" class="btn no-shadow no-bg px-0 text-inherit">
                        <i data-feather="search"></i>
                    </button>
                </div>
                <input type="text" class="form-control no-border no-shadow no-bg typeahead" placeholder="Search menu..." data-plugin="typeahead" data-api="<?= base_url() ?>/assets/api/menu.json">
            </form>
        </div> -->
        <ul class="nav navbar-menu order-1 order-lg-2">
            <li class="nav-item d-none d-sm-block">
                <a class="nav-link px-2" data-toggle="fullscreen" data-plugin="fullscreen">
                    <i data-feather="maximize"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link px-2" data-toggle="dropdown">
                    <i data-feather="settings"></i>
                </a>
                <!-- ############ Setting START-->
                <div class="dropdown-menu dropdown-menu-center mt-3 w-md animate fadeIn">
                    <div class="setting px-3">
                        <div class="mb-2 text-muted">
                            <strong>Setting:</strong>
                        </div>
                        <div class="mb-3" id="settingLayout">
                            <label class="ui-check ui-check-rounded my-1 d-block">
                                <input type="checkbox" name="stickyHeader">
                                <i></i>
                                <small>Sticky header</small>
                            </label>
                            <label class="ui-check ui-check-rounded my-1 d-block">
                                <input type="checkbox" name="stickyAside">
                                <i></i>
                                <small>Sticky aside</small>
                            </label>
                            <label class="ui-check ui-check-rounded my-1 d-block">
                                <input type="checkbox" name="foldedAside">
                                <i></i>
                                <small>Folded Aside</small>
                            </label>
                            <label class="ui-check ui-check-rounded my-1 d-block">
                                <input type="checkbox" name="hideAside">
                                <i></i>
                                <small>Hide Aside</small>
                            </label>
                        </div>
                        <div class="mb-2 text-muted">
                            <strong>Color:</strong>
                        </div>
                        <div class="mb-2">
                            <label class="radio radio-inline ui-check ui-check-md">
                                <input type="radio" name="bg" value="">
                                <i></i>
                            </label>
                            <label class="radio radio-inline ui-check ui-check-color ui-check-md">
                                <input type="radio" name="bg" value="bg-dark">
                                <i class="bg-dark"></i>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- ############ Setting END-->
            </li>
            <!-- Notification -->
            <!--  <li class="nav-item dropdown">
                <a class="nav-link px-2 mr-lg-2" data-toggle="dropdown">
                    <i data-feather="bell"></i>
                    <span class="badge badge-pill badge-up bg-primary">5</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right mt-3 w-md animate fadeIn p-0">
                    <div class="scrollable hover" style="max-height: 250px">
                        <div class="list list-row">
                            <div class="list-item " data-id="11">
                                <div>
                                    <a href="#">
                                        <span class="w-32 avatar gd-info">
                                              2
                                        </span>
                                    </a>
                                </div>
                                <div class="flex">
                                    <div class="item-feed h-2x">
                                        2 Pengasuh belum memberikan penilaian
                                    </div>
                                </div>
                            </div>
                            <div class="list-item " data-id="14">
                                <div>
                                    <a href="#">
                                        <span class="w-32 avatar gd-warning">
                                              1
                                        </span>
                                    </a>
                                </div>
                                <div class="flex">
                                    <div class="item-feed h-2x">
                                        1 Dosen belum memberikan penilaian
                                    </div>
                                </div>
                            </div>
                            <div class="list-item " data-id="17">
                                <div>
                                    <a href="#">
                                        <span class="w-32 avatar gd-warning">
                                              3
                                        </span>
                                    </a>
                                </div>
                                <div class="flex">
                                    <div class="item-feed h-2x">
                                        3 Unjuk Kerja terbaru
                                    </div>
                                </div>
                            </div>
                            <div class="list-item " data-id="10">
                                <div>
                                    <a href="#">
                                        <span class="w-32 avatar gd-danger">
                                            <img src="<?= base_url() ?>/assets/img/a10.jpg" alt=".">
                                        </span>
                                    </a>
                                </div>
                                <div class="flex">
                                    <div class="item-feed h-2x">
                                        10 Taruna terbaik
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="d-flex px-3 py-2 b-t">
                        <div class="flex">
                            <span>6 Notifications</span>
                        </div>
                        <a href="#">See all
                            <i class="fa fa-angle-right text-muted"></i>
                        </a>
                    </div>
                </div>
            </li> -->
            <!-- User dropdown menu -->
            <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link d-flex align-items-center px-2 text-color">
                    <!-- <span class="avatar w-24" style="margin: -2px;"><img src="<?= base_url() ?>/assets/img/a1.jpg" alt="..."></span> -->
                    <?php if ($session->get('userdetail') == null) {
                        echo ('<span class="w-24 avatar gd-warning">
                                <span class="b-white avatar-right"></span>' . $session->get('name')[0]);
                    } else {
                        if ($session->get('userdetail')->photopath) {
                            echo ('<span class="w-24 avatar circle bg-info-lt">
                            <img src="' . $session->get('userdetail')->photopath . '" alt="." style="width: 24px; height: 24px; object-fit: cover;">
                            <span class="b-white avatar-right"></span>');
                        } else {
                            echo ('<span class="w-24 avatar gd-warning">
                            <span class="b-white avatar-right"></span>' . $session->get('name')[0]);
                        }
                    } ?>

                    </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right w mt-3 animate fadeIn">
                    <a class="dropdown-item" href="<?= base_url() ?>/profil/profil" style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis; ">
                        <span><?= $session->get('name') ?></span>
                    </a>
                    <a class="dropdown-item">
                        <span class="badge bg-success text-uppercase" style="cursor: default;"><?= $session->get('usertype_name_singkatan') ?></span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <!-- <a class="dropdown-item" href="#">
                        <span>Pengaturan Akun</span>
                    </a> -->
                    <?php if ($session->has('old_session')) {
                        echo ('<a class="dropdown-item" href="' . base_url() . '/auth/action/logout">Logout Taruna</a>');
                    } else {
                        echo ('<a class="dropdown-item" href="' . base_url() . '/auth/action/logout">Logout</a>');
                    } ?>

                </div>
            </li>
            <!-- Navarbar toggle btn -->
            <li class="nav-item d-lg-none">
                <a href="#" class="nav-link px-2" data-toggle="collapse" data-toggle-class data-target="#navbarToggler">
                    <i data-feather="search"></i>
                </a>
            </li>
            <li class="nav-item d-lg-none">
                <a class="nav-link px-1" data-toggle="modal" data-target="#aside">
                    <i data-feather="menu"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- ############ NAVBAR END-->