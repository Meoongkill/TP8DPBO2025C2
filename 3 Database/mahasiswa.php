<?php

include_once("view/template.view.php");
include_once("model/DB.model.php");
include_once("controller/Mahasiswa.control.php");

$mahasiswa = new Mahasiswa_Controller();

//Mahasiswa
if(isset($_POST['add_mahasiswa'])) {
    $data = $_POST;
    $mahasiswa->add_Mahasiswa($data);
} else if (!empty($_GET['id_hapus_mahasiswa'])) {
    $id = $_GET['id_hapus_mahasiswa'];
    $mahasiswa->delete_Mahasiswa($id);
} else if (!empty($_GET['id_edit_mahasiswa'])) {
    $id = $_GET['id_edit_mahasiswa'];
    $mahasiswa->edit_Mahasiswa($id, $data);
} else {
    $mahasiswa->index();
    header("Location: index.php");
    exit;
}
?>