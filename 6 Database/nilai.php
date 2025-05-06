<?php
include_once("views/Template.views.php");
include_once("models/DB.models.php");
include_once("controllers/nilai.controller.php");

$nilai = new nilai_controller();

if (isset($_POST['add'])) {
    $data = $_POST;
    $nilai->add_Nilai($data);
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $nilai->delete_Nilai($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $nilai->edit_Nilai($id, $data);
} else {
    $nilai->index();
}
?>