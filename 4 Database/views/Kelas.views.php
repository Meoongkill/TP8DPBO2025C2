<?php

class KelasView
{
    public function render($data)
    {
        $no = 1;
        $dataKelas = null;
        foreach ($data as $val) {
            list($id, $nama_kelas, $tahun_akademik, $id_mata_kuliah) = $val;
            $dataKelas .= "<tr class='text-center align-middle'>
                <td>" . $no++ . "</td>
                <td>" . $nama_kelas . "</td>
                <td>" . $tahun_akademik . "</td>
                <td>" . $id_mata_kuliah . "</td>
                <td>
                    <a href='kelas.php?id_edit=" . $id . "' class='btn btn-warning'>Edit</a>
                    <a href='kelas.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        // Load the template and replace placeholders
        $tpl = new Template("Templates/Kelas.html");
        $tpl->replace("JUDUL", "Kelas");
        $tpl->replace("DATA_TABEL", $dataKelas);
        $tpl->write();
    }
}
?>