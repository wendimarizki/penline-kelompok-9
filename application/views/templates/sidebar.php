        <!-- Sidebar -->
        <ul class="navbar-nav bg-gray-700 sidebar sidebar-dark accordion" id="accordionSidebar">
            
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="autentifikasi">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">Penline kelompok9</div>
                </a>
                <!-- Divider -->
                <hr class="sidebar-divider">
 
                <!-- Looping Menu-->
 
                    <!-- Heading -->
                    <div class="sidebar-heading"> Menu Utama </div>

                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link pb-0" href="<?=base_url('peralatan'); ?>">
                                <i class="fa fa-fw fa book"></i>
                                <span>Data alat</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb-0" href="<?=base_url('peralatan/kategori'); ?>">
                                <i class="fa fa-fw fa book"></i>
                                <span>Kategori alat</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pb-0" href="<?=base_url('user/anggota'); ?>">
                                <i class="fa fa-fw fa book"></i>
                                <span>Data Anggota</span></a>
                        </li>
                     </li>

                <!-- Divider -->
                <hr class="sidebar-divider mt-3">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0"id="sidebarToggle"></button>
            </div>
        </ul>
 <!-- End of Sidebar -- >