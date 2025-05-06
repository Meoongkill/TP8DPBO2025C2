<?php
include_once "configure/connect.php";
include_once "model/Mahasiswa.model.php";
include_once "view/mahasiswa.view.php";

class Mahasiswa_Controller{
    //Properti Kontroler
    private $mahasiswa;

    //Konstruktor Controller Mahasiswa
    function __construct(){
        $this->mahasiswa = new Mahasiswa(connect::$db_host, connect::$db_user, connect::$db_pass, connect::$db_name);
    }

    public function index(){
        //Menyambungkan/membuka jalur ke database
        $this->mahasiswa->open();

        //Meneruskan request umum dari views (mengambil data mahasiswa) 
        $this->mahasiswa->getMahasiswa();

        //Inisiasi variabel untuk menyimpan data mahasiswa
        $data = array();

        //Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
        while ($row = $this->mahasiswa->getResult()) {
            array_push($data, $row);
        }

        //Menutup jalur ke database
        $this->mahasiswa->close();

        //Meneruskannya ke view
        $view = new MahasiswaView();
        $view->render($data);
    }

    function add_Mahasiswa($data){
        //Lengkapi controller untuk melakukan add data
        //Menyambungkan / Membuka jalur ke database 
        $this->mahasiswa->open();

        // Memanggil method addMahasiswa pada model Mahasiswa dengan data yang dikirim dari form
        $this->mahasiswa->AddMahasiswa($data);

        // Menutup jalur ke database
        $this->mahasiswa->close();

        // Redirect ke halaman Index setelah data ditambahkan
        header("Location: index.php?mahasiswa");
    }

    function formEdit($id){
        //Menyambungkan / membuka jalur ke database
        $this->mahasiswa->open();

        // Memanggil method getMahasiswaById pada model Mahasiswa dengan id yang dikirim dari form
        $this->mahasiswa->getMahasiswaById($id);

        // Inisiasi variabel untuk menyimpan data mahasiswa
        $data = $this->mahasiswa->getResult();

        // Menutup jalur ke database
        $this->mahasiswa->close();

        //Meneruskan data ke view untuk ditampilkan pada form edit
        $view = new MahasiswaView();
        $view->renderFormEdit($data);
    }

    function edit_Mahasiswa($id, $data){
        //Lengkapi controller untuk melakukan edit data
        //Menyambungkan / membuka jalur ke database
        $this->mahasiswa->open();

        // Memanggil method editMahasiswa pada model Mahasiswa dengan id dan data yang dikirim dari form
        $this->mahasiswa->EditMahasiswa($id, $data);

        // Menutup jalur ke database
        $this->mahasiswa->close();

        // Redirect ke halaman Index setelah data diupdate  
        header("Location: index.php?mahasiswa");
    }

    function delete_Mahasiswa($id){
        //Lengkapi controller untuk melakukan delete data
        //Menyambungkan / membuka jalur ke database
        $this->mahasiswa->open();

        // Memanggil method deleteMahasiswa pada model Mahasiswa dengan id yang dikirim dari form
        $this->mahasiswa->DeleteMahasiswa($id);

        // Menutup jalur ke database
        $this->mahasiswa->close();
        
        // Redirect ke halaman Index setelah data dihapus
        header("Location: index.php?mahasiswa");
    }
    
}
?>