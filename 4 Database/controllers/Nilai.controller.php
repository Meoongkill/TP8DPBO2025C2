<?php
include_once "Configuration/connection.php";
include_once "Models/Nilai.model.php";
include_once "Models/Mahasiswa.models.php";
include_once "Models/MataKuliah.models.php";
include_once "Views/Nilai.view.php";
include_once "Views/Homepage.view.php";

class Nilai_controller
{
    // Properti Kontroller
    private $nilai;
    private $mahasiswa;
    private $matakuliah;

    // Konstruktor Controller Nilai
    function __construct()
    {
        $this->nilai = new Nilai(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
        $this->mahasiswa = new Mahasiswa(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
        $this->matakuliah = new MataKuliah(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    }

    // Method yang mengarahkan ke halaman umum controller nilai
    public function index()
    {
        // Menyambungkan/membuka jalur ke database
        $this->nilai->open();
        $this->mahasiswa->open();
        $this->matakuliah->open();

        // Meneruskan request umum dari views (mengambil data nilai) 
        $this->nilai->getNilai();
        $this->mahasiswa->getMahasiswa();
        $this->matakuliah->getMataKuliah();

        // Inisiasi variabel untuk menyimpan data nilai
        $data = array(
            'nilai' => array(),
            'mahasiswa' => array(),
            'matakuliah' => array()
        );

        // Push data yang berbentuk object 1 per 1 ke variabel yang sudah dibuat tadi agar dikemas dalam bentuk array
        while ($row = $this->nilai->getResult()) {
            array_push($data, $row);
        }
        while ($row = $this->mahasiswa->getResult()) {
            array_push($data['mahasiswa'], $row);
        }
        while ($row = $this->matakuliah->getResult()) {
            array_push($data['matakuliah'], $row);
        }

        // Menutup jalur ke database
        $this->nilai->close();
        $this->mahasiswa->close();
        $this->matakuliah->close();

        // Meneruskannya ke view
        $view = new NilaiView();
        $view->render($data);
    }

    function add($data)
    {
        // Lengkapi controller untuk melakukan add data
        // Menyambungkan / membuka jalur ke database
        $this->nilai->open();

        // Memanggil method addNilai pada model Nilai dengan data yang dikirim dari form
        $this->nilai->AddNilai($data);

        // Menutup jalur ke database
        $this->nilai->close();

        // Redirect ke halaman Homepage setelah data ditambahkan
        header("Location: Homepage.views.php");
    }

    function edit($id, $data)
    {
        // Lengkapi controller untuk melakukan edit data
        // Menyambungkan / membuka jalur ke database
        $this->nilai->open();

        // Memanggil method editNilai pada model Nilai dengan id dan data yang dikirim dari form
        $this->nilai->editNilai($id, $data);

        // Menutup jalur ke database
        $this->nilai->close();

        // Redirect ke halaman Homepage setelah data diedit
        header("Location: Homepage.views.php");
    }

    function delete($id)
    {
        // Lengkapi controller untuk melakukan delete data
        // Menyambungkan / membuka jalur ke database
        $this->nilai->open();

        // Memanggil method deleteNilai pada model Nilai dengan id yang dikirim dari form
        $this->nilai->deleteNilai($id);

        // Menutup jalur ke database
        $this->nilai->close();

        // Redirect ke halaman Homepage setelah data diedit
        header("Location: Homepage.views.php");
    }
}
?>