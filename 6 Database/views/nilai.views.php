<?php

class NilaiView
{
    public function render($data)
    {
        $no = 1;
        $dataNilai = null;
        foreach ($data as $val) {
            list($ID_Nilai, $ID_Mahasiswa, $ID_Mata_Kuliah, $Nilai_Akhir, $Grade) = $val;
            $dataNilai .= "<tr class='text-center align-middle'>
                <td>" . $no++ . "</td>
                <td>" . $ID_Mahasiswa . "</td>
                <td>" . $ID_Mata_Kuliah . "</td>
                <td>" . $Nilai_Akhir . "</td>
                <td>" . $Grade . "</td>
                <td>
                    <a href='index.php?id_edit=" . $ID_Nilai . "' class='btn btn-warning'>Edit</a>
                    <a href='index.php?id_hapus=" . $ID_Nilai . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        // Load the template and replace placeholders
        $tpl = new Template("templates/nilai.html");
        $tpl->replace("JUDUL", "Nilai");
        $tpl->replace("DATA_TABEL", $dataNilai);
        $tpl->write();
    }

    public function renderFormEdit($data)
    {
        list($ID_Nilai, $ID_Mahasiswa, $ID_Mata_Kuliah, $Nilai_Akhir, $Grade) = $data;
        // Load the template and replace placeholders
        $tpl = new Template("templates/nilai_form.html");
        $tpl->replace("Data_ID", $ID_Nilai);
        $tpl->replace("Data_ID_Mahasiswa", $ID_Mahasiswa);
        $tpl->replace("Data_ID_Mata_Kuliah", $ID_Mata_Kuliah);
        $tpl->replace("Data_Nilai_Akhir", $Nilai_Akhir);
        $tpl->replace("Data_Grade", $Grade);
        $tpl->write();
    }
}
?>