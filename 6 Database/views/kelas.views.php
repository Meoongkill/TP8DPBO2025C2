<?php

class KelasView
{
    public function render($data)
    {
        $no = 1;
        $dataKelas = null;
        foreach ($data as $val) {
            list($ID_Kelas, $Nama_Kelas, $ID_Mata_Kuliah, $Tahun_Akademik) = $val;
            $dataKelas .= "<tr class='text-center align-middle'>
                <td>" . $no++ . "</td>
                <td>" . $Nama_Kelas . "</td>
                <td>" . $ID_Mata_Kuliah . "</td>
                <td>" . $Tahun_Akademik . "</td>
                <td>
                    <a href='kelas.php?id_edit=" . $ID_Kelas . "' class='btn btn-warning'>Edit</a>
                    <a href='kelas.php?id_hapus=" . $ID_Kelas . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        // Load the template and replace placeholders
        $tpl = new Template("templates/Kelas.html");
        $tpl->replace("JUDUL", "Kelas");
        $tpl->replace("DATA_TABEL", $dataKelas);
        $tpl->write();
    }

    public function renderFormEdit($data)
    {
        list($ID_Kelas, $Nama_Kelas, $ID_Mata_Kuliah, $Tahun_Akademik) = $data;
        // Load the template and replace placeholders
        $tpl = new Template("templates/Kelas_Form.html");
        $tpl->replace("Data_ID", $ID_Kelas);
        $tpl->replace("Data_NAMA_KELAS", $Nama_Kelas);
        $tpl->replace("Data_ID_MATA_KULIAH", $ID_Mata_Kuliah);
        $tpl->replace("Data_ID_TAHUN_AKADEMIK", $Tahun_Akademik);
        $tpl->write();
    }
}
?>