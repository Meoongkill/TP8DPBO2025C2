<?php

class Dosen_WaliView
{
    public function render($data)
    {
        $no = 1;
        $dataDosenWali = null;
        foreach ($data as $val) {
            list($id, $nama_dosen_wali, $jabatan_dosen_wali, $peruntukan_semester_dosen_wali) = $val;
            $dataDosenWali .= "<tr class='text-center align-middle'>
                <td>" . $no++ . "</td>
                <td>" . $nama_dosen_wali . "</td>
                <td>" . $jabatan_dosen_wali . "</td>
                <td>" . $peruntukan_semester_dosen_wali . "</td>
                <td>
                    <a href='dosen_wali.php?id_edit=" . $id . "' class='btn btn-warning'>Edit</a>
                    <a href='dosen_wali.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        // Load the template and replace placeholders
        $tpl = new Template("Templates/Dosen_Wali.html");
        $tpl->replace("JUDUL", "Dosen Wali");
        $tpl->replace("DATA_TABEL", $dataDosenWali);
        $tpl->write();
    }
}
?>