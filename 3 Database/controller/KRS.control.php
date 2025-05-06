<?php
include_once "configure/connect.php";
include_once "model/KRS.model.php";
include_once "model/Mahasiswa.model.php";
include_once "view/KRS.view.php";

class KRS_Controller{
    //properti kontroler
    private $krs;

    //konstruktor kontroler KRS
    function __construct(){
        $this->krs = new KRS(connect::$db_host, connect::$db_user, connect::$db_pass, connect::$db_name);
    }

    //method yang mengarahkan ke halaman umum kontroler KRS
    public function index(){
        //Menyambungkan/membuka jalur ke database
        $this->krs->open();

        //Meneruskan request umum dari views (mengambil data KRS) 
        $this->krs->getKRS();

        //Inisiasi variabel untuk menyimpan data KRS
        $data = array();

        //Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
        while ($row = $this->krs->getResult()) {
            array_push($data, $row);
        }

        //Menutup jalur ke database
        $this->krs->close();

        //Meneruskannya ke view
        $view = new KRSView();
        $view->render($data);
    }

    function add_KRS($data){
        //Lengkapi controller untuk melakukan add data
        //Menyambungkan / Membuka jalur ke database 
        $this->krs->open();

        // Memanggil method addKRS pada model KRS dengan data yang dikirim dari form
        $this->krs->AddKRS($data);

        // Menutup jalur ke database
        $this->krs->close();

        // Redirect ke halaman index setelah data ditambahkan
        header("Location: index.php?krs");
    }

    function formEdit($id){
        //Menyambungkan / membuka jalur ke database
        $this->krs->open();

        // Memanggil method getKRSById pada model KRS dengan id yang dikirim dari form
        $this->krs->getKRSById($id);

        // Inisiasi variabel untuk menyimpan data KRS
        $data = $this->krs->getResult();

        // Menutup jalur ke database
        $this->krs->close();

        //Meneruskan data ke view untuk ditampilkan pada form edit
        $view = new KRSView();
        $view->renderFormEdit($data);
    }

    function edit_KRS($id, $data){
        //Lengkapi controller untuk melakukan edit data
        //Menyambungkan / membuka jalur ke database
        $this->krs->open();

        // Memanggil method editKRS pada model KRS dengan id dan data yang dikirim dari form
        $this->krs->EditKRS($id, $data);

        // Menutup jalur ke database
        $this->krs->close();

        // Redirect ke halaman index setelah data diedit
        header("Location: index.php");
    }

    function delete_KRS($id){
        //Lengkapi controller untuk melakukan delete data
        //Menyambungkan / membuka jalur ke database
        $this->krs->open();

        // Memanggil method deleteKRS pada model KRS dengan id yang dikirim dari form
        $this->krs->DeleteKRS($id);

        // Menutup jalur ke database
        $this->krs->close();

        // Redirect ke halaman index setelah data dihapus
        header("Location: index.php?krs");
    }

    function viewkrs($id){
        $this->krs->open();
        $this->krs->getKRSById($id);
        $krs = $this->krs->getResult();

        // Mendapatkan data mahasiswa berdasarkan nim
        $this->krs->getMahasiswaById($krs['id']);
        $mahasiswa = array();

        while ($row = $this->krs->getResult()) {
            array_push($mahasiswa, $row);
        }
        $this->krs->close();

        // Meneruskan data ke view untuk ditampilkan pada form edit
        $view = new KRSView();
        $view->renderKRSList($krs, $mahasiswa);
    }
}
?>