<?php

class Mata_KuliahView
{
    public function render($data)
    {
        $no = 1;
        $dataMataKuliah = null;
        foreach ($data as $val) {
            list($ID_Mata_Kuliah, $Kode_Mata_Kuliah, $Nama_Mata_Kuliah, $Semester_Peruntukan, $Pengampu_Mata_Kuliah) = $val;
            $dataMataKuliah .= "<tr class='text-center align-middle'>
                <td>" . $no++ . "</td>
                <td>" . $Kode_Mata_Kuliah . "</td>
                <td>" . $Nama_Mata_Kuliah . "</td>
                <td>" . $Semester_Peruntukan . "</td>
                <td>" . $Pengampu_Mata_Kuliah . "</td>
                <td>
                    <a href='mata_kuliah.php?id_edit=" . $ID_Mata_Kuliah . "' class='btn btn-warning'>Edit</a>
                    <a href='mata_kuliah.php?id_hapus=" . $ID_Mata_Kuliah . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        // Load the template and replace placeholders
        $tpl = new Template("templates/mata_kuliah.html");
        $tpl->replace("JUDUL", "Mata Kuliah");
        $tpl->replace("DATA_TABEL", $dataMataKuliah);
        $tpl->write();
    }

    public function renderFormEdit($data)
    {
        list($ID_Mata_Kuliah, $Kode_Mata_Kuliah, $Nama_Mata_Kuliah, $Semester_Peruntukan, $Pengampu_Mata_Kuliah) = $data;
        // Load the template and replace placeholders
        $tpl = new Template("templates/mata_kuliah.html");
        $tpl->replace("Data_ID", $ID_Mata_Kuliah);
        $tpl->replace("Data_Kode_Mata_Kuliah", $Kode_Mata_Kuliah);
        $tpl->replace("Data_Nama_Mata_Kuliah", $Nama_Mata_Kuliah);
        $tpl->replace("Data_Semester_Peruntukan", $Semester_Peruntukan);
        $tpl->replace("Data_Pengampu_Mata_Kuliah", $Pengampu_Mata_Kuliah);
        $tpl->write();
    }
}
?>