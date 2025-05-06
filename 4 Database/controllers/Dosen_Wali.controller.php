<?php
include_once "config/connection.php";
include_once "models/Dosen_Wali.models.php";
include_once "views/Dosen_Wali.views.php";
include_once "views/Homepage.views.php";

class Dosen_Wali_controller
{
    //Properti Kontroller
    private $dosen_wali;

    //Konstruktor Controller Dosen Wali
    function __construct()
    {
        $this->dosen_wali = new Dosen_Wali(Connection::$host, Connection::$username, Connection::$password, Connection::$dbname);
    }

    //Method yang mengarahkan ke halaman umum controller dosen wali
    public function index()
    {
        //Menyambungkan/membuka jalur ke database
        $this->dosen_wali->open();

        //Meneruskan request umum dari views (mengambil data dosen wali) 
        $this->dosen_wali->getDosenWali();

        //Inisiasi variabel untuk menyimpan data dosen wali
        $data = array();

        //Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
        while ($row = $this->dosen_wali->getResult()) {
            array_push($data, $row);
        }

        //Menutup jalur ke database
        $this->dosen_wali->close();

        //Meneruskannya ke view
        $view = new Dosen_WaliView();
        $view->render($data);
    }

    function add($data)
    {
        //Lengkapi controller untuk melakukan add data
        //Menyambungkan / Membuka jalur ke database 
        $this->dosen_wali->open();

        // Memanggil method addDosenWali pada model Dosen Wali dengan data yang dikirim dari form
        $this->dosen_wali->AddDosenWali($data);

        // Menutup jalur ke database
        $this->dosen_wali->close();

        // Redirect ke halaman Homepage setelah data ditambahkan
        header("Location: Homepage.views.php");
    }

    function edit($id, $data)
    {
        //Lengkapi controller untuk melakukan edit data
        //Menyambungkan / membuka jalur ke database
        $this->dosen_wali->open();

        //Memanggil method editDosenWali pada model Dosen Wali dengan id dan data yang dikirim dari form
        $this->dosen_wali->EditDosenWali($id, $data);

        //Menutup jalur ke database
        $this->dosen_wali->close();

        //Redirect ke halaman Homepage setelah data diedit
        header("Location: Homepage.views.php");
    }

    function delete($id)
    {
        //Lengkapi controller untuk melakukan delete data
        //Menyambungkan / membuka jalur ke database
        $this->dosen_wali->open();

        //Memanggil method deleteDosenWali pada model Dosen Wali dengan id yang dikirim dari form
        $this->dosen_wali->DeleteDosenWali($id);

        //Menutup jalur ke database
        $this->dosen_wali->close();

        //Redirect ke halaman Homepage setelah data dihapus
        header("Location: Homepage.views.php");
    }
}
?>