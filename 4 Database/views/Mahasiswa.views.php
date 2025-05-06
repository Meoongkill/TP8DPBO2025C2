<?php

class MahasiswaView
{
    public function render($data)
    {
        $no = 1;
        $dataMahasiswa = null;
        foreach ($data as $val) {
            list($id, $nim, $nama, $phone, $join_date, $id_dosen_wali) = $val;
                $dataMahasiswa .= "<tr class='text-center align-middle'>
                    <td>" . $no++ . "</td>
                    <td>" . $nim . "</td>
                    <td>" . $nama . "</td>
                    <td>" . $phone . "</td>
                    <td>" . $join_date . "</td>
                    <td>" . $id_dosen_wali . "</td>
                    <td>
                        <a href='mahasiswa.php?id_edit=" . $id . "' class='btn btn-warning'>Edit</a>
                        <a href='mahasiswa.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                    </td>
                </tr>";
        }
        // Load the template and replace placeholders
        $tpl = new Template("Templates/Mahasiswa.html");
        $tpl->replace("JUDUL", "Mahasiswa");
        $tpl->replace("DATA_TABEL", $dataMahasiswa);
        $tpl->write();
    }
}
?>