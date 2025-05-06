<?php
include_once "Configuration/connection.php";
include_once "Models/Mahasiswa.models.php";
include_once "Models/Dosen_Wali.models.php";
include_once "Views/Mahasiswa.views.php";
include_once "Views/Homepage.views.php";

class Mahasiswa_controller
{
    //Properti Kontroller
    private $mahasiswa;
    private $dosen_wali;

    //Konstruktor Controller Mahasiswa
    function __construct()
    {
        $this->mahasiswa = new Mahasiswa(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
        $this->dosen_wali = new Dosen_Wali(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    }

    //Method yang mengarahkan ke halaman umum controller mahasiswa
    public function index()
    {
        //Menyambungkan/membuka jalur ke database
        $this->mahasiswa->open();
        $this->dosen_wali->open();

        //Meneruskan request umum dari views (mengambil data mahasiswa) 
        $this->mahasiswa->getMahasiswa();
        $this->dosen_wali->getDosenWali();

        //Inisiasi variabel untuk menyimpan data mahasiswa
        $data = array(
            'mahasiswa' => array(),
            'dosen_wali' => array()
        );

        //Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
        while ($row = $this->mahasiswa->getResult()) {
            array_push($data, $row);
        }
        while ($row = $this->dosen_wali->getResult()) {
            array_push($data['dosen_wali'], $row);
        }


        //Menutup jalur ke database
        $this->mahasiswa->close();
        $this->dosen_wali->close();

        //Meneruskannya ke view
        $view = new MahasiswaView();
        $view->render($data);
    }

    function add($data)
    {
        //Lengkapi controller untuk melakukan add data
        //Menyambungkan / membuka jalur ke database
        $this->mahasiswa->open();

        //Memanggil method addMahasiswa pada model Mahasiswa dengan data yang dikirim dari form
        $this->mahasiswa->AddMahasiswa($data);

        //Menutup jalur ke database
        $this->mahasiswa->close();

        //Redirect ke halaman Homepage setelah data ditambahkan
        header("Location: Homepage.views.php");
    }

    function edit($id, $data)
    {
        //Lengkapi controller untuk melakukan edit data
        //Menyambungkan / membuka jalur ke database
        $this->mahasiswa->open();

        //Memanggil method editMahasiswa pada model Mahasiswa dengan data yang dikirim dari form
        $this->mahasiswa->EditMahasiswa($id, $data);

        //Menutup jalur ke database
        $this->mahasiswa->close();

        //Redirect ke halaman Homepage setelah data diedit
        header("Location: Homepage.views.php");
    }

    function delete($id)
    {
        //Lengkapi controller untuk melakukan delete data
        //Menyambungkan / membuka jalur ke database
        $this->mahasiswa->open();

        //Memanggil method deleteMahasiswa pada model Mahasiswa dengan id yang dikirim dari form
        $this->mahasiswa->DeleteMahasiswa($id);

        //Menutup jalur ke database
        $this->mahasiswa->close();

        //Redirect ke halaman Homepage setelah data dihapus
        header("Location: Homepage.views.php");
    }

}
?>