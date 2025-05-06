<?php
class KrsController {
    private $model;
    
    public function __construct() {
        $this->model = new Krs();
    }
    
    // Menampilkan daftar semua KRS
    public function index() {
        $data = $this->model->getAll();
        
        // Membuat array untuk template
        $krs_list = [];
        while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
            $krs_list[] = $row;
        }
        
        // Load view
        include_once BASE_PATH . '/views/templates/header.php';
        include_once BASE_PATH . '/views/templates/sidebar.php';
        include_once BASE_PATH . '/views/krs/index.php';
        include_once BASE_PATH . '/views/templates/footer.php';
    }
    
    // Menampilkan form untuk membuat KRS baru
    public function create() {
        $errors = [];
        $krs = [
            'ID_Mahasiswa' => '',
            'Kode_Mata_Kuliah' => '',
            'Nama_Mata_Kuliah' => '',
            'Semester' => '',
            'Nilai_Akhir' => ''
        ];
        
        // Ambil data mahasiswa untuk dropdown
        $mahasiswa_data = $this->model->getAllMahasiswa();
        $mahasiswa_list = [];
        while ($row = $mahasiswa_data->fetch(PDO::FETCH_ASSOC)) {
            $mahasiswa_list[] = $row;
        }
        
        // Jika form disubmit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Mengambil data dari form
            $krs = [
                'ID_Mahasiswa' => $_POST['id_mahasiswa'] ?? '',
                'Kode_Mata_Kuliah' => $_POST['kode'] ?? '',
                'Nama_Mata_Kuliah' => $_POST['nama'] ?? '',
                'Semester' => $_POST['semester'] ?? '',
                'Nilai_Akhir' => $_POST['nilai'] ?? ''
            ];
            
            // Validasi
            if (empty($krs['ID_Mahasiswa'])) {
                $errors[] = "Mahasiswa harus dipilih";
            }
            
            if (empty($krs['Kode_Mata_Kuliah'])) {
                $errors[] = "Kode mata kuliah harus diisi";
            }
            
            if (empty($krs['Nama_Mata_Kuliah'])) {
                $errors[] = "Nama mata kuliah harus diisi";
            }
            
            if (empty($krs['Semester'])) {
                $errors[] = "Semester harus diisi";
            }
            
            if ($krs['Nilai_Akhir'] === '') {
                $errors[] = "Nilai akhir harus diisi";
            } elseif (!is_numeric($krs['Nilai_Akhir']) || $krs['Nilai_Akhir'] < 0 || $krs['Nilai_Akhir'] > 100) {
                $errors[] = "Nilai akhir harus berupa angka antara 0-100";
            }
            
            // Jika tidak ada error, simpan data
            if (empty($errors)) {
                $this->model->ID_Mahasiswa = $krs['ID_Mahasiswa'];
                $this->model->Kode_Mata_Kuliah = $krs['Kode_Mata_Kuliah'];
                $this->model->Nama_Mata_Kuliah = $krs['Nama_Mata_Kuliah'];
                $this->model->Semester = $krs['Semester'];
                $this->model->Nilai_Akhir = $krs['Nilai_Akhir'];
                
                if ($this->model->create()) {
                    // Redirect ke halaman index
                    header("Location: index.php?controller=Krs&action=index");
                    exit;
                } else {
                    $errors[] = "Gagal menyimpan data";
                }
            }
        }
        
        // Load view
        include_once BASE_PATH . '/views/templates/header.php';
        include_once BASE_PATH . '/views/templates/sidebar.php';
        include_once BASE_PATH . '/views/krs/create.php';
        include_once BASE_PATH . '/views/templates/footer.php';
    }
    
    // Menampilkan form untuk mengedit KRS
    public function edit($id) {
        $errors = [];
        
        // Ambil data KRS berdasarkan id
        if (!$this->model->getOne($id)) {
            // Jika KRS tidak ditemukan, redirect ke index
            header("Location: index.php?controller=Krs&action=index");
            exit;
        }
        
        $krs = [
            'ID_KRS' => $this->model->ID_KRS,
            'ID_Mahasiswa' => $this->model->ID_Mahasiswa,
            'Kode_Mata_Kuliah' => $this->model->Kode_Mata_Kuliah,
            'Nama_Mata_Kuliah' => $this->model->Nama_Mata_Kuliah,
            'Semester' => $this->model->Semester,
            'Nilai_Akhir' => $this->model->Nilai_Akhir
        ];
        
        // Ambil data mahasiswa untuk dropdown
        $mahasiswa_data = $this->model->getAllMahasiswa();
        $mahasiswa_list = [];
        while ($row = $mahasiswa_data->fetch(PDO::FETCH_ASSOC)) {
            $mahasiswa_list[] = $row;
        }
        
        // Jika form disubmit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Mengambil data dari form
            $krs = [
                'ID_KRS' => $id,
                'ID_Mahasiswa' => $_POST['id_mahasiswa'] ?? '',
                'Kode_Mata_Kuliah' => $_POST['kode'] ?? '',
                'Nama_Mata_Kuliah' => $_POST['nama'] ?? '',
                'Semester' => $_POST['semester'] ?? '',
                'Nilai_Akhir' => $_POST['nilai'] ?? ''
            ];
            
            // Validasi
            if (empty($krs['ID_Mahasiswa'])) {
                $errors[] = "Mahasiswa harus dipilih";
            }
            
            if (empty($krs['Kode_Mata_Kuliah'])) {
                $errors[] = "Kode mata kuliah harus diisi";
            }
            
            if (empty($krs['Nama_Mata_Kuliah'])) {
                $errors[] = "Nama mata kuliah harus diisi";
            }
            
            if (empty($krs['Semester'])) {
                $errors[] = "Semester harus diisi";
            }
            
            if ($krs['Nilai_Akhir'] === '') {
                $errors[] = "Nilai akhir harus diisi";
            } elseif (!is_numeric($krs['Nilai_Akhir']) || $krs['Nilai_Akhir'] < 0 || $krs['Nilai_Akhir'] > 100) {
                $errors[] = "Nilai akhir harus berupa angka antara 0-100";
            }
            
            // Jika tidak ada error, update data
            if (empty($errors)) {
                $this->model->ID_KRS = $krs['ID_KRS'];
                $this->model->ID_Mahasiswa = $krs['ID_Mahasiswa'];
                $this->model->Kode_Mata_Kuliah = $krs['Kode_Mata_Kuliah'];
                $this->model->Nama_Mata_Kuliah = $krs['Nama_Mata_Kuliah'];
                $this->model->Semester = $krs['Semester'];
                $this->model->Nilai_Akhir = $krs['Nilai_Akhir'];
                
                if ($this->model->update()) {
                    // Redirect ke halaman index
                    header("Location: index.php?controller=Krs&action=index");
                    exit;
                } else {
                    $errors[] = "Gagal mengupdate data";
                }
            }
        }
        
        // Load view
        include_once BASE_PATH . '/views/templates/header.php';
        include_once BASE_PATH . '/views/templates/sidebar.php';
        include_once BASE_PATH . '/views/krs/edit.php';
        include_once BASE_PATH . '/views/templates/footer.php';
    }
    
    // Menampilkan detail KRS
    public function view($id) {
        // Ambil data KRS berdasarkan id
        if (!$this->model->getOne($id)) {
            // Jika KRS tidak ditemukan, redirect ke index
            header("Location: index.php?controller=Krs&action=index");
            exit;
        }
        
        $krs = [
            'ID_KRS' => $this->model->ID_KRS,
            'ID_Mahasiswa' => $this->model->ID_Mahasiswa,
            'Kode_Mata_Kuliah' => $this->model->Kode_Mata_Kuliah,
            'Nama_Mata_Kuliah' => $this->model->Nama_Mata_Kuliah,
            'Semester' => $this->model->Semester,
            'Nilai_Akhir' => $this->model->Nilai_Akhir,
            'NIM_Mahasiswa' => $this->model->NIM_Mahasiswa,
            'Nama_Mahasiswa' => $this->model->Nama_Mahasiswa
        ];
        
        // Load view
        include_once BASE_PATH . '/views/templates/header.php';
        include_once BASE_PATH . '/views/templates/sidebar.php';
        include_once BASE_PATH . '/views/krs/view.php';
        include_once BASE_PATH . '/views/templates/footer.php';
    }
    
    // Menghapus KRS
    public function delete($id) {
        // Jika konfirmasi diterima
        if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
            if ($this->model->delete($id)) {
                // Redirect ke halaman index dengan pesan sukses
                header("Location: index.php?controller=Krs&action=index&success=1");
            } else {
                // Redirect ke halaman index dengan pesan error
                header("Location: index.php?controller=Krs&action=index&error=1");
            }
            exit;
        }
        
        // Ambil data KRS untuk konfirmasi
        if (!$this->model->getOne($id)) {
            // Jika KRS tidak ditemukan, redirect ke index
            header("Location: index.php?controller=Krs&action=index");
            exit;
        }
        
        $krs = [
            'ID_KRS' => $this->model->ID_KRS,
            'Kode_Mata_Kuliah' => $this->model->Kode_Mata_Kuliah,
            'Nama_Mata_Kuliah' => $this->model->Nama_Mata_Kuliah,
            'Nama_Mahasiswa' => $this->model->Nama_Mahasiswa
        ];
        
        // Load view konfirmasi
        include_once BASE_PATH . '/views/templates/header.php';
        include_once BASE_PATH . '/views/templates/sidebar.php';
        include_once BASE_PATH . '/views/krs/delete.php';
        include_once BASE_PATH . '/views/templates/footer.php';
    }
}