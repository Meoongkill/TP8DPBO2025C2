<?php

include_once("view/template.view.php");
include_once("model/DB.model.php");
include_once("controller/KRS.control.php");

$krs = new KRS_Controller();

if (isset($_POST['add_krs'])) {
    $data = $_POST;
    $krs->add_KRS($data);
} else if (!empty($_GET['id_hapus_krs'])) {
    $id = $_GET['id_hapus_krs'];
    $krs->delete_KRS($id);
} else if (!empty($_GET['id_edit_krs'])) {
    $id = $_GET['id_edit_krs'];
    $krs->edit_KRS($id, $data);
} else {
    $krs->index();
    header("Location: index.php");
    exit;
}
?>