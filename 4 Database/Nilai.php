<?php
include_once("Views/Template.class.php");
include_once("Models/DB.models.php");
include_once("Controllers/Nilai.controller.php");

$nilai = new Nilai_Controller();

if (isset($_POST['add'])) {
    // Lengkapi bagian untuk mengambil post data
    $data = $_POST;
    $nilai->add($data);
} else if (!empty($_GET['id_hapus'])) {
    // Lengkapi bagian untuk menghapus data
    $id = $_GET['id_hapus'];
    $nilai->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // Lengkapi bagian untuk mengedit status data
    $id = $_GET['id_edit'];
    $nilai->edit($id, $data);
} else {
    $nilai->index();
}
?>