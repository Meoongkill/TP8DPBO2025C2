<?php

class Kartu_Rencana_StudiView
{
    public function render($data)
    {
        $no = 1;
        $dataKRS = null;
        foreach ($data as $val) {
            list($ID_KRS, $ID_Mahasiswa, $ID_Mata_Kuliah, $Tahun_Akademik, $Semester) = $val;
            $dataKRS .= "<tr class='text-center align-middle'>
                <td>" . $no++ . "</td>
                <td>" . $ID_Mahasiswa . "</td>
                <td>" . $ID_Mata_Kuliah . "</td>
                <td>" . $Tahun_Akademik . "</td>
                <td>" . $Semester . "</td>
                <td>
                    <a href='kartu_rencana_studi.php?id_edit=" . $ID_KRS . "' class='btn btn-warning'>Edit</a>
                    <a href='kartu_rencana_studi.php?id_hapus=" . $ID_KRS . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        // Load the template and replace placeholders
        $tpl = new Template("templates/Kartu_Rencana_Studi.html");
        $tpl->replace("JUDUL", "Kartu Rencana Studi");
        $tpl->replace("DATA_TABEL", $dataKRS);
        $tpl->write();
    }

    public function renderFormEdit($data)
    {
        list($ID_KRS, $ID_Mahasiswa, $ID_Mata_Kuliah, $Tahun_Akademik, $Semester) = $data;
        // Load the template and replace placeholders
        $tpl = new Template("templates/Kartu_Rencana_Studi_Form.html");
        $tpl->replace("Data_ID", $ID_KRS);
        $tpl->replace("Data_ID_Mahasiswa", $ID_Mahasiswa);
        $tpl->replace("Data_ID_Mata_Kuliah", $ID_Mata_Kuliah);
        $tpl->replace("Data_Tahun_Akademik", $Tahun_Akademik);
        $tpl->replace("Data_Semester", $Semester);
        $tpl->write();
    }
}
?>