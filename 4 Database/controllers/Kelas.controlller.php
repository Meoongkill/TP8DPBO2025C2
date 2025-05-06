<?php
include_once "Configuration/connection.php";
include_once "Models/Kelas.models.php";
include_once "Models/Mata_Kuliah.models.php";
include_once "Views/Kelas.views.php";
include_once "Views/Homepage.views.php";

class Kelas_controller
{
    //Properti Kontroller
    private $kelas;
    private $mataKuliah;

    //Konstruktor Controller Kelas
    function __construct()
    {
        $this->kelas = new Kelas(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
        $this->mataKuliah = new Mata_Kuliah(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    }

    //Method yang mengarahkan ke halaman umum controller kelas
    public function index()
    {
        //Menyambungkan/membuka jalur ke database
        $this->kelas->open();
        $this->mataKuliah->open();

        //Meneruskan request umum dari views (mengambil data kelas) 
        $this->kelas->getKelas();
        $this->mataKuliah->getMataKuliah();

        //Inisiasi variabel untuk menyimpan data kelas
        $data = array(
            'kelas' => array(),
            'mataKuliah' => array()
        );

        //Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
        while ($row = $this->kelas->getResult()) {
            array_push($data, $row);
        }
        while ($row = $this->mataKuliah->getResult()) {
            array_push($data['mataKuliah'], $row);
        }

        //Menutup jalur ke database
        $this->kelas->close();
        $this->mataKuliah->close();

        //Meneruskannya ke view
        $view = new KelasView();
        $view->render($data);
    }

    function add($data)
    {
        //Lengkapi controller untuk melakukan add data
        //Menyambungkan / membuka jalur ke database
        $this->kelas->open();

        //Memanggil method addKelas pada model Kelas dengan data yang dikirim dari form
        $this->kelas->AddKelas($data);

        //Menutup jalur ke database
        $this->kelas->close();

        //Redirect ke halaman Homepage setelah data ditambahkan
        header("Location: Homepage.views.php");
    }

    function edit($id, $data)
    {
        //Lengkapi controller untuk melakukan edit data
        //Menyambungkan / membuka jalur ke database
        $this->kelas->open();

        //Memanggil method editKelas pada Model Kelas dengan data yang yang dikirim dari form
        $this->kelas->EditKelas($id, $data);

        //Menutup jalur ke database
        $this->kelas->close();

        //Redirect ke halaman Homepage setelah data diubah
        header("Location: Homepage.views.php");
    }

    function delete($id)
    {
        //Lengkapi controller untuk melakukan delete data
        //Menyambungkan / membuka jalur ke database
        $this->kelas->open();

        //Memanggil method deleteKelas pada model Kelas dengan id yang dikirim dari form
        $this->kelas->DeleteKelas($id);

        //Menutup jalur ke database
        $this->kelas->close();

        //Redirect ke halaman Homepage setelah data dihapus
        header("Location: Homepage.views.php");
    }
}
?>