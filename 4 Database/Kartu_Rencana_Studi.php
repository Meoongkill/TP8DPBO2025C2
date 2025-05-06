<?php
include_once("Views/Template.class.php");
include_once("Models/DB.models.php");
include_once("Controllers/Kartu_Rencana_Studi.controller.php");

$kartu_rencana_studi = new Kartu_Rencana_Studi_Controller();

if(isset($_POST['add'])) {
    // Lengkapi bagian untuk mengambil post data
    $data = $_POST;
    $kartu_rencana_studi->add($data);
} else if (!empty($_GET['id_hapus'])) {
    // Lengkapi bagian untuk menghapus data
    $id = $_GET['id_hapus'];
    $kartu_rencana_studi->delete($id);
} else if (!empty($_GET['id_edit'])) {
    // Lengkapi bagian untuk mengedit status data
    $id = $_GET['id_edit'];
    $kartu_rencana_studi->edit($id, $data);
} else {
    $kartu_rencana_studi->index();
}
?>