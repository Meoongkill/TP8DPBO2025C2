<?php
include_once("views/Template.views.php");
include_once("models/DB.models.php");
include_once("controllers/mata_kuliah.controller.php");

$mata_kuliah = new mata_kuliah_controller();

if (isset($_POST['add'])) {
    $data = $_POST;
    $mata_kuliah->add_MataKuliah($data);
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $mata_kuliah->delete_MataKuliah($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $mata_kuliah->edit_MataKuliah($id, $data);
} else {
    $mata_kuliah->index();
}
?>