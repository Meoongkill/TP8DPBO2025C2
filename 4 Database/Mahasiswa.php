<?php
include_once("Views/Template.class.php");
include_once("Models/DB.models.php");
include_once("Controllers/Mahasiswa.controller.php");

$mahasiswa = new Mahasiswa_Controller();

if(isset($_POST['add'])) {
    // Lengkapi bagian untuk mengambil post data
    $data = $_POST;
    $mahasiswa->add($data);
} else if (!empty($_GET['id_hapus'])) {
    // Lengkapi bagian untuk menghapus data
    $id = $_GET['id_hapus'];
    $mahasiswa->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // Lengkapi bagian untuk mengedit status data
    $id = $_GET['id_edit'];
    $mahasiswa->edit($id, $data);
} else {
    $mahasiswa->index();
}
?>