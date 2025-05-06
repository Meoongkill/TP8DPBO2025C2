<?php
include_once "configuration/connection.php";
include_once "models/krs.models.php";
include_once "models/mahasiswa.models.php";
include_once "models/mata_kuliah.models.php";
include_once "views/krs.views.php";

class krs_controller
{
    //Properti Kontroller
    private $krs;
    private $mahasiswa;
    private $mata_kuliah;

    //Konstruktor Controller Kartu Rencana Studi
    function __construct()
    {
        $this->krs = new krs(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
        $this->mahasiswa = new Mahasiswa(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
        $this->mata_kuliah = new Mata_Kuliah(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    }

    //Method yang mengarahkan ke halaman umum controller kartu rencana studi
    public function index()
    {
        //Menyambungkan/membuka jalur ke database
        $this->krs->open();
        $this->mahasiswa->open();
        $this->mata_kuliah->open();

        //Meneruskan request umum dari views (mengambil data kartu rencana studi) 
        $this->krs->getKartuRencanaStudi();
        $this->mahasiswa->getMahasiswa();
        $this->mata_kuliah->getMataKuliah();

        //Inisiasi variabel untuk menyimpan data kartu rencana studi
        $data = array(
            'krs' => array(),
            'mahasiswa' => array(),
            'mata_kuliah' => array()
        );

        //Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
        while ($row = $this->krs->getResult()) {
            array_push($data, $row);
        }
        while ($row = $this->mahasiswa->getResult()) {
            array_push($data['mahasiswa'], $row);
        }
        while ($row = $this->mata_kuliah->getResult()) {
            array_push($data['mata_kuliah'], $row);
        }

        //Menutup jalur ke database
        $this->krs->close();
        $this->mahasiswa->close();
        $this->mata_kuliah->close();

        //Meneruskannya ke view
        $view = new Kartu_Rencana_StudiView();
        $view->render($data);
    }

    function add_KRS($data)
    {
        //Lengkapi controller untuk melakukan add data
        //Menyambungkan / membuka jalur ke database 
        $this->krs->open();

        // Memanggil method addKartuRencanaStudi pada model Kartu Rencana Studi dengan data yang dikirim dari form
        $this->krs->AddKartuRencanaStudi($data);

        // Menutup jalur ke database
        $this->krs->close();

        // Redirect ke halaman Index setelah data ditambahkan
        header("Location: Index.php");
    }

    function edit_KRS($id, $data)
    {
        //Lengkapi controller untuk melakukan edit data
        //Menyambungkan / membuka jalur ke database 
        $this->krs->open();

        // Memanggil method editKartuRencanaStudi pada model Kartu Rencana Studi dengan data yang dikirim dari form
        $this->krs->EditKartuRencanaStudi($id, $data);

        // Menutup jalur ke database
        $this->krs->close();

        // Redirect ke halaman Index setelah data diedit
        header("Location: Index.php");
    }

    function delete_KRS($id)
    {
        //Lengkapi controller untuk melakukan delete data
        //Menyambungkan / membuka jalur ke database 
        $this->krs->open();

        // Memanggil method deleteKartuRencanaStudi pada model Kartu Rencana Studi dengan id yang dikirim dari form
        $this->krs->DeleteKartuRencanaStudi($id);

        // Menutup jalur ke database
        $this->krs->close();

        // Redirect ke halaman Index setelah data dihapus
        header("Location: Index.php");
    }
}
?>
