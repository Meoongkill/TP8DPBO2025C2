<?php

class MahasiswaView
{
    public function render($data)
    {
        $no = 1;
        $dataMahasiswa = null;
        foreach ($data as $val) {
            list($ID_Mahasiswa, $NIM_Mahasiswa, $Nama_Mahasiswa, $Phone_Mahasiswa, $Join_Date_Mahasiswa, $ID_Dosen_Wali) = $val;
                $dataMahasiswa .= "<tr class='text-center align-middle'>
                    <td>" . $no++ . "</td>
                    <td>" . $NIM_Mahasiswa . "</td>
                    <td>" . $Nama_Mahasiswa . "</td>
                    <td>" . $Phone_Mahasiswa . "</td>
                    <td>" . $Join_Date_Mahasiswa . "</td>
                    <td>" . $ID_Dosen_Wali . "</td>
                    <td>
                        <a href='mahasiswa.php?id_edit=" . $ID_Mahasiswa . "' class='btn btn-warning'>Edit</a>
                        <a href='mahasiswa.php?id_hapus=" . $ID_Mahasiswa . "' class='btn btn-danger'>Hapus</a>
                    </td>
                </tr>";
        }
        // Load the template and replace placeholders
        $tpl = new Template("templates/mahasiswa.html");
        $tpl->replace("JUDUL", "Mahasiswa");
        $tpl->replace("DATA_TABEL", $dataMahasiswa);
        $tpl->write();
    }

    public function renderFormEdit($data)
    {
        list($ID_Mahasiswa, $NIM_Mahasiswa, $Nama_Mahasiswa, $Phone_Mahasiswa, $Join_Date_Mahasiswa, $ID_Dosen_Wali) = $data;
        // Load the template and replace placeholders
        $tpl = new Template("templates/mahasiswa.html");
        $tpl->replace("Data_ID", $ID_Mahasiswa);
        $tpl->replace("Data_NIM", $NIM_Mahasiswa);
        $tpl->replace("Data_NAMA", $Nama_Mahasiswa);
        $tpl->replace("Data_PHONE", $Phone_Mahasiswa);
        $tpl->replace("Data_JOIN_DATE", $Join_Date_Mahasiswa);
        $tpl->replace("Data_ID_DOSEN_WALI", $ID_Dosen_Wali);
        $tpl->write();
    }
}
?>