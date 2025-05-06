<?php
include_once("views/Template.views.php");
include_once("models/DB.models.php");
include_once("controllers/dosen_wali.controller.php");
include_once("controllers/mahasiswa.controller.php");
include_once("controllers/krs.controller.php");
include_once("controllers/mata_kuliah.controller.php");
include_once("controllers/nilai.controller.php");
include_once("controllers/kelas.controller.php");

$dosen_wali = new dosen_wali_controller();
$mahasiswa = new mahasiswa_controller();
$kartu_rencana_studi = new krs_controller();
$mata_kuliah = new mata_kuliah_controller();
$nilai = new nilai_controller();
$kelas = new kelas_controller();

//Buat Dosen Wali
if(isset($_POST['add_dosen_wali'])) {
    $data = $_POST;
    $dosen_wali->add_DosenWali($data);
} else if (!empty($_GET['id_hapus_dosen_wali'])) {
    $id = $_GET['id_hapus_dosen_wali'];
    $dosen_wali->delete_DosenWali($id);
} else if (!empty($_GET['id_edit_dosen_wali'])) {
    $id = $_GET['id_edit_dosen_wali'];
    $dosen_wali->edit_DosenWali($id, $data);
} 
//Buat Mahasiswa
else if (isset($_POST['add_mahasiswa'])) {
    $data = $_POST;
    $mahasiswa->add_Mahasiswa($data);
} else if (!empty($_GET['id_hapus_mahasiswa'])) {
    $id = $_GET['id_hapus_mahasiswa'];
    $mahasiswa->delete_Mahasiswa($id);
} else if (!empty($_GET['id_edit_mahasiswa'])) {
    $id = $_GET['id_edit_mahasiswa'];
    $mahasiswa->edit_Mahasiswa($id, $data);
}

//Buat Kartu Rencana Studi
else if (isset($_POST['add_krs'])) {
    $data = $_POST;
    $kartu_rencana_studi->add_KRS($data);
} else if (!empty($_GET['id_hapus_krs'])) {
    $id = $_GET['id_hapus_krs'];
    $kartu_rencana_studi->delete_KRS($id);
} else if (!empty($_GET['id_edit_krs'])) {
    $id = $_GET['id_edit_krs'];
    $kartu_rencana_studi->edit_KRS($id, $data);
}

//Buat Mata Kuliah
else if (isset($_POST['add_mata_kuliah'])) {
    $data = $_POST;
    $mata_kuliah->add_MataKuliah($data);
} else if (!empty($_GET['id_hapus_mata_kuliah'])) {
    $id = $_GET['id_hapus_mata_kuliah'];
    $mata_kuliah->delete_MataKuliah($id);
} else if (!empty($_GET['id_edit_mata_kuliah'])) {
    $id = $_GET['id_edit_mata_kuliah'];
    $mata_kuliah->edit_MataKuliah($id, $data);
}

//Buat Nilai
else if (isset($_POST['add_nilai'])) {
    $data = $_POST;
    $nilai->add_Nilai($data);
} else if (!empty($_GET['id_hapus_nilai'])) {
    $id = $_GET['id_hapus_nilai'];
    $nilai->delete_Nilai($id);
} else if (!empty($_GET['id_edit_nilai'])) {
    $id = $_GET['id_edit_nilai'];
    $nilai->edit_Nilai($id, $data);
}

//Buat Kelas
else if (isset($_POST['add_kelas'])) {
    $data = $_POST;
    $kelas->add_Kelas($data);
} else if (!empty($_GET['id_hapus_kelas'])) {
    $id = $_GET['id_hapus_kelas'];
    $kelas->delete_Kelas($id);
} else if (!empty($_GET['id_edit_kelas'])) {
    $id = $_GET['id_edit_kelas'];
    $kelas->edit_Kelas($id, $data);
} 
else {
    // Default action or index page
    $dosen_wali->index(); // Default action for Dosen Wali
    $mahasiswa->index(); // Default action for Mahasiswa
    $kartu_rencana_studi->index(); // Default action for Kartu Rencana Studi
    $mata_kuliah->index(); // Default action for Mata Kuliah
    $nilai->index(); // Default action for Nilai
    $kelas->index(); // Default action for Kelas
}
?>