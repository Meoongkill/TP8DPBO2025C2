<?php
include_once("views/Template.views.php");
include_once("models/DB.models.php");
include_once("controllers/kelas.controller.php");

$kelas = new kelas_controller();

if (isset($_POST['add'])) {
    $data = $_POST;
    $kelas->add_Kelas($data);
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $kelas->delete_Kelas($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $kelas->edit_Kelas($id, $data);
} else {
    $kelas->index();
}

?>