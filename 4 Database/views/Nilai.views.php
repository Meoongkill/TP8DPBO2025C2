<?php

class NilaiView
{
    public function render($data)
    {
        $no = 1;
        $dataNilai = null;
        foreach ($data as $val) {
            list($id, $nilai_akhir, $grade, $id_mahasiswa, $id_mata_kuliah) = $val;
            $dataNilai .= "<tr class='text-center align-middle'>
                <td>" . $no++ . "</td>
                <td>" . $nilai_akhir . "</td>
                <td>" . $grade . "</td>
                <td>" . $id_mahasiswa . "</td>
                <td>" . $id_mata_kuliah . "</td>
                <td>
                    <a href='index.php?id_edit=" . $id . "' class='btn btn-warning'>Edit</a>
                    <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        // Load the template and replace placeholders
        $tpl = new Template("templates/nilai.html");
        $tpl->replace("JUDUL", "Nilai");
        $tpl->replace("DATA_TABEL", $dataNilai);
        $tpl->write();
    }
}
?>