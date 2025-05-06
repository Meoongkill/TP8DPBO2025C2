<?php

class Dosen_WaliView
{
    public function render($data)
    {
        $no = 1;
        $dataDosenWali = null;
        foreach ($data as $val) {
            list($ID_Dosen_Wali, $Nama_Dosen_Wali, $Jabatan_Dosen_Wali, $Peruntukan_Semester) = $val;
            $dataDosenWali .= "<tr class='text-center align-middle'>
                <td>" . $no++ . "</td>
                <td>" . $Nama_Dosen_Wali . "</td>
                <td>" . $Jabatan_Dosen_Wali . "</td>
                <td>" . $Peruntukan_Semester . "</td>
                <td>
                    <a href='dosen_wali.php?id_edit=" . $ID_Dosen_Wali . "' class='btn btn-warning'>Edit</a>
                    <a href='dosen_wali.php?id_hapus=" . $ID_Dosen_Wali . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        // Load the template and replace placeholders
        $tpl = new Template("templates/Dosen_Wali.html");
        $tpl->replace("JUDUL", "Dosen Wali");
        $tpl->replace("DATA_TABEL", $dataDosenWali);
        $tpl->write();
    }

    public function renderFormEdit($data)
    {
        list($ID_Dosen_Wali, $Nama_Dosen_Wali, $Jabatan_Dosen_Wali, $Peruntukan_Semester) = $data;
        // Load the template and replace placeholders
        $tpl = new Template("templates/Dosen_Wali_Form.html");
        $tpl->replace("Data_ID", $ID_Dosen_Wali);
        $tpl->replace("Data_NAMA_DOSEN_WALI", $Nama_Dosen_Wali);
        $tpl->replace("Data_JABATAN_DOSEN_WALI", $Jabatan_Dosen_Wali);
        $tpl->replace("Data_PERUNTUKAN_SEMESTER_DOSEN_WALI", $Peruntukan_Semester);
        $tpl->write();
    }
}
?>