<?php
// Menentukan base path untuk aplikasi
define('BASE_PATH', __DIR__);

// Autoload controllers dan models
spl_autoload_register(function ($class_name) {
    if (file_exists(BASE_PATH . '/controllers/' . $class_name . '.php')) {
        require_once BASE_PATH . '/controllers/' . $class_name . '.php';
    } elseif (file_exists(BASE_PATH . '/models/' . $class_name . '.php')) {
        require_once BASE_PATH . '/models/' . $class_name . '.php';
    }
});

// Menentukan default controller dan action
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Mahasiswa';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Memuat controller yang sesuai
switch ($controller) {
    case 'Mahasiswa':
        $controller = new MahasiswaController();
        break;
    case 'Krs':
        $controller = new KrsController();
        break;
    default:
        $controller = new MahasiswaController();
}

// Memanggil method sesuai action
if (method_exists($controller, $action)) {
    if ($id !== null) {
        $controller->$action($id);
    } else {
        $controller->$action();
    }
} else {
    // Jika action tidak ditemukan, arahkan ke halaman 404 atau index
    $controller->index();
}
?>