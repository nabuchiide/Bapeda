<body class="fixed-left ">
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect ">
                <i class="ion-close"></i>
            </button>

            <!-- LOGO -->
            <div class="topbar-left bg-success">
                <div class="text-left offset-md-1">
                    <!--<a href="index.html" class="logo"><i class="mdi mdi-assistant"></i>Zoter</a>-->
                    <!-- <div class="row justify-content-md-center">
                        <div class="col-md-2 mt-1">
                            <a href="index.html" class="logo mt-1">
                                <img src="<?= BASEURL ?>/assets/images/bappeda-logo.png" height="50" alt="logo">
                            </a>
                        </div>
                        <div class="col mt-1 text-white">
                            <h3 class="mb-0">BAPPEDA</h3>
                            <h6 class="mt-0">Kabupaten Karawang</h6>
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="sidebar-inner niceScrollleft">

                <div id="sidebar-menu">
                    <?php
                    if ($_SESSION['login']['type'] == 'MR') {
                    ?>
                        <ul>
                            <li>
                                <a href="<?= BASEURL ?>/home" class="waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Personalia </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= BASEURL ?>/user">User</a></li>
                                    <li><a href="<?= BASEURL ?>/pegawai">Pegawai</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">Main</li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-bullseye"></i> <span> Kegiatan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= BASEURL ?>/kegiatan">Kegitan</a></li>
                                    <li><a href="<?= BASEURL ?>/anggaran">Anggaran</a></li>
                                    <li><a href="<?= BASEURL ?>/pajak">Pajak</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">Laporan</li>

                            <!-- <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-file-document"></i> <span> Laporan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= BASEURL ?>/laporan/kegiatan">Kegiatan</a></li>
                                    <li><a href="<?= BASEURL ?>/laporan/anggaran">Anggaran</a></li>
                                    <li><a href="<?= BASEURL ?>/laporan/pajak">Pajak</a></li>
                                </ul>
                            </li> -->

                            <li>
                                <a href="<?= BASEURL ?>/laporan/pajak" class="waves-effect">
                                    <i class="mdi mdi-file-document"></i>
                                    <span> Laporan Pajak </span>
                                </a>
                            </li>

                        </ul>
                    <?php } else if ($_SESSION['login']['type'] == 'AD') { ?>
                        <ul>
                            <li>
                                <a href="<?= BASEURL ?>/home" class="waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Personalia </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= BASEURL ?>/user">User</a></li>
                                    <li><a href="<?= BASEURL ?>/pegawai">Pegawai</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">Main</li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-bullseye"></i> <span> Kegiatan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= BASEURL ?>/kegiatan">Kegitan</a></li>
                                    <li><a href="<?= BASEURL ?>/anggaran">Anggaran</a></li>
                                </ul>
                            </li>

                        </ul>
                    <?php } else if ($_SESSION['login']['type'] == 'BP') { ?>
                        <ul>
                            <li>
                                <a href="<?= BASEURL ?>/home" class="waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li class="menu-title">Main</li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-bullseye"></i> <span> Kegiatan </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= BASEURL ?>/pajak">Pajak</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">Laporan</li>

                            <li>
                                <a href="<?= BASEURL ?>/laporan/pajak" class="waves-effect">
                                    <i class="mdi mdi-file-document"></i>
                                    <span> Laporan Pajak </span>
                                </a>
                            </li>
                        </ul>
                    <?php } else if ($_SESSION['login']['type'] == 'KP') { ?>
                        <ul>
                            <li>
                                <a href="<?= BASEURL ?>/home" class="waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li class="menu-title">Laporan</li>

                            <li>
                                <a href="<?= BASEURL ?>/laporan/pajak" class="waves-effect">
                                    <i class="mdi mdi-file-document"></i>
                                    <span> Laporan Pajak </span>
                                </a>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
                <div class="clearfix"></div>
            </div> <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <!-- Top Bar Start -->
                <div class="topbar ">
                    <nav class="navbar-custom">
                        <ul class="list-inline float-right mb-0">

                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="<?= BASEURL ?>/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title bg-success">
                                        <h5>Welcome</h5>
                                    </div>
                                    <a class="dropdown-item" href="<?= BASEURL ?>/login/logOut"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                </div>
                            </li>

                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left waves-light waves-effect  bg-success">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                        </ul>

                        <div class="clearfix bg-success"></div>

                    </nav>
                </div>
                <!-- Top Bar End -->