<?php

class KRSView
{
    function render($data)
    {
        $no = 1;
        $dataKRS = null;
        foreach ($data as $val) {
            list($ID_KRS, $ID_Mahasiswa, $Kode_Mata_Kuliah, $Nama_Mata_Kuliah, $Semester, $Nilai_Akhir) = $val;
            $dataKRS .= "<tr class='text-center align-middle'>
                <td>" . $no++ . "</td>
                <td>" . $ID_Mahasiswa . "</td>
                <td>" . $Kode_Mata_Kuliah . "</td>
                <td>" . $Nama_Mata_Kuliah . "</td>
                <td>" . $Semester . "</td>
                <td>" . $Nilai_Akhir . "</td>
                <td>
                    <a href='krs.php?id_edit=" . $ID_KRS . "' class='btn btn-warning'>Edit</a>
                    <a href='krs.php?id_hapus=" . $ID_KRS . "' class='btn btn-danger'>Hapus</a>
                </td>
            </tr>";
        }

        // Load the template and replace placeholders
        $tpl = new Template("template/krs.html");
        $tpl->replace("JUDUL", "krs");
        $tpl->replace("DATA_TABEL", $dataKRS);
        $tpl->write();
    }

    function renderFormEdit($val)
    {
        list($ID_KRS, $ID_Mahasiswa, $Kode_Mata_Kuliah, $Nama_Mata_Kuliah, $Semester, $Nilai_Akhir) = $val;
        // Load the template and replace placeholders
        $tpl = new Template("template/krsedit.html");
        $tpl->replace("Data_ID", $ID_KRS);
        $tpl->replace("Data_ID_Mahasiswa", $ID_Mahasiswa);
        $tpl->replace("Data_ID_Kode_Mata_Kuliah", $Kode_Mata_Kuliah);
        $tpl->replace("Data_ID_Nama_Mata_Kuliah", $Nama_Mata_Kuliah);
        $tpl->replace("Data_Semester", $Semester);
        $tpl->replace("Data_Nilai_Akhir", $Nilai_Akhir);
        $tpl->write();
    }

    function renderKRSList($krs, $mahasiswa){
        list($ID_KRS, $ID_Mahasiswa, $Kode_Mata_Kuliah, $Nama_Mata_Kuliah, $Semester, $Nilai_Akhir) = $krs;

        $no = 1;
        $dataMahasiswa = null;
        foreach($mahasiswa as $val){
            list($ID_Mahasiswa, $NIM_Mahasiswa, $Nama_Mahasiswa, $Phone_Mahasiswa) = $val;
            $dataMahasiswa .= "<tr class='text-center align-middle'>
                <td>" . $no++ . "</td>
                <td>" . $NIM_Mahasiswa . "</td>
                <td>" . $Nama_Mahasiswa . "</td>
                <td>" . $Phone_Mahasiswa . "</td>
                </tr>";
        }

        $tpl = new Template("template/mahasiswa.krs.html");
        $tpl->replace("Data_ID", $ID_Mahasiswa);
        $tpl->replace("Data_NIM", $NIM_Mahasiswa);
        $tpl->replace("Data_NAMA", $Nama_Mahasiswa);
        $tpl->replace("Data_PHONE", $Phone_Mahasiswa);
        $tpl->write();
    }
}
?>