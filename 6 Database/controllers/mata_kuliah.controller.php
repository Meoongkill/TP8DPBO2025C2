<?php
include_once "configuration/connection.php";
include_once "models/mata_kuliah.models.php";
include_once "views/mata_kuliah.views.php";

class mata_kuliah_controller
{
    // Properti Kontroller
    private $mata_kuliah;

    // Konstruktor Controller Mata Kuliah
    function __construct()
    {
        $this->mata_kuliah = new mata_kuliah(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    }

    // Method yang mengarahkan ke halaman umum controller mata kuliah
    public function index()
    {
        // Menyambungkan/membuka jalur ke database
        $this->mata_kuliah->open();

        // Meneruskan request umum dari views (mengambil data mata kuliah) 
        $this->mata_kuliah->getMataKuliah();

        // Inisiasi variabel untuk menyimpan data mata kuliah
        $data = array();

        // Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
        while ($row = $this->mata_kuliah->getResult()) {
            array_push($data, $row);
        }

        // Menutup jalur ke database
        $this->mata_kuliah->close();

        // Meneruskannya ke view
        $view = new Mata_KuliahView();
        $view->render($data);
    }

    function add_MataKuliah($data)
    {
        // Lengkapi controller untuk melakukan add data
        // Menyambungkan / membuka jalur ke database
        $this->mata_kuliah->open();

        // Memanggil method addMataKuliah pada model Mata_Kuliah dengan data yang dikirim dari form
        $this->mata_kuliah->AddMataKuliah($data);

        // Menutup jalur ke database
        $this->mata_kuliah->close();

        // Redirect ke halaman Index setelah data ditambahkan
        header("Location: Index.php");
    }

    function edit_MataKuliah($id, $data)
    {
        // Lengkapi controller untuk melakukan edit data
        // Menyambungkan / membuka jalur ke database
        $this->mata_kuliah->open();

        //Memanggil method editMataKuliah pada model Mata_Kuliah dengan id dan data yang dikirim dari form
        $this->mata_kuliah->editMataKuliah($id, $data);

        // Menutup jalur ke database
        $this->mata_kuliah->close();

        //Redirect ke halaman Index setelah data diedit
        header("Location: Index.php");
    }

    function delete_MataKuliah($id)
    {
        // Lengkapi controller untuk melakukan delete
        // Menyambungkan / membuka jalur ke database
        $this->mata_kuliah->open();

        // Memanggil method deleteMataKuliah pada model Mata_Kuliah dengan id yang dikirim dari form
        $this->mata_kuliah->deleteMataKuliah($id);

        // Menutup jalur ke database
        $this->mata_kuliah->close();

        // Redirect ke halaman Index setelah data dihapus
        header("Location: Index.php");
    }
}
?>