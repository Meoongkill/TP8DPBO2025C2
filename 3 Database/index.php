<?php

include_once("view/template.view.php");
include_once("model/DB.model.php");
include_once("controller/Mahasiswa.control.php");
include_once("controller/KRS.control.php");

$mahasiswa = new Mahasiswa_Controller();
$krs = new KRS_Controller();

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
} 

// Kartu Rencana Studi
else if (isset($_POST['add_krs'])) {
    $data = $_POST;
    $krs->add_KRS($data);
} else if (!empty($_GET['id_hapus_krs'])) {
    $id = $_GET['id_hapus_krs'];
    $krs->delete_KRS($id);
} else if (!empty($_GET['id_edit_krs'])) {
    $id = $_GET['id_edit_krs'];
    $krs->edit_KRS($id, $data);
} else {
    // Default action or error handling
    // You can redirect to a default page or show an error message
    $mahasiswa->index();
    $krs->index();
    header("Location: index.php");
    exit;
}
?>