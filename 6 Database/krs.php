<?php
include_once("views/Template.views.php");
include_once("models/DB.models.php");
include_once("controllers/krs.controller.php");

$kartu_rencana_studi = new krs_controller();

if(isset($_POST['add'])) {
    $data = $_POST;
    $kartu_rencana_studi->add_KRS($data);
} else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $kartu_rencana_studi->delete_KRS($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $kartu_rencana_studi->edit_KRS($id, $data);
} else {
    $kartu_rencana_studi->index();
}
?>