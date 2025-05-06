<?php
include_once "configuration/connection.php";
include_once "models/kelas.models.php";
include_once "models/mata_kuliah.models.php";
include_once "views/kelas.views.php";

class kelas_controller
{
    //Properti Kontroller
    private $kelas;
    private $mataKuliah;

    //Konstruktor Controller Kelas
    function __construct()
    {
        $this->kelas = new kelas(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
        $this->mataKuliah = new mata_kuliah(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
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

    function add_Kelas($data)
    {
        //Lengkapi controller untuk melakukan add data
        //Menyambungkan / membuka jalur ke database
        $this->kelas->open();

        //Memanggil method addKelas pada model Kelas dengan data yang dikirim dari form
        $this->kelas->AddKelas($data);

        //Menutup jalur ke database
        $this->kelas->close();

        //Redirect ke halaman Index setelah data ditambahkan
        header("Location: Index.php");
    }

    function edit_Kelas($id, $data)
    {
        //Lengkapi controller untuk melakukan edit data
        //Menyambungkan / membuka jalur ke database
        $this->kelas->open();

        //Memanggil method editKelas pada Model Kelas dengan data yang yang dikirim dari form
        $this->kelas->EditKelas($id, $data);

        //Menutup jalur ke database
        $this->kelas->close();

        //Redirect ke halaman Index setelah data diubah
        header("Location: Index.php");
    }

    function delete_Kelas($id)
    {
        //Lengkapi controller untuk melakukan delete data
        //Menyambungkan / membuka jalur ke database
        $this->kelas->open();

        //Memanggil method deleteKelas pada model Kelas dengan id yang dikirim dari form
        $this->kelas->DeleteKelas($id);

        //Menutup jalur ke database
        $this->kelas->close();

        //Redirect ke halaman Index setelah data dihapus
        header("Location: Index.php");
    }
}
?>