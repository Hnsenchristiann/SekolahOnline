
<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image:linear-gradient(135deg, #185a9d 20%, #43cea2 100%);">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">School Distancing</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider  ">
    <!-- Heading -->
    <div class="sidebar-heading">
        Admin
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/guru'); ?>">
            <i class="fas fa-fw fa-chalkboard-teacher dash" <?php if($_SESSION['page'] == 'guru'){ echo 'style="color:white;"';}?>></i>
            <span>Teachers</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/siswa'); ?>">
            <i class="fas fa-users" <?php if($_SESSION['page'] == 'siswa'){ echo 'style="color:white;"';}?>></i>
            <span>Students</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/myprofile')?>">
            <i class="fas fa-fw fa-user" <?php if($_SESSION['page'] == 'myprofile'){ echo 'style="color:white;"';}?>></i>
            <span>My Profile</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>"data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->