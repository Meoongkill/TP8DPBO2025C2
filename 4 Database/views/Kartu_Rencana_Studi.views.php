<?php

class Kartu_Rencana_StudiView
{
    public function render($data)
    {
        $no = 1;
        $dataKRS = null;
        foreach ($data as $val) {
            list($id, $tahun_akademik, $semester, $id_mahasiswa, $id_mata_kuliah) = $val;
            $dataKRS .= "<tr class='text-center align-middle'>
                <td>" . $no++ . "</td>
                <td>" . $tahun_akademik . "</td>
                <td>" . $semester . "</td>
                <td>" . $id_mahasiswa . "</td>
                <td>" . $id_mata_kuliah . "</td>
                <td>
                    <a href='kartu_rencana_studi.php?id_edit=" . $id . "' class='btn btn-warning'>Edit</a>
                    <a href='kartu_rencana_studi.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        // Load the template and replace placeholders
        $tpl = new Template("Templates/Kartu_Rencana_Studi.html");
        $tpl->replace("JUDUL", "Kartu Rencana Studi");
        $tpl->replace("DATA_TABEL", $dataKRS);
        $tpl->write();
    }    
}
?>