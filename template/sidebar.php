<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin/dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">DiOR Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
            <?php
                $hal = $_GET['hal'];
                if (isset($_GET['hal'])) $hal = $_GET['hal'];
                else $hal = "dashboard";
            ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item 
            <?php if($hal == 'dashboard') : ?>
                <?= "active" ?>
                <?php endif ?>">
                <a class="nav-link" href="?hal=dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item 
            <?php if($hal == 'pengajuan') : ?>
                <?= "active" ?>
                <?php endif ?>">
                <a class="nav-link" href="?hal=pengajuan">
                    <i class="fas fa-fw fa-bookmark"></i>
                    <span>Pengajuan</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item 
            <?php if($hal == 'jadwal') : ?>
                <?= "active" ?>
                <?php endif ?>">
                <a class="nav-link" href="?hal=jadwal">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Jadwal Peminjaman</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item 
            <?php if($hal == 'datapeminjam') : ?>
                <?= "active" ?>
                <?php endif ?>">
                <a class="nav-link" href="?hal=datapeminjam">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Kelola Data Pengguna</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->