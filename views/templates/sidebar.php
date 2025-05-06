<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php echo (!isset($_GET['controller']) || $_GET['controller'] == 'Mahasiswa') && (!isset($_GET['action']) || $_GET['action'] == 'index') ? 'active' : ''; ?>" href="index.php?controller=Mahasiswa&action=index">
                    <i class="fas fa-users me-2"></i>
                    Daftar Mahasiswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo isset($_GET['controller']) && $_GET['controller'] == 'Mahasiswa' && isset($_GET['action']) && $_GET['action'] == 'create' ? 'active' : ''; ?>" href="index.php?controller=Mahasiswa&action=create">
                    <i class="fas fa-user-plus me-2"></i>
                    Tambah Mahasiswa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo isset($_GET['controller']) && $_GET['controller'] == 'Krs' && (!isset($_GET['action']) || $_GET['action'] == 'index') ? 'active' : ''; ?>" href="index.php?controller=Krs&action=index">
                    <i class="fas fa-file-alt me-2"></i>
                    Daftar KRS
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php echo isset($_GET['controller']) && $_GET['controller'] == 'Krs' && isset($_GET['action']) && $_GET['action'] == 'create' ? 'active' : ''; ?>" href="index.php?controller=Krs&action=create">
                    <i class="fas fa-plus-square me-2"></i>
                    Tambah KRS
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Content -->
<main class="content"></main>