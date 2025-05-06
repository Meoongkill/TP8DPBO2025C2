<?php
include_once("views/Template.class.php");
include_once("models/DB.models.php");
include_once("controllers/dosen_wali.controller.php");

$dosen_wali = new dosen_wali_controller();

    if (isset($_POST['add'])) {
        $data = $_POST;
        $dosen_wali->add_DosenWali($data);
    } else if (!empty($_GET['id_hapus'])) {
        $id = $_GET['id_hapus'];
        $dosen_wali->delete_DosenWali($id);
    } else if (!empty($_GET['id_edit'])) {
        $id = $_GET['id_edit'];
        $dosen_wali->edit_DosenWali($id, $data);
    } else {
        $dosen_wali->index();
    }
?>