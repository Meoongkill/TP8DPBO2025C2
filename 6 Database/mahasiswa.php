<?php
include_once("views/Template.views.php");
include_once("models/DB.models.php");
include_once("controllers/mahasiswa.controller.php");

$mahasiswa = new mahasiswa_controller();

if(isset($_POST['add'])) {
    $data = $_POST;
    $mahasiswa->add_Mahasiswa($data);
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $mahasiswa->delete_Mahasiswa($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $mahasiswa->edit_Mahasiswa($id, $data);
} else {
    $mahasiswa->index();
}
?>