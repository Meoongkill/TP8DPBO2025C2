<?php
class MahasiswaController {
    private $model;
    
    public function __construct() {
        $this->model = new Mahasiswa();
    }
    
    // Menampilkan daftar semua mahasiswa
    public function index() {
        $data = $this->model->getAll();
        
        // Membuat array untuk template
        $mahasiswa_list = [];
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            $mahasiswa_list[] = $row;
        }
        
        // Load view
        include_once BASE_PATH . '/views/templates/header.php';
        include_once BASE_PATH . '/views/templates/sidebar.php';
        include_once BASE_PATH . '/views/mahasiswa/index.php';
        include_once BASE_PATH . '/views/templates/footer.php';
    }
    
    // Menampilkan form untuk membuat mahasiswa baru
    public function create() {
        $errors = [];
        $mahasiswa = [
            'NIM_Mahasiswa' => '',
            'Nama_Mahasiswa' => '',
            'Phone_Mahasiswa' => ''
        ];
        
        // Jika form disubmit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Mengambil data dari form
            $mahasiswa = [
                'NIM_Mahasiswa' => $_POST['nim'] ?? '',
                'Nama_Mahasiswa' => $_POST['nama'] ?? '',
                'Phone_Mahasiswa' => $_POST['phone'] ?? ''
            ];
            
            // Validasi
            if (empty($mahasiswa['NIM_Mahasiswa'])) {
                $errors[] = "NIM harus diisi";
            } elseif ($this->model->checkNIM($mahasiswa['NIM_Mahasiswa'])) {
                $errors[] = "NIM sudah digunakan";
            }
            
            if (empty($mahasiswa['Nama_Mahasiswa'])) {
                $errors[] = "Nama harus diisi";
            }
            
            if (empty($mahasiswa['Phone_Mahasiswa'])) {
                $errors[] = "Nomor telepon harus diisi";
            }
            
            // Jika tidak ada error, simpan data
            if (empty($errors)) {
                $this->model->NIM_Mahasiswa = $mahasiswa['NIM_Mahasiswa'];
                $this->model->Nama_Mahasiswa = $mahasiswa['Nama_Mahasiswa'];
                $this->model->Phone_Mahasiswa = $mahasiswa['Phone_Mahasiswa'];
                
                if ($this->model->create()) {
                    // Redirect ke halaman index
                    header("Location: index.php?controller=Mahasiswa&action=index");
                    exit;
                } else {
                    $errors[] = "Gagal menyimpan data";
                }
            }
        }
        
        // Load view
        include_once BASE_PATH . '/views/templates/header.php';
        include_once BASE_PATH . '/views/templates/sidebar.php';
        include_once BASE_PATH . '/views/mahasiswa/create.php';
        include_once BASE_PATH . '/views/templates/footer.php';
    }
    
    // Menampilkan form untuk mengedit mahasiswa
    public function edit($id) {
        $errors = [];
        
        // Ambil data mahasiswa berdasarkan id
        if (!$this->model->getOne($id)) {
            // Jika mahasiswa tidak ditemukan, redirect ke index
            header("Location: index.php?controller=Mahasiswa&action=index");
            exit;
        }
        
        $mahasiswa = [
            'ID_Mahasiswa' => $this->model->ID_Mahasiswa,
            'NIM_Mahasiswa' => $this->model->NIM_Mahasiswa,
            'Nama_Mahasiswa' => $this->model->Nama_Mahasiswa,
            'Phone_Mahasiswa' => $this->model->Phone_Mahasiswa
        ];
        
        // Jika form disubmit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Mengambil data dari form
            $mahasiswa = [
                'ID_Mahasiswa' => $id,
                'NIM_Mahasiswa' => $_POST['nim'] ?? '',
                'Nama_Mahasiswa' => $_POST['nama'] ?? '',
                'Phone_Mahasiswa' => $_POST['phone'] ?? ''
            ];
            
            // Validasi
            if (empty($mahasiswa['NIM_Mahasiswa'])) {
                $errors[] = "NIM harus diisi";
            } elseif ($this->model->checkNIM($mahasiswa['NIM_Mahasiswa'], $id)) {
                $errors[] = "NIM sudah digunakan";
            }
            
            if (empty($mahasiswa['Nama_Mahasiswa'])) {
                $errors[] = "Nama harus diisi";
            }
            
            if (empty($mahasiswa['Phone_Mahasiswa'])) {
                $errors[] = "Nomor telepon harus diisi";
            }
            
            // Jika tidak ada error, update data
            if (empty($errors)) {
                $this->model->ID_Mahasiswa = $mahasiswa['ID_Mahasiswa'];
                $this->model->NIM_Mahasiswa = $mahasiswa['NIM_Mahasiswa'];
                $this->model->Nama_Mahasiswa = $mahasiswa['Nama_Mahasiswa'];
                $this->model->Phone_Mahasiswa = $mahasiswa['Phone_Mahasiswa'];
                
                if ($this->model->update()) {
                    // Redirect ke halaman index
                    header("Location: index.php?controller=Mahasiswa&action=index");
                    exit;
                } else {
                    $errors[] = "Gagal mengupdate data";
                }
            }
        }
        
        // Load view
        include_once BASE_PATH . '/views/templates/header.php';
        include_once BASE_PATH . '/views/templates/sidebar.php';
        include_once BASE_PATH . '/views/mahasiswa/edit.php';
        include_once BASE_PATH . '/views/templates/footer.php';
    }
    
    // Menampilkan detail mahasiswa
    public function view($id) {
        // Ambil data mahasiswa berdasarkan id
        if (!$this->model->getOne($id)) {
            // Jika mahasiswa tidak ditemukan, redirect ke index
            header("Location: index.php?controller=Mahasiswa&action=index");
            exit;
        }
        
        $mahasiswa = [
            'ID_Mahasiswa' => $this->model->ID_Mahasiswa,
            'NIM_Mahasiswa' => $this->model->NIM_Mahasiswa,
            'Nama_Mahasiswa' => $this->model->Nama_Mahasiswa,
            'Phone_Mahasiswa' => $this->model->Phone_Mahasiswa
        ];
        
        // Ambil data KRS mahasiswa
        $krs = new Krs();
        $krs_data = $krs->getByMahasiswa($id);
        $krs_list = [];
        
        while ($row = $krs_data->fetch(PDO::FETCH_ASSOC)) {
            $krs_list[] = $row;
        }
        
        // Load view
        include_once BASE_PATH . '/views/templates/header.php';
        include_once BASE_PATH . '/views/templates/sidebar.php';
        include_once BASE_PATH . '/views/mahasiswa/view.php';
        include_once BASE_PATH . '/views/templates/footer.php';
    }
    
    // Menghapus mahasiswa
    public function delete($id) {
        // Jika konfirmasi diterima
        if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
            if ($this->model->delete($id)) {
                // Redirect ke halaman index dengan pesan sukses
                header("Location: index.php?controller=Mahasiswa&action=index&success=1");
            } else {
                // Redirect ke halaman index dengan pesan error
                header("Location: index.php?controller=Mahasiswa&action=index&error=1");
            }
            exit;
        }
        
        // Ambil data mahasiswa untuk konfirmasi
        if (!$this->model->getOne($id)) {
            // Jika mahasiswa tidak ditemukan, redirect ke index
            header("Location: index.php?controller=Mahasiswa&action=index");
            exit;
        }
        
        $mahasiswa = [
            'ID_Mahasiswa' => $this->model->ID_Mahasiswa,
            'NIM_Mahasiswa' => $this->model->NIM_Mahasiswa,
            'Nama_Mahasiswa' => $this->model->Nama_Mahasiswa
        ];
        
        // Load view konfirmasi
        include_once BASE_PATH . '/views/templates/header.php';
        include_once BASE_PATH . '/views/templates/sidebar.php';
        include_once BASE_PATH . '/views/mahasiswa/delete.php';
        include_once BASE_PATH . '/views/templates/footer.php';
    }
}
?>