<?php

class Mata_KuliahView
{
    public function render($data)
    {
        $no = 1;
        $dataMataKuliah = null;
        foreach ($data as $val) {
            list($id, $kode_mata_kuliah, $nama_mata_kuliah, $peruntukkan_semester_mata_kuliah, $pengampu_mata_kuliah) = $val;
            $dataMataKuliah .= "<tr class='text-center align-middle'>
                <td>" . $no++ . "</td>
                <td>" . $kode_mata_kuliah . "</td>
                <td>" . $nama_mata_kuliah . "</td>
                <td>" . $peruntukkan_semester_mata_kuliah . "</td>
                <td>" . $pengampu_mata_kuliah . "</td>
                <td>
                    <a href='mata_kuliah.php?id_edit=" . $id . "' class='btn btn-warning'>Edit</a>
                    <a href='mata_kuliah.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        // Load the template and replace placeholders
        $tpl = new Template("Templates/Mata_Kuliah.html");
        $tpl->replace("JUDUL", "Mata Kuliah");
        $tpl->replace("DATA_TABEL", $dataMataKuliah);
        $tpl->write();
    }
}
?>