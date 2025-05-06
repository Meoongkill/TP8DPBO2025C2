<?php
include_once "configuration/connection.php";
include_once "models/Kartu_Rencana_Studi.models.php";
include_once "models/Mahasiswa.models.php";
include_once "models/Mata_Kuliah.models.php";
include_once "views/Kartu_Rencana_Studi.views.php";
include_once "views/Homepage.views.php";

class Kartu_Rencana_Studi_controller
{
    //Properti Kontroller
    private $kartu_rencana_studi;
    private $mahasiswa;
    private $mata_kuliah;

    //Konstruktor Controller Kartu Rencana Studi
    function __construct()
    {
        $this->kartu_rencana_studi = new Kartu_Rencana_Studi(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
        $this->mahasiswa = new Mahasiswa(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
        $this->mata_kuliah = new Mata_Kuliah(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    }

    //Method yang mengarahkan ke halaman umum controller kartu rencana studi
    public function index()
    {
        //Menyambungkan/membuka jalur ke database
        $this->kartu_rencana_studi->open();
        $this->mahasiswa->open();
        $this->mata_kuliah->open();

        //Meneruskan request umum dari views (mengambil data kartu rencana studi) 
        $this->kartu_rencana_studi->getKartuRencanaStudi();
        $this->mahasiswa->getMahasiswa();
        $this->mata_kuliah->getMataKuliah();

        //Inisiasi variabel untuk menyimpan data kartu rencana studi
        $data = array(
            'kartu_rencana_studi' => array(),
            'mahasiswa' => array(),
            'mata_kuliah' => array()
        );

        //Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
        while ($row = $this->kartu_rencana_studi->getResult()) {
            array_push($data, $row);
        }
        while ($row = $this->mahasiswa->getResult()) {
            array_push($data['mahasiswa'], $row);
        }
        while ($row = $this->mata_kuliah->getResult()) {
            array_push($data['mata_kuliah'], $row);
        }

        //Menutup jalur ke database
        $this->kartu_rencana_studi->close();
        $this->mahasiswa->close();
        $this->mata_kuliah->close();

        //Meneruskannya ke view
        $view = new Kartu_Rencana_StudiView();
        $view->render($data);
    }

    function add($data)
    {
        //Lengkapi controller untuk melakukan add data
        //Menyambungkan / membuka jalur ke database 
        $this->kartu_rencana_studi->open();

        // Memanggil method addKartuRencanaStudi pada model Kartu Rencana Studi dengan data yang dikirim dari form
        $this->kartu_rencana_studi->AddKartuRencanaStudi($data);

        // Menutup jalur ke database
        $this->kartu_rencana_studi->close();

        // Redirect ke halaman Homepage setelah data ditambahkan
        header("Location: Homepage.views.php");
    }

    function edit($id, $data)
    {
        //Lengkapi controller untuk melakukan edit data
        //Menyambungkan / membuka jalur ke database 
        $this->kartu_rencana_studi->open();

        // Memanggil method editKartuRencanaStudi pada model Kartu Rencana Studi dengan data yang dikirim dari form
        $this->kartu_rencana_studi->EditKartuRencanaStudi($id, $data);

        // Menutup jalur ke database
        $this->kartu_rencana_studi->close();

        // Redirect ke halaman Homepage setelah data diedit
        header("Location: Homepage.views.php");
    }

    function delete($id)
    {
        //Lengkapi controller untuk melakukan delete data
        //Menyambungkan / membuka jalur ke database 
        $this->kartu_rencana_studi->open();

        // Memanggil method deleteKartuRencanaStudi pada model Kartu Rencana Studi dengan id yang dikirim dari form
        $this->kartu_rencana_studi->DeleteKartuRencanaStudi($id);

        // Menutup jalur ke database
        $this->kartu_rencana_studi->close();

        // Redirect ke halaman Homepage setelah data dihapus
        header("Location: Homepage.views.php");
    }
}
?>
