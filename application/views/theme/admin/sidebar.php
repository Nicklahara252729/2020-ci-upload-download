<?php 
$uri  = $this->uri->segment(1);
$uri2 = $this->uri->segment(2); ?>
<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        <img src="<?= base_url() ?>assets/images/users/img_camera.jpg" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="<?= base_url() ?>assets/images/users/img_camera.jpg" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0"><?= $info->nama ?></h6>
            <span class="pro-user-desc"><?= $info->username ?></span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                <a href="<?= base_url('logout') ?>" class="dropdown-item notify-item">
                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <li class="menu-title">Main Menu</li>

                <li class="<?php echo ($page == 'file' ? 'active' : ''); ?>">
                    <a href="<?= base_url('file') ?>">
                        <i data-feather="box"></i>
                        <span> Files </span>
                    </a>
                </li>
                
                <li class="<?php echo ($page == 'administrator/data-admin' ? 'active' : ''); ?>">
                    <a href="<?= base_url('administrator/data-admin') ?>">
                        <i data-feather="users"></i>
                        <span> Administrator </span>
                    </a>
                </li>
                <li class="<?php echo ($page == 'riwayat/download' ? 'active' : ''); ?>">
                    <a href="<?= base_url('riwayat/download') ?>">
                        <i data-feather="book-open"></i>
                        <span> Riwayat Download </span>
                    </a>
                </li>
                <li class="<?php echo ($page == 'riwayat/upload' ? 'active' : ''); ?>">
                    <a href="<?= base_url('riwayat/upload') ?>">
                        <i data-feather="book-open"></i>
                        <span> Riwayat Upload</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>